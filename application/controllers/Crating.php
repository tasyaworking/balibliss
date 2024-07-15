<?php
class Crating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mtiket');
    }

    public function index() {
        $this->load->view('pengguna/ratings');
    }

    public function submit_rating() {
        $data = array(
            'place_id' => $this->input->post('place_id'),
            'user_id' => $this->input->post('user_id'),
            'rating' => $this->input->post('rating'),
            'review' => $this->input->post('review'),
            'date' => date('Y-m-d H:i:s')
        );

        $this->Mrating->insert_rating($data);
        redirect('Crating/dashboard');
    }

    public function dashboard() {
        $data['ratings'] = $this->Mtiket->get_ratings();
        $this->load->view('pengguna/dashboard', $data);
    }
}
?>
