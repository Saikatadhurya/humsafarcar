<?php 
	error_reporting(0);
	include("include/admin-main.php"); 
    include("include/header.php");
	$obj=new admin();
    $adv_details=$obj->select_objData("adv_tbl2","order by adv_id");
	$menu_details=$obj->select_objData("menu","");
     if(isset($_POST['ADV_new']))
	{
		$insert_menu=$obj->insert_ADV("adv_tbl2");
		
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
$sl_Q=mysqli_query($con,"select * from adv_tbl2 where adv_id=".$_REQUEST['id']);
$adData=mysqli_fetch_array($sl_Q); 
unlink("product/forad2/".$adData['img']);
	if(mysqli_query($con,"delete from adv_tbl2 where adv_id=".$_REQUEST['id']))
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
    if(mysqli_query($con,"update adv_tbl2 set status='Inactive' where adv_id=".$_REQUEST['id'])){
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
    if(mysqli_query($con,"update adv_tbl2 set status='Active' where adv_id=".$_REQUEST['id'])){
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

?>
		<!DOCTYPE html>
		<html lang="en">
        <head>
        <link rel="shortcut icon" href="img/favicon.png">
        <title><?php include("include/title.php")?> Add Details</title>
        
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
                    var msg = confirm('Are Your want to delete this record');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
					
				function changeSts(){
                    var msg = confirm('Are Your want to change status');
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
            <div class="row">
            <div class="inbox-body"> <a class="btn btn-compose" data-toggle="modal" href="#myModal3">Add New ADD</a> 
                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New </h4>
                      </div>
                      <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <div class="form-group">
                  <label  class="col-lg-4 control-label">Select Category</label>
                  <div class="col-lg-8">
                    <select name="menu_id" class="form-control" onChange="showUser123(this.value)">
                      <option value=" " selected="selected">Select Category</option>
                      <?php while($row = mysqli_fetch_array($menu_details)){?>
                      <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
						<div class="form-group">
						  <label  class="col-lg-4 control-label">Select Sub Category</label>
						  <div class="col-lg-8">
							<select name="cat_id" id="txtHint" class="form-control" onChange="showUser1234(this.value)">
							  <option value="" selected="selected">Select Sub Category</option>
							</select>
						  </div>
						</div>
						<div class="form-group">
						  <label  class="col-lg-4 control-label">Select Sub-To-Sub category</label>
						  <div class="col-lg-8">
							<select name="subcat_id" id="txtHint1" class="form-control">
							  <option value=" " selected="selected">Select Sub-To-Sub category</option>
							</select>
						  </div>
						</div>
						<div class="form-group">
                            <label class="col-lg-4 control-label">Enter Position</label>
                            <div class="col-lg-8">
                          <input type="text" name="pos_ad" class="form-control" placeholder="Enter Position" required>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="col-lg-4 control-label">Link</label>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" id="linkName" placeholder="Enter Link Page" name="linkName">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-lg-4 control-label">Upload image</label>
                            <div class="col-lg-8">
                              <input type="file" class="form-control" name="photo">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <input type="submit" name="ADV_new" value="Submit" class="btn btn-send">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>
                <!-- /.modal --> 
              </div>
            <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading"> 
                    <b>  ADD Details</b>
                    </header>
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>Seq. No</th>
						<th>Category Name</th>
						<th>Sub Category</th>
						<th class="hidden-phone">SubToSub Category</th>
                        <th>Link Name</th>
                        <th>Image</th>
						<th>Position</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=1;
					  while($row = mysqli_fetch_array($adv_details)){
                     @extract($row); 
                      ?>
                      <tr>
                       <td class="hidden-phone"><?php echo $a; ?></td>
					  <?php $sel_menu=mysqli_fetch_array(mysqli_query($con,"select menu from menu where menu_id='$menu_id'"))?>
                <td><?php echo $sel_menu['menu'];?></td>
               <?php $sel_cat=mysqli_fetch_array(mysqli_query($con,"select category_name from categories where cat_id='$cat_id'"))?>
                <td><?php echo $sel_cat['category_name'];?></td>
				<?php $sel_subcat=mysqli_fetch_array(mysqli_query($con,"select subcat_name from subcategory where subcat_id='$subcat_id'"))?>
                <td class="hidden-phone"><?php echo $sel_subcat['subcat_name'];?></td>
						<td><?php echo $Adv;?></td>
                        <td><img src="product/forad2/<?php echo $img; ?>"  height="50px"/></td>
						<td><?php echo $pos_ad;?></td>
                        <td><a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $adv_id; ?>" title="delete">
                          <button class="btn btn-danger btn-xs" onclick='return del()'><i class="icon-trash "></i></button>
                          </a>
						  <?php if($status=='Active'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Inactive&id=<?php echo $adv_id; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return changeSts()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else{?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Active&id=<?php echo $adv_id?>" title="Inactive">
						  <button class="btn btn-danger btn-xs" onclick='return changeSts()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?>
						  </td>
                      </tr>
                      <?php  $a++; } ?>
                    </tbody>
                  </table>
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