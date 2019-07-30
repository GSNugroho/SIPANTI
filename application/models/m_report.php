<?php
class m_report extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default',TRUE);
    }

    function get_data_perawatan($tgl_a, $tgl_s){
        $this->db->order_by('tgl_jd', 'asc');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("inv_barang.kd_aset != ' '");
        $this->db->where("tgl_jd BETWEEN '$tgl_a' AND '$tgl_s'");
        return $this->db->get('inv_jadwal')->result();
    }
    function get_data_perbaikan($tgl_a, $tgl_s){
        $this->db->order_by('tgl_inv_pr', 'desc');
        $this->db->join('inv_pubgugus', 'inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('inv_barang', 'inv_perbaikan.kd_inv_pr = inv_barang.kd_inv');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("tgl_inv_pr BETWEEN '$tgl_a' AND '$tgl_s'");
        return $this->db->get('inv_perbaikan')->result();
    }
    function get_data_mutasi($tgl_a, $tgl_s){
        $this->db->order_by('tgl_terima_mts', 'desc');
        $this->db->join('inv_barang', 'inv_mutasi.kd_inv_mts = inv_barang.kd_inv', 'left');
        $this->db->join('inv_pubgugus', 'inv_mutasi.id_ruang_mts = inv_pubgugus.vc_k_gugus', 'left');
        $this->db->where("inv_barang.kd_aset IS NOT NULL AND inv_barang.kd_aset !=' '");
        $this->db->where("tgl_terima_mts BETWEEN '$tgl_a' AND '$tgl_s'");
        return $this->db->get('inv_mutasi')->result();
    }
}
?>