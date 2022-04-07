<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends MY_Model {

    public $table = 'banner'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        $this->before_delete[] = 'remove_image';
        parent::__construct();
    }

    public function getBannerData() {


        //Datatables_ssp::$extra_columns = 'created_at';

        $order_by = ' ORDER BY banner.id desc ';

        $deleteAll = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $bannerType = array(
            'customfilter' => 'banner_type',
            'db' => 'banner_type',
            'formatter' => function($banner_type, $row) {
                return ucwords($banner_type);
            }
        );

        $bannerImage = array(
            'customfilter' => 'banner_image',
            'db' => 'banner_image',
            'formatter' => function($image, $row) {
                if (!empty($image)) {
                    return get_image_path($image);
                } else {
                    return '';
                }
            }
        );

        $bannerVideo = array(
            'customfilter' => 'video_url',
            'db' => 'video_url',
            'formatter' => function($videoUrl, $row) {
                    
                if (!empty($videoUrl)) {
                    return '<a target="_blank" href="'.$videoUrl.'">Video URL</a>';
                } else {
                    return '';
                }
            }
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
                
                return get_edit($id, 'admin/banner/edit'); /// $id = row_id , method path
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
            $data_table = array_values(compact('deleteAll', 'bannerImage', 'display_order', 'is_active', 'get_edit', 'delete'));
        } else {
            $data_table = array_values(compact('deleteAll', 'bannerImage', 'display_order', 'is_active', 'get_edit', 'delete'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }

        return json_encode(
                Datatables_ssp::simple($_GET, $this->dbConn, $this->table, $this->primary_key, $columns, $myjoin = '', $where = '', $order_by)
        );
    }

    public function remove_image($data) {
        $result = $this->where('id', $data)->get_all();
        foreach ($result as $key => $value) {
            if (!empty($value->banner_image)) {
                if (file_exists('./' . $value->banner_image)) {
                    unlink('./' . $value->banner_image);
                }
            }

            if (!empty($value->mob_banner_image)) {
                if (file_exists('./' . $value->mob_banner_image)) {
                    unlink('./' . $value->mob_banner_image);
                }
            }
        }
    }

    public function bulk_delete($ids) {
        $this->db->where_in($this->primary_key, $ids);
        return $this->db->delete($this->table);
    }

    public function get_banner_home() {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get('banner');
        return ($query->num_rows() > 0) ? $query->result_array() : '';
    }

	  public function get_all_banner_front() {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $this->db->where('(start_date<= "'.date('Y-m-d').'" and (end_date >= "'.date('Y-m-d').'"))');
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get('banner');
        return $query->result_array();
    }

    public function get_all_promo_banner() {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $this->db->where('(start_date<= "'.date('Y-m-d').'" and (end_date >= "'.date('Y-m-d').'"))');
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get('promo_banner');
        return $query->result_array();
    }
}

/* End of file User_model.php */
