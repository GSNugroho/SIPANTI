<?php
	$this->load->view('mainmenu');
?>
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Perbaikan</h6>
		</div>
		<div class="card-body">
		<a href="<?php echo base_url('perbaikan/create')?>" class="btn btn-primary btn-icon-split">
   		<span class="text">Tambah Data</span>
		</a>	  
		<br>
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
					<th>Action</th>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="login.html">Logout</a>
</div>
</div>
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
	  'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'perbaikan/dt_tbl'?>'
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
	});
	</script>

	</body>
</html>