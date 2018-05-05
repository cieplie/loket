<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends Danny_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$id 			= $this->getId();
		$data['ticket'] = $this->Model_ticket->get_data($id);
		$this->_view('ticket/index', $data);
	}
	
	public function create(){
		$id 			= $this->getId();
		$data['type'] = $this->Model_type->get_type_active($id);
		$this->_view('ticket/create', $data);
	}
	
	public function do_create(){
		$data = array(
			'Type_type_id'		=> $this->input->post('type'),
			'ticket_name'		=> $this->input->post('ticket_name'),
			'active_status'		=> $this->input->post('status'),
			'createby'			=> $this->getId(),
			'createdate'		=> date('Y-m-d H:i:s')
		);
		$this->Model_ticket->insert_data($data);
		redirect(base_url('ticket'));
	}
	
	public function update($id){
		$get			= $this->Model_ticket->get_data_by_id($id, $this->getId());
		$data['type'] 	= $this->Model_type->get_type_active($this->getId());
		
		if($get != null){
			$data['ticket'] = $get;
		}else{
			redirect(base_url('ticket/create'));
		}
		$this->_view('ticket/update', $data);
	}
	
	public function do_update(){
		$id = $this->input->post('id');
		$data = array(
			'Type_type_id'		=> $this->input->post('type'),
			'ticket_name'		=> $this->input->post('ticket_name'),
			'active_status'		=> $this->input->post('status')
		);
		$this->Model_ticket->update_data($data, $id);
		redirect(base_url('ticket'));
	}
	
	public function get_ticket_by_type(){
		$id = $this->input->post('id');
		$get = $this->Model_ticket->get_ticket_by_type($id);
		$string = '
				<table class="table">
					<tr>
						<td>Ticket Name</td>
						<td>Ticket QTY</td>
						<td>Ticket Price</td>
						<td>Ticket PO Price(Optional)</td>
					</tr>	
				';
		foreach($get as $g){
			$string .= '
						<tr>
							<td>'.$g->ticket_name.'</td>
							<td>
								<input class="form-control validate_mandatory validate_int" name="ticket_qty[]" type="text" placeholder="Qty">
								<input class="validate_mandatory" name="ticket_id[]" type="hidden" value="'.$g->ticket_id.'">
							</td>
							<td>
								<input class="form-control validate_mandatory validate_int" name="ticket_price[]" type="text" placeholder="Price">
							</td>
							<td>
								<input class="form-control validate_int" name="ticket_price_po[]" type="text" placeholder="Price PO">
							</td>	
						</tr>';
		}
		echo $string.'</table>';
	}
	
}
