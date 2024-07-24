
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Mtiket');
		}

        public function dashboard() {
            $this->load->model('Mtiket');
            $data['wisata'] = $this->Mtiket->get_all_wisata();
        
            // Konversi harga_tiket ke float
            foreach ($data['wisata'] as &$tempat) {
                $tempat['harga_tiket'] = (float) $tempat['harga_tiket'];
            }
        
            $this->load->view('pengguna/dashboard', $data);
        }
        
    public function index() {
        $data['wisata'] = $this->Mtiket->ambilwisata();
        $this->load->view('pengguna/tiket', $data);
    }

}
?>