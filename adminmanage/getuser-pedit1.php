<?php
include 'config.php';
$q=$_REQUEST["q"];
$sql="SELECT * FROM categories WHERE menu_id= '".$q."'";
$result = mysqli_query($con,$sql);

?> 

 
    <select class="form-group">
    <?php
	
	while($row = mysqli_fetch_array($result))
  { 
 ?>
 
    <option value="<?php echo $row['cat_id'];?>" selected="selected"><?php echo $row['category_name'];?></option>
      <?php
  }
  ?>
    </select>
   
  
<html>
<body>
