<html>
    <head>
        <title>Data Perawatan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">
        <script src="<?php echo base_url('assets/js/my_js.js')?>"></script>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body style="overflow:auto">
    <h2 style="margin-top:0px">Perawatan Inventaris</h2>
    <form action="<?php echo base_url().'perawatan/update_action_perawatan';?>" method="post">
    <table border="1" align="center">
        <tr>
            <td rowspan="2">No</td>
            <td rowspan="2">Golongan</td>
            <td colspan="6" rowspan="2" align="center">Spesifikasi</td>
            <td colspan="3" align="center">Kondisi</td>
        </tr>
        <tr>
            <td>&nbsp;B&nbsp;</td>
            <td>K.B</td>
            <td>&nbsp;R&nbsp;</td>
        </tr>
        <tr>
            <td rowspan="89">1</td>
            <td rowspan="89">Hardware</td>
            <td rowspan="6">1</td>
            <td rowspan="6">Casing</td>
            <td>1</td>
            <td>Casing</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcasing" value="1" <?php echo ($kcasing=='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcasing" value="2" <?php echo ($kcasing=='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcasing" value="3" <?php echo ($kcasing=='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sekrup/ baut</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kbaut" value="1" <?php echo ($kbaut=='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbaut" value="2" <?php echo ($kbaut=='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbaut" value="3" <?php echo ($kbaut=='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Kabel sakelar</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kksakelar" value="1" <?php echo ($kksakelar =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kksakelar" value="2" <?php echo ($kksakelar =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kksakelar" value="3" <?php echo ($kksakelar =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kabel ke USB</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkusb" value="1" <?php echo ($kkusb =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkusb" value="2" <?php echo ($kkusb =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkusb" value="3" <?php echo ($kkusb =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kabel ke Sound</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kksound" value="1" <?php echo ($kksound =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kksound" value="2" <?php echo ($kksound =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kksound" value="3" <?php echo ($kksound =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Kabel ke Lampu Indikator</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kklamp" value="1" <?php echo ($kklamp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kklamp" value="2" <?php echo ($kklamp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kklamp" value="3" <?php echo ($kklamp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="47">2</td>
            <td rowspan="47">Mainboard</td>
            <td>1</td>
            <td>CPU</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcpu" value="1" <?php echo ($kcpu =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcpu" value="2" <?php echo ($kcpu =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcpu" value="3" <?php echo ($kcpu =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>FSB</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kfsb" value="1" <?php echo ($kfsb =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kfsb" value="2" <?php echo ($kfsb =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kfsb" value="3" <?php echo ($kfsb =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Chipset</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kchip" value="1" <?php echo ($kchip =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kchip" value="2" <?php echo ($kchip =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khcip" value="3" <?php echo ($kchip =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">Memory</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kmc1" value="1" <?php echo ($kmc1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc1" value="2" <?php echo ($kmc1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc1" value="3" <?php echo ($kmc1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kmc2" value="1" <?php echo ($kmc2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc2" value="2" <?php echo ($kmc2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmc2" value="3" <?php echo ($kmc2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>On Board Graphics</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="konboard" value="1" <?php echo ($konboard =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="konboard" value="2" <?php echo ($konboard =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="konboard" value="3" <?php echo ($konboard =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">6</td>
            <td rowspan="2">Audio</td>
            <td>In</td>
            <td></td>
            <td><input type="radio" name="kain" value="1" <?php echo ($kain =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kain" value="2" <?php echo ($kain =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kain" value="3" <?php echo ($kain =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Out</td>
            <td></td>
            <td><input type="radio" name="kaout" value="1" <?php echo ($kaout =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kaout" value="2" <?php echo ($kaout =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kaout" value="3" <?php echo ($kaout =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>7</td>
            <td>LAN</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klan" value="1" <?php echo ($klan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="2" <?php echo ($klan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="3" <?php echo ($klan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">8</td>
            <td rowspan="4">Expansions Slots</td>
            <td rowspan="2">PCI Express 16 Slot</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kepcie1" value="1" <?php echo ($kepcie1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie1" value="2" <?php echo ($kepcie1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie1" value="3" <?php echo ($kepcie1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kepcie2" value="1" <?php echo ($kepcie2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie2" value="2" <?php echo ($kepcie2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepcie2" value="3" <?php echo ($kepcie2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>PCI Express 1 Slot</td>
            <td></td>
            <td><input type="radio" name="kepci1" value="1" <?php echo ($kepci1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kepci1" value="2" <?php echo ($kepci1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kepci1" value="3" <?php echo ($kepci1 =='1')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>AGP</td>
            <td></td>
            <td><input type="radio" name="keagp" value="1" <?php echo ($keagp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="keagp" value="2" <?php echo ($keagp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="keagp" value="3" <?php echo ($keagp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">9</td>
            <td rowspan="5">Storage Interface</td>
            <td>IDE</td>
            <td></td>
            <td><input type="radio" name="ksiide" value="1" <?php echo ($ksiide =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksiide" value="2" <?php echo ($ksiide =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksiide" value="3" <?php echo ($ksiide =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">SATA</td>
            <td> Channel 1</td>
            <td><input type="radio" name="ksatac1" value="1" <?php echo ($ksatac1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac1" value="2" <?php echo ($ksatac1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac1" value="3" <?php echo ($ksatac1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 2</td>
            <td><input type="radio" name="ksatac2" value="1" <?php echo ($ksatac2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac2" value="2" <?php echo ($ksatac2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac2" value="3" <?php echo ($ksatac2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 3</td>
            <td><input type="radio" name="ksatac3" value="1" <?php echo ($ksatac3 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac3" value="2" <?php echo ($ksatac3 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac3" value="3" <?php echo ($ksatac3 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td> Channel 4</td>
            <td><input type="radio" name="ksatac4" value="1" <?php echo ($ksatac4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac4" value="2" <?php echo ($ksatac4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac4" value="3" <?php echo ($ksatac4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">10</td>
            <td rowspan="2">USB</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kusb1" value="1" <?php echo ($kusb1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb1" value="2" <?php echo ($kusb1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb1" value="3" <?php echo ($kusb1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kusb2" value="1" <?php echo ($kusb2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb2" value="2" <?php echo ($kusb2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kusb2" value="3" <?php echo ($kusb2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="13">11</td>
            <td rowspan="13">Internal Connectors</td>
            <td>24 pin ATX Main Power Connector</td>
            <td></td>
            <td><input type="radio" name="kic24" value="1" <?php echo ($kic24 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kic24" value="2" <?php echo ($kic24 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kic24" value="3" <?php echo ($kic24 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4 pin ATX 12V Power Connector</td>
            <td></td>
            <td><input type="radio" name="kic4" value="1" <?php echo ($kic4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kic4" value="2" <?php echo ($kic4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kic4" value="3" <?php echo ($kic4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>IDE Connector</td>
            <td></td>
            <td><input type="radio" name="kicide" value="1" <?php echo ($kicide =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicide" value="2" <?php echo ($kicide =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicide" value="3" <?php echo ($kicide =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Fan Header</td>
            <td></td>
            <td><input type="radio" name="kicfan" value="1" <?php echo ($kicfan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfan" value="2" <?php echo ($kicfan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfan" value="3" <?php echo ($kicfan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>System Fan Header</td>
            <td></td>
            <td><input type="radio" name="kicsysfan" value="1" <?php echo ($kicsysfan =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicsysfan" value="2" <?php echo ($kicsysfan =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicsysfan" value="3" <?php echo ($kicsysfan =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Front Panel Header</td>
            <td></td>
            <td><input type="radio" name="kicfpanhead" value="1" <?php echo ($kicfpanhead =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanhead" value="2" <?php echo ($kicfpanhead =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanhead" value="3" <?php echo ($kicfpanhead =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Front Panel Audio Header</td>
            <td></td>
            <td><input type="radio" name="kicfpanahead" value="1" <?php echo ($kicfpanahead =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanahead" value="2" <?php echo ($kicfpanahead =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicfpanahead" value="3" <?php echo ($kicfpanahead =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CD In Connector</td>
            <td></td>
            <td><input type="radio" name="kiccdcon" value="1" <?php echo ($kiccdcon =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccdcon" value="2" <?php echo ($kiccdcon =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccdcon" value="3" <?php echo ($kiccdcon =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>S/ PDIF Out Header</td>
            <td></td>
            <td><input type="radio" name="kicspdif" value="1" <?php echo ($kicspdif =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicspdif" value="2" <?php echo ($kicspdif =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicspdif" value="3" <?php echo ($kicspdif =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">USB 2.0</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kicusb2c1" value="1" <?php echo ($kicusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c1" value="2" <?php echo ($kicusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c1" value="3" <?php echo ($kicusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kicusb2c2" value="1" <?php echo ($kicusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c2" value="2" <?php echo ($kicusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicusb2c2" value="3" <?php echo ($kicusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Chassis Intrusion Header</td>
            <td></td>
            <td><input type="radio" name="kiccih" value="1" <?php echo ($kiccih =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccih" value="2" <?php echo ($kiccih =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kiccih" value="3" <?php echo ($kiccih =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Power LED Header</td>
            <td></td>
            <td><input type="radio" name="kicled" value="1" <?php echo ($kicled =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kicled" value="2" <?php echo ($kicled =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kicled" value="3" <?php echo ($kicled =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="9">12</td>
            <td rowspan="9">Back Panel Connectors</td>
            <td>PS/ 2 Keyboard Port</td>
            <td></td>
            <td><input type="radio" name="kbpcps2k" value="1" <?php echo ($kbpcps2k =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2k" value="2" <?php echo ($kbpcps2k =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2k" value="3" <?php echo ($kbpcps2k =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>PS/ 2 Mouse Port</td>
            <td></td>
            <td><input type="radio" name="kbpcps2m" value="1" <?php echo ($kbpcps2m =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2m" value="2" <?php echo ($kbpcps2m =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcps2m" value="3" <?php echo ($kbpcps2m =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Parallel Port</td>
            <td></td>
            <td><input type="radio" name="kbpcplp" value="1" <?php echo ($kbpcplp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcplp" value="2" <?php echo ($kbpcplp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcplp" value="3" <?php echo ($kbpcplp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Serial Port</td>
            <td></td>
            <td><input type="radio" name="kbpcsp" value="1" <?php echo ($kbpcsp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcsp" value="2" <?php echo ($kbpcsp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcsp" value="3" <?php echo ($kbpcsp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Display Port</td>
            <td></td>
            <td><input type="radio" name="kbpcdp" value="1" <?php echo ($kbpcdp =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcdp" value="2" <?php echo ($kbpcdp =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcdp" value="3" <?php echo ($kbpcdp =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">USB 2.0</td>
            <td>Channel 1</td>
            <td><input type="radio" name="kbpcusb2c1" value="1" <?php echo ($kbpcusb2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c1" value="2" <?php echo ($kbpcusb2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c1" value="3" <?php echo ($kbpcusb2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td><input type="radio" name="kbpcusb2c2" value="1" <?php echo ($kbpcusb2c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c2" value="2" <?php echo ($kbpcusb2c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c2" value="3" <?php echo ($kbpcusb2c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 3</td>
            <td><input type="radio" name="kbpcusb2c3" value="1" <?php echo ($kbpcusb2c3 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c3" value="2" <?php echo ($kbpcusb2c3 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c3" value="3" <?php echo ($kbpcusb2c3 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 4</td>
            <td><input type="radio" name="kbpcusb2c4" value="1" <?php echo ($kbpcusb2c4 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c4" value="2" <?php echo ($kbpcusb2c4 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbpcusb2c4" value="3" <?php echo ($kbpcusb2c4 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">13</td>
            <td rowspan="4">Hardware Monitor</td>
            <td>System Voltage Dectection</td>
            <td></td>
            <td><input type="radio" name="khmsvd" value="1" <?php echo ($khmsvd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmsvd" value="2" <?php echo ($khmsvd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmsvd" value="3" <?php echo ($khmsvd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Temperature Dectection</td>
            <td></td>
            <td><input type="radio" name="khmctd" value="1" <?php echo ($khmctd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmctd" value="2" <?php echo ($khmctd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmctd" value="3" <?php echo ($khmctd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU/ System Fan Fail Warning</td>
            <td></td>
            <td><input type="radio" name="khmffw" value="1" <?php echo ($khmffw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmffw" value="2" <?php echo ($khmffw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmffw" value="3" <?php echo ($khmffw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>CPU Fan Speed Control</td>
            <td></td>
            <td><input type="radio" name="khmfsc" value="1" <?php echo ($khmfsc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="khmfsc" value="2" <?php echo ($khmfsc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="khmfsc" value="3" <?php echo ($khmfsc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>14</td>
            <td>BIOS</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kbios" value="1" <?php echo ($kbios =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kbios" value="2" <?php echo ($kbios =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kbios" value="3" <?php echo ($kbios =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="8">3</td>
            <td rowspan="8">Hard Disk</td>
            <td rowspan="2">1</td>
            <td rowspan="2">ATA</td>
            <td>HDD 1</td>
            <td></td>
            <td><input type="radio" name="katahdd1" value="1" <?php echo ($katahdd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd1" value="2" <?php echo ($katahdd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd1" value="3" <?php echo ($katahdd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>HDD 2</td>
            <td></td>
            <td><input type="radio" name="katahdd2" value="1" <?php echo ($katahdd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd2" value="2" <?php echo ($katahdd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="katahdd2" value="3" <?php echo ($katahdd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="4">2</td>
            <td rowspan="4">SATA</td>
            <td>HDD 1</td>
            <td></td>
            <td><input type="radio" name="ksatahdd1" value="1" <?php echo ($ksatahdd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd1" value="2" <?php echo ($ksatahdd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd1" value="3" <?php echo ($ksatahdd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>HDD 2</td>
            <td></td>
            <td><input type="radio" name="ksatahdd2" value="1" <?php echo ($ksatahdd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd2" value="2" <?php echo ($ksatahdd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatahdd2" value="3" <?php echo ($ksatahdd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 1</td>
            <td></td>
            <td><input type="radio" name="ksatassd1" value="1" <?php echo ($ksatassd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd1" value="2" <?php echo ($ksatassd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd1" value="3" <?php echo ($ksatassd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 2</td>
            <td></td>
            <td><input type="radio" name="ksatassd2" value="1" <?php echo ($ksatassd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd2" value="2" <?php echo ($ksatassd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatassd2" value="3" <?php echo ($ksatassd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">NVM</td>
            <td>SSD 1</td>
            <td></td>
            <td><input type="radio" name="knvmssd1" value="1" <?php echo ($knvmssd1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd1" value="2" <?php echo ($knvmssd1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd1" value="3" <?php echo ($knvmssd1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>SSD 2</td>
            <td></td>
            <td><input type="radio" name="knvmssd2" value="1" <?php echo ($knvmssd2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd2" value="2" <?php echo ($knvmssd2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="knvmssd2" value="3" <?php echo ($knvmssd2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="8">4</td>
            <td rowspan="8">RAM</td>
            <td rowspan="2">1</td>
            <td rowspan="2">DDR 1</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd1c1" value="1" <?php echo ($kramd1c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c1" value="2" <?php echo ($kramd1c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c1" value="3" <?php echo ($kramd1c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd1c2" value="1" <?php echo ($kramd1c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c2" value="2" <?php echo ($kramd1c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd1c2" value="3" <?php echo ($kramd1c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">DDR 2</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd2c1" value="1" <?php echo ($kramd2c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c1" value="2" <?php echo ($kramd2c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c1" value="3" <?php echo ($kramd2c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd2c2" value="1" <?php echo ($kramd2c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c2" value="2" <?php echo ($kramd2c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd2c2" value="3" <?php echo ($kramd2c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">DDR 3</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd3c1" value="1" <?php echo ($kramd3c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c1" value="2" <?php echo ($kramd3c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c1" value="3" <?php echo ($kramd3c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd3c2" value="1" <?php echo ($kramd3c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c2" value="2" <?php echo ($kramd3c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd3c2" value="3" <?php echo ($kramd3c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">DDR 4</td>
            <td>Channel 1</td>
            <td></td>
            <td><input type="radio" name="kramd4c1" value="1" <?php echo ($kramd4c1 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c1" value="2" <?php echo ($kramd4c1 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c1" value="3" <?php echo ($kramd4c1 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>Channel 2</td>
            <td></td>
            <td><input type="radio" name="kramd4c2" value="1" <?php echo ($kramd4c2 =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c2" value="2" <?php echo ($kramd4c2 =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kramd4c2" value="3" <?php echo ($kramd4c2 =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="10">5</td>
            <td rowspan="10">Peripheral</td>
            <td>1</td>
            <td>CD RW</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kcdrw" value="1" <?php echo ($kcdrw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kcdrw" value="2" <?php echo ($kcdrw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kcdrw" value="3" <?php echo ($kcdrw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>DVD RW</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kdvdrw" value="1" <?php echo ($kdvdrw =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kdvdrw" value="2" <?php echo ($kdvdrw =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kdvdrw" value="3" <?php echo ($kdvdrw =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>ATA/ IDE Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kaic" value="1" <?php echo ($kaic =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kaic" value="2" <?php echo ($kaic =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kaic" value="3" <?php echo ($kaic =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>SATA Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="ksatac" value="1" <?php echo ($ksatac =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac" value="2" <?php echo ($ksatac =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="ksatac" value="3" <?php echo ($ksatac =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Keyboard</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkey" value="1" <?php echo ($kkey =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkey" value="2" <?php echo ($kkey =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkey" value="3" <?php echo ($kkey =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Mouse</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmou" value="1" <?php echo ($kmou =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmou" value="2" <?php echo ($kmou =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmou" value="3" <?php echo ($kmou =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Speaker</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kspea" value="1" <?php echo ($kspea =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kspea" value="2" <?php echo ($kspea =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kspea" value="3" <?php echo ($kspea =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Monitor CRT</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmoncrt" value="1" <?php echo ($kmoncrt =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmoncrt" value="2" <?php echo ($kmoncrt =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmoncrt" value="3" <?php echo ($kmoncrt =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>9</td>
            <td>Monitor LCD</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kmonlcd" value="1" <?php echo ($kmonlcd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kmonlcd" value="2" <?php echo ($kmonlcd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kmonlcd" value="3" <?php echo ($kmonlcd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>10</td>
            <td>VGA Cable</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kvgac" value="1" <?php echo ($kvgac =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgac" value="2" <?php echo ($kvgac =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgac" value="3" <?php echo ($kvgac =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">6</td>
            <td rowspan="5">Card</td>
            <td>1</td>
            <td>LAN Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klanc" value="1" <?php echo ($klanc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="2" <?php echo ($klanc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klan" value="3" <?php echo ($klanc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>VGA Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kvgacrd" value="1" <?php echo ($kvgacrd =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgacrd" value="2" <?php echo ($kvgacrd =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kvgacrd" value="3" <?php echo ($kvgacrd =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Firewire Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kfirec" value="1" <?php echo ($kfirec =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kfirec" value="2" <?php echo ($kfirec =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kfirec" value="3" <?php echo ($kfirec =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>LPT Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="klptc" value="1" <?php echo ($klptc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="klptc" value="2" <?php echo ($klptc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="klptc" value="3" <?php echo ($klptc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>RS 232 Card</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="krsc" value="1" <?php echo ($krsc =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="krsc" value="2" <?php echo ($krsc =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="krsc" value="3" <?php echo ($krsc =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td rowspan="5">7</td>
            <td rowspan="5">Kelistrikan</td>
            <td>1</td>
            <td>Power Supply</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kpwrs" value="1" <?php echo ($kpwrs =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kpwrs" value="2" <?php echo ($kpwrs =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kpwrs" value="3" <?php echo ($kpwrs =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Kabel Power</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwr" value="1" <?php echo ($kkpwr =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwr" value="2" <?php echo ($kkpwr =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwr" value="3" <?php echo ($kkpwr =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Kabel Power Monitor</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwrmon" value="1" <?php echo ($kkpwrmon =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrmon" value="2" <?php echo ($kkpwrmon =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrmon" value="3" <?php echo ($kkpwrmon =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kabel Power SATA</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkpwrsata" value="1" <?php echo ($kkpwrsata =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrsata" value="2" <?php echo ($kkpwrsata =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkpwrsata" value="3" <?php echo ($kkpwrsata =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kabel Molex Power</td>
            <td></td>
            <td></td>
            <td><input type="radio" name="kkmolpwr" value="1" <?php echo ($kkmolpwr =='1')?'checked':'' ?>></td>
            <td><input type="radio" name="kkmolpwr" value="2" <?php echo ($kkmolpwr =='2')?'checked':'' ?>></td>
            <td><input type="radio" name="kkmolpwr" value="3" <?php echo ($kkmolpwr =='3')?'checked':'' ?>></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                Keterangan
            </td>
            <td colspan="7">
                <textarea name="ket" style="width: 674.5px; height: 80px;" ><?php echo $ket;?></textarea>
            </td>
        </tr>
       
    </table>
    <table align="center">
        <tr>
            <td>
            <input type="hidden" name="kd_jd" class="form-control" id="kd_jd" value="<?php echo $kd_jd;?>">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            </td>
            <td>
            <a href="<?php echo site_url('perawatan')?>" class="btn btn-default">Batal</a>
            </td>
        </tr>
    </table>
    </body>
</html>