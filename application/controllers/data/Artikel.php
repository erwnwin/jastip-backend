<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArtikelModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "admin") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Pengumuman : Apps JasTip';

        $data['pengumuman'] = json_decode(
            json_encode(
                $this->ArtikelModel->get_items()
            ),
            true
        );

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/artikel', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Artikel.php */
