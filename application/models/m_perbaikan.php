<?php
class M_perbaikan extends CI_Model{
    
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
        $this->db->where("inv_perbaikan.dl_sts = '1'");
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_r_id($id){
        $this->db->join('inv_pubgugus','inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('inv_barang', 'inv_perbaikan.kd_inv_pr = inv_barang.kd_inv');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function insert($data){
        $this->db->insert($this->table, $data);
    }
    function update_delete($id, $data){
        $this->db->where('kd_pr', $id);
        $this->db->update('inv_perbaikan', $data);
    }
    function update_v($id, $data){
        $this->db->where('kd_pr', $id);
        $this->db->update('inv_perbaikan', $data);
    }
    function get_kdinv(){
        $query = $this->db->query("SELECT * FROM inv_barang
                                    JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
                                    WHERE inv_barang.kd_aset != ' ' ");
        return $query->result();
    }
    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus asc');
        return $query->result();
    }
    function get_sparepart($vc_nm_komponen){
        $query = $this->db->query("SELECT DISTINCT vc_nm_komponen FROM aset_komponen
        WHERE vc_nm_komponen like '%".$vc_nm_komponen."%'");
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

    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_total_dt(){
        $query = $this->db->query('SELECT count(*) AS allcount FROM inv_perbaikan
        JOIN inv_pubgugus ON inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        JOIN inv_barang ON inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        WHERE inv_barang.aktif = 1 AND inv_perbaikan.dl_sts = 1');
        return $query->result();
    }

    function get_total_fl($searchQuery){
        $query = $this->db->query('SELECT count(*) AS allcount FROM inv_perbaikan
        JOIN inv_pubgugus ON inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        JOIN inv_barang ON inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        WHERE inv_barang.aktif = 1 AND inv_perbaikan.dl_sts = 1'.$searchQuery);
        return $query->result();
    }

    function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $query = $this->db->query('SELECT TOP '.$rowperpage.' * from inv_perbaikan
        join inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        join inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        where inv_barang.aktif = 1 and inv_perbaikan.dl_sts = 1'.$searchQuery.' and inv_perbaikan.kd_pr NOT IN (
            SELECT TOP '.$baris.' inv_perbaikan.kd_pr from inv_perbaikan 
            join inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
            join inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
            where inv_barang.aktif = 1 and inv_perbaikan.dl_sts = 1'.$searchQuery.' order by '.$columnName.' '.$columnSortOrder.')
        order by '.$columnName.' '.$columnSortOrder);
        return $query->result();
    }

    function get_brg(){
        $query = $this->db->query("SELECT inv_barang.kd_inv as kd_inv, kd_aset, nm_inv, vc_nm_pengguna, id_ruang, vc_n_gugus FROM inv_barang 
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_barang.aktif = 1 AND inv_barang.bt_ti = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        ORDER BY nm_inv asc");
        return $query->result();
    }

    function riwayat($id){
        $query = $this->db->query("SELECT kd_pr, tgl_inv_pr, sp_gt, sp_by, ket_pr, kd_ruang, vc_n_gugus FROM inv_perbaikan 
        JOIN inv_pubgugus ON inv_perbaikan.kd_ruang	= inv_pubgugus.vc_k_gugus WHERE kd_inv_pr = '".$id."'");
        return $query->result();
    }
}
?>