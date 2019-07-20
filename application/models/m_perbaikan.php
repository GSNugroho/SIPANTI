<?php
class m_perbaikan extends CI_Model{
    
    public $table = 'inv_perbaikan';
    public $id = 'id_perbaikan';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        $this->db->order_by('tgl_perbaikan', 'desc');
        return $this->db->get('inv_perbaikan')->result();
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
    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus');
        return $query->result();
    }
}
?>