<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Msponsorship');
        $this->load->library('form_validation');
    }

    public function index() {
        echo "Attempting to load sponsorship/form";  // Debug statement
        $this->load->view('pengelola/sponsorship/form');
    }

    public function submit() {
         $data['header'] = $this->load->view('partials/header', [], true);
         $data['sidebar'] = $this->load->view('pengelola/sidebar', [], true);
         $data['navbar'] = $this->load->view('partials/navbar', [], true);
         $data['footer'] = $this->load->view('partials/footer', [], true);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengelola/sponsorship/form');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'perusahaan' => $this->input->post('perusahaan'),
                'created_at' => date('Y-m-d H:i:s'),
            );

            if ($this->Msponsorship->insert($data)) {
                $this->session->set_flashdata('message', 'Pendaftaran sponsorship berhasil!');
                redirect('Cpengelola/sponsor');
            } else {
                $this->session->set_flashdata('message', 'Gagal mendaftar sponsorship.');
                redirect('Cpengelola/sponsor');
            }
        }
    }
}
