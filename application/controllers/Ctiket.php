<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mtiket'); 
        $this->load->library('form_validation'); 
    }


    public function detailwisata($id_wisata) {
        $data['tempat'] = $this->Mtiket->ambilid($id_wisata);
        $this->load->view('pengguna/tiketdetail', $data);
    }

public function pesan($id_wisata = null) {
    if ($id_wisata === null) {
        show_error('Wisata tidak ditemukan', 404);
    }

    $data['wisata'] = $this->Mtiket->getWisataById($id_wisata);

    if (empty($data['wisata'])) {
        show_error('Data wisata tidak ditemukan', 404);
        return;
    }

    $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'required|numeric');
    $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');
    

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
        $this->load->view('pengguna/pesantiket', $data);
    } else {
        // Tangkap data dari form
        $nama_pemesan = $this->input->post('nama_pemesan');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $jumlah_tiket = $this->input->post('jumlah_tiket');
        $tgl_kunjungan = $this->input->post('tgl_kunjungan');

        // Simpan data konfirmasi ke dalam session
        $this->session->set_userdata('konfirmasi_pemesanan', [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'jenis_kelamin' => $jenis_kelamin,
            'jumlah_tiket' => $jumlah_tiket,
            'tgl_kunjungan' => $tgl_kunjungan
        ]);

        // Siapkan data untuk dimasukkan ke dalam tabel tb_pesanan
        $data_pemesanan = [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'jenis_kelamin' => $jenis_kelamin,
            'jumlah_tiket' => $jumlah_tiket,
            'tgl_kunjungan' => $tgl_kunjungan
        ];
        $result = $this->Mtiket->simpan_pemesanan($data_pemesanan);

        if ($result) {
            // Load view pengguna/konfirmasipesanan.php dengan data wisata dan konfirmasi
            $this->load->view('pengguna/konfirmasipesanan', [
                'wisata' => $data['wisata'],
                'konfirmasi' => [
                    'nama_pemesan' => $nama_pemesan,
                    'jenis_kelamin' => $jenis_kelamin,
                    'jumlah_tiket' => $jumlah_tiket,
                    'tgl_kunjungan' => $tgl_kunjungan
                ]
            ]);
        } else {
            // Tampilkan pesan error jika gagal menyimpan
            show_error('Gagal menyimpan data pemesanan ke database', 500);
        }
    }
}

public function konfirmasi_pemesanan() {
    // Ambil data dari formulir
    $id_wisata = $this->input->post('id_wisata');
    $nama_pemesan = $this->input->post('nama_pemesan');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $jumlah_tiket = $this->input->post('jumlah_tiket');
    $tgl_kunjungan = $this->input->post('tgl_kunjungan');

    // Ambil data wisata berdasarkan id_wisata dari model Mtiket
    $wisata = $this->Mtiket->getWisataById($id_wisata);

    if (empty($wisata)) {
        show_error('Data wisata tidak ditemukan', 404);
        return;
    }


    $total_harga = $wisata['harga_tiket'] * $jumlah_tiket;

    $data_pemesanan = [
        'id_wisata' => $id_wisata,
        'nama_pemesan' => $nama_pemesan,
        'jenis_kelamin' => $jenis_kelamin,
        'jumlah_tiket' => $jumlah_tiket,
        'tgl_kunjungan' => $tgl_kunjungan,
    ];


    $result = $this->Mtiket->simpan_pemesanan($data_pemesanan);

    if ($result) {
        $id_pesanan = $this->db->insert_id();

        // Simpan data konfirmasi ke dalam session
        $this->session->set_userdata('konfirmasi_pemesanan', [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'jenis_kelamin' => $jenis_kelamin,
            'jumlah_tiket' => $jumlah_tiket,
            'tgl_kunjungan' => $tgl_kunjungan,
            'total_harga' => $total_harga
        ]);

        // Redirect ke halaman konfirmasi
        redirect('Ctiket/konfirmasi');
    } else {
        // Tampilkan pesan error jika gagal menyimpan
        show_error('Gagal menyimpan data pemesanan ke database', 500);
    }
}

    public function konfirmasi() {
        $konfirmasi = $this->session->userdata('konfirmasi_pemesanan');
    
        if (!$konfirmasi) {
            show_error('Data pemesanan tidak ditemukan', 404);
        }
        $data['wisata'] = $this->Mtiket->getWisataById($konfirmasi['id_wisata']);
        $data['konfirmasi'] = $konfirmasi;
    
        $this->load->view('pengguna/konfirmasipesanan', $data);
    }
    
    public function lakukan_pembayaran() {
        $konfirmasi = $this->session->userdata('konfirmasi_pemesanan');

        if ($konfirmasi) {
            $id_wisata = $konfirmasi['id_wisata'];
            $total_harga = $konfirmasi['total_harga'];
    
            $wisata = $this->Mtiket->getWisataById($id_wisata);
        } else {
            $wisata = null; 
            $total_harga = 0; 
        }
    
        $this->load->view('pengguna/halamanpembayaran', [
            'wisata' => $wisata,
            'total_harga' => $total_harga 
        ]);
    }
    
    public function file_check($str) {
        $allowed_types = array('gif', 'jpg', 'png');
        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
    
        if (in_array($ext, $allowed_types)) {
            return true;
        } else {
            $this->form_validation->set_message('file_check', 'Jenis file yang diupload harus GIF, JPG, atau PNG.');
            return false;
        }
    }
    
    public function insertkonfirmasi() {
        $config['upload_path'] = 'assets/img/upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
    
        // Validasi form
        $this->form_validation->set_rules('bank_km', 'Bank Tujuan', 'required');
        $this->form_validation->set_rules('nomrek', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pemilik Rekening', 'required');
        $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('userfile', 'Bukti Transaksi', 'callback_file_check');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman pembayaran dengan pesan error
            $this->load->view('pengguna/halamanpembayaran');
        } else {
            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
    
                // Ambil data konfirmasi pemesanan dari session
                $konfirmasi = $this->session->userdata('konfirmasi_pemesanan');
    
                if (!$konfirmasi || !isset($konfirmasi['id_pesanan'])) {
                    log_message('error', 'Data konfirmasi tidak valid');
                    show_error('Data konfirmasi tidak valid', 500);
                    return;
                }
    
                // Validasi ID pesanan
                $id_pesanan = $konfirmasi['id_pesanan'];
                $pesanan = $this->Mtiket->get_pesanan_by_id($id_pesanan);
                if (!$pesanan) {
                    log_message('error', 'ID pesanan tidak valid');
                    show_error('ID pesanan tidak valid', 500);
                    return;
                }
    
                // Siapkan data pembayaran untuk disimpan ke database
                $data_pembayaran = array(
                    'bank_km' => $this->input->post('bank_km'),
                    'total_harga' => $this->input->post('total_harga'),
                    'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                    'bukti_transaksi' => $upload_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'verified' => 0,
                    'id_wisata' => 1 
                     // 0: belum diverifikasi, 1: diverifikasi
                );
    
                // Simpan data pembayaran ke database
                $result = $this->Mtiket->insertkonfirmasi($data_pembayaran);
    
                if ($result) {
                    // Ambil ID pesanan yang baru saja dimasukkan
                    $id_pesanan_baru = $this->db->insert_id();
    
                    // Set flash data untuk ditampilkan di halaman sukses
                    $this->session->set_flashdata('id_pesanan', $id_pesanan_baru);
                    $this->session->set_flashdata('total_harga', $data_pembayaran['total_harga']);
                    $this->session->set_flashdata('tgl_kunjungan', $data_pembayaran['tgl_kunjungan']);
    
                    redirect('Ctiket/success');
                } else {
                    log_message('error', 'Gagal menyimpan data pembayaran ke database');
                    show_error('Gagal menyimpan data pembayaran', 500);
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                log_message('error', 'Upload error: ' . print_r($error, true));
                $this->load->view('pengguna/halamanpembayaran', $error);
            }
        }
    }
    
    public function success() {
        // Mengambil flash data
        $data_pembayaran['id_pesanan'] = $this->session->flashdata('id_pesanan');
        $data_pembayaran['total_harga'] = $this->session->flashdata('total_harga');
        $data_pembayaran['tgl_kunjungan'] = $this->session->flashdata('tgl_kunjungan');
    
        // Validasi apakah ada data pesanan yang diterima dari flash data
        if (!$data_pembayaran['id_pesanan']) {
            log_message('error', 'Data pesanan tidak ditemukan di flash data');
            show_error('Data pesanan tidak ditemukan', 500);
            return;
        }
    
        // Menampilkan view dengan data yang diambil
        $this->load->view('pengguna/success', $data_pembayaran);
        
    }
    public function ratings() {
        // Ambil data dari tabel tb_ticket
        $data['tickets'] = $this->Mtiket->get_all_tickets();
        
        // Tampilkan halaman rating dan ulasan dengan data tiket
        $this->load->view('pengguna/ratings', $data);
    }

    public function add_review() {
        // Validasi form
        $this->form_validation->set_rules('id_wisata', 'Wisata ID', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required|numeric');
        $this->form_validation->set_rules('review', 'Review', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman rating
            $this->ratings();
        } else {
            // Tangkap data dari form
            $id_wisata = $this->input->post('id_wisata');
            $rating = $this->input->post('rating');
            $review = $this->input->post('review');
    
            // Siapkan data untuk disimpan
            $data_review = [
                'id_wisata' => $id_wisata,
                'rating' => $rating,
                'review' => $review,
                'created_at' => date('Y-m-d H:i:s')
            ];
    
            // Simpan data rating dan ulasan
            $result = $this->Mtiket->save_review($data_review);
    
            if ($result) {
                // Set pesan sukses dan redirect
                $this->session->set_flashdata('success', 'Review berhasil ditambahkan.');
                redirect('Ctiket/ratings');
            } else {
                // Tampilkan pesan error jika gagal menyimpan
                $this->session->set_flashdata('error', 'Gagal menambahkan review.');
                redirect('Ctiket/ratings');
            }
        }
    }

    public function konfirmasi_pembayaran($id_wisata) {
        $this->load->model('Mtiket');
        $data['wisata'] = $this->Mtiket->get_wisata_details($id_wisata);
        $data['total_harga'] = $this->session->userdata('total_harga'); // Ambil total harga dari session atau sumber lain
        $this->load->view('pengguna/konfirmasi_pembayaran', $data);
    }
    
}