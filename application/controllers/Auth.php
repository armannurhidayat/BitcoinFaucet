<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function login() {
		$this->load->view('login');
	}

	public function proses_login() {
		if(isset($_POST['login'])) {
			$user = $this->input->post('username', true);
			$pass = $this->input->post('password');
			
			$cek = $this->db->get_where('user', ['username' => $user])->row_array();
			
			//jika username ada
			if ($cek) {
				//jika username ada cek password
				if (password_verify($pass, $cek['password'])) {
					$session['logged_in'] = TRUE;
					$this->session->set_userdata($session);
					$this->session->set_flashdata('login', 'LoginBerhasil');
					redirect('administrator/homepage');

				} else {

					$this->session->set_flashdata('gagal', 'LoginBerhasil');
					redirect('administrator');
				}

			} else {

				$this->session->set_flashdata('gagal', 'LoginBerhasil');
				redirect('administrator');
			}
		}

		if (! $this->session->logged_in) {
			redirect('administrator');
		}
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect('administrator');
	}

}