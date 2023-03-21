<!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=medicamento-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#cliente').dataTable({
            responsive: true,
            columnDefs: [],
            "lengthMenu": [15, 25, 50, 100],
            /* Disable initial sort */
            "aaSorting": [],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        //var versionNo = $.fn.dataTable.version;
        //alert(versionNo);
        var table = $('#cliente').DataTable();
        $('#cliente_filter input').focus();
    });
</script>

<!--=================================================
=            CONEXION A LA BASE DE DATOS            =
==================================================-->
<?php include('assets/inc/conexion.php'); 
    session_start();
    if (!isset($_SESSION['adm_id'])) {
        header('Location: login.php');
    }
    $adm_id = $_SESSION['adm_id'];
    $sql = "SELECT * FROM administrador WHERE adm_id = '$adm_id'";
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
?>

<table id="cliente" class="table mb-0 table-sm table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead style="background-color: #DBEDC8;" align="center">
        <th data-priority="1">CI / NIT</th>
        <th data-priority="3">Nombre</th>
        <th data-priority="4">Dirección</th>
        <th data-priority="2">Celular</th>
        <th data-priority="6">Op.</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT *FROM cliente ORDER BY cli_id";
        $resultado = mysqli_query($conexion, $sql);
        while ($registro = mysqli_fetch_assoc($resultado))
        {
            $datos = $registro["cli_id"] . "||" . $registro["cli_ci_nit"] . "||" . $registro["cli_nombre"] . "||" . $registro["cli_genero"] . "||" . $registro["cli_direccion"] . "||" . $registro["cli_celular"] . "||" . $registro["cli_fecha_registro"];
        ?>
            <tr>
                <td><?php echo $registro["cli_ci_nit"]; ?></td>
                <td><?php echo $registro["cli_nombre"]; ?></td>
                <td><?php echo $registro["cli_direccion"]; ?></td>
                <td align="center"><a href="https://api.whatsapp.com/send?phone=<?php echo $registro["cli_celular"]; ?>&text=Hola,%20buenos%20dias" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp" style="font-size: 2em;"></i></a></td>
                <td align="center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <?php
                        if ($row['adm_rol'] == 'admin') { ?>
                            <a class="btn btn-outline-primary" type="button" href="#" data-toggle="modal" data-target="#modal_actualizar_cliente" onclick="EditarCliente('<?php echo $datos; ?>')" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-outline-danger" type="button" href="#" title="Eliminar" onclick="EliminarCliente('<?php echo $registro["cli_id"] . "||" . $registro["cli_nombre"]; ?>')">
                                <i class="far fa-trash-alt"></i>
                            </a>
                     <?php    
                        }
                        ?>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

