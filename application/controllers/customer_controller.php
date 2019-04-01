<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->library('pagination');
		header("Cache-Control: no cache");
		session_cache_limiter("private_no_expire");
		if(!isset($_SESSION['id'])){
			redirect('home');
		}
	}
	public function cs_home(){
		$data = array(
				'info' => $this->customer_model->display_info($_SESSION['id']),
				'reserve' => $this->customer_model->display_reservation($_SESSION['cs_id']),
				'top' => $this->customer_model->get_topSalon());
		$this->load->view('customer/customer_home',$data);
	}
	public function cs_reservation(){
		$data['reserve'] = $this->customer_model->display_reservation($_SESSION['cs_id']);
		$this->load->view('customer/customer_reservation',$data);
	}
	
	public function cs_salon_list(){
		$this->load->view('customer/customer_salon_list');
	}
	public function cs_update_info_view(){
		$data['info'] = $this->customer_model->display_info($_SESSION['id']);
		$this->load->view('customer/customer_update_info',$data);
	}
	public function cs_update_info(){
		$customdata = array(
							'id' => $_GET['id'], 
							'first_name' => $_POST['fname'],
							'last_name' => $_POST['lname'],
							'address' => $_POST['address'],
							'contact' => $_POST['contact'],
							'updated_date' => date('Y-m-d H:i:s', time()),
							'updated_by' => $_SESSION['user']);
		$this->customer_model->update_customer_info($customdata);
		redirect('customer_home');
	}
	public function cs_view_reservation(){
		$this->load->model('client_model');
		$data['reserve'] = $this->client_model->view_reservation($_GET['id']);
		$data['service'] = $this->client_model->get_reservation_service($_GET['id']);
		$this->load->view('customer/customer_reservation_view', $data);
	}
	public function cs_salon_view(){
		$data = array(
				'branch' => $this->customer_model->display_branch($_GET['id']),
				'stat' => $this->customer_model->get_stat($_GET['id']),
				'service' => $this->customer_model->get_topServices($_GET['id']),
				'review' => $this->customer_model->get_latestReviews($_GET['id'])
			);
		$this->load->view('customer/customer_salon_view',$data);
	}
	public function cs_salon_service(){
		$data = array(
				'branch' => $this->customer_model->display_branch($_GET['id']),
				'category' => $this->customer_model->get_categories($_GET['id'])
			);
		$this->load->view('customer/customer_salon_service',$data);
	}
	public function cs_salon_review(){
		$data = array(
				'branch' => $this->customer_model->display_branch($_GET['id']),
			);
		$this->load->view('customer/customer_salon_review',$data);
	}
	public function cs_send_review(){
		$rwdata = array(
				'rating' => $_POST['rating'],
				'message' => $_POST['message'],
				'branch_id' => $_GET['id'],
				'customer_id' => $_SESSION['cs_id']);
		$this->customer_model->send_review($rwdata);
		redirect('customer_salon_reviews'.'?id='.$_GET['id']);
	}
	public function cs_reserve_view(){
		$data['category'] = $this->customer_model->get_categories($_GET['id']);
		$data['branch'] = $this->customer_model->display_branch($_GET['id']);
		$this->load->view('customer/customer_reserve',$data);
	}
	public function cs_reserve(){
		// if(isset($_POST['service']){
			$this->load->model('kikay_model');
			$code = $this->kikay_model->get_code(4);	//reservation code creation -> Created 05-08-2018 Lu
			$this->kikay_model->update_counter($code[0]->ct_count+1,4);
			
			$rvdata = array(
					'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
					'date' => $_POST['rv_date'],
					'time' => $_POST['rv_hour'].":".$_POST['rv_min'],
					'status' => 'A',
					'customer_id' => $_SESSION['cs_id'],
					'branch_id' => $_GET['id'],
					'created_by' => $_SESSION['user']);
			$this->customer_model->customer_reserve($rvdata);
			$reserve_id = $this->db->insert_id();
			foreach($_POST['service'] as $value) {
				$rsdata = array(
					'reservation_id' => $reserve_id,
					'avail_service_id' => $value,
					'status' => 'A');
				$this->customer_model->customer_reserve_service($rsdata);
			}
		redirect('customer_reserve_view'.'?id='.$_GET['id']);
	}

	//AJAX ENCODE
	public function cancel_reservation(){
		$this->customer_model->cancel_reservation($_GET['id']);
	}
	public function branch_pagination(){
		$sort = '';
		switch($_GET['sort']){
			case '1': 
				$sort .= 'ORDER BY br_rate DESC';
				break;
			case '2': 
				$sort .= 'ORDER BY br_popularity DESC';
				break;
			case '3': 
				$sort .= 'ORDER BY br_name ASC';
				break;
		}
		$data['salon_count'] = $this->customer_model->get_salon_count($_GET['search']);
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $data['salon_count'];
		$config['per_page'] = $_GET['show']; //sample
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';        
		$config['full_tag_close'] = '</ul>';  
		$config['attributes'] = array('class' => 'page-link');   
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';   
		$config['first_tag_open'] = '<li>';        
		$config['first_tag_close'] = '</li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li class="prev">';        
		$config['prev_tag_close'] = '</li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li>';        
		$config['next_tag_close'] = '</li>';        
		$config['last_tag_open'] = '<li>';        
		$config['last_tag_close'] = '</li>';        
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';        
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';        
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);

        $start = ($page - 1) * $config['per_page'];

        $data['branch'] = $this->customer_model->display_all_branch($config['per_page'], $start, $sort, $_GET['search']);
       	$data['pagination'] = $this->pagination->create_links();
        $html = '';
        $i = 1;
        $rate_color = '';
        if($data['branch'] !=NULL){
	        foreach($data['branch'] AS $salon){
				$day = array("Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
				$day_arr = explode(",",$salon->br_days);
				$day_start = $day[($day_arr[0]-1)];
				$day_end = $day[$day_arr[count($day_arr)-2]];
				$day_closed = array();
				$day_closed2 = '';
				foreach($day AS $index => $val){
					if(!in_array($index+1,$day_arr)){
						array_push($day_closed, $index);
					}
				}
				for($x=0;$x<count($day_closed);$x++){
					if($x != count($day_closed)-1)
						$day_closed2 .= $day[$day_closed[$x]].", ";
					else
						$day_closed2 .= $day[$day_closed[$x]];
				}

				//FOR RATINGS
				if($salon->br_rate>4 && $salon->br_rate<=5){
					$rate_color = '#316300';
				}
				elseif($salon->br_rate>3 && $salon->br_rate<=4){
					$rate_color = '#428500';
				}
				elseif($salon->br_rate>2 && $salon->br_rate<=3){
					$rate_color = '#71a340';
				}
				elseif($salon->br_rate>1 && $salon->br_rate<=2){
					$rate_color = '#f48f00';
				}
				elseif($salon->br_rate>0 && $salon->br_rate<=1){
					$rate_color = '#c94a30';
				}
				else{
					$rate_color = 'gray';
				}
				$html .= '
				<div class="row bg-gray shadow hideme" style="padding:10px; border: #e1315b; border-width: thin; border-style:solid; margin-bottom:10px">
					<div class="col-md-4">
                    	<img class="card-img-fluid" src="./assets/images/branch-images/'.$salon->br_image.'" alt="Branch Image" height="250" width="300">
                    </div>
                    <div class="col-md-6 card-body">
                        <h4>'.$salon->br_name.'</h4>
                        <h5>'.$salon->br_location.'</h5>
                        <p><label>Open:</label>'.$day_start." - ".$day_end." (".$salon->br_opening." - ".$salon->br_closing.")".'</p>
						<p><label>Closed:</label>'.$day_closed2.'</p>
						<div class="row">
							<div class="col-md-1"><div style="height:30px;width:30px;background-color:'.$rate_color.';text-align: center;line-height: 30px; color:white"><span>'.round($salon->br_rate,1).'</span></div></div>
							<div class="col-md-8"><p><span>('.$salon->br_reviews.' reviews)</span><span>('.$salon->br_popularity.' reservations)</span></p></div>
						</div>
					</div>
					<div class="col-md-2">
                        <a href="'.base_url('customer_salon_view'.'?id='.$salon->br_id).'" class="btn btn-info btn-rounded shadow">View Branch</a> 
                    </div>
                </div>';
				// if(($i%3)==0){
				// 	$html .= '</div>';
				// }
				// $i++;
			}
		}
		else{
			$html = "No Salon Found.";
		}
		$data['display'] = $html;
		echo json_encode($data);
	}
	public function service_pagination(){
		$sort="";
		switch($_GET['sort']){
			case '1': 
				$sort .= 'ORDER BY rs_count DESC';
				break;
			case '2': 
				$sort .= 'ORDER BY sv_name ASC';
				break;
		}
		$category="";
		if($_GET['ct_id'] != '0'){
			$category .= 'AND sv.category_id = '.$_GET['ct_id'];
		}

		$data['service_count'] = $this->customer_model->get_service_count($_GET['id'], $category);
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $data['service_count'];
		$config['per_page'] = $_GET['show']; //sample
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';        
		$config['full_tag_close'] = '</ul>';  
		$config['attributes'] = array('class' => 'page-link');   
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';   
		$config['first_tag_open'] = '<li>';        
		$config['first_tag_close'] = '</li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li class="prev">';        
		$config['prev_tag_close'] = '</li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li>';        
		$config['next_tag_close'] = '</li>';        
		$config['last_tag_open'] = '<li>';        
		$config['last_tag_close'] = '</li>';        
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';        
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';        
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);

        $start = ($page - 1) * $config['per_page'];

        $data['service'] = $this->customer_model->get_services($_GET['id'],$category,$config['per_page'],$start, $sort);
       	$data['pagination'] = $this->pagination->create_links();
		$html = '';
		if($data['service'] !=NULL){
			foreach($data['service'] as $sv){
				$html .= '

				<div class="card1" style="background-image: url(./assets/images/service-images/'.$sv->sv_image.'); background-size: cover; background-repeat: no-repeat;">
    				<div class="info">
      					<h4 class="title">'.$sv->sv_name.'</h4>
      					<p class="description pt20">Duration: '.$sv->as_duration.'<br>Price: '.$sv->as_price.'<br>Reserved Count: '.$sv->rs_count.'</p>
    				</div>
  				</div>';
			}
		}
		$data['display'] = $html;
		echo json_encode($data);
	}
	public function review_list(){
		$shown = ''; //$shown defines if the tab is most recent or my reviews
		if($_GET['shown']=='2'){
			$shown = " AND rw.customer_id = $_SESSION[cs_id]";
		}
		$data['reviews'] = $this->customer_model->get_reviews($_GET['id'], $_GET['start'], $shown);
		$data['review_count'] = $this->customer_model->get_review_count($_GET['id'], $shown);
		$html = '';
		$month_arr = array("January","February","March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		if($data['reviews'] !=NULL){
			foreach($data['reviews'] as $rw){
				$star_rate = '';
				$date = $month_arr[(int)substr($rw->rw_datetime,5,2)-1]." ".substr($rw->rw_datetime,8,2).", ".substr($rw->rw_datetime,0,4);
				for($y=0;$y<5;$y++){   
		            if($y<(int)$rw->rw_rating){
		                $star_rate .= '<span class="fa fa-star stars checked"></span>';
		            }
		            else{
		                $star_rate .='<span class="fa fa-star stars"></span>';
		            }
		        }	
				$html .= '<div class="container-fluid" style="background-color: rgba(255,255,255,0.6);border:rgb(0,0,0,0.6); size:0.2px; border-style:solid; margin:10px 10px; padding: 20px">
					<p><h4>'.$rw->cs_fname.' '.$rw->cs_lname.'</h4></p>
					<p>'.$rw->cs_address.'</p>
					<p>'.$date.'</p>
					<p>'.'"'.$rw->rw_message.'"'.'</p>
					<p>'.$star_rate.'</p>
					</div>';
			}
		}
		$data['display'] = $html;
		echo json_encode($data);
	}
	public function category_services(){
		if($_GET['ct_id']==0){
			$data['services'] = $this->customer_model->get_all_service($_GET['br_id']);
		}
		else{
			$data['services'] = $this->customer_model->get_category_service($_GET['br_id'], $_GET['ct_id']);
		}
		$html = '';
		if($data['services'] !=NULL){
			foreach($data['services'] as $sv){
				$html .= '<tr>
									<td>'.$sv->sv_name.'</td>
									<td>'.$sv->as_duration.'</td>
									<td>'.$sv->as_price.'</td>
									<td><button class="btn btn-info" value="'.$sv->as_id.'">Add</button></td>
								</tr>';
			}
		}
		$data['display'] = $html;
		echo json_encode($data);
	}
	public function choose_service(){
		$data['avail'] = $this->customer_model->get_avail_service($_GET['as_id']);
		$html = '';
		if($data['avail'] !=NULL){
			foreach($data['avail'] as $sv){
				$html .= '<tr>
									<td>'.$_GET['count'].'</td>
									<td>'.$sv->sv_name.'</td>
									<td>'.$sv->as_duration.'</td>
									<td>'.$sv->as_price.'</td>
									<td><button class="btn btn-info" value="'.$sv->as_id.'">Delete</button></td>
								</tr>';
			}
		}
		$data['display'] = $html;
		echo json_encode($data);
	}
	public function reserve(){
		$this->load->model('kikay_model');
		$code = $this->kikay_model->get_code(4);
		$this->kikay_model->update_counter($code[0]->ct_count+1,4);
		$rvdata = array(
					'code' => $code[0]->ct_code.(sprintf('%08d', $code[0]->ct_count+1)),
					'date' => $this->input->post('date'),
					'time' => $this->input->post('time'),
					'time_end' => $this->input->post('end_time'),
					'status' => 'Pending',
					'customer_id' => $_SESSION['cs_id'],
					'branch_id' => $this->input->post('br_id'),
					'created_by' => $_SESSION['user']);
		$this->customer_model->add_reservation($rvdata);
		$reserve_id = $this->db->insert_id(); 				//last inserted reservation ID

		if($this->check_slots($rvdata)){
			foreach($this->input->post('as_id') as $as_id){
				$rsdata = array(
						'reservation_id' => $reserve_id,
						'avail_service_id' => $as_id,
						'status' => 'A');
				$this->customer_model->add_reserve_service($rsdata);
			}
			echo json_encode(1); //return true
		}
		else{
			$this->customer_model->delete_reservation($reserve_id);
			$this->kikay_model->update_counter($code[0]->ct_count,4);
			echo json_encode(0); //return false
		}
	}
	public function check_slots($rsv){
		$data['branch'] = $this->customer_model->display_branch($rsv['branch_id']);
		$data['reserve'] = $this->customer_model->get_reservation_slot($rsv['branch_id'], $rsv['date']);
		$open_time = $this->convert_minTime($data['branch'][0]->br_opening);
		$close_time = $this->convert_minTime($data['branch'][0]->br_closing);

		$check_times = $this->get_time_slots($this->convert_minTime($rsv['time']),$this->convert_minTime($rsv['time_end'])); //time slots of sent reservation
		$branch_times = $this->get_time_slots($open_time, $close_time);
		$slot_count = array(count($branch_times));
		$slot_count = array_fill(0,count($branch_times),(int)$data['branch'][0]->br_slots);
		if($data['reserve']!=NULL){
			foreach($data['reserve'] as $rv){
				$start_time = $this->convert_minTime($rv->rv_start);
				$end_time = $this->convert_minTime($rv->rv_end);
				// $data['reserve_times'] = $this->get_time_slots($start_time, $end_time);
				$reserve_times = $this->get_time_slots($start_time, $end_time);
				foreach($branch_times as $index => $br_time){
					if(in_array($br_time,$reserve_times)){
						$slot_count[$index] -= 1;
					}
				}
			}
		}
		foreach($branch_times as $index => $br_time){
			if(in_array($br_time,$check_times)){
				if($slot_count[$index]<=(-1)){	
					return false;
				}
			}
		}
		return true;
	}
	public function display_slots(){
		$data['branch'] = $this->customer_model->display_branch($_GET['br_id']);
		$data['reserve'] = $this->customer_model->get_reservation_slot($_GET['br_id'], $_GET['date']);
		$open_time = $this->convert_minTime($data['branch'][0]->br_opening);
		$close_time = $this->convert_minTime($data['branch'][0]->br_closing);
		$html = "";
		// $data['branch_times'] = $this->get_time_slots($open_time, $close_time);
		$branch_times = $this->get_time_slots($open_time, $close_time);
		$slot_count = array(count($branch_times));
		$slot_count = array_fill(0,count($branch_times),(int)$data['branch'][0]->br_slots);
		if($data['reserve']!=NULL){
			foreach($data['reserve'] as $rv){
				$start_time = $this->convert_minTime($rv->rv_start);
				$end_time = $this->convert_minTime($rv->rv_end);
				// $data['reserve_times'] = $this->get_time_slots($start_time, $end_time);
				$reserve_times = $this->get_time_slots($start_time, $end_time);
				foreach($branch_times as $index => $br_time){
					if(in_array($br_time,$reserve_times)){
						$slot_count[$index] -= 1;
					}
				}
			}
		}
		// $data['slots'] = $slot_count;
		foreach($branch_times as $index => $br_time){
			if((int)$slot_count[$index]<=0){
				$html .= "<div class='row' data-name='b'><span class='col-sm-5'><input type='checkbox' value='".$br_time."' disabled>".$br_time."</span><span align='center'>FULL</span></div>";
			}
			else{
				$html .= "<div class='row' data-name='a'><span class='col-sm-5'><input type='checkbox' value='".$br_time."' disabled>".$br_time."</span><span class='col-sm-6' align='center'> ".$slot_count[$index]."</span></div>";
			}
		}
		echo json_encode($html);
	}
	public function convert_minTime($time){
		$hour = (int)substr($time,0,2);
		$min = (int)substr($time,3,5);
		$total = ($hour*60)+$min;
		return $total;
	}
	public function time_format($time){
		$hour_format = array("00","01","02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$hour = (string)$time/60;
		$min = (string)$time%60;
		return $hour_format[$hour].":".substr($min,0,1)."0"; //00,10,20,30,40,50 -by 10 intervals
	}
	public function get_time_slots($start, $end){ //create time_format intervals
		$time_slots = [];
		$count = 0;
		while($start<$end){	
			$time_slots[$count] = $this->time_format($start)." - ".$this->time_format($start+30);
			$count++;
			$start += 30;
		}
		return $time_slots;
	}
	public function get_customer_info(){
		$data['info'] = $this->customer_model->display_info($_SESSION['id']);
		echo json_encode($data);
	}
	public function reservation_view(){
		$data['reserve'] = $this->customer_model->view_reservation($_GET['id']);
		$data['service'] = $this->customer_model->get_reservation_service($_GET['id']);
		$data['display'] = '<div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Reservation #: </b></label></div>
                                    <div class="col-md-5">'.$data['reserve'][0]->rv_no.'</div>
                                    <div class="col-md-2"><label class=" form-control-label"><b>Created Date: </b></label></div>
                                    <div class="col-md-3">'.$data['reserve'][0]->rv_created_date.'</div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Customer Name: </b></label></div>
                                    <div class="col-md-5">'.$data['reserve'][0]->cs_fname." ".$data['reserve'][0]->cs_lname.'</div>
                                    <div class="col-md-2"><label class=" form-control-label"><b>Status:</b></label></div>
                                    <div class="col-md-3">'.$data['reserve'][0]->rv_status.'</div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Branch Name: </b></label></div>
                                    <div class="col-md-10">'.$data['reserve'][0]->br_name.'</div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Date Reserved: </b></label></div>
                                    <div class="col-md-10">'.$data['reserve'][0]->rv_date.'</div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label"><b>Time Reserved: </b></label></div>
                                    <div class="col-md-10">'.$data['reserve'][0]->rv_time." - ".$data['reserve'][0]->rv_end.'</div>
                                </div>
                                <div class="row form-group">
                                    
                                </div>
                            </div>';
		foreach($data['service'] as $sv){
			$list[] = array($sv->sv_name, $sv->as_price, $sv->as_duration);
		}
		$data['service_list'] = $list;
		echo json_encode($data);
	}
}
