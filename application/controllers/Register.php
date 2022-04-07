<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Register_model','register_model');
      	$this->load->helper('common_helper');             
    }

	public function index()
	{
		$data['registerError'] = $data['registerData'] = [];

		if($this->input->post('register_btn'))
		{
		    $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]', array('is_unique' => 'This email is already in used'));
	  		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric|is_unique[user.phone_number]', array('is_unique' => 'This mobile no is already in used'));
	  		$this->form_validation->set_rules('password', 'Password', 'required');
	  		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

	  		if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('registerError', $this->form_validation->error_array());
	            $this->session->set_flashdata('registerData', $_REQUEST);
	            $data['registerError'] = $this->session->flashdata('registerError');
                $data['registerData'] = $this->session->flashdata('registerData');
	        } else {

	        	$otp = random_int(100000, 999999);

	        	$params =   array(
		            'name' => $this->input->post('name'),
		            'email' => $this->input->post('email'),
		            'phone_number' => $this->input->post('mobile'),
		            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		            'verification_code' => $otp,
		        );

		        $isSmsSend = $this->Sms_model->sendOtp($this->input->post('mobile'), $otp);

		        if ($isSmsSend) {
		        	$user['mobile_no'] = $this->input->post('mobile');    
		        	
		        	$this->session->set_userdata( 'registerParam', $params );

		            $this->session->set_userdata($user); 
		        	redirect('register/otp', 'refresh');
		        } else {
		        	redirect('register', 'refresh');
		        }

	        	//$userStatus = $this->register_model->registerUser($params);

	        	// if($userStatus){
	        	// 	$user['mobile_no'] = $this->input->post('mobile');        
	         //        $this->session->set_userdata($user); 
	        	// 	redirect('register/otp', 'refresh');
	        	// }
	        }
		}

		$data['middleContent']   = 'front/register';
        $data['pageTitle']       = 'Register';
        $this->load->view('front/template',$data);
	}

	public function resend(){

		$mobileNo = $this->session->userdata('mobile_no');
		$attempt = $this->session->userdata('registerResendOtpAttempt');

		if (!empty($attempt)) {
			if ($attempt['attempt'] > 3) {
				$this->session->set_flashdata('reSendOtp','New OTP has been sent');
				redirect($_SERVER['HTTP_REFERER']);
				die();
			}
		}

		if (!empty($mobileNo)) {

			$otp = random_int(100000, 999999);
			$this->Sms_model->sendOtp($mobileNo, $otp);

			$sessObj = array(
				'attempt' => 1
			);

			if (!empty($attempt)) {
				$attempt = $attempt['attempt'] + 1;
			}
			
			$this->session->set_userdata( 'registerResendOtpAttempt', $sessObj );

		}


		$this->session->set_flashdata('reSendOtp','New OTP has been sent');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function otp()
	{ 
		$data['optVerificationError'] = ''; 		
		if($this->input->post('register_otp'))
		{
			$this->form_validation->set_rules('optVerification', 'OTP', 'trim|required|numeric');
			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('optVerificationError', $this->form_validation->error_array());
				$data['optVerificationError'] = $this->session->flashdata('optVerificationError');
			} else {

				$registerParams = $this->session->userdata('registerParam');
				// print_r($registerParams);
				// print_r($_POST);

				if (!empty($registerParams)) {
					
					//check OTP

					$originalOTP = $registerParams['verification_code'];
					$enteredOTP = $this->input->post('optVerification');

					if ($originalOTP == $enteredOTP) {
						//otp match
						$registerParams['is_active'] = 1;

						$userStatus = $this->register_model->registerUser($registerParams);

						if ($userStatus) {

							$this->session->unset_userdata('mobile_no');
							$this->session->unset_userdata('registerParam');
							$this->session->unset_userdata('registerResendOtpAttempt');
							
							$this->Email_sending->register(array('name' => $registerParams['name'], 'email' => $registerParams['email']));

							$this->session->set_flashdata('accountVerify','Your account has been verify. Please login');
							redirect('login', 'refresh');

						} else {
							$this->session->set_flashdata('otpCheckError','Something went wrong');
						}

					}  else {
						$this->session->set_flashdata('otpCheckError','Invalid otp please try again');
					}

				} else {
					$this->session->set_flashdata('otpCheckError','Something went wrong');
				}

				// die();

				// $userStatus = $this->register_model->registerOtpVerify($this->input->post('optVerification'),$this->session->userdata('mobile_no'));

				// if($userStatus){					
				// 	unset($_SESSION['mobile_no']);
				// 	$this->session->set_flashdata('accountVerify','Your account has been verify. Please login');
				// 	redirect('login', 'refresh');
				// } else {
				// 	$this->session->set_flashdata('otpCheckError','Invalid otp please try again');
				// }
			}

		}
		if ($this->session->userdata('mobile_no')) {
			$data['mobile_no'] = $this->session->userdata('mobile_no');
			$data['middleContent']   = 'front/register_otp';
        	$data['pageTitle']       = 'Verify OTP';
        	$this->load->view('front/template',$data);
		} else {
			redirect('register', 'refresh');
		}
		
	}

	
}
