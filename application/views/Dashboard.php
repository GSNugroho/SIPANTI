<html>
	<head>
		<title> SISTEM INFORMASI </title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/now-ui-dashboard.css') ?>"/>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
	</head>
	<body>
	<div class="warper">            
        <div class="header">
			<div class="sidebar" data-color='blue'>
				<div class="sidebar-wrapper" id="sidebar-wrapper">
				<ul class="nav">
					<li class="active"><?php echo anchor(base_url('dashboard'), 'Beranda')?></li>
					<li><?php echo anchor(base_url('monitor'), 'Daftar Inventaris'); ?></li>
					<li><?php echo anchor(base_url('jadwal'), 'Jadwal Perawatan Inventaris');?></li>
					<li><?php echo anchor(base_url('perawatan'), 'Perawatan Inventaris'); ?></li>
					<li><?php echo anchor(base_url('mutasi'), 'Mutasi Inventaris'); ?></li>
					<li><?php echo anchor(base_url('report'), 'Report'); ?></li>
					<li><a href="dashboard.php?page=laporan">Report</a></li>
				</ul>
				<div>
			</div>
		</div>
		
		
		
			<div class="main-panel" id="main-panel">
			<?php 
			if(isset($_GET['page'])){
				$page = $_GET['page'];
		 
				switch ($page) {
					case 'home':
						require "home.php";
						break;
					case 'perawatan':
						require "perawatan.php";
						break;
					case 'perbaikan':
						include "perbaikan.php";
						break;
					case 'laporan':
						include anchor(base_url('report'));
					default:
						echo "<center><h3>Maaf. Halaman tersebut tidak ada</h3></center>";
						break;
				}
			}else{
				//include "home.php";
			}
			 ?>
			</div>
		</div>
	</body>
</html>