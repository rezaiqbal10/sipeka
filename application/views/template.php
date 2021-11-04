<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <title>SIPEKA | BBWS PEMALI-JUANA</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <style>
    .swal2-popup{
        font-size: 1.6rem !important;
    }
    
    </style>
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('dashboard') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b> <img src="<?= base_url() ?>assets/img/profile/pu_logo.png"></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg "><b>SI</b>PEKA</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/img/profile/pu_logo.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->username; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/img/profile/pu_logo.png" class="img-circle" alt="User Image">

                                    <p> 
                                        <?= $this->fungsi->user_login()->name; ?>
                                        <small><?= $this->fungsi->user_login()->address; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/img/profile/pu_logo.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= ucfirst($this->fungsi->user_login()->name); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <li class="header">ADMIN</li>
                        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'data_kendaraan' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('data_kendaraan') ?>"><i class="fa fa-truck"></i> <span>Data Kendaraan</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'usulan_perbaikan_admin' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('usulan_perbaikan_admin') ?>"><i class="fa fa-truck"></i> <span>Usulan Perbaikan/Service</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'perpanjangan_stnk_admin' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('perpanjangan_stnk_admin') ?>"><i class="fa fa-truck"></i> <span>Perpanjangan STNK/BPKB</span></a>
                        </li>
                        <li class="treeview <?= $this->uri->segment(1) == 'kwitansi_perbaikan' || 
                        $this->uri->segment(1) == 'invoice_perbaikan' ? 'active' : ''?>">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Kwitansi Perbaikan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'kwitansi_perbaikan' ? 'class="active"' : ''?>><a href="<?= site_url('kwitansi_perbaikan') ?>"><i class="fa fa-circle-o"></i> Kwitansi Perbaikan</a></li>
                                <li <?= $this->uri->segment(1) == 'invoice_perbaikan' ? 'class="active"' : ''?>><a href="<?= site_url('invoice_perbaikan') ?>"><i class="fa fa-circle-o"></i> Invoice Perbaikan</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?= $this->uri->segment(1) == 'kwitansi_perpanjangan' || 
                        $this->uri->segment(1) == 'invoice_perpanjangan' ? 'active' : ''?>">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Kwitansi Perpanjangan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'kwitansi_perpanjangan' ? 'class="active"' : ''?>><a href="<?= site_url('kwitansi_perpanjangan') ?>"><i class="fa fa-circle-o"></i> Kwitansi Perpanjangan</a></li>
                                <li <?= $this->uri->segment(1) == 'invoice_perpanjangan' ? 'class="active"' : ''?>><a href="<?= site_url('invoice_perpanjangan') ?>"><i class="fa fa-circle-o"></i> Invoice Perpanjangan</a></li>
                            </ul>
                        </li>
                        <!-- <li <?= $this->uri->segment(1) == 'cetak_sip' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('cetak_sip') ?>"><i class="fa fa-truck"></i> <span>Cetak SIP</span></a>
                        </li> -->
                        <!-- <li <?= $this->uri->segment(1) == 'utility' ? 'class="active"' : ''?>>
                            <a href="<?= site_url('utility') ?>"><i class="fa fa-truck"></i> <span>Utility</span></a>
                        </li> -->
                        <li class="treeview <?= 
                        $this->uri->segment(1) == 'penyedia_jasa' ||
                        $this->uri->segment(1) == 'tim_pemeriksa' ||
                        $this->uri->segment(1) == 'sparepart' ||
                        $this->uri->segment(1) == 'satker' ? 'active' : ''?>">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Master File</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'penyedia_jasa' ? 'class="active"' : ''?>><a href="<?= site_url('penyedia_jasa') ?>"><i class="fa fa-circle-o"></i> Penyedia Jasa</a></li>
                                <li <?= $this->uri->segment(1) == 'tim_pemeriksa' ? 'class="active"' : ''?>><a href="<?= site_url('tim_pemeriksa') ?>"><i class="fa fa-circle-o"></i> Tim Permeriksa</a></li>
                                <li <?= $this->uri->segment(1) == 'sparepart' ? 'class="active"' : ''?>><a href="<?= site_url('sparepart') ?>"><i class="fa fa-circle-o"></i> Sparepart</a></li>
                                <li <?= $this->uri->segment(1) == 'satker' ? 'class="active"' : ''?>><a href="<?= site_url('satker') ?>"><i class="fa fa-circle-o"></i> Satker</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <li class="header">Setting</li>
                        <li><a href="<?= site_url('user') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>User</span></a></li>
                    <?php } ?>
                </ul>
            </section>
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2021 <a href="https://www.bbwspemalijuana.com">SIPEKA</a>.</strong> All rights
            reserved.
        </footer>

    </div>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->
    <!-- <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script> -->
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
    var flash = $('#flash').data('flash');
    if(flash){
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: flash
        
        })
    }
    $(document).on('click', '#btn-hapus', function(e){
e.preventDefault();
var link = $(this).attr('href');
Swal.fire({
  title: 'Apakah anda yakin?',
  text: "Data akan dihapus!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#00a65a',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus'
}).then((result) => {
  if (result.isConfirmed) {
    window.location = link;
  }
})
})

    </script>
    
    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>