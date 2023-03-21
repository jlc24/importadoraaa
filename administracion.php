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
                                        <a style="color:purple;" href="#" data-toggle="modal" data-target="#modal_crear_administrador" title="Registrar Administrador">
                                            <i class="far fa-plus-square"></i>
                                        </a>Administración
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!--========================================
                        =            Contenido Principal           =
                        =========================================-->
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-sm-8">
                                <!-- inicio tabla caja -->
                                <div class="card-box table-responsive" id="tabla_administrador">

                                </div>
                                <!-- fin tabla caja -->

                                <!-- Modales para Crear y Actualizar, Caja, Etc -->
                                <?php //include "modal_create_caja.php"; ?>
                                
                                <!-- Modales para Crear y Actualizar, Cajas -->

                            </div>
                            <?php //include "modal_cerrar_caja.php"; ?>
                            <?php include "modal_create_administrador.php"; ?>
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

        <!--================================  CLIENTES  ================================-->
        <script>
            //CARGAMOS LOS REGISTROS DE LA CAJA RELACIONADO AL ADMINISTRADOR
            $('#tabla_administrador').load('tabla_administrador.php');
            // COLOCAMOS EN FOCO EN EL INPUT NECESARIO AL ABRIR Y CERRAR CAJA
            $('#modal_crear_administrador').on('shown.bs.modal',function(){
                $('#adm_nombre').trigger('focus');
            });
           

            $(document).ready(function() {
                // REGISTRO DE UNA NUEVA CAJA
                $('#create_caja').click(function(){
                    //SI EL VALOR DEL MONTO INICIAL ES MAYOR O IGUAL A CERO Y DIFERENTE DE VACIO SE HABRE LA CAJA
                    if ($('#caja_monto_inicial').val() >= 0 && $('#caja_monto_inicial').val() != "") { 
                        var datos = $('#formulario_crear_caja').serialize();
                        //alert(datos); return false;
                        $.ajax({
                            type:"POST",
                            url:"assets/inc/create_caja.php",
                            data:datos,
                            success:function(response){
                                if (response == 1) {
                                    $('#tabla_caja').load('tabla_caja_admin.php');
                                    $('#modal_crear_caja').on('hidden.bs.modal', function (){
                                        $(this).find('#formulario_crear_caja')[0].reset();
                                    });
                                    /*$('#c_paciente')[0].reset();*/ //Limpia los inputs del formulario con id=c_paciente*/
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Apertura de Caja Exitosa',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Primero, cierre la caja abierta...',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }

                            }
                        });
                    } else {
                        Swal.fire({
                            type: 'info',
                            title: 'Ingrese, Monto de Apertura Válido...',
                            showConfirmButton: false,
                            timer: 2000,
                            onAfterClose: () => {
                                setTimeout(() => $("#caja_monto_inicial").focus(), 110);
                            }
                        })
                        return false;
                    }
                });
                // CIERRE DE LA CAJA ABIERTA
                $('#cerrar_caja').click(function(){
                    //PARA CERRAR CAJA VERIFICAMOS QUE EL MONTO FINAL Y CAMBIO NO SEAN VACIOS
                    caja_final = parseInt($('#caja_monto_final').val());
                    caja_cambio = parseInt($('#caja_cambio').val());
                    var datos = $('#formulario_cerrar_caja').serialize();
                    //alert(datos); return false;
                    if (caja_final > 0 && caja_cambio > 0) {
                        $.ajax({
                            type:"POST",
                            url:"assets/inc/update_caja.php",
                            data:datos,
                            success:function(response){
                                if (response == 1) {
                                    $('#tabla_caja').load('tabla_caja_admin.php');
                                    $('#modal_cerrar_caja').on('hidden.bs.modal', function (){
                                        $(this).find('#formulario_cerrar_caja')[0].reset();
                                    });
                                    /*$('#c_paciente')[0].reset();*/ //Limpia los inputs del formulario con id=c_paciente*/
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Cierre de Caja Exitosa',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'La Caja ya esta Cerrada',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }

                            }
                        });                    
                    } else {
                        Swal.fire({
                            type: 'info',
                            title: 'Debe Ingresar Monto de Cierre y Cambio',
                            showConfirmButton: false,
                            timer: 2000,
                            onAfterClose: () => {
                                setTimeout(() => $("#caja_monto_final").focus(), 110);
                            }
                        })
                        return false;
                    }

                }); 
            });
            $("#create_admin").click(function(){
                let datos = $("#formulario_crear_administrador").serialize();
                //alert(datos); return false;
                $.ajax({
                    type: "POST",
                    url: "assets/inc/create_administrador.php",
                    data: datos,
                    success:function(r){
                        if (r) {
                            Swal.fire({
                                type: 'success',
                                title: 'Registro de administrador exitoso',
                                showConfirmButton: false,
                                timer: 2000,
                            })
                            $("#tabla_administrador").load('tabla_administrador.php');
                            $('#modal_crear_administrador').on('hidden.bs.modal', function() {
                                $(this).find('#formulario_crear_administrador')[0].reset();
                            });
                        }else {
                            Swal.fire({
                                type: 'warning',
                                title: 'No se realizó el registro',
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    }
                })
            })
            $(document).on("click", ".btnEditarAdministrador", function() {
                let dato = "prod_id="+$(this).closest('tr').find('td:eq(0)').text();
                alert(dato); return false;
            })
            $(document).on("click", ".btnActivarUser", function() {
                let dato = "adm_id="+$(this).closest('tr').find('td:eq(0)').text();
                let nombre = $(this).closest('tr').find('td:eq(1)').text();
                //alert(dato); return false;
                Swal.fire({
                    type: 'info',
                    title: '¿Desea Inhabilitar al usuario '+nombre+' del sistema de ventas?.',
                    text: 'El usuario no podrá iniciar sesión ni realizar ventas',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: 'assets/inc/desactivar_estado.php',
                            data: dato,
                            success: function(r) {
                                if (r) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Se inhabilitó al usuario exitosamente',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                    $("#tabla_administrador").load('tabla_administrador.php');
                                }else{
                                    Swal.fire({
                                        type: 'danger',
                                        title: 'NO se pudo procesar',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        })
                    }
                })
            })
            $(document).on("click", ".btnDesactivarUser", function() {
                let dato = "adm_id="+$(this).closest('tr').find('td:eq(0)').text();
                let nombre = $(this).closest('tr').find('td:eq(1)').text();
                //alert(nombre); return false;
                Swal.fire({
                    type: 'info',
                    title: '¿Desea habilitar al usuario '+nombre+' al sistema de ventas?.',
                    text: 'El usuario podra iniciar sesión y realizar ventas',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: 'assets/inc/activar_estado.php',
                            data: dato,
                            success: function(r){
                                if (r) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Se habilitó al usuario exitosamente',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                    $("#tabla_administrador").load('tabla_administrador.php');
                                }else{
                                    Swal.fire({
                                        type: 'danger',
                                        title: 'NO se pudo procesar',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        })
                    }
                })
            })
        </script>
    </body>
</html>