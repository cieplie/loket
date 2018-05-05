<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function detail($id){
		$get = $this->Model_event->get_data_detail($id);
		
		$arrayFix = array();
		$detail = array();
		
		foreach($get as $g){
			$arrayFix[$g->id] = $g; 
			$detail[] = $g; 
		}
		
		if(!empty($arrayFix)){
			$get = array_values($arrayFix);
			$get[0]->detail = $detail;
			$data['event'] = $get;
		}else{
			redirect(base_url('event/create'));
		}
		$this->load->view('event/detail', $data);
	}
	
	
	
}
