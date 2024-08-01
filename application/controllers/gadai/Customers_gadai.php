<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers_gadai extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('GadaiModel');
    }


    public function index()
    {

        $data['title'] = 'Customers Gadai : Apps JasTip';
        $data['customers'] = json_decode(json_encode($this->GadaiModel->get_by_jastip_id()), true);
        // $data['customers'] = json_decode(json_encode($this->GadaiModel->get_by_jastip_id()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('gadai/customers_gadai', $data);
        $this->load->view('layouts/footer', $data);
    }
}

/* End of file Customers_gadai.php */