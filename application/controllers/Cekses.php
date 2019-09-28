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
        // $get_ses = $_GET['ssAll'];
        $get_ses = $this->input->get('ssAll');
        $ses_replace = str_replace(' ','+',$get_ses);
        // echo $get_ses;
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // echo $ses_replace;
        // $get_ses = $this->input->get('ssAll');
        // $get_ses = 'QdTlcOFw5khZ5Hr+HTyI07265WsI0VjIPtpn+/XtYkR6fenDX8fF/3h6tEuBUZyEcYeIH9YDoFnAPT9zuw4h7y1oURdq6sGgbeTNHExdi4SebtI2lMrgr0pwOT4OmUZ1xOhWS+eUfpXLYGWRB3rH0OQZIgyY4ZwsaV0Ab5or5zBes5fib2RwuYIoNMgtvC0V0WjLOSqLK5c7opIBAavp5Ncr4hFIq5s352ZwBYyzS8haTAs4/a/QioPsvLqr0OJjw+8exyJdo3Pl1WkV7LC7IY5u2PUrisWJnP8+e/8WysrObXxKfpWbeoXN4MHeMM8HJKligMcRm1U9xVxU9WHX4c7PsdzDRwTHS0lT/y0oQho=';
        $ses_open = openssl_decrypt($ses_replace, 'AES-256-CBC', 'RSPW5010');
        // echo $ses_open;
        $ses_base = base64_decode($ses_open);
        $ses_json = json_decode($ses_base, true);
        $this->session->set_userdata($ses_json);
        
        // echo "NmUser: ". $this->session->userdata('nmUser');
        // echo "<br>";
        // echo "UnameApp: ". $this->session->userdata('unameApp');
        // echo "<br>";
        // echo "PasswrdApp: ". $this->session->userdata('passwrdApp');
        // echo "<br>";
        // echo "NIK: ". $this->session->userdata('nik');
        // echo "<br>";
        // echo "Gugus: ". $this->session->userdata('gugus');
        // echo "<br>";
        
        $this->load->view('chain');
        // if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) && (!empty($_SESSION['gugus']))) {
        //     $this->load->view('chain');
        // } else {
        //     echo redirect(base_url('../'));
        // }
    }

    public function destroy()
    {
        $this->session->sess_destroy();
        redirect(site_url('../index'));
    }

    public function setflash()
    {
        $this->session->set_flashdata('flash_welcome', 'Selamat Datang');
        $this->session->set_userdata('flash_message', 'I am flash message!');
        $this->session->mark_as_flash('flash_message');
         
        redirect('Cekses/getflash');
    }

    public function getflash()
    {
        echo "Pesan Flash: ". $this->session->flashdata('flash_welcome');
        echo '<pre>';
        print_r($this->session->flashdata());
    }

    public function tempdata()
    {
        // set temp data
        $this->session->set_tempdata('coupon_code', 'XYEceQ!', 300);
 
        // mark existing data as temp data
        $this->session->set_userdata('coupon_code', 'XYEceQ!');
        $this->session->mark_as_temp('coupon_code', 300);
         
        // get temp data
        echo $this->session->tempdata('coupon_code');
    }

    public function notfound()
    {
        $this->load->view('404');
    }
}
?>