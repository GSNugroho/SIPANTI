<html>
	<head>
		<title> Data Perawatan Inventaris </title>
	</head>
	<body>
	<?php echo anchor(base_url('perawatan/create'),'Create', 'class="btn btn-primary"'); ?>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Awal Pengerjaan</th>
			<th>Selesai Pengerjaan</th>
			<th>Kode Inventaris</th>
            <th>Tindakan</th>
            <th>Action</th>
		</tr>
		<?php 
		$no = 1;
		//$no = $this->uri->segment('3') + 1;
		foreach($inv_perawatan as $ib){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
            <td><?php echo date('d-M-Y', strtotime($ib->dt_mulai));?></td>
            <td><?php echo date('d-M-Y', strtotime($ib->dt_selesai));?></td>
			<td><?php echo $ib->vc_no_inv ?></td>
			<td><?php echo $ib->vc_nm_tindakan ?></td>
			<td>
			      <?php echo anchor('perawatan/update/'.$ib->vc_kd_trans,'Edit'); ?>
                  <?php echo anchor('perawatan/delete/'.$ib->vc_kd_trans,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php //echo $this->pagination->create_links();?>
	</body>
</html>