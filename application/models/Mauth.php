<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mauth extends CI_Model {
    public function get_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_pengguna');
        $user = $query->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
    public function register($data) {
        return $this->db->insert('tb_pengguna', $data);
    }
}
