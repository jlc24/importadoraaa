<?php
include("assets/inc/conexion.php");
session_start();
if (!isset($_SESSION['adm_id'])) {
    header('Location: login.php');
}

$adm_id = $_SESSION['adm_id'];
$sql = "SELECT * FROM administrador WHERE adm_id = '$adm_id'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/inc/head.php'; ?>
    <style>
        input[readonly], input[readonly="readonly"] {
            background-color: white !important;
        }
	</style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include 'assets/inc/topbar.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'assets/inc/left_sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    
                                </div>
                                <h4 class="page-title">Configuración de Parámetros</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!--========================================
                        =            Contenido Principal           =
                    =========================================-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="header-title">Tipo de Cambio</h4>
                                <!--<p class="sub-header">
                                    You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                                </p>-->

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label class="col-md-8 col-form-label"><i class="flag-icon flag-icon-us" style="height:24px;width:32px;"></i> USD - Dólar Americano</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">&nbsp;$&nbsp;</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Username" value="1" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="col-md-8 col-form-label"><i class="flag-icon flag-icon-bo" style="height:24px;width:32px;"></i> BOB - Boliviano de Bolivia</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Bs.</span>
                                                </div>
                                                <input
                                                  type="number"
                                                  step="0.01"
                                                  class="form-control"
                                                  aria-label="Username"
                                                  value="<?php $consulta = "SELECT tipo_cambio FROM configuracion";
                                                  $result = mysqli_query($conexion,$consulta);
                                                  $fila = mysqli_fetch_row($result);
                                                  $valor = (float)$fila[0];
                                                  echo $valor; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-purple">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="header-title">Billetera Virtual - Clientes</h4>
                                <!--<p class="sub-header">
                                    You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                                </p>-->

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label class="col-md-8 col-form-label"><i class="flag-icon flag-icon-us" style="height:24px;width:32px;"></i> USD - Dólar Americano</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">&nbsp;$&nbsp;</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Username" value="1" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="col-md-8 col-form-label"><i class="flag-icon flag-icon-bo" style="height:24px;width:32px;"></i> BOB - Boliviano de Bolivia</label>
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Bs.</span>
                                                </div>
                                                <input
                                                  type="number"
                                                  step="0.01"
                                                  class="form-control"
                                                  aria-label="Username"
                                                  value="<?php $consulta = "SELECT tipo_cambio FROM configuracion";
                                                  $result = mysqli_query($conexion,$consulta);
                                                  $fila = mysqli_fetch_row($result);
                                                  $valor = (float)$fila[0];
                                                  echo $valor; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-purple">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!--====  End of Contenido Principal  ====-->

                </div> <!-- end container-fluid -->

            </div> <!-- end content -->

            <!-- Footer Start -->
            <?php include 'assets/inc/footer.php'; ?>

            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Libs Start -->
    <?php include 'assets/inc/librerias.php'; ?>
    <!-- end Libs -->
    <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
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