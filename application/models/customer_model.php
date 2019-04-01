<?php
class customer_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function display_info($id){
		$query = $this->db->query("SELECT cs.id AS cs_id, cs.first_name AS cs_fname, cs.last_name AS cs_lname, cs.address AS cs_address, 
							cs.contact AS cs_contact, cs.gender AS cs_gender
					FROM customer cs
					INNER JOIN user u ON cs.user_id = u.id
					WHERE u.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_reservation($id){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, rv.date AS rv_date, 
							rv.time AS rv_time, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE cs.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_all_branch($limit, $start, $sort, $search){  
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, cm.description AS cm_description, br.location AS br_location, br.image AS br_image, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, (SELECT AVG(rating) FROM reviews WHERE branch_id = br_id) as br_rate, (SELECT COUNT(*) FROM reviews WHERE branch_id = br_id) as br_reviews, (SELECT COUNT(*) FROM reservation WHERE branch_id = br_id) as br_popularity
					FROM branch br
					INNER JOIN company cm ON br.company_id = cm.id
					INNER JOIN user u ON br.user_id = u.id
					WHERE u.status = 'A' AND (br.name LIKE '%$search%' OR br.location LIKE '%$search%') ".$sort
					." LIMIT $start,$limit");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_branch($id){
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, cm.description AS cm_description, br.location AS br_location, br.image AS 		br_image, br.mobile AS br_mobile, br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.slots AS br_slots
					FROM branch br
					INNER JOIN company cm ON br.company_id = cm.id
					WHERE br.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function update_customer_info($cust){
		$this->db->query("UPDATE customer
				SET first_name =  '$cust[first_name]',
					last_name =  '$cust[last_name]',
					address =  '$cust[address]',
					contact =  '$cust[contact]',
					updated_date = '$cust[updated_date]',
					updated_by = '$cust[updated_by]'
				WHERE id = '$cust[id]'");
	}
	public function customer_reserve($rsv){
		$this->db->insert("reservation", $rsv);
	}
	public function delete_reservation($rvid){
		$this->db->delete('reservation', array('id' => $rvid));
	}
	public function customer_reserve_service($rserv){
		$this->db->insert("reservation_service", $rserv);
	}
	public function get_customer_info($id){
		$query = $this->db->query("SELECT first_name AS cs_fname, last_name AS cs_lname, address AS cs_address, contact AS cs_contact, gender AS cs_gender
					FROM customer
					WHERE id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_branch_service($id){
		$query = $this->db->query("SELECT av.id AS as_id, av.price AS as_price, av.duration AS as_duration, br.id AS br_id, br.name AS br_name, 
							sv.name AS sv_name, av.status AS as_status
						FROM avail_service av
						INNER JOIN branch br ON av.branch_id = br.id 
						INNER JOIN service sv ON av.service_id = sv.id 
						WHERE br.id = '$id' AND (av.status = 'A' AND sv.status = 'A')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_salon_count($search){
		$query = $this->db->query("SELECT * 
					FROM branch br
					INNER JOIN user u ON br.user_id = u.id
					WHERE u.status = 'A' AND (br.name LIKE '%$search%' OR br.location LIKE '%$search%')");
		return $query->num_rows();
	}
	// public function get_branch_count($key){
	// 	$query = $this->db->query("SELECT COUNT(*) AS br_count 
	// 				FROM branch br
	// 				INNER JOIN user u ON br.user_id = u.id
	// 				WHERE u.status = 'A' AND (name LIKE '%$key%' OR location LIKE '%$key%')");
	// 	if($query->num_rows()>0){
	// 		return $query->result();
	// 	}
	// 	else{
	// 		return NULL;	
	// 	}
	// }
	public function get_review_count($brid, $shown){
		$query = $this->db->query("SELECT *
					FROM reviews rw
					WHERE rw.branch_id = $brid".$shown);
		return $query->num_rows();
	}
	public function get_reviews($brid, $limit, $shown){
		$query = $this->db->query("SELECT rw.id AS rw_id, rw.rating AS rw_rating, rw.message AS rw_message, rw.created_date AS rw_datetime, cs.first_name AS cs_fname, cs.last_name AS cs_lname, cs.address AS cs_address
					FROM reviews rw
					INNER JOIN customer cs ON rw.customer_id = cs.id
					WHERE rw.branch_id = $brid".$shown.
					" ORDER BY rw_datetime DESC 
					LIMIT $limit,5");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function send_review($rev){
		$this->db->insert("reviews", $rev);
	}
	public function view_reservation($rvid){
		$query = $this->db->query("SELECT rv.code AS rv_no, cs.first_name AS cs_fname, cs.last_name AS cs_lname, rv.status AS rv_status,
							br.name as br_name, rv.date AS rv_date, rv.time AS rv_time, rv.created_date AS rv_created_date, rv.time_end AS rv_end
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE rv.id = '$rvid'");	
		return $query->result();
	}
	public function cancel_reservation($rvid){
		$this->db->query("UPDATE reservation
				SET status =  'Cancelled'
				WHERE id = '$rvid'");
	}
	public function get_reservation_service($rvid){
		$query = $this->db->query("SELECT rs.id AS rs_id, sv.name AS sv_name, av.price AS as_price, av.duration AS as_duration, 
							av.status AS as_status, sv.status AS sv_status
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
	public function get_topSalon(){
		$query = $this->db->query("SELECT br.id AS br_id, br.name as br_name, br.location as br_location, br.image as br_image, (SELECT COUNT(*) FROM reservation WHERE branch_id = br_id) AS rv_count
						FROM branch br
						INNER JOIN user u ON br.user_id = u.id
						WHERE u.status = 'A'
						ORDER BY rv_count DESC");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_stat($brid){
		$query = $this->db->query("SELECT br.id AS br_id, (SELECT COUNT(*) FROM avail_service av WHERE av.branch_id = br_id AND av.status='A') AS sv_count, (SELECT COUNT(*) FROM reservation rv WHERE rv.branch_id = br_id) AS rv_count, (SELECT COUNT(DISTINCT customer_id) FROM reservation rv WHERE rv.branch_id = br_id) AS cs_count
						FROM branch br
						INNER JOIN user u ON br.user_id = u.id
						WHERE br.id = $brid AND u.status = 'A'
						ORDER BY rv_count DESC");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_topServices($brid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price, (SELECT COUNT(*) FROM reservation_service WHERE avail_service_id = as_id) AS rs_count
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			WHERE av.branch_id= $brid AND av.status = 'A'
			ORDER BY rs_count DESC");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_latestReviews($brid){
		$query = $this->db->query("SELECT rw.id AS rw_id, rw.rating AS rw_rating, rw.message AS rw_message, rw.created_date AS rw_datetime, cs.first_name AS cs_fname, cs.last_name AS cs_lname, cs.address AS cs_address
					FROM reviews rw
					INNER JOIN customer cs ON rw.customer_id = cs.id
					WHERE rw.branch_id = $brid
					ORDER BY rw_datetime DESC");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_categories($brid){
		$query = $this->db->query("SELECT ct.id AS ct_id, ct.type AS ct_category
			FROM category ct
			INNER JOIN branch br ON br.id = $brid
			INNER JOIN company cm ON br.company_id = cm.id
			WHERE ct.company_id = cm.id");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_service_count($brid, $cat){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price, (SELECT COUNT(*) FROM reservation_service WHERE avail_service_id = as_id) AS rs_count
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			WHERE av.branch_id= $brid AND av.status = 'A' ".$cat."");
		return $query->num_rows();
	}
	public function get_services($brid, $cat, $limit, $start, $sort){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price, (SELECT COUNT(*) FROM reservation_service WHERE avail_service_id = as_id) AS rs_count
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			WHERE av.branch_id= $brid AND av.status = 'A' ".$cat.
			" ".$sort."
			LIMIT $start,$limit");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_all_service($brid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			WHERE av.branch_id = $brid AND av.status = 'A'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_category_service($brid, $ctid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			INNER JOIN category ct ON sv.category_id = ct.id
			WHERE av.branch_id = $brid AND ct.id = $ctid AND av.status = 'A'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_avail_service($asid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.image AS sv_image, sv.name AS sv_name, av.duration AS as_duration, av.price AS as_price
			FROM avail_service av
			INNER JOIN service sv ON av.service_id = sv.id
			WHERE av.id = $asid");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function add_reservation($res){
		$this->db->insert("reservation", $res);
	}
	public function add_reserve_service($rserv){
		$this->db->insert("reservation_service", $rserv);
	}
	public function get_reservation_slot($brid, $date){		//getting number of reservations
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.time AS rv_start, rv.time_end AS rv_end
			FROM reservation rv
			WHERE rv.branch_id = '$brid' AND (rv.status = 'Pending' OR rv.status = 'Paid') AND rv.date = '$date'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
}