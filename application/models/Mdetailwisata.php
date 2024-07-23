<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetailwisata extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function tambahTempatWisata($data) {
        return $this->db->insert('tb_detailwisata', $data);
    }
}
?>
