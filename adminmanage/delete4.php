
<?php
  	include("include/config.php");


	$fd =$_REQUEST['id'];
	
	
	// sending query
	mysqli_query($con,"DELETE FROM  sub_to_sub  WHERE subcat_id = '$fd'")
	or die(mysqli_error());  	
	
?>
<script>
window.location='sub-to-sub-category.php';
</script>
