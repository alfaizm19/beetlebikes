<? defined('BASEPATH') OR exit('No direct script access allowed');
class Change_password extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Image_upload','','images');    
  }

  public function index()
  {
    $this->setPageTitle('Site Setting');
    redirect('admin/dashboard','refresh');
  }

  public function create() {
    $this->setPageTitle('Change Password');
    if ($this->input->post('Submit') === "Save") {
			$this->save();
    }
    $this->render('admin/vwEditChangePassword');
  }

  public function save() {
    $this->setPageTitle('Change Password');
    $identity = $this->input->post('email');
    $old_password = $this->input->post('old_password');
    $new_password = $this->input->post('new_password');

    
    $this->form_validation->set_rules('old_password', 'old password', 'trim|required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('new_password', 'new password', 'trim|required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('cpassword', 'confirm password', 'trim|required|min_length[5]|max_length[12]|matches[new_password]');

    if ($this->form_validation->run() === FALSE) {
      
      $this->session->set_flashdata('fieldError', $this->form_validation->error_array());
      redirect('admin/change-password/','refresh');

    } else {
      
      $adminId = get_admin_id();

      $hashed_new_password  = $this->ion_auth_model->hash_password($new_password, '');

      /* Create Log Start */
      $tbl = 'admins';
      $module = 'Change Password';
      $logData = array('password' => $hashed_new_password);
      $columns = !empty($logData)? array_keys($logData):'';

      $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $this->session->userdata('user_id')), $columns);
      /* Create Log End */

      $is_chnage = $this->ion_auth_model->change_password($identity,$old_password,$new_password);
      $errors = $this->ion_auth->errors();
      //echo $errors;
      if(!$is_chnage){
        set_flash('message','danger','Old Password does not match.');
        redirect('admin/change-password','refresh'); //redirect in manage with msg
      }else{
        
        /*Final Log Create Start*/
        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
        /*Final Log Create End*/

        set_flash('message','success','Password has been changed successfully.');
        redirect('admin/change-password','refresh'); //redirect in manage with msg
      }
    }
  }

}
/* End of file Site_settings.php Admin*/
