<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Attribute_model', 'attribute');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Product Attribute');
        $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url('admin/attribute/view/');
        $this->render('admin/vwManageAttribute');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'read');

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

        $this->setPageTitle('Manage Product Attribute');
        echo $list = $this->attribute->get_datatables();
    }

    // Add a new item to load view
    public function create() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Add Product Attribute');
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddAttribute');
    }

    // Add a new item to database
    public function save() {

        $data['error'] = "";

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/attribute', 'refresh');
            die();
        }

        $slug = url_title($this->input->post('attribute_name'),'-',true);

        $slug = $this->Master_model->validateSlug('attribute_name', 'slug', $slug);

        $adminId = get_admin_id();

        if ($data['error'] == "") {

            $filter = !$this->input->post('filter')? '0':'1';
            $search = !$this->input->post('search')? '0':'1';
            $multi = !$this->input->post('multi')? '0':'1';

            $data = array(
                'admin_id' => $adminId,
                'name' => $this->input->post('attribute_name'),
                'slug' => $slug,
                'filter' => $filter,
                'search' => $search,
                'multi' => $multi,
                // 'meta_title' => $this->input->post('meta_title'),
                // 'meta_keyword' => $this->input->post('meta_keyword'),
                // 'meta_description' => $this->input->post('meta_description'),
                'display_order' => $this->input->post('display_order'),
                'is_active' => 1
            );

            /* Create Log Start */
            $tbl = 'attribute_name';
            $module = 'Attribute Name';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value();

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
            /* Create Log End */

            $insert = $this->db->insert('attribute_name', $data);

            $isInserted = $this->db->insert_id();

            if (isset($isInserted)) {
                set_flash('message', 'success', 'Product attribute has been added successfully.');
                redirect('admin/attribute', 'refresh'); 
                //redirect in manage with msg
            }
        }

        return FALSE;
    }

    public function edit($id = NULL) {
        $this->setPageTitle('Edit Attribute Name');

        $this->data['is_CKEditor'] = FALSE;

        $this->data['attribute'] = $this->db->get_where('attribute_name', array('SHA2(id, 256) = ' => $id))->row();

        if (empty($this->data['attribute'])) {
            redirect(base_url('admin/attribute'),'refresh');
        }

        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
        $this->render('admin/vwEditAttribute');
    }

    //Update one item
    public function update($id) {

        $data['error'] = "";

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/attribute/', 'refresh'); //redirect    
            return false;
            exit();
        }

        $slug = url_title($this->input->post('slug'),'-',true);

        $slug = $this->Master_model->validateSlug('attribute_name', 'slug', $slug, $id);

        $adminId = get_admin_id();

        if ($data['error'] == "") {

            $filter = !$this->input->post('filter')? '0':'1';
            $search = !$this->input->post('search')? '0':'1';
            $multi = !$this->input->post('multi')? '0':'1';

            $data = array(
                'admin_id' => $adminId,
                'name' => $this->input->post('attribute_name'),
                'slug' => $slug,
                'filter' => $filter,
                'search' => $search,
                'multi' => $multi,
                // 'meta_title' => $this->input->post('meta_title'),
                // 'meta_keyword' => $this->input->post('meta_keyword'),
                // 'meta_description' => $this->input->post('meta_description'),
                'display_order' => $this->input->post('display_order'),
                'is_active' => 1
            );

            /* Create Log Start */
            $tbl = 'attribute_name';
            $module = 'Attribute Name';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $id), $columns);

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
            /* Create Log End */

            $this->db->where('SHA2(id, 256) = ', $id);
            $update = $this->db->update('attribute_name', $data);

            if ($update) {
                set_flash('message', 'success', 'Attribute has been updated successfully.');
                redirect('admin/attribute/', 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {
			
			$id = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                //check if attribute is used in attribute value
                $isExist = $this->db->get_where('attribute_value', array('attrib_id' => $id))->num_rows();

                if ($isExist) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Attribute name is already in used",
                        "type" => "danger"
                    )));
                } else {

                    /* Create Log Start */
                    $tbl = 'attribute_name';
                    $module = 'Attribute Name';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */


                    $this->db->where_in('id', $id);
                    $is_delete = $this->db->delete('attribute_name');    

                    if ($is_delete) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(array(
                            "success" => true,
                            "message" => "Attribute name has been deleted successfully.",
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
    }

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                $this->db->where_in('attrib_id', $data);
                $isExist = $this->db->get('attribute_value')->num_rows();

                if ($isExist) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Attribute name is already in used",
                        "type" => "danger"
                    )));
                } else {

                    foreach($data as $dat) {
                        /* Create Log Start */
                        $tbl = 'attribute_name';
                        $module = 'Attribute Name';
                        $logData = '';
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $dat), $columns);

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                        /* Create Log End */
                    }

                    /** delete all recode */
                    $this->db->where_in('id', $data);
                    $is_delete = $this->db->delete('attribute_name');

                    if ($is_delete) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(array(
                            "success" => true,
                            "message" => "Attribute name has been deleted successfully.",
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
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'update');

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
                $tbl = 'attribute_name';
                $module = 'Attribute Name';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $this->db->where('attrib_id', $uid);
                $this->db->update('attribute_value', array('admin_id' => $adminId, 'is_active' => (1 != $acive)));

                $is_update = $this->attribute->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Attribute name has been activated successfully." : "Attribute name has been deactivated successfully.";

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

}

/* End of file User.php */
