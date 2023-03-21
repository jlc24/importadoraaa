<!-- MODAL PARA REGISTRAR MEDICAMENTO -->
<?php include("assets/inc/conexion.php");?>
<!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->

    <!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->
    <?php //session_start();
        //$admid = $_SESSION['adm_id'];
        // OBTENEMOS LOS DATOS DE LA HOJA DE RUTA QUE SE VA ACTUALIZAR
        $sql="SELECT * FROM administrador WHERE adm_id = (SELECT prod_id FROM configuracion);";
        $result=mysqli_query($conexion,$sql);
        if (!empty($result)) {
            $rows = mysqli_fetch_assoc($result);
            //echo $rows;
        ?>
            <form class="form-horizontal" id="formulario_actualizar_administrador">
                <div class="form-group row" hidden>
                    <label class="col-md-5 col-form-label" for="adm_id">ID</label>
                    <div class="col-md-7">
                        <input type="text" min="0" id="adm_id" name="adm_id" class="form-control form-control-sm" value="<?php echo $rows['adm_id'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label" for="adm_nombre_update">Nombre Completo :</label>
                    <div class="col-md-7">
                        <input type="text" id="adm_nombre_update" name="adm_nombre_update" class="form-control form-control-sm" value="<?php echo $rows['adm_nombre'] ?>" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label" for="adm_usuario_update">Usuario :</label>
                    <div class="col-md-7">
                        <input type="text" id="adm_usuario_update" name="adm_usuario_update" class="form-control form-control-sm" value="<?php echo $rows['adm_usuario'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label" for="adm_pass_update">Nueva Contraseña :</label>
                    <div class="col-md-7">
                        <input type="password" id="adm_pass_update" name="adm_pass_update" class="form-control form-control-sm" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label" for="adm_pass_confirm">Confirmar Contraseña :</label>
                    <div class="col-md-7">
                        <input type="password" id="adm_pass_confirm" name="adm_pass_confirm" class="form-control form-control-sm" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label" for="adm_rol_update">Rol Usuario : </label>
                    <div class="col-md-7">
                        <input type="text" id="adm_rol_update" name="adm_rol_update" class="form-control form-control-sm" value="<?php echo $rows['adm_rol']; ?>" readonly>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>