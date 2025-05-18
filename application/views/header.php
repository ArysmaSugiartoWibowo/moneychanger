<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$toko->nama_toko?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/toast-master/css/jquery.toast.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/dist/summernote.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
       <!-- Font Awesome CSS -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

       <!-- ttd -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
       <!--  -->

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light"> <i class="nav-icon fas fa-fw fa-home"></i> <?=$toko->nama_toko?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <!--  -->
                        <!-- <li class="nav-header">Beranda</li> -->
                        <li class="nav-item has-treeview">
                                <a href="<?= base_url() ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-face-smile"></i>
                                    <p>
                                        Main
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_wa') ?>" class="nav-link">
                                <i class="nav-icon fa-brands fa-whatsapp"></i>
                                    <p>
                                        Kelola Whats App
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_media/edit/1') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                    <p>
                                        Kelola Media
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_about/edit/1') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-address-card"></i>
                                    <p>
                                        Kelola Tentang Kami
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_owner/edit/1') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-secret"></i>
                                    <p>
                                        Kelola Data Owner
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_toko/edit/1') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-home"></i>
                                    <p>
                                        Kelola Data Toko
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_jumbotron/edit/1') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-image"></i>
                                    <p>
                                        Kelola Data Jumbotron
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('controller_kurs') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                    <p>
                                        Kelola Data Kurs
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('auth/change_password') ?>" class="nav-link">
                                <i class="nav-icon fa-solid fa-key"></i>
                                    <p>
                                        Ganti_password
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                            <a href="<?= base_url('auth/Logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                   Logout
                                </p>
                            </a>
                        </li>
                   
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
