<html>
    <head>
        <style>
            table{
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h4 align="center">Laporan Keterlambatan Perawatan Inventaris</h4><br><p></p>
        <p>Tanggal :<?php echo date('d-m-Y', strtotime($tgl_jd))?> sampai <?php echo date('d-m-Y', strtotime($tgl_jd_s))?></p>
        <table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Jadwal</th>
            <th align="center" width="13%">Kode Inventaris</th>
            <th align="center" width="20%">Jadwal</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Tanggal Pengerjaan</th>
            <th align="center">Selisih Hari</th>
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
                    <td align="center"><?php  
                    $tgl_s = strtotime($row->tgl_trs);
                    $tgl_a = strtotime($row->tgl_jd);
                    $selisih = $tgl_s - $tgl_a;
                    echo floor($selisih / (60 * 60 * 24)).' Hari';
                    ?></td>
                    <?php
                  
                }
            ?>
                </table>
                <!-- Rata - Rata waktu perawatan :-->
                <?php 
                    // $datarata = array();
                    // foreach($report_l as $row){
                    //     $wtelat[] = $row->selisih;
                    // }

                    // $ts = count($wtelat);
                    // $rdetik = array_sum($wtelat)/$ts;
                    // $menit = floor($rdetik/60);
                    // $detik = floor($rdetik-($menit*60));
                    // echo $menit.'menit '.$detik.'detik';
                ?>
    </body>
</html>