<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gagal extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
  }
	
	public function index()
	{
		$data['title'] = 'Error';
		$this->load->view('templates/header', $data);
		$this->load->view('errors/error404');
		$this->load->view('templates/footer');
	}
}
