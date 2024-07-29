<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiJasTipController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JastipModel');
    }

    public function index()
    {
        $jastip = $this->JastipModel->get_items();

        // Mengirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jastip));
    }


    
}

/* End of file ApiJasTipController.php */
