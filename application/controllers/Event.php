<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Danny_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$id 				= $this->getId();
		$data['event'] 		= $this->Model_event->get_event($id);
		
		$this->_view('event/index', $data);
	}
	
	public function create(){
		$id 				= $this->getId();
		$data['type'] 		= $this->Model_type->get_type_active($id);
		$data['location'] 	= $this->Model_location->get_location_active($id);
		$this->_view('event/create', $data);
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
		
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$tbo = $this->input->post('tbo');
		$pos = $this->input->post('po_start');
		$poe = $this->input->post('po_end');
		if ($this->upload->do_upload('img'))
		{
			$data = array(
				'Location_location_id'		=> $this->input->post('location'),
				'Type_type_id'				=> $this->input->post('type'),
				'event_name'				=> $this->input->post('event_name'),
				'event_note'				=> $this->input->post('note'),
				'event_start'				=> $start,
				'event_end'					=> $end,
				'event_ticket_box_start'	=> $tbo == '' ? null : $tbo,
				'event_pre_order_start'		=> $pos == '' ? null : $pos,
				'event_pre_order_end'		=> $poe == '' ? null : $poe,
				'event_image'				=> $new_name,
				'active_status'				=> $this->input->post('status'),
				'createby'					=> $id,
				'createdate'				=> date('Y-m-d H:i:s')
			);
			
		}else{
			var_dump($this->upload->display_errors()); die();
		}
		$idInsert = $this->Model_event->insert_data($data);
		
		$ticket_qty 		= $this->input->post('ticket_qty');
		$ticket_id 			= $this->input->post('ticket_id');
		$ticket_price 		= $this->input->post('ticket_price');
		$ticket_price_po 	= $this->input->post('ticket_price_po');
		$databatch = array();
		foreach($ticket_qty as $x=>$tq){
			$databatch[] = array(
				'Event_event_id'			=> $idInsert,
				'Ticket_ticket_id'			=> $ticket_id[$x],
				'event_has_ticket_qty'		=> $ticket_qty[$x],
				'event_has_ticket_price'	=> $ticket_price[$x],
				'event_has_ticket_po_price'	=> $ticket_price_po[$x],
				'createby'					=> $id,
				'active_status'				=> 1,
				'createdate'				=> date('Y-m-d H:i:s'),
			);
		}
		
		$this->db->insert_batch('Event_has_ticket', $databatch); 
		redirect(base_url('event'));
	}
	
	public function update($id){
		$get				= $this->Model_event->get_data_by_id($id, $this->getId());
		$data['type'] 		= $this->Model_type->get_type_active($this->getId());
		$data['location'] 	= $this->Model_location->get_location_active($this->getId());
		
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
		$this->_view('event/update', $data);
	}
	
	public function do_update(){
		$id 							= $this->input->post('id');
		
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$tbo = $this->input->post('tbo');
		$pos = $this->input->post('po_start');
		$poe = $this->input->post('po_end');
		
		$data = array(
			'Location_location_id'		=> $this->input->post('location'),
			'Type_type_id'				=> $this->input->post('type'),
			'event_name'				=> $this->input->post('event_name'),
			'event_note'				=> $this->input->post('note'),
			'event_start'				=> $start,
			'event_end'					=> $end,
			'event_ticket_box_start'	=> $tbo == '' ? null : $tbo,
			'event_pre_order_start'		=> $pos == '' ? null : $pos,
			'event_pre_order_end'		=> $poe == '' ? null : $poe,
			'active_status'				=> $this->input->post('status'),
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
		
		$this->Model_event->update_data($data, $id);
		
		$ticket_qty 		= $this->input->post('ticket_qty');
		$ticket_id 			= $this->input->post('eh_id');
		$ticket_price 		= $this->input->post('ticket_price');
		$ticket_price_po 	= $this->input->post('ticket_price_po');
		$databatch = array();
		foreach($ticket_qty as $x=>$tq){
			$databatch[] = array(
				'event_has_ticket_id'		=> $ticket_id[$x],
				'event_has_ticket_qty'		=> $ticket_qty[$x],
				'event_has_ticket_price'	=> $ticket_price[$x],
				'event_has_ticket_po_price'	=> $ticket_price_po[$x],
				'createby'					=> $id,
				'active_status'				=> $this->input->post('status_eh-'.$ticket_id[$x])
			);
		}
		$this->db->update_batch('Event_has_ticket',$databatch, 'event_has_ticket_id'); 
		redirect(base_url('event'));
	}
	
	
	
}
