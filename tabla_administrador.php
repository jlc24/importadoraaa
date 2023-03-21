        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=medicamento-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#administrador').dataTable({
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
                var table = $('#administrador').DataTable();
                $('#administrador_filter input').focus();
            });
        </script>

        <!--=================================================
        =            CONEXION A LA BASE DE DATOS            =
        ==================================================-->
        <?php include('assets/inc/conexion.php'); 
            session_start(); 
            $adm_id = $_SESSION['adm_id'];
        ?>

        <table id="administrador" class="table mb-0 table-sm table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead style="background-color: #DBEDC8;">
                <th data-priority="1">ID</th>
                <th data-priority="2">Nombre</th>
                <th data-priority="3">Usuario</th>
                <th data-priority="4">Estado</th>
                <th data-priority="5">Rol</th>
                <th data-priority="1">Op.</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM administrador";
                $resultado = mysqli_query($conexion, $sql);
                while ($registro = mysqli_fetch_assoc($resultado))
                {
                ?>
                    <tr>
                        <td ><?php echo $registro['adm_id']; ?></td>
                        <td><?php echo $registro["adm_nombre"]; ?></td>
                        <td><?php echo $registro["adm_usuario"]; ?></td>
                        <td><?php
                            if ($registro['adm_rol'] != 'admin') {
                                if ($registro['adm_estado'] == 1) {?>
                                    <a href="javascript:void(0);" class="btnActivarUser"><span class="badge badge-success">Activo</span></a>
                                <?php
                                }else { ?>
                                    <a href="javascript:void(0);" class="btnDesactivarUser"><span class="badge badge-danger">Inactivo</span></a>
                                <?php
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $registro["adm_rol"]; ?> </td>
                        <td>
                            <a href="javascript:void(0);" class="btnEditarAdministrador" title="Editar Administrador">
                                <i style="color: #DC5C05; --darkreader-inline-color:#DC5C05; font-size:20px;" class="far fa-edit"></i>
                            </a>
                            
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

