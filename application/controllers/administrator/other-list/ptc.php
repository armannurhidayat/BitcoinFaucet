<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PTC extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
		}
	}

	public function index() {
		$data['ptc'] = $this->M_Database->selectPTC()->result_array();
		$this->load->view('admin/template/__header');
		$this->load->view('admin/template/__nav');
		$this->load->view('admin/other-list/ptc/index', $data);
		$this->load->view('admin/template/__footer');
	}

	public function add() {
		$this->form_validation->set_rules('nama', 'Site Name', 'trim|required|is_unique[ptc.nama]');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('payment', 'Site Payment', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('type', 'Type Site', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|is_unique[ptc.link]');

		if ($this->form_validation->run() == FALSE) {
			$data['uuid'] = $this->uuid->v4();
			$data['coins'] = $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/other-list/ptc/addPtc', $data);
			$this->load->view('admin/template/__footer');
			
		} else {

			$this->M_Database->insertPTC($data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('add', 'addPTC');
			}
			redirect('administrator/other-list/ptc');
		}
	}

	public function update() {
		$this->form_validation->set_rules('nama', 'Site Name', 'trim|required|callback_namaptc_check');
		$this->form_validation->set_rules('id_coin', 'Coin Name', 'trim|required');
		$this->form_validation->set_rules('payment', 'Site Payment', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('type', 'Type Site', 'trim|required');
		$this->form_validation->set_rules('withdrawal', 'Withdrawal', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|required|valid_url|callback_linkptc_check');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->uri->segment(5);
			$data['ptc'] 	= $this->M_Database->editPTC($id);
			$data['coins']	= $this->M_Database->selectCoin()->result_array();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/other-list/ptc/editPTC', $data);
			$this->load->view('admin/template/__footer');

		} else {

			$this->M_Database->updatePTC();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('update', 'updatePTC');
				redirect('administrator/other-list/ptc');
			}
		}
	}

	public function namaptc_check() {
		$post	= $this->input->post(null, TRUE);
		$query	= $this->db->query("SELECT * FROM ptc WHERE nama = '$post[nama]' AND id_ptc != '$post[id_ptc]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('namaptc_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function linkptc_check() {
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM ptc WHERE link = '$post[link]' AND id_ptc != '$post[id_ptc]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('linkptc_check', 'The {field} field must contain a unique value.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete() {
		$id = $this->uri->segment(5);

		if (!empty($id)) {
			$this->M_Database->deletePTC($id);
			$this->session->set_flashdata('delete', 'deletePTC');
			redirect('administrator/other-list/ptc');
		}
	}


}