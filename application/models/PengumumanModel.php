<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengumumanModel extends CI_Model
{
    public function get_items()
    {
        // Logic untuk mengambil semua item (contoh)
        return $this->db->get('tbl_pengumuman')->result();
        // -5.073821852559766, 119.6208287605224
    }

    public function get_item($id)
    {
        // Logic untuk mengambil satu item berdasarkan ID (contoh)
        return $this->db->get_where('tbl_pengumuman', ['id' => $id])->row();
    }

    public function insert_item($data)
    {
        // Logic untuk menambahkan item baru (contoh)
        $this->db->insert('tbl_pengumuman', $data);
        return $this->db->insert_id();
    }

    public function update_item($id, $data)
    {
        // Logic untuk memperbarui item berdasarkan ID (contoh)
        $this->db->where('id', $id);
        $this->db->update('tbl_pengumuman', $data);
        return $this->db->affected_rows();
    }

    public function delete_item($id)
    {
        // Logic untuk menghapus item berdasarkan ID (contoh)
        $this->db->where('id', $id);
        $this->db->delete('tbl_pengumuman');
        return $this->db->affected_rows();
    }
}

/* End of file PengumumanModel.php */
