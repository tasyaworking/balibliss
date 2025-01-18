<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mtiket');

        // Proteksi: Pastikan pengguna sudah login
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('Cauth/login'); // Redirect ke halaman login jika belum login
        }
    }

    public function dashboard() {
        $data['wisata'] = $this->Mtiket->get_all_wisata();

        // Konversi harga_tiket ke float untuk keamanan data
        foreach ($data['wisata'] as &$tempat) {
            $tempat['harga_tiket'] = (float) $tempat['harga_tiket'];
        }

        $this->load->view('pengguna/dashboard', $data);
    }

    public function index() {
        $data['wisata'] = $this->Mtiket->ambilwisata();
        $this->load->view('pengguna/tiket', $data);
    }

    public function logout() {
        // Hapus session pengguna
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('level'); // Jika ada level seperti admin atau user
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect('Cauth/login');
    }
}