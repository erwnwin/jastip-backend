<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info_apps extends CI_Controller
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

        $data['title'] = 'Informasi : Apps JasTip';

        // Load view dan kirim data ke viewss
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/info_apps', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Info_apps.php */
