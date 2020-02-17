<?php 
	
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get($id = null){
		if ($id) 
			$this->db->where('id', $id);
		else
			$this->db->order_by("id", 'desc');

		return $this->db->get('users')->result();
	}
}
