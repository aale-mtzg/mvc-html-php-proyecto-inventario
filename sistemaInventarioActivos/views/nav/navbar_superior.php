<!--********** Menu/Sidebar Superior******-->

<nav class="navbar-superior navbar-expand-lg navbar-light fixed-top">
    <!--Boton de menu Sidebar-->
    <div class="menu-sidebar" id="sidebarCollapse"><span class="fas fa-bars"></span></div>
    <!--Boton de menu navbar-->
    <div class="menu-navbar"><span class="fas fa-bars"></span></div>
    <div class="logo">
        Control de Inventario
    </div>
    
    <div class="nav-items">
        <div class="sidebar-header">
            <i id="usuario-icon" class="fas fa-user"></i>
            <h1><?php /*echo $nombre */?></h1>
        </div>
        <li>
            <a href="<?php echo BASE_URL; ?>inicio"><i class="fas fa-home fa-lg"></i>Inicio</a>
        </li>
        <li>
            <a href="#movimientosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-clipboard fa-lg"></i>
                Movimientos
            </a>
            <ul class="collapse list-unstyled" id="movimientosSubmenu">
                <li>
                    <a href="<?php echo BASE_URL; ?>cambioUbicacion"><i class="fas fa-thumbtack"></i>Cambio de Ubicacion</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>prestamos"><i class="fas fa-people-carry"></i>Prestamo</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>bajasActivos"><i class="fas fa-trash-alt"></i>Bajas</a>
                </li>
            </ul> 
        </li>
        <li>
            <a href="#registroSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-plus fa-lg"></i>
                Nuevo Registro</a>
            <ul class="collapse list-unstyled" id="registroSubmenu">
                <li>
                    <a href="<?php echo BASE_URL; ?>registroEquipo"><i class="fas fa-desktop"></i>Equipo</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>registroMobiliario"><i class="fas fa-couch"></i>Mobiliario</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>registroRefacciones"><i class="fas fa-microchip"></i>Refacciones</a>
                </li>
            </ul> 
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>inventario"><i class="fas fa-box-open fa-lg"></i>Inventario</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>ubicaciones"><i class="fas fa-map-marked-alt fa-lg"></i>Ubicaciones</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>reportesInventario"><i class="fas fa-info-circle"></i>Reportes</a>
        </li>
        <!--Condicion para tipo de usuario: SOLO ADMINISTRADOR-->
        <?php/* if($tipo_usuario == 1) {*/ ?>
        <li>
            <a href="#configuracionesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cog"></i>
                Configuraciones
            </a>
            <ul class="collapse list-unstyled" id="configuracionesSubmenu">
                <li>
                    <a href="<?php echo BASE_URL; ?>configUsuarios"><i class="fas fa-users"></i>Usuarios</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>configUbicaciones"><i class="fas fa-map-marker-alt"></i>Ubicaciones</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>configEstatus"><i class="fas fa-check-double"></i>Estatus de Activos</a>
                </li>
                
            </ul> 
        </li>
        <?php /*}*/ ?>
    
    </div>
    <!--Logos del TEC-->
    <img src="./assets/img/itcj-escudo-rojo.png"  class="logos-img" alt="">
    <img src="./assets/img/logo-TNM.png"  class="logos-img" alt="">
    
    <!--Botones para menu de tamaño pequeño, menu navbar-->
    <div><a href="#" onclick="cerrarSesion()"><i class="fas fa-door-open logout-icon-navbar"></i></a></div>
    <div class="cancel-icon"><span class="fas fa-times"></span></div>
    
    <!--Boton de cerrar sesion-->
    <div><a href="#" onclick="cerrarSesion()"><i class="fas fa-door-open log-out-icon"></i></a></div>
</nav>