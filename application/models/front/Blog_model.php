<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model{
	
	public function allBlogCount()
	{
		$this->db->select('title, description, date, link, author_name,image');
		$this->db->from('blogs');
		$this->db->where('is_active',1);
		$this->db->where('date <=', date('Y-m-d'));
		$query = $this->db->get()->num_rows();
		return $query;
	}

	public function allBlog($limit,$start)
	{
		$this->db->select('title, description, date, link, author_name,image');
		$this->db->from('blogs');
		$this->db->where('is_active',1);
		$this->db->where('date <=', date('Y-m-d'));
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get()->result_array();
		return $query;
	}


	public function blogDetailsBySlug($slug)
	{
		$this->db->select('title, description, date, link, author_name,image');
		$this->db->from('blogs');
		$this->db->where('is_active',1);
		$this->db->where('date <=', date('Y-m-d'));
		$this->db->where('link = ',$slug);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function recentBlogs()
	{
		$this->db->select('title, link, image');
		$this->db->from('blogs');
		$this->db->where('is_active',1);
		$this->db->where('date <=', date('Y-m-d'));
		$this->db->order_by('id', 'desc');
		$this->db->limit(4, 0);
		$query = $this->db->get()->result_array();
		return $query;
	}

}

?>