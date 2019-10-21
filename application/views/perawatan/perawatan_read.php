<?php
    $this->load->view('mainmenu');
?>
    <style>
    table {
            table-layout: fixed;
        }
        textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    </style>
    
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
	<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Info Perawatan</h6>
	</div>
    <div class="card-body">
    <h2> </h2>
    <a href="<?php echo site_url('perawatan')?>" class="btn btn-danger">Kembali</a>
    <table>
    <!-- <tr><td>Kode Jadwal</td><td>:</td><td><?php echo $kd_jd; ?></td></tr> -->
    <tr><td>Kode Inventaris</td><td>:</td><td><?php echo $kd_inv; ?></td></tr>
    <tr><td>Kode Aset</td><td>:</td><td><?php echo $kd_aset; ?></td></tr>
    <tr><td>Nama Pengguna</td><td>:</td><td><?php echo $nm_pengguna; ?></td></tr>
    <tr><td>Tanggal Perawatan</td><td>:</td><td><?php echo date('d-m-Y', strtotime($tgl_jd)); ?></td></tr>
    <tr><td>Waktu Mulai Perawatan</td><td>:</td><td><?php if($wtm == null) {echo '';}else{echo date('H:i', strtotime($wtm));} ?></td></tr>
    <tr><td>Waktu Selesai Perawatan</td><td>:</td><td><?php if($wts == null) {echo '';}else{echo date('H:i', strtotime($wts));} ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $vc_n_gugus; ?></td></tr>
    <?php
    if(!empty($kcasing)){
        if($kcasing == '1'){
            echo '<tr><td>Casing</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kcasing == '2'){
            echo '<tr><td>Casing</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kcasing == '3'){
            echo '<tr><td>Casing</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbaut)){
        if($kbaut == '1'){
            echo '<tr><td>Baut</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbaut == '2'){
            echo '<tr><td>Baut</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbaut == '3'){
            echo '<tr><td>Baut</td><td>:</td><td>Rusak/ Hilang</td></tr>';
        }
    }
    if(!empty($kksakelar)){
        if($kksakelar == '1'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kksakelar == '2'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kksakelar == '3'){
            echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkusb)){
        if($kkusb == '1'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkusb == '2'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkusb == '3'){
            echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kksound)){
        if($kksound == '1'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kksound == '2'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kksound == '3'){
            echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kklamp)){
        if($kklamp == '1'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kklamp == '2'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kklamp == '3'){
            echo '<tr><td>Kabel Ke Lampu Indikator</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kcpu)){
        if($kcpu == '1'){
            echo '<tr><td>CPU</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kcpu == '2'){
            echo '<tr><td>CPU</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kcpu == '3'){
            echo '<tr><td>CPU</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kfsb)){
        if($kfsb == '1'){
            echo '<tr><td>FSB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kfsb == '2'){
            echo '<tr><td>FSB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kfsb == '3'){
            echo '<tr><td>FSB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kchip)){
        if($kchip == '1'){
            echo '<tr><td>Chipset</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kchip == '2'){
            echo '<tr><td>Chipset</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kchip == '3'){
            echo '<tr><td>Chipset</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kmc1)){
        if($kmc1 == '1'){
            echo '<tr><td>Memory</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kmc1 == '2'){
            echo '<tr><td>Memory</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kmc1 == '3'){
            echo '<tr><td>Memory</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($konboard)){
        if($konboard == '1'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Baik</td></tr>';
        }else
        if($konboard == '2'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($konboard == '3'){
            echo '<tr><td>On Board Graphic</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kain)){
        if($kain == '1'){
            echo '<tr><td>Audio In</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kain == '2'){
            echo '<tr><td>Audio In</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kain == '3'){
            echo '<tr><td>Audio In</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kaout)){
        if($kaout == '1'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kaout == '2'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kaout == '3'){
            echo '<tr><td>Audio Out</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($klan)){
        if($klan == '1'){
            echo '<tr><td>LAN</td><td>:</td><td>Baik</td></tr>';
        }else
        if($klan == '2'){
            echo '<tr><td>LAN</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($klan == '3'){
            echo '<tr><td>LAN</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kepcie1)){
        if($kepcie1 == '1'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Baik</td></tr>';
        }else
        if($kepcie1 == '2'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kepcie1 == '3'){
            echo '<tr><td>PCI Express 16 Slot </td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kepci1)){
        if($kepci1 == '1'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Baik</td></tr>';
        }else
        if($kepci1 == '2'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kepci1 == '3'){
            echo '<tr><td>PCI Express 1 Slot </td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($keagp)){
        if($keagp == '1'){
            echo '<tr><td>AGP</td><td>:</td><td>Baik</td></tr>';
        }else
        if($keagp == '2'){
            echo '<tr><td>AGP</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($keagp == '3'){
            echo '<tr><td>AGP</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksiide)){
        if($ksiide == '1'){
            echo '<tr><td>IDE</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksiide == '2'){
            echo '<tr><td>IDE</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksiide == '3'){
            echo '<tr><td>IDE</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksatac1)){
        if($ksatac1 == '1'){
            echo '<tr><td>SATA</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksatac1 == '2'){
            echo '<tr><td>SATA</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksatac1 == '3'){
            echo '<tr><td>SATA</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kusb1)){
        if($kusb1 == '1'){
            echo '<tr><td>USB</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kusb1 == '2'){
            echo '<tr><td>USB</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kusb1 == '3'){
            echo '<tr><td>USB</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kic24)){
        if($kic24 == '1'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kic24 == '2'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kic24 == '3'){
            echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kic4)){
        if($kic4 == '1'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kic4 == '2'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kic4 == '3'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicide)){
        if($kicide == '1'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicide == '2'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicide == '3'){
            echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicfan)){
        if($kicfan == '1'){
            echo '<tr><td>CPU Fan Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicfan == '2'){
            echo '<tr><td>CPU Fan Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicfan == '3'){
            echo '<tr><td>CPU Fan Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicsysfan)){
        if($kicsysfan == '1'){
            echo '<tr><td>System Fan Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicsysfan == '2'){
            echo '<tr><td>System Fan Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicsysfan == '3'){
            echo '<tr><td>System Fan Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicfpanhead)){
        if($kicfpanhead == '1'){
            echo '<tr><td>Front Panel Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicfpanhead == '2'){
            echo '<tr><td>Front Panel Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicfpanhead == '3'){
            echo '<tr><td>Front Panel Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicfpanahead)){
        if($kicfpanahead == '1'){
            echo '<tr><td>Front Panel Audio Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicfpanahead == '2'){
            echo '<tr><td>Front Panel Audio Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicfpanahead == '3'){
            echo '<tr><td>Front Panel Audio Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kiccdcon)){
        if($kiccdcon == '1'){
            echo '<tr><td>CD In Connector</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kiccdcon =='2'){
            echo '<tr><td>CD In Connector</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kiccdcon == '3'){
            echo '<tr><td>CD In Connector</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicspdif)){
        if($kicspdif == '1'){
            echo '<tr><td>S/ PDIF Out Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicspdif == '2'){
            echo '<tr><td>S/ PDIF Out Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicspdif == '3'){
            echo '<tr><td>S/ PDIF Out Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicusb2c1)){
        if($kicusb2c1 == '1'){
            echo '<tr><td>USB 2.0</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicusb2c1 == '2'){
            echo '<tr><td>USB 2.0</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicusb2c1 == '3'){
            echo '<tr><td>USB 2.0</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kiccih)){
        if($kiccih == '1'){
            echo '<tr><td>Chassis Intrusion Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kiccih == '2'){
            echo '<tr><td>Chassis Intrusion Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kiccih == '3'){
            echo '<tr><td>Chassis Intrusion Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kicled)){
        if($kicled == '1'){
            echo '<tr><td>Power LED Header</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kicled == '2'){
            echo '<tr><td>Power LED Header</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kicled == '3'){
            echo '<tr><td>Power LED Header</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbpcps2k)){
        if($kbpcps2k == '1'){
            echo '<tr><td>PS/2 Keyboard Port</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcps2k == '2'){
            echo '<tr><td>PS/2 Keyboard Port</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcps2k == '3'){
            echo '<tr><td>PS/2 Keyboard Port</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbpcps2m)){
        if($kbpcps2m == '1'){
            echo '<tr><td>PS/2 Mouse Port</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcps2m == '2'){
            echo '<tr><td>PS/2 Mouse Port</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcps2m == '3'){
            echo '<tr><td>PS/2 Mouse Port</td><td>:</td><td>Baik</td></tr>';
        }
    }
    if(!empty($kbpcplp)){
        if($kbpcplp == '1'){
            echo '<tr><td>Parallel Port</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcplp == '2'){
            echo '<tr><td>Parallel Port</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcplp == '3'){
            echo '<tr><td>Parallel Port</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbpcsp)){
        if($kbpcsp == '1'){
            echo '<tr><td>Serial Port</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcsp == '2'){
            echo '<tr><td>Serial Port</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcsp == '3'){
            echo '<tr><td>Serial Port</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbpcdp)){
        if($kbpcdp == '1'){
            echo '<tr><td>Display Port</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcdp == '2'){
            echo '<tr><td>Display Port</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcdp == '3'){
            echo '<tr><td>Display Port</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbpcusb2c1)){
        if($kbpcusb2c1 == '1'){
            echo '<tr><td>Back Panel USB 2.0</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbpcusb2c1 == '2'){
            echo '<tr><td>Back Panel USB 2.0</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbpcusb2c1 == '3'){
            echo '<tr><td>Back Panel USB 2.0</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($khmsvd)){
        if($khmsvd == '1'){
            echo '<tr><td>System Voltage Detection</td><td>:</td><td>Baik</td></tr>';
        }else
        if($khmsvd == '2'){
            echo '<tr><td>System Voltage Detection</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($khmsvd == '3'){
            echo '<tr><td>System Voltage Detection</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($khmctd)){
        if($khmctd == '1'){
            echo '<tr><td>CPU Temperature Detection</td><td>:</td><td>Baik</td></tr>';
        }else
        if($khmctd == '2'){
            echo '<tr><td>CPU Temperature Detection</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($khmctd == '3'){
            echo '<tr><td>CPU Temperature Detection</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($khmffw)){
        if($khmffw == '1'){
            echo '<tr><td>CPU/ System Fan Fail Warning</td><td>:</td><td>Baik</td></tr>';
        }else
        if($khmffw == '2'){
            echo '<tr><td>CPU/ System Fan Fail Warning</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($khmffw == '3'){
            echo '<tr><td>CPU/ System Fan Fail Warning</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($khmfsc)){
        if($khmfsc == '1'){
            echo '<tr><td>CPU Fan Speed Control</td><td>:</td><td>Baik</td></tr>';
        }else
        if($khmfsc == '2'){
            echo '<tr><td>CPU Fan Speed Control</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($khmfsc == '3'){
            echo '<tr><td>CPU Fan Speed Control</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kbios == '1')){
        if($kbios == '1'){
            echo '<tr><td>BIOS</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kbios == '2'){
            echo '<tr><td>BIOS</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kbios == '3'){
            echo '<tr><td>BIOS</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($katahdd1)){
        if($katahdd1 == '1'){
            echo '<tr><td>ATA</td><td>:</td><td>Baik</td></tr>';
        }else
        if($katahdd1 == '2'){
            echo '<tr><td>ATA</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($katahdd1 == '3'){
            echo '<tr><td>ATA</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksatahdd1)){
        if($ksatahdd1 == '1'){
            echo '<tr><td>SATA HDD</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksatahdd1 == '2'){
            echo '<tr><td>SATA HDD</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksatahdd1 == '3'){
            echo '<tr><td>SATA HDD</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksatassd1)){
        if($ksatassd1 == '1'){
            echo '<tr><td>SATA SSD</td><td>:</td><td>Baik</td></tr>';
        }else
        if($ksatassd1 == '2'){
            echo '<tr><td>SATA SSD</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksatassd1 == '3'){
            echo '<tr><td>SATA SSD</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($knvmssd1)){
        if($knvmssd1 == '1'){
            echo '<tr><td>NVM</td><td>:</td><td>Baik</td></tr>';
        }else
        if($knvmssd1 == '2'){
            echo '<tr><td>NVM</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($knvmssd1 == '3'){
            echo '<tr><td>NVM</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kramd1c1)){
        if($kramd1c1 == '1'){
            echo '<tr><td>RAM DDR 1</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kramd1c1 == '2'){
            echo '<tr><td>RAM DDR 1</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kramd1c1 == '3'){
            echo '<tr><td>RAM DDR 1</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kramd2c1)){
        if($kramd2c1 == '1'){
            echo '<tr><td>RAM DDR 2</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kramd2c1 == '2'){
            echo '<tr><td>RAM DDR 2</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kramd2c1 == '3'){
            echo '<tr><td>RAM DDR 2</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kramd3c1)){
        if($kramd3c1 == '1'){
            echo '<tr><td>RAM DDR 3</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kramd3c1 == '2'){
            echo '<tr><td>RAM DDR 3</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kramd3c1 == '3'){
            echo '<tr><td>RAM DDR 3</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kramd4c1)){
        if($kramd4c1 == '1'){
            echo '<tr><td>RAM DDR 4</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kramd4c1 == '2'){
            echo '<tr><td>RAM DDR 4</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kramd4c1 == '3'){
            echo '<tr><td>RAM DDR 4</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kcdrw)){
        if($kcdrw == '1'){
            echo '<tr><td>CD RW</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kcdrw == '2'){
            echo '<tr><td>CD RW</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kcdrw == '3'){
            echo '<tr><td>CD RW</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kdvdrw)){
        if($kdvdrw == '1'){
            echo '<tr><td>DVD RW</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kdvdrw == '2'){
            echo '<tr><td>DVD RW</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kdvdrw == '3'){
            echo '<tr><td>DVD RW</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kaic)){
        if($kaic == '1'){
            echo '<tr><td>ATA/ IDE Cable</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kaic == '2'){
            echo '<tr><td>ATA/ IDE Cable</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kaic == '3'){
            echo '<tr><td>ATA/ IDE Cable</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($ksatac)){
        if($ksatac == '1'){
            echo '<tr><td>SATA Cable</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kasatac == '2'){
            echo '<tr><td>SATA Cable</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($ksatac == '3'){
            echo '<tr><td>SATA Cable</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkey)){
        if($kkey == '1'){
            echo '<tr><td>Keyboard</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkey == '2'){
            echo '<tr><td>Keyboard</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkey == '3'){
            echo '<tr><td>Keyboard</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kmou)){
        if($kmou == '1'){
            echo '<tr><td>Mouse</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kmou == '2'){
            echo '<tr><td>Mouse</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kmou == '3'){
            echo '<tr><td>Mouse</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kspea)){
        if($kspea == '1'){
            echo '<tr><td>Speaker</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kspea == '2'){
            echo '<tr><td>Speaker</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kspea == '3'){
            echo '<tr><td>Speaker</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kmoncrt)){
        if($kmoncrt == '1'){
            echo '<tr><td>Monitor CRT</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kmoncrt == '2'){
            echo '<tr><td>Monitor CRT</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kmoncrt == '3'){
            echo '<tr><td>Monitor CRT</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kmonlcd)){
        if($kmonlcd == '1'){
            echo '<tr><td>Monitor LCD</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kmonlcd == '2'){
            echo '<tr><td>Monitor LCD</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kmonlcd == '3'){
            echo '<tr><td>Monitor LCD</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kvgac)){
        if($kvgac == '1'){
            echo '<tr><td>VGA Kabel</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kvgac == '2'){
            echo '<tr><td>VGA Kabel</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kvgac == '3'){
            echo '<tr><td>VGA Kabel</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($klanc)){
        if($klanc == '1'){
            echo '<tr><td>LAN Card</td><td>:</td><td>Baik</td></tr>';
        }else
        if($klanc == '2'){
            echo '<tr><td>LAN Card</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($klanc == '3'){
            echo '<tr><td>LAN Card</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kvgacrd)){
        if($kvgacrd == '1'){
            echo '<tr><td>VGA Card</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kvgacrd == '2'){
            echo '<tr><td>VGA Card</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kvgacrd == '3'){
            echo '<tr><td>VGA Card</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kfirec)){
        if($kfirec == '1'){
            echo '<tr><td>Firewire Card</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kfirec == '2'){
            echo '<tr><td>Firewire Card</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kfirec == '3'){
            echo '<tr><td>Firewire Card</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($klptc)){
        if($klptc == '1'){
            echo '<tr><td>LPT Card</td><td>:</td><td>Baik</td></tr>';
        }else
        if($klptc == '2'){
            echo '<tr><td>LPT Card</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($klptc == '3'){
            echo '<tr><td>LPT Card</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($krsc)){
        if($krsc == '1'){
            echo '<tr><td>RS 232 Card</td><td>:</td><td>Baik</td></tr>';
        }else
        if($krsc == '2'){
            echo '<tr><td>RS 232 Card</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($krsc == '3'){
            echo '<tr><td>RS 232 Card</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kpwrs)){
        if($kpwrs == '1'){
            echo '<tr><td>Power Supply</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kpwrs == '2'){
            echo '<tr><td>Power Supply</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kpwrs == '3'){
            echo '<tr><td>Power Supply</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkpwr)){
        if($kkpwr == '1'){
            echo '<tr><td>Kabel Power</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkpwr == '2'){
            echo '<tr><td>Kabel Power</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkpwr == '3'){
            echo '<tr><td>Kabel Power</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkpwrmon)){
        if($kkpwrmon == '1'){
            echo '<tr><td>Kabel Power Monitor</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkpwrmon == '2'){
            echo '<tr><td>Kabel Power Monitor</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkpwrmon == '3'){
            echo '<tr><td>Kabel Power Monitor</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkpwrsata)){
        if($kkpwrsata == '1'){
            echo '<tr><td>Kabel Power Sata</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkpwrsata == '2'){
            echo '<tr><td>Kabel Power Sata</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkpwrsata == '3'){
            echo '<tr><td>Kabel Power Sata</td><td>:</td><td>Rusak</td></tr>';
        }
    }
    if(!empty($kkmolpwr)){
        if($kkmolpwr == '1'){
            echo '<tr><td>Kabel Molex Power</td><td>:</td><td>Baik</td></tr>';
        }else
        if($kkmolpwr == '2'){
            echo '<tr><td>Kabel Molex Power</td><td>:</td><td>Kurang Baik</td></tr>';
        }else
        if($kkmolpwr == '3'){
            echo '<tr><td>Kabel Molex Power</td><td>:</td><td>Rusak</td></tr>';
        }
    }
        // echo '<tr><td>Keterangan</td><td>:</td><td>'.$ket.'</td></tr>';
    ?>
    </table>
    
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
      </div>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>    
    
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
	  $('.time').clockTimePicker({});
	});

    $(document).ready(function(){      
    var i=1;  
    $('#addmem').click(function(){  
        i++;  
        $('#dynamic_field1').append('<tr id="rowm'+i+'" class="dynamic-added"><td></td><td>Memory <button type="button" name="remove1" id="'+i+'" class="btn btn-danger btn_remove1">X</button></td><td><input type="radio" name="kmc'+i+'" value="1"></td><td><input type="radio" name="kmc'+i+'" value="2" ></td><td><input type="radio" name="kmc'+i+'" value="3" ></td></tr>');  
    });
    $(document).on('click', '.btn_remove1', function(){  
        var button_id = $(this).attr("id");   
    $('#rowm'+button_id+'').remove();  
    });  
    });

    $(document).ready(function(){
        var i=1;
        $('#addex').click(function(){
            i++;
            $('#dynamic_field2').append('<tr id="rowex'+i+'" class="dynamic-added"><td></td><td>PCI Express 16 Slot <button type="button2" name="remove2" id="'+i+'" class="btn btn-danger btn_remove2">X</button></td><td><input type="radio" name="kepcie'+i+'" value="1"></td><td><input type="radio" name="kepcie'+i+'" value="2"></td><td><input type="radio" name="kepcie'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove2', function(){  
            var button_id = $(this).attr("id");   
            $('#rowex'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsa').click(function(){
            i++;
            $('#dynamic_field3').append('<tr id="rowsa'+i+'" class="dynamic-added"><td></td><td>Sata <button type="button" name="remove3" id="'+i+'" class="btn btn-danger btn_remove3">X</button></td><td><input type="radio" name="ksatac'+i+'" value="1"></td><td><input type="radio" name="ksatac'+i+'" value="2"></td><td><input type="radio" name="ksatac'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove3', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsa'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addus').click(function(){
            i++;
            $('#dynamic_field4').append('<tr id="rowus'+i+'" class="dynamic-added"><td></td><td>USB <button type="button" name="remove4" id="'+i+'" class="btn btn-danger btn_remove4">X</button></td><td><input type="radio" name="kusb'+i+'" value="1"></td><td><input type="radio" name="kusb'+i+'" value="2"></td><td><input type="radio" name="kusb'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove4', function(){  
            var button_id = $(this).attr("id");   
            $('#rowus'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addus2').click(function(){
            i++;
            $('#dynamic_field5').append('<tr id="rowus2'+i+'" class="dynamic-added"><td></td><td>USB 2.0 <button type="button" name="remove5" id="'+i+'" class="btn btn-danger btn_remove5">X</button></td><td><input type="radio" name="kbpcusb2c'+i+'" value="1"></td><td><input type="radio" name="kbpcusb2c'+i+'" value="2"></td><td><input type="radio" name="kbpcusb2c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove5', function(){  
            var button_id = $(this).attr("id");   
            $('#rowus2'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addata').click(function(){
            i++;
            $('#dynamic_field6').append('<tr id="rowata'+i+'" class="dynamic-added"><td></td><td>ATA <button type="button" name="remove6" id="'+i+'" class="btn btn-danger btn_remove6">X</button></td><td><input type="radio" name="katahdd'+i+'" value="1"></td><td><input type="radio" name="katahdd'+i+'" value="2"></td><td><input type="radio" name="katahdd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove6', function(){  
            var button_id = $(this).attr("id");   
            $('#rowata'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsatah').click(function(){
            i++;
            $('#dynamic_field7').append('<tr id="rowsatah'+i+'" class="dynamic-added"><td></td><td>SATA HDD <button type="button" name="remove7" id="'+i+'" class="btn btn-danger btn_remove7">X</button></td><td><input type="radio" name="ksatahdd'+i+'" value="1"></td><td><input type="radio" name="ksatahdd'+i+'" value="2"></td><td><input type="radio" name="ksatahdd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove7', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsatah'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addsatas').click(function(){
            i++;
            $('#dynamic_field8').append('<tr id="rowsatas'+i+'" class="dynamic-added"><td></td><td>SATA SSD <button type="button" name="remove8" id="'+i+'" class="btn btn-danger btn_remove8">X</button></td><td><input type="radio" name="ksatassd'+i+'" value="1"></td><td><input type="radio" name="ksatassd'+i+'" value="2"></td><td><input type="radio" name="ksatassd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove8', function(){  
            var button_id = $(this).attr("id");   
            $('#rowsatas'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addnvm').click(function(){
            i++;
            $('#dynamic_field9').append('<tr id="rownvm'+i+'" class="dynamic-added"><td></td><td>NVM <button type="button" name="remove9" id="'+i+'" class="btn btn-danger btn_remove9">X</button></td><td><input type="radio" name="knvmssd'+i+'" value="1"></td><td><input type="radio" name="knvmssd'+i+'" value="2"></td><td><input type="radio" name="knvmssd'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove9', function(){  
            var button_id = $(this).attr("id");   
            $('#rownvm'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram1').click(function(){
            i++;
            $('#dynamic_field10').append('<tr id="rowram1'+i+'" class="dynamic-added"><td></td><td>DDR 1 <button type="button" name="remove10" id="'+i+'" class="btn btn-danger btn_remove10">X</button></td><td><input type="radio" name="kramd1c'+i+'" value="1"></td><td><input type="radio" name="kramd1c'+i+'" value="2"></td><td><input type="radio" name="kramd1c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove10', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram1'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram2').click(function(){
            i++;
            $('#dynamic_field11').append('<tr id="rowram2'+i+'" class="dynamic-added"><td></td><td>DDR 2 <button type="button" name="remove11" id="'+i+'" class="btn btn-danger btn_remove11">X</button></td><td><input type="radio" name="kramd2c'+i+'" value="1"></td><td><input type="radio" name="kramd2c'+i+'" value="2"></td><td><input type="radio" name="kramd2c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove11', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram2'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram3').click(function(){
            i++;
            $('#dynamic_field12').append('<tr id="rowram3'+i+'" class="dynamic-added"><td></td><td>DDR 3 <button type="button" name="remove12" id="'+i+'" class="btn btn-danger btn_remove12">X</button></td><td><input type="radio" name="kramd3c'+i+'" value="1"></td><td><input type="radio" name="kramd3c'+i+'" value="2"></td><td><input type="radio" name="kramd3c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove12', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram3'+button_id+'').remove();  
    });
    });

    $(document).ready(function(){
        var i=1;
        $('#addram4').click(function(){
            i++;
            $('#dynamic_field13').append('<tr id="rowram4'+i+'" class="dynamic-added"><td></td><td>DDR 4 <button type="button" name="remove13" id="'+i+'" class="btn btn-danger btn_remove13">X</button></td><td><input type="radio" name="kramd4c'+i+'" value="1"></td><td><input type="radio" name="kramd4c'+i+'" value="2"></td><td><input type="radio" name="kramd4c'+i+'" value="3"></td></tr>')
        });
        $(document).on('click', '.btn_remove13', function(){  
            var button_id = $(this).attr("id");   
            $('#rowram4'+button_id+'').remove();  
    });
    });


    </script>
    </body>
</html>