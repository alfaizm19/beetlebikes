<? defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends MY_Model
{
	public $table = 'page'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key

	public function __construct()
	{
    $this->return_as = 'object';
    parent::__construct();
  }

  function get_datatables()
	{


		$page_name =	array(
			'customfilter' => 'page_name',
			'db' => 'page_name',
    );

		// $page_title = array(
		// 	'customfilter' => 'su_title',
		// 	'db' => 'page_title',
  //   );

    $page_view = array(
      'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_view($id,'admin/page/view'); /// $id = row_id , method path
			}
    );
		$get_edit = array(
			'customfilter' => 'id',
			'db' => 'id',
			'formatter' => function($id) {
				return get_edit($id,'admin/page/edit'); /// $id = row_id , method path
			}
    );

    $data_table = array_values(compact('page_name','page_view','get_edit')) ;

    $columns = array();

		foreach ($data_table as $data_key => $value) {
			$value['dt']=$data_key;
			$columns[] = $value;
		}

		return json_encode(
			Datatables_ssp::simple($_GET, $this->dbConn, $this->table, $this->primary_key, $columns,$myjoin='',$where='')
		);

	}

	public function getAllPages()
	{
		$this->db->select('*');
		$this->db->from('page');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file User_model.php */
?>
