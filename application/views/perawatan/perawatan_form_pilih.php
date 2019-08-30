<html>
    <head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Pilih Parameter Perawatan </title>

	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/timepicker.min.css')?>" rel="stylesheet">
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
            <a class="collapse-item active" href="<?php echo base_url('perawatan')?>">Daftar Perawatan</a>
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
        <a class="collapse-item" href="<?php echo base_url('report/report_telat')?>">Laporan Keterlambatan</a>
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
           	<h6 class="m-0 font-weight-bold text-primary">Parameter Perawatan</h6>
		</div>
    <div class="card-body">
        <form action="<?php echo base_url().'perawatan/set_data_komponen';?>" method="post">
    <div class="table-responsive">
    <table border="1" align="center" class="table table-bordered">
        <tr>
        <th>Casing</th>
        <th><input type="checkbox" class="checkall" id="select_casing"></th>
        <th>Mainboard</th>
        <th><input type="checkbox" class="checkall" id="select_main"></th>
        <th>Harddisk</th>
        <th><input type="checkbox" class="checkall" id="select_hard"></th>
        <th>RAM</th>
        <th><input type="checkbox" class="checkall" id="select_ram"></th>
        <th>Peripheral</th>
        <th><input type="checkbox" class="checkall" id="select_peri"></th>
        <th>Card</th>
        <th><input type="checkbox" class="checkall" id="select_card"></th>
        <th>Kelistrikan</th>
        <th><input type="checkbox" class="checkall" id="select_lis"></th>
        </tr>
        <tr>
            <td>
                Casing
            </td>
            <td>
                <input type="checkbox" name="c_casing" value="1" class="casing">
            </td>
            <td>
                CPU
            </td>
            <td>
                <input type="checkbox" name="m_cpu" value="1" class="main">
            </td>
            <td>
                ATA
            </td>
            <td>
                <input type="checkbox" name="h_ata" value="1" class="hard">
            </td>
            <td>
                DDR 1
            </td>
            <td>
                <input type="checkbox" name="r_ddr1" value="1" class="ram">
            </td>
            <td>
                CD R/W
            </td>
            <td>
                <input type="checkbox" name="p_cdrw" value="1" class="peri">
            </td>
            <td>
                LAN Card
            </td>
            <td>
                <input type="checkbox" name="cr_lancard" value="1" class="card">
            </td>
            <td>
                Power Supply
            </td>
            <td>
                <input type="checkbox" name="l_powersupply" value="1" class="lis">
            </td>
        </tr>
        <tr>
            <td>
                Sekrup/ baut
            </td>
            <td>
                <input type="checkbox" name="c_sekrup" value="1" class="casing">
            </td>
            <td>
                FSB
            </td>
            <td>
                <input type="checkbox" name="m_fsb" value="1" class="main">
            </td>
            <td>
                SATA HDD
            </td>
            <td>
                <input type="checkbox" name="h_satah" value="1" class="hard">
            </td>
            <td>
                DDR 2
            </td>
            <td>
                <input type="checkbox" name="r_ddr2" value="1" class="ram">
            </td>
            <td>
                DVD R/W
            </td>
            <td>
                <input type="checkbox" name="p_dvdrw" value="1" class="peri">
            </td>
            <td>
                VGA Card
            </td>
            <td>
                <input type="checkbox" name="cr_vgacard" value="1" class="card">
            </td>
            <td>
                Kabel Power
            </td>
            <td>
                <input type="checkbox" name="l_kabelpower" value="1" class="lis">
            </td>
        </tr>
        <tr>
            <td>
                Kabel Sakelar
            </td>
            <td>
                <input type="checkbox" name="c_ksakelar" value="1" class="casing">
            </td>
            <td>
                Chipset
            </td>
            <td>
                <input type="checkbox" name="m_chipset" value="1" class="main">
            </td>
            <td>
                SATA SSD
            </td>
            <td>
                <input type="checkbox" name="h_satas" value="1" class="hard">
            </td>
            <td>
                DDR 3
            </td>
            <td>
                <input type="checkbox" name="r_ddr3" value="1" class="ram">
            </td>
            <td>
                ATA/ IDE Kabel
            </td>
            <td>
                <input type="checkbox" name="p_atakabel" value="1" class="peri">
            </td>
            <td>
                Firewire Card
            </td>
            <td>
                <input type="checkbox" name="cr_firecard" value="1" class="card">
            </td>
            <td>
                Kabel Power Monitor
            </td>
            <td>
                <input type="checkbox" name="l_kabelpowermon" value="1" class="lis">
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke USB
            </td>
            <td>
                <input type="checkbox" name="c_kusb" value="1" class="casing">
            </td>
            <td>
                Memory
            </td>
            <td>
                <input type="checkbox" name="m_memory" value="1" class="main">
            </td>
            <td>
                NVM
            </td>
            <td>
                <input type="checkbox" name="h_nvm" value="1" class="hard">
            </td>
            <td>
                DDR 4
            </td>
            <td>
                <input type="checkbox" name="r_ddr4" value="1" class="ram">
            </td>
            <td>
                SATA Kabel
            </td>
            <td>
                <input type="checkbox" name="p_satakabel" value="1" class="peri">
            </td>
            <td>
                LPT Card
            </td>
            <td>
                <input type="checkbox" name="cr_lptcard" value="1" class="card">
            </td>
            <td>
                Kabel Power SATA
            </td>
            <td>
                <input type="checkbox" name="l_kabelpowersata" value="1" class="lis">
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke Sound
            </td>
            <td>
                <input type="checkbox" name="c_ksound" value="1" class="casing">
            </td>
            <td>
                On Board Graphics
            </td>
            <td>
                <input type="checkbox" name="m_onboardg" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Keyboard
            </td>
            <td>
                <input type="checkbox" name="p_keyboard" value="1" class="peri">
            </td>
            <td>
                RS 232 Card
            </td>
            <td>
                <input type="checkbox" name="cr_rs232card" value="1" class="card">
            </td>
            <td>
                Kabel Molex Power
            </td>
            <td>
                <input type="checkbox" name="l_kabelmolexpow" value="1" class="lis">
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke Lampu Indikator
            </td>
            <td>
                <input type="checkbox" name="c_klampu" value="1" class="casing">
            </td>
            <td>
                Audio
            </td>
            <td>
                <input type="checkbox" name="m_audio" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Mouse
            </td>
            <td>
                <input type="checkbox" name="p_mouse" value="1" class="peri">
            </td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                LAN
            </td>
            <td>
                <input type="checkbox" name="m_lan" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Speaker
            </td>
            <td>
                <input type="checkbox" name="p_speaker" value="1" class="peri">
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PCI Express 16 Slot
            </td>
            <td>
                <input type="checkbox" name="m_pcie16" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Monitor CRT
            </td>
            <td>
                <input type="checkbox" name="p_monitorcrt" value="1" class="peri">
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PCI Express 1 Slot
            </td>
            <td>
                <input type="checkbox" name="m_pcie1" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Monitor LCD
            </td>
            <td>
                <input type="checkbox" name="p_monitorlcd" value="1" class="peri">
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                AGP
            </td>
            <td>
                <input type="checkbox" name="m_agp" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                VGA Kabel
            </td>
            <td>
                <input type="checkbox" name="p_vgakabel" value="1" class="peri">
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                IDE
            </td>
            <td>
                <input type="checkbox" name="m_ide" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                SATA
            </td>
            <td>
                <input type="checkbox" name="m_sata" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                USB
            </td>
            <td>
                <input type="checkbox" name="m_usb" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                24 pin ATX Main Power Connector
            </td>
            <td>
                <input type="checkbox" name="m_12pmain" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                4 pin ATX 12V Power Connector
            </td>
            <td>
                <input type="checkbox" name="m_4p12v" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                IDE Connector
            </td>
            <td>
                <input type="checkbox" name="m_idekonek" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Fan Header
            </td>
            <td>
                <input type="checkbox" name="m_cpufan" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                System Fan Header
            </td>
            <td>
                <input type="checkbox" name="m_sysfan" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Front Panel Header
            </td>
            <td>
                <input type="checkbox" name="m_fpanelh" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Front Panel Audio Header
            </td>
            <td>
                <input type="checkbox" name="m_fpanelah" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CD In Connector
            </td>
            <td>
                <input type="checkbox" name="m_cdinkonek" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                S/ PDIF Out Header
            </td>
            <td>
                <input type="checkbox" name="m_spdif" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                USB 2.0
            </td>
            <td>
                <input type="checkbox" name="m_usb2" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Chassis Intrusion Header
            </td>
            <td>
                <input type="checkbox" name="m_chassisin" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
            <td></td><td></td>
            <td>
                Power LED Header
            </td>
            <td>
                <input type="checkbox" name="m_powerled" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PS/2 Keyboard Port
            </td>
            <td>
                <input type="checkbox" name="m_ps2key" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PS/2 Mouse Port
            </td>
            <td>
                <input type="checkbox" name="m_ps2mou" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Parallel Port
            </td>
            <td>
                <input type="checkbox" name="m_paraport" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Serial Port
            </td>
            <td>
                <input type="checkbox" name="m_seriport" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Display Port
            </td>
            <td>
                <input type="checkbox" name="m_displayport" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Back Panel USB 2.0
            </td>
            <td>
                <input type="checkbox" name="m_busb2" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                System Voltage Detection
            </td>
            <td>
                <input type="checkbox" name="m_sysvoltdetec" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Temperature Detection
            </td>
            <td>
                <input type="checkbox" name="m_cputempdetec" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU/ System Fan Fail Warning
            </td>
            <td>
                <input type="checkbox" name="m_cpusysfail" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Fan Speed Control
            </td>
            <td>
                <input type="checkbox" name="m_cpufansp" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                BIOS
            </td>
            <td>
                <input type="checkbox" name="m_bios" value="1" class="main">
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_jd_ko" class="form-control" id="kd_jd_ko" value="<?php echo $kd_jd_ko;?>">
            <button type="submit" class="btn btn-primary">Pilih Komponen</button>
            </td>
            <td>
            <a href="<?php echo site_url('perawatan')?>" class="btn btn-default">Batal</a>
            </td>
        </tr>
    </table>
    </form>
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
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script>
        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_casing").click(function () {
            $('.casing').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".casing").click(function(){

        if($(".casing").length == $(".casing:checked").length) {
            $("#select_casing").attr("checked", "checked");
        } else {
            $("#select_casing").removeAttr("checked");
        }

        });
        });

        $(function(){
 
         // add multiple select / deselect functionality
        $("#select_main").click(function () {
             $('.main').attr('checked', this.checked);
        });

         // if all checkbox are selected, check the selectall checkbox
        // and viceversa
         $(".main").click(function(){

        if($(".main").length == $(".main:checked").length) {
             $("#select_main").attr("checked", "checked");
        } else {
             $("#select_main").removeAttr("checked");
        }

         });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_hard").click(function () {
            $('.hard').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".hard").click(function(){

        if($(".hard").length == $(".hard:checked").length) {
            $("#select_hard").attr("checked", "checked");
        } else {
            $("#select_hard").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_ram").click(function () {
            $('.ram').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".ram").click(function(){

        if($(".ram").length == $(".ram:checked").length) {
            $("#select_ram").attr("checked", "checked");
        } else {
            $("#select_ram").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_peri").click(function () {
            $('.peri').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".peri").click(function(){

        if($(".peri").length == $(".peri:checked").length) {
            $("#select_peri").attr("checked", "checked");
        } else {
            $("#select_peri").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_card").click(function () {
            $('.card').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".card").click(function(){

        if($(".card").length == $(".card:checked").length) {
            $("#select_card").attr("checked", "checked");
        } else {
            $("#select_card").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_lis").click(function () {
            $('.lis').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".lis").click(function(){

        if($(".lis").length == $(".lis:checked").length) {
            $("#select_lis").attr("checked", "checked");
        } else {
            $("#select_lis").removeAttr("checked");
        }

        });
        });
    </script>
    </body>
</html>