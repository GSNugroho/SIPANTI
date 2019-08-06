<?php
class mutasi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mutasi');
    }

    public function index(){
        $data['inv_mutasi'] = $this->m_mutasi->get_data();
        $this->load->view('mutasi/mutasi', $data);
    }

    function create(){
        $data = array(
            'dd_gr' => $this->m_mutasi->get_ruang(),
            'gki' => $this->m_mutasi->get_kdinv()
        );
        $this->load->view('mutasi/mutasi_form',$data);
    }

    function create_action(){
        $data = array(
            'kd_inv_mts' => $this->input->post('kd_inv_mts', TRUE),
            'id_ruang_mts' => $this->input->post('id_ruang', TRUE),
            'jmlh_mts' => $this->input->post('jmlh_mts',TRUE),
            'tgl_terima_mts' => $this->input->post('tgl_terima_mts', TRUE),
            'status_mts' => $this->input->post('status_mts', TRUE),
            'kondisi_mts' => $this->input->post('kondisi_mts', TRUE),
            'ket_mts' => $this->input->post('ket_mts', TRUE),
            'alasan_mts' => $this->input->post('alasan_mts', TRUE)
        );

        $this->m_mutasi->insert($data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect(site_url(mutasi));
    }

    function update($id){
        $row = $this->m_mutasi->get_by_id($id);

        if($row) {
            $data = array(
                'kd_inv_mts' => set_value('kd_inv_mts', $row->kd_inv_mts),
                'id_ruang_mts' => set_value('id_ruang_mts', $row->id_ruang_mts),
                'jmlh_mts' => set_value('jmlh_mts', $row->jmlh_mts),
                'tgl_terima_mts' => set_value('tgl_terima_mts', $row->tgl_terima_mts),
                'status_mts' => set_value('status_mts', $row->status_mts),
                'kondisi_mts' => set_value('kondisi_mts', $row->kondisi_mts),
                'ket_mts' => set_value('ket_mts', $row->ket_mts),
                'alasan_mts' => set_value('alasan_mts', $row->alasan_mts),
                'dd_gr' => $this->m_mutasi->get_ruang()
            );
            $this->load->view('mutasi/mutasi_form_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(base_url('mutasi'));
        }
    }

    function update_action(){
        $data = array(
            'kd_inv_mts' => $this->input->post('kd_inv_mts', TRUE),
            'id_ruang_mts' => $this->input->post('id_ruang_mts', TRUE),
            'jmlh_mts' => $this->input->post('jmlh_mts',TRUE),
            'tgl_terima_mts' => $this->input->post('tgl_terima_mts', TRUE),
            'status_mts' => $this->input->post('status_mts', TRUE),
            'kondisi_mts' => $this->input->post('kondisi_mts', TRUE),
            'ket_mts' => $this->input->post('ket_mts', TRUE),
            'alasan_mts' => $this->input->post('alasan_mts', TRUE)
        );
        $this->m_mutasi->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message','Ubah Data Berhasil');
        redirect(base_url('mutasi'));
    }

    function delete($id){
        $row = $this->m_mutasi->get_by_id($id);

        if($row){
            $this->m_mutasi->delete($id);
            $this->session->set_flashdata('message','Hapus Data Berhasil');
            redirect(base_url('mutasi'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(base_url('mutasi'));
        }
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->m_mutasi->get_inv($id_ruang);
        $lists = "<tr><td><b>Kode Inventaris</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>";

        foreach ($inv as $row){
            $lists .= '<tr><td>'.$row->kd_inv.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
            }

            $callback = array('list_inv'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota    
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function dt_tbl(){
        ## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($searchValue != ''){
		$searchQuery = " and (kd_inv_mts like '%".$searchValue."%' or 
		nm_inv like '%".$searchValue."%' or 
		tgl_terima_mts like '%".$searchValue."%' or 
		jmlh_mts like'%".$searchValue."%' or
		status_mts like'%".$searchValue."%' or
		kondisi_mts like'%".$searchValue."%' or
		alasan_mts like'%".$searchValue."%' or
		vc_n_gugus like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->m_mutasi->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->m_mutasi->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->m_mutasi->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		$data[] = array( 
			"tgl_terima_mts"=>date('d-M-Y', strtotime($row->tgl_terima_mts)),
			"kd_inv_mts"=>$row->kd_inv_mts,
			"nm_inv"=>$row->nm_inv,
			"jmlh_mts"=>$row->jmlh_mts,
			"vc_n_gugus"=>$row->vc_n_gugus,
			"status_mts"=>$row->status_mts,
            "kondisi_mts"=>$row->kondisi_mts,
            "alasan_mts"=>$row->alasan_mts,
			"action"=>anchor('mutasi/update/'.$row->kd_inv_mts,'Edit'),
			"action2"=>anchor('mutasi/delete/'.$row->kd_inv_mts,'Hapus')
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
    }
}
?>