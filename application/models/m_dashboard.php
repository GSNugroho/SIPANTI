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

    function get_jadwal_totalb(){
        $this->db->select('COUNT(status_p) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
        $this->db->where("MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())");
        return $this->db->get('inv_jadwal')->result();
    }

    function get_jadwal_telat(){
         $this->db->select('COUNT(*) as total');
         $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
         $this->db->where('inv_jadwal.dt_sts = 1');
         $this->db->where('inv_jadwal_perawatan.tgl_trs IS NULL');
         $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
         $this->db->where("MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())");
         $this->db->where('inv_jadwal_perawatan.tgl_trs IS NULL or DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
         and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
         and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
         and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())');
         
        return $this->db->get('inv_jadwal')->result();
    }

    function get_total_perawatanth(){
        $this->db->select('MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())');
        $this->db->group_by('MONTH(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_capaian_perawatanth_ss(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                WHERE inv_jadwal.dt_sts = 1 and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and DAY(inv_jadwal.tgl_jd) = DAY(inv_jadwal_perawatan.tgl_trs)
                and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
                and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_capaian_perawatanth_tlt(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                WHERE inv_jadwal.dt_sts = 1 and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
                and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
                and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_capaian_perawatanth_bs(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                WHERE inv_jadwal.dt_sts = 1 and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and inv_jadwal_perawatan.tgl_trs IS NULL 
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }



    function get_total_perbaikanth(){
        $this->db->select('MONTH(inv_perbaikan.tgl_inv_pr) as bulan, COUNT(*) as total');
        $this->db->where('YEAR(inv_perbaikan.tgl_inv_pr) = YEAR(GETDATE())');
        $this->db->group_by('MONTH(inv_perbaikan.tgl_inv_pr)');
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_total_telatth(){
        $this->db->select('MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where('inv_jadwal_perawatan.tgl_trs IS NULL or DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)');
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
        $this->db->group_by('MONTH(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }
}
?>