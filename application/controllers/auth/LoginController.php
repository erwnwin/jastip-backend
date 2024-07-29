<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
    }


    public function login()
    {
        // Ambil data dari input POST
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi email dan password
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('valid_email' => '%s tidak valid.'));
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $errors = strip_tags(validation_errors());
            $errors = str_replace('the', '', $errors);

            $response['error'] = true;
            $response['message'] = trim($errors);
        } else {
            // Panggil model untuk melakukan pengecekan login
            $user = $this->PelangganModel->get_user_by_email($email);

            if ($user) {
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    $response['error'] = false;
                    $response['message'] = "Login berhasil";
                    $response['user'] = $user; // Data user yang login
                } else {
                    $response['error'] = true;
                    $response['message'] = "Email atau password salah";
                }
            } else {
                $response['error'] = true;
                $response['message'] = "Email atau password salah";
            }
        }

        echo json_encode($response);
    }



    // public function index()
    // {
    //     $siswa = $this->PelangganModel->get_all();

    //     $response = array();

    //     foreach ($siswa->result() as $hasil) {

    //         $response[] = array(
    //             'nama_lengkap' => $hasil->nama_lengkap,
    //             'alamat'     => $hasil->alamat
    //         );
    //     }

    //     header('Content-Type: application/json');
    //     echo json_encode(
    //         array(
    //             'success' => true,
    //             'message' => 'Get All Data Siswa',
    //             'data'    => $response
    //         )
    //     );
    // }




    // public function login()
    // {
    //     // Ambil data dari input POST
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     // Validasi email dan password
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() === FALSE) {
    //         $response['error'] = true;
    //         $response['message'] = validation_errors();
    //     } else {
    //         // Panggil model untuk melakukan pengecekan login
    //         $user = $this->PelangganModel->login($email, $password);

    //         if ($user) {
    //             $response['error'] = false;
    //             $response['message'] = "Login berhasil";
    //             $response['user'] = $user; // Data user yang login
    //         } else {
    //             $response['error'] = true;
    //             $response['message'] = "Email atau password salah";
    //         }
    //     }

    //     echo json_encode($response);
    // }
}

/* End of file LoginController.php */
