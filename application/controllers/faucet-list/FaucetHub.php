<?php

class FaucetHub extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'FaucetHub Faucets | Bitcoin Faucet';
		$data['judul']	= 'FaucetHub Faucets';
		$data['meta']	= 'Bitcoin (BTC) FaucetHub Faucets';
		$data['faucethub'] = $this->M_Database->selectFaucethub()->result_array();
		
		$this->load->view('page/template/__header', $data);
		$this->load->view('page/faucethub', $data);
		$this->load->view('page/template/__footer');
	}

}