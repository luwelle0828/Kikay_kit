<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class client_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('client_model');
		if(!isset($_SESSION['id'])){
			redirect('home');
		}
	}
	
	//VIEW OF RECORDS
	public function cl_home(){
		$this->load->view('client/layout/header');
		$data['info'] = $this->client_model->display_info($_SESSION['id']);
		$data['count'] = $this->client_model->get_branch_count($_SESSION['cm_id']);
		// print_r($data['info']);die();
		$this->load->view('client/client_home',$data);
		$this->load->view('client/layout/footer');
	}
	public function cl_reservations(){
		$this->load->view('client/layout/header');
		$data['reserve'] = $this->client_model->display_reservation($_SESSION['cm_id']);
		$this->load->view('client/client_reservation',$data);
		$this->load->view('client/layout/footer');
	}
	public function cl_branches(){
		$this->load->view('client/layout/header');
		$data['branch'] = $this->client_model->display_branch($_SESSION['cm_id']);
		$data['company'] = $this->client_model->get_company_name($_SESSION['cm_id']);
		$this->load->view('client/client_branch',$data);
		$this->load->view('client/layout/footer');
	}
	public function cl_services(){
		$this->load->view('client/layout/header');
		$data = array(
			'service'=> $this->client_model->display_all_services($_SESSION['cm_id']),
			'category' => $this->client_model->get_category($_SESSION['cm_id']));
		$this->load->view('client/client_services',$data);
		$this->load->view('client/layout/footer');
	}
	
	//CLIENT INFO TAB FUNCTIONS
	public function cl_info_edit_view(){ //change this form to modal
		$data['info'] = $this->client_model->display_info($_SESSION['id']);
		$this->load->view('client/client_info_update',$data);
	}
	public function cl_info_edit(){
			//Convert Time to minutes
		  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
		  	$ot_min = (int)substr($_POST['ot_time'],3,5);
		  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
		  	$ct_min = (int)substr($_POST['ct_time'],3,5);
		  	$ot_con = $ot_hour+$ot_min;
		  	$ct_con = $ct_hour+$ct_min;

		  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
		  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
		  		redirect('client_home');
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
		  		redirect('client_home');
		  	}

			$compdata = array(
					'u_id' => $_SESSION['id'],
					'id' => $_GET['id'],
					'name' => $_POST['company'],//$_POST['company']),
					'description' => $_POST['description'],
					'cm_id' => $_SESSION['cm_id'],
					'updated_date' => date('Y-m-d H:i:s', time()),
					'updated_by' => $_SESSION['user']);//$_POST['description']));
			$brdata = array(
					'location' => $_POST['location'],
					'mobile' => $_POST['mobile'],
					'telephone' => $_POST['telephone'],
					'open_days' => $day_arr,
					'open_time' => $_POST['ot_time'],
					'close_time' => $_POST['ct_time'],
					'slots' => $_POST['slots'],
					'updated_date' => date('Y-m-d H:i:s', time()),
					'updated_by' => $_SESSION['user']);
			$this->load->model('kikay_model');

			$compcheck = $this->client_model->comp_check($compdata);
			if($compcheck){
				$past_comp = $this->kikay_model->get_company($compdata['u_id']);
				$this->client_model->update_client_info($compdata,$brdata);	
				$this->cl_branch_change($past_comp, $compdata);
			}
			else{

				//COMPANY ALREADY EXIST
			}
			redirect('client_home');
	}
	public function cl_branch_change($past_comp, $comp){
		$branches = $this->client_model->get_all_branch($comp['cm_id']);
		foreach($branches as $br){
			$this->client_model->update_branch_name($br,$past_comp[0]->cm_company, $comp['name']);
		}
	}
	
	//RESERVATION TAB FUNCTIONS
	public function cl_view_reservation(){
		$this->load->view('client/layout/header');
		$data['reserve'] = $this->client_model->view_reservation($_GET['id']);
		$data['service'] = $this->client_model->get_reservation_service($_GET['id']);
		$this->load->view('client/client_reservation_view', $data);
		$this->load->view('client/layout/footer');
	}
	public function cl_search_reservation(){
		if($this->input->post('search')){
			$data['reserve'] = $this->client_model->search_reservation($_SESSION['cm_id'],$_POST['search_name']);
			$this->load->view('client/client_reservation',$data);
		}
		elseif($this->input->post('reset')){
			redirect('client_reservations');
		}
	}
	
	//BRANCH TAB FUNCTIONS
	public function cl_view_branch(){
		$this->load->view('client/layout/header');
		$data['branch'] = $this->client_model->view_branch($_GET['id']);
		$data['service'] = $this->client_model->get_avail_service($_GET['id']);
		$this->load->view('client/client_branch_view', $data);
		$this->load->view('client/layout/footer');
	}
	public function cl_search_branch(){
		if($this->input->post('search')){
			$data['branch'] = $this->client_model->search_branch($_SESSION['cm_id'],$_POST['search_name']);
			$this->load->view('client/client_branch',$data);
		}
		elseif($this->input->post('reset')){
			redirect('client_branches');
		}
	}
	public function cl_add_branch(){
		if( $_POST['password'] ==  $_POST['confirmpass']){
			$userdata = array(
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'status' => 'A',
					'user_type_id' => '3',
					'created_by' => $_SESSION['user']
				);

			//Convert Time to minutes
		  	if($_POST['ot_time']>=$_POST['ct_time']){	//Checking of opening time and closing time of branch
		  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
		  		redirect('client_branches');
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
		  		redirect('client_branches');
		  	}


			$this->load->model('kikay_model');
			$usercheck = $this->kikay_model->user_check($userdata['username']);
			$brancheck = $this->client_model->bran_check($_POST['branch_pre'].$_POST['branch_ex']); //checking for same company
			if($usercheck){
				if($brancheck){
					$this->kikay_model->register($userdata); //adding(registration) of user
					$user_id = $this->db->insert_id(); 				//last inserted user ID
					
					$code = $this->kikay_model->get_code(2);	//branch code creation -> Created 05-08-2018 Lu
					$this->kikay_model->update_counter($code[0]->ct_count+1,2);
						
					$usertable = $this->kikay_model->get_usertable($user_id);
					$brdata = array(
							'user_id' => $usertable[0]->u_id,
							'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
							'name' => $_POST['branch_pre'].$_POST['branch_ex'],
							'image' => 'default.png',
							'location' => $_POST['location'],
							'mobile' => $_POST['mobile'],
							'telephone' => $_POST['telephone'],
							'open_days' => $day_arr,
							'open_time' => $_POST['ot_time'],
							'slots' => 0,
							'close_time' => $_POST['ct_time'],
							'company_id' => $_SESSION['cm_id'],
							'created_by' => $_SESSION['user']);

					$this->client_model->add_branch($brdata);
					$br_id = $this->db->insert_id();		//last inserted branch ID
					$this->cl_avail_service($_SESSION['cm_id'], $br_id);
				}
				else{
					// BRANCH ALREADY EXIST
				}
			}
			else{
				// USERNAME ALREADY EXIST
			}
		}
		else{
				//PASSWORD DOES NOT MATCH
		}
		redirect('client_branches');
	}
	public function cl_avail_service($cmid, $brid){ //adds branch including available services within company
		$services = $this->client_model->get_all_service($cmid);
		foreach($services as $sv){
			$asdata = array(
					'branch_id' => $brid,
					'service_id' => $sv->sv_id,
					'status' => 'I');
					$this->client_model->add_branch_service($asdata);
		}
		redirect('client_branches');
	}
	public function cl_activate_branch(){
		$this->client_model->activate_branch($_GET['id']);
		redirect('client_branches');
	}
	public function cl_delete_branch(){
		$this->client_model->delete_branch($_GET['id']);
		
		$reservations = $this->client_model->get_all_reservation($_GET['id']);
		foreach($reservations as $rv){
			$this->client_model->delete_all_reservation($rv->rv_id);
		}
		redirect('client_branches');
	}
	public function cl_update_branch_view(){
		$data['branch'] = $this->client_model->view_branch($_GET['id']);
		$data['company'] = $this->client_model->get_company_name($data['branch'][0]->cm_id);
		$this->load->view('client/client_branch_update', $data);
	}
	public function cl_update_branch(){
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
        //Convert Time to minutes
	  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
	  	$ot_min = (int)substr($_POST['ot_time'],3,5);
	  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
	  	$ct_min = (int)substr($_POST['ct_time'],3,5);
	  	$ot_con = $ot_hour+$ot_min;
	  	$ct_con = $ct_hour+$ct_min;

	  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
	  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
	  		redirect('client_branches');
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
	  		redirect('client_branches');
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
							'slots' => $_POST['slots'],
							'close_time' => $_POST['ct_time'],
							'updated_date' => date('Y-m-d H:i:s', time()),
							'updated_by' => $_SESSION['user']);
		$brancheck = $this->client_model->update_bran_check($brdata);
		if($brancheck){
			$this->client_model->update_branch($brdata);
		}
		else{
			//BRANCH ALREADY EXISTS
		}
		redirect('client_branches');
	
	}
	
	//CATEGORY FUNCTIONS
	public function cl_add_category(){
		$category_data= array(
				'type' => $_POST['category'],
				'status' => 'A',
				'company_id' => $_SESSION['cm_id']);
		if($this->client_model->category_check($category_data)){
			$this->client_model->add_category($category_data);
		}
		else{
			//SAME CATEGORY NAME ERROR
		}
		redirect('client_services');
	}
	public function cl_update_category(){
		$category_data= array(
				'id' => $_GET['id'],
				'type' => $_POST['category'],
				'cm_id' => $_SESSION['cm_id']);
		if($this->client_model->update_category_check($category_data)){
			$this->client_model->update_category($category_data);
		}
		else{
			//SAME CATEGORY NAME ERROR
		}
		redirect('client_services');
	}
	public function cl_delete_category(){
		$this->client_model->delete_category($_GET['id']);
		redirect('client_services');
	}
	public function cl_activate_category(){
		$this->client_model->activate_category($_GET['id']);
		redirect('client_services');
	}

	//SERVICE TAB FUNCTIONS
	public function cl_search_service(){
		if($this->input->post('search')){
			$data['service'] = $this->client_model->search_service($_SESSION['cm_id'],$_POST['search_name']);
			$this->load->view('client/client_services',$data);
		}
		elseif($this->input->post('reset')){
			redirect('client_services');
		}
	}
	public function cl_add_service(){
		$config['upload_path']          = './assets/images/service-images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 204800;
        $config['max_width']            = 1980;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

		// $filename = $_FILES['image']['name'];	//getting file name for renaming
        // $filename = $_FILES['image']['name'];	//getting file name for renaming
		$image = $this->client_model->get_service_image($_GET['id'])[0]->sv_image;	//get past image name in database
        if ($this->upload->do_upload('image')){		//if uploaded
        	$filedata = $this->upload->data();	
	        $filename = $filedata['file_name'];
	        $filepath = $filedata['file_path'];
           	if($image != "default.png"){
    			unlink($filepath."/".$image);	//delete past image
    		}
        }
        else{	//if nothing is uploaded
        	$filename = 'default.png';
        }
		$svdata = array(
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'duration' => $_POST['duration'],
				'image' => $filename,
				'status' => 'A',
				'company_id' => $_SESSION['cm_id'],
				'created_by' => $_SESSION['user'],
				'category_id' => $_POST['category']);
		if($this->client_model->service_check($_POST['name'], $_SESSION['cm_id'])){
			$this->client_model->add_service($svdata);
			$service_id = $this->db->insert_id(); 				//last inserted user ID
			$this->cl_add_branch_service($_SESSION['cm_id'], $service_id);
		}
		else{
			//SAME SERVICE NAME ERROR
		}
		redirect('client_services');
	}
	public function cl_add_branch_service($cmid, $svid){ //adding service will add available service to all branches within the company
		$branches = $this->client_model->get_all_branch($cmid);
		$service = $this->client_model->get_service($svid);
		foreach($branches as $index=>$br){
			if($index == 0){
				$asdata = array(
						'price' => $service[0]->sv_price,
						'duration' => $service[0]->sv_estimated,
						'branch_id' => $br->br_id,
						'service_id' => $svid,
						'status' => 'A');
			}
			else{
				$asdata = array(
						'branch_id' => $br->br_id,
						'service_id' => $svid,
						'status' => 'I');
			}
			$this->client_model->add_branch_service($asdata);
		}
	}

	public function cl_delete_service(){
		$this->client_model->delete_service($_GET['id']);
		redirect('client_services');
	}
	public function cl_activate_service(){
		$this->client_model->activate_service($_GET['id']);
		redirect('client_services');
	}
	public function cl_update_service_view(){ //change this form to modal
		$data['service'] = $this->client_model->get_service($_GET['id']);
		$this->load->view('client/client_service_update',$data);
	}
	public function cl_update_service(){
		$config['upload_path']          = './assets/images/service-images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 204800;
        $config['max_width']            = 1980;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

		// $filename = $_FILES['image']['name'];	//getting file name for renaming
        $image = $this->client_model->get_service_image($_GET['id'])[0]->sv_image;	//get past image name in database
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

		$svdata = array(
				'id' => $_GET['id'],
				'name' => $_POST['service'],
				'category_id' => $_POST['category'],
				'image' => $filename,
				'price' => $_POST['price'],
				'duration' => $_POST['duration'],
				'updated_date' => date('Y-m-d H:i:s', time()),
				'updated_by' => $_SESSION['user']);
		$this->client_model->update_service($svdata);
		redirect('client_services');
	}
	public function branch_upload(){	
        $config['upload_path']          = './assets/images/branch-images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 204800;
        $config['max_width']            = 1980;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

		// $filename = $_FILES['image']['name'];	//getting file name for renaming
        if ( ! $this->upload->do_upload('image'))
        {
               echo "<script>alert('Image')</script>";
        }
        else
        {
               echo "<script>alert('Good')</script>";
        }
        $filedata = $this->upload->data();	
        $filename = $filedata['file_name'];
        $filepath = $filedata['file_path']; 
        $image = $this->client_model->get_branch_image($_SESSION['br_id'])[0]->br_image;	//get past image name
        
        if($image != "default.png"){
        	unlink($filepath."/".$image);	//delete past image
        }
        $this->client_model->update_branch_image($_SESSION['br_id'], $filename);
        if(isset($_SESSION['cm_id']))
        	redirect('client_home');
        else
        	redirect('branch_home');
    }

    //AJAX CONTROLLERS
    public function ajax_get_info(){
    	$data['info'] = $this->client_model->display_info($_SESSION['id']);
		echo json_encode($data);
    }
    public function ajax_get_branch(){
    	$data['branch'] = $this->client_model->view_branch($_GET['br_id']);
		echo json_encode($data);
    }
    public function ajax_get_service(){
    	$data['service'] = $this->client_model->get_service($_GET['sv_id']);
		echo json_encode($data);
    }
    public function ajax_company_name(){
    	$data = $this->client_model->view_branch($_SESSION['br_id']);
		echo json_encode($data);
    }
    public function ajax_get_category(){
    	$data['category'] = $this->client_model->get_update_category($_GET['ct_id']);
		echo json_encode($data);
    }
}
