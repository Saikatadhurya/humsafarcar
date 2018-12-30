<?php
$msg='';
error_reporting(0);
include("include/header.php");
include('include/admin-main.php');
$select_obj= new admin();
$result=$select_obj->select_order_product("cart",$_REQUEST['sid'],"order by id DESC");
//select menu name
$menu_details=$select_obj->select_objData("menu","");

if($_REQUEST['action']=="delete")
{
	if(mysqli_query($con,"delete from product where id=".$_REQUEST['id']))
	{	?>
<script type="text/javascript">
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
    if(mysqli_query($con,"update product set status='Inactive' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Menu dective successfully");
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
    if(mysqli_query($con,"update product set status='Active' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Product active successfully");
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

	   /* this code is used to add in check list */
if($_REQUEST['action']=='No'){
    if(mysqli_query($con,"update product set check_out='No' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Not show in check list");
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
 /* this code is used to add in check list */
if($_REQUEST['action']=='Yes'){
    if(mysqli_query($con,"update product set check_out='Yes' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Show in check list");
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

 /* this code is used to show */
if($_REQUEST['action']=='YesShow'){
    if(mysqli_query($con,"update product set h_status='Yes' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Show on the home page");
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

	   /* this code is used to not show */
if($_REQUEST['action']=='NotShow'){
    if(mysqli_query($con,"update product set h_status='No' where id=".$_REQUEST['id'])){
	?>
	<script>
	alert("Not show on the home page");
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="img/favicon.png">
<title><?php include("include/title.php")?> Product Order Details</title>
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
<script type="text/javascript">
            function validate1(){

                
                    var msg = confirm('Are Your want to delete this record');
                    if(msg == true){
                        return true;
                    }else {
                        return false;

                    }
                }

           function changeSts(){
                    var msg = confirm('Are You want to change status');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
		   function checkOut(){
                    var msg = confirm('Are You want to show in check out list');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
		   function ShowHide(){
                    var msg = confirm('Show/Hide on home page!');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
					
		  function printOrder(){
                    var msg = confirm('Are you want to print order!');
                    if(!msg){
                        return false;
                    }else {
                        return true;
                    }
					}
		function orderdone(){
		alert('Delivery is already done! ');	
		}
</script>
<!----------- Ajax ------------>
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
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <b>OK! </b>Data saved successfully </div>
	  <script>
	  window.location="<?php echo $_SERVER['HTTP_REFERER']?>";
	  </script>
    <?php }?>
    <section class="panel">
      <header class="panel-heading"> All Order Details </header>
      <div class="panel-body">
	  <div class="btn-group"> <a href="export-data-from-sql-to-excel.php?sid=<?php echo $_REQUEST['sid']?>">
          <button id="editable-sample_new" class="btn btn-compose"> Export <i class="icon-download"></i> </button>
          </a> </div>
        <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>Reg. ID</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Qty</th>
				<th>Total Price</th>
				<th style="display:none;">Image</th>
				<th style="display:none;">Date</th>
				<th style="display:none;">Time</th>
				<th>Status</th>
                <th>Action</th>
				
              </tr>
            </thead>
            <tbody>
              <?php while($row=mysqli_fetch_array($result)){
			  $sel_d=mysqli_query($con,"select * from product where id='$row[product_id]'") or die(mysqli_error());
			  $row_data=mysqli_fetch_array($sel_d);
			  ?>
              <tr class="gradeA">
				<td class="center hidden-phone"><?php echo $row['reg_id'];?></td>
                <td class="center hidden-phone"><?php echo $row['code_id'];?></td>
				<td class="center hidden-phone"><?php echo $row_data['name'];?></td>
				<td class="center hidden-phone"><?php echo $row['Size'];?></td>
				<td class="center hidden-phone"><?php echo $row['Color'];?></td>
				<td class="center hidden-phone"><?php echo $row_data['price'];?></td>
				<td class="center hidden-phone"><?php echo $row['quantity'];?></td>
				<td class="center hidden-phone"><?php echo $row_data['price']*$row['quantity'];?></td>
				<td class="center hidden-phone" style="display:none;"><?php if($row['img'])
{ 
$dcd_img=json_decode($row_data['img']);
}
?>
                  <?php
if(@$dcd_img=="")
{}
else
{
foreach($dcd_img as $v)
{

?>
                  <img alt=""  src="product/<?php echo $v; ?>"  height="50px"/>
                  <?php }} ?></td>
				<td class="center hidden-phone" style="display:none;"><?php echo $row['reg_date'];?></td>
				<td class="center hidden-phone" style="display:none;"><?php echo $row['reg_time'];?></td>
				<td class="center hidden-phone" style="color:red">
				<?php if($row['status']=='New order'){  echo $row['status']; } else { echo "<font color='#41cac0'>".$row['status']."</font>";}?></td>
                <td><?php if($row['status']=='New order'){?>
						 <a href="order print.php?action=orderPrint&id=<?php echo $row['id']?>" title="Print order">
						  <button class="btn btn-danger btn-xs" onclick='return printOrder()' style="padding: 1px 6px;"><i class="icon-print"></i></button>
						  </a> 
						  <?php } else{?>
						  <a href="order print.php?action=orderPrint&id=<?php echo $row['id']?>" title="Print order">
						  <button class="btn btn-danger btn-xs" onclick='return printOrder()' style="padding: 1px 6px;background-color: #41cac0; border-color: #41cac0;"><i class="icon-print"></i></button>
						  </a>
						  <?php }?></td>
				
                
            		  
              </tr>
              </tr>
              
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- page end-->
    <!----popup ---->
    <div class="inbox-body">
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Add New Product</h4>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
    <!----end popup  ----->
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
          sOut += '<tr><td>Reg. ID:</td><td>'+aData[1]+'</td></tr>';
          sOut += '<tr><td>Order ID:</td><td>'+aData[2]+'</td></tr>';
		  sOut += '<tr><td>Product Name</td><td>'+aData[3]+'</td></tr>';
          sOut += '<tr><td>Size</td><td>'+aData[4]+'</td></tr>';
		  sOut += '<tr><td>Color:</td><td>'+aData[5]+'</td></tr>';
		  sOut += '<tr><td>Price:</td><td>'+aData[6]+'</td></tr>';
		  sOut += '<tr><td>Qty:</td><td>'+aData[7]+'</td></tr>';
		  sOut += '<tr><td>Total Price:</td><td>'+aData[8]+'</td></tr>';
		  sOut += '<tr><td>Image:</td><td>'+aData[9]+'</td></tr>';
		  sOut += '<tr><td>Date:</td><td>'+aData[10]+'</td></tr>';
		  sOut += '<tr><td>Time:</td><td>'+aData[11]+'</td></tr>';
		  sOut += '<tr><td>Status:</td><td style="color:red">'+aData[12]+'</td></tr>';
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
