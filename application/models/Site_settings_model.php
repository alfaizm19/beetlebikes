<? defined('BASEPATH') OR exit('No direct script access allowed');

class Site_settings_model extends MY_Model
{
	public $table = 'site_settings'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	
	public function __construct()
	{
		$this->return_as = 'object';
    parent::__construct();
  }

  function get_site_by_id($id,$field){
        $this->db->select($field,'id');
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
     	return  $query->row(); 
    }
}


/* End of file User_model.php */
