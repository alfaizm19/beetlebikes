<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
	public function get_user($username,$password)
	{
		$this->db->select('id,name, password, email');
		$this->db->from('user');

		if (is_numeric($username)) {
			$this->db->where('phone_number',$username);
		} else {
			$this->db->where('email',$username);
		}
		
		$this->db->where('is_active',1);
		$query = $this->db->get();
		$userData = $query->row();
		
		if($userData){
			if (password_verify($password, $userData->password)) {
				unset($userData->password);	
				if ($this->session->userdata('temp_cart_id')) {
				  
					$this->load->helper('common_helper');
					$cartData = cart_data();

					if($cartData){
						$cartParam =    array(
								        	"user_id"  => $userData->id
							            );
						$this->db->where('temp_cart_id', $this->session->userdata('temp_cart_id'));
        				$this->db->update('cart',$cartParam);
					}

					$wishlistData = wishlist_data();
					if($wishlistData){
						$wishlistParam =    array(
									        	"user_id"  => $userData->id
								            );
						$this->db->where('temp_wishlist_id', $this->session->userdata('temp_cart_id'));
        				$this->db->update('wishlist',$wishlistParam);
					}
		        }	
			    return $userData;
			} else {
			   return false;
			}
		} else {
			return false;
		}
	}
}

?>