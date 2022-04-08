<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Site_settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Image_upload', '', 'images');
    }

    public function index() {
        $this->setPageTitle('Site Settings');
        redirect('admin/dashboard', 'refresh');
    }

    public function delete_image() {

        $this->load->model("site_settings_model");
        $tblName = "site_settings";
        $fieldName = "id";
        $id=$this->input->get_post('id');
        $field=$this->input->get_post('field');
        $image = $this->site_settings_model->get_site_by_id($id,$field);
      /*  print_r($image);
        exit();*/
        $logo1 = $image->$field;
        if($logo1!="" && file_exists("./".$logo1))
        {
            unlink("./".$logo1);
        }
        $logo1="";
        $data = array($field => $logo1);
        $this->common->update_record($fieldName,$id,$tblName,$data);
        echo "delete";
        exit();
   }

    public function edit($id = NULL) {
        $this->setPageTitle('Site Settings');
        if ($this->input->post('Submit') === "Save") {
            $this->update();
        }
        $this->render('admin/vwEditSiteSetting');
    }

    public function update() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'setting', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/site-setting/', 'refresh'); //
            return false;
            exit();
        }

        //website_front_side_logo
        $this->images->setAllowedTypes('web_front_logo', 'jpg|jpeg|png')->setPath('web_front_logo', './uploads/site-setting/frontend/')->setUnlink('web_front_logo', $this->data['setting']->website_frontend_logo);

        if (!$this->images->validFiles()) /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->do_upload('web_front_logo') === TRUE) /** Check files are upload or not */ {
            //$this->images->removeFile('user_image'); /** for single file upload */
            $this->images->removeMultipleFile();/** for single file upload */
        }

        //website_front_header_logo1
        // $this->images->setAllowedTypes('web_front_hed_logo1', 'jpg|jpeg|png')->setPath('web_front_hed_logo1', './uploads/site-setting/frontend-header-logo1/')->setUnlink('web_front_hed_logo1', $this->data['setting']->website_frontend_header_logo1);
        //
        // if (!$this->images->validFiles()) /** Check files are valide or not */ {
        //     set_flash('message', 'danger', $this->images->error);
        //     return FALSE;
        // }
        //
        // if ($this->images->do_upload('web_front_hed_logo1') === TRUE) /** Check files are upload or not */ {
        //     //$this->images->removeFile('user_image'); /** for single file upload */
        //     $this->images->removeMultipleFile();/** for single file upload */
        // }

        //website_front_header_logo2
//        $this->images->setAllowedTypes('web_front_hed_logo2', 'jpg|jpeg|png')->setPath('web_front_hed_logo2', './uploads/site-setting/frontend-header-logo2/')->setUnlink('web_front_hed_logo2', $this->data['setting']->website_frontend_header_logo2);
//
//        if (!$this->images->validFiles()) /** Check files are valide or not */ {
//            set_flash('message', 'danger', $this->images->error);
//            return FALSE;
//        }
//
//        if ($this->images->do_upload('web_front_hed_logo2') === TRUE) /** Check files are upload or not */ {
//            //$this->images->removeFile('user_image'); /** for single file upload */
//            $this->images->removeMultipleFile();/** for single file upload */
//        }

        //website_admin_side_logo
        $this->images->setAllowedTypes('website_admin_logo', 'jpg|jpeg|png')->setPath('website_admin_logo', './uploads/site-setting/adminlogo/')->setUnlink('website_admin_logo', $this->data['setting']->website_admin_logo);

        if (!$this->images->validFiles()) /** Check files are valide or not */ {
            set_flash('message', 'danger', $this->images->error);
            return FALSE;
        }

        if ($this->images->do_upload('website_admin_logo') === TRUE) /** Check files are upload or not */ {
            //$this->images->removeFile('user_image'); /** for single file upload */
            $this->images->removeMultipleFile();/** for single file upload */
        }
        //video_image
        // $this->images->setAllowedTypes('video_image', 'jpg|jpeg|png')->setPath('video_image', './uploads/site-setting/videoimage/')->setUnlink('video_image', $this->data['setting']->video_image);
        //
        // if (!$this->images->validFiles()) /** Check files are valide or not */ {
        //     set_flash('message', 'danger', $this->images->error);
        //     return FALSE;
        // }
        //
        // if ($this->images->do_upload('video_image') === TRUE) /** Check files are upload or not */ {
        //     //$this->images->removeFile('user_image'); /** for single file upload */
        //     $this->images->removeMultipleFile();/** for single file upload */
        // }

        // $this->images->setAllowedTypes('footer_logo', 'jpg|jpeg|png')->setPath('footer_logo', './uploads/site-setting/footer-logo/')->setUnlink('footer_logo', $this->data['setting']->footer_logo);
        //
        // if (!$this->images->validFiles()) /** Check files are valide or not */ {
        //     set_flash('message', 'danger', $this->images->error);
        //     return FALSE;
        // }
        //
        // if ($this->images->do_upload('footer_logo') === TRUE) /** Check files are upload or not */ {
        //     //$this->images->removeFile('user_image'); /** for single file upload */
        //     $this->images->removeMultipleFile();/** for single file upload */
        // }
        $data['error'] = "";

        if (isset($_FILES['file_path']) && !empty($_FILES['file_path']['name'])) {
            $ext = $this->common->get_image_extension($_FILES['file_path']['name']);
            $extensions = strtolower($ext);

            if (($extensions == "pdf" || $extensions == "jpg" || $extensions == "jpeg" || $extensions == "png") == false) {
                $data['error'] = "error.";
                set_flash('error', 'danger', 'Please upload correct file(image or pdf)');
            }
        }
        if ($data['error'] == "") {
            $filepaths = '';
            $filepaths = $this->data['setting']->location_map;

            if (!empty($_FILES['file_path']['name'])) {

                $today = $_FILES['file_path']['name'];
                $today = str_replace(" ", "_", $today);

                $pathMains = './uploads/site-setting/location-map/';
                if (!is_dir($pathMains))
                    mkdir($pathMains, 0755);

                if ($filepaths != "") {
                    if (file_exists("./" . $filepaths)) {
                        unlink("./" . $filepaths);
                    }
                }

                $configImage['upload_path'] = $pathMains;
                $configImage['max_size'] = UPLOAD_MAX_SIZE;
                $configImage['allowed_types'] = 'pdf|jpg|jpeg|png';

                $img_name = $today;

                $filepaths = $this->common->file_newname($pathMains, $img_name);

                $configImage['file_name'] = $filepaths;
                $this->load->library('upload', $configImage, 'pdf_files');
                $this->pdf_files->initialize($configImage);
                if (!$this->pdf_files->do_upload('file_path')) {
                    $data['error'] = 'error.';
                    set_flash('error', 'danger', 'Please upload correct image(image or pdf )');
                }

                $filepaths = str_replace("./", "", $pathMains . $filepaths);
            }

            // Quatar location Map
			$qdata['error']="";
			if (isset($_FILES['qatar_file_path']) && !empty($_FILES['qatar_file_path']['name'])) {
            $ext = $this->common->get_image_extension($_FILES['qatar_file_path']['name']);
            $extensions = strtolower($ext);

            if (($extensions == "pdf" || $extensions == "jpg" || $extensions == "jpeg" || $extensions == "png") == false) {
                $qdata['error'] = "error.";
                set_flash('error', 'danger', 'Please upload correct file(image or pdf)');
            }
        }
        if ($qdata['error'] == "") {
            $qatarfilepaths = '';
            $qatarfilepaths = $this->data['setting']->qatar_location_map;

            if (!empty($_FILES['qatar_file_path']['name'])) {

                $today = $_FILES['qatar_file_path']['name'];
                $today = str_replace(" ", "_", $today);

                $pathMains = './uploads/site-setting/location-map/';
                if (!is_dir($pathMains))
                    mkdir($pathMains, 0755);

                if ($qatarfilepaths != "") {
                    if (file_exists("./" . $qatarfilepaths)) {
                        unlink("./" . $qatarfilepaths);
                    }
                }

                $configImage['upload_path'] = $pathMains;
                $configImage['max_size'] = UPLOAD_MAX_SIZE;
                $configImage['allowed_types'] = 'pdf|jpg|jpeg|png';

                $img_name = $today;

                $qatarfilepaths = $this->common->file_newname($pathMains, $img_name);

                $configImage['file_name'] = $qatarfilepaths;
                $this->load->library('upload', $configImage, 'pdf_files');
                $this->pdf_files->initialize($configImage);
                if (!$this->pdf_files->do_upload('file_path')) {
                    $data['error'] = 'error.';
                    set_flash('error', 'danger', 'Please upload correct image(image or pdf )');
                }

                $qatarfilepaths = str_replace("./", "", $pathMains . $qatarfilepaths);
            }
        }

            // Oman Location Map
			$odata['error']="";
			if (isset($_FILES['oman_file_path']) && !empty($_FILES['oman_file_path']['name'])) {
            $ext = $this->common->get_image_extension($_FILES['oman_file_path']['name']);
            $extensions = strtolower($ext);

            if (($extensions == "pdf" || $extensions == "jpg" || $extensions == "jpeg" || $extensions == "png") == false) {
                $odata['error'] = "error.";
                set_flash('error', 'danger', 'Please upload correct file(image or pdf)');
            }
        }
        if ($odata['error'] == "") {
            $Omanfilepaths = '';
            $Omanfilepaths = $this->data['setting']->oman_location_map;

            if (!empty($_FILES['oman_file_path']['name'])) {

                $today = $_FILES['oman_file_path']['name'];
                $today = str_replace(" ", "_", $today);

                $pathMains = './uploads/site-setting/location-map/';
                if (!is_dir($pathMains))
                    mkdir($pathMains, 0755);

                if ($Omanfilepaths != "") {
                    if (file_exists("./" . $Omanfilepaths)) {
                        unlink("./" . $Omanfilepaths);
                    }
                }

                $configImage['upload_path'] = $pathMains;
                $configImage['max_size'] = UPLOAD_MAX_SIZE;
                $configImage['allowed_types'] = 'pdf|jpg|jpeg|png';

                $img_name = $today;

                $Omanfilepaths = $this->common->file_newname($pathMains, $img_name);

                $configImage['file_name'] = $Omanfilepaths;
                $this->load->library('upload', $configImage, 'pdf_files');
                $this->pdf_files->initialize($configImage);
                if (!$this->pdf_files->do_upload('file_path')) {
                    $data['error'] = 'error.';
                    set_flash('error', 'danger', 'Please upload correct image(image or pdf )');
                }

                $Omanfilepaths = str_replace("./", "", $pathMains . $Omanfilepaths);
            }
        }

             $video_path = $video_embed = '';
            if($this->input->post('video_type') == 2){
            $video_path = $this->data['setting']->video;
            
            if (!empty($_FILES['video']['name'])) {
                if (file_exists('./' . $this->data['setting']->video)) {
                    @unlink('./' . $this->data['setting']->video);
                }
                $today = $_FILES['video']['name'];
                $video_name = str_replace(" ", "_", $today);
            
                $pathMain = './uploads/site-setting-video/';
                if (!is_dir($pathMain))
                    mkdir($pathMain, 0755);
            
                $video_name_x = $this->common->file_newname($pathMain, $video_name);
                $configVideo['upload_path'] = $pathMain;
                $configVideo['allowed_types'] = 'mp4|mkv';
                $configVideo['file_name'] = $video_name_x;
                $this->load->library('upload', $configVideo, 'video_file');
                $this->video_file->initialize($configVideo);
                $this->video_file->do_upload('video');
                $video_path = str_replace("./", "", $pathMain . $video_name_x);
            }
            }else{
                if (file_exists('./' . $this->data['setting']->video)) {
                    @unlink('./' . $this->data['setting']->video);
                }
                $video_embed = $this->input->post('video_embed_code');
            }

            $display_banner_video = $this->input->post('display_banner_video');

            if (!empty($display_banner_video)) {
                $display_banner_video = 1;
            } else {
                $display_banner_video = 0;
            }

            $data = array(
                'admin_id' => $adminId,
                'video_type' => $this->input->post('video_type'),
                'video' => $video_path,
                'video_embed_code' => $video_embed,
                // 'video_image' => $this->images->getLink('video_image'),
                'site_email' => $this->input->post('site_email'),
                'site_copy_right' => $this->input->post('site_copy_right'),
                'site_project_name' => $this->input->post('site_name'),
                'site_url' => $this->input->post('site_url'),
                'website_frontend_logo' => $this->images->getLink('web_front_logo'),
                'website_admin_logo' => $this->images->getLink('website_admin_logo'),
                // 'website_frontend_header_logo1' => $this->images->getLink('web_front_hed_logo1'),
                //  'website_frontend_header_logo2' =>    $this->images->getLink('web_front_hed_logo2'),
                // 'footer_logo' => $this->images->getLink('footer_logo'),
                'site_phone_number' => $this->input->post('mobile_number'),
                'site_fax_number' => $this->input->post('fax_number'),
                'site_menu_name' => $this->input->post('menu_name'),
                'site_frontend_footer_description' => $this->input->post('description'),
                'site_address' => $this->input->post('address'),
                'uae_orders_email' => $this->input->post('uae_orders_email'),
				        'uae_vat' => $this->input->post('uae_vat'),
                'pinterest_link' => $this->input->post('pinterest_link'),
                'instagram_link' => $this->input->post('instagram_link'),
                'twitter_link' => $this->input->post('twitter_link'),
                'facebook_link' => $this->input->post('facebook_link'),
                'youtube_link' => $this->input->post('youtube_link'),
                'linkedin_link' => $this->input->post('linkedin_link'),
                'map_iframe' => $this->input->post('map_iframe'),
                'location_map' => $filepaths,
                'admin_mailing_address' => $this->input->post('admin_mailing_address'),
                'qatar_location_map' => ($qatarfilepaths),
				'qatar_map_iframe' => $this->input->post('qatar_map_iframe'),
				'qatar_address' => $this->input->post('qatar_address'),
				'qatar_email' => $this->input->post('qatar_email'),
				'qatar_phone_number' => $this->input->post('qatar_phone_number'),
				'qatar_fax_number' => $this->input->post('qatar_fax_number'),
				'qatar_mailing_address' => $this->input->post('qatar_mailing_address'),
				'qatar_orders_email' => $this->input->post('qatar_orders_email'),
				'qatar_vat' => $this->input->post('qatar_vat'),
				'oman_location_map' => ($Omanfilepaths),
				'oman_map_iframe' => $this->input->post('oman_map_iframe'),
				'oman_address' => $this->input->post('oman_address'),
				'oman_email' => $this->input->post('oman_email'),
				'oman_phone_number' => $this->input->post('oman_phone_number'),
				'oman_fax_number' => $this->input->post('oman_fax_number'),
				'oman_mailing_address' => $this->input->post('qatar_mailing_address'),
				'oman_orders_email' => $this->input->post('oman_orders_email'),
				'oman_vat' => $this->input->post('oman_vat'),
                'timing' => $this->input->post('timing'),
                'display_banner_video' => $display_banner_video,
            );

            /* Create Log Start */
            $tbl = 'site_settings';
            $module = 'Site Settings';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value($tbl, array('id' => 1), $columns);

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
            /* Create Log End */

            // echo "<pre>";
            // print_r($_POST);
            // print_r($data);exit;
            //die;

            $update = $this->setting->update($data, 1);
            if ($update) {
                set_flash('message', 'success', 'Site Settings has been updated successfully.');
                redirect('admin/site-setting/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

}


/* End of file Site_settings.php Admin*/
