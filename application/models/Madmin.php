<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

    // di table data pengguna
    public function data_pengguna() {
        $query = $this->db->get('tb_pengguna');
		return $query->result();
    }

    // di table pengajuan pengelola
    public function data_pengajuan_pengelola() {
        $this->db->select('tb_pengguna.*, tb_tempatwisata.*');
        $this->db->from('tb_pengguna');
        $this->db->join('tb_pengelola', 'tb_pengguna.id_user = tb_pengelola.id_user');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata');
        $this->db->where('tb_pengguna.level', 'user');
        $this->db->where('tb_tempatwisata.diterima', 'tidak');
        $query = $this->db->get();
        return $query->result();
    }

    // di table data tempat wisata
    public function data_tempat_wisata() {
        $this->db->select('tb_pengguna.*, tb_tempatwisata.*');
        $this->db->from('tb_pengguna');
        $this->db->join('tb_pengelola', 'tb_pengguna.id_user = tb_pengelola.id_user');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata');
        $this->db->where('tb_pengguna.level', 'pengelola');
        $this->db->where('tb_tempatwisata.diterima', 'ya');
        $query = $this->db->get();
        return $query->result();
    }

    // belom di table pengajuan sponsor
    public function data_pengajuan_sponsor() {
        $this->db->select('tb_pengguna.*, tb_tempatwisata.*');
        $this->db->from('tb_pengguna');
        $this->db->join('tb_pengelola', 'tb_pengguna.id_user = tb_pengelola.id_user');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata');
        $this->db->where('tb_pengguna.level', 'user');
        $this->db->where('tb_tempatwisata.diterima', 'ya');
        $query = $this->db->get();
        return $query->result();
    }

    // di view tempat wisata per id
    public function data_tempat_wisata_by_id($id_wisata) {
        $this->db->select('tb_pengguna.*, tb_tempatwisata.*');
        $this->db->from('tb_pengguna');
        $this->db->join('tb_pengelola', 'tb_pengguna.id_user = tb_pengelola.id_user');
        $this->db->join('tb_tempatwisata', 'tb_pengelola.id_wisata = tb_tempatwisata.id_wisata');
        // $this->db->where('tb_pengguna.level', 'pengelola');
        // $this->db->where('tb_tempatwisata.diterima', 'ya');
        $this->db->where('tb_tempatwisata.id_wisata', $id_wisata);  
        $query = $this->db->get();
        return $query->row(); // Menggunakan row() untuk mengambil satu baris data
    }
    

}

?>