<?php
class m_perbaikan extends CI_Model{
    
    public $table = 'inv_perbaikan';
    public $id = 'id_perbaikan';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }
}
?>