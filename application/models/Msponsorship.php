<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msponsorship extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert sponsor data into the database
    public function insert($data) {
        $data['diterima'] = 'tidak';
        return $this->db->insert('tb_sponsor', $data);
    }

    // Get all sponsor data
    public function get_all() {
        $query = $this->db->get('tb_sponsor');
        return $query->result_array();
    }

    // Get a single sponsor by ID
    public function get_by_id($id_sponsor) {
        $query = $this->db->get_where('tb_sponsor', array('id_sponsor' => $id_sponsor));
        return $query->row();
    }

    // Update sponsor data by ID
    public function update($id_sponsor, $data) {
        $this->db->where('id_sponsor', $id_sponsor); // Perbaiki nama kolom yang digunakan
        return $this->db->update('tb_sponsor', $data);
    }

    // Delete sponsor by ID
    public function delete($id_sponsor) {
        $this->db->where('id_sponsor', $id_sponsor); // Perbaiki nama variabel yang digunakan
        return $this->db->delete('tb_sponsor');
    }
}
?>
