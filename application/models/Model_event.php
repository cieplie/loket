<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_Model {
	
	public function get_event($id){
		$query = "SELECT e.event_name AS nama, e.event_start AS mulai, e.event_end AS selesai, l.location_name AS location, 
			SUM(event_has_ticket_qty) AS tiket_qty, SUM(IF(event_has_ticket_po_price = 0, event_has_ticket_price , event_has_ticket_po_price)) AS omzet,
			e.event_id AS id 			
			FROM Event AS e
			LEFT JOIN Location AS l ON e.Location_location_id = l.location_id 
			LEFT JOIN Event_has_ticket AS ah ON ah.Event_event_id = e.event_id 
			WHERE e.createby = ".$id." GROUP BY e.event_id";
		return $this->db->query($query)->result();
	}
	
	public function insert_data($data){
		$this->db->insert('Event', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function get_data_by_id($id, $creator){
		$query = " SELECT e.event_name, e.event_id AS id, e.event_note, e.Location_location_id AS location, e.Type_type_id AS type,
			e.event_start, e.event_end, e.event_pre_order_start, e.event_pre_order_end, e.event_ticket_box_start AS tbo, e.event_image AS img, e.active_status, 
			eh.event_has_ticket_id AS eh_id, eh.event_has_ticket_qty AS eh_qty, eh.event_has_ticket_price AS eh_price, eh.event_has_ticket_po_price AS eh_po,
			eh.active_status AS status, t.ticket_name  
			FROM Event AS e 
			LEFT JOIN Event_has_ticket AS eh ON eh.Event_event_id = e.event_id 
			LEFT JOIN Ticket AS t ON t.ticket_id = eh.Ticket_ticket_id 
			WHERE e.createby = ".$creator." AND e.event_id = ".$id;
		return $this->db->query($query)->result();
	}
	
	public function get_data_detail($id){
		$query = " SELECT e.event_image AS img, e.event_note AS note, e.event_name AS name, l.location_name, l.location_address AS address, 
			eh.event_has_ticket_qty AS eh_qty, eh.event_has_ticket_price AS eh_price, eh.event_has_ticket_po_price AS eh_po, t.ticket_name, e.event_start, 
			e.event_end, e.event_pre_order_start AS po_start, e.event_pre_order_end AS po_end, e.event_ticket_box_start AS tbo, e.event_id AS id  
			FROM Event AS e 
			LEFT JOIN Location AS l ON l.location_id = e.Location_location_id 
			LEFT JOIN Event_has_ticket AS eh ON eh.Event_event_id = e.event_id 
			LEFT JOIN Ticket AS t ON t.ticket_id = eh.Ticket_ticket_id
		";
		return $this->db->query($query)->result();
	}
	
	public function update_data($data, $id){
		$this->db->where('event_id', $id);
		$this->db->update('event', $data);
	}
	
	public function get_nama_event($id){
		$query = "SELECT event_name from Event where event_id = ".$id;
		$get = $this->db->query($query)->row();
		if($get){
			return $get->event_name;
		}else{
			return '';
		}
		
	}
	
}