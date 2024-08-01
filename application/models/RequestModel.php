<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RequestModel extends CI_Model
{

    public function create_request_barang($data)
    {
        return $this->db->insert('tbl_request_barang', $data);
    }


    public function getRequestDetails($idRequest)
    {
        // Query untuk mengambil data barang dan total bayar berdasarkan idRequest
        $this->db->select('tbl_request_barang.nama_barang, tbl_request_barang.jumlah, COALESCE(tbl_pembayaran.jumlah_bayar, 0) as total_bayar');
        $this->db->from('tbl_request_barang');
        $this->db->join('tbl_pembayaran', 'tbl_request_barang.id = tbl_pembayaran.request_id', 'left');
        $this->db->where('tbl_request_barang.id', $idRequest);
        $query = $this->db->get();

        // Return data request jika ada, atau null jika tidak ditemukan
        return $query->row_array();
    }

    public function getBuktiBayar($idRequest)
    {
        $this->db->select('bukti_tf'); // kolom yang sesuai
        $this->db->from('tbl_pembayaran');
        $this->db->where('request_id', $idRequest);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function updateStatus($id, $status)
    {
        // Validasi input jika diperlukan
        if ($id && $status) {
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            return $this->db->update('tbl_request_barang');
        }
        return false;
    }
}

/* End of file RequestModel.php */
