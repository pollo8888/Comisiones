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


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases8">
                                <i class="fas fa-layer-group"></i>
                                <p>OC36</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases8">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="OC36.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases7">
                                <i class="fas fa-layer-group"></i>
                                <p>CUSN 01</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases7">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="CUSN01.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>CUSN-10 OCU_SL_QX</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="inicio.php">
                                            <span class="sub-item">Tablas</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="generarexcel.php">
                                            <span class="sub-item">Generar Excel</span>
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


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases2">
                                <i class="fas fa-layer-group"></i>
                                <p>DM-01 COB_DM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases2">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="DM-subirexcel.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases3">
                                <i class="fas fa-layer-group"></i>
                                <p>DM-02 COB_DM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases3">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="DM02-subirexcel.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases4">
                                <i class="fas fa-layer-group"></i>
                                <p>DM-04 COB_DM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases4">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="DM04-subirexcel.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases5">
                                <i class="fas fa-layer-group"></i>
                                <p>DM-05 COB_DM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases5">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="DM05-subirexcel.php">
                                            <span class="sub-item">Subir Excel</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bases6">
                                <i class="fas fa-layer-group"></i>
                                <p>EH01</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bases6">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="EH01-subirexcel.php">
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