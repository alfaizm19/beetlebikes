<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_function_model extends MY_Model {

    private $_table;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param This is Function is allow only assoc_array() as peramitar ,
     * @param if $multipal = FALSE return a row object
     * @param if result
     * @note Dont change Key keep in mind
     * @return array() row() object
     * @author ajay
     * @use EX :--
     *
     * array('table' => 'Table_name','where' => array("is_active" => 1//Condection array),'limit' => 3,'order_by_' => array('order_field' => 'authentication_banner','order_field_type' => 'DESC'));
     *
     * */

     function get_image_extension($string) {
        $parts = explode('.', $string);
        $last = array_pop($parts);
        return $last;
    }

    function GetValue($table,$field,$where,$condition) //Get field value in the database//
	{
		$this->db->select($field);
		$this->db->where($where,$condition);
		$querycat = $this->db->get($table);
		foreach ($querycat->result() as $row)
	   	{
		  return $row->$field;
	   	}
        }

    public function getResult(array $array, $result = TRUE, $multipal = TRUE) {
        if (!is_array($array)) {
            show_error('This method accept only <b>array</b>', "405", '405 Method Not Allowed');
            return FALSE;
        }
        extract($array);
        if (isset($table)) {
            $this->_table = $table;
        }
        if (isset($join_table)) {
            $this->db->join($join_table, $join_on, 'inner');
        }
        if (isset($field)) {
            $this->db->select($field, FALSE);
        }
        if (isset($limit)) {
            $this->db->limit($limit);
        }
        if (isset($order_by)) {
            if (count($array) !== count($array, COUNT_RECURSIVE)) {
                $this->db->order_by($order_by['order_field'], $order_by['order_field_type']);
            } else {
                foreach ($order_by as $key => $order_by_value) {
                    $this->db->order_by($order_by_value['order_field'], $order_by_value['order_field_type']);
                }
            }
        }
        if (isset($where)) {
            $query = $this->db->get_where($this->_table, $where);
        } else {
            $query = $this->db->get($this->_table);
        }
        if ($query->num_rows() > 0) {
            if ($multipal === TRUE) {
                if ($result === TRUE) {
                    return $query->result();
                } else {
                    return $query->result_array();
                }
            } else {
                return $query->row();
            }
        } else {
            return FALSE;
        }
    }

    // this is to get filed value in database
    function CountByTable($table, $where = array()) {
        (!empty($where)) ? $this->db->where($table) : '';
        $query = $this->db->get($table);
        return $query->num_rows();
    }
    function CountByTableData($table, $where) {

            $qry = 'SELECT * FROM `' . $table . '` ' . $where . '';
            $query = $this->db->query($qry);
            return $query->num_rows();

    }

    public function add_to_cart($table,$data){
        return $this->db->insert($table,$data);
    }

    public function check_to_cart($user_id){
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('cart');
        return $result->result_array();
    }

    function total_count_byid($table, $id, $field) {
        $this->db->where($field, $id)->get($table);
        $total_sold = $this->db->count_all_results();
        if ($total_sold > 0) {
            return $total_sold;
        }
        return 0;
    }
    function file_newname($path, $filename) {

        if ($pos = strrpos($filename, '.')) {
            $name = substr($filename, 0, $pos);
            $ext = substr($filename, $pos);
        } else {
            $name = $filename;
        }
        $newpath = $path . '/' . $filename;
        $newname = $filename;
        $counter = 1;
        while (file_exists($newpath)) {
            $newname = $name . '_' . $counter . $ext;
            $newpath = $path . '/' . $newname;
            $counter++;
        }

        return $newname;
    }
    function closetags($html) {
        preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        for ($i = 0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= '</' . $openedtags[$i] . '>';
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }
        return $html;
    }

    function get_inner_banner($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('inner_banner');
        return $query->row();
    }

//    this code Instagram api
    public function instagram_images() {
        $instagram_data = file_get_contents("https://api.instagram.com/v1/users/" . USER_ID . "/media/recent/?access_token=" . ACCESS_TOKEN . "&count=8");

        $x_instagram_data = json_decode($instagram_data);

        return $x_instagram_data;
    }

    public function promo_code($length){
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = "";
         for ($i = 0; $i < $length; $i++) {
        $code .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $code;
    }

    public function get_class_type(){
        $this->db->select('*');
        $query = $this->db->get('class_type');
        return $query->result();
    }

     function GetshortString($str, $len) {
        if (strlen($str) > $len) {
            $stringval = $this->common->closetags(substr(strip_tags($str,''), 0, $len));
            $stringval = substr($stringval, 0, $len) . "...";
        } else {
            $stringval = $str;
        }
        return $stringval;
    }

      function CountByTable_($table, $where) {
        $qry = 'SELECT * FROM `' . $table . '` ' . $where . '';
        $query = $this->db->query($qry);
        return $query->num_rows();
    }
     function insert_record($tblName, $data) {  // this is to insert record in database
        $query = $this->db->insert($tblName, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function update_record ($fieldName,$id,$tblName,$data){  // this is to Update record in database

        $this->db->where($fieldName, $id);
        $this->db->update($tblName, $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function total_search_rows($word){
        // $this->db->join('brand', 'brand.id = product.brand_id', 'left');
        // $this->db->join('category', 'category.id = product.category_id', 'left');
        foreach ($word as $key => $data) {
            $this->db->where("(product.product_name LIKE '%".$data."%' OR product.description LIKE '%".$data."%' OR product.key_words LIKE '%".$data."%')", NULL, FALSE);
        }
        // $this->db->where('brand.is_active', 1);
        // $this->db->where('category.is_active', 1);
        $this->db->where('product.is_active', 1);
        $this->db->where('product_country_details.country_id', country_id);
        $this->db->where('product_country_details.product_id = product.id');
        // $this->db->where('product_country_details.country_id', country_id);
        $result = $this->db->get("product, product_country_details");
        return $result->num_rows();
    }

    public function search_by_word($word,$start,$limit){
        $this->db->select("product.*");
        // $this->db->join('brand', 'brand.id = product.brand_id', 'left');
        // $this->db->join('category', 'category.id = product.category_id', 'left');
        foreach ($word as $key => $data) {
            $this->db->where("(product.product_name LIKE '%".$data."%' OR product.description LIKE '%".$data."%' OR product.key_words LIKE '%".$data."%')", NULL, FALSE);
        }
        // $this->db->where('brand.is_active', 1);
        // $this->db->where('category.is_active', 1);
        $this->db->where('product.is_active', 1);
        $this->db->where('product_country_details.country_id', country_id);
        $this->db->where('product_country_details.product_id = product.id');
        $this->db->limit($limit, $start);
        $result = $this->db->get("product, product_country_details");
        return $result->result_array();
    }

    // Model created by Alfaiz 18-06-2020
    public function checkProductInCart($tempId, $productId)
    {
        return $this->db->get_where('cart', array(
            'temp_cart_id' => $tempId,
            'product_id' => $productId
        ))->num_rows();
    }

    public function updateCart($table,$tempCartId, $id)
    {
        $data = $this->db->get_where($table, array(
            'temp_cart_id' => $tempCartId,
            'product_id' => $id
        ))->result_array();

        if (!empty($data))
        {
            $quantity = $data[0]["quantity"]+1;
            $price = $data[0]["price"];

            $total = $quantity * $price;

            $this->db->where(array(
                'temp_cart_id' => $tempCartId,
                'product_id' => $id
            ));
            return $this->db->update($table, array(
                'quantity' => $quantity,
                'total_price' => $total
            ));
        }
        else
        {
            return false;
        }
        //return $this->db->query("UPDATE ".$table." SET quantity = quantity + 1 WHERE temp_cart_id = '".$tempCartId."' AND product_id = ".$id." ");
    }

    public function countCartItem($tempCartId)
    {
        return $this->db->get_where('cart', array(
            'temp_cart_id' => $tempCartId,
        ))->num_rows();
    }

    public function getCartData($tempCartId)
    {
        return $this->db->get_where('cart', array(
            'temp_cart_id' => $tempCartId,
        ))->result_array();
    }
}

?>
