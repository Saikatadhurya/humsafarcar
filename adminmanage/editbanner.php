<?php
	error_reporting(0);
	include("include/header.php");
	include("include/config.php");

		$sql="SELECT * FROM banner WHERE  id=".$_REQUEST['id'];
$result33=mysqli_query($con,$sql);
$row33 = mysqli_fetch_array($result33);

	if(isset($_POST['submit']))
	{
		$name = @mysqli_real_escape_string($con,$_REQUEST['name']);
		$brand = @mysqli_real_escape_string($con,$_REQUEST['brand']);
		
	      if($_FILES['file10']['name']=="") { 
				
				 $img10 = $_POST['file10'];
					 }
					 else{
				 
				 $img10   = $_FILES['file10']['name'];

	             $fullpath10 = "../banner/";
				 $destination10 = $fullpath10.$img10;
 
       	move_uploaded_file($_FILES['file10']['tmp_name'],$destination10);
					 }
		if(mysqli_query($con,"update banner set img ='$img10',name ='$name',brand ='$brand' where  id=".$_REQUEST['id']))
		{  
			?><script type="text/javascript">
			
			window.location='banner.php';
			</script><?php
		}
		else
		{	?><script type="text/javascript">
			alert("Error! Data Not Inserted");
			window.location='banner.php';
			</script><?php echo mysqli_error();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>COSTMATIC
</title>

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
    <!---editor -->
    
<script src="css1/js/jquery.min.js" type="text/javascript"></script>
<script src="css1/js/ddsmoothmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/menu.js"></script>

<script src="css1/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/ckeditor/ckeditor.js"></script>
<link href="../css/pro_dropdown_2.css" rel="stylesheet" type="text/css">
    
    
  </head>

  <body>
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
                           <form method="post" enctype="multipart/form-data" name="add_cat">
                          
                            <center><font color="red"><b> </b></font></center>
                          </header>
                           <header class="panel-heading">
                            <img src="../banner/<?php echo $row33['img']; ?>" alt="" height="50" width="50">
                          <input type="hidden" name="file10" value="<?php echo $row33['img'];?>" style="border-radius:5px;">
                          <input type="file" name="file10" class="form-control">
                            <br>
                        
	   Name        
        <input type="text" name="name" size="33" value="<?php echo $row33['name'];?>" class="form-control">
		<br>
                        
	   Brand        
        <input type="text" name="brand" size="33" value="<?php echo $row33['brand'];?>" class="form-control">
       <br>
                           <center><input type="submit" class="btn btn-shadow btn-danger" value="Update" name="submit"></center>
                           
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
