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
                                        <a href="#profile">
                                            <span class="link-collapse">Mi perfil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="link-collapse">Editar perfil</span>
                                        </a>
                                    </li>
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
                            <a data-toggle="collapse" href="#bases7">
                                <i class="fas fa-layer-group"></i>
                                <p>SIMF</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases7">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="simf.php">
                                            <span class="sub-item">SIMF</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Simf_Bjaa.php">
                                            <span class="sub-item">Proximos a expirar</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                    </ul>
                </div>
            </div>
        </div>