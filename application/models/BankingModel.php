<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BankingModel extends CI_Model
{
    public function getBankData($idRequest)
    {
        // Query untuk mengambil data bank dari database berdasarkan $idRequest
        $query = $this->db
            ->select('nama_bank, an_rek, no_rek_an')
            ->from('tbl_jastip')
            ->join('tbl_request_barang', 'tbl_jastip.id = tbl_request_barang.jasa_titip_id')
            ->where('tbl_request_barang.id', $idRequest)
            ->get();

        // Return data bank jika ada, atau null jika tidak ditemukan
        return $query->row_array();
    }

    public function get_items()
    {
        // return $this->db->get('tbl_request_barang')->result();
        $this->db->select('*');
        $this->db->from('tbl_banks');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file BankingModel.php */
