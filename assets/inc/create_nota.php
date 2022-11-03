<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$adm_id = $_POST['adm_id'];
	$usu = strtoupper($_POST['nota_usuario']);
	$tit = strtoupper($_POST['nota_titulo']);
	$com = strtoupper($_POST['nota_comentario']);
	$fec = date("Y-m-d H:i:s");
	//por defecto el estado de la nota es activo, vigente, o visible que lo representamos con el número 1
	$sql="INSERT INTO nota ( not_id, not_usuario, not_titulo, not_comentario, not_fecha_hora, adm_id, not_estado )
			VALUES
				( NULL, '$usu', '$tit', '$com', '$fec', '$adm_id', 1 )";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>