<?php

class Direct extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']	= 'Direct Faucets | Bitcoin Faucet';
		$data['judul']	= 'Direct Faucets';
		$data['direct'] = $this->M_Database->selectDirect()->result_array();
		$this->load->view('page/template/__header', $data);
		$this->load->view('page/direct', $data);
		$this->load->view('page/template/__footer');
	}

}