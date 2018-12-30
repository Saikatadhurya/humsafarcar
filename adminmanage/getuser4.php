<?php
include("include/config.php");
echo $q=$_REQUEST["q"];
 $sql="SELECT * FROM subcategory WHERE cat_id = '".$q."'";
$result = mysqli_query($con,$sql);

?> 

  <table width="200" border="1">
  

  <tr>
    <td>
    <select style="width:220px;">
    <option value="00">---------------Select---------------</option>
    <?php
	
	while($row = mysqli_fetch_array($result))
  { 
   $cat_id=$row['cat_id'];
 ?>
 
    <option value="<?php echo $row['subcat_id'];?>"><?php echo $row['subcat_name'];?></option>
      <?php
  }
  ?>
    </select>
    </td>
  </tr>

</table>

  
<html>
<body>
