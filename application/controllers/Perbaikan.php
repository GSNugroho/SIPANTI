<?php
class perbaikan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perbaikan');
    }

    public function index(){
        $this->load->view('perbaikan/perbaikan');
    }

    public function create(){
        $data = array(
            'dd_gr' => $this->m_perbaikan->get_ruang(),
            'gki' => $this->m_perbaikan->get_kdinv()
        );
        $this->load->view('perbaikan/perbaikan_form', $data);
    }
}
?>