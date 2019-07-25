<?php
class perawatan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perawatan');
    }

    public function index(){
        $data['inv_perawatan'] = $this->m_perawatan->get_data_jd();
        $this->load->view('perawatan/perawatan',$data);
    }
    function create(){
        $data['gki'] = $this->m_perawatan->get_kdinv();
        $this->load->view('perawatan/perawatan_form', $data);
    }
    function create_action(){
        $data = array(
            'vc_no_inv' => $this->input->post('vc_no_inv', TRUE),
            'dt_mulai' => $this->input->post('dt_mulai', TRUE),
            'dt_selesai' => $this->input->post('dt_selesai', TRUE),
            'vc_nm_tindakan' => $this->input->post('vc_nm_tindakan', TRUE)
        );

        $this->m_perawatan->insert($data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect(site_url(perawatan));
    }

    function update($id){
        $row = $this->m_perawatan->get_by_id_jd($id);

        if($row) {
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
                'ket' => set_value('ket', $row->ket),
                'status' => set_value('status', $row->status_p),
                'kd_jd' => set_value('kd_jd', $row->kd_jadwal)
            );
            $this->load->view('perawatan/perawatan_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('perawatan'));
        }
    }

    function delete($id){
        $row = $this->m_perawatan->get_by_id_jd($id);

        if($row){
            $this->m_perawatan->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
        }else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(base_url('perawatan'));
        }
    }

    function updateperawatan(){
         $id = $this->input->post('kd_jd', TRUE);
         if($id==NULL){ 
             $this->session->set_flashdata('message', 'Data Tidak Ada');
             redirect(base_url('jadwal'));
        }else{
         $row = $this->m_perawatan->get_by_id_jd($id);

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
                'ket' => set_value('ket', $row->ket),
              );
            $this->load->view('perawatan/perawatan_form_edit1',$data);
         }else {
             $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
             echo 'Data tidak ditemukan';
             redirect(base_url('jadwal'));
         };
        }
    }

    function update_action_perawatan(){
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
            'ket' => $this->input->post('ket', TRUE),
            'status_p' => $this->input->post('status', TRUE),
            'tgl_trs' => date('Y-m-d h:i:s')
        );
        $this->m_perawatan->update_perawatan($this->input->post('kd_jd', TRUE), $data);
        $this->session->set_flashdata('message', 'Simpan Data Berhasil');
        redirect(base_url('perawatan'));
    }
}
?>