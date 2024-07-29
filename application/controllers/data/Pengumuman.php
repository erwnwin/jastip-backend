<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengumumanModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "admin") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Pengumuman : Apps JasTip';


        $data['pengumuman'] = json_decode(
            json_encode(
                $this->PengumumanModel->get_items()
            ),
            true
        );

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengumuman/pengumuman', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Pengumuman : Apps JasTip';

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/pengumuman/create', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        $judul_pengumuman =  $this->input->post('judul_pengumuman');
        $detail_pengumuman = $this->input->post('detail_pengumuman');
        $gambar_depan = $this->input->post('gambar_depan');
        $status_pengumuman = $this->input->post('status_pengumuman');
        // $longitude = $this->input->post('longitude');
        // $alamat_email = $this->input->post('alamat_email');
        // $password = $this->input->post('password');
        // $no_telp_wa = $this->input->post('no_telp_wa');
        // $created_at = date('Y-m-d h:m:s');

        // Konfigurasi upload gambar_depan
        $config['upload_path'] = './public/uploads/pengumuman/'; // Folder tempat menyimpan gambar_depan
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 5048; // 2MB maksimal ukuran gambar_depan
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        // Data yang akan dikirim ke REST API
        $this->load->library('upload', $config);

        // Upload gambar_depan
        if ($this->upload->do_upload('gambar_depan')) {
            $upload_data = $this->upload->data();
            $gambar_depan = $upload_data['file_name'];
            $data = array(
                'judul_pengumuman' => $judul_pengumuman,
                'detail_pengumuman' => $detail_pengumuman,
                'gambar_depan' => $gambar_depan,
                'status_pengumuman' => $status_pengumuman,
                'created_at' => date('Y-m-d h:m:s'),
                'id_user' => 1,
                // 'alamat_email' => $alamat_email,
                // 'password' => $password,
                // 'no_telp_wa' => $no_telp_wa,
                // 'created_at' => $created_at
            );

            $simpan = $this->PengumumanModel->insert_item($data);

            if ($simpan) {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('pengumuman')
                );
            } else {
                // Gagal menyimpan data
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br>Data Gagal Disimpan!'
                );
            }
        } else {
            // Gagal upload gambar_depan
            $response = array(
                'success' => false,
                'message' => 'Gagal!<br> Upload Gambar Gagal: ' . $this->upload->display_errors()
            );
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}

/* End of file Pengumuman.php */
