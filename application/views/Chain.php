<!doctype html>
<html>
    <head>
        <title>Chain Dropdown - harviacode</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>"/>
    </head>
    <body>
        <div class="container">
            <div class="col-md-6">
                <h2>Chain Dropdown Example</h2>
                <form action="<?php echo site_url('chain/aksi_form') ?>" method="post">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($provinsi as $prov) {
                                ?>
                                <option <?php echo $provinsi_selected == $prov->id_provinsi ? 'selected="selected"' : '' ?>
                                    value="<?php echo $prov->id_provinsi ?>"><?php echo $prov->nama_provinsi ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <select class="form-control" name="kota" id="kota">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($kota as $kot) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $kota_selected == $kot->id_provinsi_fk ? 'selected="selected"' : '' ?>
                                    class="<?php echo $kot->id_provinsi_fk ?>" value="<?php echo $kot->id_kota ?>"><?php echo $kot->nama_kota ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($kecamatan as $kec) {
                                ?>
                                <!--di sini kita tambahkan class berisi id kota-->
                                <option <?php echo $kecamatan_selected == $kec->id_kecamatan ? 'selected="selected"' : '' ?>
                                    class="<?php echo $kec->id_kota_fk ?>" value="<?php echo $kec->id_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#kota").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
            $("#kecamatan").chained("#kota"); // disini kita hubungkan kecamatan dengan kota
        </script>
    </script>
</body>
</html>