<?php
	include('conexion.php');
	$prod_barcode = $_POST['prod_barcode'];
	$sql="UPDATE configuracion SET prod_id = (SELECT prod_id FROM producto WHERE prod_barcode LIKE '%$prod_barcode%')";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>