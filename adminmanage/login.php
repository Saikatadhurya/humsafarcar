<?php 
include("include/config.php");
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con,"Select * from admin_reg where username = '$username' and password ='$password'") or die(mysqli_error());;
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['id'];
		
		echo 'true';
		
		
		 }else{ 
		echo 'false';
		}	

?>