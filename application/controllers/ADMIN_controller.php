<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN_controller extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->only_admin();
    }
}