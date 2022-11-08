<?php
/*Datos de conexion a la base de datos*/
include "conexion.php";

$prod_id = $_POST["prod_id_update"];
$nom = $_POST['prod_nombre_comercial_update']; //producto
$ruta = $_POST['prod_imagen_update'];
$fab = $_POST['prod_fabricante_update']; //producto
$ubi = $_POST['prod_ubicacion_update']; //producto
$cod = $_POST['prod_codigo_update']; //compra producto
$des = $_POST['prod_descripcion_update']; //compra producto
$bar = $_POST['prod_barcode_update']; //producto
if ($_POST['prod_estado_update'] == "ACTIVO") {
	$est = '1';
}else{
	$est = '0';
}
$fec = date("Y-m-d H:i:s"); //compra producto*/

$sql = "UPDATE producto
SET prod_nombre_comercial = '$nom',
prod_imagen = '$ruta', 
prod_fabricante = '$fab', 
prod_ubicacion = '$ubi', 
prod_codigo = '$cod', 
prod_descripcion = '$des',   
prod_barcode = '$bar', 
prod_fecha_actualizacion = '$fec', 
prod_estado = '$est'
WHERE
	prod_id = '$prod_id';";
echo $result = mysqli_query($conexion, $sql);
mysqli_close($conexion);
?>