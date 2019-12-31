<?php
class M_report extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default',TRUE);
    }

    function get_data_perawatan($tgl_a, $tgl_s, $order){
        // $this->db->order_by('tgl_jd', 'asc');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("(inv_barang.kd_aset != ' ' OR inv_barang.kd_aset IS NOT NULL)");
        $this->db->where("inv_jadwal.dt_sts = 1");
        // $this->db->where('DAY(inv_jadwal.tgl_jd) <= DAY(inv_jadwal_perawatan.tgl_trs)');
        $this->db->where("tgl_jd BETWEEN '$tgl_a' AND '$tgl_s'");
        $this->db->order_by("'$order' asc");
        return $this->db->get('inv_jadwal')->result();
    }

    function get_data_wperawatan($tgl_a, $tgl_s){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(*) as total, DATEDIFF(SECOND, inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts) as selisih');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where("tgl_jd BETWEEN '$tgl_a' AND '$tgl_s'");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd), inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts');
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
    function get_data_wtelat($tgl_a, $tgl_s){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(*) as total, DATEDIFF(SECOND, inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts) as selisih');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where("tgl_jd BETWEEN '$tgl_a' AND '$tgl_s'");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd), inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts');
        return $this->db->get('inv_jadwal')->result();
    }
    function get_data_sparepart($tgl_a, $tgl_s){
        $query = $this->db->query("SELECT DISTINCT vc_nm_komponen, COUNT(vc_nm_komponen) as total FROM aset_komponen
        GROUP BY vc_nm_komponen");
        return $query->result();
    }

    function get_data_gperawatan($bulan_jd, $tahun_jd){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(*) as total, DATEDIFF(SECOND, inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts) as selisih');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where('inv_jadwal_perawatan.status_p = 3');
        $this->db->where("MONTH(inv_jadwal.tgl_jd)= '$bulan_jd'");
        $this->db->where("YEAR(inv_jadwal.tgl_jd)= '$tahun_jd'");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd), inv_jadwal_perawatan.wtm, inv_jadwal_perawatan.wts');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_data_glperawatan($bulan_jd, $tahun_jd){
        $this->db->select('DAY(inv_jadwal.tgl_jd) as tanggal, COUNT(*) as total');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->where('inv_jadwal.dt_sts = 1');
        $this->db->where('inv_jadwal_perawatan.status_p = 3');
        $this->db->where("MONTH(inv_jadwal.tgl_jd)= '$bulan_jd'");
        $this->db->where("YEAR(inv_jadwal.tgl_jd)= '$tahun_jd'");
        $this->db->group_by('DAY(inv_jadwal.tgl_jd)');
        return $this->db->get('inv_jadwal')->result();
    }

    function get_data_gperbaikan($bulan_jd, $tahun_jd){
        $this->db->select('DAY(tgl_inv_pr) as tanggal, COUNT(*) as total');
        // $this->db->where('prb_valid = 1');
        $this->db->where("MONTH(tgl_inv_pr)= '$bulan_jd'");
        $this->db->where("YEAR(tgl_inv_pr)= '$tahun_jd'");
        $this->db->group_by('DAY(tgl_inv_pr)');
        return $this->db->get('inv_perbaikan')->result();
    }

    function get_data_gtelat($bulan_jd, $tahun_jd){
        $query = $this->db->query("SELECT DAY(tgl_jd) as tanggal, COUNT(*) as total from inv_jadwal
        JOIN inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal 
        JOIN inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 and inv_barang.aktif = 1 and
        DAY(inv_jadwal.tgl_jd) != DAY(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = MONTH(inv_jadwal_perawatan.tgl_trs)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
        and MONTH(inv_jadwal.tgl_jd) = '$bulan_jd' and YEAR(inv_jadwal.tgl_jd) = '$tahun_jd'
        group by DAY(tgl_jd)");
        return $query->result();
    }

    function get_riwayat_dperawatan($kd_inv){
        $query = $this->db->query("SELECT * FROM inv_jadwal 
        JOIN inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_barang.aktif = '1' AND inv_barang.kd_aset != ' ' AND inv_jadwal.dt_sts = 1
        AND inv_jadwal.kd_inv = '".$kd_inv."'");
        return $query->result();
    }

    function get_riwayat_dperbaikan($kd_inv){
        $query = $this->db->query("SELECT * FROM inv_perbaikan
        JOIN inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        WHERE inv_barang.aktif = '1' AND inv_barang.kd_aset != ' '
        AND inv_perbaikan.kd_inv_pr = '".$kd_inv."'");
        return $query->result();
    }

    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus ORDER BY vc_n_gugus ASC');
        return $query->result();
    }

    function get_inv($id_ruang){
        $this->db->join('inv_pubgugus', 'inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
        $this->db->where('inv_pubgugus.vc_k_gugus', $id_ruang);
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_barang')->result();
    }

    function get_report_blm($order){
        $query = $this->db->query("SELECT kd_inv, kd_aset, nm_inv, vc_nm_pengguna, vc_n_gugus FROM inv_barang 
        JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_barang.kd_aset IS NOT NULL AND inv_barang.kd_aset != '' 
		AND inv_barang.aktif = 1 AND inv_barang.bt_ti = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND (inv_barang.kd_aset LIKE '%PCR%' OR inv_barang.kd_aset LIKE '%PCB%')
        AND inv_barang.kd_inv NOT IN (SELECT kd_inv FROM inv_jadwal)
        ORDER BY '".$order."' asc");
        return $query->result();
    }

    function get_cpt($tgl1, $tgl2){
        $query = $this->db->query("SELECT * from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'");
        return $query->result();
    }

    function get_cpr($tgl1, $tgl2){
        $query = $this->db->query("SELECT tgl_jd, tgl_trs, kd_aset, nm_inv, vc_nm_pengguna, vc_n_gugus from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND MONTH(inv_jadwal.tgl_jd) <= MONTH(inv_jadwal_perawatan.tgl_trs)
        AND YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
        AND inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."' ORDER BY tgl_jd asc");
        return $query->result();
    }

    function get_cpbr($tgl1, $tgl2){
        $query = $this->db->query("SELECT tgl_jd, kd_aset, nm_inv, vc_nm_pengguna, vc_n_gugus from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        and inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
		AND inv_jadwal.kd_jd NOT IN(
		SELECT inv_jadwal.kd_jd from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND MONTH(inv_jadwal.tgl_jd) <= MONTH(inv_jadwal_perawatan.tgl_trs)
        AND YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
		AND inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        ) ORDER BY tgl_jd asc");
        return $query->result();
    }

    function get_cpbr_t($tgl1, $tgl2){
        $query = $this->db->query("SELECT COUNT(*) as total from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        JOIN aset_barang ON inv_barang.kd_aset = aset_barang.vc_nm_barang
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        and inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
		AND inv_jadwal.kd_jd NOT IN(
		SELECT inv_jadwal.kd_jd from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus ON inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND MONTH(inv_jadwal.tgl_jd) <= MONTH(inv_jadwal_perawatan.tgl_trs)
        AND YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
		AND inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        )");
        return $query->result();
    }

    function get_cpt_t($tgl1, $tgl2){
        $query = $this->db->query("SELECT MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
		JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
		AND inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        GROUP BY MONTH(inv_jadwal.tgl_jd)");
        return $query->result();
    }

    function get_cpr_t($tgl1, $tgl2){
        $query = $this->db->query("SELECT MONTH(inv_jadwal.tgl_jd) as bulan, COUNT(*) as total from inv_jadwal
        JOIN inv_jadwal_perawatan ON inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang ON inv_jadwal.kd_inv = inv_barang.kd_inv
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        and YEAR(inv_jadwal.tgl_jd) = YEAR(inv_jadwal_perawatan.tgl_trs)
        and inv_jadwal.tgl_jd BETWEEN '".$tgl1."' AND '".$tgl2."'
        GROUP BY MONTH(inv_jadwal.tgl_jd)");
        return $query->result();
    }    

    function get_data_harian($tgl_keg){
        $query = $this->db->query("SELECT tgl_jd, nm_jd, kd_aset, nm_inv, vc_n_gugus FROM inv_jadwal 
        JOIN inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        JOIN inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_jadwal.dt_sts = 1 AND inv_barang.aktif = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND DAY(inv_jadwal_perawatan.tgl_trs) = '".date('d', strtotime($tgl_keg))."' 
        AND MONTH(inv_jadwal_perawatan.tgl_trs) = '".date('m', strtotime($tgl_keg))."' 
        AND YEAR(inv_jadwal_perawatan.tgl_trs) = '".date('Y', strtotime($tgl_keg))."'");
        return $query->result();
    }

    function get_data_prb_hr($tgl_prb_keg){
        $query = $this->db->query("SELECT kd_aset, nm_inv, sp_gt, vc_n_gugus, ket_pr FROM inv_perbaikan 
        JOIN inv_barang on inv_perbaikan.kd_inv_pr = inv_barang.kd_inv
        JOIN inv_pubgugus on inv_perbaikan.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE inv_barang.aktif = 1 AND inv_perbaikan.dl_sts = 1 
        AND (inv_barang.kd_aset != '' OR inv_barang.kd_aset IS NOT NULL)
        AND DAY(tgl_inv_pr) = '".date('d', strtotime($tgl_prb_keg))."' 
        AND MONTH(tgl_inv_pr) = '".date('m', strtotime($tgl_prb_keg))."' 
        AND YEAR(tgl_inv_pr) = '".date('Y', strtotime($tgl_prb_keg))."'");
        return $query->result();
    }
}
?>