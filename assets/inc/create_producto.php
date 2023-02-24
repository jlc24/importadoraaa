<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');
	$fec = date("Y-m-d H:i:s"); //compra producto*/
	$nom = $_POST['prod_nombre_comercial']; //producto
	$fab = $_POST['prod_fabricante']; //producto
	$ubi = $_POST['prod_ubicacion']; //producto
	$cod = $_POST['prod_codigo']; //compra producto
	$des = $_POST['prod_descripcion']; //compra producto
	$sto = intval($_POST['prod_stock']); //compra producto
	$min = intval($_POST['prod_stock_minimo']); //producto
	$com = floatval($_POST['prod_precio_compra']); //compra
	$ven = floatval($_POST['prod_precio_venta']); //producto
	$uni = floatval($_POST['prod_precio_unitario']); //producto
	$bar = $_POST['prod_barcode']; //producto
	if ($_POST['prod_estado'] == "ACTIVO") {
		$est = '1';
	}else{
		$est = '0';
	}
	$tip = $_POST['comp_tipo_compra']; //compra
	$det = $_POST['comp_detalle']; //compra
	$rep = $_POST['comp_vendedor']; //compra producto
	if (isset($_FILES['prod_imagen'])) {
		//REGISTRAMOS UN PRODUCTO -> producto, y LUEGO LA PRIMERA COMPRA PARA EL HISTORIAL DE COMPRAS DEL PRODUCTO
		$sql = "INSERT INTO producto ( prod_id, prod_nombre_comercial, prod_imagen, prod_fabricante, prod_ubicacion, prod_codigo, prod_descripcion, prod_stock, prod_stock_minimo, prod_precio_compra, prod_precio_venta, prod_precio_unitario, prod_inversion, prod_mas_vendido, prod_barcode, prod_fecha_actualizacion, prod_fecha_registro, prod_estado)
						VALUES		   ( NULL, '$nom', NULL, '$fab', '$ubi', '$cod', '$des', '$sto', '$min', '$com', '$ven' , '$uni', '$com', NULL, '$bar', '$fec', '$fec', '$est');";
		//echo mysqli_query($conexion, $sql);
		//SI EL PRODUCTO SE REGISTRA CON EXITO, AHORA REGISTRAMOS LA PRIMERA COMPRA
		if(mysqli_query($conexion,$sql))
		{
			//OBTENEMOS EL ID DEL ULTIMO PRODUCTO REGISTRADO, QUE LLEGARIA A SER LA CONSULTA QUE EJECUTAMOS ARRIBA
			$consulta = "SELECT MAX( prod_id ) AS prod_id FROM producto";
			$result = mysqli_query($conexion,$consulta);
			$fila = mysqli_fetch_row($result);
			$prod_id = (int)$fila[0];

			$consulta="INSERT INTO compra ( comp_id, prod_id, comp_caducidad, comp_detalle, comp_cantidad, comp_subtotal, comp_precio_unitario, comp_precio_venta, comp_fecha_registro, comp_vendedor, comp_tipo)
							VALUES		  ( NULL, '$prod_id', '$fec', '$det', '$sto', '$com', '$uni', '$ven', '$fec', '$rep', '$tip' )";
			if (mysqli_query($conexion,$consulta)) {
				$sql2 = "SELECT * FROM producto WHERE prod_id = (SELECT MAX( prod_id ) AS prod_id FROM producto)";
				$resultado = $conexion->query($sql2);
				$row = $resultado->fetch_assoc();

				$file = $_FILES['prod_imagen']['name']; 
				$directorio = "../images/productos/".$row['prod_id'];
				$ruta_temp = $_FILES['prod_imagen']['tmp_name']; 
				$rutafile = $directorio."/".$file;
				$ruta = "assets".substr($directorio,2) ."/".$file;

				if (!file_exists($directorio)) {
					mkdir($directorio, 0755, true);
					if (move_uploaded_file($ruta_temp, $rutafile)) {
						$sql1 = "UPDATE producto SET prod_imagen = '$ruta'
												WHERE prod_id = '".$row['prod_id']."';";
						echo mysqli_query($conexion,$sql1);
					} else {
						echo "Ha habido un error al cargar tu archivo.";
					}
				}else {
					echo " no se pudo crear directorio </br>";
				}
			}
		}
	}else{
		//REGISTRAMOS UN PRODUCTO -> producto, y LUEGO LA PRIMERA COMPRA PARA EL HISTORIAL DE COMPRAS DEL PRODUCTO
		$sql = "INSERT INTO producto ( prod_id, prod_nombre_comercial, prod_imagen, prod_fabricante, prod_ubicacion, prod_codigo, prod_descripcion, prod_stock, prod_stock_minimo, prod_precio_compra, prod_precio_venta, prod_precio_unitario, prod_inversion, prod_mas_vendido, prod_barcode, prod_fecha_actualizacion, prod_fecha_registro, prod_estado)
					VALUES		   ( NULL, '$nom', NULL, '$fab', '$ubi', '$cod', '$des', '$sto', '$min', '$com', '$ven' , '$uni', '$com', NULL, '$bar', '$fec', '$fec', '$est');";
		//echo mysqli_query($conexion, $sql);
		//SI EL PRODUCTO SE REGISTRA CON EXITO, AHORA REGISTRAMOS LA PRIMERA COMPRA
		if(mysqli_query($conexion,$sql))
		{
			//OBTENEMOS EL ID DEL ULTIMO PRODUCTO REGISTRADO, QUE LLEGARIA A SER LA CONSULTA QUE EJECUTAMOS ARRIBA
			$consulta = "SELECT MAX( prod_id ) AS prod_id FROM producto";
			$result = mysqli_query($conexion,$consulta);
			$fila = mysqli_fetch_row($result);
			$prod_id = (int)$fila[0];
	
			$consulta="INSERT INTO compra ( comp_id, prod_id, comp_caducidad, comp_detalle, comp_cantidad, comp_subtotal, comp_precio_unitario, comp_precio_venta, comp_fecha_registro, comp_vendedor, comp_tipo)
								VALUES	  ( NULL, '$prod_id', '$fec', '$det', '$sto', '$com', '$uni', '$ven', '$fec', '$rep', '$tip' )";
			echo mysqli_query($conexion,$consulta);
		}
	}

	mysqli_close($conexion);
 ?>