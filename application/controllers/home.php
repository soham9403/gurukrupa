<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Product_model");
        $this->load->model("Other_details_model");
        $this->load->model("Category_model");
    }
	public function index()
	{
		// $this->only_admin();
		$view_data['is_admin'] = 0;
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$condition = array(
			"limit_data" => 8,
			"is_main"=>1
		);
		$view_data['achievements_list'] = $this->Other_details_model->get_achievement_list($condition);
		$condition = array(
			"limit_data" => 15,
			"is_main"=>1			
		);
		$view_data['brands_list'] = $this->Other_details_model->get_brand_list($condition);

		$where = array(
			"is_in_stock"=>1,
			"is_discount"=>1
		);
		$view_data['offer_list'] = $this->Product_model->offers_data($where);
		$this->template->rander('user/home',$view_data);
	}
}