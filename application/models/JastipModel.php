<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JastipModel extends CI_Model
{

    public function get_items()
    {
        // Logic untuk mengambil semua item (contoh)
        return $this->db->get('tbl_jastip')->result();
        // -5.073821852559766, 119.6208287605224
    }

    public function get_item($id)
    {
        // Logic untuk mengambil satu item berdasarkan ID (contoh)
        return $this->db->get_where('tbl_jastip', ['id' => $id])->row();
    }

    public function insert_item($data)
    {
        // Logic untuk menambahkan item baru (contoh)
        $this->db->insert('tbl_jastip', $data);
        return $this->db->insert_id();
    }

    public function update_item($id, $data)
    {
        // Logic untuk memperbarui item berdasarkan ID (contoh)
        $this->db->where('id', $id);
        $this->db->update('tbl_jastip', $data);
        return $this->db->affected_rows();
    }

    public function delete_item($id)
    {
        // Logic untuk menghapus item berdasarkan ID (contoh)
        $this->db->where('id', $id);
        $this->db->delete('tbl_jastip');
        return $this->db->affected_rows();
    }
}
