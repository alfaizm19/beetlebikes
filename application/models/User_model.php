<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

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
        $primary_key = 'user.id';

        $delete_all = array(
            'customfilter' => 'user.id',
            'db' => 'user.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $first_name = array(
            'customfilter' => 'first_name',
            'db' => 'first_name',
        );

        $last_name = array(
            'customfilter' => 'last_name',
            'db' => 'last_name',
        );

        $email = array(
            'customfilter' => 'email',
            'db' => 'email',
        );

        $phone_number = array(
            'customfilter' => 'user.id',
            'db' => 'user.id',
            'formatter' => function($id, $row) {
                return $this->db->get_where('user_profile', array(
                    'user_id' => $row['id']
                ))->row('phone');
            }
        );

        $is_active = array(
            'customfilter' => 'user.id',
            'db' => 'user.is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
            }
        );
      $get_view = array(
      'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_view($id,'admin/user/user_view'); /// $id = row_id , method path
			}
        );
        $delete = array(
            'customfilter' => 'user.id',
            'db' => 'user.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('delete_all', 'first_name', 'last_name', 'email', 'phone_number', 'is_active', 'get_view', 'delete'));
        } else {
            $data_table = array_values(compact('delete_all', 'first_name', 'last_name', 'email', 'phone_number', 'is_active', 'get_view', 'delete'));
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

      public function check_for_signin($tblName,$email,$password){
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->where('is_active', 1);
        $query = $this->db->get($tblName);

        if ($query->num_rows() > 0) {
            $result = $query->row();
        } else {
            $result = false;
        }

        return $result;
    }

      public function check_for_emailexists($tblName,$email){
        $this->db->select('*');
        $this->db->where('email',$email);
        $query = $this->db->get($tblName);
        if ($query->num_rows() > 0) {
            $result = $query->row();
        } else {
            $result = false;
        }

        return $result;
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

  
    public function get_user_by_email($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->row();
    }


    public function check_user_password($password,$user_id) {
        $this->db->select('*');
        $this->db->where('password', $password);
        $this->db->where('id', $user_id);
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
        // $this->db->join('user_profile', 'user_profile.user_id=user.id', 'left');
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

        $this->db->select('*');
        $this->db->where('id', $user_id);
        $query = $this->db->get('user');
        return $query->row();


        // return true;
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

}
