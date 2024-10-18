<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!--<a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('image/logo.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?= session()->get('nama') ?>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
       
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?php echo (current_url(true)->getSegment(1) == 'dashboard') ? 'menu-open' : ''; ?>">
                    <a href="/dashboard" class="nav-link <?php echo (current_url(true)->getSegment(1) == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if (session()->get('role') == 'Admin' || session()->get('role') == 'Supervisor' || session()->get('role') == 'Penginput' || session()->get('role') == 'Administrasi'): ?>
                    <li class="nav-item">
                        <a href="/biodata" class="nav-link <?php echo (current_url(true)->getSegment(1) == 'biodata') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Biodata</p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'Admin' || session()->get('role') == 'Supervisor' || session()->get('role') == 'Penginput' || session()->get('role') == 'Administrasi'): ?>

                    <li class="nav-item">
                        <a href="/survei" class="nav-link <?php echo (current_url(true)->getSegment(1) == 'survei') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Survei</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('role') == 'Admin' || session()->get('role') == 'Supervisor' || session()->get('role') == 'Administrasi'): ?>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a href="/template-bast" class="nav-link">
                    <span class="circle-icon"><i class="far fa-circle nav-icon"></i></span>
                    <p>Template BAST</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/template-spk" class="nav-link">
                    <span class="circle-icon"><i class="far fa-circle nav-icon"></i></span>
                    <p>Template SPK</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/template-kak-honor" class="nav-link">
                    <span class="circle-icon"><i class="far fa-circle nav-icon"></i></span>
                    <p>Template KAK Honor</p>
                </a>
            </li>
        </ul>
    </li>
<?php endif; ?>




                <?php if (session()->get('role') == 'Admin' || session()->get('role') == ''): ?>
    
                    <li class="nav-item">
                        <a href="/kelola-user" class="nav-link <?php echo (current_url(true)->getSegment(1) == 'kelola-user') ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="/logout" class="nav-link" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>