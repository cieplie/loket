<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Danny_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$id 				= $this->getId();
		$data['location'] 	= $this->Model_location->get_location($id);
		
		$this->_view('location/index', $data);
	}
	
	public function create(){
		$this->_view('location/create');
	}
	
	public function do_create(){
		$id 							= $this->getId();
		$config['upload_path']          = './asset/dist/upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$new_name 						= $this->getId().'-'.date('YmdHis').'.'.pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
		$config['file_name'] 			= $new_name;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('img'))
		{
			$data = array(
				'location_name'		=> $this->input->post('location_name'),
				'location_address'	=> $this->input->post('location_address'),
				'location_image'	=> $new_name,
				'active_status'		=> $this->input->post('status'),
				'createby'			=> $id,
				'createdate'		=> date('Y-m-d H:i:s')
			);
		}else{
			var_dump($this->upload->display_errors()); die();
		}
		
		$this->Model_location->insert_data($data);
		redirect(base_url('location'));
	}
	
	public function update($id){
		$get	= $this->Model_location->get_data_by_id($id, $this->getId());
		
		if($get != null){
			$data['location'] = $get;
		}else{
			redirect(base_url('location/create'));
		}
		$this->_view('location/update', $data);
	}
	
	public function do_update(){
		$id 							= $this->input->post('id');
		
		$data = array(
			'location_name'		=> $this->input->post('location_name'),
			'location_address'	=> $this->input->post('location_address'),
			'active_status'		=> $this->input->post('status'),
		);
		
		
		if(!empty($_FILES['img']['name'])){
			$config['upload_path']          = './asset/dist/upload/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$new_name 						= $this->getId().'-'.date('YmdHis').'.'.pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
			$config['file_name'] 			= $new_name;
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img'))
			{
				$data['location_image'] = $new_name;
			}else{
				var_dump($this->upload->display_errors()); die();
			}
		}	
		
		$this->Model_location->update_data($data, $id);
		redirect(base_url('location'));
	}
	
	
	
}
