<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_site_model extends MY_Model {

	public function get_prod_by_slug($slug) {
		return $this->db->get_where('product', array(
			'slug' => $slug,
			'is_active' => 1
		))->row();
	}

	public function get_parent_cat_prod_by_slug($parentSlug, $prodSlug) {
		return $this->db
				->select('a.*, b.id as parent_cat_id, b.category as parent_cat_name, b.slug as parent_cat_slug')
				->join('category as b', ' a.category_level_1 = b.id')
				->get_where('product as a', array('a.slug' => $prodSlug, 'a.is_active' => 1, 'b.slug' => $parentSlug))->row();
	}

	public function get_parent_child_cat_prod_by_slug($parentSlug, $childSlug, $prodSlug) {
		return $this->db
				->select('a.*, b.id as parent_cat_id, b.category as parent_cat_name, b.slug as parent_cat_slug, c.id as child_cat_id, c.category as child_cat_name, c.slug as child_cat_slug')
				->join('category as b', ' a.category_level_1 = b.id')
				->join('category as c', ' a.category_level_2 = c.id')
				->get_where('product as a', array('a.slug' => $prodSlug, 'a.is_active' => 1, 'b.slug' => $parentSlug, 'c.slug' => $childSlug))->row();
	}

	public function get_images($id) {
		return $this->db->get_where('product_image', array(
			'product_id' => $id
		))->result_object();
	}

	public function get_similar($catId, $subCatId, $productId) {
		$this->db->where('category_level_1', $catId);
			
		if (!empty($subCatId)) {
			$this->db->where('category_level_2', $subCatId);
		}

		$this->db->where('is_active', 1);
		$this->db->where('id != ', $productId);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(10);
		return $this->db->get('product')->result_object();
	}

	public function get_similar_based_on_weight($catId, $weight, $productId) {
		$this->db->where('category_level_1', $catId);
		$this->db->where('net_weight', $weight);
		$this->db->where('is_active', 1);
		$this->db->where('id != ', $productId);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(10);
		return $this->db->get('product')->result_object();
	}

}

/* End of file Products_site_model.php */
/* Location: ./application/models/Products_site_model.php */