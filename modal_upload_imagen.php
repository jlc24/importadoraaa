    <!-- MODAL PARA REGISTRAR MEDICAMENTO -->
    <?php include("assets/inc/conexion.php");?>
<!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->

    <!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->
    <?php //session_start();
        //$admid = $_SESSION['adm_id'];
        // OBTENEMOS LOS DATOS DE LA HOJA DE RUTA QUE SE VA ACTUALIZAR
        $sql="SELECT * FROM producto WHERE prod_id = (SELECT prod_id FROM configuracion);";
        $result=mysqli_query($conexion,$sql);
        if (!empty($result)) {
            $rows = mysqli_fetch_assoc($result);
            //echo $rows;
        ?>
            <input type="hidden" name="prodid" id="prodid" value="<?php echo $rows['prod_id']; ?>">
            <form id="formulario_imagen_producto" class="parsley_create_producto" novalidate="">
                <div class="form-group row">
                    <h4 style="padding-left: 20px;"><?php echo $rows['prod_nombre_comercial']; ?></h4>
                </div>
                <div class="col-md-6">
                    <input type="file" id="img_producto" name="img_producto" class="img_producto" accept="image/png">
                    <p class="help-block">Peso máximo de la foto 2 MB</p>
                    <img src="assets/images/default/404.png" class="img-thumbnail ver_img" width="100px">
                </div>
            </form>
        <?php
        }
        ?>