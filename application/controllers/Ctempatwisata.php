<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctempatwisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mtempatwisata');
        $this->load->helper('url');
    }

    // Menampilkan daftar tempat wisata
    public function index() {
        $data['data_tempatwisata'] = $this->Mtempatwisata->get_all_tempatwisata();
        $this->load->view('pengelola/table/tempat_wisata', $data);
    }

    // Menampilkan form tambah tempat wisata
    public function create() {
        $this->load->view('pengelola/form/tempat_wisata_form');
    }

    // Menyimpan data tempat wisata
    public function store() {
        $data = array(
            'nama_wisata' => $this->input->post('nama_wisata'),
            'sosmed' => $this->input->post('sosmed'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'gambar' => $this->input->post('gambar'),
            'alamat_wisata' => $this->input->post('alamat_wisata'),
            'no_hp_wisata' => $this->input->post('no_hp_wisata'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        if ($this->Mtempatwisata->insert_tempatwisata($data)) {
            redirect('ctempatwisata');
        } else {
            echo "Gagal menyimpan data.";
        }
    }

    // Menampilkan form edit tempat wisata
    public function edit($id) {
        $data['tempatwisata'] = $this->Mtempatwisata->get_tempatwisata_by_id($id);
        $this->load->view('pengelola/form/tempat_wisata_edit', $data);
    }

    // Mengupdate data tempat wisata
    public function update($id) {
        $data = array(
            'nama_wisata' => $this->input->post('nama_wisata'),
            'sosmed' => $this->input->post('sosmed'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'gambar' => $this->input->post('gambar'),
            'alamat_wisata' => $this->input->post('alamat_wisata'),
            'no_hp_wisata' => $this->input->post('no_hp_wisata'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        if ($this->Mtempatwisata->update_tempatwisata($id, $data)) {
            redirect('ctempatwisata');
        } else {
            echo "Gagal memperbarui data.";
        }
    }

    // Menghapus data tempat wisata
    public function delete($id) {
        if ($this->Mtempatwisata->delete_tempatwisata($id)) {
            redirect('ctempatwisata');
        } else {
            echo "Gagal menghapus data.";
        }
    }
}
