<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchanges extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if (! $this->session->logged_in) {
			redirect('administrator');
		}
	}

}