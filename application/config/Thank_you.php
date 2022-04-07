<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Thank_You extends My_Controller {

    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('f_is_login')) {
        //     redirect('home');
        // }
        $this->load->model('Product_model', 'product');
    }

    public function index()
    {
      print_r($this->input);
      echo "<br><br>";
      $payload = json_decode($this->input->raw_input_stream, true);
      print_r($payload);
      die;
        $this->render('vwThankYou');
    }

        public function payment() {
        if (empty($this->input->post('transaction_id')) || empty($this->session->userdata('order_id'))) {
             redirect('home');
         }
        $transaction_id=$this->input->post('transaction_id');
        $order_id=$this->session->userdata('order_id');
        //update order status pending to completed
        $data=array(
            'transaction_id'=>$transaction_id,
            'status'=>1
        );
        $this->db->where('id', $order_id);
        $this->db->update('order', $data);
        if($this->session->userdata('f_id')){
            $clear = $this->product->emptyCartForUser($this->session->userdata('f_id'));
            $cart_items = $this->common->check_to_cart($this->session->userdata('f_id'));
            $this->data['cart_items'] = count($cart_items);
            $this->data['price'] = array_sum(array_map(function($item) {return $item['total_price']; }, $cart_items));
        }
        if(isset($_COOKIE['cart_items']) || isset($_COOKIE['price']) || isset($_COOKIE['guest']) || isset($_COOKIE['form_data'])){
            setcookie('cart_items', '', time() - 3600, "/");
            setcookie('form_data', '', time() - 3600, "/");
            setcookie('price', '', time() - 3600, "/");
            setcookie('guest', '', time() - 3600, "/");
            $clear = 1;
            $this->data['cart_items'] = 0;
            $this->data['price'] = 0.00;
        }
        $this->sendOrderEmail($order_id);
        $this->session->unset_userdata('order_id');
        return true;
    }


    //send mail
    function sendOrderEmail($order){
        $data = $this->product->getOrder($order);
        $items = $this->product->getOrderItems($order);
        $html = '';

        foreach ($items as $key => $value) {

                    if($value["product_price"] * $value["product_quantity"] < 300){
                    $shipping_cost =  "AED ".$value["product_shipping_cost"];
                    }else{
                        $shipping_cost = "FREE";
                    }
            $html.='<tr style="border-top:2pt solid black;">
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient Name :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_name"].'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient Mobile No :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_mobile_no"].'</td>
                    </tr>';
            $html.='<tr>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient Building :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_building_no"].'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient Street No :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_street"].'</td>
                    </tr>';
            $html.='<tr>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient City :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_city"].'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Recipient Shippping Note :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["recipient_shipping_note"].'</td>
                    </tr>';
            $html.='<tr>
                        <td colspan="2" style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:30%"><b>Product :</b></td>
                        <td colspan="2" style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:70%">'.$value["product_name"].'</td>
                    </tr>';
            $html.='<tr>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Price :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">AED '.$value["product_price"].'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Quantity :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["product_quantity"].'</td>
                    </tr>';
            $html.='<tr>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Shipping Cost :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$shipping_cost.'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Total Price :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">AED '.$value["product_total_price"].'</td>
                    </tr>';
            $html.='<tr>

                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Delivery Zone :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.$value["zone"].'</td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%"><b>Delivery Date :</b></td>
                        <td style="font-family:Tahoma, Arial, Helvetica, sans-serif;font-size:12px;color:#292929;text-decoration:none;line-height:16px;width:25%">'.date('d-m-Y - H:i',strtotime($value["product_delivery_date"])).'</td>
                    </tr>';
        }
        $total_cost = number_format((float)array_sum(array_map(function($item) { return $item['product_price'] * $item['product_quantity']; }, $items)), 2, '.', '');
        $delivery_amount = number_format((float)array_sum(array_map(function($item) { return $item['product_shipping_cost']; }, $items)), 2, '.', '');
        $amount_paid = number_format((float)array_sum(array_map(function($item) { return $item['product_total_price']; }, $items)), 2, '.', '');
        $vat_amount =  number_format((float)array_sum(array_map(function($item) { return (($item['product_price'] * $item['product_quantity'])+$item['product_shipping_cost'])*0.05 ; }, $items)), 2, '.', '');
        $this->load->library('custome_email', '', 'c_email');
        if($delivery_amount == "0.00"){
          $delivery_charges = "FREE";
        }else{
            $delivery_charges = "AED ".$delivery_amount;
        }
        $this->c_email->setTo($data->email)->setFrom(FROMADDRESS);
        $data_replace = array('name' => $data->name, 'email' => $data->email, 'phone' => $data->mobile, 'date' => date("F j, Y"), 'project_name' => $this->data['setting']->site_project_name, 'site_url' => base_url(), 'site_logo' => $this->data['setting']->website_frontend_logo,'total_cost' => $total_cost,'delivery_charges' => $delivery_charges, 'amount_paid' => $amount_paid, 'vat_amount' => $vat_amount,'copyright' => $this->data['setting']->site_copy_right,'order' => $html);
        $this->c_email->setMessag(13)->composeEmail($data_replace);
        if (MAIL_ENABLE) {
                    $this->c_email->sendEmail();
        }
        $this->c_email->setTo(FROMADDRESS)->setFrom(FROMADDRESS);
        $data_replaces = array('name' => $data->name, 'email' => $data->email, 'phone' => $data->mobile, 'date' => date("F j, Y"), 'project_name' => $this->data['setting']->site_project_name, 'site_url' => base_url(), 'site_logo' => $this->data['setting']->website_frontend_logo, 'total_cost' => $total_cost,'delivery_charges' => $delivery_charges, 'amount_paid' => $amount_paid,'vat_amount' => $vat_amount, 'copyright' => $this->data['setting']->site_copy_right,'order' => $html);
        $this->c_email->setMessag(12)->composeEmail($data_replaces);
        if (MAIL_ENABLE) {
                    $this->c_email->sendEmail();
        }
        return true;
    }
}

?>
