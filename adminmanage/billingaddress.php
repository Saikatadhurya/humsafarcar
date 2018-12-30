<?php 
	include("include/header.php");
	include("include/config.php");
$id = $_REQUEST['id'];
$sql="SELECT * FROM shipping WHERE user_id='".$id."'";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);
extract($row);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>COSTMATIC</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
       <?php  include 'popup.php' ?>
      <!--header end-->
      <!--sidebar start-->
     <?php  include 'menu.php' ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
            
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <center><font color="red"><b>Billing / Shipping Address</b></font></center>
                          </header>
                          <header class="panel-heading">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" style="color:#000000;">
							<tr>
							<td colspan="2" style="color:#00CC33; text-align:center; font-weight:bold;">Billing Address</td>
							<td colspan="2" style="color:#00CC33; text-align:center; font-weight:bold;"> Shipping Address</td>
							</tr>
							<tr>
							<td> First Name </td>
							<td> <?php echo $f_name; ?></td>
							<td> First Name </td>
							<td> <?php echo $f_name1; ?></td>
							</tr>
							<tr>
							<td> Last Name </td>
							<td> <?php echo $l_name; ?></td>
							<td> Last Name </td>
							<td> <?php echo $l_name1; ?></td>
							</tr>
							<tr>
							<td>Address</td>
							<td> <?php echo $address; ?></td>
							<td> Address</td>
							<td> <?php echo $address1; ?></td>
							</tr>
							<tr>
							<td>City</td>
							<td> <?php echo $city; ?></td>
							<td> City</td>
							<td> <?php echo $city1; ?></td>
							</tr>
							<tr>
							<td>Zip</td>
							<td> <?php echo $zip; ?></td>
							<td> Zip </td>
							<td> <?php echo $zip1; ?></td>
							</tr>
							<tr>
							<td>Country</td>
							<td> <?php echo $country; ?></td>
							<td> Zip </td>
							<td> <?php echo $country1; ?></td>
							</tr>
							</table>
                          </header>
                          
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
     
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  </body>
</html>
