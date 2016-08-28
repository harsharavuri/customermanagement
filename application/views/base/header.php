<!DOCTYPE html>
<html>
<head>
   <title>
    <?php if(!empty($title)) echo $title.' | '.$fest.date('y').', NIT Warangal'; else echo $fest.date('y').', NIT  Warangal | Online Registrations'; ?>
</title>
<!-- SEO -->
<meta name="description" content="NIT Warangal Presents <?php echo $fest ?>. Events and workshop registrations are open.">
<!-- Facebook open graph -->
<meta property="og:title" content="SpringSpree 2015"/>
<meta property="og:type" content="Fest Website, non profit organisation"/>
<meta property="og:url" content="http://www.springspree.in"/>
<meta property="og:description" content="SpringSpree is the annual cultural fest of NIT, Warangal. It's one of the biggest fest in South India."/>
<!-- Twitter cards -->
<meta name="twitter:card" content="SpringSpree is the annual cultural fest of NIT, Warangal. It's one of the biggest fest in South India." />
<meta name="twitter:site" content="@SpringSpree15" />
<meta name="twitter:title" content="SpringSpree , NITWarangal" />
<meta name="twitter:description" content="National Level Cultural Fest of NIT-Warangal." />
<meta name="twitter:url" content="https://register.springspree.in/" />
<!-- Favicon -->

<link rel="stylesheet" href="<?php echo asset_url()."css/flatly.bootstrap.min.css"; ?>">
<link rel="stylesheet" href="<?php echo asset_url()."css/style.css"; ?>">
<link rel="stylesheet" href="<?php echo asset_url()."css/events_style.css"; ?>">

</head>
<body>
    <div id="layout">
        <div id="menu-wrapper" class="hidden-print">
           <!--  <img src="<?php echo base_url('assets/images/spreelogo.png') ?>" width="100%" alt="">
            --> <ul id="menu" class="nav nav-pills nav-stacked">
                <li class="<?php echo ($current_page === "profile") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("profile"); ?>">My profile</a>
                </li>

                  <li class="<?php echo ($current_page === "registration") ? 'active' : ''; ?>">
                        <a href="<?php echo base_url("registration"); ?>"><?php echo $fest.'Registration' ?></a>
                    </li>
                
             

                <li class="<?php echo ($current_page === "slip") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("slip"); ?>">Registration slip</a>
                </li>

                <li class="<?php echo ($current_page === "tshirt") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("tshirt"); ?>"> T Shirt</a>
                </li> 
                
                <!-- <li class="<?php echo ($current_page === "notifications") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("notifications"); ?>">NOTIFICATIONS</a>
                </li> -->
                <!--
                <li class="disabled">
                    <a href="<?php echo base_url("registration"); ?>">REGISTRATION</a>
                </li> -->
                <li class="separator"></li>
                <!-- <li class="">
                    <a href="http://imojo.in/springspree">Pro-Shows <span class="label label-danger">new</span></a>
                </li> -->
                <li class="<?php echo ($current_page === "events") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("events"); ?>">Events</a>
                </li>
                <li class="<?php echo ($current_page === "workshops") ? 'active' : ''; ?>" style='<?php if($userDetails->registration==1 && $userDetails->workshop==0){echo $show;}else echo $none;?>'>
                    <a href="<?php echo base_url("workshops"); ?>">Workshops <span class="label label-danger"></span></a>
                </li>

                <li class="<?php echo ($current_page === "spotlights") ? 'active' : ''; ?>" style='<?php if($userDetails->registration==1 && $userDetails->workshop==0){echo $show;}else echo $none;?>'>
                    <a href="<?php echo base_url("spotlights"); ?>">Spotlights <span class="label label-danger"></span></a>
                </li>

                <!--<?php if($userDetails->registration==1 && $userDetails->hospitality==0):?>
                    <li class="<?php echo ($current_page === "hospitality") ? 'active' : ''; ?>" style='<?php if($userDetails->registration==1 && $userDetails->hospitality==0){echo $show;}else echo $none;?>'>
                        <a href="<?php echo base_url("hospitality"); ?>">Hospitality Regisration</a>
                    </li>
                <?php endif;?>
                 <li class="<?php echo ($current_page === "query") ? 'active' : ''; ?>">
                    <a href="<?php echo base_url("query"); ?>">FAQs</a>
                </li>
             -->
            <li class="separator"></li>
            <li class="<?php echo ($current_page === "help") ? 'active' : ''; ?>">
                <a href="<?php echo base_url("help"); ?>">Help & Support</a>
            </li>
            <li class="<?php echo ($current_page === "logout") ? 'active' : ''; ?>">
                <a href="<?php echo base_url("logout"); ?>">Logout</a>
            </li>
        </ul>
    </div>
    <div id="main-wrapper">
     <!--<div id="img-header"></div>-->
     <div class="container" id="main">
        <div id="header" class="row">
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
               <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                   <img  width="100px" height="100px" src="<?php echo base_url('assets/images/logo.png') ?>">
             </div>
               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h2>
                    <?php echo $main_heading; ?> 
    
                </h2>
                <h4>
                    <?php echo $side_heading; ?>
                </h4>
              </div>


            </div><div class="hidden-xs col-sm-3 col-md-3 col-lg-3 tz-well well tz-link">
              <center>    <a href="<?php echo base_url('slip') ?>" type="button" class="btn-md btn btn-warning">Registration Slip</a></center>
            </div>
            <!-- \<div class="col-md-4">
                     <div class="btn-group btn-lg pull-right hidden-print">
                        
                        
                    </div>
                </div> -->
                <!-- <div class="col-md-3"></div> -->
            </div>
            <div class="text-info hidden-print"><h4>  If you face any problems in payment , send a mail to <b> webdev@springspree.in</b> or contact <a target="_blank" href="http://springspree.in/spree16/home/webteam">Web Team </a> mentioning your <a href="<?php echo base_url("profile"); ?>">springspreeid</a>  and name</h4></div>
              <div class="text-warning hidden-print"><h4> Proshows registrations started and you can buy tshirts online or onspot <a href="<?php echo base_url("registration"); ?>">Register here</a> </h4></div>

              
            <div id="content" class="row">
