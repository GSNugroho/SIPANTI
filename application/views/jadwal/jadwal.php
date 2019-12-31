<?php
	$this->load->view('mainmenu');
	// print_r($_SESSION);
?>
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
	<!-- FullCalendar -->
	<link rel='stylesheet' href="<?php echo base_url('assets/bootstrap/css/fullcalendar.css')?>"/>
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css')?>">
    <!-- jQuery Version 1.11.1 -->
	<!-- <script type='text/javascript' src="<?php //echo base_url('assets/js/jquery.js'); ?> "></script> -->
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url("assets/js/jquery.min.js"); ?>" ></script> -->
	<!-- <script src="<?php //echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script> -->
    <!-- Bootstrap Core JavaScript -->
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!-- Date Picker-->
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>

    <!-- FullCalendar -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/moment.min.js'); ?> "></script>
	<script type='text/javascript' src="<?php echo base_url('assets/js/fullcalendar.min.js'); ?> "></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/my_js.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/locales-all.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.js');?>"></script>
	<!-- Untuk Font-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-editable-select.css')?>">
	<script type="text/javascript" src="<?php echo base_url('assets/dist/jquery-editable-select.js');?>"></script>
	<style>
    /* body {
        padding-top: 70px;
        Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes.
    } */
	#calendar 
	{
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
	.pesan{
		display: none;
		position: fixed;
		border: 1px solid greenyellow;
		width: 200px;
		top: 75px;
		left: 500px;
		padding: 5px 10px;
		background-color: #00a65a;
		text-align: center;
		color: white;
	}
	.pesans{
		display: none;
		position: fixed;
		border: 1px solid red;
		width: 200px;
		top: 95px;
		left: 500px;
		padding: 5px 10px;
		background-color: #f56954;
		text-align: center;
		color: white;
	}
    </style>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
				<h3>Jadwal Perawatan Inventaris</h3>
				<div class="col-md-12 text-center">
                	<!-- <div class="btn btn-success btn-icon-split">
        		        <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		            </div>
					<div class="btn btn-danger btn-icon-split">
        		        <?php //echo $this->session->userdata('gagal') <> '' ? $this->session->userdata('gagal') : ''; ?>
					</div> -->
					<?php
						if (($this->session->userdata('message')) <> ''){
							echo '<div class="pesan">'.$this->session->userdata('message').'</div>';
						}
						if (($this->session->userdata('messages')) <> ''){
							echo '<div class="pesans">'.$this->session->userdata('messages').'</div>';
						}
					?>
					<button class="btn btn-info" id="createJadwal" data-toggle="modal" data-target=".bd-example-modal-lg">Buat Jadwal</button>
					<!-- <a href="<?php //echo base_url().'Jadwal/export'?>" class="btn btn-warning">Export Jadwal</a> -->
					<button class="btn btn-warning" name="export" id="exportX" onclick="bulan()">Export Jadwal</button>
				</div>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		<div class="modal fade bd-example-modal-lg" id="modalJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog1" role="document" style="width:auto;margin-left:10%;margin-right:10%">
			<div class="modal-content">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'jadwal/create_action'?>">
			
			  <div class="modal-header1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title1" id="myModalLabel">Buat Jadwal Perawatan</h4>
			  </div>
			  <div class="modal-body1">
				<form id="example" class="display" style="width:100%">
				<table class="table table-bordered" id="myTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Inventaris</th>
							<th>Kode Aset</th>
							<th>Nama Barang</th>
							<th>Nama Pengguna</th>
							<!-- <th>Terakhir Perawatan</th> -->
							<th>Ruang</th>
							<th>Tanggal Perawatan</th>
						</tr>
					</thead>
					<tbody>
							<?php
								$i = 0;
								foreach($prio_jadwal as $row){
									$no = $i+1;
									if($row->tgl_jd != 0){
										$tgl = date('d-m-Y', strtotime($row->tgl_jd));
									}else{
										$tgl = '';
									}
									echo "<tr>
									<td>".$no."</td>
									<td>".$row->kd_inv."<input type='hidden' name='kd_inv".$i."' class='form-control' readonly value='".$row->kd_inv."'></td>
									<td>".$row->kd_aset."<input type='hidden' name='kd_aset".$i."' class='form-control' readonly value='".$row->kd_aset."'></td>
									<td>".$row->nm_inv."<input type='hidden' name='nm_inv".$i."' class='form-control' readonly value='".$row->nm_inv."'</td>
									<td>".$row->vc_nm_pengguna."<input type='hidden' name='nm_pengguna".$i."' class='form-control' readonly value='".$row->vc_nm_pengguna."'</td>
									
									<td>".$row->vc_n_gugus."<input type='hidden' name='nm_ruang".$i."' class='form-control' readonly value='".$row->vc_n_gugus."'</td>
									<td><input type='date' name='tgl_jadwal".$i."' class='form-control' placeholder='dd-mm-yyyy'></td>
									</tr>";
									$i++;
								}

							?>
					</tbody>
				</table>
				</form>
			  </div>
			  <div class="modal-footer1">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-success" id="simpan">Simpan</button>
			  </div>
			</form>
			<script>
				$(document).ready(function() {
				var table = $('#myTable').DataTable({
					columnDefs: [{
						orderable: false,
						targets: [6]
					}]
				});
				$('#simpan').click( function() {
					var data = table.$('input, select').serialize();
					// alert(
					// 	"The following data would have been submitted to the server: \n\n"+
					// 	data.substr( 0, 5000 )
					// );
					$.ajax({
						type: "post",
						// dataType: "json",
						url: "<?php echo base_url().'jadwal/create_action2'?>",
						data: data,
						success: function(){
							// console.log('hore');
							$('#modalJadwal').modal('hide');
							window.location = "<?php base_url('Jadwal')?>";
							// $('#calendar').fullCalendar( 'refetchEvents' );
						}
					})
					return false;
				} );
				});


				$(function() {
					$('.datepicker').datetimepicker({locale:'id', format:'DD-MM-YYYY'});
				});

				// $('#simpan').click(function() {
				// 	var jadwal = [[]];
				// 	var table = document.getElementById('myTable')
				// 	for (var r = 1, x = 0, n = table.rows.length; r < n; r++) {
				// 		var ar = r-1;
				// 		if($('#tgl_jadwal'+ar).val() != ''){
				// 			for (var c = 1, y=0, m = table.rows[r].cells.length; c < m; c++, y++) {
				// 				// console.log(table.rows[r].cells[c].innerHTML);
				// 				jadwal[x][y] = table.rows[r].cells[c].innerHTML;
				// 			}
				// 			x++;
				// 		}
				// 	}
				// 	console.log(jadwal);
				// })

				// $('#simpan').click(function() {
				// 	var data = $('#jadwalin').serialize();
				// 	console.log(data);
				// })

				// var table = document.getElementsByTagName("table")[0];
				// var tbody = table.getElementsByTagName("tbody")[0];
				// $('#tgl_jadwal0').change(function (e) {
				// 	e = e || window.event;
				// 	var data = [];
				// 	var target = e.srcElement || e.target;
				// 	while (target && target.nodeName !== "TR") {
				// 		target = target.parentNode;
				// 	}
				// 	if (target) {
				// 		var cells = target.getElementsByTagName("td");
				// 		for (var i = 0; i < cells.length; i++) {
				// 			data.push(cells[i].innerHTML);
				// 		}
				// 	}
				// 	alert(data);
				// });
			</script>
			</div>
		  </div>
		</div>


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
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
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
					// $('#kd_ruang').editableSelect();
					$(document).ready(function(){ 
						$("#kd_ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi

						$.ajax({
							type: "POST", // Method pengiriman data bisa dengan GET atau POST
							url: "<?php echo base_url("jadwal/list_inv"); ?>", // Isi dengan url/path file php yang dituju
							data: {id_ruang : $("#kd_ruang").val()}, // data yang akan dikirim ke file yang dituju
							
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
                  <div class="form-group1">
                    <label for="kd_aset" class="col-sm-2 control-label">Kode Aset</label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_aset" class="form-control1" id="kd_aset" placeholder="Kode Aset" readonly>
                    </div>
				  </div> 
				  <div class="form-group1">
					  <label for="nm_pengguna" class="col-sm-2 control-label">Nama Pengguna</label>
					  <div class="col-sm-10">
						  <input type="text" name="nm_pengguna" class="form-control1" id="nm_pengguna" placeholder="Nama Pengguna" readonly>
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
						  <!-- <div class="checkbox"> -->
							<label class="text-danger"><input type="checkbox" name="delete" value="1"> Delete event</label>
							&nbsp;&nbsp;
							<label class="text-success"><input type="checkbox" name="set_time" value="1"> Atur Waktu Perawatan</label>
							&nbsp;&nbsp;
							<label class="text-info"><input type="checkbox" name="validasi" value="1"> Validasi Sudah Dilakukan Perawatan</label>
						  <!-- </div> -->
						</div>
					</div>				
			  </div>
			  <div class="modal-footer">
				<input type="hidden" name="kd_jd" id="kd_jd">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan perubahan</button>
			  </div>
			</form>
							  
			<form method="post" action="<?php echo base_url().'perawatan/komponen'?>">
			<div class="modal-footer">
			<input type="hidden" name="kd_jd" class="form-control" id="kd_jd">
			<input type="hidden" name="kd_aset" class="form-control" id="kd_aset">
			<button type="submit" class="btn btn-info" >Data Perawatan</button>
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
					$('#ModalEdit #kd_aset').val(event.kd_aset);
					$('#ModalEdit #nm_pengguna').val(event.vc_nm_pengguna);
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
					kd_aset: '<?php echo $event->kd_aset?>',
					vc_nm_pengguna: '<?php echo $event->vc_nm_pengguna?>',
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

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);

	function bulan(){
		var bln = $("#calendar").fullCalendar('getDate').month();
		var bb = parseInt(bln)+1;
		dataString = 'bb='+bb;
		console.log(dataString);
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url().'Jadwal/export/'?>'+bb,
			data: dataString,
			success: function(){
				console.log('sukses');
				window.open('<?php echo base_url().'Jadwal/export/'?>'+bb,'_blank' );
			},
			error: function(err) {
				console.log(err);
			}
		});
	}
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