<?php 
	error_reporting(0);
	include("include/admin-main.php"); 
    include("include/header.php");
	$obj=new admin();
    $reg_details=$obj->select_objData("regis","order by id DESC");
    

	
   /* this code is used for inactive */
if($_REQUEST['action']=='Inactive'){
    if(mysqli_query($con,"update regis set status='Inactive' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Registration deactive  successfully");
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
    if(mysqli_query($con,"update regis set status='Active' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Registration active successfully");
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
        <title><?php include("include/title.php")?> Registration Details</title>
        
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
            <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading"> 
                    <b> Registration Details</b>
                    </header>
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>Seq. No</th>
                        <th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=1;
					  while($row = mysqli_fetch_array($reg_details)){
                     @extract($row); 
                      ?>
                      <tr>
                        <td class="hidden-phone"><?php echo $a; ?></td>
                        <td><?php echo $name;?>( <b><?php echo $reg_id;?></b> )</td>
						<td><?php echo $email;?></td>
						<td><?php echo $phone;?></td>
						<td style="font-size:13px"><i><?php echo $address;?> ,
<?php echo $state;?> ,
<?php echo $city;?> - <?php echo $pin;?></i></td>
                        <td> <a href="order details.php?sid=<?php echo $reg_id?>" title="order details">
						  <button class="btn btn-danger btn-xs" style="padding: 1px 6px;"><i class="icon-user"></i></button>
						  </a>
						  <?php if($status=='Active'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Inactive&id=<?php echo $id; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return changeSts()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else{?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Active&id=<?php echo $id?>" title="Inactive">
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
		