<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengelola');
        $this->load->helper('url');
    }

    public function dashboard() {
        $title['title'] = 'Dashboard Pengelola';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/dashboard', $data);
    }

    public function pengguna() {
        $title['title'] = 'Data Pengguna';
        $data1['data_pengguna'] = $this->Mpengelola->data_pengguna();
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'table' => $this->load->view('admin/table/pengguna', $data1, true)
        ];
        $this->load->view('pengelola/tbpengguna', $data);
    }

    public function tempatwisata() {
        $title['title'] = 'Data Tempat Wisata';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/tbwisata', $data);
    }

    public function daftarwisata() {
        $title['title'] = 'Daftar Tempat Wisata';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/daftartempatwisata', $data);
    }

    public function daftarsponsor() {
        $title['title'] = 'Daftar Sponsorship';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/daftarsponsor', $data);
    }
}
?>
