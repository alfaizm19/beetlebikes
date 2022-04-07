<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model{
	public function registerUser($params)
	{
		$this->db->insert('user',$params);
        return $this->db->insert_id();
	}
	public function registerOtpVerify($register_otp, $mobile_no)
	{
		$this->db->select('id, phone_number, verification_code');
		$this->db->where('verification_code', $register_otp);
		$this->db->where('phone_number', $mobile_no);
	    $query = $this->db->get('user');
		$result =  $query->row();
		if($result){
			$params =   array(
					            'is_active' => 1,
					            'verification_code' => NULL,
					        );
			$this->db->where('id', $result->id);
			$this->db->update('user',$params);
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
}

?>