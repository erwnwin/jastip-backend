<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GadaiModel extends CI_Model
{
    public function get_items()
    {
        // return $this->db->get('tbl_request_barang')->result();
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('tbl_form_gadai', $data);
    }

    public function get_by_jastip_id()
    {
        $this->db->select('tbl_form_gadai.*, tbl_pelanggan.nama_lengkap, tbl_pelanggan.alamat, tbl_jastip.nama_jastip');
        $this->db->from('tbl_form_gadai');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_form_gadai.pelanggan_id');
        $this->db->join('tbl_jastip', 'tbl_jastip.id = tbl_form_gadai.jastip_id');
        $this->db->join('tbl_banks', 'tbl_banks.id = tbl_form_gadai.banks_id', 'left');
        $this->db->where('tbl_form_gadai.jastip_id', $this->session->userdata('id'));
        $this->db->order_by('tbl_form_gadai.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file GadaiModel.php */
