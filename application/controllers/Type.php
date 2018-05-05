<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends Danny_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$id 			= $this->getId();
		$data['type'] 	= $this->Model_type->get_type($id);
		
		$this->_view('type/index', $data);
	}
	
	public function create(){
		$this->_view('type/create');
	}
	
	public function do_create(){
		$name 	= $this->input->post('type_name');
		$status = $this->input->post('status');
		$data = array(
			'type_name'		=> $name,
			'active_status'	=> $status,
			'createby'		=> $this->getId(),
			'createdate'	=> date('Y-m-d H:i:s')
		);
		$this->Model_type->insert_data($data);
		redirect(base_url('type'));
	}
	
	public function update($id){
		$get	= $this->Model_type->get_data_by_id($id, $this->getId());
		
		if($get != null){
			$data['type'] = $get;
		}else{
			redirect(base_url('type/create'));
		}
		$this->_view('type/update', $data);
	}
	
	public function do_update(){
		$name 	= $this->input->post('type_name');
		$status = $this->input->post('status');
		$id 	= $this->input->post('id');
		$data = array(
			'type_name'		=> $name,
			'active_status'	=> $status,
			'createby'		=> $this->getId()
		);
		$this->Model_type->update_data($data, $id);
		redirect(base_url('type'));
	}
	
	
	
}
