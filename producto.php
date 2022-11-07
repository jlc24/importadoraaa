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
<html lang="es">
    <head>
        <?php include 'assets/inc/head.php'; ?>
        <!-- Compiled and minified Bootstrap CSS -->
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
                                    <h4 class="page-title">
                                        <a style="color:purple;" href="#" data-toggle="modal" data-target="#modal_crear_producto" title="Registrar Producto">
                                            <i class="far fa-plus-square"></i>
                                        </a>Administración de Productos
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!--========================================
                        =            Contenido Principal           =
                        =========================================-->
                        <div class="row">
                            <div class="col-12">
                                <!-- inicio tabla medicamento -->
                                <div class="card-box table-responsive" id="tabla_producto">

                                </div>
                                <!-- fin tabla medicamento -->

                                <?php include "modal_create_producto.php"; ?>
                                
                                <!-- MODAL PARA MOSTRAR IMAGEN DEL PRODUCTO -->
                                <div id="imagen" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img id="previsualizar" src="/assets/images/default/404.png" class="img-thumbnail" width="200px">
                                                
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!-- MODAL PARA REGISTRAR MEDICAMENTO -->
                                <div id="modal_editar_producto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Actualizar Datos del Producto</h4>
                                            </div>
                                            <div class="modal-body" id="editar_medicamento">
                                                <!-- Dentro de este DIV, se muestra los datos del medicamento a editar -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="cerrar_producto" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="button" id="update_producto" class="btn btn-purple waves-effect" data-dismiss="modal">Actualizar</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <div id="modal_abastecer_prodcucto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Abastecer Producto</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body" id="proveer_producto">
                                                <!-- Dentro de este DIV, se muestra los datos del producto a abastecer -->
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-purple waves-effect" data-dismiss="modal" id="abastecer_producto">Guardar Registro</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </div>
                            <!-- end col-12 -->
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
        
        <script>
            $(document).ready(function() {
                $('#tabla_producto').load('tabla_producto.php');
                $('#modal_crear_producto').on('shown.bs.modal',function(){
                    $('#prod_nombre_comercial').trigger('focus');
                });
                $('#create_producto').click(function(){
                    var datos = $('#formulario_crear_producto').serialize();
                    //alert(datos); return false;
                    $.ajax({
                        type:"POST",
                        url:"assets/inc/create_producto.php",
                        data:datos,
                        success:function(response){
                            if (response == 1) {
                                $('#tabla_producto').load('tabla_producto.php');
                                $('#modal_crear_producto').on('hidden.bs.modal', function (){
                                    $(this).find('#formulario_crear_producto')[0].reset();
                                });
                                Swal.fire({
                                    type: 'success',
                                    title: 'Producto Agregado Exitosamente.',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Se ha Producido un Error.',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }
                        }
                    });
                });

                //imagen
                $(".prod_imagen").change(function(){
                    var imagen = this.files[0];
                    if (imagen["type"] != "image/png") {
                        $(".prod_imagen").val("");
                        Swal.fire({
                            title: "Error al subir la imagen",
                            text: "¡La imagen debe estar en formato PNG!",
                            type: "error",
                            confirmButtonText: "¡Cerrar!"
                        });
                    }else if (imagen["size"] > 2000000) {
                        $(".prod_imagen").val("");
                        Swal.fire({
                            title: "Error al subir la imagen",
                            text: "¡La imagen no debe pesar mas de 2 MB!",
                            type: "error",
                            confirmButtonText: "¡Cerrar!"
                        });
                    }else{
                        var datosImagen = new FileReader;
                        datosImagen.readAsDataURL(imagen);
                        $(datosImagen).on("load",function(event){
                            var rutaImagen = event.target.result;
                            $(".ver").attr("src", rutaImagen);
                        })
                    }
                });
            });
        </script>
    </body>
</html>