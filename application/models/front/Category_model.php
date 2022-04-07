<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{
	
	public function allCategoriesCount()
	{
		$this->db->select('id');
		$this->db->from('category');
		$this->db->where('parent',0);
		$this->db->where('is_active',1);
		$query = $this->db->get()->num_rows();
		return $query;
	}

	public function allCategories($limit,$start)
	{
		$this->db->select('cat.category, cat.slug, cat.banner_image as category_image, cat.content, cat.id');
		$this->db->from('category as cat');
		$this->db->join('product as prod', 'cat.id = prod.category_level_1', 'inner');
		$this->db->where('prod.available_date <=', date('Y-m-d'));
		$this->db->where('prod.is_active',1);
		$this->db->where('prod.stock >= ',1);
		$this->db->group_by('cat.category');
		$query = $this->db->get()->result_array();
		return $query;

		
		/*$this->db->select('cat.category, cat.slug, cat.banner_image as category_image, cat.content, cat.id');
		$this->db->from('category');
		$this->db->where('is_active',1);
		$this->db->where('parent',0);
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get()->result_array();
		return $query;*/
	}


	public function allSubCategoriesCount($catId)
	{
		$this->db->select('cat.category, cat.slug, cat.banner_image as category_image, cat.content, cat.id');
		$this->db->from('category as cat');
		$this->db->join('product as prod', 'cat.id = prod.category_level_1', 'inner');
		$this->db->where('prod.available_date <=', date('Y-m-d'));
		$this->db->where('prod.is_active',1);
		$this->db->where('prod.stock >= ',1);
		$this->db->group_by('cat.category');
		$query = $this->db->get()->num_rows();
		return $query;
	}

	public function allSubCategories($limit,$start,$catId)
	{
		$this->db->select('category, slug, banner_image as category_image, content, id');
		$this->db->from('category');
		$this->db->where('is_active',1);
		$this->db->where('parent',$catId);
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getCategoryBySlug($slug)
	{
		$this->db->select('id');
		$this->db->where('is_active',1);
		$this->db->where('slug',$slug);
		$query = $this->db->get('category');
		$result =  $query->row_array();
		return $result;
	}

	public function getCategoryDetailBySlug($slug)
	{
		$this->db->where('is_active',1);
		$this->db->where('slug',$slug);
		$query = $this->db->get('category');
		$result =  $query->row();
		return $result;
	}

}

?>