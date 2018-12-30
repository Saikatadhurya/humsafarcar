<?php
session_start();
?>
 <?php $errors=[];
   if (isset($_SESSION['email'])) {
 	ob_start();
  	header('location: index.php');
	exit();
  } 
 ?>
 <?php

include('includes/connect.php');
include('chat/database_connection.php');
if(isset($_POST['login'])) 
{
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5(crc32($password));
	if($_POST['ridertype']=='users')
	{		
	$login_query = "select * from users where email = '$email' AND password = '$password'";
	}
	if($_POST['ridertype']=='driver')
	{		
	$login_query = "select * from driver where email = '$email' AND password = '$password'";
	}
	
	$run = mysqli_query($db,$login_query);
	if(mysqli_num_rows($run)==1)
	{
		
		$_SESSION['email'] = $email;
		
		if($_POST['ridertype']=='driver')
		{
			$query = mysqli_query($db, "select * from driver where email = '$email'");
			$row1 = mysqli_fetch_assoc($query);
							$did = $row1['did'];
							$firstname = $row1['firstname'];
		$_SESSION['did'] = $did;
		$_SESSION['firstname'] = $firstname;
				$query = mysqli_query($db, "select * from userdriver where email = '$email'");
			$row = mysqli_fetch_assoc($query);
			
							$_SESSION['user_id'] = $row['user_id'];
		 $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();					
							 $_SESSION['login_details_id'] = $connect->lastInsertId();
		echo"<script>window.open('carpost.php','_self')</script>";
		}
		else{
			$query = mysqli_query($db, "select * from users where email = '$email'");
			$row2 = mysqli_fetch_assoc($query);
			
							$uid = $row2['uid'];
							$firstname = $row2['firstname'];
		$_SESSION['uid'] = $uid;
		$_SESSION['firstname'] = $firstname;
		$query = mysqli_query($db, "select * from userdriver where email = '$email'");
			$row = mysqli_fetch_assoc($query);
			
							$_SESSION['user_id'] = $row['user_id'];
		 $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();					
							 $_SESSION['login_details_id'] = $connect->lastInsertId();
			echo"<script>window.open('index.php','_self')</script>";
		}
		
	}
	else
	{
		array_push($errors, "Wrong username/password combination");
	}
}
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="HUMSAFAR  is a modern technique for car sharing and resource utilisation.">
    <meta name="keywords" content="humsafar car rent,resource utilisation,car sharing,earn money, Car Rent" />
    <meta name="author" content="">

	
    <!-- Titles
    ================================================== -->
    <title>HUMSAFAR Car renting and car sharing services.. </title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" title="Car renting and car sharing services." href="assets/images/cfe.png">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!-- Custom Font
    ================================================== -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7cRoboto+Slab:400,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color-schemer.css">
	<link rel="stylesheet" href="assets/css/modal1.css">
	
    <!-- RS5.4 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- RS5.4 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">
    
</head>

 <?php include("includes/header.php") ?>
                    <!--Mobile Main Menu-->
                    <div class="mobile-menu-main hidden-md hidden-lg" title="Car renting and car sharing services.">
                        <div class="menucontent overlaybg"> </div>
                        <div class="menuexpandermain slideRight">
                            <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                <span></span>
                            </a>
                        </div><!--/.menuexpandermain-->

                        <div id="mobile-main-nav" class="mb-navigation slideLeft">
                            <div class="menu-wrapper">
                                <div id="main-mobile-container" class="menu-content clearfix"></div>
                            </div>
                        </div><!--/#mobile-main-nav-->
                    </div><!--/.mobile-menu-main-->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div>
		</nav><!-- /.container -->
    </header><!-- /.header-bottom-area -->

	
	<br><br><br><br>
	<div class="vehicle-multi-border yellow-black" id="our services"></div>
    <!-- ======= Main Slider Area =======-->
    <!-- /.slider-block -->

    <!-- ====== Section divider ====== --> 
    <div class="vehicle-section-divider night-rider">
        <div class="contoiner-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-divider-content">
                        <div class="vehicle-border">
                            <img src="assets/images/block-car01.png"  id="join" title="Car renting and car sharing services." alt="car-item" />
                        </div><!-- /.car-border -->
                    </div><!-- /.section-divider-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.section-divider -->
<span id="login">
</span>
    <!-- ====== Check Vehicle Area ====== --> 
    <div class="check-vehicle-block gray-20" id="book car">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="check-content">
                        <h4 class="top-subtitle">Search your Car</h4>
                        <h2 class="title yellow-color">Login Here</h2>
                        <h3 class="subtitle">Find Best Rental Car</h3>
                    </div><!-- /.check-content -->
                </div><!-- col-md-4 -->

                <div class="col-md-8">
                    <form  method="post" class="advance-search-query input-night-rider yellow-theme" action="login.php" autocomplete="off">
                        <div class="regular-search">                        
                            <div class="row">
                          <?php include('errors.php'); ?>

                                <div class="col-md-4">
                                    <label>Email Address</label>
                                    <div class="input">
                                        <i class="fa fa-envelope"></i>
                                        <input type="email" class="form-controller" placeholder="Enter your Email" name="email" required>
                                    </div><!--/.input-->
                                </div><!--/.col-md-4-->
								
								 <div class="col-md-4">
                                    <label>Password</label>
                                    <div class="input">
                                        <i class="fa fa-key"></i>
                                        <input type="password" class="form-controller" placeholder="Enter Password" name="password" required>
                                    </div><!--/.input-->
									
                                </div><!--/.col-md-4-->
								<br>
								<div class="col-md-4">
                              
							<div class="form-check">
								  <input class="form-check-input" type="radio" name="ridertype" id="exampleRadios1" value="driver" checked>
								  <label class="form-check-label" for="exampleRadios1">
									Driver
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="ridertype" id="exampleRadios2" value="users">
								  <label class="form-check-label" for="exampleRadios2">
									User
								  </label>
								</div>
                                        

                                </div><!--/.col-md-4-->

                               
                            </div><!-- /.row -->
                        </div><!-- /.regular-search -->

                       
							
                    
                               <button type="submit" class="button" name="login" value="login">LOGIN</button>
							   <label class="message">
  		 Not yet a Registered?  <a href="registerdriver.php#driver">Sign up as Driver</a> / <a href="registeruser.php#user">Sign up as User</a></label>
		</div><!-- /.row -->
							
                        </div><!-- /.check-vehicle-footer -->
                    </form><!-- /.advance_search_query -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
			    <div class="vehicle-section-divider night-rider">
        <div class="contoiner-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-divider-content">
                        <div class="vehicle-border1">
                            <img src="assets/images/block-car01.png"  id="join" title="Car renting and car sharing services." alt="car-item" />
                        </div><!-- /.car-border -->
                    </div><!-- /.section-divider-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
	<div class="vehicle-multi-border yellow-black" id="our services"></div>
	
	<br><br>
	
			
			
			
			
			
			
			
    
<div class="slider-block">    
        <div class="rev_slider_wrapper">
            <div class="rev_slider carrent-slider" >
                <ul>
                    <!-- slide 1 --> 
                    <li data-transition="fade" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="materialize Material" data-description="">

                        <!-- main image -->
                        <img src="assets/images/slider-car/slider-bg2.jpg"  title="Car renting and car sharing services".alt="Car renting and car sharing services."  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                        <!-- layer no 1 -->
                        <div class="tp-caption tp-resizeme rev-subheading tp-parallax-wrap"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-85']" 
                            data-y="['middle']" data-voffset="['-163','-163','-130','-130']"
                            data-fontsize="['22','22','22','22']"
                            data-lineheight="['30','30','30','30']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="800" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 5; color: #464646; font-weight: 600; font-family: inherit;">All discount just for you
                        </div>

                        <!-- layer no 2 -->
                        <div class="tp-caption tp-resizeme rev-subheading"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['102','102','75','-75']" 
                            data-y="['middle']" data-voffset="['-110','-110','-90','-90']"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-fontsize="['60','60','45','45']"
                            data-lineheight="['60','60','60','60']"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 6; color: #e91e22; font-family: 'Exo', sans-serif; font-weight: 800;"><span style="color:#ffcc00">Need A Ride?</span>
                        </div>

                        <!-- layer no 3 -->
                        <div class="tp-caption tp-resizeme NotGeneric-Title"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['103','103','75','0']" 
                            data-y="['middle']" data-voffset="['0']"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-fontsize="['60','60','45','45']"
                            data-lineheight="['75','75','60','60']"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 7; color: #000000; font-family: 'Exo', sans-serif; font-weight: 900; text-transform: uppercase;">Choose your<br> Comfortable Car
                        </div>

                        <!-- layer no 4 -->
                        <div class="tp-caption rev-subheading tp-resizeme"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-28']" 
                            data-y="['middle']" data-voffset="['95','95','75','75']"
                            data-fontsize="['24']"
                            data-lineheight="['20']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="800" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 5; color: #464646; font-weight: 600; font-family: inherit;">Best worldwide car hire deals!!!!!
                        </div>

                        <!-- layer no 5 -->
                        <div class="tp-caption tp-resizeme"
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-105']" 
                            data-y="['middle']" data-voffset="['150','150','135','120']"
                            data-fontsize="['22']"
                            data-lineheight="['45']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-style_hover="cursor:default;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:600;e:Power2.easeInOut;s:600;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1200" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 7; font-weight: bold; font-family: 'Exo', sans-serif;">
                            <a href="?#book car" class="button black-button slider-button" data-fontsize="['22','22','22','22']">Book Now</a>
                        </div>

                        <!-- layer no 6 -->
                        <div class="tp-caption tp-resizeme"
                            data-x="['right','right','right','center']" data-hoffset="['0','-15','30','-10']"
                            data-y="['middle','middle','middle','bottom']" data-voffset="['15','15','0','0']"
                            data-transform_idle="o:1;" 
                            data-visibility="['on','on','on','off']"
                            data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:300;e:Power3.easeInOut;" data-transform_out="auto:auto;s:600;" 
                            data-splitin="none"
                            data-start="1500"
                            data-type="image"
                            data-responsive_offset="on"
                            data-width="none"
                            data-height="none" data-no-retina>
                                <img src="assets/images/dummy.png" alt="" data-lazyload="assets/images/slider-car/slider-car-01.png" data-ww="['805','805','500','350']" data-hh="['auto']" >
                        </div>
                    </li><!-- /.slide 1 -->
                    <!-- slide 1 --> 
                    <li data-transition="fade" data-slotamount="default" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="materialize Material" data-description="">

                        <!-- main image -->
                        <img src="assets/images/slider-car/slider-bg2.jpg"  title="Best Car renting and car sharing services." alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                        <!-- layer no 1 -->
                        <div class="tp-caption tp-resizeme rev-subheading"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-85']" 
                            data-y="['middle']" data-voffset="['-163','-163','-130','-130']"
                            data-fontsize="['22','22','22','22']"
                            data-lineheight="['30','30','30','30']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="800" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 5; color: #464646; font-weight: 600; font-family: inherit;">All discount just for you
                        </div>

                        <!-- layer no 2 -->
                        <div class="tp-caption tp-resizeme rev-subheading"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['102','102','75','-75']" 
                            data-y="['middle']" data-voffset="['-110','-110','-90','-90']"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-fontsize="['60','60','45','45']"
                            data-lineheight="['60','60','60','60']"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 6; color: #e91e22; font-family: 'Exo', sans-serif; font-weight: 800;">Need A Ride?
                        </div>

                        <!-- layer no 3 -->
                        <div class="tp-caption tp-resizeme NotGeneric-Title"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['103','103','75','0']" 
                            data-y="['middle']" data-voffset="['0']"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-fontsize="['60','60','45','45']"
                            data-lineheight="['75','75','60','60']"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1000" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 7; color: #000000; font-family: 'Exo', sans-serif; font-weight: 900; text-transform: uppercase;">Choose your<br> Comfortable Car
                        </div>

                        <!-- layer no 4 -->
                        <div class="tp-caption rev-subheading tp-resizeme"
                            data-type="text" 
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-28']" 
                            data-y="['middle']" data-voffset="['95','95','75','75']"
                            data-fontsize="['24']"
                            data-lineheight="['20']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="800" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 5; color: #464646; font-weight: 600; font-family: inherit;">Best worldwide car hire deals!!!!!
                        </div>

                        <!-- layer no 5 -->
                        <div class="tp-caption tp-resizeme"
                            data-x="['left','left','left','center']" data-hoffset="['105','105','75','-105']" 
                            data-y="['middle']" data-voffset="['150','150','135','120']"
                            data-fontsize="['22']"
                            data-lineheight="['45']"
                            data-width="none"
                            data-height="none"
                            data-whitespace="nowrap"
                            data-transform_idle="o:1;"
                            data-style_hover="cursor:default;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:600;e:Power4.easeInOut;" 
                            data-transform_out="y:[100%];s:600;e:Power2.easeInOut;s:600;e:Power2.easeInOut;" 
                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                            data-start="1200" 
                            data-splitin="none" 
                            data-splitout="none" 
                            data-responsive_offset="on"
                            style="z-index: 7; font-weight: bold; font-family: 'Exo', sans-serif;">
                            <a href="?#book car" class="button black-button slider-button" data-fontsize="['22','22','22','22']">Book Now</a>
                        </div>

                        <!-- layer no 6 -->
                        <div class="tp-caption tp-resizeme"
                            data-x="['right','right','right','center']" data-hoffset="['0','-15','30','-10']"
                            data-y="['middle','middle','middle','bottom']" data-voffset="['15','15','0','0']"
                            data-transform_idle="o:1;" 
                            data-visibility="['on','on','on','off']"
                            data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:300;e:Power3.easeInOut;" data-transform_out="auto:auto;s:600;" 
                            data-splitin="none"
                            data-start="1500"
                            data-type="image"
                            data-responsive_offset="on"
                            data-width="none"
                            data-height="none" data-no-retina>
                                <img src="assets/images/dummy.png" alt="" data-lazyload="assets/images/slider-car/slider-car-01.png" data-ww="['805','805','500','350']" data-hh="['auto']" >
                        </div>
                    </li><!-- /.slide 1 -->
                </ul>             
            </div><!-- /.revolution slider -->
        </div><!-- /.slider wrapper -->
    </div>

 <?php include("includes/footer.php") ?>
   <!-- All The JS Files
    ================================================== --> 
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/carrent.min.js"></script> <!-- main-js -->

    <!-- RS5.4 Core JS Files -->
    <script src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
  
    <script>
        jQuery(document).ready(function() {
            var $sliderSelector = jQuery(".carrent-slider");
            $sliderSelector.revolution({
                sliderType: "standard",
                sliderLayout: "fullwidth",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "on",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "gyges",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: true,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                },
                responsiveLevels:[1400,1368,992,480],
                visibilityLevels:[1400,1368,992,480],
                gridwidth:[1400,1368,992,480],
                gridheight:[600,600,500,380],
                disableProgressBar:"on"
            });
        });
    </script>
	

    <!-- SLIDER REVOLUTION 5.4 EXTENSIONS  (Load Extensions only on Local File Systems! The following part can be removed on Server for On Demand Loading) -->
    <script src="assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <div class="vehicle-multi-border yellow-black" id="our services"></div><br>
</body>
</html>
