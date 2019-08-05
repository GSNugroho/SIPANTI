<?php
class m_perbaikan extends CI_Model{
    
    public $table = 'inv_perbaikan';
    public $id = 'kd_pr';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        $this->db->order_by('tgl_inv_pr', 'desc');
        $this->db->join('inv_pubgugus', 'inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('inv_barang', 'inv_perbaikan.kd_inv_pr = inv_barang.kd_inv');
        $this->db->where("inv_barang.aktif = '1'");
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function insert($data){
        $this->db->insert($this->table, $data);
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

    function get_inv($id_ruang){
        $this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }

    function get_kode(){
        $query = $this->db->query('SELECT MAX(kd_pr) AS maxkode FROM inv_perbaikan');
        return $query->result();
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_total_dt(){
        $query = $this->db->query('select count(*) as allcount from inv_perbaikan
        join inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        join inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        where inv_barang.aktif = 1');
        return $query->result();
    }

    function get_total_fl($searchQuery){
        $query = $this->db->query('select count(*) as allcount from inv_perbaikan
        join inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        join inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        where inv_barang.aktif = 1'.$searchQuery);
        return $query->result();
    }

    function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $query = $this->db->query('select TOP '.$rowperpage.' * from inv_perbaikan
        join inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        join inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        where inv_barang.aktif = 1'.$searchQuery.' and '.$columnName.' NOT IN (SELECT TOP '.$baris.' '.$columnName.' from inv_perbaikan order by '.$columnName.' '.$columnSortOrder.')
        order by '.$columnName.' '.$columnSortOrder);
        return $query->result();
    }
}
?>