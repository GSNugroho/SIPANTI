<?php
	$this->load->view('mainmenu');
?>
				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-primary">Data Mutasi</h6>
					</div>
					<div class="card-body">
					<a href="<?php echo base_url('mutasi/create')?>" class="btn btn-primary btn-icon-split">
                    		<span class="text">Tambah Data</span>
					</a>	  
						<div class="table-responsive">
						<table class="table table-bordered" id="dataBrg" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <!-- <th>No</th> -->
                                <th>Kode Inventaris</th>
                                <th>Tanggal Mutasi</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Mutasi</th>
                                <th>Status</th>
                                <th>Kondisi</th>
                                <th>Alasan</th>
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
	  'order': [[ 1, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'mutasi/dt_tbl'?>'
      },
      'columns': [
         //{ data: 'no' },
         { data: 'kd_inv_mts' },
         { data: 'tgl_terima_mts' },
         { data: 'nm_inv' },
         { data: 'jmlh_mts' },
         { data: 'vc_n_gugus' },
         { data: 'status_mts' },
         { data: 'kondisi_mts' },
		 { data: 'alasan_mts'},
		 { data: 'action'}
      ]
	});
	});
	</script>

	</body>
</html>