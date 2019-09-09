<?php
class Monitor extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_monitor');
		}
 
	public function index(){
		
		$this->load->view('monitor/monitor');
		}
		
	function create(){
		
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
			$type = "";
			$j_type = $this->input->post('tipe_aset');
			if($j_type == 1){$type = "PCB";}else
			if($j_type == 2){$type = "PCR";}else
			if($j_type == 3){$type = "PRD";}else
			if($j_type == 4){$type = "PRF";}else
			if($j_type == 5){$type = "PRL";}else
			if($j_type == 6){$type = "PRT";}else
			if($j_type == 7){$type = "LCD";}else
			if($j_type == 8){$type = "UPS";}
		
			$kodeaset = $this->kode_aset($type);

			$sts = "";
			$status = $this->input->post('status');
			if($status == 1){$sts = "Beli";}else
			if($status == 2){$sts = "Beli Bekas";}else
			if($status == 3){$sts = "Mutasi";}else
			if($status == 4){$sts = "Pemberian";}else
			if($status == 5){$sts = "Pindahan";}else
			if($status == 6){$sts = "Rakitan";}

			$satuan ="";
			$dsatuan = $this->input->post('satuan');
			if($dsatuan == 1){$satuan = "Buah";}else
			if($dsatuan == 2){$satuan = "Set";}else
			if($dsatuan == 3){$satuan = "Unit";}

			$kondisi ="";
			$dkon = $this->input->post('kondisi');
			if($dkon == 1){$kondisi = "Baik";}else
			if($dkon == 2){$kondisi = "Kurang Baik";}else
			if($dkon ==3){$kondisi = "Rusak";}

			$bt_ti = 1;
			$vc_kd_inv = "-";
			$aktif = 1;
			//no aset
			$gol = $this->input->post('kd_bantu');
			$rng = $this->input->post('id_ruang');
			$tgl_m = $this->input->post('tgl_terima');
			$merk = $this->input->post('merk');
			$no_gol = '0'.$gol;
			$id_urut = $this->urut($rng, $tgl_m, $merk);
			$kd_brg = $this->no_aset($no_gol, $rng, $tgl_m, $merk, $id_urut);
			$no_as = $this->no_as($no_gol, $rng, $tgl_m, $merk);
			

			$data = array(
			'nm_inv' => $this->input->post('nm_inv', TRUE),
			'merk' => $this->input->post('merk', TRUE),
			'satuan' => $satuan,
			'jmlh' => $this->input->post('jmlh', TRUE),
			'tgl_terima' => $this->input->post('tgl_terima', TRUE),
			'status' => $sts,
			'kondisi' => $kondisi,
			'ket' => $this->input->post('ket', TRUE),
			'kd_bantu' => $this->input->post('kd_bantu', TRUE),
			'no_aset' => $no_as,
			'kd_brg' => $kd_brg,
			'id_ruang' => $this->input->post('id_ruang', TRUE),
			// 'foto_brg' => $this->input->post('foto_brg', TRUE),
			// 'foto_qr' => $this->input->post('foto_qr', TRUE),
			'id_urut' => $id_urut,
			'aktif' => $aktif,
			'jns_brg' => $this->input->post('jns_brg', TRUE),
			'cetak' => $this->input->post('cetak', TRUE),
			'kd_aset' => $kodeaset,
			'dt_create' => $this->input->post('tgl_terima', TRUE),
			'bt_ti' => $bt_ti,
			'kd_inv' => $this->kode()
			);
			
			$vc_online = "ONLINE";
			$vc_petugas = "a";
			$bt_aktif = 1;
			$kd_urut = $this->kode_urut($type);
			$kd_barang = $this->in_kd_barang();

			$dataaset = array(
			'vc_nm_barang' => $kodeaset,
			'vc_kd_inv' => $vc_kd_inv,
			'vc_kd_jenis' => $this->input->post('jns_brg', TRUE),
			'vc_kd_aktv' => $this->input->post('aset_aktif', TRUE),
			'vc_sn' => $this->input->post('sn', TRUE),
			'vc_spesifikasi' => $this->input->post('a_spes', TRUE),
			'vc_online' => $vc_online,
			'vc_lokasi' => $this->input->post('id_ruang', TRUE),
			'vc_kd_kondisi' => $kondisi,
			'vc_nm_pengguna' => $this->input->post('nm_pengg', TRUE),
			'dt_tgl_beli' => $this->input->post('tgl_terima', TRUE),
			'dt_tgl_habis' => $this->input->post('tgl_terima', TRUE),
			'dt_create_date' => $this->input->post('tgl_terima', TRUE),
			'vc_petugas' => $vc_petugas,
			'bt_aktif' => $bt_aktif,
			'vc_model' => $type,
			'kd_urut' => $kd_urut,
			'in_kd_barang' => $kd_barang
			);
			$this->M_monitor->insert($data);
			$this->M_monitor->insertaset($dataaset);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
			redirect(site_url('Monitor'));
		
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
			'tgl_terima' => set_value('tgl_terima', date('Y-m-d', strtotime($row->tgl_terima ))),
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
			'dd_gg' => $this->M_monitor->get_golongan(),
			
			'nm_pengg' => set_value('vc_nm_pengguna', $row->vc_nm_pengguna),
			'a_spes' => set_value('vc_spesifikasi', $row->vc_spesifikasi),
			'sn' => set_value('vc_sn', $row->vc_sn),
			'aset_aktif' => set_value('vc_kd_aktv', $row->vc_kd_aktv),
			'vc_model' => set_value('vc_model', $row->vc_model)
			);
				$this->load->view('monitor/monitor_form_edit', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}
	
	function update_action(){
			$sts = "";
			$status = $this->input->post('status');
			if($status == 1){$sts = "Beli";}else
			if($status == 2){$sts = "Beli Bekas";}else
			if($status == 3){$sts = "Mutasi";}else
			if($status == 4){$sts = "Pemberian";}else
			if($status == 5){$sts = "Pindahan";}else
			if($status == 6){$sts = "Rakitan";}

			$satuan ="";
			$dsatuan = $this->input->post('satuan');
			if($dsatuan == 1){$satuan = "Buah";}else
			if($dsatuan == 2){$satuan = "Set";}else
			if($dsatuan == 3){$satuan = "Unit";}
			$data = array(
			'nm_inv' => $this->input->post('nm_inv', TRUE),
			'merk' => $this->input->post('merk', TRUE),
			'satuan' => $satuan,
			'jmlh' => $this->input->post('jmlh', TRUE),
			'tgl_terima' => $this->input->post('tgl_terima', TRUE),
			'status' => $sts,
			'kondisi' => $this->input->post('kondisi', TRUE),
			'ket' => $this->input->post('ket', TRUE),
			'kd_bantu' => $this->input->post('kd_bantu', TRUE),
			'id_ruang' => $this->input->post('id_ruang', TRUE),
			'jns_brg' => $this->input->post('jns_brg', TRUE),
			'dt_tgl_update' => date('Y-m-d h:i:s')
			);

			$kondisi ="";
			$dkon = $this->input->post('kondisi');
			if($dkon == 1){$kondisi = "Baik";}else
			if($dkon == 2){$kondisi = "Kurang Baik";}else
			if($dkon ==3){$kondisi = "Rusak";}
			$kd_barang = $this->in_kd_barang();
			$dataaset = array(
			'vc_nm_barang' => $this->input->post('kd_aset', TRUE),
			'vc_kd_jenis' => $this->input->post('jns_brg', TRUE),
			'vc_kd_aktv' => $this->input->post('aset_aktif', TRUE),
			'vc_sn' => $this->input->post('sn', TRUE),
			'vc_spesifikasi' => $this->input->post('a_spes', TRUE),
			'vc_lokasi' => $this->input->post('id_ruang', TRUE),
			'vc_kd_kondisi' => $kondisi,
			'vc_nm_pengguna' => $this->input->post('nm_pengg', TRUE),
			'dt_tgl_beli' => $this->input->post('tgl_terima', TRUE),
			'dt_tgl_habis' => $this->input->post('tgl_terima', TRUE),
			'dt_create_date' => $this->input->post('tgl_terima', TRUE),
			'in_kd_barang' => $kd_barang
			);
			// $this->M_monitor->update($this->input->post('kd_inv', TRUE), $data);
			// $this->M_monitor->update_aset($this->input->post('kd_aset', TRUE), $dataaset);
			$this->M_monitor->insertaset($dataaset);
			$this->session->set_flashdata('message','Ubah Data Berhasil');
			redirect(base_url('Monitor'));
	}

	

	function delete($id){
		$row = $this->M_monitor->get_by_id($id);

		$aktif = 0;

		if($row){
			$data = array(
				'aktif' => $aktif
			);
			$this->M_monitor->update($id, $data);
			redirect(base_url('Monitor'));
		}
	}
	
	function read($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
			'kd_inv' => set_value('kd_inv', $row->kd_inv),
			'nm_inv' => set_value('nm_inv', $row->nm_inv),
			'merk' => set_value('merk', $row->vc_nm_merk),
			'satuan' => set_value('satuan', $row->satuan),
			'jmlh' => set_value('jmlh', $row->jmlh),
			'tgl_terima' => set_value('tgl_terima', date('m/d/Y', strtotime($row->tgl_terima ))),
			'status' => set_value('status', $row->status),
			'kondisi' => set_value('kondisi', $row->kondisi),
			'ket' => set_value('ket', $row->ket),
			'kd_bantu' => set_value('kd_bantu', $row->kd_bantu),
			'no_aset' => set_value('no_aset', $row->no_aset),
			'id_ruang' => set_value('id_ruang', $row->vc_n_gugus),
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
			'kd_aset' => set_value('kd_aset', $row->kd_aset),
			'nm_pengg' => set_value('vc_nm_pengguna', $row->vc_nm_pengguna),
			'a_spes' => set_value('vc_spesifikasi', $row->vc_spesifikasi),
			'sn' => set_value('vc_sn', $row->vc_sn),
			'aset_aktif' => set_value('vc_kd_aktv', $row->vc_kd_aktv),
			'vc_model' => set_value('vc_model', $row->vc_model)
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
	function no_aset($no_gol, $id_rng, $tgl_m, $merk, $urut){
		 
		 $g_no_aset = $this->M_monitor->get_no_aset();
		 foreach($g_no_aset as $row){
			 $data = $row->maxkode;
		 }
		 $no_aset = (int) $data;
		 $th_aset = date('Y');
		 $gp = $this->M_monitor->get_p($id_rng, $tgl_m, $merk);
		 $da_ruang ='';
		 $d_tgl = '';
		 $d_merk = '';
		 foreach($gp as $row){
			 $da_ruang = $row->id_ruang;
			 $d_tgl = $row->tgl_terima;
			 $d_merk = $row->merk;
		 }
		 if(($id_rng != $da_ruang) && ($tgl_m != $d_tgl) && ($merk != $d_merk)){
			$no_aset++;
		 }
		 $kd_aset = $no_gol.'-'.$th_aset.'-'.$no_aset.'-'.$urut;
		 return $kd_aset;
	}

	function urut($rng, $tgl_m, $merk){
		$id_u = $this->M_monitor->get_urut_brg($rng, $tgl_m, $merk);
		$data='';
		foreach($id_u as $row){
			$data = $row->maxkode;
		}
		$urut = (int) $data;
		$urut++;
		return $urut;
	}

	function kode_aset($id)
	{
		$th = date('Y');
		$k_aset = $this->M_monitor->get_k_aset($id, $th);
		foreach($k_aset as $row){
			$data = $row->maxkode;
		}
		$kodeaset = $data;
		$noUrut = (int) substr($kodeaset, 12, 3);
		$noUrut++;
		$char = $id;
		$bl = date('m');
		$kodebaru = $char.'-'.$th.'-'.$bl.'-'.$noUrut;
		return $kodebaru;
	}

	function no_as($no_gol, $id_rng, $tgl_m, $merk){
		
		 $g_no_aset = $this->M_monitor->get_no_aset();
		 foreach($g_no_aset as $row){
			 $no_aset = $row->maxkode;
		 }
		 
		 $gp = $this->M_monitor->get_p($id_rng, $tgl_m, $merk);
		 $da_ruang ='';
		 $d_tgl = '';
		 $d_merk = '';
		 foreach($gp as $row){
			 $da_ruang = $row->id_ruang;
			 $d_tgl = $row->tgl_terima;
			 $d_merk = $row->merk;
		 }
		 if(($id_rng != $da_ruang) && ($tgl_m != $d_tgl) && ($merk != $d_merk)){
			$no_aset++;
		 }
		 return $no_aset;
	}
	
	function kode_urut($id)
	{
		$th = date('Y');
		$k_aset = $this->M_monitor->get_k_aset($id, $th);
		foreach($k_aset as $row){
			$data = $row->maxkode;
		}
		$kodeaset = $data;
		$noUrut = (int) substr($kodeaset, 12, 3);
		$noUrut++;
		return $noUrut;
	}

	function in_kd_barang(){
		$in_kd_barang =  $this->M_monitor->get_in_kd_barang();
		foreach($in_kd_barang as $row){
			$data = $row->maxkode;
		}
		$kd_barang = (int) $data;
		$kd_barang++;
		return $kd_barang;
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
		kd_aset like '%".$searchValue."%' or 
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
			// "kd_inv"=>$row->kd_inv,
			"tgl_terima"=>date('d-m-Y', strtotime($row->tgl_terima)),
			"kd_brg"=>$row->kd_brg,
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