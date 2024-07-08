<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_pengguna($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_pengguna');
        $user = $query->row();
        
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                log_message('error', 'Password salah untuk pengguna dengan email: ' . $email);
            }
        } else {
            log_message('error', 'Pengguna dengan email: ' . $email . ' tidak ditemukan');
        }
        
        return false;
    }

    public function register($data) {
        return $this->db->insert('tb_pengguna', $data);
    }

    public function email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_pengguna');
        return $query->num_rows() > 0;
    }

    public function no_hp_exists($no_hp) {
        $this->db->where('no_hp', $no_hp);
        $query = $this->db->get('tb_pengguna');
        return $query->num_rows() > 0;
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_pengguna');
        return $query->row();
    }

    public function get_all_users() {
        $query = $this->db->get('tb_pengguna');
        return $query->result();
    }

    public function insert_user($data) {
        return $this->db->insert('tb_pengguna', $data);
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('tb_pengguna', $data);
    }

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->delete('tb_pengguna');
    }
}
?>
