<?php
class report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
        $this->load->library('tcpdf');
        // $this->load->library('pdf');
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

    function get_report_perawatanm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p']= $this->m_report->get_data_perawatan($tgl_a, $tgl_s);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_pr1',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    
    }

    function get_report_gperawatan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gperawatan($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gpr', $data);

        // $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_gpr', $data, true);
        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
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

    function get_report_perbaikanm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->m_report->get_data_perbaikan($tgl_a, $tgl_s);
        
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_prb1', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }

    function get_report_gperbaikan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gperbaikan($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gprb', $data);

        // $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_gprb', $data, true);
        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
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

    function get_report_telatm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->m_report->get_data_telat($tgl_a, $tgl_s);
        
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_tlt1', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function get_report_gtelat(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gtelat($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gtlt', $data);

        // $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_gtlt', $data, true);
        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
    }
}
?>