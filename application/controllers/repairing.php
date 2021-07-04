<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repairing extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Repairing_model');
        $this->load->model("Category_model");
    }
	public function index()
	{
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$this->template->rander('user/repairing',$view_data);
	}
	public function get_data(){
		$data = $this->Repairing_model->get_list();
		$pass_data = array();
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}
		$this->load->view("user/repairing_list",$pass_data);
	}
}
