<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function login_user($username, $password)
    {
        // Menggunakan klausa where untuk mencocokkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Tanpa hashing
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login_jasa_titip($email, $password)
    {
        // Menggunakan klausa where untuk mencocokkan email dan password
        $this->db->where('alamat_email', $email);
        $this->db->where('password', $password); // Tanpa hashing
        $query = $this->db->get('tbl_jastip');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}

/* End of file LoginModel.php */
