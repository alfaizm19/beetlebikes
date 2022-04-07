<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Admin_Controller {

	public function change_order_status() {
		$status = array();

		if ($this->input->is_ajax_request()) {

			$adminId = get_admin_id();

			$perm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'update');

			if (!$perm) {
				$status = array(
					'error' => true,
					'type' => 'final',
					'msg' => 'Sorry you dont have permission'
				);
				echo json_encode($status);
				exit();
			}

			$this->form_validation->set_rules('order_status', 'order status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('order_notes', 'order note', 'trim|xss_clean');
			$this->form_validation->set_rules('awb_number', 'AWB Number', 'trim|xss_clean');
			$this->form_validation->set_rules('tracking_link', 'tracking link', 'trim|xss_clean');
			$this->form_validation->set_rules('order_id', 'order id', 'trim|xss_clean');

			if ($this->form_validation->run() === FALSE) {
				
				$status = array('error' => true, 'type' => 'field');
                $status = array_merge($this->form_validation->error_array(), $status);

			} else {
				
				$orderStatus = $this->input->post('order_status');
				$orderNotes = $this->input->post('order_notes');
				$awb = $this->input->post('awb_number');
				$trackingLink = $this->input->post('tracking_link');
				$orderId = $this->input->post('order_id');

				//check if order id exist
				$orderId = $this->db->get_where('orders', array('SHA2(id, 256) =' => $orderId))->row();

				if (!empty($orderId)) {

					$orderId = $orderId->id;
					$newOrderStatus = '';

					switch ($orderStatus) {
						case 'approved':
							$newOrderStatus = 'Approved';
							break;

						case 'hold':
							$newOrderStatus = 'Hold';
							break;

						case 'order_shipped':
							$newOrderStatus = 'Order Shipped';
							break;

						case 'order_delivered':
							$newOrderStatus = 'Order Delivered';
							break;

						case 'order_delivery_attempt_failed_rto':
							$newOrderStatus = 'Order Delivery Attempt Failed - RTO';
							break;

						case 'order_delivery_attempt_failed_refund_processed':
							$newOrderStatus = 'Order Delivery Attempt Failed- Refund Processed';
							break;

						case 'order_cancellation':
							$newOrderStatus = 'Order Cancellation';
							break;

						case 'order_cancelled_refund_processed':
							$newOrderStatus = 'Order Cancelled - Refund Processed';
							break;

						case 'customer_return_initiated_rvp':
							$newOrderStatus = 'Customer Return Initiated - RVP';
							break;

						case 'reverse_pickup_done':
							$newOrderStatus = 'Reverse Pickup Done';
							break;

						case 'reverse_pickup_delivered':
							$newOrderStatus = 'Reverse Pickup Delivered';
							break;

						case 'rvp_refund_processed':
							$newOrderStatus = 'RVP Refund Processed';
							break;

						case 'rvp_refund_denied':
							$newOrderStatus = 'RVP Refund Denied';
							break;

						case 'order_cancellation_by_customer':
							$newOrderStatus = 'Order Cancellation - By Customer';
							break;
						
						default:
							$newOrderStatus = 'Order Confirmed';
							break;
					}

					$obj1 = array(
						'admin_id' => $adminId,
						'order_status' => $newOrderStatus,
						'order_notes' => $orderNotes,
						'awb_number' => $awb,
						'tracking_link' => $trackingLink,
						'updated_at' => date('Y-m-d H:i:s'),
					);

					$obj2 = array(
						'admin_id' => $adminId,
						'order_id' => $orderId,
						'order_status' => $newOrderStatus,
						'order_notes' => $orderNotes,
						'created_at' => date('Y-m-d H:i:s'),
					);

					/* Create Log Start */
					$tbl = 'orders';
					$module = 'Order';
					$data = $obj1;
					$columns = array_keys($data);

					$oldValue = $this->Master_model->get_old_value($tbl, array('id' => $orderId), $columns);

					$this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Update');
					/* Create Log End */

					$this->db->where('id', $orderId);
					$this->db->update('orders', $obj1);

					if ($this->db->affected_rows()) {
						
						//if order status update then create order status history

						if ($newOrderStatus == 'Order Shipped') {
							$isSend = $this->Email_sending->orderDispatch($orderId);
						}

						if ($newOrderStatus == 'Order Delivered') {
							$isSend = $this->Email_sending->orderDelivered($orderId);
							$isSend = $this->Email_sending->orderReview($orderId);
							$isSend = $this->Sms_model->orderDelivered($orderId);
						}

						if ($newOrderStatus == 'Order Cancellation') {
							$isSend = $this->Email_sending->orderCancelByAdmin($orderId);
							$isSend = $this->Sms_model->orderCancelByAdmin($orderId);
						}

						/* Create Log Start */
						$tbl = 'orders';
						$module = 'Order';
						$data = $obj2;
						$columns = array_keys($data);

						$oldValue = $this->Master_model->get_old_value();

						$this->Master_model->audit($adminId, $module, $tbl, $oldValue, $data, 'Insert');
						/* Create Log End */

						$this->db->insert('order_status_history', $obj2);

						$getOrderStatusHistory = $this->db->get_where('order_status_history', array('order_id' => $orderId))->result_object();

						$historyData = '';

						if (!empty($getOrderStatusHistory)) {
							foreach ($getOrderStatusHistory as $orderHistory) {
								$historyData .= '<tr>
	                                    <td width="360px">
	                                        '.$orderHistory->order_status.'
	                                    </td>
	                                    <td width="360px">
	                                        '.$orderHistory->order_notes.'
	                                    </td>
	                                    <td width="250px">
	                                        '.date('d-m-Y h:i:s A', strtotime($orderHistory->created_at)).'
	                                    </td>
	                                </tr>';
							}
						}

						$status = array(
							'error' => false,
							'history' => $historyData,
							'msg' => 'Order status changed successfully'
						);

					} else {
						$status = array(
							'error' => true,
							'type' => 'final',
							'msg' => 'You have not made any changes'
						);
					}
					
				} else {
					$status = array(
						'error' => true,
						'type' => 'final',
						'msg' => 'Something went wrong'
					);
				}

			}

		} else {
			$status = array(
				'error' => true,
				'type' => 'final',
				'msg' => 'Something went wrong'
			);
		}

		echo json_encode($status);
	}

	public function get_sub_category() {
		$status = array();

		if ($this->input->is_ajax_request()) {
			
			$category = $this->input->post('category');

			$subCategory = array();

			if ($category) {
				$subCategory = $this->db->select(array('id', 'category'))->get_where('category', array(
					'is_active' => 1,
					'parent' => $category
				))->result_object();
			}

			$data = '';

			if (!empty($subCategory)) {
				
				foreach ($subCategory as $subCat) {
					$data .= '
						<option value="'.$subCat->id.'">'.$subCat->category.'</option>
					';
				}
			}

			$status = array(
				'error' => false,
				'data' => $data
			);

		} else {
			$status = array(
				'error' => true,
				'etype' => 'final',
				'msg' 	=> 'Direct access not allowed'
			);
		}

		echo json_encode($status);
	}

	public function search_by_sku() {
		$data = array();

		if ($this->input->is_ajax_request()) {
			
			$category = $this->input->get('category');
			$subCategory = $this->input->get('subCategory');
			$search = $this->input->get('search');

			if (!empty($category)) {
				$this->db->where('a.category_level_1', $category);
			}

			if (!empty($subCategory)) {
				foreach ($subCategory as $subCat) {
					$subCat = trim($subCat);
					$this->db->or_having('sub_category', $subCat);
				}
			}

			if (!empty($search)) {
				
				$result = $this->db
				->select('a.id, a.sku_code, a.product_name, a.category_level_1 as category, b.category as sub_category')
				->join('category as b', 'a.category_level_2 = b.id', 'left')
				->like('sku_code', $search)
				->get('product as a')
				->result_object();

				if (!empty($result)) {
					foreach ($result as $res) {
						// $data .= '
						// 	<option value="'.$res->id.'">'.$res->sku_code.'</option>
						// ';
						$data[] = array('id' => $res->id, 'text' => $res->sku_code);
					}
				}
			}

		}

		echo json_encode($data);
	}

	public function search_by_product() {
		$data = array();

		if ($this->input->is_ajax_request()) {
			
			$category = $this->input->get('category');
			$subCategory = $this->input->get('subCategory');
			$search = $this->input->get('search');

			if (!empty($category)) {
				$this->db->where('a.category_level_1', $category);
			}

			if (!empty($subCategory)) {
				foreach ($subCategory as $subCat) {
					$subCat = trim($subCat);
					$this->db->or_having('sub_category', $subCat);
				}
			}

			if (!empty($search)) {
				
				$result = $this->db
				->select('a.id, a.sku_code, a.product_name, a.category_level_1 as category, b.category as sub_category')
				->join('category as b', 'a.category_level_2 = b.id', 'left')
				->like('product_name', $search)
				->or_like('sku_code', $search)
				->get('product as a')
				->result_object();

				if (!empty($result)) {
					foreach ($result as $res) {
						$data[] = array('id' => $res->id, 'text' => $res->product_name);
					}
				}
			}

		}

		echo json_encode($data);
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/admin/Ajax.php */