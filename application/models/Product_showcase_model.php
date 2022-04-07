<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_showcase_model extends MY_Model
{
	public $table = 'product_showcase'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	
	public function __construct()
	{
		$this->return_as = 'object';
		$this->before_delete[] = 'remove_image';
		parent::__construct();
	}

	public function get_datatables()
	{
		$this->load->library('datatables_ssp');
		$where=" SHA2(product_id, 256) = '".$this->uri->segment(4)."'";
		$delete_all = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($row) {
				return get_delete_all($row);
			}
		);

		$title = array(
			'customfilter' => 'title',
			'db' => 'title',
        );

		$product_image = array(
			'customfilter' => 'image_path',
			'db' => 'image_path',
			'formatter' => function($image, $row) {
				return get_image_path($image, $width=25);
            }
        );


		$get_edit = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				$id = hash('SHA256', $id);
				return get_edit($id,'admin/product_showcase/edit/'.$this->uri->segment(4)); /// $id = row_id , method path 
			}
		);

		$delete  = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_delete($id);
			}
		);

		function get_default_image($default_image){
			$Yes_no = explode("#", $default_image);

			if ($Yes_no[0] == 1) {
				return "<div class='text-center' id='default_image" . $Yes_no[1] . "'><span class='fa fa-fw fa-check'></span></div>";
			} else {
				return "";
			}
		}
		
		$data_table = array_values(compact('delete_all', 'title', 'product_image','get_edit','delete'));
		
		$columns = array();

		foreach ($data_table as $data_key => $value) {
			$value['dt']=$data_key;
			$columns[] = $value; 
		}

		return json_encode(
			Datatables_ssp::simple($_GET,  $this->dbConn, $this->table, $this->primary_key, $columns,$myjoin='',$where)
		);

	}
	
	public function remove_image($data) {
		$result = $this->where('id', $data)->get_all();
		foreach ($result as $key => $value) {
			if (!empty($value->image_path)) {
				if (file_exists('./' . $value->image_path)) {
					unlink('./' . $value->image_path);
				}
			}
		}
	}
	public function bulk_delete($ids) {
		$this->db->where_in($this->primary_key, $ids);
		return $this->db->delete($this->table);
	}

}


/* End of file Enquiry_model.php */
?>