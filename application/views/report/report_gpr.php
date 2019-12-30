<?php
  $this->load->view('mainmenu');

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
  <style>
      table{
        border-collapse: collapse;
      }
      table, th, td{
        border: 1px solid black;
      }
  </style>
  
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
 
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Perawatan</h6>
	</div>

  <div id="chartsContainer" class="card-body">
    <div id="printpdf">
  <div class="chart-area">
    <!-- <canvas id="myAreaChart"></canvas> -->
    <div id="chartContainer1" style="height: 300px;width: 100%"></div>
  </div>
  <div>

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

                // $ts = count($wperawatan);
                // $rdetik = array_sum($wperawatan)/$ts;
                // $menit = floor($rdetik/60);
                // $detik = floor($rdetik-($menit*60));
                // echo $menit.'menit '.$detik.'detik';
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
                  }?>
              </td>
              <td>
                  <?php echo max($datarata);?>
              </td>
        </tr>
    </table>
    </div>
</div>
</div>
    <button id="exportButton" type="button" class="btn btn-primary">Download PDF</button>
    </div>
    </div>

  <script>
// Highcharts.drawTable = function() {
    
//     // user options
//     var tableTop = 310,
//         colWidth = 100,
//         tableLeft = 20,
//         rowHeight = 20,
//         cellPadding = 2.5,
//         valueDecimals = 1,
//         valueSuffix = ' °C';
        
//     // internal variables
//     var chart = this,
//         series = chart.series,
//         renderer = chart.renderer,
//         cellLeft = tableLeft;
//     var baris = 2;
//     var kata = 'Data';
//     var data = 'data';
//     var bb = chart.xAxis[0].categories;
//     // draw category labels
//     $.each(bb, function(i, name) {
//         renderer.text(
//             kata, 
//             cellLeft + cellPadding, 
//             tableTop +  1 * rowHeight - cellPadding
//         )
//         .css({
//             fontWeight: 'bold'
//         })       
//         .add();
//     });

//     $.each(series, function(i, serie) {
//         cellLeft += colWidth;
        
//         // Apply the cell text
//         renderer.text(
//                 serie.name,
//                 cellLeft - cellPadding + colWidth, 
//                 tableTop + rowHeight - cellPadding
//             )
//             .attr({
//                 align: 'right'
//             })
//             .css({
//                 fontWeight: 'bold'
//             })
//             .add();
        
//         $.each(serie.data, function(row, point) {
            
//             // Apply the cell text
//             renderer.text(
//                     data, 
//                     cellLeft + colWidth - cellPadding, 
//                     tableTop + (row + 1) * rowHeight - cellPadding
//                 )
//                 .attr({
//                     align: 'right'
//                 })
//                 .add();
            
//             // horizontal lines
//             if (row == 0) {
//                 Highcharts.tableLine( // top
//                     renderer,
//                     tableLeft, 
//                     tableTop + cellPadding,
//                     cellLeft + colWidth, 
//                     tableTop + cellPadding
//                 );
//                 Highcharts.tableLine( // bottom
//                     renderer,
//                     tableLeft, 
//                     tableTop + (serie.data.length + 1) * rowHeight + cellPadding,
//                     cellLeft + colWidth, 
//                     tableTop + (serie.data.length + 1) * rowHeight + cellPadding
//                 );
//             }
//             // horizontal line
//             Highcharts.tableLine(
//                 renderer,
//                 tableLeft, 
//                 tableTop + row * rowHeight + rowHeight + cellPadding,
//                 cellLeft + colWidth, 
//                 tableTop + row * rowHeight + rowHeight + cellPadding
//             );
                
//         });
        
//         // vertical lines        
//         if (i == 0) { // left table border  
//             Highcharts.tableLine(
//                 renderer,
//                 tableLeft, 
//                 tableTop + cellPadding,
//                 tableLeft, 
//                 tableTop + (serie.data.length + 1) * rowHeight + cellPadding
//             );
//         }
        
//         Highcharts.tableLine(
//             renderer,
//             cellLeft, 
//             tableTop + cellPadding,
//             cellLeft, 
//             tableTop + (serie.data.length + 1) * rowHeight + cellPadding
//         );
            
//         if (i == series.length - 1) { // right table border    
//             Highcharts.tableLine(
//                 renderer,
//                 cellLeft + colWidth, 
//                 tableTop + cellPadding,
//                 cellLeft + colWidth, 
//                 tableTop + (serie.data.length + 1) * rowHeight + cellPadding
//             );
//         } 
//     });
// };
// /**
//  * Draw a single line in the table
//  */
// Highcharts.tableLine = function (renderer, x1, y1, x2, y2) {
//     renderer.path(['M', x1, y1, 'L', x2, y2])
//         .attr({
//             'stroke': 'silver',
//             'stroke-width': 1
//         })
//         .add();
// }

Highcharts.chart('chartContainer1', {
// window.chart = new Highcharts.Chart({
    chart: {
        //renderTo: 'chartContainer1',
        type: 'line'
        // ,
        // events: {
        //     load: Highcharts.drawTable
        // },
        // borderWidth: 2
    },
    legend:{
      useHTML:true
    },
    title: {
        text: 'Grafik Perawatan Bulanan'
    },
    subtitle: {
        text: '<?php echo $bulan; echo $tahun?>'
    },
    xAxis: {
        title: {
          text: 'Tanggal Perawatan'
        },
        categories:[<?php 
          foreach($report_l as $row){
            //array_push($dataPoints, array("x"=> $row->tanggal, "y"=> $row->total));
            echo "'" . $row->tanggal . "',";
          }
        ?>]
    },
    yAxis: {
        title: {
            text: 'Jumlah Perawatan'
        }
    },
    // legend: {
    //     y: -300
    // },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Perawatan',
        data: [<?php foreach($report_l as $row){
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
    pdf.addImage(dataURL, 'JPEG', 20, 20, 352, 240); //addImage(image, format, x-coordinate, y-coordinate, width, height)
    pdf.setFont("helvetica");
    pdf.setFontType("bold");
    pdf.setFontSize(20);
    pdf.save("Grafik Perawatan.pdf");
    // pdf.createPdf(docDefinition).save("grafikperawatan.pdf");
  });
});

  </script>
 </body>
</html>