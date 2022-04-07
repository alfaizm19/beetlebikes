<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Product extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Product_model', 'product');
        $this->load->model('Product_image_model', 'product_image');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Products');
        $this->data['soringCol'] = '"order": [[ 0, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/product/view/';
        $this->render('admin/vwManageProduct');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');

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

        $this->setPageTitle('Manage Products');
        echo $list = $this->product->get_datatables();
    }

    // View product
    public function view_product($pId = "") {

        $this->setPageTitle('Manage Products | View Product');

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');

        if (!$perm) {
            redirect(base_url('admin/product'));
            exit();
        }

        $this->data['product'] = $this->product->get(array('SHA2(id, 256) =' => $pId));

        if (empty($this->data['product'])) {
            redirect(base_url('admin/product'),'refresh');
        }
        $this->render('admin/vwViewProduct');
    }

    public function create() {
        $this->data['is_CKEditor'] = TRUE;
        $this->setPageTitle('Add Product');

        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->data['products'] = $this->product->product();
        $this->data['categoryLevel1'] = $this->Master_model->getCategoryLevel1();
        $this->data['attributes'] = $this->Master_model->getAttributes();

        $this->render('admin/vwAddProduct');
    }

    public function save() {
        $data['error'] = "";

        $adminId = get_admin_id();

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product/', 'refresh');
            die();
        }
    
        $mySelAttributes = $this->input->post('attribute');

        $this->form_validation->set_rules('product_name', 'product name', 'trim|required|xss_clean');
        /* 
            $this->form_validation->set_rules('short_description', 'short_description', 'trim|xss_clean');
            $this->form_validation->set_rules('bm_name', 'bm name', 'trim|required|xss_clean');
               $this->form_validation->set_rules('product_tag', 'product tag', 'trim|xss_clean');
        */
        $this->form_validation->set_rules('category_lv_1', 'category level 1', 'trim|required|numeric|xss_clean');
        //$this->form_validation->set_rules('category_lv_2', 'category level 2', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('specifications', 'specifications', 'trim|xss_clean');

        $this->form_validation->set_rules('sku_code', 'sku_code', 'trim|required|xss_clean|is_unique[product.sku_code]');
        $this->form_validation->set_rules('hsn_code', 'hsn code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dimension', 'dimension', 'trim|required|xss_clean');
        $this->form_validation->set_rules('net_weight', 'net weight', 'trim|required|numeric|xss_clean');
        //$this->form_validation->set_rules('deno', 'denomination', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('mrp', 'mrp', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('sp', 'selling price', 'trim|numeric|xss_clean');
        
        $this->form_validation->set_rules('gst', 'gst', 'trim|required|numeric|xss_clean');

        $this->form_validation->set_rules('attribute', 'attribute', 'trim|xss_clean');
       // $this->form_validation->set_rules('display_date', 'display date', 'trim|xss_clean');
        //$this->form_validation->set_rules('display_time', 'display time', 'trim|xss_clean');
        
        $this->form_validation->set_rules('label', 'label', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_title', 'meta title', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_key_words', 'meta keywords', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_description', 'meta description', 'trim|xss_clean');
        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('image_path', 'image', 'trim|callback_check_product_image|xss_clean');


        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/product/create','refresh');

        } else {
            
            // $attributes = $this->input->post('attribute');

            // echo "<pre>";
            // print_r($mySelAttributes);
            // echo 1;            
            // die();
        
            $slug = url_title($this->input->post('product_name'), '-', true);

            $slug = $this->Master_model->validateSlug('product', 'slug', $slug);

            $skuCode = $this->input->post('sku_code');

            $isSkuExist = $this->db->get_where('product', array('sku_code' => $skuCode))->num_rows();

            if ($isSkuExist) {
                set_flash('error', 'danger', 'Please enter other sku code. This product sku code already in use.');
                $data['error'] = 'error.';
            }

            if ($data['error'] == "") {
                
                $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/product/');

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

                    $imageName = 'uploads/product/'.$imageName. '.png';

                    $isUpload = file_put_contents($imageName, $image_base64);
                } else {
                    $imageName = $this->images->getdata('image_path');
                }

                $displayDate = $this->input->post('display_date');
                //$displayTime = $this->input->post('display_time');
                $displayTime = '';
                if (empty($displayDate)) {
                    $displayDate = date('Y-m-d');
                } else {
                    $displayDate = date('Y-m-d', strtotime($displayDate));
                }

                if (empty($displayTime)) {
                    $displayTime = null;
                }

                $sp = $this->input->post('sp');
      
                if (empty($sp)) {
                    $sp = NULL;
                } else {
                   $sp = $this->input->post('sp');
                }

                $data = array(
                    'admin_id' => $adminId,
                    'product_name' => $this->input->post('product_name'),
                    'slug' => $slug,
                    'break_type' => $this->input->post('break_type'),
                    'handle_type' => $this->input->post('handle_type'),
                    'tyre_type' => $this->input->post('tyre_type'),
                    'frame_material' => $this->input->post('frame_material'),
                    'frame_size' => $this->input->post('frame_size'),
                    'wheel_size' => $this->input->post('wheel_size'),
                  /* 
                    'bm_name' => $this->input->post('bm_name'),
                    'short_description' => $this->input->post('short_description'),
                    'popular' => $this->input->post('popular')? 1:0,
                    'on_sale' => $this->input->post('sale')? 1:0,
                    'product_tag' => $this->input->post('product_tag'),   
                    */
                    'category_level_1' => $this->input->post('category_lv_1'),
                    'category_level_2' => $this->input->post('category_lv_2'),
                    'description' => $this->input->post('description'),
                    'specifications' => $this->input->post('specifications'),

                    'sku_code' => $this->input->post('sku_code'),
                    'hsn_code' => $this->input->post('hsn_code'),
                    'dimension' => $this->input->post('dimension'),
                    'net_weight' => $this->input->post('net_weight'),
                    //'deno' => $this->input->post('deno'),
                    'stock' => $this->input->post('stock'),
                    'mrp' => $this->input->post('mrp'),
                    'selling_price' => $sp,
                    'gst' => $this->input->post('gst'),
                    // 'attributes' => $attribData,
                   
                    'available_date' => $displayDate,
                    'available_time' => $displayTime,
                    'image_path' => $imageName,
                    'featured' => $this->input->post('featured')? 1:0,
                    
                    
                    'display_on_home' => $this->input->post('homepage')? 1:0,
                    'display_order' => $this->input->post('display_order'),

                    'label' => $this->input->post('label'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_key_words' => $this->input->post('meta_key_words'),
                    'meta_description' => $this->input->post('meta_description')
                );

                /* Create Log Start */
                $tbl = 'product';
                $module = 'Product';
                $data = $data;
                $columns = array_keys($data);

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
                /* Create Log End */

                $inserted = $this->db->insert('product', $data);
                $prodId  = $this->db->insert_id();

                if (!empty($mySelAttributes)) {
                    
                    foreach ($mySelAttributes as $attrKeys => $attrVals) {
                    
                        $isMulti = $this->Master_model->is_multi_attrib($attrKeys);

                        $tbl = 'product_selected_attributes';
                        $module = 'Product Attributes';

                        if ($isMulti) {
                            foreach ($attrVals as $attrVal) {
                                if (!empty($attrVal)) {

                                    /* Create Log Start */
                                    $data = array('admin_id' => $adminId, 'product_id' => $prodId, 'attribute_name' => $attrKeys, 'attribute_value' => $attrVal);
                                    $columns = array_keys($data);

                                    $oldValue = $this->Master_model->get_old_value();

                                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
                                    /* Create Log End */
                                    
                                    $this->db->insert('product_selected_attributes', array('admin_id' => $adminId, 'product_id' => $prodId, 'attribute_name' => $attrKeys, 'attribute_value' => $attrVal));

                                }
                            }
                        } else {
                            if (isset($attrVals[0]) && !empty($attrVals[0])) {

                                /* Create Log Start */
                                $data = array('admin_id' => $adminId, 'product_id' => $prodId, 'attribute_name' => $attrKeys, 'attribute_value' => $attrVals[0]);
                                $columns = array_keys($data);

                                $oldValue = $this->Master_model->get_old_value();

                                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
                                /* Create Log End */
                                
                                $this->db->insert('product_selected_attributes', array('admin_id' => $adminId, 'product_id' => $prodId, 'attribute_name' => $attrKeys, 'attribute_value' => $attrVals[0]));
                            }
                        }

                    }
                    
                }

                if ($inserted) {
                    set_flash('message', 'success', 'Product has been added successfully.');
                    redirect('admin/product/', 'refresh'); 
                    //redirect in manage with msg
                }
            }
        }

        return FALSE;
    }

    public function edit($id = NULL) {

        $this->data['is_CKEditor'] = TRUE;

        $this->setPageTitle('Edit Product ');

        $this->data['prod'] = $this->product->get(array('SHA2(id, 256) =' => $id));

        if (empty($this->data['prod'])) {
            redirect(base_url('admin/product'),'refresh');
        }

        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }

        $this->data['categoryLevel1'] = $this->Master_model->getCategoryLevel1();
        $this->data['attributes'] = $this->Master_model->getAttributes();
        $this->data['selAttributes'] = $this->Master_model->get_selected_attribute($this->data['prod']->id);
       
       $this->render('admin/vwEditProduct');
    }

    //Update one item
    public function update($id) {
        $data['error'] = "";

        $adminId = get_admin_id();

        $sp = $this->input->post('sp');
      
        if (empty($sp)) {
            $sp = NULL;
        } else {
           $sp = $this->input->post('sp');
        }
       
        
        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product/', 'refresh'); //redirect    
            return false;
            exit();
        }

        $mySelAttributes = $this->input->post('attribute');

        $this->form_validation->set_rules('product_name', 'product name', 'trim|required|xss_clean');
       
        $this->form_validation->set_rules('category_lv_1', 'category level 1', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('category_lv_2', 'category level 2', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('specifications', 'specifications', 'trim|xss_clean');
        
        $this->form_validation->set_rules('sku_code', 'sku_code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hsn_code', 'hsn code', 'trim|required|xss_clean');
        /*  
            $this->form_validation->set_rules('dimension', 'dimension', 'trim|required|xss_clean');
            $this->form_validation->set_rules('net_weight', 'net weight', 'trim|required|numeric|xss_clean');
        */
        //$this->form_validation->set_rules('deno', 'denomination', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stock', 'stock', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('mrp', 'mrp', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('sp', 'selling price', 'trim|numeric|xss_clean');
        
        $this->form_validation->set_rules('gst', 'gst', 'trim|required|numeric|xss_clean');

        $this->form_validation->set_rules('attribute', 'attribute', 'trim|xss_clean');
        $this->form_validation->set_rules('display_date', 'display date', 'trim|xss_clean');
       // $this->form_validation->set_rules('display_time', 'display time', 'trim|xss_clean');
        
        $this->form_validation->set_rules('label', 'label', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_title', 'meta title', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_key_words', 'meta keywords', 'trim|xss_clean');
        $this->form_validation->set_rules('meta_description', 'meta description', 'trim|xss_clean');
        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('image_path', 'image', 'trim|callback_check_product_image_edit|xss_clean');


        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/product/edit/'.$id,'refresh');

        } else {

            $attributes = $this->input->post('attribute');

            if (!empty($mySelAttributes)) {
                $prodId = $this->data['prod']->id;

                $this->db->where('product_id', $prodId);
                $this->db->delete('product_selected_attributes');

                foreach ($mySelAttributes as $attrKeys => $attrVals) {
                    foreach ($attrVals as $attrVal) {
                        $this->db->insert('product_selected_attributes', array('product_id' => $prodId, 'attribute_name' => $attrKeys, 'attribute_value' => $attrVal));
                    }
                }
            }

            $slug = url_title($this->input->post('slug'), '-', true);

            $slug = $this->Master_model->validateSlug('product', 'slug', $slug, $id);

            $skuCode = $this->input->post('sku_code');

            $isSkuExist = $this->db->get_where('product', array('sku_code' => $skuCode, 'SHA2(id, 256) !=' => $id))->num_rows();

            if ($isSkuExist) {
                set_flash('error', 'danger', 'Please enter other sku code. This product sku code already in use.');
                $data['error'] = 'error.';
            }

            if ($data['error'] == "") {

                $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/product/')->setUnlink('image_path', $this->data['prod']->image_path);
                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
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

                    $imageName = 'uploads/product/'.$imageName. '.png';

                    $isUpload = file_put_contents($imageName, $image_base64);
                } else {
                    $imageName = $this->images->getLink('image_path');
                }

                $displayDate = $this->input->post('display_date');
                //$displayTime = $this->input->post('display_time');
                $displayTime = '';
                if (empty($displayDate)) {
                    $displayDate = date('Y-m-d');
                } else {
                    $displayDate = date('Y-m-d', strtotime($displayDate));
                }

                if (empty($displayTime)) {
                    $displayTime = null;
                }

                $data = array(
                    'admin_id' => $adminId,
                    'product_name' => $this->input->post('product_name'),
                    'slug' => $slug,
                    'break_type' => $this->input->post('break_type'),
                    'handle_type' => $this->input->post('handle_type'),
                    'tyre_type' => $this->input->post('tyre_type'),
                    'frame_material' => $this->input->post('frame_material'),
                    'frame_size' => $this->input->post('frame_size'),
                    'wheel_size' => $this->input->post('wheel_size'),
                    
                    /*  
                        'bm_name' => $this->input->post('bm_name'),
                        'short_description' => $this->input->post('short_description'),
                        'on_sale' => $this->input->post('sale'),
                        'popular' => $this->input->post('popular'),
                        'product_tag' => $this->input->post('product_tag'),
                    */
                    'category_level_1' => $this->input->post('category_lv_1'),
                    'category_level_2' => $this->input->post('category_lv_2'),
                    'description' => $this->input->post('description'),
                    'specifications' => $this->input->post('specifications'),
                    
                    'sku_code' => $this->input->post('sku_code'),
                    'hsn_code' => $this->input->post('hsn_code'),
                    'dimension' => $this->input->post('dimension'),
                    'net_weight' => $this->input->post('net_weight'),
                   // 'deno' => $this->input->post('deno'),
                    'stock' => $this->input->post('stock'),
                    'mrp' => $this->input->post('mrp'),
                    'selling_price' => $sp,
                    'gst' => $this->input->post('gst'),
                    // 'attributes' => $attribData,
                   
                    'available_date' => $displayDate,
                    'available_time' => $displayTime,
                    'image_path' => $imageName,
                    'featured' => $this->input->post('featured'),
                    'display_on_home' => $this->input->post('homepage'),
                    'display_order' => $this->input->post('display_order'),

                    'label' => $this->input->post('label'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_key_words' => $this->input->post('meta_key_words'),
                    'meta_description' => $this->input->post('meta_description')
                );

                /* Create Log Start */
                $tbl = 'product';
                $module = 'Product';
                $data = $data;
                $columns = array_keys($data);

                $oldValue = $this->Master_model->get_old_value($tbl, array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Update');
                /* Create Log End */

                if (!empty($mySelAttributes)) {
                    $prodId = $this->data['prod']->id;

                    $tbl = 'product_selected_attributes';
                    $module = 'Product Attributes';

                    $this->db->where('product_id', $prodId);
                    $this->db->delete('product_selected_attributes');

                    foreach ($mySelAttributes as $attrKeys => $attrVals) {
                    
                        $isMulti = $this->Master_model->is_multi_attrib($attrKeys);

                        if ($isMulti) {
                            foreach ($attrVals as $attrVal) {
                                if (!empty($attrVal)) {

                                    /* Create Log Start */
                                    $data2 = array(
                                        'admin_id' => $adminId, 
                                        'product_id' => $prodId, 
                                        'attribute_name' => $attrKeys, 
                                        'attribute_value' => $attrVal
                                    );
                                    $columns = array_keys($data2);

                                    $oldValue = $this->Master_model->get_old_value();

                                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data2, 'Insert');
                                    /* Create Log End */
                                    
                                    $this->db->insert('product_selected_attributes', 
                                        array('admin_id' => $adminId, 
                                            'product_id' => $prodId, 
                                            'attribute_name' => $attrKeys, 
                                            'attribute_value' => $attrVal
                                        )
                                    );

                                }
                            }
                        } else {
                            if (isset($attrVals[0]) && !empty($attrVals[0])) {

                                /* Create Log Start */
                                $data2 = array(
                                    'admin_id' => $adminId, 
                                    'product_id' => $prodId,
                                    'attribute_name' => $attrKeys,
                                    'attribute_value' => $attrVals[0]
                                );

                                $columns = array_keys($data2);

                                $oldValue = $this->Master_model->get_old_value();

                                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data2, 'Insert');
                                /* Create Log End */
                                
                                $this->db->insert('product_selected_attributes', 
                                    array('admin_id' => $adminId, 
                                        'product_id' => $prodId, 
                                        'attribute_name' => $attrKeys, 
                                        'attribute_value' => $attrVals[0]
                                    )
                                );
                            }
                        }

                    }
                }

                // echo "<pre>";
                // print_r($data);
                // die();

                $update = $this->product->update($data, array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)));

                if ($update) {
                    set_flash('message', 'success', 'Product has been updated successfully.');
                    redirect('admin/product/', 'refresh'); //redirect in manage with msg
                }
            }
            return FALSE;

        }
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'delete');

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $data = $this->input->post('uid');
                // $this->db->where_in('product_id', $data);
                // $this->db->delete('cart');
                // $this->db->where('product_id', $data);
                // $this->db->delete('product_country_details');

                /* Create Log Start */
                $tbl = 'product_selected_attributes';
                $module = 'Product Attributes';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('product_id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $this->db->where('product_id', $data);
                $this->db->delete('product_selected_attributes');

                $this->product->remove_image($data, TRUE);

                /* Create Log Start */
                $tbl = 'product';
                $module = 'Product';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->product->delete($data);
                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Product has been deleted successfully.",
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
        }
    }

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'delete');

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $data_uid = $this->input->post('uid');

                $this->product->remove_image($data_uid, TRUE);
                //$this->product->delete_all($data_uid);
                foreach($data_uid as $uid) {
                    // $this->db->where('product_id', $uid);
                    // $this->db->delete('product_country_details');

                    /* Create Log Start */
                    $tbl = 'product_selected_attributes';
                    $module = 'Product Attributes';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('product_id' => $uid), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */

                    $this->db->where_in('product_id', $uid);
                    $this->db->delete('product_selected_attributes');

                    /* Create Log Start */
                    $tbl = 'product';
                    $module = 'Product';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */

                    $this->db->where_in('id', $uid);
                    $is_delete = $this->db->delete('product');
                }

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Product has been deleted successfully.",
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
        }
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {
            $uid = $this->input->post('uid');
            $acive = $this->input->post('active');

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'update');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'product';
                $module = 'Product';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->product->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Product has been activated successfully." : "Product has been deactivated successfully.";

                if ($is_update) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => $message,
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        "message" => "Somthig goes worng.",
                        "type" => "success"
                    )));
                }

            }

        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }
    
    public function getCategoryLv2() {
        $status = array('error' => true);

        if ($this->input->is_ajax_request()) {
            
            $catID = $this->input->post('catId');
            $getChildCategory = $this->Master_model->getCategoryLevel2($catID);

            $data = '<option value="">Please Select Category</option>';

            if (!empty($getChildCategory)) {

                foreach ($getChildCategory as $child) {
                    $data .= '<option value="'.$child->id.'">'.$child->category.'</option>';
                }
            }

            $status = array('error' => false,'data' => $data);

        }

        echo json_encode($status);
    }

    public function removecatalog(){
        if(isset($_POST['path'])){
           $path = $_POST['path'];
           $update = array(
                'catalogue_pdf' => '',
            );
           $this->db->where('id', $path);
          $this->db->update('product',$update);
            echo 1;
        }
    }

    public function import() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Import Product');

        if ($this->input->post('Submit') === "Save") {
            $this->import_excel();
        }

        $this->render('admin/vwImportProduct');
    }

    public function excelUpdateProduct() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Excel Update Product');

        if ($this->input->post('Submit') === "Save") {
            $this->update_from_excel();
        }

        $this->render('admin/vwExcelUpdateProduct');
    }

    public function sampleImportFile() {

        $fileName = 'sample-import-file.xlsx';

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');

        if (!$perm) {
            
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', "You don't have permission.");

            $sheet->setTitle('Sample Import File');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();

        }



        $catLv1 = $this->db->get_where('category', array('parent' => 0))->result_object();

        $catLv2 = $this->db->query('SELECT a.category, b.category as parent_cat FROM category as a
            INNER JOIN category as b ON a.parent = b.id
            WHERE a.parent != 0')->result_object();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        // set Header
        $sheet->SetCellValue('A1', 'Product Name *');
        $sheet->SetCellValue('B1', 'BM Name *');
        $sheet->SetCellValue('C1', 'Category Level 1 *');
        $sheet->SetCellValue('D1', 'Category Level 2');
        $sheet->SetCellValue('E1', 'Product Description *');
        $sheet->SetCellValue('F1', 'SKU Code *');
        $sheet->SetCellValue('G1', 'Dimension *');
        $sheet->SetCellValue('H1', 'Net Weight *');
        $sheet->SetCellValue('I1', 'Deno (gm) *');
        $sheet->SetCellValue('J1', 'Stock *');
        $sheet->SetCellValue('K1', 'MRP *');
        $sheet->SetCellValue('L1', 'SP');
        $sheet->SetCellValue('M1', 'Product Tag');
        $sheet->SetCellValue('N1', 'Display Date');
        $sheet->SetCellValue('O1', 'Display Time');
        $sheet->SetCellValue('P1', 'Meta Title *');
        $sheet->SetCellValue('Q1', 'Status *');
        $sheet->SetCellValue('R1', 'Featured');
        $sheet->SetCellValue('S1', 'Popular');
        $sheet->SetCellValue('T1', 'Display on Home');
        $sheet->SetCellValue('U1', 'On Sale');
        $sheet->SetCellValue('V1', 'HSN Code');

        $sheet->setTitle('Import Product');

        /* Create a new worksheet, after the default sheet*/
        $spreadsheet->createSheet();

        /* Add some data to the second sheet, resembling some different data types*/
        $spreadsheet->setActiveSheetIndex(1);
        $sheet2 = $spreadsheet->getActiveSheet();

        $sheet2->SetCellValue('A1', 'Category Level 1');
        $sheet2->SetCellValue('B1', 'Category Level 2');
        $sheet2->SetCellValue('C1', 'Parent');
        $sheet2->SetCellValue('D1', 'Status');
        $sheet2->SetCellValue('E1', 'Featured');
        $sheet2->SetCellValue('F1', 'Popular');
        $sheet2->SetCellValue('G1', 'Display on Home');
        $sheet2->SetCellValue('H1', 'On Sale');

        if (!empty($catLv1)) {
            $rowCount = 2;
            foreach ($catLv1 as $cat1) {
                $sheet2->setCellValue('A'.$rowCount, $cat1->category);

                $rowCount++;
            }
        }

        if (!empty($catLv2)) {
            $rowCount = 2;
            foreach ($catLv2 as $cat2) {
                $sheet2->setCellValue('B'.$rowCount, $cat2->category);
                $sheet2->setCellValue('C'.$rowCount, $cat2->parent_cat);

                $rowCount++;
            }
        }

        $sheet2->setCellValue('D2', 'Active');
        $sheet2->setCellValue('D3', 'Inactive');
        $sheet2->setCellValue('E2', 'Yes');
        $sheet2->setCellValue('E3', 'No');
        $sheet2->setCellValue('F2', 'Yes');
        $sheet2->setCellValue('F3', 'No');
        $sheet2->setCellValue('G2', 'Yes');
        $sheet2->setCellValue('G3', 'No');
        $sheet2->setCellValue('H2', 'Yes');
        $sheet2->setCellValue('H3', 'No');

        // Rename worksheet
        $sheet2->setTitle('Data');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->getProtection()->setPassword('codzio@123');
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$fileName);
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file

        return false;
    }

    public function exportProduct() {
        $fileName = 'products-file.xlsx';

        $fileName = 'sample-import-file.xlsx';

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');

        if (!$perm) {
            
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', "You don't have permission.");

            $sheet->setTitle('Sample Import File');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();

        }

        $getProductData = $this->db->order_by('product.id', 'desc')->select(array('product_name', 'category.category', 'bm_name', 'sku_code', 'hsn_code', 'net_weight', 'stock', 'mrp', 'selling_price', 'product.is_active', 'featured', 'popular', 'product.display_on_home', 'on_sale'))->join('category', 'product.category_level_1 = category.id')->get('product')->result_object();

        if (!empty($getProductData)) {
                
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', 'Product Name');
            $sheet->SetCellValue('B1', 'BM Name');
            $sheet->SetCellValue('C1', 'Category');
            $sheet->SetCellValue('D1', 'SKU Code');
            $sheet->SetCellValue('E1', 'Net Weight');
            $sheet->SetCellValue('F1', 'Stock');
            $sheet->SetCellValue('G1', 'MRP');
            $sheet->SetCellValue('H1', 'SP');
            $sheet->SetCellValue('I1', 'Status');
            $sheet->SetCellValue('J1', 'Featured');
            $sheet->SetCellValue('K1', 'Popular');
            $sheet->SetCellValue('L1', 'Display on Home');
            $sheet->SetCellValue('M1', 'On Sale');
            $sheet->SetCellValue('N1', 'HSN Code');

            // set Row
            $rowCount = 2;
            $i=1;

            foreach ($getProductData as $prod) {

                $status = "Inactive";
                if ($prod->is_active) {
                    $status = "Active";
                }

                $featured = "No";
                if ($prod->featured) {
                    $featured = "Yes";
                }

                $popular = "No";
                if ($prod->popular) {
                    $popular = "Yes";
                }

                $display = "No";
                if ($prod->display_on_home) {
                    $display = "Yes";
                }

                $onSale = "No";
                if ($prod->on_sale) {
                    $onSale = "Yes";
                }

                $sheet->SetCellValue('A' . $rowCount, $prod->product_name);
                $sheet->SetCellValue('B' . $rowCount, $prod->bm_name);
                $sheet->SetCellValue('C' . $rowCount, $prod->category);
                $sheet->SetCellValue('D' . $rowCount, $prod->sku_code);
                $sheet->SetCellValue('E' . $rowCount, $prod->net_weight);
                $sheet->SetCellValue('F' . $rowCount, $prod->stock);
                $sheet->SetCellValue('G' . $rowCount, $prod->mrp);
                $sheet->SetCellValue('H' . $rowCount, $prod->selling_price);
                $sheet->SetCellValue('I' . $rowCount, $status);
                $sheet->SetCellValue('J' . $rowCount, $featured);
                $sheet->SetCellValue('K' . $rowCount, $popular);
                $sheet->SetCellValue('L' . $rowCount, $display);
                $sheet->SetCellValue('M' . $rowCount, $onSale);
                $sheet->SetCellValue('N' . $rowCount, $prod->hsn_code);
                $rowCount++;
            }

            $sheet->setTitle('Exported Products');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file

        } else {
            set_flash('message', 'danger', 'There is no data found');
            redirect('admin/product/excel-update-product', 'refresh');
        }

        return false;
    }

    public function import_excel() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product/import', 'refresh');
            exit();
        }

        $adminId = get_admin_id();
        
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['import_file']['name']);

            $extension = end($arr_file);

            if('csv' == $extension){

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['import_file']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            //Total Column should be 22 to insert the data
            $totalColCount = 22;

            // echo "<pre>";
            // print_r($sheetData);
            // die();

            $sheetStatus = array();
            $error = array();
            $prepareData = array();
            // echo "<pre>";

            if (!empty($sheetData)) {

                for ($i=1; $i < count($sheetData); $i++) { 

                    if (count($sheetData[$i]) == $totalColCount) {
                        
                        $productName = $sheetData[$i][0];
                        $slug = url_title($productName, '-', true);
                        $bmName = $sheetData[$i][1];
                        $catLv1 = $sheetData[$i][2];
                        $catLv2 = $sheetData[$i][3];
                        $prodDesc = $sheetData[$i][4];
                        $sku = $sheetData[$i][5];
                        $dimension = $sheetData[$i][6];
                        $netWeight = $sheetData[$i][7];
                        $deno = $sheetData[$i][8];
                        $stock = $sheetData[$i][9];

                        if (!$stock) {
                            $stock = 0;
                        }

                        $mrp = $sheetData[$i][10];
                        $sp = $sheetData[$i][11];
                        $productTag = $sheetData[$i][12];
                        $displayDate = $sheetData[$i][13];

                        if (!empty($displayDate)) {
                            $displayDate = date('Y-m-d', strtotime($displayDate));
                        } else {
                            $displayDate = null;
                        }

                        $displayTime = $sheetData[$i][14];

                        if (!empty($displayTime)) {
                            $displayTime = date('H:i', strtotime($displayTime));
                        } else {
                            $displayTime = null;
                        }

                        $metaTitle = $sheetData[$i][15];

                        if (empty($metaTitle)) {
                            $metaTitle = $productName;
                        }
                        $status = $sheetData[$i][16];

                        if ($status == 'Active') {
                            $status = 1;
                        } else {
                            $status = 0;
                        }

                        $featured = $sheetData[$i][17];

                        if ($featured == 'Yes') {
                            $featured = 1;
                        } else {
                            $featured = 0;
                        }

                        $popular = $sheetData[$i][18];

                        if ($popular == 'Yes') {
                            $popular = 1;
                        } else {
                            $popular = 0;
                        }

                        $displayOnHome = $sheetData[$i][19];

                        if ($displayOnHome == 'Yes') {
                            $displayOnHome = 1;
                        } else {
                            $displayOnHome = 0;
                        }

                        $onSale = $sheetData[$i][20];

                        if ($onSale == 'Yes') {
                            $onSale = 1;
                        } else {
                            $onSale = 0;
                        }

                        $hsn = $sheetData[$i][21];

                        //check SKU
                        $isSkuExist = $this->db->get_where('product', array('sku_code' => $sku))->num_rows();

                        if ($isSkuExist) {
                            $error['sku_error'][$i] = 'SKU is already in used on row no. '. $i;
                        }

                        //check category level 1
                        $getCat1ID = $this->db->get_where('category', array('category' => $catLv1))->row('id');

                        if (empty($getCat1ID)) {
                            $error['cat_1_error'][$i] = 'Category Level 1 is not found on row no. '. $i;
                        }

                        //check category level 2
                        if (!empty($catLv2)) {
                            $getCat2ID = $this->db->get_where('category', array('category' => $catLv2, 'parent' => $getCat1ID))->row('id');

                            if (empty($getCat2ID)) {
                                $error['cat_2_error'][$i] = 'Category Level 2 is not found on row no. '. $i;
                            }
                        } else {
                            $getCat2ID = null;
                        }

                        $prepareData[] = array(
                            'admin_id' => $adminId,
                            'product_name' => $productName,
                            'bm_name' => $bmName,
                            'category_level_1' => $getCat1ID,
                            'category_level_2' => $getCat2ID,
                            'description' => $prodDesc,
                            'sku_code' => $sku,
                            'dimension'  => $dimension,
                            'net_weight' => $netWeight,
                            'deno' => $deno,
                            'stock' => $stock,
                            'mrp' => $mrp,
                            'selling_price' => $sp,
                            'product_tag' => $productTag,
                            'available_date' => $displayDate,
                            'available_time' => $displayTime,
                            'meta_title' => $metaTitle,
                            'is_active' => $status,
                            'featured' => $featured,
                            'popular' => $popular,
                            'display_on_home' => $displayOnHome,
                            'on_sale' => $onSale,
                            'hsn_code' => $hsn,
                        );

                    } else {
                        $error['column_error'][$i] = 'Total column should be 22 in row no. '. $i;
                    }

                }

            } else {
                $sheetStatus = array(
                    'error' => true,
                    'msg' => 'Please fill the sheet'
                );
            }

            // print_r($sheetStatus);
            // print_r($error);
            // print_r($prepareData);

            $errorList = '';

            if (!empty($error)) {
                if (isset($error['sku_error'])) {
                    foreach ($error['sku_error'] as $skuErr) {
                        $errorList .= $skuErr."<br>";
                    }
                }

                if (isset($error['cat_1_error'])) {
                    foreach ($error['cat_1_error'] as $cat1Err) {
                        $errorList .= $cat1Err."<br>";
                    }
                }

                if (isset($error['cat_2_error'])) {
                    foreach ($error['cat_2_error'] as $cat2Err) {
                        $errorList .= $cat2Err."<br>";
                    }
                }
            }

            if (!empty($sheetStatus)) {
                
                if ($sheetStatus['error'] == true) {
                    set_flash('message', 'danger', $sheetStatus['msg']);
                    redirect('admin/product/import', 'refresh');  
                }            
            } elseif (!empty($errorList)) {
                set_flash('message', 'danger', $errorList);
                redirect('admin/product/import', 'refresh');
            }

            if (empty($sheetStatus) && empty($errorList)) {
                
                foreach ($prepareData as $data) {
                    //check slug only
                    $slug = url_title($data['product_name'], '-', true);

                    $slug = $this->Master_model->validateSlug('product', 'slug', $slug);

                    $data['slug'] = $slug;

                    /* Create Log Start */
                    $tbl = 'product';
                    $module = 'Product Import';
                    $logData = $data;
                    $columns = array_keys($logData);

                    $oldValue = $this->Master_model->get_old_value();

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                    /* Create Log End */


                    $this->db->insert('product', $data);
                }

                set_flash('message', 'success', 'Product import successfully');
                redirect('admin/product/import', 'refresh');
            }

        } else {
            set_flash('message', 'danger', 'File type should be xlsx.');
            redirect('admin/product/import', 'refresh');
        }
        return FALSE;
    }

    public function update_from_excel() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/product/excel-update-product', 'refresh');
            exit();
        }

        $adminId = get_admin_id();
        
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['import_file']['name']);

            $extension = end($arr_file);

            if('csv' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['import_file']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            //Total Column should be 14 to insert the data
            $totalColCount = 14;

            //echo "<pre>";
            // print_r($sheetData);
            // die();

            $sheetStatus = array();
            $error = array();
            $prepareData = array();
            // echo "<pre>";

            if (!empty($sheetData)) {

                for ($i=1; $i < count($sheetData); $i++) { 
                    if (count($sheetData[$i]) == $totalColCount) {
                        
                        $sku = $sheetData[$i][3];
                        $stock = $sheetData[$i][5];
                        $mrp = $sheetData[$i][6];
                        $sp = $sheetData[$i][7];
                        $status = $sheetData[$i][8];

                        $featured = $sheetData[$i][9];
                        $popular = $sheetData[$i][10];
                        $home = $sheetData[$i][11];
                        $onSale = $sheetData[$i][12];
                        $hsn = $sheetData[$i][13];

                        if ($status == 'Active') {
                            $status = 1;
                        } else {
                            $status = 0;
                        }

                        if ($featured == 'Yes') {
                            $featured = 1;
                        } else {
                            $featured = 0;
                        }

                        if ($popular == 'Yes') {
                            $popular = 1;
                        } else {
                            $popular = 0;
                        }

                        if ($home == 'Yes') {
                            $home = 1;
                        } else {
                            $home = 0;
                        }

                        if ($onSale == 'Yes') {
                            $onSale = 1;
                        } else {
                            $onSale = 0;
                        }

                        //check SKU
                        $isSkuExist = $this->db->get_where('product', array('sku_code' => $sku))->num_rows();

                        if (!$isSkuExist) {
                            $error['sku_error'][$i] = 'SKU is not match on row no. '. $i;
                        }

                        $prepareData[] = array(
                            'admin_id' => $adminId,
                            'sku_code' => $sku,
                            'stock' => $stock,
                            'mrp' => $mrp,
                            'selling_price' => $sp,
                            'is_active' => $status,
                            'featured' => $featured,
                            'popular' => $popular,
                            'display_on_home' => $home,
                            'on_sale' => $onSale,
                            'hsn_code' => $hsn,
                        );

                    } else {
                        $error['column_error'][$i] = 'Total column should be 14 in row no. '. $i;
                    }

                }

            } else {
                $sheetStatus = array(
                    'error' => true,
                    'msg' => 'Please fill the sheet'
                );
            }

            // print_r($sheetStatus);
            // print_r($error);
            // print_r($prepareData);

            // die();

            $errorList = '';

            if (!empty($error)) {
                if (isset($error['sku_error'])) {
                    foreach ($error['sku_error'] as $skuErr) {
                        $errorList .= $skuErr."<br>";
                    }
                }
            }

            if (!empty($sheetStatus)) {
                
                if ($sheetStatus['error'] == true) {
                    set_flash('message', 'danger', $sheetStatus['msg']);
                    redirect('admin/product/excel-update-product', 'refresh');  
                }            
            } elseif (!empty($errorList)) {
                set_flash('message', 'danger', $errorList);
                redirect('admin/product/excel-update-product', 'refresh');
            }

            if (empty($sheetStatus) && empty($errorList)) {
                
                foreach ($prepareData as $data) {
                    $sku = $data['sku_code'];

                    /* Create Log Start */
                    $tbl = 'product';
                    $module = 'Excel Upload Product';
                    $logData = $data;
                    $columns = array_keys($logData);

                    $oldValue = $this->Master_model->get_old_value($tbl, array('sku_code' => $sku), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                    /* Create Log End */


                    $this->db->where('sku_code', $sku);
                    $this->db->update('product', $data);
                }

                set_flash('message', 'success', 'Product updated successfully');
                redirect('admin/product/excel-update-product', 'refresh');
            }

        } else {
            set_flash('message', 'danger', 'File type should be xlsx.');
            redirect('admin/product/import', 'refresh');
        }
        return FALSE;
    }

    public function check_product_image($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['image_path']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["image_path"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['image_path']['tmp_name']);

            $type = $_FILES['image_path']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_product_image', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['image_path']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_product_image', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_product_image', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            $this->form_validation->set_message('check_product_image', "Please select product image");
            return FALSE;
            // return TRUE;
        }


      }

    public function check_product_image_edit($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['image_path']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["image_path"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['image_path']['tmp_name']);

            $type = $_FILES['image_path']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_product_image', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['image_path']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_product_image', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_product_image', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            //$this->form_validation->set_message('check_product_image', "Please select product image");
            //return FALSE
            return TRUE;
        }


    }

}

?>
