<html>
    <head>
        <title>Tambah Jadwal</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
    </head>
    <body>
			<form class="form-horizontal" method="post" action="<?php echo base_url().'jadwal/create_action'?>">
			  <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Buat Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="nm_jd" class="col-sm-2 control-label">Nama Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="nm_jd" class="form-control" id="nm_jd" placeholder="Nama Perawatan">
					</div>
                  </div>
                  <div class="form-group">
                      <label for="kd_ruang" class="col-sm-2 control-label">Ruang</label>
                      <div class="col-sm-10">
                        <select name="kd_ruang" class="form-control" id="kd_ruang">
                            <option value="">--Pilih Ruang--</option>
                        <?php
                            foreach ($dd_gr as $row) {  
                            echo "<option value='".$row->vc_k_gugus."'>".$row->vc_n_gugus."</option>";
                            }
                            echo"
                      </select>"
                        ?>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="kd_inv" class="col-sm-2 control-label">Kode Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_inv" class="form-control" id="kd_inv" placeholder="Kode Inventaris">
                    </div>
                  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Warna</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">--Pilih Warna--</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Tanggal Perawatan</label>
					<div class="col-sm-10">
					  <input type="date" name="start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Tanggal Selesai</label>
					<div class="col-sm-10">
					  <input type="date" name="end" class="form-control" id="end">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
                <a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
    </body>
</html>