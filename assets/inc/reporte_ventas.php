<?php
    include ('conexion.php');
    $mes = date('Y-m');
    $dia = $_POST['hoy'];
    $sql = "SELECT DISTINCT det_fecha, SUM(det_cantidad) FROM detalle_factura;";
    $res = mysqli_query($conexion,$sql);
    $dato = mysqli_fetch_assoc($res);
    
    echo json_encode($dato);
    mysqli_close($conexion);

?>
