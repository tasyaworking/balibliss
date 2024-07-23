<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Msponsorship');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function register() {
        // Load the view from 'application/views/sponsorship/register.php'
        $this->load->view('sponsorship/register');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sponsorship/register');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'perusahaan' => $this->input->post('perusahaan'),
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->Msponsorship->insert_sponsorship($data)) {
                $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship berhasil!');
                $this->session->set_flashdata('color', 'success');
            } else {
                $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship gagal!');
                $this->session->set_flashdata('color', 'danger');
            }
            redirect('csponsorship/register');
        }
    }
}
