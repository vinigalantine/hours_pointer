<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('logged') != null){
			$this->load->view('home');
		}
	}

	public function index($msg = null)
	{
		$this->load->view('login', ['msg' => $msg]);
	}

	public function sing_in(){
		print_r($this->input->post('user'),$this->input->post('pass'));

		$this->form_validation->set_rules('user', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false)
			$this->load->view('login', ['msg' => "Confira se preencheu todos os dados"]);
		else{
			$this->load->model("auth");

			$success = $this->auth->login($this->input->post('user'),$this->input->post('pass'));

			if($success)
				$this->load->view('home');
			else
				$this->load->view('login', ['msg' => "Ops... Você não tem acesso a esse sistema!"]);
		}
	}

	public function logout() {
		$this->load->model("auth");

		$this->auth->logout();

		redirect('?msg=Logou feito com sucesso');
	}

}
