<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Danny_Controller extends CI_Controller {

    public function __construct() {
		parent::__construct();
		if(is_null($this->session->userdata('twitter_user_id'))){
			redirect(base_url('login'));
		}
    }
	
	public function _view($template, $data = null){
		$this->load->view('core/header');
		$this->load->view($template, $data);
		$this->load->view('core/footer');
	}
	
	public function getId(){
		return $this->session->userdata('twitter_user_id');
	}

}