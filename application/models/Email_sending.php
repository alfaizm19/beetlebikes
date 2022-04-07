<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_sending extends CI_Model {

    public $data;

    public function __construct() {
        parent::__construct();

        $this->load->model('Site_settings_model', 'setting');
        $this->data['setting'] = $this->setting->get(1); /* Get a site setting */
    }

    public function sendContactEnquiry($data) {
        
        $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

        $template = '
            <p>Name: '.$data["name"].'</p>
            <p>Email: '.$data["email"].'</p>
            <p>City: '.$data["city"].'</p>
            <p>Phone: '.$data["phone"].'</p>
            <p>Message: '.$data["message"].'</p>
        ';

        $sendMail = $this->sendMail(array(
            'title' => 'Beetle Bikes | Contact Enquiry',
            'to' => $adminEmail,
            'subject' => 'Contact Enquiry',
            'message' => $template
        ));

        return $sendMail;
    }

    public function sendDealerEnquiry($data) {
        $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

        $template = '
            <p>Name: '.$data["name"].'</p>
            <p>Email: '.$data["email"].'</p>
            <p>City: '.$data["city"].'</p>
            <p>Phone: '.$data["phone"].'</p>
            <p>Subject: '.$data["subject"].'</p>
            <p>Store: '.$data["store"].'</p>
            <p>Message: '.$data["message"].'</p>
        ';

        $sendMail = $this->sendMail(array(
            'title' => 'Beetle Bikes | Dealer Enquiry',
            'to' => $adminEmail,
            'subject' => 'Dealer Enquiry',
            'message' => $template
        ));

        return $sendMail;
    }

    public function registerBike($data) {
        $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

        $template = '
            <p>Name: '.$data["name"].'</p>
            <p>Phone: '.$data["phone"].'</p>
            <p>Email: '.$data["email"].'</p>
            <p>Invoice Date: '.$data["invoice_date"].'</p>
            <p>Model: '.$data["model"].'</p>
            <p>Chassis No: '.$data["chassis_no"].'</p>
            <p>City: '.$data["city"].'</p>
            <p>State: '.$data["state"].'</p>
        ';

        $sendMail = $this->sendMail(array(
            'title' => 'Beetle Bikes | Register Your Bike Enquiry',
            'to' => $adminEmail,
            'subject' => 'Register Your Bike Enquiry',
            'message' => $template
        ));

        return $sendMail;
    }

    public function sendBikeCert($data) {
        $data['registerBikeData'] = $data;
        $template = $this->load->view('registerBikeCertificateUser', $data, TRUE);

        $sendMail = $this->sendMail(array(
            'title' => 'Beetle Bikes | Warranty Certificate',
            'to' => $this->input->post('email'),
            'subject' => 'Warranty Certificate',
            'message' => $template
        ));

        return $sendMail;
    }

	public function register($data) {

        $param = array(
            'name' => $data['name']
        );

		$template = $this->load->view('email-temp/vwUserRegister', $param, TRUE);

        if (MAIL_ENABLE) {

        	$adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
            	'title' => 'Beetle Bikes | New User Registration',
            	'to' => $data['email'],
            	'subject' => 'Registration',
            	'message' => $template
            ));

            $sendMail = $this->sendMail(array(
            	'title' => 'Beetle Bikes | New User Registration',
            	'to' => $adminEmail,
            	'subject' => 'Registration',
            	'message' => $template
            ));

            return $sendMail;
        } else {
        	return false;
        }
	}

    public function order($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrder', $param, TRUE);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order',
                'to' => $orderInfo->billing_email,
                'subject' => 'Order Confirmation',
                'message' => $template
            ));

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Recieved',
                'to' => $adminEmail,
                'subject' => 'Order Recieved',
                'message' => $template
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function invoice($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();

        $template = $this->Master_model->createInvoiceForEmail($orderId);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Invoice - '.$orderInfo->custom_orderid,
                'to' => $orderInfo->billing_email,
                'subject' => 'Order Invoice',
                'message' => $template
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function orderDispatch($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrderDispatch', $param, TRUE);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Shipment Dispatched',
                'to' => $orderInfo->billing_email,
                'subject' => 'Shipment Dispatched',
                'message' => $template
            ));

            // $sendMail = $this->sendMail(array(
            //     'title' => 'Beetle Bikes | Order Recieved',
            //     'to' => $adminEmail,
            //     'subject' => 'Order Recieved',
            //     'message' => $template
            // ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function orderDelivered($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrderDelivered', $param, TRUE);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Delivered',
                'to' => $orderInfo->billing_email,
                'subject' => 'Order Confirm',
                'message' => $template
            ));

            // $sendMail = $this->sendMail(array(
            //     'title' => 'Beetle Bikes | Order Delivered',
            //     'to' => $adminEmail,
            //     'subject' => 'Order Recieved',
            //     'message' => $template
            // ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function orderReview($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrderReview', $param, TRUE);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Product Review',
                'to' => $orderInfo->billing_email,
                'subject' => 'Product Review',
                'message' => $template
            ));

            // $sendMail = $this->sendMail(array(
            //     'title' => 'Beetle Bikes | Order Delivered',
            //     'to' => $adminEmail,
            //     'subject' => 'Order Recieved',
            //     'message' => $template
            // ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function orderCancelByAdmin($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrderCancelByAdmin', $param, TRUE);        

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Cancel',
                'to' => $orderInfo->billing_email,
                'subject' => 'Order Cancel',
                'message' => $template
            ));

            // $sendMail = $this->sendMail(array(
            //     'title' => 'Beetle Bikes | Order Recieved',
            //     'to' => $adminEmail,
            //     'subject' => 'Order Recieved',
            //     'message' => $template
            // ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function orderCancelByCustomer($orderId) {

        $orderInfo = $this->db->get_where('orders', array('id' => $orderId))->row();
        $orderDetails = $this->db->query("SELECT a.*, b.product_name, b.image_path FROM order_item as a
        INNER JOIN product as b ON a.product_id = b.id
        WHERE a.order_id = ".$orderId)->result_object();

        $param = array(
            'orderInfo' => $orderInfo,
            'orderDetails' => $orderDetails
        );

        $template = $this->load->view('email-temp/vwOrderCancelByCustomer', $param, TRUE);

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Cancel',
                'to' => $orderInfo->billing_email,
                'subject' => 'Order Cancel',
                'message' => $template
            ));

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Order Cancel',
                'to' => $adminEmail,
                'subject' => 'Order Cancel',
                'message' => $template
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function product($info) {
        $getProductTemplate = $this->db->get_where('email_template', array('id' => 13))->row('email_template_description');

        $dataReplace = array(
            '%%site_logo%%' => $this->data['setting']->website_admin_logo,
            '%%site_url%%' => base_url(),
            '%%date%%' => date("F j, Y"),
            '%%orderid%%' => $info['orderid'],
            '%%order%%' => $info['order'],
            '%%name%%' => $info['name'],
            '%%email%%' => $info['email'],
            '%%phone%%' => $info['phone'],
            '%%curr%%' => strtoupper($info['curr']),
            '%%sub_total%%' => $info['sub_total'],
            '%%shipping%%' => $info['shipping'],
            '%%discount%%' => number_format($info['discount'],2,'.', ''),
            '%%wallet%%' => number_format($info['wallet'],2,'.', ''),
            '%%paid_amount%%' => number_format($info['paid_amount'],2,'.',''),
            '%%copyright%%' => $this->data['setting']->site_copy_right
        );

        foreach ($dataReplace as $key => $value) {
            $getProductTemplate = str_replace($key, $value, $getProductTemplate);
        }

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => $adminEmail,
                'to' => $info['email'],
                'subject' => 'Beetle Bikes | Placed Order',
                'message' => $getProductTemplate
            ));

            $sendMail2 = $this->sendMail(array(
                'title' => $info['email'],
                'to' => $adminEmail,
                'subject' => 'Beetle Bikes | Admin Placed Order',
                'message' => $getProductTemplate
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function abandoned_cart($info) {
        $getProductTemplate = $this->db->get_where('email_template', array('id' => 26))->row('email_template_description');

        $dataReplace = array(
            '%%site_logo%%' => $this->data['setting']->website_admin_logo,
            '%%site_url%%' => base_url(),
            '%%date%%' => date("F j, Y"),
            '%%order%%' => $info['order'],
            '%%customer_name%%' => $info['customer_name'],
            '%%copyright%%' => $this->data['setting']->site_copy_right
        );

        foreach ($dataReplace as $key => $value) {
            $getProductTemplate = str_replace($key, $value, $getProductTemplate);
        }

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => $adminEmail,
                'to' => $info['to'],
                'subject' => 'Abandoned cart',
                'message' => $getProductTemplate
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function contact() {

        $getTemplate = $this->db->get_where('email_template', array('id' => 21))->row('email_template_description');

        $dataReplace = array(
            '%%site_logo%%' => $this->data['setting']->website_admin_logo,
            '%%site_url%%' => base_url(),
            '%%date%%' => date("F j, Y"),
            '%%name%%' => $this->input->post('name'),
            '%%email%%' => $this->input->post('email'),
            '%%phone%%' => $this->input->post('phone'),
            '%%message%%' => $this->input->post('message'),
            '%%copyright%%' => $this->data['setting']->site_copy_right
        );

        foreach ($dataReplace as $key => $value) {
            $getTemplate = str_replace($key, $value, $getTemplate);
        }

        if (MAIL_ENABLE) {
            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Contact Enquiry',
                'to' => $adminEmail,
                'subject' => 'Contact Enquiry',
                'message' => $getTemplate
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

	public function forgot($data, $token) {

		$getTemplate = $this->db->get_where('email_template', array('id' => 19))->row('email_template_description');

		$dataReplace = array(
            '%%site_logo%%' => $this->data['setting']->website_admin_logo,
            '%%site_url%%' => base_url(),
            '%%date%%' => date("F j, Y"),
            '%%fname%%' => $data->first_name,
            '%%project_name%%' => 'Beetle Bikes',
            '%%uid%%' => base_url('reset-password/'.$token),
            '%%copyright%%' => $this->data['setting']->site_copy_right
        );

        foreach ($dataReplace as $key => $value) {
            $getTemplate = str_replace($key, $value, $getTemplate);
        }        

        if (MAIL_ENABLE) {

        	$adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
            	'title' => 'Beetle Bikes | Forgot Passowrd',
            	'to' => $data->email,
            	'subject' => 'Forgot Passowrd',
            	'message' => $getTemplate
            ));

            return $sendMail;
        } else {
        	return false;
        }
	}

    public function admin_forgot($data, $token) {

        $getTemplate = $this->db->get_where('email_template', array('id' => 19))->row('email_template_description');

        $dataReplace = array(
            '%%site_logo%%' => $this->data['setting']->website_admin_logo,
            '%%site_url%%' => base_url(),
            '%%date%%' => date("F j, Y"),
            '%%fname%%' => $data->first_name,
            '%%project_name%%' => 'Beetle Bikes',
            '%%uid%%' => base_url('admin/reset-password/'.$token),
            '%%copyright%%' => $this->data['setting']->site_copy_right
        );

        foreach ($dataReplace as $key => $value) {
            $getTemplate = str_replace($key, $value, $getTemplate);
        }        

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'Beetle Bikes | Forgot Passowrd',
                'to' => $data->email,
                'subject' => 'Forgot Passowrd',
                'message' => $getTemplate
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

    public function send_admin_otp($data) {

        $getTemplate = 'This is your OTP %%otp%% for login MMTC-PAMP admin dashboard';

        $dataReplace = array(
            '%%otp%%' => $data['otp']
        );

        foreach ($dataReplace as $key => $value) {
            $getTemplate = str_replace($key, $value, $getTemplate);
        }        

        if (MAIL_ENABLE) {

            $adminEmail = $this->db->get_where('site_settings')->row('admin_mailing_address');

            $sendMail = $this->sendMail(array(
                'title' => 'MMTC-PAMP | OTP',
                'to' => $data['email'],
                'subject' => 'Admin Login OTP',
                'message' => $getTemplate
            ));

            return $sendMail;
        } else {
            return false;
        }
    }

	public function sendMail($info = '') {
		require_once 'assets/mail/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               

		$mail->isSMTP();                                      
		$mail->Host = $this->config->item('mail_smtp_host');  
		$mail->SMTPAuth = true;                               
		$mail->Username = $this->config->item('mail_user_name');
		$mail->Password = $this->config->item('mail_password'); 
		$mail->SMTPSecure = 'ssl';
		$mail->Port = $this->config->item('mail_smtp_port');

		$mail->setFrom(FROMADDRESS, $info['title']);
		$mail->addAddress($info['to']);
		// $mail->addAddress('ellen@example.com');         
		// $mail->addReplyTo('info@example.com', 'Information');

		if (isset($info['cc']) && !empty($info['cc'])) {
			$mail->addCC($info['cc']);
		}

        if (isset($info['output']) && !empty($info['output'])) {
            $filename = $info['file_name'];
            $encoding = 'base64';
            $type = 'application/pdf';
            $mail->AddStringAttachment($info['output'],$filename,$encoding,$type);
        }

        // echo "<pre>";
        // print_r($mail);
        // die();
		// $mail->addBCC('bcc@example.com');

		// $mail->addAttachment('/var/tmp/file.tar.gz');     
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
		$mail->isHTML(true);                                 

		$mail->Subject = $info['subject'];
		$mail->Body    = $info['message'];
		// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    //echo 'Message could not be sent.';
		    //echo 'Mailer Error: ' . $mail->ErrorInfo;
		    return false;
		} 
		else 
		{
		    return true;
		}
	}

}

/* End of file Email_sending.php */
/* Location: ./application/models/Email_sending.php */