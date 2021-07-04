<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->model('User_model');
        $this->load->helper('cookie');
    }
	public function index()
	{
		
		if($this->input->post('login')){
			$username =  $this->input->post('username');
			$password =  $this->input->post('password');
			$captcha =  $this->input->post('captcha');
			
			$view_data['username'] = $username;
			$view_data['password'] = $password;
			
			if($captcha == $this->session->userdata('captcha')){
				$db_password = $this->User_model->get_password($username);
				if($db_password){
					$db_password = $this->encryption->decrypt($db_password);
					if ($password==$db_password) {
						set_cookie('is_logged_in','yes',(86400*365*50));
						return redirect(get_uri('admincategory'));
					}else{
						$view_data['errormsg'] = lang('password_err');
						$view_data['captcha'] = $this->craeate_captcha();
						$this->load->view('admin/login',$view_data);
					}
				}else{
					$view_data['captcha'] = $this->craeate_captcha();
					$view_data['errormsg'] = lang('username_err');
					$this->load->view('admin/login',$view_data);
				}
				
			}else{				
				$view_data['captcha'] = $this->craeate_captcha();
				$view_data['errormsg'] = lang('captcha_err');
				$this->load->view('admin/login',$view_data);
			}

		}else{
						
			$view_data['captcha'] = $this->craeate_captcha();
			$this->load->view('admin/login',$view_data);
		}
		
	}
	public function logout(){
		if($this->input->post('log_out')=="yes"){
			if(delete_cookie('is_logged_in')){
				redirect(get_uri('login'));
			}
		}
	}
	public function craeate_captcha(){
		$str = "";
		for ($i=0; $i <4 ; $i++) { 
			$str.= $this->choice_char(mt_rand(1,62));
		}
		$this->session->set_userdata('captcha',$str);
		return $str;
	}
	public function choice_char($char){
		 switch ($char) {
			case 1: return "a";
				break;
				case 2: return "b";
				break;
				case 3: return "c";
				break;
				case 4: return "d";
				break;
				case 5: return "e";
				break;

				case 6: return "f";
				break;
				case 7: return "g";
				break;
				case 8: return "h";
				break;
				case 9: return "i";
				break;
				case 10: return "j";
				break;
				case 11: return "k";
				break;
				case 12: return "l";
				break;
				case 13: return "m";
				break;
				case 14: return "n";
				break;
				case 15: return "o";
				break;

				case 16: return "p";
				break;
				case 17: return "q";
				break;
				case 18: return "r";
				break;
				case 19: return "s";
				break;
				case 20: return "t";
				break;
				case 21: return "u";
				break;
				case 22: return "v";
				break;
				case 23: return "w";
				break;
				case 24: return "x";
				break;
				case 25: return "y";
				break;
				case 26: return "z";
				break;
				case 27: return "A";
				break;
				case 28: return "B";
				break;
				case 29: return "C";
				break;
				case 30: return "D";
				break;
				case 31: return "E";
				break;
				case 32: return "F";
				break;
				case 33: return "G";
				break;
				case 34: return "H";
				break;
				case 35: return "I";
				break;

				case 36: return "J";
				break;
				case 37: return "K";
				break;
				case 38: return "L";
				break;
				case 39: return "M";
				break;
				case 40: return "N";
				break;
				case 41: return "O";
				break;

				case 42: return "P";
				break;
				case 43: return "Q";
				break;
				case 44: return "R";
				break;
				case 45: return "S";
				break;
				case 46: return "T";
				break;
				case 47: return "U";
				break;
				case 48: return "V";
				break;
				case 49: return "W";
				break;

				case 50: return "X";
				break;
				case 51: return "Y";
				break;
				case 52: return "Z";
				break;
				case 53: return "1";
				break;
				case 54: return "2";
				break;
				case 55: return "3";
				break;

				case 56: return "4";
				break;
				case 57: return "5";
				break;
				case 58: return "6";
				break;
				case 59: return "7";
				break;
				case 60: return "8";
				break;
				case 61: return "9";
				break;

				case 62: return "0";
				break;
		};
	}
}