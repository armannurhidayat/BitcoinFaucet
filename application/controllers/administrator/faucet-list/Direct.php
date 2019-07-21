<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direct extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
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
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|is_unique[direct.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|is_unique[direct.link]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/direct/addDirect',$data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->insertDirect($data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('add','addDirect');
			}
			redirect('administrator/faucet-list/direct');
		}
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Faucet Name', 'trim|required|callback_namadirect_check');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('timer', 'Timer', 'trim|required|numeric|max_length[2]');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|callback_linkdirect_check');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(5);
			$data['direct'] = $this->M_Database->editDirect($id);
			$data['coins']= $this->M_Database->selectCoin()->result_array();
			$data['status'] = ['legit','testing'];
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/faucet-list/direct/editDirect', $data);
			$this->load->view('admin/template/__footer');

			$query = $this->db->query("SELECT * FROM direct WHERE id_direct = '$id' ")->row_array();

			if (empty($id) || $id != $query['id_direct']) {
				redirect('administrator/faucet-list/direct');
			}
			
		} else {

			$this->M_Database->updateDirect();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('update', 'UpdateDirect');
			}
			
			redirect('administrator/faucet-list/direct');
		}
	}

	public function namadirect_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM direct WHERE nama = '$post[nama]' AND id_direct != '$post[id_direct]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('namadirect_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function linkdirect_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM direct WHERE link = '$post[link]' AND id_direct != '$post[id_direct]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('linkdirect_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete() {
		$id 	= $this->uri->segment(5);
		$query	= $this->db->query("SELECT * FROM direct WHERE id_direct = '$id' ")->row_array();

		if (!empty($id) || $id == $query['id_direct']) {
			$this->M_Database->deleteDirect($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('delete', 'deletDirect');
			}
		}

		redirect('administrator/faucet-list/direct');
	}


}