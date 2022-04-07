<? defined('BASEPATH') OR exit('No direct script access allowed');

class Abandoned_cart extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Abandoned_cart_model','abandoned');
	}

	// List all your items
	public function index()
	{
		$this->setPageTitle('Manage Abandoned Cart');
		$this->data['soringCol']='"order": [[ 5, "desc" ]],';
		$this->data['manage_view_path']=''.base_url().'admin/abandoned_cart/view/';
		$this->render('admin/vwManageAbEnquiry');
	}

	public function view() {

		$perm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'read');

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

		$this->setPageTitle('Manage Abandoned Cart');
    	echo $this->abandoned->get_datatables();
	}

	// Add a new item to load view
	public function view_cart_data($id='') {
		$this->setPageTitle('Manage Abandoned Cart | View Abandoned Cart');
		$this->data['cartData'] = $this->abandoned->getData($id);

		$perm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'read');

        if (!$perm) {
            $this->data['cartData'] = '';
        }

    	$this->render('admin/vwViewAbEnquiry');
  	}

	//Delete one item
	public function delete()
	{
		if($this->input->is_ajax_request()){
			$data = $this->input->post('uid');

			$perm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

            	$adminId = get_admin_id();

            	/* Create Log Start */
                $tbl = 'cart';
                $module = 'Abandoned Cart';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('user_id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

				$this->db->where('user_id', $data);
				$is_delete = $this->db->delete('cart');

				if($is_delete) {
					$this->output->set_content_type('application/json')->set_output(json_encode(array(
						"success" => true,
						"message" => "User Cart Data has been deleted successfully.",
						"type" => "success"
					)));				
				}else{
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
		if($this->input->is_ajax_request()) {

			$perm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {
				$data = $this->input->post('uid');
				/** remove image */
			 	//$is_delete = $this->user->remove_image($data,TRUE);
			 	/** delete all recode */

			 	$adminId = get_admin_id();

			 	foreach ($data as $dat) {
			 		/* Create Log Start */
	                $tbl = 'cart';
	                $module = 'Abandoned Cart';
	                $logData = '';
	                $columns = !empty($logData)? array_keys($logData):'';

	                $oldValue = $this->Master_model->get_old_value($tbl, array('user_id' => $dat), $columns);

	                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
	                /* Create Log End */
			 	}

				$this->db->where_in('user_id',$data);
				$is_delete = $this->db->delete('cart');

				if($is_delete)
				{
					$this->output->set_content_type('application/json')->set_output(json_encode(array(
						"success" => true,
						"message" => "User Cart Data has been deleted successfully.",
						"type" => "success"
					)));				
				}else{
					$this->output->set_content_type('application/json')->set_output(json_encode(array(
						"success" => false,
						"message" => "Something goes wrong.",
						"type" => "success"
					)));				
				}
			}
		}
	}
}
/* End of file User.php */
?>