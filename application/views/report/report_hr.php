<?php
  $this->load->view('mainmenu');
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
        <h6 class="m-0 font-weight-bold text-primary">Laporan Kegiatan Harian</h6>
	</div>

  <div id="chartsContainer" class="card-body">
    <div id="printpdf">
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable1">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Kegiatan</th>
                <th>Tanggal Jadwal</th>
                <th>Nama Jadwal</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Ruang</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                    foreach($report_harian as $row){
                        echo '<tr><td>'.$no.'</td>
                        <td>'.date('d-m-Y', strtotime($tgl_keg)).'</td>
                        <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                        <td>'.$row->nm_jd.'</td>
                        <td>'.$row->kd_aset.'</td>
                        <td>'.$row->nm_inv.'</td>
                        <td>'.$row->vc_n_gugus.'</td></tr>';
                        $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<button id="btnDownload" type="button" class="btn btn-primary">Print PDF</button>
</div>
</div>
</div>
<script>
    $("#btnDownload").click(function(){
    var doc = new jsPDF('p', 'pt', 'a4');
    var res = doc.autoTableHtmlToJson(document.getElementById('myTable1'));
    // doc.autoTable(res.columns, res.data);
    doc.text(30, 30, 'Laporan Harian Perawatan'); 
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
            doc.save('Laporan Harian.pdf');    
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
</script>