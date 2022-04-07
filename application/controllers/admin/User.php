<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
    
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Users');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/user/view/';
        $this->render('admin/vwManageUser');
    }

    public function view() {
        $this->setPageTitle('Manage Users');
        echo $list = $this->user->get_datatables();
    }
    public function user_view($id = NULL) {
        $this->setPageTitle('Manage Users | View User');
        $this->data['user'] = $this->user->get($id);
        $this->data['address'] = $this->db->get_where('user_profile', array(
            'user_id' => $id
        ))->row();
        $this->render('admin/vwViewUser');
    }
//    public function create() {
//        $this->data['is_CKEditor'] = TRUE;
//        $this->setPageTitle('Manage Users | Add User');
//        if ($this->input->post('Submit') === "Save") {
//            $this->save();
//        }
//        $this->render('admin/vwAddUser');
//    }

//    public function save() {
//        $data['error'] = "";
//        $query_user_name = $this->db->get_where('user', array('username' => trim($this->input->post('user_name'))));
//        if ($query_user_name->num_rows() > 0) {
//            set_flash('error', 'danger', 'Please enter other user name. This user name already exists.');
//            $data['error'] = 'error.';
//        }
//        if ($data['error'] == "") {
//                $data = array(
//                    'first_name' => $this->input->post('name'),
//                    'username' => $this->input->post('user_name'),
//                    'password' => $this->ion_auth->hash_password($this->input->post('password')),
//                    'created_at' => date('Y-m-d h:i:s'),
//                    'created_by' => $this->session->userdata('user_id'),
//                );
//            
//               
//            
//            $update = $this->user->insert($data);
//            if ($update) {
//                set_flash('message', 'success', 'User has been added successfully.');
//                redirect('admin/user/', 'refresh'); //redirect in manage with msg
//            }
//        }
//        return FALSE;
//    }

//    public function edit($id = NULL) {
//        $this->data['is_CKEditor'] = TRUE;
//        $this->setPageTitle('Manage Users | Edit User');
//        $this->data['user'] = $this->user->get($id);
//        if ($this->input->post('Submit') === "Save") {
//            $this->update($id);
//        }
//        $this->render('admin/vwEditUser');
//    }

    //Update one item
//    public function update($id) {
//        $data['error'] = "";
//        $query_user_name = $this->db->get_where('user', array('username' => $this->input->post('user_name'), 'id !=' => $id));
//        if ($query_user_name->num_rows() >= 1) {
//            set_flash('error', 'danger', 'Please enter other user name. This user name already exists.');
//            $data['error'] = 'error.';
//        }
//        if ($data['error'] == "") {
//                $data = array(
//                    'first_name' => $this->input->post('name'),
//                    'user_type' => $user_type,
//                    'username' => $this->input->post('user_name'),
//                    
//                    'updated_at' => date('Y-m-d h:i:s'),
//                    'updated_by' => $this->session->userdata('user_id'),
//                );
//                if($this->input->post('password') != ''){
//                    $data1 = array(
//                        'password' => $this->ion_auth->hash_password($this->input->post('password'))
//                    );
//                    $data = array_merge($data,$data1);
//                }
//            
//            $update = $this->user->update($data, $this->uri->segment(4));
//            if ($update) {
//                set_flash('message', 'success', 'User has been updated successfully.');
//                redirect('admin/user/', 'refresh'); //redirect in manage with msg
//            }
//        }
//        return FALSE;
//    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $adminId = $this->session->userdata('user_id');
            $isAllowed = $this->Permission_model->checkPerm($adminId, 'users', 'delete');

            if (!$isAllowed) {
                set_flash('message', 'danger', 'You dont have permission to delete user.');
                redirect('admin/user/', 'refresh'); //redirect in manage with msg
                die();
            }

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

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $adminId = $this->session->userdata('user_id');
            $isAllowed = $this->Permission_model->checkPerm($adminId, 'users', 'delete');

            if (!$isAllowed) {
                set_flash('message', 'danger', 'You dont have permission to delete user.');
                redirect('admin/user/', 'refresh'); //redirect in manage with msg
                die();
            }
            /** remove image */
//            $is_delete = $this->sub_category->remove_image($data, TRUE);
            /** delete all recode */
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

    public function is_active() {
        if ($this->input->is_ajax_request()) {
            $uid = $this->input->post('uid');
            $acive = $this->input->post('active');

            $is_update = $this->user->update(array('is_active' => (1 != $acive)), $uid);

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
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }

}


?>