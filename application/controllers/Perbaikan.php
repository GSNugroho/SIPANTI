<?php
class perbaikan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perbaikan');
    }

    public function index(){
        $data = array(
            'inv_perbaikan' => $this->m_perbaikan->get_data()
        );
        $this->load->view('perbaikan/perbaikan',$data);
    }

    public function create(){
        $data = array(
            'dd_gr' => $this->m_perbaikan->get_ruang(),
            'gki' => $this->m_perbaikan->get_kdinv()
        );
        $this->load->view('perbaikan/perbaikan_form', $data);
    }

    function create_action(){
        $data = array(
            'kd_inv_pr' => $this->input->post('kd_inv_pr', TRUE),
            'kd_ruang' => $this->input->post('id_ruang', TRUE),
            'tgl_inv_pr' => $this->input->post('tgl_inv_pr', TRUE),
            'jns_kr' => $this->input->post('jns_kr', TRUE),
            'jns_pr' => $this->input->post('jns_pr', TRUE),
            'sp_gt' => $this->input->post('sp_gt', TRUE),
            'sp_by' => $this->input->post('sp_by', TRUE),
            'ket_pr' => $this->input->post('ket', TRUE),
            'kd_pr' => $this->kode()
        );
        $this->m_perbaikan->insert($data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect(site_url('perbaikan'));
    }

    function update($id){
        $row = $this->m_perbaikan->get_by_id($id);

        if($row){
            $data = array(
                'id_ruang' => set_value('id_ruang', $row->kd_ruang),
                'tgl_inv_pr' => set_value('tgl_inv_pr', $row->tgl_inv_pr),
                'jns_kr' => set_value('jns_kr', $row->jns_kr),
                'jns_pr' => set_value('jns_pr', $row->jns_pr),
                'sp_gt' => set_value('sp_gt', $row->sp_gt),
                'sp_by' => set_value('sp_by', $row->sp_by),
                'ket' => set_value('ket', $row->ket_pr),
            );
            $this->load->view('perbaikan/perbaikan_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(base_url('perbaikan'));
        }
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->m_perbaikan->get_inv($id_ruang);
        $lists = "<tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>";

        foreach ($inv as $row){
            $lists .= '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
            }

            $callback = array('list_inv'=>$lists);
            echo json_encode($callback);
    }

    function kode(){
        $kode = $this->m_perbaikan->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }
        $kodepr = $data;
        $noUrut = (int) substr($kodepr, 3, 5);
        $noUrut++;
        $char = "PRW";
        $kodebaru = $char.sprintf("%05s", $noUrut);
        return $kodebaru;
    }

    function delete($id){
        $row = $this->m_perbaikan->get_by_id($id);

		if($row){
			$this->m_perbaikan->delete($id);
            $this->session->set_flashdata('message','Hapus Data Berhasil');
            redirect(base_url('perbaikan'));
		}else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('perbaikan'));
		}
    }
}
?>