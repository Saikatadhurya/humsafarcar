<?php
error_reporting(0);
include("include/header.php");
include('include/admin-main.php');
$select_obj= new admin();
$sell_dt=$select_obj->select_seller_details("seller_tbl",$_REQUEST['sid']);

	
	if(isset($_POST['UpdateSeller']))

	{   

    @$sql3="Update seller_tbl set 
   Seller_type='$_REQUEST[Seller_type]',
   name='$_REQUEST[name]',
   email='$_REQUEST[email]',
   phone='$_REQUEST[phone]',
   password='$_REQUEST[password]',
address='$_REQUEST[address]',country='$_REQUEST[country]',state='$_REQUEST[state]',city='$_REQUEST[city]',pin='$_REQUEST[pin]',Company_Name='$_REQUEST[Company_Name]',Sales_tax='$_REQUEST[Sales_tax]',Per_Name='$_REQUEST[Per_Name]',Bank_name='$_REQUEST[Bank_name]',Account_number='$_REQUEST[Account_number]',Account_number='$_REQUEST[Account_number]',Branch_name='$_REQUEST[Branch_name]',Branch_code='$_REQUEST[Branch_code]' where  reg_id='$_REQUEST[sid]'";
		
		
		  $res=mysqli_query($con,$sql3)or mysqli_error();
		  ?>
<script type="text/javascript">
        alert('Seller details updated successfully');
		window.location="seller regis.php";
		</script>
		<?php }?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/favicon.png">
<title>
<?php include("include/title.php")?>
Update Seller Details</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
<script src="css1/js/jquery.min.js" type="text/javascript"></script>
<script src="css1/js/ddsmoothmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/menu.js"></script>
<script src="css1/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="css1/js/ckeditor/ckeditor.js"></script>
<link href="../css/pro_dropdown_2.css" rel="stylesheet" type="text/css">
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

xmlhttp.open("GET","getuser-pedit1.php?q="+str,true);

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

xmlhttp.open("GET","getuser-pedit2.php?q="+str,true);

xmlhttp.send();

}

</script>
</head>
<body>
<?php  include 'popup.php' ?>
<!--header end-->
<!--sidebar start-->
<?php  include 'menu.php' ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
		<section class="wrapper">
				<!-- page start-->
				<form method="post">
				<div class="row">
						<div class="col-lg-12">
								<section class="panel">
										<header class="panel-heading">
												<center>
														<b>Update Seller Details</b>
												</center>
										</header>
										<div class="row"> <br>
												<br>
												<div class="col-md-6">
														<div class="form-group">
																<label class="col-md-3 control-label">Select Type :</label>
																<div class="col-md-9">
																		<select name="Seller_type" id="txtHint1" class="form-control">
																		
																				<option value="<?php echo $sell_dt['Seller_type']?>" selected="selected"><?php echo $sell_dt['Seller_type']?></option>
																				<option value="Supplier">Supplier</option>
																				<option value="Manufacturer">Manufacturer</option>
																				<option value="Whole Seller">Whole Seller</option>
																		</select>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Email :</label>
																<div class="col-md-9 col-xs-12">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
																				<input type="text" value="<?php echo $sell_dt['email']?>" name="email" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Password :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['password']?>" name="password" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">City :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['city']?>" name="city" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Address :</label>
																<div class="col-md-9 col-xs-12">
																		<textarea class="form-control" name="address" rows="5"><?php echo $sell_dt['address']?></textarea>
																		<span class="help-block"><br>
																		</span> </div>
														</div>
												</div>
												<div class="col-md-6">
														<div class="form-group">
																<label class="col-md-3 control-label">Name :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['name']?>" name="name" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Mobile No :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['phone']?>" name="phone" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">State :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['state']?>" name="state" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Post./ZIP :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['pin']?>" name="pin" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Com. Name :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Company_Name']?>" name="Company_Name" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Tax :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Sales_tax']?>" name="Sales_tax" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Select Country :</label>
																<div class="col-md-9">
																		<select name="country" class="form-control">
																				<option value="<?php echo $sell_dt['country']?>" selected="selected"><?php echo $sell_dt['country']?></option>
																				<optgroup id="countryofresidence-optgroup-Frequently Used" label="Frequently Used"> </optgroup>
																				<option value="India" label="India" selected="selected">India</option>
																				<option value="USA" label="USA">USA</option>
																				<option value="United Kingdom" label="United Kingdom">United Kingdom</option>
																				<option value="United Arab Emirates" label="United Arab Emirates">United Arab Emirates</option>
																				<option value="Canada" label="Canada">Canada</option>
																				<option value="Australia" label="Australia">Australia</option>
																				<option value="New Zealand" label="New Zealand">New Zealand</option>
																				<option value="Pakistan" label="Pakistan">Pakistan</option>
																				<option value="Saudi Arabia" label="Saudi Arabia">Saudi Arabia</option>
																				<option value="Kuwait" label="Kuwait">Kuwait</option>
																				<option value="South Africa" label="South Africa">South Africa</option>
																				<optgroup id="countryofresidence-optgroup-More" label="More"> </optgroup>
																				<option value="Afghanistan" label="Afghanistan">Afghanistan</option>
																				<option value="Austria" label="Austria">Austria</option>
																				<option value="Bahrain" label="Bahrain">Bahrain</option>
																				<option value="Bangladesh" label="Bangladesh">Bangladesh</option>
																				<option value="Belgium" label="Belgium">Belgium</option>
																				<option value="Botswana" label="Botswana">Botswana</option>
																				<option value="Brunei" label="Brunei">Brunei</option>
																				<option value="Chile" label="Chile">Chile</option>
																				<option value="China" label="China">China</option>
																				<option value="Cyprus" label="Cyprus">Cyprus</option>
																				<option value="Denmark" label="Denmark">Denmark</option>
																				<option value="Dominican Republic" label="Dominican Republic">Dominican Republic</option>
																				<option value="Fiji Islands" label="Fiji Islands">Fiji Islands</option>
																				<option value="Finland" label="Finland">Finland</option>
																				<option value="France" label="France">France</option>
																				<option value="Germany" label="Germany">Germany</option>
																				<option value="Greece" label="Greece">Greece</option>
																				<option value="Guyana" label="Guyana">Guyana</option>
																				<option value="Hong Kong SAR" label="Hong Kong SAR">Hong Kong SAR</option>
																				<option value="Hungary" label="Hungary">Hungary</option>
																				<option value="Indonesia" label="Indonesia">Indonesia</option>
																				<option value="Iran" label="Iran">Iran</option>
																				<option value="Ireland" label="Ireland">Ireland</option>
																				<option value="Israel" label="Israel">Israel</option>
																				<option value="Italy" label="Italy">Italy</option>
																				<option value="Jamaica" label="Jamaica">Jamaica</option>
																				<option value="Japan" label="Japan">Japan</option>
																				<option value="Kenya" label="Kenya">Kenya</option>
																				<option value="Malaysia" label="Malaysia">Malaysia</option>
																				<option value="Maldives" label="Maldives">Maldives</option>
																				<option value="Mauritius" label="Mauritius">Mauritius</option>
																				<option value="Mexico" label="Mexico">Mexico</option>
																				<option value="Nepal" label="Nepal">Nepal</option>
																				<option value="Netherlands" label="Netherlands">Netherlands</option>
																				<option value="Netherlands Antilles" label="Netherlands Antilles">Netherlands Antilles</option>
																				<option value="Norway" label="Norway">Norway</option>
																				<option value="Oman" label="Oman">Oman</option>
																				<option value="Philippines" label="Philippines">Philippines</option>
																				<option value="Poland" label="Poland">Poland</option>
																				<option value="Qatar" label="Qatar">Qatar</option>
																				<option value="Russia" label="Russia">Russia</option>
																				<option value="Singapore" label="Singapore">Singapore</option>
																				<option value="Spain" label="Spain">Spain</option>
																				<option value="Sri Lanka" label="Sri Lanka">Sri Lanka</option>
																				<option value="Sweden" label="Sweden">Sweden</option>
																				<option value="Switzerland" label="Switzerland">Switzerland</option>
																				<option value="Tanzania" label="Tanzania">Tanzania</option>
																				<option value="Thailand" label="Thailand">Thailand</option>
																				<option value="Trinidad and Tobago" label="Trinidad and Tobago">Trinidad and Tobago</option>
																		</select>
																		<span class="help-block"><br>
																		</span> </div>
														</div>
												</div>
										</div>
										<header class="panel-heading">
												<center>
														<b>Bank Details</b>
												</center>
										</header>
										<div class="row"> <br>
												<br>
												<div class="col-md-6">
														<div class="form-group">
																<label class="col-md-3 control-label">A/C Name :</label>
																<div class="col-md-9 col-xs-12">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Per_Name']?>" name="Per_Name" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">A/C Number :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Account_number']?>" name="Account_number" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Branch Name :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Branch_name']?>" name="Branch_name" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
												</div>
												<div class="col-md-6">
														<div class="form-group">
																<label class="col-md-3 control-label">Bank Name :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Bank_name']?>" name="Bank_name" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">IFSC Code  :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" name="IFSC_code" value="<?php echo $sell_dt['IFSC_code']?>" class="form-control">
																		</div>
																		<span class="help-block"></span> </div>
														</div>
														<div class="form-group">
																<label class="col-md-3 control-label">Branch Code :</label>
																<div class="col-md-9">
																		<div class="input-group"> <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
																				<input type="text" value="<?php echo $sell_dt['Branch_code']?>" name="Branch_code" class="form-control">
																		</div>
																		<span class="help-block"></br></span> </div>
														</div>
												</div>
										</div>
										
										
								</section>
						</div>
						
						<div class="form-group">
                  <div class="col-md-12 col-lg-12"> 
                    <input type="submit" name="UpdateSeller" value="Submit" class="btn btn-send">
                  </div>
                </div>
				</div>
				</form>
				<!-- page end-->
		</section>
</section>
<!--main content end-->
</section>
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
