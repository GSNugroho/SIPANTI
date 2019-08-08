<html>
    <head>
    </head>
    <body>
        <h4 align="center">Laporan Perawatan Inventaris</h4><br><p></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perawatan</th>
            <th align="center" width="25%">Jadwal</th>
            <th align="center" width="13%">Kode Inventaris</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Status Pengerjaan</th>
			</tr>
            <?php
            $i=0;
            foreach ($data as $row) 
                {
                    $i++;
                    '<tr >
                    <td align="center">'.$i.'</td>
                    <td>'.date('d-M-Y', strtotime($row->tgl_inv_pr)).'</td>
                    <td>'.$row->kd_inv.'</td>
                    <td>'.$row->nm_inv.'</td>
                    <td>'.$row->vc_n_gugus.'</td>';
        
                    $data = $row->jns_pr;
                    if($data=='1'){echo '<td>Pengecekan</td>';
                    }else if($data=='2'){echo '<td>Ganti Sparepart</td>';
                    }else{echo '<td>Service</td>';}   
                    '<td>'.$row->sp_gt.'</td>
                    <td>'.$row->sp_by.'</td>
                    <td>'.$row->ket_pr.'</td></tr>';                         
                     
                }
            ?>
                </table>
    </body>
</html>