  
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      window.location='http://localhost/tickets/';
	  // The person is logged into Facebook, but not your app.
    } else {
		window.location='http://localhost/tickets/';
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1093994067361787',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=name, email, first_name,last_name', function(response) {
      console.log('Successful login for: ' + response.name+' '+response.email+' '+response.first_name+' '+response.last_name);
     /* document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
		 //<?php echo base_url().'raiseticket/dashboard' ?>;*/
		 //global.email=response.email;global.first_name=response.first_name;
		 //var global;
		 //global.last_name=response.lastname;
		 //global=email;
		 $('#storeEmail').val(response.email);
		 registerfb(response);
    });
  }
  
  $(document).ready(function(){
  $("#raiseTicket").click(function(event) {
    event.preventDefault();
    var formData = "",resp={};
	FB.api('/me?fields=name, email, first_name,last_name', function(response) {
		console.log(response);
		
		//resp = response;
		formData += "email=" + response.email;
	var date = new Date();
	formData += "&adminpriority=" + '0';
	formData += "&status=" + '0';
	formData += "&time=" + date;
	formData += "&upvotes=" + '0';
	formData += "&downvotes=" + '0';
	formData += "&role=" + document.getElementById('selectTag').value;
	formData += "&assignee=" + '0';
	formData += "&description=" + document.getElementById('description').value;
	formData += "&ticketid=" + Math.random();
	console.log(formData);
	$.ajax({
        url : "./dashboard/raise_ticket",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert(data.message);
				//register_success(data.url);		
				//$("#status").removeClass().addClass("alert alert-success").html(data.message);
                //window.location = window.location;
            } else {
				alert(data.message);
			    //$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
	
	});
	
	
	
	//console.log(resp);
    
    return false;
  })});
  

$(document).ready(function(){ 
	console.log(document.getElementById("findStatus"));
	$("#findStatus").click(function(event){
		event.preventDefault();
		console.log('yo');
		document.getElementById('writeHere').style.display="block";
		document.getElementById('populate').style.display="none";
})});
  
$(document).ready(function(){ 
	console.log(document.getElementById("findStatus"));
	$("#previousRequests").click(function(event){
		
	document.getElementById('writeHere').style.display="none";
	formData = "emailid=" + document.getElementById('storeEmail').value;
	
	//console.log(formData);
	$.ajax({
        url : "./dashboard/viewyourtickets",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('success');
				var obj = data.message;
				console.log(obj.length);
				document.getElementById('populate').innerHTML='';
				for(var i=0;i<obj.length;i++){
					var div = document.createElement('div');
					div.style.margin = '1%';
					var p = document.createElement('p');
					p.textContent = 'ticketid:'+obj[i].ticketid+'   '+'status:'+obj[i].status+'    '+'Role:'+obj[i].role;
					div.appendChild(p);
					document.getElementById('populate').appendChild(div);
				}
				
				//alert('Status:' + data.message);
				//register_success(data.url);		
				//$("#status").removeClass().addClass("alert alert-success").html(data.message);
                //window.location = window.location;
            } else {
				//alert(data.message);
			    
				//$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
	})});
  
  

  
  $(document).ready(function(){ 
	console.log(document.getElementById("allTickets"));
	$("#allTickets").click(function(event){
		
	document.getElementById('writeHere').style.display="none";
	//formData = "emailid=" + document.getElementById('storeEmail').value;
	formData="";
	//console.log(formData);
	$.ajax({
        url : "./dashboard/getalltickets",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('success');
				var obj = data.message;
				console.log(obj.length);
				document.getElementById('populate').innerHTML='';
				for(var i=0;i<obj.length;i++){
					var div = document.createElement('div');
					div.style.margin = '1%';
					var p = document.createElement('p');
					p.textContent = 'ticketid:'+obj[i].ticketid+' '+'status:'+obj[i].status+'  '+'Role:'+obj[i].role;
					//p.style.margin='2%';
					div.appendChild(p);
					document.getElementById('populate').appendChild(div);
				}
				
				//alert('Status:' + data.message);
				//register_success(data.url);		
				//$("#status").removeClass().addClass("alert alert-success").html(data.message);
                //window.location = window.location;
            } else {
				//alert(data.message);
			    
				//$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
	})});
  

  
	$(document).ready(function(){ 
	console.log(document.getElementById("allTickets"));
	$("#getSearchValues").click(function(event){
		
	document.getElementById('writeHere').style.display="none";
	document.getElementById('populate').style.display="block";
	document.getElementById('populate').innerHTML='';
				
	//formData = "emailid=" + document.getElementById('storeEmail').value;
	formData="";
	formData="tag="+document.getElementById('selectTag').value;
	//console.log(formData);
	$.ajax({
        url : "./dashboard/gettagtickets",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('success');
				var obj = data.message;
				console.log(obj.length);
				for(var i=0;i<obj.length;i++){
					var div = document.createElement('div');
					div.style.margin = '1%';
					var p = document.createElement('p');
					p.textContent = 'ticketid:'+obj[i].ticketid+' '+'status:'+obj[i].status+'  '+'Role:'+obj[i].role;
					div.appendChild(p);
					document.getElementById('populate').appendChild(div);
				}
				
				//alert('Status:' + data.message);
				//register_success(data.url);		
				//$("#status").removeClass().addClass("alert alert-success").html(data.message);
                //window.location = window.location;
            } else {
				//alert(data.message);
			    
				//$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
	})});
  

  
  



  
  
  $(document).ready(function(){ 
	console.log(document.getElementById("getFinalStatus"));
	$("#getFinalStatus").click(function(event){
		event.preventDefault();
	
	formData = "ticketid=" + document.getElementById('containsID').value;
	
	//console.log(formData);
	$.ajax({
        url : "./dashboard/checkticketstatus",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('Status:' + data.message);
				//register_success(data.url);		
				//$("#status").removeClass().addClass("alert alert-success").html(data.message);
                //window.location = window.location;
            } else {
				alert(data.message);
			    //$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });	
})});



  
  function registerfb(resp){
	  var formData='';
	  formData = "name="+resp.first_name;
	  formData += "&email="+resp.email;
	  formData+= "&first_name="+resp.first_name;
	  formData+="&last_name="+resp.last_name;
	  console.log(formData);
	  $.ajax({
        url : "./dashboard/registeruser",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    console.log('success');
				//window.location = window.location;
            } else {
		//		alert(data.message);
			    //$("#status").removeClass().addClass("alert alert-danger").html(data.message);
            }
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	
			alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
  }




