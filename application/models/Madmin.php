<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

    public function data_pengguna() {
        $query = $this->db->get('tb_pengguna');
		return $query->result();
    }

    public function data_alamat() {
        $query = $this->db->get('tb_alamat');
		return $query->result();
    }

    public function data_hp() {
        $query = $this->db->get('tb_contact');
		return $query->result();
    }

}

?>