<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_more_model extends MY_Model {

	public function parent_cat_product($limit, $offset, $parent) {

		return $this->db
			 ->limit($limit, $offset)
			 ->get_where('product', array(
				'category_level_1' => $parent,
				'is_active' => 1))
			 ->result_object();

	}

	public function sub_cat_product($limit, $offset, $parent, $child) {

		return $this->db
			 ->limit($limit, $offset)
			 ->get_where('product', array(
				'category_level_1' => $parent,
				'category_level_2' => $child,
				'is_active' => 1))
			 ->result_object();

	}
	

}

/* End of file Load_more.php */
/* Location: ./application/models/Load_more.php */