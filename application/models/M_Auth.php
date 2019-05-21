<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
	
	public function cekUsername($user,$pass) {
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        return $this->db->get_where('user')->row();
    }


}