<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pos_model');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		header("Cache-Control: no cache");
		session_cache_limiter("private_no_expire");
	}
	public function show_reservations(){
		$data = $this->pos_model->display_reservation($_SESSION['br_id'], date('Y-m-d'));
		echo json_encode($data);
	}
	public function view_reservation(){
		$data = array(
				'reserve' => $this->pos_model->get_reservation($_GET['id']),
				'avail' => $this->pos_model->get_avail_service($_SESSION['br_id']),
				'service' => $this->pos_model->get_reservation_service($_GET['id']));
		echo json_encode($data);
	}
	public function avail_service(){
		$data = $this->pos_model->get_avail_service($_SESSION['br_id']);
		echo json_encode($data);
	}
	public function new_reservation(){
		$data = $this->pos_model->display_reservation($_SESSION['br_id'], $_GET['date']);
		echo json_encode($data);
	}
	public function chosen_service(){
		$data = $this->pos_model->get_service($_GET['id']);
		echo json_encode($data);
	}
	public function update_reservation(){
		$rvdata = array(
					'id' => $_GET['rv_id'],
					'time_end' => $_GET['end_time'],
					'status' => $_GET['status']);
		$this->pos_model->update_reservation($rvdata);
		$this->pos_model->delete_all_service($_GET['rv_id']);
		foreach($_GET['as_id'] as $as_id){
			$rsdata = array(
					'reservation_id' => $_GET['rv_id'],
					'avail_service_id' => $as_id,
					'status' => 'A');
			$this->pos_model->update_services($rsdata);
		}
		$data = $this->pos_model->get_reservation($_GET['rv_id']);
		echo json_encode($data);
	}
}