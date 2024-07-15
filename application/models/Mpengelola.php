<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengelola extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data_pengguna() {
        // Query untuk mengambil data pengguna
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        $this->db->where('level', 'user');
        $this->db->join('tb_pengelola', 'tb_pengguna.id_user = tb_pengelola.id_user', 'left');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata', 'left');
        $this->db->where('tb_tempatwisata.diterima', 'tidak');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_tempat_wisata() {
        // Query untuk mengambil data tempat wisata yang dikelola oleh pengelola
        $this->db->select('*');
        $this->db->from('tb_tempatwisata');
        $this->db->join('tb_pengelola', 'tb_tempatwisata.id_wisata = tb_pengelola.id_wisata');
        $this->db->join('tb_pengguna', 'tb_pengelola.id_user = tb_pengguna.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_pengajuan_pengelola() {
        // Query untuk mengambil data pengajuan pengelola
        $this->db->select('*');
        $this->db->from('tb_pengelola');
        $this->db->join('tb_pengguna', 'tb_pengelola.id_user = tb_pengguna.id_user');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata');
        $this->db->where('tb_tempatwisata.diterima', 'tidak');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
