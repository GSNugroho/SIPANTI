<html>
    <head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Read Data </title>

	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/timepicker.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <style>
    table {
            table-layout: fixed;
        }
        textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    </style>
    </head>
    <body style="overflow:auto" id="page-top">

    <!-- Page Wrapper -->
	  <div id="wrapper">

<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Isi -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard');?>">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-warehouse"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Inventaris</div>
    </a>
    
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('dashboard');?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
    Data Inventaris
    </div>
    <!-- Barang -->
    <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('monitor')?>">
    <i class="fas fa-boxes"></i>
    <span>Barang</span></a>
    </li>
    
    <!-- Mutasi -->
    <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('mutasi')?>">
    <i class="fas fa-dolly"></i>
    <span>Mutasi</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
    Maintenance
    </div>
        <!-- Perawatan -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-broom"></i>
        <span>Perawatan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Perawatan Inventaris:</h6>
            <a class="collapse-item" href="<?php echo base_url('jadwal')?>">Jadwal Perawatan</a>
            <a class="collapse-item active" href="<?php echo base_url('perawatan')?>">Daftar Riwayat Perawatan</a>
            <a class="collapse-item" href="<?php echo base_url('report/riwayat_perawatan')?>">Riwayat Perawatan</a>
        </div>
        </div>
    </li>

    <!-- Perbaikan -->
        
        <li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
			<i class="fas fa-wrench"></i>
			<span>Perbaikan</span>
			</a>
			<div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Perbaikan Inventaris:</h6>
				<a class="collapse-item" href="<?php echo base_url('perbaikan')?>">Daftar Perbaikan</a>
                <a class="collapse-item" href="<?php echo base_url('report/riwayat_perbaikan')?>">Riwayat Perbaikan</a>
			</div>
			</div>
		</li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
    Laporan
    </div>
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-clipboard"></i>
    <span>Laporan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Laporan</h6>
        <a class="collapse-item" href="<?php echo base_url('report/report_perawatan')?>">Laporan Perawatan</a>
        <a class="collapse-item" href="<?php echo base_url('report/report_perbaikan')?>">Laporan Perbaikan</a>
        <a class="collapse-item " href="<?php echo base_url('report/report_telat')?>">Laporan Keterlambatan</a>
        <a class="collapse-item" href="<?php echo base_url('report/report_sparepart')?>">Laporan Sparepart</a>
    </div>
    </div>
    </li>
    
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> -->

    <!-- Topbar Search -->
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a> -->
        <!-- Dropdown - Messages -->
        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                </div>
            </div>
            </form>
        </div>
        </li> -->

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <!-- <span class="badge badge-danger badge-counter">3+</span> -->
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
            Alerts Center
            </h6>
            <!-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
            </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
        </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <!-- <span class="badge badge-danger badge-counter">7</span> -->
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
            Message Center
            </h6>
            <!-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                <div class="small text-gray-500">Emily Fowler · 58m</div>
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                <div class="status-indicator"></div>
            </div>
            <div>
                <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                <div class="small text-gray-500">Jae Chun · 1d</div>
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                <div class="status-indicator bg-warning"></div>
            </div>
            <div>
                <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                <div class="status-indicator bg-success"></div>
            </div>
            <div>
                <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                <div class="small text-gray-500">Chicken the Dog · 2w</div>
            </div>
            </a> -->
            <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
        </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <!-- <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
        </a> -->
        <!-- Dropdown - User Information -->
        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
            </a>
            <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
            </a>
            <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
            </a>
        </div>
        </li> -->

    </ul>

    </nav>
    <!-- End of Topbar -->
    <div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
			<div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-primary">Data Perawatan</h6>
		</div>
    <div class="card-body">
    <h2>Detail Perawatan Inventaris</h2>
    <table>
    <tr><td>Kode Jadwal</td><td>:</td><td><?php echo $kd_jd; ?></td></tr>
    <tr><td>Tanggal Perawatan</td><td>:</td><td><?php echo date('Y-m-d', strtotime($tgl_jd)); ?></td></tr>
    <tr><td>Waktu Mulai Perawatan</td><td>:</td><td><?php echo date('H:i', strtotime($wtm)); ?></td></tr>
    <tr><td>Waktu Mulai Perawatan</td><td>:</td><td><?php echo date('H:i', strtotime($wts)); ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $vc_n_gugus; ?></td></tr>
    <?php
    if(!empty($kcasing)){
        if($kcasing == '1'){
            echo '<tr><td>Casing</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kcasing == '2'){
            echo '<tr><td>Casing</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kcasing == '3'){
            echo '<tr><td>Casing</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbaut)){
        if($kbaut == '1'){
            echo '<tr><td>Baut</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbaut == '2'){
            echo '<tr><td>Baut</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbaut == '3'){
            echo '<tr><td>Baut</td><td>:</td><td>Rusak/ Hilang</td></tr>';
        }
    }
    if(!empty($kksakelar)){
        if($kksakelar == '1'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kksakelar == '2'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kksakelar == '3'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkusb)){
        if($kkusb == '1'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkusb == '2'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkusb == '3'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kksound)){
        if($kksound == '1'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kksound == '2'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kksound == '3'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kklamp)){
        if($kklamp == '1'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kklamp == '2'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kklamp == '3'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kcpu)){
        if($kcpu == '1'){
            echo '<tr><td>CPU</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kcpu == '2'){
            echo '<tr><td>CPU</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kcpu == '3'){
            echo '<tr><td>CPU</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kfsb)){
        if($kfsb == '1'){
            echo '<tr><td>FSB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kfsb == '2'){
            echo '<tr><td>FSB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kfsb == '3'){
            echo '<tr><td>FSB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kchip)){
        if($kchip == '1'){
            echo '<tr><td>Chipset</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kchip == '2'){
            echo '<tr><td>Chipset</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kchip == '3'){
            echo '<tr><td>Chipset</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kmc1)){
        if($kmc1 == '1'){
            echo '<tr><td>Memory</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kmc1 == '2'){
            echo '<tr><td>Memory</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kmc1 == '3'){
            echo '<tr><td>Memory</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($konboard)){
        if($konboard == '1'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Baik</td></tr>';
        }else
        if($konboard == '2'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($konboard == '3'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kain)){
        if($kain == '1'){
            echo '<tr><td>Audio In</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kain == '2'){
            echo '<tr><td>Audio In</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kain == '3'){
            echo '<tr><td>Audio In</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kaout)){
        if($kaout == '1'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kaout == '2'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kaout == '3'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($klan)){
        if($klan == '1'){
            echo '<tr><td>LAN</td><td>:</td><td>Baik</td></tr>';
        }else
        if($klan == '2'){
            echo '<tr><td>LAN</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($klan == '3'){
            echo '<tr><td>LAN</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kepcie1)){
        if($kepcie1 == '1'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Baik</td></tr>';
        }else
        if($kepcie1 == '2'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kepcie1 == '3'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kepci1)){
        if($kepci1 == '1'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Baik</td></tr>';
        }else
        if($kepci1 == '2'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kepci1 == '3'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($keagp)){
        if($keagp == '1'){
            echo '<tr><td>AGP</td><td>:</td><td>Baik</td></tr>';
        }else
        if($keagp == '2'){
            echo '<tr><td>AGP</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($keagp == '3'){
            echo '<tr><td>AGP</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksiide)){
        if($ksiide == '1'){
            echo '<tr><td>IDE</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksside == '2'){
            echo '<tr><td>IDE</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksside == '3'){
            echo '<tr><td>IDE</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksatac1)){
        if($ksatac1 == '1'){
            echo '<tr><td>SATA</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksatac1 == '2'){
            echo '<tr><td>SATA</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksatac1 == '3'){
            echo '<tr><td>SATA</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kusb1)){
        if($kusb1 == '1'){
            echo '<tr><td>USB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kusb1 == '2'){
            echo '<tr><td>USB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kusb1 == '3'){
            echo '<tr><td>USB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kic24)){
        if($kic24 == '1'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kic24 == '2'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kic24 == '3'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kic4)){
        if($kic4 == '1'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kic4 == '2'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kic4 == '3'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicide)){
        if($kicide == '1'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Baik</td></tr>';
        }
    }
    ?>
    </table>
    
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
      </div>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>    
    
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
	  $('.time').clockTimePicker({});
	});

    $(document).ready(function(){      
    var i=1;  
    $('#addmem').click(function(){  
        i++;  
        $('#dynamic_field1').append('<tr id="rowm'+i+'" class="dynamic-added"><td></td><td>Memory <button type="button" name="remove1" id="'+i+'" class="btn btn-danger btn_remove1">X</button></td><td><input type="radio" name="kmc'+i+'" value="1"></td><td><input type="radio" name="kmc'+i+'" value="2" ></td><td><input type="radio" name="kmc'+i+'" value="3" ></td></tr>');  
    });
    $(document).on('click', '.btn_remove1', function(){  
        var button_id = $(this).attr("id");   
    $('#rowm'+button_id+'').remove();  
    });  
    });

    $(document).ready(function(){
        var i=1;
        $('#addex').click(function(){
            i++;
            $('#dynamic_field2').append('<tr id="rowex'+i+'" class="dynamic-added"><td></td><td>PCI Express 16 Slot <button type="button2" name="remove2" id="'+i+'" class="btn btn-danger btn_remove2">X</button></td><td><input type="radio" name="kepcie'+i+'" value="1"></td><td><input type="radio" name="kepcie'+i+'" value="2"></td><td><input type="radio" name="kepcie'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove2', function(){  
            var button_id = $(this).attr("id");   
            $('#rowex'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsa').click(function(){
            i++;
            $('#dynamic_field3').append('<tr id="rowsa'+i+'" class="dynamic-added"><td></td><td>Sata <button type="button" name="remove3" id="'+i+'" class="btn btn-danger btn_remove3">X</button></td><td><input type="radio" name="ksatac'+i+'" value="1"></td><td><input type="radio" name="ksatac'+i+'" value="2"></td><td><input type="radio" name="ksatac'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove3', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsa'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addus').click(function(){
            i++;
            $('#dynamic_field4').append('<tr id="rowus'+i+'" class="dynamic-added"><td></td><td>USB <button type="button" name="remove4" id="'+i+'" class="btn btn-danger btn_remove4">X</button></td><td><input type="radio" name="kusb'+i+'" value="1"></td><td><input type="radio" name="kusb'+i+'" value="2"></td><td><input type="radio" name="kusb'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove4', function(){  
            var button_id = $(this).attr("id");   
            $('#rowus'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addus2').click(function(){
            i++;
            $('#dynamic_field5').append('<tr id="rowus2'+i+'" class="dynamic-added"><td></td><td>USB 2.0 <button type="button" name="remove5" id="'+i+'" class="btn btn-danger btn_remove5">X</button></td><td><input type="radio" name="kbpcusb2c'+i+'" value="1"></td><td><input type="radio" name="kbpcusb2c'+i+'" value="2"></td><td><input type="radio" name="kbpcusb2c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove5', function(){  
            var button_id = $(this).attr("id");   
            $('#rowus2'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addata').click(function(){
            i++;
            $('#dynamic_field6').append('<tr id="rowata'+i+'" class="dynamic-added"><td></td><td>ATA <button type="button" name="remove6" id="'+i+'" class="btn btn-danger btn_remove6">X</button></td><td><input type="radio" name="katahdd'+i+'" value="1"></td><td><input type="radio" name="katahdd'+i+'" value="2"></td><td><input type="radio" name="katahdd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove6', function(){  
            var button_id = $(this).attr("id");   
            $('#rowata'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsatah').click(function(){
            i++;
            $('#dynamic_field7').append('<tr id="rowsatah'+i+'" class="dynamic-added"><td></td><td>SATA HDD <button type="button" name="remove7" id="'+i+'" class="btn btn-danger btn_remove7">X</button></td><td><input type="radio" name="ksatahdd'+i+'" value="1"></td><td><input type="radio" name="ksatahdd'+i+'" value="2"></td><td><input type="radio" name="ksatahdd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove7', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsatah'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsatas').click(function(){
            i++;
            $('#dynamic_field8').append('<tr id="rowsatas'+i+'" class="dynamic-added"><td></td><td>SATA SSD <button type="button" name="remove8" id="'+i+'" class="btn btn-danger btn_remove8">X</button></td><td><input type="radio" name="ksatassd'+i+'" value="1"></td><td><input type="radio" name="ksatassd'+i+'" value="2"></td><td><input type="radio" name="ksatassd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove8', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsatas'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addnvm').click(function(){
            i++;
            $('#dynamic_field9').append('<tr id="rownvm'+i+'" class="dynamic-added"><td></td><td>NVM <button type="button" name="remove9" id="'+i+'" class="btn btn-danger btn_remove9">X</button></td><td><input type="radio" name="knvmssd'+i+'" value="1"></td><td><input type="radio" name="knvmssd'+i+'" value="2"></td><td><input type="radio" name="knvmssd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove9', function(){  
            var button_id = $(this).attr("id");   
            $('#rownvm'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram1').click(function(){
            i++;
            $('#dynamic_field10').append('<tr id="rowram1'+i+'" class="dynamic-added"><td></td><td>DDR 1 <button type="button" name="remove10" id="'+i+'" class="btn btn-danger btn_remove10">X</button></td><td><input type="radio" name="kramd1c'+i+'" value="1"></td><td><input type="radio" name="kramd1c'+i+'" value="2"></td><td><input type="radio" name="kramd1c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove10', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram1'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram2').click(function(){
            i++;
            $('#dynamic_field11').append('<tr id="rowram2'+i+'" class="dynamic-added"><td></td><td>DDR 2 <button type="button" name="remove11" id="'+i+'" class="btn btn-danger btn_remove11">X</button></td><td><input type="radio" name="kramd2c'+i+'" value="1"></td><td><input type="radio" name="kramd2c'+i+'" value="2"></td><td><input type="radio" name="kramd2c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove11', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram2'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram3').click(function(){
            i++;
            $('#dynamic_field12').append('<tr id="rowram3'+i+'" class="dynamic-added"><td></td><td>DDR 3 <button type="button" name="remove12" id="'+i+'" class="btn btn-danger btn_remove12">X</button></td><td><input type="radio" name="kramd3c'+i+'" value="1"></td><td><input type="radio" name="kramd3c'+i+'" value="2"></td><td><input type="radio" name="kramd3c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove12', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram3'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram4').click(function(){
            i++;
            $('#dynamic_field13').append('<tr id="rowram4'+i+'" class="dynamic-added"><td></td><td>DDR 4 <button type="button" name="remove13" id="'+i+'" class="btn btn-danger btn_remove13">X</button></td><td><input type="radio" name="kramd4c'+i+'" value="1"></td><td><input type="radio" name="kramd4c'+i+'" value="2"></td><td><input type="radio" name="kramd4c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove13', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram4'+button_id+'').remove();  
    });
    });


    </script>
    </body>
</html>