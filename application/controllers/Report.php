<?php
class report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
        $this->load->library('tcpdf');
        // $this->load->library('m_pdf');
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

    // function get_report_perawatanm(){
    //     $tgl_a = $this->input->post('tgl_jd', TRUE);
    //     $tgl_s = $this->input->post('tgl_jd_s', TRUE);
    //     $data['report_p'] = $this->m_report->get_data_perawatan($tgl_a, $tgl_s);
        
    //     $mpdf = new Mpdf();
    //     $html=$this->load->view('report_pr1', $data, true);
    // }

    function get_report_gperawatan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gperawatan($bulan_jd, $tahun_jd);
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

    function get_report_gperbaikan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gperbaikan($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gprb', $data);
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

    function get_report_gtelat(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gtelat($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gtlt', $data);
    }
}
?>