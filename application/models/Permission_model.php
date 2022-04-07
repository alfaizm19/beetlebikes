<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends CI_Model {

	public function checkPerm($adminId, $module, $perm) {
		$permissions = $this->db->get_where('admins', array(
			'id' => $adminId
		))->row('permissions');

		if (!empty($permissions)) {
			
			$permissions = json_decode($permissions, true);
			
			if (isset($permissions[$module][$perm])) {
				if ($permissions[$module][$perm]) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}

		} else {
			return false;
		}
	}
	

}

/* End of file Permission_model.php */
/* Location: ./application/models/Permission_model.php */