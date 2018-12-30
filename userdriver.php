<?php
session_start();
if (!isset($_SESSION['email'])) {
 	ob_start();
  	header('location: index.php');
	exit();
  } 
  else{
	  $email=$_SESSION['email'];
  include("includes/connect.php");
  include('chat/database_connection.php');
$query = mysqli_query($db, "select * from driver where email = '$email'");
if($row1 = mysqli_fetch_assoc($query))
{
							$did = $row1['did'];
							$firstname = $row1['firstname'];
		$_SESSION['did'] = $did;
		$_SESSION['firstname'] = $firstname;
		$query1= "UPDATE userdriver SET did='$did' where email = '$email'";
		mysqli_query($db,$query1);
		$query = mysqli_query($db, "select * from userdriver where email = '$email'");
			$row = mysqli_fetch_assoc($query);
			
							$_SESSION['user_id'] = $row['user_id'];
							 $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
							 $_SESSION['login_details_id'] = $connect->lastInsertId();
	echo"<script>window.open('carpost.php','_self')</script>";
}

	$query = mysqli_query($db, "select * from users where email = '$email'");
	if($row2 = mysqli_fetch_assoc($query))
	{
			
							$uid = $row2['uid'];
							$firstname = $row2['firstname'];
		$_SESSION['uid'] = $uid;
		$_SESSION['firstname'] = $firstname;
		
		$query1= "UPDATE userdriver SET uid='$uid' where email = '$email'";
		mysqli_query($db,$query1);
		$query = mysqli_query($db, "select * from userdriver where email = '$email'");
			$row = mysqli_fetch_assoc($query);
			
							$_SESSION['user_id'] = $row['user_id'];
			 $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
							 $_SESSION['login_details_id'] = $connect->lastInsertId();
			echo"<script>window.open('index.php','_self')</script>";
			}
  }		
	
	
?>