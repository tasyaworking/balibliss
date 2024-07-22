<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Msponsorship');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Daftar Sponsorship';
        $this->load->view('form', $data);
    }
    public function list() {
        $data['title'] = 'Daftar Sponsorship';
        $data['sponsorship'] = $this->Msponsorship->get_all(); // Ambil semua data sponsorship
        $this->load->view('sponsorship/list', $data); // Pastikan view 'list' ada di folder views/sponsorship/
    }
    
     
    public function tambah() {
        $this->form_validation->set_rules('nama', 'Nama Sponsor', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            $this->session->set_flashdata('color', 'danger');
            redirect('csponsorship'); // Redirect ke halaman form jika ada error
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'perusahaan' => $this->input->post('perusahaan'),
                'created_at' => date('Y-m-d H:i:s')
            );
    
            if ($this->Msponsorship->insert($data)) {
                $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship berhasil.');
                $this->session->set_flashdata('color', 'success');
                redirect('csponsorship/list'); // Redirect ke halaman daftar setelah sukses
            } else {
                $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship gagal.');
                $this->session->set_flashdata('color', 'danger');
                redirect('csponsorship'); // Redirect ke halaman form jika gagal
            }
        }
    }    
}
?>
