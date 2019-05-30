<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Database extends CI_Model {

	// >COIN LIST
	public function selectCoin() {
		return $this->db->get('coin_list');
	}

	public function insertCoin() {
		$data = [
			'id'=>$this->input->post('id'),
			'nama_coin'=> strtolower($this->input->post('nama_coin', TRUE)),
			'code_coin'=> strtolower($this->input->post('code_coin', TRUE))
		];

		$this->db->insert('coin_list', $data);
	}

	public function deleteCoin($id) {
		$this->db->delete('coin_list', ['id' => $id]);
	}

	public function editCoin($id) {
		return $this->db->get_where('coin_list', ['id' => $id])->row_array();
	}

	public function updateCoin($data) {
		$data = [
			'nama_coin'=> $this->input->post('nama_coin', TRUE),
			'code_coin'=> $this->input->post('code_coin', TRUE)
		];

		$where = [
			'id'=> $this->input->post('id', TRUE)
		];

		$this->db->where($where)->update('coin_list',$data);
	}

	
	// >DIRECT
	public function selectDirect() {
		$this->db->join('coin_list','coin_list.id = direct.id_coin', 'LEFT');
		return $this->db->get('direct');
	}

	public function insertDirect($data) {
		$data= [
			'id_direct' =>$this->input->post('id_direct', TRUE),
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$this->db->insert('direct', $data);
	}

	public function deleteDirect($id) {
		$this->db->delete('direct', ['id_direct' => $id]);
	}

	public function editDirect($id) {
		return $this->db->get_where('direct', ['id_direct' => $id])->row_array();
	}

	public function updateDirect($data) {
		$data=[
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$where=[
			'id_direct'=>$this->input->post('id_direct', TRUE)
		];
		
		$this->db->where($where)->update('direct',$data);
	}

	
	// >COINPOT
	public function selectCoinpot() {
		$this->db->join('coin_list','coin_list.id = coinpot.id_coin', 'LEFT');
		return $this->db->get('coinpot');
	}

	public function insertCoinpot($data) {
		$data=[
			'id_coinpot'=> $this->input->post('id_coinpot', TRUE),
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$this->db->insert('coinpot', $data);
	}

	public function deleteCoinpot($id) {
		$this->db->delete('coinpot', ['id_coinpot' => $id]);
	}

	public function editCoinpot($id) {
		return $this->db->get_where('coinpot', ['id_coinpot' => $id])->row_array();
	}

	public function updateCoinpot($data) {
		$data=[
			'nama'=> strtolower($this->input->post('nama', TRUE)),
			'id_coin'=> strtolower($this->input->post('id_coin', TRUE)),
			'timer'=> strtolower($this->input->post('timer', TRUE)),
			'link'=> strtolower($this->input->post('link', TRUE)),
			'status'=> strtolower($this->input->post('status', TRUE)),
			'payment'=> $this->input->post('payment', TRUE),
			'withdrawal'=> strtolower($this->input->post('withdrawal', TRUE))
		];

		$where=[
			'id_coinpot'=>$this->input->post('id_coinpot', TRUE)
		];

		$this->db->where($where)->update('coinpot',$data);
	}

	
	// >FAUCETHUB
	public function selectFaucethub() {
		$this->db->join('coin_list','coin_list.id = faucethub.id_coin', 'LEFT');
		return $this->db->get('faucethub');
	}

	public function insertFaucethub($data) {
		$this->db->insert('faucethub', $data);
	}

	public function deleteFaucethub($id) {
		$this->db->delete('faucethub', ['id_faucethub' => $id]);
	}

	public function editFaucethub($id) {
		return $this->db->get_where('faucethub', ['id_faucethub' => $id])->row_array();
	}

	public function updateFaucethub($data) {
		$this->db->where($where)->update('faucethub',$data);
	}

}