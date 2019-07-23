<?php
class m_jadwal extends CI_Model{

    public $table = 'inv_jadwal';
    public $id = 'id_jd';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        return $this->db->get('inv_jadwal')->result();
    }
    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus');
		return $query->result();
    }
    function insert($data){
        $this->db->insert($this->table, $data);
    }
    function updatekonten($id, $data){
        $this->db->where('id_jd', $id);
        $this->db->update('inv_jadwal', $data);
    }
    function updatetgl($id, $data){
        $this->db->where('id_jd', $id);
        $this->db->update('inv_jadwal', $data);
    }
    
    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_inv($id_ruang){
        $this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }
}
?>