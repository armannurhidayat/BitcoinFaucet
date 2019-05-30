<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('auth/login');
		}
	}

}