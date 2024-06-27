<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cauth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('mauth');
        $this->load->library('session');
		$this->load->helper('url');
    }
    public function index() {
        $this->load->view('login');
    }
	public function login() {
		$this->load->view('auth/login');
	}
    public function proseslogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Pengguna_model->get_user($email, $password);
        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_flashdata('pesan', 'Login berhasil!');
            $this->session->set_flashdata('color', 'success');
            redirect('welcome'); // Redirect to a welcome page or dashboard
        } else {
            $this->session->set_flashdata('pesan', 'Email atau password salah!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth');
        }
    }
    public function register() {
        $this->load->view('auth/register');
    }
    public function prosesregister() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $data = [
            'nama' => $name,
            'email' => $email,
            'password' => $password
        ];
		$result = $this->Pengguna_model->register($data);
		if ($result) {
			$this->session->set_flashdata('pesan', 'Registrasi berhasil! Silakan login.');
			$this->session->set_flashdata('color', 'success');
			redirect('auth/login');
		} else {
			$this->session->set_flashdata('pesan', 'Registrasi gagal! Silakan coba lagi.');
			$this->session->set_flashdata('color', 'danger');
			redirect('auth/register');
		}
    }
	public function logout() {
		$this->session->sess_destroy();
		$this->login();
	}
}