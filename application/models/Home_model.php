<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function banners() {
		$banners = $this->db->order_by('display_order')->get_where('banner', array('is_active' => 1));

		if ($banners->num_rows()) {
			return $banners->result_object();
		} else {
			return false;
		}
	}

	public function catLv1() {
		return $this->db
		->select('category.*, count(product.id) as count')
		->order_by('category.display_order')
		->join('product', 'category.id = product.category_level_1', 'INNER')
		->group_by('category.id')
		->get_where('category', array(
			'category.parent' => 0,
			'category.is_active' => 1,
			'product.is_active' => 1,
			'category.display_on_home' => 1
		))->result_object();
	}

	public function catLv2() {
		return $this->db
		->select('a.*, count(b.id) as count, c.category as parent_cat_name, c.slug as parent_slug')
		->order_by('a.display_order')
		->join('product as b', 'a.id = b.category_level_2', 'INNER')
		->join('category as c', 'a.parent = c.id', 'INNER')
		->group_by('a.id')
		->get_where('category as a', array(
			'a.parent != ' => 0,
			'a.is_active' => 1,
			'b.is_active' => 1,
			'a.display_on_home' => 1
		))->result_object();
	}
	
	public function products() {
		return $this->db
		->select('product_name, slug, mrp, selling_price, product_tag, available_date, available_time, image_path')
		->order_by('display_order')
		->get_where('product', array(
			'is_active' => 1,
			'display_on_home' => 1,
			'featured' => 1
		))->result_object();
	}
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */