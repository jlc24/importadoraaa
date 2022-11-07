<?php
include("assets/inc/conexion.php");
session_start();
if (!isset($_SESSION['adm_id'])) {
    header('Location: login.php');
}

$adm_id = $_SESSION['adm_id'];
$sql = "SELECT adm_id, adm_nombre FROM administrador WHERE adm_id = '$adm_id'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/inc/head.php'; ?>
</head>

<body>
    <div id="wrapper">
        <?php include 'assets/inc/topbar.php'; ?>
        <?php include 'assets/inc/left_sidebar.php'; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Panel de Control</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="modal_detalle_factura" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">DETALLE DE PRODUCTOS DE LA NOTA DE VENTA  Nº
                                            <span id="numero_factura">
                                            </span>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" id="tabla_factura_detalle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal_detalle_boleta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">IMPRESIÓN DE LA NOTA DE VENTA  Nº
                                            <span id="numero_boleta">
                                            </span>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" id="tabla_boleta_detalle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <img class="avatar-md" src="assets/images/icons/cash-register.svg" title="cash-register.svg">
                                    </div>
                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Ingresos Bs.</p>
                                        <h3 class="font-weight-medium my-2">
                                            <span data-plugin="counterup">
                                                <?php //include('assets/inc/conexion.php');
                                                $filas = mysqli_fetch_row(mysqli_query($conexion, "SELECT SUM(fac_total) FROM factura"));
                                                echo number_format($filas[0]); ?>
                                            </span>
                                        </h3>
                                        <p class="m-0">Ene - Dic <?php echo date("Y"); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom ">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <img class="avatar-md" src="assets/images/icons/client.svg" title="client.svg">
                                    </div>
                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Clientes</p>
                                        <h3 class="font-weight-medium my-2">
                                            <span data-plugin="counterup">
                                                <?php $sql = "SELECT COUNT(*) FROM cliente";
                                                $resultado = mysqli_query($conexion, $sql);
                                                $filas = mysqli_fetch_row($resultado);
                                                $total = (int)$filas[0];
                                                echo $total; ?>
                                            </span>
                                        </h3>
                                        <p class="m-0">Ene - Dic <?php echo date("Y"); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card-box widget-box-two widget-two-custom ">
                                <div class="media">
                                    <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                        <img class="avatar-md" src="assets/images/icons/cart.svg" title="cart.svg">
                                    </div>
                                    <div class="wigdet-two-content media-body">
                                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Ventas</p>
                                        <h3 class="font-weight-medium my-2">
                                            <span data-plugin="counterup">
                                                <?php $sql = "SELECT COUNT(*) FROM factura";
                                                $resultado = mysqli_query($conexion, $sql);
                                                $filas = mysqli_fetch_row($resultado);
                                                echo number_format($filas[0]); ?>
                                            </span>
                                        </h3>
                                        <p class="m-0">Ene - Dic <?php echo date("Y"); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'assets/inc/footer.php'; ?>
        </div>
    </div>
    <?php include 'assets/inc/librerias.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#vencimientoResumen').dataTable({
                responsive: true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "serverside_caducidad.php",
                "lengthMenu": [10, 20, 30, 50],
                "order": [
                    [4, "asc"]
                ], //ORDERNAR ASCENDENTEMENTE POR EL NUMERO DE DIAS
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            $('#caducadoResumen').dataTable({
                responsive: true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "serverside_caducado.php",
                "lengthMenu": [10, 20, 30, 50],
                "order": [
                    [4, "desc"]
                ], //ORDERNAR ASCENDENTEMENTE POR EL NUMERO DE DIAS
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            $('#facturaResumen').dataTable({
                responsive: true,
                columnDefs: [{
                    "targets": -1,
                    //"defaultContent": "<a href='javascript:void(0);' data-toggle='modal' data-target='#modal_detalle_factura'><i class='icon-eye btnDetalleFactura' style='font-size:20px; color:#230443'></i></a>&nbsp;&nbsp;<a href='javascript:void(0);' data-toggle='modal' data-target='#modal_detalle_boleta'><i class='icon-printer btnDetalleBoleta' style='font-size:20px; color:#230443'></i></a>"
                    "defaultContent": "<a href='javascript:void(0);' data-toggle='modal' data-target='#modal_detalle_factura'><i class='icon-eye btnDetalleFactura' style='font-size:20px; color:#230443'></i></a>&nbsp;&nbsp; <a href='tcpdf/pdf/nota.php' style='color:inherit' target='_blank'><i class='icon-printer btnDetalleBoleta' style='font-size:20px; color:#230443'></i></a>"
                }],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "serverside_factura.php",
                "lengthMenu": [10, 20, 30, 50],
                "order": [[0, "desc"]], //ORDERNAR ASCENDENTEMENTE POR EL NUMERO DE DIAS
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            //Mostrar Detalle de productoS de la factura N
            $(document).on("click", ".btnDetalleFactura", function() {
                /*RECIBE COMO DATOS EL ID DE LA FACTURA, EL ID SE ACTUALIZA EN LA
                TABLA CONFIGURACION, LUEGO SE MUESTRA EL RESULTADO DE LA CONSULTA
                PARA ESE ID DE FACTURA, EN EL DIV ---> #tabla_factura_detalle */
                cadena = "fac_id=" + $(this).closest('tr').find('td:eq(0)').text();
                document.getElementById("numero_factura").innerHTML = $(this).closest('tr').find('td:eq(0)').text();
                //alert(cadena); return false;
                $.ajax({
                    type: "POST",
                    url: "assets/inc/update_numero_detalle.php",
                    data: cadena,
                    success: function(r) {
                        if (r == 1) {
                            $('#tabla_factura_detalle').load('tabla_detalle_modal.php');
                        } //Fin if
                    } //Fin success
                }); //fin ajax
            });
            //Mostrar Detalle de productoS de la Nota de Venta lista para Imprirmir
            $(document).on("click", ".btnDetalleBoleta", function() {
                /*RECIBE COMO DATOS EL ID DE LA FACTURA, EL ID SE ACTUALIZA EN LA
                TABLA CONFIGURACION, LUEGO SE MUESTRA EL RESULTADO DE LA CONSULTA
                PARA ESE ID DE FACTURA, EN EL DIV ---> #tabla_factura_detalle */
                cadena = "fac_id=" + $(this).closest('tr').find('td:eq(0)').text();
                document.getElementById("numero_boleta").innerHTML = $(this).closest('tr').find('td:eq(0)').text();
                //alert(cadena); return false;
                $.ajax({
                    type: "POST",
                    url: "assets/inc/update_numero_detalle.php",
                    data: cadena,
                    success: function(r) {
                        if (r == 1) {
                            $('#tabla_boleta_detalle').load('ejemplo.php');
                        } //Fin if
                    } //Fin success
                }); //fin ajax
            });
            //Activar y Desactivar Pestañas Para DataTables Responsive
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
            });
        });
    </script>
    
</body>
</html>