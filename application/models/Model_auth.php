<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Fungsi untuk cek login berdasarkan username
    public function cek_login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_user'); // Pastikan tabel users ada di database
        return $query->row(); // Mengembalikan object user atau NULL jika tidak ditemukan
    }

      // Fungsi untuk mengambil data user berdasarkan ID
      public function getUserById($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_user'); // Pastikan nama tabel sesuai dengan database
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu record sebagai object
        } else {
            return false;
        }
    }

    // Fungsi untuk memperbarui password user
    public function updatePassword($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('tb_user', $data); // Mengembalikan TRUE jika update berhasil
    }
}
?>
