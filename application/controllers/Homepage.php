<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'Bitcoin Faucet';
		$data['meta']	= 'Bitcoin Faucet';

		$this->load->view('page/template/__header', $data);
		$this->load->view('page/homepage');
		$this->load->view('page/template/__footer');
	}

}