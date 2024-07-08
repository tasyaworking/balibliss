<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mtiket'); 
        $this->load->library('form_validation'); 
    }

    public function index() {
        // Get data wisata from model Mtiket
        $data['wisata'] = $this->Mtiket->get_all_wisata();
        // Load view pengguna/tiket.php with data
        $this->load->view('pengguna/tiket', $data);
    }

    public function wisata() {
        $data['wisata'] = $this->Mtiket->get_all_places();
        $this->load->view('pengguna/tiketdetail', $adata);
    }

    public function detailwisata($id) {
        $data['tempat'] = $this->Mtiket->get_place_by_id($id);
        $this->load->view('pengguna/tiketdetail', $data);
    }

public function pesan($id_wisata = null) {
    if ($id_wisata === null) {
        show_error('Wisata tidak ditemukan', 404);
    }

    // Ambil data wisata berdasarkan id_wisata dari model Mtiket
    $data['wisata'] = $this->Mtiket->getWisataById($id_wisata);

    if (empty($data['wisata'])) {
        show_error('Data wisata tidak ditemukan', 404);
        return;
    }

    $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required');
    $this->form_validation->set_rules('email_pemesan', 'Email Pemesan', 'required|valid_email');
    $this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
        $this->load->view('pengguna/pesantiket', $data);
    } else {
        // Tangkap data dari form
        $nama_pemesan = $this->input->post('nama_pemesan');
        $email_pemesan = $this->input->post('email_pemesan');
        $jumlah_tiket = $this->input->post('jumlah_tiket');

        // Simpan data konfirmasi ke dalam session
        $this->session->set_userdata('konfirmasi_pemesanan', [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'email_pemesan' => $email_pemesan,
            'jumlah_tiket' => $jumlah_tiket
        ]);

        // Siapkan data untuk dimasukkan ke dalam tabel tb_pesanan
        $data_pemesanan = [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'email_pemesan' => $email_pemesan,
            'jumlah_tiket' => $jumlah_tiket
        ];
        $result = $this->Mtiket->simpan_pemesanan($data_pemesanan);

        if ($result) {
            // Load view pengguna/konfirmasipesanan.php dengan data wisata dan konfirmasi
            $this->load->view('pengguna/konfirmasipesanan', [
                'wisata' => $data['wisata'],
                'konfirmasi' => [
                    'nama_pemesan' => $nama_pemesan,
                    'email_pemesan' => $email_pemesan,
                    'jumlah_tiket' => $jumlah_tiket
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
    $email_pemesan = $this->input->post('email_pemesan');
    $jumlah_tiket = $this->input->post('jumlah_tiket');

    // Ambil data wisata berdasarkan id_wisata dari model Mtiket
    $wisata = $this->Mtiket->getWisataById($id_wisata);

    if (empty($wisata)) {
        show_error('Data wisata tidak ditemukan', 404);
        return;
    }

    // Hitung total harga berdasarkan harga tiket dan jumlah tiket
    $total_harga = $wisata['harga_tiket'] * $jumlah_tiket;

    // Siapkan data untuk dimasukkan ke dalam tabel tb_ticket
    $data_pemesanan = [
        'id_wisata' => $id_wisata,
        'nama_pemesan' => $nama_pemesan,
        'email_pemesan' => $email_pemesan,
        'jumlah_tiket' => $jumlah_tiket,
    ];

    // Masukkan data pemesanan ke dalam database menggunakan model Mtiket
    $result = $this->Mtiket->simpan_pemesanan($data_pemesanan);

    if ($result) {
        // Simpan id_pesanan untuk digunakan pada halaman konfirmasi
        $id_pesanan = $this->db->insert_id();

        // Simpan data konfirmasi ke dalam session
        $this->session->set_userdata('konfirmasi_pemesanan', [
            'id_pesanan' => $id_pesanan,
            'id_wisata' => $id_wisata,
            'nama_pemesan' => $nama_pemesan,
            'email_pemesan' => $email_pemesan,
            'jumlah_tiket' => $jumlah_tiket,
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
    
    public function insertkonfirmasi() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('userfile')) {
            $upload_data = $this->upload->data();
            $konfirmasi = $this->session->userdata('konfirmasi_pemesanan');
    
            // Pastikan data konfirmasi ada
            if (!$konfirmasi) {
                log_message('error', 'Data konfirmasi tidak ditemukan');
                show_error('Data konfirmasi tidak ditemukan', 500);
                return;
            }
    
            // Debugging data konfirmasi
            log_message('debug', 'Data konfirmasi: ' . print_r($konfirmasi, true));
    
            $data_pembayaran = array(
                'kd_order' => $konfirmasi['id_wisata'],
                'bank_km' => $this->input->post('bank_km'),
                'total_harga' => $konfirmasi['total_harga'],
                'tgl_kunjungan' => $konfirmasi['tgl_kunjungan'],
                'bukti_transaksi' => $upload_data['file_name'],
                'created_at' => date('Y-m-d H:i:s')
            );
    
            // Debugging data pembayaran
            log_message('debug', 'Data pembayaran: ' . print_r($data_pembayaran, true));
    
            $result = $this->Mtiket->insert_konfirmasi($data_pembayaran);
    
            if ($result) {
                // Set flash data untuk ditampilkan di halaman sukses
                $this->session->set_flashdata('kd_order', $konfirmasi['id_wisata']);
                $this->session->set_flashdata('total_harga', $konfirmasi['total_harga']);
                $this->session->set_flashdata('tgl_kunjungan', $konfirmasi['tgl_kunjungan']);
    
                // Debug statement
                log_message('debug', 'Flash data set: ' . print_r(array(
                    'kd_order' => $konfirmasi['id_wisata'],
                    'total_harga' => $konfirmasi['total_harga'],
                    'tgl_kunjungan' => $konfirmasi['tgl_kunjungan']
                ), true));
    
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
    
    public function success() {
        // Debugging untuk memastikan flash data tersedia
        log_message('debug', 'Flash data on success page: ' . print_r($this->session->flashdata(), true));
    
        // Mengambil flash data
        $data['kd_order'] = $this->session->flashdata('kd_order');
        $data['total_harga'] = $this->session->flashdata('total_harga');
        $data['tgl_kunjungan'] = $this->session->flashdata('tgl_kunjungan');
    
        // Debugging data yang diterima di success page
        log_message('debug', 'Data diterima di success page: ' . print_r($data, true));
    
        // Menampilkan view dengan data yang diambil
        $this->load->view('pengguna/success', $data);
    }
    
    
    
    
}
?>

