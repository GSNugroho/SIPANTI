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
            	<h6 class="m-0 font-weight-bold text-primary">Tambah Inventaris</h6>
			</div>
            <div class="card-body">
            <form action="<?php echo base_url().'monitor/create_action';?>" method="post">
            <table>
            <tr>
            <td>
            <div class="form-group">
                <label for="nm_inv">Nama Barang </label> <?php echo form_error('nm_inv')?>
                <input class="form-control" type="text" name="nm_inv" id="nm_inv" placeholder="Nama Barang" value="<?php echo $nm_inv?>">
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="merk">Merk </label> <?php echo form_error('merk') ?>
                <select require name="merk" class="form-control" id="merk">
                    <option value="">--Pilih Merk--</option>
                    <?php
                        foreach ($dd_gm as $row) {  
                            echo "<option value='".$row->vc_kd_merk."' >".$row->vc_nm_merk."</option>";
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
                <label for="satuan">Satuan </label> <?php echo form_error('satuan') ?>
                <!-- <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan"> -->
                <select name="satuan" class="form-control" id="satuan">
                    <option value="">--Pilih Satuan--</option>
                    <option value="1" <?php echo ($satuan == '1')?'selected':''?>>Buah</option>
                    <option value="2" <?php echo ($satuan == '2')?'selected':''?>>Set</option>
                    <option value="3" <?php echo ($satuan == '3')?'selected':''?>>Unit</option>
            </div>
            </td>	
            <td></td>
            <td>        
            <div class="form-group">
                <label for="jmlh">Jumlah </label> <?php echo form_error('jmlh') ?>
                <input class="form-control" type="text" name="jmlh" id="jmlh" placeholder="Jumlah" value="<?php echo $jmlh?>">
            </div>
            </td>
            </tr>

            <tr>
            <td>	        
            <div class="form-group">
                <label for="tgl_terima">Tanggal Terima </label> <?php echo form_error('tgl_terima') ?>
                <div class="input-group date" id="tgl1">
				<input class="form-control" type="text" name="tgl_terima" id="tgl_terima" placeholder="dd-mm-yyyy" value="<?php $tgl_terima?>">
				<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
				</div>
            </div>
            </td>
            <td></td>
            </tr>

            <tr>
            <td>	
            <div class="form-group">
                <label for="kondisi">Kondisi </label> <?php echo form_error('kondisi') ?>
                <!-- <input class="form-control" type="text" name="kondisi" id="kondisi" placeholder="Kondisi"> -->
                <select name="kondisi" class="form-control" id="kondisi">
                    <option value="">--Pilih Kondisi--</option>
                    <option value="1" <?php echo ($satuan == '1')?'selected':''?>>Baik</option>
                    <option value="2" <?php echo ($satuan == '2')?'selected':''?>>Kurang Baik</option>
                    <option value="3" <?php echo ($satuan == '3')?'selected':''?>>Rusak</option>
            </div>
            </td>
            </tr>	
            
            <tr>
            <td>
            <div class="form-group">
                <label for="ket">Keterangan <?php //echo form_error('ket') ?></label>
                <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Keterangan"><?php echo $ket?></textarea>
            </div>
            </td>
            <td></td>
            <td>
            <!-- <div class="form-group">
                <label for="nm_pengg">Nama Pengguna <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="nm_pengg" id="nm_pengg" placeholder="Nama Pengguna">
            </div> -->
            </td>
            </tr>

            <tr>
            <td>
            <div class="form-group">
                <label for="kd_bantu">Jenis Barang </label> <?php echo form_error('kd_bantu') ?>
                <select require name="kd_bantu" class="form-control" id="kd_bantu">
                    <option value="">--Pilih Jenis--</option>
                    <?php
                        foreach ($dd_gg as $row) {  
                            echo "<option value='".$row->kd_gol."' >".$row->nm_gol."</option>";
                            }
                            echo"
                        </select>"
                    ?>
            </div>
            </td>
            <td></td>
            <td>
            
            <div class="form-group">
                <label for="nm_pengg">Nama Pengguna </label> <?php echo form_error('nm_pengg')?>
                <input class="form-control" type="text" name="nm_pengg" id="nm_pengg" placeholder="Nama Pengguna" value="<?php echo $nm_pengg?>">
            </div>
            </td>
            </tr>

            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="no_aset">Nomor Aset <?php //echo form_error('no_aset') ?></label>
                <input class="form-control" type="text" name="no_aset" id="no_aset" placeholder="Nomor Aset">
            </div>
            </td>
            </tr>	 -->

            <tr>
            <td>
            <div class="form-group">
                <label for="id_ruang">Ruang </label> <?php echo form_error('id_ruang') ?>
                <select require name="id_ruang" class="form-control" id="id_ruang">
                    <option value="">--Pilih Ruang--</option>
                    <?php
                        foreach ($dd_gr as $row) {  
                            echo "<option value='".$row->vc_k_gugus."' >".$row->vc_n_gugus."</option>";
                            }
                            echo"
                        </select>"
                    ?>
            </div>
            </td>
            <td></td>
            <td>

            <div class="form-group">
                <label for="a_spes">Aset Spesifikasi </label> 
                <input class="form-control" type="text" name="a_spes" id="a_spes" placeholder="Aset Spisifikasi" value="<?php echo $a_spes?>">
            </div>
            </td>
            </tr>	

            <tr>
            <td>        
            <div class="form-group">
                <label for="status">Status </label> <?php echo form_error('status') ?>
                <!-- <input class="form-control" type="text" name="status" id="status" placeholder="Status"> -->
                <select name="status" class="form-control" id="status">
                    <option value="">--Pilih Status--</option>
                    <option value="1" <?php echo ($status == '1')?'selected':''?>>Beli</option>
                    <option value="2" <?php echo ($status == '2')?'selected':''?>>Beli Bekas</option>
                    <option value="3" <?php echo ($status == '3')?'selected':''?>>Mutasi</option>
                    <option value="4" <?php echo ($status == '4')?'selected':''?>>Pemberian</option>
                    <option value="5" <?php echo ($status == '5')?'selected':''?>>Pindahan</option>
                    <option value="6" <?php echo ($status == '6')?'selected':''?>>Rakitan</option>
                </select>
            </div>
            </td>
            <td></td>
            <td>
            <!-- <div class="form-group">
                <label for="aktif">Aset Aktif <?php //echo form_error('aktif') ?></label>
                <select class="form-control" name="aset_aktif" class="form-control" id="aset_aktif">
                    <option value="">--Aset Aktif--</option>
                    <option value="001">Kelompok 1</option>
                    <option value="002">Kelompok 2</option>
                    <option value="003">Kelompok 3</option>
                    <option value="004">Kelompok 4</option>
                    <option value="005">Kelompok 5</option>
                    <option value="006">Inventaris</option>
                </select>
            </div> -->
            <div class="form-group">
                <label for="sn">Aset Nomor Seri <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="sn" id="sn" placeholder="Aset Nomor Seri" value="<?php echo $sn?>">
            </div>
            </td>
            </tr>
            <tr>
            <td>
            <div class="form-group">
                <label for="jns_brg">Jenis Tipe </label> <?php echo form_error('jns_brg') ?>
                <select require name="jns_brg" class="form-control" id="jns_brg">
                    <option value="">--Pilih Jenis--</option>
                    <?php
                        foreach ($dd_gj as $row) {  
                            echo "<option value='".$row->vc_kd_jenis."' >".$row->vc_nm_jenis."</option>";
                            }
                            echo"
                        </select>"
                    ?>
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="tipeaset">Jenis Aset </label> <?php echo form_error('jns_brg') ?>
                <select require name="tipe_aset" class="form-control" id="tipe_aset">
                    <option value="">--Pilih Jenis--</option>
                    <option value="1" <?php echo ($tipe_aset == '1')?'selected':''?>>PC Build Up</option>
                    <option value="2" <?php echo ($tipe_aset == '2')?'selected':''?>>PC Rakitan</option>
                    <option value="3" <?php echo ($tipe_aset == '3')?'selected':''?>>Printer Dot Matrix</option>
                    <option value="4" <?php echo ($tipe_aset == '4')?'selected':''?>>Printer Infus</option>
                    <option value="5" <?php echo ($tipe_aset == '5')?'selected':''?>>Printer Laser</option>
                    <option value="6" <?php echo ($tipe_aset == '6')?'selected':''?>>Printer Thermal</option>
                    <option value="7" <?php echo ($tipe_aset == '7')?'selected':''?>>LCD</option>
                    <option value="8" <?php echo ($tipe_aset == '8')?'selected':''?>>UPS</option>
            </td>
            </tr>
            
            <tr>
            <td>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?php echo site_url('monitor') ?>" class="btn btn-danger">Batal</a>
            </td>
            <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            </tr>
        </form>
        </table>
        </div>

        <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Panti Waluyo 2019</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
      </div>
      
        
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
        
        <script src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
        <script>
            $(function() { 
			$('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
			});
        </script>
        </body>
</html>