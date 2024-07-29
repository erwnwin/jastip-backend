<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiRequestBarangController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RequestModel');
    }


    public function store_request()
    {
        $pelanggan_id = $this->input->post('pelanggan_id');
        $jasa_titip_id = $this->input->post('jasa_titip_id');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $alamat = $this->input->post('alamat');

        // Konfigurasi upload gambar
        $config['upload_path'] = './uploads/requests/'; // Folder tempat menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 4048; // 4MB maksimal ukuran gambar
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        $this->load->library('upload', $config);

        // Upload gambar
        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];

            // Prepare data for database insertion
            $data = array(
                'pelanggan_id' => $pelanggan_id,
                'jasa_titip_id' => $jasa_titip_id,
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'alamat' => $alamat,
                'gambar' => $gambar,
                'status' => 'request'
            );

            $insert = $this->RequestModel->create_request_barang($data);

            if ($insert) {
                // Data berhasil disimpan
                $response = array(
                    'success' => true,
                    'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                    'redirect' => base_url('request')
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

    public function submit_request()
    {
        $this->form_validation->set_rules('pelanggan_id', 'Pelanggan ID', 'required|integer');
        $this->form_validation->set_rules('jasa_titip_id', 'Jasa Titip ID', 'required|integer');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        // Validate input data
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = array(
                'error' => true,
                'message' => validation_errors()
            );
        } else {
            // Konfigurasi upload gambar
            $uploadPath = './uploads/barang/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 4048; // 4MB maksimal ukuran gambar
            $config['encrypt_name'] = TRUE; // Enkripsi nama file

            $this->load->library('upload', $config);

            // Upload gambar
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // Prepare data for database insertion
                $data = array(
                    'pelanggan_id' => $this->input->post('pelanggan_id'),
                    'jasa_titip_id' => $this->input->post('jasa_titip_id'),
                    'nama_barang' => $this->input->post('nama_barang'),
                    'jumlah' => $this->input->post('jumlah'),
                    'alamat' => $this->input->post('alamat'),
                    'gambar' => $gambar,
                    'status' => 'request'
                );

                $insert = $this->RequestModel->create_request_barang($data);

                if ($insert) {
                    // Data berhasil disimpan
                    $response = array(
                        'success' => true,
                        'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                        'redirect' => base_url('request')
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
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function upload_image()
    {
        // Konfigurasi upload
        $config['upload_path'] = './uploads/barang/'; // Path relatif dari root proyek CodeIgniter
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Menambahkan 'jpeg' untuk format JPEG
        $config['max_size'] = 4048; // Ukuran maksimal file dalam kilobyte (2MB)
        $config['encrypt_name'] = TRUE; // Enkripsi nama file untuk menghindari konflik nama file

        // Memuat library upload dengan konfigurasi
        $this->load->library('upload', $config);

        // Periksa apakah upload berhasil
        if (!$this->upload->do_upload('gambar')) {
            // Jika gagal, tampilkan pesan kesalahan
            $error = $this->upload->display_errors();
            $response = array(
                'error' => true,
                'message' => $error
            );
        } else {
            // Jika berhasil, ambil data upload
            $uploadData = $this->upload->data();
            $imagePath = $uploadData['file_name']; // URL gambar yang diunggah

            $response = array(
                'error' => false,
                'image_path' => $imagePath
            );
        }

        // Set header dan kirim respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    // public function submit_request()
    // {
    //     // Set validation rules
    //     $this->form_validation->set_rules('pelanggan_id', 'Pelanggan ID', 'required|integer');
    //     $this->form_validation->set_rules('jasa_titip_id', 'Jasa Titip ID', 'required|integer');
    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    //     // Validate input data
    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed
    //         $response = array(
    //             'error' => true,
    //             'message' => validation_errors()
    //         );
    //     } else {
    //         // Configure image upload settings
    //         $config['upload_path'] = './uploads/requests/';
    //         $config['allowed_types'] = 'gif|jpg|jpeg|png';
    //         $config['max_size'] = 4048; // 4MB
    //         $config['encrypt_name'] = TRUE; // Encrypt the image name

    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload('gambar')) {
    //             // Upload failed
    //             $error = $this->upload->display_errors();
    //             $response = array(
    //                 'error' => true,
    //                 'message' => $error
    //             );
    //         } else {
    //             // Upload succeeded
    //             $uploadData = $this->upload->data();
    //             $imagePath = 'uploads/requests/' . $uploadData['file_name'];

    //             // Prepare data for database insertion
    //             $data = array(
    //                 'pelanggan_id' => $this->input->post('pelanggan_id'),
    //                 'jasa_titip_id' => $this->input->post('jasa_titip_id'),
    //                 'nama_barang' => $this->input->post('nama_barang'),
    //                 'jumlah' => $this->input->post('jumlah'),
    //                 'alamat' => $this->input->post('alamat'),
    //                 'gambar' => $imagePath, // Store image path in database
    //                 'status' => 'request'
    //             );

    //             // Insert data into the database
    //             $insert = $this->RequestModel->create_request_barang($data);

    //             if ($insert) {
    //                 $response = array(
    //                     'error' => false,
    //                     'message' => 'Request berhasil dibuat'
    //                 );
    //             } else {
    //                 $response = array(
    //                     'error' => true,
    //                     'message' => 'Gagal membuat request'
    //                 );
    //             }
    //         }
    //     }

    //     // Set output response
    //     $this->output
    //         ->set_content_type('application/json')
    //         ->set_output(json_encode($response));
    // }
}

/* End of file ApiRequestBarangController.php */
