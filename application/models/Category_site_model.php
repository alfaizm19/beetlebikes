<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_site_model extends MY_Model {

	public function check_parent_cat($slug) {
		return $this->db
				->select('a.*, count(b.id) as count')
				->join('product as b', ' a.id = b.category_level_1')
				->having(array('count >' => 0))
				->get_where('category as a', array('a.slug' => $slug, 'a.parent' => 0, 'a.is_active' => 1))->row();
	}

	public function check_child_cat($slug) {
		return $this->db
				->select('a.*, count(b.id) as count')
				->join('product as b', ' a.id = b.category_level_2')
				->get_where('category as a', array('a.slug' => $slug, 'a.parent != ' => 0, 'a.is_active' => 1))->row();
	}

	public function check_parent_child_cat($parentSlug, $childSlug) {
		return $this->db
				->select('a.*, b.id as parent_cat_id, b.category as parent_cat_name, b.slug as parent_cat_slug, count(c.id) as count')
				->join('category as b', ' a.parent = b.id')
				->join('product as c', ' a.id = c.category_level_2')
				->having(array('count >' => 0))
				->get_where('category as a', array('a.slug' => $childSlug, 'a.parent != ' => 0, 'a.is_active' => 1, 'b.slug' => $parentSlug))->row();
	}

	public function get_parent_child($parent) {
		return $this->db
				->select('a.id, a.category, a.slug, count(b.id) as count')
				->join('product as b', ' a.id = b.category_level_2')
				->group_by('a.id')
				->order_by('a.display_order')
				->get_where('category as a', array('a.parent' => $parent, 'a.is_active' => 1))
				->result_object();
	}

	public function get_products_by_parent($parent, $limit=3) {
		return $this->db
		->select('a.*, round((SELECT AVG(aa.rating) FROM product_reviews as aa WHERE aa.product_id = a.id AND aa.is_active = 1)) as rating')
		->order_by('a.id', 'desc')->limit($limit)
		->get_where('product as a', array('a.category_level_1' => $parent, 'a.is_active' => 1))
		->result_object();
	}

	public function get_products_price_by_parent($parent) {
		return $this->db->select('MIN(product.mrp) as min_mrp,  MAX(product.mrp) as max_mrp')->get_where('product', array('category_level_1' => $parent, 'is_active' => 1))->row();
	}

	public function get_products_by_child($child, $limit=3) {
		return $this->db
		->select('a.*, round((SELECT AVG(aa.rating) FROM product_reviews as aa WHERE aa.product_id = a.id AND aa.is_active = 1)) as rating')
		->order_by('a.id', 'desc')->limit($limit)
		->get_where('product as a', array('a.category_level_2' => $child, 'a.is_active' => 1))
		->result_object();
	}

	public function get_products_price_by_child($child) {
		return $this->db->select('MIN(product.mrp) as min_mrp,  MAX(product.mrp) as max_mrp')->get_where('product', array('category_level_2' => $child, 'is_active' => 1))->row();
	}

	public function count_products_by_parent($parent) {
		return $this->db->get_where('product', array('category_level_1' => $parent, 'is_active' => 1))->num_rows();
	}

	public function count_products_by_child($child) {
		return $this->db->get_where('product', array('category_level_2' => $child, 'is_active' => 1))->num_rows();
	}

	public function get_data_from_parent_id($parentId) {
		return $this->db->get_where('category', array(
			'id' => $parentId,
			'is_active' => 1
		))->row();
	}

}

/* End of file Category_site_model.php */
/* Location: ./application/models/Category_site_model.php */