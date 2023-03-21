<?php
include ('conexion.php');

$nom = $_POST['adm_nombre'];
$usr = $_POST['adm_usuario'];
$pas = $_POST['adm_pass'];
$passha1 = sha1($pas);
$rol = $_POST['adm_rol'];

$fec = date("Y-m-d H:i:s");

$sql = "INSERT INTO administrador ( adm_id, adm_nombre, adm_usuario, adm_pass, adm_rol )
			VALUES
				( NULL,'$nom', '$usr', '$passha1', '$rol' )";
echo mysqli_query($conexion, $sql);
mysqli_close($conexion);
?>
