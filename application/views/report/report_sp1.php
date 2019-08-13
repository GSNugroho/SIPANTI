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
        <h4 align="center">Laporan Penggunaan Sparepart</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_jd))?> sampai <?php echo date('d-m-Y', strtotime($tgl_jd_s))?></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Nama Sparepart</th>
            <th align="center" width="25%">Jumlah Barang</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++;?>
                    <tr >
                     <td align="center"><?php echo $i?></td>
                     <td><?php echo $row->vc_nm_komponen?></td>
                     <td><?php echo $row->total?></td>
                     <?php                     
                }
            ?>
                </table>
    </body>
</html>