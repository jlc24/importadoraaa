    <!-- MODAL PARA REGISTRAR MEDICAMENTO -->
    <?php include("assets/inc/conexion.php");?>
<!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->

    <!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->
    <?php //session_start();
        //$admid = $_SESSION['adm_id'];
        // OBTENEMOS LOS DATOS DE LA HOJA DE RUTA QUE SE VA ACTUALIZAR
        $sql="SELECT prod_imagen FROM producto WHERE prod_id = (SELECT prod_id FROM configuracion);";
        $result=mysqli_query($conexion,$sql);
        if (!empty($result)) {
            $rows = mysqli_fetch_assoc($result);
            //echo $rows;
        ?>
            <picture>
                <img src="<?php echo $rows['prod_imagen']; ?>" alt="imagen" width="600px" style="border-style: solid; border-color: transparent; border-radius: 10px;">
            </picture>
        <?php
        }
        ?>