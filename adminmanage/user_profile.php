<?php 
session_start();
//$uid=$_SESSION['user'];
	error_reporting(0);
	include("include/admin-main.php"); 
    include("include/header.php");
	$obj=new admin();
	$uid=$_REQUEST['uid'];
	 $menu_details1=$obj->select_objData("user_profile","where id=$uid");
	
    $menu_details2=$obj->select_objData("user_profile","where id=$uid");

   // $menu_details3=$obj->select_objData("user_videos","where userID='$uid");

   
	$spp=mysqli_query($con,"select * from user_videos where id=$uid");
	
	
	
	



     if(isset($_POST['CreateMenu']))
	{
		$insert_menu=$obj->insert_menu("menu");
		
		
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
	if(mysqli_query($con,"delete from menu where menu_id=".$_REQUEST['id']))
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
    if(mysqli_query($con,"update menu set status='Inactive' where menu_id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Menu deactive successfully");
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
    if(mysqli_query($con,"update menu set status='Active' where menu_id=".$_REQUEST['id'])){
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

//seller menu status
/* this code is used for inactive */
if($_REQUEST['action']=='MenuInactive'){
    if(mysqli_query($con,"update menu set sell_status='Inactive' where menu_id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Seller Menu deactive successfully");
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
if($_REQUEST['action']=='MenuActive'){
    if(mysqli_query($con,"update menu set sell_status='Active' where menu_id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Seller Menu active successfully");
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
                    var msg = confirm('Do you want to delete this record');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
					
				function changeSts(){
                    var msg = confirm('Do you want to change status');
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
            <div class="col-lg-12" >
			<div class="row panel">
			<table style="padding:5px; width:80%;">
			<tr>
			<th>Name </th>
			<th>Email </th>
			<th>Mobile </th>
			<th>Country </th>
			</tr>
			<?php 
			while($row1=mysqli_fetch_array($menu_details1)){?>
			
			<tr>
			<td><?php echo $row1['fname'];?> &nbsp; <?php echo $row1['lname'];?></td>
			<td><?php echo $row1['email'];?></td>
			<td><?php echo $row1['mobile'];?> </td>
			<td><?php echo $row1['country'];?></td>
			</tr>
			<?php }?>
			</table>
			</div></div> 
			
		  
             <div class="col-lg-12" >
			<div class="row panel">
			
			
			
				
				<h4>Photos</h4>
				<?php 
			$sw="select * from user_profile where id=$uid";
			$qw=mysqli_query($con,$sw) or die(mysqli_error());
			$rew=mysqli_fetch_array($qw);
			$img=json_decode($rew['pics']);
			  
			?>
				
					<input type="hidden" name="id" value="<?php echo $uid; ?>">
					<?php foreach($img as $v){?><div class="col-md-2">
<div class="user_thumb" style="background:url('../admin/uploads/abc.jpg');">
<img src="../admin/uploads/<?php echo $v;?>" width="100%">		</div>
				
				
				</div>
				<?php }?><!-- end of column-->
	</div>
		
		</div>
            <!-- page end--> 
			
			
			
			
        

   
				
   
         
            <!-- page start-->
            
             <div class="col-lg-12" >
			<div class="row panel">
			
			
				<?php 
				$row3=mysqli_fetch_array($spp);
				$count=mysqli_num_rows($row3); ?>
				
			
					<h4>Videos</h4>
				
		
		
				
					
  <div class="col-md-3">
		
		   <?php if($row3['video2']==''){ ?>		
  <img src="../admin/uploads/abc.jpg" width="100%"><?php }else {?>
   
  <iframe width="100%"  src="<?php
    echo $row3['video2']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	<?php }?>
 
					
				
				</div><!-- end of column-->
<div class="col-md-3">
		
		   <?php if($row3['video2']==''){ ?>		
  <img src="../admin/uploads/abc.jpg" width="100%"><?php }else {?>
   
  <iframe width="100%"  src="<?php
    echo $row3['video2']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	<?php }?>
 
					
				
				</div><!-- end of column-->
<div class="col-md-3">
		
			
					
   <?php if($row3['video3']==''){ ?>
			
    
  <img src="../admin/uploads/abc.jpg" width="100%"><?php }else {?>
   
  <iframe width="100%"  src="<?php
    echo $row3['video3']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	<?php }?>
  
					
				
				</div><!-- end of column-->

		<div class="col-md-3">
		
			
					
   <?php if($row3['video3']==''){ ?>
			
    
  <img src="../admin/uploads/abc.jpg" width="100%"><?php }else {?>
   
  <iframe width="100%"  src="<?php
    echo $row3['video4']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	<?php }?>
  
					
				
				</div><!-- end of column-->
			
			
		</div>
		
		</div>
            <!-- page end--> 
			
			
			
			
          </section>
        </section>
        <!--main content end--></section>
        
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
		