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
				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-primary">Data Mutasi</h6>
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
					<a href="<?php echo base_url('mutasi/create')?>" class="btn btn-primary btn-icon-split">
                    		<span class="text">Tambah Data</span>
					</a>	  
					<br>
					<br>
						<div class="table-responsive">
						<table class="table table-bordered" id="dataBrg" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <!-- <th>No</th> -->
                                <th>Tanggal Mutasi</th>
                                <th>Kode Aset</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Ruang Sebelum</th>
                                <th>Ruang Mutasi</th>
                                <th>Status</th>
                                <th>Kondisi</th>
                                <!-- <th>Alasan</th> -->
                                <th>Action</th>
							</tr>
							</thead>
						</table>
						</div>
					</div>
                </div>
            </div>
            </div>
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
	  </div>

	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
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

	<script>
	$(document).ready(function(){
	   $('#dataBrg').DataTable({
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
          'url':'<?php echo base_url().'mutasi/dt_tbl'?>'
      },
      'columns': [
         //{ data: 'no' },
         { data: 'tgl_terima_mts' },
         { data: 'kd_aset' },
         { data: 'nm_inv' },
         { data: 'jmlh_mts' },
         { data: 'vc_n_gugus' },
         { data: 'id_ruang' },
         { data: 'status_mts' },
         { data: 'kondisi_mts' },
		//  { data: 'alasan_mts'},
		 { data: 'action'}
      ]
	});
	});

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);
	</script>

	</body>
</html>