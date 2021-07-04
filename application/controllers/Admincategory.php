<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admincategory extends MY_controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Category_model");
        $this->load->model("Product_model");
        $this->only_admin();
        
    }
	public function index()
	{
		$view_data['is_admin'] = 1;
		$this->template->rander('admin/category',$view_data);
	}
	public function modalform(){
		$view_data = array();
		if($this->input->post('action')=="update"){
			$id = $this->input->post('id');
			$form_data = $this->Category_model->get_one(["id"=>$id]);
			$view_data['form_data'] = $form_data;
		}
		return $this->load->view('admin/forms/category_form',$view_data);
	}
	public function get_data(){
		$data_like = $this->input->post("like");
		$data_like = ["like"=>$data_like];
		$data = $this->Category_model->get_list($data_like);
		$pass_data = array();
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}
		$this->load->view("admin/category_list",$pass_data);
	}
	
	public function save(){
		$cate_image = $this->input->post('image_name');
		$category_name =$this->input->post('category_name');
		$id = $this->input->post('hidden_id');

		 $this->load->library('form_validation');

              $this->form_validation->set_rules('category_name', 'category', 'required');
               if ($this->form_validation->run() == FALSE) {		         
		            $message = validation_errors();
		            echo json_encode(array("success" => 0, 'message' => $message));
		            exit();
		        }


		$pass_data = array(
			"category" => $category_name,
			"image" => $cate_image
		);

		if($this->Category_model->save($pass_data,$id)){
			$message = "successfully_inserted";
			if(isset($id) && $id!=""){$message = "successfully_updated";}
			echo(json_encode(array("status"=>1,"message"=>lang($message))));
		}else{
			echo(json_encode(array("status"=>0,"message"=>lang("fail_msg"))));
		}
	}

	public function delete_data(){
      $dlt_id = $this->input->post('dlt_id');

      $data = $this->Category_model->get_one(["id"=>$dlt_id]);
      if(isset($data->image)){
      	if($data->image!=UNAVAILABLE_IMAGE){
	        if(unlink('files/images/'.$data->image)){   
	           if($this->Category_model->delete($data->id) && $this->Product_model->delete_products(["product_category"=>$data->id])){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	           }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	           }
	        }else{
	        	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }else{
	    	if($this->Category_model->delete($data->id) && $this->Product_model->delete_products(["product_category"=>$data->id])){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }
      }else{
	  		if($this->Category_model->delete($data->id) && $this->Product_model->delete_products(["product_category"=>$data->id])){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
      }
    }
}