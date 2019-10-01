<?php 
	$this->load->view('mainmenu');
	// print_r($_SESSION);
?>
				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-primary">Data Perawatan</h6>
					</div>
					<div class="col-md-12 text-center">
                		<div class="btn btn-success btn-icon-split">
        		            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		                </div>
            		</div>
					<div class="card-body">
					<!-- <a href="<?php //echo base_url('perawatan/komponen')?>" class="btn btn-primary btn-icon-split">
                    		<span class="text">Komponen</span>
					</a>	   -->
						<div class="table-responsive">
						<table class="table table-bordered" id="dataBrg" width="100%" cellspacing="0">
						<thead>
							<tr>
								<!-- <th>No</th> -->
								<!-- <th>Kode Jadwal</th> -->
								<th>Tanggal Perawatan</th>
								<!-- <th>Perkiraan Tanggal Selesai</th> -->
								<th>Kode Aset</th>
								<!-- <th>Kode Inventaris</th> -->
								<th>Nama Jadwal</th>
								<th>Nama Barang</th>
								<th>Ruang</th>
								<th>Status Pengerjaan</th>
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
	<script src="<?php echo base_url('assets/dist/sweetalert.js')?>"></script>

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
          'url':'<?php echo base_url().'perawatan/dt_tbl'?>'
      },
      'columns': [
        //  { data: 'no' },
		//  { data: 'kd_jd' },
         { data: 'tgl_jd' },
        //  { data: 'tgl_jd_selesai' },
        //  { data: 'kd_inv' },
		 { data: 'kd_aset'},
         { data: 'nm_jd' },
         { data: 'nm_inv' },
         { data: 'vc_n_gugus' },
         { data: 'status_p' },
		 { data: 'action'}
      ]
	});
	});

	function confirmation(ev) {
	ev.preventDefault();
	var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
	console.log(urlToRedirect); // verify if this is the right URL
	swal({
	title: "Are you sure?",
	text: "Once deleted, you will not be able to recover this imaginary file!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
	// redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
	if (willDelete) {
		swal("Poof! Your imaginary file has been deleted!", {
		icon: "success",
		});
	} else {
		swal("Your imaginary file is safe!");
	}
	});
	}
	</script>
	</body>
</html>