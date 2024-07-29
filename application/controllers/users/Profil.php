<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != "true") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        // $response = file_get_contents('http://api.example.com/items');
        // $data['items'] = json_decode($response, true);

        $data['title'] = 'Profil : Apps JasTip';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/profil', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Profil.php */
