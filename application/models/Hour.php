<?php 
	
defined('BASEPATH') OR exit('No direct script access allowed');

class Hour extends CI_Model {

	public function get($id = null){
		if ($id) 
			$this->db->where('id', $id);

		return $this->db->get('hours')->result();
	}

	public function get_user_hours($user_id, $todas = false){
		if($todas){
			$this->db->order_by('id', 'asc');
		} else {
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);
		}

		$this->db->where('user_id', $user_id);

		return $this->db->get('hours')->result();
	}

	public function store($data){
		if($this->db->insert("hours", $data))
			return true;
		else
			return false;
	}
}
