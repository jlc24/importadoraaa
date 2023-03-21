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
                                        Perfil del Administrador
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!--========================================
                        =            Contenido Principal           =
                        =========================================-->
                        <div class="row">
                            <div class="col-xl-4 col-sm-5">
                                <!-- inicio tabla medicamento -->
                                <div class="card-box">
                                    <div class="card-body text-center">
                                        <img src="assets/images/users/avatar-1.png" alt="avatar" class="rounded-circle img-fluid" style="width: 200px; height: 200px;">
                                        <h5 class="my-3"><?php echo $row['adm_nombre'] ?></h5>
                                        <p class="text-muted mb-1"><?php echo $row['adm_rol']; ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="file" class="btn btn-outline-info ms-1" data-toggle="modal" data-target="#modal_cambiar_imagen" >Cambiar foto</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-sm-7">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12">
                                            <label for="">DATOS DE LA CUENTA</label>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nombre Completo : </p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['adm_nombre']; ?></p>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Usuario : </p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['adm_usuario']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Contraseña : </p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">*******************************</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btn btn-outline-info ms-1" id="update_user" name="update_user">Editar datos</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-12 -->
                        </div>
                        <!-- end row -->
                        <div id="modal_actualizar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">Actualizar Datos de la cuenta</h4>
                                    </div>
                                    <div class="modal-body" id="actualizar_usuario">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close_usuario" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                        <button type="button" id="update_usuario" class="btn btn-success waves-effect" data-dismiss="modal">Actualizar Cuenta</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
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
            $(document).on("click", '#update_user', function(){
                let adminid = 'prod_id='+<?php echo $adm_id?>;
                //alert(adminid); return false;
                $.ajax({
                    type: 'POST',
                    url: 'assets/inc/update_producto_id.php',
                    data: adminid,
                    success: function(r){
                        $("#actualizar_usuario").load("modal_update_administrador.php");
                        $("#modal_actualizar_usuario").modal('show');
                        $('#modal_actualizar_usuario').on('shown.bs.modal',function(){
                            $('#adm_pass_update').trigger('focus');
                        });
                    }
                })
            })
            $("#update_usuario").click(function(){
                let datos = $("#formulario_actualizar_administrador").serialize();
                //alert(datos); return false;
                Swal.fire({
                    type: 'info',
                    title: '¿Está seguro con modificar sus datos?',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: 'assets/inc/update_administrador.php',
                            data: datos,
                            success: function(r){
                                if (r) {
                                    //$("#modal_actualizar_usuario").modal('hiden');
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Se modificaron sus datos correctamente',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                    $('#modal_actualizar_usuario').on('hidden.bs.modal', function() {
                                        $(this).find('#formulario_actualizar_usuario')[0].reset();
                                    });
                                    window.location.href = 'profile.php';
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