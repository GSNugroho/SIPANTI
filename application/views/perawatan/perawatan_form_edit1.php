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
    <table border="1" align="center">
        <tr>
            <td rowspan="2">No</td>
            <td rowspan="2">Golongan</td>
            <td colspan="6" rowspan="2" align="center">Spesifikasi</td>
            <td colspan="3" align="center">Kondisi</td>
        </tr>
        <tr>
            <td>&nbsp;B&nbsp;</td>
            <td>K.B</td>
            <td>&nbsp;R&nbsp;</td>
        </tr>
        <tr>
            <td rowspan="89">1</td>
            <td rowspan="89">Hardware</td>
            <td rowspan="6">1</td>
            <td rowspan="6">Casing</td>
            <td>1</td>
            <td>Casing</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcasing" value="1" <?php echo ($kcasing=='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcasing" value="2" <?php echo ($kcasing=='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcasing" value="3" <?php echo ($kcasing=='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sekrup/ baut</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kbaut" value="1" <?php echo ($kbaut=='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbaut" value="2" <?php echo ($kbaut=='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbaut" value="3" <?php echo ($kbaut=='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Kabel sakelar</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kksakelar" value="1" <?php echo ($kksakelar =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kksakelar" value="2" <?php echo ($kksakelar =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kksakelar" value="3" <?php echo ($kksakelar =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kabel ke USB</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkusb" value="1" <?php echo ($kkusb =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkusb" value="2" <?php echo ($kkusb =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkusb" value="3" <?php echo ($kkusb =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kabel ke Sound</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kksound" value="1" <?php echo ($kksound =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kksound" value="2" <?php echo ($kksound =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kksound" value="3" <?php echo ($kksound =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Kabel ke Lampu Indikator</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kklamp" value="1" <?php echo ($kklamp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kklamp" value="2" <?php echo ($kklamp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kklamp" value="3" <?php echo ($kklamp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="47">2</td>
            <td rowspan="47">Mainboard</td>
            <td>1</td>
            <td>CPU</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcpu" value="1" <?php echo ($kcpu =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcpu" value="2" <?php echo ($kcpu =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcpu" value="3" <?php echo ($kcpu =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>FSB</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kfsb" value="1" <?php echo ($kfsb =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kfsb" value="2" <?php echo ($kfsb =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kfsb" value="3" <?php echo ($kfsb =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Chipset</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kchip" value="1" <?php echo ($kchip =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kchip" value="2" <?php echo ($kchip =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khcip" value="3" <?php echo ($kchip =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">Memory</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kmc1" value="1" <?php echo ($kmc1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc1" value="2" <?php echo ($kmc1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc1" value="3" <?php echo ($kmc1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kmc2" value="1" <?php echo ($kmc2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc2" value="2" <?php echo ($kmc2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc2" value="3" <?php echo ($kmc2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>On Board Graphics</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="konboard" value="1" <?php echo ($konboard =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="konboard" value="2" <?php echo ($konboard =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="konboard" value="3" <?php echo ($konboard =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">6</td>
            <td rowspan="2">Audio</td>
            <td>In</td>
            <td></td>
            <td><input type="radio" name="kain" value="1" <?php echo ($kain =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kain" value="2" <?php echo ($kain =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kain" value="3" <?php echo ($kain =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Out</td>
            <td></td>
            <td><input type="radio" name="kaout" value="1" <?php echo ($kaout =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kaout" value="2" <?php echo ($kaout =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kaout" value="3" <?php echo ($kaout =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>7</td>
            <td>LAN</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klan" value="1" <?php echo ($klan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="2" <?php echo ($klan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="3" <?php echo ($klan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">8</td>
            <td rowspan="4">Expansions Slots</td>
            <td rowspan="2">PCI Express 16 Slot</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kepcie1" value="1" <?php echo ($kepcie1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie1" value="2" <?php echo ($kepcie1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie1" value="3" <?php echo ($kepcie1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kepcie2" value="1" <?php echo ($kepcie2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie2" value="2" <?php echo ($kepcie2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie2" value="3" <?php echo ($kepcie2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>PCI Express 1 Slot</td>
            <td></td>
            <td><input type="radio" name="kepci1" value="1" <?php echo ($kepci1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepci1" value="2" <?php echo ($kepci1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepci1" value="3" <?php echo ($kepci1 =='1')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>AGP</td>
            <td></td>
            <td><input type="radio" name="keagp" value="1" <?php echo ($keagp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="keagp" value="2" <?php echo ($keagp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="keagp" value="3" <?php echo ($keagp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">9</td>
            <td rowspan="5">Storage Interface</td>
            <td>IDE</td>
            <td></td>
            <td><input type="radio" name="ksiide" value="1" <?php echo ($ksiide =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksiide" value="2" <?php echo ($ksiide =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksiide" value="3" <?php echo ($ksiide =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">SATA</td>
            <td> Channel 1</td>
            <td><input type="radio" name="ksatac1" value="1" <?php echo ($ksatac1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac1" value="2" <?php echo ($ksatac1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac1" value="3" <?php echo ($ksatac1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 2</td>
            <td><input type="radio" name="ksatac2" value="1" <?php echo ($ksatac2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac2" value="2" <?php echo ($ksatac2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac2" value="3" <?php echo ($ksatac2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 3</td>
            <td><input type="radio" name="ksatac3" value="1" <?php echo ($ksatac3 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac3" value="2" <?php echo ($ksatac3 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac3" value="3" <?php echo ($ksatac3 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 4</td>
            <td><input type="radio" name="ksatac4" value="1" <?php echo ($ksatac4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac4" value="2" <?php echo ($ksatac4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac4" value="3" <?php echo ($ksatac4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">10</td>
            <td rowspan="2">USB</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kusb1" value="1" <?php echo ($kusb1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb1" value="2" <?php echo ($kusb1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb1" value="3" <?php echo ($kusb1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kusb2" value="1" <?php echo ($kusb2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb2" value="2" <?php echo ($kusb2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb2" value="3" <?php echo ($kusb2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="13">11</td>
            <td rowspan="13">Internal Connectors</td>
            <td>24 pin ATX Main Power Connector</td>
            <td></td>
            <td><input type="radio" name="kic24" value="1" <?php echo ($kic24 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kic24" value="2" <?php echo ($kic24 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kic24" value="3" <?php echo ($kic24 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4 pin ATX 12V Power Connector</td>
            <td></td>
            <td><input type="radio" name="kic4" value="1" <?php echo ($kic4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kic4" value="2" <?php echo ($kic4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kic4" value="3" <?php echo ($kic4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>IDE Connector</td>
            <td></td>
            <td><input type="radio" name="kicide" value="1" <?php echo ($kicide =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicide" value="2" <?php echo ($kicide =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicide" value="3" <?php echo ($kicide =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Fan Header</td>
            <td></td>
            <td><input type="radio" name="kicfan" value="1" <?php echo ($kicfan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfan" value="2" <?php echo ($kicfan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfan" value="3" <?php echo ($kicfan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>System Fan Header</td>
            <td></td>
            <td><input type="radio" name="kicsysfan" value="1" <?php echo ($kicsysfan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicsysfan" value="2" <?php echo ($kicsysfan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicsysfan" value="3" <?php echo ($kicsysfan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Front Panel Header</td>
            <td></td>
            <td><input type="radio" name="kicfpanhead" value="1" <?php echo ($kicfpanhead =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanhead" value="2" <?php echo ($kicfpanhead =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanhead" value="3" <?php echo ($kicfpanhead =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Front Panel Audio Header</td>
            <td></td>
            <td><input type="radio" name="kicfpanahead" value="1" <?php echo ($kicfpanahead =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanahead" value="2" <?php echo ($kicfpanahead =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanahead" value="3" <?php echo ($kicfpanahead =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CD In Connector</td>
            <td></td>
            <td><input type="radio" name="kiccdcon" value="1" <?php echo ($kiccdcon =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccdcon" value="2" <?php echo ($kiccdcon =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccdcon" value="3" <?php echo ($kiccdcon =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>S/ PDIF Out Header</td>
            <td></td>
            <td><input type="radio" name="kicspdif" value="1" <?php echo ($kicspdif =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicspdif" value="2" <?php echo ($kicspdif =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicspdif" value="3" <?php echo ($kicspdif =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">USB 2.0</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kicusb2c1" value="1" <?php echo ($kicusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c1" value="2" <?php echo ($kicusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c1" value="3" <?php echo ($kicusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kicusb2c2" value="1" <?php echo ($kicusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c2" value="2" <?php echo ($kicusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c2" value="3" <?php echo ($kicusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Chassis Intrusion Header</td>
            <td></td>
            <td><input type="radio" name="kiccih" value="1" <?php echo ($kiccih =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccih" value="2" <?php echo ($kiccih =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccih" value="3" <?php echo ($kiccih =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Power LED Header</td>
            <td></td>
            <td><input type="radio" name="kicled" value="1" <?php echo ($kicled =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicled" value="2" <?php echo ($kicled =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicled" value="3" <?php echo ($kicled =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="9">12</td>
            <td rowspan="9">Back Panel Connectors</td>
            <td>PS/ 2 Keyboard Port</td>
            <td></td>
            <td><input type="radio" name="kbpcps2k" value="1" <?php echo ($kbpcps2k =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2k" value="2" <?php echo ($kbpcps2k =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2k" value="3" <?php echo ($kbpcps2k =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>PS/ 2 Mouse Port</td>
            <td></td>
            <td><input type="radio" name="kbpcps2m" value="1" <?php echo ($kbpcps2m =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2m" value="2" <?php echo ($kbpcps2m =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2m" value="3" <?php echo ($kbpcps2m =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Parallel Port</td>
            <td></td>
            <td><input type="radio" name="kbpcplp" value="1" <?php echo ($kbpcplp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcplp" value="2" <?php echo ($kbpcplp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcplp" value="3" <?php echo ($kbpcplp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Serial Port</td>
            <td></td>
            <td><input type="radio" name="kbpcsp" value="1" <?php echo ($kbpcsp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcsp" value="2" <?php echo ($kbpcsp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcsp" value="3" <?php echo ($kbpcsp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Display Port</td>
            <td></td>
            <td><input type="radio" name="kbpcdp" value="1" <?php echo ($kbpcdp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcdp" value="2" <?php echo ($kbpcdp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcdp" value="3" <?php echo ($kbpcdp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">USB 2.0</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kbpcusb2c1" value="1" <?php echo ($kbpcusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c1" value="2" <?php echo ($kbpcusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c1" value="3" <?php echo ($kbpcusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kbpcusb2c2" value="1" <?php echo ($kbpcusb2c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c2" value="2" <?php echo ($kbpcusb2c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c2" value="3" <?php echo ($kbpcusb2c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 3</td>
            <td><input type="radio" name="kbpcusb2c3" value="1" <?php echo ($kbpcusb2c3 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c3" value="2" <?php echo ($kbpcusb2c3 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c3" value="3" <?php echo ($kbpcusb2c3 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 4</td>
            <td><input type="radio" name="kbpcusb2c4" value="1" <?php echo ($kbpcusb2c4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c4" value="2" <?php echo ($kbpcusb2c4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c4" value="3" <?php echo ($kbpcusb2c4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">13</td>
            <td rowspan="4">Hardware Monitor</td>
            <td>System Voltage Dectection</td>
            <td></td>
            <td><input type="radio" name="khmsvd" value="1" <?php echo ($khmsvd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmsvd" value="2" <?php echo ($khmsvd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmsvd" value="3" <?php echo ($khmsvd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Temperature Dectection</td>
            <td></td>
            <td><input type="radio" name="khmctd" value="1" <?php echo ($khmctd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmctd" value="2" <?php echo ($khmctd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmctd" value="3" <?php echo ($khmctd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU/ System Fan Fail Warning</td>
            <td></td>
            <td><input type="radio" name="khmffw" value="1" <?php echo ($khmffw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmffw" value="2" <?php echo ($khmffw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmffw" value="3" <?php echo ($khmffw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Fan Speed Control</td>
            <td></td>
            <td><input type="radio" name="khmfsc" value="1" <?php echo ($khmfsc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmfsc" value="2" <?php echo ($khmfsc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmfsc" value="3" <?php echo ($khmfsc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>14</td>
            <td>BIOS</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kbios" value="1" <?php echo ($kbios =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbios" value="2" <?php echo ($kbios =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbios" value="3" <?php echo ($kbios =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="8">3</td>
            <td rowspan="8">Hard Disk</td>
            <td rowspan="2">1</td>
            <td rowspan="2">ATA</td>
            <td>HDD 1</td>
            <td></td>
            <td><input type="radio" name="katahdd1" value="1" <?php echo ($katahdd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd1" value="2" <?php echo ($katahdd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd1" value="3" <?php echo ($katahdd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>HDD 2</td>
            <td></td>
            <td><input type="radio" name="katahdd2" value="1" <?php echo ($katahdd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd2" value="2" <?php echo ($katahdd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd2" value="3" <?php echo ($katahdd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">2</td>
            <td rowspan="4">SATA</td>
            <td>HDD 1</td>
            <td></td>
            <td><input type="radio" name="ksatahdd1" value="1" <?php echo ($ksatahdd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd1" value="2" <?php echo ($ksatahdd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd1" value="3" <?php echo ($ksatahdd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>HDD 2</td>
            <td></td>
            <td><input type="radio" name="ksatahdd2" value="1" <?php echo ($ksatahdd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd2" value="2" <?php echo ($ksatahdd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd2" value="3" <?php echo ($ksatahdd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 1</td>
            <td></td>
            <td><input type="radio" name="ksatassd1" value="1" <?php echo ($ksatassd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd1" value="2" <?php echo ($ksatassd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd1" value="3" <?php echo ($ksatassd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 2</td>
            <td></td>
            <td><input type="radio" name="ksatassd2" value="1" <?php echo ($ksatassd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd2" value="2" <?php echo ($ksatassd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd2" value="3" <?php echo ($ksatassd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">NVM</td>
            <td>SSD 1</td>
            <td></td>
            <td><input type="radio" name="knvmssd1" value="1" <?php echo ($knvmssd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd1" value="2" <?php echo ($knvmssd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd1" value="3" <?php echo ($knvmssd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 2</td>
            <td></td>
            <td><input type="radio" name="knvmssd2" value="1" <?php echo ($knvmssd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd2" value="2" <?php echo ($knvmssd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd2" value="3" <?php echo ($knvmssd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="8">4</td>
            <td rowspan="8">RAM</td>
            <td rowspan="2">1</td>
            <td rowspan="2">DDR 1</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd1c1" value="1" <?php echo ($kramd1c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c1" value="2" <?php echo ($kramd1c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c1" value="3" <?php echo ($kramd1c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd1c2" value="1" <?php echo ($kramd1c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c2" value="2" <?php echo ($kramd1c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c2" value="3" <?php echo ($kramd1c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">DDR 2</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd2c1" value="1" <?php echo ($kramd2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c1" value="2" <?php echo ($kramd2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c1" value="3" <?php echo ($kramd2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd2c2" value="1" <?php echo ($kramd2c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c2" value="2" <?php echo ($kramd2c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c2" value="3" <?php echo ($kramd2c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">DDR 3</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd3c1" value="1" <?php echo ($kramd3c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c1" value="2" <?php echo ($kramd3c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c1" value="3" <?php echo ($kramd3c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd3c2" value="1" <?php echo ($kramd3c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c2" value="2" <?php echo ($kramd3c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c2" value="3" <?php echo ($kramd3c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">DDR 4</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd4c1" value="1" <?php echo ($kramd4c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c1" value="2" <?php echo ($kramd4c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c1" value="3" <?php echo ($kramd4c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd4c2" value="1" <?php echo ($kramd4c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c2" value="2" <?php echo ($kramd4c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c2" value="3" <?php echo ($kramd4c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="10">5</td>
            <td rowspan="10">Peripheral</td>
            <td>1</td>
            <td>CD RW</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcdrw" value="1" <?php echo ($kcdrw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcdrw" value="2" <?php echo ($kcdrw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcdrw" value="3" <?php echo ($kcdrw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>DVD RW</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kdvdrw" value="1" <?php echo ($kdvdrw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kdvdrw" value="2" <?php echo ($kdvdrw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kdvdrw" value="3" <?php echo ($kdvdrw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>ATA/ IDE Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kaic" value="1" <?php echo ($kaic =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kaic" value="2" <?php echo ($kaic =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kaic" value="3" <?php echo ($kaic =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>SATA Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="ksatac" value="1" <?php echo ($ksatac =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac" value="2" <?php echo ($ksatac =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac" value="3" <?php echo ($ksatac =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Keyboard</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkey" value="1" <?php echo ($kkey =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkey" value="2" <?php echo ($kkey =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkey" value="3" <?php echo ($kkey =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Mouse</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmou" value="1" <?php echo ($kmou =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmou" value="2" <?php echo ($kmou =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmou" value="3" <?php echo ($kmou =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Speaker</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kspea" value="1" <?php echo ($kspea =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kspea" value="2" <?php echo ($kspea =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kspea" value="3" <?php echo ($kspea =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Monitor CRT</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmoncrt" value="1" <?php echo ($kmoncrt =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmoncrt" value="2" <?php echo ($kmoncrt =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmoncrt" value="3" <?php echo ($kmoncrt =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>9</td>
            <td>Monitor LCD</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmonlcd" value="1" <?php echo ($kmonlcd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmonlcd" value="2" <?php echo ($kmonlcd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmonlcd" value="3" <?php echo ($kmonlcd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>10</td>
            <td>VGA Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kvgac" value="1" <?php echo ($kvgac =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgac" value="2" <?php echo ($kvgac =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgac" value="3" <?php echo ($kvgac =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">6</td>
            <td rowspan="5">Card</td>
            <td>1</td>
            <td>LAN Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klanc" value="1" <?php echo ($klanc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="2" <?php echo ($klanc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="3" <?php echo ($klanc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>VGA Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kvgacrd" value="1" <?php echo ($kvgacrd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgacrd" value="2" <?php echo ($kvgacrd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgacrd" value="3" <?php echo ($kvgacrd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Firewire Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kfirec" value="1" <?php echo ($kfirec =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kfirec" value="2" <?php echo ($kfirec =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kfirec" value="3" <?php echo ($kfirec =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>LPT Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klptc" value="1" <?php echo ($klptc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klptc" value="2" <?php echo ($klptc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klptc" value="3" <?php echo ($klptc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>RS 232 Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="krsc" value="1" <?php echo ($krsc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="krsc" value="2" <?php echo ($krsc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="krsc" value="3" <?php echo ($krsc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">7</td>
            <td rowspan="5">Kelistrikan</td>
            <td>1</td>
            <td>Power Supply</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kpwrs" value="1" <?php echo ($kpwrs =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kpwrs" value="2" <?php echo ($kpwrs =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kpwrs" value="3" <?php echo ($kpwrs =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Kabel Power</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwr" value="1" <?php echo ($kkpwr =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwr" value="2" <?php echo ($kkpwr =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwr" value="3" <?php echo ($kkpwr =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Kabel Power Monitor</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwrmon" value="1" <?php echo ($kkpwrmon =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrmon" value="2" <?php echo ($kkpwrmon =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrmon" value="3" <?php echo ($kkpwrmon =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kabel Power SATA</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwrsata" value="1" <?php echo ($kkpwrsata =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrsata" value="2" <?php echo ($kkpwrsata =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrsata" value="3" <?php echo ($kkpwrsata =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kabel Molex Power</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkmolpwr" value="1" <?php echo ($kkmolpwr =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkmolpwr" value="2" <?php echo ($kkmolpwr =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkmolpwr" value="3" <?php echo ($kkmolpwr =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                Keterangan
            </td>
            <td colspan="7">
                <textarea name="ket" style="width: 674.5px; height: 80px;" ><?php echo $ket;?></textarea>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_jd" class="form-control" id="kd_jd" value="<?php echo $kd_jd;?>">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            </td>
            <td>
            <a href="<?php echo site_url('jadwal')?>" class="btn btn-default">Batal</a>
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