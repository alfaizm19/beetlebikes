<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Freebee extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Freebee_model', 'freebee');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Freebee');
        $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url('admin/freebee/view/');
        $this->render('admin/vwManageFreebee');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'read');

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

        $this->setPageTitle('Manage Freebee');
        echo $list = $this->freebee->get_datatables();
    }

    // Add a new item to load view
    public function create() {
        $this->data['is_CKEditor'] = TRUE;

        $this->data['category'] = $this->freebee->get_category();

        $this->setPageTitle('Add Freebee');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddFreebee');
    }

    // Add a new item to database
    public function save() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'create');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/freebee', 'refresh');
            die();
        }

        $data['error'] = "";

        // echo "<pre>";
        // print_r($_POST);
        // die();
        

        $subCategory = $freebeeSubCategory = '';

        if ($this->input->post('sub_category')) {
            $subCategory = implode(',', $this->input->post('sub_category'));
        }

        if ($this->input->post('freebee_sub_category')) {
            $freebeeSubCategory = implode(',', $this->input->post('freebee_sub_category'));
        }

        if ($data['error'] == "") {

            $productId = $this->input->post('inclusion_product');

            //check if this product id exist then update the product
            $isProductIdExsitInFreebee = $this->db->get_where('freebee', array('product_id' => $productId))->row();

            $data = array(
                'admin_id'  => $adminId,
                'category_id' => $this->input->post('category'),
                'sub_category_id' => $subCategory,
                'product_id' => $productId,
                'freebee_category_id' => $this->input->post('freebee_category'),
                'freebee_sub_category_id' => $freebeeSubCategory,
                'freebee_product_id' => $this->input->post('freebee_product'),
                'is_active' => 1
            );

            if (!$isProductIdExsitInFreebee) {
                
                //if not exist then insert this new freebee product

                /* Create Log Start */
                $tbl = 'freebee';
                $module = 'Freebee';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                /* Create Log End */

                $insert = $this->db->insert('freebee', $data);
                $insert_id = $this->db->insert_id();
                if (isset($insert)) {
                    set_flash('message', 'success', 'Freebee has been added successfully.');
                    redirect('admin/freebee', 'refresh'); 
                    //redirect in manage with msg
                }

            } else {
                //update exist freebee product

                $id = hash('SHA256', $isProductIdExsitInFreebee->id);
                
                unset($data['is_active']);

                /* Create Log Start */
                $tbl = 'freebee';
                $module = 'Freebee';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $id), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $this->db->where('SHA2(id, 256) = ', $id);
                $update = $this->db->update('freebee', $data);

                if ($update) {
                    set_flash('message', 'success', 'Freebee has been updated successfully.');
                    redirect('admin/freebee/', 'refresh'); //redirect in manage with msg
                }

            }
        }
        return FALSE;
    }

    public function edit($id = NULL) {
        $this->setPageTitle('Edit Freebee');
        $this->data['is_CKEditor'] = FALSE;

        $freebee = $this->db->get_where('freebee', array('SHA2(id, 256) = ' => $id))->row();

        if (!empty($freebee)) {
            
            $this->data['freebee'] = $freebee;

            $this->data['category'] = $this->freebee->get_category();
            $this->data['sub_category'] = $this->freebee->get_sub_category($freebee->category_id);
            $this->data['inclusion_product'] = $this->freebee->get_inclusion_product($freebee->product_id);

            $this->data['freebee_sub_category'] = $this->freebee->get_sub_category($freebee->freebee_category_id);
            $this->data['freebee_product'] = $this->freebee->get_inclusion_product($freebee->freebee_product_id);

            if ($this->input->post('Submit') === "Save") {
                $this->update($id);
            }
            $this->render('admin/vwEditFreebee');

        } else {
            set_flash('message', 'danger', 'Unable to find freebee product');
            redirect('admin/freebee', 'refresh'); 
        }
    }

    //Update one item
    public function update($id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/freebee/', 'refresh'); //
            return false;
            exit();
        }

        $data['error'] = "";

        $subCategory = $freebeeSubCategory = '';

        if ($this->input->post('sub_category')) {
            $subCategory = implode(',', $this->input->post('sub_category'));
        }

        if ($this->input->post('freebee_sub_category')) {
            $freebeeSubCategory = implode(',', $this->input->post('freebee_sub_category'));
        }

        if ($data['error'] == "") {

            $data = array(
                'admin_id'  => $adminId,
                'category_id' => $this->input->post('category'),
                'sub_category_id' => $subCategory,
                'product_id' => $this->input->post('inclusion_product'),
                'freebee_category_id' => $this->input->post('freebee_category'),
                'freebee_sub_category_id' => $freebeeSubCategory,
                'freebee_product_id' => $this->input->post('freebee_product'),
            );

            /* Create Log Start */
            $tbl = 'freebee';
            $module = 'Freebee';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $id), $columns);

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
            /* Create Log End */

            $this->db->where('SHA2(id, 256) = ', $id);
            $update = $this->db->update('freebee', $data);

            if ($update) {
                set_flash('message', 'success', 'Freebee has been updated successfully.');
                redirect('admin/freebee/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
			
			$id = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {
                
                $adminId = get_admin_id();

                /* Create Log Start */
                $tbl = 'freebee';
                $module = 'Freebee';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */
			
                $this->db->where_in('id', $id);
                $is_delete = $this->db->delete('freebee');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Freebee has been deleted successfully.",
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

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                foreach ($data as $id) {
                    /* Create Log Start */
                    $tbl = 'freebee';
                    $module = 'Freebee';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

			
                /** delete all recode */
                $this->db->where_in('id', $data);
                $is_delete = $this->db->delete('freebee');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Freebee has been deleted successfully.",
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

    public function is_active() {
        if ($this->input->is_ajax_request()) {

            $uid = $this->input->post('uid');
            $acive = $this->input->post('active');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'update');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $adminId = get_admin_id();

                /* Create Log Start */
                $tbl = 'freebee';
                $module = 'Freebee';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->freebee->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Freebee product has been activated successfully." : "Freebee product has been deactivated successfully.";

                if ($is_update) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => $message,
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
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }

}

/* End of file User.php */
