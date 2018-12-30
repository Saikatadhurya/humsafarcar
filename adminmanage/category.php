<?php 
	error_reporting(0);
	include("include/admin-main.php"); 
	include("include/header.php");
	$obj=new admin();
    $category_details=$obj->select_objData("categories","order by cat_id DESC");
	$menu_details=$obj->select_objData("menu","order by menu_id DESC");
     if(isset($_POST['Create_cat']))
	{
		$insert_cat=$obj->insert_cat("categories");
		if($insert_cat=="ok")
		{			
		?>
<script type="text/javascript">
		alert("Data Inserted Successfully");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER']?>";
		</script>
<?php		
	}
	else
	{	?>
<script type="text/javascript">
		alert("Error! Data Not Inserted");
		</script><?php echo mysqli_error();
	}
	}

	/* this code is used for delete */
if($_REQUEST['action']=="delete")
{
	if(mysqli_query($con,"delete from categories where cat_id=".$_REQUEST['id']))
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
   /* this code is used for inactive */
if($_REQUEST['action']=='Inactive'){
    if(mysqli_query($con,"update categories set status='Inactive' where cat_id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Menu dective successfully");
	window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
	</script>
	<?php
	}
	else{
	?>
      	<script type="text/javascript">
		alert("Error! Data Not Deactive");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script>

	<?php 
	}
}
 /* this code is used for active */
if($_REQUEST['action']=='Active'){
    if(mysqli_query($con,"update categories set status='Active' where cat_id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Menu active successfully");
	window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
	</script>
	<?php
	}
	else{
	?>
      	<script type="text/javascript">
		alert("Error! Data Not Deactive");
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
        <title><?php include("include/title.php")?> Category Page</title>
        
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
            function validate1(){

               
                    var msg = confirm('Are Your want to delete this record');
                    if(msg == true){
                        return true;
                    }else {
                        return false;
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
            <div class="inbox-body"> <a class="btn btn-compose" data-toggle="modal" href="#myModal3">Create Category </a> 
                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Category</h4>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                          <div class="form-group">
                            <label  class="col-lg-4 control-label">Menu Name</label>
                            <div class="col-lg-8">
                              <select name="menu_id" class="form-control">

	  <option value=" ">Select Menu</option>
	  <?php while($data_menu=mysqli_fetch_array($menu_details)){?>
	  <option value="<?php echo $data_menu['menu_id'] ?>"><?php echo $data_menu['menu']?></option>
      <?php }?>
      </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-lg-4 control-label">Category Name</label>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" id="category" placeholder="Enter Category Name" name="category">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="submit" name="Create_cat" value="Submit" class="btn btn-send">
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
                    <b>Category Details</b>
                    </header>
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>Seq. No</th>
                        <th>Menu Name [ Category Name ] </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
	 $a=1;   while($row = mysqli_fetch_array($category_details)){
     extract($row); 
   ?>
                      <tr>
                        <td class="hidden-phone"><?php echo $a; ?></td>
                        <td><?php 
						$sel_menu_q=mysqli_query($con,"select menu from menu where menu_id='$menu_id'") or die(mysqli_error());
						$sel_menu_name=mysqli_fetch_array($sel_menu_q);
						echo $sel_menu_name['menu']." [ <font color='#669933'>".$category_name."</font> ]";?></td>
						
                        <td><a href="editcategory.php?id=<?php echo $cat_id; ?>">
                          <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                          </a> <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $cat_id; ?>">
                          <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button>
                          </a>
						  <?php if($status=='Active'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Inactive&id=<?php echo $cat_id; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return changeSts()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else{?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Active&id=<?php echo $cat_id?>" title="Inactive">
						  <button class="btn btn-danger btn-xs" onclick='return changeSts()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?>
						  </td>
                      </tr>
                      <?php  $a++; } ?>
                      
                      
                    </tbody>
                  </table>
                </section>
              </div>
              
              <!----popup ---->
              
              
              
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
		