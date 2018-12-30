<?php
include("include/config.php");
class admin{
//function query to select table data
function select_objData($table,$o){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","3inone") or die(mysqli_error());		
$select_query=mysqli_query($con,"SELECT * FROM ".$this->table_name." $o ") or die("Can't select data from ".$this->table_name." table due to ".mysqli_error());
return $select_query;
}
//function query to select table data
function select_myobjData($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
$select_query=mysqli_query($con,"SELECT * FROM ".$this->table_name) or die("Can't select data from ".$this->table_name." table due to ".mysqli_error());
return $select_query;
}
//function query to select table data
function select_MenuForData($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
$select_query=mysqli_query($con,"SELECT * FROM ".$this->table_name." where menu_id in(select menu_id from categories)") or die("Can't select data from ".$this->table_name." table due to ".mysqli_error());
return $select_query;
}
//function query to insert data into table
function insert_menu($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
$menu = @mysqli_real_escape_string($con,$_REQUEST['menu']);
$insert_query=mysqli_query($con,"insert into menu values('','$menu','Active')") or die("Can't insert data into ".$this->table_name." table due to ".mysqli_error());
if($insert_query)
return "ok";
else
return "fail";	
}

// function query to insert data into table
function insert_cat($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
$cat = @mysqli_real_escape_string($con,$_POST['category']);
$insert_query=mysqli_query($con,"insert into ".$this->table_name." values('','$_POST[menu_id]','$cat','Active')") or die("Can't insert data into ".$this->table_name." table due to ".mysqli_error());
if($insert_query)
return "ok";
else
return "fail";	
}

// function query to insert data into table
function insert_subcat($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$subcat_name = @mysqli_real_escape_string($con,$_POST['sub_category']);
$insert_query=mysqli_query($con,"insert into ".$this->table_name." values('','$_POST[cat_id]','$_POST[menu_id]','$subcat_name','Active')") or die("Can't insert data into ".$this->table_name." table due to ".mysqli_error());
if($insert_query)
return "ok";
else
return "fail";	
}

//function query to insert data into table
function insert_coupon($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
$coupon_name = @mysqli_real_escape_string($con,$_REQUEST['coupon_name']);
$insert_query=mysqli_query($con,"insert into ".$this->table_name." values('','$_REQUEST[coupon_per]','$coupon_name','')") or die("Can't insert data into ".$this->table_name." table due to ".mysqli_error());
if($insert_query)
return "ok";
else
return "fail";	
}
//function query to select table data by id
function select_objData_byId($table,$id){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());		
if($this->table_name=='menu')
$select_query=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE menu_id='$id'") or die("Can't select data from ".$this->table_name." table due to ".mysqli_error());
if($this->table_name=='categories')
$select_query=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE cat_id='$id'") or die("Can't select data from ".$this->table_name." table due to ".mysqli_error());
return mysqli_fetch_array($select_query);
}
//function query to update table
function update_objData($table,$id){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
if($this->table_name=="menu"){
$menu_name = @mysqli_real_escape_string($con,$_POST['menu']);
$update_query = mysqli_query($con,"UPDATE ".$this->table_name." SET menu = '".$menu_name."' WHERE menu_id = '".$id."'") or die("Can't update menu name of ".$this->table_name." table due to ".mysqli_error()); 	
}
if($this->table_name=="categories"){
$cat_name = @mysqli_real_escape_string($con,$_POST['catname']);
$update_query = mysqli_query($con,"UPDATE ".$this->table_name." SET category_name = '".$cat_name."' WHERE cat_id= '".$id."'") or die("Can't update menu name of ".$this->table_name." table due to ".mysqli_error()); 	
}
if($update_query)
return "ok";
else
return "fail";	
}

/******************************************************************************************************/
function insert_product($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
/*-----------------------Multiple image uploading code start here----------------*/

  $name=array();
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
		  $path = "product/";
	$imgup=move_uploaded_file($tmpDest, $path.$filename);	
	}
	
	if(@$imgup)
		{
		array_push($name,$filename);
		}
		}
		$img_upsd=json_encode($name);
		}
		$desc_tl=mysqli_real_escape_string($con,$_POST[description]);
		
$menu_id = @mysqli_real_escape_string($con,$_REQUEST['menu_id']);
$cat_id = @mysqli_real_escape_string($con,$_REQUEST['cat_id']);
$subcat_id = @mysqli_real_escape_string($con,$_REQUEST['subcat_id']);
		
$result=mysqli_query($con,"INSERT INTO ".$this->table_name."(menu_id,cat_id,subcat_id,name,price,brand,description,img,oldprice,Pro_code,pro_type,pro_size,available_Color,stock,D_shipping)value('$menu_id','$cat_id','$subcat_id','$_POST[name]','$_POST[price]','$_POST[brand]','$desc_tl','$img_upsd','$_POST[oldprice]','$_POST[Pro_code]','$_POST[pro_type]','$_POST[pro_size]','$_POST[available_Color]','$_POST[stock]','$_POST[D_shipping]')") or die(mysqli_error());
				  
				   if($result)
				   return $msg="pass";
				   else
				   return $msg="fail";

}

function insert_ADV($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$menu_id = @mysqli_real_escape_string($con,$_REQUEST['menu_id']);
$cat_id = @mysqli_real_escape_string($con,$_REQUEST['cat_id']);
$subcat_id = @mysqli_real_escape_string($con,$_REQUEST['subcat_id']);		
$adv_link = @mysqli_real_escape_string($con,$_REQUEST['linkName']);
$img_upsd=rand().$_FILES['photo']['name'];
$insert_query=mysqli_query($con,"insert into ".$this->table_name." values('','$menu_id','$cat_id','$subcat_id','$img_upsd','$adv_link','$_POST[pos_ad]','Active')") or die("Can't insert data into ".$this->table_name." table due to ".mysqli_error());

if($table=='adv_tbl1')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad1/".$img_upsd);
if($table=='adv_tbl2')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad2/".$img_upsd);
if($table=='adv_tbl3')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad3/".$img_upsd);
if($table=='adv_tbl4')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad4/".$img_upsd);
if($table=='adv_tbl5')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad5/".$img_upsd);
if($table=='adv_tbl6')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad6/".$img_upsd);
if($table=='adv_tbl7')
move_uploaded_file($_FILES['photo']['tmp_name'],"product/forad7/".$img_upsd);

				   if($insert_query)
				   return "ok";
				   else
				   return "fail";

}
//code to select product detail
function select_seller_product($table,$sid,$o){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name." where reg_id='$sid' $o ") or die("select query fail".mysqli_error());
  return $qry;
 
}

//code to select product order 
function select_order_product($table,$sid,$o){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name." where reg_id='$sid' $o ") or die("select query fail".mysqli_error());
  return $qry;
 
}

//code to select product detail
function select_seller_details($table,$sid){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name." where reg_id='$sid' ") or die("select query fail".mysqli_error());
return mysqli_fetch_array($qry);
 
}
//code to select seller product
function select_myproduct($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name) or die("select query fail".mysqli_error());
  return $qry;
 
}
//code to select seller product
function select_product($table,$o){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name." $o ") or die("select query fail".mysqli_error());
  return $qry;
 
}

//code to insert product detail
function select_order($car){
$this->table_name=$car;
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name."") or die("select query fail".mysqli_error());
  return $qry;
 
}
//code to insert product detail
function select_register($car){
$this->table_name=$car;
$qry = mysqli_query($con,"SELECT * FROM ".$this->table_name."") or die("select query fail".mysqli_error());
  return $qry;
 
}
function insert_register($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	

$result=mysqli_query($con,"INSERT INTO ".$this->table_name."(name,email,password,img) 
    value('$_POST[name]','$_POST[email]','$_POST[password]','woman.jpg')") or die(mysqli_error());
				  
				   if($result)
				$result=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE email='$_POST[email]' AND password='$_POST[password]' ") or die(mysqli_error());
$result2 = mysqli_fetch_array($result);
session_start();
$_SESSION['user']=$result2['id'];
echo "<script>alert('Username Register Successfully')</script>";
header('location:index.php');

}

//code to insert product detail
function insert_register22($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	

$result=mysqli_query($con,"INSERT INTO ".$this->table_name."(name,email,password,img) 
    value('$_POST[name]','$_POST[email]','$_POST[password]','woman.jpg')") or die(mysqli_error());
				  
				   if($result)
$result=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE email='$_POST[email]' AND password='$_POST[password]' ") or die(mysqli_error());
$result2 = mysqli_fetch_array($result);
session_start();
$_SESSION['user']=$result2['id'];
echo "<script>alert('Username Register Successfully')</script>";
header('location:shipping.php');
}

//code to insert product detail
//check user for login
function insert_register1($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$result=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE email='$_POST[email]' AND password='$_POST[password]' ") or die(mysqli_error());
$result2 = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
session_start();
$_SESSION['user']=$result2['id'];
header('location:index.php');
}
else{
echo "<script>alert('Username or password is not correct')</script>";
}
}
//check user for login
function insert_register2($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	
$result=mysqli_query($con,"SELECT * FROM ".$this->table_name." WHERE email='$_POST[email]' AND password='$_POST[password]' ") or die(mysqli_error());
$result2 = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
session_start();
$_SESSION['user']=$result2['id'];
header('location:shipping.php');
}
else{
echo "<script>alert('Username or password is not correct')</script>";
}
}

function insert_shipping($table){
$this->table_name=$table;
$con=mysqli_connect("localhost","root","","big_shop") or die(mysqli_error());	

$result=mysqli_query($con,"INSERT INTO ".$this->table_name."(user_id,f_name,l_name,address,city,zip,country,f_name1,l_name1,address1,city1,zip1,country1) 
    value('$_POST[user_id]','$_POST[f_name]','$_POST[l_name]','$_POST[address]','$_POST[city]','$_POST[zip]','$_POST[country]','$_POST[f_name1]','$_POST[l_name1]','$_POST[address1]','$_POST[city1]','$_POST[zip1]','$_POST[country1]')") or die(mysqli_error());
				  
				   if($result)
				
echo "<script>alert('Data Saved Successfully')</script>";
header('location:payment.php');

}

}//closing of class
?>