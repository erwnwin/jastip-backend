<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TitipanModel extends CI_Model
{
    public function get_items()
    {
        // return $this->db->get('tbl_request_barang')->result();
        $this->db->select('tbl_request_barang.*, tbl_pelanggan.nama_lengkap, tbl_jastip.nama_jastip');
        $this->db->from('tbl_request_barang');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_request_barang.pelanggan_id');
        $this->db->join('tbl_jastip', 'tbl_jastip.id = tbl_request_barang.jasa_titip_id');
        $this->db->where('tbl_request_barang.jasa_titip_id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file TitipanModel.php */
