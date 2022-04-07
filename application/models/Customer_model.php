<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model {

    public $table = 'user'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';

        parent::__construct();
    }

    function get_datatables() {
        $this->load->library('datatables_ssp');
        $this->load->helper('text');

        $table = 'user'; // you MUST mention the table name
        $primary_key = 'id';

        // $delete_all = array(
        //     'customfilter' => 'id',
        //     'db' => 'id',
        //     'formatter' => function($row) {
        //         return get_delete_all($row);
        //     }
        // );

        $name = array(
            'customfilter' => 'name',
            'db' => 'name',
        );

        $email = array(
            'customfilter' => 'email',
            'db' => 'email',
        );

        $phone = array(
            'customfilter' => 'phone_number',
            'db' => 'phone_number',
        );

        $purchaseProd = array(
            'customfilter' => 'phone_number',
            'db' => 'phone_number',
            'formatter' => function($phone, $row) {
                return $this->db->select('SUM(paid_amount) as paid_amount')->get_where('orders', array('user_id' => $row['id'], 'order_status' => "Order Delivered"))->row('paid_amount');
            }
        );

        $is_active = array(
            'customfilter' => 'id',
            'db' => 'is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data);
            }
        );

        $view = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function( $id, $row ) {
                $id = hash('SHA256', $id);
                return get_view($id, 'admin/customers/view_detail');
            }
        );

        // $get_edit = array(
        //     'customfilter' => 'id',
        //     'db' => 'id',
        //     'formatter' => function($id) {
        //         $hash = hash('SHA256', $id);
        //         return get_edit($hash, 'admin/user-rights/edit'); /// $id = row_id , method path
        //     }
        // );

        // $delete = array(
        //     'customfilter' => 'id',
        //     'db' => 'id',
        //     'formatter' => function($id) {
        //         return get_delete($id);
        //     }
        // );

        if (DISPLAY_ORDER) {
            //$data_table = array_values(compact('delete_all', 'name', 'email', 'is_active', 'get_edit', 'delete'));

            $data_table = array_values(compact('name', 'email', 'phone', 'purchaseProd', 'is_active', 'view'));
        } else {
            //$data_table = array_values(compact('delete_all', 'name', 'email', 'is_active', 'get_edit', 'delete'));

            $data_table = array_values(compact('name', 'email', 'phone', 'purchaseProd', 'is_active', 'view'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }

        return json_encode(
                Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, '', '' )
        );
    }

//
//    public function remove_image($data) {
//        $result = $this->where('id', $data)->get_all();
//        foreach ($result as $key => $value) {
//            if (file_exists('./' . $value->sub_category_image)) {
//                unlink('./' . $value->sub_category_image);
//            }
//        }
//    }

    public function bulk_delete($ids) {
        $this->db->where_in($this->primary_key, $ids);
        return $this->db->delete($this->table);
    }

    public function get_user_by_type($value) {
        $this->db->where('username', $value);
        $this->db->select('id,username,email,user_image,first_name,password,active');
        $query = $this->db->get('admins');
        return $query->row();
    }
    public function get_user_by_pin($value) {
        $this->db->where('pin', $value);
        $this->db->select('id,username,user_image,first_name,pin');
        $query = $this->db->get('admins');
        return $query->row();
    }

    public function verified_email($tblName,$verification_code){
        $this->db->select('*');
        $this->db->where('verification_code', $verification_code);
        $query = $this->db->get($tblName);
        $num = $query->num_rows();
        if ($num > 0) {
            $result = $query->row();
            $user_data = array(
                'f_id' => $result->id,
                'f_name' => $result->name,
                'f_email' => $result->email,
                'f_phone_number' => $result->phone_number,
                'f_is_login' => true
            );
            return $user_data;
        }
    }

    public function set_verification($tblName,$verification_code){
        $fieldName = "verification_code";
        $post = array(
                'is_active' => 1,
                'verification_code' => '',
        );
        $this->db->where($fieldName, $verification_code);
        $this->db->update($tblName, $post);
    }

    public function insert_record($table,$data){
        $this->db->insert($table, $data);
        return $insert_id = $this->db->insert_id();
    }

    public function check_email($email,$tblName){
        $this->db->select('email');
        $this->db->where('email', $email);
        $result = $this->db->get($tblName);
        if ($result->num_rows() > 0) {
            return $response = array('error' => 'error');
        } else {
            return $response = array('success' => 'success');
        }
    }

    public function check_for_signin($tblName,$email,$password,$verify){
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('is_active', 1);
        $query = $this->db->get($tblName);

        if ($query->num_rows() > 0) {
            $result = $query->row();
            if ($result->email != $email) {
                return $response = array('error' => 'error', 'message' => 'Invalid email address or password.');
            } elseif ($this->encryption->decrypt($result->password) != $password) {
                return $response = array('error' => 'error', 'message' => 'Invalid email address or password.');
            } elseif ($this->encryption->decrypt($result->password) === $password && $result->email === $email) {
                $user_data = array(
                    'f_id' => $result->id,
                    'f_name' => $result->name,
                    'f_email' => $result->email,
                    'f_phone_number' => $result->phone_number,
                    'f_is_login' => true
                );
                $this->session->set_userdata($user_data);
                if ($verify == 1)
                {

                    set_cookie("user_email", $result->email, time() + (86400*30));
                    set_cookie("user_password", $password, time() + (86400*30));
                    set_cookie("remember_me", 1, time() + (86400*30));

                    // $useremail = array('name' => 'user_email', 'value' => $result->email, 'expire' => 3600, 'domain' => '', 'path' => '/');
                    // $userpassword = array('name' => 'user_password', 'value' => $password, 'expire' => 3600, 'domain' => '', 'path' => '/');
                    // $remember_me = array('name' => 'remember_me', 'value' => 1, 'expire' => 3600, 'domain' => '', 'path' => '/');
                    // $this->input->set_cookie($useremail);
                    // $this->input->set_cookie($userpassword);
                    // $this->input->set_cookie($remember_me);
                }
                else
                {
                    delete_cookie('user_email');
                    delete_cookie('user_password');
                    delete_cookie('remember_me');
                }
                return $response = array('success' => 'success','user'=> $user_data);
            }
        } else {
            return $response = array('error' => 'error', 'message' => 'Invalid email address or password.');
        }
    }
    public function get_user_by_email($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->row();
    }
    public function update_user_uid($id,$uid) {
        $post = array(
            'verification_code' => trim($uid),
        );
        $this->db->where('id', $id);
        $this->db->update('user', $post);
    }

    public function get_user_profile($user_id){
        $this->db->select('*');
        // $this->db->join('user_profile', 'user_profile.user_id=id', 'left');
        $this->db->where('id', $user_id);
        $result = $this->db->get('user');
        return $result->row();
    }

    public function update_profile($form_data, $user_id){

      // print_r($form_data);
      // echo $user_id;
      // die;
        $this->db->where('id', $user_id);
        $this->db->update('user', $form_data);
        return true;
        // $this->db->select('*');
        // $this->db->where('user_id',$user_id);
        // $query = $this->db->get('user_profile');
        // if ($query->num_rows() > 0) {
        //     $this->db->where('user_id', $user_id);
        //     $this->db->update('user_profile', $form_data1);
        // } else {
        //     $this->db->insert('user_profile', $form_data1);
        //
        // }

    }

    public function update_newsletter($userEmail, $newsletter)
    {
      $now = date("Y-m-d H:i:s");
        $this->db->where('email_address', $userEmail);
        $record = $this->db->get('subscription')->row();
        if($record)
        {
          //update
          $updateArray = array(
            'is_active' => $newsletter,
            'updated_at' => $now
          );
          $this->db->where('email_address', $userEmail)->update("subscription", $updateArray);
        }
        else
        {
          //insert
          $insertArray = array(
            'email_address' => $userEmail,
            'is_active' => $newsletter,
            'updated_at' => $now,
            'created_at' => $now
          );
          $this->db->insert("subscription", $insertArray);
        }
        return true;
    }

    public function get_customer_info($id) {
        return $this->db->get_where('user', array('SHA2(id, 256) = ' => $id))->row();
    }

}
