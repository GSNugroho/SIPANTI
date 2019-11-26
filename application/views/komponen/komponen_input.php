<?php
    $this->load->view('mainmenu');
?>
    <link href="<?php echo base_url('assets/bootstrap/css/timepicker.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    </head>
	<!-- DataTales Example -->
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-primary">Pilih Komponen Perawatan</h6>
		</div>
    <div class="card-body">
        <form action="<?php echo base_url().'komponen/set_data_komponen';?>" method="post">
    <div class="table-responsive">
    <table border="1" align="center" class="table table-bordered">
        <tr>
        <th>Casing</th>
        <th><input type="checkbox" class="checkall" id="select_casing"></th>
        <th>Mainboard</th>
        <th><input type="checkbox" class="checkall" id="select_main"></th>
        <th>Harddisk</th>
        <th><input type="checkbox" class="checkall" id="select_hard"></th>
        <th>RAM</th>
        <th><input type="checkbox" class="checkall" id="select_ram"></th>
        <th>Peripheral</th>
        <th><input type="checkbox" class="checkall" id="select_peri"></th>
        <th>Card</th>
        <th><input type="checkbox" class="checkall" id="select_card"></th>
        <th>Kelistrikan</th>
        <th><input type="checkbox" class="checkall" id="select_lis"></th>
        </tr>
        <tr>
            <td>
                Casing
            </td>
            <td>
                <input type="checkbox" name="c_casing" value="1" class="casing" <?php if($c_casing == 1) { echo 'checked';}?>>
            </td>
            <td>
                CPU
            </td>
            <td>
                <input type="checkbox" name="m_cpu" value="1" class="main" <?php if($m_cpu == 1) { echo 'checked';}?>>
            </td>
            <td>
                ATA
            </td>
            <td>
                <input type="checkbox" name="h_ata" value="1" class="hard" <?php if($h_ata == 1) { echo 'checked';}?>>
            </td>
            <td>
                DDR 1
            </td>
            <td>
                <input type="checkbox" name="r_ddr1" value="1" class="ram" <?php if($r_ddr1 == 1) { echo 'checked';}?>>
            </td>
            <td>
                CD R/W
            </td>
            <td>
                <input type="checkbox" name="p_cdrw" value="1" class="peri" <?php if($p_cdrw == 1) { echo 'checked';}?>>
            </td>
            <td>
                LAN Card
            </td>
            <td>
                <input type="checkbox" name="cr_lancard" value="1" class="card" <?php if($cr_lancard == 1) { echo 'checked';}?>>
            </td>
            <td>
                Power Supply
            </td>
            <td>
                <input type="checkbox" name="l_powersupply" value="1" class="lis" <?php if($l_powersupply == 1) { echo 'checked';}?>>
            </td>
        </tr>
        <tr>
            <td>
                Sekrup/ baut
            </td>
            <td>
                <input type="checkbox" name="c_sekrup" value="1" class="casing" <?php if($c_sekrup == 1) { echo 'checked';}?>>
            </td>
            <td>
                FSB
            </td>
            <td>
                <input type="checkbox" name="m_fsb" value="1" class="main" <?php if($m_fsb == 1) { echo 'checked';}?>>
            </td>
            <td>
                SATA HDD
            </td>
            <td>
                <input type="checkbox" name="h_satah" value="1" class="hard" <?php if($h_satah == 1) { echo 'checked';}?>>
            </td>
            <td>
                DDR 2
            </td>
            <td>
                <input type="checkbox" name="r_ddr2" value="1" class="ram" <?php if($r_ddr2 == 1) { echo 'checked';}?>>
            </td>
            <td>
                DVD R/W
            </td>
            <td>
                <input type="checkbox" name="p_dvdrw" value="1" class="peri" <?php if($p_dvdrw == 1) { echo 'checked';}?>>
            </td>
            <td>
                VGA Card
            </td>
            <td>
                <input type="checkbox" name="cr_vgacard" value="1" class="card" <?php if($cr_vgacard == 1) { echo 'checked';}?>>
            </td>
            <td>
                Kabel Power
            </td>
            <td>
                <input type="checkbox" name="l_kabelpower" value="1" class="lis" <?php if($l_kabelpower == 1) { echo 'checked';}?>>
            </td>
        </tr>
        <tr>
            <td>
                Kabel Sakelar
            </td>
            <td>
                <input type="checkbox" name="c_ksakelar" value="1" class="casing" <?php if($c_sekrup == 1) { echo 'checked';}?>>
            </td>
            <td>
                Chipset
            </td>
            <td>
                <input type="checkbox" name="m_chipset" value="1" class="main" <?php if($m_chipset == 1) { echo 'checked';}?>>
            </td>
            <td>
                SATA SSD
            </td>
            <td>
                <input type="checkbox" name="h_satas" value="1" class="hard" <?php if($h_satas == 1) { echo 'checked';}?>>
            </td>
            <td>
                DDR 3
            </td>
            <td>
                <input type="checkbox" name="r_ddr3" value="1" class="ram" <?php if($r_ddr3 == 1) { echo 'checked';}?>>
            </td>
            <td>
                ATA/ IDE Kabel
            </td>
            <td>
                <input type="checkbox" name="p_atakabel" value="1" class="peri" <?php if($p_atakabel == 1) { echo 'checked';}?>>
            </td>
            <td>
                Firewire Card
            </td>
            <td>
                <input type="checkbox" name="cr_firecard" value="1" class="card" <?php if($cr_firecard == 1) { echo 'checked';}?>>
            </td>
            <td>
                Kabel Power Monitor
            </td>
            <td>
                <input type="checkbox" name="l_kabelpowermon" value="1" class="lis" <?php if($l_kabelpowermon == 1) { echo 'checked';}?>>
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke USB
            </td>
            <td>
                <input type="checkbox" name="c_kusb" value="1" class="casing" <?php if($c_ksakelar == 1) { echo 'checked';}?>>
            </td>
            <td>
                Memory
            </td>
            <td>
                <input type="checkbox" name="m_memory" value="1" class="main" <?php if($m_memory == 1) { echo 'checked';}?>>
            </td>
            <td>
                NVM
            </td>
            <td>
                <input type="checkbox" name="h_nvm" value="1" class="hard" <?php if($h_nvm == 1) { echo 'checked';}?>>
            </td>
            <td>
                DDR 4
            </td>
            <td>
                <input type="checkbox" name="r_ddr4" value="1" class="ram" <?php if($r_ddr4 == 1) { echo 'checked';}?>>
            </td>
            <td>
                SATA Kabel
            </td>
            <td>
                <input type="checkbox" name="p_satakabel" value="1" class="peri" <?php if($p_satakabel == 1) { echo 'checked';}?>>
            </td>
            <td>
                LPT Card
            </td>
            <td>
                <input type="checkbox" name="cr_lptcard" value="1" class="card" <?php if($cr_lptcard == 1) { echo 'checked';}?>>
            </td>
            <td>
                Kabel Power SATA
            </td>
            <td>
                <input type="checkbox" name="l_kabelpowersata" value="1" class="lis" <?php if($l_kabelpowersata == 1) { echo 'checked';}?>>
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke Sound
            </td>
            <td>
                <input type="checkbox" name="c_ksound" value="1" class="casing" <?php if($c_ksound == 1) { echo 'checked';}?>>
            </td>
            <td>
                On Board Graphics
            </td>
            <td>
                <input type="checkbox" name="m_onboardg" value="1" class="main" <?php if($m_onboardg == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Keyboard
            </td>
            <td>
                <input type="checkbox" name="p_keyboard" value="1" class="peri" <?php if($p_keyboard == 1) { echo 'checked';}?>>
            </td>
            <td>
                RS 232 Card
            </td>
            <td>
                <input type="checkbox" name="cr_rs232card" value="1" class="card" <?php if($cr_rs232card == 1) { echo 'checked';}?>>
            </td>
            <td>
                Kabel Molex Power
            </td>
            <td>
                <input type="checkbox" name="l_kabelmolexpow" value="1" class="lis" <?php if($l_kabelmolexpow == 1) { echo 'checked';}?>>
            </td>
        </tr>
        <tr>
            <td>
                Kabel Ke Lampu Indikator
            </td>
            <td>
                <input type="checkbox" name="c_klampu" value="1" class="casing" <?php if($c_klampu == 1) { echo 'checked';}?>>
            </td>
            <td>
                Audio
            </td>
            <td>
                <input type="checkbox" name="m_audio" value="1" class="main" <?php if($m_audio == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Mouse
            </td>
            <td>
                <input type="checkbox" name="p_mouse" value="1" class="peri" <?php if($p_mouse == 1) { echo 'checked';}?>>
            </td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                LAN
            </td>
            <td>
                <input type="checkbox" name="m_lan" value="1" class="main" <?php if($m_lan == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Speaker
            </td>
            <td>
                <input type="checkbox" name="p_speaker" value="1" class="peri" <?php if($p_speaker == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PCI Express 16 Slot
            </td>
            <td>
                <input type="checkbox" name="m_pcie16" value="1" class="main" <?php if($m_pcie16 == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Monitor CRT
            </td>
            <td>
                <input type="checkbox" name="p_monitorcrt" value="1" class="peri" <?php if($p_monitorcrt == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PCI Express 1 Slot
            </td>
            <td>
                <input type="checkbox" name="m_pcie1" value="1" class="main" <?php if($m_pcie1 == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                Monitor LCD
            </td>
            <td>
                <input type="checkbox" name="p_monitorlcd" value="1" class="peri" <?php if($p_monitorlcd == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                AGP
            </td>
            <td>
                <input type="checkbox" name="m_agp" value="1" class="main" <?php if($m_agp == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td>
                VGA Kabel
            </td>
            <td>
                <input type="checkbox" name="p_vgakabel" value="1" class="peri" <?php if($p_vgakabel == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                IDE
            </td>
            <td>
                <input type="checkbox" name="m_ide" value="1" class="main" <?php if($m_ide == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                SATA
            </td>
            <td>
                <input type="checkbox" name="m_sata" value="1" class="main" <?php if($m_sata == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                USB
            </td>
            <td>
                <input type="checkbox" name="m_usb" value="1" class="main" <?php if($m_usb == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                24 pin ATX Main Power Connector
            </td>
            <td>
                <input type="checkbox" name="m_12pmain" value="1" class="main" <?php if($m_12pmain == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                4 pin ATX 12V Power Connector
            </td>
            <td>
                <input type="checkbox" name="m_4p12v" value="1" class="main" <?php if($m_4p12v == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                IDE Connector
            </td>
            <td>
                <input type="checkbox" name="m_idekonek" value="1" class="main" <?php if($m_idekonek == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Fan Header
            </td>
            <td>
                <input type="checkbox" name="m_cpufan" value="1" class="main" <?php if($m_cpufan == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                System Fan Header
            </td>
            <td>
                <input type="checkbox" name="m_sysfan" value="1" class="main" <?php if($m_sysfan == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Front Panel Header
            </td>
            <td>
                <input type="checkbox" name="m_fpanelh" value="1" class="main" <?php if($m_fpanelh == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Front Panel Audio Header
            </td>
            <td>
                <input type="checkbox" name="m_fpanelah" value="1" class="main" <?php if($m_fpanelah == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CD In Connector
            </td>
            <td>
                <input type="checkbox" name="m_cdinkonek" value="1" class="main" <?php if($m_cdinkonek == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                S/ PDIF Out Header
            </td>
            <td>
                <input type="checkbox" name="m_spdif" value="1" class="main" <?php if($m_spdif == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                USB 2.0
            </td>
            <td>
                <input type="checkbox" name="m_usb2" value="1" class="main" <?php if($m_usb2 == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Chassis Intrusion Header
            </td>
            <td>
                <input type="checkbox" name="m_chassisin" value="1" class="main" <?php if($m_chassisin == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
            <td></td><td></td>
            <td>
                Power LED Header
            </td>
            <td>
                <input type="checkbox" name="m_powerled" value="1" class="main" <?php if($m_powerled == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PS/2 Keyboard Port
            </td>
            <td>
                <input type="checkbox" name="m_ps2key" value="1" class="main" <?php if($m_ps2key == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                PS/2 Mouse Port
            </td>
            <td>
                <input type="checkbox" name="m_ps2mou" value="1" class="main" <?php if($m_ps2mou == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Parallel Port
            </td>
            <td>
                <input type="checkbox" name="m_paraport" value="1" class="main" <?php if($m_paraport == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Serial Port
            </td>
            <td>
                <input type="checkbox" name="m_seriport" value="1" class="main" <?php if($m_seriport == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Display Port
            </td>
            <td>
                <input type="checkbox" name="m_displayport" value="1" class="main" <?php if($m_displayport == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                Back Panel USB 2.0
            </td>
            <td>
                <input type="checkbox" name="m_busb2" value="1" class="main" <?php if($m_busb2 == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                System Voltage Detection
            </td>
            <td>
                <input type="checkbox" name="m_sysvoltdetec" value="1" class="main" <?php if($m_sysvoltdetec == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Temperature Detection
            </td>
            <td>
                <input type="checkbox" name="m_cputempdetec" value="1" class="main" <?php if($m_cputempdetec == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU/ System Fan Fail Warning
            </td>
            <td>
                <input type="checkbox" name="m_cpusysfail" value="1" class="main" <?php if($m_cpusysfail == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                CPU Fan Speed Control
            </td>
            <td>
                <input type="checkbox" name="m_cpufansp" value="1" class="main" <?php if($m_cpufansp == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td></td>
            <td>
                BIOS
            </td>
            <td>
                <input type="checkbox" name="m_bios" value="1" class="main" <?php if($m_bios == 1) { echo 'checked';}?>>
            </td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_ko" class="form-control" id="kd_ko" value="<?php echo $kd_ko;?>">
            <button type="submit" class="btn btn-success">Pilih Komponen</button>
            </td>
            <td>
            <a href="<?php echo site_url('komponen')?>" class="btn btn-danger">Batal</a>
            </td>
        </tr>
    </table>
    </form>
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
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script>
        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_casing").click(function () {
            $('.casing').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".casing").click(function(){

        if($(".casing").length == $(".casing:checked").length) {
            $("#select_casing").attr("checked", "checked");
        } else {
            $("#select_casing").removeAttr("checked");
        }

        });
        });

        $(function(){
 
         // add multiple select / deselect functionality
        $("#select_main").click(function () {
             $('.main').attr('checked', this.checked);
        });

         // if all checkbox are selected, check the selectall checkbox
        // and viceversa
         $(".main").click(function(){

        if($(".main").length == $(".main:checked").length) {
             $("#select_main").attr("checked", "checked");
        } else {
             $("#select_main").removeAttr("checked");
        }

         });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_hard").click(function () {
            $('.hard').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".hard").click(function(){

        if($(".hard").length == $(".hard:checked").length) {
            $("#select_hard").attr("checked", "checked");
        } else {
            $("#select_hard").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_ram").click(function () {
            $('.ram').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".ram").click(function(){

        if($(".ram").length == $(".ram:checked").length) {
            $("#select_ram").attr("checked", "checked");
        } else {
            $("#select_ram").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_peri").click(function () {
            $('.peri').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".peri").click(function(){

        if($(".peri").length == $(".peri:checked").length) {
            $("#select_peri").attr("checked", "checked");
        } else {
            $("#select_peri").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_card").click(function () {
            $('.card').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".card").click(function(){

        if($(".card").length == $(".card:checked").length) {
            $("#select_card").attr("checked", "checked");
        } else {
            $("#select_card").removeAttr("checked");
        }

        });
        });

        $(function(){
 
        // add multiple select / deselect functionality
        $("#select_lis").click(function () {
            $('.lis').attr('checked', this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox
        // and viceversa
        $(".lis").click(function(){

        if($(".lis").length == $(".lis:checked").length) {
            $("#select_lis").attr("checked", "checked");
        } else {
            $("#select_lis").removeAttr("checked");
        }

        });
        });
    </script>
    </body>
</html>