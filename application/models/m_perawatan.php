<?php
class m_perawatan extends CI_Model{
    public $table = 'inv_perawatan_d';
    public $id = 'inv_perawatan_d.vc_kd_trans';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }
    function get_data(){
        $this->db->order_by('inv_perawatan_h.dt_mulai','asc');
        $this->db->join('inv_perawatan_h', 'inv_perawatan_d.vc_kd_trans = inv_perawatan_h.vc_kd_trans');
        $this->db->join('inv_perawatan_tindakan', 'inv_perawatan_d.vc_kd_tindakan = inv_perawatan_tindakan.vc_kd_tindakan');
        $this->db->where('inv_perawatan_tindakan.vc_kd_tindakan = 001 OR inv_perawatan_tindakan.vc_kd_tindakan = 002 OR inv_perawatan_tindakan.vc_kd_tindakan = 003 ');
        return $this->db->get('inv_perawatan_d')->result();
    }
    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->join('inv_perawatan_h', 'inv_perawatan_d.vc_kd_trans = inv_perawatan_h.vc_kd_trans');
        $this->db->join('inv_perawatan_tindakan', 'inv_perawatan_d.vc_kd_tindakan = inv_perawatan_tindakan.vc_kd_tindakan');
        $this->db->update($this->table, $data);

    }
    function get_by_id($id){
        $this->db->order_by('inv_perawatan_h.dt_mulai','asc');
        $this->db->join('inv_perawatan_h', 'inv_perawatan_d.vc_kd_trans = inv_perawatan_h.vc_kd_trans');
        $this->db->join('inv_perawatan_tindakan', 'inv_perawatan_d.vc_kd_tindakan = inv_perawatan_tindakan.vc_kd_tindakan');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function inset($data){
        $this->db->insert($this->table, $data);
    }
    function get_kdinv(){
        $query = $this->db->query("SELECT * FROM [dbo].[inv_barang] 
                                JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
                                WHERE inv_barang.kd_aset != ' ' ");
        return $query->result();
    }
}
?>