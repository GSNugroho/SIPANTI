<?php
class report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
        // $this->load->library('tcpdf');
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

        $data = array(
            'report_p' => $this->m_report->get_data_perawatan($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_pr1',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    
    }

    function get_report_gperawatan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        // $data['report_g'] = $this->m_report->get_data_gperawatan($bulan_jd, $tahun_jd);
        $data = array(
            'report_g' => $this->m_report->get_data_gperawatan($bulan_jd, $tahun_jd),
            'report_l' => $this->m_report->get_data_glperawatan($bulan_jd, $tahun_jd)
        );
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

    function get_report_perbaikanm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        // $data['report_p'] = $this->m_report->get_data_perbaikan($tgl_a, $tgl_s);
        
        $data = array(
            'report_p' => $this->m_report->get_data_perbaikan($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );

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
        // $data['report_p'] = $this->m_report->get_data_telat($tgl_a, $tgl_s);
        
        $data = array(
            'report_p' => $this->m_report->get_data_telat($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_tlt1', $data, true);
        $mpdf->SetFontSize('12');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function get_report_gtelat(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        $data['report_g'] = $this->m_report->get_data_gtelat($bulan_jd, $tahun_jd);
        $this->load->view('report/report_gtlt', $data);
    }

    function report_sparepart(){
        $this->load->view('report/sparepart');
    }

    function get_report_sparepartm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);

        $data = array(
            'report_p' => $this->m_report->get_data_sparepart($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_sp1', $data, true);
        $mpdf->SetFontSize('12');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function riwayat_perawatan(){
        $data = array(
            'dd_gr' => $this->m_report->get_ruang()
        );
        $this->load->view('report/riwayat_perawatan', $data);
    }

    function get_riwayat_perawatan(){
        $kd_inv = $this->input->post('kd_inv', TRUE);
        $tgl = date('Y-m-d h:i:s');
        $data = array(
            'report_p' => $this->m_report->get_riwayat_dperawatan($kd_inv),
            'tgl_hr' => $tgl,
            'kd_inv' => $kd_inv
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_riwayat_pr', $data, true);
        $mpdf->SetFontSize('12');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function riwayat_perbaikan(){
        $data = array(
            'dd_gr' => $this->m_report->get_ruang()
        );
        $this->load->view('report/riwayat_perbaikan', $data);
    }

    function get_riwayat_perbaikan(){
        $kd_inv = $this->input->post('kd_inv', TRUE);
        $tgl = date('Y-m-d h:i:s');
        $data = array(
            'report_p' => $this->m_report->get_riwayat_dperbaikan($kd_inv),
            'tgl_hr' => $tgl,
            'kd_inv' => $kd_inv
        );

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_riwayat_prb', $data, true);
        $mpdf->SetFontSize('12');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->m_report->get_inv($id_ruang);
        $lists = "<tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>";

        foreach ($inv as $row){
            $lists = '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
        }

        $callback = array('list_inv'=>$lists); 
        echo json_encode($callback); 
    }
}
?>