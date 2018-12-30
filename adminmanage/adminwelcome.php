


<?php
    session_start();
   // $uid=$_SESSION['user'];
	//error_reporting(0);
	include("include/admin-main.php");
 // echo $uid;
	$obj=new admin();
	//get user profile--------------------------
    $user_details=$obj->select_objData("user_profile","where id='$_REQUEST[mid]'");
  	$sp1=mysqli_query($con,"select * from user_profile where id='$_REQUEST[mid]'");
	$re1=mysqli_fetch_array($sp1);
	
	//get user adds for automobiles------
	//$user_details=$obj->select_objData("automobile_profile","where user_id='$_REQUEST[mid]'");
	
	//echo "select * from automobile_profile where id=$uid";
	
	$sp2=mysqli_query($con,"select * from automobile_profile where user_id='$_REQUEST[mid]'");
	$sp3=mysqli_query($con,"select * from yachts_profile  where user_id='$_REQUEST[mid]'");
	//if(mysqli_num_rows($sp2)>0){
	//while($re2=mysqli_fetch_array($sp2)){
		
		
	//	echo $re2['title'];

	//}
	//}
	












?>






















<html>
<head>
<title>Demo E-commerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cruise Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<style>
.overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	background-color:none;
	height: 100%;
	z-index: 20;
	padding-left: 6%;
	padding-right: 6%;
	display: table;
}

.level
{
font-size:17px;
font-family:cursive;
color:white;
}

a.logo {
    display: inline-block;
    text-align: center;
    text-decoration: none;
	padding-top:51px;
}


</style>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/gallery.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/aos.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css -->
<!-- js -->
<script src="js/modernizr.min.js"></script>
<!-- /js -->
</head>
<body  style="background:#b2934b">

<?php 
?>

  <div class="topbar-w3ls">
	<div class="container">
		<a href="index.html" class="logo">
			<h1>
				<i  class="fa fa-ship" aria-hidden="true"></i>
				WELCOME TO Demo E-commerce
				<i class="fa fa-ship" aria-hidden="true"></i>	
			</h1>
		</a>		
		<div class="top-agileits">
			<div class="top-w3l1">
				<span class="glyphicon glyphicon-phone-alt"></span> 	
				<p class="agile1">+1 515 151515</p>
				<p class="agile2">+1 010 101010</p>
			</div>		
			<div class="top-w3l2">
				<span class="glyphicon glyphicon-map-marker"></span>
				<p class="agileits1">77 Jack Street</p> 
				<p class="agileits2">Delhi,INDIA</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>	
</div>
<div class="clearfix"></div>
<!-- /topbar -->
<!-- navigation -->
<div class="navbar-wrapper">
    <div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav cl-effect-7">
						<li class="active"><a href="../index.php" >Home</a></li>
						<li><a href="admin/dashboard.php" >Post Your Add </a></li>
						<li><a href="admin/dashboard.php">Edit Profile</a></li>
						
						<li><a href="admin/logout.php" >Logout</a></li>
						
					</ul>
				</div>
			</div>
        </nav>
	</div>
</div>



<br>
<br>


<section class="contact-w3-agileits" id="contact">
	<div class="container">
		
	<h3 class="text-center" data-aos="zoom-in"></h3>
	  
	   <div class="row">
	 <div class="col-md-2">
	 &nbsp
	 </div>
	 <div class="col-md-12">
		
			<form action="#" method="post>
				
			
				<div class="form-group col-md-12 ">
				<level  class="level" > YOUR NAME</level>
					<input class="form-control" id="email2" name="email2" value="<?php echo $re1['name'];?>">
				</div>
				<div class="form-group col-md-12 ">
				<level  class="level" > YOUR EMAIL</level>
					<input class="form-control" id="email2" name="email2" value="<?php echo $re1['email'];?>">
				</div>
				<div class="form-group col-md-12">
				<level class="level" >YOUR Mobile</level>
					<input  class="form-control" id="phone" name="phone" value="<?php echo $re1['mobile'];?>" >
				</div>
				
				<div class="form-group col-md-12">
				<level  class="level" >YOUR ADDRESS</level>
					<input  class="form-control" id="phone" name="phone" value="<?php echo $re1['address'];?>" >
				</div>
				
				
			</form>	
			</div>
		
		
		<div class="col-md-2">
		&nbsp
		</div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>





    <div class="container">
	
	<h2><center> MY ADDS FOR AUTOMOBILES<br/></br></h3>
	
	</div>
	<?php
		if(mysqli_num_rows($sp2)>0){
	while($re2=mysqli_fetch_array($sp2)){
		
		
		?>
		
		 <section class="about-wthree" id="about">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-right">
			<h3 class="text-center">Title::<?php echo $re2['title'];?></h3>
			<div class="table-responsive">
			<table class="table">
			<h4 class="text-center">Details</h4><br/>
			<tr>
			<th>
			Price:
			</th>
			<th><?php echo $re2['price'];?></th>
			</tr>
			<tr>
			<th>
			Year:
			</th>
			<th><?php echo $re2['year'];?></th>
			</tr>
			<tr>
			<th>
			Milege:
			</th>
			<th><?php echo $re2['milege'];?></th>
			</tr>
			<tr>
			<th>
			Fuel Type:
			</th>
			<th><?php echo $re2['fuel'];?></th>
			</tr>
			<tr>
			<th>
			Gear Box:
			</th>
			<th><?php echo $re2['gb'];?></th>
			</tr>
		
			<tr>
			<th>
			Color:
			</th>
			<th><?php echo $re2['color'];?></th>
			</tr>
			<tr>
			<th>
			Interior Color:
			</th>
			<th><?php echo $re2['intcolor'];?></th>
			</tr>
			<tr>
			<th>Engine:</th>
			<th><?php echo $re2['engine'];?></th>
			</tr>
			<tr>
			<th>Condition:</th>
			<th><?php echo $re2['cond'];?></th>
			</tr>
			</table>
			</div>
			
			<h4 style="color:white" class="text-center">Description:<?php echo $re2['des'];?></h4>
			
			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-left">
			<ul class="grid cs-style-1">
				<li>
					<figure>
						<img src="admin/uploads/<?php echo $re2['photo'];?>" alt="img01" class="img-responsive"style="height:100%">
						
					</figure>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
	<?php 	
	}  
		}
		else
		{
			echo "<h1>You have not uploaded any photos yet...</h1><br/>";
			 echo "<a href='admin/dashboard.php'>Click here to Add Photos</a>";
		}
		
		?>
		
		<div class="container">
	
	<h2><center> MY ADDS FOR YACHTS<br/></br></h3>
	
	</div>
		
		<?php
		if(mysqli_num_rows($sp3)>0){
	while($re3=mysqli_fetch_array($sp3)){
		
		
		?>
		
		 <section class="about-wthree" id="about">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-right">
			<h3 class="text-center">Title::<?php echo $re3['title'];?></h3>
			<div class="table-responsive">
			<table class="table">
			<h4 class="text-center">Details</h4><br/>
			<tr>
			<th>
			Price:
			</th>
			<th><?php echo $re3['price'];?></th>
			</tr>
			
			<tr>
			<th>
			Length:
			</th>
			<th><?php echo $re3['length'];?></th>
			</tr>
			
		
			<tr>
			<th>
			Draft:
			</th>
			<th><?php echo $re3['draft'];?></th>
			</tr>
		
			<tr>
			<th>
			Berth:
			</th>
			<th><?php echo $re3['berth'];?></th>
			</tr>
			<tr>
			<th>
			Engine:
			</th>
			<th><?php echo $re3['engine'];?></th>
			</tr>
			<tr>
			<th>Engine Hp:</th>
			<th><?php echo $re3['enginehp'];?></th>
			</tr>
			<tr>
			<th>Engine Hr:</th>
			<th><?php echo $re3['enginehr'];?></th>
			</tr>
			<tr>
			<th>Engine Brand:</th>
			<th><?php echo $re3['enginebrand'];?></th>
			</tr>
			<tr>
			<th>Speed:</th>
			<th><?php echo $re3['speed'];?></th>
			</tr>
		
			<tr>
			<th>Fuel Tank :</th>
			<th><?php echo $re3['fueltank'];?></th>
			</tr>
			<tr>
			<th>Water Tank :</th>
			<th><?php echo $re3['watertank'];?></th>
			</tr>
			<tr>
			<th> Boat Type:</th>
			<th><?php echo $re3['boattype'];?></th>
			</tr>
			</table>
			</div>
			
			<h4 style="color:white" class="text-center">Description:<?php echo $re2['des'];?></h4>
			
			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-left">
			<ul class="grid cs-style-1">
				<li>
					<figure>
						<img src="admin/uploads/<?php echo $re3['photo'];?>" alt="img01" class="img-responsive" style="height:100%">
						
					</figure>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
	<?php 	
	}  
		}
		else
		{
			echo "<h1>You have not uploaded any Adds yet...</h1><br/>";
			 echo "<a href='admin/dashboard.php'>Click here to Add Photos</a>";
		}
		
		?>
	









    




<div class="container">
	
	<h2><center> MY ADDS FOR REAL STATES<br/></br></h3>
	
	</div>
		
		<?php
		if(mysqli_num_rows($sp3)>0){
	while($re3=mysqli_fetch_array($sp3)){
		
		
		?>
		
		 <section class="about-wthree" id="about">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-right">
			<h3 class="text-center">Title::<?php echo $re3['title'];?></h3>
			<div class="table-responsive">
			<table class="table">
			<h4 class="text-center">Details</h4><br/>
			<tr>
			<th>
			Price:
			</th>
			<th><?php echo $re3['price'];?></th>
			</tr>
			
			<tr>
			<th>
			Length:
			</th>
			<th><?php echo $re3['length'];?></th>
			</tr>
			
		
			<tr>
			<th>
			Draft:
			</th>
			<th><?php echo $re3['draft'];?></th>
			</tr>
		
			<tr>
			<th>
			Berth:
			</th>
			<th><?php echo $re3['berth'];?></th>
			</tr>
			<tr>
			<th>
			Engine:
			</th>
			<th><?php echo $re3['engine'];?></th>
			</tr>
			<tr>
			<th>Engine Hp:</th>
			<th><?php echo $re3['enginehp'];?></th>
			</tr>
			<tr>
			<th>Engine Hr:</th>
			<th><?php echo $re3['enginehr'];?></th>
			</tr>
			<tr>
			<th>Engine Brand:</th>
			<th><?php echo $re3['enginebrand'];?></th>
			</tr>
			<tr>
			<th>Speed:</th>
			<th><?php echo $re3['speed'];?></th>
			</tr>
		
			<tr>
			<th>Fuel Tank :</th>
			<th><?php echo $re3['fueltank'];?></th>
			</tr>
			<tr>
			<th>Water Tank :</th>
			<th><?php echo $re3['watertank'];?></th>
			</tr>
			<tr>
			<th> Boat Type:</th>
			<th><?php echo $re3['boattype'];?></th>
			</tr>
			</table>
			</div>
			
			<h4 style="color:white" class="text-center">Description:<?php echo $re2['des'];?></h4>
			
			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12" data-aos="flip-left">
			<ul class="grid cs-style-1">
				<li>
					<figure>
						<img src="admin/uploads/<?php echo $re3['photo'];?>" alt="img01" class="img-responsive" style="height:100%">
						
					</figure>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
	<?php 	
	}  
		}
		else
		{
			echo "<h1>You have not uploaded any Adds yet...</h1><br/>";
			 echo "<a href='admin/dashboard.php'>Click here to Add Photos</a>";
		}
		
		?>


















<section class="footer-w3-agileits">
	<div class="container">
		<div class="col-lg-8 col-md-8">
			<ul class="w3-agile">
				<li><a href="index.html" class="page-scroll">Home</a></li>
				<li><a href="#about" class="page-scroll">About</a></li>
				<li><a href="#service" class="page-scroll">Real state</a></li>
				<li><a href="#gallery" class="page-scroll">Automobiles</a></li>
				<li><a href="#team" class="page-scroll">Yachts</a></li>
				<li><a href="#contact" class="page-scroll">Contact</a></li>
				<li><a href="#contact" class="page-scroll">Login/Register</a></li>
			</ul>
		</div>
		<div class="col-lg-4 col-md-4">
			<ul class="social-icons2">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			</ul>	
		</div>
		<div class="clearfix"></div>
		<p class="text-center"> All Rights Reserved | Design by <a href="http://rssindia.com.com/"> RSS Infotech PVT.LTD. </a></p>
	</div>
</section>










<!-- /footer -->
<!-- back to top -->
<a href="#0" class="cd-top">Top</a>
<!-- /back to top -->
<!-- js files -->
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>
<script src='js/aos.js'></script>
<script src="js/index.js"></script>
<!-- js for back to top -->
<script src="js/top.js"></script>
<!-- /js for back to top -->
<!-- js for about lightbox -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
	$(".lightninBox").lightninBox();
</script>
<!-- /js for about lightbox -->
<!-- js for gallery -->
<script src="js/jquery.picEyes.js"></script>
<script>
$(function(){
	//picturesEyes($('li'));
	$('ul.demo li').picEyes();
});
</script>
<!-- /js for gallery -->
<!-- js for banner -->
<script src="js/jquery.vide.js"></script>
<!-- /js for banner -->
<!-- /js files -->
</body>
</html>