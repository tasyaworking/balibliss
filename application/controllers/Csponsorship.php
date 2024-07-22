<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Msponsorship');
    }

    public function index() {
        $this->load->view('sponsorship_form');
    }

    public function register() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('sponsorship_form');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'perusahaan' => $this->input->post('perusahaan'),
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->Msponsorship->save($data)) {
                $this->session->set_flashdata('success', 'Pendaftaran sponsorship berhasil.');
                redirect('sponsorship');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mendaftar sponsorship.');
                $this->load->view('sponsorship_form');
            }
        }
    }
}
?>
