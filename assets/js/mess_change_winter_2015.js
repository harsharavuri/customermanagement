$(document).ready(function(){


	$('#mess_change_option').click(function(){
		$('#mess_change_modal').modal('show');
	});
	
	$('#change_mess_btn').click(function(){
		$.ajax({        
			type: "POST",
			url : "./change_mess",
			
			success: function(data)
			{ 
				console.log(data);
				location.reload();
				if(data==="1")
					$('#confirmed_popup-modal-sm').modal('show');
				else
					$('#error_popup-modal-sm').modal('show');

			}
		}); 

	});


});