<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
        $this->load->model('M_report');
        // $this->load->library('tcpdf');
        // $this->load->library('pdf');
        }else {
            echo redirect(base_url('../'));
        }
    }

    public function index(){
        $this->load->view('report/perawatan');
    }

    function report_perawatan(){
        $this->load->view('report/perawatan');
    }

    function get_report_perawatan(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));
        $data['report_p'] = $this->M_report->get_data_perawatan($tgl_a, $tgl_s);
        $this->load->view('report/report_pr', $data);
    }

    function get_report_harian_view(){
        $tgl_keg = date('Y-m-d', strtotime($this->input->post('tgl_keg')));
        $report_keg = $this->M_report->get_data_harian($tgl_keg);

        $data = array(
            'report_harian' => $report_keg,
            'tgl_keg' => $tgl_keg
        );
        $this->load->view('report/report_hr', $data);
    }

    function get_report_harian(){
        $tgl_keg = date('Y-m-d', strtotime($this->input->post('tgl_keg')));

        $report_keg = $this->M_report->get_data_harian($tgl_keg);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<html>
        <head>
            <style>
                table{
                    border-collapse: collapse;
                }
                table, th, td{
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <img src = "'.base_url('assets/bootstrap/image/logo_new1.png').'" height="42" weight="42">
            <h4 align="center">Laporan Harian Perawatan</h4><br><p></p>
            <p>Tanggal :'.date('d-m-Y', strtotime($tgl_keg)).'</p>
            <table border="1">
            <tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Kegiatan</th>
            <th align="center">Tanggal Jadwal</th>
            <th align="center">Nama Jadwal</th>
            <th align="center">Kode Aset</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
        </tr>');
        $i = 0;
        foreach($report_keg as $row){
            $i++;
            $mpdf->WriteHTML('<tr >
            <td align="center">'.$i.'</td>
            <td>'.date('d-m-Y', strtotime($tgl_keg)).'</td>
            <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
            <td>'.$row->nm_jd.'</td>
            <td>'.$row->kd_aset.'</td>
            <td>'.$row->nm_inv.'</td>
            <td>'.$row->vc_n_gugus.'</td></tr>
            ');
        }
        $mpdf->WriteHTML('</table>');
        $mpdf->Output();

    }

    function get_report_perawatanm(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));
        // $data['report_p']= $this->M_report->get_data_perawatan($tgl_a, $tgl_s);
        $order = $this->input->post('ordere', TRUE);


        $data = array(
            'report_p' => $this->M_report->get_data_perawatan($tgl_a, $tgl_s, $order),
            'report_l' => $this->M_report->get_data_wperawatan($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );
        $report_p = $this->M_report->get_data_perawatan($tgl_a, $tgl_s, $order);
        $report_l = $this->M_report->get_data_wperawatan($tgl_a, $tgl_s);

        $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_pr1',$data,true);
        $mpdf->WriteHTML('<html>
        <head>
            <style>
                table{
                    border-collapse: collapse;
                }
                table, th, td{
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
        <img src = "'.base_url('assets/bootstrap/image/logo_new1.png').'" height="42" weight="42">
        <h4 align="center">Laporan Perawatan Inventaris</h4><br><p></p>
        <p>Tanggal :'.date('d-m-Y', strtotime($tgl_a)).' sampai '.date('d-m-Y', strtotime($tgl_s)).'</p>
		<table border="1">				
		<tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perawatan</th>
            <th align="center" width="25%">Jadwal</th>
            <th align="center" width="13%">Kode Aset</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Lama Pengerjaan</th>
            <th align="center">Kondisi</th>
        </tr>');
        $i=0;
        foreach ($report_p as $row) 
        {
        $i++;
            
        $mpdf->WriteHTML('<tr >
        <td align="center">'.$i.'</td>
        <td>'.date('d-M-Y', strtotime($row->tgl_jd)).'</td>
        <td>'.$row->nm_jd.'</td>
        <td>'.$row->kd_aset.'</td>
        <td>'.$row->nm_inv.'</td>
        <td>'.$row->vc_n_gugus.'</td>
        ');
        $awal = strtotime($row->wtm);
        $akhir = strtotime($row->wts);
        $diff = $akhir-$awal;
                    
        $jam   = floor($diff / (60 * 60));
        $menit = ($diff - $jam * (60 * 60))/60;

        $mpdf->WriteHTML('<td>'.$jam.' jam '.$menit.' menit </td>');

        $kondisi = 0;
                     $total = 0;
                     if(!empty($row->cs_cs)&&($row->cs_cs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else 
                            if(!empty($row->cs_cs)&&($row->cs_cs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_cs)&&($row->cs_cs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_ba)&&($row->cs_ba)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_ba)&&($row->cs_ba)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_ba)&&($row->cs_ba)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_saklar)&&($row->cs_saklar==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_saklar)&&($row->cs_saklar)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_saklar)&&($row->cs_saklar)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_usb)&&($row->cs_usb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_usb)&&($row->cs_usb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_usb)&&($row->cs_usb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_sound)&&($row->cs_sound)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_sound)&&($row->cs_sound)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_sound)&&($row->cs_sound)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_lampu)&&($row->cs_lampu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_lampu)&&($row->cs_lampu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_lampu)&&($row->cs_lampu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==1)
                        {$kondisi = $kondisi+10; $total = $total = $total+10;}else
                            if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_lan)&&($row->mobo_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_lan)&&($row->mobo_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_lan)&&($row->mobo_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_agp)&&($row->mobo_agp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_agp)&&($row->mobo_agp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_agp)&&($row->mobo_agp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_cpu_temp&&($row->mobo_hm_cpu_temp)==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bios)&&($row->mobo_bios)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bios)&&($row->mobo_bios)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bios)&&($row->mobo_bios)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total;}else
                            if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else  
                            if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                    if($total!=0){
                    $persentase = ($kondisi/$total)*100;
                    $mpdf->WriteHTML('<td>'.floor($persentase).'%</td></tr>');}else{
                        $mpdf->WriteHTML('<td>0%</td></tr>');
                    }
        }
        $mpdf->WriteHTML('</table>
        Rata-rata waktu pengerjaan :');
        $datarata = array();
        foreach($report_l as $row){
            if($row->selisih != NULL){
            $wperawatan[] = $row->selisih;
            }
        }

        $ts = count($wperawatan);
        $rdetik = array_sum($wperawatan)/$ts;
        $menit = floor($rdetik/60);
        $detik = floor($rdetik-($menit*60));
        $mpdf->WriteHTML($menit.' menit '.$detik.' detik');
        $mpdf->Output();
    
    }

    function get_report_pra(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));
        $order = $this->input->post('ordere', TRUE);

        $data = array(
            'report_p' => $this->M_report->get_data_perawatan($tgl_a, $tgl_s, $order),
            'report_l' => $this->M_report->get_data_wperawatan($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );
        $report_p = $this->M_report->get_data_perawatan($tgl_a, $tgl_s, $order);
        $report_l = $this->M_report->get_data_wperawatan($tgl_a, $tgl_s);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Tanggal Perawatan')
                    ->setCellValue('C1', 'Jadwal Perawatan')
                    ->setCellValue('D1', 'Kode Aset')
                    ->setCellValue('E1', 'Nama Barang')
                    ->setCellValue('F1', 'Ruang')
                    ->setCellValue('G1', 'Lama Pengerjaan')
                    ->setCellValue('H1', 'Kondisi');

        $kolom = 2;
        $nomor = 1;
        foreach($report_p as $row){
            
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, date('d-m-Y', strtotime($row->tgl_jd)))
                        ->setCellValue('C' . $kolom, $row->nm_jd)
                        ->setCellValue('D' . $kolom, $row->kd_aset)
                        ->setCellValue('E' . $kolom, $row->nm_inv)
                        ->setCellValue('F' . $kolom, $row->vc_n_gugus);

            $awal = strtotime($row->wtm);
            $akhir = strtotime($row->wts);
            $diff = $akhir - $awal;

            $jam = floor($diff / (60 * 60));
            $menit = ($diff - $jam * (60 * 60))/60;

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G' . $kolom, $jam.' jam '.$menit.' menit');

            $kondisi = 0;
            $total = 0;

            if(!empty($row->cs_cs)&&($row->cs_cs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else 
                            if(!empty($row->cs_cs)&&($row->cs_cs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_cs)&&($row->cs_cs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_ba)&&($row->cs_ba)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_ba)&&($row->cs_ba)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_ba)&&($row->cs_ba)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_saklar)&&($row->cs_saklar==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_saklar)&&($row->cs_saklar)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_saklar)&&($row->cs_saklar)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_usb)&&($row->cs_usb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_usb)&&($row->cs_usb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_usb)&&($row->cs_usb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_sound)&&($row->cs_sound)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_sound)&&($row->cs_sound)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_sound)&&($row->cs_sound)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->cs_lampu)&&($row->cs_lampu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->cs_lampu)&&($row->cs_lampu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->cs_lampu)&&($row->cs_lampu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_cpu)&&($row->mobo_cpu)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_fsb)&&($row->mobo_fsb)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_chipset)&&($row->mobo_chipset)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c1)&&($row->mobo_ram_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ram_c2)&&($row->mobo_ram_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ob_graphic)&&($row->mobo_ob_graphic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==1)
                        {$kondisi = $kondisi+10; $total = $total = $total+10;}else
                            if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_audio_in)&&($row->mobo_audio_in)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_audio_out)&&($row->mobo_audio_out)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_lan)&&($row->mobo_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_lan)&&($row->mobo_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_lan)&&($row->mobo_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c1)&&($row->mobo_es_pci16_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci16_c2)&&($row->mobo_es_pci16_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_es_pci1)&&($row->mobo_es_pci1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_agp)&&($row->mobo_agp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_agp)&&($row->mobo_agp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_agp)&&($row->mobo_agp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_ide)&&($row->mobo_hdd_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c1)&&($row->mobo_hdd_sata_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c2)&&($row->mobo_hdd_sata_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c3)&&($row->mobo_hdd_sata_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hdd_sata_c4)&&($row->mobo_hdd_sata_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c1)&&($row->mobo_usb_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_usb_c2)&&($row->mobo_usb_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_main)&&($row->mobo_ic_main)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_power)&&($row->mobo_ic_power)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_ide)&&($row->mobo_ic_ide)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cpu_fan)&&($row->mobo_ic_cpu_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==2)
                                    {$kondisi = $kondisi+5; $total = $total+10;}else
                                        if(!empty($row->mobo_ic_sys_fan)&&($row->mobo_ic_sys_fan)==3)
                                            {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp)&&($row->mobo_ic_fp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_fp_audio)&&($row->mobo_ic_fp_audio)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_cd)&&($row->mobo_ic_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_pdif)&&($row->mobo_ic_pdif)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c1)&&($row->mobo_ic_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_usb2_c2)&&($row->mobo_ic_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_chasis)&&($row->mobo_ic_chasis)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ic_powerled)&&($row->mobo_ic_powerled)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_key)&&($row->mobo_bp_ps2_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_ps2_mo)&&($row->mobo_bp_ps2_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_parallel)&&($row->mobo_bp_parallel)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_serial)&&($row->mobo_bp_serial)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_display)&&($row->mobo_bp_display)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c1)&&($row->mobo_bp_usb2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c2)&&($row->mobo_bp_usb2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c3)&&($row->mobo_bp_usb2_c3)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bp_usb2_c4)&&($row->mobo_bp_usb2_c4)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_svd)&&($row->mobo_hm_svd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_cpu_temp&&($row->mobo_hm_cpu_temp)==1))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_cpu_temp)&&($row->mobo_hm_cpu_temp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fail)&&($row->mobo_hm_fail)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_hm_fan)&&($row->mobo_hm_fan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_bios)&&($row->mobo_bios)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_bios)&&($row->mobo_bios)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_bios)&&($row->mobo_bios)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd1)&&($row->mobo_ata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_ata_hdd2)&&($row->mobo_ata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd1)&&($row->mobo_sata_hdd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_hdd2)&&($row->mobo_sata_hdd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd1)&&($row->mobo_sata_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_sata_ssd2)&&($row->mobo_sata_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd1)&&($row->mobo_nvm_ssd1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->mobo_nvm_ssd2)&&($row->mobo_nvm_ssd2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total;}else
                            if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c1)&&($row->hw_ram_ddr1_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2))
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr1_c2)&&($row->hw_ram_ddr1_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c1)&&($row->hw_ram_ddr2_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr2_c2)&&($row->hw_ram_ddr2_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c1)&&($row->hw_ram_ddr3_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr3_c2)&&($row->hw_ram_ddr3_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c1)&&($row->hw_ram_ddr4_c1)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_ram_ddr4_c2)&&($row->hw_ram_ddr4_c2)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_cd)&&($row->hw_pp_cd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_dvd)&&($row->hw_pp_dvd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_aic)&&($row->hw_pp_aic)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_satac)&&($row->hw_pp_satac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_key)&&($row->hw_pp_key)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mo)&&($row->hw_pp_mo)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_sp)&&($row->hw_pp_sp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_mn)&&($row->hw_pp_mn)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_lcd)&&($row->hw_pp_lcd)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_pp_vgac)&&($row->hw_pp_vgac)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lan)&&($row->hw_card_lan)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_vga)&&($row->hw_card_vga)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_firewire)&&($row->hw_card_firewire)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_lpt)&&($row->hw_card_lpt)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_card_rs)&&($row->hw_card_rs)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else  
                            if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_ps)&&($row->hw_lis_ps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cps)&&($row->hw_lis_cps)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpm)&&($row->hw_lis_cpm)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cpsata)&&($row->hw_lis_cpsata)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                     if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==1)
                        {$kondisi = $kondisi+10; $total = $total+10;}else
                            if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==2)
                                {$kondisi = $kondisi+5; $total = $total+10;}else
                                    if(!empty($row->hw_lis_cmp)&&($row->hw_lis_cmp)==3)
                                        {$kondisi = $kondisi+0; $total = $total+10;}
                    if($total!=0){
                    $persentase = ($kondisi/$total)*100;
                    $spreadsheet->setActiveSheetIndex(0)
                                ->setCellValue('H'.$kolom, $persentase.'%');
                    }
                    else{
                    $spreadsheet->setActiveSheetIndex(0)
                                ->setCellValue('H' . $kolom, '0%');
                    }
        $kolom++;
        $nomor++;
    }
    $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Perawatan.xlsx"');
		// header('Content-Disposition: attachment;filename="Data_PKS.xls"');
	  	header('Cache-Control: max-age=0');

        // $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
	    $writer->save('php://output');
}

    function get_report_blm(){
        // $bulan = $this->input->post('bln_blm', TRUE);
        // $tahun = $this->input->post('th_blm', TRUE);

        // if($bulan != 0){
            $order = $this->input->post('ordere', TRUE);
            $data = $this->M_report->get_report_blm($order);

            $spreadsheet = new Spreadsheet;

            $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Kode Aset')
					  ->setCellValue('C1', 'Ruang')
					  ->setCellValue('D1', 'Nama Barang')
					  ->setCellValue('E1', 'Nama Pengguna');

            $kolom = 2;
            $nomor = 1;
            foreach($data as $row) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $row->kd_aset)
						   ->setCellValue('C' . $kolom, $row->vc_n_gugus)
						   ->setCellValue('D' . $kolom, $row->nm_inv)
						   ->setCellValue('E' . $kolom, $row->vc_nm_pengguna);
               $kolom++;
               $nomor++;

            }

            $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Belum_Perawatan.xlsx"');
		// header('Content-Disposition: attachment;filename="Data_PKS.xls"');
	  	header('Cache-Control: max-age=0');

	    $writer->save('php://output');
        // }
    }

    function get_report_capaian(){
        $tgl1_cp = date('Y-m-d', strtotime($this->input->post('tgl1_cp', TRUE)));
        $tgl2_cp = date('Y-m-d', strtotime($this->input->post('tgl2_cp', TRUE)));

        $data = array(
            // 'cpt' => $this->M_report->get_cpt($tgl1_cp, $tgl2_cp),
            'cpr' => $this->M_report->get_cpr($tgl1_cp, $tgl2_cp),
            'cpbr' => $this->M_report->get_cpbr($tgl1_cp, $tgl2_cp),
            'cpt_t' => $this->M_report->get_cpt_t($tgl1_cp, $tgl2_cp),
            'cpr_t' => $this->M_report->get_cpr_t($tgl1_cp, $tgl2_cp),
            'cpbr_t' => $this->M_report->get_cpbr_t($tgl1_cp, $tgl2_cp)
        );
        $this->load->view('report/report_capaian', $data);
    }

    function get_report_gperawatan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);
        // $data['report_g'] = $this->M_report->get_data_gperawatan($bulan_jd, $tahun_jd);

        switch($bulan_jd){
            case 1:
            $bln = "Januari ";
            break;
            case 2:
            $bln = "Februari ";
            break;
            case 3:
            $bln = "Maret ";
            break;
            case 4:
            $bln = "April ";
            break;
            case 5:
            $bln = "Mei ";
            break;
            case 6:
            $bln = "Juni ";
            break;
            case 7:
            $bln = "Juli ";
            break;
            case 8:
            $bln = "Agustus ";
            break;
            case 9:
            $bln = "September ";
            break;
            case 10:
            $bln = "Oktober ";
            break;
            case 11:
            $bln = "November ";
            break;
            case 12:
            $bln = "Desember ";
            break;
        }

        $data = array(
            'report_g' => $this->M_report->get_data_gperawatan($bulan_jd, $tahun_jd),
            'report_l' => $this->M_report->get_data_glperawatan($bulan_jd, $tahun_jd),
            'bulan' => $bln,
            'tahun' => $tahun_jd
        );
        $this->load->view('report/report_gpr', $data);
    }

    function report_perbaikan(){
        $this->load->view('report/perbaikan');
    }

    function get_report_perbaikan(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->M_report->get_data_perbaikan($tgl_a, $tgl_s);
        $this->load->view('report/report_prb', $data);
    }

    function get_report_prb_harian(){
        $tgl_prbk = date('Y-m-d', strtotime($this->input->post('tgl_prb_keg')));

        $report_prb_hr = $this->M_report->get_data_prb_hr($tgl_prbk);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<html>
        <head>
            <style>
                table{
                    border-collapse: collapse;
                }
                table, th, td{
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <img src = "'.base_url('assets/bootstrap/image/logo_new1.png').'" height="42" weight="42">
            <h4 align="center">Laporan Harian Perbaikan</h4><br><p></p>
            <p>Tanggal :'.date('d-m-Y', strtotime($tgl_prbk)).'</p>
            <table border="1">
            <tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Kegiatan</th>
            <th align="center">Kode Aset</th>
            <th align="center">Nama Barang</th>
            <th align="center">Sparepart</th>
            <th align="center">Ruang</th>
            <th align="center">Keterangan</th>
        </tr>');
        $i = 0;
        foreach($report_prb_hr as $row){
            $i++;
            $mpdf->WriteHTML('<tr >
            <td align="center">'.$i.'</td>
            <td>'.date('d-m-Y', strtotime($tgl_prbk)).'</td>
            <td>'.$row->kd_aset.'</td>
            <td>'.$row->nm_inv.'</td>
            <td>'.$row->sp_gt.'</td>
            <td>'.$row->vc_n_gugus.'</td></tr>
            <td>'.$row->ket_pr.'</td>
            ');
        }
        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }

    function get_report_perbaikanm(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));
        // $data['report_p'] = $this->M_report->get_data_perbaikan($tgl_a, $tgl_s);
        
        $data = array(
            'report_p' => $this->M_report->get_data_perbaikan($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );
        $report_p = $this->M_report->get_data_perbaikan($tgl_a, $tgl_s);

        $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_prb1', $data, true);
        // $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<html>
        <head>
            <style>
                table{
                    border-collapse: collapse;
                }
                table, th, td{
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <img src = "'.base_url('assets/bootstrap/image/logo_new1.png').'" height="42" weight="42">
            <h4 align="center">Laporan Perbaikan Inventaris</h4><br><p></p>
            <p>Tanggal :'.date('d-m-Y', strtotime($tgl_a)).' sampai '.date('d-m-Y', strtotime($tgl_s)).'</p>
            <table border="1">				
		    <tr>
            <th align="center" width="5%">No</th>
            <th align="center">Tanggal Perbaikan</th>
            <th align="center" width="13%">Kode Aset</th>
            <th align="center">Nama Barang</th>
            <th align="center">Ruang</th>
            <th align="center">Jenis Perbaikan</th>
            <th align="center">Sparepart</th>
            <th align="center">Biaya</th>
            <th align="center">Keterangan</th>
            </tr>');
        $i=0;
        foreach ($report_p as $row) 
        {
        $i++;
        $mpdf->WriteHTML('<tr >
        <td align="center">'.$i.'</td>
        <td>'.date('d-m-Y', strtotime($row->tgl_inv_pr)).'</td>
        <td>'.$row->kd_aset.'</td>
        <td>'.$row->nm_inv.'</td>
        <td>'.$row->vc_n_gugus.'</td>
        ');
        $data = $row->jns_pr;
        if($data=='1'){$mpdf->WriteHTML('<td>Pengecekan</td>');
        }else if($data=='2'){$mpdf->WriteHTML('<td>Ganti Sparepart</td>');
        }else if($data=='3'){$mpdf->WriteHTML('<td>Service</td>');
        }else{$mpdf->WriteHTML('<td></td> ');}

        $mpdf->WriteHTML('<td>'.$row->sp_gt.'</td>');
        if(($row->sp_by) != 0 or ($row->sp_by) != NULL){
            $uang = $row->sp_by;
            $hasil_rupiah = "Rp ".number_format($uang,2,',','.');
            $mpdf->WriteHTML('<td>'.$hasil_rupiah.'</td>');
        }else{$mpdf->WriteHTML('<td></td>');}

        $mpdf->WriteHtml('<td>'.$row->ket_pr.'</td>');
       }
       $mpdf->WriteHTML('</table>');
       $mpdf->Output();
}

    function get_report_prb(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));

        $report_p = $this->M_report->get_data_perbaikan($tgl_a, $tgl_s);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Tanggal Perbaikan')
                    ->setCellValue('C1', 'Kode Aset')
                    ->setCellValue('D1', 'Nama Barang')
                    ->setCellValue('E1', 'Ruang')
                    ->setCellValue('F1', 'Jenis Perbaikan')
                    ->setCellValue('G1', 'Sparepart')
                    ->setCellValue('H1', 'Biaya')
                    ->setCellValue('I1', 'Keterangan');
        $kolom = 2;
        $nomor = 1;
        
        foreach($report_p as $row){

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$kolom, $nomor)
                        ->setCellValue('B'.$kolom, date('d-m-Y', strtotime($row->tgl_inv_pr)))
                        ->setCellValue('C'.$kolom, $row->kd_aset)
                        ->setCellValue('D'.$kolom, $row->nm_inv)
                        ->setCellValue('E'.$kolom, $row->vc_n_gugus);
            $data = $row->jns_pr;
            if($data == '1'){
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$kolom, 'Pengecekan');
            }else if($data == '2'){
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$kolom, 'Ganti Sparepart');
            }else if($data == '3'){
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$kolom, 'Service');
            }else{
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('F'.$kolom, ' ');
            }

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('G'.$kolom, $row->sp_gt);

            if(($row->sp_by) != 0 || ($row->sp_by) != Null){
                $uang = $row->sp_by;
                $hasil_rupiah = "Rp ".number_format($uang,2,',','.');
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('H'.$kolom, $hasil_rupiah);
            }

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('I'.$kolom, $row->ket_pr);
            
            $kolom++;
            $nomor++;
        }
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Perbaikan.xlsx"');
		// header('Content-Disposition: attachment;filename="Data_PKS.xls"');
	  	header('Cache-Control: max-age=0');

	    $writer->save('php://output');
    }

    function get_report_gperbaikan(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);

        switch($bulan_jd){
            case 1:
            $bln = "Januari ";
            break;
            case 2:
            $bln = "Februari ";
            break;
            case 3:
            $bln = "Maret ";
            break;
            case 4:
            $bln = "April ";
            break;
            case 5:
            $bln = "Mei ";
            break;
            case 6:
            $bln = "Juni ";
            break;
            case 7:
            $bln = "Juli ";
            break;
            case 8:
            $bln = "Agustus ";
            break;
            case 9:
            $bln = "September ";
            break;
            case 10:
            $bln = "Oktober ";
            break;
            case 11:
            $bln = "November ";
            break;
            case 12:
            $bln = "Desember ";
            break;
        }
        
        $data['report_g'] = $this->M_report->get_data_gperbaikan($bulan_jd, $tahun_jd);
        $data = array(
            'report_g' => $this->M_report->get_data_gperbaikan($bulan_jd, $tahun_jd),
            'bulan' => $bln,
            'tahun' => $tahun_jd
        );
        $this->load->view('report/report_gprb', $data);
    }

    function report_telat(){
        $this->load->view('report/telat');
    }

    function get_report_telat(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);
        $data['report_p'] = $this->M_report->get_data_telat($tgl_a, $tgl_s);
        $this->load->view('report/report_tlt', $data);
    }

    function get_report_telatm(){
        $tgl_a = date('Y-m-d', strtotime($this->input->post('tgl_jd')));
        $tgl_s = date('Y-m-d', strtotime($this->input->post('tgl_jd_s')));
        // $data['report_p'] = $this->M_report->get_data_telat($tgl_a, $tgl_s);
        
        $data = array(
            'report_p' => $this->M_report->get_data_telat($tgl_a, $tgl_s),
            'report_l' => $this->M_report->get_data_wtelat($tgl_a, $tgl_s),
            'tgl_jd' => $tgl_a,
            'tgl_jd_s' => $tgl_s
        );
        $report_p = $this->M_report->get_data_telat($tgl_a, $tgl_s);
        $report_l = $this->M_report->get_data_wtelat($tgl_a, $tgl_s);

        $mpdf = new \Mpdf\Mpdf();
        // $html = $this->load->view('report/report_tlt1', $data, true);
        $mpdf->SetFontSize('12');
        // $mpdf->Image(base_url('assets/bootstrap/image/logo_new1.png'), 0, 0, 270, 297, png, '', true, true);
        // $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<html>
        <head>
            <style>
                table{
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <img src = "'.base_url('assets/bootstrap/image/logo_new1.png').'" height="42" weight="42">
            <h4 align="center">Laporan Keterlambatan Perawatan Inventaris</h4><br><p></p>
            <p>Tanggal :'.date('d-m-Y', strtotime($tgl_a)).' sampai '.date('d-m-Y', strtotime($tgl_s)).'</p>
            <table border="1">				
            <tr>
                <th align="center" width="5%">No</th>
                <th align="center">Tanggal Jadwal</th>
                <th align="center" width="13%">Kode Aset</th>
                <th align="center" width="20%">Jadwal</th>
                <th align="center">Nama Barang</th>
                <th align="center">Ruang</th>
                <th align="center">Tanggal Pengerjaan</th>
                <th align="center">Selisih Hari</th>
                </tr>');
        $i=0;
        foreach ($report_p as $row) 
            {
                $i++;
                $mpdf->WriteHTML('<tr >
                <td align="center">'.$i.'</td>
                <td>'.date('d-m-Y', strtotime($row->tgl_jd)).'</td>
                <td>'.$row->kd_aset.'</td>
                <td>'.$row->nm_jd.'</td>
                <td>'.$row->nm_inv.'</td>
                <td>'.$row->vc_n_gugus.'</td>
                <td>'.date('d-m-Y', strtotime($row->tgl_trs)).'</td>
                ');
                $tgl_s = strtotime($row->tgl_trs);
                $tgl_a = strtotime($row->tgl_jd);
                $selisih = $tgl_s - $tgl_a;
                $mpdf->WriteHTML('<td>'.floor($selisih / (60 * 60 * 24)).' Hari</td></tr>');
            }
        $mpdf->WriteHTML('</table>');
        $mpdf->Output();
    }

    function get_report_gtelat(){
        $bulan_jd = $this->input->post('bulan_jd', TRUE);
        $tahun_jd = $this->input->post('tahun_jd', TRUE);

        switch($bulan_jd){
            case 1:
            $bln = "Januari ";
            break;
            case 2:
            $bln = "Februari ";
            break;
            case 3:
            $bln = "Maret ";
            break;
            case 4:
            $bln = "April ";
            break;
            case 5:
            $bln = "Mei ";
            break;
            case 6:
            $bln = "Juni ";
            break;
            case 7:
            $bln = "Juli ";
            break;
            case 8:
            $bln = "Agustus ";
            break;
            case 9:
            $bln = "September ";
            break;
            case 10:
            $bln = "Oktober ";
            break;
            case 11:
            $bln = "November ";
            break;
            case 12:
            $bln = "Desember ";
            break;
        }

        $data = array(
            'report_g' => $this->M_report->get_data_gtelat($bulan_jd, $tahun_jd),
            'bulan' => $bln,
            'tahun' => $tahun_jd
        );
        $this->load->view('report/report_gtlt', $data);
    }

    function report_sparepart(){
        $this->load->view('report/sparepart');
    }

    function get_report_sparepartm(){
        $tgl_a = $this->input->post('tgl_jd', TRUE);
        $tgl_s = $this->input->post('tgl_jd_s', TRUE);

        $data = array(
            'report_p' => $this->M_report->get_data_sparepart($tgl_a, $tgl_s),
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
            'dd_gr' => $this->M_report->get_ruang()
        );
        $this->load->view('report/riwayat_perawatan', $data);
    }

    function get_riwayat_perawatan(){
        $kd_inv = $this->input->post('kd_inv', TRUE);
        $tgl = date('Y-m-d h:i:s');
        $data = array(
            'report_p' => $this->M_report->get_riwayat_dperawatan($kd_inv),
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
            'dd_gr' => $this->M_report->get_ruang()
        );
        $this->load->view('report/riwayat_perbaikan', $data);
    }

    function get_riwayat_perbaikan(){
        $kd_inv = $this->input->post('kd_inv', TRUE);
        $tgl = date('Y-m-d h:i:s');
        $data = array(
            'report_p' => $this->M_report->get_riwayat_dperbaikan($kd_inv),
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

        $inv = $this->M_report->get_inv($id_ruang);
        $lists = "<tr><td><b>Kode Inventaris</b></td><td><b>Kode Aset</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>";

        foreach ($inv as $row){
            $lists = '<tr><td>'.$row->kd_inv.'</td><td>'.$row->kd_aset.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
        }

        $callback = array('list_inv'=>$lists); 
        echo json_encode($callback); 
    }
}
?>