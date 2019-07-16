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
        <h2 style="margin-top:0px">Kota <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Provinsi Fk <?php echo form_error('id_provinsi_fk') ?></label>
            <input type="text" class="form-control" name="id_provinsi_fk" id="id_provinsi_fk" placeholder="Id Provinsi Fk" value="<?php echo $id_provinsi_fk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kota <?php echo form_error('nama_kota') ?></label>
            <input type="text" class="form-control" name="nama_kota" id="nama_kota" placeholder="Nama Kota" value="<?php echo $nama_kota; ?>" />
        </div>
	    <input type="hidden" name="id_kota" value="<?php echo $id_kota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kota') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>