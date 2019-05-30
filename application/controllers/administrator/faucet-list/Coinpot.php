<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coinpot extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('auth/login');
		}
	}

	public function index() {
		$data['coinpot']= $this->M_Database->selectCoinpot()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/coinpot/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'required|is_unique[coinpot.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'required');
		$this->form_validation->set_rules('timer', 'Timer', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'required|valid_url|is_unique[coinpot.link]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/coinpot/addCoinpot',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertCoinpot($data);
			$this->session->set_flashdata('add','addCoinpot');
			redirect('administrator/faucet-list/coinpot');
		}
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'required');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'required');
		$this->form_validation->set_rules('timer', 'Timer', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(5);
			$data['coinpot'] = $this->M_Database->editCoinpot($id);
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$data['status'] = ['legit','testing'];
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/coinpot/editCoinpot',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->session->set_flashdata('update', 'UpdateCoinpot');
			$this->M_Database->updateCoinpot($data,'coinpot');
			redirect('administrator/faucet-list/coinpot');
		}
	}

	public function delete($id) {
		$this->M_Database->deleteCoinpot($id);
		$this->session->set_flashdata('delete', 'deleteCoinpot');
		redirect('administrator/faucet-list/coinpot');
	}


}