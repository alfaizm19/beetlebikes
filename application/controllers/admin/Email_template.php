<? defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_template_model','email_template');
	}

	// List all your items
	public function index()
	{
		$this->setPageTitle('Manage Email Templates');
		$this->data['soringCol']='"order": [[ 1, "desc" ]],';
		$this->data['manage_view_path']=''.base_url().'admin/email_template/view/';
		$this->render('admin/vwManageEmailTemplate');
	}

	public function view()
	{
		$this->setPageTitle('Manage Email Templates');
   
    echo $this->email_template->get_datatables();
	}

	// Add a new item to load view
	public function create()
	{
		$this->setPageTitle('Manage Email Templates | Add Email Template');
    $this->data['is_CKEditor'] = TRUE;
		if ($this->input->post('Submit') === "Save") {
			$this->save();
		}
		$this->render('admin/vwAddEmailTemplate');
	}
	
	// Add a new item to database
	public function save()
	{
			$data = array(
				'email_template_title' => $this->input->post('email_template_title'),
        'email_template_subject' => $this->input->post('email_template_subject'),  
				'email_template_description' => $this->input->post('email_template_description'),
			);
			$insert = $this->email_template->insert($data);
			if(isset($insert))
			{
				set_flash('message','success','Email Template has been added successfully.');
				redirect('admin/email_template/','refresh'); //redirect in manage with msg
			}
			return FALSE;
	}

	public function edit($id=NULL)
	{
		$this->setPageTitle('Manage Email Templates | Edit Email Template');
    $this->data['is_CKEditor'] = TRUE;
		$this->data['email_template'] = $this->email_template->get($id);
		if ($this->input->post('Submit') === "Save") {
			$this->update();
		}		
		$this->render('admin/vwEditEmailTemplate');
	}


	//Update one item
	public function update()
	{
		$email_template_title=  $this->input->post('email_template_title');
		$email_template_subject = $this->input->post('email_template_subject');
    $email_template_description = $this->input->post('email_template_description');
		
		$data = array(
			'email_template_title' => $this->input->post('email_template_title'),
      'email_template_subject' => $this->input->post('email_template_subject'),
			'email_template_description' => $this->input->post('email_template_description'),
		);

		$update = $this->email_template->update($data,$this->uri->segment(4));

		if($update)
		{
			set_flash('message','success','Email Template has been updated successfully.');
			redirect('admin/email_template/','refresh'); //redirect in manage with msg
		}
		return FALSE;
	}

	//Delete one item
	public function delete()
	{
		if($this->input->is_ajax_request()){
			$data = $this->input->post('uid');
			$is_delete = $this->email_template->delete($data);
			if($is_delete)
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array(
					"success" => true,
					"message" => "Email Template has been deleted successfully.",
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
			/** delete all recode */
			$this->db->where_in('id',$data);
			$is_delete = $this->db->delete('email_template');

			if($is_delete)
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array(
					"success" => true,
					"message" => "Email Template has been deleted successfully.",
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
