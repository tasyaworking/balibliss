<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengelola');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation'); // Memuat library form validation
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
        $this->load->view('pengelola/daftarwisata', $data);
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

    public function tambahTempatWisata() {
        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required');
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
        $this->form_validation->set_rules('sosial_media', 'Sosial Media', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|decimal');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            $this->session->set_flashdata('color', 'danger');
            redirect('pengelola/daftarwisata');
        } else {
            $data = array(
                'nama_wisata' => $this->input->post('nama_wisata'),
                'deskripsi' => $this->input->post('deskripsi'),
                'jam_operasional' => $this->input->post('jam_operasional'),
                'fasilitas' => $this->input->post('fasilitas'),
                'sosial_media' => $this->input->post('sosial_media'),
                'gambar' => $this->input->post('gambar'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                'diterima' => 'pending' // default value
            );

            if ($this->Mpengelola->tambahTempatWisata($data)) {
                $this->session->set_flashdata('pesan', 'Tempat wisata berhasil ditambahkan.');
                $this->session->set_flashdata('color', 'success');
                redirect('pengelola/daftarwisata');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal menambahkan tempat wisata.');
                $this->session->set_flashdata('color', 'danger');
                redirect('pengelola/daftarwisata');
            }
        }
    }
}
?>
