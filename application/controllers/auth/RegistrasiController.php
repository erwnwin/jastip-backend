<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RegistrasiController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
    }

    public function register()
    {
        // Ambil data dari input POST
        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $whatsapp = $this->input->post('whatsapp');

        // Validasi input
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_pelanggan.username]', array('required' => '%s harus diisi.', 'is_unique' => '%s sudah digunakan.'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_pelanggan.email]', array('required' => '%s harus diisi.', 'valid_email' => '%s tidak valid.', 'is_unique' => '%s sudah digunakan.'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s harus diisi.'));
        $this->form_validation->set_rules('whatsapp', 'WhatsApp', 'required', array('required' => '%s harus diisi.'));

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kirimkan pesan error
            // Hapus tag HTML dan kata "the" dari pesan kesalahan
            $errors = strip_tags(validation_errors());
            $errors = str_replace('the', '', $errors);

            $response['error'] = true;
            $response['message'] = trim($errors);

            // $response['error'] = true;
            // $response['message'] = strip_tags(validation_errors());
            echo json_encode($response);
            return;
        } else {
            // Register user
            $data = [
                'nama_lengkap' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'alamat' => $alamat,
                'whatsapp' => $whatsapp
            ];

            $user_id = $this->PelangganModel->registrasi($data);

            if ($user_id) {
                // Generate OTP
                $otp = rand(100000, 999999);
                $waktu = time();
                $otp_data = [
                    'nomor' => $whatsapp,
                    'otp' => $otp,
                    'waktu' => $waktu
                ];

                // Simpan OTP ke database atau tempat penyimpanan yang sesuai
                $this->PelangganModel->save_otp($otp_data);

                // Kirim OTP via WhatsApp (misalnya menggunakan layanan pihak ketiga seperti Fonnte)
                $this->sendWhatsappOTP($whatsapp, $otp);

                // Kirim response sukses
                $response['error'] = false;
                $response['message'] = 'User registered successfully. OTP sent.';
                $response['user_id'] = $user_id;
                echo json_encode($response);
            } else {
                // Jika gagal registrasi
                $response['error'] = true;
                $response['message'] = 'Failed to register user.';
                echo json_encode($response);
            }
        }
    }

    // Metode untuk mengirim OTP via WhatsApp menggunakan layanan pihak ketiga (contoh)
    private function sendWhatsappOTP($whatsapp, $otp)
    {
        // Implementasi pengiriman OTP via WhatsApp
        // Gunakan metode pengiriman pesan sesuai dengan API yang digunakan (misalnya menggunakan layanan pihak ketiga)
        // Contoh pengiriman menggunakan layanan curl ke Fonnte
        $curl = curl_init();
        $data = [
            'target' => $whatsapp,
            'message' => "Your OTP : " . $otp
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: jFT1fNY+#xWhZiN443zm"));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
    }

    public function verify_otp()
    {

        $nomor = $this->input->post('nomor');
        $otp = $this->input->post('otp');

        // Validasi input
        if (empty($nomor) || empty($otp)) {
            $response['error'] = true;
            $response['message'] = 'Nomor WhatsApp dan OTP harus diisi.';
            echo json_encode($response);
            return;
        } else {
            // Cek OTP
            $otp_data = $this->PelangganModel->get_otp($nomor, $otp);

            if ($otp_data) {
                // Periksa apakah OTP masih berlaku (misalnya valid selama 5 menit)
                if (time() - $otp_data['waktu'] <= 300) {
                    $response['error'] = false;
                    $response['message'] = 'OTP berhasil diverifikasi.';
                } else {
                    $response['error'] = true;
                    $response['message'] = 'OTP telah kadaluarsa.';
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'OTP tidak valid.';
            }

            echo json_encode($response);
        }
    }
}
