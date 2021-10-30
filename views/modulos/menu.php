<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-toggled sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="incidencias">
        <div class="sidebar-brand-icon rotate-n-4">
            <!--<i class="fas fa-laugh-wink"></i>-->
            <img src="views/assets/img/theme/logotipo.png" style="width:100%;">
        </div>
    </a>
<?php
    if ($_SESSION['perfil'] == '1' || $_SESSION['perfil'] == '2') {
?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Menu  Sucursales -->
    <li id="incidencias" class="nav-item">
        <a class="nav-link" href="incidencias">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Incidencias</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Dashboard -->
    <li id="inicio" class="nav-item">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li id="usuarios" class="nav-item">
        <a class="nav-link" href="usuarios">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Equipo</span>
        </a>
    </li>


     <hr class="sidebar-divider d-none d-md-block">
<?php }else if($_SESSION['perfil'] == 3 ){ ?>
    <hr class="sidebar-divider my-0">
    <!-- Menu  Sucursales -->
    <li id="incidencias" class="nav-item">
        <a class="nav-link" href="incidencias">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Incidencias</span>
        </a>
    </li>
    
    <!-- Divider -->
<?php }else{ ?>
    <hr class="sidebar-divider my-0">
    <!-- Menu  Sucursales -->
    <li id="incidencias" class="nav-item">
        <a class="nav-link" href="incidencias">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Incidencias</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

<?php } ?>
</ul>
