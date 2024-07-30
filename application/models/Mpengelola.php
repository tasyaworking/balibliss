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
        return $this->db->insert('tb_tempatwisata', $data); // Periksa nama tabel yang benar
    }

    public function daftarsponsor($data) {
        return $this->db->insert('sponsorship', $data);
    }
    
    public function get_tempat_wisata() {
        $this->db->select('*');
        $this->db->from('tb_tempatwisata');
        $query = $this->db->get();
        return $query->result(); // Pastikan kolom yang diambil sesuai dengan yang diharapkan
    }
    public function get_tempat_wisata_by_id($id_wisata) {
        $this->db->where('id_wisata', $id_wisata);
        $query = $this->db->get('tb_tempatwisata');
        return $query->row(); // Mengembalikan satu baris hasil query
    }

    public function updateTempatWisata($id_wisata, $data) {
        $this->db->where('id_wisata', $id_wisata);
        return $this->db->update('tb_tempatwisata', $data);
    }

    public function deleteTempatWisata($id_wisata) {
        $this->db->where('id_wisata', $id_wisata);
        return $this->db->delete('tb_tempatwisata');
    }
   
    public function get_all_tempatwisata() {
        return $this->db->get('tb_tempatwisata')->result();
    }
    public function get_tempatwisata_by_id($id_wisata) {
        $this->db->where('id_wisata', $id_wisata);
        $query = $this->db->get('tb_tempatwisata');
        return $query->result(); // Change to result() if you expect multiple rows, row() for a single row
    }
    
}
?>
