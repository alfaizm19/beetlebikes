<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pincode extends Admin_Controller {

    public function __construct() {
        parent::__construct();        
        $this->load->model('Pincode_model', 'pincode');
    }

    // List all your items
    public function index() {
        $this->setPageTitle('Manage Pincode');
        $this->data['soringCol'] = '"order": [[ 0, "desc" ]],';
        $this->data['manage_view_path'] = '' . base_url() . 'admin/pincode/view/';
        $this->render('admin/vwManagePincode');
    }

    public function view() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'read');

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

        $this->setPageTitle('Manage Pincode');
        echo $list = $this->pincode->get_datatables();
    }

    public function create() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Add Pincode');

        if ($this->input->post('Submit') === "Save") {
            $this->save();
        }

        $this->render('admin/vwAddPincode');
    }

    public function save() {
        $data['error'] = "";

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'create');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/pincode/', 'refresh');
            die();
        }
		  
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);

        // die();

        $data = array(
            'admin_id' => $adminId,
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'delivery_days' => $this->input->post('delivery_days'),
        );

        /* Create Log Start */
        $tbl = 'pincode';
        $module = 'Pincode';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value();

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
        /* Create Log End */

        $inserted = $this->db->insert('pincode', $data);

        if ($inserted) {
            set_flash('message', 'success', 'Pincode has been added successfully.');
            redirect('admin/pincode/', 'refresh'); 
            //redirect in manage with msg
        }    
        return FALSE;
    }

    public function edit($id = NULL) {
        $this->data['is_CKEditor'] = False;

        $this->setPageTitle('Edit Pincode ');

        $this->data['pincode'] = $this->pincode->get(array('SHA2(id, 256) =' => $id));

        if (empty($this->data['pincode'])) {
            redirect(base_url('admin/pincode'),'refresh');
        }

        if ($this->input->post('Submit') === "Save") {
            $this->update($id);
        }
        
        $this->render('admin/vwEditPincode');
    }

    //Update one item
    public function update($id) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'update');

        $adminId = get_admin_id();

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/pincode/', 'refresh'); //redirect    
            return false;
            exit();
        }
        
        $data = array(
            'admin_id' => $adminId,
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'delivery_days' => $this->input->post('delivery_days'),
        );

        /* Create Log Start */
        $tbl = 'pincode';
        $module = 'Pincode';
        $logData = $data;
        $columns = !empty($logData)? array_keys($logData):'';

        $oldValue = $this->Master_model->get_old_value($tbl, array('SHA2(id, 256) = ' => $this->uri->segment(4)), $columns);

        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
        /* Create Log End */

        // echo "<pre>";
        // print_r($data);
        // die();

        $update = $this->pincode->update($data, array(
            'SHA2(id, 256) =' => $this->uri->segment(4)));

        if ($update) {
            set_flash('message', 'success', 'Pincode has been updated successfully.');
            redirect('admin/pincode/', 'refresh'); //redirect in manage with msg
        }

        return FALSE;
    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'delete');

            $adminId = get_admin_id();

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $data = $this->input->post('uid');

                /* Create Log Start */
                $tbl = 'pincode';
                $module = 'Pincode';
                $logData = '';
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $data), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                /* Create Log End */

                $is_delete = $this->pincode->delete($data);
                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Pincode has been deleted successfully.",
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        'message' => "Something goes wrong.",
                        "type" => "success"
                    )));
                }
            }
        }
    }

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'delete');

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $data_uid = $this->input->post('uid');

                $adminId = get_admin_id();

                foreach ($data_uid as $id) {
                    /* Create Log Start */
                    $tbl = 'pincode';
                    $module = 'Pincode';
                    $logData = '';
                    $columns = !empty($logData)? array_keys($logData):'';

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $id), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                    /* Create Log End */
                }

                $this->pincode->delete_all($data_uid);
                foreach($data_uid as $uid) {
                    $this->db->where_in('id', $uid);
                    $is_delete = $this->db->delete('pincode');
                }

                if ($is_delete) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "Pincode has been deleted successfully.",
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        'message' => "Something goes wrong.",
                        "type" => "success"
                    )));
                }
            }
        }
    }

    public function is_active() {
        if ($this->input->is_ajax_request()) {

            $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'update');

            $adminId = get_admin_id();

            if (!$perm) {
                
                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        'message' => "You dont have permission",
                        "type" => "danger"
                )));

            } else {

                $uid = $this->input->post('uid');
                $acive = $this->input->post('active');

                /* Create Log Start */
                $tbl = 'pincode';
                $module = 'Pincode';
                $logData = array('admin_id' => $adminId, 'is_active' => (1 != $acive));
                $columns = !empty($logData)? array_keys($logData):'';

                $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $uid), $columns);

                $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Update');
                /* Create Log End */

                $is_update = $this->pincode->update(array('admin_id' => $adminId, 'is_active' => (1 != $acive)), $uid);

                $message = ($is_update && $acive != 1) ? "Pincode has been activated successfully." : "Pincode has been deactivated successfully.";

                if ($is_update) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => true,
                        "message" => $message,
                        "type" => "success"
                    )));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array(
                        "success" => false,
                        "message" => "Somthig goes worng.",
                        "type" => "success"
                    )));
                }

            }
        } else {
            redirect(base_url('admin/dashboard'), 'refresh');
        }
    }
    
    public function getCategoryLv2() {
        $status = array('error' => true);

        if ($this->input->is_ajax_request()) {
            
            $catID = $this->input->post('catId');
            $getChildCategory = $this->Master_model->getCategoryLevel2($catID);

            $data = '<option value="">Please Select Category</option>';

            if (!empty($getChildCategory)) {

                foreach ($getChildCategory as $child) {
                    $data .= '<option value="'.$child->id.'">'.$child->category.'</option>';
                }
            }

            $status = array('error' => false,'data' => $data);

        }

        echo json_encode($status);
    }

    public function removecatalog(){
        if(isset($_POST['path'])){
           $path = $_POST['path'];
           $update = array(
                'catalogue_pdf' => '',
            );
           $this->db->where('id', $path);
          $this->db->update('product',$update);
            echo 1;
        }
    }

    public function import() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Import Pincode');

        if ($this->input->post('Submit') === "Save") {
            $this->import_excel();
        }

        $this->render('admin/vwImportPincode');
    }

    public function sampleImportFile() {

        $fileName = 'sample-pincode-import-file.xlsx';

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'read');

        if (!$perm) {
            
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', "You don't have permission.");

            $sheet->setTitle('Sample Import File');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();

        }

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        // set Header
        $sheet->SetCellValue('A1', 'Pincode *');
        $sheet->SetCellValue('B1', 'State *');
        $sheet->SetCellValue('C1', 'City *');
        $sheet->SetCellValue('D1', 'Delivery days');
        $sheet->SetCellValue('E1', 'Status');
        $sheet->SetCellValue('F1', 'Update Status *');

        $sheet->setTitle('Import Pincode');

        /* Create a new worksheet, after the default sheet*/
        $spreadsheet->createSheet();

        /* Add some data to the second sheet, resembling some different data types*/
        $spreadsheet->setActiveSheetIndex(1);
        $sheet2 = $spreadsheet->getActiveSheet();

        $sheet2->SetCellValue('A1', 'Status');
        $sheet2->SetCellValue('B1', 'Update Status');

        $sheet2->setCellValue('A2', 'Active');
        $sheet2->setCellValue('A3', 'Inactive');

        $sheet2->setCellValue('B2', 'Truncate All');
        $sheet2->setCellValue('B3', 'Add New');
        $sheet2->setCellValue('B4', 'Delete Existing');

        // Rename worksheet
        $sheet2->setTitle('Data');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->getProtection()->setPassword('codzio@123');
        $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$fileName);
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file

        return false;
    }

    public function export() {
        $fileName = 'pincode.xlsx';

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'read');

        if (!$perm) {
            
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', "You don't have permission.");

            $sheet->setTitle('Sample Import File');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();

        }

        $getPincodeData = $this->db->order_by('id', 'desc')->get('pincode')->result_object();

        if (!empty($getPincodeData)) {
                
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', 'Pincode');
            $sheet->SetCellValue('B1', 'State');
            $sheet->SetCellValue('C1', 'City');
            $sheet->SetCellValue('D1', 'Delivery Days');
            $sheet->SetCellValue('E1', 'Status');

            // set Row
            $rowCount = 2;
            $i=1;

            foreach ($getPincodeData as $pin) {

                $status = "Inactive";
                if ($pin->is_active) {
                    $status = "Active";
                }

                $sheet->SetCellValue('A' . $rowCount, $pin->pincode);
                $sheet->SetCellValue('B' . $rowCount, $pin->state);
                $sheet->SetCellValue('C' . $rowCount, $pin->city);
                $sheet->SetCellValue('D' . $rowCount, $pin->delivery_days);
                $sheet->SetCellValue('E' . $rowCount, $status);
                $rowCount++;
            }

            $sheet->setTitle('Exported Pincode');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file

        } else {
            set_flash('message', 'danger', 'There is no data found');
            redirect('admin/pincode', 'refresh');
        }

        return false;
    }

    public function import_excel() {

        $permCreate = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'create');

        $permUpdate = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'update');

        $permDel = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'delete');

        $adminId = get_admin_id();
        $tbl = 'pincode';
        $module = 'Pincode';

        if (!$permCreate) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/pincode/import', 'refresh');
            exit();
        }

        if (!$permUpdate) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/pincode/import', 'refresh');
            exit();
        }

        if (!$permDel) {
            set_flash('message', 'danger', 'You dont have permission');
            redirect('admin/pincode/import', 'refresh');
            exit();
        }
        
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if(isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['import_file']['name']);

            $extension = end($arr_file);

            if('csv' == $extension){

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['import_file']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            //Total Column should be 6 to insert the data
            $totalColCount = 6;


            // echo "<pre>";
            // print_r($sheetData);
            // die();

            $sheetStatus = array();
            $error = array();
            $prepareData = array();
            // echo "<pre>";

            if (!empty($sheetData)) {

                for ($i=1; $i < count($sheetData); $i++) { 

                    if (count($sheetData[$i]) == $totalColCount) {
                        
                        $pincode = $sheetData[$i][0];
                        $state = $sheetData[$i][1];
                        $city = $sheetData[$i][2];
                        $deliveryDays = $sheetData[$i][3];
                        $status = $sheetData[$i][4];
                        $updateStatus = $sheetData[$i][5];

                        if ($status == 'Active') {
                            $status = 1;
                        } else {
                            $status = 0;
                        }

                        //check Pincode
                        if (empty($pincode) OR !is_numeric($pincode)) {
                            $error['pincode_error'][$i] = 'Pincode should be numeric on row no. '. $i;
                        }

                        //check State
                        if (empty($state)) {
                            $error['state_error'][$i] = 'State cannot be empty on row no. '. $i;
                        }

                        //check Pincode
                        if (empty($city)) {
                            $error['city_error'][$i] = 'State cannot be empty on row no. '. $i;
                        }

                        $prepareData[] = array(
                            'pincode' => $pincode,
                            'state' => $state,
                            'city' => $city,
                            'delivery_days' => $deliveryDays,
                            'is_active' => $status,
                            'update_status' => $updateStatus
                        );

                    } else {
                        $error['column_error'][$i] = 'Total column should be 5 in row no. '. $i;
                    }

                }

            } else {
                $sheetStatus = array(
                    'error' => true,
                    'msg' => 'Please fill the sheet'
                );
            }

            // print_r($sheetStatus);
            // print_r($error);
            // print_r($prepareData);

            $errorList = '';

            if (!empty($error)) {
                if (isset($error['pincode_error'])) {
                    foreach ($error['pincode_error'] as $pinErr) {
                        $errorList .= $pinErr."<br>";
                    }
                }

                if (isset($error['state_error'])) {
                    foreach ($error['state_error'] as $stateErr) {
                        $errorList .= $stateErr."<br>";
                    }
                }

                if (isset($error['city_error'])) {
                    foreach ($error['city_error'] as $cityErr) {
                        $errorList .= $cityErr."<br>";
                    }
                }
            }

            if (!empty($sheetStatus)) {
                
                if ($sheetStatus['error'] == true) {
                    set_flash('message', 'danger', $sheetStatus['msg']);
                    redirect('admin/pincode/import', 'refresh');  
                }            
            } elseif (!empty($errorList)) {
                set_flash('message', 'danger', $errorList);
                redirect('admin/pincode/import', 'refresh');
            }

            if (empty($sheetStatus) && empty($errorList)) {
                    
                $updateStatus = isset($prepareData[0]['update_status'])? $prepareData[0]['update_status']:'';

                if ($updateStatus == "Truncate All") {
                    $this->db->where('is_active', 1);
                    $this->db->or_where('is_active', 0);
                    $this->db->delete('pincode');

                    foreach ($prepareData as $data) {
                        unset($data['update_status']);
                        $this->db->insert('pincode', $data);
                    }
                }

                if ($updateStatus == "Add New") {
                    foreach ($prepareData as $data) {

                        $data['admin_id'] = $adminId;

                        /* Create Log Start */
                        $logData = $data;
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value();

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Insert');
                        /* Create Log End */

                        unset($data['update_status']);
                        $this->db->insert('pincode', $data);
                    }
                }

                if ($updateStatus == "Delete Existing") {
                    foreach ($prepareData as $data) {

                        /* Create Log Start */
                        $logData = '';
                        $columns = !empty($logData)? array_keys($logData):'';

                        $oldValue = $this->Master_model->get_old_value($tbl, array('pincode' => $data['pincode']), $columns);

                        $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $logData, 'Delete');
                        /* Create Log End */

                        unset($data['update_status']);
                        $this->db->where('pincode', $data['pincode']);
                        $this->db->delete('pincode');
                    }
                }

                if (!empty($updateStatus)) {
                    set_flash('message', 'success', 'Pincode import successfully');
                    redirect('admin/pincode/import', 'refresh');
                } else {
                    set_flash('message', 'danger', 'Something went wrong');
                    redirect('admin/pincode/import', 'refresh');
                }
            }

        } else {
            set_flash('message', 'danger', 'File type should be xlsx.');
            redirect('admin/pincode/import', 'refresh');
        }
        return FALSE;
    }

}

?>
