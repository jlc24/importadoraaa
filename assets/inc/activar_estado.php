<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	if (isset($_POST['prod_id'])) {
		$prod_id=$_POST['prod_id'];
		$sql = "UPDATE producto SET prod_estado = '1' WHERE prod_id='$prod_id'";
		echo mysqli_query($conexion,$sql);
	}elseif (isset($_POST['adm_id'])) {
		$adm = $_POST['adm_id'];
		$sql = "UPDATE administrador SET adm_estado = '1' WHERE adm_id = '$adm';";
		echo mysqli_query($conexion,$sql);
	}
	mysqli_close($conexion);
 ?>