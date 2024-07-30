<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Csponsorship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Msponsorship');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $data['header'] = $this->load->view('partials/header', [], true);
        $data['sidebar'] = $this->load->view('pengelola/sidebar', [], true);
        $data['navbar'] = $this->load->view('partials/navbar', [], true);
        $data['footer'] = $this->load->view('partials/footer', [], true);

        $this->load->view('pengelola/sponsorship/form', $data);
    }

    public function submit() {
        $data['header'] = $this->load->view('partials/header', [], true);
        $data['sidebar'] = $this->load->view('pengelola/sidebar', [], true);
        $data['navbar'] = $this->load->view('partials/navbar', [], true);
        $data['footer'] = $this->load->view('partials/footer', [], true);

        $this->form_validation->set_rules('nama', 'Nama Sponsor', 'required');
        $this->form_validation->set_rules('email', 'Email Sponsor', 'required');
        $this->form_validation->set_rules('telepon', 'No Telp', 'required');
        $this->form_validation->set_rules('perusahaan', 'Nama Perusahaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengelola/sponsorship/form', $data);
        } else {
            // Buat folder jika belum ada
            if (!is_dir('./bukti_pembayaran')) {
                mkdir('./bukti_pembayaran', 0755, true);
            }

            $config['upload_path'] = './bukti_pembayaran';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
           
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('buktipembayaran')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('pengelola/sponsorship/form', $data);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('telepon'),
                    'perusahaan' => $this->input->post('perusahaan'),
                    'buktipembayaran' => $upload_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s'),
                );
                if ($this->Msponsorship->insert($data)) {
                    $this->session->set_flashdata('pesan', 'Pendaftaran sponsorship berhasil!');
                    $this->session->set_flashdata('color', 'success');
                    redirect('Csponsorship');
                } else {
                    $this->session->set_flashdata('pesan', 'Gagal mendaftar sponsorship.');
                    $this->session->set_flashdata('color', 'danger');
                    redirect('Csponsorship/submit');
                }
            }
        }
    }
}
