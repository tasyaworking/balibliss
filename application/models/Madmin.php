<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

    public function data_pengguna() {
        $query = $this->db->get('tb_pengguna');
		return $query->result();
    }

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

}

?>