<?php
class m_jadwal extends CI_Model{

    public $table = 'inv_jadwal';
    public $id = 'kd_jd';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        return $this->db->get('inv_jadwal')->result();
    }
    function insert($data){
        $this->db->insert($this->table, $data);
    }
    function updatekonten($id, $data){
        $this->db->where('kd_jd', $id);
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
        $this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }
    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus ASC');
        return $query->result();
    }
    
    function get_kode(){
        $query = $this->db->query('SELECT MAX(kd_jd) AS maxkode FROM inv_jadwal');
        return $query->result();
    }

    function get_data_telat(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()-1)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()-1) and DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-1)
        ");
        return $query->result();
    }

    function data_tlt(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()-1)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()-1) and DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-1)
        ");
        return $query->row();
    }

    function data_hr(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()) and DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())");
        return $query->row();
    }

    function get_data_hr(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()) and DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())");
        return $query->result();
    }
}
?>