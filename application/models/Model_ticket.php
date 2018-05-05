<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ticket extends CI_Model {
	
	public function get_data($id){
		$query = "SELECT t.ticket_name, rc.reference_code_name AS status, ty.type_name, t.ticket_id AS id, t.Type_type_id AS id_type    
			FROM Ticket AS t 
			LEFT JOIN Reference_code AS rc ON t.active_status = rc.reference_code_code_status 
			LEFT JOIN Type AS ty ON t.Type_type_id = ty.type_id 
			WHERE t.createby = ".$id.' ORDER BY t.Type_type_id';
		return $this->db->query($query)->result();
	}
	
	public function insert_data($data){
		$this->db->insert('Ticket', $data);
	}
	
	public function get_data_by_id($id, $creator){
		$query = "SELECT t.ticket_name, t.active_status AS status, t.Type_type_id AS id_type, t.ticket_id AS id   
			FROM Ticket AS t 
			WHERE t.ticket_id = ".$id." AND t.createby = ".$creator;
		return $this->db->query($query)->row();
	}
	
	public function update_data($data, $id){
		$this->db->where('ticket_id', $id);
		$this->db->update('Ticket', $data);
	}
	
	public function get_ticket_by_type($id){
		$query = "SELECT ticket_id, ticket_name FROM Ticket WHERE active_status = 1 AND Type_type_id = ".$id;
		return $this->db->query($query)->result();
	}
	
}