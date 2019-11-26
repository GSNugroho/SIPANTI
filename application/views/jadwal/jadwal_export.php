<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
                <th>Tanggal Perawatan</th>
                <th>Kode Aset</th>
                <th>Nama Barang</th>
                <th>Ruang</th>
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($isi as $row) { ?>
 
           <tr>
 
                <td><?php echo date('d-m-Y', strtotime($row->tgl_jd)); ?></td>
                <td><?php echo $row->kd_aset; ?></td>
                <td><?php echo $row->nm_inv; ?></td>
                <td><?php echo $row->vc_n_gugus; ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>