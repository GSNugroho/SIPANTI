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
        <h6 class="m-0 font-weight-bold text-primary">Info Komponen</h6>
	</div>
    <div class="card-body">
    <h2> </h2>
    <a href="<?php echo site_url('komponen')?>" class="btn btn-danger">Kembali</a>
    <table>
    <tr><td>Kode Barang</td><td>:</td><td><?php echo $kd_brg; ?></td></tr>
    <tr><td>Kode Aset</td><td>:</td><td><?php echo $kd_ko; ?></td></tr>
    <tr><td>Nama Barang</td><td>:</td><td><?php echo $nm_inv; ?></td></tr>
    <tr><td>Ruang</td><td>:</td><td><?php echo $vc_n_gugus; ?></td></tr>
    <tr><td>Nama Pengguna</td><td>:</td><td><?php echo $vc_nm_pengguna; ?></td></tr>
    <?php
    if($c_casing == 1){
        echo '<tr><td>Casing</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Casing</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($c_sekrup == 1){
        echo '<tr><td>Baut/ Sekrup</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Baut/ Sekrup</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($c_ksakelar == 1){
        echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Kabel Sakelar</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($c_kusb == 1){
        echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Kabel Ke USB</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($c_ksound){
        echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Kabel Ke Sound</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($c_klampu == 1){
        echo '<tr><td>Kabel Ke Lampu</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Kabel Ke Lampu</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cpu == 1){
        echo '<tr><td>CPU</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CPU</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_fsb == 1){
        echo '<tr><td>FSB</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>FSB</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_chipset == 1){
        echo '<tr><td>Chipset</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Chipset</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_memory == 1){
        echo '<tr><td>Memory</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Memory</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_onboardg == 1){
        echo '<tr><td>On Board Grafik</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>On Board Grafik</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_audio == 1){
        echo '<tr><td>Audio</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Audio</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_lan == 1){
        echo '<tr><td>LAN</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>LAN</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_pcie16 == 1){
        echo '<tr><td>PCI Express 16 Slot</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>PCI Express 16 Slot</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_pcie1 == 1){
        echo '<tr><td>PCI Express 1 Slot</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>PCI Express 1 Slot</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_agp == 1){
        echo '<tr><td>AGP</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>AGP</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_ide == 1){
        echo '<tr><td>IDE</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>IDE</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_sata == 1){
        echo '<tr><td>SATA</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>SATA</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_usb == 1){
        echo '<tr><td>USB</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>USB</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_12pmain == 1){
        echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>24 pin ATX Main Power Connector</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_4p12v == 1){
        echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>4 pin ATX 12V Power Connector</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_idekonek == 1){
        echo '<tr><td>IDE Connector</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>IDE Connector</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cpufan == 1){
        echo '<tr><td>CPU Fan Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CPU Fan Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_sysfan == 1){
        echo '<tr><td>System Fan Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>System Fan Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_fpanelh == 1){
        echo '<tr><td>Front Panel Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Front Panel Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_fpanelah == 1){
        echo '<tr><td>Front Panel Audio Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Front Panel Audio Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cdinkonek == 1){
        echo '<tr><td>CD In Connector</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CD In Connector</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_spdif == 1){
        echo '<tr><td>S/ PDIF Out Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>S/ PDIF Out Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_usb2 == 1){
        echo '<tr><td>USB 2.0</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>USB 2.0</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_chassisin == 1){
        echo '<tr><td>Chassis Intrusion Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Chassis Intrusion Header</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_powerled == 1){
        echo '<tr><td>Power LED Header</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Power LED Header </td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_ps2key == 1){
        echo '<tr><td>PS/2 Keyboard Port</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>PS/2 Keyboard Port</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_ps2mou == 1){
        echo '<tr><td>PS/2 Mouse Port</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>PS/2 Mouse Port</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_paraport == 1){
        echo '<tr><td>Parallel Port</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Parallel Port</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_seriport == 1){
        echo '<tr><td>Serial Port</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Serial Port</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_displayport == 1){
        echo '<tr><td>Display Port</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Display Port</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_busb2 == 1){
        echo '<tr><td>Back Panel USB 2.0</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Back Panel USB 2.0</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_sysvoltdetec == 1){
        echo '<tr><td>System Voltage Detection</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>System Voltage Detection</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cputempdetec == 1){
        echo '<tr><td>CPU Temperature Detection</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CPU Temperature Detection</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cpusysfail == 1){
        echo '<tr><td>CPU/ System Fan Fail Warning</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CPU/ System Fan Fail Warning</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_cpufansp == 1){
        echo '<tr><td>CPU Fan Speed Control</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CPU Fan Speed Control</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($m_bios == 1){
        echo '<tr><td>BIOS</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>BIOS</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($h_ata == 1){
        echo '<tr><td>ATA</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>ATA</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($h_satah == 1){
        echo '<tr><td>SATA HDD</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>SATA HDD</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($h_satas == 1){
        echo '<tr><td>SATA SSD</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>SATA SSD</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($h_nvm == 1){
        echo '<tr><td>NVM</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>NVM</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($r_ddr1 == 1){
        echo '<tr><td>DDR 1</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>DDR 1</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($r_ddr2 == 1){
        echo '<tr><td>DDR 2</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>DDR 2</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($r_ddr3 == 1){
        echo '<tr><td>DDR 3</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>DDR 3</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($r_ddr4 == 1){
        echo '<tr><td>DDR 4</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>DDR 4</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_cdrw == 1){
        echo '<tr><td>CD R/W</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>CD R/W</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_dvdrw == 1){
        echo '<tr><td>DVD R/W</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>DVD R/W</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_atakabel == 1){
        echo '<tr><td>ATA/ IDE Kabel</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>ATA/ IDE Kabel</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_satakabel == 1){
        echo '<tr><td>SATA Kabel</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>SATA Kabel</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_keyboard == 1){
        echo '<tr><td>Keyboard</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Keyboard</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_mouse == 1){
        echo '<tr><td>Mouse</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Mouse</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_speaker == 1){
        echo '<tr><td>Speaker</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Speaker</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_monitorcrt == 1){
        echo '<tr><td>Monitor CRT</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Monitor CRT</td><td>:</td><td>Tidak Ada</td></tr>';
    }
    if($p_monitorcrt == 1){
        echo '<tr><td>Monitor CRT</td><td>:</td><td>Ada</td></tr>';
    }else{
        echo '<tr><td>Monitor CRT</td><td>:</td><td>Tidak Ada</td></tr>';
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