<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model{

	public function updateProfile($params){
		$this->db->where('id', getUserId());
		$this->db->update('user',$params);
		return TRUE;
	}

	public function get_by_email($email)
	{
		$this->db->select('name, id');
		$this->db->where('id != ', getUserId());
		$this->db->where('email',$email);
	    $query = $this->db->get('user');
		$result =  $query->row();
		if($result){
			return $result;
		} else {
			return false;
		}
	}

	public function get_by_mobile($mobile)
	{
		$this->db->select('name, id');
		$this->db->where('id != ', getUserId());
		$this->db->where('phone_number',$mobile);
	    $query = $this->db->get('user');
		$result =  $query->row();
		if($result){
			return $result;
		} else {
			return false;
		}
	}

	public function getCurrentUser($user_id)
	{
		$this->db->select('id,name, email,phone_number');
		$this->db->from('user');
		$this->db->where('id',$user_id);
		$this->db->where('is_active',1);
		$query = $this->db->get();
		$userData = $query->row_array();
		
		if($userData){
			return $userData;
		} else {
			return false;
		}
	}

	public function changePassword($old_password,$new_password)
	{
		$this->db->select('password');
		$this->db->from('user');
		$this->db->where('id',getUserId());
		$query=$this->db->get();
		$userData = $query->row_array();
		if($userData){
		  if (password_verify($old_password, $userData['password'])) {
		      $params['password'] = password_hash($new_password, PASSWORD_BCRYPT);
		      $this->db->where('id', getUserId());
		      $this->db->update('user',$params);  
		      return 'Success';
		  } else {        
		     return 'Old Password Not Match';
		  }

		} else {
		  return false;
		}
	}

	public function saveBillingAddress($params)
	{	
		if($params['is_default'] == 1){
			$defaultStatus['is_default'] = 0;
		    $this->db->where('user_id', getUserId());
		    $this->db->update('user_address', $defaultStatus);  
		}
		$this->db->insert('user_address',$params);
        return $this->db->insert_id();
	}

	public function getBillingAddress()
	{
		$this->db->select('billing_first_name,billing_last_name,billing_email,billing_phone,billing_pincode,billing_city,billing_state,billing_address_1,billing_address_2, is_default, id');
		$this->db->from('user_address');
		$this->db->where('user_id',getUserId());
		$this->db->where('is_default',1);
		$billingAddressData = $this->db->get()->row_array();
		return $billingAddressData;
	}

	public function getBillingAddressDetails($addressId)
	{
		$this->db->select('billing_first_name,billing_last_name,billing_email,billing_phone,billing_pincode,billing_city,billing_state,billing_address_1,billing_address_2,is_default, id');
		$this->db->from('user_address');
		$this->db->where('id',$addressId);
		$billingAddressDetails = $this->db->get()->row_array();
		return $billingAddressDetails;
	}

	public function updateBillingAddress($params,$addressId)
	{
		$where = '(id="'.$addressId.'" and user_id = "'.getUserId().'")';
		$this->db->where($where);	   
        return $this->db->update('user_address', $params);
	}

	public function getCheckoutBillingAddress()
	{
		$this->db->select('billing_first_name,billing_last_name,billing_email,billing_phone,billing_pincode,billing_city,billing_state,billing_address_1,billing_address_2,is_default, id');
		$this->db->from('user_address');
		$this->db->where('user_id',getUserId());
		$this->db->where('is_default',1);
		$billingAddressData = $this->db->get()->row_array();
		return $billingAddressData;
	}


	public function getOrders()
	{
		$this->db->select('ord.id as order_id, ord.billing_first_name, ord.billing_last_name,ord.billing_email,ord.billing_phone,ord.billing_pincode,ord.billing_state,ord.billing_city,ord.billing_address_1,ord.billing_address_2,ord.discount,ord.order_status,ord.paid_amount,ord.sub_total,ord.promo_code,ord.custom_orderid,ord.created_at, ord.*');
		$this->db->from('orders as ord');
		$this->db->where('ord.user_id', getUserId());
		$this->db->order_by('ord.id', 'desc');
		$orderData = $this->db->get()->result_array();

		if($orderData){
			foreach ($orderData as $orderDataKey => $orderDataValue) {
				$orderData[$orderDataKey]['orderDetails'] = $this->getOrderDetails($orderDataValue['order_id']);
			}

			return $orderData;
		}

		return false;
	}

	public function getOrderDetails($order_id){
		$this->db->select('item.product_id, item.price, item.quantity,prod.product_name, prod.image_path,prod.slug');
		$this->db->from('order_item as item');
		$this->db->join('product AS prod','prod.id = item.product_id','left');
		$this->db->where('item.order_id',$order_id);
		$orderDetails = $this->db->get()->result_array();
		return $orderDetails;
	}

}

?>