<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Database extends CI_Model {


	// >COIN LIST
	public function selectCoin() {
		return $this->db->get('coin_list');
	}

	public function insertCoin($logo) {
		$data = [
			'id'		=> htmlspecialchars($this->input->post('id', TRUE)),
			'nama_coin'	=> htmlspecialchars($this->input->post('nama_coin', TRUE)),
			'code_coin'	=> htmlspecialchars($this->input->post('code_coin', TRUE)),
			'logo_coin'	=> $logo
		];

		$this->db->insert('coin_list', $data);
	}

	public function deleteCoin($id) {
		$this->db->delete('coin_list', ['id' => $id]);
	}

	
	// >DIRECT
	public function selectDirect() {
		$this->db->join('coin_list', 'coin_list.id = direct.id_coin', 'LEFT');
		return $this->db->get('direct');
	}

	public function insertDirect($data) {
		$data = [
			'id_direct'		=> htmlspecialchars($this->input->post('id_direct', TRUE)),
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$this->db->insert('direct', $data);
	}

	public function deleteDirect($id) {
		$this->db->delete('direct', ['id_direct' => $id]);
	}

	public function editDirect($id) {
		return $this->db->get_where('direct', ['id_direct' => $id])->row_array();
	}

	public function updateDirect() {
		$data = [
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$where = [
			'id_direct'		=> $this->input->post('id_direct', TRUE)
		];
		
		$this->db->where($where)->update('direct', $data);
	}

	
	// >COINPOT
	public function selectCoinpot() {
		$this->db->join('coin_list', 'coin_list.id = coinpot.id_coin', 'LEFT');
		return $this->db->get('coinpot');
	}

	public function insertCoinpot($data) {
		$data = [
			'id_coinpot'	=> htmlspecialchars($this->input->post('id_coinpot', TRUE)),
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$this->db->insert('coinpot', $data);
	}

	public function deleteCoinpot($id) {
		$this->db->delete('coinpot', ['id_coinpot' => $id]);
	}

	public function editCoinpot($id) {
		return $this->db->get_where('coinpot', ['id_coinpot' => $id])->row_array();
	}

	public function updateCoinpot() {
		$data = [
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$where = [
			'id_coinpot'	=> $this->input->post('id_coinpot', TRUE)
		];

		$this->db->where($where)->update('coinpot',$data);
	}

	
	// >FAUCETHUB
	public function selectFaucethub() {
		$this->db->join('coin_list', 'coin_list.id = faucethub.id_coin', 'LEFT');
		return $this->db->get('faucethub');
	}

	public function insertFaucethub() {
		$data = [
			'id_faucethub'	=> htmlspecialchars($this->input->post('id_faucethub', TRUE)),
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$this->db->insert('faucethub', $data);
	}

	public function deleteFaucethub($id) {
		$this->db->delete('faucethub', ['id_faucethub' => $id]);
	}

	public function editFaucethub($id) {
		return $this->db->get_where('faucethub', ['id_faucethub' => $id])->row_array();
	}

	public function updateFaucethub() {
		$data = [
			'nama'			=> htmlspecialchars($this->input->post('nama', TRUE)),
			'id_coin'		=> htmlspecialchars($this->input->post('id_coin', TRUE)),
			'timer'			=> htmlspecialchars($this->input->post('timer', TRUE)),
			'link'			=> htmlspecialchars($this->input->post('link', TRUE)),
			'status'		=> htmlspecialchars($this->input->post('status', TRUE)),
			'payment'		=> htmlspecialchars($this->input->post('payment', TRUE)),
			'withdrawal'	=> htmlspecialchars($this->input->post('withdrawal', TRUE))
		];

		$where = [
			'id_faucethub'	=> $this->input->post('id_faucethub', TRUE)
		];

		$this->db->where($where)->update('faucethub', $data);
	}

}