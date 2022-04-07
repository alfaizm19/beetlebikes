<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pincode_model extends MY_Model {

    public $table = 'pincode'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        // $this->before_delete[] = 'remove_image';
        parent::__construct();
    }

    function get_datatables() {
        $this->load->library('datatables_ssp');
        $primary_key = 'pincode.id';
        $myjoin = '';
        $custom_where = "";

        $delete_all = array(
            'customfilter' => 'pincode.id',
            'db' => 'pincode.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );
                

        $pincode = array(
            'customfilter' => 'pincode',
            'db' => 'pincode',
        );

        $state = array(
            'customfilter' => 'state',
            'db' => 'state',
        );

        $city = array(
            'customfilter' => 'city',
            'db' => 'city',
        );

        $get_edit = array(
            'customfilter' => 'pincode.id',
            'db' => 'pincode.id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_edit($id, 'admin/pincode/edit');
            }
        );

        $is_active = array(
            'customfilter' => 'pincode.is_active',
            'db' => 'pincode.is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
            }
        );

        $delete = array(
            'customfilter' => 'pincode.id',
            'db' => 'pincode.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        $data_table = array_values(compact('delete_all', 'pincode', 'state', 'city', 'is_active', 'get_edit', 'delete'));

        $columns = array();

// error_log(json_encode($_GET));

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }
        
        return json_encode(
                Datatables_ssp::simple($_GET, $this->dbConn, $this->table, $primary_key, $columns, $myjoin, $custom_where)
        );
    }

    function delete_all($ids) {
        $this->db->select('image_path');
        $this->db->where_in('product_id', $ids);
        $product_query = $this->db->get('product_image');
        foreach ($product_query->result_array() as $product_img) {
            if ($product_img['image_path'] != "") {
                if (file_exists("./" . $product_img['image_path'])) {
                    unlink("./" . $product_img['image_path']);
                }
                // if (file_exists("./" . $product_img['image_path_thumb'])) {
                //     unlink("./" . $product_img['image_path_thumb']);
                // }
                // if (file_exists("./" . $product_img['medium_image_path'])) {
                //     unlink("./" . $product_img['medium_image_path']);
                // }
            }
        }
        $this->db->where_in('product_id', $ids);
        $this->db->delete('product_image');

        $this->db->where_in('id', $ids);
        $this->db->delete('product');

        // $this->db->where_in('product_id', $ids);
        // $this->db->delete('cart');
        return true;
    }

    function get_productsbyid($id) {
        return $this->db->get_where('product', array(
            'id' => $id
        ))->row();
    }

    public function remove_image($data) {
        $this->db->where_in('product_id', $data);
        $result_data = $this->db->get('product_image');
        if ($result_data->num_rows() > 0) {
            foreach ($result_data->result_array() as $key => $val) {

                if (file_exists('./' . $val['image_path']) && $val['image_path'] != '') {
                    unlink('./' . $val['image_path']);
                }
                if (file_exists('./' . $val['image_path_thumb']) && $val['image_path_thumb'] != '') {
                    unlink('./' . $val['image_path_thumb']);
                }
                if (file_exists('./' . $val['medium_image_path']) && $val['medium_image_path'] != '') {
                    unlink('./' . $val['medium_image_path']);
                }
            }
        }
        $this->db->where_in('product_id', $data);
        $this->db->delete('product_image');

        $result = $this->where('id', $data)->get_all();
        foreach ($result as $key => $value) {
            if (file_exists('./' . $value->image_path)) {
                unlink('./' . $value->image_path);
            }
            // if (file_exists('./' . $value->thumb_image_path)) {
            //     unlink('./' . $value->thumb_image_path);
            // }
            // if (file_exists('./' . $value->medium_image_path)) {
            //     unlink('./' . $value->medium_image_path);
            // }
        }
    }
	public function get_all_products_menu(){
	$this->db->where('is_active', 1);
  $this->db->order_by('display_order', 'asc');
    $query = $this->db->get('main_category_new');
	$return = array();

    foreach ($query->result() as $category)
    {
        $return[$category->id] = $category;
        $return[$category->id]->subs = $this->get_sub_categories($category->id); // Get the categories sub categories
    }

    return $return;
	}


	public function get_sub_categories($category_id)
	{
	$this->db->where('is_active', 1);
  $this->db->order_by('display_order', 'asc');
    $this->db->where('category_id', $category_id);
    $query = $this->db->get('sub_category');

	    $return = array();

    foreach ($query->result() as $subcategory)
    {
        $return[$subcategory->id] = $subcategory;
        $return[$subcategory->id]->secondsubs = $this->get_second_sub_categories($subcategory->id); // Get the sub categories
    }

    return $return;

	}
	public function get_second_sub_categories($sub_category_id)
	{
	$this->db->where('is_active', 1);
  $this->db->order_by('display_order', 'asc');
    $this->db->where('sub_category_id', $sub_category_id);
    $query = $this->db->get('second_sub_category');
    return $query->result();

	}

    function get_category() {
        $this->db->select('*');
        $query = $this->db->get('main_category_new');
        return $query->result_array();
    }

    function get_sub_category_by_id($id) {
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $query = $this->db->get('sub_category');
        return $query->result_array();
    }

    function getSubcategory_all($subId, $id) {
        $html = "";
        $this->db->select('*');
        $this->db->where('category_id', $subId);
        $this->db->where('is_active', 1);
        $query = $this->db->get('sub_category');
        $html .= ' <div class="form-group m-form__group row"><label class="col-form-label col-lg-3 col-sm-12" for="sub_category_id">Sub Category <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">';
        $html .= ' <select  class="form-control input-lg m-input" name="sub_category_id" id="sub_category_id" required data-msg-required="Please select sub category." onchange="getscnd_sub_category();">';
        $html . ' <option value=""   "' . set_select("sub_category_id", "", TRUE) . '">Select Sub Category</option>';
        $html .= '<option value="" >--Please Select Sub Category--</option>';
        $datas = $query->result_array();
        if($datas)
        {
          foreach ($datas as $key => $data_val) {
              $check = '';
              if ($id != '') {
                  if ($id == $data_val['id']) {
                      $check = 'selected';
                  } else {
                      $check = '';
                  }
              }
              $html .= '<option ' . $check . ' value=' . $data_val['id'] . ' >' . $data_val['sub_category_name'] . '</option>';
          }
          $html .= '  </select>
                      </div></div>';
        }
        else
        {
          $html = "";
        }

        return $html;
    }

    function getscndSubcategory_all($subId, $id) {
        $html = "";
        $this->db->select('*');
        $this->db->where('sub_category_id', $subId);
        $this->db->where('is_active', 1);
        $query = $this->db->get('second_sub_category');
        $html .= ' <div class="form-group m-form__group row"><label class="col-form-label col-lg-3 col-sm-12" for="sub_category_id">2nd Sub Category <span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">';
        $html .= ' <select  class="form-control input-lg m-input" name="scnd_sub_category_id" id="scnd_sub_category_id" required data-msg-required="Please select sub category.">';
        $html . ' <option value=""   "' . set_select("second_sub_category_id", "", TRUE) . '">Select Sub Category</option>';
        $html .= '<option value="" >--Please Select Second Sub Category--</option>';
        $datas = $query->result_array();
        if($datas)
        {
          foreach ($datas as $key => $data_val) {
              $check = '';
              if ($id != '') {
                  if ($id == $data_val['id']) {
                      $check = 'selected';
                  } else {
                      $check = '';
                  }
              }
              $html .= '<option ' . $check . ' value=' . $data_val['id'] . ' >' . $data_val['second_sub_category_name'] . '</option>';
          }
          $html .= '  </select>
                      </div></div>';
        }
        else
        {
          $html = "";
        }

        return $html;
    }

    function product() {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->order_by("id", 'asc');
        $query = $this->db->get();
        $product = $query->result();
        return $product;
    }

    function get_new_arrival_products() {
        $this->db->select('product.category_id,product.sub_category_id,product.product_name,product.price,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_occassions,product.related_products,product.related_colors,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.key_words,product.product_url,product.id,count(product_image.product_id) as product_count');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id', 'left');
        $this->db->where('new_arrival', 1);
        $this->db->where('product.is_active', 1);
        $this->db->where('sub_category.is_active', 1);
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->limit(4);
        $this->db->order_by("product.display_order", 'asc');
        $result = $this->db->get('product');
        return $result->result_array();
    }

    function get_special_deals_products() {
        $this->db->select('product.category_id,product.sub_category_id,product.product_name,product.price,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_occassions,product.related_products,product.related_colors,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.key_words,product.product_url,product.id,count(product_image.product_id) as product_count');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id', 'left');
        $this->db->where('special_deal', 1);
        $this->db->where('product.is_active', 1);
         $this->db->where('sub_category.is_active', 1);
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->limit(4);
        $this->db->order_by("product.display_order", 'asc');
        $result = $this->db->get('product');
        return $result->result_array();
    }
        function get_products() {
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id', 'left');
        $this->db->select('*,product.id as product_id');
        $this->db->where('product.is_active', 1);
         $this->db->where('sub_category.is_active', 1);
        $this->db->order_by("product.display_order", 'asc');
        $result = $this->db->get('product');
        return $result->result_array();
    }
    function get_sort_by_product($sortByAction='') {
        $this->db->select('product.category_id,product.sub_category_id,sub_category.url,product.product_name,product.price,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_occassions,product.related_products,product.related_colors,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.key_words,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id', 'left');
        $this->db->where('product.is_active', 1);
        $this->db->where('sub_category.is_active', 1);
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->limit(8);
        if($sortByAction==''){
        $this->db->order_by('product.display_order asc');
        }else{
        $this->db->order_by($sortByAction);
        }
        $result = $this->db->get('product');
        return $result->result_array();
    }
    function get_sort_by_product_home($sortByAction='',$category_id="") {
        $this->db->select('product.category_id,product.sub_category_id,sub_category.url,product.product_name,product_country_details.price,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_products,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id', 'left');
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id', 'left');
        $this->db->where('product.is_active', 1);
        $this->db->where('sub_category.is_active', 1);
        if($category_id != ""){
        $this->db->where('product.category_id', $category_id);
        }
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->limit(8);
        if($sortByAction==''){
        $this->db->order_by('product.display_order asc');
        }else{
        $this->db->order_by($sortByAction);
        }

        $result = $this->db->get('product');
        return $result->result_array();
    }

    function get_subcategories(){
        $this->db->select('*');
        $query = $this->db->get('sub_category');
        return $query->result();
    }
	function get_secondlevelsubcategories(){
        $this->db->select('*');
        $query = $this->db->get('second_sub_category');
        return $query->result();
    }

    function get_occassion($url){
        $this->db->select('*');
        $this->db->where('LOWER(name)',strtolower($url));
        $query = $this->db->get('occassion');
        return $query->row();
    }

    function get_colors(){
        $this->db->select('*');
        $query = $this->db->get('color');
        return $query->result();
    }

    function getFilteredProduct(){
        $this->db->select('product.category_id,product.sub_category_id,sub_category.url,product.product_name,product.image_path,product.thumb_image_path,product_country_details.price,product_country_details.stock_quantity,product.medium_image_path,product.related_products,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.meta_key_words,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');

        $this->db->where('product.is_active',1);
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id','left');
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
		$this->db->where('sub_category.is_active', 1);
        $result = $this->db->get('product');
        return $result->result_array();
    }

    function getFilteredProduct2($limit, $start){
        $this->db->select('*,product.category_id,product.sub_category_id,sub_category.url,product.product_name,product.image_path,product.thumb_image_path,product_country_details.price,product_country_details.stock_quantity,product.medium_image_path,product.related_products,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.meta_key_words,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');

        $this->db->where('product.is_active',1);
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id','left');
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->where('sub_category.is_active', 1);
        $this->db->where('product_country_details.country_id', country_id);
        $this->db->limit($limit, $start);
        $result = $this->db->get('product');
        return $result->result();
    }

    function countFilteredProduct(){
        $this->db->select('product.category_id,product.sub_category_id,sub_category.url,product.product_name,product.image_path,product.thumb_image_path,product_country_details.price,product_country_details.stock_quantity,product.medium_image_path,product.related_products,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.meta_key_words,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');

        $this->db->where('product.is_active',1);
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category_id','left');
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        $this->db->where('sub_category.is_active', 1);
        $result = $this->db->get('product');
        return $result->num_rows();
    }
        function get_product_for_cart($product_ids = "") {
        $this->db->select('id,product_name,price as product_price,image_path');
        $this->db->where_in('id', $product_ids);
        $this->db->from('product');
//        $this->db->order_by("id", 'asc');
        $query = $this->db->get();
        $product = $query->result();
        return $product;
    }

    function get_product_detail_for_cart($product_id = "") {
        $this->db->select('product.id,product.product_name,product_country_details.price,product_country_details.discount_price, product.image_path,product.product_url,product.thumb_image_path,product.medium_image_path');
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->from('product');
		$this->db->where('product.id', $product_id);
		$query = $this->db->get();
        $product = $query->row();
		//echo "<pre>";
		//		print_r($product);
		//			die;
        return $product;
    }
      function get_zone() {
        $this->db->select('*');
        $this->db->from('zone');
          $this->db->order_by('zone_name');
        $query = $this->db->get();
        return $query->result();
    }
        function get_product_by_url($url) {
        $this->db->select('product.*,product_country_details.price,product_country_details.discount_price,product_country_details.country_id,product_country_details.stock_quantity,main_category_new.name as category_name,main_category_new.url as category_url,sub_category.sub_category_name');
        $this->db->join('main_category_new', 'main_category_new.id=product.category_id', 'left');
        $this->db->join('sub_category', 'sub_category.id=product.sub_category_id', 'left');
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
		$this->db->where('product.is_active', 1);
    $this->db->where('product_country_details.country_id', country_id);
        $this->db->where('product.product_url', $url);
		$result = $this->db->get('product');
        return $result->row();
    }

        function get_related_product($related_product) {
            $related_product_ids = explode(',', $related_product);
        $this->db->select('product.category_id,product_country_details.price,product_country_details.discount_price,product_country_details.country_id,product.sub_category_id,product.product_name,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_products,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.product_url,product.id,count(product_image.product_id) as product_count');
        $this->db->where_in('product.id', $related_product_ids);
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->join('sub_category', 'sub_category.id=product.sub_category_id', 'left');
		$this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->where('sub_category.is_active', 1);
        $this->db->group_by('product.id');
        $this->db->limit(4);
        $this->db->order_by('rand()');
        $result = $this->db->get('product');
        return $result->result_array();
    }
        function get_product_image_by_id($product_id) {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
//        $this->db->order_by('display_order', 'asc');

        $result = $this->db->get('product_image');
        return $result->result_array();
    }
        function product_data_from_cart($product_ids,$user_id) {
        $this->db->select('cart.id as cart_id,quantity,total_price');
        $this->db->join('product', 'product.id=cart.product_id', 'left');
        $this->db->where('cart.user_id', $user_id);
        $this->db->where_in('cart.product_id', $product_ids);
        $this->db->order_by('product_id', 'asc');
        $result = $this->db->get('cart');
        return $result->result_array();
    }

    function product_data_for_checkout($user_id) {
        $this->db->select('cart.id as cart_id,quantity,,total_price,product.id,product.product_name,product_country_details.price as price, product.image_path,product.medium_image_path,product.product_url,thumb_image_path');
        $this->db->join('product', 'product.id=cart.product_id', 'left');
		$this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->where('cart.user_id', $user_id);
        $result = $this->db->get('cart');
        return $result->result_array();
    }

    function product_data_for_checkout2($tempCartId) {
        $this->db->select('cart.id as cart_id,temp_cart_id,quantity,,total_price,product.id,product.product_name,product_country_details.price as actual_price, cart.price as price, product.image_path,product.medium_image_path,product.product_url,thumb_image_path');
        $this->db->join('product', 'product.id=cart.product_id', 'left');
        $this->db->join('product_country_details', 'product_country_details.product_id = product.id','left');
        $this->db->where('cart.temp_cart_id', $tempCartId);
        $this->db->group_by('cart_id');
        $result = $this->db->get('cart');
        return $result->result_array();
    }

    function order_item_add($tblName,$value,$order_id) {
            $datas = array(
                'order_id' => $order_id,
                'product_id' => $value['product_id'],
                'quantity' => $value['quantity'],
                'date' => $value['date'],
                'zone' => $value['zone'],
                'price' => $value['total_price'],
                'created_at' => date('Y-m-d')
            );
            $this->db->insert($tblName, $datas);
            if(isset($_COOKIE['cart_items'])){
              unset($_COOKIE['cart_items']);
            }else if($this->session->userdata('f_id') != ""){
            $this->db->where('user_id', $this->session->userdata('f_id'));
            $this->db->where('product_id', $value['product_id']);
            $this->db->delete('cart');
            }
    }
        function order_add($table,$data) {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
    }

    function get_product_image_by_productid($id) {
        $this->db->select('image_path');
        $this->db->where('product_id', $id);
        $result = $this->db->get('product_image');
        return $result->result_array();
    }
    function get_shipping_amount_from_zone($zone_id) {
        $this->db->select('delivery_charge');
        $this->db->where('id', $zone_id);
        $result = $this->db->get('zone');
        return $result->row();
    }
    function get_shipping_amount_from_zoneid($zone_id) {
        $this->db->select('delivery_charge');
        $this->db->where('id', $zone_id);
        $result = $this->db->get('zone');
        $result = $result->row();
         return $result->delivery_charge;
    }

    function get_zone_by_id($zone){
        $this->db->select('zone_name');
        $this->db->where('id',$zone);
        $result = $this->db->get('zone');
        return $result->row();
    }

    function get_delivery($id){
        $this->db->select('*');
        $this->db->where('user_id',$id);
        $result = $this->db->get('delivery_address');
        return $result->result_array();
    }

    function get_address($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $result = $this->db->get('delivery_address');
        return $result->row();
    }

    function saveDeliveryAddress($data){
        $this->db->insert('delivery_address',$data);
        return $this->db->insert_id();
    }

    function placeOrder($data){
        $this->db->insert('orders',$data);
        return $this->db->insert_id();
    }

    function placeOrderItems($data){
        return $this->db->insert('order_item',$data);
    }

    function emptyCartForUser($user_id){
        $this->db->where('user_id',$user_id);
        return $this->db->delete('cart');
    }

    function updateOrder($val,$order_id){
        $this->db->where('id',$order_id);
        $this->db->set('terms',$val);
        $this->db->update('orders');
    }

    function getOrder($order){
        $this->db->where('id',$order);
        $result = $this->db->get('orders');
        return $result->row();
    }

    function getOrderItems($order){
        $this->db->select('order_item.*');
        $this->db->where('order_id',$order);
        $result = $this->db->get('order_item');
        return $result->result_array();
    }

    function updateAddressRecord($id,$data){
        $this->db->where('id',$id);
        $this->db->update('delivery_address',$data);
        return $this->db->affected_rows();
    }

    function getcountry($id){
        $this->db->select('*');
        $this->db->where('product_id',$id);
        $result = $this->db->get('product_country_details');
        return $result->result_array();
    }

    function deleteAddressRecord($id){
        $this->db->where('id',$id);
        return $this->db->delete('delivery_address');
    }
        function get_product_id($id){
        $this->db->select('id');
        $this->db->where_in('id',$id);
        $result = $this->db->get('product');
        $ret = $result->row();
        if(!empty($ret)){
            return $ret->id;
        }
    }

    function getFilteredOccassion($occassion,$color,$sort){
        $this->db->select('product.category_id,product.sub_category_id,product.product_name,product.price,product.image_path,product.thumb_image_path,product.medium_image_path,product.related_occassions,product.related_products,product.related_colors,product.trending,product.active_subscription,product.new_arrival,product.stock,product.special_deal,product.special_deal_text,product.key_words,product.product_url,product.id as product_id,count(product_image.product_id) as product_count');
        if(!empty($occassion)){
            // $occassion = implode(",", $occassion);
            $this->db->group_start();
            foreach($occassion as $key => $value):
            $this->db->or_where('CONCAT(",",`related_occassions`,",") REGEXP ",(' . $value . '),"');
            endforeach;
            $this->db->group_end();
        }
        if(!empty($color)){
            $this->db->group_start();
            // $color = implode(",", $color);
            foreach($color as $key => $value):
            $this->db->or_where('CONCAT(",",`related_colors`,",") REGEXP ",(' . $value . '),"');
            endforeach;
            $this->db->group_end();
        }
        $this->db->where('product.is_active',1);
        $this->db->join('product_image', 'product_image.product_id = product.id','left');
        $this->db->group_by('product.id');
        if($sort==''){
        $this->db->order_by('product.product_name asc');
        }else{
        $this->db->order_by($sort);
        }
        $result = $this->db->get('product');
        return $result->result_array();
    }

    function get_sub_category(){
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $this->db->limit(6);
        $this->db->order_by('display_order','ASC');
        $query = $this->db->get('main_category_new');
        return $query->result_array();
    }
}

/* End of file Enquiry_model.php */
?>
