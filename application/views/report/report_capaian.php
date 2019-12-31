<?php
  $this->load->view('mainmenu');
  $real = 0;
  $total = 0;
  $totbr = 0;
foreach ($cpr_t as $row) {
    $real += $row->total;
}
foreach ($cpt_t as $row) {
    $total += $row->total;
}
foreach ($cpbr_t as $row) {
    $totbr += $row->total;
}
$hasil = $total-$real;
$ttl = $totbr+$real;
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
  <script src="<?php echo base_url('assets/js/jspAutoTable.js')?>"></script>
  <script src="<?php echo base_url('assets/js/canvg-min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/highchart/highcharts.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/highchart/export-data.js')?>"></script>
  <!-- <script src="<?php //echo base_url('assets/vendor/highchart/exporting.js')?>"></script> -->
 
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Capaian Perawatan</h6>
	</div>

  <div id="chartsContainer" class="card-body">
    <div id="printpdf">
  <div class="chart-area">
    <!-- <canvas id="myAreaChart"></canvas> -->
    <div id="chartContainer1" style="height: 300px;width: 100%"></div>
  </div>
    <div>
      <label class="text-primary">Target Perawatan : <?php echo $ttl;?></label>
    </div>
    <div>
        <label class="text-primary">Realisasi Perawatan : <?php echo $real;?></label>
    </div>
    <div>
        <label class="text-primary">Persentase Capaian Perawatan : 
            <?php
                // foreach($cpt_t as $ib){
				// 	$t = (float)$ib->total;
				// }
				// foreach($cpr_t as $ib){
				// 	$c = (float)$ib->total;
                // }
                $t = $total;
                $c = $real;
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
        <table class="table table-bordered" id="myTable1">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Jadwal</th>
                <th>Tanggal Perawatan</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Nama Pengguna</th>
                <th>Ruang</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                    foreach($cpr as $row){
                        echo '<tr><td>'.$no.'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_trs)).'</td>
                        <td>'.$row->kd_aset.'</td>
                        <td>'.$row->nm_inv.'</td>
                        <td>'.$row->vc_nm_pengguna.'</td>
                        <td>'.$row->vc_n_gugus.'</td></tr>';
                        $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <button id="btnDownloadre" type="button" class="btn btn-primary">Print PDF Realisasi</button>
    <br>
    <br>
</div>
<div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Belum Direalisasi</h6>
	</div>
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable2">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Jadwal</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Nama Pengguna</th>
                <th>Ruang</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                    foreach($cpbr as $row){
                        echo '<tr><td>'.$no.'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                        <td>'.$row->kd_aset.'</td>
                        <td>'.$row->nm_inv.'</td>
                        <td>'.$row->vc_nm_pengguna.'</td>
                        <td>'.$row->vc_n_gugus.'</td></tr>';
                        $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
    <!-- <button id="export" type="button" class="btn btn-primary">Export PDF</button> -->
    <!-- <button id="exportButton" type="button" class="btn btn-primary">Cetak PDF</button> -->
    <button id="btnDownloadbre" type="button" class="btn btn-primary">Print PDF Belum Realisasi</button>
    <button id="btnDownloadsm" type="button" class="btn btn-primary">Print PDF Semua</button>
    <!-- <button onclick='print()' type="button" class="btn btn-primary">Download PDF</button> -->
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
            echo "{name: 'Realisasi', y: " . $real . "},";
            echo "{name: 'Belum Direalisasi', y: " . $totbr . "},";
            ?>
        ]
    }]
});

$("#btnDownload").click(function(){
  var doc = new jsPDF('p', 'pt', 'a4');
    var res = doc.autoTableHtmlToJson(document.getElementById('myTable1'));
    doc.autoTable(res.columns, res.data);
    var res2 = doc.autoTableHtmlToJson(document.getElementById('myTable2'));
    doc.autoTable(res2.columns, res2.data, {
    startY: doc.lastAutoTable.finalY + 50
    });
    
    var svg = document.querySelector('svg');    
    var canvas = document.createElement('canvas');    
    var canvasIE = document.createElement('canvas');    
    var context = canvas.getContext('2d');    
    
    var data = (new XMLSerializer()).serializeToString(svg);    
    canvg(canvas, data);    
    var svgBlob = new Blob([data], {    
        type: 'image/svg+xml;charset=utf-8'    
    });    
    
    var url = canvas.toDataURL(svgBlob);//DOMURL.createObjectURL(svgBlob);    
    
    var img = new Image();    
    img.onload = function() {    
        context.canvas.width = $('#chartContainer1').find('svg').width();;    
        context.canvas.height = $('#chartContainer1').find('svg').height();;    
        context.drawImage(img, 0, 0);    
        // freeing up the memory as image is drawn to canvas    
        //DOMURL.revokeObjectURL(url);    
    
        var dataUrl;    
        if (isIEBrowser()) { // Check of IE browser     
            var svg = $('#chartContainer1').highcharts().container.innerHTML;    
            canvg(canvasIE, svg);    
            dataUrl = canvasIE.toDataURL('image/JPEG');    
        } else {    
            dataUrl = canvas.toDataURL('image/jpeg');    
        }    
        doc.addImage(dataUrl, 'JPEG', 50, 500, 700, canvas.height); // 365 is top     
    
        var bottomContent = document.getElementById("bottom-content");    
        doc.fromHTML(bottomContent, 15, 365, {   //700 is bottom content top  if you increate this then you should increase above 365    
            'width': 560 
        });    
    
        setTimeout(function() {    
            doc.save('Laporan Capaian.pdf');    
        }, 2000);    
    };    
    img.src = url;    
});    
$("#btnDownloadsm").click(function(){
  var doc = new jsPDF('p', 'pt', 'a4');
    var res = doc.autoTableHtmlToJson(document.getElementById('myTable1'));
    // doc.autoTable(res.columns, res.data);
    doc.text(30, 30, 'Laporan Capaian Realisasi'); 
    doc.autoTable({
    html: '#myTable1',
    columnStyles: {
        0: {cellWidth: 30},
        1: {cellWidth: 60},
        2: {cellWidth: 60},
        5: {cellWidth: 70},
        6: {cellWidth: 90},
        // etc
        }
    });
    let finalY = doc.lastAutoTable.finalY;
    var res2 = doc.autoTableHtmlToJson(document.getElementById('myTable2'));
    doc.text(30, finalY, 'Laporan Capaian Belum Realisasi'); 
    // doc.autoTable(res2.columns, res2.data, 
    doc.autoTable({
    html: '#myTable2',
    columnStyles: {
        0: {cellWidth: 30},
        1: {cellWidth: 60},
        2: {cellWidth: 90},
        3: {cellWidth: 60},
        3: {cellWidth: 100},
        5: {cellWidth: 70}
        // etc
        }
    }),
    {
    startY: doc.lastAutoTable.finalY + 50
    };
    setTimeout(function() {    
            doc.save('Laporan Capaian Perawatan.pdf');    
        }, 2000);     
});    

function isIEBrowser() {    
    var ieBrowser;    
    var ua = window.navigator.userAgent;    
    var msie = ua.indexOf("MSIE ");    
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // Internet Explorer    
    {    
        ieBrowser = true;    
    } else //Other browser    
    {    
        console.log('Other Browser');    
        ieBrowser = false;    
    }    
    
    return ieBrowser;    
};    

$("#btnDownloadre").click(function(){
  var doc = new jsPDF('p', 'pt', 'a4');
    var res = doc.autoTableHtmlToJson(document.getElementById('myTable1'));
    // doc.autoTable(res.columns, res.data);
    doc.text(30, 30, 'Laporan Capaian Realisasi'); 
    doc.autoTable({
    html: '#myTable1',
    columnStyles: {
        0: {cellWidth: 30},
        1: {cellWidth: 60},
        2: {cellWidth: 60},
        5: {cellWidth: 70},
        6: {cellWidth: 90},
        // etc
        }
    });
    setTimeout(function() {    
            doc.save('Laporan Capaian Realisasi.pdf');    
        }, 2000);     
}); 

$("#btnDownloadbre").click(function(){
  var doc = new jsPDF('p', 'pt', 'a4');
    var res = doc.autoTableHtmlToJson(document.getElementById('myTable2'));
    // doc.autoTable(res.columns, res.data);
    doc.text(30, 30, 'Laporan Capaian Belum Realisasi'); 
    doc.autoTable({
    html: '#myTable2',
    columnStyles: {
        0: {cellWidth: 30},
        1: {cellWidth: 60},
        2: {cellWidth: 90},
        3: {cellWidth: 60},
        3: {cellWidth: 100},
        5: {cellWidth: 70}
        // etc
        }
    });
    setTimeout(function() {    
            doc.save('Laporan Capaian Belum Realisasi.pdf');    
        }, 2000);     
}); 
  </script>
 </body>
</html>