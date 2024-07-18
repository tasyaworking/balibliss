<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msponsor extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load other dependencies or configurations if needed
        $this->load->database(); // Example: Load database if you're using it
    }

    // Example function to get sponsor data
    public function get_sponsor_data() {
        // Example query to fetch data from database
        $query = $this->db->get('tb_sponsor');
        return $query->result(); // Return data as array of objects or empty array
    }

    // Other methods related to Msponsor model
}
?>
