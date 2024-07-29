<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtiket extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function ambilwisata($kondisi = array()) {
        $this->db->select('id_wisata, nama_wisata, deskripsi_singkat, lokasi, foto, harga_tiket');
        if (!empty($kondisi)) {
            $this->db->where($kondisi);
        }
        $query = $this->db->get('tb_tempatwisata');
        return $query->result();
    }

    public function ambilid($id_wisata) {
        // Ambil data detail wisata berdasarkan id
        return $this->db->get_where('tb_tempatwisata', array('id_wisata' => $id_wisata))->row_array();
    }
    public function getWisataById($id_wisata) {
        $query = $this->db->get_where('tb_tempatwisata', array('id_wisata' => $id_wisata));
        return $query->row_array();
    }
    public function getNoRekByIdWisata($id_wisata) {
        $this->db->select('no_rek');
        $this->db->from('tb_tempatwisata');
        $this->db->where('id_wisata', $id_wisata);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->no_rek;
        } else {
            return null;
        }
    }    

    public function simpan_pemesanan($data_pemesanan) {
        $this->db->set($data_pemesanan);
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

    public function get_all_wisata() {
        $this->db->select('id_wisata, nama_wisata, deskripsi_singkat, harga_tiket, foto, lokasi');
        $query = $this->db->get('tb_tempatwisata');
        return $query->result_array();
    }

    public function get_nama_wisata_by_id_pesanan($id_pesanan) {
        $this->db->select('tb_ticket.nama_wisata');
        $this->db->from('tb_bayar');
        $this->db->join('tb_ticket', 'tb_ticket.id_wisata = tb_bayar.id_wisata');
        $this->db->where('tb_bayar.id_pesanan', $id_pesanan);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->nama_wisata;
        } else {
            return 'Tidak ditemukan';
        }
    }

    public function submit_rating($data) {
        $this->db->insert('ratings', $data);
    }

    // Metode untuk mendapatkan ID pesanan terakhir
    public function get_last_id_pesanan() {
        $this->db->select('id_pesanan');
        $this->db->from('tb_bayar');
        $this->db->order_by('id_pesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->id_pesanan;
        } else {
            return NULL;
        }
    }

    public function get_all_tickets() {
        $query = $this->db->get('tb_tempatwisata');
        return $query->result_array(); // Mengembalikan data sebagai array
    }
    
    // Metode untuk mengambil data berdasarkan ID tiket
    public function get_ticket_by_id($id) {
        $this->db->where('id_wisata', $id);
        $query = $this->db->get('tb_tempatwisata');
        return $query->row_array(); // Mengembalikan data sebagai array
    }

    // Metode untuk menyimpan rating dan ulasan
    public function save_review($data) {
        return $this->db->insert('tb_reviews', $data); // Menyimpan data ke tabel tb_reviews
    }

    // Metode untuk mengambil rating dan ulasan berdasarkan ID tiket
    public function get_reviews_by_ticket_id($id_wisata) {
        $this->db->where('id_wisata', $id_wisata);
        $query = $this->db->get('tb_reviews');
        return $query->result_array(); // Mengembalikan data sebagai array
    }

public function get_wisata_details($id_wisata) {
    $this->db->select('nama_wisata, nomor_rekening');
    $this->db->from('tb_tempatwisata');
    $this->db->where('id_wisata', $id_wisata);
    $query = $this->db->get();
    return $query->row_array();
}
public function get_bayar($id_pesanan){
    return $this->db->get_where('tb_bayar',['id_pesanan'=>$id_pesanan])->row_array();
}
}
    
?>
