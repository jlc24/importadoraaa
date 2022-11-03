<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$ruta = "/assets/images/default/anonymous.png";
	$nom = $_POST['prod_nombre_comercial']; //producto
	
	$fab = $_POST['prod_fabricante']; //producto
	$cad = $_POST['prod_caducidad']; //compra producto
	$min = intval($_POST['prod_stock_minimo']); //producto
	$sto = intval($_POST['prod_stock']); //compra producto
	$ubi = $_POST['prod_ubicacion']; //producto
	$com = floatval($_POST['prod_precio_compra']); //compra
	$ven = floatval($_POST['prod_precio_venta']); //producto
	$uni = floatval($_POST['prod_precio_unitario']); //compra producto
	$bar = $_POST['prod_barcode']; //producto
	if ($_POST['prod_estado'] == "ACTIVO") {
		$est = '1';
	}else{
		$est = '0';
	}
	$tip = $_POST['comp_tipo_compra']; //compra
	$det = $_POST['comp_detalle']; //compra
	$rep = $_POST['comp_vendedor']; //compra producto
	$fec = date("Y-m-d H:i:s"); //compra producto*/

	//REGISTRAMOS UN PRODUCTO -> producto, y LUEGO LA PRIMERA COMPRA PARA EL HISTORIAL DE COMPRAS DEL PRODUCTO
	$sql = "INSERT INTO producto ( prod_id, prod_nombre_comercial, prod_imagen, prod_fabricante, prod_stock_minimo, prod_stock, prod_vencimiento, prod_ubicacion, prod_precio_compra, prod_precio_venta, prod_precio_unitario, prod_inversion, prod_mas_vendido, prod_barcode, prod_fecha_actualizacion, prod_fecha_registro, prod_estado)
				VALUES		   ( NULL, '$nom', '$ruta', '$fab', '$min', '$sto', '$cad', '$ubi', '$com', '$ven', '$uni', NULL, NULL, '$bar', '$fec', '$fec', '$est');";
	//echo mysqli_query($conexion, $sql);
	//SI EL PRODUCTO SE REGISTRA CON EXITO, AHORA REGISTRAMOS LA PRIMERA COMPRA
	if(mysqli_query($conexion,$sql))
	{
        //OBTENEMOS EL ID DEL ULTIMO PRODUCTO REGISTRADO, QUE LLEGARIA A SER LA CONSULTA QUE EJECUTAMOS ARRIBA
        $consulta = "SELECT MAX( prod_id ) AS prod_id FROM producto";
		$result = mysqli_query($conexion,$consulta);
		$fila = mysqli_fetch_row($result);
		$prod_id = (int)$fila[0];

		$consulta="INSERT INTO compra ( comp_id, prod_id, comp_caducidad, comp_detalle, comp_cantidad, comp_subtotal, comp_precio_unitario, comp_fecha_registro, comp_vendedor, comp_tipo)
						VALUES			( NULL, '$prod_id', '$cad', '$det', '$sto', '$com', '$uni', '$fec', '$rep', '$tip' )";
		echo mysqli_query($conexion,$consulta);
	}
	mysqli_close($conexion);
 ?>