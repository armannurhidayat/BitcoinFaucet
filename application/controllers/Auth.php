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
			$user = $this->input->post('username',true);
			$pass = sha1($this->input->post('password',true));
			$cek = $this->M_Auth->cekUsername($user,$pass);
			$hasil = count($cek);
			
			if ($hasil > 0) {
				$session['logged_in'] = TRUE;
				$this->session->set_userdata($session);
				$this->session->set_flashdata('login', 'LoginBerhasil');
					redirect('administrator/homepage');
				} else {
					$this->session->set_flashdata('gagal', 'LoginBerhasil');
					redirect('auth/login');
				}
			}

			if (! $this->session->logged_in) {
				redirect('auth/login');
			}
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect('auth/login');
	}


}