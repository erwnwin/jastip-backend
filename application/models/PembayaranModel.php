<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranModel extends CI_Model
{
    public function get_pembayaran()
    {

        $this->db->select('tbl_pembayaran.*, tbl_pelanggan.nama_lengkap, tbl_pelanggan.alamat, tbl_request_barang.status, tbl_jastip.nama_jastip');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_pembayaran.pelanggan_id');
        $this->db->join('tbl_jastip', 'tbl_jastip.id = tbl_pembayaran.jastip_id');
        $this->db->join('tbl_request_barang', 'tbl_request_barang.id = tbl_pembayaran.request_id');
        $this->db->where('tbl_pembayaran.jastip_id', $this->session->userdata('id'));
        $this->db->where_in('tbl_request_barang.status', array('done-antar'));
        $this->db->order_by('tbl_pembayaran.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file PembayaranModel.php */
