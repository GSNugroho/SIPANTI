<?php
class perawatan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perawatan');
    }

    public function index(){
        $data['inv_perawatan'] = $this->m_perawatan->get_data();
        $this->load->view('perawatan/perawatan',$data);
    }
    function create(){
        $this->load->view('perawatan/perawatan_form');
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
                'vc_nm_tindakan' => set_value('vc_nm_tindakan', $row->vc_nm_tindakan)
            );
            $this->load->view('perawatan/perawatan_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('perawatan'));
        }
    }
}
?>