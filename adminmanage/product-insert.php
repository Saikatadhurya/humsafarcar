<?php ob_start();?>
<?php
include("include/header.php");
include("include/config.php");
?>
<?php
  if(isset($_GET['id']))
    {
      $id=$_GET['id']; 
     }
/*-------------------------data insert and update code start here---------------------*/
//if(isset($_POST['submit']))
{
// $site_url= $_POST['site_url'];
   // if(isset($_POST['category'])&& isset($_POST['subcategory']) && isset($_POST['subcategory2']) && isset($_POST['pprice'])&&isset($_POST['tdiscount']))
   // {
  
	// $cat_id=$_POST['category'];
	  // if($cat_id==1){
	// $subcat_id=$_POST['subcategory'];
       // }
	   // else
	   // {
	// $subcat_id=$_POST['subcategory2'];
	   // }
	
	   }
	  
   // $pp=$_POST['pprice'];
   // $td=$_POST['tdiscount'];
  // $dp=$pp-($pp*($td/100));
   // $dp=$_POST['dprice'];  
  
  // if($subcat_id==5)
   // {
    // $subsubcat_id=$_POST['subsubcategory'];
   // }
   // else if($subcat_id==12)
   // {
    // $subsubcat_id=$_POST['subsubcategory2'];
   // }
   // else
   // {
   // $subsubcat_id='';
   // }
   
	   
/*-----------------------Multiple image uploading code start here----------------*/

/*   $name=array();
if(@count($_FILES['product_image']['tmp_name'])) {
$i=0;
foreach ($_FILES['product_image']['tmp_name'] as $index=>$tmp_name) 
{
 $tmpName = $_FILES[ 'product_image' ][ 'name' ][ $index ];
$tmpDest = $_FILES[ 'product_image' ][ 'tmp_name' ][ $index ];	
$i++;

	$ext = explode(".",$tmpName);
	$size = sizeof($ext);
	$r = md5($ext[0]);
 $filename = $r.".".$ext[$size-1];
	 if( !empty( $tmpDest ) && is_uploaded_file( $tmpDest ) )
        {
		  $path = "../uploads/";
	$imgup=move_uploaded_file($tmpDest, $path.$filename);	
	}
	
	if($imgup)
		{
		array_push($name,$filename);
		}
		}
		$img_upsd=json_encode($name);
		
		}
	
/*----------------------------Multiple image uploading code end here----------------*/

/*---------------------------chart image code start here----------------*/
/*
   $namesi=array();
if(@count($_FILES['size_chart']['tmp_name'])) {
$i=0;
foreach ($_FILES['size_chart']['tmp_name'] as $index=>$tmp_name) 
{
 $tmpName = $_FILES[ 'size_chart' ][ 'name' ][ $index ];
$tmpDest = $_FILES[ 'size_chart' ][ 'tmp_name' ][ $index ];	
$i++;

	$ext = explode(".",$tmpName);
	$size = sizeof($ext);
	$r = md5($ext[0]);
    $filename2 = $r.".".$ext[$size-1];
	 if( !empty( $tmpDest ) && is_uploaded_file( $tmpDest ) )
        {
		  $pathsize = "../uploads/";
	$imgupsi=move_uploaded_file($tmpDest, $pathsize.$filename2);	
	}
	
	if($imgupsi)
		{
		array_push($namesi,$filename2);
		}
		}
		$img_ups=json_encode($namesi);
		
		}

*/
  /*   -----------------chart image code end here----------------*/
 
        // $sql1="INSERT INTO products(product_title,product_title2,product_title3,pro_image,price,discount_price,total_discount,quantity,site_url,subcat_id,cat_id,subsubcat_id)VALUES('".$_POST['title']."','".$_POST['title2']."','".$_POST['title3']."','$img_upsd','$pp','$dp','$td','".$_POST['quantity']."','$site_url','$subcat_id','$cat_id','$subsubcat_id')";
        // $res=mysqli_query($con,$sql1)or mysqli_error();  
   // header("location:products.php");
   //}
   /*-------------------------data insertion	code end here---------------------*/
   
 ?>




<!------------------------------code start here for deleting product images one by one-------->

<?php
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
	$updt=mysqli_query($con,"update   product set img='$new_arr_data' where id='$id'");
	unlink("product/".$delete);
    if($updt)
	{
	echo "product_image deleted Successfully";
	//header("location:productedit.php?id=".$id1."");
	}
	}
	?>

<!------------------------------code end here for deleting product images one by one-------->

<?php include('footer.php'); ?>
<?php
ob_flush();
?>