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
    
			<div class="card shadow mb-4">
			<div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-primary">Info Inventaris</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a>
    <table>
    <tr><td>Kode Inventaris</td><td>:</td><td><?php echo $kd_inv; ?></td></tr>
    <tr><td>Nama Inventaris</td><td>:</td><td><?php echo $nm_inv; ?></td></tr>
    <tr><td>Merk</td><td>:</td><td><?php echo $merk; ?></td></tr>
    <tr><td>Satuan</td><td>:</td><td><?php echo $satuan; ?></td></tr>
    <tr><td>Jumlah</td><td>:</td><td><?php echo $jmlh; ?></td></tr>
    <tr><td>Tanggal Terima</td><td>:</td><td><?php echo date('d-m-Y', strtotime($tgl_terima)); ?></td></tr>
    <tr><td>Status</td><td>:</td><td><?php echo $status; ?></td></tr>
    <tr><td>Kondisi</td><td>:</td><td><?php echo $kondisi; ?></td></tr>
    <tr><td>Keterangan</td><td>:</td><td><?php echo $ket; ?></td></tr>
    <tr><td>Jenis Barang</td><td>:</td><td><?php echo $kd_bantu; ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $id_ruang; ?></td></tr>
    <!-- <tr><td>Nomor Aset</td><td>:</td><td><?php //echo $no_aset; ?></td></tr> -->
    <tr><td>Kode Aset</td><td>:</td><td><?php echo $kd_aset; ?></td></tr>
    <tr><td>Nama Pengguna</td><td>:</td><td><?php echo $nm_pengg; ?></td></tr>
    
    
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
    
    </script>
    </body>
</html>