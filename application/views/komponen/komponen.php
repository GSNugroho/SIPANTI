<?php
    $this->load->view('mainmenu');
?>
                <div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-primary">Data Perawatan</h6>
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
					<!-- <a href="<?php //echo base_url('perawatan/komponen')?>" class="btn btn-primary btn-icon-split">
                    		<span class="text">Komponen</span>
					</a>	   -->
						<div class="table-responsive">
						<table class="table table-bordered" id="dataKom" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Kode Barang</th>
								<th>Kode Aset</th>
								<th>Nama Barang</th>
								<th>Ruang</th>
								<th>Nama Pengguna</th>
								<th>Action</th>
							</tr>
							</thead>
						</table>
						</div>
					</div>
				</div>
			</div>
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
	$('#dataKom').DataTable({
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
	  //'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Komponen/tbl_list'?>'
      },
      'columns': [
         { data: 'kd_brg' },
		 { data: 'kd_ko' },
         { data: 'nm_inv' },
         { data: 'vc_n_gugus' },
         { data: 'vc_nm_pengguna' },
		 { data: 'action'}
      ]
	});
	});

    </script>