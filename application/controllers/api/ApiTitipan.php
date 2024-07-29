<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiTitipan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TitipanModel');
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
}

/* End of file ApiTitipan.php */
