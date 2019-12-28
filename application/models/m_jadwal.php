<?php
class M_jadwal extends CI_Model{

    public $table = 'inv_jadwal';
    public $id = 'kd_jd';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        $query = $this->db->query("SELECT * FROM inv_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE (inv_barang.kd_aset != '' or inv_barang.kd_aset IS NOT NULL) AND dt_sts = 1 AND inv_barang.aktif = 1");

        return $query->result();
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
        $query = $this->db->query("SELECT kd_inv, kd_aset, nm_inv, vc_nm_pengguna, vc_n_gugus FROM inv_barang
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_pubgugus.vc_k_gugus = '".$id_ruang."' AND inv_barang.aktif = 1 AND inv_barang.bt_ti = 1
        AND (inv_barang.kd_aset != ' ' or inv_barang.kd_aset IS NOT NULL) AND inv_barang.kd_inv NOT IN (
        SELECT kd_inv FROM inv_jadwal 
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_pubgugus.vc_k_gugus = '".$id_ruang."' AND inv_jadwal.dt_sts = 1 AND (inv_barang.kd_aset != ' ' or inv_barang.kd_aset IS NOT NULL)) 
        ORDER BY inv_barang.kd_aset");
        return $query->result();
    }
    function get_ruang(){
        $query = $this->db->query("SELECT DISTINCT inv_pubgugus.vc_n_gugus, inv_pubgugus.vc_k_gugus FROM inv_barang
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE (inv_barang.kd_aset IS NOT NULL or inv_barang.kd_aset !='') AND inv_barang.aktif = 1 AND
        inv_barang.bt_ti = 1 ORDER BY inv_pubgugus.vc_n_gugus ASC");
        return $query->result();
    }
    function nm_ruang($nj){
        $query = $this->db->query("SELECT vc_n_gugus FROM inv_pubgugus WHERE vc_k_gugus = '".$nj."'");
        return $query->result();
    }
    function kd_ruang($kr){
        $query = $this->db->query("SELECT vc_k_gugus FROM inv_pubgugus WHERE vc_n_gugus = '".$kr."'");
        return $query->result();
    }
    function get_kode(){
        $query = $this->db->query('SELECT MAX(kd_jd) AS maxkode FROM inv_jadwal');
        return $query->result();
    }

    function get_data_telat(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' 
		and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()) 
		and (DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-1)
		or DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-2))
        ");
        return $query->result();
    }

    function data_tlt(){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        WHERE inv_jadwal_perawatan.status_p = '1' 
		and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())
        and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()) 
		and (DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-1)
		or DAY(inv_jadwal.tgl_jd) = DAY(GETDATE()-2))
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

    function prio_jadwal(){
        $query = $this->db->query("SELECT inv_barang.kd_inv as kd_inv, kd_aset, nm_inv, vc_nm_pengguna, tgl_jd, vc_n_gugus FROM inv_barang 
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        LEFT JOIN inv_jadwal ON inv_barang.kd_inv = inv_jadwal.kd_inv
        WHERE inv_barang.kd_aset IS NOT NULL AND inv_barang.kd_aset != '' AND inv_barang.aktif = 1 AND inv_barang.bt_ti = 1 
        AND (inv_barang.kd_aset LIKE '%PCR%' OR inv_barang.kd_aset LIKE '%PCB%')
        AND inv_barang.kd_inv NOT IN (SELECT kd_inv FROM inv_jadwal JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 AND (inv_barang.kd_aset != ' ' or inv_barang.kd_aset IS NOT NULL))
        ORDER BY nm_inv asc");
        return $query->result();
    }

    function tot_prio(){
        $query = $this->db->query("SELECT count(*) as total FROM inv_barang 
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_barang.kd_aset IS NOT NULL AND inv_barang.kd_aset != '' AND inv_barang.aktif = 1 AND inv_barang.bt_ti = 1 
        AND (inv_barang.kd_aset LIKE '%PCR%' OR inv_barang.kd_aset LIKE '%PCB%')
        AND inv_barang.kd_inv NOT IN (SELECT kd_inv FROM inv_jadwal JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 AND (inv_barang.kd_aset != ' ' or inv_barang.kd_aset IS NOT NULL))
        ");
        return $query->result();
    }

    function get_jadwal($bulan){
        $query = $this->db->query("SELECT DISTINCT tgl_jd, kd_aset, nm_inv, vc_nm_pengguna, vc_n_gugus FROM inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE 1=1 AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1 AND inv_jadwal.dt_sts =1 
        AND (inv_barang.kd_aset != ' ' or inv_barang.kd_aset IS NOT NULL)
        AND MONTH(tgl_jd) = '".$bulan."' AND YEAR(tgl_jd) = YEAR(GETDATE())
        ");
        return $query->result();
    }
}
?>