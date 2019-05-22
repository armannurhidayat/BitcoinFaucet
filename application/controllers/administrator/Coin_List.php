<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_List extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/coin-list/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function form_input() {
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/coin-list/addCoin');
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama_coin', 'Coin Name', 'required');
		$this->form_validation->set_rules('code_coin', 'Code Coin', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/coin-list/addCoin');
			$this->load->view('admin/template/__footer');
		} else {
			$this->M_Database->insertCoin($data);
			$this->session->set_flashdata('add','addCoin');
			redirect('administrator/coin_list');
		}
	}

	public function form_edit($id) {
		$data['coins'] = $this->M_Database->editCoin($id);
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/coin-list/editCoin',$data);
		$this->load->view('admin/template/__footer');
	}

	public function update() {
		$data = [
			'nama_coin'=> $this->input->post('nama_coin', TRUE),
			'code_coin'=> $this->input->post('code_coin', TRUE)
		];

		$where = [
			'id'=> $this->input->post('id', TRUE)
		];

		$this->session->set_flashdata('update', 'UpdateCoin');
		$this->M_Database->updateCoin($data,$where,'coin_list');
		// echo $this->db->last_query();
		redirect('administrator/coin_list');
	}

	public function delete($id) {
		$this->M_Database->deleteCoin($id);
		$this->session->set_flashdata('delete', 'deletCoin');
		redirect('administrator/coin_list');
	}


}