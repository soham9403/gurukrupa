<?php

if (!function_exists('get_uri')) {
    function get_uri($uri = "") {
        $ci = get_instance();
        // $index_page = $ci->config->item('index_page');
        return base_url( '/' . $uri);
    }
}
/**
 * link the css files 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) {

    function load_css(array $array) {
        // $version = get_setting("app_version");
    	
        foreach ($array as $uri) {
            $url = "assets/css/";
        	$url .= $uri;
            echo "<link rel='stylesheet' type='text/css' href='" . base_url($url) . ".css' />\n";
        }
    }

}

if (!function_exists('load_js')) {

    function load_js(array $array) {
        // $version = get_setting("app_version");    	
        foreach ($array as $uri) {
            $url = "assets/js/";
        	$url .= $uri;
             echo "<script type='text/javascript'  src='" . base_url($url) . ".js'></script>\n";
        }
    }

}
 
if (!function_exists('get_system_file')) {

    function get_system_file(string $file) {
        $url = "files/system/".$file;
             return base_url($url);        
    }

}

if (!function_exists('get_images')) {

    function get_images(string $file) {
        $url = "files/images/".$file;
             return base_url($url);        
    }

}