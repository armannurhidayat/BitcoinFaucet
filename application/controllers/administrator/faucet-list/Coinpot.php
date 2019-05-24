administrator/<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coinpot extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['coinpot']= $this->M_Database->selectCoinpot()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/coinpot/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function form_input() {
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/coinpot/addCoinpot',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$data= [
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];
		$this->M_Database->insertCoinpot($data);
		$this->session->set_flashdata('add','addCoinpot');
		redirect('administrator/faucet-list/coinpot');
	}

	public function form_edit($id) {
		$data['coinpot'] = $this->M_Database->editCoinpot($id);
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$data['status'] = ['legit','testing'];
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/coinpot/editCoinpot',$data);
		$this->load->view('admin/template/__footer');
	}

	public function update() {
		$data=[
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$where=[
			'id_coinpot'=>$this->input->post('id_coinpot', TRUE)
		];

		$this->session->set_flashdata('update', 'UpdateCoinpot');
		$this->M_Database->updateCoinpot($data,$where,'coinpot');
		redirect('administrator/faucet-list/coinpot');
	}

	public function delete($id) {
		$this->M_Database->deleteCoinpot($id);
		$this->session->set_flashdata('delete', 'deleteCoinpot');
		redirect('administrator/faucet-list/coinpot');
	}


}