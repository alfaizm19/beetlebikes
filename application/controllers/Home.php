<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Product_model','product_model');
      	$this->load->helper('common_helper');
    }
    
	public function index()
	{
		$this->load->model('front/Product_model','product_model');
		/*$data["cart_data"] = $this->product_model->cart_data();		
		$data["wishlist_data"] = $this->product_model->wishlist_data();		*/
		
		$data["homeFeature"] = $this->product_model->homeFeature();
		$data["homeProducts"] = $this->product_model->homeProducts();
		$data["homeAccessories"] = $this->product_model->homeAccessories();
		$data["homeSpares"] = $this->product_model->homeSpares();

		$data['middleContent']   = 'front/home';
        $data['pageTitle']       = 'Home';

        $data['meta_title']       = 'Beetle Bikes - Premium kids bike, Made in India';
        $data['meta_description']       = 'Buy Online Kids Bikes here at Beetle Bikes . Choose from our wide range of Kids Bikes and Accessories with Free Home delivery .';

        $this->load->view('front/template',$data);
	}

	public function forgotPassword() {
		$data['middleContent']   = 'front/forgotPassword';
        $data['pageTitle']       = 'Forgot Password';
        $this->load->view('front/template',$data);
	}

	public function resetPassword() {

		$resetPassSess = $this->session->userdata('resetPassword');

		if (!empty($resetPassSess)) {
			
			//check if time expired
			$expireTime = $resetPassSess['expire_time'];
			$currentTime = date('H:i');

			if (strtotime($currentTime) <= strtotime($expireTime)) {
				
				$data['middleContent']   = 'front/resetPassword';
		        $data['pageTitle']       = 'Reset Password';
		        $this->load->view('front/template',$data);

			} else {
				$this->session->unset_userdata('resetPassword');
				redirect(base_url(),'refresh');
			}


		} else {
			redirect(base_url(),'refresh');
		}
	}

	public function about()
	{
		$data['middleContent']   = 'front/about';
        $data['pageTitle']       = 'About';
        $this->load->view('front/template',$data);
	}

	public function contact()
	{
		$data['middleContent']   = 'front/contact';
        $data['pageTitle']       = 'Contact';
        $this->load->view('front/template',$data);
	}

	public function registerBikeSuccess()
	{
		//$data['callMethodPdf']   = $this;
		$data['middleContent']   = 'front/registerBikeSuccess';
        $data['pageTitle']       = 'Register Bike Success';
        $this->load->view('front/template',$data);
	}

	public function registerBikePdf() {
		
		$data['registerBikeData'] = $this->session->userdata('registerBikeDataPdf');		

		if (empty($data['registerBikeData'])) {
			redirect(base_url(),'refresh');
			die();
		}

		$this->load->view('registerBikeCertificate', $data);

		$this->session->unset_userdata('registerBikeDataPdf');
	}

	public function registerBikePdf_10112021(){

		// $data['registerBikeData'] = $this->session->flashdata('registerBikeDataPdf');

		$data['registerBikeData'] = $this->session->userdata('registerBikeDataPdf');

		if (empty($data['registerBikeData'])) {
			redirect(base_url(),'refresh');
			die();
		}

    	$this->load->library('Pdf');     
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	   //============================================================

        /*------------------------Generate Pdf-------------------------*/
        //ob_start(); 
     	/*------------------------Generate Pdf-------------------------*/
       
        $this->load->library('Pdf');     

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        // Set Title
        $pdf->SetTitle('WARRANTY CERTIFICATE | Beetle');
        // Set Header Margin
        $pdf->SetHeaderMargin(30);
        // Set Top Margin
        $pdf->SetTopMargin(20);
        // set Footer Margin
        $pdf->setFooterMargin(20);
        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true);
        // Set Author
        $pdf->SetAuthor('pakainfo');
        // Set Display Mode
        $pdf->SetDisplayMode('real', 'default');
        
        // add a page
        $pdf->SetPrintHeader(false);        
        $pdf->AddPage();
        $image = base_url('img/warranty-icon.png');
        
		// Page 1 Desinger
		$htmlData   =   '<html><head>';
		$htmlData   =  '<style>
                table strong{
            padding-right: 2rem;
		        }
		        a{
		            color:blue;
		            font-weight: bold;
		            text-decoration: none;
		        }
		        .certificate{
		            width: 770px;
		            min-height: 586px;
		            border:3px solid;
		            backgroung-image:url($image)
		            background-size: contain;
		            background-position: center;
		            background-repeat: no-repeat;
		            background-color:#bcddc5;
		            margin:auto; 
		            -webkit-print-color-adjust: exact;
		        }
		        .logo{
		            margin:auto;
		            text-align:center;
		        }
		        .mainp{
		            font-size:15px;
		            text-align:center
		        }
		        .contt{
		            margin-left: auto; 
		  margin-right: auto;
		        }
		        .content5e{
		            margin: 48px 32px 32px 32px;
		        }
		        @page  {
		          margin: 5mm;
		          size: 8in 6.3in;
		      }
		                </style>';

		        $htmlData   .=  '</head><body>';
		        $htmlData   .=  ' <div class="certificate"><div class="content5e"><img class="logo" src="'.base_url("img/logo/logo.png").'"><h2 style="text-align: center;">WARRANTY CERTIFICATE</h2>
		        <p class="mainp">This Warranty Certificate covers the Beetle Bike with the above details for a period of 18 months from date of purchase. </p><div>
		         <table class="contt"><tr><td><strong>Customer Name:</strong></td><td>'.$data['registerBikeData']['name'].'</td></tr><tr><td><strong>Model Name:</strong></td><td>'.$data['registerBikeData']['model'].'</td></tr><tr><td><strong>Chassis No:</strong></td><td>'.$data['registerBikeData']['chassisNo'].'</td></tr><tr><td><strong>Email:</strong></td><td>'.$data['registerBikeData']['email'].'</td></tr><tr><td><strong>Mobile:</strong></td><td>+91-'.$data['registerBikeData']['phone'].'</td></tr><tr><td><strong>Date of Purchase:</strong></td><td>'.$data['registerBikeData']['invoiceDate'].'</td></tr><tr><td><strong>City & State:</strong></td><td>'.$data['registerBikeData']['city'].' <em>,</em><span>'.$data['registerBikeData']['states'].'</span></td></tr></table></div><div style="padding-top: 1rem"><p style="text-align: center;">For warranty claims contact Beetle Bikes at <a href="support@BeetleBikes.in">support@BeetleBikes.in</a><br>For detailed warranty conditions and exclusions, refer to <a href="www.beetlebikes.in">www.BeetleBikes.in</a></p><p style="text-align: center;"> </p><small style="text-align: center; ">Correctness of data on the Warranty certificate is the customer\'s responsibility. incorrect data may lead to voiding the warranty on the bike. </small></div></div></div>';
		        $htmlData   .=  '</body></html>';

				// output the HTML content
				$pdf->writeHTML($htmlData, $image, true, false, true, false, '');   

			//ob_end_clean();
			$pdf->Output('register_bike.pdf', 'D');
			
			$this->session->set_flashdata('registerBikeSuccess','Your bike registration has been done successfully');

			$this->session->unset_userdata('registerBikeDataPdf');
			die();
	        
	}
	public function registerBike()
	{
		$this->session->unset_userdata('registerBikeDataPdf');

		$data['registerBikeError'] = $data['registerBikeData'] = [];
		if($this->input->post('registerBike'))
		{
		    $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	  		$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
	  		$this->form_validation->set_rules('invoiceDate', 'Invoice Date', 'required');
	  		$this->form_validation->set_rules('model', 'model', 'required');
	  		$this->form_validation->set_rules('chassisNo', 'Chassis No', 'required');
	  		$this->form_validation->set_rules('city', 'city', 'required');
	  		$this->form_validation->set_rules('states', 'states', 'required');

	  		if ($this->form_validation->run() === FALSE) {
	            $this->session->set_flashdata('registerBikeError', $this->form_validation->error_array());
	            $this->session->set_flashdata('registerBikeData', $_REQUEST);
	            $data['registerBikeError'] = $this->session->flashdata('registerBikeError');
                $data['registerBikeData'] = $this->session->flashdata('registerBikeData');
	        } else {
	        	//$this->session->set_flashdata('registerBikeDataPdf', $_REQUEST);

	        	$obj = array(
	        		'name' => $this->input->post('name'),
	        		'phone' => $this->input->post('phone'),
	        		'email' => $this->input->post('email'),
	        		'invoice_date' => date('Y-m-d', strtotime($this->input->post('invoiceDate'))),
	        		'model' => $this->input->post('model'),
	        		'chassis_no' => $this->input->post('chassisNo'),
	        		'city' => $this->input->post('city'),
	        		'state' => $this->input->post('states'),
	        		'is_active' => 1,
	        	);

	        	$this->db->insert('register_bike', $obj);

	        	$this->Email_sending->registerBike($obj);
	        	$this->Email_sending->sendBikeCert($obj);
	        	
	        	$this->session->set_userdata( 'registerBikeDataPdf', $_REQUEST);
	        	// redirect( base_url().'home/registerBikeSuccess', 'refresh' );
	        	redirect( base_url().'home/registerBikePdf', 'refresh' );
	        }
		}

		$data['stateList'] = $this->Master_model->states();

		$data['middleContent']   = 'front/registerBike';
        $data['pageTitle']       = 'Register Bike';
        $this->load->view('front/template',$data);
	}

	public function privacy()
	{
		$data['middleContent']   = 'front/privacy';
        $data['pageTitle']       = 'Privacy';
        $this->load->view('front/template',$data);
	}

	public function returnPolicy()
	{
		$data['middleContent']   = 'front/returnPolicy';
        $data['pageTitle']       = 'Return and Refund Policy';
        $this->load->view('front/template',$data);
	}

	public function termsAndCondition()
	{
		$data['middleContent']   = 'front/termsAndCondition';
        $data['pageTitle']       = 'Terms and Conditions';
        $this->load->view('front/template',$data);
	}

	public function dealersEnquiry()
	{
		$data['middleContent']   = 'front/dealersEnquiry';
        $data['pageTitle']       = 'Delears Enquiry';
        $this->load->view('front/template',$data);
	}

	public function media()
	{
		$data['middleContent']   = 'front/media';
        $data['pageTitle']       = 'Media';
        $this->load->view('front/template',$data);
	}

	public function faq()
	{
		$data['middleContent']   = 'front/faq';
        $data['pageTitle']       = 'Privacy';
        $this->load->view('front/template',$data);
	}
	
	public function warrantyTerms()
	{
		$data['middleContent']   = 'front/warranty-terms';
        $data['pageTitle']       = 'Privacy';
        $this->load->view('front/template',$data);
	}

	public function invoice() {
		$this->Master_model->createInvoice(23);
	}

	public function testSms() {
		$isSend = 1;

		// $isSend = $this->Sms_model->orderConfirm(16);
		// $isSend = $this->Sms_model->orderDelivered(16);

		//$isSend = $this->Sms_model->orderCancelByCustomer(16);
		// $isSend = $this->Sms_model->orderCancelByAdmin(16);

		if ($isSend) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function test() {

		$isSend = 1;
		
		//$isSend = $this->Email_sending->register(array('name' => 'Alfaiz', 'email' => 'alfaizm19@gmail.com'));

		//$isSend = $this->Email_sending->order(16);

		//$isSend = $this->Email_sending->orderDispatch(16);

		//$isSend = $this->Email_sending->orderDelivered(16);

		// $isSend = $this->Email_sending->orderReview(16);

		// $isSend = $this->Email_sending->orderCancelByAdmin(16);

		//$isSend = $this->Email_sending->orderCancelByCustomer(16);

		$isSend = $this->Email_sending->invoice(23);

		if ($isSend) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
