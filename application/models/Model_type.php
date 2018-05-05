<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_type extends CI_Model {
	
	public function get_type($id){
		$query = "SELECT t.type_name, rc.reference_code_name AS status, t.type_id AS id  
			FROM Type AS t 
			LEFT JOIN Reference_code AS rc ON t.active_status = rc.reference_code_code_status 
			WHERE t.createby = ".$id;
		return $this->db->query($query)->result();
	}
	
	public function insert_data($data){
		$this->db->insert('Type', $data);
	}
	
	public function get_data_by_id($id, $creator){
		$query = "SELECT t.type_name, t.active_status AS status, t.type_id AS id  
			FROM Type AS t 
			WHERE t.type_id = ".$id." AND t.createby = ".$creator;
		return $this->db->query($query)->row();
	}
	
	public function update_data($data, $id){
		$this->db->where('type_id', $id);
		$this->db->update('Type', $data);
	}
	
	public function get_type_active($id){
		$query = "SELECT t.type_name, t.type_id AS id  
			FROM Type AS t 
			WHERE t.active_status = 1 AND t.createby = ".$id;
		return $this->db->query($query)->result();
	}
	
}