<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function proses()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $dataarray = array(
            'email' => $email,
            'pass' => $pass
        );

        $this->session->set_userdata($dataarray);
        echo $this->session->userdata('email');
        echo $this->session->userdata('pass');
        var_dump($this->session->userdata());
        print_r($this->session->userdata());
        $this->load->view('Chain');
    }
}
?>