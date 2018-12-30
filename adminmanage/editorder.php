<?php
include("include/header.php");
include("include/config.php");
 
$id = $_REQUEST['id'];
$sql="SELECT * FROM cart WHERE id = '".$id."' ";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);
extract($row);
function upload($source, $dest)
{
  //move_uploaded_file
  if(@copy($source,$dest)== false){
    return (':( Sorry...');
  } else {
    return  ':) success';
  }

}



  

if(isset($_POST['submit'])){
	
	
         $id      = $_REQUEST['id'];
         $content = $_POST['subcat'];
		
		
       $update = mysqli_query($con,"UPDATE cart SET status = '".$content."' WHERE id = '".$id."' "); 
     if($update){?>
     <script>
	 window.location='order.php';
	 </script>
     <?php            
         		
				
		 }
  }
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

<link href="../css/pro_dropdown_2.css" rel="stylesheet" type="text/css">
    
    
  </head>

  <body>
<?php include 'popup.php';?>
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
                          <form action="" method="post" enctype="multipart/form-data"> 
                             <center><font color="red"><b>Edit Order</b></font></center>
                          </header>
                          <header class="panel-heading">
                         <select name="subcat" class="form-control">
						 <option value="Complate">Complate </option>
						 </select>
						 </select>
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
