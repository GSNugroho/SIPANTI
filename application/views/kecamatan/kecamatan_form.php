<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kecamatan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kota Fk <?php echo form_error('id_kota_fk') ?></label>
            <input type="text" class="form-control" name="id_kota_fk" id="id_kota_fk" placeholder="Id Kota Fk" value="<?php echo $id_kota_fk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></label>
            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" />
        </div>
	    <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kecamatan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>