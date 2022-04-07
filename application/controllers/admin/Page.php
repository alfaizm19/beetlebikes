<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Page_model', 'page');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Pages');
        $this->data['soringCol'] = '"order": [[ 0, "asc" ]],';
        $this->data['manage_view_path'] = base_url('admin/page/view_page/');
        $this->render('admin/vwManagePage');
    }

    public function view_page() {
        $this->setPageTitle('Manage Pages');

        echo $this->page->get_datatables();
    }

    /** View Page Content */
    public function view($id = NULL) {
        $this->setPageTitle('Manage Pages | View Page');
        $this->data['page'] = $this->page->get($id);
        $this->render('admin/vwViewPage');
    }

    // Add a new item to load view
    public function create() {
        $this->setPageTitle('Manage Pages | Add Page');
        $this->data['is_CKEditor'] = TRUE;
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddPage');
    }

    // Add a new item to database
    public function save() {
        $data['error'] = "";
        $maindir = './uploads/page-image/';
        if (!is_dir($maindir))
            mkdir($maindir, 0755);

        $query_category = $this->db->get_where('page', array('page_name' => $this->input->post('page_name')));
        if ($query_category->num_rows() >= 1) {
            set_flash('error', 'danger', 'Please enter other page name. This page name already exists.');
            $data['error'] = 'error.';
        }

        if ($data['error'] == "") {
            $data = array(
                'page_name' => $this->input->post('page_name'),
                'created_at' => date('Y-m-d H:i:s'),
            );
            $insert = $this->page->insert($data);

            if (isset($insert)) {
                set_flash('message', 'success', 'Page has been added successfully.');
                redirect('admin/page/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    public function edit($id = NULL) {
        $this->setPageTitle('Manage Pages | Edit Page');
        $this->data['is_CKEditor'] = TRUE;
        $this->data['page'] = $this->page->get($id);
        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
        $this->render('admin/vwEditPage');
    }

    //Update one item
    public function update($id) {
        $data['error'] = "";

        // echo "<pre>";
        // print_r($_POST);

        $adminId = $this->session->userdata('user_id');
        $isAllowed = $this->Permission_model->checkPerm($adminId, 'page', 'edit');

        if (!$isAllowed) {
            set_flash('message', 'danger', 'You have no permission to edit.');
            redirect('admin/page/', 'refresh'); //redirect in manage with msg
            die();
        }

        $maindir = './uploads/page-image/';
        if (!is_dir($maindir))
            mkdir($maindir, 0755);

        $query_category = $this->db->get_where('page', array('page_name' => $this->input->post('page_name'), 'id !=' => $id));
        if ($query_category->num_rows() >= 1) {
            set_flash('error', 'danger', 'Please enter other page name. This page name already exists.');
            $data['error'] = 'error.';
        }
        if ($data['error'] == "") {
            $image=$description="";

            
            $notAllowed = array(1, 10, 11, 13, 14, 15, 23, 16, 9, 24, 17, 25, 26, 18, 35, 36);
                if (!in_array($id, $notAllowed)) {
            $this->images->setAllowedTypes('banner_image', 'jpg|jpeg|png')
                         ->setPath('banner_image', './uploads/page/banner-image/')
                         ->setUnlink('banner_image', $this->data['page']->banner_image_path);

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                    //$this->images->removeFile('user_image'); /** for single file upload */
                    $this->images->removeMultipleFile();/** for single file upload */
                }
            $banner_image=$this->images->getLink('banner_image');
            $data_inner_banner = array(
                        'banner_image_path' => $banner_image,
                        );
            }

            if ($id == 6)
            {
                $this->images->setAllowedTypes('catalogue_image', 'jpg|jpeg|png')
                         ->setPath('catalogue_image', './uploads/page/catalogue-image/')
                         ->setUnlink('catalogue_image', $this->data['page']->catalogue_image);

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                    //$this->images->removeFile('user_image'); /** for single file upload */
                    $this->images->removeMultipleFile();/** for single file upload */
                }
                $catalogue_image=$this->images->getLink('catalogue_image');
                $data_catalogue_image = array(
                            'catalogue_image' => $catalogue_image,
                            );
            }

            if ($id == 10)
            {
                // $this->images->setAllowedTypes('right_image', 'jpg|jpeg|png')
                //          ->setPath('right_image', './uploads/page/contact/')
                //          ->setUnlink('right_image', $this->data['page']->right_image);

                // if (!$this->images->validFiles()) /** Check files are valide or not */ {
                //     set_flash('message', 'danger', $this->images->error);
                //     return FALSE;
                // }

                // if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                //     //$this->images->removeFile('user_image'); /** for single file upload */
                //     $this->images->removeMultipleFile();/** for single file upload */
                // }
            }

            if($id == 3 || $id == 5 || $id == 7 || $id == 10 || $id == 6 || $id == 21 || $id == 4)
            {
                $data_description = array(
                    'description' => $this->input->post('description1'),
                    );

            }else{
                $data_description = array();
            }

            if($id == 10)
            {
                $data_contact_location = array(
                    'contact_location_title' => $this->input->post('contact_location_title'),
                    'contact_location_description' => $this->input->post('contact_location_description'),
                    'right_image' => $this->images->getLink('right_image')
                    );

            }

   	        if($this->data['page']->is_description==1)
			{
           			 $description=$this->input->post('description');
            }

            $data = array(
                    'updated_at' => date('Y-m-d H:i:s'),
                    'description' => $description,
                    'title' => $this->input->post('title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'meta_description' => $this->input->post('meta_description'),
            );

            if ($id == 1)
            {
                $data_2 = array(
                    'about_us_title1' => $this->input->post('about_us_title1'),
                    'about_us_title2' => $this->input->post('about_us_title2'),
                    'about_us_description' => $this->input->post('about_us_description'),
                    'project_title_1' => $this->input->post('project_title_1'),
                    'project_title_2' => $this->input->post('project_title_2'),
                    'feature_1' => $this->input->post('feature_1'),
                    'feature_2' => $this->input->post('feature_2'),
                    'feature_3' => $this->input->post('feature_3'),
                    'feature_4' => $this->input->post('feature_4'),
                    'brand_title1' => $this->input->post('brand_title1'),
                    'brand_title2' => $this->input->post('brand_title2'),
                    'brand_description' => $this->input->post('brand_description'),
                    'contact_us_title' => $this->input->post('contact_us_title'),
                    'contact_us_description' => $this->input->post('contact_us_description'),
                    'blog_title1' => $this->input->post('blog_title1'),
                    'blog_title2' => $this->input->post('blog_title2'),
                    'blog_description' => $this->input->post('blog_description'),
                );
            }else if($id == 12){


                //Company Image
                $this->images->setAllowedTypes('company_image', 'jpg|jpeg|png')
                    ->setPath('company_image', './uploads/page/company/image/')
                    ->setUnlink('company_image', $this->data['page']->company_image);

                if (!$this->images->validFiles()) /** Check files are valide or not */ {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

               $this->images->setAllowedTypes('video_image', 'jpg|jpeg|png')
                    ->setPath('video_image', './uploads/page/company/image/')
                    ->setUnlink('video_image', $this->data['page']->video_image);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature1_icon', 'jpg|jpeg|png')
                    ->setPath('feature1_icon', './uploads/page/company/image/')
                    ->setUnlink('feature1_icon', $this->data['page']->feature1_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature2_icon', 'jpg|jpeg|png')
                    ->setPath('feature2_icon', './uploads/page/company/image/')
                    ->setUnlink('feature2_icon', $this->data['page']->feature2_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature3_icon', 'jpg|jpeg|png')
                    ->setPath('feature3_icon', './uploads/page/company/image/')
                    ->setUnlink('feature3_icon', $this->data['page']->feature3_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature4_icon', 'jpg|jpeg|png')
                    ->setPath('feature4_icon', './uploads/page/company/image/')
                    ->setUnlink('feature4_icon', $this->data['page']->feature4_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature5_icon', 'jpg|jpeg|png')
                    ->setPath('feature5_icon', './uploads/page/company/image/')
                    ->setUnlink('feature5_icon', $this->data['page']->feature5_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                $this->images->setAllowedTypes('feature6_icon', 'jpg|jpeg|png')
                    ->setPath('feature6_icon', './uploads/page/company/image/')
                    ->setUnlink('feature6_icon', $this->data['page']->feature6_icon);

                if (!$this->images->validFiles()) /** Check files are valide or not*/  {
                    set_flash('message', 'danger', $this->images->error);
                    return FALSE;
                }

                if ($this->images->upload_multiple() === TRUE) /** Check files are upload or not */ {
                    //$this->images->removeFile('user_image'); /** for single file upload */
                    $this->images->removeMultipleFile();/** for single file upload */
                }

                //Company Catalogue
                if (!empty($_FILES['company_catalogue']['name'])) {

                    $ext = $this->common->get_image_extension($_FILES['company_catalogue']['name']);
                    $extension = strtolower($ext);
                    if (($extension == "pdf" ) == false) {
                        set_flash('error', 'danger', 'Please upload correct document(pdf)');
                        $data['error'] = "error.";
                    }
                }

                $filepaths = $this->data['page']->company_catalogue;
                if (!empty($_FILES['company_catalogue']['name'])) {

                    $today = $_FILES['company_catalogue']['name'];
                    $today = str_replace(" ", "_", $today);

                    $pathMains = './uploads/page/company/catalogue/';
                    if (!is_dir($pathMains))
                        mkdir($pathMains, 0755);

                      if ($filepaths != "") {
                            if (file_exists("./" . $filepaths)) {
                                unlink("./" . $filepaths);
                            }
                        }

                    $configImage['upload_path'] = $pathMains;
                    $configImage['max_size'] = UPLOAD_MAX_SIZE;
                    $configImage['allowed_types'] = 'pdf';

                    $img_name = $today;

                     $filepaths =$this->common->file_newname($pathMains, $img_name);

                    $configImage['file_name'] = $filepaths;
                    $this->load->library('upload', $configImage, 'pdf_files');
                    $this->pdf_files->initialize($configImage);
                    if (!$this->pdf_files->do_upload('company_catalogue')) {
                        $data['error'] = 'Please upload correct image( pdf )';
                    }

                      $filepaths = str_replace("./", "", $pathMains . $filepaths);
                }

                $video_path = $video_embed = '';
                if($this->input->post('video_type') == 2){
                $video_path = $this->data['page']->page_video;

                    if (!empty($_FILES['page_video']['name'])) {

                        if (file_exists('./' . $this->data['page']->page_video)) {
                            @unlink('./' . $this->data['page']->page_video);
                        }
                        $today = $_FILES['page_video']['name'];
                        $video_name = str_replace(" ", "_", $today);

                        $pathMain = './uploads/page/company/video/';
                        if (!is_dir($pathMain))
                            mkdir($pathMain, 0755);

                        $video_name_x = $this->common->file_newname($pathMain, $video_name);
                        $configVideo['upload_path'] = $pathMain;
                        $configVideo['allowed_types'] = 'mp4|mkv';
                        $configVideo['file_name'] = $video_name_x;
                        $this->load->library('upload', $configVideo, 'video_file');
                        $this->video_file->initialize($configVideo);
                        $this->video_file->do_upload('page_video');
                        $video_path = str_replace("./", "", $pathMain . $video_name_x);
                    }
                }
                 else
                {
                    if (file_exists('./' . $this->data['page']->page_video)) {
                        @unlink('./' . $this->data['page']->page_video);
                    }
                    $video_embed = $this->input->post('video_embed_code');
                }
                $data_1 = array(
                    'video_type' => $this->input->post('video_type'),
                    'page_video' => $video_path,
                    'video_embed_code' => $video_embed,
                    'company_image' => $this->images->getLink('company_image'),
                    'video_image' => $this->images->getLink('video_image'),
                    'feature1_icon' => $this->images->getLink('feature1_icon'),
                    'feature1_title' => $this->input->post('feature1_title'),
                    // 'feature1_description' => $this->input->post('feature1_description'),
                    'feature2_icon' => $this->images->getLink('feature2_icon'),
                    'feature2_title' => $this->input->post('feature2_title'),
                    // 'feature2_description' => $this->input->post('feature2_description'),
                    'feature3_icon' => $this->images->getLink('feature3_icon'),
                    'feature3_title' => $this->input->post('feature3_title'),
                    // 'feature3_description' => $this->input->post('feature3_description'),
                    'feature4_icon' => $this->images->getLink('feature4_icon'),
                    'feature4_title' => $this->input->post('feature4_title'),
                    // 'feature4_description' => $this->input->post('feature4_description'),
                    'feature5_icon' => $this->images->getLink('feature5_icon'),
                    'feature5_title' => $this->input->post('feature5_title'),
                    // 'feature5_description' => $this->input->post('feature5_description'),
                    'feature6_icon' => $this->images->getLink('feature6_icon'),
                    'feature6_title' => $this->input->post('feature6_title'),
                    // 'feature6_description' => $this->input->post('feature6_description'),
                    'company_catalogue' => $filepaths,
                    'company_title1' => $this->input->post('company_title1'),
                    'company_title2' => $this->input->post('company_title2'),
                    'company_description' => $this->input->post('company_description'),
                    'mission' => $this->input->post('mission'),
                    'vision' => $this->input->post('vision'),
                    'company_advantage_title' => $this->input->post('company_advantage_title'),
                    'company_advantage_description' => $this->input->post('company_advantage_description'),
                    'company_advantage_description1' => $this->input->post('company_advantage_description1'),
                    'client_title' => $this->input->post('client_title'),
                    'client_description' => $this->input->post('client_description'),
                );
            }


        if ($id == 1)
        {
            $update_data = array_merge($data_2,$data);
        }
        else if($id == 13)
        {
          $update_data = array_merge($data,$data_description);
        }
        else if($id == 14 || $id == 15 )
        {
          $update_data = $data;
        }
        else if ($id == 12)
        {
            $update_data = array_merge($data,$data_1,$data_inner_banner,$data_description);
        }
        else if ($id == 6)
        {
            $update_data = array_merge($data,$data_inner_banner,$data_catalogue_image,$data_description);
        }
        else if($id == 10)
        {
            if (isset($data_inner_banner) && !empty($data_inner_banner)) {
                $update_data = array_merge($data,$data_inner_banner,$data_description,$data_contact_location);
            } else {
                $update_data = array_merge($data,$data_description,$data_contact_location);
            }
        }
        else if($id != 1)
        {
          if($id != 13)
          {
            if (isset($data_inner_banner)) {
                $update_data = array_merge($data,$data_inner_banner,$data_description);
            } else {
                $update_data = array_merge($data,$data_description);
            }
          }

        }
        else
        {
            $update_data = array_merge($data,$data_inner_banner,$data_description);
        }

        $update = $this->page->update($update_data, $this->uri->segment(4));

            if ($update) {
                set_flash('message', 'success', 'Page has been updated successfully.');
                redirect('admin/page/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    public function get_all_pages() {
        $allPages = $this->page->getAllPages();
        return $allPages;
    }
}

/* End of file User.php */
