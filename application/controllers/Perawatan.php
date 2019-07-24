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
        $row = $this->m_perawatan->get_by_id($id);

        if($row) {
            $data = array(
                'vc_no_inv' => set_value('vc_no_inv', $row->vc_no_inv),
                'dt_mulai' => set_value('dt_mulai', $row->dt_mulai),
                'dt_selesai' => set_value('dt_selesai', $row->dt_selesai),
                'vc_nm_tindakan' => set_value('vc_nm_tindakan', $row->vc_nm_tindakan),
                'gki' => $this->m_perawatan->get_kdinv()
            );
            $this->load->view('perawatan/perawatan_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('perawatan'));
        }
    }

    function update_action(){
        $data = array(
            'vc_no_inv' => $this->input->post('vc_no_inv', TRUE),
            'dt_mulai' => $this->input->post('dt_mulai', TRUE),
            'dt_selesai' => $this->input->post('dt_selesai', TRUE),
            'vc_nm_tindakan' => $this->input->post('vc_nm_tindakan', TRUE)
        );
        $this->m_perawatan->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('perawatan'));
    }

    function delete($id){
        $row = $this->m_perawatan->get_by_id($id);

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
                'kd_jd'=> set_value('kd_jd', $row->kd_jadwal)
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
            'hw_card_vga' => $this->input->post('kvgac', TRUE),
            'hw_card_firewire' => $this->input->post('kfirec', TRUE),
            'hw_card_lpt' => $this->input->post('klptc', TRUE),
            'hw_card_rs' => $this->input->post('krsc', TRUE),
            'hw_lis_ps' => $this->input->post('kpwrs', TRUE),
            'hw_lis_cps' => $this->input->post('kkpwr', TRUE),
            'hw_lis_cpm' => $this->input->post('kkpwrmon', TRUE),
            'hw_lis_cpsata' => $this->input->post('kkpwrsata', TRUE),
            'hw_lis_cmp' => $this->input->post('kkmolpwr', TRUE),
            'ket' => $this->input->post('ket', TRUE),
            'status_p' => $this->input->post('status', TRUE)
        );
        $this->m_perawatan->update_perawatan($this->input->post('kd_jd', TRUE), $data);
        $this->session->set_flashdata('message', 'Simpan Data Berhasil');
        redirect(base_url('jadwal'));
    }
}
?>