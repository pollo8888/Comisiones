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
                            <a href="index.php">
                                <i class="fas fa-user"></i>
                                <p>Inicio</p>
                            </a>

                        </li>

             


                        



                    </ul>
                </div>
            </div>
        </div>