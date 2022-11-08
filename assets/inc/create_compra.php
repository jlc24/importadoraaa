<?php
	/*CONEXION A LA BASE DE DATOS*/
	include('conexion.php');

	$prod_id = $_POST['prod_id_abastecer'];
	$sto = $_POST['prod_stock_abastecer'];
	$can = $_POST['cantidad_comprada_abastecer'];
	$com = $_POST['precio_compra_abastecer'];
	$uni = $_POST['precio_unitario_abastecer'];//NUEVO PRECIO DE COMPRA, POR QUE PERTENECE AL ULTIMO PRECIO DE COMPRA DEL PRODUCTO
	$ven = $_POST['precio_venta_abastecer'];
	$tip = $_POST['prod_tipo_compra_abastecer'];
	$rep = $_POST['prod_vendedor_abastecer'];
	$det = $_POST['prod_detalle_abastecer'];
	$fec = date("Y-m-d H:i:s");
	/*ACTUALIZAMOS EL STOCK EN LA TABLA PRODUCTO*/
	/*SUMANOS EL STOCK ACTUAL MAS LA CANTIDAD COMPRADA*/
	$stock_actual = (int)$sto + (int)$can;
	$consulta = "UPDATE producto SET prod_stock = '$stock_actual', prod_precio_compra = '$com', prod_precio_unitario = '$uni', prod_precio_venta = '$ven' WHERE prod_id = '$prod_id'";
	if(mysqli_query($conexion,$consulta)){//SI NUESTRO STOCK SE ACTUALIZA, ENTONCES INSERTAMOS LA COMPRA....
		$sql="INSERT INTO compra (comp_id,prod_id,comp_caducidad,comp_detalle,comp_cantidad,comp_subtotal,comp_precio_unitario,comp_fecha_registro,comp_vendedor,comp_tipo)
		 					VALUES (NULL,'$prod_id','$fec','$det','$can','$com','$uni','$fec','$rep','$tip')";
		echo $result=mysqli_query($conexion,$sql);
	}
	mysqli_close($conexion);
 ?>