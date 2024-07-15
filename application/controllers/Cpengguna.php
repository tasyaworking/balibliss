<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Mtiket');
		}

	public function dashboard() {
        $title['title']= 'Dashboard Pengguna';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('pengguna/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('pengguna/dashboard', $data);
	}
    
    public function index() {
        $data['wisata'] = $this->Mtiket->ambilwisata();
        $this->load->view('pengguna/tiket', $data);
    }

	public function rating() {
        $title['title']= 'Pemberian Rating dan Ulasan';
        $data = [
			'header'=>$this->load->view('partials/header',$title,true),
			'sidebar'=>$this->load->view('pengguna/sidebar','',true),
			'navbar'=>$this->load->view('partials/navbar','',true),
			'footer'=>$this->load->view('partials/footer','',true),
			// 'konten'=>'',
			// 'table'=>'',
			];
		$this->load->view('pengguna/rating', $data);
	}
}
?>