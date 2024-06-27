<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('madmin');
		}

	public function dashboard() {
        $title['title']= 'Dashboard Admin';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('admin/dashboard', $data);
	}

	public function pengguna() {
        $title['title']= 'Data Pengguna';
		$data1 ['data_pengguna'] = $this->madmin->data_pengguna();
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			'table'=>$this->load->view('admin/table/pengguna',$data1,TRUE),
			];
		$this->load->view('admin/pengguna', $data);
	}

	public function tempatwisata() {
        $title['title']= 'Data Tempat Wisata';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('admin/tempatwisata', $data);
	}

	public function pengelola() {
        $title['title']= 'Pengajuan Pengelola';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('admin/pengelola', $data);
	}

	public function sponsorship() {
        $title['title']= 'Pengajuan Sponsorship';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('admin/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('admin/sponsorship', $data);
	}
}
?>