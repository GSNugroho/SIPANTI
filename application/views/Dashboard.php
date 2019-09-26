<?php
  $this->load->view('mainmenu');
  // print_r($this->session->userdata());
?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jadwal Perawatan Hari Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                      foreach($jadwal_t as $ib){
                        if($ib->total ==''){echo '0';}else
                        {echo $ib->total;}
                      }
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Jadwal Perawatan Bulan Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        foreach($jadwal_tb as $ib){
                          echo $ib->total;
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perbaikan Bulan Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        foreach($perbaikan_t as $ib){
                          echo $ib->total;
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wrench fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Keterlambatan Perawatan Bulan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        foreach($jadwal_tlt as $ib){
                          echo $ib->total;
                        }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Perawatan Inventaris</h6>
                  <div class="dropdown no-arrow">
                    <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Capaian Perawatan Tahun</h6>
                  <div class="dropdown no-arrow">
                    <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Tepat Dikerjakan
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> Telat Dikerjakan
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Belum Dikerjakan
                  </span>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="row">
          <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Perbaikan Inventaris</h6>
                  <div class="dropdown no-arrow">
                    <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Keterlambatan Perawatan Inventaris</h6>
                  <div class="dropdown no-arrow">
                    <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart3"></canvas>
                  </div>
                </div>
              </div>
            </div>

        </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-7 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Jadwal Perawatan Hari Ini </h6>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Perawatan</th>
                    <th>Nama Jadwal</th>
                    <th>Kode Inventaris</th>
                    <th>Nama Barang</th>
                    <th>Ruang</th>
                    <th>Status Pengerjaan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    //$no = $this->uri->segment('3') + 1;
                    foreach($jadwal_dt as $ib){ 
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo date('d-M-Y', strtotime($ib->tgl_jd));?></td>
                      <td><?php echo $ib->nm_jd ?></td>
                      <td><?php echo $ib->kd_inv ?></td>
                      <td><?php echo $ib->nm_inv ?></td>
                      <td><?php echo $ib->vc_n_gugus ?></td>
                      <td><?php $data = $ib->status_p;
                          if($data=='1'){echo "Belum Dikerjakan";
                          }else if($data=='2'){echo "Sedang Dikerjakan";
                          }else{echo "Sudah Selesai Dikerjakan";}
                      ?></td>
                      <td>
                        <?php echo anchor('perawatan/update_k/'.$ib->kd_jd,'Edit'); ?>
                        <?php echo anchor('perawatan/delete/'.$ib->kd_jd,'Hapus'); ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
                </div>
              </div>

          </div>

          <!-- Content Column -->
          <div class="col-lg-5 mb-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Target Perawatan Bulanan</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Target Perawatan vs Capaian Perawatan<span class="float-right"><?php echo $progres_tvc.'%'?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progres_tvc?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div> -->

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?php //echo base_url('assets/js/demo/chart-area-demo.js')?>"></script> -->
<!-- <script src="<?php //echo base_url('assets/js/demo/chart-pie-demo.js')?>"></script> -->

<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Capaian Perawatan
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Tepat Dikerjakan', 'Telat Dikerjakan', 'Belum Dikerjakan'],
    datasets: [{
      data: [
      <?php foreach($grafik_cpr_ss as $ib){ echo '"' . $ib->total . '",';} ?>
      <?php foreach($grafik_cpr_tlt as $ib){ echo '"'. $ib->total. '",';}?>
      <?php foreach($grafik_cpr_bs as $ib){ echo '"'. $ib->total. '",';}?>],
      backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
      hoverBackgroundColor: ['#13855c', '#dda20a', '#be2617'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


// Area Chart Perawatan
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
    <?php 
    foreach($grafik_pr as $ib){
      switch ($ib->bulan){
        case 1: 
          echo '"Jan",';
          break;
        case 2:
          echo '"Feb",';
          break;
        case 3:
          echo '"Mar",';
          break;
        case 4:
          echo '"Apr",';
          break;
        case 5:
          echo '"Mei",';
          break;
        case 6:
          echo '"Jun",';
          break;
        case 7:
          echo '"Jul",';
          break;
        case 8:
          echo '"Agu",';
          break;
        case 9:
          echo '"Sep",';
          break;
        case 10:
          echo '"Okt",';
          break;
        case 11:
          echo '"Nov",';
          break;
        case 12:
          echo '"Des",';
          break;
      }
    }
    ?>
    ],
    datasets: [{
      label: "Perawatan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php 
      foreach($grafik_pr as $ib){ echo '"' . $ib->total . '",';} ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    },
    scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 100
          }
        }]
    },
  }
});

var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
    <?php 
    foreach($grafik_prb as $ib){
      switch ($ib->bulan){
        case 1: 
          echo '"Jan",';
          break;
        case 2:
          echo '"Feb",';
          break;
        case 3:
          echo '"Mar",';
          break;
        case 4:
          echo '"Apr",';
          break;
        case 5:
          echo '"Mei",';
          break;
        case 6:
          echo '"Jun",';
          break;
        case 7:
          echo '"Jul",';
          break;
        case 8:
          echo '"Agu",';
          break;
        case 9:
          echo '"Sep",';
          break;
        case 10:
          echo '"Okt",';
          break;
        case 11:
          echo '"Nov",';
          break;
        case 12:
          echo '"Des",';
          break;
      }
    }
    ?>
    ],
    datasets: [{
      label: "Perbaikan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php 
      foreach($grafik_prb as $ib){ echo '"' . $ib->total . '",';} ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    },
    scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 100
          }
        }]
    },
  }
});

var ctx = document.getElementById("myAreaChart3");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
    <?php 
    foreach($grafik_tlt as $ib){
      switch ($ib->bulan){
        case 1: 
          echo '"Jan",';
          break;
        case 2:
          echo '"Feb",';
          break;
        case 3:
          echo '"Mar",';
          break;
        case 4:
          echo '"Apr",';
          break;
        case 5:
          echo '"Mei",';
          break;
        case 6:
          echo '"Jun",';
          break;
        case 7:
          echo '"Jul",';
          break;
        case 8:
          echo '"Agu",';
          break;
        case 9:
          echo '"Sep",';
          break;
        case 10:
          echo '"Okt",';
          break;
        case 11:
          echo '"Nov",';
          break;
        case 12:
          echo '"Des",';
          break;
      }
    }
    ?>
    ],
    datasets: [{
      label: "Keterlambatan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php 
      foreach($grafik_tlt as $ib){ echo '"' . $ib->total . '",';} ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    },
    scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 100
          }
        }]
    },
  }
});

</script>

</body>

</html>
