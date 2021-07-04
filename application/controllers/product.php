<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Category_model");
        $this->load->model("Product_model");
    }
	public function index()
	{
		
		$where = array(
			"is_in_stock"=>1,
			"is_discount"=>1
		);
		$view_data['offer_list'] = $this->Product_model->offers_data($where);
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$this->template->rander('user/product',$view_data);
	}
	public function ourmanifacture()
	{
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$this->template->rander('user/ourmanifacture',$view_data);
	}
	public function ourmanifacture_data()
	{
		$order_by = $this->input->post("order_by");
		$is_our_manyfacture = $this->input->post("is_our_manyfacture");

		$conditional_data = [
			"order_by"=>$order_by,
			"is_our_manyfacture"=>$is_our_manyfacture,
			"is_in_stock"=>1
		];
		$data = $this->Product_model->get_list($conditional_data);
		$pass_data = array();
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}
		$pass_data['is_our_manifacture'] = "yes";
		$this->load->view("user/product_list",$pass_data);
	}
	public function get_brands_dropdown(){
		$category_id = $this->input->post('category_id');
		$brads_data = $this->Product_model->brands_dropdown($category_id);


		
		$menu = "<select id='brand_id' name='brand_id' onchange='get_data()'>
					<option value=''>All</option>

		";
		foreach ($brads_data as $key => $value) {
			$menu.="<option value='".$value->id."'>".$value->name."</option>\n";
		}

		$menu.="</select>";
		echo($menu);
		die();

	}
	public function category_list(){
		$data_like = $this->input->post("like");
		$data_like = ["like"=>$data_like];
		$data = $this->Category_model->get_list($data_like);
		$pass_data = array();
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}
		$this->load->view("user/category_list",$pass_data);
	}
}
