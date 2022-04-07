<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Testimonial_model', 'testimonial');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Testimonials');
        $this->data['soringCol'] = '"order": [[ 3, "asc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/testimonial/view/';
        $this->render('admin/vwManageTestimonial');
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

        $this->setPageTitle('Manage Testimonials');

        echo $this->testimonial->getData();
    }

    // Add a new item to load view
    public function create() {
        
        $this->data['is_CKEditor'] = TRUE;

        $this->setPageTitle('Add Testimonial');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddTestimonial');
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
        // die();

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('review', 'review', 'trim|required|xss_clean');

        $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean|callback_check_banner_image_insert');

        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');

        if ($this->form_validation->run() === FALSE) {
        
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);

            redirect('admin/testimonial/create','refresh');

        } else {

            $this->images->setAllowedTypes('banner_image', 'jpg|jpeg|png')->setPath('banner_image', './uploads/testimonial/');

            if (!$this->images->validFiles()) /** Check files are valide or not */ {
                set_flash('message', 'danger', $this->images->error);
                return FALSE;
            }

            if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                set_flash('message', 'danger', $this->images->error);
                return FALSE;
            }
            
            $data['error'] = "";

            if ($data['error'] == "") {
                
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


                $data = array(
                    'name' => $this->input->post('name'),
                    'review' => $this->input->post('review'),
                    'image' => $crop_banner_image,
                    'is_active' => 1,
                    'display_order' => $this->input->post('display_order')
                );

                /* Create Log Start */
                $tbl = 'testimonials';
                $module = 'Testimonial';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                /* Create Log End */

                $insert = $this->testimonial->insert($data);

                if (isset($insert)) {
                    set_flash('message', 'success', 'Testimonial has been added successfully.');
                    redirect('admin/testimonial/', 'refresh'); //redirect in manage with msg
                }
            }
            return FALSE;
        }
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = FALSE;

        $this->setPageTitle('Edit Testimonial');

        $this->data['testimonial'] = $this->testimonial->get(array('SHA2(id, 256) = ' => $id));

        if (empty($this->data['testimonial'])) {
            redirect(base_url('admin/testimonial'),'refresh');
        }

        if ($this->input->post('Submit') === "Save" && $id != '') {
            $this->update($id);
        }
        $this->render('admin/vwEditTestimonial');
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

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('review', 'review', 'trim|required|xss_clean');
        
        $this->form_validation->set_rules('banner_image', 'banner image', 'trim|xss_clean|callback_check_banner_image_update');
        $this->form_validation->set_rules('display_order', 'display order', 'trim|numeric|xss_clean');

        if ($this->form_validation->run() === FALSE) {
        
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);

            redirect('admin/testimonial/edit/'.$id,'refresh');

        } else {

            if (!empty($_FILES['banner_image']['name'])) {

                $this->images->setAllowedTypes('banner_image', 'jpg|jpeg|png')
                ->setPath('banner_image', './uploads/testimonial/')
                ->setUnlink('banner_image', $this->data['testimonial']->image);

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                    //$this->images->removeFile('user_image'); /** for single file upload */
                    $this->images->removeMultipleFile();/** for single file upload */
                }
            }
            
            $data['error'] = "";

            if ($data['error'] == "") {
                
                if (!empty($_POST['crop_banner_image'])) {

                    $bannerImageName = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);

                    $bannerImageName = url_title($bannerImageName, '-', true);

                    $image_parts = explode(";base64,", $_POST['crop_banner_image']);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    // $crop_banner_image = 'uploads/banner/crop_banner_image_'. uniqid() . '.png';

                    $crop_banner_image = 'uploads/testimonial/'.$bannerImageName. '.png';

                    $isUpload = file_put_contents($crop_banner_image, $image_base64);
                } else {
                    $crop_banner_image = $this->images->getLink('banner_image');

                    if (empty($crop_banner_image)) {
                        $crop_banner_image = $this->data['testimonial']->image;
                    }
                }


                $data = array(
                    'name' => $this->input->post('name'),
                    'review' => $this->input->post('review'),
                    'image' => $crop_banner_image,
                    'display_order' => $this->input->post('display_order')
                );

                /* Create Log Start */
                $tbl = 'testimonials';
                $module = 'Testimonial';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(4)), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $update = $this->testimonial->update($data, array('SHA2(id, 256) = ' => $this->uri->segment(4)));

                if ($update) {
                    set_flash('message', 'success', 'Testimonial has been updated successfully.');
                    redirect('admin/testimonial/', 'refresh'); //redirect in manage with msg
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
                $tbl = 'testimonials';
                $module = 'Testimonial';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->testimonial->delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Testimonial has been deleted successfully.",
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
                    $tbl = 'testimonials';
                    $module = 'Testimonial';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }


                /** remove image */
                $is_delete = $this->testimonial->remove_image($data, TRUE);
                /** delete all recode */
                $is_delete = $this->testimonial->bulk_delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Testimonials has been deleted successfully.",
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
                $tbl = 'testimonials';
                $module = 'Testimonial';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->testimonial->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Testimonial has been activated successfully." : "Testimonial has been deactivated successfully.";

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
