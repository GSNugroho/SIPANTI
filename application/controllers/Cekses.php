<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $get_ses = $ssAll;
        $get_ses = 'QdTlcOFw5khZ5Hr+HTyI07265WsI0VjIPtpn+/XtYkR6fenDX8fF/3h6tEuBUZyEcYeIH9YDoFnAPT9zuw4h7y1oURdq6sGgbeTNHExdi4SebtI2lMrgr0pwOT4OmUZ1xOhWS+eUfpXLYGWRB3rH0OQZIgyY4ZwsaV0Ab5or5zBes5fib2RwuYIoNMgtvC0V0WjLOSqLK5c7opIBAavp5Ncr4hFIq5s352ZwBYyzS8haTAs4/a/QioPsvLqr0OJjw+8exyJdo3Pl1WkV7LC7IY5u2PUrisWJnP8+e/8WysrObXxKfpWbeoXN4MHeMM8HJKligMcRm1U9xVxU9WHX4c7PsdzDRwTHS0lT/y0oQho=';
        $ses_open = openssl_decrypt($get_ses, 'AES-256-CBC', 'RSPW5010');
        $ses_base = base64_decode($ses_open);
        $ses_json = json_decode($ses_base, true);
        $this->session->set_userdata($ses_json);
        
        echo "NmUser: ". $this->session->userdata('nmUser');
        echo "<br>";
        echo "UnameApp: ". $this->session->userdata('unameApp');
        echo "<br>";
        echo "PasswrdApp: ". $this->session->userdata('passwrdApp');
        echo "<br>";
        echo "NIK: ". $this->session->userdata('nik');
        echo "<br>";
        echo "Gugus: ". $this->session->userdata('gugus');
        echo "<br>";
        
        $this->load->view('chain');
        // if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) && (!empty($_SESSION['gugus']))) {
        //     $this->load->view('chain');
        // } else {
        //     echo redirect(base_url('../'));
        // }
    }
}
?>