<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mtiket'); 
        $this->load->library('form_validation'); 
    }

   
    public function wisata() {
        $data['wisata'] = $this->Mtiket->get_all_places();
        $this->load->view('pengguna/tiketdetail', $adata);
    }

    public function detailwisata($id) {
        $data['tempat'] = $this->Mtiket->ambilid($id);
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


    $total_harga = $wisata['harga_tiket'] * $jumlah_tiket;

    $data_pemesanan = [
        'id_wisata' => $id_wisata,
        'nama_pemesan' => $nama_pemesan,
        'email_pemesan' => $email_pemesan,
        'jumlah_tiket' => $jumlah_tiket,
    ];


    $result = $this->Mtiket->simpan_pemesanan($data_pemesanan);

    if ($result) {
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
    
                // Siapkan data pembayaran untuk disimpan ke database
                $data_pembayaran = array(// Ambil id_pesanan dari konfirmasi
                    'bank_km' => $this->input->post('bank_km'),
                    'total_harga' => $this->input->post('total_harga'),
                    'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                    'bukti_transaksi' => $upload_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s')
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
    
    public function cetaktiket() {
        // Ambil data dari session atau dari database sesuai kebutuhan
        $data['nama_wisata'] = 'Nama Wisata'; // Ganti dengan cara Anda mengambil nama wisata
        $data['id_pesanan'] = $this->session->flashdata('id_pesanan');
        $data['harga_tiket'] = $this->session->flashdata('total_harga');
        $data['tgl_kunjungan'] = $this->session->flashdata('tgl_kunjungan');
    
        // Menampilkan view cetak tiket dengan data yang diambil
        $this->load->view('pengguna/cetaktiket', $data);
    }
    

}
?>    