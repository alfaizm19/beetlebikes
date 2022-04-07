<? defined('BASEPATH') OR exit('No direct script access allowed');

class Abandoned_enquiry_model extends MY_Model
{
	public $table = 'cart'; // you MUST mention the table name
	public $primary_key = 'cart.id'; // you MUST mention the primary key
	
	public function __construct() {
		$this->return_as = 'object';
		//$this->before_delete[] = 'remove_image';
    	parent::__construct();
    }

    public function getData($userId) {
    	$query = 'SELECT cart.quantity, product.* FROM cart
		INNER JOIN product ON cart.product_id = product.id
		WHERE cart.user_id = '.$userId;

		return $this->db->query($query)->result_object();
    }

  	function get_datatables() {
		
		$where = 'cart.user_id IS NOT NULL GROUP BY cart.user_id';
		$myjoin = 'INNER JOIN user ON cart.user_id = user.id';

		$delete_all = array(
			'customfilter' => 'cart.user_id',
			'db' => 'cart.user_id',
			'formatter' => function($row) {
				return get_delete_all($row);
			}
		);

		$first_name =	array(
			'customfilter' => 'first_name',
			'db' => 'first_name',
		);

		$last_name =	array(
			'customfilter' => 'last_name',
			'db' => 'last_name	',
		);
		
		$email = array(
			'customfilter' => 'user.email',
			'db' => 'user.email',
		);

		$phone= array(
			'customfilter' => 'phone_number',
			'db' => 'phone_number',
		);

		$total= array(
			'customfilter' => 'phone_number',
			'db' => 'phone_number',
			'formatter' => function( $id, $row ) {
				return $this->db->get_where('cart', array(
					'user_id' => $row['user_id']
				))->num_rows();
			}
		);

		$view = array(
			'customfilter' => 'cart.user_id',
			'db' => 'cart.user_id',
			'formatter' => function( $id, $row ) {
				return get_view($id,'admin/abandoned_enquiry/view_cart_data');
			}
		);

		$delete  = array(
			'customfilter' => 'cart.user_id',
			'db' => 'cart.user_id',
			'formatter' => function($id) {
				return get_delete($id);
			}
		);
    	
    	$data_table = array_values(compact('delete_all','first_name', 'last_name','email','phone','total','view','delete'));
		
		$columns = array();

		foreach ($data_table as $data_key => $value) {
			$value['dt']=$data_key;
			$columns[] = $value; 
		}

		return json_encode(
			Datatables_ssp::simple($_GET, $this->dbConn, $this->table, $this->primary_key, $columns, $myjoin, $where)
		);

	}

}


/* End of file Enquiry_model.php */
?>