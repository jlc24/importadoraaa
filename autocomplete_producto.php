<?php
include ('assets/inc/conexion.php');
if (isset($_POST['search']))
{
    $consulta = mysqli_query($conexion, "SELECT * FROM producto WHERE prod_estado = '1' AND prod_nombre_comercial 
        LIKE '%" . mysqli_real_escape_string($conexion, ($_POST['search'])) . "%' 
        OR prod_fabricante like '%" . mysqli_real_escape_string($conexion, ($_POST['search'])) . "%' 
        OR prod_ubicacion like '%" . mysqli_real_escape_string($conexion, ($_POST['search'])) . "%' 
        OR prod_barcode like '%" . mysqli_real_escape_string($conexion, ($_POST['search'])) . "%' 
        ORDER BY prod_fecha_registro ASC LIMIT 0 ,11");
    $return_arr = array();
    while ($row = mysqli_fetch_array($consulta))
    {
        /* El array value, muestra solo informacion*/
        /*
        nombre precio venta stock
        */
        $row_array['value'] = $row['prod_barcode'] ." | ".$row['prod_nombre_comercial'] . " Bs. " . $row['prod_precio_venta'];
        $row_array['id'] = $row['prod_id'];
        $row_array['nombre'] = $row['prod_nombre_comercial'];
        $row_array['fabricante'] = $row['prod_fabricante'];
        $row_array['descripcion'] = $row['prod_descripcion'];
        $row_array['codigo'] = $row['prod_codigo'];
        $row_array['precio_compra'] = $row['prod_precio_compra'];
        $row_array['precio_venta'] = $row['prod_precio_venta'];
        $row_array['stock'] = $row['prod_stock'];
        $row_array['barcodigo'] = $row['prod_barcode'];
        $row_array['estado'] = $row['prod_estado'];
        $row_array['registro'] = $row['prod_fecha_registro'];
        array_push($return_arr, $row_array);
    }
    mysqli_close($conexion);
    echo json_encode($return_arr);
}
?>