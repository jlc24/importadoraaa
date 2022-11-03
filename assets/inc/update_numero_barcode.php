<?php
	include('conexion.php');
	$barcode = $_POST['barcode'];
	//$barcode = '999999';

	$sql = "UPDATE configuracion SET prod_barcode = '$barcode'";
	echo mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>