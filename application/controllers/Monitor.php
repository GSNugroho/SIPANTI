<?php
class Monitor extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_monitor');
		}
 
	public function index(){
		/*$this->load->database();
		$jumlah_data = $this->M_monitor->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'monitor/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 50;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['inv_barang'] = $this->M_monitor->data($config['per_page'],$from);
		*/
		
		$data['inv_barang'] = $this->M_monitor->get_data();
		$this->load->view('monitor/monitor', $data);
		}
		
	function create(){
		/*$data = array(
		'button' => 'create',
        'action' => site_url('monitor/create_action'),
	    'id_inv' => set_value('id_inv'),
		'kd_inv' => set_value('kd_inv'),
	    'nm_inv' => set_value('nm_inv'),
	    'merk' => set_value('merk'),
		'satuan' => set_value('satuan'),
		'jumlah' => set_value('jumlah'),
		'tgl_terima' => set_value('tgl_terima'),
		'status' => set_value('status'),
		'kondisi' => set_value('kondisi'),
		'ket' => set_value('ket'),
		'kd_bantu' => set_value('kd_bantu'),
		'no_aset' => set_value('no_aset'),
		'id_ruang' => set_value('id_ruang'),
		'kd_brg' => set_value('kd_brg'),
		'foto_brg' => set_value('foto_brg'),
		'foto_qr' => set_value('foto_qr'),
		'id_urut' => set_value('id_urut'),
		'aktif' => set_value('aktif'),
		'jns_brg' => set_value('jns_brg'),
		'cetak' => set_value('cetak'),
		'kd_aset' => set_value('kd_aset'),
		'dt_create' => set_value('dt_create'),
		'bt_ti' => set_value('bt_ti'),
		'fl_harga' => set_value('fl_harga'),
		'vc_op_update' => set_value('vc_op_update'),
		'dt_tgl_update' => set_value('dt_tgl_update'),
		'vc_op' => set_value('vc_op')
		);*/

		$data['dd_gm'] = $this->M_monitor->get_merk();
		$data = array(
			'dd_gm' => $this->M_monitor->get_merk(),
			'dd_gr' => $this->M_monitor->get_ruang(),
			'dd_gj' => $this->M_monitor->get_jenis(),
			'dd_gg' => $this->M_monitor->get_golongan()
		);
		 $this->load->view('monitor/monitor_form', $data);
	}
	public function create_action(){
		/*$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {*/
			$data = array(
			'nm_inv' => $this->input->post('nm_inv', TRUE),
			'merk' => $this->input->post('merk', TRUE),
			'satuan' => $this->input->post('satuan', TRUE),
			'jmlh' => $this->input->post('jmlh', TRUE),
			'tgl_terima' => $this->input->post('tgl_terima', TRUE),
			'status' => $this->input->post('status', TRUE),
			'kondisi' => $this->input->post('kondisi', TRUE),
			'ket' => $this->input->post('ket', TRUE),
			'kd_bantu' => $this->input->post('kd_bantu', TRUE),
			'no_aset' => $this->input->post('no_aset', TRUE),
			'id_ruang' => $this->input->post('id_ruang', TRUE),
			'foto_brg' => $this->input->post('foto_brg', TRUE),
			'foto_qr' => $this->input->post('foto_qr', TRUE),
			'id_urut' => $this->input->post('id_urut', TRUE),
			'aktif' => $this->input->post('aktif', TRUE),
			'jns_brg' => $this->input->post('jns_brg', TRUE),
			'cetak' => $this->input->post('cetak', TRUE),
			'kd_aset' => $this->input->post('kd_aset', TRUE),
			'kd_inv' => $this->kode()
						
			);
			
			$this->M_monitor->insert($data);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
			redirect(site_url('Monitor'));
		//}
	}
	
	function update($id){
		$row = $this->M_monitor->get_by_id($id);
		
		if ($row) {
			$data = array (
			'id_inv' => set_value('id_inv', $row->id_inv),
			'kd_inv' => set_value('kd_inv', $row->kd_inv),
			'nm_inv' => set_value('nm_inv', $row->nm_inv),
			'merk' => set_value('merk', $row->merk),
			'satuan' => set_value('satuan', $row->satuan),
			'jmlh' => set_value('jmlh', $row->jmlh),
			'tgl_terima' => set_value('tgl_terima', date('m/d/Y', strtotime($row->tgl_terima ))),
			'status' => set_value('status', $row->status),
			'kondisi' => set_value('kondisi', $row->kondisi),
			'ket' => set_value('ket', $row->ket),
			'kd_bantu' => set_value('kd_bantu', $row->kd_bantu),
			'no_aset' => set_value('no_aset', $row->no_aset),
			'id_ruang' => set_value('id_ruang', $row->id_ruang),
			'kd_brg' => set_value('kd_brg', $row->kd_brg),
			'foto_brg' => set_value('foto_brg', $row->foto_brg),
			'foto_qr' => set_value('foto_qr', $row->foto_qr),
			'id_urut' => set_value('id_urut', $row->id_urut),
			'aktif' => set_value('aktif', $row->aktif),
			'jns_brg' => set_value('jns_brg', $row->jns_brg),
			'cetak' => set_value('cetak', $row->cetak),
			'kd_aset' => set_value('kd_aset', $row->kd_aset),
			'dt_create' => set_value('dt_create', $row->dt_create),
			'bt_ti' => set_value('bt_ti', $row->bt_ti),
			'fl_harga' => set_value('fl_harga', $row->fl_harga),
			'vc_op_update' => set_value('vc_op_update', $row->vc_op_update),
			'dt_tgl_update' => set_value('dt_tgl_update', $row->dt_tgl_update),
			'vc_op' => set_value('vc_op', $row->vc_op),
			'dd_gm' => $this->M_monitor->get_merk(),
			'dd_gr' => $this->M_monitor->get_ruang(),
			'dd_gj' => $this->M_monitor->get_jenis(),
			'dd_gg' => $this->M_monitor->get_golongan()
			);
				$this->load->view('monitor/monitor_form_edit', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}
	
	function update_action(){
			$data = array(
			'nm_inv' => $this->input->post('nm_inv', TRUE),
			'merk' => $this->input->post('merk', TRUE),
			'satuan' => $this->input->post('satuan', TRUE),
			'jmlh' => $this->input->post('jmlh', TRUE),
			'tgl_terima' => $this->input->post('tgl_terima', TRUE),
			'status' => $this->input->post('status', TRUE),
			'kondisi' => $this->input->post('kondisi', TRUE),
			'ket' => $this->input->post('ket', TRUE),
			'kd_bantu' => $this->input->post('kd_bantu', TRUE),
			'no_aset' => $this->input->post('no_aset', TRUE),
			'id_ruang' => $this->input->post('id_ruang', TRUE),
			'foto_brg' => $this->input->post('foto_brg', TRUE),
			'foto_qr' => $this->input->post('foto_qr', TRUE),
			'id_urut' => $this->input->post('id_urut', TRUE),
			'aktif' => $this->input->post('aktif', TRUE),
			'jns_brg' => $this->input->post('jns_brg', TRUE),
			'cetak' => $this->input->post('cetak', TRUE),
			'kd_aset' => $this->input->post('kd_aset', TRUE),
			'dt_tgl_update' => date('Y-m-d h:i:s')
			);

			$this->M_monitor->update($this->input->post('kd_inv', TRUE), $data);
			$this->session->set_flashdata('message','Ubah Data Berhasil');
			redirect(base_url('Monitor'));
	}

	function delete($id){
		$row = $this->M_monitor->get_by_id($id);

		if($row){
			$this->M_monitor->delete($id);
			$this->session->set_flashdata('message','Hapus Data Berhasil');
		}else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}
	
	function read($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
			'kd_inv' => set_value('kd_inv', $row->kd_inv),
			'nm_inv' => set_value('nm_inv', $row->nm_inv),
			'merk' => set_value('merk', $row->merk),
			'satuan' => set_value('satuan', $row->satuan),
			'jmlh' => set_value('jmlh', $row->jmlh),
			'tgl_terima' => set_value('tgl_terima', date('m/d/Y', strtotime($row->tgl_terima ))),
			'status' => set_value('status', $row->status),
			'kondisi' => set_value('kondisi', $row->kondisi),
			'ket' => set_value('ket', $row->ket),
			'kd_bantu' => set_value('kd_bantu', $row->kd_bantu),
			'no_aset' => set_value('no_aset', $row->no_aset),
			'id_ruang' => set_value('id_ruang', $row->id_ruang),
			'kd_brg' => set_value('kd_brg', $row->kd_brg),
			'foto_brg' => set_value('foto_brg', $row->foto_brg),
			'foto_qr' => set_value('foto_qr', $row->foto_qr),
			'id_urut' => set_value('id_urut', $row->id_urut),
			'aktif' => set_value('aktif', $row->aktif),
			'jns_brg' => set_value('jns_brg', $row->jns_brg),
			'cetak' => set_value('cetak', $row->cetak),
			'kd_aset' => set_value('kd_aset', $row->kd_aset),
			'dt_create' => set_value('dt_create', $row->dt_create),
			'bt_ti' => set_value('bt_ti', $row->bt_ti),
			'fl_harga' => set_value('fl_harga', $row->fl_harga),
			'vc_op_update' => set_value('vc_op_update', $row->vc_op_update),
			'dt_tgl_update' => set_value('dt_tgl_update', $row->dt_tgl_update),
			'vc_op' => set_value('vc_op', $row->vc_op),
			);
			$this->load->view('monitor/monitor_read', $data);
		}else{
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}


	function kode(){
        $kode = $this->M_monitor->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "INV";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
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
		$searchQuery = " and (
		kd_inv like '%".$searchValue."%' or 
		nm_inv like '%".$searchValue."%' or 
		tgl_terima like '%".$searchValue."%' or 
		vc_nm_merk like '%".$searchValue."%' or 
		vc_nm_jenis like'%".$searchValue."%' or
		nm_gol like'%".$searchValue."%' or
		vc_n_gugus like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		$cek = '<a href="perawatan/cek/'.$row->kd_inv.'" class="btn btn-success btn-circle">
		<i class="fas fa-check"></i>
		</a>';
		
		$button = '
		<a href="monitor/read/'.$row->kd_inv.'" class="btn btn-info btn-circle">
		<i class="fas fa-info-circle"></i>
		</a>
		<a href="monitor/update/'.$row->kd_inv.'" class="btn btn-warning btn-circle">
        <i class="fas fa-edit"></i>
        </a>
		<a href="monitor/delete/'.$row->kd_inv.'" class="btn btn-danger btn-circle">
		<i class="fas fa-trash"></i>
		</a>
		';

		$data[] = array( 
			"kd_inv"=>$row->kd_inv,
			"tgl_terima"=>date('d-M-Y', strtotime($row->tgl_terima)),
			"nm_inv"=>$row->nm_inv,
			"vc_nm_merk"=>$row->vc_nm_merk,
			"vc_nm_jenis"=>$row->vc_nm_jenis,
			"nm_gol"=>$row->nm_gol,
			"vc_n_gugus"=>$row->vc_n_gugus,
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
}
?>