<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jasa_titip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JastipModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "admin") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['title'] = 'Jasa Titip : Apps JasTip';

        $data['jastip'] = json_decode(json_encode($this->JastipModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('jastip/jasa_titip', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Jasa Titip : Apps JasTip';

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('jastip/create_jasa_titip', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        $nama_jastip =  $this->input->post('nama_jastip');
        $alamat = $this->input->post('alamat');
        $gambar = $this->input->post('gambar');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $alamat_email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $no_telp_wa = $this->input->post('no_telp_wa');
        $created_at = date('Y-m-d h:m:s');

        // Konfigurasi upload gambar
        $config['upload_path'] = './public/uploads/'; // Folder tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB maksimal ukuran gambar
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        // Data yang akan dikirim ke REST API
        $this->load->library('upload', $config);

        // Upload gambar
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'nama_jastip' => $nama_jastip,
                'alamat' => $alamat,
                'gambar' => $gambar,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'alamat_email' => $alamat_email,
                'password' => $password,
                'no_telp_wa' => $no_telp_wa,
                'created_at' => $created_at
            );

            $simpan = $this->JastipModel->insert_item($data);

            if ($simpan) {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('jasa-titip')
                );
            } else {
                // Gagal menyimpan data
                $response = array(
                    'success' => false,
                    'message' => 'Gagal!<br>Data Gagal Disimpan!'
                );
            }
        } else {
            // Gagal upload gambar
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


    public function delete()
    {
        $id = $this->input->post('id');

        // Lakukan proses delete di dalam model
        $delete = $this->JastipModel->delete_item($id);

        if ($delete) {
            // Data berhasil dihapus
            $response = array(
                'success' => true,
                'message' => 'Sukses!<br>Data berhasil dihapus'
            );
        } else {
            // Gagal menghapus data
            $response = array(
                'success' => false,
                'message' => 'Gagal!<br>Gagal menghapus data'
            );
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
