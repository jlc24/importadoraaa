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
                                <?php include "modal_update_producto.php"; ?>
                                <?php include "modal_abastecer_producto.php" ?>
                                
                                <!-- MODAL PARA MOSTRAR IMAGEN DEL PRODUCTO 
                                <div id="imagen" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img id="previsualizar" src="/assets/images/default/404.png" class="img-thumbnail" width="200px">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>-->

                               

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
            function EditarProducto(datos){
                vector=datos.split('||');
                $('#prod_id').val(vector[0]);
                $('#prod_nombre_comercial_update').val(vector[1]);
                $('#prod_imagen_update').val(vector[2]);
                $('#prod_fabricante_update').val(vector[3]);
                $('#prod_ubicacion_update').val(vector[4]); 
                $('#prod_codigo_update').val(vector[5]);
                $('#prod_descripcion_update').val(vector[6]);
                $('#comp_vendedor_update').val(vector[7]);
                $('#prod_stock_update').val(vector[8]);
                $('#prod_stock_minimo_update').val(vector[9]);
                $('#prod_precio_compra_update').val(vector[10]);
                $('#prod_precio_venta_update').val(vector[11]);
                $('#prod_precio_unitario_update').val(vector[12]);
                $('#prod_barcode_update').val(vector[13]);
                $('#prod_estado_update').val(vector[14]);
                $('#comp_tipo_compra_update').val(vector[15]);
                $('#comp_detalle_update').val(vector[16]);
            }
            function AbastecerProducto(datos) {
                vector = datos.split('||');
                $('#prod_id').val(vector[0]);
                $('#prod_nombre_comercial_abastecer').val(vector[1]);//
                $('#prod_stock_abastecer').val(vector[8]); //
                $('#precio_venta_anterior').val(vector[11]);//
                $('#precio_unitario_anterior').val(vector[12]);//
            }
            function DesactivarProducto(datos) {
                vector = datos.split('||');
                Swal.fire({
                    title: 'Se deshabilitara al Producto "' + vector[1] + '"',
                    text: "No podrás vender este producto!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deshabilitar!'
                }).then((result) => {
                    if(result.value) {
                        cadena = "id=" + vector[0];
                        //alert(cadena);
                        $.ajax({
                            url: "assets/inc/desactivar_producto.php",
                            data: cadena,
                            type: "POST",
                            success: function(response) {
                                if(response == 1) {
                                    $('#tabla_producto').load('tabla_producto.php');
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Tu registro de producto a sido Deshabilitado.',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        });
                    }
                })
            }
            function ActivarProducto(datos) {
                vector = datos.split('||');
                Swal.fire({
                    title: 'Se Habilitara el Producto "' + vector[1] + '"',
                    text: "Podras vender este producto!",
                    type: 'success',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, habilitar!'
                }).then((result) => {
                    if(result.value) {
                        cadena = "id=" + vector[0];
                        //alert(cadena);
                        $.ajax({
                            url: "assets/inc/activar_producto.php",
                            data: cadena,
                            type: "POST",
                            success: function(response) {
                                if(response == 1) {
                                    $('#tabla_producto').load('tabla_producto.php');
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Tu registro de producto a sido Habilitado.',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        });
                    }
                })
            }

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
                //EVENTO DE PRECIO UNITARIO
                $("#prod_precio_compra").keyup(function() {
                    var cantidad = document.getElementById("prod_stock").value;
                    var precioCom = document.getElementById("prod_precio_compra").value;
                    var precioUni = parseFloat(precioCom / cantidad);
                    document.getElementById("prod_precio_unitario").value = precioUni;
                });
            });
        </script>
    </body>
</html>