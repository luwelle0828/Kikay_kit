<?php
class calendar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_branch_time($brid){
		$query = $this->db->query("SELECT id AS br_id, open_time AS br_opening, close_time AS br_closing
					FROM branch
					WHERE id = '$brid'");
		if($query->num_rows()>0){	
			return $query->result();
		}
		else{
			return false;
		}
	}
}