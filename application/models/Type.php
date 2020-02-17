<?php 
	
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Model {

	public function get($id = null){
		if ($id) 
			$this->db->where('id', $id);

		return $this->db->get('types')->result();
	}
}
