<?php
	$this->load->view('mainmenu');
?>
<style>
	.pesan{
		display: none;
		position: fixed;
		border: 1px solid greenyellow;
		width: 200px;
		top: 75px;
		left: 500px;
		padding: 5px 10px;
		background-color: #00a65a;
		text-align: center;
		color: white;
	}
	.pesans{
		display: none;
		position: fixed;
		border: 1px solid red;
		width: 200px;
		top: 95px;
		left: 500px;
		padding: 5px 10px;
		background-color: #f56954;
		text-align: center;
		color: white;
	}
</style>
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Perbaikan</h6>
		</div>
		<div class="col-md-12 text-center">
			<?php
				if (($this->session->userdata('message')) <> ''){
					echo '<div class="pesan">'.$this->session->userdata('message').'</div>';
				}
				if (($this->session->userdata('messages')) <> ''){
					echo '<div class="pesans">'.$this->session->userdata('messages').'</div>';
				}
			?>
		</div>
		<div class="card-body">
		<a href="<?php echo base_url('perbaikan/create')?>" class="btn btn-primary btn-icon-split">
   		<span class="text">Tambah Data</span>
		</a>	  
		<br>
		<br>
		<table style="position: relative;">
			<tr>
				<td>
					<input type="text" class="form-control" name="rtm_waktu" id="tgl1" placeholder="dd-mm-yyyy" />
				</td>
				<td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
				<td>
					<input type="text" class="form-control" name="rta_waktu" id="tgl2" placeholder="dd-mm-yyyy" />
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>
					<button onclick="rtgl()" id="rtgl" class="btn btn-danger">Reset</button>
				</td>
			</tr>
		</table>
		<br>
			<div class="table-responsive">
			<table class="table table-bordered" id="dataBrg" width="100%" cellspacing="0">
			<thead>
				<tr>
					<!-- <th>No</th> -->
					<th>Tanggal Perbaikan</th>
					<!-- <th>Kode Inventaris</th> -->
					<th>Kode Aset</th>
					<th>Nama Barang</th>
					<th>Ruang</th>
					<!-- <th>Jenis Kerusakan</th> -->
					<th>Jenis Perbaikan</th>
					<th>Sparepart</th>
					<!-- <th>Biaya</th> -->
					<!-- <th>Keterangan</th> -->
					<th style="width:15%;">Action</th>
				</tr>
				</thead>
			</table>
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


<!-- <script src="<?php //echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script> -->
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url('assets/js/datatables-demo.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>

	<script>
	$(document).ready(function(){
	   var table = $('#dataBrg').DataTable({
		language: {
	"sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
	"sProcessing":   "Sedang memproses...",
	"sLengthMenu":   "Tampilkan _MENU_ entri",
	"sZeroRecords":  "Tidak ditemukan data yang sesuai",
	"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
	"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
	"sInfoPostFix":  "",
	"sSearch":       "Cari:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst":    "Pertama",
		"sPrevious": "Sebelumnya",
		"sNext":     "Selanjutnya",
		"sLast":     "Terakhir"
	}
	},
	  'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'perbaikan/dt_tbl'?>',
		  'data': function(data) {
				var awal = $('#tgl1').val();
				var akhir = $('#tgl2').val();

				data.searchByAwal = awal;
				data.searchByAkhir = akhir;
			}
      },
      'columns': [
         //{ data: 'no' },
         { data: 'tgl_inv_pr' },
        //  { data: 'kd_inv' },
		 { data: 'kd_aset'},
         { data: 'nm_inv' },
         { data: 'vc_n_gugus' },
        //  { data: 'jns_kr' },
         { data: 'jns_pr' },
		 { data: 'sp_gt' },
		//  { data: 'sp_by' },
		//  { data: 'ket_pr'},
		 { data: 'action'}
      ]
	});
	$('#tgl2').on('dp.change', function() {
			table.draw(true);
		});
	});
	
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);

	$('#tgl1').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});

	$('#tgl2').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});
	</script>

	</body>
</html>