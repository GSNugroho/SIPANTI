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

    <form action="<?php echo base_url().'perawatan/update_action_perawatan';?>" method="post">
    <table>
        <tr>
            <td>Waktu Mulai</td>
            <td><input class="time" type="text" value="<?php echo date('H:i', strtotime($wtm))?>" name="wtm"></td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td><input class="time" type="text" value="<?php echo date('H:i', strtotime($wts))?>" name="wts"></td>
        </tr>
    </table>
    <table border="1" width="55%">
        <tr>
            <th rowspan="2" align="center" width="10%">Golongan</th>
            <th rowspan="2" align="center" width="25%">Spesifikasi</th>
            <th colspan="3" align="center" width="15%">Kondisi</th>
        </tr>
        <tr>
            <td width="5%">&nbsp;B&nbsp;</td>
            <td width="5%">K.B</td>
            <td width="5%">&nbsp;R&nbsp;</td>
        </tr>
        <tr>
            <td>Casing</td>
        </tr>
        <?php
            if(!empty($c_casing)){echo '<tr>
                                        <td></td>
                                        <td>Casing</td>';
                                        if($kcasing=='1'){
                                            echo '<td><input type="radio" name="kcasing" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kcasing" value="1"></td>';
                                        }
                                        if($kcasing=='2'){
                                            echo '<td><input type="radio" name="kcasing" value="2" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kcasing" value="2"></td>';
                                        }
                                        if($kcasing=='3'){
                                            echo '<td><input type="radio" name="kcasing" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kcasing" value="3"></td>';
                                        }
                                    echo '</tr>';}
            if(!empty($c_sekrup)){echo '<tr>
                                        <td></td>
                                        <td>Sekrup/ Baut</td>';
                                        if($kbaut=='1'){
                                            echo '<td><input type="radio" name="kbaut" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kbaut" value="1"></td>';
                                        }
                                        if($kbaut=='2'){
                                            echo '<td><input type="radio" name="kbaut" value="2" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kbaut" value="2"></td>';
                                        }
                                        if($kbaut=='3'){
                                            echo '<td><input type="radio" name="kbaut" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kbaut" value="3"></td>';
                                        }
                                    echo'</tr>';}
            if(!empty($c_ksakelar)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Sakelar</td>';
                                        if($kksakelar == '1'){
                                            echo '<td><input type="radio" name="kksakelar" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksakelar" value="1"></td>';
                                        }
                                        if($kksakelar == '2'){
                                            echo '<td><input type="radio" name="kksakelar" value="2" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksakelar" value="2"></td>';
                                        }
                                        if($kksakelar == '3'){
                                            echo '<td><input type="radio" name="kksakelar" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksakelar" value="3"></td>';
                                        }
                                    echo'</tr>';}
            if(!empty($c_kusb)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke USB</td>';
                                        if($kkusb == '1'){
                                            echo '<td><input type="radio" name="kkusb" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kkusb" value="1"></td>';
                                        }
                                        if($kkusb == '2'){
                                            echo '<td><input type="radio" name="kkusb" value="2" checked></td>';    
                                        }else{
                                            echo '<td><input type="radio" name="kkusb" value="2"></td>';
                                        }
                                        if($kkusb == '3'){
                                            echo '<td><input type="radio" name="kkusb" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kkusb" value="3"></td>';
                                        }
                                    echo'</tr>';}
            if(!empty($c_ksound)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke Sound</td>';
                                        if($kksound == '1'){
                                            echo '<td><input type="radio" name="kksound" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksound" value="1"></td>';
                                        }
                                        if($kksound == '2'){
                                            echo '<td><input type="radio" name="kksound" value="2" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksound" value="2"></td>';
                                        }
                                        if($kksound == '3'){
                                            echo '<td><input type="radio" name="kksound" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kksound" value="3"></td>';
                                        }
                                    echo'</tr>';}
            if(!empty($c_klampu)){echo '<tr>
                                        <td></td>
                                        <td>Kabel Ke Lampu Indikator</td>';
                                        if($kklamp == '1'){
                                            echo '<td><input type="radio" name="kklamp" value="1" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kklamp" value="1"></td>';
                                        }
                                        if($kklamp == '2'){
                                            echo '<td><input type="radio" name="kklamp" value="2" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kklamp" value="2"></td>';
                                        }
                                        if($kklamp == '3'){
                                            echo '<td><input type="radio" name="kklamp" value="3" checked></td>';
                                        }else{
                                            echo '<td><input type="radio" name="kklamp" value="3"></td>';
                                        }
                                    echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field1" width="55%">
        <tr>
            <td width="20%">Mainboard</td>
            <td width="50%"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php 
            if(!empty($m_cpu)){echo '<tr>
                                    <td ></td>
                                    <td >CPU</td>';
                                    if($kcpu == '1'){
                                        echo '<td><input type="radio" name="kcpu" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kcpu" value="1"></td>';
                                    }
                                    if($kcpu =='2'){
                                        echo '<td><input type="radio" name="kcpu" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kcpu" value="2"></td>';
                                    }
                                    if($kcpu == '3'){
                                        echo '<td width="5%"><input type="radio" name="kcpu" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kcpu" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_fsb)){echo '<tr>
                                    <td></td>
                                    <td>FSB</td>';
                                    if($kfsb == '1'){
                                        echo '<td><input type="radio" name="kfsb" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfsb" value="1"></td>';
                                    }
                                    if($kfsb == '2'){
                                        echo '<td><input type="radio" name="kfsb" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfsb" value="2"></td>';
                                    }
                                    if($kfsb == '3'){
                                        echo '<td><input type="radio" name="kfsb" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfsb" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_chipset)){echo '<tr>
                                    <td></td>
                                    <td>Chipset</td>';
                                    if($kchip == '1'){
                                        echo '<td><input type="radio" name="kchip" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kchip" value="1"></td>';
                                    }
                                    if($kchip == '2'){
                                        echo '<td><input type="radio" name="kchip" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kchip" value="2"></td>';
                                    }
                                    if($kchip == '3'){
                                        echo '<td><input type="radio" name="khcip" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khcip" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_memory)){echo '<tr>
                                    <td></td>
                                    <td>Memory<button type="button" name="addmem" id="addmem" class="btn btn-success">+</button></td>';
                                    if($kmc1 == '1'){
                                        echo '<td><input type="radio" name="kmc1" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmc1" value="1"></td>';
                                    }
                                    if($kmc1 == '2'){
                                        echo '<td><input type="radio" name="kmc1" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmc1" value="2"></td>';
                                    }
                                    if($kmc1 == '3'){
                                        echo '<td><input type="radio" name="kmc1" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmc1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table><table border="1" id="dynamic_field2" width="55%">
        <?php
            if(!empty($m_onboardg)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">On Board Graphics</td>';
                                    if($konboard == '1'){
                                        echo '<td width="5%"><input type="radio" name="konboard" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="konboard" value="1"></td>';
                                    }
                                    if($konboard == '2'){
                                        echo '<td width="5%"><input type="radio" name="konboard" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="konboard" value="2"></td>';
                                    }
                                    if($konboard == '3'){
                                        echo '<td width="5%"><input type="radio" name="konboard" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="konboard" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_audio)){echo '<tr>
                                    <td></td>
                                    <td>Audio In</td>';
                                    if($kain == '1'){
                                        echo '<td><input type="radio" name="kain" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kain" value="1"></td>';
                                    }
                                    if($kain == '2'){
                                        echo '<td><input type="radio" name="kain" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kain" value="2"></td>';
                                    }
                                    if($kain == '3'){
                                        echo '<td><input type="radio" name="kain" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kain" value="3"></td>';
                                    }
                                echo'</tr><tr>
                                    <td></td>
                                    <td>Audio Out</td>';
                                    if($kaout == '1'){
                                        echo '<td><input type="radio" name="kaout" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaout" value="1"></td>';
                                    }
                                    if($kaout == '2'){
                                        echo '<td><input type="radio" name="kaout" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaout" value="2"></td>';
                                    }
                                    if($kaout == '3'){
                                        echo '<td><input type="radio" name="kaout" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaout" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_lan)){echo '<tr>
                                    <td></td>
                                    <td>LAN</td>';
                                    if($klan == '1'){
                                        echo '<td><input type="radio" name="klan" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klan" value="1"></td>';
                                    }
                                    if($klan == '2'){
                                        echo '<td><input type="radio" name="klan" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klan" value="2"></td>';
                                    }
                                    if($klan == '3'){
                                        echo '<td><input type="radio" name="klan" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klan" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_pcie16)){echo '<tr>
                                    <td></td>
                                    <td>PCI Express 16 Slot <button type="button" name="addex" id="addex" class="btn btn-success">+</button></td>';
                                    if($kepcie1 == '1'){
                                        echo '<td><input type="radio" name="kepcie1" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kepcie1" value="1"></td>';
                                    }
                                    if($kepcie1 == '2'){
                                        echo '<td><input type="radio" name="kepcie1" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kepcie1" value="2"></td>';
                                    }
                                    if($kepcie1 == '3'){
                                        echo '<td><input type="radio" name="kepcie1" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kepcie1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table><table border="1" id="dynamic_field3" width="55%">
        <?php
            if(!empty($m_pcie1)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">PCI Express 1 Slot</td>';
                                    if($kepci1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="1"></td>';
                                    }
                                    if($kepci1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="2"></td>';
                                    }
                                    if($kepci1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kepci1" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_agp)){echo '<tr>
                                    <td></td>
                                    <td>AGP</td>';
                                    if($keagp == '1'){
                                        echo '<td><input type="radio" name="keagp" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="keagp" value="1"></td>';
                                    }
                                    if($keagp == '2'){
                                        echo '<td><input type="radio" name="keagp" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="keagp" value="2"></td>';
                                    }
                                    if($keagp == '3'){
                                        echo '<td><input type="radio" name="keagp" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="keagp" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_ide)){echo '<tr>
                                    <td></td>
                                    <td>IDE</td>';
                                    if($ksiide == '1'){
                                        echo '<td><input type="radio" name="ksiide" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksiide" value="1"></td>';
                                    }
                                    if($ksiide == '2'){
                                        echo '<td><input type="radio" name="ksiide" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksiide" value="2"></td>';
                                    }
                                    if($ksiide == '3'){
                                        echo '<td><input type="radio" name="ksiide" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksiide" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_sata)){echo '<tr>
                                    <td></td>
                                    <td>Sata<button type="button" name="addsa" id="addsa" class="btn btn-success">+</button></td>';
                                    if($ksatac1 == '1'){
                                        echo '<td><input type="radio" name="ksatac1" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac1" value="1"></td>';
                                    }
                                    if($ksatac1 == '2'){
                                        echo '<td><input type="radio" name="ksatac1" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac1" value="2"></td>';
                                    }
                                    if($ksatac1 == '3'){
                                        echo '<td><input type="radio" name="ksatac1" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table><table border="1" id="dynamic_field4" width="55%">
        <?php
            if(!empty($m_usb)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">USB<button type="button" name="addus" id="addus" class="btn btn-success">+</button></td>';
                                    if($kusb1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="1"></td>';
                                    }
                                    if($kusb1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="2"></td>';
                                    }
                                    if($kusb1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kusb1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table><table border="1" id="dynamic_field5" width="55%">
        <?php
            if(!empty($m_12pmain)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">24 Pin ATX Main Power Connector</td>';
                                    if($kic24 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kic24" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kic24" value="1"></td>';
                                    }
                                    if($kic24 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kic24" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kic24" value="2"></td>';
                                    }
                                    if($kic24 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kic24" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kic24" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_4p12v)){echo '<tr>
                                    <td></td>
                                    <td>4 Pin ATX 12V Power Connector</td>';
                                    if($kic4 == '1'){
                                        echo '<td><input type="radio" name="kic4" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kic4" value="1"></td>';
                                    }
                                    if($kic4 == '2'){
                                        echo '<td><input type="radio" name="kic4" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kic4" value="2"></td>';
                                    }
                                    if($kic4 == '3'){
                                        echo '<td><input type="radio" name="kic4" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kic4" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_idekonek)){echo '<tr>
                                    <td></td>
                                    <td>Ide Connector</td>';
                                    if($kicide == '1'){
                                        echo '<td><input type="radio" name="kicide" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicide" value="1"></td>';
                                    }
                                    if($kicide == '2'){
                                        echo '<td><input type="radio" name="kicide" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicide" value="2"></td>';
                                    }
                                    if($kicide == '3'){
                                        echo '<td><input type="radio" name="kicide" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicide" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_cpufan)){echo '<tr>
                                    <td></td>
                                    <td>CPU Fan Header</td>';
                                    if($kicfan == '1'){
                                        echo '<td><input type="radio" name="kicfan" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfan" value="1"></td>';
                                    }
                                    if($kicfan == '2'){
                                        echo '<td><input type="radio" name="kicfan" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfan" value="2"></td>';
                                    }
                                    if($kicfan == '3'){
                                        echo '<td><input type="radio" name="kicfan" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfan" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_sysfan)){echo '<tr>
                                    <td></td>
                                    <td>System Fan Header</td>';
                                    if($kicsysfan == '1'){
                                        echo '<td><input type="radio" name="kicsysfan" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicsysfan" value="1"></td>';
                                    }
                                    if($kicsysfan == '2'){
                                        echo '<td><input type="radio" name="kicsysfan" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicsysfan" value="2"></td>';
                                    }
                                    if($kicsysfan == '3'){
                                        echo '<td><input type="radio" name="kicsysfan" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicsysfan" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_fpanelh)){echo '<tr>
                                    <td></td>
                                    <td>Front Panel Header</td>';
                                    if($kicfpanhead == '1'){
                                        echo '<td><input type="radio" name="kicfpanhead" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanhead" value="1"></td>';
                                    }
                                    if($kicfpanhead == '2'){
                                        echo '<td><input type="radio" name="kicfpanhead" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanhead" value="2"></td>';
                                    }
                                    if($kicfpanhead == '3'){
                                        echo '<td><input type="radio" name="kicfpanhead" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanhead" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_fpanelah)){echo '<tr>
                                    <td></td>
                                    <td>Front Panel Audio Header</td>';
                                    if($kicfpanahead == '1'){
                                        echo '<td><input type="radio" name="kicfpanahead" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanahead" value="1"></td>';
                                    }
                                    if($kicfpanahead == '2'){
                                        echo '<td><input type="radio" name="kicfpanahead" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanahead" value="2"></td>';
                                    }
                                    if($kicfpanahead == '3'){
                                        echo '<td><input type="radio" name="kicfpanahead" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicfpanahead" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_cdinkonek)){echo '<tr>
                                    <td></td>
                                    <td>CD In Connector</td>';
                                    if($kiccdcon == '1'){
                                        echo '<td><input type="radio" name="kiccdcon" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccdcon" value="1"></td>';
                                    }
                                    if($kiccdcon == '2'){
                                        echo '<td><input type="radio" name="kiccdcon" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccdcon" value="2"></td>';
                                    }
                                    if($kiccdcon == '3'){
                                        echo '<td><input type="radio" name="kiccdcon" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccdcon" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_spdif)){echo '<tr>
                                    <td></td>
                                    <td>S/ PDIF Out Header</td>';
                                    if($kicspdif == '1'){
                                        echo '<td><input type="radio" name="kicspdif" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicspdif" value="1"></td>';
                                    }
                                    if($kicspdif =='2'){
                                        echo '<td><input type="radio" name="kicspdif" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicspdif" value="2"></td>';
                                    }
                                    if($kicspdif == '3'){
                                        echo '<td><input type="radio" name="kicspdif" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicspdif" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_usb2)){echo '<tr>
                                    <td></td>
                                    <td>USB 2.0</td>';
                                    if($kicusb2c1 == '1'){
                                        echo '<td><input type="radio" name="kicusb2c1" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicusb2c1" value="1"></td>';
                                    }
                                    if($kicusb2c1 == '2'){
                                        echo '<td><input type="radio" name="kicusb2c1" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicusb2c1" value="2"></td>';
                                    }
                                    if($kicusb2c1 == '3'){
                                        echo '<td><input type="radio" name="kicusb2c1" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicusb2c1" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_chassisin)){echo '<tr>
                                    <td></td>
                                    <td>Chassis Intrusion Header</td>';
                                    if($kiccih == '1'){
                                        echo '<td><input type="radio" name="kiccih" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccih" value="1"></td>';
                                    }
                                    if($kiccih == '2'){
                                        echo '<td><input type="radio" name="kiccih" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccih" value="2"></td>';
                                    }
                                    if($kiccih == '3'){
                                        echo '<td><input type="radio" name="kiccih" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kiccih" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_powerled)){echo '<tr>
                                    <td></td>
                                    <td>Power LED Header</td>';
                                    if($kicled == '1'){
                                        echo '<td><input type="radio" name="kicled" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicled" value="1"></td>';
                                    }
                                    if($kicled == '2'){
                                        echo '<td><input type="radio" name="kicled" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicled" value="2"></td>';
                                    }
                                    if($kicled == '3'){
                                        echo '<td><input type="radio" name="kicled" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kicled" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_ps2key)){echo '<tr>
                                    <td></td>
                                    <td>PS/ 2 Keyboard Port</td>';
                                    if($kbpcps2k == '1'){
                                        echo '<td><input type="radio" name="kbpcps2k" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2k" value="1"></td>';
                                    }
                                    if($kbpcps2k == '2'){
                                        echo '<td><input type="radio" name="kbpcps2k" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2k" value="2"></td>';
                                    }
                                    if($kbpcps2k == '3'){
                                        echo '<td><input type="radio" name="kbpcps2k" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2k" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_ps2mou)){echo '<tr>
                                    <td></td>
                                    <td>PS/ 2 Mouse Port</td>';
                                    if($kbpcps2m == '1'){
                                        echo '<td><input type="radio" name="kbpcps2m" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2m" value="1"></td>';
                                    }
                                    if($kbpcps2m == '2'){
                                        echo '<td><input type="radio" name="kbpcps2m" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2m" value="2"></td>';
                                    }
                                    if($kbpcps2m == '3'){
                                        echo '<td><input type="radio" name="kbpcps2m" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcps2m" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_paraport)){echo '<tr>
                                    <td></td>
                                    <td>Parallel Port</td>';
                                    if($kbpcplp == '1'){
                                        echo '<td><input type="radio" name="kbpcplp" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcplp" value="1"></td>';
                                    }
                                    if($kbpcplp == '2'){
                                        echo '<td><input type="radio" name="kbpcplp" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcplp" value="2"></td>';
                                    }
                                    if($kbpcplp == '3'){
                                        echo '<td><input type="radio" name="kbpcplp" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcplp" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_seriport)){echo '<tr>
                                    <td></td>
                                    <td>Serial Port</td>';
                                    if($kbpcsp == '1'){
                                        echo '<td><input type="radio" name="kbpcsp" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcsp" value="1"></td>';
                                    }
                                    if($kbpcsp == '2'){
                                        echo '<td><input type="radio" name="kbpcsp" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcsp" value="2"></td>';
                                    }
                                    if($kbpcsp == '3'){
                                        echo '<td><input type="radio" name="kbpcsp" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcsp" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_displayport)){echo '<tr>
                                    <td></td>
                                    <td>Display Port</td>';
                                    if($kbpcdp == '1'){
                                        echo '<td><input type="radio" name="kbpcdp" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcdp" value="1"></td>';
                                    }
                                    if($kbpcdp == '2'){
                                        echo '<td><input type="radio" name="kbpcdp" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcdp" value="2"></td>';
                                    }
                                    if($kbpcdp == '3'){
                                        echo '<td><input type="radio" name="kbpcdp" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcdp" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_busb2)){echo '<tr>
                                    <td></td>
                                    <td>USB 2.0 <button type="button" name="addus2" id="addus2" class="btn btn-success">+</button></td>';
                                    if($kbpcusb2c1 == '1'){
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="1"></td>';
                                    }
                                    if($kbpcusb2c1 == '2'){
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="2"></td>';
                                    }
                                    if($kbpcusb2c1 == '3'){
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbpcusb2c1" value="3"></td>';
                                    }
                                echo'</tr>';}
            ?>
            </table><table border="1" width="55%">
            <?php
            if(!empty($m_sysvoltdetec)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">System Voltage Dectection</td>';
                                    if($khmsvd == '1'){
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="1"></td>';
                                    }
                                    if($khmsvd == '2'){
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="2"></td>';
                                    }
                                    if($khmsvd == '3'){
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="khmsvd" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_cputempdetec)){echo '<tr>
                                    <td></td>
                                    <td>CPU Temperature Dectection</td>';
                                    if($khmctd == '1'){
                                        echo '<td><input type="radio" name="khmctd" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmctd" value="1"></td>';
                                    }
                                    if($khmctd == '2'){
                                        echo '<td><input type="radio" name="khmctd" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmctd" value="2"></td>';
                                    }
                                    if($khmctd == '3'){
                                        echo '<td><input type="radio" name="khmctd" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmctd" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_cpusysfail)){echo '<tr>
                                    <td></td>
                                    <td>CPU/ System Fan Fail Warning</td>';
                                    if($khmffw == '1'){
                                        echo '<td><input type="radio" name="khmffw" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmffw" value="1"></td>';
                                    }
                                    if($khmffw == '2'){
                                        echo '<td><input type="radio" name="khmffw" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmffw" value="2"></td>';
                                    }
                                    if($khmffw == '3'){
                                        echo '<td><input type="radio" name="khmffw" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmffw" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_cpufansp)){echo '<tr>
                                    <td></td>
                                    <td>CPU Fan Speed Control</td>';
                                    if($khmfsc == '1'){
                                        echo '<td><input type="radio" name="khmfsc" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmfsc" value="1"></td>';
                                    }
                                    if($khmfsc == '2'){
                                        echo '<td><input type="radio" name="khmfsc" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmfsc" value="2"></td>';
                                    }
                                    if($khmfsc == '3'){
                                        echo '<td><input type="radio" name="khmfsc" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="khmfsc" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($m_bios)){echo '<tr>
                                    <td></td>
                                    <td>BIOS</td>';
                                    if($kbios == '1'){
                                        echo '<td><input type="radio" name="kbios" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbios" value="1"></td>';
                                    }
                                    if($kbios == '2'){
                                        echo '<td><input type="radio" name="kbios" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbios" value="2"></td>';
                                    }
                                    if($kbios == '3'){
                                        echo '<td><input type="radio" name="kbios" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kbios" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field6" width="55%">
        <tr>
            <td width="10%">Hard Disk</td>
        </tr>
        <?php
            if(!empty($h_ata)){echo '<tr>
                                    <td></td>
                                    <td width="25%">ATA <button type="button" name="addata" id="addata" class="btn btn-success">+</button></td>';
                                    if($katahdd1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="1"></td>';
                                    }
                                    if($katahdd1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="2"></td>';
                                    }
                                    if($katahdd1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="katahdd1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field7" width="55%">
        <?php
            if(!empty($h_satah)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">SATA HDD <button type="button" name="addsatah" id="addsatah" class="btn btn-success">+</button></td>';
                                    if($ksatahdd1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="1"></td>';
                                    }
                                    if($ksatahdd1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="2"></td>';
                                    }
                                    if($ksatahdd1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatahdd1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field8" width="55%">
        <?php
            if(!empty($h_satas)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">SATA SSD <button type="button" name="addsatas" id="addsatas" class="btn btn-success">+</button></td>';
                                    if($ksatassd1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="1"></td>';
                                    }
                                    if($ksatassd1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="2"></td>';
                                    }
                                    if($ksatassd1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="ksatassd1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field9" width="55%">
        <?php
            if(!empty($h_nvm)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">NVM <button type="button" name="addnvm" id="addnvm" class="btn btn-success">+</button></td>';
                                    if($knvmssd1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="1"></td>';
                                    }
                                    if($knvmssd1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="2"></td>';
                                    }
                                    if($knvmssd1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="knvmssd1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field10" width="55%">
        <tr>
            <td width="10%">RAM</td>
        </tr>
        <?php
            if(!empty($r_ddr1)){echo '<tr>
                                    <td></td>
                                    <td width="25%">DDR 1 <button type="button" name="addram1" id="addram1" class="btn btn-success">+</button></td>';
                                    if($kramd1c1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="1"></td>';
                                    }
                                    if($kramd1c1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="2"></td>';
                                    }
                                    if($kramd1c1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd1c1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field11" width="55%">
        <?php
            if(!empty($r_ddr2)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">DDR 2 <button type="button" name="addram2" id="addram2" class="btn btn-success">+</button></td>';
                                    if($kramd2c1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="1"></td>';
                                    }
                                    if($kramd2c1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="2"></td>';
                                    }
                                    if($kramd2c1 == '3') {
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd2c1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field12" width="55%">
        <?php
            if(!empty($r_ddr3)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">DDR 3 <button type="button" name="addram3" id="addram3" class="btn btn-success">+</button></td>';
                                    if($kramd3c1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="1"></td>';
                                    }
                                    if($kramd3c1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="2"></td>';
                                    }
                                    if($kramd3c1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd3c1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" id="dynamic_field13" width="55%">
        <?php
            if(!empty($r_ddr4)){echo '<tr>
                                    <td width="10%"></td>
                                    <td width="25%">DDR 4 <button type="button" name="addram4" id="addram4" class="btn btn-success">+</button></td>';
                                    if($kramd4c1 == '1'){
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="1"></td>';
                                    }
                                    if($kramd4c1 == '2'){
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="2"></td>';
                                    }
                                    if($kramd4c1 == '3'){
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kramd4c1" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        </table>
        <table border="1" width="55%">
        <tr>
            <td width="20%">Peripheral</td>
            <td width="50%"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            if(!empty($p_cdrw)){echo '<tr>
                                    <td></td>
                                    <td width="25%">CD RW</td>';
                                    if($kcdrw == '1'){
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="1"></td>';
                                    }
                                    if($kcdrw == '2'){
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="2"></td>';
                                    }
                                    if($kcdrw == '3'){
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kcdrw" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_dvdrw)){echo '<tr>
                                    <td></td>
                                    <td width="25%">DVD RW</td>';
                                    if($kdvdrw == '1'){
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="1" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="1"></td>';
                                    }
                                    if($kdvdrw == '2'){
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="2" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="2"></td>';
                                    }
                                    if($kdvdrw == '3'){
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="3" checked></td>';
                                    }else{
                                        echo '<td width="5%"><input type="radio" name="kdvdrw" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_atakabel)){echo '<tr>
                                    <td></td>
                                    <td>ATA/ IDE Cable</td>';
                                    if($kaic == '1'){
                                        echo '<td><input type="radio" name="kaic" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaic" value="1"></td>';
                                    }
                                    if($kaic == '2'){
                                        echo '<td><input type="radio" name="kaic" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaic" value="2"></td>';
                                    }
                                    if($kaic == '3'){
                                        echo '<td><input type="radio" name="kaic" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kaic" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_satakabel)){echo '<tr>
                                    <td></td>
                                    <td>SATA Cable</td>';
                                    if($ksatac == '1'){
                                        echo '<td><input type="radio" name="ksatac" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac" value="1"></td>';
                                    }
                                    if($ksatac == '2'){
                                        echo '<td><input type="radio" name="ksatac" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac" value="2"></td>';
                                    }
                                    if($ksatac == '3'){
                                        echo '<td><input type="radio" name="ksatac" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="ksatac" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_keyboard)){echo '<tr>
                                    <td></td>
                                    <td>Keyboard</td>';
                                    if($kkey == '1'){
                                        echo '<td><input type="radio" name="kkey" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkey" value="1"></td>';
                                    }
                                    if($kkey == '2'){
                                        echo '<td><input type="radio" name="kkey" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkey" value="2"></td>';
                                    }
                                    if($kkey == '3'){
                                        echo '<td><input type="radio" name="kkey" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkey" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_mouse)){echo '<tr>
                                    <td></td>
                                    <td>Mouse</td>';
                                    if($kmou == '1'){
                                        echo '<td><input type="radio" name="kmou" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmou" value="1"></td>';
                                    }
                                    if($kmou == '2'){
                                        echo '<td><input type="radio" name="kmou" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmou" value="2"></td>';
                                    }
                                    if($kmou == '3'){
                                        echo '<td><input type="radio" name="kmou" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmou" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_speaker)){echo '<tr>
                                    <td></td>
                                    <td>Speaker</td>';
                                    if($kspea == '1'){
                                        echo '<td><input type="radio" name="kspea" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kspea" value="1"></td>';
                                    }
                                    if($kspea == '2'){
                                        echo '<td><input type="radio" name="kspea" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kspea" value="2"></td>';
                                    }
                                    if($kspea == '3'){
                                        echo '<td><input type="radio" name="kspea" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kspea" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_monitorcrt)){echo '<tr>
                                    <td></td>
                                    <td>Monitor CRT</td>';
                                    if($kmoncrt == '1'){
                                        echo '<td><input type="radio" name="kmoncrt" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmoncrt" value="1"></td>';
                                    }
                                    if($kmoncrt == '2'){
                                        echo '<td><input type="radio" name="kmoncrt" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmoncrt" value="2"></td>';
                                    }
                                    if($kmoncrt == '3'){
                                        echo '<td><input type="radio" name="kmoncrt" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmoncrt" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_monitorlcd)){echo '<tr>
                                    <td></td>
                                    <td>Monitor LCD</td>';
                                    if($kmonlcd == '1'){
                                        echo '<td><input type="radio" name="kmonlcd" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmonlcd" value="1"></td>';
                                    }
                                    if($kmonlcd == '2'){
                                        echo '<td><input type="radio" name="kmonlcd" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmonlcd" value="2"></td>';
                                    }
                                    if($kmonlcd == '3'){
                                        echo '<td><input type="radio" name="kmonlcd" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kmonlcd" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($p_vgakabel)){echo '<tr>
                                    <td></td>
                                    <td>VGA Cable</td>';
                                    if($kvgac == '1'){
                                        echo '<td><input type="radio" name="kvgac" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgac" value="1"></td>';
                                    }
                                    if($kvgac == '2'){
                                        echo '<td><input type="radio" name="kvgac" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgac" value="2"></td>';
                                    }
                                    if($kvgac == '3'){
                                        echo '<td><input type="radio" name="kvgac" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgac" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        <tr>
            <td>Card</td>
        </tr>
        <?php 
            if(!empty($cr_lancard)){echo '<tr>
                                    <td></td>
                                    <td>LAN Card</td>';
                                    if($klanc == '1'){
                                        echo '<td><input type="radio" name="klanc" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klanc" value="1"></td>';
                                    }
                                    if($klanc == '2'){
                                        echo '<td><input type="radio" name="klanc" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klanc" value="2"></td>';
                                    }
                                    if($klanc == '3'){
                                        echo '<td><input type="radio" name="klanc" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klanc" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($cr_vgacard)){echo '<tr>
                                    <td></td>
                                    <td>VGA Card</td>';
                                    if($kvgacrd == '1'){
                                        echo '<td><input type="radio" name="kvgacrd" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgacrd" value="1"></td>';
                                    }
                                    if($kvgacrd == '2'){
                                        echo '<td><input type="radio" name="kvgacrd" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgacrd" value="2"></td>';
                                    }
                                    if($kvgacrd == '3'){
                                        echo '<td><input type="radio" name="kvgacrd" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kvgacrd" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($cr_firecard)){echo '<tr>
                                    <td></td>
                                    <td>Firewire Card</td>';
                                    if($kfirec == '1'){
                                        echo '<td><input type="radio" name="kfirec" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfirec" value="1"></td>';
                                    }
                                    if($kfirec == '2'){
                                        echo '<td><input type="radio" name="kfirec" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfirec" value="2"></td>';
                                    }
                                    if($kfirec == '3'){
                                        echo '<td><input type="radio" name="kfirec" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kfirec" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($cr_lptcard)){echo '<tr>
                                    <td></td>
                                    <td>LPT Card</td>';
                                    if($klptc == '1'){
                                        echo '<td><input type="radio" name="klptc" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klptc" value="1"></td>';
                                    }
                                    if($klptc == '2'){
                                        echo '<td><input type="radio" name="klptc" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klptc" value="2"></td>';
                                    }
                                    if($klptc == '3'){
                                        echo '<td><input type="radio" name="klptc" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="klptc" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($cr_rs232card)){echo '<tr>
                                    <td></td>
                                    <td>RS 232 CARD</td>';
                                    if($krsc == '1'){
                                        echo '<td><input type="radio" name="krsc" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="krsc" value="1"></td>';
                                    }
                                    if($krsc == '2'){
                                        echo '<td><input type="radio" name="krsc" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="krsc" value="2"></td>';
                                    }
                                    if($krsc == '3'){
                                        echo '<td><input type="radio" name="krsc" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="krsc" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        <tr>
            <td>Kelistrikan</td>
        </tr>
        <?php
            if(!empty($l_powersupply)){echo '<tr>
                                    <td></td>
                                    <td>Power Supply</td>';
                                    if($kpwrs == '1'){
                                        echo '<td><input type="radio" name="kpwrs" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kpwrs" value="1"></td>';
                                    }
                                    if($kpwrs == '2'){
                                        echo '<td><input type="radio" name="kpwrs" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kpwrs" value="2"></td>';
                                    }
                                    if($kpwrs == '3'){
                                        echo '<td><input type="radio" name="kpwrs" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kpwrs" value="3"></td>';
                                    }
                                    '</tr>';}
            if(!empty($l_kabelpower)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power</td>';
                                    if($kkpwr == '1'){
                                        echo '<td><input type="radio" name="kkpwr" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwr" value="1"></td>';
                                    }
                                    if($kkpwr == '2'){
                                        echo '<td><input type="radio" name="kkpwr" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwr" value="2"></td>';
                                    }
                                    if($kkpwr == '3'){
                                        echo '<td><input type="radio" name="kkpwr" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwr" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($l_kabelpowermon)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power Monitor</td>';
                                    if($kkpwrmon == '1'){
                                        echo '<td><input type="radio" name="kkpwrmon" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrmon" value="1"></td>';
                                    }
                                    if($kkpwrmon == '2'){
                                        echo '<td><input type="radio" name="kkpwrmon" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrmon" value="2"></td>';
                                    }
                                    if($kkpwrmon == '3'){
                                        echo '<td><input type="radio" name="kkpwrmon" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrmon" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($l_kabelpowersata)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Power SATA</td>';
                                    if($kkpwrsata == '1'){
                                        echo '<td><input type="radio" name="kkpwrsata" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrsata" value="1"></td>';
                                    }
                                    if($kkpwrsata == '2'){
                                        echo '<td><input type="radio" name="kkpwrsata" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrsata" value="2"></td>';
                                    }
                                    if($kkpwrsata == '3'){
                                        echo '<td><input type="radio" name="kkpwrsata" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkpwrsata" value="3"></td>';
                                    }
                                echo'</tr>';}
            if(!empty($l_kabelmolexpow)){echo '<tr>
                                    <td></td>
                                    <td>Kabel Molex Power</td>';
                                    if($kkmolpwr == '1'){
                                        echo '<td><input type="radio" name="kkmolpwr" value="1" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkmolpwr" value="1"></td>';
                                    }
                                    if($kkmolpwr == '2'){
                                        echo '<td><input type="radio" name="kkmolpwr" value="2" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkmolpwr" value="2"></td>';
                                    }
                                    if($kkmolpwr == '3'){
                                        echo '<td><input type="radio" name="kkmolpwr" value="3" checked></td>';
                                    }else{
                                        echo '<td><input type="radio" name="kkmolpwr" value="3"></td>';
                                    }
                                echo'</tr>';}
        ?>
        <tr>
        <td>
            Keterangan
            </td>
            <td colspan="4">
                <textarea name="ket" ><?php echo $ket;?></textarea>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_jd_ko" class="form-control" id="kd_jd_ko" value="<?php echo $kd_jd_ko;?>">
            <input type="hidden" name="kd_inv" class="form-control" id="kd_inv" value="<?php echo $kd_inv;?>">
            <input type="hidden" name="kd_ruang" class="form-control" id="kd_ruang" value="<?php echo $kd_ruang;?>">
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