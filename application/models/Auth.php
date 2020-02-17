<?php 
	
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

	public function validate($user, $pass){
		$user_logged = null;
		if ($user && $pass){
			$this->db->where('user', $user)
					->where('password', sha1($pass))
					->where('active != ',0)
					->limit(1);
			
			$user_logged = $this->db->get('users')->result();
		}
		
		return $user_logged;
	}

	public function login($user, $pass){
		$user_logged = $this->validate($user, $pass);
		$bool = $user_logged == null ? false : true;

		if($bool){
			// session_start();
			
			$data = array(
                    'user' => $user_logged[0],
                    'logged' => true
                );
            
            $this->session->set_userdata($data);

		}

		return $bool;
	}

	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
	}
}
