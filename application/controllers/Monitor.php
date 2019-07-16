<?php
class monitor extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('m_monitor');
		}
 
	public function index(){
		$this->load->database();
		$jumlah_data = $this->m_monitor->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'monitor/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 50;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['inv_barang'] = $this->m_monitor->data($config['per_page'],$from);
		
		
		//$data['inv_barang'] = $this->m_monitor->get_data();
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

		$data['dd_gm'] = $this->m_monitor->get_merk();
		$data = array(
			'dd_gm' => $this->m_monitor->get_merk(),
			'dd_gr' => $this->m_monitor->get_ruang(),
			'dd_gj' => $this->m_monitor->get_jenis(),
			'dd_gg' => $this->m_monitor->get_golongan()
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
			'jns_brg' => $this->input->post('jns', TRUE),
			'cetak' => $this->input->post('cetak', TRUE),
			'kd_aset' => $this->input->post('kd_aset', TRUE)
						
			);
			
			$this->m_monitor->insert($data);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
			redirect(site_url(monitor));
		//}
	}
	
	function update($id){
		$row = $this->m_monitor->get_by_id($id);
		
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
			'dd_gm' => $this->m_monitor->get_merk(),
			'dd_gr' => $this->m_monitor->get_ruang(),
			'dd_gj' => $this->m_monitor->get_jenis(),
			'dd_gg' => $this->m_monitor->get_golongan()
			);
				$this->load->view('monitor/monitor_form_edit', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('monitor'));
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
			'jns_brg' => $this->input->post('jns', TRUE),
			'cetak' => $this->input->post('cetak', TRUE),
			'kd_aset' => $this->input->post('kd_aset', TRUE)		
			);

			$this->m_monitor->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message','Ubah Data Berhasil');
			redirect(base_url('monitor'));
	}

	function delete($id){
		$row = $this->m_monitor->get_by_id($id);

		if($row){
			$this->m_monitor->delete($id);
			$this->session->set_flashdata('message','Hapus Data Berhasil');
		}else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('monitor'));
		}
	}
	
	/*public function _rules() 
    {
	$this->form_validation->set_rules('nm_inv', 'nm inv', 'trim|required');
	$this->form_validation->set_rules('jml_brg', 'jml brg', 'trim|required');
	$this->form_validation->set_rules('ket_brg', 'ket brg', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }*/
}
?>