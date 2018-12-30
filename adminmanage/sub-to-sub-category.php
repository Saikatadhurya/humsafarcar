<?php

	//error_reporting(0);

	include("include/header.php");

	include("include/config.php");

	if(isset($_POST['submit']))

	{
      $cat = @mysqli_real_escape_string($con,$_REQUEST['category']);

		$sub = @mysqli_real_escape_string($con,$_REQUEST['subcat']);

		$sub_to_sub = @mysqli_real_escape_string($con,$_REQUEST['sub_to_sub']);


		if(mysqli_query($con,"insert into sub_to_sub values('','$cat','$sub','$sub_to_sub')"))

		{	?><script type="text/javascript">

			alert("Data Inserted Successfully");

			</script><?php

		}

		else

		{	?><script type="text/javascript">

			alert("Error! Data Not Inserted");

			</script><?php echo mysqli_error();

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>cosmetics</title>

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
<!----------- Ajax ------------>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>



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

xmlhttp.open("GET","getuser4.php?q="+str,true);

xmlhttp.send();

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
            
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <font color="red"> <center><b>Our Sub To Sub Category</center></font></b>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>Serial No</th>
                                  <th >Category</th>
                                  <th>Subcategory</th>
                                  <th>Sub To Sub Category</th>
                                
                                  
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php 
							   $i=1;
	$sql22    = "SELECT * FROM sub_to_sub";
   $result22 = mysqli_query($con,$sql22);  						   
   while($row22 = mysqli_fetch_array($result22)){
   extract($row22); 
   ?>
                              <tr>
                                  <td><a href="#"><?php echo $i; ?></a></td>
                                  <td class="hidden-phone">
								  <?php 
								   $result12 = mysqli_query($con,"select * from categories where category_id='".$cat_id."'");
   								   $row12 = mysqli_fetch_array($result12);	
								  
								  echo $row12['category_name'];?>
								  
								  
								  <?php
								  
								  
								   //echo $cat_id; ?></td>
                                  <td>
								  <?php 
								   $result12 = mysqli_query($con,"select * from subcategory where subcat_id='".$subcat_name."'");
   								   $row12 = mysqli_fetch_array($result12);	
								  
								  echo $row12['subcat_name'];?>
								  
								  <?php //echo $subcat_name; ?></td>
                                  <td><?php echo $sub_to_sub; ?></td>
                              
                                 
                                  <td>
                                    
                                     <a href="editsubtosub.php?p_id=<?php echo $subcat_id;?>"> <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                     <a href="delete4.php?id=<?php echo $subcat_id; ?>"> <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button></a>
                                  </td>
                              </tr>
                            <?php  $i++;}  ?>
                              </tbody>
                          </table>
                      </section>
                  </div>
                  <!----popup ---->
                 
                   <div class="inbox-body">
                          <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                              Add Sub To Sub Category
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Add Sub To Sub Category</h4>
                                      </div>
                                      <div class="modal-body">
                                       <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                                      <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Category</label>
                                                  <div class="col-lg-10">
      <select name="category"  class="form-control" onChange="showUser1234(this.value)">
	  <option>---------------Select---------------</option>
	  <?php
	  $res = mysqli_query($con,"select * from categories");
	  while($row = mysqli_fetch_array($res))
	  {
	  ?>
	  <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
	  <?php
	  }
	  ?>
      </select>                               </div>
                                              </div>   
                                            
                                             <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Subcategory</label>
                                                  <div class="col-lg-10">
      <select name="subcat" id="txtHint1" class="form-control">

	  <option>---------------Select---------------</option>

      </select>

                                                  </div>
                                              </div>
                                      <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Sub to sub cat</label>
                                                  <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="sub_to_sub" placeholder="Sub To Sub catrgory" name="sub_to_sub">
                                                  </div>
                                              </div>
                                             
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                     
                                                      <input type="submit" name="submit" value="Submit" class="btn btn-send">
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                  
                  
                  
                  <!----end popup  ----->
                  
                  
                  
                  
                  
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
     
  </section>
  
   <script type="text/javascript">
			CKEDITOR.replace( 'content',
                {
                    filebrowserBrowseUrl :'=../js/ckeditor/filemanager/browser/default/browser.html?Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '../js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'../js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=../js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'../js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '../js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '../js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});
			</script>

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
