<?php
$msg='';
error_reporting(0);
include("include/header.php");
include('include/admin-main.php');
$select_obj= new admin();
$result=$select_obj->select_seller_product("product",$_REQUEST['sid'],"order by id DESC");
//select menu name
$menu_details=$select_obj->select_objData("menu");

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
<title><?php include("include/title.php")?> Product Details</title>
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
      <header class="panel-heading"> All Product Details </header>
      <div class="panel-body">
	  <div class="btn-group"> <a href="export-data-from-sql-to-excel.php?sid=<?php echo $_REQUEST['sid']?>">
          <button id="editable-sample_new" class="btn btn-compose"> Export <i class="icon-download"></i> </button>
          </a> </div>
        <div class="adv-table">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th>Menu Name</th>
                <th>Category</th>
                <th class="hidden-phone">Sub Category</th>
                <th class="hidden-phone">Name</th>
                <th class="hidden-phone">Price[30%e]</th>
				<th class="hidden-phone">Old Price</th>
                <th class="hidden-phone">Brand</th>
				<th class="hidden-phone">Product Code</th>
				<th class="hidden-phone">Firm Name</th>
                <th class="hidden-phone" style="display:none;">Image</th>
                <th class="hidden-phone" style="display:none;">Description</th>
				<th class="hidden-phone" style="display:none;">Product Size</th>
				<th class="hidden-phone" style="display:none;">Product Color</th>
				<th class="hidden-phone" style="display:none;">Stock</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th class="hidden-phone">C Out</th>
				<th class="hidden-phone">S Home</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=mysqli_fetch_array($result)){?>
              <tr class="gradeA">
               <?php $sel_menu=mysqli_fetch_array(mysqli_query($con,"select menu from menu where menu_id='$row[menu_id]'"))?>
                <td><?php echo $sel_menu['menu'];?></td>
               <?php $sel_cat=mysqli_fetch_array(mysqli_query($con,"select category_name from categories where cat_id='$row[cat_id]'"))?>
                <td><?php echo $sel_cat['category_name'];?></td>
				<?php $sel_subcat=mysqli_fetch_array(mysqli_query($con,"select subcat_name from subcategory where subcat_id='$row[subcat_id]'"))?>
                <td class="hidden-phone"><?php echo $sel_subcat['subcat_name'];?></td>
                <td class="center hidden-phone"><?php echo $row['name'];?></td>
                <td class="center hidden-phone"><?php echo $row['price'];
				 $p=$row['price']*30/100;
				 $t=$row['price']+$p;
		         echo "[".$t."]";?></td>
				<td class="center hidden-phone"><?php echo $row['oldprice'];?></td>
                <td class="center hidden-phone"><?php echo $row['brand'];?></td>
				<td class="center hidden-phone"><?php echo $row['Pro_code'];?></td>
				<td class="center hidden-phone"><?php echo $row['firm_name'];?></td>
                <td class="center hidden-phone" style="display:none;"><?php if($row['img'])
{ 
$dcd_img=json_decode($row['img']);
  //$img = '../uploads/'.$dcd_img[0];
//echo '<img src="'.$img.'" style="max-height:60px; max-width: 100px;">';
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
                <td class="center hidden-phone" style="display:none;"><?php echo $row['description'];?></td>
				<td class="center hidden-phone" style="display:none;"><?php echo $row['pro_size'];?></td>
				<td class="center hidden-phone" style="display:none;"><?php echo $row['available_Color'];?></td>
				<td class="center hidden-phone" style="display:none;"><?php echo $row['stock'];?></td>
                <td><a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $row['id']; ?>">
                  <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button>
                  </a> &nbsp; <a href="productedit.php?id=<?php echo $row['id']; ?>">
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                  </a> &nbsp;
				         <?php if($row['status']=='Active'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Inactive&id=<?php echo $row['id']; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return changeSts()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else{?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Active&id=<?php echo $row['id']?>" title="Inactive">
						  <button class="btn btn-danger btn-xs" onclick='return changeSts()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?>
	          </td>
			    <td><?php if($row['check_out']=='Yes'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=No&id=<?php echo $row['id']; ?>" title="Active">
                          <button class="btn btn-danger btn-xs" onclick='return checkOut()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else if($row['check_out']=='No'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=Yes&id=<?php echo $row['id']?>" title="Inactive">
						  <button class="btn btn-danger btn-xs" onclick='return checkOut()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?> </td>
						  
			  <td><?php if($row['h_status']=='Yes'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=NotShow&id=<?php echo $row['id']; ?>" title="Show">
                          <button class="btn btn-danger btn-xs" onclick='return ShowHide()'><i class="icon-ok"></i></button>
                          </a>
						  <?php } else if($row['h_status']=='No'){?>
						  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=YesShow&id=<?php echo $row['id']?>" title="Not Show">
						  <button class="btn btn-danger btn-xs" onclick='return ShowHide()' style="padding: 1px 6px;"><i class="icon-remove"></i></button>
						  </a>
						  <?php }?> </td>			  
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
          sOut += '<tr><td>Menu Name:</td><td>'+aData[1]+'</td></tr>';
          sOut += '<tr><td>Category:</td><td>'+aData[2]+'</td></tr>';
		  sOut += '<tr><td>Sub Category</td><td>'+aData[3]+'</td></tr>';
          sOut += '<tr><td>Name</td><td>'+aData[4]+'</td></tr>';
		  sOut += '<tr><td>Price:</td><td>'+aData[5]+'</td></tr>';
		  sOut += '<tr><td>Old Price:</td><td>'+aData[6]+'</td></tr>';
		  sOut += '<tr><td>Brand:</td><td>'+aData[7]+'</td></tr>';
		  sOut += '<tr><td>Product Code:</td><td>'+aData[8]+'</td></tr>';
		  sOut += '<tr><td>Firm Name:</td><td>'+aData[9]+'</td></tr>';
		  sOut += '<tr><td>Image:</td><td>'+aData[10]+'</td></tr>';
		  sOut += '<tr><td>Description:</td><td>'+aData[11]+'</td></tr>';
		  sOut += '<tr><td>Product Size:</td><td>'+aData[12]+'</td></tr>';
		  sOut += '<tr><td>Product Color:</td><td>'+aData[13]+'</td></tr>';
		  sOut += '<tr><td>Stock:</td><td>'+aData[14]+'</td></tr>';
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
