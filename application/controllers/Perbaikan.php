<?php
class Perbaikan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
        $this->load->model('M_perbaikan');
        }else {
            echo redirect(base_url('../'));
        }
    }

    public function index(){
        $data = array(
            'inv_perbaikan' => $this->M_perbaikan->get_data()
        );
        $this->load->view('perbaikan/perbaikan',$data);
    }

    public function create(){
        $data = array(
            'dd_gr' => $this->M_perbaikan->get_ruang(),
            'gki' => $this->M_perbaikan->get_kdinv(),
            'get_barang' => $this->M_perbaikan->get_brg()
        );
        $this->load->view('perbaikan/perbaikan_form', $data);
    }

    function create_action(){
        $dl_sts = '1';
        $data = array(
            'kd_inv_pr' => $this->input->post('kd_inv_pr', TRUE),
            'kd_ruang' => $this->input->post('id_ruang', TRUE),
            'tgl_inv_pr' => date('Y-m-d', strtotime($this->input->post('tgl_inv_pr'))),
            'jns_kr' => $this->input->post('jns_kr', TRUE),
            'jns_pr' => $this->input->post('jns_pr', TRUE),
            'sp_gt' => $this->input->post('sp_gt', TRUE),
            'sp_by' => $this->input->post('sp_by', TRUE),
            'ket_pr' => $this->input->post('ket', TRUE),
            'dl_sts' => $dl_sts,
            'kd_pr' => $this->kode()
        );
        $this->M_perbaikan->insert($data);
        $this->session->set_flashdata('message','Data Perbaikan Berhasil Ditambahkan');
        redirect(site_url('Perbaikan'));
    }

    function update($id){
        $row = $this->M_perbaikan->get_by_id($id);
        if(($row->prb_valid) == NULL){
        if($row){
            $data = array(
                'kd_inv_pr' => set_value('kd_inv_pr', $row->kd_inv_pr),
                'id_ruang' => set_value('id_ruang', $row->kd_ruang),
                'tgl_inv_pr' => set_value('tgl_inv_pr', date('d-m-Y', strtotime($row->tgl_inv_pr))),
                'jns_kr' => set_value('jns_kr', $row->jns_kr),
                'jns_pr' => set_value('jns_pr', $row->jns_pr),
                'sp_gt' => set_value('sp_gt', $row->sp_gt),
                'sp_by' => set_value('sp_by', $row->sp_by),
                'ket' => set_value('ket', $row->ket_pr),
                'dd_gr' => $this->M_perbaikan->get_ruang()
            );
            $this->load->view('perbaikan/perbaikan_form_edit', $data);
        } else {
            $this->session->set_flashdata('messages', 'Data Perbaikan Tidak Ditemukan');
            redirect(base_url('Perbaikan'));
        }
    }else{
        redirect(base_url('Perbaikan'));
    }
    }

    function update_action(){
        $data = array(
            'kd_inv_pr' => $this->input->post('kd_inv_pr', TRUE),
            'kd_ruang' => $this->input->post('id_ruang', TRUE),
            'tgl_inv_pr' => date('Y-m-d', strtotime($this->input->post('tgl_inv_pr'))),
            'jns_kr' => $this->input->post('jns_kr', TRUE),
            'jns_pr' => $this->input->post('jns_pr', TRUE),
            'sp_gt' => $this->input->post('sp_gt', TRUE),
            'sp_by' => $this->input->post('sp_by', TRUE),
            'ket_pr' => $this->input->post('ket_pr', TRUE)
        );
        $this->M_perbaikan->update($this->input->post('kd_pr', TRUE), $data);
		$this->session->set_flashdata('message','Ubah Data Perbaikan Berhasil');
		redirect(base_url('Perbaikan'));
    }

    function read($id){
        $row = $this->M_perbaikan->get_r_id($id);
        if($row){
            $data = array(
                'kd_inv_pr' => set_value('kd_inv_pr', $row->kd_inv_pr),
                'nm_inv' => set_value('nm_inv', $row->nm_inv),
                'vc_n_gugus' => set_value('vc_n_gugus', $row->vc_n_gugus),
                'tgl_inv_pr' => set_value('tgl_inv_pr', $row->tgl_inv_pr),
                'jns_kr' => set_value('jns_kr', $row->jns_kr),
                'jns_pr' => set_value('jns_pr', $row->jns_pr),
                'sp_gt' => set_value('sp_gt', $row->sp_gt),
                'sp_by' => set_value('sp_by', $row->sp_by),
                'ket' => set_value('ket', $row->ket_pr),
            );
            $this->load->view('perbaikan/perbaikan_read', $data);
        }else{
            $this->session->set_flashdata('messages', 'Data Perbaikan Tidak Ditemukan');
            redirect(base_url('Perbaikan'));
        }
    }

    function list_inv(){
        $id_ruang = $this->input->post('id_ruang', TRUE);

        $inv = $this->M_perbaikan->get_inv($id_ruang);
        $lists = "<tr><td><b>Kode Inventaris</b></td><td><b>Kode Aset</b></td><td><b>Nama Barang</b></td><td><b>Nama Pengguna</b></td><td><b>Ruang</b></td><td><b>Action</b></td></tr>";

        foreach ($inv as $row){
            $lists .= '<tr><td>'.$row->kd_inv.'</td><td>'.$row->kd_aset.'</td><td>'.$row->nm_inv.'</td><td>'.$row->vc_nm_pengguna.'</td><td>'.$row->vc_n_gugus.'</td><td><a href="#" onclick=post_value("'.$row->kd_inv.'")>Pilih</a></td></tr>';
            }

            $callback = array('list_inv'=>$lists);
            echo json_encode($callback);
    }

    function autocomplete(){
            $kode = $this->input->get('term', TRUE); 

            if (isset($_GET['term'])) {
                $result = $this->M_perbaikan->get_sparepart($kode);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->vc_nm_komponen;
                    echo json_encode($arr_result);
                }
            }
            
    }

    function kode(){
        $kode = $this->M_perbaikan->get_kode();
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

    function delete_u($id){
        $row = $this->M_perbaikan->get_by_id($id);

		if($row){
			$this->M_perbaikan->delete($id);
            $this->session->set_flashdata('messages','Hapus Data Perbaikan Berhasil');
            redirect(base_url('Perbaikan'));
		}else {
			$this->session->set_flashdata('messages', 'Data Perbaikan Tidak Ditemukan');
			redirect(base_url('Perbaikan'));
		}
    }

    function delete($id){
        $row = $this->M_perbaikan->get_by_id($id);
        $dl_st = '0';
        if($row){
            $data = array(
                'dl_sts' => $dl_st
            );
        }
        $this->M_perbaikan->update_delete($id, $data);
        redirect(base_url('Perbaikan'));
    }

    function cek($id){
        $row = $this->M_perbaikan->get_by_id($id);
        $prb_valid = '1';
        if($row){
            $data = array(
                'prb_valid' => $prb_valid
            );
        }
        $this->M_perbaikan->update_v($id, $data);
        redirect(base_url('Perbaikan'));
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
        $searchByAwal = $_POST['searchByAwal'];
        $searchByAkhir = $_POST['searchByAkhir'];

		## Search 
        $searchQuery = " ";

        if(($searchByAwal != '') && ($searchByAkhir != '')){
            $searchByAwal = date('Y-m-d', strtotime($searchByAwal));
            $searchByAkhir = date('Y-m-d', strtotime(($searchByAkhir)));
            $searchQuery .= " AND (tgl_inv_pr BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
        }

		if($searchValue != ''){
		$searchQuery .= " and (tgl_inv_pr like '%".$searchValue."%' or 
		kd_inv like '%".$searchValue."%' or 
		nm_inv like'%".$searchValue."%' or
		kd_aset like'%".$searchValue."%' or
		vc_n_gugus like'%".$searchValue."%' or
		jns_kr like'%".$searchValue."%' or
		jns_pr like'%".$searchValue."%' or
		sp_gt like'%".$searchValue."%' or
		sp_by like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_perbaikan->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_perbaikan->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_perbaikan->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
            $jkr = $row->jns_kr;
            if($jkr=='1'){$jns_kr = "Ringan";
            }else if($jkr=='2'){$jns_kr = "Parah";}
            else{$jns_kr = " ";}
            
            $jpr = $row->jns_pr;
            if($jpr=='1'){$jns_pr = "Pengecekan";
            }else if($jpr=='2'){$jns_pr = "Ganti Sparepart";}
            else if($jpr=='3'){$jns_pr = "Service";}
            else{$jns_pr = " ";}
        
            $uang = $row->sp_by;
            $hasil_rupiah = "Rp ".number_format($uang,2,',','.');

            if(($row->prb_valid) == 1){
                $valid = '<a href="#" class="btn btn-secondary btn-circle">
                <i class="fas fa-check"></i>
                </a>';
            }else{
                $valid = '<a href="perbaikan/cek/'.$row->kd_pr.'" class="btn btn-success btn-circle">
                <i class="fas fa-check"></i>
                </a>';
            }

            $button = $valid.'
                        <a href="perbaikan/read/'.$row->kd_pr.'" class="btn btn-info btn-circle">
                        <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="perbaikan/update/'.$row->kd_pr.'" class="btn btn-warning btn-circle">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a href="perbaikan/delete/'.$row->kd_pr.'" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                        </a>
                        ';
            $data[] = array( 
			"tgl_inv_pr"=>date('d-m-Y', strtotime($row->tgl_inv_pr)),
            // "kd_inv"=>$row->kd_inv,
            "kd_aset"=>$row->kd_aset,
			"nm_inv"=>$row->nm_inv,
			"vc_n_gugus"=>$row->vc_n_gugus,
            // "jns_kr"=> $jns_kr,
            "jns_pr"=> $jns_pr,
            "sp_gt"=> $row->sp_gt,
            // "sp_by"=> $hasil_rupiah,
            // "ket_pr"=> $row->ket_pr,
			"action"=>$button
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

    function riwayat(){
        $id = $this->input->get('id', TRUE);

        $data = $this->M_perbaikan->riwayat($id);
        $trHtml = '';
        foreach($data as $row){
            $uang = $row->sp_by;
            $hasil_rupiah = "Rp ".number_format($uang,2,',','.');
            $trHtml .= '<tr>
                            <td>'.date('d-m-Y', strtotime($row->tgl_inv_pr)).'</td>
                            <td>'.$row->sp_gt.'</td>
                            <td>'.$hasil_rupiah.'</td>
                            <td>'.$row->ket_pr.'</td>
                        </tr>';
        }
        echo $trHtml;
        return $trHtml;
    }
}
