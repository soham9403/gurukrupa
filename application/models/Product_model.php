<?php 
    
class Product_model extends Crud_model{

    function __construct() {
        $this->table = "product";
        parent::__construct();
    }

     public function get_list($where = array(),$column="*"){
        $data = $this->db->select($column)->from($this->table);
        
    	if (array_key_exists("category", $where) && $where['category']!=""){
    		$category = $where['category'];

            $data =  $data->where('product_category',$category);

		}

        if (array_key_exists("is_our_manyfacture", $where) && $where['is_our_manyfacture']==1){
            $is_our_manyfacture = $where['is_our_manyfacture'];

            $data =  $data->where('is_our_manyfacture',$is_our_manyfacture);

        }else if(array_key_exists("is_our_manyfacture", $where) && $where['is_our_manyfacture']==0){
            $data =  $data->where('is_our_manyfacture ',0);
        }

        if (array_key_exists("is_in_stock", $where) && $where['is_in_stock']!=""){
            $is_in_stock = $where['is_in_stock'];
            $data =  $data->where('is_in_stock',1);

        }else{
            $data =  $data->where('is_in_stock ',0);
        }
         if (array_key_exists("brand_id", $where) && $where['brand_id']!=""){
            $brand_id = $where['brand_id'];
            $data =  $data->where('brand_id',$brand_id);

        }
        if (array_key_exists("product", $where) && $where['product']!=""){
            $product = "%";
            $product .= $where['product'];
            $product .= "%";
            $data = $data->group_start();
            $data =  $data->where('product_id LIKE ', $product);

            $data =  $data->or_where('product LIKE ', $product);
            $data =  $data->or_where('product_mrp_price LIKE ', $product); 
            $data =  $data->or_where('product_finale_price LIKE ', $product); 
            $data =  $data->or_where('product_description LIKE ', $product); 

            $data = $data->group_end();
            // echo("<pre>");
            // print_r($data->get()->result());
            // die();
        }
        if (array_key_exists("order_by", $where)){
            $order_by = $where['order_by'];  
            if($order_by=="lth"){
                $data =  $data->order_by('product_finale_price','ASC');
            }else{
                $data =  $data->order_by('product_finale_price','DESC');
            }          
        }
        $data = $data->order_by('product_id','ASC');
        if (array_key_exists("limit_first", $where) && array_key_exists("limit_last", $where) && $where['limit_first']!=""){
            $limit_first = $where['limit_first'];
            $limit_last = $where['limit_last'];
            $data =  $data->limit($limit_last,$limit_first);
        }
        
        
        $data = $data->get()->result();
    	
    	return $data;
    }
    public function last_inserted_product($where=array()){

    	$data = $this->db->select("product_id")->from($this->table)->order_by('product_id', 'DESC')->where($where)->get()->row();
    	return $data;
    }
    public function offers_data($where=array()){
        $data = $this->db->select("*")->from($this->table)->order_by('updated_at', 'DESC')->where($where)->get()->result();
        return $data;
    }
    public function brands_dropdown($category_id){
        $brands_table = "other_details";
        $main_table = $this->table;
        $data = $this->db->select("$brands_table.name,$brands_table.id")->from($main_table)->join($brands_table,"$brands_table.id=$main_table.brand_id")->order_by("$main_table.updated_at", 'DESC')->where("product_category",$category_id)->group_by("$main_table.brand_id")->get()->result();
        return $data;
    }   


}
 ?>