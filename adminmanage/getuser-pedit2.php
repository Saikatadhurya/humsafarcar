<?php
include 'config.php';
$q=$_REQUEST["q"];
$sql="SELECT * FROM subcategory WHERE cat_id= '".$q."'";
$result = mysqli_query($con,$sql);

?> 

 
    <select class="form-group">
    <?php
	
	while($row = mysqli_fetch_array($result))
  { 
 ?>
    <option value="">select Subcategory</option>
    <option value="<?php echo $row['subcat_id'];?>" selected="selected"><?php echo $row['subcat_name'];?></option>
      <?php
  }
  ?>
    </select>
   
  
<html>
<body>
