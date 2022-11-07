<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prod_id=$_POST['id'];

	$sql = "UPDATE producto SET prod_estado = '0' WHERE prod_id='$prod_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>