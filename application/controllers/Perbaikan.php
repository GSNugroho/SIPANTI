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
		$searchQuery = " and (tgl_inv_pr like '%".$searchValue."%' or 
		kd_inv like '%".$searchValue."%' or 
		nm_inv like'%".$searchValue."%' or
		vc_n_gugus like'%".$searchValue."%' or
		jns_kr like'%".$searchValue."%' or
		jns_pr like'%".$searchValue."%' or
		sp_gt like'%".$searchValue."%' or
		sp_by like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->m_perbaikan->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->m_perbaikan->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->m_perbaikan->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
            $jkr = $row->jns_kr;
            if($jkr=='1'){$jns_kr = "Ringan";
            }else{$jns_kr = "Parah";}
            
            $jpr = $row->jns_pr;
            if($jpr=='1'){$jns_pr = "Pengecekan";
            }else if($jpr=='2'){$jns_pr = "Ganti Sparepart";}
            else{$jns_pr = "Service";}
        
            $data[] = array( 
			"tgl_inv_pr"=>date('d-M-Y', strtotime($row->tgl_inv_pr)),
			"kd_inv"=>$row->kd_inv,
			"nm_inv"=>$row->nm_inv,
			"vc_n_gugus"=>$row->vc_n_gugus,
            "jns_kr"=> $jns_kr,
            "jns_pr"=> $jns_pr,
            "sp_gt"=> $row->sp_gt,
            "sp_by"=> $row->sp_by,
            "ket_pr"=> $row->ket_pr,
			"action"=>anchor('perawatan/update/'.$row->kd_pr,'Edit'),
			"action2"=>anchor('perawatan/delete/'.$row->kd_pr,'Hapus')
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