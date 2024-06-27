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
        $alamat = $this->input->post('alamat'); // Retrieve 'alamat' from the form
        $no_hp = $this->input->post('no_hp'); // Retrieve 'no_hp' from the form
    
        // Periksa apakah nama tidak null atau kosong
        if (empty($nama)) {
            $this->session->set_flashdata('pesan', 'Nama tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        // Periksa apakah alamat tidak null atau kosong
        if (empty($alamat)) {
            $this->session->set_flashdata('pesan', 'Alamat tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        // Periksa apakah no_hp tidak null atau kosong
        if (empty($no_hp)) {
            $this->session->set_flashdata('pesan', 'Nomor HP tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        // Periksa apakah email sudah ada di database
        if ($this->Mauth->email_exists($email)) {
            $this->session->set_flashdata('pesan', 'Email sudah digunakan!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        // Periksa apakah no_hp sudah ada di database
        if ($this->Mauth->no_hp_exists($no_hp)) {
            $this->session->set_flashdata('pesan', 'Nomor HP sudah digunakan!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }
    
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'no_hp' => $no_hp
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