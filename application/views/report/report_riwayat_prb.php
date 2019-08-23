<html>
    <head>
        <title>Report Riwayat Perbaikan</title>
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
        <h4 align="center">Laporan Riwayat Perbaikan Inventaris</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_hr))?></p>
        <p>Kode Inventaris :<?php echo $kd_inv?></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perbaikan</th>
            <th align="center" width="20%">Perbaikan</th>
            <th align="center" width="15%">Sparepart Ganti</th>
            <th align="center" >Biaya</th>
            <th align="center" width="25%">Keterangan</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++;?>
                    <tr >
                     <td align="center"><?php echo $i?></td>
                     <td><?php echo date('d-M-Y', strtotime($row->tgl_inv_pr))?></td>
                     <?php                     
                     $data = $row->jns_pr;
                     if($data=='1'){echo '<td>Pengecekan</td>';}
                     else if($data=='2'){echo '<td>Penggantian Sparepart</td>';}
                     else{echo '<td>Service</td>';}?>
                     <td><?php echo $row->sp_gt?></td>
                     <td><?php $uang = $row->sp_by;
                        $hasil_rupiah = "Rp " . number_format($uang,2,',','.');
                        echo $hasil_rupiah;
                     ?></td>
                     <td><?php echo $row->ket_pr?></td></tr>
                    <?php
                    }
                    ?>                    
                </table>
    </body>
</html>