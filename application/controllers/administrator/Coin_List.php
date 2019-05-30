<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_List extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('auth/login');
		}
	}

	public function index() {
		$data['coins']= $this->M_Database->selectCoin()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/coin-list/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama_coin', 'Coin Name', 'required|is_unique[coin_list.nama_coin]');
		$this->form_validation->set_rules('code_coin', 'Code Coin', 'required|is_unique[coin_list.code_coin]');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/coin-list/addCoin',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertCoin($data);
			$this->session->set_flashdata('add','addCoin');
			redirect('administrator/coin_list');
		}
	}

	public function update() {
		$this->form_validation->set_rules('nama_coin', 'Coin Name', 'required');
		$this->form_validation->set_rules('code_coin', 'Code Coin', 'required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(4);
			$data['coins'] = $this->M_Database->editCoin($id);
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/coin-list/editCoin',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->session->set_flashdata('update', 'UpdateCoin');
			$this->M_Database->updateCoin($data,'coin_list');
			redirect('administrator/coin_list');
		}
		
	}

	public function delete($id) {
		$this->M_Database->deleteCoin($id);
		$this->session->set_flashdata('delete', 'deletCoin');
		redirect('administrator/coin_list');
	}

}