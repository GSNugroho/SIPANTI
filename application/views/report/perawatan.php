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
            <h6 class="m-0 font-weight-bold text-primary">Laporan Harian Perawatan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url().'report/get_report_harian_view'?>" method="post">
            <div class="form-group">
            <label for="tgl_jd">Tanggal Kegiatan</label>
			    <input class="form-control" type="text" name="tgl_keg" id="tgl_keg" placeholder="dd-mm-yyyy">
            </div>
            <!-- <div class="form-group">
                <label for="order">Urutkan Berdasarkan</label>
                <select name="ordere" class="form-control">
                    <option value="">--Urut--</option>
                    <option value="tgl_jd">Tanggal Kegiatan</option>
                    <option value="kd_aset">Kode Aset</option>
                    <option value="nm_inv">Nama Barang</option>
                    <option value="vc_n_gugus">Ruang</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Perawatan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url().'report/get_report_perawatanm'?>" method="post">
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
            <div class="form-group">
                <label for="order">Urutkan Berdasarkan</label>
                <select name="ordere" class="form-control">
                    <!-- <option value="">--Urut--</option> -->
                    <option value="tgl_jd">Tanggal Jadwal</option>
                    <option value="nm_jd">Jadwal</option>
                    <option value="kd_aset">Kode Aset</option>
                    <option value="nm_inv">Nama Barang</option>
                    <option value="vc_n_gugus">Ruang</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Capaian Target</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url().'report/get_report_capaian'?>" method="post">
                <div class="form-group">
                    <label for="tgl1_cp">Tanggal Awal</label>
                    <input class="form-control" type="text" name="tgl1_cp" id="tgl1_cp" placeholder="dd-mm-yyyy">
                </div>
                <div class="form-group">
                    <label for="tgl2_cp">Tanggal Akhir</label>
                    <input class="form-control" type="text" name="tgl2_cp" id="tgl2_cp" placeholder="dd-mm-yyyy">
                </div>
                <!-- <div class="form-group">
                    <label for="urutkan">Urutkan Berdasarkan</label>
                    <select name="uurutkan" class="form-control">
                        <option value="tgl_jd">Tanggal Jadwal</option>
                        <option value="nm_jd">Jadwal</option>
                        <option value="kd_aset">Kode Aset</option>
                        <option value="nm_inv">Nama Barang</option>
                        <option value="vc_n_gugus">Ruang</option>
                    </select>
                </div> -->
                <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Perawatan Yang Belum Pernah Dilakukan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url().'report/get_report_blm'?>" method="post">
                <!-- <select name="bln_blm" class="form-control">Bulan
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
                    <option value="0">Semua</option>
                </select>
                <label>Tahun</label>
                <input type="text" id="th_blm" name="th_blm" class="form-control" placeholder="dd-mm-yyyy"> -->
                <div class="form-group">
                    <label for="order">Urutkan Berdasarkan</label>
                    <select name="ordere" class="form-control">
                        <!-- <option value="">--Urut--</option> -->
                        <option value="kd_aset">Kode Aset</option>
                        <option value="nm_inv">Nama Barang</option>
                        <option value="vc_n_gugus">Ruang</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Grafik Perawatan</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url().'report/get_report_gperawatan'?>" method="post">
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
                    <label>Tahun</label>
                    <input type="text" id="tahun_jd" name="tahun_jd" placeholder="Tahun" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
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
  	        $('#tgl_keg').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

        $(function() { 
  	        $('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

	    $(function() { 
  	        $('#tgl2').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

	    $(function() { 
  	        $('#tgl1_cp').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

	    $(function() { 
  	        $('#tgl2_cp').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	    });

        $(function() {
            $('#th_blm').datetimepicker({locale:'id', format:"YYYY"});
        });

        $(function() {
            $('#tahun_jd').datetimepicker({locale:'id', format:"YYYY"});
        });
    </script>
</body>
</html>