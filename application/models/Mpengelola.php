<?php
class Mpengelola extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pengguna() {
        $query = $this->db->get('tb_pengguna');
        return $query->result();
    }

    public function tambahTempatWisata($data) {
        return $this->db->insert('tb_detailwisata', $data);
    }

    public function daftarsponsor($data) {
        return $this->db->insert('tb_sponsor', $data);
    }
}
?>
