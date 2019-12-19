<?php
  $this->load->view('mainmenu');
  $real = 0;
  $total = 0;
foreach ($cpr_t as $row) {
    $real = $row->total;
}
foreach ($cpt_t as $row) {
    $total = $row->total;
}
$hasil = $total-$real;
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
  <!-- <script src="<?php //echo base_url('assets/js/jspdf.min.js')?>"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
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
      <label class="text-primary">Target Perawatan Bulan : <?php foreach($cpt_t as $row){echo $row->total;}?></label>
    </div>
    <div>
        <label class="text-primary">Realisasi Perawatan Bulan : <?php foreach($cpr_t as $row){echo $row->total;}?></label>
    </div>
    <div>
        <label class="text-primary">Persentase Capaian Perawatan : 
            <?php
                foreach($cpt_t as $ib){
					$t = (float)$ib->total;
				}
				foreach($cpr_t as $ib){
					$c = (float)$ib->total;
				}
				if(($t != 0) && ($c != 0)){
					$tc = ($c/$t) *100;
				}else{
					$tc = 0;
				}
						
                $tvc = number_format((float)$tc, 2, '.','');
                echo $tvc.'%';
            ?>
        </label>
    </div>
<div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Realisasi Perawatan</h6>
	</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Perawatan</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Ruang</th>
            </tr>
                <?php 
                $no = 1;
                    foreach($cpr as $row){
                        echo '<tr><td>'.$no.'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                        <td>'.$row->kd_aset.'</td>
                        <td>'.$row->nm_inv.'</td>
                        <td>'.$row->vc_n_gugus.'</td></tr>';
                        $no++;
                    }
                ?>
        </table>
    </div>
</div>
<div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Belum Direalisasi</h6>
	</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Perawatan</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Ruang</th>
            </tr>
                <?php 
                $no = 1;
                    foreach($cpbr as $row){
                        echo '<tr><td>'.$no.'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                        <td>'.$row->kd_aset.'</td>
                        <td>'.$row->nm_inv.'</td>
                        <td>'.$row->vc_n_gugus.'</td></tr>';
                        $no++;
                    }
                ?>
        </table>
    </div>
</div>
</div>
    <button id="exportButton" type="button" class="btn btn-primary">Download PDF</button>
    <button onclick='print()' type="button" class="btn btn-primary">Cetak PDF</button>
    </div>
    </div>

  <script>
    Highcharts.chart('chartContainer1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    legend: {
        enabled: true,
        align: 'center',
        // width: '800px',
        verticalAlign: 'bottom',
        // margin: 130,
        // useHTML: true,
        float: 'left',
        labelFormatter: function() {
            return ' ' + this.name + ' : ' + this.percentage.toFixed(1) + '% (' + this.y + ')';
        }
    },
    series: [{
        name: 'Jumlah Data',
        colorByPoint: true,
        data: [
            <?php
            foreach ($cpr_t as $row) {
                echo "{name: 'Realisasi', y: " . $row->total . "},";
            }
            echo "{name: 'Belum Direalisasi', y: " . $hasil . "},";
            ?>
        ]
    }]
});

$("#exportButton").click(function(){
//   html2canvas(document.querySelector("#printpdf"), { height: 1800, width: window.innerWidth * 2, scale: 1 }).then(canvas => {  	
//     var dataURL = canvas.toDataURL();    
//     var pdf = new jsPDF();
//     // var docDefinition = {
//     //     pageSize: 'A4',
//     //     pageOrientation: 'landscape'
//     // }
//     pdf.addImage(dataURL, 'PNG', 20, 20, 352, 240); //addImage(image, format, x-coordinate, y-coordinate, width, height)
//     pdf.setFont("helvetica");
//     pdf.setFontType("bold");
//     pdf.setFontSize(20);
//     pdf.save("Capaian Perawatan.pdf");
    // pdf.createPdf(docDefinition).save("grafikperawatan.pdf");

//     var doc = new jsPDF();          
// var elementHandler = {
//   '#ignorePDF': function (element, renderer) {
//     return true;
//   }
// };
// var source = window.document.getElementById("printpdf")[0];
// doc.fromHTML(
//     source,
//     15,
//     15,
//     {
//       'width': 180,'elementHandlers': elementHandler
//     });

// doc.output("dataurlnewwindow");
//   });
// $("#btnPrint").live("click", function () {
            var divContents = $("#printpdf").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>');
            printWindow.document.write('</head><body style:"margin:20px;">');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        // });
});

function print()
        {
            var pdf = new jsPDF('p', 'pt', 'letter')

            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            , source = $('#printpdf')[0]

            // we support special element handlers. Register them with jQuery-style
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors
            // (class, of compound) at this time.
            , specialElementHandlers = {
                 // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer)
                {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            }

            margins = {
                top: 10,
                bottom: 10,
                left: 10,
                right: 10,
                width: 800
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML
            (
                source // HTML string or DOM elem ref.
              , margins.left // x coord
              , margins.top // y coord
              , {'width': margins.width // max width of content on PDF
                 , 'elementHandlers': specialElementHandlers
                }
              , function (dispose) 
                {
                   // dispose: object with X, Y of the last line add to the PDF
                   // this allow the insertion of new lines after html
                   pdf.save('Mypdf.pdf');
                }
              , margins
            )
        }
  </script>
 </body>
</html>