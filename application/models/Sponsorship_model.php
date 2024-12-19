<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsorship_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert sponsor data into the database
    public function insert($data) {
        return $this->db->insert('sponsorship', $data);
    }

    // Get all sponsor data
    public function get_all() {
        $query = $this->db->get('sponsorship');
        return $query->result_array();
    }

    // Get a single sponsor by ID
    public function get_by_id($id) {
        $query = $this->db->get_where('sponsorship', array('id' => $id));
        return $query->row();
    }

    // Update sponsor data by ID
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('sponsorship', $data);
    }

    // Delete sponsor by ID
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('sponsorship');
    }
}
?>
