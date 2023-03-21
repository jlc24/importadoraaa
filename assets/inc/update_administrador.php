<?php
include ('conexion.php');

$id = $_POST['adm_id'];
$nom = $_POST['adm_nombre_update'];
$user = $_POST['adm_usuario_update'];
$pass = $_POST['adm_pass_update'];
$passha1 = sha1($pass);

$sql = "UPDATE administrador SET adm_nombre = '$nom', adm_usuario = '$user', adm_pass ='$passha1' WHERE adm_id = '$id'";
echo mysqli_query($conexion, $sql);
mysqli_close($conexion);
?>
