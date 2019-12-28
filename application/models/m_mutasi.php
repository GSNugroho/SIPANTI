<?php
class M_mutasi extends CI_Model{

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
        $this->db->join('inv_barang', 'inv_mutasi.kd_inv_mts = inv_barang.kd_inv', 'left');
        $this->db->join('inv_pubgugus', 'inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus', 'left');
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

    function update($id, $data){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_inv($id_ruang){
        $this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }

    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus ASC');
        return $query->result();
    }

    function ruangb($id){
        $query = $this->db->query("SELECT vc_n_gugus FROM inv_pubgugus WHERE vc_k_gugus = '".$id."'");
        return $query->result();
    }

    function get_total_dt(){
        $query = $this->db->query("SELECT count(*) as allcount from inv_mutasi
        left join inv_barang on inv_mutasi.kd_inv_mts = inv_barang.kd_inv
        join inv_pubgugus on inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus
        WHERE 1=1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)");
        return $query->result();
    }

    function get_total_fl($searchQuery){
        $query = $this->db->query("SELECT count(*) as allcount from inv_mutasi 
        left join inv_barang on inv_mutasi.kd_inv_mts = inv_barang.kd_inv
        join inv_pubgugus on inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus
        WHERE 1=1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery);
        return $query->result();
    }

    function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $query = $this->db->query("select TOP ".$rowperpage."* from inv_mutasi 
        left join inv_barang ON inv_mutasi.kd_inv_mts = inv_barang.kd_inv
        join inv_pubgugus ON inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus
        WHERE 1=1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery." and inv_mutasi.kd_inv_mts NOT IN (
            SELECT TOP ".$baris." inv_mutasi.kd_inv_mts FROM inv_mutasi 
            left join inv_barang on inv_mutasi.kd_inv_mts = inv_barang.kd_inv
            join inv_pubgugus on inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus
            WHERE 1=1 and inv_barang.bt_ti = 1 and (inv_barang.kd_aset != ' ' and inv_barang.kd_aset IS NOT NULL)".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
        order by ".$columnName." ".$columnSortOrder);
        return $query->result();
    }
}
?>