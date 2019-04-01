<?php
class pos_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function display_reservation($brid, $date){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, cs.first_name AS cs_fname, cs.last_name AS cs_lname, rv.date AS rv_date, rv.time AS rv_time, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE br.id = '$brid' AND rv.date = '$date'");
		if($query->num_rows()>0){	
			return $query->result();
		}
		else{
			return false;
		}
	}
	public function get_reservation($rvid){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, cs.first_name AS cs_fname, cs.last_name AS cs_lname, rv.date AS rv_date, rv.time AS rv_time, rv.time_end AS rv_end, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE rv.id = $rvid");
		if($query->num_rows()>0){	
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_avail_service($asid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.name AS sv_name ,sv.price AS sv_price, sv.duration AS sv_estimated, av.price AS as_price, 
							av.duration AS as_duration, av.status AS as_status, sv.status AS sv_status
					FROM avail_service av
					INNER JOIN branch br ON av.branch_id = br.id
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE br.id = '$asid' AND av.status = 'A'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_reservation_service($rvid){
		$query = $this->db->query("SELECT rs.id AS rs_id, sv.name AS sv_name, av.price AS as_price, av.duration AS as_duration, av.status AS as_status, sv.status AS sv_status, rs.avail_service_id AS as_id
					FROM reservation_service rs
					INNER JOIN reservation rv ON rs.reservation_id = rv.id
					INNER JOIN avail_service av ON rs.avail_service_id = av.id
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE rs.reservation_id = '$rvid'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_service($asid){
		$query = $this->db->query("SELECT av.id AS as_id, av.price AS as_price, av.duration AS as_duration, sv.name as sv_name
					FROM avail_service av
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE av.id = '$asid'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function delete_all_service($rvid){
		$this->db->query("DELETE FROM reservation_service WHERE reservation_id = '$rvid'");
	}
	public function update_reservation($rsv){
		$this->db->query("UPDATE reservation
				SET time_end = '$rsv[time_end]',
					status =  '$rsv[status]'
				WHERE id = '$rsv[id]'");
	}
	public function update_services($rserv){
		$this->db->insert("reservation_service", $rserv);
	}
}