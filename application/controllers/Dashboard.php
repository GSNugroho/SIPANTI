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
		$target = $this->m_dashboard->get_total_target();
		$capaian = $this->m_dashboard->get_total_targetc();

		foreach($target as $ib){
			$t = (float)$ib->total;
		}

		foreach($capaian as $ib){
			$c = (float)$ib->total;
		}

		$tc = ($c/$t) *100;
		$tvc = number_format((float)$tc, 2, '.','');

		$data = array(
			'jadwal_t' => $this->m_dashboard->get_jadwal_total(),
			'jadwal_tb' => $this->m_dashboard->get_jadwal_totalb(),
			'perbaikan_t' => $this->m_dashboard->get_perbaikan_total(),
			'jadwal_dt' => $this->m_dashboard->get_jadwal_data(),
			'jadwal_tlt' => $this->m_dashboard->get_jadwal_telat(),
			'grafik_pr' => $this->m_dashboard->get_total_perawatanth(),
			'grafik_cpr_ss' => $this->m_dashboard->get_capaian_perawatanth_ss(),
			'grafik_cpr_tlt' => $this->m_dashboard->get_capaian_perawatanth_tlt(),
			'grafik_cpr_bs' => $this->m_dashboard->get_capaian_perawatanth_bs(),
			'grafik_prb' => $this->m_dashboard->get_total_perbaikanth(),
			'grafik_tlt' => $this->m_dashboard->get_total_telatth(),
			'progres_tvc' => $tvc
		);
		$this->load->view('dashboard', $data);
	}
	
}
?>
