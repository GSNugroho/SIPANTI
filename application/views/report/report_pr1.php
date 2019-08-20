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
        <h4 align="center">Laporan Perawatan Inventaris</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_jd))?> sampai <?php echo date('d-m-Y', strtotime($tgl_jd_s))?></p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perawatan</th>
            <th align="center" width="25%">Jadwal</th>
            <th align="center" width="13%">Kode Inventaris</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Lama Pengerjaan</th>
			</tr>
            <?php
            $i=0;
            foreach ($report_p as $row) 
                {
                    $i++;?>
                    <tr >
                     <td align="center"><?php echo $i?></td>
                     <td><?php echo date('d-M-Y', strtotime($row->tgl_jd))?></td>
                     <td><?php echo $row->nm_jd?></td>
                     <td><?php echo $row->kd_inv?></td>
                     <td><?php echo $row->nm_inv?></td>
                     <td><?php echo $row->vc_n_gugus?></td>
                     <?php
                     $awal = strtotime($row->wtm);
                     $akhir = strtotime($row->wts);
                     $diff = $akhir-$awal;
                    
                     $jam   = floor($diff / (60 * 60));
                     $menit = ($diff - $jam * (60 * 60))/60;
                     echo '<td>'.$jam.'jam'.$menit.'menit</td></tr>';
                }
            ?>
                </table>
            Rata - rata waktu pengerjaan : 
            <?php
                $datarata = array();
                foreach($report_l as $row){
                    if($row->selisih != NULL){
                    $wperawatan[] = $row->selisih;
                    }
                }

                $ts = count($wperawatan);
                $rdetik = array_sum($wperawatan)/$ts;
                $menit = floor($rdetik/60);
                $detik = floor($rdetik-($menit*60));
                echo $menit.' menit '.$detik.' detik';
            ?>
    </body>
</html>