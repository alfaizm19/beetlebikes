<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserRights extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserRights_model', 'user');
    
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage User');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/UserRights/view/';
        $this->render('admin/vwManageUserRights');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'read');

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

        $this->setPageTitle('Manage User');
        echo $list = $this->user->get_datatables();
    }
    public function user_view($id = NULL) {
        $this->setPageTitle('Manage Users | View User');
        $this->data['user'] = $this->user->get($id);
        $this->render('admin/vwViewUser');
    }

       public function create() {
           $this->data['is_CKEditor'] = TRUE;
           $this->setPageTitle('Manage User | Add User');
           if ($this->input->post('Submit') === "Save") {
               $this->save();
           }
           $this->render('admin/vwAddUserRights');
       }

   public function save() {
       $data['error'] = "";

       $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'create');

       $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/user-rights/', 'refresh');
            die();
        }

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean|is_unique[admins.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('role', 'role', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_image', 'user_image', 'trim|callback_check_user_image|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/user-rights/create','refresh');

        } else {

           // echo "<pre>";
           // print_r($_POST);
           // print_r($_FILES);

            $role = $this->input->post('role');

            $privileges = array(
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
            );

           if ($role == 'super_admin') {
                $role = 'super_admin';
                $permissions = array(
                    'order' => $privileges,
                    'product' => $privileges,
                    'product_gallery' => $privileges,
                    'product_review' => $privileges,
                    'product_attribute' => $privileges,
                    'category_level_1' => $privileges,
                    'category_level_2' => $privileges,
                    'promo_code' => $privileges,
                    'pincode' => $privileges,
                    'cart' => $privileges,
                    'setting' => $privileges,
                    'banner' => $privileges,
                    'google_analytics' => $privileges,
                    'user_right' => $privileges,
                    'audit' => $privileges,
                    'customers' => $privileges,
                    'blog' => $privileges,
                    'freebee' => $privileges,
               );
           } elseif ($role == 'admin') {
                $role = 'admin';
                $permissions = array(
                    'setting' => $privileges,
                    'user_right' => $privileges,
                    'audit' => $privileges,
                );
           } elseif ($role == 'operations') {
                $role = 'operations';
                $permissions = array(
                    'order' => $privileges,
                    'promo_code' => $privileges,
                    'freebee' => $privileges,
                    'pincode' => $privileges,
                    'customers' => $privileges,
                    'cart' => $privileges,
                );
           } else {
                //catalog permission
                $role = 'catalog';
                $permissions = array(
                    'product' => $privileges,
                    'product_gallery' => $privileges,
                    'product_review' => $privileges,
                    'product_attribute' => $privileges,
                    'category_level_1' => $privileges,
                    'category_level_2' => $privileges,
                    'banner' => $privileges,
                );
           }

           if (!empty($permissions)) {
               $permissions = json_encode($permissions);
           } else {
               $permissions = null;
           }


           if ($data['error'] == '') {
               $this->images->setAllowedTypes('user_image', 'jpg|jpeg|png')->setPath('user_image', './uploads/profile/');

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }
           }
           
           if ($data['error'] == "") {

                $data = array(
                   'admin_id' => $adminId,
                   'username' => $this->input->post('name'),
                   'email' => $this->input->post('email'),
                   'user_image' => $this->images->getdata('user_image'),
                   'password' => $this->ion_auth->hash_password($this->input->post('password')),
                   'role' => $role,
                   'permissions' => $permissions,
                   'is_active' => 1,
                   'created_at' => date('Y-m-d h:i:s')
                );

                /* Create Log Start */
                $tbl = 'admins';
                $module = 'User';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value();

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                /* Create Log End */

               $update = $this->user->insert($data);

               if ($update) {
                   set_flash('message', 'success', 'User has been added successfully.');
                   redirect('admin/user-rights/', 'refresh'); //redirect in manage with msg
               }
            }
           return FALSE;
        }
   }

   public function edit($id = NULL) {
       $this->data['is_CKEditor'] = FALSE;
       $this->setPageTitle('Manage User | Edit User');
       $this->data['user'] = $this->user->get(array('SHA2(id, 256) =' => $id));
       if ($this->input->post('Submit') === "Save") {
           $this->update($id);
       }
       $this->render('admin/vwEditUserRights');
   }

    //Update one item
   public function update($id) {
       $data['error'] = "";

       $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'update');

       $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/user-rights', 'refresh'); //
            return false;
            exit();
        }

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean|callback_check_email');
        $this->form_validation->set_rules('password', 'password', 'trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('role', 'role', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_image', 'user_image', 'trim|callback_check_user_image|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            
            $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
            $this->session->set_flashdata('fieldValue', $_REQUEST);
            redirect('admin/user-rights/edit/'.$id,'refresh');

        } else {

            $role = $this->input->post('role');

            $privileges = array(
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
            );

            if ($role == 'super_admin') {
                $role = 'super_admin';
                $permissions = array(
                    'order' => $privileges,
                    'product' => $privileges,
                    'product_gallery' => $privileges,
                    'product_review' => $privileges,
                    'product_attribute' => $privileges,
                    'category_level_1' => $privileges,
                    'category_level_2' => $privileges,
                    'promo_code' => $privileges,
                    'pincode' => $privileges,
                    'cart' => $privileges,
                    'setting' => $privileges,
                    'banner' => $privileges,
                    'google_analytics' => $privileges,
                    'user_right' => $privileges,
                    'audit' => $privileges,
                    'customers' => $privileges,
                    'blog' => $privileges,
                    'freebee' => $privileges,
               );
            } elseif ($role == 'admin') {
                $role = 'admin';
                $permissions = array(
                    'setting' => $privileges,
                    'user_right' => $privileges,
                    'audit' => $privileges,
                );
            } elseif ($role == 'operations') {
                $role = 'operations';
                $permissions = array(
                    'order' => $privileges,
                    'promo_code' => $privileges,
                    'freebee' => $privileges,
                    'pincode' => $privileges,
                    'customers' => $privileges,
                    'cart' => $privileges,
                );
            } else {
                //catalog permission
                $role = 'catalog';
                $permissions = array(
                    'product' => $privileges,
                    'product_gallery' => $privileges,
                    'product_review' => $privileges,
                    'product_attribute' => $privileges,
                    'category_level_1' => $privileges,
                    'category_level_2' => $privileges,
                    'banner' => $privileges,
                );
            }

            if (!empty($permissions)) {
                $permissions = json_encode($permissions);
            } else {
               $permissions = null;
            }

            $this->images->setAllowedTypes('user_image', 'jpg|jpeg|png')->setPath('user_image', './uploads/profile/');

            if (!$this->images->validFiles()) /** Check files are valide or not */ {
                set_flash('message', 'danger', $this->images->error);
                return FALSE;
            }

            if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
                set_flash('message', 'danger', $this->images->error);
                return FALSE;
            }

           if ($data['error'] == "") {

               $data = array(
                   'admin_id' => $adminId,
                   'username' => $this->input->post('name'),
                   'email' => $this->input->post('email'),
                   'user_image' => $this->images->getdata('user_image'),
                   'role' => $role,
                   'permissions' => $permissions,
                   'created_at' => date('Y-m-d h:i:s')
                );
               
                if($this->input->post('password') != ''){
                   $data1 = array(
                       'password' => $this->ion_auth->hash_password($this->input->post('password'))
                   );
                   $data = array_merge($data,$data1);
                }

                /* Create Log Start */
                $tbl = 'admins';
                $module = 'User';
                $logData = $data;
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(4)), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $oldEmail = $this->db->get_where('admins', array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)))->row('email');
               
                $update = $this->user->update($data, array(
                    'SHA2(id, 256) =' => $this->uri->segment(4)));

                if ($update) {

                    $this->db->where('admin_email', $oldEmail);
                    $this->db->update('audit', array(
                        'admin_email' => $this->input->post('email')
                    ));

                    $_SESSION['identity'] = $this->input->post('email');
                    $_SESSION['email']    = $this->input->post('email');

                   set_flash('message', 'success', 'User has been updated successfully.');
                   redirect('admin/user-rights/', 'refresh'); //redirect in manage with msg
                }
           }
           return FALSE;
            
        }
   }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                /* Create Log Start */
                $tbl = 'admins';
                $module = 'User';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $data = $this->input->post('uid');
                $is_delete = $this->user->delete($data);
                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "User has been deleted successfully.",
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

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $data = $this->input->post('uid');
                /** remove image */
                //            $is_delete = $this->sub_category->remove_image($data, TRUE);
                /** delete all recode */

                foreach ($data as $id) {
                    /* Create Log Start */
                    $tbl = 'admins';
                    $module = 'User';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

                $is_delete = $this->user->bulk_delete($data);


                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "User has been deleted successfully.",
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
            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'update');

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
                $tbl = 'admins';
                $module = 'User';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->user->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "User has been activated successfully." : "User has been deactivated successfully.";

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

    public function check_email($email) {
        $isExistEmail = $this->db->get_where('admins', array(
            'email' => $email,
            'id != ' => $this->data['user']->id
        ))->num_rows();

        if ($isExistEmail) {
            $this->form_validation->set_message('check_email', "This email is already in used");
            return FALSE; 
        } else {
            return TRUE;
        }
    }

    public function check_user_image($data) {

        $allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        
        if ($_FILES['user_image']['size']) {
            
            //if image selected
            $extension = pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);

            $detectedType = exif_imagetype($_FILES['user_image']['tmp_name']);

            $type = $_FILES['user_image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                    $this->form_validation->set_message('check_user_image', 'The image content is invalid');
              return FALSE;
          } elseif (filesize($_FILES['user_image']['tmp_name']) > 100000) {
            $this->form_validation->set_message('check_user_image', 'The Image file size shoud not exceed 1MB!');
            return FALSE;
          } elseif (!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('check_user_image', "The Image file extension is invalid");
            return FALSE;
          } else {
            return TRUE;
          }

        } else {
            // $this->form_validation->set_message('check_user_image', "Please select an image");
            // return FALSE;
            return TRUE;
        }
    }

}


?>