<?php
class Perawatan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
            $this->load->model('M_perawatan');
            $this->load->model('M_perbaikan');
            $this->load->model('M_jadwal');
        } else {
            echo "Silahkan Login Terlebih Dahulu";
            // print_r($_SESSION); 
            echo redirect(base_url('../'));
        }
    }

    public function index(){
        $data['inv_perawatan'] = $this->M_perawatan->get_data_jd();
        $this->load->view('perawatan/perawatan',$data);
    }
    function create(){
        $data['gki'] = $this->M_perawatan->get_kdinv();
        $this->load->view('perawatan/perawatan_form', $data);
    }
    function create_action(){
        $data = array(
            'vc_no_inv' => $this->input->post('vc_no_inv', TRUE),
            'dt_mulai' => $this->input->post('dt_mulai', TRUE),
            'dt_selesai' => $this->input->post('dt_selesai', TRUE),
            'vc_nm_tindakan' => $this->input->post('vc_nm_tindakan', TRUE)
        );

        $this->M_perawatan->insert($data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect(site_url('Perawatan'));
    }

    function komponen(){
        
        $id = $this->input->post('kd_jd', TRUE);
        $s = $this->M_perawatan->get_by_id_komp($id);
        $row = $this->M_perawatan->get_by_id_jd($id);
        if(($row->j_valid) == 0){
        if($s->cek==1){
            $this->update_komponen($id);
        }else{
         if($id==NULL){ 
             $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ditemukan');
             redirect(base_url('Jadwal'));
        }else{
        $row = $this->M_perawatan->get_by_id_komp($id);
        if($row) {
            $data = array(
                'kd_jd_ko' => set_value('kd_jd_ko', $row->kd_jd_ko)
            );
        $this->load->view('perawatan/perawatan_form_pilih', $data);
            }
        }
        }
        }else{
            redirect(base_url('Jadwal'));
        }
    }

    function update_k($id){
        $row = $this->M_perawatan->get_by_id_jd($id);
        if(($row->j_valid) == 0){
        $s = $this->M_perawatan->get_by_id_komp($id);
        if($s->cek==1){
            $this->update_komponen($id);
        }else{
         if($id==NULL){ 
             $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ditemukan');
             redirect(base_url('Jadwal'));
        }else{
        $row = $this->M_perawatan->get_by_id_komp($id);
        if($row) {
            $data = array(
                'kd_jd_ko' => set_value('kd_jd_ko', $row->kd_jd_ko)
            );
        $this->load->view('perawatan/perawatan_form_pilih', $data);
            }
        }
        }
    }else{redirect(base_url('Perawatan'));}
    }
    

    function set_data_komponen(){
        $data = array(
            'c_casing' => $this->input->post('c_casing', TRUE),
            'm_cpu' => $this->input->post('m_cpu', TRUE),
            'h_ata' => $this->input->post('h_ata', TRUE),
            'r_ddr1' => $this->input->post('r_ddr1', TRUE),
            'p_cdrw' => $this->input->post('p_cdrw', TRUE),
            'cr_lancard' => $this->input->post('cr_lancard', TRUE),
            'l_powersupply' => $this->input->post('l_powersupply', TRUE),
            'c_sekrup' => $this->input->post('c_sekrup', TRUE),
            'm_fsb' => $this->input->post('m_fsb', TRUE),
            'h_satah' => $this->input->post('h_satah', TRUE),
            'r_ddr2' => $this->input->post('r_ddr2', TRUE),
            'p_dvdrw' => $this->input->post('p_dvdrw', TRUE),
            'cr_vgacard' => $this->input->post('cr_vgacard', TRUE),
            'l_kabelpower' => $this->input->post('l_kabelpower', TRUE),
            'c_ksakelar' => $this->input->post('c_ksakelar', TRUE),
            'm_chipset' => $this->input->post('m_chipset', TRUE),
            'h_satas' => $this->input->post('h_satas', TRUE),
            'r_ddr3' => $this->input->post('r_ddr3', TRUE),
            'p_atakabel' => $this->input->post('p_atakabel', TRUE),
            'cr_firecard' => $this->input->post('cr_firecard', TRUE),
            'l_kabelpowermon' => $this->input->post('l_kabelpowermon', TRUE),
            'c_kusb' => $this->input->post('c_kusb', TRUE),
            'm_memory' => $this->input->post('m_memory', TRUE),
            'h_nvm' => $this->input->post('h_nvm', TRUE),
            'r_ddr4' => $this->input->post('r_ddr4', TRUE),
            'p_satakabel' => $this->input->post('p_satakabel', TRUE),
            'cr_lptcard' => $this->input->post('cr_lptcard', TRUE),
            'l_kabelpowersata' => $this->input->post('l_kabelpowersata', TRUE),
            'c_ksound' => $this->input->post('c_ksound', TRUE),
            'm_onboardg' => $this->input->post('m_onboardg', TRUE),
            'p_keyboard' => $this->input->post('p_keyboard', TRUE),
            'cr_rs232card' => $this->input->post('cr_rs232card', TRUE),
            'l_kabelmolexpow' => $this->input->post('l_kabelmolexpow', TRUE),
            'c_klampu' => $this->input->post('c_klampu', TRUE),
            'm_audio' => $this->input->post('m_audio', TRUE),
            'p_mouse' => $this->input->post('p_mouse', TRUE),
            'm_lan' => $this->input->post('m_lan', TRUE),
            'p_speaker' => $this->input->post('p_speaker', TRUE),
            'm_pcie16' => $this->input->post('m_pcie16', TRUE),
            'p_monitorcrt' => $this->input->post('p_monitorcrt', TRUE),
            'm_pcie1' => $this->input->post('m_pcie1', TRUE),
            'p_monitorlcd' => $this->input->post('p_monitorlcd', TRUE),
            'm_agp' => $this->input->post('m_agp', TRUE),
            'p_vgakabel' => $this->input->post('p_vgakabel', TRUE),
            'm_ide' => $this->input->post('m_ide', TRUE),
            'm_sata' => $this->input->post('m_sata', TRUE),
            'm_usb' => $this->input->post('m_usb', TRUE),
            'm_12pmain' => $this->input->post('m_12pmain', TRUE),
            'm_4p12v' => $this->input->post('m_4p12v', TRUE),
            'm_idekonek' => $this->input->post('m_idekonek', TRUE),
            'm_cpufan' => $this->input->post('m_cpufan', TRUE),
            'm_sysfan' => $this->input->post('m_sysfan', TRUE),
            'm_fpanelh' => $this->input->post('m_fpanelh', TRUE),
            'm_fpanelah' => $this->input->post('m_fpanelah', TRUE),
            'm_cdinkonek' => $this->input->post('m_cdinkonek', TRUE),
            'm_spdif' => $this->input->post('m_spdif', TRUE),
            'm_usb2' => $this->input->post('m_usb2', TRUE),
            'm_chassisin' => $this->input->post('m_chassisin', TRUE),
            'm_powerled' => $this->input->post('m_powerled', TRUE),
            'm_ps2key' => $this->input->post('m_ps2key', TRUE),
            'm_ps2mou' => $this->input->post('m_ps2mou', TRUE),
            'm_paraport' => $this->input->post('m_paraport', TRUE),
            'm_seriport' => $this->input->post('m_seriport', TRUE),
            'm_displayport' => $this->input->post('m_displayport', TRUE),
            'm_busb2' => $this->input->post('m_busb2', TRUE),
            'm_sysvoltdetec' => $this->input->post('m_sysvoltdetec', TRUE),
            'm_cputempdetec' => $this->input->post('m_cputempdetec', TRUE),
            'm_cpusysfail' => $this->input->post('m_cpusysfail', TRUE),
            'm_cpufansp' => $this->input->post('m_cpufansp', TRUE),
            'm_bios' => $this->input->post('m_bios', TRUE),
            'cek'=> 1
        );
        $this->M_perawatan->update_komponen($this->input->post('kd_jd_ko', TRUE), $data);
        $id = $this->input->post('kd_jd_ko', TRUE);
        $this->update_komponen($id);
        // redirect(base_url('perawatan/update_komponen', $id));
    }

    function update_komponen($id){

        $row = $this->M_perawatan->get_by_id_komp($id);
        $rows = $this->M_perawatan->get_by_id_jd($id);
        if ($rows->wtm != Null) {
            if ($row) {
                $data = array(
            'c_casing' => set_value('c_casing', $row->c_casing),
            'm_cpu' => set_value('m_cpu', $row->m_cpu),
            'h_ata' => set_value('h_ata', $row->h_ata),
            'r_ddr1' => set_value('r_ddr1', $row->r_ddr1),
            'p_cdrw' => set_value('p_cdrw', $row->p_cdrw),
            'cr_lancard' => set_value('cr_lancard', $row->cr_lancard),
            'l_powersupply' => set_value('l_powersupply', $row->l_powersupply),
            'c_sekrup' => set_value('c_sekrup', $row->c_sekrup),
            'm_fsb' => set_value('m_fsb', $row->m_fsb),
            'h_satah' => set_value('h_satah', $row->h_satah),
            'r_ddr2' => set_value('r_ddr2', $row->r_ddr2),
            'p_dvdrw' => set_value('p_dvdrw', $row->p_dvdrw),
            'cr_vgacard' => set_value('cr_vgacard', $row->cr_vgacard),
            'l_kabelpower' => set_value('l_kabelpower', $row->l_kabelpower),
            'c_ksakelar' => set_value('c_ksakelar', $row->c_ksakelar),
            'm_chipset' => set_value('m_chipset', $row->m_chipset),
            'h_satas' => set_value('h_satas', $row->h_satas),
            'r_ddr3' => set_value('r_ddr3', $row->r_ddr3),
            'p_atakabel' => set_value('p_atakabel', $row->p_atakabel),
            'cr_firecard' => set_value('cr_firecard', $row->cr_firecard),
            'l_kabelpowermon' => set_value('l_kabelpowermon', $row->l_kabelpowermon),
            'c_kusb' => set_value('c_kusb', $row->c_kusb),
            'm_memory' => set_value('m_memory', $row->m_memory),
            'h_nvm' => set_value('h_nvm', $row->h_nvm),
            'r_ddr4' => set_value('r_ddr4', $row->r_ddr4),
            'p_satakabel' => set_value('p_satakabel', $row->p_satakabel),
            'cr_lptcard' => set_value('cr_lptcard', $row->cr_lptcard),
            'l_kabelpowersata' => set_value('l_kabelpowersata', $row->l_kabelpowersata),
            'c_ksound' => set_value('c_ksound', $row->c_ksound),
            'm_onboardg' => set_value('m_onboardg', $row->m_onboardg),
            'p_keyboard' => set_value('p_keyboard', $row->p_keyboard),
            'cr_rs232card' => set_value('cr_rs232card', $row->cr_rs232card),
            'l_kabelmolexpow' => set_value('l_kabelmolexpow', $row->l_kabelmolexpow),
            'c_klampu' => set_value('c_klampu', $row->c_klampu),
            'm_audio' => set_value('m_audio', $row->m_audio),
            'p_mouse' => set_value('p_mouse', $row->p_mouse),
            'm_lan' => set_value('m_lan', $row->m_lan),
            'p_speaker' => set_value('p_speaker', $row->p_speaker),
            'm_pcie16' => set_value('m_pcie16', $row->m_pcie16),
            'p_monitorcrt' => set_value('p_monitorcrt', $row->p_monitorcrt),
            'm_pcie1' => set_value('m_pcie1', $row->m_pcie1),
            'p_monitorlcd' => set_value('p_monitorlcd', $row->p_monitorlcd),
            'm_agp' => set_value('m_agp', $row->m_agp),
            'p_vgakabel' => set_value('p_vgakabel', $row->p_vgakabel),
            'm_ide' => set_value('m_ide', $row->m_ide),
            'm_sata' => set_value('m_sata', $row->m_sata),
            'm_usb' => set_value('m_usb', $row->m_usb),
            'm_12pmain' => set_value('m_12pmain', $row->m_12pmain),
            'm_4p12v' => set_value('m_4p12v', $row->m_4p12v),
            'm_idekonek' => set_value('m_idekonek', $row->m_idekonek),
            'm_cpufan' => set_value('m_cpufan', $row->m_cpufan),
            'm_sysfan' => set_value('m_sysfan', $row->m_sysfan),
            'm_fpanelh' => set_value('m_fpanelh', $row->m_fpanelh),
            'm_fpanelah' => set_value('m_fpanelah', $row->m_fpanelah),
            'm_cdinkonek' => set_value('m_cdinkonek', $row->m_cdinkonek),
            'm_spdif' => set_value('m_spdif', $row->m_spdif),
            'm_usb2' => set_value('m_usb2', $row->m_usb2),
            'm_chassisin' => set_value('m_chassisin', $row->m_chassisin),
            'm_powerled' => set_value('m_powerled', $row->m_powerled),
            'm_ps2key' => set_value('m_ps2key', $row->m_ps2key),
            'm_ps2mou' => set_value('m_ps2mou', $row->m_ps2mou),
            'm_paraport' => set_value('m_paraport', $row->m_paraport),
            'm_seriport' => set_value('m_seriport', $row->m_seriport),
            'm_displayport' => set_value('m_displayport', $row->m_displayport),
            'm_busb2' => set_value('m_busb2', $row->m_busb2),
            'm_sysvoltdetec' => set_value('m_sysvoltdetec', $row->m_sysvoltdetec),
            'm_cputempdetec' => set_value('m_cputempdetec', $row->m_cputempdetec),
            'm_cpusysfail' => set_value('m_cpusysfail', $row->m_cpusysfail),
            'm_cpufansp' => set_value('m_cpufansp', $row->m_cpufansp),
            'm_bios' => set_value('m_bios', $row->m_bios),
            'kd_jd_ko' => set_value('kd_jd_ko', $row->kd_jd),
            'kd_inv' => set_value('kd_inv', $row->kd_inv),
            'kd_ruang' => set_value('kd_ruang', $row->kd_ruang),
            
                'kcasing' => set_value('kcasing', $rows->cs_cs),
                'kbaut' => set_value('kbaut', $rows->cs_ba),
                'kksakelar' => set_value('kksakelar', $rows->cs_saklar),
                'kkusb' => set_value('kkusb', $rows->cs_usb),
                'kksound' => set_value('kksound', $rows->cs_sound),
                'kklamp' => set_value('kklamp', $rows->cs_lampu),
                'kcpu' => set_value('kcpu', $rows->mobo_cpu),
                'kfsb' => set_value('kfsb', $rows->mobo_fsb),
                'kchip' => set_value('kchip', $rows->mobo_chipset),
                'kmc1' => set_value('kmc1', $rows->mobo_ram_c1),
                'kmc2' => set_value('kmc2', $rows->mobo_ram_c2),
                'konboard' => set_value('konboard', $rows->mobo_ob_graphic),
                'kain' => set_value('kain', $rows->mobo_audio_in),
                'kaout' => set_value('kaout', $rows->mobo_audio_out),
                'klan' => set_value('klan', $rows->mobo_lan),
                'kepcie1' => set_value('kepcie1', $rows->mobo_es_pci16_c1),
                'kepcie2' => set_value('kepcie2', $rows->mobo_es_pci16_c2),
                'kepci1' => set_value('kepci1', $rows->mobo_es_pci1),
                'keagp' => set_value('keagp', $rows->mobo_agp),
                'ksiide' => set_value('ksiide', $rows->mobo_hdd_ide),
                'ksatac1' => set_value('ksatac1', $rows->mobo_hdd_sata_c1),
                'ksatac2' => set_value('ksatac2', $rows->mobo_hdd_sata_c2),
                'ksatac3' => set_value('ksatac3', $rows->mobo_hdd_sata_c3),
                'ksatac4' => set_value('ksatac4', $rows->mobo_hdd_sata_c4),
                'kusb1' => set_value('kusb1', $rows->mobo_usb_c1),
                'kusb2' => set_value('kusb2', $rows->mobo_usb_c2),
                'kic24' => set_value('kic24', $rows->mobo_ic_main),
                'kic4' => set_value('kic4', $rows->mobo_ic_power),
                'kicide' => set_value('kicide', $rows->mobo_ic_ide),
                'kicfan' => set_value('kicfan', $rows->mobo_ic_cpu_fan),
                'kicsysfan' => set_value('kicsysfan', $rows->mobo_ic_sys_fan),
                'kicfpanhead' => set_value('kicfpanhead', $rows->mobo_ic_fp),
                'kicfpanahead' => set_value('kicfpanahead', $rows->mobo_ic_fp_audio),
                'kiccdcon' => set_value('kiccdcon', $rows->mobo_ic_cd),
                'kicspdif' => set_value('kicspdif', $rows->mobo_ic_pdif),
                'kicusb2c1' => set_value('kicusb2c1', $rows->mobo_ic_usb2_c1),
                'kicusb2c2' => set_value('kicusb2c2', $rows->mobo_ic_usb2_c2),
                'kiccih' => set_value('kiccih', $rows->mobo_ic_chasis),
                'kicled' => set_value('kicled', $rows->mobo_ic_powerled),
                'kbpcps2k' => set_value('kbpcps2k', $rows->mobo_bp_ps2_key),
                'kbpcps2m' => set_value('kbpcps2m', $rows->mobo_bp_ps2_mo),
                'kbpcplp' => set_value('kbpcplp', $rows->mobo_bp_parallel),
                'kbpcsp' => set_value('kbpcsp', $rows->mobo_bp_serial),
                'kbpcdp' => set_value('kbpcdp', $rows->mobo_bp_display),
                'kbpcusb2c1' => set_value('kbpcusb2c1', $rows->mobo_bp_usb2_c1),
                'kbpcusb2c2' => set_value('kbpcusb2c2', $rows->mobo_bp_usb2_c2),
                'kbpcusb2c3' => set_value('kbpcusb2c3', $rows->mobo_bp_usb2_c3),
                'kbpcusb2c4' => set_value('kbpcusb2c4', $rows->mobo_bp_usb2_c4),
                'khmsvd' => set_value('khmsvd', $rows->mobo_hm_svd),
                'khmctd' => set_value('khmctd', $rows->mobo_hm_cpu_temp),
                'khmffw' => set_value('khmffw', $rows->mobo_hm_fail),
                'khmfsc' => set_value('khmfsc', $rows->mobo_hm_fan),
                'kbios' => set_value('kbios', $rows->mobo_bios),
                'katahdd1' => set_value('katahdd1', $rows->mobo_ata_hdd1),
                'katahdd2' => set_value('katahdd2', $rows->mobo_ata_hdd2),
                'ksatahdd1' => set_value('ksatahdd1', $rows->mobo_sata_hdd1),
                'ksatahdd2' => set_value('ksatahdd2', $rows->mobo_sata_hdd2),
                'ksatassd1' => set_value('ksatassd1', $rows->mobo_sata_ssd1),
                'ksatassd2' => set_value('ksatassd2', $rows->mobo_sata_ssd2),
                'knvmssd1' => set_value('knvmssd1', $rows->mobo_nvm_ssd1),
                'knvmssd2' => set_value('knvmssd2', $rows->mobo_nvm_ssd2),
                'kramd1c1' => set_value('kramd1c1', $rows->hw_ram_ddr1_c1),
                'kramd1c2' => set_value('kramd1c2', $rows->hw_ram_ddr1_c2),
                'kramd2c1' => set_value('kramd2c1', $rows->hw_ram_ddr2_c1),
                'kramd2c2' => set_value('kramd2c2', $rows->hw_ram_ddr2_c2),
                'kramd3c1' => set_value('kramd3c1', $rows->hw_ram_ddr3_c1),
                'kramd3c2' => set_value('kramd3c2', $rows->hw_ram_ddr3_c2),
                'kramd4c1' => set_value('kramd4c1', $rows->hw_ram_ddr4_c1),
                'kramd4c2' => set_value('kramd4c2', $rows->hw_ram_ddr4_c2),
                'kcdrw' => set_value('kcdrw', $rows->hw_pp_cd),
                'kdvdrw' => set_value('kdvdrw', $rows->hw_pp_dvd),
                'kaic' => set_value('kaic', $rows->hw_pp_aic),
                'ksatac' => set_value('ksatac', $rows->hw_pp_satac),
                'kkey' => set_value('kkey', $rows->hw_pp_key),
                'kmou' => set_value('kmou', $rows->hw_pp_mo),
                'kspea' => set_value('kspea', $rows->hw_pp_sp),
                'kmoncrt' => set_value('kmoncrt', $rows->hw_pp_mn),
                'kmonlcd' => set_value('kmonlcd', $rows->hw_pp_lcd),
                'kvgac' => set_value('kvgac', $rows->hw_pp_vgac),
                'klanc' => set_value('klanc', $rows->hw_card_lan),
                'kvgacrd' => set_value('kvgacrd', $rows->hw_card_vga),
                'kfirec' => set_value('kfirec', $rows->hw_card_firewire),
                'klptc' => set_value('klptc', $rows->hw_card_lpt),
                'krsc' => set_value('krsc', $rows->hw_card_rs),
                'kpwrs' => set_value('kpwrs', $rows->hw_lis_ps),
                'kkpwr' => set_value('kkpwr', $rows->hw_lis_cps),
                'kkpwrmon' => set_value('kkpwrmon', $rows->hw_lis_cpm),
                'kkpwrsata' => set_value('kkpwrsata', $rows->hw_lis_cpsata),
                'kkmolpwr' => set_value('kkmolpwr', $rows->hw_lis_cmp),
                'ket_prwt' => set_value('ket', $rows->ket_prwt),
                'wtm' => set_value('wtm', $rows->wtm),
                'wts' => set_value('wts', $rows->wts),
                'kd_inv' => set_value('kd_inv', $rows->kd_inv),
                'kd_aset' => set_value('kd_aset', $rows->kd_aset)
            );
                $this->load->view('perawatan/perawatan_form_pilih_edit', $data);
            } else {
                $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
                redirect(base_url('Jadwal'));
            };
        }else{
            $this->session->set_flashdata('messages', 'Mohon Atur Waktu Mulai Perawatan');
            redirect(base_url('Jadwal'));
        }
    }
    // }

    function update($id){
        $row = $this->M_perawatan->get_by_id_jd($id);
        if (($row->j_valid) == 0) {
            $rows = $this->M_perawatan->get_by_id($id);
            if ($rows->wtm != null) {
            if ($row) {
                $data = array(
                'kcasing' => set_value('kcasing', $row->cs_cs),
                'kbaut' => set_value('kbaut', $row->cs_ba),
                'kksakelar' => set_value('kksakelar', $row->cs_saklar),
                'kkusb' => set_value('kkusb', $row->cs_usb),
                'kksound' => set_value('kksound', $row->cs_sound),
                'kklamp' => set_value('kklamp', $row->cs_lampu),
                'kcpu' => set_value('kcpu', $row->mobo_cpu),
                'kfsb' => set_value('kfsb', $row->mobo_fsb),
                'kchip' => set_value('kchip', $row->mobo_chipset),
                'kmc1' => set_value('kmc1', $row->mobo_ram_c1),
                'kmc2' => set_value('kmc2', $row->mobo_ram_c2),
                'konboard' => set_value('konboard', $row->mobo_ob_graphic),
                'kain' => set_value('kain', $row->mobo_audio_in),
                'kaout' => set_value('kaout', $row->mobo_audio_out),
                'klan' => set_value('klan', $row->mobo_lan),
                'kepcie1' => set_value('kepcie1', $row->mobo_es_pci16_c1),
                'kepcie2' => set_value('kepcie2', $row->mobo_es_pci16_c2),
                'kepci1' => set_value('kepci1', $row->mobo_es_pci1),
                'keagp' => set_value('keagp', $row->mobo_agp),
                'ksiide' => set_value('ksiide', $row->mobo_hdd_ide),
                'ksatac1' => set_value('ksatac1', $row->mobo_hdd_sata_c1),
                'ksatac2' => set_value('ksatac2', $row->mobo_hdd_sata_c2),
                'ksatac3' => set_value('ksatac3', $row->mobo_hdd_sata_c3),
                'ksatac4' => set_value('ksatac4', $row->mobo_hdd_sata_c4),
                'kusb1' => set_value('kusb1', $row->mobo_usb_c1),
                'kusb2' => set_value('kusb2', $row->mobo_usb_c2),
                'kic24' => set_value('kic24', $row->mobo_ic_main),
                'kic4' => set_value('kic4', $row->mobo_ic_power),
                'kicide' => set_value('kicide', $row->mobo_ic_ide),
                'kicfan' => set_value('kicfan', $row->mobo_ic_cpu_fan),
                'kicsysfan' => set_value('kicsysfan', $row->mobo_ic_sys_fan),
                'kicfpanhead' => set_value('kicfpanhead', $row->mobo_ic_fp),
                'kicfpanahead' => set_value('kicfpanahead', $row->mobo_ic_fp_audio),
                'kiccdcon' => set_value('kiccdcon', $row->mobo_ic_cd),
                'kicspdif' => set_value('kicspdif', $row->mobo_ic_pdif),
                'kicusb2c1' => set_value('kicusb2c1', $row->mobo_ic_usb2_c1),
                'kicusb2c2' => set_value('kicusb2c2', $row->mobo_ic_usb2_c2),
                'kiccih' => set_value('kiccih', $row->mobo_ic_chasis),
                'kicled' => set_value('kicled', $row->mobo_ic_powerled),
                'kbpcps2k' => set_value('kbpcps2k', $row->mobo_bp_ps2_key),
                'kbpcps2m' => set_value('kbpcps2m', $row->mobo_bp_ps2_mo),
                'kbpcplp' => set_value('kbpcplp', $row->mobo_bp_parallel),
                'kbpcsp' => set_value('kbpcsp', $row->mobo_bp_serial),
                'kbpcdp' => set_value('kbpcdp', $row->mobo_bp_display),
                'kbpcusb2c1' => set_value('kbpcusb2c1', $row->mobo_bp_usb2_c1),
                'kbpcusb2c2' => set_value('kbpcusb2c2', $row->mobo_bp_usb2_c2),
                'kbpcusb2c3' => set_value('kbpcusb2c3', $row->mobo_bp_usb2_c3),
                'kbpcusb2c4' => set_value('kbpcusb2c4', $row->mobo_bp_usb2_c4),
                'khmsvd' => set_value('khmsvd', $row->mobo_hm_svd),
                'khmctd' => set_value('khmctd', $row->mobo_hm_cpu_temp),
                'khmffw' => set_value('khmffw', $row->mobo_hm_fail),
                'khmfsc' => set_value('khmfsc', $row->mobo_hm_fan),
                'kbios' => set_value('kbios', $row->mobo_bios),
                'katahdd1' => set_value('katahdd1', $row->mobo_ata_hdd1),
                'katahdd2' => set_value('katahdd2', $row->mobo_ata_hdd2),
                'ksatahdd1' => set_value('ksatahdd1', $row->mobo_sata_hdd1),
                'ksatahdd2' => set_value('ksatahdd2', $row->mobo_sata_hdd2),
                'ksatassd1' => set_value('ksatassd1', $row->mobo_sata_ssd1),
                'ksatassd2' => set_value('ksatassd2', $row->mobo_sata_ssd2),
                'knvmssd1' => set_value('knvmssd1', $row->mobo_nvm_ssd1),
                'knvmssd2' => set_value('knvmssd2', $row->mobo_nvm_ssd2),
                'kramd1c1' => set_value('kramd1c1', $row->hw_ram_ddr1_c1),
                'kramd1c2' => set_value('kramd1c2', $row->hw_ram_ddr1_c2),
                'kramd2c1' => set_value('kramd2c1', $row->hw_ram_ddr2_c1),
                'kramd2c2' => set_value('kramd2c2', $row->hw_ram_ddr2_c2),
                'kramd3c1' => set_value('kramd3c1', $row->hw_ram_ddr3_c1),
                'kramd3c2' => set_value('kramd3c2', $row->hw_ram_ddr3_c2),
                'kramd4c1' => set_value('kramd4c1', $row->hw_ram_ddr4_c1),
                'kramd4c2' => set_value('kramd4c2', $row->hw_ram_ddr4_c2),
                'kcdrw' => set_value('kcdrw', $row->hw_pp_cd),
                'kdvdrw' => set_value('kdvdrw', $row->hw_pp_dvd),
                'kaic' => set_value('kaic', $row->hw_pp_aic),
                'ksatac' => set_value('ksatac', $row->hw_pp_satac),
                'kkey' => set_value('kkey', $row->hw_pp_key),
                'kmou' => set_value('kmou', $row->hw_pp_mo),
                'kspea' => set_value('kspea', $row->hw_pp_sp),
                'kmoncrt' => set_value('kmoncrt', $row->hw_pp_mn),
                'kmonlcd' => set_value('kmonlcd', $row->hw_pp_lcd),
                'kvgac' => set_value('kvgac', $row->hw_pp_vgac),
                'klanc' => set_value('klanc', $row->hw_card_lan),
                'kvgacrd' => set_value('kvgacrd', $row->hw_card_vga),
                'kfirec' => set_value('kfirec', $row->hw_card_firewire),
                'klptc' => set_value('klptc', $row->hw_card_lpt),
                'krsc' => set_value('krsc', $row->hw_card_rs),
                'kpwrs' => set_value('kpwrs', $row->hw_lis_ps),
                'kkpwr' => set_value('kkpwr', $row->hw_lis_cps),
                'kkpwrmon' => set_value('kkpwrmon', $row->hw_lis_cpm),
                'kkpwrsata' => set_value('kkpwrsata', $row->hw_lis_cpsata),
                'kkmolpwr' => set_value('kkmolpwr', $row->hw_lis_cmp),
                'ket_prwt' => set_value('ket_prwt', $row->ket_prwt),
                'status' => set_value('status', $row->status_p),
                'kd_jd' => set_value('kd_jd', $row->kd_jadwal),
                'wtm' => set_value('wtm', $row->wtm),
                'wts' => set_value('wts', $row->wts)
            );
                $this->load->view('perawatan/perawatan_form_edit', $data);
            } else {
                $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ditemukan');
                redirect(base_url('Perawatan'));
            }
        ;}else{
            $this->session->set_flashdata('messages', 'Mohon Isi Waktu Mulai Perawatan');
            redirect(base_url('Perawatan'));
        }
    }else{redirect(base_url('Perawatan'));}
    }

    function delete_row($id){
        $row = $this->M_perawatan->get_by_id_jd($id);

        if($row){
            $this->M_perawatan->delete($id);
            $this->session->set_flashdata('messages', 'Hapus Data Perawatan Berhasil');
            redirect(base_url('Perawatan'));
        }else {
            $this->session->set_flashdata('message', 'Data Perawatan Tidak Ditemukan');
            redirect(base_url('Perawatan'));
        }
    }

    function updateperawatan(){
         $id = $this->input->post('kd_jd', TRUE);
         if($id==NULL){ 
             $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ada');
             redirect(base_url('Jadwal'));
        }else{
         $row = $this->M_perawatan->get_by_id_jd($id);

         if($row){
              $data = array(
                'kd_jd'=> set_value('kd_jd', $row->kd_jadwal),
                'status' => set_value('status', $row->status_p),
                'kcasing' => set_value('kcasing', $row->cs_cs),
                'kbaut' => set_value('kbaut', $row->cs_ba),
                'kksakelar' => set_value('kksakelar', $row->cs_saklar),
                'kkusb' => set_value('kkusb', $row->cs_usb),
                'kksound' => set_value('kksound', $row->cs_sound),
                'kklamp' => set_value('kklamp', $row->cs_lampu),
                'kcpu' => set_value('kcpu', $row->mobo_cpu),
                'kfsb' => set_value('kfsb', $row->mobo_fsb),
                'kchip' => set_value('kchip', $row->mobo_chipset),
                'kmc1' => set_value('kmc1', $row->mobo_ram_c1),
                'kmc2' => set_value('kmc2', $row->mobo_ram_c2),
                'konboard' => set_value('konboard', $row->mobo_ob_graphic),
                'kain' => set_value('kain', $row->mobo_audio_in),
                'kaout' => set_value('kaout', $row->mobo_audio_out),
                'klan' => set_value('klan', $row->mobo_lan),
                'kepcie1' => set_value('kepcie1', $row->mobo_es_pci16_c1),
                'kepcie2' => set_value('kepcie2', $row->mobo_es_pci16_c2),
                'kepci1' => set_value('kepci1', $row->mobo_es_pci1),
                'keagp' => set_value('keagp', $row->mobo_agp),
                'ksiide' => set_value('ksiide', $row->mobo_hdd_ide),
                'ksatac1' => set_value('ksatac1', $row->mobo_hdd_sata_c1),
                'ksatac2' => set_value('ksatac2', $row->mobo_hdd_sata_c2),
                'ksatac3' => set_value('ksatac3', $row->mobo_hdd_sata_c3),
                'ksatac4' => set_value('ksatac4', $row->mobo_hdd_sata_c4),
                'kusb1' => set_value('kusb1', $row->mobo_usb_c1),
                'kusb2' => set_value('kusb2', $row->mobo_usb_c2),
                'kic24' => set_value('kic24', $row->mobo_ic_main),
                'kic4' => set_value('kic4', $row->mobo_ic_power),
                'kicide' => set_value('kicide', $row->mobo_ic_ide),
                'kicfan' => set_value('kicfan', $row->mobo_ic_cpu_fan),
                'kicsysfan' => set_value('kicsysfan', $row->mobo_ic_sys_fan),
                'kicfpanhead' => set_value('kicfpanhead', $row->mobo_ic_fp),
                'kicfpanahead' => set_value('kicfpanahead', $row->mobo_ic_fp_audio),
                'kiccdcon' => set_value('kiccdcon', $row->mobo_ic_cd),
                'kicspdif' => set_value('kicspdif', $row->mobo_ic_pdif),
                'kicusb2c1' => set_value('kicusb2c1', $row->mobo_ic_usb2_c1),
                'kicusb2c2' => set_value('kicusb2c2', $row->mobo_ic_usb2_c2),
                'kiccih' => set_value('kiccih', $row->mobo_ic_chasis),
                'kicled' => set_value('kicled', $row->mobo_ic_powerled),
                'kbpcps2k' => set_value('kbpcps2k', $row->mobo_bp_ps2_key),
                'kbpcps2m' => set_value('kbpcps2m', $row->mobo_bp_ps2_mo),
                'kbpcplp' => set_value('kbpcplp', $row->mobo_bp_parallel),
                'kbpcsp' => set_value('kbpcsp', $row->mobo_bp_serial),
                'kbpcdp' => set_value('kbpcdp', $row->mobo_bp_display),
                'kbpcusb2c1' => set_value('kbpcusb2c1', $row->mobo_bp_usb2_c1),
                'kbpcusb2c2' => set_value('kbpcusb2c2', $row->mobo_bp_usb2_c2),
                'kbpcusb2c3' => set_value('kbpcusb2c3', $row->mobo_bp_usb2_c3),
                'kbpcusb2c4' => set_value('kbpcusb2c4', $row->mobo_bp_usb2_c4),
                'khmsvd' => set_value('khmsvd', $row->mobo_hm_svd),
                'khmctd' => set_value('khmctd', $row->mobo_hm_cpu_temp),
                'khmffw' => set_value('khmffw', $row->mobo_hm_fail),
                'khmfsc' => set_value('khmfsc', $row->mobo_hm_fan),
                'kbios' => set_value('kbios', $row->mobo_bios),
                'katahdd1' => set_value('katahdd1', $row->mobo_ata_hdd1),
                'katahdd2' => set_value('katahdd2', $row->mobo_ata_hdd2),
                'ksatahdd1' => set_value('ksatahdd1', $row->mobo_sata_hdd1),
                'ksatahdd2' => set_value('ksatahdd2', $row->mobo_sata_hdd2),
                'ksatassd1' => set_value('ksatassd1', $row->mobo_sata_ssd1),
                'ksatassd2' => set_value('ksatassd2', $row->mobo_sata_ssd2),
                'knvmssd1' => set_value('knvmssd1', $row->mobo_nvm_ssd1),
                'knvmssd2' => set_value('knvmssd2', $row->mobo_nvm_ssd2),
                'kramd1c1' => set_value('kramd1c1', $row->hw_ram_ddr1_c1),
                'kramd1c2' => set_value('kramd1c2', $row->hw_ram_ddr1_c2),
                'kramd2c1' => set_value('kramd2c1', $row->hw_ram_ddr2_c1),
                'kramd2c2' => set_value('kramd2c2', $row->hw_ram_ddr2_c2),
                'kramd3c1' => set_value('kramd3c1', $row->hw_ram_ddr3_c1),
                'kramd3c2' => set_value('kramd3c2', $row->hw_ram_ddr3_c2),
                'kramd4c1' => set_value('kramd4c1', $row->hw_ram_ddr4_c1),
                'kramd4c2' => set_value('kramd4c2', $row->hw_ram_ddr4_c2),
                'kcdrw' => set_value('kcdrw', $row->hw_pp_cd),
                'kdvdrw' => set_value('kdvdrw', $row->hw_pp_dvd),
                'kaic' => set_value('kaic', $row->hw_pp_aic),
                'ksatac' => set_value('ksatac', $row->hw_pp_satac),
                'kkey' => set_value('kkey', $row->hw_pp_key),
                'kmou' => set_value('kmou', $row->hw_pp_mo),
                'kspea' => set_value('kspea', $row->hw_pp_sp),
                'kmoncrt' => set_value('kmoncrt', $row->hw_pp_mn),
                'kmonlcd' => set_value('kmonlcd', $row->hw_pp_lcd),
                'kvgac' => set_value('kvgac', $row->hw_pp_vgac),
                'klanc' => set_value('klanc', $row->hw_card_lan),
                'kvgacrd' => set_value('kvgacrd', $row->hw_card_vga),
                'kfirec' => set_value('kfirec', $row->hw_card_firewire),
                'klptc' => set_value('klptc', $row->hw_card_lpt),
                'krsc' => set_value('krsc', $row->hw_card_rs),
                'kpwrs' => set_value('kpwrs', $row->hw_lis_ps),
                'kkpwr' => set_value('kkpwr', $row->hw_lis_cps),
                'kkpwrmon' => set_value('kkpwrmon', $row->hw_lis_cpm),
                'kkpwrsata' => set_value('kkpwrsata', $row->hw_lis_cpsata),
                'kkmolpwr' => set_value('kkmolpwr', $row->hw_lis_cmp),
                'ket_prwt' => set_value('ket_prwt', $row->ket_prwt),
                'wtm' => set_value('wtm', $row->wtm),
                'wts' => set_value('wts', $row->wts)
              );
            $this->load->view('perawatan/perawatan_form_edit1',$data);
         }else {
             $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ditemukan');
            //  echo 'Data tidak ditemukan';
             redirect(base_url('Jadwal'));
         };
        }
    }

    function update_action_perawatan(){
        $status=3;
        $data = array(
            'cs_cs' => $this->input->post('kcasing', TRUE),
            'cs_ba' => $this->input->post('kbaut', TRUE),
            'cs_saklar' => $this->input->post('kksakelar', TRUE),
            'cs_usb' => $this->input->post('kkusb', TRUE),
            'cs_sound' => $this->input->post('kksound', TRUE),
            'cs_lampu' => $this->input->post('kklamp', TRUE),
            'mobo_cpu' => $this->input->post('kcpu', TRUE),
            'mobo_fsb' => $this->input->post('kfsb', TRUE),
            'mobo_chipset' => $this->input->post('kchip', TRUE),
            'mobo_ram_c1' => $this->input->post('kmc1', TRUE),
            'mobo_ram_c2' => $this->input->post('kmc2', TRUE),
            'mobo_ob_graphic' => $this->input->post('konboard', TRUE),
            'mobo_audio_in' => $this->input->post('kain', TRUE),
            'mobo_audio_out' => $this->input->post('kaout', TRUE),
            'mobo_lan' => $this->input->post('klan', TRUE),
            'mobo_es_pci16_c1' => $this->input->post('kepcie1', TRUE),
            'mobo_es_pci16_c2' => $this->input->post('kepcie2', TRUE),
            'mobo_es_pci1' => $this->input->post('kepci1', TRUE),
            'mobo_agp' => $this->input->post('keagp', TRUE),
            'mobo_hdd_ide' => $this->input->post('ksiide', TRUE),
            'mobo_hdd_sata_c1' => $this->input->post('ksatac1', TRUE),
            'mobo_hdd_sata_c2' => $this->input->post('ksatac2', TRUE),
            'mobo_hdd_sata_c3' => $this->input->post('ksatac3', TRUE),
            'mobo_hdd_sata_c4' => $this->input->post('ksatac4', TRUE),
            'mobo_usb_c1' => $this->input->post('kusb1', TRUE),
            'mobo_usb_c2' => $this->input->post('kusb2', TRUE),
            'mobo_ic_main' => $this->input->post('kic24', TRUE),
            'mobo_ic_power' => $this->input->post('kic4', TRUE),
            'mobo_ic_ide' => $this->input->post('kicide', TRUE),
            'mobo_ic_cpu_fan' => $this->input->post('kicfan', TRUE),
            'mobo_ic_sys_fan' => $this->input->post('kicsysfan', TRUE),
            'mobo_ic_fp' => $this->input->post('kicfpanhead', TRUE),
            'mobo_ic_fp_audio' => $this->input->post('kicfpanahead', TRUE),
            'mobo_ic_cd' => $this->input->post('kiccdcon', TRUE),
            'mobo_ic_pdif' => $this->input->post('kicspdif', TRUE),
            'mobo_ic_usb2_c1' => $this->input->post('kicusb2c1', TRUE),
            'mobo_ic_usb2_c2' => $this->input->post('kicusb2c2', TRUE),
            'mobo_ic_chasis' => $this->input->post('kiccih', TRUE),
            'mobo_ic_powerled' => $this->input->post('kicled', TRUE),
            'mobo_bp_ps2_key' => $this->input->post('kbpcps2k', TRUE),
            'mobo_bp_ps2_mo' =>$this->input->post('kbpcps2m', TRUE),
            'mobo_bp_parallel' => $this->input->post('kbpcplp', TRUE),
            'mobo_bp_serial' => $this->input->post('kbpcsp', TRUE),
            'mobo_bp_display' => $this->input->post('kbpcdp', TRUE),
            'mobo_bp_usb2_c1' => $this->input->post('kbpcusb2c1', TRUE),
            'mobo_bp_usb2_c2' => $this->input->post('kbpcusb2c2', TRUE),
            'mobo_bp_usb2_c3' => $this->input->post('kbpcusb2c3', TRUE),
            'mobo_bp_usb2_c4' => $this->input->post('kbpcusb2c4', TRUE),
            'mobo_hm_svd' => $this->input->post('khmsvd', TRUE),
            'mobo_hm_cpu_temp' => $this->input->post('khmctd', TRUE),
            'mobo_hm_fail' => $this->input->post('khmffw', TRUE),
            'mobo_hm_fan' => $this->input->post('khmfsc', TRUE),
            'mobo_bios' => $this->input->post('kbios', TRUE),
            'mobo_ata_hdd1' => $this->input->post('katahdd1', TRUE),
            'mobo_ata_hdd2' => $this->input->post('katahdd2', TRUE),
            'mobo_sata_hdd1' => $this->input->post('ksatahdd1', TRUE),
            'mobo_sata_hdd2' => $this->input->post('ksatahdd2', TRUE),
            'mobo_sata_ssd1' => $this->input->post('ksatassd1', TRUE),
            'mobo_sata_ssd2' => $this->input->post('ksatassd2', TRUE),
            'mobo_nvm_ssd1' => $this->input->post('knvmssd1', TRUE),
            'mobo_nvm_ssd2' => $this->input->post('knvmssd2', TRUE),
            'hw_ram_ddr1_c1' => $this->input->post('kramd1c1', TRUE),
            'hw_ram_ddr1_c2' => $this->input->post('kramd1c2', TRUE),
            'hw_ram_ddr2_c1' => $this->input->post('kramd2c1', TRUE),
            'hw_ram_ddr2_c2' => $this->input->post('kramd2c2', TRUE),
            'hw_ram_ddr3_c1' => $this->input->post('kramd3c1', TRUE),
            'hw_ram_ddr3_c2' => $this->input->post('kramd3c2', TRUE),
            'hw_ram_ddr4_c1' => $this->input->post('kramd4c1', TRUE),
            'hw_ram_ddr4_c2' => $this->input->post('kramd4c2', TRUE),
            'hw_pp_cd' => $this->input->post('kcdrw', TRUE),
            'hw_pp_dvd' => $this->input->post('kdvdrw', TRUE),
            'hw_pp_aic' => $this->input->post('kaic', TRUE),
            'hw_pp_satac' => $this->input->post('ksatac', TRUE),
            'hw_pp_key' => $this->input->post('kkey', TRUE),
            'hw_pp_mo' => $this->input->post('kmou', TRUE),
            'hw_pp_sp' => $this->input->post('kspea', TRUE),
            'hw_pp_mn' => $this->input->post('kmoncrt', TRUE),
            'hw_pp_lcd' => $this->input->post('kmonlcd', TRUE),
            'hw_pp_vgac' => $this->input->post('kvgac', TRUE),
            'hw_card_lan' => $this->input->post('klanc', TRUE),
            'hw_card_vga' => $this->input->post('kvgacrd', TRUE),
            'hw_card_firewire' => $this->input->post('kfirec', TRUE),
            'hw_card_lpt' => $this->input->post('klptc', TRUE),
            'hw_card_rs' => $this->input->post('krsc', TRUE),
            'hw_lis_ps' => $this->input->post('kpwrs', TRUE),
            'hw_lis_cps' => $this->input->post('kkpwr', TRUE),
            'hw_lis_cpm' => $this->input->post('kkpwrmon', TRUE),
            'hw_lis_cpsata' => $this->input->post('kkpwrsata', TRUE),
            'hw_lis_cmp' => $this->input->post('kkmolpwr', TRUE),
            'ket_prwt' => $this->input->post('ket_prwt', TRUE),
            //'status_p' => $this->input->post('status', TRUE),
            'status_p' => $status,
            'tgl_trs' => date('Y-m-d h:i:s'),
            'user_in' => $_SESSION['nmUser']
            // 'wtm' => $this->input->post('wtm', TRUE),
            // 'wts' => $this->input->post('wts', TRUE)
        );
        $color = '#00ff88';
        $datawarna = array(
            'color' => $color
        );
        if($this->input->post('kcasing')==3){
            $sparepart = 'Casing';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            // $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbaut')==3){
            $sparepart = 'Baut';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kksakelar')==3){
            $sparepart = 'Kabel Sakelar';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkusb')==3){
            $sparepart = 'Kabel ke USB';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kksound')==3){
            $sparepart = 'Kabel ke Sound';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kklamp')==3){
            $sparepart = 'Kabel ke Lampu Indikator';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kcpu')==3){
            $sparepart = 'CPU';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kfsb')==3){
            $sparepart = 'FSB';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kchip')==3){
            $sparepart = 'Chipset';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kmc1')==3){
            $sparepart = 'Memory Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kmc2')==3){
            $sparepart = 'Memory Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('konboard')==3){
            $sparepart = 'On Board Graphics';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kain')==3){
            $sparepart = 'Audio In';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kaout')==3){
            $sparepart = 'Audio Out';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('klan')==3){
            $sparepart = 'LAN';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kepcie1')==3){
            $sparepart = 'PCI Express 16 Slot Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kepcie2')==3){
            $sparepart = 'PCI Express 16 Slot Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kepci1')==3){
            $sparepart = 'PCI Express 1 Slot';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('keagp')==3){
            $sparepart = 'AGP';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksiide')==3){
            $sparepart = 'IDE';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatac1')==3){
            $sparepart = 'Sata Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatac2')==3){
            $sparepart = 'Sata Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatac3')==3){
            $sparepart = 'Sata Channel 3';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatac4')==3){
            $sparepart = 'Sata Channel 4';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kusb1')==3){
            $sparepart = 'USB Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kusb2')==3){
            $sparepart = 'USB Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kic24')==3){
            $sparepart = '24 pin ATX Main Power Connector';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kic4')==3){
            $sparepart = '4 pin ATX 12V Power Connector';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicide')==3){
            $sparepart = 'IDE Connector';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicfan')==3){
            $sparepart = 'CPU Fan Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicsysfan')==3){
            $sparepart ='System Fan Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicfpanhead')==3){
            $sparepart = 'Front Panel Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kiccdcon')==3){
            $sparepart = 'CD In Connector';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicspdif')==3){
            $sparepart = 'S/PDIF Out Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicusb2c1')==3){
            $sparepart = 'USB 2.0 Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicusb2c2')==3){
            $sparepart = 'USB 2.0 Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kiccih')==3){
            $sparepart = 'Chassis Intrusion Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kicled')==3){
            $sparepart = 'Power LED Header';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcps2k')==3){
            $sparepart = 'PS/ 2 Keyboard Port';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcps2m')==3){
            $sparepart = 'PS/ 2 Mouse Port';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcplp')==3){
            $sparepart = 'Parrallel Port';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcsp')==3){
            $sparepart = 'Serial Port';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcdp')==3){
            $sparepart = 'Display Port';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcusb2c1')==3){
            $sparepart = 'USB 2.0 Channel 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcusb2c2')==3){
            $sparepart = 'USB 2.0 Channel 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcusb2c3')==3){
            $sparepart = 'USB 2.0 Channel 3';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbpcusb2c4')==3){
            $sparepart = 'USB 2.0 Channel 4';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('khmsvd')==3){
            $sparepart = 'System Voltage Detection';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('khmctd')==3){
            $sparepart = 'CPU Temperature Detection';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('khmffw')==3){
            $sparepart = 'CPU/ System Fail Warning';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('khmfsc')==3){
            $sparepart = 'CPU Fan Speed Control';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kbios')==3){
            $sparepart = 'BIOS';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('katahdd1')==3){
            $sparepart = 'ATA HDD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('katahdd2')==3){
            $sparepart = 'ATA HDD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatahdd1')==3){
            $sparepart = 'SATA HDD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatahdd2')==3){
            $sparepart = 'SATA HDD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatassd1')==3){
            $sparepart ='SATA SSD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatassd2')==3){
            $sparepart = 'SATA SSD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('knvmssd1')==3){
            $sparepart = 'NVM SSD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('knvmssd2')==3){
            $sparepart = 'NVM SSD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd1c1')==3){
            $sparepart = 'RAM DDR 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd1c2')==3){
            $sparepart = 'RAM DDR 1';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd2c1')==3){
            $sparepart = 'RAM DDR 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd2c2')==3){
            $sparepart = 'RAM DDR 2';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd3c1')==3){
            $sparepart = 'RAM DDR 3';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd3c2')==3){
            $sparepart = 'RAM DDR 3';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd4c1')==3){
            $sparepart = 'RAM DDR 4';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kramd4c2')==3){
            $sparepart = 'RAM DDR 4';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kcdrw')==3){
            $sparepart = 'CD RW';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kdvdrw')==3){
            $sparepart = 'DVD RW';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kaic')==3){
            $sparepart = 'ATA/ IDE Cable';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('ksatac')==3){
            $sparepart = 'SATA Cable';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkey')==3){
            $sparepart = 'Keyboard';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kmou')==3){
            $sparepart = 'Mouse';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kspea')==3){
            $sparepart = 'Speaker';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kmoncrt')==3){
            $sparepart = 'Monitor CRT';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kmonlcd')==3){
            $sparepart = 'Monitor LCD';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kvgac')==3){
            $sparepart = 'VGA Cable';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('klanc')==3){
            $sparepart = 'LAN Card';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kvgacrd')==3){
            $sparepart = 'VGA Card';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kfirec')==3){
            $sparepart = 'Firewire Card';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('klptc')==3){
            $sparepart = 'LPT Card';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('krsc')==3){
            $sparepart = 'RS 232 Card';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kpwrs')==3){
            $sparepart = 'Power Supply';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkpwr')==3){
            $sparepart = 'Kabel Power';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkpwrmon')==3){
            $sparepart = 'Kabel Power Monitor';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkpwrsata')==3){
            $sparepart = 'Kabel Power SATA';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        if($this->input->post('kkmolpwr')==3){
            $sparepart = 'Kabel Molex Power';
            $dl_sts = 1;
            $dataperbaikan = array(
                'kd_inv_pr' => $this->input->post('kd_inv', TRUE),
                'kd_ruang' => $this->input->post('kd_ruang', TRUE),
                'tgl_inv_pr' => date('Y-m-d h:i:s'),
                //'jns_kr' => $this->input->post('jns_kr', TRUE),
                //'jns_pr' => $this->input->post('jns_pr', TRUE),
                'sp_gt' => $sparepart,
                'dl_sts' => $dl_sts,
                //'sp_by' => $this->input->post('sp_by', TRUE),
                'kd_pr' => $this->kode()
            );
            $this->M_perbaikan->insert($dataperbaikan);
        }
        
        $this->M_jadwal->updatekonten($this->input->post('kd_jd_ko', TRUE), $datawarna);
        $this->M_perawatan->update_perawatan($this->input->post('kd_jd_ko', TRUE), $data);
        $this->session->set_flashdata('message', 'Simpan Data Perawatan Berhasil');
        redirect(base_url('Perawatan'));
    }

    function read($id){
        $rows = $this->M_perawatan->get_r_id($id);
        if($rows){
            $data = array(
                'kd_aset' => set_value('kd_aset', $rows->kd_aset),
                'kcasing' => set_value('kcasing', $rows->cs_cs),
                'kbaut' => set_value('kbaut', $rows->cs_ba),
                'kksakelar' => set_value('kksakelar', $rows->cs_saklar),
                'kkusb' => set_value('kkusb', $rows->cs_usb),
                'kksound' => set_value('kksound', $rows->cs_sound),
                'kklamp' => set_value('kklamp', $rows->cs_lampu),
                'kcpu' => set_value('kcpu', $rows->mobo_cpu),
                'kfsb' => set_value('kfsb', $rows->mobo_fsb),
                'kchip' => set_value('kchip', $rows->mobo_chipset),
                'kmc1' => set_value('kmc1', $rows->mobo_ram_c1),
                'kmc2' => set_value('kmc2', $rows->mobo_ram_c2),
                'konboard' => set_value('konboard', $rows->mobo_ob_graphic),
                'kain' => set_value('kain', $rows->mobo_audio_in),
                'kaout' => set_value('kaout', $rows->mobo_audio_out),
                'klan' => set_value('klan', $rows->mobo_lan),
                'kepcie1' => set_value('kepcie1', $rows->mobo_es_pci16_c1),
                'kepcie2' => set_value('kepcie2', $rows->mobo_es_pci16_c2),
                'kepci1' => set_value('kepci1', $rows->mobo_es_pci1),
                'keagp' => set_value('keagp', $rows->mobo_agp),
                'ksiide' => set_value('ksiide', $rows->mobo_hdd_ide),
                'ksatac1' => set_value('ksatac1', $rows->mobo_hdd_sata_c1),
                'ksatac2' => set_value('ksatac2', $rows->mobo_hdd_sata_c2),
                'ksatac3' => set_value('ksatac3', $rows->mobo_hdd_sata_c3),
                'ksatac4' => set_value('ksatac4', $rows->mobo_hdd_sata_c4),
                'kusb1' => set_value('kusb1', $rows->mobo_usb_c1),
                'kusb2' => set_value('kusb2', $rows->mobo_usb_c2),
                'kic24' => set_value('kic24', $rows->mobo_ic_main),
                'kic4' => set_value('kic4', $rows->mobo_ic_power),
                'kicide' => set_value('kicide', $rows->mobo_ic_ide),
                'kicfan' => set_value('kicfan', $rows->mobo_ic_cpu_fan),
                'kicsysfan' => set_value('kicsysfan', $rows->mobo_ic_sys_fan),
                'kicfpanhead' => set_value('kicfpanhead', $rows->mobo_ic_fp),
                'kicfpanahead' => set_value('kicfpanahead', $rows->mobo_ic_fp_audio),
                'kiccdcon' => set_value('kiccdcon', $rows->mobo_ic_cd),
                'kicspdif' => set_value('kicspdif', $rows->mobo_ic_pdif),
                'kicusb2c1' => set_value('kicusb2c1', $rows->mobo_ic_usb2_c1),
                'kicusb2c2' => set_value('kicusb2c2', $rows->mobo_ic_usb2_c2),
                'kiccih' => set_value('kiccih', $rows->mobo_ic_chasis),
                'kicled' => set_value('kicled', $rows->mobo_ic_powerled),
                'kbpcps2k' => set_value('kbpcps2k', $rows->mobo_bp_ps2_key),
                'kbpcps2m' => set_value('kbpcps2m', $rows->mobo_bp_ps2_mo),
                'kbpcplp' => set_value('kbpcplp', $rows->mobo_bp_parallel),
                'kbpcsp' => set_value('kbpcsp', $rows->mobo_bp_serial),
                'kbpcdp' => set_value('kbpcdp', $rows->mobo_bp_display),
                'kbpcusb2c1' => set_value('kbpcusb2c1', $rows->mobo_bp_usb2_c1),
                'kbpcusb2c2' => set_value('kbpcusb2c2', $rows->mobo_bp_usb2_c2),
                'kbpcusb2c3' => set_value('kbpcusb2c3', $rows->mobo_bp_usb2_c3),
                'kbpcusb2c4' => set_value('kbpcusb2c4', $rows->mobo_bp_usb2_c4),
                'khmsvd' => set_value('khmsvd', $rows->mobo_hm_svd),
                'khmctd' => set_value('khmctd', $rows->mobo_hm_cpu_temp),
                'khmffw' => set_value('khmffw', $rows->mobo_hm_fail),
                'khmfsc' => set_value('khmfsc', $rows->mobo_hm_fan),
                'kbios' => set_value('kbios', $rows->mobo_bios),
                'katahdd1' => set_value('katahdd1', $rows->mobo_ata_hdd1),
                'katahdd2' => set_value('katahdd2', $rows->mobo_ata_hdd2),
                'ksatahdd1' => set_value('ksatahdd1', $rows->mobo_sata_hdd1),
                'ksatahdd2' => set_value('ksatahdd2', $rows->mobo_sata_hdd2),
                'ksatassd1' => set_value('ksatassd1', $rows->mobo_sata_ssd1),
                'ksatassd2' => set_value('ksatassd2', $rows->mobo_sata_ssd2),
                'knvmssd1' => set_value('knvmssd1', $rows->mobo_nvm_ssd1),
                'knvmssd2' => set_value('knvmssd2', $rows->mobo_nvm_ssd2),
                'kramd1c1' => set_value('kramd1c1', $rows->hw_ram_ddr1_c1),
                'kramd1c2' => set_value('kramd1c2', $rows->hw_ram_ddr1_c2),
                'kramd2c1' => set_value('kramd2c1', $rows->hw_ram_ddr2_c1),
                'kramd2c2' => set_value('kramd2c2', $rows->hw_ram_ddr2_c2),
                'kramd3c1' => set_value('kramd3c1', $rows->hw_ram_ddr3_c1),
                'kramd3c2' => set_value('kramd3c2', $rows->hw_ram_ddr3_c2),
                'kramd4c1' => set_value('kramd4c1', $rows->hw_ram_ddr4_c1),
                'kramd4c2' => set_value('kramd4c2', $rows->hw_ram_ddr4_c2),
                'kcdrw' => set_value('kcdrw', $rows->hw_pp_cd),
                'kdvdrw' => set_value('kdvdrw', $rows->hw_pp_dvd),
                'kaic' => set_value('kaic', $rows->hw_pp_aic),
                'ksatac' => set_value('ksatac', $rows->hw_pp_satac),
                'kkey' => set_value('kkey', $rows->hw_pp_key),
                'kmou' => set_value('kmou', $rows->hw_pp_mo),
                'kspea' => set_value('kspea', $rows->hw_pp_sp),
                'kmoncrt' => set_value('kmoncrt', $rows->hw_pp_mn),
                'kmonlcd' => set_value('kmonlcd', $rows->hw_pp_lcd),
                'kvgac' => set_value('kvgac', $rows->hw_pp_vgac),
                'klanc' => set_value('klanc', $rows->hw_card_lan),
                'kvgacrd' => set_value('kvgacrd', $rows->hw_card_vga),
                'kfirec' => set_value('kfirec', $rows->hw_card_firewire),
                'klptc' => set_value('klptc', $rows->hw_card_lpt),
                'krsc' => set_value('krsc', $rows->hw_card_rs),
                'kpwrs' => set_value('kpwrs', $rows->hw_lis_ps),
                'kkpwr' => set_value('kkpwr', $rows->hw_lis_cps),
                'kkpwrmon' => set_value('kkpwrmon', $rows->hw_lis_cpm),
                'kkpwrsata' => set_value('kkpwrsata', $rows->hw_lis_cpsata),
                'kkmolpwr' => set_value('kkmolpwr', $rows->hw_lis_cmp),
                'ket_prwt' => set_value('ket', $rows->ket_prwt),
                'wtm' => set_value('wtm', $rows->wtm),
                'wts' => set_value('wts', $rows->wts),
                'kd_jd' => set_value('kd_jd', $rows->kd_jd),
                'kd_inv' => set_value('kd_inv', $rows->kd_inv),
                'tgl_jd' => set_value('tgl_jd', $rows->tgl_jd),
                'vc_n_gugus' => set_value('vc_n_gugus', $rows->vc_n_gugus),
                'nm_pengguna' => set_value('vc_nm_pengguna', $rows->vc_nm_pengguna)
            );
            $this->load->view('perawatan/perawatan_read', $data);
            }else{
            $this->session->set_flashdata('messages', 'Data Perawatan Tidak Ditemukan');
			redirect(base_url('Perawatan'));
       }
    }

    function cek($id){
        $row = $this->M_perawatan->get_by_id_jd($id);
        if ($row) {
            if (($row->wtm != null) && ($row->wts != null) && ($row->tgl_trs != null)) {
                $j_valid = '1';
                $param = '0';
                $data = array(
                    'j_valid' => $j_valid
                );
            
                $stanggal = $row->tgl_jd;
                $tanggal = date('Y-m-d', strtotime('+3 month', strtotime($stanggal)));

                if(date('w', strtotime($tanggal)) == 0) {
                    $tanggal = date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));
                    $param =1;
                } 

                $nama = $row->nm_jd;
                $kdinv = $row->kd_inv;
                $warna = '#03e3fc';
                $stanggals = $row->tgl_jd_selesai;
                $tanggals = date('Y-m-d', strtotime('+3 month', strtotime($stanggals)));

                if($param == 1) {
                    $tanggals = date('Y-m-d', strtotime('+1 day', strtotime($tanggals)));
                }

                $ruang = $row->kd_ruang;
                $dt_sts = 1;
                $data3 = array(
                    'tgl_jd' => $tanggal,
                    'nm_jd' => $nama,
                    'kd_inv' => $kdinv,
                    'color' => $warna,
                    'tgl_jd_selesai' => $tanggals,
                    'kd_ruang' => $ruang,
                    'kd_jd' => $this->kodejd(),
                    'dt_sts' => $dt_sts
                );
                $this->M_jadwal->insert($data3);
                $this->M_perawatan->update_v($id, $data);
                $this->session->set_flashdata('message', 'Validasi Perawatan Sudah Dilakukan');
                redirect(base_url('Perawatan'));
            }
            else if($row->wtm == null){
                date_default_timezone_set("Asia/Jakarta");
                $data = array(
                    'wtm' => date('H:i:s')
                );
                $this->M_perawatan->update_waktu($id, $data);
                $this->session->set_flashdata('message', 'Waktu Mulai Perawatan Sudah Di Set');
                redirect(base_url('Perawatan'));
            }
            else if($row->wts == null){
                date_default_timezone_set("Asia/Jakarta");
                $data = array(
                    'wts' => date('H:i:s')
                );
                $this->M_perawatan->update_waktu($id, $data);
                $this->session->set_flashdata('message', 'Waktu Selesai Perawatan Sudah Di Set');
                redirect(base_url('Perawatan'));
            }
            else{
                $this->session->set_flashdata('messages', 'Validasi Perawatan Gagal Dilakukan');
                redirect(base_url('Perawatan'));
            }
        
    }
    }

    function delete($id){
        $row = $this->M_perawatan->get_by_id_jd($id);
        $dl_st = '0';
        if($row){
            $data = array(
                'dt_sts' => $dl_st
            );
        }
        $this->M_perawatan->update_delete($id, $data);
        $this->session->set_flashdata('messages', 'Hapus Data Perawatan Berhasil');
        redirect(base_url('Perawatan'));
    }

    function dt_tbl(){
        ## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value
        $searchByAwal = $_POST['searchByAwal'];
        $searchByAkhir = $_POST['searchByAkhir'];
		## Search 
        $searchQuery = " ";
        if(($searchByAwal != '') && ($searchByAkhir != '')){
            $searchByAwal = date('Y-m-d', strtotime($searchByAwal));
            $searchByAkhir = date('Y-m-d', strtotime(($searchByAkhir)));
            $searchQuery .= " AND (tgl_jd BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
        }
		if($searchValue != ''){
		$searchQuery .= " AND (inv_jadwal.tgl_jd like '%".$searchValue."%' or 
		inv_jadwal.tgl_jd_selesai like '%".$searchValue."%' or 
		inv_barang.kd_aset like '%".$searchValue."%' or 
		inv_jadwal.nm_jd like'%".$searchValue."%' or
		inv_jadwal.kd_inv like'%".$searchValue."%' or
		inv_barang.nm_inv like'%".$searchValue."%' or
		inv_pubgugus.vc_n_gugus like'%".$searchValue."%' or
		inv_jadwal_perawatan.status_p like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_perawatan->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_perawatan->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_perawatan->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
        $st = $row->status_p;
        if($st=='1'){$sts = "Belum Dikerjakan";
        }else if($st=='2'){$sts = "Sedang Dikerjakan";
        }else{$sts = "Sudah Selesai Dikerjakan";}

        if(($row->j_valid) == 1){
            $valid = '<a href="#" class="btn btn-secondary btn-circle">
                      <i class="fas fa-check"></i>
                      </a>';
        }else{
            $valid = '<a href="perawatan/cek/'.$row->kd_jd.'" class="btn btn-success btn-circle">
                      <i class="fas fa-check"></i>
                      </a>';
        }
        $button = $valid.' <a href="perawatan/read/'.$row->kd_jd.'" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a>
                    <a href="perawatan/update_k/'.$row->kd_jd.'" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                    <a href="perawatan/delete/'.$row->kd_jd.'" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>';

        $data[] = array( 
            // "no"=>$baris+1,
            // "kd_jd" =>$row->kd_jd,
			"tgl_jd"=>date('d-m-Y', strtotime($row->tgl_jd)),
            // "tgl_jd_selesai"=>date('d-M-Y', strtotime($row->tgl_jd_selesai)),
            "kd_aset"=>$row->kd_aset,
			"nm_jd"=>$row->nm_jd,
			// "kd_inv"=>$row->kd_inv,
			"nm_inv"=>$row->nm_inv,
			"vc_n_gugus"=>$row->vc_n_gugus,
            "status_p"=> $sts ,
			"action"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
    }

    function kode(){
        $kode = $this->M_perbaikan->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }
        $kodepr = $data;
        $noUrut = (int) substr($kodepr, 3, 5);
        $noUrut++;
        $char = "PRW";
        $kodebaru = $char.sprintf("%05s", $noUrut);
        return $kodebaru;
    }

    function kodejd(){
        $kode = $this->M_jadwal->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodejadwal = $data;
        $noUrut = (int) substr($kodejadwal, 2, 6);
        $noUrut++;
        $char = "JD";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }
}
?>