<?php
    class M_komponen extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_total_dt()
        {
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM inv_komponen 
            JOIN aset_barang ON inv_komponen.kd_ko = aset_barang.vc_nm_barang
            JOIN inv_barang ON aset_barang.vc_nm_barang = inv_barang.kd_aset
            JOIN pubgugus ON inv_barang.id_ruang = pubgugus.vc_k_gugus
            WHERE (inv_barang.kd_aset != '' OR inv_barang.kd_aset != NULL) AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1");
            return $query->result();
        }

        function get_total_fl($searchQuery)
        {
            $query = $this->db->query("SELECT COUNT(*) as allcount FROM inv_komponen 
            JOIN aset_barang ON inv_komponen.kd_ko = aset_barang.vc_nm_barang
            JOIN inv_barang ON aset_barang.vc_nm_barang = inv_barang.kd_aset
            JOIN pubgugus ON inv_barang.id_ruang = pubgugus.vc_k_gugus
            WHERE (inv_barang.kd_aset != '' OR inv_barang.kd_aset != NULL) AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage)
        {
            $query = $this->db->query("SELECT inv_barang.kd_brg, inv_komponen.kd_ko, inv_barang.nm_inv, pubgugus.vc_n_gugus, aset_barang.vc_nm_pengguna FROM inv_komponen 
            JOIN aset_barang ON inv_komponen.kd_ko = aset_barang.vc_nm_barang
            JOIN inv_barang ON aset_barang.vc_nm_barang = inv_barang.kd_aset
            JOIN pubgugus ON inv_barang.id_ruang = pubgugus.vc_k_gugus
            WHERE (inv_barang.kd_aset != '' OR inv_barang.kd_aset != NULL) AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1".$searchQuery." AND inv_komponen.kd_ko NOT IN (
                SELECT TOP ".$baris." inv_komponen.kd_ko FROM inv_komponen
                JOIN aset_barang ON inv_komponen.kd_ko = aset_barang.vc_nm_barang
                JOIN inv_barang ON aset_barang.vc_nm_barang = inv_barang.kd_aset
                JOIN pubgugus ON inv_barang.id_ruang = pubgugus.vc_k_gugus
                WHERE (inv_barang.kd_aset != '' OR inv_barang.kd_aset != NULL) AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1".$searchQuery."order by ".$columnName." ".$columnSortOrder."
            )order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }

        function get_by_id($id)
        {
            $query = $this->db->query("SELECT * FROM inv_komponen 
            JOIN aset_barang ON inv_komponen.kd_ko = aset_barang.vc_nm_barang
            JOIN inv_barang ON aset_barang.vc_nm_barang = inv_barang.kd_aset
            JOIN pubgugus ON inv_barang.id_ruang = pubgugus.vc_k_gugus
            WHERE (inv_barang.kd_aset != '' OR inv_barang.kd_aset != NULL) AND inv_barang.bt_ti = 1 AND inv_barang.aktif = 1 AND inv_komponen.kd_ko = '".$id."'");
            return $query->row();
        }

        function update_komponen($id, $data)
        {
            $this->db->where('kd_ko', $id);
            $this->db->update('inv_komponen', $data);
        }
    }
?>