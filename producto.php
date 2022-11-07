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
                                
                                <!-- MODAL PARA REGISTRAR MEDICAMENTO -->
                                <div id="imagen" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <!--<img id="previsualizar" src="/assets/images/default/404.png" class="img-thumbnail" width="200px"> -->
                                                <form id="formulario_crear_producto" action="#" class="parsley_create_producto" novalidate="" method="POST">
                                                    <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                        </ol>
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <legend>Datos del Producto</legend>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label ui-front">Nombre Comercial:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="search" id="prod_nombre_comercial" name="prod_nombre_comercial" class="form-control form-control-sm" value="" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" parsley-trigger="change" data-parsley-error-message="‎Este valor es obligatorio.‎" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Fabricante:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="prod_fabricante" name="prod_fabricante" class="form-control form-control-sm" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Ubicación:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="prod_ubicacion" name="prod_ubicacion" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Codigo:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="prod_codigo" name="prod_codigo" class="form-control form-control-sm" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Descripcion:</label>
                                                                        <div class="col-md-6">
                                                                            <textarea class="form-control form-control-sm" name="prod_descripcion" id="prod_descripcion" cols="30" rows="auto"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Vendedor:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="comp_vendedor" name="comp_vendedor" class="form-control form-control-sm" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <legend>Datos de la Primera compra</legend>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Stock Minimo:</label>
                                                                        <div class="col-md-2">
                                                                            <input type="number" min="0" id="prod_stock_minimo" name="prod_stock_minimo" class="form-control form-control-sm" value="">
                                                                        </div>
                                                                        <label class="col-md-2 col-form-label">Stock:</label>
                                                                        <div class="col-md-2">
                                                                            <input type="number" min="0" id="prod_stock" name="prod_stock" class="form-control form-control-sm" value="0" parsley-trigger="change" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Precio de Compra (Bs):</label>
                                                                        <div class="col-md-2">
                                                                            <input type="number" min="0" id="prod_precio_compra" name="prod_precio_compra" class="form-control form-control-sm">
                                                                        </div>
                                                                        <label class="col-md-3 col-form-label">Precio de Venta (Bs):</label>
                                                                        <div class="col-md-2">
                                                                            <input type="number" min="0" id="prod_precio_venta" name="prod_precio_venta" class="form-control form-control-sm">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Código de Barras:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="prod_barcode" name="prod_barcode" class="form-control form-control-sm">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Estado:</label>
                                                                        <div class="col-md-6">
                                                                            <select class="custom-select custom-select-sm" id="prod_estado" name="prod_estado">
                                                                                <option value="ACTIVO">ACTIVO</option>
                                                                                <option value="INACTIVO">INACTIVO</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Tipo Compra</label>
                                                                        <div class="col-md-6">
                                                                            <select class="custom-select custom-select-sm" id="comp_tipo_compra" name="comp_tipo_compra">
                                                                                <option value="CONTADO">CONTADO</option>
                                                                                <option value="CREDITO">CRÉDITO</option>
                                                                                <option value="OTRO">OTRO</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Detalle:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="text" id="comp_detalle" name="comp_detalle" class="form-control form-control-sm" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Imagen:</label>
                                                                        <div class="col-md-6">
                                                                            <input type="file" id="prod_imagen" name="prod_imagen" class="prod_imagen" accept="image/png">
                                                                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                                                                            <img src="/assets/images/default/anonymous.png" class="img-thumbnail ver" width="100px">
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" id="create_producto" class="btn btn-purple waves-effect" data-dismiss="modal">Guardar</button>
                                                                </div>
                                                            </div>
                                                        <button  type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                                                            Anterior
                                                        </button>
                                                        <button  type="button" data-target="#carouselExampleIndicators" data-slide="next">
                                                            Siguiente
                                                        </button>
                                                    </div>
                                                </form>
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