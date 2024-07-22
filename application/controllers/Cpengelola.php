<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mpengelola');
        $this->load->model('Msponsorship');
        $this->load->model('Mtempatwisata');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
     public function index() {
        $data['header'] = $this->load->view('partials/header', NULL, TRUE);
        $data['sidebar'] = $this->load->view('pengelola/sidebar', NULL, TRUE);
        $data['navbar'] = $this->load->view('partials/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('partials/footer', NULL, TRUE);

        $data['data_tempatwisata'] = $this->Mtempatwisata->get_all();
        $this->load->view('pengelola/table/tempat_wisata', $data);
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
            'table' => $this->load->view('pengelola/table/pengguna', $data1, true)
        ];
        $this->load->view('pengelola/pengguna', $data);
    }

    public function tempatwisata() {
        $title['title'] = 'Data Tempat Wisata';
        // Ambil data tempat wisata dari model Mpengelola
        $data_tempat_wisata['data_tempatwisata'] = $this->Mpengelola->get_tempat_wisata(); // Ganti nama variabel sesuai view
    
        $data = [
            'header' => $this->load->view('partials/header', $title, true),
            'sidebar' => $this->load->view('pengelola/sidebar', '', true),
            'navbar' => $this->load->view('partials/navbar', '', true),
            'footer' => $this->load->view('partials/footer', '', true),
            'data_tempatwisata' => $data_tempat_wisata['data_tempatwisata'] // Pastikan variabel yang dikirim sesuai dengan view
        ];
    
        $this->load->view('pengelola/table/tempat_wisata', $data);
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
        $this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required');
        $this->form_validation->set_rules('alamat_wisata', 'Alamat', 'required');
        $this->form_validation->set_rules('sosmed', 'Sosial Media', 'required');
        $this->form_validation->set_rules('no_hp_wisata', 'Nomor Telepon', 'required');
        
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
                    'jam_operasional' => $this->input->post('jam_operasional'),
                    'alamat_wisata' => $this->input->post('alamat_wisata'),
                    'sosmed' => $this->input->post('sosmed'),
                    'gambar' => $upload_data['file_name'], // Pastikan nama file gambar ada
                    'no_hp_wisata' => $this->input->post('no_hp_wisata'),
                );
    
                if ($this->Mtempatwisata->insert($data)) {
                    $this->session->set_flashdata('pesan', 'Tempat wisata berhasil ditambahkan.');
                    $this->session->set_flashdata('color', 'success');
                    redirect('cpengelola');
                } else {
                    $this->session->set_flashdata('pesan', 'Gagal menambahkan tempat wisata.');
                    $this->session->set_flashdata('color', 'danger');
                    redirect('cpengelola/form');
                }
            }
        }
    }
    
    
    // Add new tempat wisata
   // Method untuk menambah data tempat wisata
   public function add() {
    $data['header'] = $this->load->view('partials/header', NULL, TRUE);
    $data['sidebar'] = $this->load->view('pengelola/sidebar', NULL, TRUE);
    $data['navbar'] = $this->load->view('partials/navbar', NULL, TRUE);
    $data['footer'] = $this->load->view('partials/footer', NULL, TRUE);

    $this->load->view('pengelola/form_add_tempatwisata', $data);

    if ($this->input->post()) {
        $data = array(
            'nama_wisata' => $this->input->post('nama_wisata'),
            'sosmed' => $this->input->post('sosmed'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'gambar' => $this->input->post('gambar'),
            'alamat_wisata' => $this->input->post('alamat_wisata'),
            'no_hp_wisata' => $this->input->post('no_hp_wisata'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        // Memanggil metode insert
        if ($this->Mtempatwisata->insert($data)) {
            redirect('Cpengelola');
        } else {
            // Handle error
            show_error('Gagal menambah data.');
        }
    } else {
        $this->load->view('pengelola/form_add_tempatwisata');
    }
}

public function edit($id) {
    //$data['tempatwisata'] = $this->Mpengelola->get_tempat_wisata_by_id($id_wisata);
    $data['header'] = $this->load->view('partials/header', NULL, TRUE);
    $data['sidebar'] = $this->load->view('pengelola/sidebar', NULL, TRUE);
    $data['navbar'] = $this->load->view('partials/navbar', NULL, TRUE);
    $data['footer'] = $this->load->view('partials/footer', NULL, TRUE);

    $this->load->view('pengelola/form_edit_tempatwisata', $data);

    $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    $this->form_validation->set_rules('jam_operasional', 'Jam Operasional', 'required');
    $this->form_validation->set_rules('alamat_wisata', 'Alamat Wisata', 'required');
    $this->form_validation->set_rules('sosmed', 'Sosial Media', 'required');
    $this->form_validation->set_rules('no_hp_wisata', 'Nomor Telepon', 'required');

    if ($this->form_validation->run() == FALSE) {
        $data['tempatwisata'] = $this->Mtempatwisata->get_by_id($id);
        $this->load->view('pengelola/form_edit_tempatwisata', $data);
    } else {
        $data = array(
            'nama_wisata' => $this->input->post('nama_wisata'),
            'sosmed' => $this->input->post('sosmed'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'alamat_wisata' => $this->input->post('alamat_wisata'),
            'no_hp_wisata' => $this->input->post('no_hp_wisata'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        if ($this->Mtempatwisata->update($id, $data)) {
            $this->session->set_flashdata('pesan', 'Data tempat wisata berhasil diperbarui.');
            $this->session->set_flashdata('color', 'success');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal memperbarui data tempat wisata.');
            $this->session->set_flashdata('color', 'danger');
        }
        redirect('cpengelola');
    }
}

    // Delete tempat wisata
    public function delete($id) {
        if (empty($id)) {
            $this->session->set_flashdata('pesan', 'ID tidak valid.');
            $this->session->set_flashdata('color', 'danger');
            redirect('cpengelola');
        }
    
        // Optional: Check if the ID exists before attempting to delete
        $this->load->model('Mtempatwisata');
        $tempatWisata = $this->Mtempatwisata->get_by_id($id); // Pastikan metode ini ada
        if (!$tempatWisata) {
            $this->session->set_flashdata('pesan', 'Data tempat wisata tidak ditemukan.');
            $this->session->set_flashdata('color', 'danger');
            redirect('cpengelola');
        }
    
        if ($this->Mtempatwisata->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data tempat wisata berhasil dihapus.');
            $this->session->set_flashdata('color', 'success');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal menghapus data tempat wisata.');
            $this->session->set_flashdata('color', 'danger');
        }
        redirect('cpengelola');
    }
}
?>
