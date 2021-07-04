<?php 
    
class User_model extends Crud_model{

    function __construct() {
        $this->table = "users";
        parent::__construct();
    }
    function get_password($username){
    	$data = $this->db->select('password','id')->from($this->table)->where('username',$username)->get();
    	if($data->num_rows()>0){
    		return $data->row()->password;
    	}else{
    		return false;
    	}

    }
}
 ?>