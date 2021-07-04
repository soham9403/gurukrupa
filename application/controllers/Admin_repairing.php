<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_repairing extends MY_controller {
	function __construct() {
        parent::__construct();
        $this->only_admin();
        $this->load->model("Repairing_model");
        
    }
	public function index()
	{
		$view_data['is_admin'] = 1;
		$this->template->rander('admin/repairing',$view_data);
	}
	public function modalform(){
		$view_data = array();
		if($this->input->post('action')=="update"){
			$id = $this->input->post('id');
			$form_data = $this->Repairing_model->get_one(["id"=>$id]);
			$view_data['form_data'] = $form_data;
		}
		return $this->load->view('admin/forms/repairingform',$view_data);
	}
	public function get_data(){
		$data = $this->Repairing_model->get_list();
		$pass_data = array();
		if(isset($data) && !empty($data)){
			$pass_data['category_list'] = $data;
		}else{
			$pass_data['not_found'] = 1;
		}
		$this->load->view("admin/repairing_list",$pass_data);
	}
	
	public function save(){
		$product_name = $this->input->post('product_name');
		$image_name = $this->input->post('image_name');

		$id = $this->input->post('hidden_id');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('product_name', lang('product_name'), 'required');
           
        $this->form_validation->set_rules('image_name', lang('product_image'), 'required');   
        if ($this->form_validation->run() == FALSE) {		         
            $message = validation_errors();
            echo json_encode(array("success" => 0, 'message' => $message));
            exit();
        }

		$pass_data = array(
			"name" => $product_name,
			
			"image" => $image_name,

		);

		if($this->Repairing_model->save($pass_data,$id)){
			$message = "successfully_inserted";
			if(isset($id) && $id!=""){$message = "successfully_updated";}
			echo(json_encode(array("status"=>1,"message"=>lang($message))));
		}else{
			echo(json_encode(array("status"=>0,"message"=>lang("fail_msg"))));
		}
	}


	public function delete_data(){
      $dlt_id = $this->input->post('dlt_id');

      $data = $this->Repairing_model->get_one(["id"=>$dlt_id]);
      if(isset($data->image)){
      	if($data->image!=UNAVAILABLE_IMAGE){
	        if(unlink('files/images/'.$data->image)){   
	           if($this->Repairing_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	           }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	           }
	        }else{
	        	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }else{
	    	if($this->Repairing_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
	    }
      }else{
	  		if($this->Repairing_model->delete($data->id)){
	           	echo(json_encode(["status"=>1,"message"=>"Data deleted Successfully"]));
	        }else{
	           	echo(json_encode(["status"=>0,"message"=>"OOPS!!! Something Went Wrong."]));
	        }
      }
    }
}