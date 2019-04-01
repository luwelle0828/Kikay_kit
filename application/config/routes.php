<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/


$route['default_controller'] = 'kikay_controller';

//Account Controllers
$route['home'] = 'kikay_controller';
$route['login_form'] = 'kikay_controller/login_view'; //will be removed if with modal
$route['login'] = 'kikay_controller/login';
$route['register_form'] = 'kikay_controller/register_view';
$route['register'] = 'kikay_controller/register';
$route['logout'] = 'kikay_controller/logout';
$route['change_pass_form'] = 'kikay_controller/change_pass_view';
$route['change_pass'] = 'kikay_controller/change_pass';

//Admin Controllers
$route['admin_home'] = 'admin_controller/ad_home';
$route['admin_clients'] = 'admin_controller/ad_clients';
$route['admin_view_client'] = 'admin_controller/ad_view_client';
$route['admin_add_client'] = 'admin_controller/ad_add_client';
$route['admin_update_client_form'] = 'admin_controller/ad_update_client_view';
$route['admin_update_client'] = 'admin_controller/ad_update_client';
$route['admin_delete_client'] = 'admin_controller/ad_delete_client';
$route['admin_activate_client'] = 'admin_controller/ad_activate_client';
$route['admin_view_cbranch'] = 'admin_controller/ad_view_cbranch';
$route['admin_branches'] = 'admin_controller/ad_branches';
$route['admin_add_branch'] = 'admin_controller/ad_add_branch';
$route['admin_update_branch_form'] = 'admin_controller/ad_update_branch_view';
$route['admin_update_branch'] = 'admin_controller/ad_update_branch';
$route['admin_view_branch'] = 'admin_controller/ad_view_branch';
$route['admin_delete_branch'] = 'admin_controller/ad_delete_branch';
$route['admin_activate_branch'] = 'admin_controller/ad_activate_branch';
$route['admin_customers'] = 'admin_controller/ad_customers';
$route['admin_view_customer'] = 'admin_controller/ad_view_customer';
$route['admin_add_customer'] = 'admin_controller/ad_add_customer';
$route['admin_update_customer_form'] = 'admin_controller/ad_update_customer_view';
$route['admin_update_customer'] = 'admin_controller/ad_update_customer';
$route['admin_delete_customer'] = 'admin_controller/ad_delete_customer';
$route['admin_activate_customer'] = 'admin_controller/ad_activate_customer';
$route['admin_delete_creservation'] = 'admin_controller/ad_delete_creservation';
$route['admin_activate_creservation'] = 'admin_controller/ad_activate_creservation';
$route['admin_reservations'] = 'admin_controller/ad_reservations';
$route['admin_view_reservation'] = 'admin_controller/ad_view_reservation';
$route['admin_delete_reservation'] = 'admin_controller/ad_delete_reservation';
$route['admin_user_activity'] = 'admin_controller/ad_activity';
$route['admin_users'] = 'admin_controller/ad_users';
$route['admin_update_user_form'] = 'admin_controller/ad_update_user_view';
$route['admin_update_user'] = 'admin_controller/ad_update_user';
$route['admin_delete_user'] = 'admin_controller/ad_delete_user';
$route['admin_activate_user'] = 'admin_controller/ad_activate_user';


//Client Controllers
$route['client_home'] = 'client_controller/cl_home';
$route['client_reservations'] = 'client_controller/cl_reservations';
$route['client_branches'] = 'client_controller/cl_branches';
$route['client_services'] = 'client_controller/cl_services';
$route['client_update_info_form'] = 'client_controller/cl_info_edit_view'; //change this form to modal
$route['client_update_info'] = 'client_controller/cl_info_edit';
$route['client_view_reservation'] = 'client_controller/cl_view_reservation';  //change this form to modal
$route['client_search_reservation'] = 'client_controller/cl_search_reservation';
$route['client_view_branch'] = 'client_controller/cl_view_branch'; //change this form to modal
$route['client_update_branch_form'] = 'client_controller/cl_update_branch_view'; //change this form to modal
$route['client_update_branch'] = 'client_controller/cl_update_branch';
$route['client_add_branch'] = 'client_controller/cl_add_branch';
$route['client_activate_branch'] = 'client_controller/cl_activate_branch';
$route['client_delete_branch'] = 'client_controller/cl_delete_branch';
$route['client_search_branch'] = 'client_controller/cl_search_branch';
$route['client_add_category'] = 'client_controller/cl_add_category';
$route['client_add_service'] = 'client_controller/cl_add_service'; 
$route['client_activate_service'] = 'client_controller/cl_activate_service'; 
$route['client_delete_service'] = 'client_controller/cl_delete_service';
$route['client_update_service_form'] = 'client_controller/cl_update_service_view';
$route['client_update_service'] = 'client_controller/cl_update_service';
$route['client_search_service'] = 'client_controller/cl_search_service';

//Branch Controllers
$route['branch_home'] = 'branch_controller/br_home';
$route['branch_update_info_form'] = 'branch_controller/br_update_info_view'; //change this form to modal
$route['branch_update_info'] = 'branch_controller/br_update_info';
$route['branch_view_reservation'] = 'branch_controller/br_view_reservation';
$route['branch_reservations'] = 'branch_controller/br_reservation';
$route['branch_search_reservation'] = 'branch_controller/br_search_reservation';
$route['branch_services'] = 'branch_controller/br_service';
$route['branch_search_service'] = 'branch_controller/br_search_service';
$route['branch_delete_service'] = 'branch_controller/br_delete_service';
$route['branch_update_service_form'] = 'branch_controller/br_update_service_view'; //change this form to modal
$route['branch_update_service'] = 'branch_controller/br_update_service';
$route['branch_activate_service'] = 'branch_controller/br_activate_service';
$route['branch_pos'] = 'branch_controller/br_pos';


//Customer Controllers
$route['customer_home'] = 'customer_controller/cs_home';
$route['customer_update_info_form'] = 'customer_controller/cs_update_info_view';
$route['customer_update_info'] = 'customer_controller/cs_update_info';
$route['customer_reservations'] = 'customer_controller/cs_reservation';
$route['customer_view_reservation'] = 'customer_controller/cs_view_reservation';
$route['customer_salon'] = 'customer_controller/cs_salon_list';
$route['customer_salon_view'] = 'customer_controller/cs_salon_view';
$route['customer_salon_services'] = 'customer_controller/cs_salon_service';
$route['customer_salon_reviews'] = 'customer_controller/cs_salon_review';
$route['customer_send_review'] = 'customer_controller/cs_send_review';
$route['customer_reserve_view'] = 'customer_controller/cs_reserve_view';
$route['customer_reserve'] = 'customer_controller/cs_reserve';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
