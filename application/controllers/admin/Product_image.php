<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_image extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Product_image_model', 'product_image');
    }

    // List all your items
    public function index($product_id) {
        $this->setPageTitle('Manage Product Gallery');
        $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/product_image/view/' . $product_id;
        $this->render('admin/vwManageProductImage');
    }

    public function view($product_id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_gallery', 'read');

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

        $this->setPageTitle('Manage Product Gallery');
        echo $list = $this->product_image->get_datatables();
    }

    // View 
    public function view_product($product_id = "") {
        $this->setPageTitle('Manage Product Images');
        $this->data['product'] = $this->product->get($product_id);
        $this->render('admin/vwViewProduct');
    }

    // Add a new item to load view
    public function create($product_id = "") {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Add Product Image');
        if ($this->input->post('Submit') === "Save" && $product_id != "") {
            $this->save($product_id);
        }
        $this->render('admin/vwAddProductImage');
    }

    // Add a new item to database
    public function save($productId) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_gallery', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product_image/index/' . $this->input->post('hid_product_id') . '', 'refresh');
        }

        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
    
        //check product id
        $isExist = decrypt_id('product', array('SHA2(id, 256) =' => $productId));

        if (!empty($isExist)) {
            
            $adminId = get_admin_id();

            $type = $this->input->post('type');

            if ($type == 'video') {

                $data = array(
                    'admin_id' => $adminId,
                    'product_id' => $isExist->id,
                    'type' => 'video',
                    'video_url' => $this->input->post('video_url'),
                    'created_at' => date('Y-m-d h:i:s'),
                );

                /* Create Log Start */
                $tbl = 'product_image';
                $module = 'Product Video';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                /* Create Log End */

                $insert = $this->product_image->insert($data);
            } else {

                $total_addfield_count = count($_FILES);

                for ($i = 1; $i <= $total_addfield_count; $i++) {

                    if ($_FILES['product_image'.$i]['size']) {

                        $this->images->setAllowedTypes('product_image' . $i, 'jpg|jpeg|png')->setPath('product_image' . $i, './uploads/productimage/');

                        if (!$this->images->validFiles()) /** Check files are valide or not */ {
                            set_flash('message', 'danger', $this->images->error);
                            return FALSE;
                        }

                        if ($this->images->do_upload('product_image' . $i) !== TRUE) /** Check files are upload or not */ {
                            set_flash('message', 'danger', $this->images->error);
                            return FALSE;
                        }

                        if (!empty($_POST['crop_product_image'. $i])) {
                            $image_parts = explode(";base64,", $_POST['crop_product_image'. $i]);
                            $image_type_aux = explode("image/", $image_parts[0]);
                            $image_type = $image_type_aux[1];
                            $image_base64 = base64_decode($image_parts[1]);
                            $crop_product_image = 'uploads/crop/crop_product_image_'. uniqid() . '.png';
                            $isUpload = file_put_contents($crop_product_image, $image_base64);
                        } else {
                            $crop_product_image = $this->images->getdata('product_image' . $i);
                        }

                        if (!empty($this->input->post('product_image_alt'. $i))) {
                            $image_alt = $this->input->post('product_image_alt'. $i);
                        } else {
                            $image_alt = null;
                        }

                        $data = array(
                            'admin_id'  => $adminId,
                            'product_id' => $isExist->id,
                            'image_path' => $crop_product_image,
                            'image_alt' => $image_alt,
                            'created_at' => date('Y-m-d h:i:s'),
                        );

                        /* Create Log Start */
                        $tbl = 'product_image';
                        $module = 'Product Gallery';
                        $logData = $data;
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value();

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                        /* Create Log End */

                        $insert = $this->product_image->insert($data);
                    }
                }
               /* $total_addfield_count = $this->input->post('hide_total_field');
                for ($i = 1; $i <= $total_addfield_count; $i++) {

                    if (!empty($this->input->post('crop_product_image' . $i . ''))) {

                        $this->images->setAllowedTypes('product_image' . $i, 'jpg|jpeg|png')->setPath('product_image' . $i, './uploads/productimage/');

                        if (!$this->images->validFiles()) {
                            set_flash('message', 'danger', $this->images->error);
                            return FALSE;
                        }

                        if ($this->images->do_upload('product_image' . $i) !== TRUE)  {
                            set_flash('message', 'danger', $this->images->error);
                            return FALSE;
                        }

                        if (!empty($_POST['crop_product_image'. $i])) {
                            $image_parts = explode(";base64,", $_POST['crop_product_image'. $i]);
                            $image_type_aux = explode("image/", $image_parts[0]);
                            $image_type = $image_type_aux[1];
                            $image_base64 = base64_decode($image_parts[1]);
                            $crop_product_image = 'uploads/crop/crop_product_image_'. uniqid() . '.png';
                            $isUpload = file_put_contents($crop_product_image, $image_base64);
                        } else {
                            $crop_product_image = $this->images->getdata('product_image' . $i);
                        }

                        if (!empty($this->input->post('product_image_alt'. $i))) {
                            $image_alt = $this->input->post('product_image_alt'. $i);
                        } else {
                            $image_alt = null;
                        }

                        $data = array(
                                    'admin_id'  => $adminId,
                                    'product_id' => $isExist->id,
                                    'image_path' => $crop_product_image,
                                    'image_alt' => $image_alt,
                                    'created_at' => date('Y-m-d h:i:s'),
                                );

                        
                        $tbl = 'product_image';
                        $module = 'Product Gallery';
                        $logData = $data;
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value();

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                        

                        $insert = $this->product_image->insert($data);
                    }
                }*/


            }

            set_flash('message', 'success', 'Product Image has been added successfully.');

            redirect('admin/product_image/index/' . $this->input->post('hid_product_id') . '', 'refresh');


        } else {
            redirect(base_url('admin/product'),'refresh');
        }
    }

    public function edit($productId = NULL, $productImageId = NULL) {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Edit Product Image');
        
        $this->data['product'] = $this->product_image->get(array('SHA2(id, 256) =' => $productImageId));

        if ($this->input->post('Submit') === "Save" && $productId != "" && $productImageId != "") {
            $this->update($productId, $productImageId);
        }
        $this->render('admin/vwEditProductImage');
    }

    //Update one item
    public function update($productId, $id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_gallery', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product_image/index/' . $this->input->post('hid_product_id') . '', 'refresh');
        }

        $type = $this->input->post('type');

        if ($type == 'video') {
            $data = array(
                'admin_id' => $adminId,
                'type' => 'video',
                'video_url' => $this->input->post('video_url'),
                'image_alt' => null,
                'updated_at' => date('Y-m-d h:i:s'),
            );
        } else {

            $this->images->setAllowedTypes('product_image', 'jpg|jpeg|png')->setPath('product_image', './uploads/productimage/')->setUnlink('product_image', $this->data['product']->image_path);
            
            if (!$this->images->validFiles()) /** Check files are valide or not */ {
                set_flash('message', 'danger', $this->images->error);
                return FALSE;
            }

            if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                //$this->images->removeFile('user_image'); /** for single file upload */
                $this->images->removeMultipleFile();/** for single file upload */
            }

            if (!empty($_POST['crop_product_image'])) {
                $image_parts = explode(";base64,", $_POST['crop_product_image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $crop_product_image = 'uploads/crop/crop_product_image_'. uniqid() . '.png';
                $isUpload = file_put_contents($crop_product_image, $image_base64);
            } else {
                $crop_product_image = $this->images->getLink('product_image');
            }


            $data = array(
                'admin_id' => $adminId,
                // 'product_id' => $this->input->post('hid_product_id'),
                'image_path' => $crop_product_image,
                'image_alt' => $this->input->post('product_image_alt'),
                'updated_at' => date('Y-m-d h:i:s'),
            );
        }

        /* Create Log Start */
        $tbl = 'product_image';
        $module = 'Product Gallery';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(5)), $columns);

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
        /* Create Log End */

        $update = $this->product_image->update($data, array('SHA2(id, 256) = ' => $this->uri->segment(5)));

        if ($update) {
            set_flash('message', 'success', 'Product Image has been updated successfully.');
            redirect('admin/product_image/index/' . $this->input->post('hid_product_id') . '', 'refresh');
        }
        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_gallery', 'delete');

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                /* Create Log Start */
                $tbl = 'product_image';
                $module = 'Product Gallery';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->product_image->delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Product Image has been deleted successfully.",
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

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_gallery', 'delete');

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $tbl = 'product_image';
                $module = 'Product Gallery';

                foreach($data as $dat) {
                    /* Create Log Start */
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';
                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $dat), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

                /** remove image */
                $is_delete = $this->product_image->remove_image($data, TRUE);

                /** delete all recode */
                $this->db->where_in('id', $data);
                $is_delete = $this->db->delete('product_image');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Product Image has been deleted successfully.",
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

            $is_update = $this->user->update(array('is_active' => (1 != $acive)), $uid);

            $message = ($is_update && $acive != 1) ? "Product Image has been activated successfully." : "Product Image has been deactivated successfully.";

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
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }

}

/* End of file User.php */
?>