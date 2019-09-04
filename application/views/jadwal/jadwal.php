<?php
	$this->load->view('mainmenu');
?>
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
	<!-- FullCalendar -->
	<link rel='stylesheet' href="<?php echo base_url('assets/bootstrap/css/fullcalendar.css')?>"/>
    <!-- Custom CSS -->
    <!-- jQuery Version 1.11.1 -->
	<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.js'); ?> "></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>" ></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- FullCalendar -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/moment.min.js'); ?> "></script>
	<script type='text/javascript' src="<?php echo base_url('assets/js/fullcalendar.min.js'); ?> "></script>
	<script src="<?php echo base_url('assets/js/my_js.js')?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/locales-all.js');?>"></script>

	<!-- Untuk Font-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<style>
    body {
        /* padding-top: 70px; */
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3>Jadwal Perawatan Inventaris</h3>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal Add-->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog1" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'jadwal/create_action'?>">
			
			  <div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title1" id="myModalLabel">Buat Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body1">
				
				  <!-- <div class="form-group1">
					<label for="nm_jd" class="col-sm-2 control-label">Nama Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="nm_jd" class="form-control1" id="nm_jd" placeholder="Nama Perawatan">
					</div>
                  </div> -->
                  <div class="form-group1">
                      <label for="kd_ruang" class="col-sm-2 control-label">Ruang</label>
                      <div class="col-sm-10">
                        <select name="kd_ruang" class="form-control1" id="kd_ruang">
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
                  <div class="form-group1">
                    <label for="kd_inv" class="col-sm-2 control-label">Kode Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_inv" class="form-control1" id="vc_no_inv" placeholder="Kode Inventaris " onclick="div_show()">
					</div>
					</div>
				  <!-- <div class="form-group1">
					<label for="color" class="col-sm-2 control-label">Warna</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control1" id="color">
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
				  </div> -->

				  <div class="form-group1">
					<label for="start" class="col-sm-2 control-label">Tanggal Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control1" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group1">
					<!-- <label for="end" class="col-sm-2 control-label">Tanggal Selesai</label> -->
					<div class="col-sm-10">
					  <input type="hidden" name="end" class="form-control1" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer1">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			  </div>
			  

			</form>
			</div>
		  </div>
		  <div id="abc">
					<div id="popupContact">
					<img id="close" src="<?php echo base_url('assets/bootstrap/image/3.png')?>" onclick ="div_hide()">
					<h5>Daftar Inventaris</h5>
					<table id="pop" border="1">
						<tr><td><b>Kode Inventaris</b></td><td><b>Kode Aset</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>
					
					</table>
					</div>
					</div>
					<script>

					$(document).ready(function(){ 
						$("#kd_ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi

						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: "<?php echo base_url("jadwal/list_inv"); ?>", // Isi dengan url/path file php yang dituju
							data: {id_ruang : $("#kd_ruang").val()}, // data yang akan dikirim ke file yang dituju
							dataType: "json",
							beforeSend: function(e) {
							if(e && e.overrideMimeType) {
								e.overrideMimeType("application/json;charset=UTF-8");
							}
							},
							success: function(response){ // Ketika proses pengiriman berhasil
							$("#loading").hide(); 

							$("#pop").html(response.list_inv).show();
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
							alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
							}
						});
						});
					});
					</script>
		</div>
		
		
		
		<!-- Modal Edit-->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog1" role="document">
			<div class="modal-content">
			<form class="form-horizontal1" method="POST" action="<?php echo base_url().'jadwal/update_action_konten'?>">
			  <div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title1" id="myModalLabel">Edit Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body1">
				
				  <!-- <div class="form-group1">
					<label for="nm_jd" class="col-sm-2 control-label">Nama Perawatan</label>
					<div class="col-sm-10">
					  <input type="text" name="nm_jd" class="form-control1" id="nm_jd" placeholder="Nama Perawatan">
					</div>
                  </div> -->
                  <div class="form-group1">
                  <label for="kd_ruang" class="col-sm-2 control-label">Ruang</label>
                      <div class="col-sm-10">
                        <select name="kd_ruang" class="form-control1" id="kd_ruang">
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
                  <div class="form-group1">
                    <label for="kd_inv" class="col-sm-2 control-label">Kode Inventaris</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_inv" class="form-control1" id="kd_inv" placeholder="Kode Inventaris">
                    </div>
                  </div>  
				  <!-- <div class="form-group1">
					<label for="color" class="col-sm-2 control-label">Warna</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control1" id="color">
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
				  </div>			 -->
				    <div class="form-group1"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox" name="delete" value="1"> Delete event</label>
						  </div>
						</div>
					</div>				
			  </div>
			  <div class="modal-footer">
				<input type="hidden" name="kd_jd" id="kd_jd">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan perubahan</button>
			  </div>
			</form>
							  
			<form method="post" action="<?php echo base_url().'perawatan/komponen'?>">
			<div class="modal-footer">
			<input type="hidden" name="kd_jd" class="form-control" id="kd_jd">
			<button type="submit" class="btn btn-primary" >Data Perawatan</button>
			</div>
			</form>
			</div>
		  </div>
		</div>
	</div>
	</div>
    </div>
    <!-- /.container -->
	
	<script>

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			monthNames: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
    		monthNamesShort: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
		    dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
    		dayNamesShort: ['Mgg','Sen','Sel','Rab','Kam','Jum','Sab'],
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: Date(),
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id_jd').val(event.id_jd);
					$('#ModalEdit #nm_jd').val(event.nm_jd);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit #kd_ruang').val(event.kd_ruang);
                    $('#ModalEdit #kd_inv').val(event.kd_inv);
					$('#ModalEdit #kd_jd').val(event.kd_jd);
					$('#ModalEdit #dt_sts').val(event.dt_sts);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($inv_jadwal as $event): 
			
				$start = explode(" ", $event->tgl_jd);
				$end = explode(" ", $event->tgl_jd_selesai);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event->tgl_jd;
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event->tgl_jd_selesai;
				}
			?>
				{
					title: '<?php echo $event->nm_jd?>',
					id_jd: '<?php echo $event->id_jd ?>',
					kd_jd: '<?php echo $event->kd_jd?>',
                    nm_jd: '<?php echo $event->nm_jd ?>',
                    kd_inv: '<?php echo $event->kd_inv ?>',
                    kd_ruang: '<?php echo $event->kd_ruang ?>',
					dt_sts: '<?php echo $event->dt_sts?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event->color ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id_jd =  event.id_jd;
			
			event = [];
			event[0] = id_jd;
			event[1] = start;
			event[2] = end;
			
			$.ajax({
			 url: '<?php echo base_url().'jadwal/update_action_tgl'?>',
			 type: "post",
			 data: {event:event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Pindah Jadwal Berhasil'); 
					}
				}
			});
		}
		
	});
</script>

<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>

</body>

</html>