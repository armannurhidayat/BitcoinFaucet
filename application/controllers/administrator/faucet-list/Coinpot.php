<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coinpot extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
		}
	}

	public function index() {
		$data['coinpot'] = $this->M_Database->selectCoinpot()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/coinpot/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|is_unique[coinpot.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|is_unique[coinpot.link]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/coinpot/addCoinpot',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertCoinpot($data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('add','addCoinpot');
			}
			redirect('administrator/faucet-list/coinpot');
		}
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|callback_namacoinpot_check');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|callback_linkcoinpot_check');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(5);
			$data['coinpot'] = $this->M_Database->editCoinpot($id);
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$data['status'] = ['legit','testing'];
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/coinpot/editCoinpot',$data);
			$this->load->view('admin/template/__footer');

			$query = $this->db->query("SELECT * FROM coinpot WHERE id_coinpot = '$id' ")->row_array();

			if (empty($id) || $id != $query['id_coinpot']) {
				redirect('administrator/faucet-list/coinpot');
			}

		} else {

			$this->M_Database->updateCoinpot();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('update', 'UpdateCoinpot');
			}
			redirect('administrator/faucet-list/coinpot');
		}
	}

	public function namacoinpot_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM coinpot WHERE nama = '$post[nama]' AND id_coinpot != '$post[id_coinpot]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('namacoinpot_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function linkcoinpot_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM coinpot WHERE link = '$post[link]' AND id_coinpot != '$post[id_coinpot]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('linkcoinpot_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete() {
		$id = $this->uri->segment(5);
		$this->M_Database->deleteCoinpot($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('delete', 'deleteCoinpot');
		}
		redirect('administrator/faucet-list/coinpot');
	}

}