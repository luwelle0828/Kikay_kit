<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kikay_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('kikay_model');
		header("Cache-Control: no cache");
		session_cache_limiter("private_no_expire");
	}
	public function index(){
		$this->load->view('kikay_home');
	}
	public function register_view(){
		$this->load->view('kikay_register');
	}
	public function register(){
		if( $_POST['password'] ==  $_POST['confirmpass']){
			$userdata = array(
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'status' => 'A',
				'user_type_id' => $_GET['id']);
			$usercheck = $this->kikay_model->user_check($userdata['username']); //checking for same username
			
			if($usercheck){
				switch($userdata['user_type_id']){
					case "2":
						$compcheck = $this->kikay_model->comp_check($_POST['company']); //checking for same company

						//If no days are checked
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
					  		redirect('register_form');
					  	}

					  	if($_POST['ot_time']>=$_POST['ct_time']){	//Checking of opening time and closing time of branch
					  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
					  		redirect('register_form');
					  	}
						if($compcheck){
							// putting value in user table and company table after checking of same username and company name
							$this->kikay_model->register($userdata); 
							$user_id = $this->db->insert_id(); 				//last inserted user ID
							
							$code = $this->kikay_model->get_code(1);	//client code creation -> Created 05-08-2018 Lu
							$this->kikay_model->update_counter($code[0]->ct_count+1,1);
							
							$company = array(
								'name' => $_POST['company'],
								'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
								'user_id' => $user_id);
							$this->kikay_model->client_register($company); 
							$comp_id = $this->db->insert_id();				//last inserted company 
						}
						else{
							//ADD ERROR MESSAGE HERE
							redirect('register_form');
						}

						$code = $this->kikay_model->get_code(2);	//branch code creation -> Created 05-08-2018 Lu
						$this->kikay_model->update_counter($code[0]->ct_count+1,2);
						
						$brdata = array(
							'user_id' => $user_id,
							'code'=> $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
							'name' => $_POST['company']." - main",
							'location' => $_POST['address'],
							'mobile' => $_POST['mobile'],
							'telephone' => $_POST['telephone'],
							'open_days' => $day_arr,
							'slots' => '0',
							'open_time' => $_POST['ot_time'],
							'close_time' => $_POST['ct_time'],
							'image' => 'default.png',
							'company_id' => $comp_id);
						$this->kikay_model->branch_register($brdata);
						$bran_id = $this->db->insert_id();				//last inserted branch $bran_id
						$_SESSION = array( 'id' => $user_id, 
									'user' => $_POST['username'], 
									'pass' => $_POST['password'],
									'cm_id' => $comp_id,
									'br_id' => $bran_id);
						$this->kikay_model->logged_in($user_id);
						redirect('client_home');
						break;
							
					case "4":
						// putting value in user table and comp table after checking of same user and comp
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
							'gender' => $_POST['gender']);
						$this->kikay_model->customer_register($customdata);
						$customer_id = $this->db->insert_id(); 				//last inserted customer ID
						$_SESSION = array( 'id' => $user_id, 
									'user' => $_POST['username'], 
									'pass' => $_POST['password'],
									'cs_id' => $customer_id);
						$this->kikay_model->logged_in($user_id);
						redirect('customer_home');
						break; 
				}
			}
			else{
				//ADD SAME USERNAME ERROR HERE
				redirect('register_form');
			}
			
		}
		else{
			//PASSWORD NOT MATCH ERROR
		}
	}
	public function login_view(){
		$this->load->view('kikay_login');
	}
	public function login(){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$userdata = $this->kikay_model->login_check($user, $pass); 		//used for account checking and also for retrieving values
		if(isset($userdata)){			//check if user and pass are found
			$_SESSION = array( 'id' => $userdata[0]->u_id, 
			'user' => $userdata[0]->u_user,
			'pass' => $userdata[0]->u_pass,
			'type' => $userdata[0]->ut_id);
			$this->kikay_model->logged_in($_SESSION['id']);
			$this->login_redirect($userdata[0]->ut_id);	

		}
		else{
			//$_SESSION['name'] = $_POST['username']; getting username after error
			$_SESSION['error'] = "Invalid Username or Password"; 
			redirect('login_form');
		}
	}
	public function login_redirect($userType){
		switch($userType){
				case "1":
					redirect('admin_home');
					break;
				case "2":
					$compdata = $this->kikay_model->get_company($_SESSION['id']);
					$brandata = $this->kikay_model->get_branch($_SESSION['id']);
					$_SESSION['cm_id'] = $compdata[0]->cm_id; 
					$_SESSION['br_id'] = $brandata[0]->br_id;
					redirect('client_home');
					break;
				case "3":
					$brandata = $this->kikay_model->get_branch($_SESSION['id']);
					$_SESSION['br_id'] = $brandata[0]->br_id;
					redirect('branch_home');
					break;
				case "4":
					$custdata = $this->kikay_model->get_customer($_SESSION['id']);
					$_SESSION['cs_id'] = $custdata[0]->cs_id;
					redirect('customer_home');
					break;
				
		}
	}
	public function logout(){
		$this->kikay_model->logged_out($_SESSION['id']);
		session_destroy();
		redirect();
	}
	public function change_pass_view(){
		$this->load->view('change_pass');
	}
	public function change_pass(){
		$userdata = $this->kikay_model->get_usertable($_GET['id']);
		if($_POST['current_pass'] == $userdata[0]->u_pass){
			if($_POST['new_pass'] == $_POST['confirm_pass']){
				$this->kikay_model->change_password($userdata[0]->u_id, $_POST['new_pass']);
			}
		}
		switch($userdata[0]->ut_id){
			case "1":
					redirect('admin_home');
					break;
			case "2":
					redirect('client_home');
					break;
			case "3":
					redirect('branch_home');
					break;
			case "4":
					redirect('customer_home');
					break;
		}
	}
}
