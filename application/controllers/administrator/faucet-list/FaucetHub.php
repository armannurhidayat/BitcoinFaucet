<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FaucetHub extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
		}
	}

	public function index() {
		$data['faucethub']= $this->M_Database->selectFaucethub()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/faucet-list/faucethub/index',$data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|is_unique[faucethub.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|is_unique[faucethub.link]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins']= $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/faucethub/addFaucethub',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertFaucethub($data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('add','addFaucethub');
			}
			redirect('administrator/faucet-list/faucethub');
		}
	}

	public function form_edit($id) {
		
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|callback_namafaucethub_check');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|callback_linkfaucethub_check');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(5);
			$data['faucethub'] = $this->M_Database->editFaucethub($id);
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$data['status'] = ['legit','testing'];
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/faucethub/editFaucethub',$data);
			$this->load->view('admin/template/__footer');

			$query = $this->db->query("SELECT * FROM faucethub WHERE id_faucethub = '$id' ")->row_array();

			if (empty($id) || $id != $query['id_faucethub']) {
				redirect('administrator/faucet-list/faucethub');
			}

		} else {

			$this->M_Database->updateFaucethub();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('update', 'UpdateFaucethub');
			}

			redirect('administrator/faucet-list/faucethub');
		}
	}

	public function namafaucethub_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM faucethub WHERE nama = '$post[nama]' AND id_faucethub != '$post[id_faucethub]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('namafaucethub_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function linkfaucethub_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM faucethub WHERE link = '$post[link]' AND id_faucethub != '$post[id_faucethub]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('linkfaucethub_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete() {
		$id = $this->uri->segment(5);

		if (! empty($id)) {
			$this->M_Database->deleteFaucethub($id);
			$this->session->set_flashdata('delete', 'deletFaucethub');
		}
		redirect('administrator/faucet-list/faucethub');
	}


}