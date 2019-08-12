<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Mypdf extends CI_Controller {
  
    public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('welcome_message',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('test.pdf','D'); // it downloads the file into the user system.
    }
  
}