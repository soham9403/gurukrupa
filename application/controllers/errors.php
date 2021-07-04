<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'ADMIN_controller.php';
class Errors extends MY_controller {
	function __construct() {
        parent::__construct();             
    }
    function err403(){
    	$view_data['heading'] = "Error 403";
    	$view_data['message'] = "SORRY !!! \n You Are not Allowed to access this page";
    	$view_data['image'] = get_system_file('error_403.jpg');
    	$this->load->view('errors/html/error_general',$view_data);
    }

}

