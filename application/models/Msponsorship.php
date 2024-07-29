<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msponsorship extends CI_Model {

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
    public function get_by_id($id_sponsor) {
        $query = $this->db->get_where('sponsorship', array('id_sponsor' => $id_sponsor));
        return $query->row();
    }

    // Update sponsor data by ID
    public function update($id_sponsor, $data) {
        $this->db->where('id', $id_sponsor);
        return $this->db->update('sponsorship', $data);
    }

    // Delete sponsor by ID
    public function delete($id_sponsor) {
        $this->db->where('id_sponsor', $iid_sponsord);
        return $this->db->delete('sponsorship');
    }
}
?>
