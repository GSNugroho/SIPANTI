<?php
    $this->load->view('mainmenu');
?>
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
    <h6 class="m-0 font-weight-bold text-primary">Info Mutasi</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <a href="<?php echo site_url('mutasi')?>" class="btn btn-danger">Kembali</a>
    <table>
    <tr><td>Kode Inventaris</td><td>:</td><td><?php echo $kd_inv_mts; ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $id_ruang_mts; ?></td></tr>
    <tr><td>Ruang Mutasi</td><td>:</td><td><?php echo $id_ruang; ?></td></tr>
    <tr><td>Jumlah Mutasi</td><td>:</td><td><?php echo $jmlh_mts; ?></td></tr>
    <tr><td>Tanggal Terima Mutasi</td><td>:</td><td><?php echo date('d-m-Y', strtotime($tgl_terima_mts)); ?></td></tr>
    <tr><td>Status Mutasi</td><td>:</td><td><?php echo $status_mts; ?></td></tr>
    <tr><td>Kondisi Mutasi</td><td>:</td><td><?php echo $kondisi_mts; ?></td></tr>
    <tr><td>Keterangan Mutasi</td><td>:</td><td><?php echo $ket_mts; ?></td></tr>
    <tr><td>Alasan Mutasi</td><td>:</td><td><?php echo $alasan_mts; ?></td></tr>

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