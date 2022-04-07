<?

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $the_view = '';
    protected $data1 = array();
    protected $template;

    public function __construct() {

        parent::__construct();
		//$this->render('vwIndex');
		    $this->load->model('Common_function_model', 'common');
        $this->load->model('Site_settings_model', 'siteSettings');
        $this->data['is_CKEditor'] = FALSE;
        $this->data['is_GRID'] = TRUE;
        $this->load->model('Site_settings_model', 'setting');
        $this->data['setting'] = $this->setting->get(1); /* Get a site setting */
        $this->load->model('Product_model', 'product');
    		$this->data['menus']=$this->product->get_all_products_menu();
        $this->data['siteSettings'] = $this->siteSettings->get_site_by_id(1,'*');
        $this->autologin();

        $this->data['totalItem']=0;
        $this->data['totalAmount']=0;
        $product_data = array();

        if($this->session->userdata('f_id'))
        {
            $product_data = $this->common->check_to_cart($this->session->userdata('f_id'));

        }
        else
        {
             if(isset($_COOKIE['cart_items']))
             {
                 $product_data = unserialize($_COOKIE['cart_items']);
             }
        }

                $total_cost=0;
                 $gran_total=0;
                 if($product_data!="")
                 {
                 foreach ($product_data as $product)
                 {

                    $total_cost = $product['price']* $product['quantity'];
                    /* $total_cost = $product['shipping_cost'];

                     $total_cost = $product['price']* $product['quantity'];
                     if($total_cost < 300)
                     {
                          $total_cost =  $total_cost+$product['shipping_cost'];
                     }*/
                     $gran_total= $gran_total+$total_cost; //($total_cost*1.05);

                 }
                 }


        $this->data['totalAmount'] =$gran_total;
        $this->data['totalItem'] =  count($product_data);

        //$this->data['recaptcha'] = $this->recaptcha->getWidget();
        //$this->data['recaptcha_script'] = $this->recaptcha->getScriptTag();

    }

    protected function render($the_view = NULL, $template = 'front_master') {

		// if ($the_view == "vwHome")
		// {
		// $template="index_master";
		// }
		if ($template == 'json' || $this->input->is_ajax_request())
		{ 
            $this->output->set_content_type("application/json")->set_status_header(200)->set_output($this->data);
        } elseif (is_null($template)) {
            $this->load->view($the_view, $this->data);
        } else {
            $this->data['view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }

    /** set a page title */
    public function setPageTitle($page_title) {
        $this->data['page_title'] = $page_title;
    }
//  protected function getSql()
//  {
//    return $sql_details = array(
//      'user' => $this->db->username,
//      'pass' => $this->db->password,
//      'db' => $this->db->database,
//      'host' => $this->db->hostname
//    );
//  }

    public function autologin()
    {
      if (!$this->session->userdata('f_id')) 
      {
        $email = $this->input->cookie('user_email');
        $pass = $this->input->cookie('user_password');
        $remember_me = $this->input->cookie('remember_me');        

        if ($remember_me) 
        {
          $result = $this->db->get_where('user', array(
            'email' => $email,
            'is_active' => 1
          ))->result_object();

          if (!empty($result) && count($result)) 
          {
            $result = $result[0];

            $dbPass = $this->encryption->decrypt($result->password);

            if ($dbPass == $pass) 
            {
              $user_data = array(
                  'f_id' => $result->id,
                  'f_name' => $result->first_name,
                  'f_email' => $result->email,
                  'f_phone_number' => $result->phone_number,
                  'f_is_login' => true
              );
              $this->session->set_userdata($user_data);
            }
          }
          
        }

      }
    }


}

class Auth_Controller extends MY_Controller {

    //protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Site_settings_model', 'setting');

        /** get iste setting */
        $this->data['setting'] = $this->setting->get(1); /* Get a site setting */

    }

    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

}

class Admin_Controller extends MY_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
       if(!$this->ion_auth->logged_in())
      {
        redirect('admin','refresh');
      }
        $this->load->library('form_validation');
        $this->load->model('Site_settings_model', 'setting');

        /** get iste setting */
        $this->data['setting'] = $this->setting->get(1); /* Get a site setting */
    }

    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

}
