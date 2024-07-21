<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengelola');
        $this->load->model('Msponsor');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
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
        $this->load->view('pengelola/pengguna', $data);
    }

    public function tempatwisata() {
        $title['title'] = 'Data Tempat Wisata';
        // Ambil data sponsor dari model Msponsor
        $data_sponsor['data_sponsor'] = $this->Msponsor->get_sponsor_data(); // Pastikan metode get_sponsor_data() ada di dalam model Msponsor
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'data_sponsor' => $data_sponsor // Kirimkan data sponsor ke view
        ];
        $this->load->view('pengelola/tempatwisata', $data);
    }

    public function tbpengguna() {
        $title['title'] = 'Data Tempat Wisata';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/pengguna', $data);
    }

    public function daftarwisata() {
        $title['title'] = 'Daftar Tempat Wisata';
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
        ];
        $this->load->view('pengelola/tempatwisata', $data);
    }

    public function daftarsponsor() {
        $this->form_validation->set_rules('nama_sponsor', 'Nama Sponsor', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Sponsor', 'required');
        $this->form_validation->set_rules('sosial_media', 'Sosial Media', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            $this->session->set_flashdata('color', 'danger');
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                $this->session->set_flashdata('color', 'danger');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'nama_sponsor' => $this->input->post('nama_sponsor'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'sosial_media' => $this->input->post('sosial_media'),
                    'alamat' => $this->input->post('alamat'),
                    'no_hp' => $this->input->post('no_hp'),
                    'logo' => $upload_data['file_name']
                );
                if ($this->Mpengelola->daftarsponsor($data)) {
                    $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship berhasil.');
                    $this->session->set_flashdata('color', 'success');
                } else {
                    $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship gagal.');
                    $this->session->set_flashdata('color', 'danger');
                }
            }
        }
        redirect('cpengelola/sponsorship');
    }

    public function tambahTempatWisata() {
        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('jam_buka', 'Jam Operasional', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('sosial_media', 'Sosial Media', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|decimal');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            $this->session->set_flashdata('color', 'danger');
            redirect('cpengelola/form');
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                $this->session->set_flashdata('color', 'danger');
                redirect('cpengelola/form');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'nama_wisata' => $this->input->post('nama_wisata'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'jam_buka' => $this->input->post('jam_buka'),
                    'alamat' => $this->input->post('alamat'),
                    'sosial_media' => $this->input->post('sosial_media'),
                    'gambar' => $upload_data['file_name'],
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'harga_tiket' => $this->input->post('harga_tiket'),
                );

                if ($this->Mdetailwisata->tambahTempatWisata($data)) {
                    $this->session->set_flashdata('pesan', 'Tempat wisata berhasil ditambahkan.');
                    $this->session->set_flashdata('color', 'success');
                    redirect('cpengelola/form');
                } else {
                    $this->session->set_flashdata('pesan', 'Gagal menambahkan tempat wisata.');
                    $this->session->set_flashdata('color', 'danger');
                    redirect('cpengelola/form');
                }
            }
        }
    }
}
?>