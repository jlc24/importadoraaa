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
                                <?php include "modal_create_producto.php"; ?>
                                <div id="modal_abastecer_producto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" aria-labelledby="exampleModalToggleLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 class="modal-title" id="myModalLabel">Abastecer Producto</h3>
                                            </div>
                                            <div class="modal-body"  id="abastecer_producto">
                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btn_abastecer_producto" class="btn btn-purple waves-effect" data-dismiss="modal">
                                                    Guardar
                                                </button>
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
            //EVENTO DE PRECIO UNITARIO
            $("#prod_precio_compra").keyup(function() {
                var cantidad = document.getElementById("prod_stock").value;
                var precioCom = document.getElementById("prod_precio_compra").value;
                var precioUni = parseFloat(precioCom / cantidad);
                document.getElementById("prod_precio_unitario").value = precioUni;
                console.log(precioUni);
            });
            //EVENTO DE PRECIO UNITARIO UPDATE
            $("#prod_precio_compra_update").on("keyup change",function() {
                var cantidad = document.getElementById("prod_stock_update").value;
                var precioCom = document.getElementById("prod_precio_compra_update").value;
                var precioUni = parseFloat(precioCom / cantidad);
                document.getElementById("prod_precio_unitario_update").value = precioUni;
                console.log(precioUni);
            }).keyup();
            //EVENTO DE PRECIO UNITARIO ABASTECER
            $("#precio_compra_abastecer").keyup(function() {
                var cantidad = document.getElementById("cantidad_comprada_abastecer").value;
                var precioCom = document.getElementById("precio_compra_abastecer").value;
                var precioUni = parseFloat(precioCom / cantidad);
                document.getElementById("unitario_abastecer").value = precioUni;
                console.log(precioUni);
            });
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
                                }else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Se ha Producido un Error.',
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
                                }else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Se ha Producido un Error.',
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
                    //var datos = $('#formulario_crear_producto').serialize();
                    var file_data = $("#prod_imagen").prop("files")[0];
                    var datos = new FormData();
                    datos.append("prod_imagen", file_data);
                    datos.append("prod_nombre_comercial", $("#prod_nombre_comercial").val());
                    datos.append("prod_fabricante", $("#prod_fabricante").val());
                    datos.append("prod_ubicacion", $("#prod_ubicacion").val());
                    datos.append("prod_codigo", $("#prod_codigo").val());
                    datos.append("prod_descripcion", $("#prod_descripcion").val());
                    datos.append("comp_vendedor", $("#comp_vendedor").val());
                    datos.append("prod_barcode", $("#prod_barcode").val());
                    datos.append("prod_estado", $("#prod_estado").val());
                    datos.append("prod_stock_minimo", $("#prod_stock_minimo").val());
                    datos.append("prod_stock", $("#prod_stock").val());
                    datos.append("prod_precio_compra", $("#prod_precio_compra").val());
                    datos.append("prod_precio_unitario", $("#prod_precio_unitario").val());
                    datos.append("prod_precio_venta", $("#prod_precio_venta").val());
                    datos.append("comp_tipo_compra", $("#comp_tipo_compra").val());
                    datos.append("comp_detalle", $("#comp_detalle").val());
                    for (var value of datos.values()) {
                        console.log(value);
                    }
                    //alert(datos); return false;
                    $.ajax({
                        cahe: false,
                        contentType: false,
                        data: datos,
                        dataType: 'JSON',
                        enctype: 'multipart/form-data',
                        processData: false,
                        method:"POST",
                        url:"assets/inc/create_producto.php",
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

                $('#update_producto').click(function(){
                    var datos = $('#formulario_update_producto').serialize();
                    //alert(datos); return false;
                    $.ajax({
                        type:"POST",
                        url:"assets/inc/update_producto.php",
                        data:datos,
                        success:function(response){
                            if (response == 1) {
                                $('#tabla_producto').load('tabla_producto.php');
                                $('#modal_actualizar_producto').on('hidden.bs.modal', function (){
                                    //$(this).find('#formulario_actualizar_producto')[0].reset();
                                });
                                Swal.fire({
                                    type: 'success',
                                    title: 'Producto Actualizado Exitosamente.',
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
                $(document).on("click", ".btnAbastecerProducto", function() {
                    cadena = "prod_id=" + $(this).closest('tr').find('td:eq(0)').text();
                    //alert(cadena); return false;
                    $.ajax({
                        type: "POST",
                        url: "assets/inc/update_producto_id.php",
                        data: cadena,
                        success: function(response) {
                                if(response) {
                                    $('#abastecer_producto').load('modal_abastecer_producto.php');
                                    $('#modal_abastecer_producto').modal('show');
                                    $('#modal_abastecer_producto').on('shown.bs.modal',function(){
                                        $('#cantidad_comprada_abastecer').trigger('focus');
                                    });
                                }
                            }
                    });
                });
                $('#btn_abastecer_producto').click(function(){
                    var datos = $('#formulario_abastecer_producto').serialize();
                    alert(datos); return false;
                    $.ajax({
                        type:"POST",
                        url:"assets/inc/create_compra.php",
                        data:datos,
                        success:function(response){
                            if (response == 1) {
                                $('#tabla_producto').load('tabla_producto.php');
                                $('#modal_abastecer_producto').on('hidden.bs.modal', function (){
                                    $(this).find('#formulario_abastecer_producto')[0].reset();
                                });
                                Swal.fire({
                                    type: 'success',
                                    title: 'Producto Abastecido Exitosamente.',
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