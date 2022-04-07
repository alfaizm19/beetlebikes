<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// -----------------------------------------------------------------------------

	function cart_data()
	{
		$ci = & get_instance();
		$ci->load->library('session');
		$ci->db->select('prod.id, prod.product_name, prod.slug, prod.sku_code, prod.selling_price, prod.image_path, prod.mrp, cart.id as cart_id,cart.quantity as cart_qty, prod.category_level_1, prod.category_level_2');

		$ci->db->from('cart as cart');

	    if ($ci->session->userdata('userSess')) {          
	        $ci->db->where('cart.user_id',getUserId());
	        $ci->db->join('product AS prod','prod.id = cart.product_id','left');

		    $ci->db->where('prod.available_date <=', date('Y-m-d'));
		    $ci->db->where('prod.is_active',1);

		    $cartList = $ci->db->get()->result_array();
		    $cartListNew = [];
		    if($cartList){
		    	foreach ($cartList as $cartList_key => $cartList_value) {
			    	$cartListNew[$cartList_value['id']] = $cartList_value;
			    }
		    }
		     return $cartListNew;
	    } else if ($ci->session->userdata('temp_cart_id')) {  
	        $ci->db->where('cart.temp_cart_id',$ci->session->userdata('temp_cart_id'));
	        $ci->db->join('product AS prod','prod.id = cart.product_id','left');

		    $ci->db->where('prod.available_date <=', date('Y-m-d'));
		    $ci->db->where('prod.is_active',1);

		    $cartList = $ci->db->get()->result_array();
		    $cartListNew = [];
		    if($cartList){
		    	foreach ($cartList as $cartList_key => $cartList_value) {
			    	$cartListNew[$cartList_value['id']] = $cartList_value;
			    }
		    }
		     return $cartListNew;
	      }
	   
	}

	function wishlist_data()
	{
		$ci = & get_instance();
		$ci->load->library('session');
		 
		$ci->db->select('prod.id, prod.product_name, prod.slug, prod.sku_code, prod.selling_price, prod.image_path, prod.mrp, wish.id as wish_id');

		$ci->db->from('wishlist as wish');

	    if ($ci->session->userdata('userSess')) {          
	        $ci->db->where('wish.user_id',getUserId());
       		$ci->db->join('product AS prod','prod.id = wish.product_id','left');

		    $ci->db->where('prod.available_date <=', date('Y-m-d'));
		    $ci->db->where('prod.is_active',1);

		    $wishlist = $ci->db->get()->result_array();
		    $wishlistNew = [];
		    if($wishlist){
		    	foreach ($wishlist as $wishlist_key => $wishlist_value) {
			    	$wishlistNew[$wishlist_value['id']] = $wishlist_value;
			    }
		    }

		    return $wishlistNew;
	    } else if ($ci->session->userdata('temp_cart_id')) {  
	       		$ci->db->where('wish.temp_wishlist_id',$ci->session->userdata('temp_cart_id'));

	       		$ci->db->join('product AS prod','prod.id = wish.product_id','left');

			    $ci->db->where('prod.available_date <=', date('Y-m-d'));
			    $ci->db->where('prod.is_active',1);

			    $wishlist = $ci->db->get()->result_array();
			    $wishlistNew = [];
			    if($wishlist){
			    	foreach ($wishlist as $wishlist_key => $wishlist_value) {
				    	$wishlistNew[$wishlist_value['id']] = $wishlist_value;
				    }
			    }

			    return $wishlistNew;
	      }
	    
	   
	   
	}

	function header_cart_html($cart_data) {
		$cartHeader =  $couponData = [];
		$ci = & get_instance();

		 if($cart_data) { 
		        $total = [];
		        $cartHeader  = '';
		        $applyCount = 1;
		        $ci->load->library('session');
		        if($ci->session->userdata('couponData'))
			    {
			        $couponData = $ci->session->userdata('couponData');
			    }

		        foreach ($cart_data as $cart_data_key => $cart_data_value) {

		       //  if($couponData){

		       //    if($couponData['sub_category']){
		       //        $sub_category_arr = explode (",", $couponData['sub_category']);
		       //        if (in_array($cart_data_value['category_level_2'], $sub_category_arr))
		       //        {
		       //          $applyCount = 1;
		       //        }
		       //    }

		       //    if($couponData['inclusion_product']){
		       //        $inclusion_product_arr = explode (",", $couponData['inclusion_product']);
		       //        if (in_array($cart_data_value['id'], $inclusion_product_arr))
		       //        {
		       //          $applyCount = 1;
		       //        }
		       //    }

		       //    if($couponData['exclusion_sku']){
		       //        $exclusion_sku_arr = explode (",", $couponData['exclusion_sku']);
		       //        if (in_array($cart_data_value['sku_code'], $exclusion_sku_arr))
		       //        {
		       //          $applyCount = 0;
		       //        }
		       //    }

		       //    if($couponData['exclusion_sub_category']){
		       //        $exclusion_sub_category_arr = explode (",", $couponData['exclusion_sub_category']);
		       //        if (in_array($cart_data_value['category_level_2'], $exclusion_sub_category_arr))
		       //        {
		       //          $applyCount = 0;
		       //        }
		       //    }
		        
		      	// }

		    $cartHeader  .=  '<li class="single-cart"><div class="cart-img"><img src="'.base_url().$cart_data_value['image_path'].'" alt=""></div><div class="cart-content"><h4><a href="'.'base_url()'.'product/'.$cart_data_value['slug'].'">'. $cart_data_value['product_name'].'</a></h4>';
		      
		            if($cart_data_value['selling_price']){
		            	 if($applyCount == 1)
				          {
				             $couponPriceDiscount[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
				          }

		                 $cartHeader .= ' <p><i class="fa fa-inr"></i>'.$cart_data_value['selling_price'].'<i class="fa fa-times"></i>'.$cart_data_value['cart_qty'].'</p>';
		                 $total[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
		            } else {
		            	if($applyCount == 1)
				        {
				                $couponPriceDiscount[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
				        }

		                $cartHeader .= ' <p><i class="fa fa-inr"></i>'.$cart_data_value['mrp'].'<i class="fa fa-times"></i>'.$cart_data_value['cart_qty'].'</p>';
		                  $total[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
		            }

		           
		        $cartHeader .= '</div><div class="cart-del"><a href="javascript:void(0)" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_'.$cart_data_value['id'].'"  data-productid="'.$cart_data_value['id'].'"><i class="fa fa-times"></i></a></div></li>';
		    } 

		    $totalDiscount = 0;
	        // if($couponData){
	        //   if($couponPriceDiscount){

	        //       $couponPriceTotal = array_sum($couponPriceDiscount);

	        //       if($couponData['discount_type'] == 1){
	        //          $totalDiscount = round($couponData['discount'] * ($couponPriceTotal / 100),2);
	        //       }  else {
	        //           $totalDiscount = $couponData['discount'];
	        //       }
	                 
	        //       if($couponData['max_discount']){
	        //           if($totalDiscount > $couponData['max_discount']){
	        //            $totalDiscount = $couponData['max_discount'];
	        //           }
	        //       }   

	        //       if($couponData['min_cart_value']){
	        //           if($couponData['min_cart_value'] > $total){
	        //               $totalDiscount = 0;
	        //           }
	        //       }
	            
	        //   }
	       	// }

	        $subTotal = array_sum($total);
		    $totalNew = array_sum($total);

		   
		    $cartHeader .=  '<li class="mini-cart-price"><div class="cart-price"><span>Sub Total :</span>';

		    $cartHeader .= '<span class="total-price"><i class="fa fa-inr"></i>'.$subTotal.'</span></div><div class="check-out-btn text-center"></div></li>';

		    if (!empty($couponData)) {
		    	$totalNew = $totalNew - $couponData['discount'];

		        $cartHeader .=  '<li class="mini-cart-price"><div class="cart-price"><span>Discount :</span>';

		    	$cartHeader .= '<span class="total-price"><i class="fa fa-inr"></i>'.$couponData['discount'].'</span></div><div class="check-out-btn text-center"></div></li>';	
		    }


			$cartHeader .=  '<li class="mini-cart-price" style="color:#07b307"><div class="cart-price"><span>Total :</span>';
		       

		    $cartHeader .= '<span class="total-price"><i class="fa fa-inr"></i>'.$totalNew.'</span></div><div class="check-out-btn text-center"><a href="'.base_url().'cart'.'">View Cart</a></div></li>';


		}

		

		return $cartHeader;
	}	
