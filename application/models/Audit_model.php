<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_model extends MY_Model {

    public $table = 'audit'; // you MUST mention the table name
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

        $typeOfChange = !empty($filter['type_of_change'])? $filter['type_of_change']:'';        

        if (!empty($typeOfChange)) {
            
            switch ($typeOfChange) {
                case 'insert':
                    $typeOfChange = 'Insert';
                    break;

                case 'update':
                    $typeOfChange = 'Update';
                    break;

                case 'delete':
                    $typeOfChange = 'Delete';
                    break;
                
                default:
                    $typeOfChange = 'Insert';
                    break;
            }

        }

        $table = 'audit'; // you MUST mention the table name
        $primary_key = 'audit.id';
        $myjoin = "";
        $where = "1=1 ";

        if (!empty($from_date) && !empty($to_date)) {
            $where .= " AND DATE(audit.created_at) >= '".$from_date."' AND DATE(audit.created_at) <= '".$to_date."' ";
        } elseif (!empty($from_date) && empty($to_date)) {
            $where .= " AND DATE(audit.created_at) >= '".$from_date."' ";
        } elseif (!empty($to_date) && empty($from_date)) {
            $where .= " AND DATE(audit.created_at) >= '".$to_date."' ";
        }

        if (!empty($typeOfChange)) {
            $where .= " AND audit.type_of_change = '".$typeOfChange."' ";
        }

        $order = 'ORDER BY audit.id DESC';

        $delete_all = array(
            'customfilter' => 'audit.id',
            'db' => 'audit.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $admin_name = array(
            'customfilter' => 'admin_email',
            'db' => 'admin_email',
            'formatter' => function($email) {
                $data = $this->db->get_where('admins', array('email' => $email))->row();
                return $data->first_name;
            }
        );

        $admin_email = array(
            'customfilter' => 'admin_email',
            'db' => 'admin_email',
        );

        $module_name = array(
            'customfilter' => 'module_name',
            'db' => 'module_name'
        );

        $table_name = array(
            'customfilter' => 'table_name',
            'db' => 'table_name',
        );

        $type_of_change = array(
            'customfilter' => 'type_of_change',
            'db' => 'type_of_change',
        );

        $created_at = array(
            'customfilter' => 'created_at',
            'db' => 'created_at',
            'formatter' => function($date) {
                return date('d-m-Y h:i:s A', strtotime($date));
            }
        );

        $get_view = array(
            'customfilter' => 'audit.id',
            'db' => 'audit.id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_view($id,'admin/audit/audit_view');
            }
        );

        $delete = array(
            'customfilter' => 'audit.id',
            'db' => 'audit.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('admin_name', 'admin_email', 'module_name', 'table_name', 'type_of_change', 'created_at', 'get_view'));
        } else {
            $data_table = array_values(compact('admin_name', 'admin_email', 'module_name', 'table_name', 'type_of_change', 'created_at', 'get_view'));
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

    public function get_audit_info($id) {
        return $this->db->get_where('audit', array(
            'SHA2(id, 256) = ' => $id
        ))->row();
    }

    

}
