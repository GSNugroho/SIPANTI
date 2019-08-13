<html>
    <head>
        <style>
            table{
                border-collapse: collapse;
            }
            table, th, td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h4 align="center">Laporan Perbaikan Inventaris</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_jd))?> sampai <?php echo date('d-m-Y', strtotime($tgl_jd_s))?></p>
        <table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perbaikan</th>
            <th align="center" width="13%">Kode Inventaris</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Jenis Perbaikan</th>
            <th align="center">Sparepart</th>
            <th align="center">Biaya</th>
            <th align="center">Keterangan</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++; ?>
                    <tr >
                    <td align="center"><?php echo $i ?></td>
                    <td><?php echo date('d-M-Y', strtotime($row->tgl_inv_pr))?></td>
                    <td><?php echo $row->kd_inv?></td>
                    <td><?php echo $row->nm_inv?></td>
                    <td><?php echo $row->vc_n_gugus?></td>
                    <?php
                    $data = $row->jns_pr;
                    if($data=='1'){echo '<td>Pengecekan</td>';
                    }else if($data=='2'){echo '<td>Ganti Sparepart</td>';
                    }else{echo '<td>Service</td>';}   ?>
                    <td><?php echo $row->sp_gt?></td>
                    <td><?php echo $row->sp_by?></td>
                    <td><?php echo $row->ket_pr?></td></tr>
                     <?php
                }
            ?>
                </table>
    </body>
</html>