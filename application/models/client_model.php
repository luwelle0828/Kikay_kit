 <?php
class client_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function display_info($id){
		$query = $this->db->query("SELECT cm.id AS cm_id, cm.name AS cm_company, cm.description AS cm_desc, br.location AS br_location, 
							br.mobile AS br_mobile, br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.image AS br_image, br.slots AS br_slots
					FROM company cm
					INNER JOIN branch br ON cm.user_id = br.user_id
					WHERE cm.user_id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_reservation($id){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, 
							cs.first_name AS cs_fname, cs.last_name AS cs_lname, rv.date AS rv_date, rv.time AS rv_time, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					INNER JOIN company cm ON br.company_id = cm.id
					WHERE cm.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_branch($id){
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, br.code AS br_no, br.location AS br_location, br.mobile AS br_mobile, 
							br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.image AS br_image, u.id AS u_id, u.status AS u_status, cm.name AS cm_company
					FROM branch br
					INNER JOIN company cm ON br.company_id = cm.id
					INNER JOIN user u ON br.user_id = u.id
					WHERE cm.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function display_all_services($id){
		$query = $this->db->query("SELECT sv.id AS sv_id, sv.name AS sv_name, sv.price AS sv_price, sv.duration AS sv_estimated, sv.status AS sv_status, sv.category_id AS ct_id, ct.type AS ct_category
					FROM service sv
					INNER JOIN company cm ON sv.company_id = cm.id
					INNER JOIN category ct ON sv.category_id = ct.id
					WHERE cm.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function update_client_info($comp,$bran){
		$this->db->query("UPDATE company
				SET name =  '$comp[name]',
					description =  '$comp[description]',
					updated_date = '$comp[updated_date]',
					updated_by = '$comp[updated_by]'
				WHERE user_id = '$comp[u_id]'");
		$this->db->query("UPDATE branch
				SET location =  '$bran[location]',
					mobile =  '$bran[mobile]',
					telephone =  '$bran[telephone]',
					open_days = '$bran[open_days]',
					open_time =  '$bran[open_time]',
					close_time =  '$bran[close_time]',
					slots =  '$bran[slots]',
					updated_date = '$bran[updated_date]',
					updated_by = '$bran[updated_by]'
				WHERE user_id = '$comp[u_id]'");
	}
	public function update_branch_name($bran, $old_comp, $new_comp){
		$new_comp = str_replace($old_comp, $new_comp, $bran->br_name);
		$this->db->query("UPDATE branch
				SET name =  '$new_comp'
				WHERE id = '$bran->br_id'");
	}
	public function update_branch_image($brid, $file){
		$this->db->query("UPDATE branch
					SET image = '$file'
					WHERE id= '$brid'");
	}
	public function view_branch($id){
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, br.location AS br_location,
							br.mobile AS br_mobile, br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.slots AS br_slots, br.company_id AS cm_id, br.image AS br_image, br.company_id AS cm_id, cm.name AS cm_company
					FROM branch br
					INNER JOIN user u ON br.user_id = u.id
					INNER JOIN company cm ON cm.id = br.company_id
					WHERE br.id = '$id'");	
		return $query->result();
	}
	public function add_branch($bran){
		$this->db->insert("branch", $bran);
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
						slots = '$bran[slots]',
						image = '$bran[image]',
						updated_date = '$bran[updated_date]',
						updated_by = '$bran[updated_by]'
						WHERE id = '$bran[id]'"	);
	}
	public function update_branch_info($bran){
		$this->db->query("UPDATE branch
					SET name = '$bran[name]',
						location = '$bran[location]',
						mobile = '$bran[mobile]',
						telephone = '$bran[telephone]',
						open_days = '$bran[open_days]',
						open_time = '$bran[open_time]',
						slots = '$bran[slots]',
						close_time = '$bran[close_time]',
						updated_date = '$bran[updated_date]',
						updated_by = '$bran[updated_by]'
						WHERE id = '$bran[id]'"	);
	}
	public function delete_branch($id){
		$this->db->query("UPDATE branch br
					INNER JOIN user u ON br.user_id = u.id
					SET u.status = 'I' 
					WHERE br.id = '$id'");
	}
	public function activate_branch($id){
		$this->db->query("UPDATE branch br
					INNER JOIN user u ON br.user_id = u.id
					SET u.status = 'A' 
					WHERE br.id = '$id'");
	}
	public function delete_service($id){
		$this->db->query("UPDATE service
					SET status = 'I' 
					WHERE id = '$id'");
	}
	public function activate_service($id){
		$this->db->query("UPDATE service
					SET status = 'A' 
					WHERE id = '$id'");
	}
	public function delete_all_reservation($id){
		$this->db->query("UPDATE reservation SET status = 'I' WHERE id = '$id'");
	}
	public function search_branch($id, $sname){
		$query = $this->db->query("SELECT br.br_id, br.br_name, br.br_location, br.br_mobile, br.br_telephone, br.br_opening, br.br_closing, u.u_status
					FROM branch br
					INNER JOIN company cm ON br.cm_id = cm.cm_id
					INNER JOIN user u ON br.u_id = u.u_id
					WHERE cm.cm_id = '$id' AND (br.br_name LIKE '%".$sname."%'
					OR br.br_location LIKE '%".$sname."%'
					OR br.br_opening LIKE '%".$sname."%'
					OR br.br_closing LIKE '%".$sname."%')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function add_category($category){
		$this->db->insert("category", $category);
	}
	public function update_category($category){
		$this->db->query("UPDATE category
					SET type = '$category[type]'
					WHERE id = '$category[id]'");
	}
	public function delete_category($id){
		$this->db->query("UPDATE category
					SET status = 'I'
					WHERE id = '$id'");
	}
	public function activate_category($id){
		$this->db->query("UPDATE category
					SET status = 'A'
					WHERE id = '$id'");
	}
	public function add_service($serv){
		$this->db->insert("service", $serv);
	}
	public function update_service($serv){
		$this->db->query("UPDATE service
					SET name = '$serv[name]',
					category_id = '$serv[category_id]',
					price = '$serv[price]',
					image = '$serv[image]',
					duration = '$serv[duration]',
					updated_date = '$serv[updated_date]',
					updated_by = '$serv[updated_by]'
					WHERE id = '$serv[id]'");
	}
	public function search_service($id, $sname){
		$query = $this->db->query("SELECT sv.id AS sv_id, sv.name AS sv_name, sv.price AS sv_price , sv.duration AS sv_estimated, sv.status AS sv_status
					FROM service sv
					INNER JOIN company cm ON sv.company_id = cm.id
					WHERE cm.id = '$id' AND (sv.name LIKE '%".$sname."%'
					OR sv.price LIKE '%".$sname."%')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function view_reservation($id){
		$query = $this->db->query("SELECT rv.code AS rv_no, cs.first_name AS cs_fname, cs.last_name AS cs_lname, 
							br.name as br_name, rv.date AS rv_date, rv.time AS rv_time, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE rv.id = '$id'");	
		return $query->result();
	}
	public function search_reservation($id, $sname){
		$query = $this->db->query("SELECT rv.rv_id, rv.rv_no, br.br_name, cs.cs_fname, cs.cs_lname, rv.rv_date, rv.rv_time, rv.rv_status, rv.rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.cs_id = cs.cs_id
					INNER JOIN branch br ON rv.br_id = br.br_id
					INNER JOIN company cm ON br.cm_id = cm.cm_id
					WHERE cm.cm_id = '$id' AND (rv.rv_no LIKE '%".$sname."%'
					OR br.br_name LIKE '%".$sname."%'
					OR cs.cs_fname LIKE '%".$sname."%'
					OR cs.cs_lname LIKE '%".$sname."%'
					OR rv.rv_date LIKE '%".$sname."%'
					OR rv.rv_time LIKE '%".$sname."%')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	
	public function add_branch_service($br_sv){
		$this->db->insert("avail_service",$br_sv);
	}
	public function service_check($name, $cmid){
		$query = $this->db->query("SELECT id AS sv_id, name AS sv_name, price AS sv_price, duration AS sv_estimated, status AS sv_status
					FROM service
					WHERE name = '$name' AND company_id = '$cmid'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function comp_check($comp){ //checking for same company
		// $comp_name = $comp['company'];
		// $comp_id = $comp['cm_id'];
		$query = $this->db->query("SELECT id AS cm_id
					FROM company
					WHERE name = '$comp[name]' AND  id != '$comp[id]'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function bran_check($bran){ //checking for same company
		$query = $this->db->query("SELECT id AS br_id
					FROM branch
					WHERE name = '$bran'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function update_bran_check($bran){ //checking for same company
		$query = $this->db->query("SELECT id AS br_id
					FROM branch
					WHERE name = '$bran[name]' AND id != '$bran[id]'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function category_check($cat){

		$query = $this->db->query("SELECT id AS ct_id
					FROM category
					WHERE type = '$cat[type]' AND company_id = '$cat[company_id]'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	public function update_category_check($cat){
		$query = $this->db->query("SELECT id AS ct_id
					FROM category
					WHERE type = '$cat[type]' AND company_id = '$cat[company_id]'");
		if($query->num_rows()>0){
			return false;
		}
		else{
			return true;
		}
	}
	//BRANCH EXCLUSIVES-------------------------------------------------------------------------------------------------------------------
	public function br_display_info($id){
		$query = $this->db->query("SELECT br.id AS br_id, br.name AS br_name, br.location AS br_location, br.mobile AS br_mobile, 
							br.telephone AS br_telephone, br.open_days AS br_days, br.open_time AS br_opening, br.close_time AS br_closing, br.slots AS br_slots, br.image AS br_image, cm.name AS cm_company
					FROM branch br
					INNER JOIN user u ON br.user_id = u.id
					INNER JOIN company cm ON br.company_id = cm.id
					WHERE u.id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function br_display_reservation($id){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, cs.first_name AS cs_fname,
							cs.last_name AS cs_lname, rv.date AS rv_date, rv.time AS rv_time, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.id
					INNER JOIN branch br ON rv.branch_id = br.id
					WHERE br.id = $id");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function br_display_service($id){
		$query = $this->db->query("SELECT av.id AS as_id, sv.name AS sv_name ,sv.price AS sv_price, sv.duration AS sv_estimated, av.price AS as_price, 
							av.duration AS as_duration, av.status AS as_status, sv.status AS sv_status
					FROM avail_service av
					INNER JOIN branch br ON av.branch_id = br.id
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE br.id = $id
					ORDER BY sv.status");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function br_search_reservation($id, $sname){
		$query = $this->db->query("SELECT rv.id AS rv_id, rv.code AS rv_no, br.name AS br_name, cs.first_name AS cs_fname, 
							cs.last_name AS cs_lname, rv.date AS rv_date, rv.time AS rv_time, rv.status AS rv_status, rv.created_date AS rv_created_date
					FROM reservation rv
					INNER JOIN customer cs ON rv.customer_id = cs.cs_id
					INNER JOIN branch br ON rv.branch_id = br.br_id
					WHERE br.branch_id = '$id' AND (rv.code LIKE '%".$sname."%'
					OR br.name LIKE '%".$sname."%'
					OR cs.first_name LIKE '%".$sname."%'
					OR cs.last_name LIKE '%".$sname."%'
					OR rv.date LIKE '%".$sname."%'
					OR rv.time LIKE '%".$sname."%')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function br_search_available($id, $sname){
		$query = $this->db->query("SELECT av.id AS as_id, sv.name AS sv_name ,sv.price AS sv_price, sv.duration AS sv_estimated, 
							av.price AS as_price, av.duration AS as_duration, av.status AS as_status, sv.status AS sv_status
					FROM avail_service av
					INNER JOIN branch br ON av.branch_id = br.id
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE br.id = '$id' AND (sv.name LIKE '%".$sname."%'
					OR sv.price LIKE '%".$sname."%'
					OR sv.duration LIKE '%".$sname."%')");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function update_avail_service($avail){
		$this->db->query("UPDATE avail_service
					SET price = '$avail[price]',
					duration = '$avail[duration]'
					WHERE id = '$avail[id]'");
	}
	public function delete_avail_service($id){
		$this->db->query("UPDATE avail_service
					SET status = 'I' 
					WHERE id = '$id'");
	}
	public function activate_avail_service($id){
		$this->db->query("UPDATE avail_service
					SET status = 'A' 
					WHERE id = '$id'");
	}
	public function get_available($id){
		$query = $this->db->query("SELECT av.id AS as_id, av.price AS as_price, av.duration AS as_duration, sv.name AS sv_name, 
							sv.price AS sv_price, sv.duration AS sv_estimated, sv.image AS sv_image
					FROM avail_service av
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE av.id = '$id'");
		return $query->result();
	}
	//ALL GET FUNCTIONS--------------------------------------------------------------------------------------------------------------------
	public function get_branch_count($id){
		$query = $this->db->query("SELECT COUNT(id) as br_count
					FROM branch
					WHERE company_id = '$id'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_branch($id){
		$query = $this->db->query("SELECT id AS br_id
					FROM branch
					WHERE user_id = '$id'");
		return $query->result();
	}
	public function get_service($svid){
		$query = $this->db->query("SELECT id AS sv_id, name AS sv_name, price AS sv_price, duration AS sv_estimated, image AS sv_image, category_id AS ct_id
					FROM service
					WHERE id = '$svid'");
		return $query->result();
	}
	// public function get_added_service($name, $cmid){
		// $query = $this->db->query("SELECT sv_id, sv_name, sv_price
					// FROM service
					// WHERE sv_name = '$name' AND cm_id = '$cmid'");
		// return $query->result();
	// }
	public function get_all_branch($cmid){
		$query = $this->db->query("SELECT id AS br_id, name AS br_name
					FROM branch
					WHERE company_id = '$cmid'");
		return $query->result();
	}
	public function get_all_service($cmid){
		$query = $this->db->query("SELECT id AS sv_id
					FROM service
					WHERE company_id = '$cmid'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
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
	public function get_avail_service($brid){
		$query = $this->db->query("SELECT av.id AS as_id, sv.name AS sv_name, av.price AS as_price, av.duration AS as_duration, 
							sv.status AS sv_status, av.status AS as_status, sv.status AS sv_status
					FROM avail_service av
					INNER JOIN service sv ON av.service_id = sv.id
					WHERE av.branch_id = '$brid' AND av.status = 'A'");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}
	public function get_all_reservation($brid){
		$query = $this->db->query("SELECT id AS rv_id
					FROM reservation
					WHERE branch_id = '$brid'");
		return $query->result();
	}
	public function get_company_name($cmid){	//ADDED -> 05-08-2018 Lu
		$query = $this->db->query("SELECT name AS cm_company
				FROM company
				WHERE id = '$cmid'");
		return $query->result();
	}
	public function get_branch_image($brid){
		$query = $this->db->query("SELECT image AS br_image
				FROM branch
				WHERE id = '$brid'");
		return $query->result();
	}
	public function get_service_image($svid){
		$query = $this->db->query("SELECT image AS sv_image
				FROM service
				WHERE id = '$svid'");
		return $query->result();
	}
	public function get_category($cmid){
		$query = $this->db->query("SELECT type AS ct_name, id AS ct_id, status AS ct_status
				FROM category
				WHERE company_id = '$cmid'");
		return $query->result();
	}
	public function get_update_category($ctid){
		$query = $this->db->query("SELECT type AS ct_name, id AS ct_id, status AS ct_status
				FROM category
				WHERE id = '$ctid'");
		return $query->result();
	}
}