<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('auth/login');
		}
	}

	public function index() {
		$data['direct']= $this->M_Database->selectDirect()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/direct/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'required|is_unique[direct.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'required');
		$this->form_validation->set_rules('timer', 'Timer', 'required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'required|valid_url|is_unique[direct.link]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/direct/addDirect',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertDirect($data);
			$this->session->set_flashdata('add','addDirect');
			redirect('administrator/faucet-list/direct');
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
			$data['direct'] = $this->M_Database->editDirect($id);
			$data['coins']= $this->M_Database->selectCoin()->result_array();
			$data['status'] = ['legit','testing'];
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/direct/editDirect',$data);
			$this->load->view('admin/template/__footer');
			
		} else {

			$this->session->set_flashdata('update', 'UpdateDirect');
			$this->M_Database->updateDirect($data,$where,'direct');
			redirect('administrator/faucet-list/direct');
		}
	}

	public function delete($id) {
		$this->M_Database->deleteDirect($id);
		$this->session->set_flashdata('delete', 'deletDirect');
		redirect('administrator/faucet-list/direct');
	}


}