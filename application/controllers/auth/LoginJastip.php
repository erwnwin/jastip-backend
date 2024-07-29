<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginJastip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }


    public function index()
    {
        $data['title'] = 'Login : Apps JasTip';

        $this->load->view('auth/login', $data);
    }

    public function act_login()
    {
        $table = $this->input->post('table');
        $identifier = $this->input->post('identifier');
        $password = $this->input->post('password');

        if ($table == 'tbl_users') {
            $result = $this->LoginModel->login_user($identifier, $password);
            $hak_akses = 'admin';
        } else if ($table == 'tbl_jastip') {
            $result = $this->LoginModel->login_jasa_titip($identifier, $password);
            $hak_akses = 'jastip';
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Gagal!<br>Data pengguna tidak ditemukan!'
            ));
            return;
        }

        if ($result) {
            // Tentukan ID berdasarkan tabel
            $id = ($table == 'tbl_users') ? $result->id_user : $result->id;
            // Menyimpan data sesi dengan hak akses manual
            $this->session->set_userdata(array(
                'masuk' => 'true',
                'id' => $id,
                'username' => isset($result->username) ? $result->username : $result->alamat_email,
                'nama' => isset($result->username) ? $result->nama_user : $result->nama_jastip,
                'hak_akses' => $hak_akses // Hak akses manual
            ));

            echo json_encode(array(
                'status' => 'success',
                'message' => 'Sukses!<br>Login successful',
                'redirect' => base_url('dashboard')
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Gagal!<br>Invalid username or password'
            ));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}

/* End of file LoginJastip.php */
