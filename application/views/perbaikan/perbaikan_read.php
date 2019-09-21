<?php 
    $this->load->view('mainmenu');
?>
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/timepicker.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <style>
    table {
            table-layout: fixed;
        }
        textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    </style>
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
			<div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-primary">Info Perbaikan</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <a href="<?php echo site_url('perbaikan')?>" class="btn btn-danger">Kembali</a>
    <table>
    <tr><td>Kode Inventaris</td><td>:</td><td><?php echo $kd_inv_pr; ?></td></tr>
    <tr><td>Nama Inventaris</td><td>:</td><td><?php echo $nm_inv; ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $vc_n_gugus; ?></td></tr>
    <tr><td>Tanggal Perbaikan</td><td>:</td><td><?php echo date('d-m-Y', strtotime($tgl_inv_pr)); ?></td></tr>
    <tr><td>Jenis Kerusakan</td><td>:</td><td><?php 
    $jkr = $jns_kr;
    if($jkr=='1'){$jns_kr = "Ringan";
    }else if($jkr=='2'){$jns_kr = "Parah";}
    else{$jns_kr = " ";}
    echo $jns_kr; ?></td></tr>
    <tr><td>Jenis Perawatan</td><td>:</td><td><?php 
    $jpr = $jns_pr;
    if($jpr=='1'){$jns_pr = "Pengecekan";
    }else if($jpr=='2'){$jns_pr = "Ganti Sparepart";}
    else if($jpr=='3'){$jns_pr = "Service";}
    else{$jns_pr = " ";}
    echo $jns_pr; ?></td></tr>
    <tr><td>Sparepart Ganti</td><td>:</td><td><?php echo $sp_gt; ?></td></tr>
    <tr><td>Harga Sparepart</td><td>:</td><td><?php 
    $uang = $sp_by;
    $hasil_rupiah = "Rp ".number_format($uang,2,',','.');
    echo $hasil_rupiah; ?></td></tr>
    <tr><td>Keterangan</td><td>:</td><td><?php echo $ket; ?></td></tr>
    
    </table>
    
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
      </div>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>    
    
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
	  $('.time').clockTimePicker({});
	});

    </script>
    </body>
</html>