<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengamanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Load the session library
		$this->load->library('form_validation');
		$this->load->model('Divisi_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Auth_model');

		
    }

    public function index() {
        $sessionIdPegawai = $this->session->userdata('idpegawai');
        if (!$sessionIdPegawai) {
			redirect('auth/index');
		}


        // view
        // $this->load->view('template/header');
        $this->load->view('pengamanan-data/index');
        // $this->load->view('template/footer');
    }
}