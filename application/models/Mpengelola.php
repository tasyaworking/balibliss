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
<<<<<<< HEAD
    public function tambahTempatWisata($data) {
        log_message('debug', 'Data to be inserted into database: ' . print_r($data, true));
        return $this->db->insert('tb_tempatwisata', $data);
    }

    public function updateTempatWisata($id_wisata, $data) {
        $this->db->where('id_wisata', $id_wisata);
        return $this->db->update('tb_tempatwisata', $data);
    }

    public function deleteTempatWisata($id_wisata) {
        $this->db->where('id_wisata', $id_wisata);
        return $this->db->delete('tb_tempatwisata');
    }


=======
>>>>>>> parent of 39ee102 (P)
}
?>
