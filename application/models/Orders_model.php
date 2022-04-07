<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends MY_Model {

    public $table = 'orders'; // you MUST mention the table name
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

        $orderStatus = !empty($filter['order_status'])? $filter['order_status']:'';

        if (!empty($orderStatus)) {
            
            switch ($orderStatus) {
                case 'approved':
                    $orderStatus = 'Approved';
                    break;

                case 'hold':
                    $orderStatus = 'Hold';
                    break;

                case 'order_shipped':
                    $orderStatus = 'Order Shipped';
                    break;

                case 'order_delivered':
                    $orderStatus = 'Order Delivered';
                    break;

                case 'order_delivery_attempt_failed_rto':
                    $orderStatus = 'Order Delivery Attempt Failed - RTO';
                    break;

                case 'order_delivery_attempt_failed_refund_processed':
                    $orderStatus = 'Order Delivery Attempt Failed- Refund Processed';
                    break;

                case 'order_cancellation':
                    $orderStatus = 'Order Cancellation';
                    break;

                case 'order_cancelled_refund_processed':
                    $orderStatus = 'Order Cancelled - Refund Processed';
                    break;

                case 'customer_return_initiated_rvp':
                    $orderStatus = 'Customer Return Initiated - RVP';
                    break;

                case 'reverse_pickup_done':
                    $orderStatus = 'Reverse Pickup Done';
                    break;

                case 'reverse_pickup_delivered':
                    $orderStatus = 'Reverse Pickup Delivered';
                    break;

                case 'rvp_refund_processed':
                    $orderStatus = 'RVP Refund Processed';
                    break;

                case 'rvp_refund_denied':
                    $orderStatus = 'RVP Refund Denied';
                    break;

                case 'order_cancellation_by_customer':
                    $orderStatus = 'Order Cancellation - By Customer';
                    break;
                
                default:
                    $orderStatus = 'Order Confirmed';
                    break;
            }

        }

        $table = 'orders'; // you MUST mention the table name
        $primary_key = 'orders.id';
        $myjoin = "INNER JOIN user ON orders.user_id = user.id ";
        $where = "1=1 ";

        if (!empty($from_date) && !empty($to_date)) {
            $where .= " AND DATE(orders.created_at) >= '".$from_date."' AND DATE(orders.created_at) <= '".$to_date."' ";
        } elseif (!empty($from_date) && empty($to_date)) {
            $where .= " AND DATE(orders.created_at) >= '".$from_date."' ";
        } elseif (!empty($to_date) && empty($from_date)) {
            $where .= " AND DATE(orders.created_at) >= '".$to_date."' ";
        }

        if (!empty($orderStatus)) {
            $where .= " AND orders.order_status = '".$orderStatus."' ";
        }

        $order = 'ORDER BY orders.id DESC';

        $delete_all = array(
            'customfilter' => 'orders.id',
            'db' => 'orders.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $order_id = array(
            'customfilter' => 'custom_orderid',
            'db' => 'custom_orderid',
        );

        $invoice_id = array(
            'customfilter' => 'invoice_number',
            'db' => 'invoice_number',
        );

        $name = array(
            'customfilter' => 'user.first_name',
            'db' => 'user.first_name',
            'formatter' => function($fname, $row) {
                $last_name = $this->db->get('user', array('id' => $row['id']))->row('last_name');
                return $row['first_name'].' '.$last_name;
            }
        );

        $email = array(
            'customfilter' => 'user.email',
            'db' => 'user.email',
        );

        $mobile = array(
            'customfilter' => 'user.phone_number',
            'db' => 'user.phone_number',
        );

        $status = array(
            'customfilter' => 'orders.order_status',
            'db' => 'orders.order_status',
            'formatter' => function($status) {
                return ucwords($status);
            }
        );

        $order_date = array(
            'customfilter' => 'orders.created_at',
            'db' => 'orders.created_at',
            'formatter' => function($date) {
                return date('d-m-Y h:i:s A', strtotime($date));
            }
        );

        $paid_amount = array(
            'customfilter' => 'paid_amount',
            'db' => 'paid_amount',
        );

        $get_view = array(
            'customfilter' => 'orders.id',
            'db' => 'orders.id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_view($id,'admin/orders/orders_view');
            }
        );

        $action = array(
            'customfilter' => 'orders.id',
            'db' => 'orders.id',
            'formatter' => function($id, $col) {

                $actionView = '';

                if ($col['order_status'] == 'Order Shipped' OR $col['order_status'] == 'Order Delivered') {

                    $actionView .= "<div class='text-center'><a target='_blank' title='Invoice' class='btn btn-primary btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill' href='" . base_url('admin/orders/invoice') . "/" . hash('SHA256', $id) . "'><i class='fa fa-3x fa-file'></i></a></div>";

                }

                return $actionView;
            }
        );

        $delete = array(
            'customfilter' => 'orders.id',
            'db' => 'orders.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('order_id', 'invoice_id', 'email', 'status', 'order_date', 'paid_amount', 'get_view', 'action'));
        } else {
            $data_table = array_values(compact('order_id', 'invoice_id', 'email', 'status', 'order_date', 'paid_amount', 'get_view', 'action'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }
        //error_log()
        return json_encode(
            Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, $myjoin, $where, $order)
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

    public function get_order_info($id) {
        return $this->db
                ->select('a.*, b.name as first_name, b.last_name, b.email, b.phone_number')
                ->join('user as b', 'a.user_id = b.id')
                ->get_where('orders as a', array(
                    'SHA2(a.id, 256) = ' => $id))
                ->row();
    }

    public function get_order_status_history($id) {
        return $this->db->get_where('order_status_history', array('SHA2(order_id, 256) = ' => $id))->result_object();
    }

}
