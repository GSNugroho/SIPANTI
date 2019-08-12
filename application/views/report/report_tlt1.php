<html>
    <head>
    </head>
    <body>
        <h4 align="center">Laporan Keterlambatan Perawatan Inventaris</h4><br><p></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Jadwal</th>
            <th align="center" width="13%">Kode Inventaris</th>
            <th align="center" width="25%">Jadwal</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Tanggal Pengerjaan</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++; ?>
                    <tr >
                    <td align="center"><?php echo $i ?></td>
                    <td><?php echo date('d-M-Y', strtotime($row->tgl_jd))?></td>
                    <td><?php echo $row->kd_inv?></td>
                    <td><?php echo $row->nm_jd?></td>
                    <td><?php echo $row->nm_inv?></td>
                    <td><?php echo $row->vc_n_gugus?></td>
                    <td><?php echo date('d-M-Y', strtotime($row->tgl_trs))?></td>
                    <?php
                  
                }
            ?>
                </table>
    </body>
</html>