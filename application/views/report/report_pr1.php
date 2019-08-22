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
            <th align="center">Kondisi</th>
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
                     echo '<td>'.$jam.'jam'.$menit.'menit</td>';
                    
                     $kondisi = 0;
                     $total = 0;
                     if(!empty($row->cs_cs)&&($row->cs_cs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else 
                            if(!empty($row->cs_cs)&&($row->cs_cs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_cs)&&($row->cs_cs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_ba)&&($row->cs_ba)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_ba)&&($row->cs_ba)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_ba)&&($row->cs_ba)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_saklar)&&($row->cs_saklar==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_saklar)&&($row->cs_saklar)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_saklar)&&($row->cs_saklar)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_usb)&&($row->cs_usb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_usb)&&($row->cs_usb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_usb)&&($row->cs_usb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_sound)&&($row->cs_sound)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_sound)&&($row->cs_sound)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_sound)&&($row->cs_sound)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_lampu)&&($row->cs_lampu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_lampu)&&($row->cs_lampu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_lampu)&&($row->cs_lampu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==1)
                        {$kondisi = $kondisi+10; $total = $total = $total+10;}else
                            if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_lan)&&($row->mobo_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_lan)&&($row->mobo_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_lan)&&($row->mobo_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_agp)&&($row->mobo_agp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_agp)&&($row->mobo_agp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_agp)&&($row->mobo_agp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_cpu_temp&&($row->mobo_hm_cpu_temp)==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bios)&&($row->mobo_bios)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bios)&&($row->mobo_bios)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bios)&&($row->mobo_bios)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total;}else
                            if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else  
                            if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                    if($total!=0){
                    $persentase = ($kondisi/$total)*100;
                     echo '<td>'.floor($persentase).'%</td></tr>';}else {
                        echo '<td>0%</td></tr>';
                     }
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