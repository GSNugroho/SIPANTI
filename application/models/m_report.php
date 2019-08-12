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
    function get_data_telat($tgl_a, $tgl_s){
        // $this->db->order_by('tgl_jd', 'asc');
        // $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        // $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        // $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        // $this->db->where("inv_barang.aktif = '1'");
        // $this->db->where('inv_jadwal.dt_sts =1');
        // $this->db->where("inv_jadwal_perawatan.status_p = '1'");
        // $this->db->where("DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
        // and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        // and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)");
        // $this->db->where("tgl_jd BETWEEN '$tgl_a' AND '$tgl_s'");
        // return $this->db->get('inv_jadwal')->result();

        $query = $this->db->query("SELECT * from inv_jadwal
        JOIN inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal 
        JOIN inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 and
        DAY(inv_jadwal.tgl_jd) < DAY(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
        and inv_jadwal.tgl_jd BETWEEN '".$tgl_a."' and '".$tgl_s."'");
        return $query->result();
    }

    function get_data_gperawatan($bulan_jd, $tahun_jd){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where("MONTH(inv_jadwal.tgl_jd)= '$bulan_jd'");
        $this->db->where("YEAR(inv_jadwal.tgl_jd)= '$tahun_jd'");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_data_gperbaikan($bulan_jd, $tahun_jd){
        $this->db->select('DAY(tgl_inv_pr) as tanggal, COUNT(*) as total');
        $this->db->where("MONTH(tgl_inv_pr)= '$bulan_jd'");
        $this->db->where("YEAR(tgl_inv_pr)= '$tahun_jd'");
        $this->db->group_by('DAY(tgl_inv_pr)');
        return $this->db->get('inv_perawatan')->result();
    }

    function get_data_gtelat($bulan_jd, $tahun_jd){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(status_p) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where("inv_jadwal_perawatan.status_p = '1'");
        $this->db->where("MONTH(inv_jadwal.tgl_jd) = '$bulan_jd'");
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = '$tahun_jd'");
        $this->db->where("DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }
}
?>