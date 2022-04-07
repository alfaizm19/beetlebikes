<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Banner_model', 'banner');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Banners');
        $this->data['soringCol'] = '"order": [[ 3, "asc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/banner/view/';
        $this->render('admin/vwManageBanners');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'read');

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

        $this->setPageTitle('Manage Banners');

        echo $this->banner->getBannerData();
    }

    // Add a new item to load view
    public function create() {
        
        $this->data['is_CKEditor'] = TRUE;

        $this->setPageTitle('Add Banner');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddBanner');
    }

    // Add a new item to database
    public function save() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'create');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/banner', 'refresh');
            die();
        }

        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);

        $bannerType = $this->input->post('banner_type');

        $this->form_validation->set_rules('banner_type', 'banner type', 'trim|required|xss_clean');

        if ($bannerType == 'image') {
            
            $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean|callback_check_banner_image_insert');

            // $this->form_validation->set_rules('mob_banner_image', 'mobile banner image', 'trim|xss_clean|callback_check_mob_banner_image_insert');

            // $this->form_validation->set_rules('video_url', 'video url', 'trim|xss_clean');

        } else {

            $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean');

            $this->form_validation->set_rules('mob_banner_image', 'mobile banner image', 'trim|xss_clean');
            
            $this->form_validation->set_rules('video_url', 'video url', 'trim|required|xss_clean');

        }

        $this->form_validation->set_rules('banner_image_alt', 'banner image alt', 'trim|xss_clean');

        // $this->form_validation->set_rules('mob_banner_image_alt', 'mobile banner image alt', 'trim|xss_clean');

        $this->form_validation->set_rules('heading', 'heading', 'trim|xss_clean');
        $this->form_validation->set_rules('content', 'content', 'trim|xss_clean');
        $this->form_validation->set_rules('button_name', 'button name', 'trim|xss_clean');
        $this->form_validation->set_rules('button_link', 'button link', 'trim|xss_clean');
        
        // $this->form_validation->set_rules('display_date', 'display date', 'trim|xss_clean');
        // $this->form_validation->set_rules('display_time', 'display time', 'trim|xss_clean');
        // $this->form_validation->set_rules('end_time', 'end time', 'trim|xss_clean');

        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');

        if ($this->form_validation->run() === FALSE) {
        
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);

            redirect('admin/banner/create','refresh');

        } else {

            if ($bannerType == 'image') {
            
                $this->images->setAllowedTypes('banner_image', 'jpg|jpeg|png')->setPath('banner_image', './uploads/banner/');

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                // $this->images->setAllowedTypes('mob_banner_image', 'jpg|jpeg|png')->setPath('mob_banner_image', './uploads/banner/mob/');

                // if (!$this->images->validFiles()) /** Check files are valide or not */ {
                //     set_flash('message', 'danger', $this->images->error);
                //     return FALSE;
                // }

                // if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                //     set_flash('message', 'danger', $this->images->error);
                //     return FALSE;
                // }

            }
            
            $data['error'] = "";

            if ($data['error'] == "") {
                
                if ($bannerType == 'image') {

                    if (!empty($_POST['crop_banner_image'])) {

                        $bannerImageName = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);

                        $bannerImageName = url_title($bannerImageName, '-', true);

                        $image_parts = explode(";base64,", $_POST['crop_banner_image']);
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

                        $crop_banner_image = 'uploads/banner/'.$bannerImageName. '.png';

                        $isUpload = file_put_contents($crop_banner_image, $image_base64);
                    } else {
                        $crop_banner_image = $this->images->getdata('banner_image');
                    }

                    // if (!empty($_POST['crop_mob_banner_image'])) {

                    //     $mobBannerImageName = pathinfo($_FILES['mob_banner_image']['name'], PATHINFO_FILENAME);

                    //     $mobBannerImageName = url_title($mobBannerImageName, '-', true);

                    //     $image_parts = explode(";base64,", $_POST['crop_mob_banner_image']);

                    //     $image_type_aux = explode("image/", $image_parts[0]);
                    //     $image_type = $image_type_aux[1];
                    //     $image_base64 = base64_decode($image_parts[1]);
                        
                    //     // $crop_mob_banner_image = 'uploads/crop/crop_mob_banner_image_'. uniqid() . '.png';

                    //     $crop_mob_banner_image = 'uploads/banner/mob/'.$mobBannerImageName.'.png';

                    //     $isUpload = file_put_contents($crop_mob_banner_image, $image_base64);

                    // } else {
                    //     $crop_mob_banner_image = $this->images->getdata('mob_banner_image');
                    // }


                    $data = array(
                        'admin_id' => $adminId,
                        'banner_image' => $crop_banner_image,
                        'banner_alt' => $this->input->post('banner_image_alt'),
                        // 'mob_banner_image' => $crop_mob_banner_image,
                        // 'mob_banner_alt' => $this->input->post('mob_banner_image_alt'),
                        'video_url' => null,
                        'heading' => $this->input->post('heading'),
                        'content' => $this->input->post('content'),
                        'button_name' => $this->input->post('button_name'),
                        'button_link' => $this->input->post('button_link'),
                    );
                } else {

                    $data = array(
                        'video_url' => $this->input->post('video_url'),
                        'heading' => null,
                        'content' => null,
                        'button_name' => null,
                        'button_link' => null,
                    );

                }

                $displayDate = $this->input->post('display_date');
                $displayTime = $this->input->post('display_time');
                $endTime = $this->input->post('end_time');
                $displayOrder = $this->input->post('display_order');

                if (!empty($displayDate)) {
                    
                    $displayDate = date('Y-m-d', strtotime($displayDate));

                    $data['display_date'] = $displayDate;
                }

                if (!empty($displayTime)) {
                    
                    $displayTime = date('H:i', strtotime($displayTime));
                    $data['display_time'] = $displayTime;
                }

                if (!empty($endTime)) {
                    $endTime = date('H:i', strtotime($endTime));
                    $data['end_time'] = $endTime;
                }

                if (!empty($displayOrder)) {
                    $data['display_order'] = $displayOrder;   
                }

                $data['banner_type'] = $bannerType;

                /* Create Log Start */
                $tbl = 'banner';
                $module = 'Banner';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                /* Create Log End */

                $insert = $this->banner->insert($data);

                if (isset($insert)) {
                    set_flash('message', 'success', 'Banner has been added successfully.');
                    redirect('admin/banner/', 'refresh'); //redirect in manage with msg
                }
            }
            return FALSE;
        }
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = FALSE;

        $this->setPageTitle('Edit Banner');

        $this->data['banner'] = $this->banner->get(array('SHA2(id, 256) = ' => $id));

        if (empty($this->data['banner'])) {
            redirect(base_url('admin/banner'),'refresh');
        }

        if ($this->input->post('Submit') === "Save" && $id != '') {
            $this->update($id);
        }
        $this->render('admin/vwEditBanner');
    }

    //Update Banner
    public function update($id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/banner', 'refresh'); //
            return false;
            exit();
        }

        $bannerType = $this->input->post('banner_type');

        $this->form_validation->set_rules('banner_type', 'banner type', 'trim|required|xss_clean');

        if ($bannerType == 'image') {
            
            $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean|callback_check_banner_image_update');

            // $this->form_validation->set_rules('mob_banner_image', 'mobile banner image', 'trim|xss_clean|callback_check_mob_banner_image_update');

            // $this->form_validation->set_rules('video_url', 'video url', 'trim|xss_clean');

        } else {

            $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean');

            // $this->form_validation->set_rules('mob_banner_image', 'mobile banner image', 'trim|xss_clean');
            
            // $this->form_validation->set_rules('video_url', 'video url', 'trim|required|xss_clean');

        }

        $this->form_validation->set_rules('banner_image_alt', 'banner image alt', 'trim|xss_clean');

        // $this->form_validation->set_rules('mob_banner_image_alt', 'mobile banner image alt', 'trim|xss_clean');

        $this->form_validation->set_rules('heading', 'heading', 'trim|xss_clean');
        $this->form_validation->set_rules('content', 'content', 'trim|xss_clean');
        $this->form_validation->set_rules('button_name', 'button name', 'trim|xss_clean');
        $this->form_validation->set_rules('button_link', 'button link', 'trim|xss_clean');

        // $this->form_validation->set_rules('display_date', 'display date', 'trim|xss_clean');
        // $this->form_validation->set_rules('display_time', 'display time', 'trim|xss_clean');
        // $this->form_validation->set_rules('end_time', 'end time', 'trim|xss_clean');
        
        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');

        if ($this->form_validation->run() === FALSE) {
        
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);

            redirect('admin/banner/edit/'.$id,'refresh');

        } else {

            if ($bannerType == 'image') {
            
                if (!empty($_FILES['banner_image']['name'])) {

                    $this->images->setAllowedTypes('banner_image', 'jpg|jpeg|png')
                    ->setPath('banner_image', './uploads/banner/')
                    ->setUnlink('banner_image', $this->data['banner']->banner_image);

                    if (!$this->images->validFiles()) /** Check files are valide or not */ {
                        set_flash('message', 'danger', $this->images->error);
                        return FALSE;
                    }

                    if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                        //$this->images->removeFile('user_image'); /** for single file upload */
                        $this->images->removeMultipleFile();/** for single file upload */
                    }
                }

                // if (!empty($_FILES['mob_banner_image']['name'])) {

                //     $this->images->setAllowedTypes('mob_banner_image', 'jpg|jpeg|png')->setPath('mob_banner_image', './uploads/banner/mob/');

                //     if (!$this->images->validFiles()) /** Check files are valide or not */ {
                //         set_flash('message', 'danger', $this->images->error);
                //         return FALSE;
                //     }

                //     if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                //         set_flash('message', 'danger', $this->images->error);
                //         return FALSE;
                //     }
                // }

            }
            
            $data['error'] = "";

            if ($data['error'] == "") {
                
                if ($bannerType == 'image') {

                    if (!empty($_POST['crop_banner_image'])) {

                        $bannerImageName = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);

                        $bannerImageName = url_title($bannerImageName, '-', true);

                        $image_parts = explode(";base64,", $_POST['crop_banner_image']);
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

                        $crop_banner_image = 'uploads/banner/'.$bannerImageName. '.png';

                        $isUpload = file_put_contents($crop_banner_image, $image_base64);
                    } else {
                        $crop_banner_image = $this->images->getLink('banner_image');

                        if (empty($crop_banner_image)) {
                            $crop_banner_image = $this->data['banner']->banner_image;
                        }
                    }

                    // if (!empty($_POST['crop_mob_banner_image'])) {

                    //     $mobBannerImageName = pathinfo($_FILES['mob_banner_image']['name'], PATHINFO_FILENAME);

                    //     $mobBannerImageName = url_title($mobBannerImageName, '-', true);

                    //     $image_parts = explode(";base64,", $_POST['crop_mob_banner_image']);

                    //     $image_type_aux = explode("image/", $image_parts[0]);
                    //     $image_type = $image_type_aux[1];
                    //     $image_base64 = base64_decode($image_parts[1]);
                        
                    //     // $crop_mob_banner_image = 'uploads/crop/crop_mob_banner_image_'. uniqid() . '.png';

                    //     $crop_mob_banner_image = 'uploads/banner/mob/'.$mobBannerImageName.'.png';

                    //     $isUpload = file_put_contents($crop_mob_banner_image, $image_base64);

                    // } else {
                    //     $crop_mob_banner_image = $this->images->getLink('mob_banner_image');

                    //     if (empty($crop_mob_banner_image)) {
                    //         $crop_mob_banner_image = $this->data['banner']->mob_banner_image;
                    //     }
                    // }


                    $data = array(
                        'admin_id' => $adminId,
                        'banner_image' => $crop_banner_image,
                        'banner_alt' => $this->input->post('banner_image_alt'),
                        // 'mob_banner_image' => $crop_mob_banner_image,
                        // 'mob_banner_alt' => $this->input->post('mob_banner_image_alt'),
                        'heading' => $this->input->post('heading'),
                        'content' => $this->input->post('content'),
                        'button_name' => $this->input->post('button_name'),
                        'button_link' => $this->input->post('button_link'),
                        'video_url' => null
                    );
                } else {

                    $this->banner->remove_image($this->data['banner']->id);

                    $data = array(
                        'admin_id' => $adminId,
                        'banner_image' => null,
                        'banner_alt' => null,
                        'mob_banner_image' => null,
                        'mob_banner_alt' => null,
                        'video_url' => $this->input->post('video_url'),
                        'heading' => null,
                        'content' => null,
                        'button_name' => null,
                        'button_link' => null,
                    );

                }

                $displayDate = $this->input->post('display_date');
                $displayTime = $this->input->post('display_time');
                $endTime = $this->input->post('end_time');
                $displayOrder = $this->input->post('display_order');

                if (!empty($displayDate)) {
                    
                    $displayDate = date('Y-m-d', strtotime($displayDate));

                    $data['display_date'] = $displayDate;
                }

                if (!empty($displayTime)) {
                    
                    $displayTime = date('H:i', strtotime($displayTime));

                    $data['display_time'] = $displayTime;
                }

                if (!empty($endTime)) {
                    $endTime = date('H:i', strtotime($endTime));
                    $data['end_time'] = $endTime;
                }

                if (!empty($displayOrder)) {
                    $data['display_order'] = $displayOrder;   
                }

                $data['banner_type'] = $bannerType;

                /* Create Log Start */
                $tbl = 'banner';
                $module = 'Banner';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(4)), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $update = $this->banner->update($data, array('SHA2(id, 256) = ' => $this->uri->segment(4)));

                if ($update) {
                    set_flash('message', 'success', 'Banner has been updated successfully.');
                    redirect('admin/banner/', 'refresh'); //redirect in manage with msg
                }        
            }
            return FALSE;

        }
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'banner';
                $module = 'Banner';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->banner->delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Banner has been deleted successfully.",
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

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'delete');

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
                    $tbl = 'banner';
                    $module = 'Banner';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }


                /** remove image */
                $is_delete = $this->banner->remove_image($data, TRUE);
                /** delete all recode */
                $is_delete = $this->banner->bulk_delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Promo Banners has been deleted successfully.",
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

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'update');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'banner';
                $module = 'Banner';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->banner->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Promo Banner has been activated successfully." : "Promo Banner has been deactivated successfully.";

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

    public function check_banner_image_insert($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['banner_image']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['banner_image']['tmp_name']);

            $type = $_FILES['banner_image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_banner_image_insert', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['banner_image']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_banner_image_insert', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_banner_image_insert', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            $this->form_validation->set_message('check_banner_image_insert', "Please select banner image");
            return FALSE;
            //return TRUE;
        }
    }

    public function check_mob_banner_image_insert($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['mob_banner_image']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["mob_banner_image"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['mob_banner_image']['tmp_name']);

            $type = $_FILES['mob_banner_image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_mob_banner_image_insert', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['mob_banner_image']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_mob_banner_image_insert', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_mob_banner_image_insert', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            $this->form_validation->set_message('check_mob_banner_image_insert', "Please select banner image");
            return FALSE;
            //return TRUE;
        }
    }

    public function check_banner_image_update($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['banner_image']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['banner_image']['tmp_name']);

            $type = $_FILES['banner_image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_banner_image_update', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['banner_image']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_banner_image_update', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_banner_image_update', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            return TRUE;
        }
    }

    public function check_mob_banner_image_update($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['mob_banner_image']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["mob_banner_image"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['mob_banner_image']['tmp_name']);

            $type = $_FILES['mob_banner_image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_mob_banner_image_update', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['mob_banner_image']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_mob_banner_image_update', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_mob_banner_image_update', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            return TRUE;
        }
    }

}

/* End of file User.php */
