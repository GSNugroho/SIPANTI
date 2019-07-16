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
        <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="nm_brg">Nm Brg <?php echo form_error('nm_brg') ?></label>
            <textarea class="form-control" rows="3" name="nm_brg" id="nm_brg" placeholder="Nm Brg"><?php echo $nm_brg; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Jml Brg <?php echo form_error('jml_brg') ?></label>
            <input type="text" class="form-control" name="jml_brg" id="jml_brg" placeholder="Jml Brg" value="<?php echo $jml_brg; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket_brg">Ket Brg <?php echo form_error('ket_brg') ?></label>
            <textarea class="form-control" rows="3" name="ket_brg" id="ket_brg" placeholder="Ket Brg"><?php echo $ket_brg; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>