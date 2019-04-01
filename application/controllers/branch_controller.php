<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class branch_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('client_model');
		if(!isset($_SESSION['id'])){
			redirect('home');
		}
	}
	public function br_home(){
		$this->load->view('branch/layout/header');
		$data['info'] = $this->client_model->br_display_info($_SESSION['id']);
		$this->load->view('branch/branch_home',$data);
		$this->load->view('branch/layout/footer');
	}
	public function br_reservation(){
		$this->load->view('branch/layout/header');
		$data['reserve'] = $this->client_model->br_display_reservation($_SESSION['br_id']);
		$this->load->view('branch/branch_reservation',$data);
		$this->load->view('branch/layout/footer');
	}
	public function br_service(){
		$this->load->view('branch/layout/header');
		$data['avail'] = $this->client_model->br_display_service($_SESSION['br_id']);
		$this->load->view('branch/branch_service',$data);	
		$this->load->view('branch/layout/footer');
	}
	public function br_pos(){
		$this->load->view('branch/layout/pos_header');
		// $data = $this->client_model->br_display_reservation();
		$this->load->view("branch/branch_pos");
		$this->load->view('branch/layout/pos_footer');
	}
	//BRANCH INFO TAB FUNCTIONS
	public function br_update_info_view(){ //change this form to modal
		$this->load->view('branch/layout/header');
		$data['info'] = $this->client_model->br_display_info($_SESSION['id']);
		$this->load->view('branch/branch_info_update',$data);
		$this->load->view('branch/layout/footer');	
	}
	public function br_update_info(){

		//Convert Time to minutes
	  	$ot_hour = (int)substr($_POST['ot_time'],0,2)*60;
	  	$ot_min = (int)substr($_POST['ot_time'],3,5);
	  	$ct_hour = (int)substr($_POST['ct_time'],0,2)*60;
	  	$ct_min = (int)substr($_POST['ct_time'],3,5);
	  	$ot_con = $ot_hour+$ot_min;
	  	$ct_con = $ct_hour+$ct_min;

	  	if($ot_con>=$ct_con){	//Checking of opening time and closing time of branch
	  		//OPENING TIME MUST BE LESS THAN CLOSING TIME
	  		redirect('branch_home');
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
	  		redirect('branch_home');
	  	}
		$brdata = array(
					'u_id' => $_SESSION['id'],
					'id' => $_GET['id'],
					'name' =>  	$_POST['name_pre'].$_POST['name'],
					'location' => $_POST['location'],
					'mobile' => $_POST['mobile'],
					'telephone' => $_POST['telephone'],
					'open_days' => $day_arr,
					'open_time' => $_POST['ot_time'],
					'close_time' => $_POST['ct_time'],
					'slots' => $_POST['slots'],
					'updated_date' => date('Y-m-d H:i:s', time()),
					'updated_by' => $_SESSION['user']);
		$this->client_model->update_branch_info($brdata);
		redirect('branch_home');
	}
	
	//BRANCH RESERVATION TAB FUNCTIONS
	public function br_view_reservation(){
		$this->load->view('branch/layout/header');
		$data['reserve'] = $this->client_model->view_reservation($_GET['id']);
		$data['service'] = $this->client_model->get_reservation_service($_GET['id']);
		$this->load->view('branch/branch_reservation_view', $data);
		$this->load->view('branch/layout/footer');
	}
	public function br_search_reservation(){
		if($this->input->post('search')){
			$data['reserve'] = $this->client_model->br_search_reservation($_SESSION['br_id'],$_POST['search_name']);
			$this->load->view('branch/branch_reservation',$data);
		}
		elseif($this->input->post('reset')){
			redirect('branch_reservations');
		}
	}
	
	//BRANCH SERVICE TAB FUNCTIONS
	public function br_search_service(){
		if($this->input->post('search')){
			$data['avail'] = $this->client_model->br_search_available($_SESSION['br_id'],$_POST['search_name']);
			$this->load->view('branch/branch_service',$data);
		}
		elseif($this->input->post('reset')){
			redirect('branch_services');
		}
	}
	public function br_update_service_view(){ //change this form to modal
		$data['avail'] = $this->client_model->get_available($_GET['id']);
		$this->load->view('branch/branch_service_update',$data);
	}
	public function br_update_service(){
		$asdata = array(
					'u_id' => $_SESSION['id'],
					'id' => $_GET['id'],
					'price' => $_POST['price'],
					'duration' => $_POST['duration'],
					'updated_date' => date('Y-m-d H:i:s', time()),
					'updated_by' => $_SESSION['user']);
					
		// print_r($_POST);die();
		$this->client_model->update_avail_service($asdata);
		redirect('branch_services');
	}
	public function br_delete_service(){
		$this->client_model->delete_avail_service($_GET['id']);
		redirect('branch_services');
	}
	public function br_activate_service(){
		$this->client_model->activate_avail_service($_GET['id']);
		redirect('branch_services');
	}

//CONTROLLERS FOR AJAX
	public function ajax_get_info(){
    	$data['info'] = $this->client_model->br_display_info($_SESSION['id']);
		echo json_encode($data);
    }
    public function ajax_get_service(){
    	$data['avail'] = $this->client_model->get_available($_GET['as_id']);
		echo json_encode($data);
    }
}
