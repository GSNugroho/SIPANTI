<?php
class M_dashboard extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_jadwal_total(){
        $this->db->select('COUNT(status_p) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->where("inv_jadwal_perawatan.status_p = '1'");
        $this->db->where("inv_jadwal.dt_sts = 1");
        $this->db->where('inv_barang.aktif = 1');
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
        $this->db->where("MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())");
        $this->db->where("DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())");
        $this->db->group_by('inv_jadwal_perawatan.status_p');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_perbaikan_total(){
        $this->db->select('COUNT(*) as total');
        $this->db->join('inv_pubgugus', 'inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('inv_barang', 'inv_perbaikan.kd_inv_pr = inv_barang.kd_inv');
        $this->db->where("inv_perbaikan.dl_sts = 1");
        $this->db->where('inv_barang.aktif = 1');
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where('MONTH(inv_perbaikan.tgl_inv_pr) = MONTH(GETDATE())');
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_jadwal_data(){
        $this->db->order_by('inv_jadwal.tgl_jd','desc');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where("inv_jadwal.dt_sts = 1");
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where('MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())');
        $this->db->where('DAY(inv_jadwal.tgl_jd) = DAY(GETDATE())');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_jadwal_totalb(){
        $query = $this->db->query("SELECT COUNT(status_p) as total FROM inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())
        AND MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())");
        return $query->result();
    }

    function get_jadwal_telat(){
         $this->db->select('COUNT(*) as total');
         $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
         $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
         $this->db->where('inv_jadwal.dt_sts = 1');
         $this->db->where('inv_barang.aktif = 1');
         $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
         $this->db->where('DAY(inv_jadwal.tgl_jd) < DAY(inv_jadwal_perawatan.tgl_trs)
         and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
         and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
         and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())');
         
        return $this->db->get('inv_jadwal')->result();
    }

    function get_total_perawatanth(){
        $this->db->select('MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->where("inv_jadwal.dt_sts = 1");
        $this->db->where('inv_barang.aktif = 1');
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where('YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())');
        $this->db->group_by('MONTH(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_capaian_perawatanth_ss(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
                WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 
                and inv_barang.kd_aset IS NOT NULL
                and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and DAY(inv_jadwal.tgl_jd) = DAY(inv_jadwal_perawatan.tgl_trs)
                and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
                and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_capaian_perawatanth_tlt(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
                WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 
                and inv_barang.kd_aset IS NOT NULL
                and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and DAY(inv_jadwal.tgl_jd) < DAY(inv_jadwal_perawatan.tgl_trs)
                and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
                and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_capaian_perawatanth_bs(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
                WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 
                and inv_barang.kd_aset IS NOT NULL
                and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                and inv_jadwal_perawatan.tgl_trs IS NULL 
                GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_capaian_perawatanth_lc(){
        $query = $this->db->query('SELECT YEAR(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 
        and inv_barang.kd_aset IS NOT NULL
        and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
        and DAY(inv_jadwal.tgl_jd) > DAY(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
        GROUP BY YEAR(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_total_perbaikanth(){
        $this->db->select('MONTH(inv_perbaikan.tgl_inv_pr) as bulan, COUNT(*) as total');
        $this->db->join('inv_barang', 'inv_perbaikan.kd_inv_pr = inv_barang.kd_inv');
        $this->db->where('inv_barang.aktif = 1');
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where('YEAR(inv_perbaikan.tgl_inv_pr) = YEAR(GETDATE())');
        $this->db->group_by('MONTH(inv_perbaikan.tgl_inv_pr)');
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_total_telatth(){
        $this->db->select('MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where('inv_barang.aktif = 1');
        $this->db->where("(inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where('DAY(inv_jadwal.tgl_jd) < DAY(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)');
        $this->db->where("YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE())");
        $this->db->group_by('MONTH(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_total_target(){
        $query = $this->db->query('SELECT MONTH(inv_jadwal.tgl_jd) as tahun, COUNT(*) as total from inv_jadwal
                 JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                 JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
                 WHERE MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE()) AND inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1
                 GROUP BY MONTH(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_total_targetc(){
        $query = $this->db->query('SELECT MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total from inv_jadwal
                 JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
                 JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
                 WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 and YEAR(inv_jadwal.tgl_jd) = YEAR(GETDATE()) 
                --  and DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
                 and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
                 and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
                 and MONTH(inv_jadwal.tgl_jd) = MONTH(GETDATE())
                 GROUP BY MONTH(inv_jadwal.tgl_jd)');
        return $query->result();
    }

    function get_keg_hr_pr(){
        $query = $this->db->query("SELECT tgl_jd, nm_jd, kd_aset, nm_inv, vc_n_gugus FROM inv_jadwal 
        JOIN inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 AND DAY(inv_jadwal_perawatan.tgl_trs) = DAY(GETDATE()) AND MONTH(inv_jadwal_perawatan.tgl_trs) = MONTH(GETDATE()) AND YEAR(inv_jadwal_perawatan.tgl_trs) = YEAR(GETDATE())");
        return $query->result();
    }

    function get_keg_hr_pw(){
        $query = $this->db->query('SELECT kd_aset, nm_inv, sp_gt, vc_n_gugus, ket_pr FROM inv_perbaikan 
        JOIN inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_barang.aktif = 1 AND inv_perbaikan.dl_sts = 1 AND DAY(tgl_inv_pr) = DAY(GETDATE()) AND MONTH(tgl_inv_pr) = MONTH(GETDATE()) AND YEAR(tgl_inv_pr) = YEAR(GETDATE())');
        return $query->result();
    }
}
?>