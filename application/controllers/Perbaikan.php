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
}
?>