<?php
  $dataPoints = array();
  $datarata = array();
  $wperawatan = array();
  foreach($report_g as $row){
    if($row->selisih != NULL){
      $wperawatan[] = $row->selisih;
    }
  }
  foreach($report_l as $row){
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

  <style>
      table{
        border-collapse: collapse;
      }
      table, th, td{
        border: 1px solid black;
      }
  </style>
</head>
  
  
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

  <button id="exportButton" type="button">Download PDF</button>
  <button id="back" type="button" onclick="history.back(-1)">Back</button>
  <div id="chartsContainer">
  <div class="chart-area">
    <!-- <canvas id="myAreaChart"></canvas> -->
    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
  </div>
  <div>
    Data Perawatan
    <table border="1">
      <tr>
      <th>
        Tanggal
      </th>
      <th>
        Jumlah Perawatan
      </th>
      </tr>
      <tr>
        <?php 
          foreach($report_l as $row){
            echo '<td>'.$row->tanggal.'</td><td>'.$row->total.'</td></tr>';
          }
        ?>
      </tr>

    </table>
        </br>
    <table>
      <tr>
        <td>
        Mean 
        </td>
        <td>:</td>
        <td>
          <?php $t= count($datarata);
                print_r(array_sum($datarata)/$t);
          ?>
        </td>
      </tr>
      <tr>
        <td>
        Median
        </td>
        <td>:</td>
        <td>
          <?php sort($datarata);
                $m=$t/2;
                if(gettype($m)=='double'){
                    $te=floor($m);
                    $med=$datarata[$m];
                }else{
                    $m=floor($m);
                    $m1=round($m);
                    $med=($datarata[$m]+$datarata[$m1])/2;
                }
                echo $med;
          ?>
        </td>
      </tr>
      <tr>
        <td>
        Modus
        </td>
        <td>:</td>
        <td>
          <?php $mo=array_count_values($datarata);
                foreach ($mo as $key => $val) {
                if($val==max($mo)){
                  echo "$key banyak data $val<br/>";
                }
              }
          ?>
        </td>
      </tr>
      <tr>
        <td>
          Rata-Rata Waktu Perawatan
        </td>
        <td>:</td>
        <td>
          <?php $ts = count($wperawatan);
                $rdetik = array_sum($wperawatan)/$ts;
                $menit = floor($rdetik/60);
                $detik = floor($rdetik-($menit*60));
                echo $menit.'menit '.$detik.'detik';
          ?>
        </td>
      </tr>
    </table>
  </div>
  </div>

  <script>
window.onload = function () {
var chart1 = new CanvasJS.Chart("chartContainer1", {
	title: {
  	text: "Grafik Perawatan"
  },
  data: [
    {
      type: "spline",
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }					
  ]
});

chart1.render();

$("#exportButton").click(function(){
  html2canvas(document.querySelector("#chartsContainer"), { height: 1800, width: window.innerWidth * 2, scale: 1 }).then(canvas => {  	
    var dataURL = canvas.toDataURL();    
    var pdf = new jsPDF();
    pdf.addImage(dataURL, 'JPEG', 20, 20, 352, 240); //addImage(image, format, x-coordinate, y-coordinate, width, height)
    pdf.setFont("helvetica");
    pdf.setFontType("bold");
    pdf.setFontSize(20);
    pdf.save("Grafik Perawatan.pdf");
  });
});
}
  </script>

</html>