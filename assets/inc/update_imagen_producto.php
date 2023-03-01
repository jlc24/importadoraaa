<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prod_id = $_POST['prod_id'];
	$feccha_mod = date("Y-m-d H:i:s");

	if (isset($_FILES['img_producto']['name'])) {
		$file = $_FILES['img_producto']['name'];
		$directorio = "../images/productos/".$prod_id;
		$ruta_temp = $_FILES['img_producto']['tmp_name']; 
		$rutafile = $directorio."/".$file;
		$ruta = "assets".substr($directorio,2) ."/".$file;
		if (!file_exists($directorio)) {
			mkdir($directorio, 0755, true);
			if (move_uploaded_file($ruta_temp, $rutafile)) {
				$sql1 = "UPDATE producto SET prod_imagen = '$ruta', prod_fecha_actualizacion = '$feccha_mod' 
										WHERE prod_id = '".$prod_id."';";
				echo mysqli_query($conexion,$sql1);
			} else {
				echo "Ha habido un error al cargar tu archivo.</br>";
			}
		}else {
			echo " no se pudo crear directorio </br>";
		}
	}
	mysqli_close($conexion);
 ?>