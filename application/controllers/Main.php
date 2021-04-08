<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if($this->session->userdata("gold") == NULL && $this->session->userdata("activities") == NULL){
			$this->session->set_userdata("gold", 0);
			$this->session->set_userdata("activities", array());
		}

		$this->load->view("index");
	}

	public function process_money($choice){
		$choice_array = array(
			"farm" => [10, 20],
			"cave" => [5, 10],
			"house" => [2, 5],
			"casino" => [0, 50]
		);

		$now = date('F jS Y g:i:s a');

		foreach($choice_array AS $key => $value){
			if($choice == $key){
				$gold = rand($value[0], $value[1]);
				if($choice == "casino"){
					$odds = rand(1, 10);
					if($odds % 2 == 0){
						$this->session->set_userdata("gold", $this->session->userdata("gold") + $gold);
						$old_array = $this->session->userdata("activities");
						array_push($old_array, array("gain" => "You entered a $choice and earned $gold golds! ($now)"));
						$this->session->set_userdata("activities", $old_array);
					}
					else{
						$this->session->set_userdata("gold", $this->session->userdata("gold") - $gold);
						$old_array = $this->session->userdata("activities");
						array_push($old_array, array("loss" => "You entered a $choice and lost $gold golds... Ouch ($now)"));
						$this->session->set_userdata("activities", $old_array);
					}
				}
				else{
					$this->session->set_userdata("gold", $this->session->userdata("gold") + $gold);
					$old_array = $this->session->userdata("activities");
					array_push($old_array, array("gain" => "You entered a $choice and earned $gold golds! ($now)"));
					$this->session->set_userdata("activities", $old_array);
				}
			}
		}

		redirect("/");
	}
}
