<? defined('BASEPATH') OR exit('No direct script access allowed');

class Abandoned_enquiry extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Abandoned_enquiry_model','abandoned');
	}

	// List all your items
	public function index()
	{
		$this->setPageTitle('Manage Abandoned Cart');
		$this->data['soringCol']='"order": [[ 5, "desc" ]],';
		$this->data['manage_view_path']=''.base_url().'admin/abandoned_enquiry/view/';
		$this->render('admin/vwManageAbEnquiry');
	}

	public function view()
	{
		$this->setPageTitle('Manage Abandoned Cart');
    	echo $this->abandoned->get_datatables();
	}

	// Add a new item to load view
	public function view_cart_data($id='') {
		$this->setPageTitle('Manage Abandoned Cart | View Abandoned Cart');
		$this->data['cartData'] = $this->abandoned->getData($id);
    	$this->render('admin/vwViewAbEnquiry');
  	}

	//Delete one item
	public function delete()
	{
		if($this->input->is_ajax_request()){
			$data = $this->input->post('uid');
			$this->db->where('user_id', $data);
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

	public function bulk_delete()
	{
		if($this->input->is_ajax_request())
		{
			$data = $this->input->post('uid');
			/** remove image */
		 //$is_delete = $this->user->remove_image($data,TRUE);
		 /** delete all recode */

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
/* End of file User.php */
?>