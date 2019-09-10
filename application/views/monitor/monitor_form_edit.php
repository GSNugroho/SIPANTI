<?php
    $this->load->view('mainmenu');
?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Inventaris</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(). 'monitor/update_action';?>" method="post">
	    <table>
        <tr>
        <td>
        <div class="form-group">
            <label for="nm_inv">Nama Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="nm_inv" id="nm_inv" placeholder="Nama Barang" value="<?php echo $nm_inv; ?>">
        </div>
        </td>
        <td></td>
        <td>
		<div class="form-group">
            <label for="merk">Merk <?php //echo form_error('merk') ?></label>
                <select require name="merk" class="form-control"  id="merk">
                    <?php
                        foreach($dd_gm as $row) {
                            if($merk == $row->vc_kd_merk){
                                echo '<option value="'.$row->vc_kd_merk.'" selected="selected">'.$row->vc_nm_merk.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_kd_merk.'">'.$row->vc_nm_merk.'</option>';
                            }
                        }
                    ?>
                </select>
        </div>
        </td>
        </tr>
        
        <tr>
        <td>        
		<div class="form-group">
            <label for="satuan">Satuan <?php //echo form_error('satuan') ?></label>
            <!-- <input class="form-control" type="text" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>"> -->
            <select name="satuan" class="form-control" id="satuan">
                    <option value="">--Pilih Satuan--</option>
                    <option value="1" <?php echo ($satuan == 'Buah')?'selected':''?>>Buah</option>
                    <option value="2" <?php echo ($satuan == 'Set')?'selected':''?>>Set</option>
                    <option value="3" <?php echo ($satuan == 'Unit')?'selected':''?>>Unit</option>
		</div>
        </td>	
        <td></td>
        <td>        
		<div class="form-group">
            <label for="jumlah">Jumlah <?php //echo form_error('jumlah') ?></label>
            <input class="form-control" type="text" name="jmlh" id="jmlh" placeholder="Jumlah" value="<?php echo $jmlh; ?>">
		</div>
        </td>
        </tr>

        <tr>
        <td>	        
		<div class="form-group">
            <label for="tgl_terima">Tanggal Terima <?php //echo form_error('tgl_terima') ?></label>
            <input class="form-control" type="date" name="tgl_terima" id="tgl_terima" placeholder="tgl_terima" value="<?php echo $tgl_terima; ?>">
		</div>
        </td>
        <td></td>

		</tr>
        
        <tr>
        <td>	
		<div class="form-group">
            <label for="kondisi">Kondisi <?php //echo form_error('kondisi') ?></label>
            <!-- <input class="form-control" type="text" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php //echo $kondisi; ?>"> -->
            <select name="kondisi" class="form-control" id="kondisi">
                    <option value="">--Pilih Kondisi--</option>
                    <option value="1" <?php echo ($kondisi == 'Baik')?'selected':''?>>Baik</option>
                    <option value="2" <?php echo ($kondisi == 'Kurang Baik')?'selected':''?>>Kurang Baik</option>
                    <option value="3" <?php echo ($kondisi == 'Rusak')?'selected':''?>>Rusak</option>
		</div>
		</td>
        </tr>	
        
        <tr>
        <td>
		<div class="form-group">
            <label for="ket">Keterangan <?php //echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Keterangan"><?php echo $ket; ?></textarea>
        </div>
        </td>
        <td></td>
            <td>
            <div class="form-group">
                <label for="nm_pengg">Nama Pengguna <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="nm_pengg" id="nm_pengg" placeholder="Nama Pengguna" value="<?php echo $nm_pengg?>">
            </div>
            </td>
        </tr>
        <tr>
        <td>
		<div class="form-group">
            <label for="kd_bantu">Jenis Barang <?php //echo form_error('kd_bantu') ?></label>
            <select require name="kd_bantu" class="form-control"  id="kd_bantu">
                    <?php
                        foreach($dd_gg as $row) {
                            if($kd_bantu == $row->kd_gol){
                                echo '<option value="'.$row->kd_gol.'" selected="selected">'.$row->nm_gol.'</option>';
                            }else{
                                echo '<option value="'.$row->kd_gol.'">'.$row->nm_gol.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
        </td>
        <td></td>
            <td>
            <div class="form-group">
                <label for="a_spes">Aset Spesifikasi <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="a_spes" id="a_spes" placeholder="Aset Spisifikasi" value="<?php echo $a_spes?>">
            </div>
            </td>
        </tr>

        <!-- <tr>
        <td>
		<div class="form-group">
            <label for="no_aset">Nomor Aset <?php //echo form_error('no_aset') ?></label>
            <input class="form-control" type="text" name="no_aset" id="no_aset" placeholder="Nomor Aset" value="<?php //echo $no_aset; ?>">
		</div>
		</td>
        </tr>	 -->

        <tr>
        <td>
		<div class="form-group">
            <label for="id_ruang">Ruang <?php //echo form_error('id_ruang') ?></label>
            <select require name="id_ruang" class="form-control"  id="id_ruang">
                    <?php
                        foreach($dd_gr as $row) {
                            if($id_ruang == $row->vc_k_gugus){
                                echo '<option value="'.$row->vc_k_gugus.'" selected="selected">'.$row->vc_n_gugus.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_k_gugus.'">'.$row->vc_n_gugus.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
        </td>
        <td></td>
            <td>
            <div class="form-group">
                <label for="sn">Aset Nomor Seri <?php //echo form_error('nm_inv') ?></label>
                <input class="form-control" type="text" name="sn" id="sn" placeholder="Aset Nomor Seri" value="<?php echo $sn?>">
            </div>
            </td>
        </tr>	

        <!-- <tr>
        <td>
		<div class="form-group">
            <label for="foto_brg">Foto Barang <?php //echo form_error('foto_brg') ?></label>
            <input  class="form-control" type="file" name="foto_brg" id="foto_brg" placeholder="Foto Barang" value="<?php //echo $foto_brg; ?>"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="foto_qr">Foto QR <?php //echo form_error('foto_qr') ?></label>
			<input  class="form-control" type="file" name="foto_qr" id="foto_qr" placeholder="Foto QR" value="<?php //echo $foto_qr; ?>r"/>
        </div>
		</td>
        </tr>

        <tr>
        <td>
		<div class="form-group">
            <label for="id_urut">Urut <?php //echo form_error('id_urut') ?></label>
            <input class="form-control" type="text" name="id_urut" id="id_urut" placeholder="Urut" value="<?php //echo $id_urut; ?>">
		</div>
		</td>
        </tr> -->

        <tr>
        <td>        
		<div class="form-group">
                <label for="status">Status <?php //echo form_error('status') ?></label>
                <!-- <input class="form-control" type="text" name="status" id="status" placeholder="Status"> -->
                <select name="status" class="form-control" id="status">
                    <option value="">--Pilih Status--</option>
                    <option value="1" <?php echo ($status == 'Beli')?'selected':''?>>Beli</option>
                    <option value="2" <?php echo ($status == 'Beli Bekas')?'selected':''?>>Beli Bekas</option>
                    <option value="3" <?php echo ($status == 'Mutasi')?'selected':''?>>Mutasi</option>
                    <option value="4" <?php echo ($status == 'Pemberian')?'selected':''?>>Pemberian</option>
                    <option value="5" <?php echo ($status == 'Pindahan')?'selected':''?>>Pindahan</option>
                    <option value="6" <?php echo ($status == 'Rakitan')?'selected':''?>>Rakitan</option>
            </div>
        </td>
        <td></td>
            <td>
            <div class="form-group">
                <label for="aktif">Aset Aktif <?php //echo form_error('aktif') ?></label>
                <!-- <input class="form-control" type="text" name="aktif" id="aktif" placeholder="Aktif"> -->
                <select class="form-control" name="aset_aktif" class="form-control" id="aset_aktif">
                    <option value="">--Aset Aktif--</option>
                    <option value="001" <?php echo ($aset_aktif == '001')?'selected':''?>>Kelompok 1</option>
                    <option value="002" <?php echo ($aset_aktif == '002')?'selected':''?>>Kelompok 2</option>
                    <option value="003" <?php echo ($aset_aktif == '003')?'selected':''?>>Kelompok 3</option>
                    <option value="004" <?php echo ($aset_aktif == '004')?'selected':''?>>Kelompok 4</option>
                    <option value="005" <?php echo ($aset_aktif == '005')?'selected':''?>>Kelompok 5</option>
                    <option value="006" <?php echo ($aset_aktif == '006')?'selected':''?>>Inventaris</option>
                </select>
            </td>
        </tr>
		<tr>
		<td>
		<div class="form-group">
            <label for="jns_brg">Jenis Tipe <?php //echo form_error('jns_brg') ?></label>
            <select require name="jns_brg" class="form-control"  id="jns_brg">
                    <?php
                        foreach($dd_gj as $row) {
                            if($jns_brg == $row->vc_kd_jenis){
                                echo '<option value="'.$row->vc_kd_jenis.'" selected="selected">'.$row->vc_nm_jenis.'</option>';
                            }else{
                                echo '<option value="'.$row->vc_kd_jenis.'">'.$row->vc_nm_jenis.'</option>';
                            }
                        }
                    ?>
                </select>
		</div>
        </td>
        <td></td>
            <td>
            <div class="form-group">
                <label for="tipeaset">Jenis Aset <?php //echo form_error('jns_brg') ?></label>
                <select require name="tipe_aset" class="form-control" id="tipe_aset">
                    <option value="">--Pilih Jenis--</option>
                    <option value="1" <?php echo ($vc_model == 'PCB')?'selected':''?>>PC Build Up</option>
                    <option value="2" <?php echo ($vc_model == 'PCR')?'selected':''?>>PC Rakitan</option>
                    <option value="3" <?php echo ($vc_model == 'PRD')?'selected':''?>>Printer Dot Matrix</option>
                    <option value="4" <?php echo ($vc_model == 'PRF')?'selected':''?>>Printer Infus</option>
                    <option value="5" <?php echo ($vc_model == 'PRL')?'selected':''?>>Printer Laser</option>
                    <option value="6" <?php echo ($vc_model == 'PRT')?'selected':''?>>Printer Thermal</option>
                    <option value="7" <?php echo ($vc_model == 'LCD')?'selected':''?>>LCD</option>
                    <option value="8" <?php echo ($vc_model == 'UPS')?'selected':''?>>UPS</option>
            </td>
		</tr>

        <tr>
		<td>
		<!-- <div class="form-group">
            <label for="cetak">Cetak <?php //echo form_error('cetak') ?></label>
            <input class="form-control" type="text" name="cetak" id="cetak" placeholder="Cetak" value="<?php echo $cetak; ?>">
		</div>
        </td>
        </tr>
		
        <tr>
        <td>
		<div class="form-group">
            <label for="kd_aset">Kode Aset <?php //echo form_error('kd_aset') ?></label>
            <input class="form-control" type="text" name="kd_aset" id="kd_aset" placeholder="Kode Aset" value="<?php echo $kd_aset; ?>">
		</div>
        </td>
        </tr>	
        
        <tr>
        <td> -->
	    <input type="hidden" name="kd_inv" class="form-control" id="kd_inv" value="<?php echo $kd_inv;?>">
	    <input type="hidden" name="kd_aset" class="form-control" id="kd_aset" value="<?php echo $kd_aset;?>">
        <button type="submit" class="btn btn-success">Save</button> 
        <a href="<?php echo site_url('monitor') ?>" class="btn btn-danger">Cancel</a>
        </td>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        </tr>
    </table>
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
    </body>
</html>