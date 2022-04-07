<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Login_model','login_model');
      	$this->load->helper('common_helper');             
    }

	public function index()
	{

		$userSess = $this->session->userdata('userSess');
		if (!empty($userSess)) { 
			redirect('profile', 'refresh');
		}

		if($this->input->post('loginBtn'))
		{
			
			$username = $this->input->post('username');

			if (is_numeric($username)) {
				$this->form_validation->set_rules('username', 'phone number', 'trim|required|numeric|min_length[10]|max_length[10]|xss_clean');
			} else {
				$this->form_validation->set_rules('username', 'email', 'trim|required|valid_email|xss_clean');
			}


	  		$this->form_validation->set_rules('password', 'Password', 'required');

	  		if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('loginError', $this->form_validation->error_array());
	            $this->session->set_flashdata('loginData', $_REQUEST);
	            $data['loginError'] = $this->session->flashdata('loginError');
                $data['loginData'] = $this->session->flashdata('loginData');
	        } else {

	        	$result = $this->login_model->get_user($this->input->post('username'),$this->input->post('password'));
        
		        if($result)
		        {
		            $data['user_name'] = $result->name;
		            $data['user_email'] = $result->email;
		            $data['user_id'] = $result->id;

		            $this->session->set_userdata( 'userSess', $data);

		            $redirect = $this->input->post('redirect');

		            if ($redirect == 'checkout') {
		            	redirect( base_url().'checkout', 'refresh' );
		            } elseif ($redirect == 'cart') {
		            	redirect( base_url().'cart', 'refresh' );
		            } else {
		            	redirect( base_url().'profile', 'refresh' );
		            }
		            
		        }
		        else {
		            $this->session->set_flashdata('loginCheckError','Username or password incorrect');
		            
		        }	
	        }
	    }
	        
		$data['middleContent']   = 'front/login';
        $data['pageTitle']       = 'Login';
        $this->load->view('front/template',$data);
	}

	function logout()
	{
        $this->session->unset_userdata('userSess');
        // $this->session->unset_userdata('user_email');
        // $this->session->unset_userdata('user_id');
        redirect(base_url(), 'refresh');
	}
	
}
