<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_location extends CI_Model {
	
	public function get_location($id){
		$query = " SELECT l.location_name, l.location_address, rc.reference_code_name AS status, location_id AS id 
			FROM Location AS l 
			LEFT JOIN Reference_code AS rc ON l.active_status = rc.reference_code_code_status
			WHERE l.createby = ".$id;
		return $this->db->query($query)->result();
	}
	
	public function insert_data($data){
		$this->db->insert('Location', $data);
	}
	
	public function get_data_by_id($id, $creator){
		$query = " SELECT l.location_name, l.location_address, l.active_status AS status, location_id AS id, l.location_image AS img 
			FROM Location AS l 
			WHERE l.createby = ".$creator." AND l.location_id = ".$id;
		return $this->db->query($query)->row();
	}
	
	public function update_data($data, $id){
		$this->db->where('location_id', $id);
		$this->db->update('Location', $data);
	}
	
	public function get_location_active($id){
		$query = "SELECT location_name, location_id FROM Location WHERE active_status = 1 AND createby = ".$id;
		return $this->db->query($query)->result();
	}
	
}