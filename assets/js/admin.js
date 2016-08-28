
$(document).ready(function(){ 
	console.log(document.getElementById("getTicket"));
	$("#getTicket").click(function(event){
		event.preventDefault();
		console.log('yo');
		document.getElementById('writeHere').style.display="block";
		document.getElementById('populate').style.display="none";
		document.getElementById('updatestatusblock').style.display="none";
})});



$(document).ready(function(){ 
	//console.log(document.getElementById("getTicket"));
	$("#updateStatus").click(function(event){
		event.preventDefault();
		console.log('yo');
		document.getElementById('updatestatusblock').style.display="block";
		document.getElementById('writeHere').style.display="none";
		document.getElementById('populate').style.display="none";
})});
 
 


 $(document).ready(function(){ 
	$("#assignProblems").click(function(event){
		event.preventDefault();
		
		var select1=document.createElement('select');
		select1.id="assigneeid";
		var input1=document.createElement('input');
		input1.id="ticketid";
		input1.setAttribute('placeholder','ticket id');
		var buttn = document.createElement('button');
		buttn.id='assignButton';
		buttn.textContent='Assign Issue';
		//console.log('yo');
		
		formData="";
		//console.log(formData);
		$.ajax({
			url : "./dashboard/getusers",
			type: "POST",
			data : formData,
			success: function(data, textStatus, jqXHR)
			{
				data = JSON.parse(data);
				console.log(data);
				if (data.status === "success") {
					for(var i=0;i<data.message.length;i++){
						var opt = document.createElement('option')
						opt.setAttribute('value', data.message[i].id);
						select1.appendChild(opt);
						opt.textContent=data.message[i].email;
					}
					//console.log(Object.keys(data.message[0]));
					
				} else {
					alert(data.message);	
				}
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{	alert(error);
			}
		});
		
		document.getElementById('updatestatusblock').style.display="none";
		document.getElementById('writeHere').style.display="none";
		document.getElementById('populate').style.display="block";
	//	console.log(document.getElementById('populate').style.display);
		document.getElementById('populate').innerHTML = '';
		//if(document.getElementById('populate').childNodes.length == 0)
		document.getElementById('populate').appendChild(select1);
		document.getElementById('populate').appendChild(input1);
		document.getElementById('populate').appendChild(buttn);
		document.getElementById('assignButton').addEventListener('click',myfunc);
		//
		
		
		})
});


function myfunc(event){
		
	//document.getElementById('writeHere').style.display="none";
	formData="";
	formData+='assigneeid='+document.getElementById('assigneeid').value;
	formData+='&ticketid='+document.getElementById('ticketid').value;
	//console.log(formData);
	$.ajax({
        url : "./dashboard/assignissue",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('success');
				
	        } else {
				alert(data.message);	
			}
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
        }
    });
	}
  
  
  
  
  
 
$(document).ready(function(){ 
	console.log(document.getElementById("findStatus"));
	$("#updatefinalstatus").click(function(event){
		
	//document.getElementById('writeHere').style.display="none";
	formData="";
	formData+="ticketid="+document.getElementById('containsticketid').value;
	formData+="&status="+document.getElementById('newstatus').value;
	console.log(formData);
	$.ajax({
        url : "./dashboard/updatestatus",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);
            console.log(data);
            if (data.status === "success") {
			    alert('success');
				
				
            } else {
				alert(data.message);
			}
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {	alert(error);
            //$("#status").removeClass().addClass("alert alert-danger").html("Account is already created. Please login with your email and password");
        }
    });
	})});
  
  

  
  


 

 
$(document).ready(function(){ 
	console.log(document.getElementById("findStatus"));
	$("#unsolvedRequests").click(function(event){
		
		document.getElementById('updatestatusblock').style.display="none";
		document.getElementById('writeHere').style.display="none";
		document.getElementById('populate').style.display="block";
	
	formData="";
	//console.log(formData);
	$.ajax({
        url : "./dashboard/unsolvedrequests",
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
				//var userid = document.createElement('input');
				//userid.id='assigneeid';
				//document.getElementById('populate').appendChild(userid);
				for(var i=0;i<obj.length;i++){
					var div = document.createElement('div');
					div.style.margin = '1%';
					var p = document.createElement('p');
					p.textContent = 'ticketid:'+obj[i].ticketid+'   '+'status:'+obj[i].status+'    '+'Role:'+obj[i].role;
					
					//var userid = document.createElement('input');
					//userid.id = obj[i].ticketid;
					
					/*var buttn = document.createElement('button');
					buttn.id=obj[i].ticketid;
					buttn.setAttribute('value','assign');
					buttn.textContent='assign';
					buttn.setAttribute('class','assign');*/
					div.appendChild(p);//div.appendChild(buttn);
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
	//console.log(document.getElementById("getFinalStatus"));
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






