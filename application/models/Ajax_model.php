<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends My_Model {

	public function addToCart($prodId, $mmtcTempCartID, $qty) {

		$userId = null;
		$totalQty = $this->db->get_where('product', array('id' => $prodId))->row('stock');

		$userSess = $this->session->userdata('user_sess');

        if (!empty($userSess)) {
	        $userId = $userSess['userId'];

	        $cond = array(
	        	'user_id' => $userId,
	        	'product_id' => $prodId
	        );
	    } else {
	    	$cond = array(
	        	'temp_cart_id' => $mmtcTempCartID,
	        	'product_id' => $prodId
	        );
	    }

	    $isExist = $this->db->get_where('cart', $cond)->row();

	    if ($isExist) {
	    	//update cart quantity

	    	$existQty = $isExist->quantity;
	    	$existQty += 1;

	    	if ($totalQty >= $existQty) {
	    		//update

	    		$this->db->where($cond);
	    		$this->db->update('cart', array(
	    			'temp_cart_id' => $mmtcTempCartID,
	    			'user_id' => $userId,
	    			'product_id' => $prodId,
	    			'quantity' => $existQty
	    		));

	    		$status = array(
	    			'error' => false,
	    			'msg' => 'Product has been added in your cart',
	    			'qty' => $existQty,
	    			'cart_count' => count_cart()
	    		);

	    	} else {
	    		$status = array(
	    			'error' => true,
	    			'type' => 'final',
	    			'msg' => 'This product has only '.$totalQty.' stock'
	    		);
	    	}

	    } else {
	    	//insert cart quantity
	    	$this->db->insert('cart', array(
    			'temp_cart_id' => $mmtcTempCartID,
    			'user_id' => $userId,
    			'product_id' => $prodId,
    			'quantity' => $qty
    		));

    		$status = array(
    			'error' => false,
    			'msg' => 'Product has been added in your cart',
    			'qty' => $qty,
	    		'cart_count' => count_cart()
    		);
	    }

	    return $status;
		
	}

	public function remove_cart($cartId) {
		$this->db->where('SHA2(id, 256) =', $cartId);
		$this->db->delete('cart');
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function increase_cart_qty($cartId, $qty) {
		$result = $this->db
			->select('a.*, b.stock')
			->join('product as b', 'a.product_id = b.id')
			->get_where('cart as a', array('SHA2(a.id, 256) = ' => $cartId, 'b.is_active' => 1))->row();

		if (!empty($result)) {
			
			if ($qty <= $result->stock) {
				$this->db->where('SHA2(id, 256) = ', $cartId);
				$isUpdate = $this->db->update('cart', array('quantity' => $qty));

				if ($this->db->affected_rows()) {
					return array('status' => true, 'qty' => $qty);
				} else {
					return array('status' => false, 'msg' => 'It has only '.$result->stock.' stock');
				}

			} else {
				return array('status' => false, 'msg' => 'It has only '.$result->stock.' stock');
			}
		} else {
			return array('status' => false, 'msg' => 'Something went wrong');
		}
	}

	public function decrease_cart_qty($cartId, $qty) {
		$result = $this->db
			->select('a.*, b.stock')
			->join('product as b', 'a.product_id = b.id')
			->get_where('cart as a', array('SHA2(a.id, 256) = ' => $cartId, 'b.is_active' => 1))->row();

		if (!empty($result)) {
			
			if ($qty <= $result->stock) {

				$newQty = $result->quantity-1;

				$this->db->where('SHA2(id, 256) = ', $cartId);

				$isUpdate = $this->db->update('cart', array('quantity' => $newQty));

				if ($this->db->affected_rows()) {
					return array('status' => true, 'qty' => $newQty);
				} else {
					return array('status' => false, 'msg' => 'It has only '.$result->stock.' stock');
				}

			} else {
				return array('status' => false, 'msg' => 'It has only '.$result->stock.' stock');
			}
		} else {
			return array('status' => false, 'msg' => 'Something went wrong');
		}
	}

}

/* End of file Ajax_model.php */
/* Location: ./application/models/Ajax_model.php */