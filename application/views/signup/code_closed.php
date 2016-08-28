<!DOCTYPE html>
<html>
<head>
    <title>
        <?php if(!empty($title)) echo $title.' | '.$fest.date('y').', NIT Warangal'; else echo $fest.date('y').', NIT  Warangal | Online Registrations'; ?>
    </title>
    <!-- SEO -->
    <meta name="description" content="NIT Warangal Presents <?php echo $fest.date('y') ?>. The annual extravaganza. Events and workshop registrations are open.">
    <!-- Facebook open graph -->
    <!-- SEO -->
    <meta name="description" content="NIT Warangal Presents <?php echo $fest ?>. Events and workshop registrations are open.">
    <!-- Facebook open graph -->
    <meta property="og:title" content="SpringSpree 2016"/>
    <meta property="og:type" content="Fest Website, non profit organisation"/>
    <meta property="og:url" content="http://www.springspree.in"/>
    <meta property="og:description" content="SpringSpree is the annual cultural fest of NIT, Warangal. It's one of the biggest fest in South India."/>
    <!-- Twitter cards -->
    <meta name="twitter:card" content="SpringSpree is the annual cultural fest of NIT, Warangal. It's one of the biggest fest in South India." />
    <meta name="twitter:site" content="@SpringSpree16" />
    <meta name="twitter:title" content="SpringSpree , NITWarangal" />
    <meta name="twitter:description" content="National Level Cultural Fest of NIT-Warangal." />
    <meta name="twitter:url" content="https://register.springspree.in/" />

    <link rel="stylesheet" href="<?php echo asset_url()."css/flatly.bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo asset_url()."css/signup.css"; ?>">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url()."css/social-buttons-3.css"; ?>">
    <script src="<?php echo asset_url()."js/jquery.min.js"; ?>"></script>
    <script>
        (function() {
            var po = document.createElement('script');
            po.type = 'text/javascript'; po.async = true;
            po.src = 'https://plus.google.com/js/client:plusone.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
        })();
    </script>

</head>
<body>
    <div id = "loading" style="display: block;position: absolute;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.43);z-index: 1000;overflow: visible">
        <center><img style="margin-top: 10%" src="<?php echo asset_url()."images/728.GIF"; ?>" alt=""/></center>
    </div>
    <div class="container signup">
        <div class="row" id="header">

        </div>
        <div class="row" id="main">
            <div class="col-md-6">
                <div class="row" id="logo">
                    <center><img src="<?php echo get_tz_logo('side-menu'); ?>" class="img-responsive img-rounded" height="250" width="250" alt="Technozion Logo"></center>
                </div>
                <div class="row" id="name">
                    <h4 class="text-info">Events & workshops registration started </h4>
                    <h4 class="text-warning">Proshows registration started </h4>
                    <h4 class="text-warning"> Change Your facebook profile pic to springspree overlay <a target="_blank" href="http://springspree.in/profilepicture">here</a></h4>
                    <h2 > <?php echo $fest.date('y') ?></h2>
                   <!--  <p><strong>Updates:</strong><br>New workshops added, for more details <a href="#" target="_blank">workshops</a></p>
               -->  </div> 
            </div>
            <div class="col-md-6" id="signinarea">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php
                        if($this->session->flashdata('success') == TRUE)
                            echo '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('success').'</div>';

                        if($this->session->flashdata('warning') == TRUE)
                            echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('warning').'</div>';

                        if($this->session->flashdata('info') == TRUE)
                            echo '<div class="alert alert-info"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('info').'</div>';

                        if($this->session->flashdata('danger') == TRUE)
                            echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$this->session->flashdata('danger').'</div>';
                        ?>
                    </div>
                </div>

                <div class="row" id="status">
                </div>
                <!--<div class="well well-sm">
                    <center>
                        <div class="btn-group">
                           <button class="btn btn-facebook" onclick="fb_signup()"><i class="fa fa-facebook"></i> | Connect with Facebook</button>
                           <div id="gConnect" style="display: none;z-index: -100">
                            <button class="g-signin"
                            data-scope="https://www.googleapis.com/auth/plus.profile.emails.read profile"
                            data-requestvisibleactions="http://schemas.google.com/AddActivity"
                            data-clientId="737446118862-qtri7s1r76a6gn00g8j740cl5fkvnrfj.apps.googleusercontent.com"
                            data-callback="onSignInCallback"
                            data-theme="dark"
                            data-cookiepolicy="single_host_origin">
                        </button>
                    </div>
                    <button class="btn btn-google-plus" onclick="gp_signup()"><i class="fa fa-google-plus"></i> | Connect with Goolge+</button>
                </div>
            </center>
                                    <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false" data-scope="email" ></div>
        </div>-->
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
            <li><a href="#signup" data-toggle="tab">Sign Up</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane form-panel active" id="login">
                <form id="signin-form" action="" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="signin-inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input required autofocus type="email" class="form-control" id="signin-inputEmail" placeholder="emailid@example.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signin-inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input required type="password" class="form-control" id="signin-inputPassword">
                        </div>
                    </div>

                    <div class="btn-group col-md-offset-2" style="float:left;">
                        <button type="submit" class="btn btn-primary btn-signin">Login</button>


                    </div>
					<a href="#" class="col-md-offset-2" id="btn_forgot_password" style="float:left;margin-top:2%;margin-left:1.5%;">Forgot Password?</a>
                    <br><br>

                    
                </form>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <center> 
                         <!-- <h3><strong>Registration is closed</strong></h3> -->
                     </center>
                 </div>
             </div>

             <form action="<?php echo base_url('forgot_password/request') ?>" class="form_forgot_password hidden" method="POST" role="form">
                <legend>Forgot Password?</legend>

                <div class="form-group">
                    <label for="inputEmail">Registered Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" required="required" title="Your registered email id" placeholder="Valid email ID">
                </div>



                <button type="submit" class="pull-right btn btn-primary">Reset Password</button>
            </form>
        </div>

        <div class="tab-pane form-panel" id="signup">
            <form id="signup-form" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="signup-inputName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input required type="text" name="Name" class="form-control" id="signup-inputName" placeholder="eg: Sachin Tendulkar">
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input required type="email" name="Email" class="form-control" id="signup-inputEmail" placeholder="sachin@tendulkar.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputGender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        <select name="Gender" class="form-control" id="signup-inputGender">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputPhone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input required type="tel" name="Phone" class="form-control" id="signup-inputPhone" placeholder="9876543210">
                        <span class="help-block"> Do not add prefix +91</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputCity" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <!-- <input required type="text" name="City" class="form-control" id="signup-inputCity" placeholder="where is your college from?"> -->
                        <select required name="City" class="form-control" id="signup-inputCity">
                            <option value="0">select city</option>
                            <?php foreach ($cities as $row):?>
                                <option value="<?=$row->city_id?>"><?=$row->city?></option>
                            <?php endforeach;?>
                            <option value="others">Others</option>
                        </select>
                        <input type='text' class='form-control' name='otherCity' placeholder='your city name' id='signup-o-inputCity' style="display:none;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputCollege" class="col-sm-3 control-label">College</label>
                    <div class="col-sm-9" id="college">
                        <!-- <input required type="text" name="College" class="form-control" id="signup-inputCollege" placeholder="your college here"> -->
                        <select name="College" class="form-control" id="signup-inputCollege">
                            <option value="0">Select college</option>
                        </select>
                        <input type='text' class='form-control' name='otherCollege' placeholder='your college name' id='signup-o-inputCollege' style="display:none;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputCollegeId" class="col-sm-3 control-label">Student-id</label>
                    <div class="col-sm-9">
                        <input required type="text" name="CollegeId" class="form-control" id="signup-inputCollegeId" placeholder="Enter your student-id in here">
                    </div>
                </div>
                <!-- Year -->
                <!-- Department -->
                <div class="form-group">
                    <label for="signup-inputState" class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9">
                        <select name="State" class="form-control" id="signup-inputState">
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttaranchal">Uttaranchal</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>


                    </div>
                </div>
                <div class="form-group">
                    <label for="signup-inputPassword" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input required type="password" name="Password" class="form-control" id="signup-inputPassword">
                    </div>
                </div>
				<div class="form-group">
                    <label for="signup-inputReferral" class="col-sm-3 control-label">Referral Code</label>
                    <div class="col-sm-9">
                        <input type="text" name="Referral" class="form-control" id="signup-inputReferral" placeholder="optional">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <button type="submit" class="btn btn-primary btn-block" id="signup-button">Sign Up</button>
                    </div>
                </div>
            </form>

        </div>
        <div style="margin-bottom:-15%;">
		<div id = "loading" style="position: absolute;top: 115%;overflow: visible;">
				<a href="https://goo.gl/qAmIAC"><img style="display: block;width:60%;height:60%;margin-left:37%;" src="<?php echo asset_url()."images/playstore.jpg"; ?>" alt=""/></a>
		</div>
		<!--<div id = "loading" style="position: absolute;top: 90%;left:30%;overflow: visible;">
				<img style="display: block;width:80%;height:80%;margin-left:35%;" src="<?php echo asset_url()."images/QR.jpg"; ?>" alt=""/>
		</div>-->
		</div>
		<br><br><br>
				
    </div>
	<div style="position:absolute;top:155%;margin-left:15%;"><p style="font-size:110%;"> <span> If you face any problems in payment , send a mail to <b> webdev@springspree.in</b> or contact <a target="_blank" href="http://springspree.in/spree16/home/webteam">Web Team </a> mentioning your <a href="<?php echo base_url("profile"); ?>">springspreeid</a>  and name</span></p>
    </div>    
</div>
</div>
<div class="row" id="footer">
    <!-- <p class="pull-left help-block">page rendered in <strong>{elapsed_time}</strong> seconds</p> -->
    <p class="help-block pull-left hidden-xs hidden-sm"><a href="http://www.springspree.in">www.springspree.in </a>
    <p class="pull-right help-block">&copy; <?php echo date('Y').'  ,'.$fest.'NITW' ?></p>
</div>
</div>
<script src="<?php echo asset_url()."js/bootstrap.min.js"; ?>"></script>
<script src="<?php echo asset_url()."js/signup.js"; ?>"></script>
<script src="<?php echo asset_url()."js/college_city.js"?>"></script>
</body>
</html>
