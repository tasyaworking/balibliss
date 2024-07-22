<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msponsorship extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Method untuk menambah data sponsor
    public function insert($data) {
        return $this->db->insert('sponsorship', $data);
    }
}
?>
