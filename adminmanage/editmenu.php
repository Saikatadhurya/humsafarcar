<?php
include("include/admin-main.php"); 
include("include/header.php");
$obj=new admin();
$menu_details_ById=$obj->select_objData_byId("menu",$_REQUEST['id']);
@extract($menu_details_ById);
if(isset($_POST['Update_menu'])){
$update_menu=$obj->update_objData("menu",$_REQUEST['id']);	

     if($update_menu){?>
     <script>
	 window.alert('Menu updated successfully!');
	 window.location='menu create.php';
	 </script>
     <?php            
         		
				
		 }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Bachat Bazaar Edit Menu</title>

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
                   <form action="" method="post" enctype="multipart/form-data"> 
                      <section class="panel">
                          <header class="panel-heading">
                         
                            <b>Update Menu </b>
                          </header>
                          <header class="panel-heading">
                          
                          <br>
                          <input type="text" name="menu" class="form-control" value="<?php echo $menu; ?>">
                         <br />
                           <center><input type="submit" class="btn btn-shadow btn-danger" value="Update" name="Update_menu"></center>
                           
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
