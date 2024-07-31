<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_titipan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RequestModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "jastip") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Status Titipan : Apps JasTip';

        $data['titipan_antar'] = json_decode(json_encode($this->TitipanModel->get_items_pengantaran()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('titipan/titipan_antar', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Titipan : Apps JasTip';

        $data['titipan_riwayat'] = json_decode(json_encode($this->TitipanModel->get_items_riwayat()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('titipan/titipan_riwayat', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Status_titipan.php */
