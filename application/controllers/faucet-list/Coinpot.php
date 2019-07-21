<?php

class Coinpot extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'Coinpot Faucets | Bitcoin Faucet';
		$data['judul']	= 'Coinpot Faucets';
		$data['coinpot'] = $this->M_Database->selectCoinpot()->result_array();
		$this->load->view('page/template/__header', $data);
		$this->load->view('page/coinpot', $data);
		$this->load->view('page/template/__footer');
	}

}