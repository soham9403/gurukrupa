<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_manufacturer extends MY_controller {
	function __construct() {
        parent::__construct();
        $this->only_admin();
        $this->load->model("Category_model");
        $this->load->model("Product_model");
        $this->load->model("Other_details_model");
        
    }
	public function index()
	{
		$view_data['is_admin'] = 1;
		$this->template->rander('admin/our_manifacture',$view_data);
	}
	public function modalform(){
		$view_data = array();
		if($this->input->post('action')=="update"){
			$id = $this->input->post('id');
			$form_data = $this->Product_model->get_one(["id"=>$id]);
			$view_data['form_data'] = $form_data;
		}
		$view_data['is_our_manifacture'] = "yes";
		$view_data['category_dropdown'] = $this->Category_model->get_list();
		$view_data['brand_dropdown'] = $this->Other_details_model->get_brand_list();
		return $this->load->view('admin/forms/productform',$view_data);
	}
	public function get_data(){
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
		$this->load->view("admin/product_list",$pass_data);
	}
	
	public function save(){
		$product_name = $this->input->post('product_name');
		

		$mrp_price = $this->input->post('mrp_price');
		$finale_price = $this->input->post('finale_price');
		$product_description = $this->input->post('product_description');

		$discount_description = $this->input->post('discount_description');
		$image_name = $this->input->post('image_name');
		$is_our_manifacture = $this->input->post('is_our_manifacture');
		$discount_available = $this->input->post('discount_available');
		if($this->input->post('discount_available')){
			$discount_available = 1;
		}else{
			$discount_available = 0;
		}
		$stock_is_available = $this->input->post('stock_is_available');
		if($this->input->post('stock_is_available')){
			$stock_is_available = 1;
		}else{
			$stock_is_available = 0;
		}

		$id = $this->input->post('hidden_id');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('product_name', lang('product_name'), 'required');
        $this->form_validation->set_rules('mrp_price', lang('mrp_price'), 'required');
        $this->form_validation->set_rules('finale_price', lang('finale_price'), 'required');
        $this->form_validation->set_rules('product_description', lang('product_description'), 'required');
        

        if($this->input->post('discount_available')){
        	$this->form_validation->set_rules('discount_description', lang('discount_description'), 'required');
        }     
        $this->form_validation->set_rules('image_name', lang('product_image'), 'required');   
        if ($this->form_validation->run() == FALSE) {		         
            $message = validation_errors();
            echo json_encode(array("success" => 0, 'message' => $message));
            exit();
        }
        $product_id = $this->product_id($id);

		$pass_data = array(
			"product" => $product_name,
			"product_id" => $product_id,
			"product_mrp_price" => $mrp_price,
			"product_finale_price" => $finale_price,
			"product_description" =>$product_description,
			"image" => $image_name,
			"is_discount" =>$discount_available,
			"discount_statement"=>$discount_description,
			"is_in_stock"=>$stock_is_available,
			"is_our_manyfacture"=>$is_our_manifacture,
		);


		if($this->Product_model->save($pass_data,$id)){
			$message = "successfully_inserted";
			if(isset($id) && $id!=""){$message = "successfully_updated";}
			echo(json_encode(array("status"=>1,"message"=>lang($message))));
		}else{
			echo(json_encode(array("status"=>0,"message"=>lang("fail_msg"))));
		}
	}

	function product_id($update_id=""){
		if(isset($update_id) && $update_id>0 && $update_id!=""){
			$product_info = $this->Product_model->last_inserted_product(["id"=>$update_id]);
			return $product_info->product_id;
		}else{
			$product_info = $this->Product_model->last_inserted_product(["is_our_manyfacture"=>1]);
			$category_tag = "OUR";
			if(!empty($product_info) && isset($product_info)){
				$last_id = $product_info->product_id;

				$id_arr =  explode('-',$last_id);
				$number = $id_arr[2];
				 $number = (int)$number;
				 $number++;

				 $number = $this->add_zeros($number); 
				 return "GURU-".$category_tag."-".$number;
			}else{
				return "GURU-".$category_tag."-"."001";
			}
		}
		

	}
	function add_zeros($number=0){
		$number = (string)$number;

		$len = strlen($number);

		if($len==1){
			$number = "00".$number; 
		}elseif ($len==2) {
			$number = "0".$number;
		}

		return $number;
	}

	public function delete_data(){
      $dlt_id = $this->input->post('dlt_id');

      $data = $this->Product_model->get_one(["id"=>$dlt_id]);
      if(isset($data->image)){
      	if($data->image!=UNAVAILABLE_IMAGE){
	        if(unlink('files/images/'.$data->image)){   
	           if($this->Product_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	           }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	           }
	        }else{
	        	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }else{
	    	if($this->Product_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }
      }else{
	  		if($this->Product_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
      }
    }
}