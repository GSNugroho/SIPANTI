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

    public function update_action(){
        $data = array(
        'tgl_jd' => $this->input->post('Event', 4, TRUE),
        'nm_jd' => $this->input->post('Event', 1, TRUE),
        'kd_inv' => $this->input->post('Event', 2, TRUE),
        'kd_tgl_selesai' => $this->input->post('Event', 5, TRUE),
        'kd_ruang' => $this->input->post('Event', 3, TRUE)
        );

        $this->m_jadwal->update($this->input->post('Event', 0, TRUE), $data);
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('jadwal'));
    }
}
?>