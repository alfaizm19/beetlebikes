<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Audit extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Audit_model', 'audit');
    }

    // List all your items
    public function index() {        

        $filtersData = array(
            'from' => $this->input->get('from_date'),
            'to' => $this->input->get('to_date'),
            'type_of_change' => $this->input->get('type_of_change')
        );

        $this->setPageTitle('Manage Audit');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';

        $this->data['manage_view_path'] = '' . base_url() . 'admin/audit/view/'.urlencode(serialize($filtersData));
        $this->render('admin/vwManageAudit');
    }

    public function view($filtersData) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'audit', 'read');

        if (!$perm) {
            $output = array(
             "draw"    => intval($this->input->post('draw')),
             "recordsTotal"  =>  0,
             "recordsFiltered" => 0,
             "data"    => array()
            );

            echo json_encode($output);
            exit();
        }

        $filtersData = unserialize(urldecode($filtersData));

        $this->setPageTitle('Manage Audit');
        echo $list = $this->audit->get_datatables($filtersData);
    }

    public function audit_view($id = NULL) {
        $this->setPageTitle('Manage Audit | View Audit');

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'audit', 'read');

        if (!$perm) {
            redirect(base_url('admin/audit'));
            exit();
        }

        $this->data['auditInfo'] = $this->audit->get_audit_info($id);
        
        $this->render('admin/vwViewAudit');
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

           $data = $this->input->post('uid');
           $this->db->where('id', $data);
           $is_delete = $this->db->delete('orders');
           if ($is_delete) {

                $this->db->where('order_id', $data);
                $this->db->delete('order_item');

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => true,
                    "message" => "Orders has been deleted successfully.",
                    "type" => "success"
                )));
                
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => false,
                    "message" => "Something goes wrong.",
                    "type" => "success"
                )));
            }
        }
    }

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $this->db->where_in('id', $data);
            $is_delete = $this->db->delete('orders');

            if ($is_delete) {

                $this->db->where_in('order_id', $data);
                $this->db->delete('order_item');

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => true,
                    "message" => "Orders has been deleted successfully.",
                    "type" => "success"
                )));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => false,
                    "message" => "Something goes wrong.",
                    "type" => "success"
                )));
            }
        }
    }
    
}


?>
