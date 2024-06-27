<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cauth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mauth');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function register() {
        $this->load->view('auth/register');
    }
    public function logout() {
        $this->session->sess_destroy();
        $this->login();
    }
    public function prosesregister() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        
        // Periksa apakah name tidak null atau kosong
        if (empty($nama)) {
            $this->session->set_flashdata('pesan', 'Nama tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ];
    
        $result = $this->Mauth->register($data);
        if ($result) {
            $this->session->set_flashdata('pesan', 'Registrasi berhasil! Silakan login.');
            $this->session->set_flashdata('color', 'success');
            redirect('cauth/login');
        } else {
            $this->session->set_flashdata('pesan', 'Registrasi gagal! Silakan coba lagi.');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
        }
    }
    public function proseslogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Panggil metode get_pengguna dari model Mauth
        $user = $this->Mauth->get_pengguna($email, $password);
        
        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_flashdata('pesan', 'Login berhasil!');
            $this->session->set_flashdata('color', 'success');
            redirect('Cadmin/pengelola'); // Redirect to a welcome page or dashboard
        } else {
            $this->session->set_flashdata('pesan', 'Email atau password salah!');
            $this->session->set_flashdata('color', 'danger');
            redirect('ctampil/index');
        }
    }
    
    
}