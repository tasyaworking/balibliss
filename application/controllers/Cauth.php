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

    public function dashboard() {
        $level = $this->session->userdata('level');
    
        switch ($level) {
            case 'admin':
                $this->load->view('admin/dashboard');
                break;
            case 'pengelola':
                $this->load->view('pengelola/dashboard');
                break;
            default:
                $this->load->view('pengguna/dashboard');
                break;
        }
    }    
    public function prosesregister() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');

        if (empty($nama)) {
            $this->session->set_flashdata('pesan', 'Nama tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }

        if (empty($alamat)) {
            $this->session->set_flashdata('pesan', 'Alamat tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }

        if (empty($no_hp)) {
            $this->session->set_flashdata('pesan', 'Nomor HP tidak boleh kosong!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }

        if ($this->Mauth->email_exists($email)) {
            $this->session->set_flashdata('pesan', 'Email sudah digunakan!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/register');
            return;
        }

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
            'no_hp' => $no_hp,
            'level' => 'user'
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
    
        // Debugging: Tampilkan nilai input email dan password
        log_message('debug', 'Email: ' . $email);
        log_message('debug', 'Password: ' . $password);
    
        $user = $this->Mauth->get_pengguna_by_email($email);
    
        // Debugging: Periksa apakah pengguna ditemukan
        if (!$user) {
            log_message('debug', 'Pengguna tidak ditemukan dengan email: ' . $email);
            $this->session->set_flashdata('pesan', 'Email atau password salah!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/login');
            return;
        } else {
            log_message('debug', 'Pengguna ditemukan: ' . json_encode($user));
        }
    
        // Debugging: Periksa password yang di-hash
        if (!password_verify($password, $user->password)) {
            log_message('debug', 'Password salah untuk pengguna: ' . $email);
            $this->session->set_flashdata('pesan', 'Email atau password salah!');
            $this->session->set_flashdata('color', 'danger');
            redirect('cauth/login');
            return;
        }
    
        // Jika berhasil login
        $this->session->set_userdata('user_id', $user->id);
        $this->session->set_userdata('level', $user->level);
        $this->session->set_flashdata('pesan', 'Login berhasil!');
        $this->session->set_flashdata('color', 'success');
    
        // Redirect sesuai dengan level pengguna
        if ($user->level == 'admin') {
            redirect('views/admin/dashboard');
        } elseif ($user->level == 'pengelola') {
            redirect('views/pengelola/dashboard');
        } else {
            redirect('views/pengguna/dashboard');
        }
    }       
}
?>
