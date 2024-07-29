<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class ApiLogin extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
    }

    public function index_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $user = $this->PelangganModel->login($email, $password);

        if ($user) {
            $response = [
                'status' => true,
                'message' => 'Login berhasil',
                'data' => $user
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Username atau password salah'
            ];
        }

        $this->response($response);
    }
}
