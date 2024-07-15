<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengguna');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pengguna'] = $this->Mpengguna->get_all_pengguna();
        $title['title'] = 'Data Pengguna';
        $data_view = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'konten' => $this->load->view('pengelola/pengguna_list', $data, true)
        ];
        $this->load->view('pengelola/template', $data_view);
    }

    public function create() {
        $title['title'] = 'Tambah Pengguna';
        $data_view = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'konten' => $this->load->view('pengelola/pengguna_form', null, true)
        ];
        $this->load->view('pengelola/template', $data_view);
    }

    public function store() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            );

            if ($this->Mpengguna->insert_pengguna($data)) {
                $this->session->set_flashdata('pesan', 'Pengguna berhasil ditambahkan.');
                $this->session->set_flashdata('color', 'success');
                redirect('Cpengguna');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal menambahkan pengguna.');
                $this->session->set_flashdata('color', 'danger');
                $this->create();
            }
        }
    }

    public function edit($id) {
        $data['pengguna'] = $this->Mpengguna->get_pengguna_by_id($id);
        $title['title'] = 'Edit Pengguna';
        $data_view = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'konten' => $this->load->view('pengelola/pengguna_form', $data, true)
        ];
        $this->load->view('pengelola/template', $data_view);
    }

    public function update($id) {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            );

            if ($this->Mpengguna->update_pengguna($id, $data)) {
                $this->session->set_flashdata('pesan', 'Pengguna berhasil diupdate.');
                $this->session->set_flashdata('color', 'success');
                redirect('Cpengguna');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal mengupdate pengguna.');
                $this->session->set_flashdata('color', 'danger');
                $this->edit($id);
            }
        }
    }

    public function delete($id) {
        if ($this->Mpengguna->delete_pengguna($id)) {
            $this->session->set_flashdata('pesan', 'Pengguna berhasil dihapus.');
            $this->session->set_flashdata('color', 'success');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus pengguna.');
            $this->session->set_flashdata('color', 'danger');
        }
        redirect('Cpengguna');
    }
}
?>
