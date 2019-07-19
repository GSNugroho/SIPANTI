<?php
class jadwal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
    }

    public function index(){
        //$data['inv_jadwal'] = $this->m_jadwal->get_data();
        $data = array(
            'dd_gr' => $this->m_jadwal->get_ruang(),
            'inv_jadwal' => $this->m_jadwal->get_data()
        );
        $this->load->view('jadwal/jadwal', $data);
    }

    public function create_action(){
        $data = array(
        'tgl_jd' => $this->input->post('start', TRUE),
        'nm_jd' => $this->input->post('nm_jd', TRUE),
        'kd_inv' => $this->input->post('kd_inv', TRUE),
        'color' => $this->input->post('color', TRUE),
        'tgl_jd_selesai' => $this->input->post('end', TRUE),
        'kd_ruang' => $this->input->post('kd_ruang', TRUE)
        );

        $this->m_jadwal->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect(site_url('jadwal'));
    }

    public function update_action_konten(){        
        $data = array(
        'nm_jd' => $this->input->post('nm_jd', TRUE),
        'kd_inv' => $this->input->post('kd_inv', TRUE),
        'kd_ruang' => $this->input->post('kd_ruang', TRUE),
        'color' => $this->input->post('color', TRUE)
        );

        $this->m_jadwal->updatekonten($this->input->post('id_jd', TRUE), $data);
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('jadwal'));
    }
    
    public function update_action_tgl(){
        $data = array(
        //'tgl_jd' => $this->input->post('start', TRUE),
        //'tgl_jd_selesai' => $this->input->post('end', TRUE)
        'tgl_jd' => $_POST['event'][1],
	    'tgl_jd_selesai' => $_POST['event'][2]
        );

        $this->mjadwal->updatetgl($_POST['event'][0], $data);
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('jadwal'));
    }


    
    public function delete($id){
        $row = $this->m_jadwal->get_by_id($id);

        if($row){
            $this->m_monitor->delete($id);
            $this->session_flashdata('message', 'Hapus Data Berhasil');
        }else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('jadwal'));
        }
    }
}
?>