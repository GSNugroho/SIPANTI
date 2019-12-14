<?php
class M_perawatan extends CI_Model{
    public $table = 'inv_perawatan_d';
    public $id = 'inv_perawatan_d.vc_kd_trans';
    public $order = 'DESC';
    public $idjd = 'inv_jadwal_perawatan.kd_jadwal';
    public $tablejd = 'inv_jadwal_perawatan';
    public $tabelkomp = 'inv_komponen';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }
    
    function get_data_jd(){
        $this->db->order_by('inv_jadwal.tgl_jd','desc');
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->where("inv_jadwal.dt_sts = '1'");
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("inv_barang.kd_aset != ' '");
        return $this->db->get('inv_jadwal')->result();
    }
    function get_r_id($id){
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        $this->db->join('inv_pubgugus', 'inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus');
        $this->db->join('aset_barang', 'inv_barang.kd_aset = aset_barang.vc_nm_barang');
        $this->db->where("inv_barang.aktif = '1'");
        $this->db->where("inv_jadwal.dt_sts = '1'");
        $this->db->where("inv_barang.kd_aset != ' '");
        $this->db->where("inv_jadwal.kd_jd = '".$id."'");
        return $this->db->get('inv_jadwal')->row();
    }
    function update($id, $data){
        $this->db->where($this->id, $id);
        $this->db->join('inv_perawatan_h', 'inv_perawatan_d.vc_kd_trans = inv_perawatan_h.vc_kd_trans');
        $this->db->join('inv_perawatan_tindakan', 'inv_perawatan_d.vc_kd_tindakan = inv_perawatan_tindakan.vc_kd_tindakan');
        $this->db->update($this->table, $data);
    }
    function update_komponen($id, $data){
        $this->db->where('kd_jd_ko', $id);
        $this->db->update($this->tabelkomp, $data);
    }
    function update_v($id, $data){
        $this->db->where('kd_jd', $id);
        $this->db->update('inv_jadwal', $data);
    }
    function update_waktu($id, $data){
        $this->db->where('kd_jadwal', $id);
        $this->db->update('inv_jadwal_perawatan', $data);
    }
    function get_by_id_komp($id){
        $this->db->join('inv_komponen', 'inv_jadwal.kd_jd = inv_komponen.kd_jd_ko');
        $this->db->where('kd_jd', $id);
        return $this->db->get('inv_jadwal')->row();
    }
    function get_by_id($id){
        $this->db->order_by('inv_perawatan_h.dt_mulai','asc');
        $this->db->join('inv_perawatan_h', 'inv_perawatan_d.vc_kd_trans = inv_perawatan_h.vc_kd_trans');
        $this->db->join('inv_perawatan_tindakan', 'inv_perawatan_d.vc_kd_tindakan = inv_perawatan_tindakan.vc_kd_tindakan');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function insert($data){
        $this->db->insert($this->table, $data);
    }
    function get_kdinv(){
        $query = $this->db->query("SELECT * FROM [dbo].[inv_barang] 
                                JOIN inv_pubgugus ON inv_barang.id_ruang = inv_pubgugus.vc_k_gugus
                                WHERE inv_barang.kd_aset != ' ' ");
        return $query->result();
    }
    function get_by_id_jd($id){
        // $this->db->order_by('inv_jadwal_perawatan','asc');
        $this->db->where($this->idjd, $id);
        $this->db->join('inv_jadwal_perawatan', 'inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal');
        $this->db->join('inv_barang', 'inv_jadwal.kd_inv = inv_barang.kd_inv');
        return $this->db->get('inv_jadwal ')->row();
    }
    
    function update_perawatan($id, $data){
        $this->db->where($this->idjd, $id);
        $this->db->update($this->tablejd, $data);
    }

    function delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
    }

    function update_delete($id, $data){
        $this->db->where('kd_jd', $id);
        $this->db->update('inv_jadwal', $data);
    }
    
    function get_total_dt(){
        $query = $this->db->query("select count(*) as allcount from inv_jadwal
        join inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        join inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        join inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE 1=1 and inv_barang.aktif=1 and inv_jadwal.dt_sts = 1 and inv_barang.kd_aset != ''");
        return $query->result();
    }

    function get_total_fl($searchQuery){
        $query = $this->db->query("select count(*) as allcount from inv_jadwal
        join inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        join inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        join inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        WHERE 1=1 and inv_barang.aktif=1 and inv_jadwal.dt_sts = 1 and inv_barang.kd_aset != '' ".$searchQuery);
        return $query->result();
    }

    function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $query = $this->db->query("SELECT TOP ".$rowperpage." * from inv_jadwal
        join inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
        join inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
        join inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
        where 1=1 and inv_barang.aktif = 1 and inv_jadwal.dt_sts =1 and inv_barang.kd_aset != '' ".$searchQuery." and inv_jadwal.kd_jd NOT IN (
            SELECT TOP ".$baris." inv_jadwal.kd_jd FROM inv_jadwal 
            join inv_jadwal_perawatan on inv_jadwal.kd_jd = inv_jadwal_perawatan.kd_jadwal
            join inv_barang on inv_jadwal.kd_inv = inv_barang.kd_inv
            join inv_pubgugus on inv_jadwal.kd_ruang = inv_pubgugus.vc_k_gugus
            WHERE dt_sts =1 and inv_barang.aktif = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
        order by ".$columnName." ".$columnSortOrder);
        return $query->result();
    }
    
}
?>