<?php
    @session_start();
	$sess = $_SESSION['id'];

	$timezone = "Asia/Calcutta";

	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

		

if($sess == "")

{

	?>

		<script language="javascript">

			window.location.href="logout.php";

		</script>

	<?php

}

else

{

?>
<?php

}

?>