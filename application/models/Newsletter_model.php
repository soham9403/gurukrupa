<?php 
    
class Newsletter_model extends Crud_model{

    function __construct() {
        $this->table = "newsletter";
        parent::__construct();
    }
}
 ?>