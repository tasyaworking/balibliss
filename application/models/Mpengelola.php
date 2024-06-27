<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengelola extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Tempat Wisata Methods
    public function insert_tempatwisata($data) {
        return $this->db->insert('tb_tempatwisata', $data);
    }

    public function get_all_tempatwisata() {
        return $this->db->get('tb_tempatwisata')->result();
    }

    public function tempatwisata_exists($nama_wisata) {
        $this->db->where('nama_wisata', $nama_wisata);
        $query = $this->db->get('tb_tempatwisata');
        return $query->num_rows() > 0;
    }

    // Sponsor Methods
    public function insert_sponsor($data) {
        return $this->db->insert('tb_sponsor', $data);
    }

    public function get_all_sponsor() {
        return $this->db->get('tb_sponsor')->result();
    }

    public function sponsor_exists($nama_sponsor) {
        $this->db->where('nama_sponsor', $nama_sponsor);
        $query = $this->db->get('tb_sponsor');
        return $query->num_rows() > 0;
    }
}
?>
