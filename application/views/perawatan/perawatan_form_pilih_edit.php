    <html>
    <head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Tambah Data </title>

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
            <a class="collapse-item active" href="<?php echo base_url('perawatan')?>">Daftar Riwayat Perawatan</a>
        </div>
        </div>
    </li>

    <!-- Perbaikan -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('perbaikan')?>">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Perbaikan</span></a>
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
        <a class="collapse-item active" href="<?php echo base_url('report/report_telat')?>">Laporan Keterlambatan</a>
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

    <form action="<?php echo base_url().'perawatan/update_action_perawatan';?>" method="post">
    <table>
        <tr>
            <td>Waktu Mulai</td>
            <td><input class="time" type="text" value="00:00" name="wtm"></td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td><input class="time" type="text" value="00:00" name="wts"></td>
        </tr>
    </table>
    <table border="1">
        <tr>
            <th rowspan="2" align="center">Golongan</th>
            <th rowspan="2" align="center">Spesifikasi</th>
            <th colspan="3" align="center">Kondisi</th>
        </tr>
        <tr>
            <td>&nbsp;B&nbsp;</td>
            <td>K.B</td>
            <td>&nbsp;R&nbsp;</td>
        </tr>
        <tr>
            <td>Casing</td>
        
        <?php
            if(!empty($c_casing)){echo '
                                        <td>Casing</td>
                                        <td><input type="radio" name="kcasing" value="1"></td>
                                        <td><input type="radio" name="kcasing" value="2"></td>
                                        <td><input type="radio" name="kcasing" value="3"></td>
                                        </tr>';}
            if(!empty($c_sekrup)){echo '<tr>
                                        <td></td>
                                        <td>Sekrup/ Baut</td>
                                        <td><input type="radio" name="kbaut" value="1"></td>
                                        <td><input type="radio" name="kbaut" value="2"></td>
                                        <td><input type="radio" name="kbaut" value="3"></td>
                                        </tr>';}
            if(!empty($c_ksakelar)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Sakelar</td>
                                        <td><input type="radio" name="kksakelar" value="1"></td>
                                        <td><input type="radio" name="kksakelar" value="2"></td>
                                        <td><input type="radio" name="kksakelar" value="3"></td>
                                        </tr>';}
            if(!empty($c_kusb)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke USB</td>
                                        <td><input type="radio" name="kkusb" value="1"></td>
                                        <td><input type="radio" name="kkusb" value="2"></td>
                                        <td><input type="radio" name="kkusb" value="3"></td>
                                        </tr>';}
            if(!empty($c_ksound)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke Sound</td>
                                        <td><input type="radio" name="kksound" value="1"></td>
                                        <td><input type="radio" name="kksound" value="2"></td>
                                        <td><input type="radio" name="kksound" value="3"></td>
                                        </tr>';}
            if(!empty($c_klampu)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke Lampu Indikator</td>
                                        <td><input type="radio" name="kklamp" value="1"></td>
                                        <td><input type="radio" name="kklamp" value="2"></td>
                                        <td><input type="radio" name="kklamp" value="3"></td>
                                        </tr>';}
        ?>
        <tr>
            <td>Mainboard</td>
        <?php 
            if(!empty($m_cpu)){echo '
                                    <td>CPU</td>
                                    <td><input type="radio" name="kcpu" value="1"></td>
                                    <td><input type="radio" name="kcpu" value="2"></td>
                                    <td><input type="radio" name="kcpu" value="3"></td>
                                    </tr>';}
            if(!empty($m_fsb)){echo '<tr>
                                    <td></td>
                                    <td>FSB</td>
                                    <td><input type="radio" name="kfsb" value="1"></td>
                                    <td><input type="radio" name="kfsb" value="2"></td>
                                    <td><input type="radio" name="kfsb" value="3"></td>
                                    </tr>';}
            if(!empty($m_chipset)){echo '<tr>
                                    <td></td>
                                    <td>Chipset</td>
                                    <td><input type="radio" name="kchip" value="1"></td>
                                    <td><input type="radio" name="kchip" value="2"></td>
                                    <td><input type="radio" name="khcip" value="3"></td>
                                    </tr>';}
            if(!empty($m_memory)){echo '<tr>
                                    <td></td>
                                    <td>Memory</td>
                                    <td><input type="radio" name="kmc1" value="1"></td>
                                    <td><input type="radio" name="kmc1" value="2"></td>
                                    <td><input type="radio" name="kmc1" value="3"></td>
                                    </tr>';}
            if(!empty($m_onboardg)){echo '<tr>
                                    <td></td>
                                    <td>On Board Graphics</td>
                                    <td><input type="radio" name="konboard" value="1"></td>
                                    <td><input type="radio" name="konboard" value="2"></td>
                                    <td><input type="radio" name="konboard" value="3"></td>
                                    </tr>';}
            if(!empty($m_audio)){echo '<tr>
                                    <td></td>
                                    <td>In</td>
                                    <td><input type="radio" name="kain" value="1"></td>
                                    <td><input type="radio" name="kain" value="2"></td>
                                    <td><input type="radio" name="kain" value="3"></td>
                                    </tr><tr>
                                    <td>out</td>
                                    <td><input type="radio" name="kaout" value="1"></td>
                                    <td><input type="radio" name="kaout" value="2"></td>
                                    <td><input type="radio" name="kaout" value="3"></td>
                                    </tr>';}
            if(!empty($m_lan)){echo '<tr>
                                    <td></td>
                                    <td>LAN</td>
                                    <td><input type="radio" name="klan" value="1"></td>
                                    <td><input type="radio" name="klan" value="2"></td>
                                    <td><input type="radio" name="klan" value="3"></td>
                                    </tr>';}
            if(!empty($m_pcie16)){echo '<tr>
                                    <td></td>
                                    <td>PCI Express 16 Slot</td>
                                    <td><input type="radio" name="kepcie1" value="1"></td>
                                    <td><input type="radio" name="kepcie1" value="2"></td>
                                    <td><input type="radio" name="kepcie1" value="3"></td>
                                    </tr>';}
            if(!empty($m_pcie1)){echo '<tr>
                                    <td></td>
                                    <td>PCI Express 1 Slot</td>
                                    <td><input type="radio" name="kepci1" value="1"></td>
                                    <td><input type="radio" name="kepci1" value="2"></td>
                                    <td><input type="radio" name="kepci1" value="3"></td>
                                    </tr>';}
            if(!empty($m_agp)){echo '<tr>
                                    <td></td>
                                    <td>AGP<td>
                                    <td><input type="radio" name="keagp" value="1"></td>
                                    <td><input type="radio" name="keagp" value="2"></td>
                                    <td><input type="radio" name="keagp" value="3"></td>
                                    </tr>';}
            if(!empty($m_ide)){echo '<tr>
                                    <td></td>
                                    <td>IDE<td>
                                    <td><input type="radio" name="ksiide" value="1"></td>
                                    <td><input type="radio" name="ksiide" value="2"></td>
                                    <td><input type="radio" name="ksiide" value="3"></td>
                                    </tr>';}
            if(!empty($m_sata)){echo '<tr>
                                    <td></td>
                                    <td>Sata</td>
                                    <td><input type="radio" name="ksatac1" value="1"></td>
                                    <td><input type="radio" name="ksatac1" value="2"></td>
                                    <td><input type="radio" name="ksatac1" value="3"></td>
                                    </tr>';}
            if(!empty($m_usb)){echo '<tr>
                                    <td></td>
                                    <td>USB</td>
                                    <td><input type="radio" name="kusb1" value="1"></td>
                                    <td><input type="radio" name="kusb1" value="2"></td>
                                    <td><input type="radio" name="kusb1" value="3"></td>
                                    </tr>';}
            if(!empty($m_12pmain)){echo '<tr>
                                    <td></td>
                                    <td>24 Pin ATX Main Power Connector</td>
                                    <td><input type="radio" name="kic24" value="1"></td>
                                    <td><input type="radio" name="kic24" value="2"></td>
                                    <td><input type="radio" name="kic24" value="3"></td>
                                    </tr>';}
            if(!empty($m_4p12v)){echo '<tr>
                                    <td></td>
                                    <td>4 Pin ATX 12V Power Connector</td>
                                    <td><input type="radio" name="kic4" value="1"></td>
                                    <td><input type="radio" name="kic4" value="2"></td>
                                    <td><input type="radio" name="kic4" value="3"></td>
                                    </tr>';}
            if(!empty($m_idekonek)){echo '<tr>
                                    <td></td>
                                    <td>Ide Connector</td>
                                    <td><input type="radio" name="kicide" value="1"></td>
                                    <td><input type="radio" name="kicide" value="2"></td>
                                    <td><input type="radio" name="kicide" value="3"></td>
                                    </tr>';}
            if(!empty($m_cpufan)){echo '<tr>
                                    <td></td>
                                    <td>CPU Fan Header</td>
                                    <td><input type="radio" name="kicfan" value="1"></td>
                                    <td><input type="radio" name="kicfan" value="2"></td>
                                    <td><input type="radio" name="kicfan" value="3"></td>
                                    </tr>';}
            if(!empty($m_sysfan)){echo '<tr>
                                    <td></td>
                                    <td>System Fan Header</td>
                                    <td><input type="radio" name="kicsysfan" value="1"></td>
                                    <td><input type="radio" name="kicsysfan" value="2"></td>
                                    <td><input type="radio" name="kicsysfan" value="3"></td>
                                    </tr>';}
            if(!empty($m_fpanelh)){echo '<tr>
                                    <td></td>
                                    <td>Front Panel Header</td>
                                    <td><input type="radio" name="kicfpanhead" value="1"></td>
                                    <td><input type="radio" name="kicfpanhead" value="2"></td>
                                    <td><input type="radio" name="kicfpanhead" value="3"></td>
                                    </tr>';}
            if(!empty($m_fpanelah)){echo '<tr>
                                    <td></td>
                                    <td>Front Panel Audio Header</td>
                                    <td><input type="radio" name="kicfpanahead" value="1"></td>
                                    <td><input type="radio" name="kicfpanahead" value="2"></td>
                                    <td><input type="radio" name="kicfpanahead" value="3"></td>
                                    </tr>';}
            if(!empty($m_cdinkonek)){echo '<tr>
                                    <td></td>
                                    <td>CD In Connector</td>
                                    <td><input type="radio" name="kiccdcon" value="1"></td>
                                    <td><input type="radio" name="kiccdcon" value="2"></td>
                                    <td><input type="radio" name="kiccdcon" value="3"></td>
                                    </tr>';}
            if(!empty($m_spdif)){echo '<tr>
                                    <td></td>
                                    <td>S/ PDIF Out Header</td>
                                    <td><input type="radio" name="kicspdif" value="1"></td>
                                    <td><input type="radio" name="kicspdif" value="2"></td>
                                    <td><input type="radio" name="kicspdif" value="3"></td>
                                    </tr>';}
            if(!empty($m_usb2)){echo '<tr>
                                    <td></td>
                                    <td>USB 2.0</td>
                                    <td><input type="radio" name="kicusb2c1" value="1"></td>
                                    <td><input type="radio" name="kicusb2c1" value="2"></td>
                                    <td><input type="radio" name="kicusb2c1" value="3"></td>
                                    </tr>';}
            if(!empty($m_chassisin)){echo '<tr>
                                    <td></td>
                                    <td>Chassis Intrusion Header</td>
                                    <td><input type="radio" name="kiccih" value="1"></td>
                                    <td><input type="radio" name="kiccih" value="2"></td>
                                    <td><input type="radio" name="kiccih" value="3"></td>
                                    </tr>';}
            if(!empty($m_powerled)){echo '<tr>
                                    <td></td>
                                    <td>Power LED Header</td>
                                    <td><input type="radio" name="kicled" value="1"></td>
                                    <td><input type="radio" name="kicled" value="2"></td>
                                    <td><input type="radio" name="kicled" value="3"></td>
                                    </tr>';}
            if(!empty($m_ps2key)){echo '<tr>
                                    <td></td>
                                    <td>PS/ 2 Keyboard Port</td>
                                    <td><input type="radio" name="kbpcps2k" value="1"></td>
                                    <td><input type="radio" name="kbpcps2k" value="2"></td>
                                    <td><input type="radio" name="kbpcps2k" value="3"></td>
                                    </tr>';}
            if(!empty($m_ps2mou)){echo '<tr>
                                    <td></td>
                                    <td>PS/ 2 Mouse Port</td>
                                    <td><input type="radio" name="kbpcps2m" value="1"></td>
                                    <td><input type="radio" name="kbpcps2m" value="2"></td>
                                    <td><input type="radio" name="kbpcps2m" value="3"></td>
                                    </tr>';}
            if(!empty($m_paraport)){echo '<tr>
                                    <td></td>
                                    <td>Parallel Port</td>
                                    <td><input type="radio" name="kbpcplp" value="1"></td>
                                    <td><input type="radio" name="kbpcplp" value="2"></td>
                                    <td><input type="radio" name="kbpcplp" value="3"></td>
                                    </tr>';}
            if(!empty($m_seriport)){echo '<tr>
                                    <td></td>
                                    <td>Serial Port</td>
                                    <td><input type="radio" name="kbpcsp" value="1"></td>
                                    <td><input type="radio" name="kbpcsp" value="2"></td>
                                    <td><input type="radio" name="kbpcsp" value="3"></td>
                                    </tr>';}
            if(!empty($m_displayport)){echo '<tr>
                                    <td></td>
                                    <td>Display Port</td>
                                    <td><input type="radio" name="kbpcdp" value="1"></td>
                                    <td><input type="radio" name="kbpcdp" value="2"></td>
                                    <td><input type="radio" name="kbpcdp" value="3"></td>
                                    </tr>';}
            if(!empty($m_busb2)){echo '<tr>
                                    <td></td>
                                    <td>USB 2.0</td>
                                    <td><input type="radio" name="kbpcusb2c1" value="1"></td>
                                    <td><input type="radio" name="kbpcusb2c1" value="2"></td>
                                    <td><input type="radio" name="kbpcusb2c1" value="3"></td>
                                    </tr>';}
            if(!empty($m_sysvoltdetec)){echo '<tr>
                                    <td></td>
                                    <td>System Voltage Dectection</td>
                                    <td><input type="radio" name="khmsvd" value="1"></td>
                                    <td><input type="radio" name="khmsvd" value="2"></td>
                                    <td><input type="radio" name="khmsvd" value="3"></td>
                                    </tr>';}
            if(!empty($m_cputempdetec)){echo '<tr>
                                    <td></td>
                                    <td>CPU Temperature Dectection</td>
                                    <td><input type="radio" name="khmctd" value="1"></td>
                                    <td><input type="radio" name="khmctd" value="2"></td>
                                    <td><input type="radio" name="khmctd" value="3"></td>
                                    </tr>';}
            if(!empty($m_cpusysfail)){echo '<tr>
                                    <td></td>
                                    <td>CPU/ System Fan Fail Warning</td>
                                    <td><input type="radio" name="khmffw" value="1"></td>
                                    <td><input type="radio" name="khmffw" value="2"></td>
                                    <td><input type="radio" name="khmffw" value="3"></td>
                                    </tr>';}
            if(!empty($m_cpufansp)){echo '<tr>
                                    <td></td>
                                    <td>CPU Fan Speed Control</td>
                                    <td><input type="radio" name="khmfsc" value="1"></td>
                                    <td><input type="radio" name="khmfsc" value="2"></td>
                                    <td><input type="radio" name="khmfsc" value="3"></td>
                                    </tr>';}
            if(!empty($m_bios)){echo '<tr>
                                    <td></td>
                                    <td>BIOS</td>
                                    <td><input type="radio" name="kbios" value="1"></td>
                                    <td><input type="radio" name="kbios" value="2"></td>
                                    <td><input type="radio" name="kbios" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
            <td>Hard Disk</td>
        <?php
            if(!empty($h_ata)){echo '
                                    <td>ATA</td>   
                                    <td><input type="radio" name="katahdd1" value="1"></td>
                                    <td><input type="radio" name="katahdd1" value="2"></td>
                                    <td><input type="radio" name="katahdd1" value="3"></td>
                                    </tr>';}
            if(!empty($h_satah)){echo '<tr>
                                    <td></td>
                                    <td>SATA HDD</td>
                                    <td><input type="radio" name="ksatahdd1" value="1"></td>
                                    <td><input type="radio" name="ksatahdd1" value="2"></td>
                                    <td><input type="radio" name="ksatahdd1" value="3"></td>
                                    </tr>';}
            if(!empty($h_satas)){echo '<tr>
                                    <td></td>
                                    <td>SATA SSD</td>
                                    <td><input type="radio" name="ksatassd1" value="1"></td>
                                    <td><input type="radio" name="ksatassd1" value="2"></td>
                                    <td><input type="radio" name="ksatassd1" value="3"></td>
                                    </tr>';}
            if(!empty($h_nvm)){echo '<tr>
                                    <td></td>
                                    <td>NVM</td>
                                    <td><input type="radio" name="knvmssd1" value="1"></td>
                                    <td><input type="radio" name="knvmssd1" value="2"></td>
                                    <td><input type="radio" name="knvmssd1" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
            <td>RAM</td>
        <?php
            if(!empty($r_ddr1)){echo '
                                    <td>DDR 1</td>
                                    <td><input type="radio" name="kramd1c1" value="1"></td>
                                    <td><input type="radio" name="kramd1c1" value="2"></td>
                                    <td><input type="radio" name="kramd1c1" value="3"></td>
                                    </tr>';}
            if(!empty($r_ddr2)){echo '<tr>
                                    <td></td>
                                    <td>DDR 2</td>
                                    <td><input type="radio" name="kramd2c1" value="1"></td>
                                    <td><input type="radio" name="kramd2c1" value="2"></td>
                                    <td><input type="radio" name="kramd2c1" value="3"></td>
                                    </tr>';}
            if(!empty($r_ddr3)){echo '<tr>
                                    <td></td>
                                    <td>DDR 3</td>
                                    <td><input type="radio" name="kramd3c1" value="1"></td>
                                    <td><input type="radio" name="kramd3c1" value="2"></td>
                                    <td><input type="radio" name="kramd3c1" value="3"></td>
                                    </tr>';}
            if(!empty($r_ddr4)){echo '<tr>
                                    <td></td>
                                    <td>DDR 4</td>
                                    <td><input type="radio" name="kramd4c1" value="1"></td>
                                    <td><input type="radio" name="kramd4c1" value="2"></td>
                                    <td><input type="radio" name="kramd4c1" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
            <td>Peripheral</td>
        <?php
            if(!empty($p_cdrw)){echo '
                                    <td>CD RW</td>
                                    <td><input type="radio" name="kcdrw" value="1"></td>
                                    <td><input type="radio" name="kcdrw" value="2"></td>
                                    <td><input type="radio" name="kcdrw" value="3"></td>
                                    </tr>';}
            if(!empty($p_dvdrw)){echo '<tr>
                                    <td></td>
                                    <td>DVD RW</td>
                                    <td><input type="radio" name="kdvdrw" value="1"></td>
                                    <td><input type="radio" name="kdvdrw" value="2"></td>
                                    <td><input type="radio" name="kdvdrw" value="3"></td>
                                    </tr>';}
            if(!empty($p_atakabel)){echo '<tr>
                                    <td></td>
                                    <td>ATA/ IDE Cable</td>
                                    <td><input type="radio" name="kaic" value="1"></td>
                                    <td><input type="radio" name="kaic" value="2"></td>
                                    <td><input type="radio" name="kaic" value="3"></td>
                                    </tr>';}
            if(!empty($p_satakabel)){echo '<tr>
                                    <td></td>
                                    <td>SATA Cable</td>
                                    <td><input type="radio" name="ksatac" value="1"></td>
                                    <td><input type="radio" name="ksatac" value="2"></td>
                                    <td><input type="radio" name="ksatac" value="3"></td>
                                    </tr>';}
            if(!empty($p_keyboard)){echo '<tr>
                                    <td></td>
                                    <td>Keyboard</td>
                                    <td><input type="radio" name="kkey" value="1"></td>
                                    <td><input type="radio" name="kkey" value="2"></td>
                                    <td><input type="radio" name="kkey" value="3"></td>
                                    </tr>';}
            if(!empty($p_mouse)){echo '<tr>
                                    <td></td>
                                    <td>Mouse</td>
                                    <td><input type="radio" name="kmou" value="1"></td>
                                    <td><input type="radio" name="kmou" value="2"></td>
                                    <td><input type="radio" name="kmou" value="3"></td>
                                    </tr>';}
            if(!empty($p_speaker)){echo '<tr>
                                    <td></td>
                                    <td>Speaker</td>
                                    <td><input type="radio" name="kspea" value="1"></td>
                                    <td><input type="radio" name="kspea" value="2"></td>
                                    <td><input type="radio" name="kspea" value="3"></td>
                                    </tr>';}
            if(!empty($p_monitorcrt)){echo '<tr>
                                    <td></td>
                                    <td>Monitor CRT</td>
                                    <td><input type="radio" name="kmoncrt" value="1"></td>
                                    <td><input type="radio" name="kmoncrt" value="2"></td>
                                    <td><input type="radio" name="kmoncrt" value="3"></td>
                                    </tr>';}
            if(!empty($p_monitorlcd)){echo '<tr>
                                    <td></td>
                                    <td>Monitor LCD</td>
                                    <td><input type="radio" name="kmonlcd" value="1"></td>
                                    <td><input type="radio" name="kmonlcd" value="2"></td>
                                    <td><input type="radio" name="kmonlcd" value="3"></td>
                                    </tr>';}
            if(!empty($p_vgakabel)){echo '<tr>
                                    <td></td>
                                    <td>VGA Cable</td>
                                    <td><input type="radio" name="kvgac" value="1"></td>
                                    <td><input type="radio" name="kvgac" value="2"></td>
                                    <td><input type="radio" name="kvgac" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
            <td>Card</td>
        <?php 
            if(!empty($cr_lancard)){echo '
                                    <td>LAN Card</td>
                                    <td><input type="radio" name="klanc" value="1"></td>
                                    <td><input type="radio" name="klanc" value="2"></td>
                                    <td><input type="radio" name="klanc" value="3"></td>
                                    </tr>';}
            if(!empty($cr_vgacard)){echo '<tr>
                                    <td></td>
                                    <td>VGA Card</td>
                                    <td><input type="radio" name="kvgacrd" value="1"></td>
                                    <td><input type="radio" name="kvgacrd" value="2"></td>
                                    <td><input type="radio" name="kvgacrd" value="3"></td>
                                    </tr>';}
            if(!empty($cr_firecard)){echo '<tr>
                                    <td></td>
                                    <td>Firewire Card</td>
                                    <td><input type="radio" name="kfirec" value="1"></td>
                                    <td><input type="radio" name="kfirec" value="2"></td>
                                    <td><input type="radio" name="kfirec" value="3"></td>
                                    </tr>';}
            if(!empty($cr_lptcard)){echo '<tr>
                                    <td></td>
                                    <td>LPT Card</td>
                                    <td><input type="radio" name="klptc" value="1"></td>
                                    <td><input type="radio" name="klptc" value="2"></td>
                                    <td><input type="radio" name="klptc" value="3"></td>
                                    </tr>';}
            if(!empty($cr_rs232card)){echo '<tr>
                                    <td></td>
                                    <td>RS 232 CARD</td>
                                    <td><input type="radio" name="krsc" value="1"></td>
                                    <td><input type="radio" name="krsc" value="2"></td>
                                    <td><input type="radio" name="krsc" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
            <td>Kelistrikan</td>
        <?php
            if(!empty($l_powersupply)){echo '
                                    <td>Power Supply</td>
                                    <td><input type="radio" name="kpwrs" value="1"></td>
                                    <td><input type="radio" name="kpwrs" value="2"></td>
                                    <td><input type="radio" name="kpwrs" value="3"></td>
                                    </tr>';}
            if(!empty($l_kabelpower)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power</td>
                                    <td><input type="radio" name="kkpwr" value="1"></td>
                                    <td><input type="radio" name="kkpwr" value="2"></td>
                                    <td><input type="radio" name="kkpwr" value="3"></td>
                                    </tr>';}
            if(!empty($l_kabelpowermon)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power Monitor</td>
                                    <td><input type="radio" name="kkpwrmon" value="1"></td>
                                    <td><input type="radio" name="kkpwrmon" value="2"></td>
                                    <td><input type="radio" name="kkpwrmon" value="3"></td>
                                    </tr>';}
            if(!empty($l_kabelpowersata)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power SATA</td>
                                    <td><input type="radio" name="kkpwrsata" value="1"></td>
                                    <td><input type="radio" name="kkpwrsata" value="2"></td>
                                    <td><input type="radio" name="kkpwrsata" value="3"></td>
                                    </tr>';}
            if(!empty($l_kabelmolexpow)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Molex Power</td>
                                    <td><input type="radio" name="kkmolpwr" value="1"></td>
                                    <td><input type="radio" name="kkmolpwr" value="2"></td>
                                    <td><input type="radio" name="kkmolpwr" value="3"></td>
                                    </tr>';}
        ?>
        <tr>
        <td>
            Keterangan
            </td>
            <td colspan="4">
                <textarea name="ket" style="width: 674.5px; height: 80px;" ><?php //echo $ket;?></textarea>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_jd_ko" class="form-control" id="kd_jd_ko" value="<?php echo $kd_jd_ko;?>">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
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

	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script>
    $(document).ready(function() {
	  $('.time').clockTimePicker({});
	});
    </script>
    </body>
</html>