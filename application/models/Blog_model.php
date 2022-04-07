<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends MY_Model {

    public $table = 'blogs'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        $this->before_delete[] = 'remove_image';
        parent::__construct();
    }

    function get_datatables() {
        $this->load->library('datatables_ssp');
        $primary_key = 'blogs.id';
        $myjoin = '';
        $custom_where = "";

        $delete_all = array(
            'customfilter' => 'blogs.id',
            'db' => 'blogs.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $title = array(
            'customfilter' => 'title',
            'db' => 'title',
        );

        $author = array(
            'customfilter' => 'author_name',
            'db' => 'author_name',
        );

        $get_edit = array(
            'customfilter' => 'blogs.id',
            'db' => 'blogs.id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_edit($id, 'admin/blog/edit'); /// $id = row_id , method path
            }
        );

        $display_order = array(
            'customfilter' => 'blogs.display_order',
            'db' => 'blogs.display_order',
            'formatter' => function($display_order, $row) {
                $display_order_data = array("id" => $row['id'], "display_order" => $display_order);
                return get_display_order($display_order_data);
            }
        );

        $is_active = array(
            'customfilter' => 'blogs.is_active',
            'db' => 'blogs.is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
            }
        );

        $delete = array(
            'customfilter' => 'blogs.id',
            'db' => 'blogs.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        function get_type($type) {
            if ($type == 0) {
                return 'product';
            } else {
                return 'Service';
            }
        }

        $data_table = array_values(compact('delete_all', 'title', 'author', 'display_order', 'is_active', 'get_edit', 'delete'));

        $columns = array();

        // error_log(json_encode($_GET));

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }
        
        // error_log(json_encode($columns));
        // error_log(json_encode($_GET));

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

        $result = $this->where('id', $data)->get_all();

        if (!empty($result)) {
                foreach ($result as $key => $value) {
                if (file_exists('./' . $value->image)) {
                    unlink('./' . $value->image);
                }
            }
        }
    }
}

/* End of file Enquiry_model.php */
?>
