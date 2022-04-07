<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_code extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Promo_code_model', 'promo');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Promo Code');
        $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url('admin/Promo_code/view/');
        $this->render('admin/vwManagePromoCode');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'read');

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

        $this->setPageTitle('Manage Promo Code');
        echo $list = $this->promo->get_datatables();
    }

    // Add a new item to load view
    public function create() {
        $this->data['is_CKEditor'] = TRUE;

        $this->data['category'] = $this->promo->get_category();

        $this->setPageTitle('Add Promo Code');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddPromoCode');
    }

    // Add a new item to database
    public function save() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'create');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/promo-code', 'refresh');
            die();
        }

        $data['error'] = "";
        $checkCode = $this->db->get_where('promo_code', array('promo_code' => $this->input->post('code')));

        if ($checkCode->num_rows() >= 1) {
            set_flash('error', 'danger', 'Please enter other promo code. This promo code already exists.');
            $data['error'] = 'error.';
        }

        $subCategory = $exclusion_sub_category = $exclusion_sku= $inclusion_product = '';

        if ($this->input->post('sub_category')) {
            $subCategory = implode(',', $this->input->post('sub_category'));
        }

        if ($this->input->post('exclusion_sub_category')) {
            $exclusion_sub_category = implode(',', $this->input->post('exclusion_sub_category'));
        }

        if ($this->input->post('exclusion_sku')) {
            $exclusion_sku = implode(',', $this->input->post('exclusion_sku'));
        }

        if ($this->input->post('inclusion_product')) {
            $inclusion_product = implode(',', $this->input->post('inclusion_product'));
        }

        if ($data['error'] == "") {

            $data = array(
                'admin_id'  => $adminId,
                'promo_title' => $this->input->post('promoTitle'),
                'discount_type' => $this->input->post('discountType'),
                'promo_code' => $this->input->post('code'),
                'start_date' => !empty($this->input->post('startDate'))? $this->input->post('startDate'):null,
                'end_date' => !empty($this->input->post('endDate'))? $this->input->post('endDate'):null,
                'is_active' => 1,
                'discount' => $this->input->post('discount'),
                'category' => $this->input->post('category'),
                'sub_category' => $subCategory,
                'exclusion_sub_category' => $exclusion_sub_category,
                'exclusion_sku' => $exclusion_sku,
                'inclusion_product' => $inclusion_product,
                'usage_time' => $this->input->post('usage'),
                'min_cart_value' => $this->input->post('min_cart_value'),
                'max_discount' => $this->input->post('max_discount'),
                'multi_time_value' => $this->input->post('max_used'),
                'stock' => $this->input->post('stock'),
            );

            /* Create Log Start */
            $tbl = 'promo_code';
            $module = 'Promo Code';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value();

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
            /* Create Log End */

            $insert = $this->db->insert('promo_code', $data);
            $insert_id = $this->db->insert_id();
            if (isset($insert)) {
                set_flash('message', 'success', 'Promo code has been added successfully.');
                redirect('admin/promo-code', 'refresh'); 
                //redirect in manage with msg
            }
        }

        return FALSE;
    }

    public function edit($id = NULL) {
        $this->setPageTitle('Edit Promo Code');
        $this->data['is_CKEditor'] = TRUE;

        $this->data['category'] = $this->promo->get_category();

        $this->data['promo'] = $this->db->get_where('promo_code', array('SHA2(id, 256) = ' => $id))->result_object();

        $this->data['sub_category'] = $this->promo->get_sub_category($this->data['promo'][0]->category);

        $this->data['exclusion_sku'] = $this->promo->get_exclusion_sku($this->data['promo'][0]->exclusion_sku);

        $this->data['inclusion_product'] = $this->promo->get_inclusion_product($this->data['promo'][0]->inclusion_product);


        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
        $this->render('admin/vwEditPromoCode');
    }

    //Update one item
    public function update($id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/promo-code/', 'refresh'); //
            return false;
            exit();
        }

        $data['error'] = "";

        $isExistPromoCode = $this->db->get_where('promo_code', array('promo_code' => $this->input->post('code'), 'SHA2(id, 256) != ' => $id))->num_rows();

        if ($isExistPromoCode) {
            set_flash('error', 'danger', 'Please enter promo code. This promo code already exists.');
            $data['error'] = 'error.';
        }

        $subCategory = $exclusion_sub_category = $exclusion_sku= $inclusion_product = '';

        if ($this->input->post('sub_category')) {
            $subCategory = implode(',', $this->input->post('sub_category'));
        }

        if ($this->input->post('exclusion_sub_category')) {
            $exclusion_sub_category = implode(',', $this->input->post('exclusion_sub_category'));
        }

        if ($this->input->post('exclusion_sku')) {
            $exclusion_sku = implode(',', $this->input->post('exclusion_sku'));
        }

        if ($this->input->post('inclusion_product')) {
            $inclusion_product = implode(',', $this->input->post('inclusion_product'));
        }

        if ($data['error'] == "") {

            $data = array(
                'admin_id'  => $adminId,
                'promo_title' => $this->input->post('promoTitle'),
                'discount_type' => $this->input->post('discountType'),
                'promo_code' => $this->input->post('code'),
                'start_date' => !empty($this->input->post('startDate'))? $this->input->post('startDate'):null,
                'end_date' => !empty($this->input->post('endDate'))? $this->input->post('endDate'):null,
                'is_active' => 1,
                'discount' => $this->input->post('discount'),
                'category' => $this->input->post('category'),
                'sub_category' => $subCategory,
                'exclusion_sub_category' => $exclusion_sub_category,
                'exclusion_sku' => $exclusion_sku,
                'inclusion_product' => $inclusion_product,
                'usage_time' => $this->input->post('usage'),
                'min_cart_value' => $this->input->post('min_cart_value'),
                'max_discount' => $this->input->post('max_discount'),
                'multi_time_value' => $this->input->post('max_used'),
                'stock' => $this->input->post('stock'),
            );

            /* Create Log Start */
            $tbl = 'promo_code';
            $module = 'Promo Code';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $id), $columns);

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
            /* Create Log End */

            $this->db->where('SHA2(id, 256) = ', $id);
            $update = $this->db->update('promo_code', $data);

            if ($update) {
                set_flash('message', 'success', 'Promo code has been updated successfully.');
                redirect('admin/promo-code/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
			
			$id = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'promo_code';
                $module = 'Promo Code';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                $adminId = get_admin_id();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */
			
                $this->db->where_in('id', $id);
                $is_delete = $this->db->delete('promo_code');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Promo code has been deleted successfully.",
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

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'delete');

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
                    $tbl = 'promo_code';
                    $module = 'Promo Code';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

			
                /** delete all recode */
                $this->db->where_in('id', $data);
                $is_delete = $this->db->delete('promo_code');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Promo code has been deleted successfully.",
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

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'update');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $adminId = get_admin_id();

                /* Create Log Start */
                $tbl = 'promo_code';
                $module = 'Promo Code';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->promo->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Promo code has been activated successfully." : "Promo code has been deactivated successfully.";

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
