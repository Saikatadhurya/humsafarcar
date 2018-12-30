<?php
$msg='';
error_reporting(0);
include("include/header.php");
include("include/config.php");
include('include/admin-main.php');
$select_obj= new admin();
$result=$select_obj->select_order("cart");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ffff">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Costmatic</title>

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
			  
              <section class="panel">
                  <header class="panel-heading">
                      All Order Details
                  </header>
                  <div class="panel-body">
				<!--  <div class="btn-group">
				  
                                <a data-toggle="modal" href="#myModal"><button id="editable-sample_new" class="btn green">
                                      Add New <i class="icon-plus"></i>
                                  </button> </a>
                              </div>-->

                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                <tr>
                                   <th>User Id</th>
                                        <th>Product Id</th>
                                       
                                       <th class="hidden-phone">Quantity</th>
                                         <th class="hidden-phone">Date</th>
										 <th class="hidden-phone">Status</th>
										 <th class="hidden-phone">Order Code</th>
										 <th>Action</th>
                                        
                                </tr>
                                </thead>
                                <tbody>
								  	<?php while($row=mysqli_fetch_array($result)){?>
                                <tr class="gradeA">
								     <td><?php echo $row['user_id'];?></td>
                                    <td><?php echo $row['product_id'];?></td>
									<td  class="center hidden-phone"><?php echo $row['quantity'];?></td>
									<td  class="center hidden-phone"><?php echo $row['date'];?></td>
									<td  class="center hidden-phone"><?php echo $row['status'];?></td>
									<td  class="center hidden-phone"><?php echo $row['code'];?></td>
                                   
									   <td> <a href="editorder.php?id=<?php echo $row['id']; ?>" ><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a> 
									   <a href="billingaddress.php?id=<?php echo $row['user_id']; ?>" ><button class="btn btn-success btn-xs"><i class="icon-ok"></i></button></a>
                            </tr>
                                </tr>
                               
                                <?php } ?>
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
          sOut += '<tr><td>User Id :</td><td>'+aData[1]+'</td></tr>';
          sOut += '<tr><td>Product Id :</td><td>'+aData[2]+'</td></tr>';
           sOut += '<tr><td>Quantity :</td><td>'+aData[3]+'</td></tr>';
		   sOut += '<tr><td>Date :</td><td>'+aData[4]+'</td></tr>';
		   sOut += '<tr><td>Status :</td><td>'+aData[5]+'</td></tr>';
		    sOut += '<tr><td>Order Code :</td><td>'+aData[6]+'</td></tr>';
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
