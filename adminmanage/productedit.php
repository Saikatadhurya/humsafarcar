<?php
//error_reporting(0);
include("include/header.php");
include('include/admin-main.php');
$select_obj= new admin();
$result=$select_obj->select_myproduct("product");
	//select menu name
$menu_details=$select_obj->select_myobjData("menu");

	
	if(isset($_POST['UpdateData']))

	{   
	
	    $menu_id = @mysqli_real_escape_string($con,$_REQUEST['menu_id']);
		$cat_id = @mysqli_real_escape_string($con,$_REQUEST['cat_id']);	
		$subcat_id = @mysqli_real_escape_string($con,$_REQUEST['subcat_id']);		
		$pro_name = @mysqli_real_escape_string($con,$_REQUEST['name']);
		$price = @mysqli_real_escape_string($con,$_REQUEST['price']);	
		$oldprice = @mysqli_real_escape_string($con,$_REQUEST['oldprice']);	
	    $brand = @mysqli_real_escape_string($con,$_REQUEST['brand']);
		$Pro_code = @mysqli_real_escape_string($con,$_REQUEST['Pro_code']);
		$pro_type = @mysqli_real_escape_string($con,$_REQUEST['pro_type']);
		$pro_size = @mysqli_real_escape_string($con,$_REQUEST['pro_size']);
		$available_Color = @mysqli_real_escape_string($con,$_REQUEST['available_Color']);
		$stock = @mysqli_real_escape_string($con,$_REQUEST['stock']);
		
		$desc = @mysqli_real_escape_string($con,$_REQUEST['desc']);
        $id=$_REQUEST['id'];
		/*--------------this code for uploading image one by one at the time of edit--------*/
        $type = @mysqli_real_escape_string($con,$_REQUEST['type']);
		$filename_arr=array();
		$edit_imgup=null;
	if(is_uploaded_file($_FILES['edit_image']['tmp_name']))
			{
			$ext=explode(".",$_FILES['edit_image']['name']);
			$size=sizeof($ext);
			$r = md5(uniqid(mt_rand(),true));
			$img2 = $r.".".$ext[$size-1];
			
			$edit_imgup=move_uploaded_file($_FILES['edit_image']['tmp_name'], "product/".$img2);
			$filenamea = $img2;
           array_push($filename_arr,$filenamea);			
			}
			$result=mysqli_query($con,"select img from  product where id='$id'") or die(mysqli_error());
			$img=mysqli_fetch_array($result);
			$img_arr=$img['img'];
			$img_result=json_decode($img_arr);
			//array_push($newarr,$img_result);
			if($img_result=="")
			{
			$new5=array_values($filename_arr);
			}
			else
			{
		$new4=array_merge($filename_arr,$img_result);
		$new5=array_values($new4);
		//print_r($new5);
		echo "<br>";
		}
		$property_image_name=json_encode($new5);
		//print_r($property_image_name);


/*--------------this code for uploading image one by one at the time of edit--------*/

   @$sql3="Update product set menu_id='$menu_id',cat_id='$cat_id',subcat_id='$subcat_id',name='$pro_name',price='$price',brand='$brand',Pro_code='$Pro_code',pro_type='$pro_type',pro_size='$pro_size',available_Color='$available_Color',stock='$stock',description='$desc',img='$property_image_name',oldprice='$oldprice' where  id=".$_REQUEST['id'];
		
		  $res=mysqli_query($con,$sql3)or mysqli_error();
		  ?>
<script type="text/javascript">
		window.location="product details.php";
		</script>
<?php
	
	}
	// delete from the table
	$id1 = $_REQUEST['id'];
	if(isset($_GET['delete']))
	{
	$id=$_GET['id'];
	$delete=$_GET['delete'];
	$result=mysqli_query($con,"select img from  product where id='$id'");
	$img=mysqli_fetch_array($result);
	$img_arr=$img['img'];
	$propertyx_image=json_decode($img_arr);
	$new2=array_diff($propertyx_image,array($delete));
	$new3=array_values($new2);
	$new_arr_data=json_encode($new3);
	$updt=mysqli_query($con,"update  product set img='$new_arr_data' where id='$id'");
	unlink("product/".$delete);
    if($updt)
	{
	echo "<script>alert('product_image deleted Successfully')</script>";
	echo "<script>window.location='$_SERVER[HTTP_REFERER]'</script>";
	}
	}	

$dt = @mysqli_fetch_array(mysqli_query($con,"select * from product where  id=".$_REQUEST['id']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/favicon.png">
<title><?php include("include/title.php")?> Update Product Details</title>
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
<script type="text/javascript">

function showUser123(str)

{

if (str=="")

  {

  document.getElementById("txtHint").innerHTML="";

  return;

  }

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","getuser.php?q="+str,true);

xmlhttp.send();

}

</script>
<script type="text/javascript">

function showUser1234(str)

{
if (str=="")

  {

  document.getElementById("txtHint1").innerHTML="";

  return;

  }

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","getuser2.php?q="+str,true);

xmlhttp.send();

}

</script>
</head>
<body>
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
												<center>
														<b>Update Product Details</b>
												</center>
										</header>
										<form action="" method="post" enctype="multipart/form-data">
												<header class="panel-heading">
														<?php if($dt['img'])
{ 
$dcd_img=json_decode($dt['img']);
  //$img = '../uploads/'.$dcd_img[0];
//echo '<img src="'.$img.'" style="max-height:60px; max-width: 100px;">';
}
?>
														<?php
if(@$dcd_img=="")
{}
else
{
foreach($dcd_img as $v)
{
?>
		<img src='product/<?php echo $v;?>' height="40" width="50"> <a href="productedit.php?id=<?php echo $dt['id'];?>&action=edit&delete=<?php echo $v;?>">Delete</a>
														<?php
}
}
?>
														<input type="file" name="edit_image" class="form-control">
														<br>
														Category Name
														<select name="menu_id" class="form-control" onChange="showUser123(this.value)">
																<?php $sel_menu=mysqli_fetch_array(mysqli_query($con,"select menu from menu where menu_id='$dt[menu_id]'"))?>
																<option value="<?php echo $dt['menu_id']?>" selected="selected"><?php echo $sel_menu['menu']?></option>
																<?php


	  while($row = mysqli_fetch_array($menu_details))

	  {

	  ?>
																<option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu'];?></option>
																<?php

	  }

	  ?>
														</select>
														<br>
														Sub Category
														<select name="cat_id" id="txtHint" class="form-control" onChange="showUser1234(this.value)">
																<?php $sel_cat=mysqli_fetch_array(mysqli_query($con,"select category_name from categories where cat_id='$dt[cat_id]'"))?>
																<option value="<?php echo $dt['cat_id'];?>" selected="selected"><?php echo $sel_cat['category_name'];?></option>
														</select>
														<br>
														SubToSub Category
														<select name="subcat_id" id="txtHint1" class="form-control">
																<?php $sel_subcat=mysqli_fetch_array(mysqli_query($con,"select subcat_name from subcategory where subcat_id='$dt[subcat_id]'"))?>
																<option value="<?php echo $dt['subcat_id'];?>" selected="selected"><?php echo $sel_subcat['subcat_name'];?></option>
														</select>
														<br>
														Name
														<input type="text" placeholder="Name"  class="form-control" name="name" value="<?php echo $dt['name'];?>">
														<br>
														Price
														<input type="text" name="price" placeholder="Price" size="33" value="<?php echo $dt['price'];?>" class="form-control">
														<br>
														Old Price
														<input type="text" name="oldprice" placeholder="Old Price" size="33" value="<?php echo $dt['oldprice'];?>" class="form-control">
														<br>
														Brand
														<input type="text" name="brand"  placeholder="Brand" size="33" value="<?php echo $dt['brand'];?>" class="form-control"><br>
														Product Code
														<input type="text" name="Pro_code"  placeholder="Product Code" size="33" value="<?php echo $dt['Pro_code'];?>" class="form-control"><br>
														Product Type
														<select name="pro_type" class="form-control">
                      <option value="<?php echo $dt['pro_type'];?>" selected="selected"><?php echo $dt['pro_type'];?></option>
                                            <option>Hot Deals</option>
                                            <option>Special Offer</option>
                                            <option>Special Deals</option>
											<option>Featured products</option>
											<option>Latest products</option>
                                          </select>
														<br>
														Product Size
														<input type="text" name="pro_size"  placeholder="Product Size( Hint:- 36,37,38,Stitch,Non stitch,Semi stitch )" size="33" value="<?php echo $dt['pro_size'];?>" class="form-control">
														<br>
														Available Color
														<input type="text" name="available_Color"  placeholder="Available Color( Hint:- red,black,blue )" size="33" value="<?php echo $dt['available_Color'];?>" class="form-control">
														<br>
														Stock
														<input type="text" name="stock"  placeholder="Stock" size="33" value="<?php echo $dt['stock'];?>" class="form-control">
														<br>
														Description
														<textarea name="desc" placeholder="Description" size="33" class="form-control"><?php echo $dt['description'];?></textarea>
														<br>
														<center>
																<input type="submit" class="btn btn-shadow btn-danger" value="Update" name="UpdateData">
														</center>
												</header>
										</form>
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
