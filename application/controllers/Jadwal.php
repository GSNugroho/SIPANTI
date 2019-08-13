<?php
class jadwal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
    }

    public function index(){
        //Merubah Jadwal Yg Belum Dikerjakan
        $row = $this->m_jadwal->data_tlt();
        $warna = '#ff0000';
        if($row){
        $dt_tlt = $this->m_jadwal->get_data_telat();
        foreach($dt_tlt as $row) {
            $kd_jd = $row->kd_jd;
        
            $jd_wr_tlt = array(
                'color' => $warna
            );
        $this->m_jadwal->updatekonten($kd_jd, $jd_wr_tlt);
        }
    }

        //Merubah Jadwal Yg Harus Dikerjakan Hari ini
        $row = $this->m_jadwal->data_hr();
        $warna = '#FFD700';
        if($row){
        $dt_hr = $this->m_jadwal->get_data_hr();
        foreach($dt_hr as $row){
            $kd_jd = $row->kd_jd;

            $jd_wr_hr = array(
                'color' => $warna
            );
        $this->m_jadwal->updatekonten($kd_jd, $jd_wr_hr);
        }
        }
        
        $data = array(
            'dd_gr' => $this->m_jadwal->get_ruang(),
            'inv_jadwal' => $this->m_jadwal->get_data()
        );
        $this->load->view('jadwal/jadwal', $data);
    }
    

    public function coba(){
        $data = array(
            'dd_gr' => $this->m_jadwal->get_ruang(),
            'inv_jadwal' => $this->m_jadwal->get_data()
        );
        $this->load->view('jadwal/jadwal2', $data);
    }

    function create(){
        $data = array(
            'dd_gr' => $this->m_jadwal->get_ruang()
        );
        $this->load->view('jadwal/jadwal_form', $data);
    }

    public function create_action(){
        $warna = '#03e3fc';
        $dt_sts =1;
        $data = array(
        'tgl_jd' => $this->input->post('start', TRUE),
        'nm_jd' => $this->input->post('nm_jd', TRUE),
        'kd_inv' => $this->input->post('kd_inv', TRUE),
        //'color' => $this->input->post('color', TRUE),
        'color' => $warna,
        'tgl_jd_selesai' => $this->input->post('end', TRUE),
        'kd_ruang' => $this->input->post('kd_ruang', TRUE),
        'kd_jd' => $this->kode(),
        'dt_sts' => $dt_sts
        );

        $this->m_jadwal->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect(site_url('jadwal'));
    }

    public function update_action_konten(){        
        $data = array(
        'nm_jd' => $this->input->post('nm_jd', TRUE),
        'kd_inv' => $this->input->post('kd_inv', TRUE),
        'kd_ruang' => $this->input->post('kd_ruang', TRUE),
        'color' => $this->input->post('color', TRUE)
        );

        $this->m_jadwal->updatekonten($this->input->post('id_jd', TRUE), $data);
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('jadwal'));
    }
    
    public function update_action_tgl(){
        // if (isset($_POST['event'][0]) && isset($_POST['event'][1]) && isset($_POST['event'][2])){
        // $data = array(
        // // 'tgl_jd' => $this->input->post(event[1], TRUE),
        // // 'tgl_jd_selesai' => $this->input->post(event[2], TRUE)
        // 'tgl_jd' => $_POST['event'][1],
	    // 'tgl_jd_selesai' => $_POST['event'][2]
        // );

        // $data = $this->input->post();
        // $id_jd = $data['id_jd'];echo $id_jd;
        // $tgl_jd = $data['start'];echo $tgl_jd;
        // $tgl_jd_selesai = $data['end'];echo $tgl_jd_selesai;
        
        $id = $_POST['event'][0];
        $data = array (
            'tgl_jd' => $_POST['event'][1],
	        'tgl_jd_selesai' => $_POST['event'][2]
        );

       $this->m_jadwal->updatetgl($id, $data);
        // $this->m_jadwal->updatetgl($this->input->post(event[0], $data));
        $this->session->set_flashdata('message', 'Ubah Data Berhasil');
        redirect(base_url('jadwal'));
        // }else {echo 'gagal';}
    }


    
    public function delete($id){
        $row = $this->m_jadwal->get_by_id($id);

        if($row){
            $this->m_monitor->delete($id);
            $this->session_flashdata('message', 'Hapus Data Berhasil');
        }else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('jadwal'));
        }
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->m_jadwal->get_inv($id_ruang);
        $lists = "<tr>
                    <td><b>Kode Inventaris</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Nama Pengguna</b></td>
                    <td><b>Ruang</b></td>
                    <td><b>Action</b></td></tr>";     
        foreach ($inv as $row){
            $lists .= '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
            }

            $callback = array('list_inv'=>$lists); 
            echo json_encode($callback); 
    }
    
    function kode(){
        $kode = $this->m_jadwal->get_kode();
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
}
?>