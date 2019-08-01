<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

	public function index()
	{
		$data = array(
			'jadwal_t' => $this->m_dashboard->get_jadwal_total(),
			'jadwal_tb' => $this->m_dashboard->get_jadwal_totalb(),
			'perbaikan_t' => $this->m_dashboard->get_perbaikan_total(),
			'jadwal_dt' => $this->m_dashboard->get_jadwal_data(),
			'jadwal_tlt' => $this->m_dashboard->get_jadwal_telat()
		);
		$this->load->view('dashboard', $data);
	}
	
}
?>
