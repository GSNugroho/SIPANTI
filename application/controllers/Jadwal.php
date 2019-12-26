<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jadwal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
            $this->load->model('M_jadwal');
            $this->load->model('M_perawatan');
        }else {
             echo redirect(base_url('../'));
        }
    }

    public function index(){
        
            //Merubah Jadwal Yg Belum Dikerjakan
            $row = $this->M_jadwal->data_tlt();
            $warna = '#ff0000';
            if ($row) {
                $dt_tlt = $this->M_jadwal->get_data_telat();
                foreach ($dt_tlt as $row) {
                    $kd_jd = $row->kd_jd;
        
                    $jd_wr_tlt = array(
                'color' => $warna
            );
                    $this->M_jadwal->updatekonten($kd_jd, $jd_wr_tlt);
                }
            }

            //Merubah Jadwal Yg Harus Dikerjakan Hari ini
            $row = $this->M_jadwal->data_hr();
            $warna = '#FFD700';
            if ($row) {
                $dt_hr = $this->M_jadwal->get_data_hr();
                foreach ($dt_hr as $row) {
                    $kd_jd = $row->kd_jd;

                    $jd_wr_hr = array(
                'color' => $warna
            );
                    $this->M_jadwal->updatekonten($kd_jd, $jd_wr_hr);
                }
            }
        
            $data = array(
            'dd_gr' => $this->M_jadwal->get_ruang(),
            'inv_jadwal' => $this->M_jadwal->get_data(),
            'prio_jadwal' => $this->M_jadwal->prio_jadwal()
        );
            $this->load->view('jadwal/jadwal', $data);
        }    

    public function coba(){
        $data = array(
            'dd_gr' => $this->M_jadwal->get_ruang(),
            'inv_jadwal' => $this->M_jadwal->get_data()
        );
        $this->load->view('jadwal/jadwal2', $data);
    }

    function create(){
        $data = array(
            'dd_gr' => $this->M_jadwal->get_ruang()
        );
        $this->load->view('jadwal/jadwal_form', $data);
    }

    public function create_action(){
        $warna = '#03e3fc';
        $dt_sts =1;
        $nj = $this->input->post('kd_ruang');
        $db = $this->M_jadwal->nm_ruang($nj);
        foreach($db as $row){
            $nm_jd = $row->vc_n_gugus;
        }
        $data = array(
        'tgl_jd' => $this->input->post('start', TRUE),
        'nm_jd' => $nm_jd,
        'kd_inv' => $this->input->post('kd_inv', TRUE),
        //'color' => $this->input->post('color', TRUE),
        'color' => $warna,
        'tgl_jd_selesai' => $this->input->post('end', TRUE),
        'kd_ruang' => $this->input->post('kd_ruang', TRUE),
        'kd_jd' => $this->kode(),
        'dt_sts' => $dt_sts,
        'tgl_in' => date('Y-m-d'),
        'user_in' => $_SESSION['nmUser']
        );

        $this->M_jadwal->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect(site_url('Jadwal'));
    }

    public function create_action2(){
        $warna = '#03e3fc';
        $dt_sts = 1;
        $tot = $this->M_jadwal->tot_prio();
        foreach($tot as $row){
            $all = $row->total;
        }

        for($x=0; $x<$all; $x++){
            if($_POST['tgl_jadwal'.$x] != ''){
                $kr = $this->input->post('nm_ruang'.$x);
                $db = $this->M_jadwal->kd_ruang($kr);
                foreach($db as $row){
                    $kd_rg = $row->vc_k_gugus;
                }
                $data = array(
                    'tgl_jd' => $this->input->post('tgl_jadwal'.$x, TRUE),
                    'nm_jd' => $this->input->post('nm_ruang'.$x, TRUE),
                    'kd_inv' => $this->input->post('kd_inv'.$x, TRUE),
                    'color' => $warna,
                    'tgl_jd_selesai' => date('Y-m-d', strtotime('+1 day', strtotime($this->input->post('tgl_jadwal'.$x)))),
                    'kd_ruang' => $kd_rg,
                    'kd_jd' => $this->kode(),
                    'dt_sts' => $dt_sts,
                    'tgl_in' => date('Y-m-d'),
                    'user_in' => $_SESSION['nmUser']
                );

                $this->M_jadwal->insert($data);
            }
        }
    }

    public function update_action_konten(){    
        $id = $this->input->post('kd_jd');
        $hapus = $this->input->post('delete');
        $set_time = $this->input->post('set_time');
        $validasi = $this->input->post('validasi');
        $row = $this->M_perawatan->get_by_id_jd($id);
        if($hapus == 1){
            $dlt = 0;
            $data = array(
                'dt_sts' => $dlt
            );

            $this->M_jadwal->updatekonten($this->input->post('kd_jd', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect(base_url('Jadwal'));
        }else if($set_time == 1){
            // $row = $this->M_perawatan->get_by_id_jd($id);
            if($row){
                if($row->wtm == null){
                    date_default_timezone_set("Asia/Jakarta");
                    $data = array(
                        'wtm' => date('H:i:s')
                    );
                    $this->M_perawatan->update_waktu($id, $data);
                    $this->session->set_flashdata('message', 'Waktu Mulai Perawatan Sudah Di Set');
                    redirect(base_url('Jadwal'));
                }else if($row->wts == null){
                    date_default_timezone_set("Asia/Jakarta");
                    $data = array(
                        'wts' => date('H:i:s')
                    );
                    $this->M_perawatan->update_waktu($id, $data);
                    $this->session->set_flashdata('message', 'Waktu Selesai Perawatan Sudah Di Set');
                    redirect(base_url('Jadwal'));
                }else{
                    redirect(base_url('Jadwal'));
                }
            }
        }else if($validasi == 1){
            if($row->tgl_trs != NULL){
                $j_valid = '1';
                $param = 0;
                $data = array(
                    'j_valid' => $j_valid
                );

                $stanggal = $row->tgl_jd;
                $tanggal = date('Y-m-d', strtotime('+3 month', strtotime($stanggal)));
                // echo $tanggal.'Mulai lama<br>';
                if(date('w', strtotime($tanggal)) == 0) {
                    $tanggal = date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));
                    $param = 1;
                }
                // echo $tanggal.'Mulai baru<br>';
                $nama = $row->nm_jd;
                $kdinv = $row->kd_inv;
                $warna = '#03e3fc';
                $stanggals = $row->tgl_jd_selesai;
                $tanggals = date('Y-m-d', strtotime('+3 month', strtotime($stanggals)));
                // echo $tanggals.'Selesai lama<br>';
                if($param == 1) {
                    $tanggals = date('Y-m-d', strtotime('+1 day', strtotime($tanggals)));
                }
                // echo $tanggals.'Selesai baru<br>';
                $ruang = $row->kd_ruang;
                $dt_sts = 1;
                $data3 = array(
                    'tgl_jd' => $tanggal,
                    'nm_jd' => $nama,
                    'kd_inv' => $kdinv,
                    'color' => $warna,
                    'tgl_jd_selesai' => $tanggals,
                    'kd_ruang' => $ruang,
                    'kd_jd' => $this->kode(),
                    'dt_sts' => $dt_sts,
                    'tgl_in' => date('Y-m-d'),
                    'user_in' => $_SESSION['nmUser']
                );
                $this->M_jadwal->insert($data3);
                $this->M_perawatan->update_v($id, $data);
                $this->session->set_flashdata('message', 'Validasi Perawatan Sudah Dilakukan');
                redirect(base_url('Jadwal'));
            }else{
                $this->session->set_flashdata('messages', 'Validasi Perawatan Gagal Dilakukan');
                redirect(base_url('Jadwal'));
            }
        }
    }
    
    public function update_action_tgl(){
        
        $id = $_POST['event'][0];
        $data = array (
            'tgl_jd' => $_POST['event'][1],
	        'tgl_jd_selesai' => $_POST['event'][2]
        );

       $this->M_jadwal->updatetgl($id, $data);
        // $this->M_jadwal->updatetgl($this->input->post(event[0], $data));
        $this->session->set_flashdata('message', 'Ubah Jadwal Berhasil');
        redirect(base_url('Jadwal'));
        // }else {echo 'gagal';}
    }


    
    public function delete($id){
        $row = $this->M_jadwal->get_by_id($id);

        if($row){
            $this->M_monitor->delete($id);
            $this->session->flashdata('messages', 'Hapus Jadwal Berhasil');
        }else {
            $this->session->set_flashdata('messages', 'Jadwal Tidak Ditemukan');
			redirect(base_url('Jadwal'));
        }
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->M_jadwal->get_inv($id_ruang);
        $lists = "<tr>
                    <td><b>Kode Inventaris</b></td>
                    <td><b>Kode Aset</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Nama Pengguna</b></td>
                    <td><b>Ruang</b></td>
                    <td><b>Action</b></td></tr>";     
        foreach ($inv as $row){
            $lists .= '<tr><td>'.$row->kd_inv.'</td><td>'.$row->kd_aset.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
            }

            $callback = array('list_inv'=>$lists); 
            echo json_encode($callback); 
    }
    
    function kode(){
        $kode = $this->M_jadwal->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodejadwal = $data;
        $noUrut = (int) substr($kodejadwal, 2, 6);
        $noUrut++;
        $char = "JD";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }

    function export_excel(){
        $data = array( 
			'title' => 'Jadwal Perawatan Komputer',
			'isi' => $this->M_jadwal->get_jadwal());

   		$this->load->view('jadwal/jadwal_export',$data);
    }

    function export($bb){
        // $bulan = $_POST['bb'];
        $bulan = $bb;
        $data = $this->M_jadwal->get_jadwal($bulan);

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Tanggal Perawatan')
					  ->setCellValue('C1', 'Kode Aset')
					  ->setCellValue('D1', 'Ruang')
					  ->setCellValue('E1', 'Nama Barang')
                      ->setCellValue('F1', 'Nama Pengguna');

          $kolom = 2;
          $nomor = 1;
          foreach($data as $row) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, date('d-m-Y', strtotime($row->tgl_jd)))
						   ->setCellValue('C' . $kolom, $row->kd_aset)
						   ->setCellValue('D' . $kolom, $row->vc_n_gugus)
						   ->setCellValue('E' . $kolom, $row->nm_inv)
                           ->setCellValue('F' . $kolom, $row->vc_nm_pengguna);
               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

        // header("Pragma: public");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Type: application/force-download");
        // header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
		header('Content-Disposition: attachment;filename="Jadwal_Perawatan.xls"');
		// header('Content-Disposition: attachment;filename="Data_PKS.xls"');
	  	header('Cache-Control: max-age=0');

	    $writer->save('php://output');
    }
}
?>