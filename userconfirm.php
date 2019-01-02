 <?php
session_start();
if (!isset($_SESSION['email'])) {
 	ob_start();
  	header('location: index.php');
	exit();
  } 
  include("includes/connect.php");
  $did=mysqli_real_escape_string($db, $_GET['did']);
  $carnumber=mysqli_real_escape_string($db, $_GET['carnumber']);

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

    <!-- ======= Main Slider Area =======-->
   <!-- /.slider-block -->

    <!-- ====== Section divider ====== --> 
	<br><br><br><br>
	  <div class="vehicle-multi-border yellow-black" id="our services"></div>
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

    <!-- ====== Check Vehicle Area ====== --> 
    <div class="check-vehicle-block gray-20" id="book car">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="check-content">
                        <h4 class="top-subtitle">Your Journey Confirmed</h4>
                        <h2 class="title yellow-color">!!!Congrats!!!</h2>
                        <h3 class="subtitle">Your Journey Detail</h3>
                    </div><!-- /.check-content -->
                </div><!-- col-md-4 -->
			  
               <div class="col-md-8">
			  
			   <?php	 
$query1 = mysqli_query($db,"select * from driver where did='$did'");	
$row1 = mysqli_fetch_assoc($query1);
$firstname=mysqli_real_escape_string($db, $row1['firstname']);		   
$lastname=mysqli_real_escape_string($db, $row1['lastname']);		   
$query = mysqli_query($db,"select * from car where did='$did' and carnumber='$carnumber'");

$row = mysqli_fetch_assoc($query);
	$carname=mysqli_real_escape_string($db, $row['carname']);
	$carnumber=mysqli_real_escape_string($db, $row['carnumber']);
	$fromp=mysqli_real_escape_string($db, $row['fromp']);
	$top=mysqli_real_escape_string($db, $row['top']);
	$perkm=mysqli_real_escape_string($db, $row['perkm']);
	?>
	 <div class="row">
	 <div class="col-md-4">
	<a href="chat/index.php?did=<?php echo $did?>"><button type="button"  class="btn btn-lg btn-danger">Chat with Driver</button></a>
	</div>
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
	<button type="button" class="btn btn-lg btn-success">Confirm Ride</button>
	</div>
	</div>

		
						    <h1 class="card-text" style="color:#FFFFFF;">Jouney Details</h1><hr>
							
							<h4 class="card-text" style="color:#FFFFFF;">Driver Name : <?php echo $firstname; ?> <?php echo $lastname; ?></h3><hr>
							
							
							  <h4 class="card-text" style="color:#FFFFFF;">Car Model/Car Name:<?php echo $carname; ?></h3><hr>
							
							<h4 class="card-text" style="color:#FFFFFF;">Car Number : <?php echo $carnumber; ?></h3><hr>
							
							  <h4 class="card-text" style="color:#FFFFFF;">From : <?php echo $fromp; ?> </h3> <hr>     
							  <h4 class="card-text" style="color:#FFFFFF;">To : <?php echo $top; ?></h3><hr>
							
							<h4 class="card-text" style="color:#FFFFFF;">Rate per km: <?php echo $perkm; ?></h3> <hr>
							<h4 class="card-text" style="color:#FFFFFF;">Base Fair : Rs. 20</h3><hr>
							
							
						 
					
					
                                <div class="clearfix"></div><!-- /.clearfix -->
    
                       
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!--/.container -->
    </div><!-- /.check-vehicle-block-->

       
   
<br>
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
      <div class="vehicle-multi-border yellow-black" id="our services"></div>
</body>
</html>
