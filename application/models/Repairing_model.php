<?php 
    
class Repairing_model extends Crud_model{

    function __construct() {
        $this->table = "repairing";
        parent::__construct();
    }

    public function get_list($where = array()){
			$data = $this->db->select("*")->from($this->table)->order_by('id',"DESC")->get()->result();
    	return $data;
    }
}
 ?>