<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		if(!isset($_SESSION['id'])){
			redirect('home');
		}
	}
	public function ad_home(){
		$this->load->view('admin/layout/header');
		$data = array(
			'user' => $this->admin_model->user_count(),
			'user_a' => $this->admin_model->user_count_a(),
			'user_i' => $this->admin_model->user_count_i(),
			'logged' => $this->admin_model->user_logged(),
			'branch' => $this->admin_model->branch_count(),
			'branch_a' => $this->admin_model->branch_count_a(),
			'branch_i' => $this->admin_model->branch_count_i(),
			'client' => $this->admin_model->client_count(),
			'client_a' => $this->admin_model->client_count_a(),
			'client_i' => $this->admin_model->client_count_i(),
			'customer' => $this->admin_model->customer_count(),
			'customer_a' => $this->admin_model->customer_count_a(),
			'customer_i' => $this->admin_model->customer_count_i(),
			'reserve' => $this->admin_model->reserve_count(),
			'reserve_a' => $this->admin_model->reserve_count_a(),
			'reserve_c' => $this->admin_model->reserve_count_c()
		);
		$this->load->view('admin/admin_home',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_clients(){
		$this->load->view('admin/layout/header');
		$data['company'] = $this->admin_model->display_company();
		$this->load->view('admin/admin_client',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_branches(){
		$this->load->view('admin/layout/header');
		$data = array(
			'company' => $this->admin_model->display_company(),	//display_company used for getting all company and putting in combo box 	//ADDED -> 05-08-2018 Lu
			'branch' => $this->admin_model->display_branch());
		$this->load->view('admin/admin_branch',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_customers(){
		$this->load->view('admin/layout/header');
		$data['customer'] = $this->admin_model->display_customer();
		$this->load->view('admin/admin_customer',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_reservations(){
		$this->load->view('admin/layout/header');
		$data['reserve'] = $this->admin_model->display_reservation();
		$this->load->view('admin/admin_reservation',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_users(){
		$this->load->view('admin/layout/header');
		$data['user'] = $this->admin_model->display_user();
		$this->load->view('admin/admin_user',$data);
		$this->load->view('admin/layout/footer');
	}
	
	
	//Client Functions
	public function ad_view_client(){
		$this->load->view('admin/layout/header');
		$data = array(
			'company' => $this->admin_model->view_company($_GET['id']),
			'service' => $this->admin_model->get_service($_GET['id']),
			'branch' => $this->admin_model->get_branch($_GET['id']));
		$this->load->view('admin/admin_client_view',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_add_client(){	// ADDED add_client -> 05-08-2018 Lu
		$this->load->model('kikay_model');
		if( $_POST['password'] ==  $_POST['confirmpass']){
			//Convert Time to minutes
		  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
		  	$ot_min = (int)substr($_POST['ot_time'],3,5);
		  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
		  	$ct_min = (int)substr($_POST['ct_time'],3,5);
		  	$ot_con = $ot_hour+$ot_min;
		  	$ct_con = $ct_hour+$ct_min;

		  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
		  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
		  		redirect('admin_clients');
		  	}
			$userdata = array(
					'username' => mysql_real_escape_string($_POST['username']),	//DB ESCAPE THIS
					'password' => mysql_real_escape_string($_POST['password']),	//DB ESCAPE THIS
					'status' => 'A',
					'user_type_id' => 2,
					'created_by' => $_SESSION['user']);
			// print_r($userdata);die();
			$usercheck = $this->kikay_model->user_check($userdata['username']); //checking for same username
			if($usercheck){
				$compcheck = $this->kikay_model->comp_check(mysql_real_escape_string($_POST['company'])); //checking for same company
				if(!empty($_POST['days'])){
					$day_arr = "";	//getting branch open days and saving in database as array
					$day_max = count($_POST['days'])-1;	//max count of array to create format
					foreach($_POST['days'] as $index=>$days){
						if($index==$day_max){
							$day_arr = $day_arr.$days;
						}
						else{
							$day_arr = $day_arr.$days.",";
						}
					}
			  	}
			  	else{
			  		//ADD CHECKBOX ERROR
			  		redirect('admin_clients');
			  	}
				if($compcheck){
					// putting value in user table and company table after checking of same username and company name
					$this->kikay_model->register($userdata); 
					$user_id = $this->db->insert_id(); 				//last inserted user ID
					
					$code = $this->kikay_model->get_code(1);	//client code creation
					$this->kikay_model->update_counter($code[0]->ct_count+1,1);
					
					$company = array(
						'name' => mysql_real_escape_string($_POST['company']),
						'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
						'user_id' => $user_id,
						'created_by' => mysql_real_escape_string($_SESSION['user']));
					$this->kikay_model->client_register($company); 
					$comp_id = $this->db->insert_id();				//last inserted company 

					$code = $this->kikay_model->get_code(2);	//branch code creation
					$this->kikay_model->update_counter($code[0]->ct_count+1,2);
					
					$brdata = array(
						'user_id' => $user_id,
						'code'=> $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
						'name' => mysql_real_escape_string($_POST['company'])." - main",
						'image' => 'default.png',
						'location' => mysql_real_escape_string($_POST['address']),
						'mobile' => $_POST['mobile'],
						'slots' => 0,
						'telephone' => $_POST['telephone'],
						'open_days' => $day_arr,
						'open_time' => $_POST['ot_time'],
						'close_time' => $_POST['ct_time'],
						'company_id' => $comp_id);
					$this->kikay_model->branch_register($brdata);
					redirect('admin_clients');
				}
				else{
					//COMPANY ALREADY EXISTS
				}
			}
			else{
				//USERNAME ALREADY EXISTS
			}
		}
		else{
			//PASSWORD DOES NOT MATCH
		}
		redirect('admin_clients');
	}
	public function ad_update_client_view(){		//ADDED -> 05-08-2018 Lu
		$data['company'] = $this->admin_model->view_company($_GET['id']);
		$this->load->view('admin/admin_client_update',$data);
	}
	public function ad_update_client(){				//ADDED -> 05-08-2018 Lu
		$this->load->model('client_model');
		$compdata = array(
				'id' => $_GET['id'],
				'name' => $_POST['company'],
				'description' => $_POST['description'],
				'updated_date' => date('Y-m-d H:i:s', time()),
				'updated_by' => $_SESSION['user']);
		if($this->client_model->comp_check($compdata)){
			$past_comp = $this->admin_model->get_company_name($compdata['id']);		//getting past company name before updating(for changing brand name)
			$this->admin_model->update_client($compdata);
			
			$branches = $this->client_model->get_all_branch($compdata['id']);	//changing of all branch prefix
			foreach($branches as $br){
				$this->client_model->update_branch_name($br,$past_comp[0]->cm_company, $compdata['name']);
			}
		}
		else{
			
		}
		redirect('admin_clients');
	}
	public function ad_delete_client(){
		//$this->admin_model->delete_company($_GET['id']);
		$bran = $this->admin_model->get_branch($_GET['id']); //this function deletes all branches including the deleting of company
		foreach($bran as $br){
				$this->admin_model->delete_all_branches($br->br_id);
		}
		redirect('admin_clients');
	}
	public function ad_activate_client(){
		$this->admin_model->activate_company($_GET['id']);
		redirect('admin_clients');
	}
	public function ad_view_cbranch(){
		$this->load->view('admin/layout/header');
		$data = array(
			'branch' => $this->admin_model->view_branch($_GET['id']),
			'avail' => $this->admin_model->get_avail_service($_GET['id']));
		$this->load->view('admin/admin_cbranch_view',$data);
		$this->load->view('admin/layout/footer');
	}
	
	//Branch Functions
	public function ad_view_branch(){
		$this->load->view('admin/layout/header');
		$data = array(
			'branch' => $this->admin_model->view_branch($_GET['id']),
			'avail' => $this->admin_model->get_avail_service($_GET['id']));
		$this->load->view('admin/admin_branch_view',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_add_branch(){		//ADDED -> 05-08-2018 Lu
		$this->load->model('kikay_model');
		$this->load->model('client_model');
		if( $_POST['password'] ==  $_POST['confirmpass']){
			//Convert Time to minutes
		  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
		  	$ot_min = (int)substr($_POST['ot_time'],3,5);
		  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
		  	$ct_min = (int)substr($_POST['ct_time'],3,5);
		  	$ot_con = $ot_hour+$ot_min;
		  	$ct_con = $ct_hour+$ct_min;

		  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
		  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
		  		redirect('admin_branches');
		  	}
			$userdata = array(
						'username' => $_POST['username'],
						'password' => $_POST['password'],
						'status' => 'A',
						'user_type_id' => 3,
						'created_by' => $_SESSION['user']);

			if(!empty($_POST['days'])){
				$day_arr = "";	//getting branch open days and saving in database as array
				$day_max = count($_POST['days'])-1;	//max count of array to create format
				foreach($_POST['days'] as $index=>$days){
					if($index==$day_max){
						$day_arr = $day_arr.$days;
					}
					else{
						$day_arr = $day_arr.$days.",";
					}
				}
		  	}
		  	else{
		  		//ADD CHECKBOX ERROR
		  		redirect('admin_branches');
		  	}

			$usercheck = $this->kikay_model->user_check($userdata['username']);
			$brancheck = $this->client_model->bran_check($_POST['branch_pre'].$_POST['branch_ex']);

			if($usercheck){
				if($brancheck){
					$this->kikay_model->register($userdata); //adding(registration) of user
					$user_id = $this->db->insert_id(); 				//last inserted user ID

					$code = $this->kikay_model->get_code(2);	//branch code creation -> Created 05-08-2018 Lu
					$this->kikay_model->update_counter($code[0]->ct_count+1,2);
					
					$usertable = $this->kikay_model->get_usertable($user_id);
					$comp_name = $this->admin_model->get_company_name($_POST['company']);
					$brdata = array(
							'user_id' => $usertable[0]->u_id,
							'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
							'name' => $_POST['branch_pre'].$_POST['branch_ex'],
							'location' =>$_POST['location'],
							'image' => 'default.png',
							'mobile' => $_POST['mobile'],
							'slots' => 0,
							'telephone' => $_POST['telephone'],
							'open_days' => $day_arr,
							'open_time' => $_POST['ot_time'],
							'close_time' => $_POST['ct_time'],
							'company_id' => $_POST['company'],
							'created_by' => $_SESSION['user']);
					$this->client_model->add_branch($brdata);

					$br_id = $this->db->insert_id();		//last inserted branch ID
					
					$services = $this->client_model->get_all_service($_POST['company']);		
					foreach($services as $sv){
						$asdata = array(
							'branch_id' => $br_id,
							'service_id' => $sv->sv_id,
							'status' => 'I');
							$this->client_model->add_branch_service($asdata);
					}
				}
				else{
					//BRANCH NAME ALREADY EXIST
				}
			}
			else{
				//USERNAME ALREADY EXIST
			}
		}
		else{
				//PASSWORD DOES NOT MATCH
		}
		redirect('admin_branches');
	}
	public function ad_update_branch_view(){
		$this->load->model('client_model');
		$data['branch'] = $this->client_model->view_branch($_GET['id']);
		$data['company'] = $this->client_model->get_company_name($data['branch'][0]->cm_id);
		$this->load->view('admin/admin_branch_update', $data);
	}
	public function ad_update_branch(){
		$this->load->model('client_model');
		$config['upload_path']          = './assets/images/branch-images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 204800;
        $config['max_width']            = 1980;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

		// $filename = $_FILES['image']['name'];	//getting file name for renaming
		$image = $this->client_model->get_branch_image($_GET['id'])[0]->br_image;	//get past image name in database
        if ($this->upload->do_upload('image')){		//if uploaded
        	$filedata = $this->upload->data();	
	        $filename = $filedata['file_name'];
	        $filepath = $filedata['file_path'];
           	if($image != "default.png"){
    			unlink($filepath."/".$image);	//delete past image
    		}
        }
        else{	//if nothing is uploaded
        	$filename = $image;
        }

        if(!empty($_POST['days'])){
			$day_arr = "";	//getting branch open days and saving in database as array
			$day_max = count($_POST['days'])-1;	//max count of array to create format
			foreach($_POST['days'] as $index=>$days){
				if($index==$day_max){
					$day_arr = $day_arr.$days;
				}
				else{
					$day_arr = $day_arr.$days.",";
				}
			}
	  	}
	  	else{
	  		//ADD CHECKBOX ERROR
	  		redirect('admin_branches');
	  	}

	  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
	  	$ot_min = (int)substr($_POST['ot_time'],3,5);
	  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
	  	$ct_min = (int)substr($_POST['ct_time'],3,5);
	  	$ot_con = $ot_hour+$ot_min;
	  	$ct_con = $ct_hour+$ct_min;

	  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
	  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
	  		redirect('admin_branches');
	  	}

		$brdata = array(
							'id' => $_GET['id'],
							'name' => $_POST['branch_pre'].$_POST['branch_ex'],
							'image' => $filename,
							'location' => $_POST['location'],
							'mobile' => $_POST['mobile'],
							'telephone' => $_POST['telephone'],
							'open_days' => $day_arr,
							'open_time' => $_POST['ot_time'],
							'close_time' => $_POST['ct_time'],
							'slots' => $_POST['slots'],
							'updated_date' => date('Y-m-d H:i:s', time()),
							'updated_by' => $_SESSION['user']);
		$brancheck = $this->client_model->update_bran_check($brdata);
		if($brancheck){
			$this->client_model->update_branch($brdata);
		}
		else{
			//BRANCH NAME ALREADY EXIST
		}
		redirect('admin_branches');
	}
	public function ad_delete_branch(){
		$this->load->model('client_model');
		$this->client_model->delete_branch($_GET['id']);
		redirect('admin_branches');
	}
	public function ad_activate_branch(){
		$this->load->model('client_model');
		$this->client_model->activate_branch($_GET['id']);
		redirect('admin_branches');
	}
	
	//Customer Functions
	public function ad_view_customer(){
		$this->load->view('admin/layout/header');
		$this->load->model('customer_model');
		$data = array(
				'customer' => $this->admin_model->view_customer($_GET['id']),
				'reserve' => $this->customer_model->display_reservation($_GET['id']));
		$this->load->view('admin/admin_customer_view',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_add_customer(){
		$this->load->model('kikay_model');
		if( $_POST['password'] ==  $_POST['confirmpass']){
			$userdata = array(
						'username' => $_POST['username'],
						'password' => $_POST['password'],
						'status' => 'A',
						'user_type_id' => 4,
						'created_by' => $_SESSION['user']);
			
			$usercheck = $this->kikay_model->user_check($userdata['username']);
			if($usercheck){
				$this->kikay_model->register($userdata); 
				$user_id = $this->db->insert_id(); 				//last inserted user ID
				
				$code = $this->kikay_model->get_code(3);	//customer code creation -> Created 05-08-2018 Lu
				$this->kikay_model->update_counter($code[0]->ct_count+1,3);
				
				$customdata = array(
					'user_id' => $user_id, 
					'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
					'first_name' => $_POST['firstname'],
					'last_name' => $_POST['lastname'],
					'address' => $_POST['address'],
					'contact' => $_POST['contact'],
					'gender' => $_POST['gender'],
					'created_by' => $_SESSION['user']);
				$this->kikay_model->customer_register($customdata);
			}
			else{
				//USERNAME ALREADY EXIST
			}
		}
		else{
			//PASSWORD DOES NOT MATCH

		}
		redirect('admin_customers');
	}
	public function ad_update_customer_view(){
		$data['customer'] = $this->admin_model->view_customer($_GET['id']);
		$this->load->view('admin/admin_customer_update', $data);
	}
	public function ad_update_customer(){
		$csdata = array(
						'id' => $_GET['id'],
						'first_name' => $_POST['firstname'],
						'last_name' => $_POST['lastname'],
						'contact' => $_POST['contact'],
						'address' => $_POST['address'],
						'updated_date' => date('Y-m-d H:i:s', time()),
						'updated_by' => $_SESSION['user']);
		$this->admin_model->update_customer($csdata);
		redirect('admin_customers');
	}
	public function ad_update_user_view(){
		$data['user'] = $this->admin_model->get_user($_GET['id']);
		$this->load->view('admin/admin_user_update', $data);
	}
	public function ad_update_user(){
		$userdata = array(
						'id' => $_GET['id'],
						'username' => $_POST['username']);
		$this->admin_model->update_user($userdata);
		redirect('admin_users');
	}
	public function ad_delete_customer(){
		$this->admin_model->delete_customer($_GET['id']);
		redirect('admin_customers');
	}
	public function ad_activate_customer(){
		$this->admin_model->activate_customer($_GET['id']);
		redirect('admin_customers');
	}
	public function ad_delete_creservation(){
		$this->admin_model->delete_reservation($_GET['id']);
		$custom = $this->admin_model->get_customer($_GET['id']);
		redirect('admin_view_customer'.'?id='.$custom[0]->cs_id);
	}
	public function ad_activate_creservation(){
		$this->admin_model->activate_reservation($_GET['id']);
		$custom = $this->admin_model->get_customer($_GET['id']);
		redirect('admin_view_customer'.'?id='.$custom[0]->cs_id);
	}
	
	//Reservation Functions
	public function ad_view_reservation(){
		$this->load->view('admin/layout/header');
		$this->load->model('customer_model');
		$data = array(
				'reserve' => $this->admin_model->get_reservation($_GET['id']),
				'rservice' => $this->admin_model->get_reservation_service($_GET['id']));
		$this->load->view('admin/admin_reservation_view',$data);
		$this->load->view('admin/layout/footer');
	}
	public function ad_delete_reservation(){
		$this->admin_model->delete_reservation($_GET['id']);
		redirect('admin_reservations');
	}
	
	//Users Functions
	// public function ad_delete_reservation(){		//deleting client will also delete branches, deleting branches will also delete reservations
		// $this->admin_model->delete_reservation($_GET['id']);
		// redirect('admin_reservations');
	// }
	// public function ad_activate_reservation(){
		// $this->admin_model->activate_reservation($_GET['id']);
		// redirect('admin_reservations');
	// }


	//AJAX CONTROLLERS
	public function ajax_get_company(){
		$data['company'] = $this->admin_model->view_company($_GET['cm_id']);
		echo json_encode($data);
	}
	public function ajax_get_branch(){
		$data['branch'] = $this->admin_model->view_branch($_GET['br_id']);
		echo json_encode($data);
	}
	public function ajax_get_customer(){
		$data['customer'] = $this->admin_model->view_customer($_GET['cs_id']);
		echo json_encode($data);
	}
	public function ajax_get_user(){
		$this->load->model('kikay_model');
		$data['user'] = $this->kikay_model->get_usertable($_GET['id']);
		echo json_encode($data);
	}
}
