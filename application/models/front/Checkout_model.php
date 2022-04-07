<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model{
	
	public function create_razorpay_order($paidAmount) {
		$paidAmount = $paidAmount * 100;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.razorpay.com/v1/orders",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>"{\n  \"amount\": ".$paidAmount.",\n  \"currency\": \"INR\",\n  \"payment_capture\": 1\n}",
		CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    // "Authorization: Basic cnpwX3Rlc3RfSnpBM1lQVFRRZnFwVDg6RlRVYkxIREYwTWxYenZmVkxZUmFkYVEx"
		    "Authorization: Basic ".base64_encode(RAZOR_KEY_ID.':'.RAZOR_KEY_SECRET)
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		if (!empty($response)) {
			$response = json_decode($response);

			if (!empty($response->id)) {
				return $response->id;
			} else {
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function razorpay_payment_status($paymentId) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.razorpay.com/v1/payments/".$paymentId,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => 	array(
								    "Content-Type: application/json",
								    "Authorization: Basic ".base64_encode(RAZOR_KEY_ID.':'.RAZOR_KEY_SECRET)
								  ),
								));

		$response = curl_exec($curl);

		curl_close($curl);
		
		if (!empty($response)) {
			$response = json_decode($response);

			if (!empty($response->id)) {
				return $response;
			} else {
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function saveOrder($params,$order_no)
	{
		$this->db->insert('orders',$params);
    $orderID = $this->db->insert_id();
   
    $cartList = $this->session->userdata('cartData');
    
    if($cartList){     
      $total = $cartListData = [];
      foreach ($cartList as $cartList_key => $cartList_value) {
        $cartDetails = []; 
        $cartDetails['order_id'] = $orderID;
        if($cartList_value['selling_price']){
      		$cartDetails['price'] = $cartList_value['selling_price']; 
		    } else {
		    	$cartDetails['price'] = $cartList_value['mrp']; 
		    } 
		       
        $cartDetails['product_id'] = $cartList_value['id']; 
        $cartDetails['quantity'] = $cartList_value['cart_qty']; 
         
        $this->db->insert('order_item',$cartDetails);
        $this->db->insert_id();

        // Delete Cart
        $this->db->where('id', $cartList_value['cart_id']);
        $this->db->delete('cart');

        // Update Product Quantity
        $this->updateProductStock($cartList_value['id'],$cartList_value['cart_qty']);
      }
    }


    if (isset($orderID) && !empty($orderID)) {
    	$this->Email_sending->order($orderID);
    	$this->Sms_model->orderConfirm($orderID);
    }

	}

	public function checkShippingAvailability($params)
	{
		$this->db->select('id');		
		$this->db->where('pincode', $params);
		$this->db->from('pincode');
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function updateCouponStock($couponData)
	{		

		$id = $couponData['promo_id'];

		$this->db->query('UPDATE promo_code SET stock = stock - 1 WHERE id = '.$id.' ');
		// if($couponData['stock'] == 1){
		// 	$params['stock'] = 0;
		// } else {
		// 	$params['stock'] = $couponData['stock'] - 1;
		// }

		// $this->db->where('id', $couponData['id']); 
  //   return $this->db->update('promo_code', $params);
	}

	public function updateProductStock($productId,$qty)
	{		
		$productStock = $this->productStockById($productId);
		$currentStock = $productStock - $qty;
		$params['stock'] = abs($currentStock);

		$this->db->where('id', $productId); 
    return $this->db->update('product', $params);
	}

	public function productStockById($id)
	{
		$this->db->select('stock');
		$this->db->from('product');
		$this->db->where('id = ',$id);
		$query = $this->db->get()->row_array();
		return $query['stock'];
	}

}




?>