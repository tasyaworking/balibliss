<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sponsorship_model');
        $this->load->library('form_validation');
    }

    public function index() {
        echo "Attempting to load sponsorship/form";  // Debug statement
        $this->load->view('sponsorship/form');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sponsorship/form');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'perusahaan' => $this->input->post('perusahaan'),
                'created_at' => date('Y-m-d H:i:s'),
            );

            if ($this->Sponsorship_model->insert($data)) {
                $this->session->set_flashdata('message', 'Pendaftaran sponsorship berhasil!');
                redirect('sponsorship');
            } else {
                $this->session->set_flashdata('message', 'Gagal mendaftar sponsorship.');
                redirect('sponsorship');
            }
        }
    }
}
