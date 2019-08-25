<?php

class PTC extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'PTC | Bitcoin Faucet';
		$data['judul']	= 'PTC';
		$data['meta']	= 'Bitcoin (BTC) PTC';

		$data['ptc'] = $this->M_Database->selectPTC()->result_array();
		$this->load->view('page/template/__header', $data);
		$this->load->view('admin/ptc/index', $data);
		$this->load->view('page/template/__footer');
	}

}