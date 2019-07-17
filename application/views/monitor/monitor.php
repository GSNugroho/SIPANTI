<html>
	<head>
		<title> Data Inventaris </title>
	</head>
	<body>
	<?php echo anchor(base_url('monitor/create'),'Create', 'class="btn btn-primary"'); ?>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Tanggal Terima Barang</th>
			<th>Kode Inventaris</th>
			<th>Nama Barang</th>
			<th>Merk</th>
			<th>Jenis Barang</th>
			<th>Golongan Barang</th>
			<th>Ruang</th>
			<th>Lokasi</th>
			<th>Action</th>
		</tr>
		<?php 
		//$no = 1;
		$no = $this->uri->segment('3') + 1;
		foreach($inv_barang as $ib){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo date('d-M-Y', strtotime($ib->tgl_terima));?></td>
			<td><?php echo $ib->kd_inv ?></td>
			<td><?php echo $ib->nm_inv ?></td>
			<td><?php echo $ib->vc_nm_merk ?></td>
			<td><?php echo $ib->vc_nm_jenis ?></td>
			<td><?php echo $ib->nm_gol ?></td>
			<td><?php echo $ib->vc_n_gugus ?></td>
			<td><?php echo $ib->vc_lokasi ?></td>
			<td>
			      <?php echo anchor('monitor/update/'.$ib->kd_inv,'Edit'); ?>
                  <?php echo anchor('monitor/delete/'.$ib->kd_inv,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php echo $this->pagination->create_links();?>
	</body>
</html>