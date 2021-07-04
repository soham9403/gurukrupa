

<?php 
    
class Other_details_model extends Crud_model{

    function __construct() {
        $this->table = "other_details";
        parent::__construct();
    }

    public function get_brand_list($where = array()){

			$data = $this->db->select("*")->from($this->table)->where('is_brand',1);
            if (array_key_exists("is_main", $where) && $where['is_main']!=""){
                $is_main = $where['is_main'];
                $data =  $data->where('is_main',1);
            }
            $data = $data->order_by('id',"DESC");
            if (array_key_exists("limit_data", $where) && $where['limit_data']!=""){
                $limit_data = $where['limit_data'];
                $data =  $data->limit($limit_data,0);

            }

    	return $data->get()->result();
    }

    public function get_achievement_list($where = array()){
			$data = $this->db->select("*")->from($this->table)->where('is_achievement',1);
            if (array_key_exists("is_main", $where) && $where['is_main']!=""){
                $is_main = $where['is_main'];
                $data =  $data->where('is_main',1);
            }
            $data = $data->order_by('id',"DESC");
            if (array_key_exists("limit_data", $where) && $where['limit_data']!=""){
                $limit_data = $where['limit_data'];
                $data =  $data->limit($limit_data,0);

            }

    	return $data->get()->result();
    }

}
 ?>