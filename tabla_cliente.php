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
<?php include('assets/inc/conexion.php'); ?>

<table id="cliente" class="table mb-0 table-sm table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead style="background-color: #DBEDC8;">
        <th data-priority="1">CI / NIT</th>
        <th data-priority="3">Nombre</th>
        <th data-priority="5">Dirección</th>
        <th data-priority="4">Celular</th>
        <th data-priority="6">Fecha de Registro</th>
        <th data-priority="2">Op.</th>
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
                <td> <a href="https://wa.me/<?php echo $registro["cli_celular"]; ?>"><i class="fab fa-whatsapp" style="font-size: 2em;"></i></a></td>
                <td><?php echo date_format(date_create($registro["cli_fecha_registro"]), 'd/m/Y'); ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        
                            <a class="btn btn-outline-primary" type="button" href="#" data-toggle="modal" data-target="#modal_actualizar_cliente" onclick="EditarCliente('<?php echo $datos; ?>')" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-outline-danger" type="button" href="#" title="Eliminar" onclick="EliminarCliente('<?php echo $registro["cli_id"] . "||" . $registro["cli_nombre"]; ?>')">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

