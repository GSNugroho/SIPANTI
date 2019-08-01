<?php
class report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
        $this->load->library('tcpdf');
    }

    public function index(){
        $this->load->view('report/perawatan');
    }

    function report_perawatan(){
        $this->load->view('report/perawatan');
    }

    function get_report_perawatan(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->m_report->get_data_perawatan($tgl_a, $tgl_s);
        $this->load->view('report/report_pr', $data);
    }

    function get_report_gperawatan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gperawatan($bulan_jd);
        $this->load->view('report/report_gpr', $data);
    }

    function report_perbaikan(){
        $this->load->view('report/perbaikan');
    }

    function get_report_perbaikan(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->m_report->get_data_perbaikan($tgl_a, $tgl_s);
        $this->load->view('report/report_prb', $data);
    }

    function report_telat(){
        $this->load->view('report/telat');
    }

    function get_report_telat(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->m_report->get_data_telat($tgl_a, $tgl_s);
        $this->load->view('report/report_tlt', $data);
    }
}
?>