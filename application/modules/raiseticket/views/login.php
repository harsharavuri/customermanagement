<!DOCTYPE html>
<!-- saved from url=(0042)https://wsdc.nitw.ac.in/student/auth/login -->
<html lang="en" itemscope="" itemtype="http://schema.org/EducationalOrganization" class="gr__wsdc_nitw_ac_in"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Authentication of credentials">
<meta name="author" content="WSDC">
<title>Student Help &amp; support center</title>
    <!-- Tag Templates starts here -->
	
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="/google.bootstrap.min.css" rel="stylesheet">-->
<!--    <script async="" src="./Student Help &amp; support center_files/analytics.js"></script><script>-->
        <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46078676-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');

    </script>
</head>
<body data-gr-c-s-loaded="true">
	
	<script>
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
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
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
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
		window.location = 'http://localhost/tickets/raiseticket/dashboard' ; //<?php echo base_url().'raiseticket/dashboard' ?>;
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

	
	
    <div class="container google">
      <div id="main_name">
        <a href="http://www.nitw.ac.in/wsdc">
            <img src="./Student Help &amp; support center_files/logo_wsdc.png" alt="WSDC logo" width="100px">
        </a>
    </div>
    <a href="https://wsdc.nitw.ac.in/student/" style="text-decoration:none"><h1 class="text-info text-center">Cutomer Support</h1></a>
    <br>
<form class="form form-signin" role="form" method="post" accept-charset="utf-8">
  <!-- <div class="alert alert-danger">The website is under maintenance. Inconvenience is deeply regretted. <br> -Abhishek Singh, WSDC Gen. Sec</div> -->
     <div class="alert alert-danger">
  </div>
 <div class="well google-well">
  <!-- <span class="text-danger">Do not use email id to login</span> -->
  <div class="form-group has-feedback">
    <span class="help-block">WSDC account</span>
    <input required="required" type="text" id="identity" name="identity" class="form-control" placeholder="username" autofocus="">
    <!-- <span class="form-control-feedback" aria-hidden="true">@student.nitw.ac.in</span> -->
  </div>
  <div class="form-group">
    <input required="required" type="password" id="password" name="password" class="form-control" placeholder="password">
  </div>
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary ">Sign In</button>   
	<div id="status">
	</div>
	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

</div>
</div>
<div class="form-group">
   
  <div class="clearfix">
    <br>
  </div>
  Don't have a account? <a href="https://wsdc.nitw.ac.in/student/auth/create_general_user"> Sign up via FB</a>
</div>
</form>
<div class="clearfix">
</div>
<div class="row hidden-print">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table">
			<tbody><tr>
				<th class="text-center" colspan="3" style="border:none"> © Web &amp; Software Development Cell, NIT Warangal</th>
			</tr>
			<tr>
				<td> <a href="http://mail.google.com/a/student.nitw.ac.in">Student Webmail</a></td>
				<td> <a href="http://www.nitw.ac.in/">NITW Homepage</a></td>
				<td> <a href="http://www.nitw.ac.in/ro">Routine Order</a></td>
			</tr>
		</tbody>
	</table>
	<center>
		<a target="_blank" href="http://google.com/edu">Google Apps for Education</a>, <a href="http://www.nitw.ac.in/">NIT Warangal </a>
		<br><br>
		<a href="http://mail.google.com/a/student.nitw.ac.in" class="tips" title="Click here to explore Google Apps for Education"><img class="img img-responsive" width="200px" src="./Student Help &amp; support center_files/logo_strip.png" alt="Google Apps"></a>
	</center>
</div>
</div> <!-- footer container close here -->
</div>  <!-- /container -->
<!-- Main Body Ends -->
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>