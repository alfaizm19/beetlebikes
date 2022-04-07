<?php defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends MY_Model {
	public $table = 'category'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key

	public function __construct() {
    	$this->return_as = 'object';
    	//$this->before_delete[] = 'remove_image';
		parent::__construct();
	}

	/* 
		This function is used to get parent category
	*/
	public function getParent() {
		return $this->db->get_where('category', array('parent' => 0))->result_object();
	}

  	public function get_datatables() {
		$this->load->library('datatables_ssp');
		$this->load->helper('text');
		$where = ' parent = 0 ';
		$order = ' order by category.id desc';

		//Datatables_ssp::$extra_columns = 'created_at';

		$delete_all = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($row) {
				return get_delete_all($row);
			}
    	);

		$category =	array(
			'customfilter' => 'id',
			'db' => 'category',
    	);

		$display_order =	array(
			'customfilter' => 'display_order',
			'db' => 'display_order',
			'formatter' => function($display_order,$row) {
				$display_order_data = array( "id" => $row['id'], "display_order" => $display_order );
				return get_display_order($display_order_data);
			}
    	);

		$is_active = array(
			'customfilter' => 'is_active',
			'db' => 'is_active',
			'formatter' => function($is_active,$row) {
				$is_active_data = array( "id" => $row['id'], "is_active" => $is_active );
				return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
			}
    	);

		$get_edit = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {

				$id = hash('SHA256', $id);

				return get_edit($id,'admin/category-level-1/edit'); /// $id = row_id , method path
			}
    	);

		$delete  = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_delete($id);
			}
		);

		if(DISPLAY_ORDER){
			$data_table = array_values(compact('delete_all','category','display_order','is_active','get_edit','delete')) ;
		}else{
			$data_table = array_values(compact('delete_all','category','is_active','get_edicategoryt','delete')) ;
		}

		$columns = array();

		foreach ($data_table as $data_key => $value)
		{
			$value['dt']=$data_key;
			$columns[] = $value;
		}
		error_log(json_encode($_GET));
		return json_encode(
			Datatables_ssp::simple($_GET,  $this->dbConn, $this->table, $this->primary_key, $columns,$myjoin='',$where, $order)
		);

	}

	public function getCategory2Tables() {
		$this->load->library('datatables_ssp');
		$this->load->helper('text');
		$where = ' parent != 0 ';
		$order = ' order by category.id desc';

		//Datatables_ssp::$extra_columns = 'created_at';

		$delete_all = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($row) {
				return get_delete_all($row);
			}
    	);

		$category =	array(
			'customfilter' => 'id',
			'db' => 'category',
    	);

    	$parent =	array(
			'customfilter' => 'parent',
			'db' => 'parent',
			'formatter' => function($id,$row) {
				return $this->db->get_where('category', array('id' => $id))->row('category');
			}
    	);

		$display_order =	array(
			'customfilter' => 'display_order',
			'db' => 'display_order',
			'formatter' => function($display_order,$row) {
				$display_order_data = array( "id" => $row['id'], "display_order" => $display_order );
				return get_display_order($display_order_data);
			}
    	);

		$is_active = array(
			'customfilter' => 'is_active',
			'db' => 'is_active',
			'formatter' => function($is_active,$row) {
				$is_active_data = array( "id" => $row['id'], "is_active" => $is_active );
				return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt"
			}
    	);

		$get_edit = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {

				$id = hash('SHA256', $id);

				return get_edit($id,'admin/category-level-2/edit'); /// $id = row_id , method path
			}
    	);

		$delete  = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_delete($id);
			}
		);

		if(DISPLAY_ORDER){
			$data_table = array_values(compact('delete_all','category','parent','display_order','is_active','get_edit','delete')) ;
		}else{
			$data_table = array_values(compact('delete_all','category','parent','is_active','get_edicategoryt','delete')) ;
		}

		$columns = array();

		foreach ($data_table as $data_key => $value) {
			$value['dt']=$data_key;
			$columns[] = $value;
		}
		error_log(json_encode($_GET));
		return json_encode(
			Datatables_ssp::simple($_GET,  $this->dbConn, $this->table, $this->primary_key, $columns,$myjoin='',$where, $order)
		);

	}

	public function remove_image($data)
	{
		$result = $this->where('id',$data)->get_all();
		foreach ($result as $key => $value)
		{
			if(file_exists('./'.$value->partner_image))
			{
				unlink('./'.$value->partner_image);
			}
		}
	}

}


/* End of file User_model.php */
