<?php
class admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function display_company(){
		//ANOTHER WAY TO USE QUERY WITHOUT CI's "$this->db->query"

		// $con = mysqli_connect("localhost","root","","kikay_kit");
		// $query = mysqli_query($con,"SELECT u.id AS u_id, cm.code AS cm_code, u.status AS u_status, u.created_date AS u_created_date, cm.id AS cm_id, cm.name AS cm_company, cm.description AS cm_description
		// 		FROM company cm
		// 		INNER JOIN user u ON cm.user_id = u.id");
		// if(mysqli_num_rows($query)>0){	
		// 	print_r(mysqli_fetch_assoc($query));die();
		// 	// return $query->result();
		// }
		// else{
		// 	return NULL;
		// }
		$query = $this->db->query("SELECT u.id AS u_id, cm.code AS cm_code, u.status AS u_status, u.created_date AS u_created_date, cm.id AS cm_id, cm.name AS cm_company, cm.description AS cm_description
				FROM company cm
				INNER JOIN user u ON cm.user_id = u.id");
		if($query->num_rows()>0){	
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_branch(){
		$query = $this->db->query("SELECT u.id AS u_id, u.status AS u_status, u.created_date AS u_created_date, br.code AS br_code,
						br.id AS br_id, br.name AS br_name, br.location AS br_location, br.image AS br_image, br.mobile AS br_mobile, br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.company_id AS cm_id, cm.name AS cm_company
				FROM branch br
				INNER JOIN user u ON br.user_id = u.id
				INNER JOIN company cm ON cm.id = br.company_id
				");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_customer(){
		$query = $this->db->query("SELECT u.id AS u_id, u.status AS u_status, u.created_date AS u_created_date, 
						cs.id AS cs_id, cs.code AS cs_code, cs.first_name AS cs_fname, cs.last_name AS cs_lname, cs.address AS cs_address, cs.contact AS cs_contact
				FROM customer cs
				INNER JOIN user u ON cs.user_id = u.id");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_reservation(){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_code, rv.status AS rv_status, cs.first_name AS cs_fname, cs.last_name AS cs_lname, br.name AS br_name, rv.created_date AS rv_created_date
				FROM reservation rv
				INNER JOIN customer cs ON rv.customer_id = cs.id
				INNER JOIN branch br ON rv.branch_id = br.id");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_user(){
		$query = $this->db->query("SELECT u.id AS u_id, u.username AS u_user, u.status AS u_status, ut.type AS ut_type, u.created_date AS u_created_date
				FROM user u
				INNER JOIN user_type ut ON u.user_type_id = ut.id");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function view_company($id){
		$query = $this->db->query("SELECT cm.user_id AS u_id, cm.id AS cm_id, cm.name AS cm_company, cm.description AS cm_description
					FROM company cm
					INNER JOIN user u ON cm.user_id = u.id
					WHERE cm.id = '$id'");	
		return $query->result();
	}
	public function view_branch($id){
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, br.location AS br_location,
							br.mobile AS br_mobile, br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.company_id AS cm_id, br.image AS br_image, br.slots AS br_slots, cm.name AS cm_company
					FROM branch br
					INNER JOIN user u ON br.user_id = u.id
					INNER JOIN company cm ON br.company_id = cm.id
					WHERE br.id = '$id'");	
		return $query->result();
	}
	public function view_customer($id){
		$query = $this->db->query("SELECT cs.id AS cs_id, cs.first_name AS cs_fname, cs.last_name AS cs_lname, cs.address AS cs_address, cs.contact AS cs_contact, cs.gender AS cs_gender
					FROM customer cs
					INNER JOIN user u ON cs.user_id = u.id
					WHERE cs.id = '$id'");	
		return $query->result();
	}
	// public function delete_company($id){
		// $this->db->query("UPDATE company cm
					// INNER JOIN user u ON cm.user_id = u.user_id
					// SET u_status = 'I' 
					// WHERE cm.company_id = '$id'");
	// }
	public function update_client($comp){
		$this->db->query("UPDATE company
					SET name = '$comp[name]',
						description = '$comp[description]',
						updated_date = '$comp[updated_date]',
						updated_by = '$comp[updated_by]'
						WHERE id = '$comp[id]'");
	}
	public function update_branch($bran){
		$this->db->query("UPDATE branch
					SET name = '$bran[name]',
						location = '$bran[location]',
						mobile = '$bran[mobile]',
						telephone = '$bran[telephone]',
						open_days = '$bran[open_days]',
						open_time = '$bran[open_time]',
						close_time = '$bran[close_time]',
						image = '$bran[image]',
						slots = '$bran[slots]',
						updated_date = '$bran[updated_date]',
						updated_by = '$bran[updated_by]'
						WHERE id = '$bran[id]'");
	}
	public function update_customer($cust){
		$this->db->query("UPDATE customer
				SET first_name =  '$cust[first_name]',
					last_name =  '$cust[last_name]',
					address =  '$cust[address]',
					contact =  '$cust[contact]',
					updated_date = '$cust[updated_date]',
					updated_by = '$cust[updated_by]'
				WHERE id = '$cust[id]'");
	}
	public function update_user($user){
		$this->db->query("UPDATE user
			SET username =  '$user[username]',
				updated_date = '$user[updated_date]',
				updated_by = '$user[updated_by]'
			WHERE id = '$user[id]'");
	}
	public function delete_all_branches($id){
		$this->db->query("UPDATE branch br
					INNER JOIN user u ON br.user_id = u.id
					SET u.status = 'I' 
					WHERE br.id = '$id'");
	}
	public function activate_company($id){
		$this->db->query("UPDATE company cm
					INNER JOIN user u ON cm.user_id = u.id
					SET u.status = 'A' 
					WHERE cm.id = '$id'");
	}
	public function delete_customer($id){
		$this->db->query("UPDATE customer cs
					INNER JOIN user u ON cs.user_id = u.id
					SET u.status = 'I' 
					WHERE cs.id = '$id'");
	}
	public function activate_customer($id){
		$this->db->query("UPDATE customer cs
					INNER JOIN user u ON cs.user_id = u.id
					SET u.status = 'A' 
					WHERE cs.id = '$id'");
	}
	public function delete_reservation($id){
		$this->db->query("UPDATE reservation
					SET status = 'Cancelled' 
					WHERE id = '$id'");
	}
	public function user_count(){
		$query = $this->db->query("SELECT COUNT(id) AS us
				FROM user
				WHERE id != 1");
		return $query->result();
	}
	public function user_count_a(){
		$query = $this->db->query("SELECT COUNT(id) AS us_a
				FROM user
				WHERE id != 1 AND status = 'A'
			");
		return $query->result();
	}
	public function user_count_i(){
		$query = $this->db->query("SELECT COUNT(id) AS us_i
				FROM user
				WHERE id != 1 AND status = 'I'
				");
		return $query->result();
	}
	public function user_logged(){
		$query = $this->db->query("SELECT COUNT(id) AS lg
				FROM user
				WHERE logged_in = 1");
		return $query->result();
	}
	public function branch_count(){
		$query = $this->db->query("SELECT COUNT(id) AS br
				FROM branch");
		return $query->result();
	}
	public function branch_count_a(){
		$query = $this->db->query("SELECT COUNT(id) AS br_a
				FROM user
				WHERE status = 'A' AND (user_type_id = '2' OR user_type_id = '3')
				");
		return $query->result();
	}
	public function branch_count_i(){
		$query = $this->db->query("SELECT COUNT(id) AS br_i
				FROM user
				WHERE status = 'I' AND (user_type_id = '2' OR user_type_id = '3')
				");
		return $query->result();
	}
	public function client_count(){
		$query = $this->db->query("SELECT COUNT(id) AS cl
				FROM company");
		return $query->result();
	}
	public function client_count_a(){
		$query = $this->db->query("SELECT COUNT(id) AS cl_a
				FROM user
				WHERE user_type_id = '2' AND status = 'A'
				");
		return $query->result();
	}
	public function client_count_i(){
		$query = $this->db->query("SELECT COUNT(id) AS cl_i
				FROM user
				WHERE user_type_id = '2' AND status = 'I'
				");
		return $query->result();
	}
	public function customer_count(){
		$query = $this->db->query("SELECT COUNT(id) AS cs
				FROM customer");
		return $query->result();
	}
	public function customer_count_a(){
		$query = $this->db->query("SELECT COUNT(id) AS cs_a
				FROM user
				WHERE user_type_id = '4' AND status = 'A'
				");
		return $query->result();
	}
	public function customer_count_i(){
		$query = $this->db->query("SELECT COUNT(id) AS cs_i
				FROM user
				WHERE user_type_id = '4' AND status = 'I'
				");
		return $query->result();
	}
	public function reserve_count(){
		$query = $this->db->query("SELECT COUNT(id) AS rv
				FROM reservation");
		return $query->result();
	}
	public function reserve_count_a(){
		$query = $this->db->query("SELECT COUNT(id) AS rv_a
				FROM reservation
				WHERE status = 'Pending'
				");
		return $query->result();
	}
	public function reserve_count_c(){
		$query = $this->db->query("SELECT COUNT(id) AS rv_c
				FROM reservation
				WHERE status = 'Cancelled'
				");
		return $query->result();
	}
	public function get_user($id){
		$query = $this->db->query("SELECT id AS u_id, username AS u_user
				FROM user
				WHERE id = '$id'");
		return $query->result();
	}
	public function get_service($cmid){
		$query = $this->db->query("SELECT name AS sv_name, price AS sv_price, duration AS sv_estimated, status AS sv_status
				FROM service
				WHERE company_id = '$cmid'");
		return $query->result();
	}
	public function get_branch($cmid){
		$query = $this->db->query("SELECT br.id AS br_id, br.code AS br_code, br.name AS br_name, br.location AS br_location, u.status AS u_status
				FROM branch br
				INNER JOIN user u ON br.user_id = u.id
				WHERE br.company_id = '$cmid'");
		return $query->result();
	}
	public function get_avail_service($brid){
		$query = $this->db->query("SELECT sv.name AS sv_name, av.id AS as_id, av.price AS as_price, 
							av.duration AS as_duration, av.status AS as_status, sv.status AS sv_status
				FROM avail_service av
				INNER JOIN service sv ON av.service_id = sv.id
				WHERE av.branch_id = '$brid'");
		return $query->result();
	}
	public function get_company($brid){	//getting company id in branch table
		$query = $this->db->query("SELECT company_id AS cm_id
				FROM branch 
				WHERE id = '$brid'");
		return $query->result();
	}
	public function get_company_name($cmid){	//ADDED -> 05-08-2018 Lu
		$query = $this->db->query("SELECT name AS cm_company
				FROM company
				WHERE id = '$cmid'");
		return $query->result();
	}
	public function get_customer($rvid){
		$query = $this->db->query("SELECT customer_ AS cs_id
				FROM reservation
				WHERE id = '$rvid'");
		return $query->result();
	}
	public function get_reservation($rvid){
		$query = $this->db->query("SELECT rv.code AS rv_no, rv.date AS rv_date, rv.time AS rv_time, cs.first_name AS cs_fname, cs.last_name AS cs_lname, br.name AS br_name
				FROM reservation rv
				INNER JOIN customer cs ON rv.customer_id = cs.id
				INNER JOIN branch br ON rv.branch_id = br.id
				WHERE rv.id = '$rvid'");
		return $query->result();
	}
	public function get_reservation_service($rvid){
		$query = $this->db->query("SELECT sv.name AS sv_name, av.price AS as_price, av.duration AS as_duration
				FROM reservation_service rs
				INNER JOIN avail_service av ON rs.avail_service_id = av.id
 				INNER JOIN service sv ON av.service_id = sv.id
				WHERE rs.reservation_id = '$rvid'");
		return $query->result();
	}
	
}