<?php
  $dataPoints = array();
  $datarata = array();
  foreach($report_g as $row){
    array_push($dataPoints, array("x"=> $row->tanggal, "y"=> $row->total));
    $datarata[] = $row->total;
  }
?>
<html>
  <head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
  <meta name="author" content="">
  
  <title> SISTEM INFORMASI </title>
	<!-- Untuk Font-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Template e -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jspdf.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/html2canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/canvasjs.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/highchart/highcharts.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/highchart/export-data.js')?>"></script>
  <!-- <script src="<?php //echo base_url('assets/vendor/highchart/exporting.js')?>"></script> -->
</head>
<body>
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
            <a class="collapse-item" href="<?php echo base_url('jadwal')?>">Jadwal Perawatan</a>
            <a class="collapse-item" href="<?php echo base_url('perawatan')?>">Daftar Perawatan</a>
            <a class="collapse-item " href="<?php echo base_url('report/riwayat_perawatan')?>">Riwayat Perawatan</a>
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
				<a class="collapse-item " href="<?php echo base_url('report/report_perawatan')?>">Laporan Perawatan</a>
				<a class="collapse-item " href="<?php echo base_url('report/report_perbaikan')?>">Laporan Perbaikan</a>
        <a class="collapse-item active" href="<?php echo base_url('report/report_telat')?>">Laporan Keterlambatan</a>
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
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Keterlambatan</h6>
	</div>

  <div id="chartsContainer" class="card-body">
    <div id="printpdf">
  <div class="chart-area">
    <!-- <canvas id="myAreaChart"></canvas> -->
    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
  </div>
        <?php 
            $t= count($datarata);
            
            sort($datarata);
            $m=$t/2;
            if(gettype($m)=='double'){
                $te=floor($m);
                $med=$datarata[$m];
            }else{
                $m=floor($m);
                $m1=round($m);
                $med=($datarata[$m]+$datarata[$m1])/2;
            }
            

            $mo=array_count_values($datarata);
            
          ?>

    <div class="table-responsive">
    <table border="1" class="table table-bordered">
        <tr>
            <td>Min</td>
            <td>Rata - Rata</td>
            <td>Median</td>
            <td>Modus</td>
            <td>Max</td>    
        </tr>
        <tr>
            <td>
                <?php echo min($datarata);?>
            </td>
            <td>
                <?php 
                $angka = array_sum($datarata)/$t;
                $angka_format = number_format($angka,2,",",".");
                echo $angka_format;
                ?>
            </td>
            <td>
                <?php echo $med;?>
            </td>
            <td>
                <?php
                foreach ($mo as $key => $val) {
                    if($val==max($mo)){
                    echo "$key banyak data $val<br/>";
                    }
                }
                ?>
            </td>
            <td>
                <?php echo max($datarata);?>
            </td>
        </tr>
    </table>
    </div>
  </div>
  <button id="exportButton" type="button" class="btn btn-primary">Download PDF</button>
  </div>
    </div>
    </div>
</div>

  <script>
Highcharts.chart('chartContainer1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Keterlambatan Bulanan'
    },
    subtitle: {
        text: '<?php echo $bulan; echo $tahun?>'
    },
    xAxis: {
        title: {
          text: 'Tanggal Terlambat'
        },
        categories:[<?php 
          foreach($report_g as $row){
            //array_push($dataPoints, array("x"=> $row->tanggal, "y"=> $row->total));
            echo "'" . $row->tanggal . "',";
          }
        ?>]
    },
    yAxis: {
        title: {
            text: 'Jumlah Keterlambatan'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Keterlambatan',
        data: [<?php foreach($report_g as $row){
            echo  $row->total . ",";
          } 
        ?>]
    }]
});

$("#exportButton").click(function(){
    html2canvas(document.querySelector("#printpdf"), { height: 1800, width: window.innerWidth * 2, scale: 1 }).then(canvas => {  	
    var dataURL = canvas.toDataURL();    
    var pdf = new jsPDF();
    // var docDefinition = {
    //     pageSize: 'A4',
    //     pageOrientation: 'landscape'
    // }
    pdf.addImage(dataURL, 'JPEG', 20, 20, 480, 320); //addImage(image, format, x-coordinate, y-coordinate, width, height)
    pdf.setFont("helvetica");
    pdf.setFontType("bold");
    pdf.setFontSize(20);
    pdf.save("Grafik Keterlambatan.pdf");
    // pdf.createPdf(docDefinition).save("grafikperawatan.pdf");
    });
  });
  </script>
</body>
</html>