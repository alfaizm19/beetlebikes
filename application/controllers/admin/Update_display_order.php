<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_display_order extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		// echo "<pre>";
		// print_r($_POST);

		// die();

		$hidden_order_id = $this->input->post('display_order_id');

		$hidden_stock = $this->input->post('stock');

		$hidden_table_id = $this->input->post('hid_table_id');
		$table = $this->input->post('data_table');

		$update_data = array();

		if(empty($hidden_table_id))
		{
			redirect($this->input->server('HTTP_REFERER'), 'refresh');
			set_flash('message','Error.','danger');
		}

	
		if(!empty($this->input->post('display_order_home')))
		{
			$display_order_home_id = $this->input->post('display_order_home');
			
			foreach(range(0,count($hidden_table_id)-1) as $key => $value)
			{
				$update_data[] = array(
					"id" => $hidden_table_id[$key],
					"display_order" => $hidden_order_id[$key],				
					"display_order_home" => $display_order_home_id[$key],				
				);

				if (!empty($hidden_stock)) {
					$update_data[] = array(
						"id" => $hidden_table_id[$key],
						"stock" => $hidden_stock[$key]
					);
				}
			}
		}
		else
		{
			foreach(range(0,count($hidden_table_id)-1) as $key => $value)
			{
				$update_data[] = array(
					"id" => $hidden_table_id[$key],
					"display_order" => $hidden_order_id[$key]
				);

				if (!empty($hidden_stock)) {
					$update_data[] = array(
						"id" => $hidden_table_id[$key],
						"stock" => $hidden_stock[$key]
					);
				}
			}
			
		}

		$this->db->update_batch($table, $update_data, 'id');
		set_flash('message','success',$this->input->post('message'));
		redirect($this->input->server('HTTP_REFERER'), 'refresh');
				
	}
}
