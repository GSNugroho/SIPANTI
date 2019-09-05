<?php 
    $this->load->view('mainmenu');
?>
				<div class="card shadow mb-4">
				<div class="card-header py-3">
            	<h6 class="m-0 font-weight-bold text-primary">Data Inventaris</h6>
			</div>
            <div class="card-body">
            <form action="<?php echo base_url().'monitor/create_action';?>" method="post">
            <table>
            <tr>
            <td>
            <div class="form-group">
                <label for="nm_inv">Nama Barang <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="nm_inv" id="nm_inv" placeholder="Nama Barang">
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="merk">Merk <?php //echo form_error('merk') ?></label>
                <select require name="merk" class="form-control" id="merk">
                    <option value="">--Pilih Merk--</option>
                    <?php
                        foreach ($dd_gm as $row) {  
                            echo "<option value='".$row->vc_kd_merk."'>".$row->vc_nm_merk."</option>";
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
                <label for="satuan">Satuan <?php //echo form_error('satuan') ?></label>
                <!-- <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan"> -->
                <select name="satuan" class="form-control" id="satuan">
                    <option value="">--Pilih Satuan--</option>
                    <option value="1">Buah</option>
                    <option value="2">Set</option>
                    <option value="3">Unit</option>
            </div>
            </td>	
            <td></td>
            <td>        
            <div class="form-group">
                <label for="jmlh">Jumlah <?php //echo form_error('jumlah') ?></label>
                <input class="form-control" type="text" name="jmlh" id="jmlh" placeholder="Jumlah">
            </div>
            </td>
            </tr>

            <tr>
            <td>	        
            <div class="form-group">
                <label for="tgl_terima">Tanggal Terima <?php //echo form_error('tgl_terima') ?></label>
                <input class="form-control" type="date" name="tgl_terima" id="tgl_terima" placeholder="tgl_terima" >
            </div>
            </td>
            <td></td>
            <!-- <td>	        
            <div class="form-group">
                <label for="status">Status <?php //echo form_error('status') ?></label>
                 <input class="form-control" type="text" name="status" id="status" placeholder="Status"> 
                <select name="status" class="form-control" id="status">
                    <option value="">--Pilih Status--</option>
                    <option value="1">Beli</option>
                    <option value="2">Beli Bekas</option>
                    <option value="3">Mutasi</option>
                    <option value="4">Pemberian</option>
                    <option value="5">Pindahan</option>
                    <option value="6">Rakitan</option>
            </div>
            </td> -->
            </tr>

            <tr>
            <td>	
            <div class="form-group">
                <label for="kondisi">Kondisi <?php //echo form_error('kondisi') ?></label>
                <!-- <input class="form-control" type="text" name="kondisi" id="kondisi" placeholder="Kondisi"> -->
                <select name="kondisi" class="form-control" id="kondisi">
                    <option value="">--Pilih Kondisi--</option>
                    <option value="1">Baik</option>
                    <option value="2">Kurang Baik</option>
                    <option value="3">Rusak</option>
            </div>
            </td>
            </tr>	
            
            <tr>
            <td>
            <div class="form-group">
                <label for="ket">Keterangan <?php //echo form_error('ket') ?></label>
                <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Keterangan"></textarea>
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="nm_pengg">Nama Pengguna <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="nm_pengg" id="nm_pengg" placeholder="Nama Pengguna">
            </div>
            </td>
            </tr>

            <tr>
            <td>
            <div class="form-group">
                <label for="kd_bantu">Jenis Barang<?php //echo form_error('kd_bantu') ?></label>
                <select require name="kd_bantu" class="form-control" id="kd_bantu">
                    <option value="">--Pilih Jenis--</option>
                    <?php
                        foreach ($dd_gg as $row) {  
                            echo "<option value='".$row->kd_gol."'>".$row->nm_gol."</option>";
                            }
                            echo"
                        </select>"
                    ?>
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="a_spes">Aset Spesifikasi <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="a_spes" id="a_spes" placeholder="Aset Spisifikasi">
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
                <label for="id_ruang">Ruang <?php //echo form_error('id_ruang') ?></label>
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
            <td></td>
            <td>
            <div class="form-group">
                <label for="sn">Aset Nomor Seri <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="sn" id="sn" placeholder="Aset Nomor Seri">
            </div>
            </td>
            </tr>	

            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="foto_brg">Foto Barang <?php //echo form_error('foto_brg') ?></label>
                <input  class="form-control" type="file" name="foto_brg" id="foto_brg" placeholder="Foto Barang" value="upload gambar" enctype="multipart/form-data"/>
            </div>
            </td>
            </tr> -->

            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="foto_qr">Foto QR <?php //echo form_error('foto_qr') ?></label>
                <input  class="form-control" type="file" name="foto_qr" id="foto_qr" placeholder="Foto QR" value="upload gambarqr"/>
            </div>
            </td>
            </tr> -->

            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="id_urut">Urut <?php //echo form_error('id_urut') ?></label>
                <input class="form-control" type="text" name="id_urut" id="id_urut" placeholder="Urut">
            </div>
            </td>
            </tr> -->

            <tr>
            <td>        
            <!-- <div class="form-group">
                <label for="aktif">Aktif</label>
                <select class="form-control" name="aktif" class="form-control" id="aktif">
                    <option value="">--Status Aktif--</option>
                    <option value="0">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                </select>
            </div> -->
            <div class="form-group">
                <label for="status">Status <?php //echo form_error('status') ?></label>
                <!-- <input class="form-control" type="text" name="status" id="status" placeholder="Status"> -->
                <select name="status" class="form-control" id="status">
                    <option value="">--Pilih Status--</option>
                    <option value="1">Beli</option>
                    <option value="2">Beli Bekas</option>
                    <option value="3">Mutasi</option>
                    <option value="4">Pemberian</option>
                    <option value="5">Pindahan</option>
                    <option value="6">Rakitan</option>
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="aktif">Aset Aktif <?php //echo form_error('aktif') ?></label>
                <!-- <input class="form-control" type="text" name="aktif" id="aktif" placeholder="Aktif"> -->
                <select class="form-control" name="aset_aktif" class="form-control" id="aset_aktif">
                    <option value="">--Aset Aktif--</option>
                    <option value="001">Kelompok 1</option>
                    <option value="002">Kelompok 2</option>
                    <option value="003">Kelompok 3</option>
                    <option value="004">Kelompok 4</option>
                    <option value="005">Kelompok 5</option>
                    <option value="006">Inventaris</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>
            <div class="form-group">
                <label for="jns_brg">Jenis Tipe <?php //echo form_error('jns_brg') ?></label>
                <select require name="jns_brg" class="form-control" id="jns_brg">
                    <option value="">--Pilih Jenis--</option>
                    <?php
                        foreach ($dd_gj as $row) {  
                            echo "<option value='".$row->vc_kd_jenis."'>".$row->vc_nm_jenis."</option>";
                            }
                            echo"
                        </select>"
                    ?>
            </div>
            </td>
            <td></td>
            <td>
            <div class="form-group">
                <label for="tipeaset">Jenis Aset <?php //echo form_error('jns_brg') ?></label>
                <select require name="tipe_aset" class="form-control" id="tipe_aset">
                    <option value="">--Pilih Jenis--</option>
                    <option value="1">PC Build Up</option>
                    <option value="2">PC Rakitan</option>
                    <option value="3">Printer Dot Matrix</option>
                    <option value="4">Printer Infus</option>
                    <option value="5">Printer Laser</option>
                    <option value="6">Printer Thermal</option>
                    <option value="7">LCD</option>
                    <option value="8">UPS</option>
            </td>
            </tr>

            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="cetak">Cetak <?php //echo form_error('cetak') ?></label>
                <input class="form-control" type="text" name="cetak" id="cetak" placeholder="Cetak">
            </div>
            </td>
            </tr> -->
            
            <!-- <tr>
            <td>
            <div class="form-group">
                <label for="kd_aset">Kode Aset <?php //echo form_error('kd_aset') ?></label>
                <input class="form-control" type="text" name="kd_aset" id="kd_aset" placeholder="Kode Aset">
            </div>
            </td>
            </tr>	 -->
            
            <tr>
            <td>

            <button type="submit" class="btn btn-primary">Save</button> 
            </td>
            <td>
            <a href="<?php echo site_url('monitor') ?>" class="btn btn-default">Cancel</a>
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
      
        <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
        <script>
            // $( function() {
            //     $( "#tgl_terima" ).datepicker({
            //         format: 'dd/mm/yyyy'
            //     });
            // } );
        </script>
        </body>
</html>