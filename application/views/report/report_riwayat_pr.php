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
        <h4 align="center">Laporan Riwayat Perawatan Inventaris</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_hr))?></p>
        <p>Kode Inventaris :<?php echo $kd_inv?></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perawatan</th>
            <th align="center">Tanggal Pelaksanaan</th>
            <th align="center" width="25%">Keterangan</th>
            <th align="center" width="25%">Status Pengerjaan</th>
            <th align="center" width="25%">Kondisi</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++;?>
                    <tr >
                     <td align="center"><?php echo $i?></td>
                     <td><?php echo date('d-M-Y', strtotime($row->tgl_jd))?></td>
                     <td><?php echo date('d-M-Y', strtotime($row->tgl_trs))?></td>
                     <td><?php echo $row->ket?></td>
                     <?php                     
                     $data = $row->status_p;
                     if($data=='1'){echo '<td>Belum Dikerjakan</td>';}
                     else if($data=='2'){echo '<td>Sedang Dikerjakan Hari ini</td>';}
                     else{echo '<td>Selesai Dikerjakan</td>';}?>
                    <td><?php echo $row->ket?></td></tr>
                    <?php
                    }
                    ?>                    
                </table>
    </body>
</html>