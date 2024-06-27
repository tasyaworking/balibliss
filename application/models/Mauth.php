<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database library jika belum dimuat secara global
        $this->load->database();
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan email dan password
    public function get_pengguna($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_pengguna');
        $user = $query->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    // Fungsi untuk mendaftarkan pengguna baru
    public function register($data) {
        return $this->db->insert('tb_pengguna', $data);
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan ID
    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row(); // Mengembalikan baris pertama hasil query sebagai objek
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result(); // Mengembalikan semua hasil query sebagai array objek
    }

    // Fungsi untuk menambahkan pengguna baru
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // Fungsi untuk mengupdate data pengguna
    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    // Fungsi untuk menghapus pengguna berdasarkan ID
    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->delete('users');
    }
}