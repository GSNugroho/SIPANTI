<html>
	<head>
		<title> Data Perawatan Inventaris </title>
	</head>
	<body>
	<?php 
	echo anchor(base_url('dashboard'), 'Beranda', 'class="btn btn-primary"'); 
	echo"</br>";
	echo anchor(base_url('perawatan/create'),'Create', 'class="btn btn-primary"'); ?>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Tanggal Perawatan</th>
			<th>Perkiraan Tanggal Selesai</th>
			<th>Nama Jadwal</th>
			<th>Kode Inventaris</th>
			<th>Nama Barang</th>
            <th>Ruang</th>
            <th>Status Pengerjaan</th>
            <th>Action</th>
		</tr>
		<?php 
		$no = 1;
		//$no = $this->uri->segment('3') + 1;
		foreach($inv_perawatan as $ib){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
            <td><?php echo date('d-M-Y', strtotime($ib->tgl_jd));?></td>
            <td><?php echo date('d-M-Y', strtotime($ib->tgl_jd_selesai));?></td>
			<td><?php echo $ib->nm_jd ?></td>
			<td><?php echo $ib->kd_inv ?></td>
			<td><?php echo $ib->nm_inv ?></td>
			<td><?php echo $ib->vc_n_gugus ?></td>
			<td><?php $data = $ib->status_p;
					if($data=='1'){echo "Belum Dikerjakan";
					}else if($data=='2'){echo "Sedang Dikerjakan";
					}else{echo "Sudah Selesai Dikerjakan";}
			?></td>
			<td>
			      <?php echo anchor('perawatan/update/'.$ib->kd_jd,'Edit'); ?>
                  <?php echo anchor('perawatan/delete/'.$ib->kd_jd,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php //echo $this->pagination->create_links();?>
	</body>
</html>