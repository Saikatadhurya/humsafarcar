<?php
session_start();
if(isset($_SESSION['uid']))
{
$user_id=$_SESSION['uid'];
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

	<!--Google Map API -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeyRabHc9Yy2u6uXT096CoTjpPgAovCdw&libraries=places"></script>
	
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
	<link rel="icon" href="assets/images/logo.png" type="image/gif" sizes="16x16">
    
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
	<?php if(!isset($_SESSION['did']))
	{
		?>
		<br><br>
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
	
    
	<div class="vehicle-multi-border yellow-black"></div>
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
    </div>
	<div class="vehicle-multi-border yellow-black"></div>

	
    <!-- ====== Check Vehicle Area ====== --> 
    <div class="check-vehicle-block gray-20" id="book car">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="check-content">
                        <h4 class="top-subtitle">Search your Car</h4>
                        <h2 class="title yellow-color">For rates &amp; Availability</h2>
                        <h3 class="subtitle">Find Best Rental Car</h3>
                    </div><!-- /.check-content -->
                </div><!-- col-md-4 -->

                <div class="col-md-8">
                    <form  class="advance-search-query input-night-rider yellow-theme" action="carview.php" method="post" autocomplete="off">
                        <div class="regular-search">                        
                            <div class="row">
							<?php if(isset($_SESSION['uid']))
							{
								?>
								
							<div class="col-md-8">
							<a href="chat/index.php?did=<?php echo $user_id?>"<button type="button"  class="btn btn-lg btn-danger" style="margin:10px">Chat with Your Driver</button></a>
							</div>
							<?php
							}
							?>
                                <div class="col-md-6">
                                    <label for="locationTextField">Picking up location</label>
                                    <div class="input">
                                        <i class="fa fa-map-marker"></i>
                                        <input type="text" placeholder="Your location" class="pick-location form-controller" id="locationTextField" name="fromp" required>
                                    </div><!--/.input-->
                                </div><!--/.col-md-4-->

                                <div class="col-md-6">
                                    <label>Picking up date</label>
                                    <div class="input">
                                        <i class="fa fa-calendar"></i>
                                        <input type="text" class="date-start date-selector form-controller" placeholder="dd/mm/yy" name="pud" required>
                                    </div><!--/.input-->
                                </div><!--/.col-md-4-->

								  <div class="col-md-6">
                                    <label for="locationTextField1">Dropping off location</label>
                                    <div class="input">
                                        <i class="fa fa-map-marker"></i>
                                        <input type="text" placeholder="Off your location" class="drop-location form-controller" id="locationTextField1" name="top" required>
                                    </div><!--/.input-->
                                </div><!--/.col-md-4-->
								
                                <div class="col-md-6">
                                    <label>Picking up Time</label>
                                    <div class="input">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="time-selector form-controller" placeholder="00:00" name="put" required>
                                      </div><!--/.input-->
                                </div><!--/.col-md-4-->
                                
                               

                              
 <div class="clearfix"></div><!-- /.clearfix -->

                            </div><!-- /.row -->
                        </div><!-- /.regular-search -->

                       

                        <div class="check-vehicle-footer">
                           <!--     <div class="advanced-search">
                                    <a href="#" class="advanced-search-btn"><i class="fa fa-search"></i>Advanced search</a>
                                </div>-->
                               <button type="submit" class="button" name="find" value="find">Find car</button>
                            </div><!-- /.row -->
							<!-- The Modal -->
								<div id="myModal" class="modal">

								  <!-- Modal content -->
								  <div class="modal-content">
									<div class="modal-header">
									  <span class="close">&times;</span>
									  <h2>Details of Ride</h2>
									</div>
									<div class="modal-body">
									  <p>Picking up location: Your Location</p>
									  <p>Picking up date: dd/mm/yy</p>
									  <p>Picking up Time: 15:00 am</p>
									  <p>Dropping off location: off your location</p>
									  <p>Dropping off date: dd/mm/yy</p>
									  <p>Dropping off time: 12:00 am</p>
									</div>
									<div class="modal-footer">
									  <h3><b>Ride is Successfully Booked</b></h3>
									</div>
								  </div>

								</div>
                        </div><!-- /.check-vehicle-footer -->
                    </form><!-- /.advance_search_query -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!--/.container -->
    </div>
	<!-- /.check-vehicle-block-->
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
	<div class="vehicle-multi-border yellow-black""></div>
<?php
	}
	?>
	<br>
	
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <div class="vehicle-multi-border yellow-black" id="our services"></div><!-- /.vehicle-multi-border -->
     <div class="about-main-content mr-top-90">
        <div class="container" style="margin-bottom:10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-top-content">
                        <div class="row">
                            <div class="col-md-12">
							<div class="heading-content style-one border">
                               
                                    <h2 class="extra-big-title"><span style="color:#ffcc00" >Our Services</span></h2>
                                  <!--  <h4 class="sub-title">Best offers Information</h4>-->
                                </div><!-- /.section-title-area -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                        
                    </div><!-- /.top-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
			<div class="row">
                <div class="col-md-12">
                    <div class="about-top-content">
                        <div class="row">
                           
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title" style="float:right;"><strong><span style="color:#ffcc00" >We provide best car renting services..</span></strong></h2>
                            </div><!-- /.col-md-12 -->
                            
							
                            <div class="col-md-6">
                                <img src="assets/images/about/mnh.jpg" title=" Best Car renting and car sharing services." alt="car-item" style="border-radius:10px;"/>
                            </div><!-- /.col-md-7 -->
							
							<div class="col-md-6">
                                <div class="about-content-right" style="border:1px solid; border-color:#FFCC00; border-radius: 5px;">
								 <div style="margin:8px;">				
								   <p align="justify" >Car rental: Whenever a private car owner goes out of station or city where they can't take their cars,
								   it rusts in garage and also sometime needs huge maintenance cost if it's not under work for certain period.
								   By renting their car while they are out they can earn money and also cars are under good condition.
                                    Private Car owner can earn money without doing any great effort,
									just by sharing their idle car seats to accompany riders having same or somewhere  in between destination.
									On the other hand the rider will get the cheap , reliable and efficient mode of transportation.
									 By renting their car while they are out they can earn money and also cars are under good condition.</p>
								</div>	
                                </div><!-- /.about-content-right-->
                            </div><!-- /.col-md-5 -->
                        </div><!-- /.row -->
                    </div><!-- /.top-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
			<div class="row">
                            <div class="col-md-12">
                                <h2 class="title"><strong><span style="color:#ffcc00">We provide best car sharing services.</span></strong></h2>
                            </div><!-- /.col-md-12 -->
                            <div class="col-md-6">
                                <div class="about-content-left" style="border:1px solid; border-color:#FFCC00; border-radius: 5px;">
                                    <div style="margin:8px;">
									 <p align="justify" >Car sharing: Whenever a private car owner goes out of station or city where they can't take their cars,
								   it rusts in garage and also sometime needs huge maintenance cost if it's not under work for certain period.
								   By renting their car while they are out they can earn money and also cars are under good condition.
                                    Private Car owner can earn money without doing any great effort,
									just by sharing their idle car seats to accompany riders having same or somewhere  in between destination.
									On the other hand the rider will get the cheap , reliable and efficient mode of transportation.
									 By renting their car while they are out they can earn money and also cars are under good condition.</p>
								  </div>	
                                </div><!-- /.about-content-left-->
                            </div><!-- /.col-md-5 -->
							
                            <div class="col-md-6">
                                <img src="assets/images/about/mnb.jpg" title="Best Car renting and car sharing services."  alt="car-item" style="border-radius:10px;"/>
                            </div><!-- /.col-md-7 -->
							
                        </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.about-main-content -->
	      
   
     
    <div class="vehicle-multi-border yellow-black"></div><!-- /.vehicle-multi-border -->
    
    <!-- ======driver block======= --> 
       <div class="driver-block pd-90" id="our team">
        <div class="container">
            <div class="row tb default-margin-bottom yellow-theme">
                <div class="col-md-9 block-title-area tb-cell">
                    <div class="heading-content style-one border">
                        <h3 class="subtitle">Developer,Designer,Debugger </h3>
                        <h2 class="title"><span style="color:#ffcc00">Our Team</span></h2>
                    </div><!-- /.heading-content-one -->
                </div><!-- /.col-md-10 -->

                <div class="col-md-3 hidden-xs block-navigation-area tb-cell">
                    <div class="pull-right">                    
                        <div class="item-navigation">
                            <a href="#" class="previous-item">
                                <i class="fa fa-angle-left"></i> 
                            </a>

                            <a href="#" class="next-item">
                                <i class="fa fa-angle-right"></i> 
                            </a>
                        </div><!-- /.item-navigation -->

                        <div class="view-all-item">
                            <a href="#" class="view-all-btn">View all</a>
                        </div><!-- /.view-all-item -->
                    </div><!-- /.pull-right -->
                </div><!-- /.col-md-2 -->
            </div><!-- /.row --> 

            <div class="driver-carousel slider-style-two owl-carousel" data-item="[5,2,2,1]">
                <div class="item">
                    <div class="driver-content vehicle-content theme-yellow">
                        <div class="driver-thumb vehicle-thumbnail">
                            <a href="#">
                                <img src="assets/images/team/shubraj.jpg" title="Best Car renting and car sharing services." alt="car-item" />
                            </a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                           <h2 class="driver-name vehicle-title"><a href="#">Shubraj Prasad Singh</a></h2>
                            <h4 class="driver-desc">Android Developer</h4>
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->
                </div><!-- /.item -->

                <div class="item">
                    <div class="driver-content vehicle-content theme-yellow">
                        <div class="driver-thumb vehicle-thumbnail">
                            <a href="#">
                                <img src="assets/images/team/madhav.jpg" title="Best Car renting and car sharing services." alt="car-item" />
                            </a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                           <h2 class="driver-name vehicle-title"><a href="#">Madhav Kr. Mishra</a></h2>
                            <h4 class="driver-desc">Web Developer</h4>
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->
                </div><!-- /.item -->
                
                <div class="item">
                    <div class="driver-content vehicle-content theme-yellow">
                        <div class="driver-thumb vehicle-thumbnail">
                            <a href="#">
                                <img src="assets/images/team/samrat.jpg" title="Best Car renting and car sharing services." alt="car-item" />
                            </a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                           <h2 class="driver-name vehicle-title"><a href="#">Samrat Anand</a></h2>
                            <h4 class="driver-desc">Android Developer</h4>
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->
                </div><!-- /.item -->

                <div class="item">
                    <div class="driver-content vehicle-content theme-yellow">
                        <div class="driver-thumb vehicle-thumbnail">
                            <a href="#">
                                <img src="assets/images/team/sai.jpg" title="Best Car renting and car sharing services." alt="car-item" />
                            </a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                           <h2 class="driver-name vehicle-title"><a href="#">Saikat Adhurya</a></h2>
                            <h4 class="driver-desc">Web Developer</h4>
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->
                </div><!-- /.item -->
				
				
				
				 <div class="item">
                    <div class="driver-content vehicle-content theme-yellow">
                        <div class="driver-thumb vehicle-thumbnail">
                            <a href="#">
                                <img src="assets/images/team/sonu.jpg" title="Best Car renting and car sharing services." alt="car-item" />
                            </a>
                        </div><!-- /.vehicle-thumbnail -->
                        <div class="vehicle-bottom-content">
                           <h2 class="driver-name vehicle-title"><a href="#">Sonu Kr.Singh</a></h2>
                            <h4 class="driver-desc">Android Developer</h4>
                        </div><!-- /.vehicle-bottom-content -->
                    </div><!-- /.car-content -->
                </div>
            </div><!-- /.driver-carousel -->

            <!-- block-navigation-area -->
            <div class="block-navigation-area visible-xs-block">
                <div class="view-all-item clearfix">
                    <a href="#" class="view-all-btn">View all</a>
                </div><!-- /.view-all-item -->
            </div><!-- /.block-navigation-area -->
        </div><!-- /.container  -->
    </div><!-- /.driver-area -->
    <div class="vehicle-multi-border yellow-black" </div> <!-- /.vehicle-multi-border -->
	<div class="vehicle-multi-border yellow-black"></div>
	<br><br>
	
    <!-- ====== App block ====== --> 
    <div class="app-block bg-gray-color mr-top-35 mr-btm-5">
        <div class="container-large-device">
            <div class="container">
                <div class="row tb">
                    <div class="col-md-6 tb-cell">
                        <div class="mobile-app-details">
                            <h4 class="top-subtitle">All discount just for you</h4>
                            <h2 class="title red-color"> <span style="color:#ffcc00" >Our Free Mobile App</span></h2>
                            <h3 class="subtitle">Search Humsafar on Google Play Store</h3>
                            <div class="app-location-link">
                               <!-- <a href="#">
                                    <img src="assets/images/app-logo-one.png" alt="mobile" />
                                </a-->
                                <a href="#" title="Best Car renting and car sharing services.">
                                    <img  src="assets/images/app-logo-two.png" title="Best Car renting and car sharing services." alt="mobile" />
                                </a>
                            </div><!-- /.app-location-link -->
                        </div><!-- /.mobile-app-details -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 tb-cell">
                        <div class="app-mokeup">
                            <img src="assets/images/mobile1.png" alt="mobile" style="margin:5px;" />
                        </div><!-- /.app-mokeup -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.container-large-device -->
    </div><!-- /.app-block -->
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
	
	  <script>
            function init() {
                var input = document.getElementById('locationTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);
            }

            google.maps.event.addDomListener(window, 'load', init);
        </script>
		<script>
            function init() {
                var input = document.getElementById('locationTextField1');
                var autocomplete = new google.maps.places.Autocomplete(input);
            }

            google.maps.event.addDomListener(window, 'load', init);
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
