<?php
	error_reporting(0);
	include("include/admin-main.php"); 
	include("include/header.php");
	$obj=new admin();
    $subcategory_details=$obj->select_objData("subcategory","order by subcat_id DESC");
	$menu_details=$obj->select_MenuForData("menu");

	
	  /*this code is used for delete */
if($_REQUEST['action']=="delete")
{
	//echo "delete from vendor where id=".$_REQUEST['id'];
	if(mysqli_query($con,"delete from subcategory where subcat_id=".$_REQUEST['id']))
	{	?>
<script type="text/javascript">
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
	
	 if(isset($_POST['Save_subCategory']))
	{
		$insert_cat=$obj->insert_subcat("subcategory");
		if($insert_cat=="ok")
		{
	
			?>
<script type="text/javascript">
			alert("Data Inserted Successfully");
			window.location.href="<?php echo $_SERVER['HTTP_REFERER']?>";
			</script>
<?php
		}
		else
		{	?>
<script type="text/javascript">
			alert("Error! Data Not Inserted");
			
			</script>
<?php echo mysqli_error();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/favicon.png">
<title><?php include("include/title.php")?> Sub Category Page</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<!---editor -->
<script src="css1/js/jquery.min.js" type="text/javascript"></script>
<script src="css1/js/ddsmoothmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/menu.js"></script>
<script src="css1/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/ckeditor/ckeditor.js"></script>
<link href="../css/pro_dropdown_2.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript">
            function validate1(){

                var dept_name=document.getElementById('dept_name');
                
                if(dept_name != ""){
                    var msg = confirm('Are Your want to delete this record');
                    if(msg == true){
                        return true;
                    }else {
                        return false;
                    }
                }

            }
</script>
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
<!----------- Ajax ------------>
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
    <div class="row">
      <!----popup ---->
      <div class="inbox-body"> <a class="btn btn-compose" data-toggle="modal" href="#myModal3"> Add Sub Category </a>
        <!-- Modal -->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Sub Category</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-lg-4 control-label">Select Menu</label>
                    <div class="col-lg-8">
                      <select name="menu_id" class="form-control" onChange="showUser123(this.value)">
                        <option value="" selected="selected">Select Menu Name</option>
                        <?php while($row = mysqli_fetch_array($menu_details))

	  {

	  ?>
                        <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu'];?></option>
                        <?php

	  }

	  ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-lg-4 control-label">Category</label>
                    <div class="col-lg-8">
                      <select name="cat_id" class="form-control" id="txtHint">
					  <option value=" " selected="selected">Select Category</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-lg-4 control-label">Sub Category</label>
                    <div class="col-lg-8">
                      <input type="text" name="sub_category" size="33"  placeholder=""  class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <input type="submit" name="Save_subCategory" value="Submit" class="btn btn-send">
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
      <!----end popup  ----->
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading"> <b>Sub Category Details</b> </header>
          <table class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th>Seq. No</th>
                <th>Category Name [ Sub Category Name ] </th>
              </tr>
            </thead>
            <tbody>
              <?php $a=1;  while($row = mysqli_fetch_array($subcategory_details)){
   extract($row); 
   ?>
              <tr>
                <td class="hidden-phone"><?php echo $a; ?></td>
                <td><?php 
				             $sel_cat_name = mysqli_query($con,"select category_name from categories where cat_id='".$cat_id."'");
   							 $sel_cat_data = mysqli_fetch_array($sel_cat_name);	
						echo $sel_cat_data['category_name']." [ <font color='#669933'>".$subcat_name."</font> ]";?>		  
								 
				</td>
                <td><a href="editsubcategory.php?sub_id=<?php echo $subcat_id;?>">
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                  </a> <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $subcat_id; ?>">
                  <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button>
                  </a> </td>
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
