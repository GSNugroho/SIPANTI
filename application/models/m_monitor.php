<?php
class M_monitor extends CI_Model{

	public $table = 'inv_barang';
	public $tbaset = 'aset_barang';
	public $id = 'kd_inv';
	public $id_a = 'vc_nm_barang';
	public $order = 'DESC';
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
	function get_data()
	{
		/*$this->db2->select("*");
		$this->db2->from('inv_barang');
		$query = $this->db2->get();
		return ($query->num_rows() > 0)?$query->result_array():FALSE;
		*/
		$this->db->order_by('tgl_terima', 'desc');
		$this->db->join('inv_merk', 'inv_barang.merk = inv_merk.vc_kd_merk');
		$this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
		$this->db->join('inv_golongan', 'inv_barang.kd_bantu = inv_golongan.id_gol');
		$this->db->join('inv_jenis', 'inv_barang.jns_brg = inv_jenis.in_kd_jenis');
		$this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		$this->db->where("inv_barang.kd_aset != ''");
		$this->db->where('inv_barang.aktif = 1');
		$this->db->where('inv_barang.bt_ti = 1');
		return $this->db->get('inv_barang')->result();
	}

	function get_limit_data($limit, $start = 0, $q = NULL){
		$this->db->order_by($this->id, $this->order);
        $this->db->like('id_inv', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	function insert($data){
		$this->db->insert($this->table, $data);
	}

	function insertaset($dataaset){
		$this->db->insert($this->tbaset, $dataaset);
	}

	function update($id, $data){
		$this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
	}
	function update_aset($id, $dataaset){
		$this->db->where($this->id_a, $id);
		$this->db->update($this->tbaset, $dataaset);
	}

	function get_by_id($id){
		$this->db->where($this->id, $id);
		$this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang', 'left');
		$this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus', 'left');
		$this->db->join('inv_merk', 'inv_barang.merk = inv_merk.vc_kd_merk', 'left');
        return $this->db->get($this->table)->row();
	}
	
	function delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
	
	function jumlah_data(){
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $this->db->get('inv_barang')->num_rows();
	}

	function data($number,$offset){
		$this->db->order_by('kd_inv', 'asc');
		$this->db->join('inv_merk', 'inv_barang.merk = inv_merk.vc_kd_merk');
		$this->db->join('inv_pubgugus','inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
		$this->db->join('inv_golongan','inv_barang.kd_bantu = inv_golongan.id_gol');
		$this->db->join('inv_jenis','inv_barang.jns_brg = inv_jenis.in_kd_jenis');
		$this->db->join('aset_barang','inv_barang.kd_aset = aset_barang.vc_nm_barang');
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $query = $this->db->get('inv_barang',$number,$offset)->result();		
	}

	function get_merk(){
		$query = $this->db->query('SELECT * FROM inv_merk ORDER BY vc_nm_merk asc');
		return $query->result();
	}
	function get_ruang(){
		$query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus asc');
		return $query->result();
	}
	function get_jenis(){
		$query = $this->db->query('SELECT * FROM inv_jenis');
		return $query->result();
	}
	function get_golongan(){
		$query = $this->db->query('SELECT * FROM inv_golongan');
		return $query->result();
	}
	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_inv) AS maxkode FROM inv_barang');
		return $query->result();
	}
	function get_k_aset($id, $th){
		$query = $this->db->query("SELECT MAX(vc_nm_barang) AS maxkode FROM aset_barang WHERE aset_barang.vc_nm_barang LIKE '%".$id."%'AND aset_barang.vc_nm_barang LIKE '%".$th."%'");
		return $query->result();
	}
	function get_no_aset(){
		$query = $this->db->query("SELECT MAX(no_aset) AS maxkode FROM inv_barang WHERE aktif=1");
		return $query->result();
	}
	function get_p($id_rng, $tgl_m, $merk){
		$query = $this->db->query("SELECT * FROM inv_barang WHERE id_ruang = '$id_rng' and tgl_terima = '$tgl_m' and merk = '$merk' and aktif=1");
		return $query->result();
	}
	function get_urut_brg($rng, $tgl_m, $merk){
		$query = $this->db->query("SELECT MAX(id_urut) as maxkode FROM inv_barang WHERE id_ruang = '$rng' and tgl_terima = '$tgl_m' and merk = '$merk' and aktif=1");
		return $query->result();
	}
	function get_in_kd_barang(){
		$query = $this->db->query('SELECT MAX(in_kd_barang) AS maxkode FROM aset_barang');
		return $query->result();
	}
	function get_total_dt(){
		$query = $this->db->query("select count(*) as allcount from inv_barang
		left join inv_merk on inv_barang.merk = inv_merk.vc_kd_merk
		left join inv_pubgugus on inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
		left join inv_golongan on inv_barang.kd_bantu = inv_golongan.id_gol
		left join inv_jenis on inv_barang.jns_brg = inv_jenis.in_kd_jenis
		left join aset_barang on inv_barang.kd_aset = aset_barang.vc_nm_barang
		WHERE kd_inv != 'INV' and inv_barang.aktif = 1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)");
		return $query->result();
	}
	function get_total_fl($searchQuery){
		$query = $this->db->query("select count(*) as allcount from inv_barang 
		left join inv_merk on inv_barang.merk = inv_merk.vc_kd_merk
		left join inv_pubgugus on inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
		left join inv_golongan on inv_barang.kd_bantu = inv_golongan.id_gol
		left join inv_jenis on inv_barang.jns_brg = inv_jenis.in_kd_jenis
		left join aset_barang on inv_barang.kd_aset = aset_barang.vc_nm_barang
		WHERE 1=1 and kd_inv != 'INV' and inv_barang.aktif = 1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery);
		return $query->result();
	}
	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."* from inv_barang 
		left join inv_merk on inv_barang.merk = inv_merk.vc_kd_merk
		left join inv_pubgugus on inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
		left join inv_golongan on inv_barang.kd_bantu = inv_golongan.id_gol
		left join inv_jenis on inv_barang.jns_brg = inv_jenis.in_kd_jenis
		left join aset_barang on inv_barang.kd_aset = aset_barang.vc_nm_barang
		WHERE 1=1 and inv_barang.aktif = 1 and inv_barang.kd_inv != 'INV' and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery." and inv_barang.kd_inv NOT IN (
			SELECT TOP ".$baris." inv_barang.kd_inv FROM inv_barang 
			left join inv_merk on inv_barang.merk = inv_merk.vc_kd_merk
			left join inv_pubgugus on inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
			left join inv_golongan on inv_barang.kd_bantu = inv_golongan.id_gol
			left join inv_jenis on inv_barang.jns_brg = inv_jenis.in_kd_jenis
			left join aset_barang on inv_barang.kd_aset = aset_barang.vc_nm_barang
			WHERE inv_barang.kd_inv != 'INV' and inv_barang.aktif = 1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}
}
?>