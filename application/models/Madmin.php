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

    // di table pengajuan sponsor
    public function data_pengajuan_sponsor() {
        $this->db->select('tb_sponsor.*, tb_tempatwisata.*');
        $this->db->from('tb_sponsor');
        $this->db->join('tb_tempatwisata', 'tb_tempatwisata.id_wisata = tb_sponsor.id_wisata');
        $this->db->where('tb_sponsor.diterima', 'tidak');
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
    
    // terima & tolak pengelola di pengajuan pengelola
	public function terima_pengelola($id_wisata) {
		$data = array('diterima' => 'ya');
        $this->db->where('id_wisata', $id_wisata);
        $this->db->update('tb_tempatwisata', $data);
        $this->session->set_flashdata(['pesan'=>'Tempat wisata berhasil diterima','color'=>'primary']);
        redirect('cadmin/pengelola','refresh');
	}

	public function tolak_pengelola($id_wisata) {
		$data = array('diterima' => 'tolak');
        $this->db->where('id_wisata', $id_wisata);
        $this->db->update('tb_tempatwisata', $data);
        $this->session->set_flashdata(['pesan'=>'Tempat wisata berhasil ditolak','color'=>'primary']);
        redirect('cadmin/pengelola','refresh');
	}

    // terima & tolak sponsor di pengajuan sponsor
	public function terima_sponsor($id_sponsor) {
		$data = array('diterima' => 'ya');
        $this->db->where('id_sponsor', $id_sponsor);
        $this->db->update('tb_sponsor', $data);
        $this->session->set_flashdata(['pesan'=>'Sponsor berhasil diterima','color'=>'primary']);
        redirect('cadmin/sponsorship','refresh');
	}

	public function tolak_sponsor($id_sponsor) {
		$data = array('diterima' => 'tolak');
        $this->db->where('id_sponsor', $id_sponsor);
        $this->db->update('tb_sponsor', $data);
        $this->session->set_flashdata(['pesan'=>'Sponsor berhasil ditolak','color'=>'primary']);
        redirect('cadmin/sponsorship','refresh');
	}

    public function get_count_pengguna() {
        return $this->db->count_all('tb_pengguna');
    }

    public function get_count_tempat_wisata() {
        $this->db->where('diterima', 'ya');
        return $this->db->count_all_results('tb_tempatwisata');
    }

    public function get_count_pengelola() {
        $this->db->where('diterima', 'tidak');
        return $this->db->count_all_results('tb_tempatwisata');
    }

    public function get_count_sponsor_accepted() {
        $this->db->where('diterima', 'ya');
        return $this->db->count_all_results('tb_sponsor');
    }

    public function get_count_sponsor_pending() {
        $this->db->where('diterima', 'tidak');
        return $this->db->count_all_results('tb_sponsor');
    }

    public function get_total_pembayaran() {
        $this->db->select_sum('pembayaran');
        $query = $this->db->get('tb_sponsor');
        return $query->row()->pembayaran;
    }

}

?>