<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtiket extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function ambilwisata() {
        $query = $this->db->get('tb_ticket');
        return $query->result_array();
    }
    public function ambilid($id) {
        // Ambil data detail wisata berdasarkan id
        return $this->db->get_where('tb_detailwisata', array('id' => $id))->row_array();
    }
    public function getWisataById($id) {
        $query = $this->db->get_where('tb_ticket', array('id_wisata' => $id));
        return $query->row_array();
    }

    public function simpan_pemesanan($data_pemesanan) {
        return $this->db->insert('tb_pesanan', $data_pemesanan);
    }
    
    public function insertkonfirmasi($data_pembayaran) {
        $this->db->insert('tb_bayar', $data_pembayaran);
        return $this->db->affected_rows() > 0;

    }

    public function get_pesanan_by_id($id_pesanan) {
        return $this->db->get_where('tb_pesanan', array('id_pesanan' => $id_pesanan))->row_array();
    }
    
    // Fungsi callback untuk validasi file bukti transaksi
    public function file_check($str) {
        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/png');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function get_order($kd_order) {
        // Ambil data pembayaran berdasarkan kode order
        $this->db->where('kd_order', $kd_order);
        $query = $this->db->get('tb_bayar');
        return $query->row_array();
    }

    public function get_total_harga($kd_order) {
        $this->db->select('total_harga');
        $this->db->where('kd_order', $kd_order);
        $query = $this->db->get('tb_bayar');
        return $query->row()->total_harga;
    }

    public function update_konfirmasi($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_bayar', $data);
    }

    public function get_visited_places_by_wisata($id_wisata) {
        $this->db->select('id_wisata, nama_wisata, deskripsi, harga_tiket, foto');
        $this->db->from('tb_ticket');
        $this->db->where('id_wisata', $id_wisata); // Mengambil data berdasarkan id_wisata
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_wisata()
    {
        $query = $this->db->get('tb_ticket');
        return $query->result_array();
    }
}
?>
