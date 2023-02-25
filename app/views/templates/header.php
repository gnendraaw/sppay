<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPPAY | <?=$data['title']?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=BASE_URL?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=BASE_URL?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=BASE_URL?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPPAY</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if(!isset($_SESSION['user'])): ?>
            <?php elseif($_SESSION['user']['level']=='1'): ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?=$data['heading']=='dashboard' ? 'active' : ''?>">
                    <a class="nav-link" href="<?=BASE_URL?>/admin">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Komite
                </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?=$data['heading']=='manajemen spp' ? 'active' : ''?>">
                <a class="nav-link <?=$data['heading']=='manajemen spp' ? 'active' : ''?>" href="#" data-toggle="collapse" data-target="#manajemenSppCollapse"
                    aria-expanded="true" aria-controls="manajemenSppCollapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen SPP</span>
                </a>
                <div id="manajemenSppCollapse" class="collapse <?=$data['options']=='daftar spp' ? 'show' : ''?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">SPP: </h6>
                        <a class="collapse-item <?=$data['options']=='daftar spp' ? 'active' : ''?>" href="<?=BASE_URL?>/admin-spp">Daftar SPP</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sekolah
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?=$data['heading']=='manajemen kelas' ? 'active' : ''?>">
                <a class="nav-link <?=$data['heading']=='manajemen kelas' ? 'active' : ''?>" href="#" data-toggle="collapse" data-target="#manajemenKelasCollapse"
                    aria-expanded="true" aria-controls="manajemenKelasCollapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen Kelas</span>
                </a>
                <div id="manajemenKelasCollapse" class="collapse <?=$data['options']=='daftar kelas' ? 'show' : ''?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelas: </h6>
                        <a class="collapse-item <?=$data['options']=='daftar kelas' ? 'active' : ''?>" href="<?=BASE_URL?>/admin-kelas">Daftar Kelas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?=$data['heading']=='manajemen siswa' ? 'active' : ''?>">
                <a class="nav-link <?=$data['heading']=='manajemen siswa' ? 'active' : ''?>" href="#" data-toggle="collapse" data-target="#manajemenSiswaCollapse"
                    aria-expanded="true" aria-controls="manajemenSiswaCollapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen Siswa</span>
                </a>
                <div id="manajemenSiswaCollapse" class="collapse <?=$data['options']=='daftar siswa' ? 'show' : ''?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Siswa: </h6>
                        <a class="collapse-item <?=$data['options']=='daftar siswa' ? 'active' : ''?>" href="<?=BASE_URL?>/admin-siswa">Daftar Siswa</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?=$data['heading']=='manajemen petugas' ? 'active' : ''?>">
                <a class="nav-link <?=$data['heading']=='manajemen petugas' ? 'active' : ''?>" href="#" data-toggle="collapse" data-target="#manajemenPetugasCollapse"
                    aria-expanded="true" aria-controls="manajemenPetugasCollapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen Petugas</span>
                </a>
                <div id="manajemenPetugasCollapse" class="collapse <?=$data['options']=='daftar petugas' ? 'show' : ''?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Petugas: </h6>
                        <a class="collapse-item <?=$data['options']=='daftar petugas' ? 'active' : ''?>" href="<?=BASE_URL?>/admin-petugas">Daftar Petugas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <li class="nav-item <?=$data['options']=='pembayaran spp' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/admin-pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pembayaran SPP</span></a>
            </li>

            <li class="nav-item <?=$data['options']=='riwayat pembayaran' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/admin-riwayat-pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Riwayat Pembayaran</span></a>
            </li>

            <li class="nav-item <?=$data['options']=='laporan pembayaran' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/admin-laporan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Laporan Pembayaran</span></a>
            </li>
            <?php elseif($_SESSION['user']['level']=='2'): ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?=$data['heading']=='dashboard' ? 'active' : ''?>">
                    <a class="nav-link" href="<?=BASE_URL?>/petugas">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <li class="nav-item <?=$data['options']=='pembayaran spp' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/petugas-pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pembayaran SPP</span></a>
            </li>

            <li class="nav-item <?=$data['options']=='riwayat pembayaran' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/petugas-riwayat-pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Riwayat Pembayaran</span></a>
            </li>

            <?php else: ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=$data['heading']=='dashboard' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/petugas">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <li class="nav-item <?=$data['options']=='riwayat pembayaran' ? 'active' : ''?>">
                <a class="nav-link" href="<?=BASE_URL?>/riwayat-pembayaran">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Riwayat Pembayaran</span></a>
            </li>

            <?php endif ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['user']['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?=BASE_URL?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <?php if ($_SESSION['user']['level'] == '1'): ?>
                                <a class="dropdown-item" href="<?=BASE_URL?>/admin-profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <?php elseif($_SESSION['user']['level'] == '2'): ?>
                                <a class="dropdown-item" href="<?=BASE_URL?>/petugas-profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <?php else: ?>
                                <a class="dropdown-item" href="<?=BASE_URL?>/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <?php endif ?>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->