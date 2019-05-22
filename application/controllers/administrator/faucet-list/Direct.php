<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['direct']= $this->M_Database->selectDirect()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/direct/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function form_input() {
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/direct/addDirect',$data);
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
		$this->M_Database->insertDirect($data);
		$this->session->set_flashdata('add','addDirect');
		redirect('administrator/faucet-list/direct');
	}

	public function form_edit($id) {
		$data['direct'] = $this->M_Database->editDirect($id);
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$data['status'] = ['legit','testing'];
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/direct/editDirect',$data);
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
			'id_direct'=>$this->input->post('id_direct', TRUE)
		];

		$this->session->set_flashdata('update', 'UpdateDirect');
		$this->M_Database->updateDirect($data,$where,'direct');
		redirect('administrator/faucet-list/direct');
	}

	public function delete($id) {
		$this->M_Database->deleteDirect($id);
		$this->session->set_flashdata('delete', 'deletDirect');
		redirect('administrator/faucet-list/direct');
	}


}