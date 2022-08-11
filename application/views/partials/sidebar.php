<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <img src="<?= base_url() ?>assets/img/logogyg-sidebar.png" width="90" height="90">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>INICIO</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        GENERAL
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>MUNICPIOS PROG.</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">INFO:</h6>
                <a class="collapse-item" href="<?= base_url('Municipios') ?>">MUNICIPIOS ASIGNADOS</a>
                <a class="collapse-item" href="<?= base_url('Munucipio/Analiticos') ?>">ANALITICOS POR MUN.</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>PROGRAMAS</span>
        </a> -->
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="">PROGRAMA</a>
                <a class="collapse-item" href="utilities-border.html">COMPONENTES</a>
                <a class="collapse-item" href="utilities-animation.html">ACTIVIDADES</a>
                <a class="collapse-item" href="utilities-other.html">CALENDARIO</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrar
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Usuarios">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Usuarios</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Unidades">
            <i class="fas fa-fw fa-table"></i>
            <span>Unidades Responsables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php if($this->session->userdata('usuario') == 1): ?>
    <div class="sidebar-heading">
        Administrar usuarios
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Internos">
        <i class="fas fa-user-cog"></i>
            <span>Usuarios Internos</span></a>
    </li>
    <?php endif;?>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->