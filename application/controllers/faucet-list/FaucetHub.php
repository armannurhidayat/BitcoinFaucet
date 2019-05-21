<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FaucetHub extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['faucethub']= $this->M_Database->selectFaucethub()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/faucethub/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function form_input() {
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/faucethub/addFaucethub',$data);
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
		$this->M_Database->insertFaucethub($data);
		$this->session->set_flashdata('add','addFaucethub');
		redirect('faucet-list/faucethub');
	}

	public function form_edit($id) {
		$data['faucethub'] = $this->M_Database->editFaucethub($id);
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$data['status'] = ['legit','testing'];
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/faucethub/editFaucethub',$data);
		$this->load->view('admin/template/__footer');
	}

	public function update() {
		$data=[
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> strtolower($this->input->post('payment', TRUE)),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$where=[
			'id_faucethub'=>$this->input->post('id_faucethub', TRUE)
		];

		$this->session->set_flashdata('update', 'UpdateFaucethub');
		$this->M_Database->updateFaucethub($data,$where,'faucethub');
		redirect('faucet-list/faucethub');
	}

	public function delete($id) {
		$this->M_Database->deleteFaucethub($id);
		$this->session->set_flashdata('delete', 'deletFaucethub');
		redirect('faucet-list/faucethub');
	}


}