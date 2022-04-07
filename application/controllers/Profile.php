<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
        parent::__construct();
        $userSess = $this->session->userdata('userSess');
        if (!$userSess) {
			redirect( base_url(), 'refresh' );
		}
      	$this->load->model('front/Profile_model','profile_model');
    }

	public function index()
	{
		$data['getOrderDetails'] = $this->profile_model->getOrders();
		
		$data['profileDisable'] = 'disabledEdit';
		$data['tabStatus'] = 'step1';
		$data['addressStatus'] = '';
		$data['billilngAddress'] = [];
		
		$data['billilngAddress']  = $this->profile_model->getBillingAddress();
		
		if(isset($_GET['addressId'])){
			$data['tabStatus'] = 'step4';
			$data['addressStatus'] = 'style="display: block;"';

			$data['addressId'] = $_GET['addressId'];
			$data['billingAddressDetails'] = $this->profile_model->getBillingAddressDetails($data['addressId']);

			if($data['billingAddressDetails']){
				 $data['billingAddressData']['first_name'] = $data['billingAddressDetails']['billing_first_name'];
				 $data['billingAddressData']['last_name'] = $data['billingAddressDetails']['billing_last_name'];
				 $data['billingAddressData']['email'] = $data['billingAddressDetails']['billing_email'];
				 $data['billingAddressData']['phone'] = $data['billingAddressDetails']['billing_phone'];
				 $data['billingAddressData']['address_1'] = $data['billingAddressDetails']['billing_address_1'];
				 $data['billingAddressData']['address_2'] = $data['billingAddressDetails']['billing_address_2'];
				 $data['billingAddressData']['city'] = $data['billingAddressDetails']['billing_city'];
				 $data['billingAddressData']['state'] = $data['billingAddressDetails']['billing_state'];
				 $data['billingAddressData']['pincode'] = $data['billingAddressDetails']['billing_pincode'];
				 $data['billingAddressData']['default_address'] = $data['billingAddressDetails']['is_default'];
			}


		} else {
			$data['addressId'] = 0;
		}

		if(isset($_POST['saveAddressBtn']))
		{
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	  		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
	  		$this->form_validation->set_rules('address_1', 'Address 1', 'trim|required');
	  		$this->form_validation->set_rules('city', 'City', 'trim|required');
	  		$this->form_validation->set_rules('state', 'State', 'trim|required');
	  		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|numeric');

			if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('billingAddressError', $this->form_validation->error_array());
	            $this->session->set_flashdata('billingAddressData', $_REQUEST);
	            $data['billingAddressError'] = $this->session->flashdata('billingAddressError');
                $data['billingAddressData'] = $this->session->flashdata('billingAddressData');
	        } else {

	        	$address_2 = NULL;

	        	if($this->input->post('address_2')){
	        		$address_2 = $this->input->post('address_2');
	        	}

	        	$params =   array(
					            'billing_first_name' => $this->input->post('first_name'),
					            'billing_last_name'  => $this->input->post('last_name'),
					            'billing_email'		 => $this->input->post('email'),
					            'billing_phone' 	 => $this->input->post('phone'),
					            'billing_pincode' 	 => $this->input->post('pincode'),
					            'billing_city' 		 => $this->input->post('city'),
					            'billing_state' 	 => $this->input->post('state'),
					            'billing_address_1'  => $this->input->post('address_1'),
					            'billing_address_2'  => $address_2,
					            'is_default' 		 => 1,
					            'user_id'    		 => getUserId()
					        );

	        	if($this->input->post('addresss_id')){
	        		$updateBillingAddressStatus  = $this->profile_model->updateBillingAddress($params,$this->input->post('addresss_id'));

		        	if($updateBillingAddressStatus){
		        		$this->session->set_flashdata('billingAddressSuccess','Your address has been updated');
		        	} else {
		        		$this->session->set_flashdata('billingAddressSaveError','Something went wrong please try again');
		        	}

		        	$this->session->set_flashdata('billingAddressData', $_REQUEST);
		        	$data['billingAddressData'] = $this->session->flashdata('billingAddressData');
	        	} else{
	        		$saveBillingAddressStatus  = $this->profile_model->saveBillingAddress($params);

		        	if($saveBillingAddressStatus){
		        		$this->session->set_flashdata('billingAddressSuccess','Your address has been saved');
		        	} else {
		        		$this->session->set_flashdata('billingAddressSaveError','Something went wrong please try again');
		        	}
	        	}
	        	
	        }

			$data['tabStatus'] = 'step4';
			$data['addressStatus'] = 'style="display: block;"';
		}

		if($this->input->post('changePasswordBtn'))
		{
			$data['tabStatus'] = 'step2';
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
		  	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
		  	if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('profileError', $this->form_validation->error_array());
	            $data['profileError'] = $this->session->flashdata('profileError');
	        } else {
	        	$changePasswordStatus  = $this->profile_model->changePassword($this->input->post('old_password'),$this->input->post('new_password'));
	        	if($changePasswordStatus == 'Success'){
	        		$this->session->set_flashdata('passwordChangeSuccess','Your password has been changed');
	        	} else if($changePasswordStatus == 'Old Password Not Match'){
	        		$this->session->set_flashdata('passwordChangeError','Old password does not match');
	        	} else {
	        		$this->session->set_flashdata('passwordChangeError','Something went wrong please try again');
	        	}
	        }
		}

		if($this->input->post('profileBtn'))
		{
			$data['profileDisable'] = '';

			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		  	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric');

		  	if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('profileError', $this->form_validation->error_array());
	            $data['profileError'] = $this->session->flashdata('profileError');
	        } else {

	        	$params =   array(
					            'name' => $this->input->post('name'),
					            'email' => $this->input->post('email'),
					            'phone_number' => $this->input->post('mobile'),
					        );

	        	$checkDuplicateEmail  = $this->profile_model->get_by_email($params['email']);

	        	if($checkDuplicateEmail){
	        		$this->session->set_flashdata('duplicateEmailError', $params['email'].' Email id use by another user');
	        		redirect('profile', 'refresh');
	        		exit;
	        	}

	        	$checkDuplicateMobile = $this->profile_model->get_by_mobile($params['phone_number']);
				if($checkDuplicateMobile){
	        		$this->session->set_flashdata('duplicateMobileError',$params['phone_number'].' Mobile no use by another user');
	        		redirect('profile', 'refresh');
	        		exit;
	        	}
	        	
	        	$userUpdateStatus 	  = $this->profile_model->updateProfile($params);

				if($userUpdateStatus){
					$this->session->set_flashdata('accountUpdate','Your account has been updated');
				} else {
					$this->session->set_flashdata('accountUpdateError','Something went wrong please try again');
				}
	        }
		}
		
		
		$data['userData'] = $this->profile_model->getCurrentUser(getUserId());

        if($data['userData'])
        {
            $data['middleContent']   = 'front/profile';
        	$data['pageTitle']       = 'Profile';
        	$this->load->view('front/template',$data);
        } else {
        	redirect( base_url(), 'refresh' );
        } 
		
	}

	public function invoice($id = null) {
        $orderInfo = $this->db
                ->select('a.*, b.name as first_name, b.last_name, b.email, b.phone_number')
                ->join('user as b', 'a.user_id = b.id')
                ->get_where('orders as a', array(
                    'SHA2(a.id, 256) = ' => $id))
                ->row();

        if (!empty($orderInfo)) {
            
            $this->Master_model->createInvoice($orderInfo->id);

        } else {
            redirect(base_url('profile'),'refresh');
        }
    }

}
	

