<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute_value_model extends MY_Model {

    public $table = 'attribute_value'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        $this->before_delete[] = '';
        parent::__construct();
    }

    public function isExistAttrib($attribID) {
        return $this->db->get_where('attribute_name', array(
            'SHA2(id, 256) = ' => $attribID
        ))->row();
    }

    public function get_datatables($attribID) {
        $this->load->library('datatables_ssp');
        $this->load->helper('text');

        $table = 'attribute_value'; // you MUST mention the table name
        $primary_key = 'attribute_value.id';
        $myjoin = "";
        $where = " SHA2(attrib_id, 256) = '".$attribID."' ";

        //Datatables_ssp::$extra_columns = 'created_at';

        $delete_all = array(
            'customfilter' => 'attribute_value.id',
            'db' => 'attribute_value.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $title = array(
            'customfilter' => 'name',
            'db' => 'name',
        );

        $slug = array(
            'customfilter' => 'slug',
            'db' => 'slug',
        );

        $display_order = array(
            'customfilter' => 'display_order',
            'db' => 'display_order',
            'formatter' => function($display_order, $row) {
                $display_order_data = array("id" => $row['id'], "display_order" => $display_order);
                return get_display_order($display_order_data);
            }
        );

        $is_active = array(
            'customfilter' => 'is_active',
            'db' => 'is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
            }
        );

        $get_edit = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_edit($id, 'admin/attribute-value/edit'); /// $id = row_id , method path
            }
        );

        $delete = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('delete_all', 'title', 'slug', 'is_active', 'get_edit', 'delete'));
        } else {
            $data_table = array_values(compact('delete_all', 'title', 'slug', 'is_active', 'get_edit', 'delete'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }

        return json_encode(
            Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, $myjoin, $where, 'ORDER BY attribute_value.id desc')
        );
    }

    public function remove_image($data) {

        $this->db->where_in('id', $data);
        $result_data = $this->db->get('shape');
        if ($result_data->num_rows() > 0) {
            foreach ($result_data->result_array() as $key => $val) {

                if (file_exists('./' . $val['banner']) && $val['banner'] != '') {
                    unlink('./' . $val['banner']);
                }
                if (file_exists('./' . $val['video_background_image']) && $val['video_background_image'] != '') {
                    unlink('./' . $val['video_background_image']);
                }
            }
        }
    }

    public function record_count_blog_front() {
        $this->db->where('is_active', '1');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_all_blog_front($start, $limit, $category_id) {
      $ip = getUserIpAddr();
        $this->db->select('blog_category.category as category_name,blog.*,blog_like.id as blog_like_id,blog_like.ip_address,');
        $this->db->where('blog.is_active', '1');
        $this->db->where('blog_category.is_active', '1');

        if ($category_id > 0 && !empty($category_id)) {
            $this->db->where('blog.category_id', $category_id);
        }

        $this->db->limit($limit, $start);
        $this->db->order_by("blog.id", 'DESC');
        $this->db->join('blog_like', 'blog_like.blog_id=blog.id AND blog_like.ip_address = "' . $ip . '"', 'left');
        $query = $this->db->join('blog_category', 'blog_category.id=blog.category_id', 'left');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function record_count_blog_cateogry_front($category_id) {
        $this->db->where('is_active', '1');
        $this->db->where('category_id', $category_id);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_all_blog_right_side_front() {
        $this->db->select('blog_category.category as category_name,blog.*');
        $this->db->limit(4);
        $this->db->where('blog.is_active', '1');
        $this->db->where('blog_category.is_active', '1');
       $this->db->order_by("blog.id", 'DESC');
        $query = $this->db->join('blog_category', 'blog_category.id=blog.category_id', 'left');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function get_all_blog_categories_front() {
        $this->db->select('COUNT(blog.category_id) as total_blog_cate, blog_category.category as category_name,blog.blog_title,blog.blog_url,blog.category_id as blog_category_id');
        $query = $this->db->join('blog_category', 'blog_category.id=blog.category_id', 'left');
        $this->db->where('blog.is_active', '1');
        $this->db->where('blog_category.is_active', '1');
        $this->db->group_by('blog_category.category');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function get_all_blog_detail_front($blog_url) {
        $ip = getUserIpAddr();
        $this->db->select('blog_category.category as category_name,blog.*,blog_like.id as blog_like_id,blog_like.ip_address,');
        $this->db->where('blog.blog_slug', $blog_url);
        $this->db->join('blog_like', 'blog_like.blog_id=blog.id AND blog_like.ip_address = "' . $ip . '"', 'left');
        $query = $this->db->join('blog_category', 'blog_category.id=blog.category_id', 'left');

        $query = $this->db->get($this->table);
        return $query->row();
    }

    function get_like_count($blog_id) {
        $this->db->select('likes');
        $this->db->from('blog');
        $this->db->where('id', $blog_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function get_tag_by_blog_id($id) {
        $this->db->join('tag', 'tag.id = blog_tag.tag_id', 'left');
        $this->db->where('blog_id', $id);
        $query = $this->db->get('blog_tag');
        //echo $this->db->last_query(); exit();
        return $query->result();
    }

    function record_count_tag_wise($tag_id) {

        $this->db->join('blog', 'blog.id = blog_tag.blog_id', 'left');
        $where_array = array('blog.is_active' => '1', "(date(blog_date)<= '" . date('Y-m-d') . "')");
        $this->db->where($where_array);
        $this->db->where('blog_tag.tag_id', $tag_id);
        $result = $this->db->get('blog_tag');
        return $result->num_rows();
    }

    function get_all_Tag_category($tag_id, $limit, $offset) {
        $where_array = array('blog.is_active' => '1', "(date(blog.blog_date)<= '" . date('Y-m-d') . "')");
        $this->db->select('blog_category.id,blog_category.category as category_name, blog.id , blog.category_id, blog.blog_title, blog.blog_date, blog.blog_author, image_caption,blog_image, description, blog.display_order,blog.blog_slug, blog.is_active');
        $this->db->join('blog_category', 'blog_category.id = blog_tag.cat_id', 'left');
        $this->db->where($where_array);
        $this->db->limit($offset, $limit);
        $this->db->join('blog', 'blog.id = blog_tag.blog_id', 'left');
        $this->db->where('blog_tag.tag_id', $tag_id);
        $this->db->order_by("blog_date", 'DESC');
        $result = $this->db->get('blog_tag');
        return $result->result_array();
    }

    function get_all_tags_front() {
        $this->db->select('tag_name,tag_url');
        $this->db->where('is_active', '1');
        $query = $this->db->get('tag');
        return $query->result_array();
    }
    function get_next_blog($id,$date)
	{
		$where_array=  "blog.is_active=1 AND (date(blog.blog_date)<= '".date('Y-m-d')."') AND (blog.blog_date<= '".$date."') AND blog.id <> '".$id."'";
		$this->db->select("blog.blog_slug,blog.blog_date");
		$this->db->join('blog_category', 'blog_category.id = blog.category_id', 'inner');
		$this->db->where($where_array);
		$this->db->where('blog_category.is_active', 1);
		$this->db->order_by("blog.blog_date",'DESC');
		$this->db->limit('1');
		$result = $this->db->get('blog');
		return $result->row();
	}
	function get_prev_blog($id,$date)
	{
		$where_array=  "blog.is_active=1 AND (date(blog.blog_date)<= '".date('Y-m-d')."') AND (blog.blog_date>= '".$date."') AND blog.id <> '".$id."'";
		$this->db->select("blog.blog_slug,blog.blog_date");
		$this->db->join('blog_category', 'blog_category.id = blog.category_id', 'inner');
		$this->db->where($where_array);
		$this->db->where('blog_category.is_active', 1);
		$this->db->order_by("blog.blog_date",'ASC');
		$this->db->limit('1');
		$result = $this->db->get('blog');
		return $result->row();
	}

}

/* End of file User_model.php */
