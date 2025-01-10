<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			$this->check_access();
			$this->load->model('madmin');
			$this->load->model('mvalidasi');
		}
	private function check_access() {
			$level = $this->session->userdata('level');
			if ($level !== 'admin') {
				$this->session->set_flashdata('pesan', 'Akses ditolak! Anda bukan admin.');
				$this->session->set_flashdata('color', 'danger');
				redirect('cauth/login');
			}
	}

	// load dashboard	
	public function dashboard() {
        $title['title']= 'Dashboard Admin';

		$data_counts = [
            'count_pengguna' => $this->madmin->get_count_pengguna(),
            'count_tempat_wisata' => $this->madmin->get_count_tempat_wisata(),
            'count_pengelola' => $this->madmin->get_count_pengelola(),
            'count_sponsor_accepted' => $this->madmin->get_count_sponsor_accepted(),
            'count_sponsor_pending' => $this->madmin->get_count_sponsor_pending(),
			'total_pembayaran' => $this->madmin->get_total_pembayaran(),
        ];
		
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			];

		$data = array_merge($data, $data_counts);	
		$this->load->view('admin/dashboard', $data);
	}

	// load data pengguna
	public function pengguna() {
        $title['title']= 'Data Pengguna';
		$data1['data_pengguna'] = $this->madmin->data_pengguna();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			'table'=>$this->load->view('admin/table/pengguna',$data1,true)
			];
		$this->load->view('admin/pengguna', $data);
	}

	// load tempat wisata
	public function tempatwisata() {
        $title['title']= 'Data Tempat Wisata';
		$data1['data_tempat_wisata'] = $this->madmin->data_tempat_wisata();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			'table'=>$this->load->view('admin/table/tempat_wisata',$data1,true)
			];
		$this->load->view('admin/tempatwisata', $data);
	}

	// load pengajuan pengelola
	public function pengelola() {
        $title['title']= 'Pengajuan Pengelola';
		$data1['data_pengajuan_pengelola'] = $this->madmin->data_pengajuan_pengelola();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			'table'=>$this->load->view('admin/table/pengelola',$data1,true)
			];
		$this->load->view('admin/pengelola', $data);
	}

	// load pengajuan pengelola - tempat wisata per id 
	public function view_pengelola() {
        $title['title']= 'Pengajuan Pengelola';
		// $data1 ['data_pengajuan_pengelola'] = $this->madmin->data_pengajuan_pengelola();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>$this->load->view('admin/form/pengajuan_pengelola',true),
			// 'table'=>$this->load->view('admin/table/pengelola',$data1,true)
			];
		$this->load->view('admin/form/pengajuan_pengelola', $data);
	}

	// load pengajuan sponsorship
	public function sponsorship() {
        $title['title']= 'Pengajuan Sponsorship';
		$data1['data_pengajuan_sponsor'] = $this->madmin->data_pengajuan_sponsor();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			'table'=>$this->load->view('admin/table/sponsor',$data1,true)
			];
		$this->load->view('admin/sponsorship', $data);
	}

	// load tempat_wisata per id
	public function view_tempatwisata_id($id_wisata) {
        $title['title']= 'Data Tempat Wisata';
		$data1['data_tempat_wisata_by_id'] = $this->madmin->data_tempat_wisata_by_id($id_wisata);
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			'table'=>$this->load->view('admin/form/tempatwisata',$data1,true)
			];
		$this->load->view('admin/tempatwisata', $data);
	}

	// terima & tolak pengelola di pengajuan pengelola
	public function terima_pengelola($id_wisata) {
		$this->madmin->terima_pengelola($id_wisata);
	}

	public function tolak_pengelola($id_wisata) {
		$this->madmin->tolak_pengelola($id_wisata);
	}

	 // terima & tolak sponsor di pengajuan sponsor
	 public function terima_sponsor($id_sponsor) {
		$this->madmin->terima_sponsor($id_sponsor);
	 }
 
	 public function tolak_sponsor($id_sponsor) {
		$this->madmin->tolak_sponsor($id_sponsor);
	 }
}
?>