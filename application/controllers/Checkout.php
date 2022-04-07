<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout extends CI_Controller {

	function __construct() {
      parent::__construct();
    	$this->load->model('front/Product_model','product_model');
      $this->load->model('front/Checkout_model','checkout_model');
      $this->load->model('front/Profile_model','profile_model');
    	$this->load->helper('common_helper');   
    	if (!$this->session->userdata('userSess')) { 
		     redirect('login?redirect=checkout', 'refresh');
	    }

      date_default_timezone_set('Asia/Kolkata');
  }

	public function paymentStatus(){
     $razorpay_payment_status = $this->checkout_model->razorpay_payment_status('pay_I6MbIx7561eHDf');
     echo '<pre>';
     print_r($razorpay_payment_status);
     echo '</pre>';
  }

  public function thankyourRazorPay(){

    if(!$_SESSION['razorpayCreateNewOrder']){
       redirect(base_url(), 'refresh');
    }

    if (!count($_POST)) {
      redirect(base_url(), 'refresh');
    }

    // echo "<pre>";
    // print_r($_POST);
    // print_r($_SESSION);
    // die();

    $orderData = $shippingData = $billingData = $couponData = [];

    if(!$this->session->userdata('is_billing_same')){
      $shippingData =  $this->session->userdata('shippingAddress');
      $orderData['shipping_first_name']  = $shippingData['shipping_first_name'];
      $orderData['shipping_last_name']  = $shippingData['shipping_last_name'];
      $orderData['shipping_email']  = $shippingData['shipping_email'];
      $orderData['shipping_phone']  = $shippingData['shipping_phone'];
      $orderData['shipping_pincode']  = $shippingData['shipping_pincode'];
      $orderData['shipping_state']  = $shippingData['shipping_state'];
      $orderData['shipping_city']  = $shippingData['shipping_city'];
      $orderData['shipping_address_1']  = $shippingData['shipping_address_1'];
      $orderData['shipping_address_2']  = $shippingData['shipping_address_2'];
      $orderData['shipping_first_name']  = $shippingData['shipping_first_name'];
      $orderData['shipping_first_name']  = $shippingData['shipping_first_name'];
    }

    if($this->session->userdata('billingAddress')){
      $billingData =  $this->session->userdata('billingAddress');
      $orderData['billing_first_name']  = $billingData['billing_first_name'];
      $orderData['billing_last_name']  = $billingData['billing_last_name'];
      $orderData['billing_email']  = $billingData['billing_email'];
      $orderData['billing_phone']  = $billingData['billing_phone'];
      $orderData['billing_pincode']  = $billingData['billing_pincode'];
      $orderData['billing_state']  = $billingData['billing_state'];
      $orderData['billing_city']  = $billingData['billing_city'];
      $orderData['billing_address_1']  = $billingData['billing_address_1'];
      $orderData['billing_address_2']  = $billingData['billing_address_2'];
      $orderData['billing_first_name']  = $billingData['billing_first_name'];
      $orderData['billing_first_name']  = $billingData['billing_first_name'];
    }

    if($this->session->userdata('couponData')){
      $couponData = $this->session->userdata('couponData');
      //$orderData['promo_details'] = serialize($couponData);
      $orderData['promo_code'] = $couponData['promo_code'];
      $this->checkout_model->updateCouponStock($couponData);
    }

    $userSess = $this->session->userdata('userSess');
    $userId = getUserId();

    $orderData['razorpay_payment_id']  =  $_POST['razorpay_payment_id']; 
    $orderData['razorpay_order_id']    =  $_POST['razorpay_order_id'];
    $orderData['custom_orderid']       =  order_id();
    $orderData['invoice_number']       =  invoice_number();
    $orderData['razorpay_signature']   =  $_POST['razorpay_signature'];
    $orderData['sub_total']            =  $this->session->userdata('sub_total');
    $orderData['paid_amount']          =  $this->session->userdata('paid_amount');
    $orderData['discount']             =  $this->session->userdata('discount');
    $orderData['user_id']              =  $userId;
    $orderData['created_at']           =  date('Y-m-d H:i:s'); 

    $saveOrderStatus = $this->checkout_model->saveOrder($orderData,$orderData['custom_orderid']);

    //update series number
    $this->db->insert('series_number', array('series_number' => $orderData['custom_orderid']));

    $items = array(
        'transaction_id' => $_POST['razorpay_order_id'],
        'affiliation' => 'Online Store',
        'value' => $this->session->userdata('paid_amount'),
        'tax' => '',
        'shipping' => '',
        'currency' => 'INR',
        'coupon' => isset($couponData['promo_code'])? $couponData['promo_code']:'',
        'items' => array()
    );

    $cartList = $this->session->userdata('cartData');
    
    if($cartList){     
      foreach ($cartList as $cartData) {

        $this->db->reset_query();
        $cartDataDetail = $this->db->get_where('product', array('id' => $cartData['id']))->row();

        if($cartData['selling_price']){
          $myPrice = $cartData['selling_price']; 
        } else {
          $myPrice = $cartData['mrp']; 
        } 

        $items['items'][] = array(
          'item_name' => $cartDataDetail->product_name,
          'item_id' => $cartDataDetail->sku_code,
          'price' => $myPrice,
          'item_brand' => 'Beetle Bikes',
          'item_category' => $this->Master_model->getCategoryById($cartDataDetail->category_level_1),
          'item_variant' => '',
          'quantity' => $cartData['cart_qty']
        );
      }
    }

    if($saveOrderStatus){
       unset($_SESSION['razorpayCreateNewOrder']);
       unset($_SESSION['is_billing_same']);
       unset($_SESSION['billingAddress']);
       unset($_SESSION['sub_total']);
       unset($_SESSION['paid_amount']);
       unset($_SESSION['discount']);
       unset($_SESSION['couponData']);
       unset($_SESSION['cartData']);
    }

    $this->session->unset_userdata('razorpayCreateNewOrder');
    $this->session->unset_userdata('is_billing_same');
    $this->session->unset_userdata('billingAddress');
    $this->session->unset_userdata('sub_total');
    $this->session->unset_userdata('paid_amount');
    $this->session->unset_userdata('discount');
    $this->session->unset_userdata('couponData');
    $this->session->unset_userdata('cartData');

    $data['middleContent']   = 'front/orderSuccess';
    $data['pageTitle']       = 'Order Success';
    $data['orderData']       =  $orderData;
    $data['items'] = json_encode($items);
    $this->load->view('front/template',$data);
  }

  public function createRazorPayOrder(){

      $this->form_validation->set_rules('billing_first_name', 'First Name', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('billing_last_name', 'Last Name', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('billing_email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('billing_phone', 'Phone', 'trim|required|numeric');
      $this->form_validation->set_rules('billing_address_1', 'Address 1', 'trim|required');
      $this->form_validation->set_rules('billing_city', 'City', 'trim|required');
      $this->form_validation->set_rules('billing_state', 'State', 'trim|required');
      $this->form_validation->set_rules('billing_pincode', 'Pincode', 'trim|required|numeric');

      if ($this->form_validation->run() === FALSE) {
          $this->session->set_flashdata('billingAddressError', $this->form_validation->error_array());
          $this->session->set_flashdata('billingAddressData', $_REQUEST);
          $data['billingAddressError'] = $this->session->flashdata('billingAddressError');
          $data['billingAddressData'] = $this->session->flashdata('billingAddressData');

          $json_data = array(
            "status"   => 'fail',
            "billingAddressError"   => $this->session->flashdata('billingAddressError'),
          );
          echo json_encode($json_data);  
          exit;
      } else {

            $address_2 = NULL;
            $validStatus = 0;
            if($this->input->post('billing_address_2')){
              $address_2 = $this->input->post('billing_address_2');
            }

            $params =   array(
                      'billing_first_name' => $this->input->post('billing_first_name'),
                      'billing_last_name'  => $this->input->post('billing_last_name'),
                      'billing_email'    => $this->input->post('billing_email'),
                      'billing_phone'    => $this->input->post('billing_phone'),
                      'billing_pincode'    => $this->input->post('billing_pincode'),
                      'billing_city'     => $this->input->post('billing_city'),
                      'billing_state'    => $this->input->post('billing_state'),
                      'billing_address_1'  => $this->input->post('billing_address_1'),
                      'billing_address_2'  => $address_2,
                      'is_default'     => 1,
                      'user_id'        => getUserId()
                  );

            $data['billingAddressData'] = $this->profile_model->getCheckoutBillingAddress();

            if($data['billingAddressData']){
              
              $updateBillingAddressStatus  = $this->profile_model->updateBillingAddress($params,$data['billingAddressData']['id']);

              if($updateBillingAddressStatus){
                $validStatus = 1;
              } else {
                //$this->session->set_flashdata('billingAddressSaveError','Something went wrong please try again');
                 $json_data = array(
                  "status"   => 'fail',
                  "message"   => 'Something went wrong please try again',
                );
                echo json_encode($json_data);  
                exit;
              }

              $data['billingAddressData'] = $this->profile_model->getCheckoutBillingAddress();
              $this->session->set_flashdata('billingAddress', $data['billingAddressData']);
            } else{
              $saveBillingAddressStatus  = $this->profile_model->saveBillingAddress($params);

              if($saveBillingAddressStatus){
                $validStatus = 1;
                $this->session->set_flashdata('billingAddressSuccess','Your address has been saved');
                $data['billingAddressData'] = $this->profile_model->getCheckoutBillingAddress();
                $this->session->set_flashdata('billingAddress', $data['billingAddressData']);
              } else {
                $this->session->set_flashdata('billingAddressSaveError','Something went wrong please try again');
                 $json_data = array(
                  "status"   => 'fail',
                  "message"   => 'Something went wrong please try again',
                );
                echo json_encode($json_data);  
                exit;
              }
            }
            
      

        if(isset($_POST['is_billing_same']))
        { 
          $this->session->set_userdata( 'shippingAddress', $data['billingAddressData']);
          $this->session->set_userdata( 'is_billing_same', 1);
        } else {
          unset($_SESSION['is_billing_same']);
        }

        $checkShippingAvailability = $this->checkout_model->checkShippingAvailability($data['billingAddressData']['billing_pincode']);

        if($checkShippingAvailability){
            if($validStatus == 1) {
                $data['cart_data']  = cart_data();
                $subTotal = [];

                // Coupon code start
                $couponPriceDiscount = $couponData = $billingAddress = []; 

                if(!$this->session->userdata('billingAddress')){
                  $json_data = array(
                        "status"   => 'fail',
                        "message"   => 'Billing address not found',
                      );
                  echo json_encode($json_data);  
                  exit;
                } else if(!$this->session->userdata('shippingAddress')){
                  $json_data = array(
                        "status"   => 'fail',
                        "message"   => 'Shipping address not found',
                      );
                  echo json_encode($json_data);  
                  exit;
                } else {
                  $billingAddress = $this->session->userdata('billingAddress');
                }

                if($this->session->userdata('couponData'))
                {
                  $couponData = $this->session->userdata('couponData');
                }

                $applyCount = 1;
               

                // Coupon code end

                foreach ($data['cart_data'] as $cart_data_key => $cart_data_value) {

                  // if($couponData){

                  //   if($couponData['sub_category']){
                  //       $sub_category_arr = explode (",", $couponData['sub_category']);
                  //       if (in_array($cart_data_value['category_level_2'], $sub_category_arr))
                  //       {
                  //         $applyCount = 1;
                  //       }
                  //   }

                  //   if($couponData['inclusion_product']){
                  //       $inclusion_product_arr = explode (",", $couponData['inclusion_product']);
                  //       if (in_array($cart_data_value['id'], $inclusion_product_arr))
                  //       {
                  //         $applyCount = 1;
                  //       }
                  //   }

                  //   if($couponData['exclusion_sku']){
                  //       $exclusion_sku_arr = explode (",", $couponData['exclusion_sku']);
                  //       if (in_array($cart_data_value['sku_code'], $exclusion_sku_arr))
                  //       {
                  //         $applyCount = 0;
                  //       }
                  //   }

                  //   if($couponData['exclusion_sub_category']){
                  //       $exclusion_sub_category_arr = explode (",", $couponData['exclusion_sub_category']);
                  //       if (in_array($cart_data_value['category_level_2'], $exclusion_sub_category_arr))
                  //       {
                  //         $applyCount = 0;
                  //       }
                  //   }
                  
                  // }
                                              
                if($cart_data_value['selling_price']){
                    if($applyCount == 1)
                    {
                       $couponPriceDiscount[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                    }

                    $subTotal[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                } else {
                    if($applyCount == 1)
                    {
                          $couponPriceDiscount[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                    }

                    $subTotal[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                }
              
              } 

              $subTotal = array_sum($subTotal);
              $this->session->set_userdata( 'sub_total', $subTotal);
              $total = $subTotal;

               $totalDiscount = 0;
               if($couponData){
                  if($couponPriceDiscount){

                      $couponPriceTotal = array_sum($couponPriceDiscount);
                      $totalDiscount = $couponData['discount'];

                      // if($couponData['discount_type'] == 1){
                      //    $totalDiscount = round($couponData['discount'] * ($couponPriceTotal / 100),2);
                      // }  else {
                      //     $totalDiscount = $couponData['discount'];
                      // }
                         
                      // if($couponData['max_discount']){
                      //     if($totalDiscount > $couponData['max_discount']){
                      //      $totalDiscount = $couponData['max_discount'];
                      //     }
                      // }   

                      // if($couponData['min_cart_value']){
                      //     if($couponData['min_cart_value'] > $total){
                      //         $totalDiscount = 0;
                      //     }
                      // }
                    
                  }
               }

              if($totalDiscount){
                $this->session->set_userdata( 'discount', $totalDiscount);
                $total = $total - $totalDiscount;
              }

             $razOrderId = $this->checkout_model->create_razorpay_order($total);

               if (!empty($razOrderId)) {

                  $name = $billingAddress['billing_first_name'].' '.$billingAddress['billing_last_name'];
                  $email = $billingAddress['billing_email'];
                  $contact = $billingAddress['billing_phone'];
                  $this->session->set_userdata( 'paid_amount', $total);

                  $orderData = array(
                          "key" => RAZOR_KEY_ID,
                          "amount" => $total,
                          "name" => "Coding Birds Online",
                          "description" => "Learn To Code",
                          "image" => base_url('assets/front/img/payment-logo.png'),
                          "prefill" => array(
                            "name"  => $name,
                            "email"  => $email,
                            "contact" => $contact,
                          
                          ),
                          "notes"  => array(
                            "address"  => "Hello World",
                            "merchant_order_id" => rand(),
                          ),
                          "theme"  => array(
                            "color"  => "#F37254"
                          ),
                          "order_id" => $razOrderId,
                          'callback_url' => base_url('thank-you'),
                        );      

                  $this->session->set_userdata( 'razorpayCreateNewOrder', $orderData);
                  $this->session->set_userdata( 'cartData', $data['cart_data']);
                  $json_data = array(
                        "status"   => 'success',
                        "data"   => $orderData,
                      );
                  echo json_encode($json_data);  
                  exit;
                }

              $json_data = array(
                        "status"   => 'fail',
                        "message"   => 'Something went wrong try again',
                      );
              echo json_encode($json_data);  
              exit;
            }  else {
                $json_data = array(
                        "status"   => 'fail',
                        "message"   => 'Something went wrong try again',
                      );
                echo json_encode($json_data);  
                exit;
            }
          }   else {
                $json_data = array(
                        "status"   => 'fail',
                        "message"   => 'Shipping not available on this pincode',
                );
                echo json_encode($json_data);  
                exit;
            }  
      } 
  }
  public function index()
	{

    $data['billingAddressData'] = $this->profile_model->getCheckoutBillingAddress();
    $data['billingAddressError'] =  [];
  
    if($data['billingAddressData']){
      $this->session->set_userdata( 'billingAddress',  $data['billingAddressData']);
    } else {
      $data['billingAddressData'] = [];
    }

    
    
		$data['cart_data'] 	= cart_data();
    unset($_SESSION['razorpayCreateNewOrder']);
		if($data['cart_data']){
    
		    $data['middleContent']   = 'front/checkout';
        $data['pageTitle']       = 'Checkout';
        $this->load->view('front/template',$data);
		} else {
			redirect( base_url().'products', 'refresh' );
		}

	} 

  public function prepareData($amount,$razorpayOrderId)
  {
    $data = array(
      "key" => 'rzp_test_yulfkmiWV1Fc9P',
      "amount" => $amount,
      "name" => "Coding Birds Online",
      "description" => "Learn To Code",
      "image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
      "prefill" => array(
        "name"  => 'Taiyyab Pinjari',
        "email"  => 'taiyyabpinjari@gmail.com',
        "contact" => '8087898278',
        /*"name"  => $this->input->post('name'),
        "email"  => $this->input->post('email'),
        "contact" => $this->input->post('contact'),*/
      ),
      "notes"  => array(
        "address"  => "Hello World",
        "merchant_order_id" => rand(),
      ),
      "theme"  => array(
        "color"  => "#F37254"
      ),
      "order_id" => $razorpayOrderId,
    );
    return $data;
  }
	
 
}
