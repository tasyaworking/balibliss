<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msponsorship extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function save($data) {
        return $this->db->insert('sponsorship', $data);
    }
}
?>
