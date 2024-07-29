<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RequestModel extends CI_Model
{

    public function create_request_barang($data)
    {
        return $this->db->insert('tbl_request_barang', $data);
    }
}

/* End of file RequestModel.php */
