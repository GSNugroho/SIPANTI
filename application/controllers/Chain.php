<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chain extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chain_model');
    }
    // untuk add
    public function index()
    {
        $data = array(
            'provinsi' => $this->Chain_model->get_provinsi(),
            'kota' => $this->Chain_model->get_kota(),
            'kecamatan' => $this->Chain_model->get_kecamatan(),
            'provinsi_selected' => '',
            'kota_selected' => '',
            'kecamatan_selected' => '',
        );
        $this->load->view('chain', $data);
    }
    // untuk edit
    public function edit()
    {
        // realnya ambil data dari database, misalnya kita dapatkan data sbb:
        $id_kecamatan = 4;
        // kita ambil data selected nya untuk selected option
        $selected = $this->Chain_model->get_selected_by_id_kecamatan($id_kecamatan);
        $data = array(
            'provinsi' => $this->Chain_model->get_provinsi(),
            'kota' => $this->Chain_model->get_kota(),
            'kecamatan' => $this->Chain_model->get_kecamatan(),
            'provinsi_selected' => $selected->id_provinsi,
            'kota_selected' => $selected->id_kota,
            'kecamatan_selected' => $selected->id_kecamatan,
        );
        $this->load->view('chain', $data);
    }
    public function aksi_form()
    {
        // datanya bisa kita insert ke DB atau yang lain
        // di sini saya hanya menampilkan datanya saja
        var_dump($this->input->post());
    }
}