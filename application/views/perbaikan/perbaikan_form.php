<html>
    <head>
        <title>Tambah Perbaikan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>"/>
        <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>" ></script>
        
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body style="overflow:hidden">
        <h2 style="margin-top:0px">Perbaikan </h2>
        <form action="<?php echo base_url(). 'perbaikan/create_action';?>" method="post">
        <table>
        <tr>
        <td>
        <div id="abc">
            <div id="popupContact">
                <img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
                <h3>Daftar Inventaris</h3>
                <table id="pop" border="1">
                    <tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Ruang</b></td></tr>
                    <?php 
                    foreach ($gki as $row){
                    echo '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label for="kd_inv_pr">Kode Inventaris <?php //echo form_error('nm_inv') ?></label>
			<input class="form-control" type="text" name="kd_inv_pr" id="vc_no_pr" placeholder="Kode Inventaris" onclick="div_show()">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="id_inv_ruang">Ruang </label>
            <select name="id_ruang" class="form-control" id="id_ruang">
                <option value="">--Pilih Ruang--</option>
                <?php
                    foreach($dd_gr as $row){
                        echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
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
            <input class="form-control" type="date" name="tgl_inv_pr" id="tgl_inv_pr" placeholder="Tanggal Perbaikan">
        </div>
        </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input class="form-control" type="text" name="ket" id="ket" placeholder="Keterangan">
        </div>
        </td>
        </tr>
        <tr>
        <td>
            <button type="submit" class="btn btn-primary">Save</button>
        </td>
        <td>
            <a href="<?php echo site_url('perbaikan')?>" class="btn btn-default">Cancel</a>
        </td>
        </tr>

</html>