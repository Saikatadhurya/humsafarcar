<?php
include("include/header.php");
include("include/config.php");
 
$id = $_REQUEST['id'];
$sql="SELECT * FROM content WHERE id = '".$id."' ";
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);
extract($row);
function upload($source, $dest)
{
  //move_uploaded_file
  if(@copy($source,$dest)== false){
    return (':( Sorry...');
  } else {
    return  ':) success';
  }

}



  

if(isset($_POST['submit'])){
	
	
         $id      = $_REQUEST['id'];
         $content = $_POST['content'];
		
		
       $update = mysqli_query($con,"UPDATE content SET content = '".$content."' WHERE id = '".$id."' "); 
     if($update){?>
     <script>
	 window.location='ourcms.php';
	 </script>
     <?php            
         		
				
		 }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>COSTMATIC</title>

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
                          <form action="edit_page.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data"> 
                             <center><font color="red"><b><?php echo $page; ?></b></font></center>
                          </header>
                          <header class="panel-heading">
                           <textarea name="content" cols="40" id="content" rows="5" style="width:300px; "><?php echo $content; ?></textarea> 
                           <br>
                           <center><input type="submit" class="btn btn-shadow btn-danger" value="Update" name="submit"></center>
                          </header>
                          
                      </section>
                  </div>
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
