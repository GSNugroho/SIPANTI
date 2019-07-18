<?php
class m_jadwal extends CI_Model{

    public $table = 'inv_jadwal';
    public $id = 'kd_jadwal';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_data(){
        return $this->db->get('inv_jadwal')->result();
    }
    function get_ruang(){
        $query = $this->db->query('SELECT * FROM inv_pubgugus');
		return $query->result();
    }
    function insert($data){
        $this->db->insert($this->table, $data);
    }
}
?>