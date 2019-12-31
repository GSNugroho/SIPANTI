<?php
    $this->load->view('mainmenu');
?>
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Keterlambatan Perawatan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url().'report/get_report_telatm'?>" method="post">
                <div class="form-group">
                <label for="tgl_jd">Tanggal Awal</label>
                    <!-- <div class="input-group date" id="tgl1"> -->
				        <input class="form-control" type="text" name="tgl_jd" id="tgl1" placeholder="dd-mm-yyyy">
				        <!-- <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                    </div> -->
                </div>
                <!-- <input type="date" name="tgl_jd_s">Tanggal Akhir -->
                <div class="form-group">
                <label for="tgl_jd_s">Tanggal Akhir</label>
                    <!-- <div class="input-group date" id="tgl2"> -->
				        <input class="form-control" type="text" name="tgl_jd_s" id="tgl2" placeholder="dd-mm-yyyy">
				        <!-- <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Grafik Keterlambatan Perawatan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url().'report/get_report_gtelat'?>" method="post">
                <div class="form-group">                    
                    <select name="bulan_jd" class="form-control">Bulan
                        <option value="">--Pilih Bulan--</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tahun_jd" id="tahun_jd" placeholder="Tahun">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
                </form>
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
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>
    <!-- <script src="<?php //echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script> -->
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
        $(function() { 
  	        $('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

	    $(function() { 
  	        $('#tgl2').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });
        $(function() {
            $('#tahun_jd').datetimepicker({locale:'id', format:"YYYY"});
        });
    </script>
    </body>
</html>