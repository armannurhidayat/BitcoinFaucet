<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Database extends CI_Model {
	
	// >DIRECT
	public function selectDirect() {
		$this->db->join('coin_list','coin_list.id = direct.id_coin', 'LEFT');
		return $this->db->get('direct');
	}

	public function insertDirect($data) {
		$this->db->insert('direct', $data);
	}

	public function deleteDirect($id) {
		$this->db->delete('direct', ['id_direct' => $id]);
	}

	public function editDirect($id) {
		return $this->db->get_where('direct', ['id_direct' => $id])->row_array();
	}

	public function updateDirect($data,$where,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// >COINPOT
	public function selectCoinpot() {
		$this->db->join('coin_list','coin_list.id = coinpot.id_coin', 'LEFT');
		return $this->db->get('coinpot');
	}

	public function insertCoinpot($data) {
		$this->db->insert('coinpot', $data);
	}

	public function deleteCoinpot($id) {
		$this->db->delete('coinpot', ['id_coinpot' => $id]);
	}

	public function editCoinpot($id) {
		return $this->db->get_where('coinpot', ['id_coinpot' => $id])->row_array();
	}

	public function updateCoinpot($data,$where,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
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

	public function updateFaucethub($data,$where,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// >COIN LIST
	public function selectCoin() {
		return $this->db->get('coin_list');
	}

	public function insertCoin($data) {
		$this->db->insert('coin_list', $data);
	}

	public function deleteCoin($id) {
		$this->db->delete('coin_list', ['id' => $id]);
	}

	public function editCoin($id) {
		return $this->db->get_where('coin_list', ['id' => $id])->row_array();
	}

	public function updateCoin($data,$where,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}



}