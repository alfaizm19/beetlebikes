<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer_enquiry_model extends MY_Model {

    public $table = 'enquiry'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';

        parent::__construct();
    }

    function get_datatables($filter) {
        $this->load->library('datatables_ssp');
        $this->load->helper('text');

        $from_date = !empty($filter['from'])? date('Y-m-d', strtotime($filter['from'])):'';

        $to_date = !empty($filter['to'])? date('Y-m-d', strtotime($filter['to'])):'';

        $table = 'enquiry'; // you MUST mention the table name
        $primary_key = 'enquiry.id';
        $where = "1=1 AND type = 'dealer' ";

        if (!empty($from_date) && !empty($to_date)) {
            $where .= " AND DATE(enquiry.created_at) >= '".$from_date."' AND DATE(enquiry.created_at) <= '".$to_date."' ";
        } elseif (!empty($from_date) && empty($to_date)) {
            $where .= " AND DATE(enquiry.created_at) >= '".$from_date."' ";
        } elseif (!empty($to_date) && empty($from_date)) {
            $where .= " AND DATE(enquiry.created_at) >= '".$to_date."' ";
        }

        $order = 'ORDER BY enquiry.id DESC';

        $delete_all = array(
            'customfilter' => 'enquiry.id',
            'db' => 'enquiry.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $name = array(
            'customfilter' => 'name',
            'db' => 'name',
        );

        $email = array(
            'customfilter' => 'email',
            'db' => 'email',
        );

        $phone = array(
            'customfilter' => 'phone',
            'db' => 'phone',
        );

        $city = array(
            'customfilter' => 'city',
            'db' => 'city',
        );

        $date = array(
            'customfilter' => 'enquiry.created_at',
            'db' => 'enquiry.created_at',
            'formatter' => function($date) {
                return date('d-m-Y h:i:s A', strtotime($date));
            }
        );

        $get_view = array(
            'customfilter' => 'enquiry.id',
            'db' => 'enquiry.id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_view($id,'admin/dealer_enquiry/enquiry_view');
            }
        );

        $delete = array(
            'customfilter' => 'enquiry.id',
            'db' => 'enquiry.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('name', 'email', 'phone', 'city', 'date', 'get_view'));
        } else {
            $data_table = array_values(compact('name', 'email', 'phone', 'city', 'date', 'get_view'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }
        //error_log()
        return json_encode(
            Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, $myjoin='', $where, $order)
        );
    }

    function get_orders(){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_item', 'order_item.order_id = orders.id','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_orders_recreate($country){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_item', 'order_item.order_id = orders.id','left');
        $this->db->order_by('order_item.id', 'desc');
        if ($country != 'all')
        {
            $this->db->where('order_item.country', $country);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_order_detail($id){
        $this->db->select('*');
        $this->db->from('order_item');
        $this->db->join('product', 'product.id = order_item.product_id','left');
        $this->db->where('order_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_order_detail2($id){
        $query = 'SELECT order_item.*, product.product_name, product.slug, product.image_path FROM orders
        INNER JOIN order_item ON orders.id = order_item.order_id
        INNER JOIN product ON order_item.product_id = product.id
        WHERE SHA2(orders.id, 256) = "'.$id.'" ';

        return $this->db->query($query)->result_object();
    }

    public function get_enquiry_info($id) {
        return $this->db
        ->get_where('enquiry as a', array('SHA2(a.id, 256) = ' => $id))
        ->row();
    }

    public function get_order_status_history($id) {
        return $this->db->get_where('order_status_history', array('SHA2(order_id, 256) = ' => $id))->result_object();
    }

}
