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
        <h2 style="margin-top:0px">Provinsi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Provinsi <?php echo form_error('nama_provinsi') ?></label>
            <input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi" placeholder="Nama Provinsi" value="<?php echo $nama_provinsi; ?>" />
        </div>
	    <input type="hidden" name="id_provinsi" value="<?php echo $id_provinsi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('provinsi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>