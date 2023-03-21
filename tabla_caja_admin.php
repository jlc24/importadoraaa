<?php
include("assets/inc/conexion.php");

session_start();
if (!isset($_SESSION['adm_id'])) {
	header('Location: login.php');
}
$hoy = date('Y-m-d');
$adm_id = $_SESSION['adm_id'];
$sql = "SELECT * FROM administrador WHERE adm_id = '$adm_id'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>
        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=detalle-->
        <script type="text/javascript">
            var table = $(document).ready(function() {
                $('#detalle_tabla').dataTable({
                    "paging": false,
                    "searching": false,
                    "order": [[0, "desc"]],
                    "info": false,
                    "oLanguage": {
                        "sEmptyTable": "Ningúna caja abierta hoy"
                    } //Para DataTables >=1.10
                });
            });
        </script>
        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=detalle-->
        <div class="col-sm-12">
            <div><label for="">Caja hoy: <?php echo $hoy; ?></label></div>
            <div class="table-responsive">
                <table id="detalle_tabla" class="table table-sm table-bordered table-condensed dt-responsive" width="100%">
                    <thead>
                        <th data-priority="1">Id</th>
                        <th data-priority="2">Administrador</th>
                        <th data-priority="3">Fecha Apertura</th>
                        <th data-priority="5">Fecha Cierre</th>
                        <th data-priority="4">Monto Inicial</th>
                        <th data-priority="6">Monto Final</th>
                        <th data-priority="8">Cambio</th>
                        <th data-priority="7">Op.</th>
                    </thead>
                    <tbody>
                    <?php
                        if ($row['adm_rol'] == 'admin') {
                            $sql="SELECT * FROM caja WHERE caja_fecha_apertura LIKE '%".$hoy."%';";
                        }else {
                            $sql="SELECT * FROM caja WHERE caja_fecha_apertura LIKE '%".$hoy."%' AND adm_id = '$adm_id';";
                        }
                        
                        $resultado=mysqli_query($conexion,$sql);
                        while($registro = mysqli_fetch_assoc($resultado)){
                            $datos=$registro['caja_id']."||".$registro['adm_id']."||".$registro['caja_administrador']."||".$registro['caja_fecha_apertura']."||".
                            $registro['caja_monto_inicial']."||".$registro['caja_fecha_cierre']."||".$registro['caja_monto_final']."||".$registro['caja_estado']."||".$registro['caja_cambio'];

                     ?>

                        <tr>
                            <td><?php echo $registro['caja_id']; ?></td>
                            <td><?php echo $registro['caja_administrador']; ?></td>
                            <td><?php echo $registro['caja_fecha_apertura']; ?></td>
                            <td><?php echo $registro['caja_fecha_cierre']; ?></td>
                            <td><?php echo 'Bs '.$registro['caja_monto_inicial']; ?></td>
                            <td><?php echo 'Bs '.$registro['caja_monto_final']; ?></td>
                            <td><?php echo $registro['caja_cambio']; ?></td>
                            <td>
                                <?php if( $registro['caja_estado']=='0'){ ?>
                                    <!-- HTML here CAJA CERRADA-->
                                    <a style="color:#ff0000; font-size:20px" href="#" title='Caja Cerrada'>
                                        <i class="icon-lock"></i>
                                    </a>
                                <?php }elseif ( $registro['caja_estado']=='1' && $registro['adm_id'] == $adm_id){ ?>
                                    <!-- HTML here CAJA ABIERTA-->
                                    <a style="color:#008f39; font-size:20px" href="#" data-toggle="modal" data-target="#modal_cerrar_caja" title='Cerrar Caja' onclick="CerrarCaja('<?php echo $registro['caja_id']; ?>')">
                                        <i class="icon-lock-open"></i>
                                    </a>
                                <?php } else { ?>
                                    <a style="color:#008f39; font-size:20px" href="#" title='Cerrar Caja' >
                                        <i class="icon-lock-open"></i>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                    </tbody>

                </table>
            </div>
        </div>
