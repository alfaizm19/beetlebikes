<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dealer_enquiry extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Dealer_enquiry_model', 'dealer');
    }

    // List all your items
    public function index() {        

        $filtersData = array(
            'from' => $this->input->get('from_date'),
            'to' => $this->input->get('to_date'),
        );

        $this->setPageTitle('Manage Dealer Enquiry');
        $this->data['soringCol'] = '"order": [[ 3, "desc" ]],';

        $this->data['manage_view_path'] = '' . base_url() . 'admin/dealer_enquiry/view/'.urlencode(serialize($filtersData));
        $this->render('admin/vwManageDealerEnquiry');
    }

    public function view($filtersData) {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'read');

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

        $filtersData = unserialize(urldecode($filtersData));

        $this->setPageTitle('Manage Orders');
        echo $list = $this->dealer->get_datatables($filtersData);
    }

    public function enquiry_view($id = NULL) {
        $this->setPageTitle('Manage Dealer Enquiry | View Enquiry Detail');

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'read');

        if (!$perm) {
            redirect(base_url('admin/orders'));
            exit();
        }

        $this->data['info'] = $this->dealer->get_enquiry_info($id);
        
        $this->render('admin/vwViewDealerEnquiry');
    }

    public function createxls() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'read');

        $from_date = !empty($this->input->get('from_date'))? date('Y-m-d', strtotime($this->input->get('from_date'))):'';

        $to_date = !empty($this->input->get('to_date'))? date('Y-m-d', strtotime($this->input->get('to_date'))):'';

        // create file name
        $fileName = 'dealer-data-'.time().'.xlsx';

        if (!$perm) {
            set_flash('error', 'danger', 'You dont have permission');
            redirect(base_url('admin/dealer_enquiry'),'refresh');
        }

        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(a.created_at) >=', $from_date);
            $this->db->where('DATE(a.created_at) <=', $to_date);
        } elseif (!empty($from_date) && empty($to_date)) {
            $this->db->where('DATE(a.created_at) >=', $from_date);
        } elseif (!empty($to_date) && empty($from_date)) {
            $this->db->where('DATE(a.created_at) >=', $to_date);
        }

        $info = $this->db
        ->order_by('a.id', 'desc')
        ->where('type', 'dealer')
        ->get('enquiry as a')->result_object();        

        if (!empty($info)) {
                
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', 'Name');
            $sheet->SetCellValue('B1', 'Email');
            $sheet->SetCellValue('C1', 'Subject');
            $sheet->SetCellValue('D1', 'City');
            $sheet->SetCellValue('E1', 'Phone');
            $sheet->SetCellValue('F1', 'Store');
            $sheet->SetCellValue('G1', 'Message');
            $sheet->SetCellValue('H1', 'Date');

            // set Row
            $rowCount = 2;
            $i=1;

            foreach ($info as $inf) {

                $sheet->SetCellValue('A' . $rowCount, $inf->name);
                $sheet->SetCellValue('B' . $rowCount, $inf->email);
                $sheet->SetCellValue('C' . $rowCount, $inf->subject);
                $sheet->SetCellValue('D' . $rowCount, $inf->city);
                $sheet->SetCellValue('E' . $rowCount, $inf->phone);
                $sheet->SetCellValue('F' . $rowCount, $inf->store);
                $sheet->SetCellValue('G' . $rowCount, $inf->message);
                $sheet->SetCellValue('H' . $rowCount, date('d-m-Y h:i:s A', strtotime($inf->created_at)));
                
                $rowCount++;
            }

            $sheet->setTitle('Exported Dealer Enquiry');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file

        } else {
            set_flash('error', 'danger', 'There are no enquiry');
            redirect(base_url('admin/contact_enquiry'),'refresh');
        }

    }

    //Delete one item
    public function delete() {
        if ($this->input->is_ajax_request()) {

           $data = $this->input->post('uid');
           $this->db->where('id', $data);
           $is_delete = $this->db->delete('orders');
           if ($is_delete) {

                $this->db->where('order_id', $data);
                $this->db->delete('order_item');

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => true,
                    "message" => "Orders has been deleted successfully.",
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

    public function bulk_delete() {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post('uid');

            $this->db->where_in('id', $data);
            $is_delete = $this->db->delete('orders');

            if ($is_delete) {

                $this->db->where_in('order_id', $data);
                $this->db->delete('order_item');

                $this->output->set_content_type('application/json')->set_output(json_encode(array(
                    "success" => true,
                    "message" => "Orders has been deleted successfully.",
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

    public function excelChangeOrderStatus() {
        $this->data['is_CKEditor'] = FALSE;
        $this->setPageTitle('Excel Change Order Status');

        if ($this->input->post('Submit') === "Save") {
            $this->update_from_excel();
        }

        $this->render('admin/vwExcelChangeOrderStatus');
    }

    public function downloadOrders() {

        $from_date = !empty($this->input->get('from_date'))? date('Y-m-d', strtotime($this->input->get('from_date'))):'';

        $to_date = !empty($this->input->get('to_date'))? date('Y-m-d', strtotime($this->input->get('to_date'))):'';

        $orderStatus = !empty($this->input->get('order_status'))? $this->input->get('order_status'):'';

        if (!empty($orderStatus)) {
            
            switch ($orderStatus) {
                case 'approved':
                    $orderStatus = 'Approved';
                    break;

                case 'hold':
                    $orderStatus = 'Hold';
                    break;

                case 'order_shipped':
                    $orderStatus = 'Order Shipped';
                    break;

                case 'order_delivered':
                    $orderStatus = 'Order Delivered';
                    break;

                case 'order_delivery_attempt_failed_rto':
                    $orderStatus = 'Order Delivery Attempt Failed - RTO';
                    break;

                case 'order_delivery_attempt_failed_refund_processed':
                    $orderStatus = 'Order Delivery Attempt Failed- Refund Processed';
                    break;

                case 'order_cancellation':
                    $orderStatus = 'Order Cancellation';
                    break;

                case 'order_cancelled_refund_processed':
                    $orderStatus = 'Order Cancelled - Refund Processed';
                    break;

                case 'customer_return_initiated_rvp':
                    $orderStatus = 'Customer Return Initiated - RVP';
                    break;

                case 'reverse_pickup_done':
                    $orderStatus = 'Reverse Pickup Done';
                    break;

                case 'reverse_pickup_delivered':
                    $orderStatus = 'Reverse Pickup Delivered';
                    break;

                case 'rvp_refund_processed':
                    $orderStatus = 'RVP Refund Processed';
                    break;

                case 'rvp_refund_denied':
                    $orderStatus = 'RVP Refund Denied';
                    break;

                case 'order_cancellation_by_customer':
                    $orderStatus = 'Order Cancellation - By Customer';
                    break;
                
                default:
                    $orderStatus = 'Order Confirmed';
                    break;
            }

        }

        // create file name
        $fileName = 'order-data-'.time().'.xlsx';

        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(a.created_at) >=', $from_date);
            $this->db->where('DATE(a.created_at) <=', $to_date);
        } elseif (!empty($from_date) && empty($to_date)) {
            $this->db->where('DATE(a.created_at) >=', $from_date);
        } elseif (!empty($to_date) && empty($from_date)) {
            $this->db->where('DATE(a.created_at) >=', $to_date);
        }

        if (!empty($orderStatus)) {
            $this->db->where('a.order_status', $orderStatus);
        }

        $orderInfo = $this->db
        ->select('a.*')
        ->order_by('a.id', 'desc')
        ->get('orders as a')->result_object();

        if (!empty($orderInfo)) {
                
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', 'Order Date');
            $sheet->SetCellValue('B1', 'Order No');
            $sheet->SetCellValue('C1', 'Order Status');
            $sheet->SetCellValue('D1', 'Assign Order Status');
            $sheet->SetCellValue('E1', 'Order Notes');
            $sheet->SetCellValue('F1', 'AWB Number');
            $sheet->SetCellValue('G1', 'Tracking Link');
            $sheet->SetCellValue('H1', 'Razorpay Payment Id');
            $sheet->SetCellValue('I1', 'Razorpay Order Id');

            $sheet->setTitle('Exported Orders');

            /* Create a new worksheet, after the default sheet*/
            $spreadsheet->createSheet();

            /* Add some data to the second sheet, resembling some different data types*/
            $spreadsheet->setActiveSheetIndex(1);
            $sheet2 = $spreadsheet->getActiveSheet();

            $sheet2->SetCellValue('A1', 'Assign Status');
            $sheet2->SetCellValue('B1', 'Default Status');

            $sheet2->setCellValue('A2', 'Order Confirmed');
            $sheet2->setCellValue('A3', 'Approved');
            $sheet2->setCellValue('A4', 'Hold');
            $sheet2->setCellValue('A5', 'Order Shipped');
            $sheet2->setCellValue('A6', 'Order Delivered');
            $sheet2->setCellValue('A7', 'Order Delivery Attempt Failed - RTO');
            $sheet2->setCellValue('A8', 'Order Delivery Attempt Failed- Refund Processed');
            $sheet2->setCellValue('A9', 'Order Cancellation');
            $sheet2->setCellValue('A10', 'Order Cancelled - Refund Processed');
            $sheet2->setCellValue('A11', 'Customer Return Initiated - RVP');
            $sheet2->setCellValue('A12', 'Reverse Pickup Done');
            $sheet2->setCellValue('A13', 'Reverse Pickup Delivered');
            $sheet2->setCellValue('A14', 'RVP Refund Processed');
            $sheet2->setCellValue('A15', 'RVP Refund Denied');
            $sheet2->setCellValue('A16', 'Order Cancellation - By Customer');

            $sheet2->setCellValue('B2', 'Order Confirmed');

            
            // set Row
            $rowCount = 2;
            $i=1;

            foreach ($orderInfo as $order) {

                $sheet->SetCellValue('A' . $rowCount, date('d-m-Y h:i:s A', strtotime($order->order_date)));
                $sheet->SetCellValue('B' . $rowCount, $order->custom_orderid);
                $sheet->SetCellValue('C' . $rowCount, $order->order_status);
                $sheet->SetCellValue('D' . $rowCount, '');

                $sheet->SetCellValue('E' . $rowCount, $order->order_notes);
                $sheet->SetCellValue('F' . $rowCount, $order->awb_number);
                $sheet->SetCellValue('G' . $rowCount, $order->tracking_link);
                $sheet->SetCellValue('H' . $rowCount, $order->razorpay_payment_id);
                $sheet->SetCellValue('I' . $rowCount, $order->razorpay_order_id);
                
                $rowCount++;
            }

            // Rename worksheet
            $sheet2->setTitle('Data');

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(1);
            $spreadsheet->getActiveSheet()->getProtection()->setPassword('codzio@123');
            $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
            $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file

        } else {

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->SetCellValue('A1', 'There is no orders');

            $sheet->setTitle('Exported Orders');

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file
        }
    }

    public function update_from_excel() {

        $perm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'update');

        if (!$perm) {
            set_flash('message', 'danger', 'You dont have permission.');
            redirect('admin/orders/excel-change-order-status', 'refresh');
            return false;
            exit();
        }

        $statusList = array(
            'Order Confirmed', 'Approved', 'Hold',
            'Order Shipped', 'Order Delivered', 'Order Delivery Attempt Failed - RTO', 'Order Delivery Attempt Failed- Refund Processed', 'Order Cancellation', 'Order Cancelled - Refund Processed', 'Customer Return Initiated - RVP', 'Reverse Pickup Done', 'Reverse Pickup Delivered', 'RVP Refund Processed', 'RVP Refund Denied', 'Order Cancellation - By Customer'
        );
        
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

            // echo "<pre>";
            // print_r($sheetData);
            // die();

            //Total Column should be 9 to update the data
            $totalColCount = 9;

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
                        
                        //$sku = $sheetData[$i][3];
                        $custom_orderid = $sheetData[$i][1];
                        $newStatus = $sheetData[$i][3];
                        $orderNote = $sheetData[$i][4];
                        $awbNumber = $sheetData[$i][5];
                        $trackingLink = $sheetData[$i][6];

                        //check Custom Order Id
                        $isCustomOrderIdExist = $this->db->get_where('orders', array('custom_orderid' => $custom_orderid))->row('id');

                        if (empty($isCustomOrderIdExist)) {
                            $error['order_id_error'][$i] = 'Order Id is not match on row no. '. $i;
                        }

                        if (!in_array($newStatus, $statusList)) {
                            $error['order_status_error'][$i] = 'Order Status is not match on row no. '. $i;   
                        }

                        $orderId = $isCustomOrderIdExist;

                        $prepareData[] = array(
                            'id' => $orderId,
                            'custom_orderid' => $custom_orderid,
                            'order_status' => $newStatus,
                            'order_notes' => $orderNote,
                            'awb_number' => $awbNumber,
                            'tracking_link' => $trackingLink
                        );

                    } else {
                        $error['column_error'][$i] = 'Total column should be 9 in row no. '. $i;
                    }

                }

            } else {
                $sheetStatus = array(
                    'error' => true,
                    'msg' => 'Please fill the sheet'
                );
            }

            // echo "<pre>";
            // print_r($sheetStatus);
            // print_r($error);
            // print_r($prepareData);

            // die();

            $errorList = '';

            if (!empty($error)) {
                if (isset($error['order_id_error'])) {
                    foreach ($error['order_id_error'] as $orderIdErr) {
                        $errorList .= $orderIdErr."<br>";
                    }
                }

                if (isset($error['order_status_error'])) {
                    foreach ($error['order_status_error'] as $orderStatusErr) {
                        $errorList .= $orderStatusErr."<br>";
                    }
                }
            }

            if (!empty($sheetStatus)) {
                
                if ($sheetStatus['error'] == true) {
                    set_flash('message', 'danger', $sheetStatus['msg']);
                    redirect('admin/orders/excel-change-order-status', 'refresh');  
                }       
            } elseif (!empty($errorList)) {
                set_flash('message', 'danger', $errorList);
                redirect('admin/orders/excel-change-order-status', 'refresh');
            }

            if (empty($sheetStatus) && empty($errorList)) {

                $adminId = get_admin_id();

                // echo "<pre>";
                // print_r($prepareData);
                // die();
                
                foreach ($prepareData as $data) {
                    
                    $orderId = $data['id'];

                    $updateData = array(
                        'admin_id' => $adminId,
                        'order_status' => $data['order_status'],
                        'order_notes' => $data['order_notes'],
                        'awb_number' => $data['awb_number'],
                        'tracking_link' => $data['tracking_link'],
                    );

                    /* Create Log Start */
                    $tbl = 'orders';
                    $module = 'Order';
                    $data = $updateData;
                    $columns = array_keys($data);

                    $oldValue = $this->Master_model->get_old_value($tbl, array('id' => $orderId), $columns);

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Update');
                    /* Create Log End */


                    $this->db->where('id', $orderId);
                    $this->db->update('orders', $updateData);

                    /* Create Log Start */
                    $data = array(
                        'admin_id' => $adminId,
                        'order_id' => $orderId,
                        'order_status' => $data['order_status'],
                        'order_notes' => $data['order_notes']
                    );

                    $columns = array_keys($data);

                    $oldValue = $this->Master_model->get_old_value();

                    $this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
                    /* Create Log End */

                    $this->db->insert('order_status_history', array(
                        'admin_id' => $adminId,
                        'order_id' => $orderId,
                        'order_status' => $data['order_status'],
                        'order_notes' => $data['order_notes']
                    ));
                }

                set_flash('message', 'success', 'Order status changed successfully');
                redirect('admin/orders/excel-change-order-status', 'refresh');
            }

        } else {
            set_flash('message', 'danger', 'File type should be xlsx.');
            redirect('admin/orders/excel-change-order-status', 'refresh');
        }
        return FALSE;
    }
}


?>
