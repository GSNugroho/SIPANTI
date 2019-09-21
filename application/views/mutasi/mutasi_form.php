<?php 
    $this->load->view('mainmenu');
?>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
	
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/jquery-ui.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
    
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>"></script>
        

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
			<div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-primary">Tambah Mutasi</h6>
		</div>
        <div class="card-body">
        <form action="<?php echo base_url(). 'mutasi/create_action';?>" method="post">
        <table>
        <tr>
        <td>
        <div class="form-group">
            <label for="kd_inv_mts">Kode Inventaris <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kd_inv_mts" id="vc_no_inv" placeholder="Kode Inventaris" onclick="div_show()">
        </div>
        </td>
        </tr>

        <tr>
        <td>
        <div class="form-group">
            <label for="id_ruang_mts">Ruang Sebelum Mutasi <?php //echo form_error('nm_inv') ?></label>
            <select require name="id_ruang" class="form-control" id="id_ruang">
                <option value="">--Pilih Ruang--</option>
                <?php
                    foreach ($dd_gr as $row) {  
                        echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                        }
                        echo"
                      </select>"
                ?>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="r_7an_mts">Ruang Tujuan Mutasi</label>
            <select name="r_7an_mts" class="form-control" id="r_7an_mts">
                <option value="">--Pilih Ruang Mutasi--</option>
                <?php
                    foreach ($dd_gr as $row){
                        echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                        }
                        echo"
                      </select>"
                ?>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="jmlh_mts">Jumlah Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="jmlh_mts" id="jmlh_mts" placeholder="Jumlah Barang">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="tgl_terima_mts">Tanggal Terima Mutasi<?php //echo form_error('nm_inv') ?></label>
            <div class="input-group date" id="tgl1">
                <input class="form-control" type="text" name="tgl_terima_mts" id="tgl_terima_mts" placeholder="dd-mm-yyyy">
            <span class="input-group-addon" style="padding-right: 25px;padding-top: 9px;"><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="status_mts">Status Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="status_mts" id="status_mts" placeholder="Status Mutasi">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="kondisi_mts">Kondisi Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kondisi_mts" id="kondisi_mts" placeholder="Kondisi Barang">
        </div>
        </td>
        </tr>  
        <tr>
        <td>
        <div class="form-group">
            <label for="ket_mts">Keterangan <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="ket_mts" id="ket_mts" placeholder="Keterangan">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="alasan_mts">Alasan Mutasi <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="alasan_mts" id="alasan_mts" placeholder="Alasan Mutasi">
        </div>
        </td>
        </tr>
        <tr>
        <td>

        <button type="submit" class="btn btn-success">Simpan</button> 
        <a href="<?php echo site_url('mutasi') ?>" class="btn btn-danger">Batal</a>
        </td>
        <td>
        
        </td>
        </tr>
        <tr>
      <td>
        <div id="abc">
            <div id="popupContact">
                <img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
                <h5>Daftar Inventaris</h5>
                <table id="pop" border="1">
                    <tr><td><b>Kode Inventaris</b></td><td><b>Kode Aset</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>
                </table>
            </div>
        </div>
      </td>
    </tr>
        </table>
        <script>

        $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
            // Kita sembunyikan dulu untuk loadingnya
            $("#loading").hide();
            
            $("#id_ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi
            $("#kd_inv_mts").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya
            
            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("mutasi/list_inv"); ?>", // Isi dengan url/path file php yang dituju
                data: {id_ruang : $("#id_ruang").val()}, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
                },
                success: function(response){ // Ketika proses pengiriman berhasil
                $("#loading").hide(); 

                $("#pop").html(response.list_inv).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
            });
        });
        </script>
        </form>
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
      <script>
            $(function() { 
			$('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
			});
        </script>
    </body>
</html>