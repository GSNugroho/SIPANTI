    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Chain_model extends CI_Model {
        public function get_provinsi()
        {
            $this->db->order_by('nama_provinsi', 'asc');
            return $this->db->get('provinsi')->result();
        }
        public function get_kota()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_kota', 'asc');
            $this->db->join('provinsi', 'kota.id_provinsi_fk = provinsi.id_provinsi');
            return $this->db->get('kota')->result();
        }
        public function get_kecamatan()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('nama_kecamatan', 'asc');
            $this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
            return $this->db->get('kecamatan')->result();
        }
        // untuk edit ambil dari id level paling bawah
        public function get_selected_by_id_kecamatan($id_kecamatan)
        {
            $this->db->where('id_kecamatan', $id_kecamatan);
            $this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
            $this->db->join('provinsi', 'kota.id_provinsi_fk = provinsi.id_provinsi');
            return $this->db->get('kecamatan')->row();
        }
    }