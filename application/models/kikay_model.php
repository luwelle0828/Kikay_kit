<?php
class kikay_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}
	public function login_check($user, $pass){ //changed
		$user = str_replace("'", "’", $user);
		$pass = str_replace("'", "’", $pass);
		$query = $this->db->query("SELECT id AS u_id, username AS u_user, password AS u_pass, user_type_id AS ut_id
					FROM user
					WHERE username = '$user' AND password
					= '$pass'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
					
	}
	public function register($user){
		$this->db->insert("user", $user);
	}
	public function client_register($comp){ //add company
		$this->db->insert("company",$comp);
	}
	public function branch_register($bran){
		$this->db->insert("branch", $bran);
	}
	public function customer_register($custom){
		$this->db->insert("customer", $custom);
	}
	public function logged_in($id){
		$this->db->query("UPDATE user
					SET logged_in = '1' 
					WHERE id = '$id'");
	}
	public function logged_out($id){
		$this->db->query("UPDATE user
					SET logged_in = '0' 
					WHERE id = '$id'");
	}
	public function user_check($user){ //checking for same username
		$query = $this->db->query("SELECT id AS u_id
					FROM user
					WHERE username = '$user'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function comp_check($comp){ //checking for same company
		$query = $this->db->query("SELECT id AS cm_id
					FROM company
					WHERE name = '$comp'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function change_password($id, $newpass){
		$this->db->query("UPDATE user
					SET password = '$newpass' 
					WHERE id = '$id'");
	}
	public function update_counter($val,$id){
		$this->db->query("UPDATE counter
					SET count = '$val' 
					WHERE id = '$id'");
	}
	public function get_company($id){
		$query = $this->db->query("SELECT id AS cm_id, name as cm_company, description AS cm_description
					FROM company
					WHERE user_id = '$id'");
		return $query->result();
	}
	public function get_branch($id){
		$query = $this->db->query("SELECT id AS br_id
					FROM branch
					WHERE user_id = '$id'");
		return $query->result();
	}
	public function get_customer($id){
		$query = $this->db->query("SELECT id AS cs_id
					FROM customer
					WHERE user_id = '$id'");
		return $query->result();
	}
	// public function get_usertable($user){ //by username
		// $query = $this->db->query("SELECT u_id
					// FROM user
					// WHERE u_user= '$user'");
		// if($query->num_rows()>0){
			// return $query->result();
		// }
		// else{
			// return NULL;
		// }
	// }
	public function get_usertable($id){ //by ID
		$query = $this->db->query("SELECT id AS u_id, username AS u_user, password AS u_pass, user_type_id AS ut_id
					FROM user
					WHERE id= '$id'");
		return $query->result();
	}
	
	public function get_code($id){
		$query = $this->db->query("SELECT code AS ct_code, count as ct_count
					FROM counter
					WHERE id= '$id'");
		return $query->result();
	}
	// public function get_comptable($comp){
		// $query = $this->db->query("SELECT id AS cm_id
					// FROM company
					// WHERE company_name = '$comp'");
		// return $query->result();
	// }
	
	
}