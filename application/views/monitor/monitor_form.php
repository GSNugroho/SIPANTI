<!doctype html>
<html>
    <head>
        <title>Tambah Data</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Inventaris <?php //echo $button ?></h2>
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
            <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan">
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
            <input class="form-control" type="date" name="tgl_terima" id="tgl_terima" placeholder="tgl_terima">
		</div>
        </td>
        <td></td>
        <td>	        
		<div class="form-group">
            <label for="status">Status <?php //echo form_error('status') ?></label>
            <input class="form-control" type="text" name="status" id="status" placeholder="Status">
		</div>
		</tr>
        </td>

        <tr>
        <td>	
		<div class="form-group">
            <label for="kondisi">Kondisi <?php //echo form_error('kondisi') ?></label>
            <input class="form-control" type="text" name="kondisi" id="kondisi" placeholder="Kondisi">
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
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="no_aset">Nomor Aset <?php //echo form_error('no_aset') ?></label>
            <input class="form-control" type="text" name="no_aset" id="no_aset" placeholder="Nomor Aset">
		</div>
		</td>
        </tr>	

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
        </tr>	

        <tr>
        <td>
		<div class="form-group">
            <label for="foto_brg">Foto Barang <?php //echo form_error('foto_brg') ?></label>
            <input  class="form-control" type="file" name="foto_brg" id="foto_brg" placeholder="Foto Barang" value="upload gambar" enctype="multipart/form-data"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="foto_qr">Foto QR <?php //echo form_error('foto_qr') ?></label>
			<input  class="form-control" type="file" name="foto_qr" id="foto_qr" placeholder="Foto QR" value="upload gambarqr"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="id_urut">Urut <?php //echo form_error('id_urut') ?></label>
            <input class="form-control" type="text" name="id_urut" id="id_urut" placeholder="Urut">
		</div>
		</td>
        </tr>

        <tr>
        <td>        
		<div class="form-group">
            <label for="aktif">Aktif <?php //echo form_error('aktif') ?></label>
            <input class="form-control" type="text" name="aktif" id="aktif" placeholder="Aktif">
		</div>
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
		</tr>

        <tr>
		<td>
		<div class="form-group">
            <label for="cetak">Cetak <?php //echo form_error('cetak') ?></label>
            <input class="form-control" type="text" name="cetak" id="cetak" placeholder="Cetak">
		</div>
        </td>
        </tr>
		
        <tr>
        <td>
		<div class="form-group">
            <label for="kd_aset">Kode Aset <?php //echo form_error('kd_aset') ?></label>
            <input class="form-control" type="text" name="kd_aset" id="kd_aset" placeholder="Kode Aset">
		</div>
        </td>
        </tr>	
        
        <tr>
        <td>
	    <input type="hidden" name="id_inv" value="<?php// echo $id_inv; ?>" /> 
        <button type="submit" class="btn btn-primary">Save</button> 
        </td>
        <td>
        <a href="<?php echo site_url('monitor') ?>" class="btn btn-default">Cancel</a>
        </td>
        </tr>
	</form>
    </table>
    </body>
</html>