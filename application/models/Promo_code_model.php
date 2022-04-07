<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_code_model extends MY_Model {

    public $table = 'promo_code'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key

    public function __construct() {
        $this->return_as = 'object';
        $this->before_delete[] = 'remove_image';
        parent::__construct();
    }

    public function get_datatables() {
        $this->load->library('datatables_ssp');
        $this->load->helper('text');

        $table = 'promo_code'; // you MUST mention the table name
        $primary_key = 'id';
        $myjoin = "";
        $where = "1=1";

        //Datatables_ssp::$extra_columns = 'created_at';

        $delete_all = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($row) {
                return get_delete_all($row);
            }
        );

        $promo_title = array(
            'customfilter' => 'promo_title',
            'db' => 'promo_title',
        );

        $promo_code = array(
            'customfilter' => 'promo_code',
            'db' => 'promo_code',
        );

        $discountType = array(
            'customfilter' => 'discount_type',
            'db' => 'discount_type',
            'formatter' => function($discount_type, $row) {
                if ($discount_type == 1) {
                    return "Percentage";
                } else {
                    return "Flat";
                }
            }
        );

        $discount = array(
            'customfilter' => 'discount',
            'db' => 'discount',
            'formatter' => function($discount, $row) {
                return check_num($discount);
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
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($id) {
                $id = hash('SHA256', $id);
                return get_edit($id, 'admin/promo-code/edit'); /// $id = row_id , method path
            }
        );

        $delete = array(
            'customfilter' => 'id',
            'db' => 'id',
            'formatter' => function($id) {
                return get_delete($id);
            }
        );

        if (DISPLAY_ORDER) {
            $data_table = array_values(compact('delete_all', 'promo_title', 'promo_code', 'discountType', 'discount', 'is_active', 'get_edit', 'delete'));
        } else {
            $data_table = array_values(compact('delete_all', 'promo_title', 'promo_code', 'discountType', 'discount', 'is_active', 'get_edit', 'delete'));
        }

        $columns = array();

        foreach ($data_table as $data_key => $value) {
            $value['dt'] = $data_key;
            $columns[] = $value;
        }

        return json_encode(
                Datatables_ssp::simple($_GET, $this->dbConn, $table, $primary_key, $columns, $myjoin, $where, 'order by id desc')
        );
    }

    public function remove_image($data) {

        $this->db->where_in('id', $data);
        $result_data = $this->db->get('promo_code');
        if ($result_data->num_rows() > 0) {
            foreach ($result_data->result_array() as $key => $val) {

                if (file_exists('./' . $val['image']) && $val['image'] != '') {
                    unlink('./' . $val['image']);
                }
                if (file_exists('./' . $val['banner_image']) && $val['banner_image'] != '') {
                    unlink('./' . $val['banner_image']);
                }
            }
        }
    }

    public function get_category() {
        return $this->db->get_where('category', array(
            'parent' => 0,
            'is_active' => 1
        ))->result_object();
    }

    public function get_sub_category($category) {
        return $this->db->get_where('category', array(
            'parent' => $category,
            'is_active' => 1
        ))->result_object();
    }

    public function get_exclusion_sku($sku) {
        $options = '';

        if (!empty($sku)) {
            
            $skus = explode(',', $sku);

            foreach ($skus as $sku) {
                $data = $this->select('id,sku_code')
                ->db->get_where('product', array(
                    'id' => $sku,
                    'is_active' => 1
                ))->row();

                if (!empty($data)) {
                    $options .= '<option selected value="'.$data->id.'">'.$data->sku_code.'</option>';
                }
            }

        }

        return $options;
    }

    public function get_inclusion_product($product) {
        $options = '';

        if (!empty($product)) {
            
            $products = explode(',', $product);

            foreach ($products as $prod) {
                $data = $this->select('id,sku_code,product_name')
                ->db->get_where('product', array(
                    'id' => $prod,
                    'is_active' => 1
                ))->row();

                if (!empty($data)) {
                    $options .= '<option selected value="'.$data->id.'">'.$data->product_name.'</option>';
                }
            }
        }

        return $options;
    }    

}

/* End of file User_model.php */
