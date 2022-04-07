<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category2 extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model', 'category');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Categories');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/category2/view/';
        $this->render('admin/vwManageCategory2');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'read');

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

        $this->setPageTitle('Manage Categories');
        echo $list = $this->category->getCategory2Tables();
    }

    public function create() {
        $this->data['is_CKEditor'] = TRUE;
        $this->setPageTitle('Add Category');

        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }

        $this->data['parentCategories'] = $this->category->getParent();

        $this->render('admin/vwAddCategory2');
    }

    public function save() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/category-level-2/', 'refresh');
            die();
        }

        $adminId = get_admin_id();

        $slug = url_title($this->input->post('category'), '-', true);

        $slug = $this->Master_model->validateSlug('category', 'slug', $slug);

        $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/category2/');

        if (!$this->images->validFiles()) /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if (!empty($_POST['crop_image_path'])) {

            $imageName = pathinfo($_FILES['image_path']['name'], PATHINFO_FILENAME);

            $imageName = url_title($imageName, '-', true);

            $image_parts = explode(";base64,", $_POST['crop_image_path']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

            $imageName = 'uploads/category2/'.$imageName. '.png';

            $isUpload = file_put_contents($imageName, $image_base64);
        } else {
            $imageName = $this->images->getdata('image_path');
        }

        $this->images->setAllowedTypes('category_image', 'jpg|jpeg|png')->setPath('category_image', './uploads/category2/image/');

        if (!$this->images->validFiles()) /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if (!empty($_POST['crop_category_image'])) {

            $catImageName = pathinfo($_FILES['category_image']['name'], PATHINFO_FILENAME);

            $catImageName = url_title($catImageName, '-', true);

            $image_parts = explode(";base64,", $_POST['crop_category_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

            $catImageName = 'uploads/category2/image/'.$catImageName. '.png';

            $isUpload = file_put_contents($catImageName, $image_base64);
        } else {
            $catImageName = $this->images->getdata('category_image');
        }

        $data = array(
            'admin_id' => $adminId,
            'category' => $this->input->post('category'),
            'slug' => $slug,
            'parent' => $this->input->post('parent'),
            'heading' => $this->input->post('heading'),
            'content' => $this->input->post('content'),
            'banner_image' => $imageName,
            'banner_image_alt' => $this->input->post('alt_tag'),            
            'category_image' => $catImageName,
            'category_image_alt' => $this->input->post('image_alt_tag'),
            'display_on_home' => $this->input->post('homepage')?1:0,
            'template' => $this->input->post('template'),
            'custom_template' => $this->input->post('custom_template'),
            'footer_content' => $this->input->post('footer_content'),
            'display_order' => $this->input->post('display_order'),
            'meta_title' => $this->input->post('meta_title'),
            'meta_key_words' => $this->input->post('meta_key_words'),
            'meta_description' => $this->input->post('meta_description'),
            'created_at' => date('Y-m-d h:i:s')
        );

        /* Create Log Start */
        $tbl = 'category';
        $module = 'Category Level 2';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value();

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
        /* Create Log End */

        $insert = $this->category->insert($data);

        if ($insert) {
            set_flash('message', 'success', 'Category has been added successfully.');
            redirect('admin/category-level-2/', 'refresh'); //redirect in manage with msg
        }
        return FALSE;
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = TRUE;
        $this->setPageTitle('Edit Category');
        
        $this->data['category'] = $this->category->get(array('SHA2(id, 256) = ' => $id));

        if (empty($this->data['category'])) {
            redirect(base_url('admin/category-level-1'),'refresh');
        }

        $this->data['parentCategories'] = $this->category->getParent();
   
        if ($this->input->post('Submit') === "Save" && $id != "") {
            $this->update($id);
        }
        $this->render('admin/vwEditCategory2');
    }

    //Update one item
    public function update($id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/category-level-2/', 'refresh'); //
            return false;
            exit();
        } 

        $adminId = get_admin_id();
        
        $slug = url_title($this->input->post('categorySlug'), '-', true);

        $slug = $this->Master_model->validateSlug('category', 'slug', $slug, $id);

        $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/category2/')->setUnlink('image_path', $this->data['category']->banner_image);
        
        if (!$this->images->validFiles()) 
            /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->upload_multiple() === TRUE) 
            /** Check files are upload or not */ {
            $this->images->removeMultipleFile();
        }

        if (!empty($_POST['crop_image_path'])) {

            $imageName = pathinfo($_FILES['image_path']['name'], PATHINFO_FILENAME);

            $imageName = url_title($imageName, '-', true);

            $image_parts = explode(";base64,", $_POST['crop_image_path']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

            $imageName = 'uploads/category2/'.$imageName. '.png';

            $isUpload = file_put_contents($imageName, $image_base64);
        } else {
            $imageName = $this->images->getLink('image_path');
        }

        $this->images->setAllowedTypes('category_image', 'jpg|jpeg|png')->setPath('category_image', './uploads/category2/image/')->setUnlink('category_image', $this->data['category']->category_image);
        
        if (!$this->images->validFiles()) 
            /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->upload_multiple() === TRUE) 
            /** Check files are upload or not */ {
            $this->images->removeMultipleFile();
        }

        if (!empty($_POST['crop_category_image'])) {

            $catImageName = pathinfo($_FILES['category_image']['name'], PATHINFO_FILENAME);

            $catImageName = url_title($catImageName, '-', true);

            $image_parts = explode(";base64,", $_POST['crop_category_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

            $catImageName = 'uploads/category2/image/'.$catImageName. '.png';

            $isUpload = file_put_contents($catImageName, $image_base64);
        } else {
            $catImageName = $this->images->getLink('category_image');
        }

        $data = array(
            'admin_id' => $adminId,
            'parent' => $this->input->post('parent'),
            'category' => $this->input->post('category'),
            'slug' => $slug,

            'heading' => $this->input->post('heading'),
            'content' => $this->input->post('content'),
            'banner_image' => $imageName,
            'banner_image_alt' => $this->input->post('alt_tag'),

            'category_image' => $catImageName,
            'category_image_alt' => $this->input->post('image_alt_tag'),
            'display_on_home' => $this->input->post('homepage')?1:0,
            'template' => $this->input->post('template'),
            'custom_template' => $this->input->post('custom_template'),
            'footer_content' => $this->input->post('footer_content'),
            'display_order' => $this->input->post('display_order'),
            'meta_title' => $this->input->post('meta_title'),
            'meta_key_words' => $this->input->post('meta_key_words'),
            'meta_description' => $this->input->post('meta_description'),
            'updated_at' => date('Y-m-d h:i:s')
        );

        /* Create Log Start */
        $tbl = 'category';
        $module = 'Category Level 2';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(4)), $columns);

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
        /* Create Log End */


        $update = $this->category->update($data, array('SHA2(id, 256) = ' => $this->uri->segment(4)));
        if ($update) {
            set_flash('message', 'success', 'Category has been updated successfully.');
            redirect('admin/category-level-2/', 'refresh'); //redirect in manage with msg
        }
        return FALSE;
    }

     //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('uid');

            //check if this product id associated with other product
            // $isExist = $this->db->query("SELECT * FROM `product` WHERE find_in_set(".$id.", category)")->num_rows();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $isExist = $this->db->query("SELECT * FROM `product` WHERE category_level_2 IN (".$id.") ")->num_rows();

                if (!$isExist) {

                    /* Create Log Start */
                    $tbl = 'category';
                    $module = 'Category Level 2';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */

                    $is_delete = $this->db->query("Delete FROM category WHERE id = ".$id." ");
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Product Category has been deleted successfully.",
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Sorry, You can't delete this Category due to associated with other Product.",
                        "type" => "danger"
                    )));
                }

            }

            // $this->load->model('Product_model', 'product');
            // $product_exist = $this->product->where('category_id', $id)->count_rows();

            // if ($product_exist == 0) { /** if category is not exist with this product , then delete */
            //     $is_delete = $this->category->delete($id);
            // }

            // if (isset($is_delete) && $is_delete) {
            //     $this->output->set_content_type('application/json')->set_output(json_encode(array(
            //         "success" => true,
            //         "message" => "Product Category has been deleted successfully.",
            //         "type" => "success"
            //     )));
            // } else {
            //     $this->output->set_content_type('application/json')->set_output(json_encode(array(
            //         "success" => true,
            //         "message" => "Sorry, You can't delete this Category due to associated with other Product.",
            //         "type" => "danger"
            //     )));
            // }
        }
    }

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $isExist = 0;

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                foreach ($data as $id) {
                    // $isExist = $this->db->query("SELECT * FROM `product` WHERE find_in_set(".$id.", category)")->num_rows();

                    $isExist = $this->db->query("SELECT * FROM `product` WHERE category_level_2 IN (".$id.") ")->num_rows();
                }

                $is_delete = 0;

                if (!$isExist) {
                    
                    foreach ($data as $id) {

                        /* Create Log Start */
                        $tbl = 'category';
                        $module = 'Category Level 2';
                        $logData = '';
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                        /* Create Log End */

                        $is_delete = $this->db->query("Delete FROM category WHERE id = ".$id." ");
                    }

                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Sorry, You can't delete this Category due to associated with other Product.",
                        "type" => "danger"
                    )));
                }

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                            "success" => true,
                            "message" => "Product Category has been deleted successfully.",
                            "type" => "success"
                        )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Sorry, You can't delete this Category due to associated with other Product.",
                        "type" => "danger"
                    )));
                }

            }

            // die();

            // $this->load->model('Product_model', 'product');
            // $product_exist = $this->product->where('category_id', $data)->count_rows();

            // if ($product_exist == 0) { /** if category is not exist with this product , then delete */  
            //     $this->db->where_in('id', $data);
            //     $is_delete = $this->db->delete('category');
            // }

            // if (isset($is_delete) && $is_delete) {
            //     $this->output->set_content_type('application/json')->set_output(json_encode(array(
            //         "success" => true,
            //         "message" => "Product Category has been deleted successfully.",
            //         "type" => "success"
            //     )));
            // } else {
            //     $this->output->set_content_type('application/json')->set_output(json_encode(array(
            //         "success" => true,
            //         "message" => "Sorry, You can't delete this Category due to associated with other Product.",
            //         "type" => "danger"
            //     )));
            // }
        }
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {
            $uid = $this->input->post('uid');
            $acive = $this->input->post('active');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'update');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'category';
                $module = 'Category Level 2';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->category->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Product Category has been activated successfully." : "Product Category has been deactivated successfully.";

                if ($is_update) {
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