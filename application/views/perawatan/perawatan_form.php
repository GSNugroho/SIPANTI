<!doctype html>
<html>
    <head>
        <title>Tambah Data</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
        <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body style="overflow:hidden">
        <h2 style="margin-top:0px">Perawatan <?php //echo $button ?></h2>
        <form action="<?php echo base_url(). 'monitor/create_action';?>" method="post">
	    <table>
        <tr>
        <td>
            <div id="abc">
            <div id="popupContact">
                <img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
                <h3>Daftar Inventaris</h3>
                <table id="pop" border="1">
                    <tr><td align="center">Kode Inventaris</td><td align="center">Nama Barang</td><td align="center">Ruang</td></tr>
                    <?php 
                    foreach ($gki as $row){
                    echo '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
                    }
                    ?>
                </table>
            </div>
            </div>
        <div class="form-group">
            <label for="vc_no_inv">Nomor Inventaris <?php //echo form_error('nm_inv') ?></label>
            <input class="form-control" type="text" name="vc_no_inv" id="vc_no_inv" placeholder="Nomor Inventaris" onclick="div_show() ">
        </div>
        </td>
        <td></td>
        <td>
		<div class="form-group">
            <label for="dt_mulai">Tanggal Pengerjaan <?php //echo form_error('merk') ?></label>
            <input class="form-control" type="date" name="dt_mulai" id="dt_mulai" placeholder="Tanggal Pengerjaan">
        </div>
        </td>
        </tr>
        <tr>
        <td>        
		<div class="form-group">
            <label for="dt_selesai">Tanggal Selesai <?php //echo form_error('satuan') ?></label>
            <input class="form-control" type="date" name="dt_selesai" id="dt_selesai" placeholder="Tanggal Selesai">
		</div>
        </td>	
        <td></td>
        <td>        
		<div class="form-group">
            <label for="vc_nm_tindakan">Tindakan <?php //echo form_error('jumlah') ?></label>
            <input class="form-control" type="text" name="vc_nm_tindakan" id="vc_nm_tindakan" placeholder="Tindakan">
		</div>
        </td>
        </tr>
        <tr>
        <td>
            
        <button type="submit" class="btn btn-primary">Save</button> 
        </td>
        <td>
        <a href="<?php echo site_url('perawatan') ?>" class="btn btn-default">Cancel</a>
        </td>
        </tr>
	</form>
    </table>
    </body>
</html>