<!doctype html>
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
    <link href="<?php echo base_url('assets/bootstrap/css/jquery-ui.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>"></script>
        

    </head>

    <body >

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
    <li class="nav-item active">
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
            <a class="collapse-item" href="<?php echo base_url('perawatan')?>">Daftar Perawatan</a>
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
				<a class="collapse-item " href="<?php echo base_url('perbaikan')?>">Daftar Perbaikan</a>
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
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Data Perbaikan</h6>
    </div>
    <div class="card-body">

        <h2 style="margin-top:0px">Inventaris <?php //echo $button ?></h2>
        <form action="<?php echo base_url(). 'monitor/update_action';?>" method="post">
	    <table>
        <tr>
        <td>
        <div class="form-group">
            <label for="nm_inv">Nama Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="nm_inv" id="nm_inv" placeholder="Nama Barang" value="<?php echo $nm_inv; ?>">
        </div>
        </td>
        <td></td>
        <td>
		<div class="form-group">
            <label for="merk">Merk <?php //echo form_error('merk') ?></label>
                <select require name="merk" class="form-control"  id="merk">
                    <?php
                        foreach($dd_gm as $row) {
                            if($merk == $row->vc_kd_merk){
                                echo '<option value="'.$row->vc_kd_merk.'" selected="selected">'.$row->vc_nm_merk.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_kd_merk.'">'.$row->vc_nm_merk.'</option>';
                            }
                        }
                    ?>
                </select>
        </div>
        </td>
        </tr>
        
        <tr>
        <td>        
		<div class="form-group">
            <label for="satuan">Satuan <?php //echo form_error('satuan') ?></label>
            <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>">
		</div>
        </td>	
        <td></td>
        <td>        
		<div class="form-group">
            <label for="jumlah">Jumlah <?php //echo form_error('jumlah') ?></label>
            <input class="form-control" type="text" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jmlh; ?>">
		</div>
        </td>
        </tr>

        <tr>
        <td>	        
		<div class="form-group">
            <label for="tgl_terima">Tanggal Terima <?php //echo form_error('tgl_terima') ?></label>
            <input class="form-control" type="date" name="tgl_terima" id="tgl_terima" placeholder="tgl_terima" value="<?php echo date('m-d-Y', strtotime($tgl_terima)); ?>">
		</div>
        </td>
        <td></td>
        <td>	        
		<div class="form-group">
            <label for="status">Status <?php //echo form_error('status') ?></label>
            <input class="form-control" type="text" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>">
		</div>
		</tr>
        </td>

        <tr>
        <td>	
		<div class="form-group">
            <label for="kondisi">Kondisi <?php //echo form_error('kondisi') ?></label>
            <input class="form-control" type="text" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>">
		</div>
		</td>
        </tr>	
        
        <tr>
        <td>
		<div class="form-group">
            <label for="ket">Keterangan <?php //echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Keterangan"><?php echo $ket; ?></textarea>
        </div>
        </td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="kd_bantu">Jenis Barang <?php //echo form_error('kd_bantu') ?></label>
            <select require name="kd_bantu" class="form-control"  id="kd_bantu">
                    <?php
                        foreach($dd_gg as $row) {
                            if($kd_bantu == $row->kd_gol){
                                echo '<option value="'.$row->kd_gol.'" selected="selected">'.$row->nm_gol.'</option>';
                            }else{
                                echo '<option value="'.$row->kd_gol.'">'.$row->nm_gol.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="no_aset">Nomor Aset <?php //echo form_error('no_aset') ?></label>
            <input class="form-control" type="text" name="no_aset" id="no_aset" placeholder="Nomor Aset" value="<?php echo $no_aset; ?>">
		</div>
		</td>
        </tr>	

        <tr>
        <td>
		<div class="form-group">
            <label for="id_ruang">Ruang <?php //echo form_error('id_ruang') ?></label>
            <select require name="id_ruang" class="form-control"  id="id_ruang">
                    <?php
                        foreach($dd_gr as $row) {
                            if($id_ruang == $row->vc_k_gugus){
                                echo '<option value="'.$row->vc_k_gugus.'" selected="selected">'.$row->vc_n_gugus.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_k_gugus.'">'.$row->vc_n_gugus.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
		</td>
        </tr>	

        <tr>
        <td>
		<div class="form-group">
            <label for="foto_brg">Foto Barang <?php //echo form_error('foto_brg') ?></label>
            <input  class="form-control" type="file" name="foto_brg" id="foto_brg" placeholder="Foto Barang" value="<?php echo $foto_brg; ?>"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="foto_qr">Foto QR <?php //echo form_error('foto_qr') ?></label>
			<input  class="form-control" type="file" name="foto_qr" id="foto_qr" placeholder="Foto QR" value="<?php echo $foto_qr; ?>r"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="id_urut">Urut <?php //echo form_error('id_urut') ?></label>
            <input class="form-control" type="text" name="id_urut" id="id_urut" placeholder="Urut" value="<?php echo $id_urut; ?>">
		</div>
		</td>
        </tr>

        <tr>
        <td>        
		<div class="form-group">
            <label for="aktif">Aktif <?php //echo form_error('aktif') ?></label>
            <select class="form-control" name="aktif" class="form-control" id="aktif">
                <option value="">--Status Aktif--</option>
                <option value="0" <?php echo ($aktif == '0')?'selected':''?>>Tidak Aktif</option>
                <option value="1" <?php echo ($aktif == '1')?'selected':''?>>Aktif</option>
            </select>
		</div>
		</td>
        </tr>
		<tr>
		<td>
		<div class="form-group">
            <label for="jns_brg">Jenis Tipe <?php //echo form_error('jns_brg') ?></label>
            <select require name="jns_brg" class="form-control"  id="jns_brg">
                    <?php
                        foreach($dd_gj as $row) {
                            if($jns_brg == $row->vc_kd_jenis){
                                echo '<option value="'.$row->vc_kd_jenis.'" selected="selected">'.$row->vc_nm_jenis.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_kd_jenis.'">'.$row->vc_nm_jenis.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
		</td>
		</tr>

        <tr>
		<td>
		<!-- <div class="form-group">
            <label for="cetak">Cetak <?php //echo form_error('cetak') ?></label>
            <input class="form-control" type="text" name="cetak" id="cetak" placeholder="Cetak" value="<?php echo $cetak; ?>">
		</div>
        </td>
        </tr>
		
        <tr>
        <td>
		<div class="form-group">
            <label for="kd_aset">Kode Aset <?php //echo form_error('kd_aset') ?></label>
            <input class="form-control" type="text" name="kd_aset" id="kd_aset" placeholder="Kode Aset" value="<?php echo $kd_aset; ?>">
		</div>
        </td>
        </tr>	
        
        <tr>
        <td> -->
	    <input type="hidden" name="kd_inv" class="form-control" id="kd_inv" value="<?php echo $kd_inv;?>">
        <button type="submit" class="btn btn-primary">Save</button> 
        </td>
        <td>
        <a href="<?php echo site_url('monitor') ?>" class="btn btn-default">Cancel</a>
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
    </body>
</html>