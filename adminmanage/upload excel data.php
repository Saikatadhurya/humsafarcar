<?php
include('config.php');

/****************************** Add A new Product *************************************/
if(isset($_REQUEST['submit_excel_file']))
	{
		$csv_file = $_FILES['userfile']['tmp_name'];

  if ( ! is_file( $csv_file ) )
    exit('File not found.');

  $sql = '';

  if (($handle = fopen( $csv_file, "r")) !== FALSE)
  {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {
		
         $sql = mysqli_query($con,"INSERT INTO `result_regular` SET
            `id` = '',
			`batch_name` = '$data[0]',
			`year` = '$data[1]',
			`name` = '$data[2]',
			`fa_name` = '$data[3]',
			`course` = '$data[4]',
			`enrollno` = '$data[5]',
			`dob` = '$data[6]',
			`examination` = '$data[7]',
			`course1` = '$data[8]',
			`subject1` = '$data[9]',
			`division1` = '$data[10]',
			`grade1` = '$data[11]',
			`course2` = '$data[12]',
			`subject2` = '$data[13]',
			`division2` = '$data[14]',
			`grade2` = '$data[15]',
			`course3` = '$data[16]',
			`subject3` = '$data[17]',
			`division3` = '$data[18]',
			`grade3` = '$data[19]',
			`course4` = '$data[20]',
			`subject4` = '$data[21]',
			`division4` = '$data[22]',
			`grade4` = '$data[23]',
			`course5` = '$data[24]',
			`subject5` = '$data[25]',
			`division5` = '$data[26]',
			`grade5` = '$data[27]',
			`course6` = '$data[28]',
			`subject6` = '$data[29]',
			`division6` = '$data[30]',
			`grade6` = '$data[31]',
			`course7` = '$data[32]',
			`subject7` = '$data[33]',
			`division7` = '$data[34]',
			`grade7` = '$data[35]',
			`course8` = '$data[36]',
			`subject8` = '$data[37]',
			`division8` = '$data[38]',
			`grade8` = '$data[39]',
			`result` = '$data[40]',
			`grade_tot` = '$data[41]',
			`division_tot` = '$data[42]'");
     }
	 
      fclose($handle);
  }

	  echo "<script>alert('Data uploaded successfully!')</script>";
	  echo "<script>window.location='media-details2.php'</script>";
	  
	  
	     exit;
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>wishnplan | Upload excel file</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="img/favicon.png" rel="icon" type="image/png" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/scw.js"></script>
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<?php include_once 'include/header.php'?>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
    <?php include_once 'include/left-menu.php'?>
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-info'>
            <div class='box-header'>
              <h3 class='box-title'>Upload Excel file</h3>
			  
              <!-- tools box -->
            </div>
            <!-- /.box-header -->
            <form method="post" enctype="multipart/form-data">
            <input name="userfile" type="file" style="margin-left: 10px;margin-bottom: 10px;">(IN CSV Formate)
            <br>
<br>

			  <input type="submit" name="submit_excel_file" value="Upload" class="btn btn-success" style="margin-left: 10px;margin-bottom: 10px;">

			  </div>
            </form>
        </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.org/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
		
</body>
</html>
