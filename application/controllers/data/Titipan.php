<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Titipan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TitipanModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "jastip") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Titipan Terbaru : Apps JasTip';

        $data['titipan'] = json_decode(json_encode($this->TitipanModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('titipan/titipan_terbaru', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function acc($id)
    {
        $data['request'] = $this->TitipanModel->getIdRequest($id);
        $data['title'] = 'Lanjutkan Pembayaran : Apps JasTip';

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('titipan/buat_pembayaran', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function pembayaran_store()
    {
        $jumlah_bayar = $this->input->post('jumlah_bayar');
        $request_id = $this->input->post('request_id');
        $jastip_id = $this->input->post('jastip_id');
        $pelanggan_id = $this->input->post('pelanggan_id');

        if (empty($jumlah_bayar) || empty($request_id)) {
            // Jika ada data yang kosong, kirim respons error
            $response = [
                'status' => false,
                'message' => 'Jumlah bayar atau request ID tidak boleh kosong.'
            ];
            echo json_encode($response);
            return;
        } else {
            $this->load->model('TitipanModel');
            $data_pembayaran = [
                'request_id' => $request_id,
                'jumlah_bayar' => $jumlah_bayar,
                'jastip_id' => $jastip_id,
                'pelanggan_id' => $pelanggan_id,
                'type_bayar' => 'transfer',
                'status_bayar' => 'no-done'
            ];
            $saved_pembayaran = $this->TitipanModel->savePembayaran($data_pembayaran);

            $data_request = [
                'status' => 'acc-request'
            ];

            $updated_request = $this->TitipanModel->updateRequestStatus($request_id, $data_request);

            if ($saved_pembayaran && $updated_request) {
                $response = [
                    'status' => true,
                    'message' => 'Pembayaran berhasil diproses.',
                    'redirect' => base_url('titipan')
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Gagal menyimpan data pembayaran atau mengupdate status.'
                ];
            }


            echo json_encode($response);
        }
    }
}

/* End of file Titipan.php */
