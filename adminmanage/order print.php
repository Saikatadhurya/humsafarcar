<?php
include('config.php');
mysqli_query($con,"update cart set status='Delivered' where id='$_REQUEST[id]'") or die(mysqli_error());
$sel_d=mysqli_query($con,"select * from cart where id='$_REQUEST[id]'") or die(mysqli_error());
$data=mysqli_fetch_array($sel_d);
extract($data);
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
<title>
<?php include("include/title.php")?>
Product Order Details</title>
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
<body style="overflow-x: hidden;">
<!--main content start-->
<section class="panel">
  <div class="row" style="padding: 20px;margin-left: 20%;margin-right: 20%;">
    <table width="100%" border="1" style="border: #eee solid;
    border-radius: 10px;font-size: 13px;">
      <tbody>
        <tr>
          <td colspan="6" style="padding: 3px 18px 10px;" align="center"><strong>INVOICE</strong></td>
        </tr>
        <tr>
          <td colspan="3" rowspan="3" style="padding: 4px 8px 10px; text-transform: uppercase; //width:50%;"> Exporter<br>
            LN IMPEX (demo.com)<br>
            Office No.-6, Block-A, <br>
            Pocket-3, Sector-16<br>
            Rohini, New Delhi-110089, India<br>
            Contact : (+91) 11-47687274, +91-7838700721 <br>
            E-mail : info@demo.com<br>
            Web : www.demo.com<br></td>
          <td style="padding: 4px 8px 10px;" colspan="2">Invoice No : 1, Date : <?php echo date('Y-m-y')?> </td>
          <td style="padding: 4px 8px 10px;">Exporter's Ref</td>
        </tr>
        <tr>
          <td colspan="5" rowspan="1"  valign="top" style="padding: 4px 8px 10px;">Buyer's Order No. <?php echo $code_id?> &amp; <?php  $odate=str_replace(':','-',$reg_date); echo $odate?></td>
        </tr>
        <tr>
          <td colspan="5" rowspan="3" style="padding: 4px 8px 10px;" valign="top">Other References</td>
        </tr>
        <tr> </tr>
        <tr> </tr>
        <tr> </tr>
        <tr> </tr>
        <tr>
          <td style="padding: 4px 8px 10px; text-transform: uppercase;" colspan="3">Consignee :<br>
          <?php $s_qry=mysqli_query($con,"select * from cart where reg_id='$reg_id'") or die(mysqli_error());
		        $d_data=mysqli_fetch_array($s_qry);?>
            <?php echo $d_data['bll_name']?><br>
            <?php echo $d_data['bll_addr']?>,<br>
            <?php echo $d_data['bll_city']?> - <?php echo $d_data['bll_pin']?><br>
            <?php echo $d_data['bll_state']?><br>
           <?php echo $d_data['bll_country']?><br>
            Contact : <?php echo $d_data['bll_mob']?><br>
            Email ID : <?php echo $d_data['bll_email']?><br></td>
          <td colspan="3" valign="top" style="padding: 4px 8px 10px;">Buyer(if other than consignee) Notify</td>
        </tr>
        <tr>
          <td valign="top" style="padding: 4px 8px 10px;" rowspan="2">Pre carriage by :<br>
            Vcssel/Flight No.:
            
            S/F</td>
          <td colspan="3" valign="top" style="padding: 4px 8px 10px;">Place of receipt by pre carrier<br>
            <strong style="text-transform:uppercase"><?php echo $d_data['bll_country']?></strong></td>
          <td valign="top" style="padding: 4px 8px 10px;" rowspan="2">Country</td>
          <td valign="top" style="padding: 4px 8px 10px;text-transform:uppercase" rowspan="2"><strong><?php echo $d_data['bll_country']?></strong></td>
        </tr>
        <tr>
          <td  colspan="3" valign="top" style="padding: 4px 8px 10px;">Port of Loading<br>
            IGI AIR PORT, NEW DELHI</td>
        </tr>
        <tr>
          <td valign="top" style="padding: 4px 8px 10px;">Port of Discharge:</td>
          <td colspan="3" valign="top" style="padding: 4px 8px 10px;">Final Distination<br>
            DOOR DELIVERY</td>
          <td valign="top" style="padding: 4px 8px 10px;">Terms of Delivery and payment</td>
          <td valign="top" style="padding: 4px 8px 10px;"><strong>SAMPLE PURPOSE ONLY</strong></td>
        </tr>
        <tr>
          <td colspan="6" style="padding: 4px 8px 10px;">Description of Goods</td>
        </tr>
        <tr>
          <td colspan="6"><table width="100%" border="1" style="border: #eee solid;
    border-radius: 10px;font-size: 13px;" cellpadding="5" cellspacing="5">
              <tr>
                <td>S.N.</td>
                <td>Product Name</td>
                <td>Color</td>
                <td>Size</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Amount</td>
              </tr>
              <?php $i=1; $tot_price=0;
			  $order_qry=mysqli_query($con,"select * from cart where reg_id='$reg_id' AND code_id='$code_id'") or die(mysqli_error());
			  while($row=mysqli_fetch_array($order_qry)){
				  $pro_qry=mysqli_query($con,"select * from product where id='$row[product_id]'") or die(mysqli_error());
				  $pro_data=mysqli_fetch_array($pro_qry);?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $pro_data['name']?></td>
                <td><?php echo $row['Color'] ?></td>
                <td><?php echo $row['Size'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $pro_data['price']?></td>
                <td><?php echo $pro_data['price']*$row['quantity']?></td>
              </tr>
              <?php $i++; $tot_price=$tot_price+$pro_data['price']*$row['quantity'];
			  }?>
              <tr>
                <td colspan="5">&nbsp;</td>
                <td><strong>Total</strong></td>
                <td><?php echo $tot_price?>/-</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="5" style="padding: 4px 8px 10px;">Amount Chargeable: Six thousands<br>
            Declaration:<br>
            <br>
            <br>
            <br>
            We declare that this invoice shows the actual price of the goods</td>
          <td colspan="1" style="padding: 4px 8px 10px;">FOR<br>
            <br>
            <br>
            <br>Authorized Signatory</td>
        </tr>
        
      </tbody>
    </table>
    <center>
      <input type="button" value="Print" onclick="window.print()" style="margin-top:20px" />
    </center>
  </div>
</section>
<!--main content end-->
</body>
</html>
