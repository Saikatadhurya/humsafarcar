<?php

	error_reporting(0);
	include("include/header.php");

	include("include/config.php");
 
	if(isset($_POST['submit']))

	{
                $name = @mysqli_real_escape_string($con,$_REQUEST['name']);
				$brand = @mysqli_real_escape_string($con,$_REQUEST['brand']);
				$file_name1 = $_FILES['image1']['name'];

				$random_digit1 = rand(0000,9999);

				$new_file_name1 = $random_digit1.$file_name1;

				$path1 = "../banner/".$new_file_name1;

				copy($_FILES['image1']['tmp_name'], $path1);		

 if(mysqli_query($con,"insert into banner values('','$new_file_name1','$name','$brand')"))

		{	?><script type="text/javascript">

			alert("Data Inserted Successfully");

			</script><?php

		}

		else

		{	?><script type="text/javascript">

			alert("Error! Data Not Inserted");

			</script><?php echo mysqli_error();

		}

	}
	/* this code is used for delete */
if($_REQUEST['action']=="delete")
{    $res=mysqli_query($con,"SELECT img FROM banner WHERE id=".$_REQUEST['id']);
     $row=mysqli_fetch_array($res);
	if(mysqli_query($con,"delete from banner where id=".$_REQUEST['id']))
	  {	
	unlink("../banner/".$row['img']);
	?><script type="text/javascript">
		
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script><?php
	}
	else
	{	?><script type="text/javascript">
		alert("Error! Data Not Deleted");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script><?php
	}
}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Banner</title>

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
<script type="text/javascript">
            function validate1(){

                var dept_name=document.getElementById('dept_name');
                
                if(dept_name != ""){
                    var msg = confirm('Are Your want to delete this record');
                    if(msg == true){
                        return true;
                    }else {
                        return false;
                    }
                }

            }
</script>
<!----------- Ajax ------------>




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
                            <font color="red"> <center><b>Banner</font></b>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                 
                                 
                               
                                  <th>Image</th>
                                 <th>Name</th>
								   <th>Brand</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php 
							 
	$sql22    = "SELECT * FROM banner";
   $result22 = mysqli_query($con,$sql22);  						   
   while($row22 = mysqli_fetch_array($result22)){
   extract($row22); 
   ?>
                              <tr>
                                  
                                 
                              
                                  <td><img src="../banner/<?php echo $img; ?>" height="50px" width="150px"></td>
                                   <td class="hidden-phone"><?php echo $name; ?></td>
								    <td class="hidden-phone"><?php echo $brand; ?></td>
                                
                                  <td>
                     <a href="editbanner.php?id=<?php echo $id;?>">  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>                  
                       <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $id; ?>"> <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button></a>
                                    
                                  </td>
                              </tr>
                            <?php  }  ?>
                              </tbody>
                          </table>
                      </section>
                  </div>
                  <!----popup ---->
                 
                   <div class="inbox-body">
                          <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                              Add Banner
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Add Banner</h4>
                                      </div>
                                      <div class="modal-body">
                                       <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Name</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control"  placeholder="Name" name="name" required>
                                                  </div>
                                              </div>
											  <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Brand</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control"  placeholder="Brand" name="brand" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                      
                                                        <input type="file" name="image1" required>
                                                      </span>
                                                      <input type="submit" name="submit" value="Submit" class="btn btn-send">
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                  
                  
                  
                  <!----end popup  ----->
                  
                  
                  
                  
                  
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
