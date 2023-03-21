            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Menú de Navegación</li>
                            <li>
                                <a href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span> Panel de Control </span>
                                </a>
                            </li>
                            <?php
                                if ($row['adm_rol'] == 'admin') { ?>
                                    <li>
                                        <a href="administracion.php">
                                            <i class="fas fa-user"></i>
                                            <span> Administración </span>
                                        </a>
                                    </li>
                                <?php
                                }
                            ?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-briefcase-medical"></i>
                                    <span> Productos </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="producto.php">Lista de Productos</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="cliente.php">
                                    <i class="fas fa-user-injured"></i>
                                    <span> Clientes </span>
                                </a>
                            </li>
                            <li>
                                <a href="caja.php">
                                    <i class="dripicons-inbox"></i>
                                    <span> Caja </span>
                                </a>
                            </li>
                            <li>
                                <a href="pos.php">
                                    <i class="fe-shopping-cart"></i>
                                    <span> Punto de Ventas </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-chart-pie"></i>
                                    <span> Reportes </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="reporte_ventas.php">Ventas</a></li>
                                    <li><a href="reporte_compras.php">Compras</a></li>
                                    <li><a href="reporte_inversion.php">Inversión</a></li>
                                    <li><a href="reporte_pedidos.php">Pedidos</a></li>
                                    <li><a href="medicamento_top.php">Productos Más Vendidos</a></li>
                                </ul>
                            </li>
                            <li hidden>
                                <a href="#">
                                    <i class="far fa-sticky-note"></i>
                                    <span> Notas y Apuntes </span>
                                </a>
                            </li>
                            <?php
                                if ($row['adm_rol'] == 'admin') { ?>
                                    <li>
                                        <a href="config.php">
                                            <i class="fas fa-cog"></i>
                                            <span> Configuración </span>
                                        </a>
                                    </li>
                                <?php
                                } ?>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>