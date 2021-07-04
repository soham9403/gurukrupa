<?php 
    
class Crud_model extends CI_Model{

    protected $table;

    function __construct() {
        parent::__construct();
    }
    function save($data = array(),$id=0){
        if($id>0){
            $where = array(
                "id" => $id
            );
            if($this->db->update($this->table, $data, $where)){
                return $id;
            }else{
                return false;
            }
        }else{           
            if($this->db->insert($this->table, $data)){
                return $this->db->insert_id();
            }else{
                return false;
            }
            
        }
    }
    function get_one($where = array()){
        
        $data = $this->db->get_where($this->table, $where);
        if($data->num_rows()){
            return $data->row();
        }else{
            return false;
        }
    }
    function delete($id){
        $where = array('id' => $id);
        if($this->db->delete($this->table, $where)){
            return $id;
        }else{
            return false;
        }
    }
    function delete_products($where){
        // $where = array('product_category' => $id);
        if($this->db->delete($this->table, $where)){
            return true;
        }else{
            return false;
        }
    }

}
 ?>