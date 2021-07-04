<?php

class MY_Controller extends CI_Controller {
    function __construct() {
       parent::__construct();
       $this->load->library('template');     
       $this->load->helper('cookie');  
    }
    function only_admin(){
    	$cookie_val = get_cookie('is_logged_in');
    	if(!isset($cookie_val) || get_cookie('is_logged_in')!="yes"){
    		redirect(get_uri('login'));
    		return false;
    	}
    }
    public function upload_image(){

      if($this->input->post('action') == "uploade_image"){
          
        $config['upload_path'] = 'files/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            
           
            $new_name = time().$_FILES["file"]['name'];


        $config['file_name'] = $new_name;


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file'))
            {      
                $print_data = array("status"=>0,"message"=>$this->upload->display_errors());
                echo(json_encode($print_data));
                die();
           
            }
            else
            {       
              $file = get_images($this->upload->data('file_name'));
              $file_name = $this->upload->data('file_name');
                $print_data = array("status"=>1,"image"=>$file,"image_name"=>$file_name);
                echo(json_encode($print_data));
                die();
            }
      }else{
        return redirect(get_uri('errors/err403')); 
      }
    }

    public function delete_file(){
      $file_name = $this->input->post('file_name');

      if($file_name!=UNAVAILABLE_IMAGE){
        if(unlink('files/images/'.$file_name)){   
           $print_data = array("status"=>1);
            echo(json_encode($print_data));
        }else{
          $print_data = array("status"=>0);
            echo(json_encode($print_data));
        }
      }
    }
}
