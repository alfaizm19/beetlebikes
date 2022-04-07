<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends MY_Model {

    public $table = 'reviews'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        // $this->before_delete[] = 'remove_image';
        parent::__construct();
    }

    public function getCountry() {
        $this->db->order_by('nicename', 'asc');
        return $this->db->get('country')->result_object();
    }

    function get_datatables($pId) {
        $this->load->library('datatables_ssp');
        $this->load->helper('text');

        $table = 'reviews'; // you MUST mention the table name
        $primary_key = 'reviews.id';
        $where = " product_id = ".$pId." AND 1=1 ";


        //Datatables_ssp::$extra_columns = 'created_at';

        $delete_all = array(
            'customfilter' => 'reviews.id',
            'db' => 'reviews.id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $name = array(
            'customfilter' => 'customer_name',
            'db' => 'customer_name',
        );

        $rating = array(
            'customfilter' => 'rating',
            'db' => 'rating',
        );

        $display_order = array(
            'customfilter' => 'display_order',
            'db' => 'display_order',
            'formatter' => function($display_order, $row) {
                $display_order_data = array("id" => $row['id'], "display_order" => $display_order);
                return get_display_order($display_order_data);
            }
        );

        $is_active = array(
            'customfilter' => 'is_active',
            'db' => 'is_active',
            'formatter' => function($is_active, $row) {
                $is_active_data = array("id" => $row['id'], "is_active" => $is_active);
                return is_active($is_active_data); // $is_active = CONCAT string ,default method ="eidt" 
            }
        );

        $get_edit = array(
            'customfilter' => 'reviews.id',
            'db' => 'reviews.id',
            'formatter' => function($id) {
                $hash = hash('SHA256', $id);
                return get_edit($hash, 'admin/reviews/edit'); /// $id = row_id , method path 
            }
        );

        $delete = array(
            'customfilter' => 'reviews.id',
            'db' => 'reviews.id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('delete_all', 'name','rating', 'display_order', 'is_active', 'get_edit', 'delete'));
        } else {
            $data_table = array_values(compact('delete_all', 'name','rating', 'display_order', 'is_active', 'get_edit', 'delete'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }

        return json_encode(
                Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, $myjoin='', $where)
        );
    }

    public function bulk_delete($ids) {
        $this->db->where_in($this->primary_key, $ids);
        return $this->db->delete($this->table);
    }

    public function get_all_review_front() {
        $this->db->select('*');
        $this->db->where('is_active', '1');
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
	
	 public function get_all_testimonial($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

}

/* End of file User_model.php */
