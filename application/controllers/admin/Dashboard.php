<? defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {


	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->setPageTitle('Dashboard');
		$this->render('admin/vwDashboard','admin_master');
	}
	
	public function is_login()
	{
		if($this->ion_auth->logged_in())
		{
			$this->output->set_content_type('application/json')->set_output(json_encode(array(
				"success" => true
			)));
		}else{
			$this->output->set_content_type('application/json')->set_output(json_encode(array(
//				"success" => FALSE
				"success" => true
			)));
		}
	}

	public function get_duplicate_image()
	{
		$this->output->set_content_type('application/json')->set_output(json_encode(false));
		/*$image_name=pathinfo($this->input->get_post('image_name'));
		$image_path=$this->input->get_post('image_path');
		$duplicate_image='uploads/'.$image_path.str_replace("%20"," ",$image_name['filename']).'.'.$image_name['extension'];
		if(file_exists('./'.$duplicate_image))
		{
			$this->output->set_content_type('application/json')->set_output(json_encode(true));
		}
		else
		{
			$this->output->set_content_type('application/json')->set_output(json_encode(false));
		}*/
	}

}

/* End of file Dashboard.php */
