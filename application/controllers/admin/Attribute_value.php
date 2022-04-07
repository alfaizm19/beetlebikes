<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute_value extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Attribute_value_model', 'attribute_val');
    }

    // List all your items
    public function index($attribID=null) {

        if (empty($attribID)) {
            redirect(base_url('admin/attribute'),'refresh');
        }

        $isExistAttrib = $this->attribute_val->isExistAttrib($attribID);

        if (!$isExistAttrib) {
            redirect(base_url('admin/attribute'),'refresh');   
        }

        $title = 'Manage '.$isExistAttrib->name.' Attribute';

        $this->setPageTitle($title);
        $this->data['attrib'] = $isExistAttrib;
        $this->data['soringCol'] = '"order": [[ 1, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url('admin/attribute_value/view/'.$attribID);
        $this->render('admin/vwManageAttributeValue');
    }

    public function view($attribID) {

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
        echo $list = $this->attribute_val->get_datatables($attribID);
    }

    // Add a new item to load view
    public function create($attribID=null) {

        if (empty($attribID)) {
            redirect(base_url('admin/attribute'),'refresh');
        }

        $isExistAttrib = $this->attribute_val->isExistAttrib($attribID);

        if (!$isExistAttrib) {
            redirect(base_url('admin/attribute'),'refresh');   
        }

        $title = 'Add '.$isExistAttrib->name.' Value';

        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle($title);
        $this->data['attrib'] = $isExistAttrib;
        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }
        $this->render('admin/vwAddAttributeValue');
    }

    // Add a new item to database
    public function save() {

        //echo "<pre>";
        // print_r($_POST);

        $id = $this->uri->segment(4);

        $adminId = get_admin_id();

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'create');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/attribute-value/'.$id, 'refresh'); 
            die();
        }

        
        $values = $this->input->post('attribute_value');

        foreach ($values as $value) {
            
            $slug = url_title($value,'-',true);
            $slug = $this->Master_model->validateSlug('attribute_value', 'slug', $slug);
            $decryptId = decrypt_id('attribute_name', array('SHA2(id, 256) =' => $id))->id;

            $object = array(
                'admin_id' => $adminId,
                'attrib_id' => $decryptId,
                'name' => $value,
                'slug' => $slug,
                'display_order' => $this->input->post('display_order'),
                'is_active' => 1
            );

            /* Create Log Start */
            $tbl = 'attribute_value';
            $module = 'Attribute Value';
            $logData = $object;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value();

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
            /* Create Log End */

            $isInserted = $this->db->insert('attribute_value', $object);

        }

        if (isset($isInserted)) {
            set_flash('message', 'success', 'Attribute value has been added successfully.');
            redirect('admin/attribute-value/'.$id, 'refresh'); 
            //redirect in manage with msg
        }

        return FALSE;
    }

    public function edit($id = NULL) {
        $this->setPageTitle('Edit Attribute Value');

        $this->data['is_CKEditor'] = FALSE;

        $this->data['attribute'] = $this->db->get_where('attribute_value', array('SHA2(id, 256) = ' => $id))->row();

        if (empty($this->data['attribute'])) {
            redirect(base_url('admin/attribute'),'refresh');
        }

        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
        $this->render('admin/vwEditAttributeValue');
    }

    //Update one item
    public function update($id) {

        $data['error'] = "";

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'update');

        if (!$perm) {
            $attribID = decrypt_id('attribute_value', array('SHA2(id, 256) = ' => $id))->attrib_id;
            $encID = hash('SHA256', $attribID);

            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/attribute-value/'.$encID, 'refresh');
            return false;
            exit();
        }

        $slug = url_title($this->input->post('slug'),'-',true);

        $slug = $this->Master_model->validateSlug('attribute_value', 'slug', $slug, $id);

        $adminId = get_admin_id();

        if ($data['error'] == "") {

            $data = array(
                'admin_id' => $adminId,
                'name' => $this->input->post('attribute_value'),
                'slug' => $slug,
                // 'meta_title' => $this->input->post('meta_title'),
                // 'meta_keyword' => $this->input->post('meta_keyword'),
                // 'meta_description' => $this->input->post('meta_description'),
                'display_order' => $this->input->post('display_order'),
                'is_active' => 1
            );

            /* Create Log Start */
            $tbl = 'attribute_value';
            $module = 'Attribute Value';
            $logData = $data;
            $columns = !empty($logData)? array_keys($logData):'';

            $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $id), $columns);

            $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
            /* Create Log End */

            $this->db->where('SHA2(id, 256) = ', $id);
            $update = $this->db->update('attribute_value', $data);

            $attribID = decrypt_id('attribute_value', array('SHA2(id, 256) = ' => $id))->attrib_id;
            $encID = hash('SHA256', $attribID);

            if ($update) {
                set_flash('message', 'success', 'Attribute value has been updated successfully.');
                redirect('admin/attribute-value/'.$encID, 'refresh'); //redirect in manage with msg
            }
        }
        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {
			 
                $id = $this->input->post('uid');

                /* Create Log Start */
                $tbl = 'attribute_value';
                $module = 'Attribute Value';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $this->db->where_in('id', $id);
                $is_delete = $this->db->delete('attribute_value');    

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Attribute value has been deleted successfully.",
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

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => 'You dont have permission',
                        "type" => "danger"
                )));
                
            } else {

                foreach($data as $dat) {
                    /* Create Log Start */
                    $tbl = 'attribute_value';
                    $module = 'Attribute Value';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $dat), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

                /** delete all recode */
                $this->db->where_in('id', $data);
                $is_delete = $this->db->delete('attribute_value');

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => "Attribute value has been deleted successfully.",
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
                $tbl = 'attribute_value';
                $module = 'Attribute Value';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->attribute_val->update(array('is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Attribute value has been activated successfully." : "Attribute value has been deactivated successfully.";

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
