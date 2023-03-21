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
<html lang="es">
    <head>
        <?php include 'assets/inc/head.php'; ?>
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
                                        <a style="color:purple;" href="#" data-toggle="modal" data-target="#modal_crear_cliente" title="Registrar Cliente">
                                            <i class="far fa-plus-square"></i>
                                        </a>Administración de Clientes
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
                                <div class="card-box table-responsive" id="tabla_cliente">

                                </div>
                                <!-- fin tabla medicamento -->

                                <?php include "modal_create_cliente.php"; ?>
                                <?php include "modal_update_cliente.php"; ?>

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

        <!--=============================  CLIENTES  =============================-->
        <script>
            function EditarCliente(datos){
                //alert(datos);
                vector=datos.split('||');
                $('#cli_id').val(vector[0]);
                $('#cli_ci_nit_update').val(vector[1]);
                $('#cli_nombre_update').val(vector[2]);
                $('#cli_genero_update').val(vector[3]);
                $('#cli_direccion_update').val(vector[4]);
                $('#cli_celular_update').val(vector[5]);
            }

            function EliminarCliente(datos) {
                vector = datos.split('||');
                Swal.fire({
                    title: 'Se Borrará a ' + vector[1],
                    text: "No podrás revertir esto!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminarlo!'
                }).then((result) => {
                    if(result.value) {
                        cadena = "id=" + vector[0];
                        //alert(cadena);
                        $.ajax({
                            url: "assets/inc/delete_cliente.php",
                            data: cadena,
                            type: "POST",
                            success: function(response) {
                                if(response == 1) {
                                    $('#tabla_cliente').load('tabla_cliente.php');
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Tu registro a sido Borrado.',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        });
                    }
                })
            }
            //------------------------------------------------------------------------------------//
            //------------------------------------------------------------------------------------//
            $(document).ready(function() {
            // 1. CARGAMOS LA TABLA DE CLIENTES
                $('#tabla_cliente').load('tabla_cliente.php');
            // COLOCAMOS EN FOCO EN EL INPUT CI/NIT
                $('#modal_crear_cliente').on('shown.bs.modal',function(){
                    $('#cli_ci_nit').trigger('focus');
                });
            // 2.  REGISTRO DE UN NUEVO CLIENTE
                $('#create_cliente').click(function(){
                    var datos = $('#formulario_crear_cliente').serialize();
                    //alert(datos); return false;
                    $.ajax({
                        type:"POST",
                        url:"assets/inc/create_cliente.php",
                        data:datos,
                        success:function(response){
                            if (response == 1) {
                                $('#tabla_cliente').load('tabla_cliente.php');
                                $('#modal_crear_cliente').on('hidden.bs.modal', function (){
                                    $(this).find('#formulario_crear_cliente')[0].reset();
                                });
                                /*$('#c_paciente')[0].reset();*/ //Limpia los inputs del formulario con id=c_paciente*/
                                Swal.fire({
                                    type: 'success',
                                    title: 'Cliente Agregado Exitosamente.',
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
            // 3. ACTUALIZACION DE DATOS DEL CLIENTE
                $('#update_cliente').click(function(){
                    var datos = $('#formulario_actualizar_cliente').serialize();
                    //alert(datos); return false;
                    $.ajax({
                        type:"POST",
                        url:"assets/inc/update_cliente.php",
                        data:datos,
                        success:function(response){
                            if(response==1){
                                $('#tabla_cliente').load('tabla_cliente.php');
                                Swal.fire({
                                  type: 'success',
                                  title: 'Actualizacion Exitosamente.',
                                  showConfirmButton: false,
                                      timer: 2000//1500
                                  })
                            }else{
                                Swal.fire({
                                  type: 'error',
                                  title: 'Se ha Producido un Error.',
                                  showConfirmButton: false,
                                      timer: 2000//1500
                                  })
                            }
                        }
                    });
                });
            //------------------------------------------------------------------------------------//
            //------------------------------------------------------------------------------------//
            });
        </script>
    </body>
</html>