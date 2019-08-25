<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_List extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
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
		$this->form_validation->set_rules('nama_coin', 'Coin Name', 'trim|required|is_unique[coin_list.nama_coin]');
		$this->form_validation->set_rules('code_coin', 'Code Coin', 'trim|required|is_unique[coin_list.code_coin]');

		$config['upload_path']		= './assets/img/logocoin/';
        $config['allowed_types']	= 'jpeg|jpg|png';
        $config['file_name']		= 'Coin-' . substr(md5(rand()), 0,10);
        
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
	        $data['uuid'] = $this->uuid->v4();
			$this->load->view('admin/template/__header');
			$this->load->view('admin/template/__nav');
			$this->load->view('admin/coin-list/addCoin',$data);
			$this->load->view('admin/template/__footer');
        }

			if (! $this->upload->do_upload('logo_coin')) {
				$data['uuid'] = $this->uuid->v4();
				$this->load->view('admin/template/__header');
				$this->load->view('admin/template/__nav');
				$this->load->view('admin/coin-list/addCoin',$data);
				$this->load->view('admin/template/__footer');

			} else {

				$data = $this->upload->data();
				$logo = $data['file_name'];

				$this->M_Database->insertCoin($data, $logo);
				$this->session->set_flashdata('add','addCoin');
				redirect('administrator/coin_list');
			}
		
	}

	public function delete() {
		$id   = $this->uri->segment(4);
		$data = $this->M_Database->getDataIcon($id);
		$icon = 'assets/img/logocoin/' . $data->logo_coin;
		

		if (empty($id)) {
			redirect('administrator/coin_list');

		} else {

			if (is_readable($icon) && unlink($icon)) {
				$this->M_Database->deleteCoin($id);
				$this->session->set_flashdata('delete', 'Delete Coin');
				redirect('administrator/coin_list');

			} else {

				$this->session->set_flashdata('error', 'Error Delete Coin');
				redirect('administrator/coin_list');
			}
		}
	}

}