<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ctampil extends CI_Controller {
    function index()
    {
        $this->load->view('landingpage/dashboard');
    }
    function pengelola()
    {
        $this->load->view('pengelola/dashboard');
    }
    function login()
		{
			$this->load->view('auth/login');	
		}

}