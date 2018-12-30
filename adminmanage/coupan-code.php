<?php 
	error_reporting(0);
	include("include/admin-main.php"); 
    include("include/header.php");
	$obj=new admin();
    $coup_details=$obj->select_objData("coupon_tbl","order by id DESC");
     if(isset($_POST['CreateCoupon']))
	{
		$insert_menu=$obj->insert_coupon("coupon_tbl");
		
		
		if($insert_menu=="ok")
		{			
		?>
<script type="text/javascript">
		alert("Data Inserted Successfully");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script>
<?php		
	}
	else
	{	?>
<script type="text/javascript">
		alert("Error! Data Not Inserted");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script><?php echo mysqli_error();
	}
	}

	/* this code is used for delete */
if($_REQUEST['action']=="delete")
{
	if(mysqli_query($con,"delete from coupon_tbl where id=".$_REQUEST['id']))
	{	?><script type="text/javascript">
		alert("Data Deleted Successfully");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script>
		<?php
	}
	else
	{	?>
		<script type="text/javascript">
		alert("Error! Data Not Deleted");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script>
		<?php
	}
}
?>
		<!DOCTYPE html>
		<html lang="en">
        <head>
        <link rel="shortcut icon" href="img/favicon.png">
        <title><?php include("include/title.php")?> Menu Create</title>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <script src="css1/js/jquery.min.js" type="text/javascript"></script>
        <script src="css1/js/ddsmoothmenu.js" type="text/javascript"></script>
        <script type="text/javascript" src="css1/js/menu.js"></script>
        <script src="css1/js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="css1/js/ckeditor/ckeditor.js"></script>
        <link href="../css/pro_dropdown_2.css" rel="stylesheet" type="text/css">
        </head>
        <script type="text/javascript">
               function del(){
                    var msg = confirm('Are Your want to delete this record');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
					
				function changeSts(){
                    var msg = confirm('Are Your want to change status');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
                
</script>
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
            <div class="inbox-body"> <a class="btn btn-compose" data-toggle="modal" href="#myModal3"> Create Coupon </a> 
                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Create Coupon</h4>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
						  <div class="form-group">
                            <label  class="col-lg-4 control-label">Select Coupon Percentage</label>
                            <div class="col-lg-8">
                      <select name="coupon_per"  class="form-control" required>
                      <option value=" " selected="selected">Select Coupon Percentage</option>
					              <option value="10">10%</option>
				  				  <option value="11">11%</option>
				  				  <option value="12">12%</option>
				  				  <option value="13">13%</option>
				  				  <option value="14">14%</option>
				  				  <option value="15">15%</option>
				  				  <option value="16">16%</option>
				  				  <option value="17">17%</option>
				  				  <option value="18">18%</option>
				  				  <option value="19">19%</option>
				  				  <option value="20">20%</option>
				  				  <option value="21">21%</option>
				  				  <option value="22">22%</option>
				  				  <option value="23">23%</option>
				  				  <option value="24">24%</option>
				  				  <option value="25">25%</option>
                      </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-lg-4 control-label">Coupon Name</label>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Enter Coupon Name" name="coupon_name" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="submit" name="CreateCoupon" value="Submit" class="btn btn-send">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
                <!-- /.modal --> 
              </div>
            <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading"> 
                    <b>  Coupon Details</b>
                    </header>
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>Seq. No</th>
						<th>Coupon Percentage</th>
                        <th>Coupon Name</th>
                        <th>Action</th>
						<!--<th>S. Status</th>-->
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=1;
					  while($row = mysqli_fetch_array($coup_details)){
                     @extract($row); 
                      ?>
                      <tr>
                        <td class="hidden-phone"><?php echo $a; ?></td>
                        <td><?php echo $coupon_per;?></td>
						<td><?php echo $coupon_name;?></td>
                        <td><a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $id; ?>" title="delete">
                          <button class="btn btn-danger btn-xs" onclick='return del()'><i class="icon-trash "></i></button>
                          </a>
						  </td>
                      </tr>
                      <?php  $a++; } ?>
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
		