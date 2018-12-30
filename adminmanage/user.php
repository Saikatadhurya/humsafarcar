<?php
$msg='';
error_reporting(0);
include("include/header.php");
include("include/config.php");
include('include/admin-main.php');
$select_obj= new admin();
$result=$select_obj->select_register("register");

if($_REQUEST['action']=="delete")
{
	if(mysqli_query($con,"delete from register where id=".$_REQUEST['id']))
	{	?><script type="text/javascript">
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

xmlhttp.open("GET","getuser3.php?q="+str,true);

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
			<div class="alert alert-success alert-dismissable" style="width:100%">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>OK! </b>Data saved successfully
                                    </div>
			<?php }?>
              <section class="panel">
                  <header class="panel-heading">
                      All User Details
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
                                   <th>Name</th>
                                        <th>Email</th>
                                       
                                       
                                         <th>Action</th>
                                        
                                </tr>
                                </thead>
                                <tbody>
								  	<?php while($row=mysqli_fetch_array($result)){?>
                                <tr class="gradeA">
								     <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                   
									   <td>  <a href="<?php echo $_SESSION['PHP_SELF'];?>?action=delete&id=<?php echo $row['id']; ?>"> <button class="btn btn-danger btn-xs" onclick='return validate1()'><i class="icon-trash "></i></button></a> &nbsp; 

<!--<a href="productedit.php?id=<?php echo $row['id']; ?>" ><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a> 
-->
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
          sOut += '<tr><td>Name:</td><td>'+aData[1]+'</td></tr>';
          sOut += '<tr><td>Email:</td><td>'+aData[2]+'</td></tr>';
       
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
