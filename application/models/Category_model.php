<?php 
    
class Category_model extends Crud_model{

    function __construct() {
        $this->table = "category";
        parent::__construct();
    }

    public function get_list($where = array()){

    	if (array_key_exists("like", $where)){
    		$like = $where['like'];
	  		$data = $this->db->select("*")->from($this->table)->like('category',$like,'both')->get()->result();
		}else{
			$data = $this->db->select("*")->from($this->table)->get()->result();
		}
    	return $data;
    }
}
 ?>