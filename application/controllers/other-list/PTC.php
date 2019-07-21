<?php

class PTC extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'PTC | Bitcoin Faucet';
		$data['judul']	= 'PTC';
		// $data['ptc'] = $this->M_Database->selectCoinpot()->result_array();
		$this->load->view('page/template/__header', $data);
		$this->load->view('page/ptc', $data);
		$this->load->view('page/template/__footer');
	}

}