<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

	public function homeFeature()
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 != ',8);
		$this->db->where('featured = ',1);
		// $this->db->where('stock >= ',1);
		$this->db->order_by('id', 'desc');
		$this->db->limit(8, 0);
		$query=$this->db->get()->result_array();
		return $query;
	}

	public function homeProducts()
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 != ',8);
		// $this->db->where('stock >= ',1);
		$this->db->where('display_on_home', 1);
		$this->db->where('slug != ', 'beetle-bikes-home-assembly-service');
		$this->db->order_by('id', 'desc');
		$this->db->limit(8, 0);
		$query=$this->db->get()->result_array();
		return $query;
	}

	public function homeAccessories() {
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 = ',8);
		// $this->db->where('stock >= ',1);
		$this->db->order_by('id', 'desc');
		$this->db->limit(8, 0);
		$query=$this->db->get()->result_array();
		return $query;
	}

	public function homeSpares() {
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 = ',13);
		// $this->db->where('stock >= ',1);
		$this->db->order_by('id', 'desc');
		$this->db->limit(8, 0);
		$query=$this->db->get()->result_array();
		return $query;
	}

	public function cartAccessories()
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 = ',8);
		// $this->db->where('stock >= ',1);
		$this->db->where_in('SHA2(id, 256)', array('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918'));
		$this->db->order_by('id', 'desc');
		$this->db->limit(3, 0);
		$query=$this->db->get()->result_array();
		return $query;
	}

	public function productDetailsBySlug($slug)
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, description, specifications, category_level_1, sku_code, hsn_code, dimension, net_weight, wheel_size, frame_size, frame_material, tyre_type, handle_type, break_type,age_range,stock,meta_title,meta_key_words,meta_description');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('slug = ',$slug);
		$query = $this->db->get()->row_array();

		if($query){
			$query['productAttribute']  = $this->productAttribute($query['id']);			
			$query['gallery']  = $this->productGallery($query['id']);
			$query['related_products']  = $this->relatedProducts($query['category_level_1']);
			$query['productRating']  = $this->productRating($query['id']);
			$query['count_total_rating']  = $this->count_total_rating($query['id']);
		}

		return $query;
	}

	public function productGallery($product_id)
	{
		$this->db->select('image_path');
		$this->db->from('product_image');
		$this->db->where('product_id',$product_id);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function productAttribute($product_id)
	{
		$this->db->distinct();
		$this->db->select('att_name.name as att_name, att_name.id as att_name_id');
		$this->db->from('product_selected_attributes as sel_prod');
		$this->db->where('sel_prod.product_id',$product_id);
		$this->db->join('attribute_name AS att_name','att_name.id = sel_prod.attribute_name','left');
		//$this->db->join('attribute_value AS att_value','att_value.id = sel_prod.attribute_value','left');
		$productAttributeData = $this->db->get()->result_array();
		$productAttributeValue = [];
		if($productAttributeData){
			foreach ($productAttributeData as $key => $value) {
				$getProductAttributeValue = $this->productAttributeValue($product_id,$value['att_name_id']);
				if($getProductAttributeValue){
					$productAttributeValue[$value['att_name']] = $getProductAttributeValue;
				}
			}
		}
		
		if($productAttributeValue){
			return $productAttributeValue;
		} else {
			return $productAttributeData;
		}
		
	}

	public function productAttributeValue($product_id,$att_name_id)
	{
		$this->db->select('att_value.name as att_value');
		$this->db->from('product_selected_attributes as sel_prod');
		$this->db->where('sel_prod.product_id',$product_id);
		$this->db->where('sel_prod.attribute_name',$att_name_id);
		$this->db->join('attribute_value AS att_value','att_value.id = sel_prod.attribute_value','left');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function relatedProducts($category_id)
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, description, category_level_1, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('category_level_1 = ', $category_id);
		// $this->db->where('stock >= ',1);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function productRating($productId)
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->where('is_active',1);
		$this->db->where('product_id = ',$productId);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function categoriesWithPrdouctsCount()
	{
		$this->db->select('cat.id as cat_id, cat.category, COUNT(prod.id) as product_count');
		$this->db->from('category as cat');
		$this->db->join('product as prod', 'cat.id = prod.category_level_1', 'inner');
		//$this->db->where('prod.available_date <=', date('Y-m-d'));
		$this->db->where('DATE(prod.available_date) <=', date('Y-m-d'));
		$this->db->where('prod.is_active',1);
		// $this->db->where('prod.stock >= ',1);
		$this->db->group_by('cat.category');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function productListAttributeName()
	{
		$this->db->distinct();
		$this->db->order_by('att_name.display_order', 'asc');
		$this->db->select('att_name.name as att_name, att_name.id as att_name_id');
		$this->db->from('product_selected_attributes as sel_prod');
		$this->db->join('attribute_name AS att_name','att_name.id = sel_prod.attribute_name','left');
		//$this->db->join('attribute_value AS att_value','att_value.id = sel_prod.attribute_value','left');
		$productAttributeData = $this->db->get()->result_array();

		$productAttributeValue = [];
		if($productAttributeData){
			foreach ($productAttributeData as $key => $value) {
				$getProductAttributeValue = $this->productListAttributeValue($value['att_name_id']);				
				if($getProductAttributeValue){
					$productAttributeValue[$value['att_name']] = $getProductAttributeValue;
				}
			}
		}
		
		if($productAttributeValue){
			return $productAttributeValue;
		} else {
			return $productAttributeData;
		}
		
	}

	public function productListAttributeValue($att_name_id)
	{
		$this->db->distinct();
		$this->db->select('att_value.id as att_value_id, att_value.name as att_value,  COUNT(sel_prod.product_id) as product_count');
		$this->db->from('product_selected_attributes as sel_prod');
		$this->db->where('sel_prod.attribute_name',$att_name_id);
		$this->db->where('a.is_active',1);
		$this->db->where('att_value.is_active',1);
		$this->db->join('attribute_value AS att_value','att_value.id = sel_prod.attribute_value','left');
		$this->db->join('product as a','sel_prod.product_id = a.id','INNER');
		$this->db->group_by('att_value.id');
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function allProductsCount($price)
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		// $this->db->where('stock >= ',1);
		//$this->db->where('slug != ', 'beetle-bikes-home-assembly-service');
		
		$priceArray = explode(',', $price);

		$minvalue = $priceArray[0];
		$maxvalue = $priceArray[1];

		$this->db->where("mrp BETWEEN '$minvalue' AND '$maxvalue'");
		$this->db->order_by('display_order');
		$query = $this->db->get()->num_rows();
		return $query;
	}

	public function allProducts($limit,$start, $sort,$price)
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, sku_code, description, specifications');
		$this->db->from('product');
		//$this->db->where('available_date >=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		//$this->db->where('slug != ', 'beetle-bikes-home-assembly-service');
		// $this->db->where('stock >= ',1);

		$priceArray = explode(',', $price);

		$minvalue = $priceArray[0];
		$maxvalue = $priceArray[1];

		$this->db->where("mrp BETWEEN '$minvalue' AND '$maxvalue'");

		/*echo '<pre>';
		print_r($priceArray);
		echo '</pre>';
		exit;*/

		switch ($sort) {
		  case "Newest":
		    $this->db->order_by('id', 'desc');
		    break;
		 
		  case "Price Low":
		     $this->db->order_by('mrp', 'asc');
		    break;
		  case "Price High":
		     $this->db->order_by('mrp', 'desc');
		    break;
		  default:
		    $this->db->order_by('display_order');
		}
		
		$this->db->limit($limit, $start);

		$query = $this->db->get()->result_array();
		return $query;
	}

	public function productDetailsById($id)
	{
		$this->db->select('product_name, slug, mrp, selling_price, id, image_path, description, category_level_1, sku_code, hsn_code, dimension, net_weight, wheel_size, frame_size, frame_material, tyre_type, handle_type, break_type,age_range,stock,meta_title,meta_key_words,meta_description');
		$this->db->from('product');
		//$this->db->where('available_date <=', date('Y-m-d'));
		$this->db->where('DATE(available_date) <=', date('Y-m-d'));
		$this->db->where('is_active',1);
		$this->db->where('id = ',$id);
		$query = $this->db->get()->row_array();
		
		return $query;
	}

	public function checkProductStock($product_id)
	{
		$this->db->select('stock, product_name');
		$this->db->from('product');
		$this->db->where('id = ',$product_id);
		$query = $this->db->get()->row_array();
		return $query;
	}


	function saveCart($params)
    {    	
    	$get_cart_product = $this->getCartProduct($params);
    	if($get_cart_product){
    	 	$data['quantity'] = $params['quantity'];
        	$this->db->where('id', $get_cart_product['id']);
        	return $this->db->update('cart',$data);
    	} else {
    		$this->db->insert('cart',$params);
        	return $this->db->insert_id();
    	}
    }	

    function updateCart($product_id,$qty)
    {  
    	if ($this->session->userdata('userSess')) {          
            $user_id = getUserId();
        } else {
            $user_id = NULL;
        }

		if ($this->session->userdata('temp_cart_id')) {  
			$temp_cart_id['temp_cart_id'] = $this->session->userdata('temp_cart_id');
        } else {
            $temp_cart_id['temp_cart_id'] = session_id();        
            $this->session->set_userdata($temp_cart_id); 
        }

      
        $params =  array("product_id" => $product_id, "temp_cart_id" => $temp_cart_id['temp_cart_id'], "user_id" => $user_id);

    	$get_cart_product = $this->getCartProduct($params);

    	$checkProductStock = $this->product_model->checkProductStock($product_id);

    	if($checkProductStock['stock'] < $qty){
    		$data = array(
		            	"status"   		=> 'fail',
		            	"stock"   		=> $checkProductStock['stock'],
		            	'product_name'  => $checkProductStock['product_name'],
		            );

            return $data;
            
    	} else if($get_cart_product){
    	 	$data['quantity'] = $qty;
        	$this->db->where('id', $get_cart_product['id']);
        	return $this->db->update('cart',$data);
    	}

    }

    public function getCartProduct($params)
	{
		$this->db->select('id');
		
		if($params['user_id']){
			$this->db->where('user_id',$params['user_id']);
		} else if($params['temp_cart_id']){
			$this->db->where('temp_cart_id',$params['temp_cart_id']);
		}
		
		$this->db->where('product_id', $params['product_id']);
		$this->db->from('cart');
		$query = $this->db->get()->row_array();

		return $query;
	}

 	function removeCartProduct($product_id)
  	{
  		if ($this->session->userdata('userSess')) {          
	       $this->db->where('user_id',getUserId());
	    } else if ($this->session->userdata('temp_cart_id')) {  
	       $this->db->where('temp_cart_id',$this->session->userdata('temp_cart_id'));
	      }

	    $this->db->where('product_id', $product_id);
	    $this->db->delete('cart');
	    return  $this->db->affected_rows();
  	}

  	function saveWishlist($params)
    {
    	$this->db->insert('wishlist',$params);
        return $this->db->insert_id();
    }

  	function removeWishlistProduct($product_id)
    {
    	if ($this->session->userdata('userSess')) {          
	       $this->db->where('user_id',getUserId());
	    } else if ($this->session->userdata('temp_cart_id')) {  
	       $this->db->where('temp_wishlist_id',$this->session->userdata('temp_cart_id'));
	      }

    	$this->db->where('product_id', $product_id);
	    $this->db->delete('wishlist');
	    return  $this->db->affected_rows();
    }

    public function checkPincode($params)
	{
		$this->db->select('delivery_days');		
		$this->db->where('pincode', $params);
		$this->db->from('pincode');
		$query = $this->db->get()->row_array();
		return $query;
	}



	public function filterProducts($limit, $start, $sort, $price, $attributes, $category,$productName)
	{
		$this->db->select('prod.product_name, prod.slug, prod.mrp, prod.selling_price, prod.id, prod.image_path, prod.sku_code, description, specifications');
		$this->db->from('product as prod');
		//$this->db->where('prod.available_date <=', date('Y-m-d'));
		$this->db->where('DATE(prod.available_date) <=', date('Y-m-d'));
		$this->db->where('prod.is_active',1);
		// $this->db->where('prod.stock >= ',1);
		//$this->db->where('slug != ', 'beetle-bikes-home-assembly-service');

		$priceArray = explode(',', $price);

		$minvalue = $priceArray[0];
		$maxvalue = $priceArray[1];

		$this->db->where("prod.mrp BETWEEN '$minvalue' AND '$maxvalue'");

		if($productName){
			$this->db->where("(prod.product_name LIKE '%$productName%')"); 
		}

		if($attributes){
			$attributesArray = explode(',', $attributes);			
			$this->db->join('product_selected_attributes AS selected_attributes','selected_attributes.product_id = prod.id','right');
			$this->db->where_in('selected_attributes.attribute_value', $attributesArray);
		}

		if($category){
			$categoryArray = explode(',', $category);			
			$this->db->where_in('prod.category_level_1', $categoryArray);
		}

		switch ($sort) {
		  case "Newest":
		    $this->db->order_by('prod.id', 'desc');
		    break;
		  case "Price Low":
		     $this->db->order_by('prod.mrp', 'asc');
		    break;
		  case "Price High":
		     $this->db->order_by('prod.mrp', 'desc');
		    break;
		  default:
		    $this->db->order_by('prod.display_order');
		}
		
		$this->db->limit($limit, $start);
		$this->db->group_by('prod.id');
		$query = $this->db->get()->result_array();

		return $query;
	}

	public function filterProductsCount($price, $attributes, $category, $productName)
	{
		$this->db->select('prod.id');
		$this->db->from('product as prod');
		//$this->db->where('prod.available_date <=', date('Y-m-d'));
		$this->db->where('DATE(prod.available_date) <=', date('Y-m-d'));
		$this->db->where('prod.is_active',1);
		// $this->db->where('prod.stock >= ',1);

		$priceArray = explode(',', $price);

		$minvalue = $priceArray[0];
		$maxvalue = $priceArray[1];

		$this->db->where("prod.mrp BETWEEN '$minvalue' AND '$maxvalue'");

		if($productName){
			$this->db->where("(prod.product_name LIKE '%$productName%')"); 
		}

		if($attributes){
			$attributesArray = explode(',', $attributes);
			$this->db->join('product_selected_attributes AS selected_attributes','selected_attributes.product_id = prod.id','right');
			$this->db->where_in('selected_attributes.attribute_value', $attributesArray);
		}

		if($category){
			$categoryArray = explode(',', $category);			
			$this->db->where_in('prod.category_level_1', $categoryArray);
		}
		$this->db->group_by('prod.id');
		$this->db->order_by('display_order');
		$query = $this->db->get()->num_rows();

		return $query;
	}
	
	public function checkCouponCode($couponCode)
	{
		$this->db->select('id,promo_title,discount_type,promo_code,start_date,end_date,discount,discount_type,category,sub_category,exclusion_sub_category,exclusion_sku,inclusion_product, usage_time, min_cart_value,max_discount,multi_time_value,stock');
		$this->db->where('start_date <=', date('Y-m-d'));		
		$this->db->where('end_date >=', date('Y-m-d'));		
		$this->db->where('promo_code', $couponCode);
		$this->db->where('is_active', 1);
		// $this->db->where('stock >= ',1);
		$this->db->from('promo_code');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	public function checkOrderCouponCode($couponCode)
	{
		$this->db->select('promo_code');
		$this->db->where('user_id',getUserId());
		$this->db->from('orders');
		$query = $this->db->get()->num_rows();
		return $query;
	}

	public function count_total_rating($productId) {
	    $this->db->select_avg('rating');
	    $this->db->where('product_id', $productId);
	    $this->db->where('is_active', 1);
	    $this->db->from('reviews');
	    $query = $this->db->get()->row_array();

	    if($query){
	    	$rating = ceil($query['rating']);
	    } else {
	    	$rating = 0;
	    }
	    
	    return $rating;
	}

}

?>