<?php
  $this->load->view('mainmenu');

  $dataPoints = array();
  $datarata = array();
  foreach($report_g as $row){
    array_push($dataPoints, array("x"=> $row->tanggal, "y"=> $row->total));
    $datarata[] = $row->total;
  }
?>

	<!-- Untuk Font-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Template e -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
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

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Perbaikan</h6>
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
                
          ?>
<div class="table-responsive">          
    <table class="table table-bordered">
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
                <?php $angka = array_sum($datarata)/$t;
                $angka_format = number_format($angka,2,",",".");
                echo $angka_format;
                ?>
            </td>
            <td>
                <?php echo $med;?>
            </td>
            <td>
                <?php
                $mo=array_count_values($datarata);
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

  <script>
  // window.onload = function () {
  // var chart1 = new CanvasJS.Chart("chartContainer1", {
  //   title: {
  //     text: "Grafik Perbaikan"
  //   },
  //   data: [
  //     {
  //       type: "spline",
  //       dataPoints: <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  //     }					
  //   ]
  // });

  // chart1.render();

  $("#exportButton").click(function(){
    html2canvas(document.querySelector("#printpdf"), { height: 1800, width: window.innerWidth * 2, scale: 1 }).then(canvas => {  	
    var dataURL = canvas.toDataURL();    
    var pdf = new jsPDF();
    // var docDefinition = {
    //     pageSize: 'A4',
    //     pageOrientation: 'landscape'
    // }
    pdf.addImage(dataURL, 'JPEG', 20, 20, 352, 240); //addImage(image, format, x-coordinate, y-coordinate, width, height)
    pdf.setFont("helvetica");
    pdf.setFontType("bold");
    pdf.setFontSize(20);
    pdf.save("Grafik Perbaikan.pdf");
    // pdf.createPdf(docDefinition).save("grafikperawatan.pdf");
    });
  });
  

  Highcharts.chart('chartContainer1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Perbaikan Bulanan'
    },
    subtitle: {
        text: '<?php echo $bulan; echo $tahun?>'
    },
    xAxis: {
        title: {
          text: 'Tanggal Perbaikan'
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
            text: 'Jumlah Perbaikan'
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
        name: 'Perbaikan',
        data: [<?php foreach($report_g as $row){
            echo  $row->total . ",";
          } 
        ?>]
    }]
});
  </script>

    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

</body>
</html>