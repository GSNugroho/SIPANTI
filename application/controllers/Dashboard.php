<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->library('session');
    }

	public function index()
	{

		// $data = array(
		// 	'nmUser' => $nmUser,
		// 	'unameApp' => $unameApp,
		// 	'passwrdApp' => $passwrdApp,
		// 	'nik' => $nik,
		// 	'gugus' => $gugus
		// );

		// $this->session->set_userdata($data);

		// if($nmUser == $row->nmUser 
		// 	&& $unameApp == $row->unameApp
		// 	&& $passwrdApp == $row->passwrdApp
		// 	&& $nik == $row->nik
		// 	&& $gugus == $row->gugus)
		// 	{
		// 		$this->session->set_userdata('nmUser', $nmUser);
			
				$target = $this->M_dashboard->get_total_target();
				$capaian = $this->M_dashboard->get_total_targetc();
				$t=0;
				$c=0;
				foreach($target as $ib){
					$t = (float)$ib->total;
				}

				foreach($capaian as $ib){
					$c = (float)$ib->total;
				}
				if(($t != 0) && ($c != 0)){
					$tc = ($c/$t) *100;
				}else{
					$tc = 0;
				}
				
				$tvc = number_format((float)$tc, 2, '.','');

				$data = array(
					'jadwal_t' => $this->M_dashboard->get_jadwal_total(),
					'jadwal_tb' => $this->M_dashboard->get_jadwal_totalb(),
					'perbaikan_t' => $this->M_dashboard->get_perbaikan_total(),
					'jadwal_dt' => $this->M_dashboard->get_jadwal_data(),
					'jadwal_tlt' => $this->M_dashboard->get_jadwal_telat(),
					'grafik_pr' => $this->M_dashboard->get_total_perawatanth(),
					'grafik_cpr_ss' => $this->M_dashboard->get_capaian_perawatanth_ss(),
					'grafik_cpr_tlt' => $this->M_dashboard->get_capaian_perawatanth_tlt(),
					'grafik_cpr_bs' => $this->M_dashboard->get_capaian_perawatanth_bs(),
					'grafik_prb' => $this->M_dashboard->get_total_perbaikanth(),
					'grafik_tlt' => $this->M_dashboard->get_total_telatth(),
					'progres_tvc' => $tvc
				);
				$this->load->view('dashboard', $data);
			// }else
			// {
			// 	redirect(siteurl(''));
			// }
	}
	
}
?>
