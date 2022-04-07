<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reviews_model', 'reviews');
    }

    // List all your items
    public function index($pId=null) {

        if (!empty($pId)) {

            $isExistProd = $this->db->get_where('product', array('SHA2(id, 256) =' => $pId));

            if ($isExistProd->num_rows()) {

                $product = $isExistProd->row();
                $productId = $product->id;

                $this->setPageTitle('Manage Reviews | '. $product->product_name);
                $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
                $this->data['manage_view_path'] = '' . base_url() . 'admin/reviews/view/'.$productId;
                $this->render('admin/vwManageReviews');

            } else {
                redirect(base_url('admin/product'),'refresh');
            }

        } else {
            redirect(base_url('admin/product'),'refresh');
        }
    }

    public function view($pId) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_review', 'read');

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


        $this->setPageTitle('Manage Reviews');
        echo $this->reviews->get_datatables($pId);
    }

    // Add a new item to load view
    public function create() {
        $this->setPageTitle('Manage Reviews | Add Review');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddReview');
    }

    // Add a new item to database
    // public function save() {

    //     $this->images->setAllowedTypes('review_image', 'jpg|jpeg|png')->setPath('review_image', './uploads/reviews/');

    //     if (!$this->images->validFiles()) /** Check files are valide or not */ {
    //         set_flash('message', 'danger', $this->images->error);
    //         return FALSE;
    //     }

    //     if ($this->images->upload_multiple() !== TRUE) /** Check files are upload or not */ {
    //         set_flash('message', 'danger', $this->images->error);
    //         return FALSE;
    //     }


    //     $data['error'] = "";
    //     if ($data['error'] == "") {
    //         $data = array(
    //             'company_name' => $this->input->post('company_name'),
				// 'client_name' => $this->input->post('client_name'),
				// 'designation' => $this->input->post('designation'),
    //             'logo' => $this->images->getdata('review_image'),
    //             'testimonial' => $this->input->post('testimonial'),
    //             'display_order' => $this->input->post('display_order'),
    //         );
    //         $insert = $this->reviews->insert($data);
    //         if (isset($insert)) {
    //             set_flash('message', 'success', 'Client has been added successfully.');
    //             redirect('admin/reviews/', 'refresh'); //redirect in manage with msg
    //         }
    //     }
    //     return FALSE;
    // }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_review', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $getReview = $this->db->get_where('product_reviews', array('id' => $data))->row();

                if (!empty($getReview)) {

                    /* Create Log Start */
                    $tbl = 'reviews';
                    $module = 'Delete Review';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */

                    // $image1 = $getReview->image_1;
                    // $image2 = $getReview->image_2;
                    // $image3 = $getReview->image_3;
                    // $image4 = $getReview->image_4;
                    // $target_dir = "uploads/product_reviews/";

                    // if (!empty($image1)) {
                    //     if (file_exists($target_dir.$image1)) {
                    //        unlink($target_dir.$image1);
                    //     }
                    // }

                    // if (!empty($image2)) {
                    //     if (file_exists($target_dir.$image2)) {
                    //        unlink($target_dir.$image2);
                    //     }
                    // }

                    // if (!empty($image3)) {
                    //     if (file_exists($target_dir.$image3)) {
                    //        unlink($target_dir.$image3);
                    //     }
                    // }

                    // if (!empty($image4)) {
                    //     if (file_exists($target_dir.$image4)) {
                    //        unlink($target_dir.$image4);
                    //     }
                    // }
                }
                
                $is_delete = $this->reviews->delete($data);
                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Review has been deleted successfully.",
                        "type" => "success"
                    )));
                } else {
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
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $adminId = get_admin_id();

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_review', 'delete');

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                foreach ($data as $id) {

                    $getReview = $this->db->get_where('product_reviews', array('id' => $id))->row();

                    if (!empty($getReview)) {

                        /* Create Log Start */
                        $tbl = 'reviews';
                        $module = 'Delete Review';
                        $logData = '';
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                        /* Create Log End */

                        // $image1 = $getReview->image_1;
                        // $image2 = $getReview->image_2;
                        // $image3 = $getReview->image_3;
                        // $image4 = $getReview->image_4;
                        // $target_dir = "uploads/product_reviews/";

                        // if (!empty($image1)) {
                        //     if (file_exists($target_dir.$image1)) {
                        //        unlink($target_dir.$image1);
                        //     }
                        // }

                        // if (!empty($image2)) {
                        //     if (file_exists($target_dir.$image2)) {
                        //        unlink($target_dir.$image2);
                        //     }
                        // }

                        // if (!empty($image3)) {
                        //     if (file_exists($target_dir.$image3)) {
                        //        unlink($target_dir.$image3);
                        //     }
                        // }

                        // if (!empty($image4)) {
                        //     if (file_exists($target_dir.$image4)) {
                        //        unlink($target_dir.$image4);
                        //     }
                        // }
                    }
                }

                /** delete all recode */
                $is_delete = $this->reviews->bulk_delete($data);

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Review has been deleted successfully.",
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        "message" => "Something goes wrong.",
                        "type" => "success"
                    )));
                }

            }
        }
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_review', 'update');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $uid = $this->input->post('uid');
                $acive = $this->input->post('active');

                /* Create Log Start */
                $tbl = 'reviews';
                $module = 'Update Review';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->reviews->update(
                    array(
                        'admin_id' => $adminId,
                        'is_active' => (1 != $acive)
                    ), $uid
                );

                $message = ($is_update && $acive != 1) ? "Review has been activated successfully." : "Review has been deactivated successfully.";

                if ($is_update) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => $message,
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        "message" => "Something goes wrong.",
                        "type" => "success"
                    )));
                }

            }
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Manage Reviews | Update Review');
        
        $this->data['review'] = $this->reviews->get(array('SHA2(id, 256) = ' => $id));

        if ($this->input->post('Submit') === "Save" && $id != '') {
            $this->update($id);
        }
        $this->render('admin/vwEditReview');
    }

    public function update($id){

        $reviewId = $this->uri->segment(4);
        $pId = $this->input->post('pId');
        $hashProdId = hash('SHA256', $pId);

        $adminId = get_admin_id();

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_review', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/reviews/index/'.$hashProdId, 'refresh');
            return false;
            exit();
        }

        
        $data = array(
            'admin_id' => $adminId,
            'title' => $this->input->post('title'),
            'review' => $this->input->post('review'),
            'display_order' => $this->input->post('display_order'),
        );

        /* Create Log Start */
        $tbl = 'reviews';
        $module = 'Update Review';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) =' =>$this->uri->segment(4)), $columns);

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
        /* Create Log End */

        $update = $this->reviews->update($data, array('SHA2(id, 256) =' => $this->uri->segment(4)));

        if (isset($update)) {
            set_flash('message', 'success', 'Review has been updated successfully.');
            redirect('admin/reviews/index/'.$hashProdId, 'refresh'); //redirect in manage with msg
        }

    }

}

/* End of file User.php */
