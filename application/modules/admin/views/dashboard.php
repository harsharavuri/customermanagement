<!DOCTYPE html>
<head>
	<title>Help portal</title>
	<style >
	</style>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/custom_user.css">
</head>
<body>
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/admin.js"></script>
<header>
	<nav class="navbar navbar-default">
		<div class="navbar-header" a="" href="#"><h2>Admin</h2>
		</div>
		<form class="navbar-form navbar-right">
		<p></p><h2>WSDC Complaint Center
		
			<button class="btn btn-success btn-md">home</button>
			<button class="btn btn-danger btn-md"><a href="<?php echo base_url()?>auth/logout">Logout</a></button>
		
	</h2></form></nav>
</header>
		
		<div class="row" align="center">		
		<h1>Online Nitw Student comolaint forum</h1>
		</div>
		<br>
		<div id="navcontainer">
<ul>
  <li><a href="">Home</a></li>
  <li id="getTicket">Get Ticket</li>
  <li id="unsolvedRequests">Unsolved Requests</li>
  <li id="assignProblems">Assign Problems</li>
  <li id="updateStatus">Update Status</li>
</ul>
</div>

	
<center>
	
	<div id="updatestatusblock" style="display:none">
		<input type="text" placeholder="ticketid" id="containsticketid">
		<input type="text" placeholder="updatedstatus" id="newstatus">
		<input type="submit" id="updatefinalstatus">
		</div>

	<div id="writeHere" style="display:none">
		<input type="text" id="containsID">
		<input type="submit" id="getFinalStatus">
	</div>
<div id="populate"></div>
	</center>



	<br> <br>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
      <!-- <hr> -->
      <footer style="background-color:#041301">
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>Quick Links</strong><br><br>
          <ul type="square" style="margin-left:-1.5em">
            <li><a href="http://www.nitw.ac.in" target="_blank">College main website </a></li>
            <li><a href="http://www.nitw.ac.in/nitw/index.php/home/index.php?option=com_content&amp;view=article&amp;id=607" target="_blank">Fee structure 2014-15 </a></li>
            <li><a href="http://mail.google.com/a/student.nitw.ac.in" target="_blank">Student Webmail</a></li>
            <li><a href="http://www.nitw.ac.in/nitw/index.php?option=com_content&amp;view=article&amp;id=554&amp;Itemid=60" target="_blank">Department Websites</a></li>
            <li><a href="http://www.nitw.ac.in/nitw/index.php/academics/rules" target="_blank">Rules and regulations</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>About Us</strong><br><br>
          <address>
            WSDC Office, <br>
            Level 1, Center for Innovation &amp; Incubation <br>
            NIT Warangal, Telangana - 506004
          </address>
          Drop us an email on
          <a href="mailto:wsdc.nitw@gmail.com">  <span class="glyphicon glyphicon-envelope"></span>  wsdc.nitw@gmail.com</a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <strong>Follow us on Facebook</strong><br><br>
          Stay in touch with WSDC, NIT Warangal<br>
          <div class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/wsdc.nitw" data-layout="button" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=200&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwsdc.nitw&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f39e5dda268964c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FuN4_cXtJDGb.js%3Fversion%3D42%23cb%3Df1d72a7a960d934%26domain%3Dwsdc.nitw.ac.in%26origin%3Dhttps%253A%252F%252Fwsdc.nitw.ac.in%252Ff34cd03c73a10a4%26relation%3Dparent.parent&amp;container_width=200&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwsdc.nitw&amp;layout=button&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
          <br><br>
          Read more at  <a href="http://wsdc.nitw.ac.in" target="_blank">wsdc.nitw.ac.in <span class="glyphicon glyphicon-new-window"></span></a>
          <br>
          <span class="glyphicon glyphicon-copyright-mark"></span> <a class="tips" title="" target="_blank" href="http://wsdc.nitw.ac.in/" data-original-title="Web &amp; Software Development Cell, NIT Warangal">WSDC, NIT Warangal </a>
        </div>
      </div>

    </footer>
  </div>

</body>
</html>