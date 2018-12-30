
<body>
   
	
    <!-- ====== Header Nav Area ====== --> 
    <header  class="header-nav-area">
	<nav   class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" style="color:white">        
            <div class="row">
                <div class="col-md-3 col-sm-10 col-xs-10">
                    <div class="site-logo">
                        <a href="index.php"><img src="assets/images/HUM.png" title="Car renting and car sharing services."alt="logo" /></a>
                    </div><!-- /.logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-9 col-sm-2 col-xs-2 pd-right-0">
                    <nav class="site-navigation top-navigation nav-style-one">
                        <div class="menu-wrapper">
                            <div class="menu-content">
                                <ul class="menu-list">
                                    <li>
                                        <a href="index.php" title="Home" >Home</a>
                                      
                                    </li>
                                    <li>
                                        <a href="index.php#about us" title="About us">About Us</a>
                                    </li>
                                    <li>
                                        <a href="index.php#our services" title="Our services">Our services</a>
                              
                                    </li>
                                    <li>
                                        <?php if (!isset($_SESSION['email'])) { ?><a href='registeruser.php' title='join'>Join Now</a> <?php }?>
                                  
                                    </li>
                                    <li>
                                        <a href="index.php#our team" title="Our team">Our team</a>
                                    </li>
                            
                                    <li>
                                        <a href="index.php#about us" title="Contact us">Contact us</a>
                                    </li>
									<li>
									  <?php if (isset($_SESSION['did'])) { ?><a href='carpost.php' title='carpost'>Post Journey</a> <?php }?>
									</li>
									<li>
									  <?php if (isset($_SESSION['email'])) { ?><a href='logout.php' title='Logout'>Logout</a> <?php } else { ?> <a href='login.php' title='Login'>Login</a><?php }?>
									</li>
									
                                </ul> <!-- /.menu-list -->
                            </div> <!-- /.menu-content-->
                        </div> <!-- /.menu-wrapper --> 
                    </nav><!-- /.site-navigation -->
