<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {
    public function rander($view, $data = array()) {
        $ci = get_instance();

        
        $view_data['requested_view'] = $view;
        $view_data = array_merge($view_data, $data);

        $ci->load->view('includes/index', $view_data);
    }

}