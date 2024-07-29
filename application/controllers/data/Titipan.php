<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Titipan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TitipanModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "jastip") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Titipan Terbaru : Apps JasTip';

        $data['titipan'] = json_decode(json_encode($this->TitipanModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('titipan/titipan_terbaru', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Titipan.php */
