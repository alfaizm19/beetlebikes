<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model', 'customer');
    
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Customers');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/customers/view/';
        $this->render('admin/vwManageCustomers');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'customers', 'read');

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

        $this->setPageTitle('Manage Customers');
        echo $list = $this->customer->get_datatables();
    }

    public function user_view($id = NULL) {
        $this->setPageTitle('Manage Users | View User');
        $this->data['user'] = $this->user->get($id);
        $this->render('admin/vwViewUser');
    }

    public function edit($id = NULL) {
       $this->data['is_CKEditor'] = FALSE;
       $this->setPageTitle('Manage User Rights | Edit User Rights');
       $this->data['user'] = $this->user->get(array('SHA2(id, 256) =' => $id));
       if ($this->input->post('Submit') === "Save") {
           $this->update($id);
       }
       $this->render('admin/vwEditUserRights');
    }

    public function view_detail($id = NULL) {
        $this->setPageTitle('Manage Customer | View Customer');

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'customers', 'read');

        if (!$perm) {
            redirect(base_url('admin/customers'));
            exit();
        }

        $this->data['customerInfo'] = $this->customer->get_customer_info($id);
        
        $this->render('admin/vwViewCustomer');
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'customers', 'update');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $uid = $this->input->post('uid');
                $acive = $this->input->post('active');

                /* Create Log Start */
                $tbl = 'user';
                $module = 'Customers';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);
                /* Create Log End */

                $is_update = $this->customer->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Customer has been activated successfully." : "Customer has been deactivated successfully.";

                if ($is_update) {

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');

                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => $message,
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        'message' => "Something goes wrong.",
                        "type" => "success"
                    )));
                }
            }
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }
}


?>