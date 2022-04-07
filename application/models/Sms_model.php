<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model {

	public function __construct() {
		parent::__construct();

		$this->config = array(
			'baseUrl' => 'https://www.smsgatewayhub.com/api/mt/SendSMS?',
			'apiKey' => 'gvp32uzoRkqT9YJk8yOm6w',
			'senderId' => 'BEETLE',
			'entityId' => '1001512040000062695'
		);

	}

	public function sendOtp($number, $otp) {

		$template = 'Your OTP is '.$otp.' to verify your mobile number and register your profile on Beetle Bikes online store.';

		$data = array(
			'APIKey'=> $this->config['apiKey'],
			'senderid'=> $this->config['senderId'],
			'channel'=> 2,
			'DCS' => 0,
			'flashsms' => 0,
			'number' => '91'.$number,
			'text' => $template,
			'EntityId'=> $this->config['entityId'],
			'dlttemplateid' => 1007163497332072241
		);
        
       	$postString = http_build_query($data);

       	$url = $this->config['baseUrl'].$postString;
       	$res = $this->curl($url,$postString,false);
       	
       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
       		return true;
       	} else {
       		return false;
       	}
 		
	}

	public function sendResetPassOtp($number, $otp) {
		$template = 'Your OTP is '.$otp.' to reset your password on beetlebikes.in';

		$data = array(
			'APIKey'=> $this->config['apiKey'],
			'senderid'=> $this->config['senderId'],
			'channel'=> 2,
			'DCS' => 0,
			'flashsms' => 0,
			'number' => '91'.$number,
			'text' => $template,
			'EntityId'=> $this->config['entityId'],
			'dlttemplateid' => 1007163497338943048
		);
        
       	$postString = http_build_query($data);

       	$url = $this->config['baseUrl'].$postString;
       	$res = $this->curl($url,$postString,false);
       	
       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
       		return true;
       	} else {
       		return false;
       	}
 		
	}

	public function orderConfirm($orderId) {

		$orderData = $this->db->get_where('orders', array('id' => $orderId))->row();

		if (!empty($orderData)) {

			$name = $orderData->billing_first_name;
			$number = $orderData->billing_phone;
			
			$template = 'Hi '.$name.', your order has been successfully placed. Please check your registered email ID for shipping details. Team Beetle Bikes';

			$data = array(
				'APIKey'=> $this->config['apiKey'],
				'senderid'=> $this->config['senderId'],
				'channel'=> 2,
				'DCS' => 0,
				'flashsms' => 0,
				'number' => '91'.$number,
				'text' => $template,
				'EntityId'=> $this->config['entityId'],
				'dlttemplateid' => 1007163497345988411
			);
	        
	       	$postString = http_build_query($data);

	       	$url = $this->config['baseUrl'].$postString;
	       	$res = $this->curl($url,$postString,false);
	       	
	       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
	       		return true;
	       	} else {
	       		return false;
	       	}

		} else {
			return false;
		}
		
	}

	public function orderDelivered($orderId) {

		$orderData = $this->db->get_where('orders', array('id' => $orderId))->row();

		$number = $orderData->billing_phone;

		$productNames = $this->db->query("SELECT GROUP_CONCAT(b.product_name SEPARATOR ', ') as productName FROM order_item as a
		INNER JOIN product as b ON a.product_id = b.id
		WHERE a.order_id = ".$orderId)->row('productName');

		//$template = "Delivered: We have delivered ".$productNames." today! We'd love to hear about your experience. Review & register your product here - bettlebikes.in";

		$template = "Delivered: We have delivered ".strtoupper($orderData->custom_orderid)." today! We'd love to hear about your experience. Review & register your product here - bettlebikes.in";

		$data = array(
			'APIKey'=> $this->config['apiKey'],
			'senderid'=> $this->config['senderId'],
			'channel'=> 2,
			'DCS' => 0,
			'flashsms' => 0,
			'number' => '91'.$number,
			'text' => $template,
			'EntityId'=> $this->config['entityId'],
			'dlttemplateid' => 1007163498859734214
		);
        
       	$postString = http_build_query($data);

       	$url = $this->config['baseUrl'].$postString;
       	$res = $this->curl($url,$postString,false);
       	
       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
       		return true;
       	} else {
       		return false;
       	}
	}

	public function orderCancelByCustomer($orderId) {

		$orderData = $this->db->get_where('orders', array('id' => $orderId))->row();

		if (!empty($orderData)) {

			$name = $orderData->billing_first_name;
			$number = $orderData->billing_phone;
			$orderId = strtoupper($orderData->custom_orderid);
			$amount = $orderData->paid_amount;

			$template = "Cancelled: As requested, we have cancelled your order containing ".$orderId.". Refund of Amount ".$amount." has been initiated & will reflect back to the source of payment in 7-10 days. For more details, click here ".base_url('login').". Team Beetle Bikes";

			$data = array(
				'APIKey'=> $this->config['apiKey'],
				'senderid'=> $this->config['senderId'],
				'channel'=> 2,
				'DCS' => 0,
				'flashsms' => 0,
				'number' => '91'.$number,
				'text' => $template,
				'EntityId'=> $this->config['entityId'],
				'dlttemplateid' => 1007163556240873372
			);
	        
	       	$postString = http_build_query($data);

	       	$url = $this->config['baseUrl'].$postString;
	       	$res = $this->curl($url,$postString,false);
	       	
	       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
	       		return true;
	       	} else {
	       		return false;
	       	}

		} else {
			return false;
		}
		
	}

	public function orderCancelByAdmin($orderId) {

		$orderData = $this->db->get_where('orders', array('id' => $orderId))->row();

		if (!empty($orderData)) {

			$name = $orderData->billing_first_name;
			$number = $orderData->billing_phone;
			$orderId = strtoupper($orderData->custom_orderid);
			$amount = $orderData->paid_amount;

			$template = "Cancelled: Your order ".$orderId." has been cancelled due to unavoidable circumstances. Refund of Amount ".$amount." has been initiated & will reflect back to the source of payment in 7-10 days. For more details, click here ".base_url('login').". Team Beetle Bikes";

			$data = array(
				'APIKey'=> $this->config['apiKey'],
				'senderid'=> $this->config['senderId'],
				'channel'=> 2,
				'DCS' => 0,
				'flashsms' => 0,
				'number' => '91'.$number,
				'text' => $template,
				'EntityId'=> $this->config['entityId'],
				'dlttemplateid' => 1007163556311943796
			);
	        
	       	$postString = http_build_query($data);

	       	$url = $this->config['baseUrl'].$postString;
	       	$res = $this->curl($url,$postString,false);
	       	
	       	if (isset($res['ErrorCode']) && $res['ErrorCode'] == 000) {
	       		return true;
	       	} else {
	       		return false;
	       	}

		} else {
			return false;
		}
		
	}


	public function curl($url,$postdata, $headers=array()) {

        $curl = curl_init($url);        
        curl_setopt($curl, CURLOPT_POST,1 );

        if (!empty($headers)) {
        	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        $result = json_decode($result,true);
        return $result;
    }

}

/* End of file Sms_model.php */
/* Location: ./application/models/Sms_model.php */