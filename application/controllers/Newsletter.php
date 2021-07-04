<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("Newsletter_model");
        $this->only_admin();
    }
    public function index(){
    	$view_data['is_admin'] = 1;
		$this->template->rander('admin/newsletter',$view_data);

    }
	public function add_newsletter()
	{
		$email = $this->input->post('email');

		$where = array("email"=>$email);
		$is_email = $this->Newsletter_model->get_one($where);
		if(empty($is_email)){
			$save_data = array(
				"email" => $email
			);
			$is_saved = $this->Newsletter_model->save($save_data);
			if($is_saved){
				echo(json_encode(array("status"=>1,"id"=>$is_saved,"message"=>lang('registered_succeesfully'))));
				die();
			}else{
				echo(json_encode(array("status"=>0,"message"=>lang('fail_msg'))));
				die();
			}
		}else{
			echo(json_encode(array("status"=>0,"message"=>lang('alredy_registered'))));
				die();
		}
	}
	public function send(){
		$image_name = $this->input->post('image_name');

		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		$this->load->library('form_validation');
           
        $this->form_validation->set_rules('image_name', lang('product_image'), 'required');
        $this->form_validation->set_rules('subject', lang('subject'), 'required');   
        $this->form_validation->set_rules('message', lang('message'), 'required');

        if ($this->form_validation->run() == FALSE) {		         
            $messages = validation_errors();
            echo json_encode(array("success" => 0, 'message' => $messages));
            exit();
        }


  //       $this->load->library('email');
  //       $this->email->set_newline("\r\n");
  //       $config['protocol'] = 'smtp';
		// $config['smtp_port'] = "465";
		// $config['mailtype'] = "html";
		// $config['smtp_host'] = "smtp.gmail.com";
		// $config['smtp_user'] = "sohampatel9403@gmail.com";
		// $config['smtp_pass'] = "sp;LDce;1847";
		// $config['wordwrap'] = TRUE;

		// $this->email->initialize($config);
		// $this->email->from('sohampatel9403@gmail.com', 'Soham Patel');
		// $this->email->to('sohampatel9403@gmail.com');
		// // $this->email->cc('sohampatel9403@gmail.com');
		// // $this->email->bcc('sohampatel9403@gmail.com');

		// $this->email->subject($subject);
		// $this->email->message($message);
		// $this->email->send();
		if(!mail("sohampatel9403@gmail.com", $subject, $message)){
			echo json_encode(array("success" => 0, 'message' => "fails"));
		}else{
			echo json_encode(array("success" => 1, 'message' => "success"));
		}
	}
}

//GU48AAJS0116118