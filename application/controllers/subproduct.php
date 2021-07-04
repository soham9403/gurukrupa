<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subproduct extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Product_model');
        $this->load->library('session');
    }
	public function index()
	{
		
		if($this->input->post('product_category')>0){
			$this->session->set_userdata('product_category',$this->input->post('product_category'));
		}
		
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$this->template->rander('user/subproduct',$view_data);
	}
	public function get_data(){
		$category = $this->input->post("category");
		$limit_first = $this->input->post("limit_first");
		$limit_last = 12;//$this->input->post("limit_last");
		$order_by = $this->input->post("order_by");
		$brand_id = $this->input->post("brand_id");
		$product = $this->input->post("product");

		$conditional_data = [
			"category"=>$category,
			"order_by"=>$order_by,
			"product"=>$product,
			"is_our_manyfacture"=>0,
			"brand_id"=>$brand_id,
			"is_in_stock"=>1
		];

		$pass_data['total_row'] = $this->Product_model->get_list($conditional_data,"COUNT(id) AS total_row")[0]->total_row;
		$pass_data['max_product'] = $limit_last;
		$pass_data['limit_first'] = $limit_first;
		
		$conditional_data['limit_first'] = $limit_first;
		$conditional_data['limit_last'] = $limit_last;

		$data = $this->Product_model->get_list($conditional_data);
		
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}

		$this->load->view("user/product_list",$pass_data);
	}
}


