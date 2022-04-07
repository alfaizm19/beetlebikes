<?php

class Blog extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('Blog_model', 'blog');        
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Blogs');
        $this->data['soringCol'] = '"order": [[ 0, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/blog/view/';
        $this->render('admin/vwManageBlogs');
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

        $this->setPageTitle('Manage Blogs');
        echo $list = $this->blog->get_datatables();
    }

    public function create() {
        $this->data['is_CKEditor'] = TRUE;
        $this->setPageTitle('Add Blog');

        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }

        $this->render('admin/vwAddBlog');
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

        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // die();

        $this->form_validation->set_rules('blog_title', 'blog title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('blog_link', 'blog link', 'trim|required|xss_clean');
        $this->form_validation->set_rules('author_name', 'author name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('display_date', 'display date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('image_path', 'image', 'trim|callback_check_blog_image|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/blog/create','refresh');

        } else {

            if ($data['error'] == "") {
                
                $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/blog/');

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
                
                if (empty($displayDate)) {
                    $displayDate = null;
                } else {
                    $displayDate = date('Y-m-d', strtotime($displayDate));
                }

                $data = array(
                    'admin_id' => $adminId,
                    'title' => $this->input->post('blog_title'),
                    'description' => $this->input->post('description'),
                    'date' => $displayDate,
                    'link' => $this->input->post('blog_link'),
                    'author_name' => $this->input->post('author_name'),
                    'display_order' => $this->input->post('display_order'),
                    'image' => $imageName,
                );

                /* Create Log Start */
                $tbl = 'blog';
                $module = 'Blog';
                $data = $data;
                $columns = array_keys($data);

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
                /* Create Log End */

                $inserted = $this->db->insert('blogs', $data);
                $prodId  = $this->db->insert_id();

                if ($inserted) {
                    set_flash('message', 'success', 'Blog has been added successfully.');
                    redirect('admin/blog/', 'refresh'); 
                }
            }
        }

        return FALSE;
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = TRUE;

        $this->setPageTitle('Edit Blog');

        $this->data['blog'] = $this->blog->get(array('SHA2(id, 256) =' => $id));

        if (empty($this->data['blog'])) {
            redirect(base_url('admin/blog'),'refresh');
        }

        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
       
        $this->render('admin/vwEditBlog');
    }

    //Update one item
    public function update($id) {
        $data['error'] = "";

        $adminId = get_admin_id();

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/blog/', 'refresh'); //redirect    
            return false;
            exit();
        }

        $this->form_validation->set_rules('blog_title', 'blog title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('blog_link', 'blog link', 'trim|required|xss_clean');
        $this->form_validation->set_rules('author_name', 'author name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('display_date', 'display date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('image_path', 'image', 'trim|callback_check_blog_image_edit|xss_clean');


        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/blog/edit/'.$id,'refresh');

        } else {

            
            if ($data['error'] == "") {

                $this->images->setAllowedTypes('image_path', 'jpg|jpeg|png')->setPath('image_path', './uploads/blog/')->setUnlink('image_path', $this->data['blog']->image);
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

                if (empty($displayDate)) {
                    $displayDate = null;
                } else {
                    $displayDate = date('Y-m-d', strtotime($displayDate));
                }

                $data = array(
                    'admin_id' => $adminId,
                    'title' => $this->input->post('blog_title'),
                    'description' => $this->input->post('description'),
                    'date' => $displayDate,
                    'link' => $this->input->post('blog_link'),
                    'author_name' => $this->input->post('author_name'),
                    'display_order' => $this->input->post('display_order'),
                    'image' => $imageName,
                );

                /* Create Log Start */
                $tbl = 'blogs';
                $module = 'Blog';
                $data = $data;
                $columns = array_keys($data);

                $oldValue = $this->Master_model->get_old_value($tbl, array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Update');
                /* Create Log End */

                $update = $this->blog->update($data, array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)));

                if ($update) {
                    set_flash('message', 'success', 'Blog has been updated successfully.');
                    redirect('admin/blog/', 'refresh'); //redirect in manage with msg
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

                $this->blog->remove_image($data, TRUE);

                /* Create Log Start */
                $tbl = 'blogs';
                $module = 'Blog';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->blog->delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Blog has been deleted successfully.",
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

                $this->blog->remove_image($data_uid, TRUE);

                //$this->product->delete_all($data_uid);
                foreach($data_uid as $uid) {
                    
                    /* Create Log Start */
                    $tbl = 'blogs';
                    $module = 'Blog';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */

                    $this->db->where_in('id', $uid);
                    $is_delete = $this->db->delete('blogs');
                }

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Blog has been deleted successfully.",
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
                $tbl = 'blogs';
                $module = 'blog';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->blog->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Blog has been activated successfully." : "Blog has been deactivated successfully.";

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

    public function check_blog_image($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['image_path']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["image_path"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['image_path']['tmp_name']);

            $type = $_FILES['image_path']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_blog_image', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['image_path']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_blog_image', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_blog_image', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            $this->form_validation->set_message('check_blog_image', "Please select product image");
            return FALSE;
            // return TRUE;
        }


      }

    public function check_blog_image_edit($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['image_path']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["image_path"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['image_path']['tmp_name']);

            $type = $_FILES['image_path']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_blog_image_edit', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['image_path']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('check_blog_image_edit', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_blog_image_edit', "The Image file extension is invalid");
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
