<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_gadai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('GadaiModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "jastip") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {

        $data['title'] = 'Riwayat Gadai : Apps JasTip';
        $data['riwayat'] = json_decode(json_encode($this->GadaiModel->get_riwayat_by_jastip_id()), true);
        // $data['customers'] = json_decode(json_encode($this->GadaiModel->get_by_jastip_id()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('gadai/riwayat_gadai', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Riwayat_gadai.php */
