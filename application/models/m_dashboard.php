<?php
class m_dashboard extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_jadwal_total(){
        $this->db->select('COUNT(status_p) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where("inv_jadwal_perawatan.status_p = '1'");
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
        $this->db->where("MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())");
        $this->db->where("DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())");
        $this->db->group_by('inv_jadwal_perawatan.status_p');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_perbaikan_total(){
        $this->db->select('COUNT(*) as total');
        $this->db->join('inv_pubgugus', 'inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where('MONTH(inv_perbaikan.tgl_inv_pr) = MONTH(GETDATE())');
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_jadwal_data(){
        $this->db->order_by('inv_jadwal.tgl_jd','desc');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("inv_barang.kd_aset != ' '");
        $this->db->where('MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())');
        $this->db->where('DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())');
        return $this->db->get('inv_jadwal')->result();
    }
}
?>