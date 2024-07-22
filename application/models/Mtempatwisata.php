<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtempatwisata extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Metode untuk menambah data tempat wisata
    public function insert($data) {
        return $this->db->insert('tb_tempatwisata', $data);
    }

    // Metode untuk mendapatkan semua data tempat wisata
    public function get_all() {
        $query = $this->db->get('tb_tempatwisata');
        return $query->result();
    }

    // Metode untuk mendapatkan data tempat wisata berdasarkan ID
    public function get_by_id($id) {
        $this->db->where('id_wisata', $id);
        $query = $this->db->get('tb_tempatwisata');
        return $query->row();
    }

    // Metode untuk memperbarui data tempat wisata
    public function update($id, $data) {
        $this->db->where('id_wisata', $id);
        return $this->db->update('tb_tempatwisata', $data);
    }

    // Metode untuk menghapus data tempat wisata
    public function delete($id) {
        $this->db->where('id_wisata', $id);
        return $this->db->delete('tb_tempatwisata');
    }
}
?>
