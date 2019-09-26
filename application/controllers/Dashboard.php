<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) && (!empty($_SESSION['gugus']))) {
			$this->load->model('M_dashboard');
        }else{
			echo redirect(base_url('../'));
		}

    }

	public function index()
	{
		// $e = 'eyJubVVzZXIiOiJHQUxJSCBTRVRZTyBOVUdST0hPLCBBLk1ELiIsInVuYW1lQXBwIjoiR2FsaWhzIiwicGFzc3dyZEFwcCI6IjBmMTZmNWJlZmY1ZGVhYjQ4OGZiYjlmYzRkYmJhNzJiM2M4ZWRmMWUiLCJuaWsiOiJNRGsxTVE9PSIsInN1IjowLCJndWd1cyI6IjIwMDEiLCJpcCI6IjE5Mi4xNjguMjAuMTMyIiwiaXBFeHQiOiIxOTIuMTY4LjIwLjEzMiJ9';
		// $e = 'QdTlcOFw5khZ5Hr+HTyI07265WsI0VjIPtpn+/XtYkR6fenDX8fF/3h6tEuBUZyEcYeIH9YDoFnAPT9zuw4h7y1oURdq6sGgbeTNHExdi4SebtI2lMrgr0pwOT4OmUZ1xOhWS+eUfpXLYGWRB3rH0OQZIgyY4ZwsaV0Ab5or5zBes5fib2RwuYIoNMgtvC0V0WjLOSqLK5c7opIBAavp5Ncr4hFIq5s352ZwBYyzS8haTAs4/a/QioPsvLqr0OJjw+8exyJdo3Pl1WkV7LC7IY5u2PUrisWJnP8+e/8WysrObXxKfpWbeoXN4MHeMM8HJKligMcRm1U9xVxU9WHX4c7PsdzDRwTHS0lT/y0oQho=';
		// $ses_a = openssl_decrypt($e, 'AES-256-CBC', 'RSPW5010');
		// $ses_atas = base64_decode($ses_a);
		// $ses = json_decode($ses_atas, TRUE);
		// echo $ses_atas;
		// $this->session->set_userdata($ses);
		// print_r($ses);
		// echo $this->session->userdata('nmUser');
		// echo $this->session->userdata('email')
		// $email = $this->input->post('email');
        // $pass = $this->input->post('pass');

        // $dataarray = array(
        //     'email' => $email,
        //     'pass' => $pass
        // );

        // $this->session->set_userdata($dataarray);
		// if ((isset($_SESSION['email'])) && (isset($_SESSION['pass'])) && (!empty($_SESSION['email'])) && (!empty($_SESSION['pass'])))
		// if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) && (!empty($_SESSION['gugus'])))
		// 	 {
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
		
		// } else {
		// 		echo "Silahkan Login Terlebih Dahulu";
		 		// echo redirect(base_url('../'));
		// }
}
}
?>
