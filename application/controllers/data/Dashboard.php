<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $data['title'] = 'Dashboard : Apps JasTip';

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('jastip/dashboard', $data);
        $this->load->view('layouts/footer', $data);
    }
}
