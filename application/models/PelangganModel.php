<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PelangganModel extends CI_Model
{
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // Contoh enkripsi password, disesuaikan dengan kebutuhan Anda
        $query = $this->db->get('tbl_pelanggan');

        if ($query->num_rows() == 1) {
            return $query->row_array(); // Mengembalikan data user jika login berhasil
        } else {
            return false; // Mengembalikan false jika login gagal
        }
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_pelanggan');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function registrasi($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
        return $this->db->insert_id();
    }

    public function save_otp($data)
    {
        return $this->db->insert('tbl_otp', $data);
    }

    public function get_otp($nomor, $otp)
    {
        $this->db->where('nomor', $nomor);
        $this->db->where('otp', $otp);
        $query = $this->db->get('tbl_otp');
        return $query->row_array();
    }
}

/* End of file PelangganModel.php */
