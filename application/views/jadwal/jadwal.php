<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jadwal Perawatan Inventaris</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
	<!-- FullCalendar -->
	<link rel='stylesheet' href="<?php echo base_url('assets/bootstrap/css/fullcalendar.css')?>"/>
    <!-- Custom CSS -->
    <!-- jQuery Version 1.11.1 -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.js'); ?> "></script>
    <!-- Bootstrap Core JavaScript -->
    <script type='text/javascript' src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- FullCalendar -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/moment.min.js'); ?> "></script>
    <script type='text/javascript' src="<?php echo base_url('assets/js/fullcalendar.min.js'); ?> "></script>
    <style>
    body {
        padding-top: 70px;
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

</head>

<body>
<?php 
    echo anchor(base_url('dashboard'), 'Beranda', 'class="btn btn-primary"'); 
    echo"</br>";
?>	
    <!-- Page Content -->
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
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="post" action="<?php echo base_url().'jadwal/create_action'?>">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Tanggal Selesai</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal Edit-->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="<?php echo base_url().'jadwal/update_action_konten'?>">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Jadwal Perawatan</h4>
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
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<?php //echo anchor(base_url('perawatan/update/'), 'Data Perawatan', 'class="btn btn-default", name="dt_perawatan"'); ?>
							<?php echo anchor('perawatan/create', 'Data Perawatan')?>
						</div> 
					</div>				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
							  
			<form method="post" action="<?php echo base_url().'perawatan/updateperawatan'?>">
					<div class="form-group">
						<!-- <div class="col-sm-offset-2 col-sm-10">
							<?php //echo anchor(base_url('perawatan/update'), 'Data Perawatan', 'class="btn btn-default", name="dt_perawatan"'); ?>
						</div> -->
					</div>
					<input type="hidden" name="id_jd" class="form-control" id="id_jd">
					<button type="submit" class="btn btn-primary">Data Perawatan</button>
					</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
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
                    nm_jd: '<?php echo $event->nm_jd ?>',
                    kd_inv: '<?php echo $event->kd_inv ?>',
                    kd_ruang: '<?php echo $event->kd_ruang ?>',
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
			
			// var event = {
			// 	'id_jd' : $(id_jd).val(),
			// 	'start' : $(start).val(),
			// 	'end' : $(end).val()
			// }

			//var event = ['id_jd', 'start', 'end'];
			
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

</body>

</html>