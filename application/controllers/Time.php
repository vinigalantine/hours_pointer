<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('logged') == null){
			$this->load->view('login');
		} 
	}

	public function index(){
		$this->load->view("home");
	}

	public function point_time(){
		$user_id = $this->session->userdata('user')->id;
		$this->load->model("hour");

		$last_hour = $this->hour->get_user_hours($user_id)[0] == null ? null : $this->hour->get_user_hours($user_id)[0];

		if($last_hour->type_id == 5)
			$enter_type = 6;
		else
			$enter_type = 5;

		$data = [
			'hour'		=> date("H:i:s"),
			'day'		=> date('Y-m-d'),
			'user_id'	=> $user_id,
			'type_id'	=> $enter_type
		];

		$this->hour->store($data);

		return true;
	}

	public function hours_table(){
		$user_id = $this->session->userdata('user')->id;
		$this->load->model("hour");
		$this->load->model("type");

		if($this->session->userdata('user')->type_id == 3)
			$all = $this->hour->get_user_hours($user_id, true);
		else if($this->session->userdata('user')->type_id == 4)
			$all = $this->get();

		$json = "[";

		foreach ($all as $key => $hour) {
			$type_name = $this->type->get($hour->type_id)[0]->name;
			$json .= "{";
			$json .= "\"id\":".$hour->id.",";
			$json .= "\"hour\":\"".$hour->hour."\",";
			$json .= "\"day\":\"".$hour->day."\",";
			$json .= "\"user_id\":\"".$hour->user_id."\",";
			$json .= "\"type_id\":\"".$hour->type_id."\",";
			$json .= "\"type_name\":\"".$type_name."\"";
			$json .= "}";
			if ($key+1 != count($all)) {
				$json .= ",";
			}
		}

		$json .= "]";

		echo $json;
	}
}
