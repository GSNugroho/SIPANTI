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
            foreach ($report_p as $row) 
                {
                    $i++;
                    '<tr >
                     <td align="center">'.$i.'</td>
                     <td>'.date('d-M-Y', strtotime($row->tgl_jd)).'</td>
                     <td>'.$row->nm_jd.'</td>
                     <td>'.$row->kd_inv.'</td>
                     <td>'.$row->nm_inv.'</td>
                     <td>'.$row->vc_n_gugus.'</td>';
                     $data = $row->status_p;
                     if($data=='1'){$html.= '<td>Belum Dikerjakan</td></tr>';
                     }else if($data=='2'){$html.= '<td>Sedang Dikerjakan</td></tr>';
                     }else{$html.= '<td>Selesai Dikerjakan</td></tr>';}                            
                     
                }
            ?>
                </table>
    </body>
</html>