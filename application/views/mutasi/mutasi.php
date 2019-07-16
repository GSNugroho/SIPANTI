<html>
    <head>
        <title> Data Mutasi </title>
    </head>
    <body>
    <?php echo anchor(base_url('mutasi/create'),'Create', 'class="btn btn-primary"'); ?> 
    <table style="margin:20px auto;" border="1">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Tanggal Terima</th>
            <th>Ruang Mutasi</th>
            <th>Status</th>
            <th>Kondisi</th>
            <th>Alasan</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach($inv_mutasi as $ib){ 
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ib->kd_aset ?></td>
                <td><?php echo $ib->nm_inv ?></td>
                <td><?php echo $ib->jmlh_mts ?></td>
                <td><?php echo $ib->tgl_terima_mts ?></td>
                <td><?php echo $ib->vc_n_gugus ?></td>
                <td><?php echo $ib->status_mts ?></td>
                <td><?php echo $ib->kondisi_mts ?></td>
                <td><?php echo $ib->alasan_mts ?></td>
                <td>
                      <?php echo anchor('mutasi/update/'.$ib->kd_inv_mts,'Edit'); ?>
                      <?php echo anchor('mutasi/delete/'.$ib->kd_inv_mts,'Hapus'); ?>
                </td>
            </tr>
            <?php } ?>
        
    
    </table>
    </body>
</html>