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
        $this->db->where_in('status', array('request', 'acc-request', 'payment-awal'));
        $this->db->order_by('tbl_request_barang.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_items_pengantaran()
    {
        // return $this->db->get('tbl_request_barang')->result();
        $this->db->select('tbl_request_barang.*, tbl_pelanggan.nama_lengkap, tbl_jastip.nama_jastip');
        $this->db->from('tbl_request_barang');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_request_barang.pelanggan_id');
        $this->db->join('tbl_jastip', 'tbl_jastip.id = tbl_request_barang.jasa_titip_id');
        $this->db->where('tbl_request_barang.jasa_titip_id', $this->session->userdata('id'));
        $this->db->where_in('status', array('pengantaran'));
        $this->db->order_by('tbl_request_barang.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_items_riwayat()
    {
        // return $this->db->get('tbl_request_barang')->result();
        $this->db->select('tbl_request_barang.*, tbl_pelanggan.nama_lengkap, tbl_jastip.nama_jastip');
        $this->db->from('tbl_request_barang');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_request_barang.pelanggan_id');
        $this->db->join('tbl_jastip', 'tbl_jastip.id = tbl_request_barang.jasa_titip_id');
        $this->db->where('tbl_request_barang.jasa_titip_id', $this->session->userdata('id'));
        $this->db->where_in('status', array('done-antar', 'batal-'));
        $this->db->order_by('tbl_request_barang.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTitipanTerbaruByPelangganId($pelanggan_id)
    {
        $this->db->select('id, nama_barang, jumlah, status');
        $this->db->where('pelanggan_id', $pelanggan_id);
        $this->db->where_in('status', array('request', 'acc-request', 'payment-awal'));
        $this->db->order_by('tbl_request_barang.id', 'desc');
        $query = $this->db->get('tbl_request_barang');
        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }

    public function getTitipanAntarByPelangganId($pelanggan_id)
    {
        $this->db->select('id, nama_barang, jumlah, status');
        $this->db->where('pelanggan_id', $pelanggan_id);
        $this->db->where_in('status', array('pengantaran'));
        $this->db->order_by('tbl_request_barang.id', 'desc');
        $query = $this->db->get('tbl_request_barang');
        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }

    public function deleteTitipan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_request_barang'); // Ganti dengan nama tabel yang sesuai
        return $this->db->affected_rows() > 0;
    }


    public function getIdRequest($id)
    {
        $this->db->select('r.id, r.pelanggan_id, r.jasa_titip_id, p.nama_lengkap, j.nama_jastip, j.no_rek_an, r.nama_barang, r.jumlah');
        $this->db->from('tbl_request_barang r');
        $this->db->join('tbl_pelanggan p', 'p.id = r.pelanggan_id');
        $this->db->join('tbl_jastip j', 'j.id = r.jasa_titip_id');
        $this->db->where('r.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function savePembayaran($data)
    {
        // Simpan data ke dalam tabel 'tbl_pembayaran'
        return $this->db->insert('tbl_pembayaran', $data);
    }

    public function updateRequestStatus($request_id, $data)
    {
        // Update status pada tabel 'tbl_request_barang' berdasarkan request_id
        $this->db->where('id', $request_id);
        return $this->db->update('tbl_request_barang', $data);
    }


    // public function delete_old_data()
    // {
    //     $one_hour_ago = date('Y-m-d H:i:s', strtotime('-1 hour'));

    //     $this->db->where('created_at <', $one_hour_ago);
    //     $this->db->delete('tbl_request_barang');
    // }

    public function delete_old_data()
    {
        $five_minutes_ago = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $this->db->where('created_at <', $five_minutes_ago);
        $this->db->delete('tbl_request_barang');
        log_message('info', 'Old data deleted successfully at ' . date('Y-m-d H:i:s'));
    }


    public function update_request_barang($id_request, $data)
    {
        $this->db->where('id', $id_request);
        $this->db->update('tbl_request_barang', $data);
    }

    public function update_pembayaran($id_request, $data)
    {
        $this->db->where('request_id', $id_request);
        $this->db->update('tbl_pembayaran', $data);
    }
}

/* End of file TitipanModel.php */
