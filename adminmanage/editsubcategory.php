<?php
	error_reporting(0);
	include("include/header.php");
	include("include/config.php");
	 
	if(isset($_POST['submit']))
	{
		$subcat = @mysqli_real_escape_string($con,$_REQUEST['sub_category']);
		$cat = @mysqli_real_escape_string($con,$_REQUEST['category']);
		
		if(mysqli_query($con,"update subcategory set cat_id='$cat', subcat_name='$subcat' where subcat_id=".$_REQUEST['sub_id']))
		{
			?><script type="text/javascript">
			alert("Data Inserted Successfully");
			window.location='subcategory.php';
			</script><?php
		}
		else
		{	?><script type="text/javascript">
			alert("Error! Data Not Inserted");
			window.location='subcategory.php';
			</script><?php echo mysqli_error();
		}
	}
$data = mysqli_fetch_array(mysqli_query($con,"select * from subcategory where subcat_id=".$_REQUEST['sub_id']));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Bachat Bazaar Edit Sub Category</title>

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
                    <form method="post" enctype="multipart/form-data" name="add_cat">
                      <section class="panel">
                          <header class="panel-heading">
                         
                          
                          <b>  Update Subcategory </b>
                          </header>
                           <header class="panel-heading">
                         
                          <br>
                         <select name="category" class="form-control">
	  <?php
	  $cid = mysqli_query($con,"select cat_id from subcategory where subcat_id='$_REQUEST[sub_id]'");
	  $idCat=mysqli_fetch_array($cid);
	  $r=$idCat[0];
	  $res = mysqli_query($con,"select * from categories where cat_id='$r'");
	  while($row = mysqli_fetch_array($res))
	  {
	echo "<option value='${row['cat_id']}' ". (($data['cat_id'] == $row['category_id']) ? "selected='selected'":"").">${row['category_name']}</option>";
	  }
	  ?>
	  
	  
	  <?php /*
	  $res = mysqli_query($con,"select * from categories");
	  while($row = mysqli_fetch_array($res))
	  { */
	  ?>
	  <!--<option value="<?php //echo $row['category_id'];?>"><?php //echo $row['category_name'];?></option>-->
	  <?php
	  //}
	  ?>
      </select>
                         <br />
        
      <input type="text" name="sub_category" value="<?php echo $data['subcat_name'];?>" class="form-control"/>
      <br>
                           <center><input type="submit" class="btn btn-shadow btn-danger" value="Update" name="submit"></center>
                           
                          </header>
                          
                      </section>
                      </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
     

 
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
