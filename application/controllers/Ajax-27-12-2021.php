<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Product_model','product_model');
	}

	public function checkPincode(){

		$pincodeSatus = $this->product_model->checkPincode($_POST['pincode']);

		if($pincodeSatus){	        	
	        $json_data = array(		        	
            	"status"   => 'success',
            	"delivery_days" => $pincodeSatus['delivery_days']
            );
        } else {
        	$json_data = array(
            	"status"   => 'fail',
            );
        }

	    echo json_encode($json_data);
	}

	public function forgotPass() {
		$status = array();

		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[10]|numeric|xss_clean');

		if ($this->form_validation->run() === FALSE) {
			$status = array('error' => true, 'type' => 'field');
            $status = array_merge($this->form_validation->error_array(), $status);
		} else {
			
			$mobile = $this->input->post('mobile');

			$data = $this->db->get_where('user', array(
				'phone_number' => $mobile
			))->row();

			if (!empty($data)) {
				
				//check if mobile number is active
				if ($data->is_active) {
					
					//send OTP
					$otp = random_int(100000, 999999);
					//$otp = 123456;

					$isSmsSend = $this->Sms_model->sendResetPassOtp($mobile, $otp);
					//$isSmsSend = 1;

					if ($isSmsSend) {
						
						$otpData = array(
							'mobile' => $mobile,
                            'otp' => $otp,
                            'genrate_time' => date('H:i'),
                            'expire_time' => date('H:i', strtotime("+5 min")),
                            'total_user_calls' => 0
                        );

                        $this->session->set_userdata( 'forgot_otp_data', $otpData );

                        $status = array('error' => false, 'msg' => 'The OTP has been send successfully');

					} else {
						$status = array('error' => true, 'type' => 'final', 'msg' => 'We are unable to send OTP on your mobile number.');
					}

				} else {
					$status = array('error' => true, 'type' => 'final', 'msg' => 'Your account is not active.');
				}

			} else {
				$status = array('error' => true, 'type' => 'final', 'msg' => 'The mobile number is not registered.');
			}

		}

		echo json_encode($status);

	}

	public function resendForgotOtp() {
		$status = array();

		$otpData = $this->session->userdata('forgot_otp_data');

		if (!empty($otpData)) {

			$expireTime = $otpData['expire_time'];
			$currentTime = date('H:i');
			$mobile = $otpData['mobile'];

			//check if otp data is expired or not
			if (strtotime($currentTime) <= strtotime($expireTime)) {
                
                //check attemp

                $attempt = $otpData['total_user_calls'];

                if ($attempt < 3) {
                	
                	//if there is limit then send OTP

                	//send OTP
					$otp = random_int(100000, 999999);
					//$otp = 123456;

					$isSmsSend = $this->Sms_model->sendResetPassOtp($mobile, $otp);
					//$isSmsSend = 1;

					if ($isSmsSend) {
						
						$otpData = array(
							'mobile' => $mobile,
	                        'otp' => $otp,
	                        'genrate_time' => date('H:i'),
	                        'expire_time' => date('H:i', strtotime("+5 min")),
	                        'total_user_calls' => $attempt+1
	                    );

	                    $this->session->set_userdata( 'forgot_otp_data', $otpData );

	                    $status = array('error' => false, 'msg' => 'OTP has been sent successfully');

					} else {
						$status = array(
		                    'error' => true,
		                    'type' => 'final',
		                    'msg' => 'Unable to send an OTP'
		                );
					}

                } else {
                	$status = array(
	                    'error' => true,
	                    'type' => 'final',
	                    'msg' => 'You have reached limit to send an OTP'
	                );
                }
                
            } else {
                $status = array(
                    'error' => true,
                    'type' => 'final',
                    'msg' => 'Your OTP is expired. Please try again'
                );
            }
			
		} else {
			$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
		}

		echo json_encode($status);
	}

	public function validateForgotOtp() {
		$status = array();
		$otpData = $this->session->userdata('forgot_otp_data');

		if (!empty($otpData)) {
			
			$expireTime = $otpData['expire_time'];
			$currentTime = date('H:i');
			$sendOTP = $otpData['otp'];

			//check if otp data is expired or not
			if (strtotime($currentTime) <= strtotime($expireTime)) {

				$enteredOTP = $this->input->post('otp');

				if ($sendOTP == $enteredOTP) {
					
					$sessObj = array(
						'mobile' => $otpData['mobile'],
						'genrate_time' => date('H:i'),
	                    'expire_time' => date('H:i', strtotime("+5 min")),
					);
					
					$this->session->set_userdata( 'resetPassword', $sessObj );
					$this->session->unset_userdata('forgot_otp_data');

					$status = array(
						'error' => false, 
						'redirect' =>  base_url('reset-password'),
						'msg' => 'Entered OTP is validated successfully'
					);

				} else {
					$status = array(
						'error' => true, 
						'type' => 'final', 
						'msg' => 'You have entered incorrect OTP'
					);
				}

			} else {
				$status = array(
					'error' => true, 
					'type' => 'final', 
					'msg' => 'Your OTP has been expired'
				);
			}

		} else {
			$status = array(
				'error' => true, 
				'type' => 'final', 
				'msg' => 'Something went wrong'
			);
		}

		echo json_encode($status);

	}

	public function resetPassword() {
		$status = array();

		if ($this->input->is_ajax_request()) {

			$resetPassSess = $this->session->userdata('resetPassword');
			
			if (!empty($resetPassSess)) {

				$expireTime = $resetPassSess['expire_time'];
				$currentTime = date('H:i');				

				//check if otp data is expired or not
				if (strtotime($currentTime) <= strtotime($expireTime)) {
				
					$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
					$this->form_validation->set_rules('cpassword', 'confirm password', 'trim|required|matches[password]|xss_clean');

					if ($this->form_validation->run() === FALSE) {
						$status = array('error' => true, 'type' => 'field');
			            $status = array_merge($this->form_validation->error_array(), $status);
					} else {

						$mobile  = $resetPassSess['mobile'];
						$password = $this->input->post('password');

						$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

						$this->db->where('phone_number', $mobile);
						$this->db->update('user', array(
							'password' => $password
						));

						if ($this->db->affected_rows() OR 1) {

							$this->session->unset_userdata('resetPassword');

							$status = array('error' => false, 'msg' => 'Your password has been changed successfully', 'redirect' => base_url('login'));
						} else {
							$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
						}

					}

				} else {
					$status = array('error' => true, 'type' => 'final', 'msg' => 'Your session is expired', 'redirect' => base_url('forgot-password'));
				}

			} else {
				$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong', 'redirect' => base_url('forgot-password'));
			}

		} else {
			$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
		}

		echo json_encode($status);

	}

	public function apply_coupon() {
        $status = array();

        if ($this->input->is_ajax_request()) {

            $userSess = $this->session->userdata('userSess');

            //$this->session->unset_userdata('couponData');

            $this->form_validation->set_rules('couponCode', 'coupon code', 'trim|required|alpha_numeric|min_length[4]|max_length[12]|xss_clean');

            if (!$this->form_validation->run()) {
                
                $status = array('error' => true, 'type' => 'field');
                $status = array_merge($this->form_validation->error_array(), $status);

            } else {
                
                $coupon = $this->input->post('couponCode');

                //check if coupon code exist and active
                $isExist = $this->db->get_where('promo_code', array('is_active' => 1, 'promo_code' => $coupon))->row();

                if (!empty($isExist)) {

                    //check if customer is logged in
                    if (empty($userSess)) {
                        $status = array(
                          'error' => true,
                          'type' => 'login',
                          'url' => base_url('login?redirect=cart'),
                          'msg' => 'Please login to use coupon'
                        );
                    }

                    //get cart amount without discount amount
                    $subTotal = $this->Master_model->cart_amount_without_discount();

                    //check if subtotal greater than zero
                    if (!$subTotal) {
                        $status = array(
                          'error' => true,
                          'type' => 'final',
                          'msg' => 'Something went wrong'
                        );
                    }

                    //check coupon status
                    if (!$isExist->is_active) {
                        $status = array(
                          'error' => true,
                          'type' => 'final',
                          'msg' => 'The coupon code is invalid'
                        );
                    }

                    //check coupon inventory
                    if (!$isExist->stock) {
                        $status = array(
                          'error' => true,
                          'type' => 'final',
                          'msg' => 'The coupon code is expired'
                        );
                    }

                    //check minimum cart amount
                    if ($isExist->min_cart_value) {
                        if ($isExist->min_cart_value > $subTotal) {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Your cart value should be '.$isExist->min_cart_value.' to use this coupon code'
                            );
                        }
                    }

                    //if coupon is flat then its value should be less than total amount
                    if ($isExist->discount_type == 2) {
                        if ($isExist->discount >= $subTotal) {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Please avail the full value of the coupon. It is valid for one time redemption only.'
                            );
                        }
                    }

                    /*check coupon usage means single time use or multiple time use*/

                   $countCouponUsed = $this->Master_model->count_customer_used_coupon($this->input->post('couponCode'));

                    if ($isExist->usage_time == 'multiple') {
                        //multiple
                        
                        if ($isExist->multi_time_value) {

                            if ($countCouponUsed >= $isExist->multi_time_value) {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'You cannot use this coupon more than '.$isExist->multi_time_value.' times'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'The coupon code is expired'
                            );
                        }

                    } else {
                        //single
                        if ($countCouponUsed) {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'You have already used this coupon'
                            );  
                        }
                    }

                    /*Check Start Date & End Date*/
                    $currDate = date('Y-m-d');
                    $startDate = $isExist->start_date;
                    $endDate = $isExist->end_date;

                    if (!empty($startDate)) {
                        if($startDate > $currDate) {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    if (!empty($endDate)) {
                        if ($currDate > $endDate) {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //check inclusion category
                    if (!empty($isExist->category)) {
                        
                        $cartProductInfo = $this->Master_model->get_cart_products_info('category_level_1');

                        if (!empty($cartProductInfo)) {

                            $cartProductInfo = array_unique($cartProductInfo);
                            
                            if (!in_array($isExist->category, $cartProductInfo)) {

                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Coupon code is not valid'
                                );

                            }

                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //check inclusion sub category
                    if (!empty($isExist->sub_category)) {
                        $cartProductInfo = $this->Master_model->get_cart_products_info('category_level_2');

                        if (!empty($cartProductInfo)) {

                            $cartProductInfo = array_unique($cartProductInfo);

                            $couponSubCat = explode(',', $isExist->sub_category);

                            $result = array_intersect($cartProductInfo, $couponSubCat);

                            if (!count($result)) {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Coupon code is not valid'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //check exclusion sub category
                    if (!empty($isExist->exclusion_sub_category)) {
                        $cartProductInfo = $this->Master_model->get_cart_products_info('category_level_2');

                        if (!empty($cartProductInfo)) {

                            $cartProductInfo = array_unique($cartProductInfo);

                            $couponExSubCat = explode(',', $isExist->exclusion_sub_category);

                            $result = array_intersect($cartProductInfo, $couponExSubCat);

                            if (count($result)) {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Coupon code is not valid'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //check exlusion sku
                    if (!empty($isExist->exclusion_sku)) {
                        $cartProductInfo = $this->Master_model->get_cart_products_info('sku');

                        if (!empty($cartProductInfo)) {

                            $cartProductInfo = array_unique($cartProductInfo);

                            $couponExSKU = explode(',', $isExist->exclusion_sku);

                            $result = array_intersect($cartProductInfo, $couponExSKU);

                            if (count($result)) {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Coupon code is not valid'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //check inclusion product
                    if (!empty($isExist->inclusion_product)) {
                        $cartProductInfo = $this->Master_model->get_cart_products_info('product_id');

                        if (!empty($cartProductInfo)) {

                            $cartProductInfo = array_unique($cartProductInfo);

                            $couponIncProd = explode(',', $isExist->inclusion_product);

                            $result = array_intersect($cartProductInfo, $couponIncProd);

                            if (!count($result)) {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Coupon code is not valid'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Coupon code is not valid'
                            );
                        }
                    }

                    //product should not have any free product
                    // $isFreebeeProdExist = $this->Master_model->check_cart_freebee_product();

                    // if ($isFreebeeProdExist) {
                    //     $status = array(
                    //       'error' => true,
                    //       'type' => 'final',
                    //       'msg' => 'You are already getting free product. Coupon won\'t apply'
                    //     );
                    // }

                    if (empty($status)) {

                        $discount = $isExist->discount;
                        $maxDiscount = $isExist->max_discount;

                        //if type 1 then discount type is in percentage else flat
                        $type = $isExist->discount_type;

                        //get cart data
                        $cartData = $this->Master_model->cart_data();

						// echo $this->db->last_query();

                        if (!empty($cartData)) {

                            $subtotal = 0;
                            $saved = 0;
                            $discRec = 0;
                            $summary = '';
                            $summary2 = '';

                            foreach ($cartData as $data) {
                
                                $mrp = $data->mrp;
                                $sp = $data->selling_price;
                                $availStock = $data->stock;
                                $cartQty = $data->quantity;

                                if (!$availStock) {
                                  $mrp = 0;
                                  $sp = 0;
                                }

                                $price = 0;
                                $discPrice = 0;

                                if ($sp > 0) {
                                  if ($sp < $mrp) {
                                    $discPrice = $sp;
                                    $price = $mrp;
                                  } else {
                                    $price = $mrp;
                                  }
                                } else {
                                  $price = $mrp;
                                }

                                if ($discPrice) {
                                  $subtotal += $discPrice*$cartQty;
                                  $saved += $price*$cartQty;
                                } else {
                                  $subtotal += $price*$cartQty;
                                }
                            }

                            // echo $subtotal;
                            // die();

                            if ($subtotal) {
                                
                                if ($type == 1) {
                                    //discount
                                    $discRec = ($subtotal*$discount)/100;
                                } else {
                                    //flat
                                    $discRec = $discount;
                                }

                                //check max discount
                                if (!empty($maxDiscount)) {
                                    if ($discRec > $maxDiscount) {
                                        $discRec = $maxDiscount;
                                    }
                                }

                                $summary .= '
                                <li>Subtotal <span><i class="fa fa-inr"></i>'.check_num($subtotal).'</span></li>

                                <li> Coupon Discount ('.strtoupper($isExist->promo_code).') <span><i class="fa fa-inr"></i>'.check_num($discRec).'</span></li>
                                ';

                                $summary2 = '
                                	Total <span><i class="fa fa-inr"></i>'.check_num($subtotal-$discRec).'</span>
                                ';

                                $sessionObj = array(
                                  'promo_id' => $isExist->id,
                                  'promo_code' => $isExist->promo_code,
                                  'discount' => $discRec
                                );
                                
                                $this->session->set_userdata( 'couponData', $sessionObj );
                                
                                $status = array(
                                    'error' => false,
                                    'msg' => 'Coupon applied successfully',
                                    'summary' => $summary,
                                    'summary2' => $summary2
                                );

                            } else {
                                $status = array(
                                  'error' => true,
                                  'type' => 'final',
                                  'msg' => 'Something went wrong'
                                );
                            }
                            
                        } else {
                            $status = array(
                              'error' => true,
                              'type' => 'final',
                              'msg' => 'Something went wrong'
                            );
                        }

                    }

                } else {

                    $status = array(
                        'error' => true,
                        'type' => 'final',
                        'msg' => 'Coupon code is not valid'
                    );

                }
            }

        } else {
            $status = array(
                'error' => true,
                'type' => 'final',
                'msg' => 'Something went wrong'
            );
        }

        echo json_encode($status);
        exit();
    }    

    public function orderCancel() {
    	$status = array();

    	if ($this->input->is_ajax_request()) {

    		$orderId = $this->input->post('id');
    		$userSess = $this->session->userdata('userSess');
    		
    		if (!empty($userSess)) {
    			
    			//check if order is exist

    			$orderData = $this->db->get_where('orders', array(
    				'SHA2(id, 256) = ' => $orderId,
    				'user_id' => getUserId()
    			))->row();

    			if (!empty($orderData)) {
    				
    				//check order status before cancel the order
    				$allowCancelOrder = array(
                        'Order Confirmed', 'Approved', 'Hold'
                     );

                    if(in_array($orderData->order_status, $allowCancelOrder)) {

                    	//cancel the order
                    	$obj1 = array('order_status' => 'Order Cancellation - By Customer');

                    	$obj2 = array(
                    		'order_id' => $orderData->id,
                    		'order_status' => 'Order Cancellation - By Customer',
                    		'is_active' => 1,
                    	);

                    	$this->db->where('id', $orderData->id);
                    	$this->db->update('orders', $obj1);

                    	$this->db->insert('order_status_history', $obj2);

                    	if ($this->db->affected_rows()) {
                    		
                    		$this->Email_sending->orderCancelByCustomer($orderData->id);

                    		$isSmsSend = $this->Sms_model->orderCancelByCustomer($orderData->id);

                    		$status = array(
				    			'error' => false,
				    			'msg' => 'Order has been cancelled successfully'
				    		);

                    	} else {
                    		$status = array(
				    			'error' => true,
				    			'msg' => 'Something went wrong'
				    		);
                    	}

                    } else {
                    	$status = array(
			    			'error' => true,
			    			'msg' => 'You cannot cancel the order'
			    		);
                    }

    			} else {
    				$status = array(
		    			'error' => true,
		    			'msg' => 'Order id is not found'
		    		);
    			}

    		} else {
    			$status = array(
	    			'error' => true,
	    			'msg' => 'Please login to cancel order'
	    		);
    		}

    	} else {
    		$status = array(
    			'error' => true,
    			'msg' => 'Something went wrong'
    		);
    	}

    	echo json_encode($status);
    }

    public function contact() {
    	$status = array();

    	if ($this->input->is_ajax_request()) {
    		
    		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
    		$this->form_validation->set_rules('city', 'city', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|min_length[10]|max_length[13]|xss_clean');
    		$this->form_validation->set_rules('message', 'message', 'trim|required|xss_clean');

    		if ($this->form_validation->run() === FALSE) {
    			$status = array('error' => true, 'type' => 'field');
            	$status = array_merge($this->form_validation->error_array(), $status);
    		} else {
    			
    			$obj = array(
    				'type' => 'contact',    				
    				'name' => $this->input->post('name'),
    				'email' => $this->input->post('email'),
    				'city' => $this->input->post('city'),
    				'phone' => $this->input->post('phone'),
    				'message' => $this->input->post('message'),
    				'created_at' => date('Y-m-d H:i:s')
    			);

    			$this->db->insert('enquiry', $obj);
    			$isSend = $this->Email_sending->sendContactEnquiry($obj);

    			if ($isSend OR 1) {
    				$status = array('error' => false, 'msg' => 'Thank you for contacting us. We will revert back to you asap.');
    			} else {
    				$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
    			}

    		}

    	} else {
    		$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
    	}

    	echo json_encode($status);
    }

    public function dealersEnquiry() {
    	$status = array();

    	if ($this->input->is_ajax_request()) {    		
    		
    		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
    		$this->form_validation->set_rules('subject', 'subject', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|min_length[10]|max_length[13]|xss_clean');
    		$this->form_validation->set_rules('store', 'store', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('city', 'city', 'trim|required|xss_clean');
    		$this->form_validation->set_rules('message', 'message', 'trim|required|xss_clean');

    		if ($this->form_validation->run() === FALSE) {
    			$status = array('error' => true, 'type' => 'field');
            	$status = array_merge($this->form_validation->error_array(), $status);
    		} else {
    			
    			$obj = array(
    				'type' => 'dealer',    				
    				'name' => $this->input->post('name'),
    				'email' => $this->input->post('email'),
    				'subject' => $this->input->post('subject'),
    				'phone' => $this->input->post('phone'),
    				'store' => $this->input->post('store'),
    				'city' => $this->input->post('city'),
    				'message' => $this->input->post('message'),
    				'created_at' => date('Y-m-d H:i:s')
    			);

    			$this->db->insert('enquiry', $obj);
    			$isSend = $this->Email_sending->sendDealerEnquiry($obj);

    			if ($isSend OR 1) {
    				$status = array('error' => false, 'msg' => 'Thank you for contacting us. We will revert back to you asap.');
    			} else {
    				$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
    			}

    		}

    	} else {
    		$status = array('error' => true, 'type' => 'final', 'msg' => 'Something went wrong');
    	}

    	echo json_encode($status);
    }

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */