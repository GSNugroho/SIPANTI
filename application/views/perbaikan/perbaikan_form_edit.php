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
           <h6 class="m-0 font-weight-bold text-primary">Sunting Perbaikan</h6>
    </div>
    <div class="card-body">

        <h2 style="margin-top:0px"> </h2>
        <form action="<?php echo base_url(). 'perbaikan/create_action';?>" method="post">
        <table>
        <tr>
        <td>
        <div id="abc">
            <div id="popupContact">
                <img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
                <h5>Daftar Inventaris</h5>
                <table id="pop" border="1">
                    <tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>
                
                </table>
            </div>
        </div>
        <div class="form-group">
            <label for="kd_inv_pr">Kode Inventaris <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kd_inv_pr" id="vc_no_inv" placeholder="Kode Inventaris" value="<?php echo $kd_inv_pr;?>" readonly>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="id_inv_ruang">Ruang </label>
            <select name="id_ruang" class="form-control" id="id_ruang" >
                <option value="">--Pilih Ruang--</option>
                <?php
                    foreach($dd_gr as $row){
                        if($id_ruang == $row->vc_k_gugus){
                        echo '<option value="'.$row->vc_k_gugus.'" selected="selected">'.$row->vc_n_gugus.'</option>';
                        }else{
                            echo '<option value="'.$row->vc_k_gugus.'">'.$row->vc_n_gugus.'</option>';
                        }
                    }
                        echo "</select>"
                ?>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="tgl_inv_pr">Tanggal Perbaikan Inventaris</label>
            <div class="input-group date" id="tgl1">
            <input class="form-control" type="text" name="tgl_inv_pr" id="tgl_inv_pr" placeholder="dd-mm-yyyy" value="<?php echo $tgl_inv_pr;?>">
            <span class="input-group-addon" style="padding-right: 25px;padding-top: 9px;"><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="jns_kr">Jenis Kerusakan</label>
            <select name="jns_kr" class="form-control" id="jns_kr">
                <?php 
                    if($jns_kr == 1){
                        echo '<option value="">--Pilih Kerusakan--</option>';
                        echo '<option value="1" selected="selected">Ringan</option>';
                        echo '<option value="2">Parah</option>';
                    }else if($jns_kr == 2){
                        echo '<option value="">--Pilih Kerusakan--</option>';
                        echo '<option value="1">Ringan</option>';
                        echo '<option value="2" selected="selected">Parah</option>';
                    }else{
                        echo '<option value="" selected="selected">--Pilih Kerusakan--</option>';
                        echo '<option value="1">Ringan</option>';
                        echo '<option value="2">Parah</option>';
                    }
                ?>
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="jns_pr">Jenis Perbaikan</label>
            <select name="jns_pr" class="form-control" id="jns_pr">
                <?php
                    if($jns_pr == 1){
                        echo '<option value="">--Pilih Perbaikan--</option>';
                        echo '<option value="1" selected="selected">Pengecekan</option>';
                        echo '<option value="2">Ganti Sparepart</option>';
                        echo '<option value="3">Service</option>';
                    }else if($jns_pr == 2){
                        echo '<option value="">--Pilih Perbaikan--</option>';
                        echo '<option value="1">Pengecekan</option>';
                        echo '<option value="2" selected="selected">Ganti Sparepart</option>';
                        echo '<option value="3">Service</option>';
                    }else if($jns_pr == 3){
                        echo '<option value="">--Pilih Perbaikan--</option>';
                        echo '<option value="1">Pengecekan</option>';
                        echo '<option value="2">Ganti Sparepart</option>';
                        echo '<option value="3" selected="selected">Service</option>';
                    }else{
                        echo '<option value="" selected="selected">--Pilih Perbaikan--</option>';
                        echo '<option value="1">Pengecekan</option>';
                        echo '<option value="2">Ganti Sparepart</option>';
                        echo '<option value="3">Service</option>';
                    }
                ?>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="sp_gt">Sparepart</label>
            <input class="form-control" type="text" name="sp_gt" id="sp_gt" placeholder="Sparepart" value="<?php echo $sp_gt;?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="sp_by">Biaya</label>
            <input class="form-control" type="number" name="sp_by" id="sp_by" pattern="[0-9]*"placeholder="Biaya" value="<?php echo $sp_by;?>">
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input class="form-control" type="text" name="ket" id="ket" placeholder="Keterangan" value="<?php echo $ket;?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?php echo site_url('perbaikan')?>" class="btn btn-danger">Batal</a>
        </td>
        <td>
            
        </td>
        </tr>
        </table>
        </form>
        <script>
            $(document).ready(function(){
                $("#loading").hide();
                $("#id_ruang").change(function(){
                $("#kd_inv_pr").hide();
                $("#loading").show();

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("perbaikan/list_inv");?>",
                    data: {id_ruang : $("#id_ruang").val()},
                    dataType: "json",
                    beforeSend: function(e){
                        if(e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response){
                        $("#loading").hide();
                        $("#pop").html(response.list_inv).show();
                    },
                    error: function (xhr, ajaxOptions, thrownError) { 
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                });
            });
            
        $(function () {
        $("#sp_gt").autocomplete({  
        minLength:0,
        delay:0,
        source:'<?php echo site_url('perbaikan/autocomplete/?'); ?>', 
        select:function(event, ui){
            $('#sparepart').val(ui.item.sp_gt);
            }
        });
    });
            
        </script>
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