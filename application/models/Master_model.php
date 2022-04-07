<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function getStock($id) {
		$this->db->reset_query();
		return $this->db->get_where('product', array('id' => $id))->row('stock');
	}

	public function getLabel($id) {
		$this->db->reset_query();
		return $this->db->get_where('product', array('id' => $id))->row('label');
	}

	public function getProductShowcase($id) {
		$this->db->reset_query();
		return $this->db->get_where('product_showcase', array('product_id' => $id))->result_object();
	}

	public function get_collection($type) {
		return $this->db->order_by('display_order')->get_where('collections', array(
			'gender' => $type,
			'is_active' => 1
		))->result_object();
	}

	public function getCategoryLevel1() {
		return $this->db->order_by('display_order')->get_where('category', array('is_active' => 1,'parent' => 0))->result_object();
	}

	public function getCategoryLevel2($parent) {
		if (!empty($parent)) {
			return $this->db->order_by('display_order')->get_where('category', array('is_active' => 1,'parent' => $parent))->result_object();
		} else {
			return false;
		}
	}

	public function getAttributes() {
		return $this->db->select(array('attribute_name.*'))->join('attribute_value', 'attribute_name.id = attribute_value.attrib_id')->group_by('attribute_name.id')->get_where('attribute_name', array('attribute_name.is_active' => 1))->result_object();
	}

	public function get_material() {
		return $this->db->order_by('display_order')->get_where('material', array('is_active' => 1))->result_object();
	}

	public function country() {
		return $this->db->order_by('nicename')->get_where('country', array(
			'is_active' => 1
		))->result_object();
	}

	public function states() {
		return $this->db->order_by('state')->get_where('states', array(
			'is_active' => 1
		))->result_object();
	}

	public function validateSlug($tbl, $col, $slug, $id=null) {

		if (empty($id)) {
			$isSlugExist = $this->db->like($col, $slug, 'after')->select($col)->get($tbl);
		} else {
			$isSlugExist = $this->db->like($col, $slug, 'after')->select($col)->get_where($tbl, array('SHA2(id, 256) != ' => $id));
		}

		$totalRow = $isSlugExist->num_rows();
		$result = $isSlugExist->result_array();
		$data = array();

		if ($totalRow) {
			foreach ($result as $row) {
				$data[] = $row[$col];
			}
		}

		if(in_array($slug, $data)) {
	    	$count = 0;
	    	while( in_array( ($slug . '-' . ++$count ), $data) );
	    	$slug = $slug . '-' . $count;
	   	}

	   	return $slug;
	}

	public function category_by_id($id) {
		return $this->db->get_where('category', array('id' => $id, 'is_active' => 1))->row();
	}

	public function check_pincode($pincode) {
		return $this->db->get_where('pincode', array('pincode' => $pincode))->row();
	}

	public function get_address($userId) {
		return $this->db
			->order_by('id', 'desc')
			->get_where('user_address', array('user_id' => $userId))->result_object();
	}

	public function get_address_count($userId) {
		return $this->db
			->order_by('id', 'desc')
			->get_where('user_address', array('user_id' => $userId))->num_rows();
	}

	public function get_user_last_address_id($userId) {
		return $this->db
			->order_by('id', 'desc')
			->limit(1)
			->get_where('user_address', array('user_id' => $userId))->row('id');
	}

	public function get_def_address($userId) {
		return $this->db
			->order_by('id', 'desc')
			->get_where('user_address', array('user_id' => $userId, 'is_default' => 1))->row();
	}

	public function get_last_order_address($userId) {
		return $this->db
		->select('b.*')
		->join('user_address as b', 'a.address_id = b.id', 'INNER')
		->order_by('a.id', 'DESC')
		->limit(1)
		->get_where('orders as a', array(
			'a.user_id' => $userId, 'b.user_id' => $userId
		))->row();
	}

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
		    "Authorization: Basic ".base64_encode(raz_key_id.':'.raz_key_secret)
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
		CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Basic ".base64_encode(raz_key_id.':'.raz_key_secret)
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

	public function get_state_by_id($id) {
		$state = $this->db->get_where('states', array(
			'id' => $id
		))->row('state');

		if (!empty($state)) {
			return ucwords($state);
		} else {
			return '';
		}
	}

	public function get_parent_cat_attrib($id) {

		$attributes = $this->db
		->select('b.*')
		->join('product_selected_attributes as b', 'a.id = b.product_id')
		->group_by('b.attribute_value')
		->get_where('product as a', array(
			'a.category_level_1' => $id,
			'a.is_active' => 1
		))->result_object();		

		if (!empty($attributes)) {

			$createAttrib = array();
			
			foreach ($attributes as $data) {
				$createAttrib[$data->attribute_name][] = $data->attribute_value;
			}

			return $createAttrib;

		} else {
			return false;
		}

		die();
		$data = $this->db->query("SELECT a.attributes FROM product as a WHERE a.category_level_1 = ".$id." AND a.attributes IS NOT NULL AND a.is_active = 1")->result_object();

		if (!empty($data)) {

			$attributes = array();
			$createAttrib = array();
			
			foreach ($data as $attrib) {
				$attribData = unserialize($attrib->attributes);

				$attributes[] = $attribData;
			}

			if (count($attribData)) {
				
				foreach ($attributes as $data) {
					
					foreach ($data as $key => $value) {
						//echo $key.'---'.$value.'<br>';
						$createAttrib[$key][] = $value;
					}
				}

			} else {
				return false;
			}

			return $createAttrib;

		} else {
			return false;
		}
	}

	public function get_child_cat_attrib($id) {

		$attributes = $this->db
		->select('b.*')
		->join('product_selected_attributes as b', 'a.id = b.product_id')
		->group_by('b.attribute_value')
		->get_where('product as a', array(
			'a.category_level_2' => $id,
			'a.is_active' => 1
		))->result_object();		

		if (!empty($attributes)) {

			$createAttrib = array();
			
			foreach ($attributes as $data) {
				$createAttrib[$data->attribute_name][] = $data->attribute_value;
			}

			return $createAttrib;

		} else {
			return false;
		}

		die();
		$data = $this->db->query("SELECT a.attributes FROM product as a WHERE a.category_level_1 = ".$id." AND a.attributes IS NOT NULL AND a.is_active = 1")->result_object();

		if (!empty($data)) {

			$attributes = array();
			$createAttrib = array();
			
			foreach ($data as $attrib) {
				$attribData = unserialize($attrib->attributes);

				$attributes[] = $attribData;
			}

			if (count($attribData)) {
				
				foreach ($attributes as $data) {
					
					foreach ($data as $key => $value) {
						//echo $key.'---'.$value.'<br>';
						$createAttrib[$key][] = $value;
					}
				}

			} else {
				return false;
			}

			return $createAttrib;

		} else {
			return false;
		}
	}

	public function attrib_name_by_id($id) {
		return $this->db->get_where('attribute_name', array('id' => $id, 'is_active' => 1))->row('name');
	}

	public function is_multi_attrib($id) {
		return $this->db->get_where('attribute_name', array('id' => $id, 'is_active' => 1))->row('multi');
	}

	public function attrib_value_by_id($id) {
		return $this->db->get_where('attribute_value', array('id' => $id, 'is_active' => 1))->row('name');
	}

	public function get_selected_attribute($id) {
		return $this->db->get_where('product_selected_attributes', array('product_id' => $id))->result_object();
	}

	public function product_review_by_id($pId, $userId) {
		return $this->db->get_where('product_reviews', array('user_id' => $userId, 'product_id' => $pId))->row();
	}

	public function product_review_by_review_id($id, $userId) {
		return $this->db->get_where('product_reviews', array('user_id' => $userId, 'SHA2(id, 256) =' => $id))->row();
	}

	public function product_site_reviews($pId) {
		return $this->db
		->select('a.*, b.first_name, b.last_name')
		->order_by('a.display_order')
		->join('user as b', 'a.user_id = b.id')
		->get_where('product_reviews as a', array('a.product_id' => $pId, 'a.is_active' => 1))->result_object();
	}

	public function count_product_site_reviews($pId) {
		return $this->db
		->select('a.*, b.first_name, b.last_name')
		->order_by('a.display_order')
		->join('user as b', 'a.user_id = b.id')
		->get_where('product_reviews as a', array('a.product_id' => $pId, 'a.is_active' => 1))->num_rows();
	}

	public function is_prod_in_wishlist($userId, $pId) {
		$userSess = $this->session->userdata('user_sess');

		return $this->db->get_where('wishlist', array(
			'user_id' => $userId,
			'SHA2(product_id, 256) = ' => $pId
		))->num_rows();	
		
	}

	public function current_day_orders_amount($userId) {
		$this->db->where('DATE(created_at)', 'CURDATE()', false);
		$this->db->where('user_id', $userId);
		$amount = $this->db->select('SUM(paid_amount) as current_day_orders_amount')->get('orders')->row('current_day_orders_amount');

		if (!empty($amount)) {
			return $amount;
		} else {
			return 0;
		}
	}

	public function financial_year_orders_amount($userId) {

		$startDate = date('Y');
		$startDate = $startDate.'-04-01';
		$endDate   = date('Y')+1;
		$endDate = $endDate.'-03-31';

		$paidAmount = $this->db->query(" SELECT SUM(paid_amount) as paid_amount FROM orders WHERE user_id = ".$userId." AND created_at 
			between '".$startDate."' AND '".$endDate."' ")
		->row('paid_amount');

		return $paidAmount;
		
	}

	public function update_table($tbl, $obj, $cond) {
		$this->db->where($cond);
		$this->db->update($tbl, $obj);
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function get_old_value($tbl='', $cond='', $columns='') {
		if (!empty($tbl) && !empty($cond)) {
			if (!empty($columns)) {
				
				$data = $this->db->get_where($tbl, $cond)->row();

				$newData = array();

				foreach ($data as $key => $value) {
					if (in_array($key, $columns)) {
						$newData[$key] = $value;
					}
				}

				return $newData;

			} else {
				return $this->db->get_where($tbl, $cond)->row();
			}
		} else {
			return false;
		}
	}

	public function audit($adminId, $module, $tbl, $oldVal='', $newVal='', $change) {
		
		$email = $this->db->get_where('admins', array('id' => $adminId))->row('email');

		$obj = array(
			'admin_id' 		=> $adminId,
			'admin_email' 	=> $email,
			'module_name' 	=> $module,
			'table_name' 	=> $tbl,
			'old_value' 	=> !empty($oldVal)? serialize($oldVal):null,
			'new_value' 	=> !empty($newVal)? serialize($newVal):null,
			'type_of_change'=> $change,
		);

		$this->db->insert('audit', $obj);
	}

	public function get_blogs() {
		return $this->db->order_by('display_order')
		->get_where('blogs', array(
			'is_active' => 1,
		))->result_object();
	}

	public function cart_amount_without_discount() {
			$tempCartID = $this->session->userdata('temp_cart_id');

        // if(!$tempCartID) {
        //   $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
        //   $this->input->set_cookie($cookie);
        // }

        $userSess = $this->session->userdata('userSess');

        if (!empty($userSess)) {

            $userId = getUserId();

            $this->db->where('user_id', $userId);

        } else {
            //$tempCartID = $this->input->cookie('mmtcTempCartID',true);
            $this->db->where('temp_cart_id', $tempCartID);
        }

        $this->db->where('b.is_active', 1);
        $result = $this->db
        			->select('a.*, b.product_name, b.slug, b.sku_code, b.net_weight, b.stock, b.mrp, b.selling_price, b.image_path')
        			->join('product as b', 'a.product_id = b.id')
        			->get('cart as a');

        if ($result->num_rows()) {

            $cartData = $result->result_object();

            $subtotal = 0;
            $saved = 0;
            $discRec = 0;
            $summary = '';

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

            return $subtotal;

        } else {
            return 0;
        }
	}

	public function count_customer_used_coupon($coupon) {
		$userId = user_id();

		return $this->db->get_where('orders', array(
			'promo_code' => $coupon,
			'user_id' => $userId
		))->num_rows();
	}

	public function check_cart_freebee_product() {
		$userId = user_id();

		return $this->db
		->join('freebee as b', 'a.product_id = b.product_id', 'inner')
		->get_where('cart as a', array('a.user_id' => $userId))
		->num_rows();
	}

	public function get_cart_products_info($type="category_level_1") {
		//$tempCartID = $this->input->cookie('mmtcTempCartID',true);
		$tempCartID = $this->session->userdata('temp_cart_id');

    // if(!$tempCartID) {
    //   $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
    //   $this->input->set_cookie($cookie);
    // }

    $userSess = $this->session->userdata('userSess');

    if (!empty($userSess)) {

        $userId = getUserId();

        $this->db->where('user_id', $userId);

    } else {
        //$tempCartID = $this->input->cookie('mmtcTempCartID',true);
        $this->db->where('temp_cart_id', $tempCartID);
    }

    $this->db->where('b.is_active', 1);
    $result = $this->db
    			->select('a.*, b.product_name, b.slug, b.sku_code, b.net_weight, b.stock, b.mrp, b.selling_price, b.image_path, b.category_level_1, b.category_level_2')
    			->join('product as b', 'a.product_id = b.id')
    			->get('cart as a');

    if ($result->num_rows()) {

      $cartData = $result->result_object();

      $catLevel1 = array();
      $catLevel2 = array();
      $sku = array();
      $productId = array();

      foreach ($cartData as $cdata) {
      	
      	if (!empty($cdata->category_level_1)) {
      		$catLevel1[] = $cdata->category_level_1;
      	}

      	if (!empty($cdata->category_level_2)) {
      		$catLevel2[] = $cdata->category_level_2;
      	}

      	if (!empty($cdata->sku_code)) {
      		$sku[] = $this->db->get_where('product', array('sku_code' => $cdata->sku_code, 'is_active' => 1))->row('id');
      	}

      	if (!empty($cdata->product_id)) {
      		$productId[] = $cdata->product_id;
      	}

      }

      if ($type == 'category_level_1') {
      	return $catLevel1;
      } elseif ($type == 'category_level_2') {
      	return $catLevel2;
      } elseif ($type == 'sku') {
      	return $sku;
      } elseif ($type == 'product_id') {
      	return $productId;
      } else {
      	return $catLevel1;
      }

  	} else {
      return false;
  	}
	}

		public function cart_data() {

        $tempCartID = $this->session->userdata('temp_cart_id');

        // if(!$tempCartID) {
        //   $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
        //   $this->input->set_cookie($cookie);
        // }

        $userSess = $this->session->userdata('userSess');

        if (!empty($userSess)) {

            $userId = getUserId();

            $this->db->where('user_id', $userId);

        } else {
            //$tempCartID = $this->input->cookie('mmtcTempCartID',true);
            $this->db->where('temp_cart_id', $tempCartID);
        }

        $this->db->where('b.is_active', 1);
        $result = $this->db
        			->select('a.*, b.product_name, b.slug, b.sku_code, b.stock, b.mrp, b.selling_price, b.image_path, b.category_level_1, b.category_level_2')
        			->group_by('product_id')
        			->join('product as b', 'a.product_id = b.id')
        			->get('cart as a');

        if ($result->num_rows()) {

            return $result->result_object();

        } else {
            return false;
        }
    }

    public function create_output() {
    	$cartData = $this->cart_data();

        $output = '
            <h3>There is no cart data</h3>
            <a href="'.base_url().'">
                <button class="offset-top-20 prefix-sm-30 btn btn-primary btn-icon btn-icon-left" type="button"><span class="icon icon fl-line-icon-set-shopping63"></span> Continue Shopping</button>
            </a>
        ';
        $summary = '';

    	if (!empty($cartData)) {

            $output = '';

            $subtotal = 0;
            $saved = 0;

    		foreach ($cartData as $data) {
                
                $cartId = hash('SHA256', $data->id);
                $mrp = $data->mrp;
                $sp = $data->selling_price;
                $availStock = $data->stock;
                $cartQty = $data->quantity;

                $productId = $data->product_id;
                $freebies = $this->Master_model->getFreebeeProduct($productId);

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

                $output .= '

                  <div class="cart_item row mb-2 border-1 text-left cart-panel" id="row_'.$cartId.'">
                      <div class="col-md-2 col-12 text-center product-thumbnail">
                           <img src="'.base_url($data->image_path).'" class="img-fluid"  alt="">
                      </div>
                      <div class="col-md-10">
                          <div class="row m-0 mb-2">
                              <div class="col-9">
                                <p>
                                  <a class="text-base link-default font-weight-bold" href="'.base_url($data->slug).'">
                                    '.$data->product_name.'
                                  </a>
                                  <br> SKU: '.$data->sku_code;

                                  if (!empty($freebies)):
                                  $output .= '<br> Freebies: <a target="_blank" href="'.base_url($freebies->slug).'">'.$freebies->product_name.'</a>';
                                  endif;

                                  if (!$availStock):
                                    $output .= '<br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>';
                                  endif;

                                  $output .= '<span id="msg_'.$cartId.'"></span>
                                </p>
                              </div>
                              <div class="col-3 product-subtotal">';

                            if ($discPrice):
                              $output .= '<p class="big text-primary font-weight-bold mb-0">₹'.check_num($discPrice*$cartQty).'</p>  
                              <span class="text-strike text-muted">₹'.check_num($price*$cartQty).'</span>';
                            else:
                              $output .= '<p class="big text-primary">₹'.check_num($price*$cartQty) .'</p>';
                            endif;

                            $output .= '</div>
                          </div>
                          <div class="row m-0">
                            <div class="col-md-3 col-6 mb-2 product-price">';
                            if($discPrice):
                                $output .= '<p class="big text-primary mb-0">
                                 Price: ₹'.check_num($discPrice).'
                                </p>
                               <span class="text-strike text-muted">
                                  ₹'.check_num($price).'
                                </span>';
                            else:
                              $output .= '<p class="big text-primary">
                                Price:₹'.check_num($price).'
                              </p>';
                            endif;

                            $output .= '</div>
                              <div class="col-md-5 col-6 mb-2 product-quantity">
                              <input '.(!$availStock? 'disabled':'').' class="stepper form-input" data-id="'.$cartId.'" type="number" data-zeros="true" value="'.$cartQty.'" min="1" max="'.$availStock.'">
                              </div>
                              <div class="col-md-3 col-12 product-remove text-right pt-3">
                              <a onclick="removeCartItem('."'".$cartId."'".')" class="icon icon-xs text-primary btn btn-dander btn-xs" href="javascript:void(0)">Remove</a>
                              </div>
                          </div>
                      </div>
                  </div>
                ';
            }

            $summary .= '
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Subtotal:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>';
              if ($saved):
              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">You saved:</p>
                <p class="text-regular cart_totals-price">
                    ₹'.check_num(abs($subtotal - $saved)).'
                </p>
              </div>';
              endif;

              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Delivery Charges:</p>
                <p class="text-regular cart_totals-price">₹0</p>
              </div>
              <div class="align-items-center d-flex justify-content-between offset-top-10">
                <p class="text-spacing-40 text-thin offset-bottom-0">Total Cost:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>
              <script>
                var $document = $(document),
                plugins = {stepper: $(".stepper")};

                $document.ready(function () {
                    if (plugins.stepper.length) {
                        plugins.stepper.stepper({
                            labels: {
                                up: "",
                                down: ""
                            }
                        });
                    }
                });
            </script>
            ';
    	}

    	return array(
            'output' => $output,
            'summary' => $summary
        );

    }

    public function getProductForReview($productId) {
		$reviewProductData = $this->db->query("SELECT a.id, a.custom_orderid, a.order_status, b.product_id, c.product_name FROM orders as a
		INNER JOIN order_item as b ON a.id = b.order_id
		INNER JOIN product as c ON b.product_id = c.id
		WHERE a.user_id = ".getUserId()." ANd b.product_id = ".$productId." GROUP BY a.order_status")->result_object();

		if (!empty($reviewProductData)) {
			
			$ordersStatus = array();

			foreach ($reviewProductData as $data) {
				$ordersStatus[] = $data->order_status;
			}

			if (in_array('Order Delivered', $ordersStatus)) {
				return $reviewProductData;
			} else {
				return false;
			}

		} else {
			return false;
		}

	}

	public function isExistReview($productId) {
		$this->db->select('*');
		$this->db->from('reviews');
		// $this->db->where('is_active',1);
		$this->db->where('user_id',getUserId());
		$this->db->where('product_id = ',$productId);
		$query = $this->db->get()->row();
		return $query;
	}

	public function createInvoice($orderId) {
		$orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.hsn_code, b.product_name, b.image_path, b.gst FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        echo $template = $this->load->view('vwAdminInvoice', $param, TRUE);
	}

	public function createInvoiceForEmail($orderId) {
		$orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.hsn_code, b.product_name, b.image_path, b.gst FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        return $template = $this->load->view('email-temp/vwInvoice', $param, TRUE);
	}

	public function getBanners() {
		$this->db->reset_query();
		$this->db->order_by('display_order', 'asc');
		return $this->db->get_where('banner', array(
			'is_active' => 1
		))->result_object();
	}

	public function getCategoryById($id) {
		$this->db->reset_query();
		return $this->db->get_where('category', array('id' => $id))->row('category');
	}

	public function allBlog($limit) {
		$this->db->reset_query();
		$this->db->select('title, description, date, link, author_name,image');
		$this->db->from('blogs');
		$this->db->where('is_active',1);
		$this->db->where('date <=', date('Y-m-d'));
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit);
		return $this->db->get()->result_object();
	}

	public function getProductById($id) {
		$this->db->reset_query();
		return $this->db->get_where('product', array(
			'id' => $id,
			'is_active' => 1
		))->row();
	}

	public function getInstaFeed() {
		$accessToken = 'IGQVJXdk1MNWFGemFiUHZA0dHhlU3dIQnFadlM3bnNGZAGxsUi1jakdEOWFuanRUUEszOWpOTjJQbHNaYjd4dU5IbE9UMGlZAcXVrdlhEal9qWktBcWE4VlBVWVZAmTFhzV2Y4Y0FCdS15QzBmdHhockhWSwZDZD';

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://graph.instagram.com/me/media?access_token='.$accessToken.'&fields=id,caption,media_url,media_type,permalink',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Cookie: ig_did=C73D57AB-9128-4E45-B232-F32A649F73A2; ig_nrcb=1; csrftoken=hYWmQDroK12aroDkv81bNy4u3kMZA3NN; mid=YDSXJQAEAAHnXZjnvElcPyXGHwjC'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		$response = json_decode($response);
		return $response;
	}

}

/* End of file Master_model.php */
/* Location: ./application/models/Master_model.php */