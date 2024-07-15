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

    public function insert_rating($data) {
        return $this->db->insert('tb_rating', $data);
    }
    public function get_ratings() {
        $query = $this->db->get('tb_rating');
        return $query->result();
    }
}
?>
