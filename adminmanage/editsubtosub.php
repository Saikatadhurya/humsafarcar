<?php

	error_reporting(0);

	include("include/header.php");

	include("include/config.php");

	if(isset($_POST['submit']))

	{

		$cat = @mysqli_real_escape_string($con,$_REQUEST['category']);

		$sub = @mysqli_real_escape_string($con,$_REQUEST['subcat']);		

		$sub_to_sub = @mysqli_real_escape_string($con,$_REQUEST['sub_to_sub']);

		if(mysqli_query($con,"Update sub_to_sub set cat_id='$cat', subcat_name='$sub', sub_to_sub='$sub_to_sub' where  subcat_id=".$_REQUEST['p_id']))

		{	?><script type="text/javascript">

			alert("Product Updated Successfully");
			window.location='sub-to-sub-category.php';

			</script><?php

		}

		else

		{	?><script type="text/javascript">

			alert("Error! Product Not Updated");

			</script><?php echo mysqli_error();

		}

	}	

$dt = @mysqli_fetch_array(mysqli_query($con,"select * from sub_to_sub where  subcat_id=".$_REQUEST['p_id']));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>cosmetics</title>

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
                      <section class="panel">
                          <header class="panel-heading">
                          <form action="" method="post" enctype="multipart/form-data"> 
                            <center><font color="red"><b><?php echo $name; ?> </b></font></center>
                          </header>
                          <header class="panel-heading">
                        
                          <select name="category" class="form-control">

	  <option>---------------Select---------------</option>

	  <?php

	  $res = mysqli_query($con,"select * from categories");

	  while($row = mysqli_fetch_array($res))

	  {

			echo "<option value='${row['category_id']}' ". (($dt['cat_id'] == $row['category_id']) ? "selected='selected'":"").">${row['category_name']}</option>";

	  }

	  ?>

      </select>
                          <br>
       <select name="subcat" class="form-control">

	  <option>---------------Select---------------</option>

	  <?php

	  $res1 = mysqli_query($con,"select * from subcategory");

	  while($row1 = mysqli_fetch_array($res1))

	  {

	  	echo "<option value='${row1['subcat_id']}' ". (($dt['subcat_name'] == $row1['subcat_id']) ? "selected='selected'":"").">${row1['subcat_name']}</option>";	  

	  }

	  ?>

      </select>
                          <br>
                          
                          <input type="text" placeholder=""  class="form-control" name="sub_to_sub" value="<?php echo $dt['sub_to_sub'];?>">
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
 <script type="text/javascript">
			CKEDITOR.replace( 'content',
                {
                    filebrowserBrowseUrl :'=../js/ckeditor/filemanager/browser/default/browser.html?Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '../js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'../js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'../js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '../js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '../js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});
			</script>
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
