<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiTitipan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TitipanModel');
        $this->load->model('BankingModel');
        $this->load->model('RequestModel');
    }


    public function getTitipanTerbaruByPelangganId($pelanggan_id)
    {
        $titipan = $this->TitipanModel->getTitipanTerbaruByPelangganId($pelanggan_id);

        if ($titipan) {
            // Jika data ditemukan, kirim response JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($titipan));
        } else {
            // Jika tidak ada data ditemukan, kirim response kosong atau pesan error
            $this->output
                ->set_status_header(404)
                ->set_output(json_encode(['message' => 'Data tidak ditemukan']));
        }
    }

    public function getTitipanAntarByPelangganId($pelanggan_id)
    {
        $titipan = $this->TitipanModel->getTitipanAntarByPelangganId($pelanggan_id);

        if ($titipan) {
            // Jika data ditemukan, kirim response JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($titipan));
        } else {
            // Jika tidak ada data ditemukan, kirim response kosong atau pesan error
            $this->output
                ->set_status_header(404)
                ->set_output(json_encode(['message' => 'Data tidak ditemukan']));
        }
    }

    public function deleteTitipan($id)
    {
        log_message('debug', 'ID yang diterima: ' . $id);

        if (empty($id) || !is_numeric($id)) {
            $this->output
                ->set_status_header(400) // Bad Request
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Invalid ID']));
            return;
        }

        if ($this->TitipanModel->deleteTitipan($id)) {
            $this->output
                ->set_status_header(200) // OK
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Titipan berhasil dihapus']));
        } else {
            $this->output
                ->set_status_header(500) // Internal Server Error
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Gagal menghapus titipan']));
        }
    }

    public function delete_old_data()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

        $this->TitipanModel->delete_old_data();
        // echo "Old data deleted successfully";
    }


    public function proses_pay()
    {
        $this->form_validation->set_rules('id', 'ID Request', 'required|integer');
        $this->form_validation->set_rules('bukti_tf', 'Bukti Transfer', 'callback_file_check'); // Custom callback untuk file

        // Validasi data input
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal
            $response = array(
                'error' => true,
                'message' => validation_errors()
            );
        } else {
            // Konfigurasi upload bukti transfer
            $uploadPath = './uploads/bukti_tf/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 4048; // 4MB maksimal ukuran gambar
            $config['encrypt_name'] = TRUE; // Enkripsi nama file

            $this->load->library('upload', $config);

            // Upload bukti transfer
            if ($this->upload->do_upload('bukti_tf')) {
                $upload_data = $this->upload->data();
                $bukti_tf = $upload_data['file_name'];

                // Prepare data untuk update di tbl_request_barang
                $data_request = array(
                    'status' => 'payment-awal'
                );

                // Debugging
                log_message('debug', 'Updating request with ID: ' . $this->input->post('id'));
                $this->TitipanModel->update_request_barang($this->input->post('id'), $data_request);

                // Prepare data untuk update di tbl_pembayaran
                $data_pembayaran = array(
                    'bukti_tf' => $bukti_tf,
                    'status_bayar' => 'done'
                );

                // Debugging
                log_message('debug', 'Updating payment with ID: ' . $this->input->post('id'));
                $this->TitipanModel->update_pembayaran($this->input->post('id'), $data_pembayaran);

                $response = array(
                    'success' => true,
                    'message' => 'Sukses! Bukti transfer berhasil diupload dan status diperbarui.',
                    'redirect' => base_url('request')
                );
            } else {
                // Gagal upload bukti transfer
                $response = array(
                    'success' => false,
                    'message' => 'Gagal! Upload bukti transfer gagal: ' . $this->upload->display_errors()
                );
            }
        }

        // Set header dan kirim response dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Callback untuk validasi file
    public function file_check($str)
    {
        if (empty($_FILES['bukti_tf']['name'])) {
            $this->form_validation->set_message('file_check', 'Pilih file bukti transfer');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function getBankData($idRequest)
    {
        // Panggil model untuk mengambil data bank berdasarkan idRequest
        $bankData = $this->BankingModel->getBankData($idRequest);

        if ($bankData) {
            // Jika data ditemukan, kirim respons JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($bankData));
        } else {
            // Jika data tidak ditemukan, kirim respons JSON kosong atau error
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Bank data not found']));
        }
    }

    public function getRequestDetails($idRequest)
    {
        // Panggil model untuk mengambil data barang dan total bayar berdasarkan idRequest
        $requestData = $this->RequestModel->getRequestDetails($idRequest);

        if ($requestData) {
            // Jika data ditemukan, kirim respons JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($requestData));
        } else {
            // Jika data tidak ditemukan, kirim respons JSON kosong atau error
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Data tidak ditemukan']));
        }
    }
}

/* End of file ApiTitipan.php */
