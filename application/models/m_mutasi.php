<?php
class m_mutasi extends CI_Model{

    public $table = 'inv_mutasi';
    public $id = 'kd_inv_mts';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }
    function get_data()
    {
        $this->db->order_by('tgl_terima_mts', 'desc');
        $this->db->join('inv_barang', 'inv_mutasi.kd_inv_mts = inv_barang.kd_inv', 'left');
        $this->db->join('inv_pubgugus', 'inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus', 'left');
        $this->db->where("inv_barang.kd_aset IS NOT NULL AND inv_barang.kd_aset !=' '");
        return $this->db->get('inv_mutasi')->result();
    }

    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_kdinv(){
        $query = $this->db->query("SELECT * FROM inv_barang
                                    JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
                                    WHERE inv_barang.kd_aset != ' ' ");
        return $query->result();
    }
    function insert($data){
        $this->db->insert($this->table, $data);
    }
    public function get_inv($id_ruang){
        $this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }

    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus ASC');
        return $query->result();
    }
}
?>