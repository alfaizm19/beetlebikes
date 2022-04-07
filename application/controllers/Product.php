<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Product_model','product_model');
      	$this->load->helper('common_helper');


    }

	public function home()
	{
		$this->load->view('welcome_message');
	}

	public function productListAjax(){
		$search = [];
        $this->load->library("pagination");
        $config = array();
        
        $config["base_url"] = base_url() . "products";
        $config['reuse_query_string'] = true;

        if(isset($_POST['price'])){
	      	$price = $_POST['price'];
	      	$price = str_replace('$', '', $price);
	      	$price = str_replace('₹', '', $price);
	    }

        if(isset($_POST['category']) || isset($_POST['attribute'])  || isset($_POST['productName'])){
	      $category = $attribute = [];
	      $productName = '';
	      if(!empty($_POST['productName'])){
	      	$productName = $_POST['productName'];
	      }
	      if(!empty($_POST['category'])){
	      	$category = $_POST['category'];
	      }

	      if(!empty($_POST['attribute'])){
	      	$attribute = $_POST['attribute'];
	      }
           
	        $config["total_rows"] = $this->product_model->filterProductsCount($price,$attribute,$category,$productName);
        } else {
        	$config["total_rows"] = $this->product_model->allProductsCount($price);
        }

        $sort = 'Default';
	    if(isset($_POST['sort'])){
	      	$sort = $_POST['sort'];
	    }



        $perPage = 9;
	    if(isset($_POST['perPage'])){
	      	$perPage = $_POST['perPage'];
	    }

        
        $config["per_page"] = $perPage;
        $config["uri_segment"] = 2;
        $config['num_links'] = 5;

        //Encapsulate whole pagination 
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        //First link of pagination
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        //Customizing the “Digit” Link
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //For PREVIOUS PAGE Setup
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        //For NEXT PAGE Setup
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        //For LAST PAGE Setup
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        //For CURRENT page on which you are
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
      
       
        if(isset($_POST['page'])){
          	$page = ($_POST['page']);
        } else {
        	$page = 0;
        }

	   
       	if(isset($_POST['category']) || isset($_POST['attribute'])){
          $category = $attribute = [];

          if(!empty($_POST['category'])){
	      	$category = $_POST['category'];
	      }

	      if(!empty($_POST['attribute'])){
	      	$attribute = $_POST['attribute'];
	      }
        
           $data["allProducts"]  = $this->product_model->filterProducts($config["per_page"], $page, $sort,$price,$attribute,$category,$productName);
        } else{
            
            $data["allProducts"]  = $this->product_model->allProducts($config["per_page"], $page, $sort,$price);
        }
       
       	$ajaxProductsContent = $this->load->view('front/ajaxProductsContent',$data, TRUE);
       /* $json_data = 	array(
		            	
			            	"ajaxProductsContent"   => $this->load->view('front/ajaxProductsContent',$data),
			             );*/

        //echo json_encode($json_data);

        echo $ajaxProductsContent;

	}

	public function index()
	{
		$data["categoriesWithPrdouctCount"] = $this->product_model->categoriesWithPrdouctsCount();
		$data["attributesPrdouct"] = $this->product_model->productListAttributeName();

		$data['middleContent']   = 'front/products';
        $data['pageTitle']       = 'Listing';
		$this->load->view('front/template',$data);
        
	}

	public function details()
	{
		$data["productDetails"] = $this->product_model->productDetailsBySlug($this->uri->segment(2));
		$data["getProductForReview"] = $data["getReview"] = [];

		if ($this->session->userdata('userSess')) {
			$this->load->model('front/Review_model','review_model');
			$data["getProductForReview"] = $this->review_model->getProductForReview($data["productDetails"]['id']);

			if($data["getProductForReview"]){
				$data["getReview"] = $this->review_model->getReview($data["productDetails"]['id']);
			}
		}		
		
		if($data["productDetails"]){
			$data['middleContent']   = 'front/productDetails';
	        $data['pageTitle']       = $data["productDetails"]['product_name'];
			$data["meta_title"] = $data["productDetails"]['meta_title'];
			$data["meta_key_words"] = $data["productDetails"]['meta_key_words'];
			$data["meta_description"] = $data["productDetails"]['meta_description'];
	        $this->load->view('front/template',$data);
		} else {
			
			redirect( base_url(), 'refresh' );
		}
		
	}

	public function removeCartProduct(){
		$removeCartProduct = $this->product_model->removeCartProduct($_POST['product_id']);
		if($removeCartProduct){
        	
        	$data["cart_data"] = cart_data();
        	if($data["cart_data"]){
        		$cartCount = count($data["cart_data"]);
        	} else {
        		$cartCount = 0;
        	}
        	$data["header_cart_html"] = header_cart_html($data["cart_data"]);
	        $json_data = array(
	        	"cartList"  => $data["header_cart_html"],
	        	"cartCount" => $cartCount,
            	"status"    => 'success',
            );
        } else {
        	$json_data = array(
            	"status"   => 'fail',
            );
        }

        echo json_encode($json_data);
	}

	public function addCartProduct(){

        $data = array();

        $this->session->unset_userdata('couponData');
        
        
        $getProductDetails = $this->product_model->productDetailsById($_POST['product_id']);

        if($getProductDetails){

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

	        if(isset($_POST['cart_product_qty'])){
	        	$qty = $_POST['cart_product_qty'];
	        } else {
	        	$qty = 1;
	        }

	        $checkProductStock = $this->product_model->checkProductStock($_POST['product_id']);

	    	if($checkProductStock['stock'] < $qty){
	    		$json_data = array(
	            	"status"   => 'fail',
	            	"stock"   => $checkProductStock['stock'],
	            );
	            
	    	} else {

	    		$data['products'] =  array("quantity" => $qty, "name" => $getProductDetails['product_name'],  "product_id" => $_POST['product_id'], "temp_cart_id" => $temp_cart_id['temp_cart_id'], "user_id" => $user_id);

		        $save_cart_status = $this->product_model->saveCart($data['products']);

		        if($save_cart_status){

		        	$productData = $this->Master_model->getProductById($_POST['product_id']);

		        	$items = array(
				        'items' => array(
				            array(
				                'item_name' => $productData->product_name,
				                'item_id' => $productData->sku_code,
				                'price' => $productData->selling_price,
				                'item_brand' => 'Beetle Bikes',
				                'item_category' => $this->Master_model->getCategoryById($productData->category_level_1),
				                'item_category2' => '',
				                'item_category2' => '',
				                'item_category3' => '',
				                'item_category4' => '',
				                'item_variant' => '',
				                'item_list_name' => '',
				                'item_list_name' => '',
				                'item_list_id' => '',
				                'index' => '',
				                'quantity' => $qty
				            )
				        )
				    );

		        	$data["cart_data"] = cart_data();
		        	$data["header_cart_html"] = header_cart_html($data["cart_data"]);
		        	if($data["cart_data"]){
		        		$cartCount = count($data["cart_data"]);
		        	} else {
		        		$cartCount = 0;
		        	}
			        $json_data = array(
			        	//"cartList"  => $data["cart_data"],
			        	"cartList"  => $data["header_cart_html"],
			        	"cartCount" => $cartCount,
			        	'dataLayer' => json_encode($items),
		            	"status"    => 'success',
		             );

		        } else {
		        	$json_data = array(
		            	"status"   => 'fail',
		            );
		        }
	    	}

	        echo json_encode($json_data);
	    } else {
    		$json_data = array(
            	"status"   => 'fail',
            );
	    	echo json_encode($json_data);
	    } 

    }

    public function removeWishlistProduct(){

		$removeWishlistProduct = $this->product_model->removeWishlistProduct($_POST['product_id']);

		if($removeWishlistProduct){
        	$data["wishlistData"] = wishlist_data();
        	$data["cart_data"] = cart_data();

        	if($data["wishlistData"]){
        		$wishlistCount = count($data["wishlistData"]);
        	} else {
        		$wishlistCount = 0;
        	}

	        $json_data =    array(
					        	"wishlist" => $data["wishlistData"],
				            	"status"   => 'success',
				            	"count"    => $wishlistCount,
				            );
        } else {
        	$json_data = array(
            	"status"   => 'fail',
            );
        }

        echo json_encode($json_data);
	}


	public function addWishlistProduct(){

        $data = array();
        
        $getProductDetails = $this->product_model->productDetailsById($_POST['product_id']);

        if($getProductDetails){

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

	        if(isset($_POST['cart_product_qty'])){
	        	$qty = $_POST['cart_product_qty'];
	        } else {
	        	$qty = 1;
	        }

	        $data['products'] =  array("product_id" => $_POST['product_id'], "temp_wishlist_id" => $temp_cart_id['temp_cart_id'], "user_id" => $user_id);

	        $save_cart_status = $this->product_model->saveWishlist($data['products']);


	        if($save_cart_status){
	        	$data["wishlistData"] = wishlist_data();
		        $json_data = array(
		        	"wishlist" => $data["wishlistData"],
		        	"count" => count($data["wishlistData"]),
	            	"status"   => 'success',
	            );
	        } else {
	        	$json_data = array(
	            	"status"   => 'fail',
	            );
	        }

	        echo json_encode($json_data);

	    } else {

    		$json_data = array(
            	"status"   => 'fail',
            );
	    	echo json_encode($json_data);
	    }    
   	}

	public function cartHeader(){
		$data["cart_data"] = cart_data();
    	$data["header_cart_html"] = header_cart_html($data["cart_data"]);
    	if($data["cart_data"]){
    		$cartCount = count($data["cart_data"]);
    	} else {
    		$cartCount = 0;
    	}
        $json_data = array(
			        	//"cartList"  => $data["cart_data"],
			        	"cartList"  => $data["header_cart_html"],
			        	"cartCount" => $cartCount,
		            	"status"    => 'success',
		             );
        echo json_encode($json_data);
	}

	public function cartUpdate(){
		if(isset($_POST['updateCart']) && $_POST['updateCart'] == 1){
			$statusArray = [];

			/*
			foreach ($_POST['qty'] as $qty_key => $qty_value) {				
				$updateCart = $this->product_model->updateCart($qty_key,$qty_value);
				if(is_array($updateCart)){
					$statusArray[$qty_key] = $updateCart;
				}
			}
			*/

			$updateCart = $this->product_model->updateCart($_POST['productId'],$_POST['qty']);
			if(is_array($updateCart)){
				$statusArray[$_POST['productId']] = $updateCart;
			}

			if($statusArray){

				$this->session->set_flashdata('error_cart_product_data',$statusArray);
			}   else {
					$this->session->set_flashdata('update_cart_product','Please try again');
				}
		}

		$data['cart_data'] 		 = cart_data();

		$json_data = array(
		            	"ajaxCartContent"   => $this->load->view('front/ajaxCartList',$data),
		             );

        echo json_encode($json_data);
	}


	public function checkCouponCode(){
		
		$checkCouponCodeSatus = $this->product_model->checkCouponCode($_POST['couponCode']);

		if($checkCouponCodeSatus){
			// check coupon code single use or multiple use
			$checkOrderCouponCode = $this->product_model->checkOrderCouponCode($_POST['couponCode']);

			if($checkOrderCouponCode){

				if($checkCouponCodeSatus['usage_time'] == 'single'){
					$json_data = array(
					            	"status"   => 'fail',
					             );
				} else if($checkCouponCodeSatus['usage_time'] == 'multiple'){

					if($checkCouponCodeSatus['multi_time_value'] >= $checkOrderCouponCode){
						$_SESSION['couponData'] = $checkCouponCodeSatus;
						$this->session->set_flashdata('couponVerify','Coupon code added to you cart');
						$json_data = array(
						            	"status"   => 'success',
						             );
					} else {
						$json_data = array(
			            	"status"   => 'fail',
			             );
					}
				}
			} else {
				$_SESSION['couponData'] = $checkCouponCodeSatus;
				$this->session->set_flashdata('couponVerify','Coupon code added to you cart');
				$json_data = array(
				            	"status"   => 'success',
				             );
			}

			
		} else {
			$json_data = array(
			            	"status"   => 'fail',
			             );
		}

		echo json_encode($json_data);
	}
	public function cart()
	{

		$this->session->unset_userdata('couponData');

		$data['cart_data'] 		 = cart_data();
		if($data['cart_data']){
			$data['middleContent']   = 'front/cartList';
        	$data['pageTitle']       = 'Cart';
        	$this->load->view('front/template',$data);
		} else {
			 redirect( base_url().'products', 'refresh' );
		}
		
	}	

	public function wishlist()
	{		
		$data['wishlist_data'] 		 =  wishlist_data();
		if($data['wishlist_data']){
			$data['middleContent']   	 = 'front/wishList';
	        $data['pageTitle']           = 'Wishlist';
	        $this->load->view('front/template',$data);
	    } else {
	    	redirect( base_url().'products', 'refresh' );
	    }    
	}

	public function checkout()
	{
		$data['cart_data'] 		     = cart_data();
		if($data['cart_data']){
			$data['middleContent']   = 'front/checkout';
	        $data['pageTitle']       = 'Checkout';
	        $this->load->view('front/template',$data);
		} else {
			redirect( base_url().'products', 'refresh' );
		}
	}

	public function checkPincode()
	{
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

	public function removeCartListProduct()
	{

        $data['cart_data'] 		 = cart_data();
		$data['middleContent']   = 'front/cartList';
        $data['pageTitle']       = 'Cart';
        $this->load->view('front/template',$data);

        $this->load->view('front/template',$data);

		$data["removeCart"] = $this->product_model->removeCartProduct($this->uri->segment(3));

		if($data["removeCart"]){
			$this->session->set_flashdata('remove_cart_product','Product has been removed from cart');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error_remove_cart_product','Please try again');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}

	public function removeWishlistListProduct()
	{	

		$data['wishlist_data'] 		 =  wishlist_data();
		$data['middleContent']   	 = 'front/wishList';
        $data['pageTitle']           = 'Wishlist';

		$data["removeWishlist"] = $this->product_model->removeWishlistProduct($this->uri->segment(3));

		if($data["removeWishlist"]){
			$this->session->set_flashdata('remove_wishlist_product','Product has been removed from wishlist');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error_remove_wishlist_product','Please try again');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}

	public function wishlistAddCartProduct(){
        
        $getProductDetails = $this->product_model->productDetailsById($this->uri->segment(3));

        if($getProductDetails){

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

	        if(isset($_POST['cart_product_qty'])){
	        	$qty = $_POST['cart_product_qty'];
	        } else {
	        	$qty = 1;
	        }

	        $checkProductStock = $this->product_model->checkProductStock($this->uri->segment(3));

	    	if($checkProductStock['stock'] < $qty){
				$this->session->set_flashdata('error_add_cart_product','Product ( '.$checkProductStock['product_name'].') only  '.$checkProductStock['stock'].' quantity available');
				redirect($_SERVER['HTTP_REFERER']);
	            
	    	} else {

	    		$data['products'] =  array("quantity" => $qty, "name" => $getProductDetails['product_name'],  "product_id" => $this->uri->segment(3), "temp_cart_id" => $temp_cart_id['temp_cart_id'], "user_id" => $user_id);
	    		

		        $save_cart_status = $this->product_model->saveCart($data['products']);

		        if($save_cart_status){			       	
					$this->product_model->removeWishlistProduct($this->uri->segment(3));
					$this->session->set_flashdata('add_cart_product','Product has been added in cart');
					redirect($_SERVER['HTTP_REFERER']);

		        } else {
		        	$this->session->set_flashdata('error_add_cart_product','Something wentwrong try again');
					redirect($_SERVER['HTTP_REFERER']);
		        }
	    	}	       

	        echo json_encode($json_data);
	    } else {
	    	$this->session->set_flashdata('error_add_cart_product','Something wentwrong try again');
			redirect($_SERVER['HTTP_REFERER']);
	    }    
	}


	
}
