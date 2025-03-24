        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <span><?php echo ucfirst($_SESSION['nombre']); ?></span>
                                    <span class="user-level"><?php echo ucfirst($_SESSION['cargo']); ?></span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                   
                                    <li>
                                        <a href="cerrarSesion.php">
                                            <span class="link-collapse">Cerrar Sesion</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item">
                            <a href="index.php">
                                <i class="fas fa-user"></i>
                                <p>Inicio</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Comisiones</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="inicio.php">
                                            <span class="sub-item">Generar Comision</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="subirexcel.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        




                    </ul>
                </div>
            </div>
        </div>