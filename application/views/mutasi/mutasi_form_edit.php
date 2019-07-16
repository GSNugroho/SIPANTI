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
        <h2 style="margin-top:0px">Mutasi <?php //echo $button ?></h2>
        <form action="<?php echo base_url(). 'mutasi/create_action';?>" method="post">
        <table>
        <tr>
        <td>
        <div class="form-group">
            <label for="kd_inv_mts">Kode Inventaris <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kd_inv_mts" id="kd_inv_mts" placeholder="Kode Inventaris" value="<?php echo $kd_inv_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="id_ruang_mts">Ruang Mutasi <?php //echo form_error('nm_inv') ?></label>
            <select require name="id_ruang_mts" class="form-control"  id="id_ruang_mts">
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
        </tr> 
        <tr>
        <td>
        <div class="form-group">
            <label for="jmlh_mts">Jumlah Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="jmlh_mts" id="jmlh_mts" placeholder="Jumlah Barang" value="<?php echo $jmlh_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="tgl_terima_mts">Tanggal Terima <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="date" name="tgl_terima_mts" id="tgl_terima_mts" placeholder="Tanggal Terima" value="<?php echo $tgl_terima_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="status_mts">Status Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="status_mts" id="status_mts" placeholder="Status Mutasi" value="<?php echo $status_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="kondisi_mts">Kondisi Barang <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kondisi_mts" id="kondisi_mts" placeholder="Kondisi Barang" value="<?php echo $kondisi_mts; ?>">
        </div>
        </td>
        </tr>  
        <tr>
        <td>
        <div class="form-group">
            <label for="ket_mts">Keterangan <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="ket_mts" id="ket_mts" placeholder="Keterangan" value="<?php echo $ket_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="alasan_mts">Alasan Mutasi <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="alasan_mts" id="alasan_mts" placeholder="Alasan Mutasi" value="<?php echo $alasan_mts; ?>">
        </div>
        </td>
        </tr>
        <tr>
        <td>
	    <input type="hidden" name="id_inv" value="<?php// echo $id_inv; ?>" /> 
        <button type="submit" class="btn btn-primary">Save</button> 
        </td>
        <td>
        <a href="<?php echo site_url('mutasi') ?>" class="btn btn-default">Cancel</a>
        </td>
        </tr>
        </table>
    </body>
</html>