<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model{
	
	public function saveReview($params){
		$this->db->insert('reviews',$params);
        return $this->db->insert_id();
	}

	public function getProductForReview_30102021($productId)
	{
		$this->db->select('prod.id, prod.product_name, prod.slug, prod.sku_code, prod.selling_price, prod.image_path');
		$this->db->from('order_item as item');
		$this->db->join('orders as order', 'order.id = item.order_id');
		$this->db->join('product as prod', 'prod.id = item.product_id');
		$this->db->group_by('prod.id');
		$where = '(prod.id="'.$productId.'" and order.user_id = "'.getUserId().'")';
		$this->db->where($where);	   
		$reviewProductData = $this->db->get()->row_array();
		return $reviewProductData;
		
	}

	public function getProductForReview($productId) {
		$reviewProductData = $this->db->query("SELECT a.id, a.custom_orderid, a.order_status, b.product_id, c.product_name, c.slug, c.sku_code, c.selling_price, c.image_path FROM orders as a
		INNER JOIN order_item as b ON a.id = b.order_id
		INNER JOIN product as c ON b.product_id = c.id
		WHERE a.user_id = ".getUserId()." ANd b.product_id = ".$productId." GROUP BY a.order_status")->result_object();

		if (!empty($reviewProductData)) {
			
			$ordersStatus = array();

			foreach ($reviewProductData as $data) {
				$ordersStatus[] = $data->order_status;
			}

			if (in_array('Order Delivered', $ordersStatus)) {
				return $reviewProductData[0];
			} else {
				return false;
			}

		} else {
			return false;
		}

	}

	public function productDetailsBySlug($slug)
	{
		$this->db->select('id');
		$this->db->from('product');
		$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('slug = ',$slug);
		$query = $this->db->get()->row_array();

		return $query;
	}

	public function getReview($productId)
	{
		$this->db->select('*');
		$this->db->from('reviews');
		// $this->db->where('is_active',1);
		$this->db->where('user_id',getUserId());
		$this->db->where('product_id = ',$productId);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function updateReview($params,$reviewId)
	{
		$where = '(id="'.$reviewId.'" and user_id = "'.getUserId().'")';
		$this->db->where($where);	   
        return $this->db->update('reviews', $params);
	}


}

?>