<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class ApiJasaTitipController extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JastipModel');
    }

    public function index_get()
    {
        $jastip = new JastipModel;
        $jastip = $jastip->get_items();
        $this->response($jastip, 200);
        // echo "Cobaaa";
    }

    public function store_post()
    {
        $jastip = new JastipModel;
        $data = [
            'nama_jastip' =>  $this->input->post('nama_jastip'),
            'alamat' => $this->input->post('alamat'),
            'gambar' => $this->input->post('gambar'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'alamat_email' => $this->input->post('alamat_email'),
            'password' => $this->input->post('password'),
            'no_telp_wa' => $this->input->post('no_telp_wa'),
            'created_at' => date('Y-m-d h:m:s')
        ];
        $result = $jastip->insert_item($data);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil ditambahkan'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal ditambahkan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function edit_get($id)
    {
        $jastip = new JastipModel;
        $jastip = $jastip->get_item($id);
        $this->response($jastip, 200);
    }


    public function update_put($id)
    {
        $jastip = new JastipModel;
        $data = [
            'nama_jastip' =>  $this->put('nama_jastip'),
            'alamat' => $this->put('alamat'),
            'gambar' => $this->put('gambar'),
            'latitude' => $this->put('latitude'),
            'longitude' => $this->put('longitude'),
            'alamat_email' => $this->put('alamat_email'),
            'password' => $this->put('password'),
            'no_telp_wa' => $this->put('no_telp_wa'),
            'update_at' => date('Y-m-d h:m:s')
        ];
        $result = $jastip->update_item($id, $data);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil diupdate'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal diupdate'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function delete_delete($id)
    {
        $jastip = new JastipModel;
        $result = $jastip->delete_item($id);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'Berhasil dihapus'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal dihapus'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
