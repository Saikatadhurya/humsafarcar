<?php

		error_reporting(0);
	include("include/header.php");

	include("include/config.php");
 
	/* this code is used for delete */
if($_REQUEST['action']=="delete")
{   
     $row=mysqli_fetch_array($res);
	if(mysqli_query($con,"delete from news where id=".$_REQUEST['id']))
	  {	
	?><script type="text/javascript">
		
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script><?php
	}
	else
	{	?><script type="text/javascript">
		alert("Error! Data Not Deleted");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script><?php
	}
}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Banner</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    
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
                            <font color="red"> <center><b>News Letter</font></b>
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                 
                                 
                               
                                 
                                 <th>Email Id</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php 
							 
	$sql22    = "SELECT * FROM news";
   $result22 = mysqli_query($con,$sql22);  						   
   while($row22 = mysqli_fetch_array($result22)){
   extract($row22); 
   ?>
                              <tr>
                                  
                                 
                              
                                 
                                   <td class="hidden-phone"><?php echo $email; ?></td>
                                
                                  <td>
                                    
                       <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $id; ?>"> <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button></a><br>
                        
                                  </td>
                              </tr>
                            <?php  }  ?>
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
  
  

  </body>
</html>
