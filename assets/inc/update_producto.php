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
$sto = intval($_POST['prod_stock_update']); //compra producto
$min = intval($_POST['prod_stock_minimo_update']); //producto
$com = floatval($_POST['prod_precio_compra_update']); //compra
$ven = floatval($_POST['prod_precio_venta_update']); //producto
$uni = floatval($_POST['prod_precio_unitario_update']); //producto
$bar = $_POST['prod_barcode_update']; //producto
if ($_POST['prod_estado_update'] == "ACTIVO") {
	$est = '1';
}else{
	$est = '0';
}
$comp_id = $_POST['comp_id_update'];
$tip = $_POST['comp_tipo_compra_update']; //compra
$det = $_POST['comp_detalle_update']; //compra
$rep = $_POST['comp_vendedor_update']; //compra producto
$fec = date("Y-m-d H:i:s"); //compra producto*/

$sql = "UPDATE producto INNER JOIN compra
ON producto.prod_id = compra.prod_id
SET prod_nombre_comercial = '$nom',
producto.prod_fabricante = '$fab', 
producto.prod_ubicacion = '$ubi', 
producto.prod_imagen = '$ruta', 
producto.prod_codigo = '$cod', 
producto.prod_descripcion = '$des', 
producto.prod_stock = '$sto', 
producto.prod_stock_minimo = '$min', 
producto.prod_precio_compra = '$com', 
producto.prod_precio_venta = '$ven',  
producto.prod_barcode = '$bar', 
producto.prod_fecha_actualizacion = '$fec', 
producto.prod_estado = '$est',
compra.prod_id = '$prod_id',  
compra.comp_detalle = '$det', 
compra.comp_cantidad = '$sto', 
compra.comp_subtotal = '$com', 
compra.comp_precio_unitario = '$uni', 
compra.comp_fecha_registro = '$fec', 
compra.comp_vendedor = '$rep', 
compra.comp_tipo = '$tip'
WHERE
	producto.prod_id = '$prod_id'";
echo $result = mysqli_query($conexion, $sql);
mysqli_close($conexion);
?>