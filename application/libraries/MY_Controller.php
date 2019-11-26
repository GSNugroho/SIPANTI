<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public function MY_Controller()
	{
		 parent::CI_Controller();
		 $this->load->library('session');
     //For example I have set logged_in = true in authentication on success
     //Checking whether userdata logged_in not set ... if true redirecting to login screen
		 if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
			 header('Location: '.base_url('login'));
			 exit;
		 }
	}
}
?>