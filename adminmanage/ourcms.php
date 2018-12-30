<?php
	include("include/header.php");
	include("include/config.php");
	
 $sql    = "SELECT * FROM content";
 $result = mysqli_query($con,$sql);  
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
                            <font color="red"> <center><b>All Page Details</center></font></b>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>Serial No</th>
                                  <th >Page Id</th>
                                  <th>Page Name</th>
                                  
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php 
							   $i=1;
                       while($row = mysqli_fetch_array($result)){
                        extract($row); 
                           ?>
                              <tr>
                                  <td><a href="#"><?php echo $i; ?></a></td>
                                  <td class="hidden-phone"><?php echo $id; ?></td>
                                  <td><?php echo $page; ?></td>
                                 
                                  <td>
                                     <a href="view_page.php?id=<?php echo $id; ?>"> <button class="btn btn-success btn-xs"><i class="icon-ok"></i></button></a>
                                     <a href="edit_page.php?id=<?php echo $id; ?>"> <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                      <!--<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>-->
                                  </td>
                              </tr>
                            <?php  $i++;}  ?>
                            
                           
                           
                              </tbody>
                          </table>
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
