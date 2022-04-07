<? defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller{

  public function __construct() {
		parent::__construct();
		$this->load->model('profile_model','profile');
  }

  public function index() {
    $this->setPageTitle('Profile');
    redirect('admin/dashboard','refresh');
  }

	public function edit($id=NULL) {
    $this->setPageTitle('Change Profile');
		if ($this->input->post('Submit') === "Save") {
			$this->update();
    }
    $this->render('admin/vwEditProfile');
	}


  public function update() {

  	$adminId = get_admin_id();

  	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
  	$this->form_validation->set_rules('first_name', 'name', 'trim|required|min_length[3]|xss_clean');
  	$this->form_validation->set_rules('user_image', 'user_image', 'trim|callback_check_user_image|xss_clean');

  	if ($this->form_validation->run() === FALSE) {
  		
  		$this->session->set_flashdata('fieldError', $this->form_validation->error_array());
  		$this->session->set_flashdata('fieldValue', $_REQUEST);

      redirect('admin/profile','refresh');

  	} else {
  		
  		$this->images->setAllowedTypes('user_image','jpg|jpeg|png')->setPath('user_image','./uploads/profile/')->setUnlink('user_image',$this->session->userdata('user_image'));
    
	    /** Check files are valid or not */
			if(!$this->images->validFiles()) {
				set_flash('message','danger',$this->images->error);
				return FALSE;
			}

			/** Check files are upload or not */
			if ($this->images->upload_multiple() === TRUE) {
				$this->images->removeMultipleFile(); /** for single file upload */
			}
	    
			$data = array(
				'admin_id' => $adminId,
	      'user_image' => $this->images->getLink('user_image'),
	      'first_name' => $this->input->post('first_name'),
	      'email' => $this->input->post('email')
			);

			/* Create Log Start */
	    $tbl = 'admins';
	    $module = 'Profile';
	    $logData = $data;
	    $columns = !empty($logData)? array_keys($logData):'';

	    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $this->session->userdata('user_id')), $columns);    
	    /* Create Log End */

	    $update = $this->profile->update($data,$this->session->userdata('user_id'));

			if($update) {
				
				$user_data = array(
					'user_image' => $this->images->getLink('user_image'),
					'first_name' => $this->input->post('first_name'),
					'email' => $this->input->post('email')
				);

				$this->session->set_userdata($user_data);
				
				$this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');

				set_flash('message','success','Profile has been updated successfully.');
				redirect('admin/profile/','refresh'); //redirect in manage with msg
			}
	    return FALSE;


  	}
  }

  public function check_user_image($data) {

  	$allowedExts = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");
  	$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
  	
  	if ($_FILES['user_image']['size']) {
  		
  		//if image selected
  		$extension = pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);

  		$detectedType = exif_imagetype($_FILES['user_image']['tmp_name']);

  		$type = $_FILES['user_image']['type'];

  		if (!in_array($detectedType, $allowedTypes)) {
  				$this->form_validation->set_message('check_user_image', 'The image content is invalid');
          return FALSE;
      } elseif (filesize($_FILES['user_image']['tmp_name']) > 100000) {
      	$this->form_validation->set_message('check_user_image', 'The Image file size shoud not exceed 1MB!');
        return FALSE;
      } elseif (!in_array($extension, $allowedExts)) {
      	$this->form_validation->set_message('check_user_image', "The Image file extension is invalid");
        return FALSE;
      } else {
      	return TRUE;
      }

  	} else {
  		// $this->form_validation->set_message('check_user_image', "Please select an image");
    	// return FALSE;
  		return TRUE;
  	}


  }


}

/* End of file Site_profiles.php Admin*/
