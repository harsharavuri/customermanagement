var app=angular.module('registration',['alert_module'])
				.constant(
							"CONSTANTS",{
											LABORATORY: 2,
											STUDY: 1,
											EXAM: 2,
											STARTING_BATCH_INDEX: 1,
											SUCCESS_CODE: 1,
											ERROR_CODE: 0,
											MAX_STUDY_CREDITS: 30,
											MAX_TOTAL_CREDITS: 34,
											SECTION_NA: 'NA',
											NETWORK_ERROR: 'Some Error occurred! Please reload/refresh the page and try again.',
											ERROR_STUDY_CREDITS: 'Study Credits crossing maximum limit.',
											ERROR_TOTAL_CREDITS: 'Total Credits crossing maximum limit.',
											ENTER_BACKLOG_COURSE: 'Enter Backlog subject Course Id',
											LOADING: 'Loading...'
										}
						);

app.controller("GetOfferedCourses", function($scope, CONSTANTS, $http, alert ){
	
	$scope.CONSTANTS=CONSTANTS;

	$scope.alert=alert.initializeAlert();

	createRegistrationCourses();

	$scope.register=function register(){
		if(!checkCredits()) return;
		var sendData=formRegistrationData();
		$scope.alert=alert.successAlert( $scope.CONSTANTS.LOADING );
		console.log(window.location.href);
		$http({ 
			method:'POST',
			url:' insertRegistrationData',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{'data':JSON.stringify(sendData)}
		})
		.success(function(data, status) {
			//data = JSON.parse(data);

			console.log(data);
			if(data.code == SUCCESS_CODE ){
				$scope.alert=alert.successAlert( data.message );
			}
			else{
				$scope.alert=alert.errorAlert( data.message );
			}
			window.location.href = "http://wsdc.nitw.ac.in/student/registration/slip" ;
		})
		.error(function(data, status) {
				$scope.alert==alert.errorAlert( $scope.CONSTANTS.NETWORK_ERROR );
		});
	}

	$scope.fetchRegularData=function fetchRegularData() {
		//console.log($scope.regularSection);
		var section=$scope.regularSection;
		$scope.alert=alert.successAlert( $scope.CONSTANTS.LOADING );

		$http({ 
			method:'POST',
			url:'getOfferredCourses',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{'section':section}
		})
		.success(function(data, status) {
			//data = JSON.parse(data);
			console.log(data);
			if(data.code == $scope.CONSTANTS.SUCCESS_CODE ) {
				createOfferedCourses(data.data);
				$scope.calculateCredits();
				$scope.hideAlert();
			}
			else {
				var temp=[];
				createOfferedCourses(temp);
				$scope.calculateCredits();
				$scope.alert=alert.errorAlert( data.message );
			}
		})
		.error(function(data, status) {
				$scope.alert==alert.errorAlert( $scope.CONSTANTS.NETWORK_ERROR );
		});
	}

	$scope.fetchBacklogData=function fetchBacklogData() {
		courseId=prompt( $scope.CONSTANTS.ENTER_BACKLOG_COURSE );
		$('.backlog-section').show();
		$scope.alert=alert.successAlert( $scope.CONSTANTS.LOADING );

		$http({ 
			method:'POST',
			url:'getBacklogCourseDetail',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{'courseId':courseId}
		})
		.success(function(data, status) {
			//data = JSON.parse(data);
			console.log(data);
			if(data.code == $scope.CONSTANTS.SUCCESS_CODE ) {
				createBacklogCourses(data.data);
				$scope.calculateCredits();
				$scope.hideAlert();
			}
			else {
				$scope.alert=alert.errorAlert( data.message );
			}
		})
		.error(function(data, status) {
				$scope.alert==alert.errorAlert( $scope.CONSTANTS.NETWORK_ERROR );
		});
	}

	$scope.getSectionForStructure=function getSectionForStructure( mapping, structureId ) {
		section=[];
		for(i=0;i<mapping.length;i++)
			if(structureId==parseInt(mapping[i].structureId))
			{
				for(j=0;j<mapping[i].sections.length;j++)
					section.push(mapping[i].sections[j].section);
			}
		return section;
	}

	$scope.getbatchForStructureSection=function getbatchForStructureSection( mapping, structureId, section ) {
		batches=[];
		for(i=0;i<mapping.length;i++)
			if(structureId==parseInt(mapping[i].structureId))
			{
				for(j=0;j<mapping[i].sections.length;j++)
					if( mapping[i].sections[j].section == section )
					{
						for( k=1;k<=mapping[i].sections[j].batches;k++ )
							batches.push(k);
					}
			}
		return batches;
	}


	function createRegistrationCourses() {
		$scope.registrationCourses={};
		$scope.registrationCourses.offeredCourses=[];
		$scope.registrationCourses.backlogCourses=[];
		$scope.registrationCourses.studyCredits=0;
		$scope.registrationCourses.examCredits=0;
	}

	function createOfferedCourses( data ) {
		$scope.registrationCourses.offeredCourses=[];
		for(i=0;i<data.length;i++)
		{
			var offeredCourse=data[i];

			offeredCourse.studyMode=STUDY;
			offeredCourse.batch=STARTING_BATCH_INDEX;
			offeredCourse.drop=false;

			$scope.registrationCourses.offeredCourses.push(offeredCourse);
		}
	}

	function createBacklogCourses( data ) {
		var backlogCourse=data.course;

		backlogCourse.structureId=null;
		backlogCourse.section=$scope.CONSTANTS.SECTION_NA;
		backlogCourse.studyMode=EXAM;
		backlogCourse.batch=STARTING_BATCH_INDEX;
		backlogCourse.drop=false;

		backlogCourse.mapping=data.mapping;
		$scope.registrationCourses.backlogCourses.push(backlogCourse);
	}

	function formRegistrationData()
	{
		var sendData={};
		sendData.offeredCourses=[];
		sendData.backlogCourses=[];

		for(i=0;i<$scope.registrationCourses.offeredCourses.length;i++)
			if($scope.registrationCourses.offeredCourses[i].drop)
			{}
			else{
				var offeredCourse={};
				
				offeredCourse.courseId=$scope.registrationCourses.offeredCourses[i].courseId;
				offeredCourse.batch=parseInt($scope.registrationCourses.offeredCourses[i].batch);
				offeredCourse.studyMode=$scope.registrationCourses.offeredCourses[i].studyMode;

				sendData.offeredCourses.push(offeredCourse);
			}

		for(i=0;i<$scope.registrationCourses.backlogCourses.length;i++)
			if($scope.registrationCourses.backlogCourses[i].drop)
			{}
			else{
				var backlogCourse={};

				backlogCourse.structureId=$scope.registrationCourses.backlogCourses[i].structureId;
				backlogCourse.section=$scope.registrationCourses.backlogCourses[i].section;
				backlogCourse.courseId=$scope.registrationCourses.backlogCourses[i].courseId;
				backlogCourse.batch=parseInt($scope.registrationCourses.backlogCourses[i].batch);
				backlogCourse.studyMode=$scope.registrationCourses.backlogCourses[i].studyMode;

				sendData.backlogCourses.push(backlogCourse);
			}
		return sendData;
	}

	$scope.calculateCredits=function calculateCredits() {
		$scope.registrationCourses.studyCredits=0;
		$scope.registrationCourses.examCredits=0;
		for(i=0;i<$scope.registrationCourses.offeredCourses.length;i++)
			if($scope.registrationCourses.offeredCourses[i].drop)
			{}
		else
			$scope.registrationCourses.studyCredits+=parseInt($scope.registrationCourses.offeredCourses[i].credit);

		for(i=0;i<$scope.registrationCourses.backlogCourses.length;i++)
			if($scope.registrationCourses.backlogCourses[i].drop)
			{}
		else if($scope.registrationCourses.backlogCourses[i].studyMode==$scope.CONSTANTS.STUDY)
			$scope.registrationCourses.studyCredits+=parseInt($scope.registrationCourses.backlogCourses[i].credit);
		else
			$scope.registrationCourses.examCredits+=parseInt($scope.registrationCourses.backlogCourses[i].credit);
	}

	function checkCredits()
	{
		if($scope.registrationCourses.studyCredits>$scope.CONSTANTS.MAX_STUDY_CREDITS)
		{
			$scope.alert=alert.errorAlert($scope.CONSTANTS.ERROR_STUDY_CREDITS);
			return false;
		}
		else if($scope.registrationCourses.studyCredits+$scope.registrationCourses.examCredits>$scope.CONSTANTS.MAX_TOTAL_CREDITS)
		{
			$scope.alert=alert.errorAlert($scope.CONSTANTS.ERROR_TOTAL_CREDITS);
			return false;
		}
		return true;
	}

	$scope.hideAlert=function hideAlert(){
		$scope.alert.show=false;
	}

});

app.filter('range', function() {
  return function(input, total) {
    total = parseInt(total);
    for (var i=0; i<total; i++)
      input.push(i);
    return input;
  };
});