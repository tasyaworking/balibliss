<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengelola');
        $this->load->library('upload');
    }

    public function index() {
        $data['tempatwisata'] = $this->Mpengelola->get_all_tempatwisata();
        $data['sponsor'] = $this->Mpengelola->get_all_sponsor();
        $data['pengunjung'] = $this->Mpengelola->get_all_pengunjung();
        $this->load->view('pengelola/dashboard', $data);
    }

    public function add_tempatwisata() {
        $this->load->view('pengelola/daftarwisata');
    }

    public function proses_add_tempatwisata() {
        $nama_wisata = $this->input->post('nama_wisata');
        
        // Check if the name already exists
        if ($this->Mpengelola->tempatwisata_exists($nama_wisata)) {
            $error = array('error' => 'Nama tempat wisata sudah ada!');
            $this->load->view('pengelola/daftarwisata', $error);
            return;
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024; // 1MB

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pengelola/daftarwisata', $error);
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'nama_wisata' => $nama_wisata,
                'deskripsi' => $this->input->post('deskripsi'),
                'jam_operasional' => $this->input->post('jam_operasional'),
                'fasilitas' => $this->input->post('fasilitas'),
                'sosmed' => $this->input->post('sosmed'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'gambar' => $fileData['file_name']
            );
            $this->Mpengelola->insert_tempatwisata($data);
            redirect('cpengelola');
        }
    }

    public function add_sponsor() {
        $this->load->view('pengelola/sponsor');
    }

    public function proses_add_sponsor() {
        $nama_sponsor = $this->input->post('nama_sponsor');
        
        // Check if the name already exists
        if ($this->Mpengelola->sponsor_exists($nama_sponsor)) {
            $error = array('error' => 'Nama sponsor sudah ada!');
            $this->load->view('pengelola/sponsor', $error);
            return;
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024; // 1MB

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pengelola/sponsor', $error);
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'nama_sponsor' => $nama_sponsor,
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'gambar' => $fileData['file_name']
            );
            $this->Mpengelola->insert_sponsor($data);
            redirect('cpengelola');
        }
    }

    public function view_tempatwisata() {
        $data['tempatwisata'] = $this->Mpengelola->get_all_tempatwisata();
        $this->load->view('pengelola/tbwisata', $data);
    }

    public function view_pengunjung() {
        $data['pengguna'] = $this->Mpengelola->get_all_pengunjung();
        $this->load->view('pengelola/tbpengguna', $data);
    }
}
?>