<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jadwal Perawatan Inventaris</title>
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
	<!-- FullCalendar -->
	
	<link href='<?php echo base_url('assets/packages/core/main.css')?>' rel='stylesheet' />
	<link href='<?php echo base_url('assets/packages/daygrid/main.css')?>' rel='stylesheet' />
	<link href='<?php echo base_url('assets/packages/timegrid/main.css')?>' rel='stylesheet' />
    <!-- Custom CSS -->
    <!-- jQuery Version 1.11.1 -->
	<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.js'); ?> "></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>" ></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- FullCalendar -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/moment.min.js'); ?> "></script>

	<script src="<?php echo base_url('assets/js/my_js.js')?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/locales-all.js');?>"></script>
	<script src='<?php echo base_url('assets/packages/core/main.js')?>' type="text/javascript"></script>
	<script src='<?php echo base_url('assets/packages/interaction/main.js')?>' type="text/javascript"></script>
	<script src='<?php echo base_url('assets/packages/daygrid/main.js')?>' type="text/javascript"></script>
	<script src='<?php echo base_url('assets/packages/timegrid/main.js')?>' type="text/javascript"></script>
	<script src='<?php echo base_url('assets/packages/core/locales-all.js')?>' type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/my_js.js')?>" type="text/javascript"></script>


	<!-- Untuk Font-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<style>
    body {
        /* padding-top: 70px; */
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

</head>

<body id="page-top">

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
	<li class="nav-item">
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
			<a class="collapse-item active" href="<?php echo base_url('jadwal')?>">Jadwal Perawatan</a>
			<a class="collapse-item" href="<?php echo base_url('perawatan')?>">Daftar Riwayat Perawatan</a>
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
				<a class="collapse-item" href="<?php echo base_url('report/report_mutasi')?>">Laporan Mutasi</a>
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

	<!-- Page Content -->
	<div class="container-fluid">
	<?php 
	// echo anchor(base_url('jadwal/create'),'Tambah Jadwal', 'class="btn btn-primary"');
	?>	
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3>Jadwal Perawatan Inventaris</h3>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal Add-->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog1" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'jadwal/create_action'?>">
			
			  <div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title1" id="myModalLabel">Buat Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body1">
				
				  <div class="form-group1">
					<label for="nm_jd" class="col-sm-2 control-label">Nama Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="nm_jd" class="form-control1" id="nm_jd" placeholder="Nama Perawatan">
					</div>
                  </div>
                  <div class="form-group1">
                      <label for="kd_ruang" class="col-sm-2 control-label">Ruang</label>
                      <div class="col-sm-10">
                        <select name="kd_ruang" class="form-control1" id="kd_ruang">
                            <option value="">--Pilih Ruang--</option>
                        <?php
                            foreach ($dd_gr as $row) {  
                            echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                            }
                            echo"
                      </select>"
                        ?>
                      </div>
                  </div>
                  <div class="form-group1">
                    <label for="kd_inv" class="col-sm-2 control-label">Kode Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_inv" class="form-control1" id="vc_no_inv" placeholder="Kode Inventaris " onclick="div_show()">
					</div>
					</div>

				  

				  <!-- <div class="form-group1">
					<label for="color" class="col-sm-2 control-label">Warna</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control1" id="color">
						  <option value="">--Pilih Warna--</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div> -->
				  <div class="form-group1">
					<label for="start" class="col-sm-2 control-label">Tanggal Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control1" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group1">
					<label for="end" class="col-sm-2 control-label">Tanggal Selesai</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control1" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer1">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			  

			</form>
			</div>
		  </div>
		  <div id="abc">
					<div id="popupContact">
					<img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
					<h5>Daftar Inventaris</h5>
					<table id="pop" border="1">
						<tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>
					
					</table>
					</div>
					</div>
					<script>

					$(document).ready(function(){ 
						$("#kd_ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi

						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: "<?php echo base_url("jadwal/list_inv"); ?>", // Isi dengan url/path file php yang dituju
							data: {id_ruang : $("#kd_ruang").val()}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							beforeSend: function(e) {
							if(e && e.overrideMimeType) {
								e.overrideMimeType("application/json;charset=UTF-8");
							}
							},
							success: function(response){ // Ketika proses pengiriman berhasil
							$("#loading").hide(); 

							$("#pop").html(response.list_inv).show();
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
							alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
							}
						});
						});
					});
					</script>
		</div>
		
		
		
		<!-- Modal Edit-->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog1" role="document">
			<div class="modal-content">
			<form class="form-horizontal1" method="POST" action="<?php echo base_url().'jadwal/update_action_konten'?>">
			  <div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title1" id="myModalLabel">Edit Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body1">
				
				  <div class="form-group1">
					<label for="nm_jd" class="col-sm-2 control-label">Nama Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="nm_jd" class="form-control1" id="nm_jd" placeholder="Nama Perawatan">
					</div>
                  </div>
                  <div class="form-group1">
                  <label for="kd_ruang" class="col-sm-2 control-label">Ruang</label>
                      <div class="col-sm-10">
                        <select name="kd_ruang" class="form-control1" id="kd_ruang">
                            <option value="">--Pilih Ruang--</option>
                        <?php
                            foreach ($dd_gr as $row) {  
                            echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                            }
                            echo"
                      </select>"
                        ?>
                      </div>
                  </div>
                  <div class="form-group1">
                    <label for="kd_inv" class="col-sm-2 control-label">Kode Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_inv" class="form-control1" id="kd_inv" placeholder="Kode Inventaris">
                    </div>
                  </div>  
				  <!-- <div class="form-group1">
					<label for="color" class="col-sm-2 control-label">Warna</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control1" id="color">
						  <option value="">--Pilih Warna--</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>			 -->
				    <div class="form-group1"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
							  
			<form method="post" action="<?php echo base_url().'perawatan/updateperawatan'?>">
			<div class="modal-footer">
			<input type="hidden" name="kd_jd" class="form-control" id="kd_jd">
			<button type="submit" class="btn btn-primary" >Data Perawatan</button>
			</div>
			</form>
			</div>
		  </div>
		</div>
	</div>
	</div>
    </div>
    <!-- /.container -->
	
	<script>

	$(document).ready(function() {
		var initialLocaleCode = 'id';
		var localeSelectorEl = document.getElementById('locale-selector');
		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			defaultDate: Date(),
			locale: initialLocaleCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id_jd').val(event.id_jd);
					$('#ModalEdit #nm_jd').val(event.nm_jd);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit #kd_ruang').val(event.kd_ruang);
                    $('#ModalEdit #kd_inv').val(event.kd_inv);
					$('#ModalEdit #kd_jd').val(event.kd_jd);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($inv_jadwal as $event): 
			
				$start = explode(" ", $event->tgl_jd);
				$end = explode(" ", $event->tgl_jd_selesai);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event->tgl_jd;
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event->tgl_jd_selesai;
				}
			?>
				{
					title: '<?php echo $event->nm_jd?>',
					id_jd: '<?php echo $event->id_jd ?>',
					kd_jd: '<?php echo $event->kd_jd?>',
                    nm_jd: '<?php echo $event->nm_jd ?>',
                    kd_inv: '<?php echo $event->kd_inv ?>',
                    kd_ruang: '<?php echo $event->kd_ruang ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event->color ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id_jd =  event.id_jd;
			
			event = [];
			event[0] = id_jd;
			event[1] = start;
			event[2] = end;
			
			$.ajax({
			 url: '<?php echo base_url().'jadwal/update_action_tgl'?>',
			 type: "post",
			 data: {event:event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Pindah Jadwal Berhasil'); 
					}
				}
			});
		}
		
	});
</script>

<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>

</body>

</html>