<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ApiGadai extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('GadaiModel');
    }


    public function get_riwayat($pelanggan_id)
    {
        $gadai = $this->GadaiModel->get_riwayat($pelanggan_id);

        if ($gadai) {
            // Jika data ditemukan, kirim response JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($gadai));
        } else {
            // Jika tidak ada data ditemukan, kirim response kosong atau pesan error
            $this->output
                ->set_status_header(404)
                ->set_output(json_encode(['message' => 'Data tidak ditemukan']));
        }
    }
}

/* End of file ApiGadai.php */
