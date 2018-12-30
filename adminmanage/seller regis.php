<?php 
	error_reporting(0);
	include("include/admin-main.php"); 
    include("include/header.php");
	require('../phpmailer/class.phpmailer.php');
	$obj=new admin();
    $reg_details=$obj->select_objData("seller_tbl","order by id DESC");
    
if($_REQUEST['action']=="delete")
{
	if(mysqli_query($con,"delete from seller_tbl where id=".$_REQUEST['id']))
	{	?>
<script type="text/javascript">
        alert("Seller deleted successfully!");
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
    if(mysqli_query($con,"update seller_tbl set status='Inactive' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Registration deactive  successfully");
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
    if(mysqli_query($con,"update seller_tbl set status='Active' where id=".$_REQUEST['id'])){
	$sl_qry = mysqli_query($con,"select * from seller_tbl where id='$_REQUEST[id]'") or die(mysqli_error());
	$sel_data=mysqli_fetch_array($sl_qry);
	
$fromad=$sel_data['email'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->Port     = 25;  
$mail->Username = "sales@demo.com";
$mail->Password = "admin@123";
$mail->Host     = "demo.com";
$mail->Mailer   = "smtp";
$mail->SetFrom($fromad, $fromad);
$mail->AddReplyTo($sel_data['email'], $sel_data['name']);
$mail->AddAddress("sales@demo.com");	
$mail->AddAddress($fromad);	
$mail->Subject = "Congratulations !!!! Your Account has been actived! Now you can login. ";
$mail->WordWrap   = 80;
$mail->MsgHTML("Hi ".$sel_data['name'].",<br><br>Greetings from demo.com!<br><br>Your account details :: <br>User Name : ".$sel_data['email']."<br />Password : ".$sel_data['password']."<br />Click on this link to login http://demo.com/seller%20login.php<br /><br />Regards,<br />The Lelosub Team <br />");
$mail->IsHTML(true);
if(!$mail->Send()) {
	echo "<p class='error'>Problem in Sending Mail.</p>";
} 
else {
?>
<script type="text/javascript">
		alert("Account has been activated !");
		window.location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
		</script>
		<?php
	
}


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
<script>
function validate1(){

                
                    var msg = confirm('Are You want to delete this seller account');
                    if(msg == true){
                        return true;
                    }else {
                        return false;

                    }
                }
				</script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="img/favicon.png">
<title><?php include("include/title.php")?> Seller Details</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
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
    <?php if($msg=="pass"){ ?>
    <div class="alert alert-success alert-dismissable" style="width:100%"> <i class="fa fa-check"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
      <b>OK! </b>Data saved successfully </div>
	  <script>
	  window.location="<?php echo $_SERVER['HTTP_REFERER']?>";
	  </script>
    <?php }?>
    <section class="panel">
      <header class="panel-heading">Seller Details </header>
      <div class="panel-body">
        <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                    <thead>
                      <tr>
                        <th>Seq. No</th>
						<th>Type</th>
                        <th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th style="display:none;">Company Name</th>
						<th style="display:none;">VAT / Sales Tax</th>
						<th style="display:none;">Name</th>
						<th style="display:none;">Bank Name</th>
						<th style="display:none;">Account Number</th>
						<th style="display:none;">IFSC Code</th>
						<th style="display:none;">Branch Name </th>
						<th style="display:none;">Branch Code</th>
						<th style="display:none;">Date :: Time</th>
                        <th style="width:150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $a=1;
					  while($row = mysqli_fetch_array($reg_details)){
                     @extract($row); 
                      ?>
                      <tr class="gradeA">
					    
                        <td class="hidden-phone"><?php echo $a; ?></td>
						<td><?php echo $Seller_type;?></td>
                        <td><?php echo $name;?>( <b><?php echo $reg_id;?></b> )</td>
						<td><?php echo $email;?></td>
						<td><?php echo $phone;?></td>
						<td style="font-size:13px"><i><?php echo $address;?> ,
<?php echo $state;?> ,
<?php echo $city;?> - <?php echo $pin;?></i></td>
						<td style="display:none;"><?php echo $Company_Name;?></td>
						<td style="display:none;"><?php echo $Sales_tax;?></td>
						<td style="display:none;"><?php echo $Per_Name;?></td>
						<td style="display:none;"><?php echo $Bank_name;?></td>
						<td style="display:none;"><?php echo $Account_number;?></td>
						<td style="display:none;"><?php echo $IFSC_code;?></td>
						<td style="display:none;"><?php echo $Branch_name;?></td>
						<td style="display:none;"><?php echo $Branch_code;?></td>
						<td style="display:none;"><?php echo $reg_date;?> / <?php echo $reg_time;?></td>
                        <td> 
						  <?php if($status=='Active'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Inactive&id=<?php echo $id; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return changeSts()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else{?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Active&id=<?php echo $id?>" title="Inactive">
						  <button class="btn btn-danger btn-xs" onclick='return changeSts()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?>
						  <a href="seller product dtl.php?sid=<?php echo $reg_id?>" title="Product Details">
						  <button class="btn btn-danger btn-xs" style="padding: 1px 6px;"><i class="icon-user"></i></button>
						  </a>
						  <a href="selleredit.php?sid=<?php echo $reg_id?>" title="Seller Edit">
						  <button class="btn btn-danger btn-xs" style="padding: 1px 6px;"><i class="icon-pencil"></i></button>
						  </a>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $row['id']; ?>" title="Seller Delete">
                  <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button>
                  </a>
						  </td>
                      </tr>
                      <?php  $a++; } ?>
                      
                      
                    </tbody>
                  </table>
        </div>
      </div>
    </section>
    <!-- page end-->
  </section>
</section>
<!--main content end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<!--<script src="js/jquery.js"></script>-->
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Type:</td><td>'+aData[2]+'</td></tr>';
          sOut += '<tr><td>Name:</td><td>'+aData[3]+'</td></tr>';
		  sOut += '<tr><td>Email</td><td>'+aData[4]+'</td></tr>';
          sOut += '<tr><td>Phone</td><td>'+aData[5]+'</td></tr>';
		  sOut += '<tr><td>Address:</td><td>'+aData[6]+'</td></tr>';
		  sOut += '<tr><td>Company Name:</td><td>'+aData[7]+'</td></tr>';
		  sOut += '<tr><td>VAT / Sales Tax:</td><td>'+aData[8]+'</td></tr>';
		  sOut += '<tr><td>Name:</td><td>'+aData[9]+'</td></tr>';
		  sOut += '<tr><td>Bank Name:</td><td>'+aData[10]+'</td></tr>';
		  sOut += '<tr><td>Account Number:</td><td>'+aData[11]+'</td></tr>';
		  sOut += '<tr><td>IFSC Code:</td><td>'+aData[12]+'</td></tr>';
		  sOut += '<tr><td>Branch Name:</td><td>'+aData[13]+'</td></tr>';
		  sOut += '<tr><td>Branch Code:</td><td>'+aData[14]+'</td></tr>';
		  sOut += '<tr><td>Date / Time:</td><td>'+aData[15]+'</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>
</body>
</html>
