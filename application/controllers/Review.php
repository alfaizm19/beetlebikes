<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	function __construct() {
        parent::__construct();
        if (!$this->session->userdata('userSess')) {
			redirect( base_url(), 'refresh' );
		}
      	$this->load->model('front/Review_model','review_model');
      	$this->load->model('front/Product_model','product_model');
    }

	public function index()
	{
		$productDetails = $this->review_model->productDetailsBySlug($this->uri->segment(3));

		if($productDetails){

			$data["getProductForReview"] = $this->review_model->getProductForReview($productDetails['id']);
			
			if($data["getProductForReview"]){

				$data['reviewError'] = $data['reviewData'] = [];

				$getReview = $this->review_model->getReview($productDetails['id']);

				if($getReview){
					$data['reviewData']['rating'] = $getReview['rating'];
					$data['reviewData']['title'] = $getReview['title'];
					$data['reviewData']['description'] = $getReview['review'];
				}

				if(isset($_POST['reviewSbt']))
				{
				    $this->form_validation->set_rules('rating', 'rating', 'trim|required|numeric');
					$this->form_validation->set_rules('title', 'title', 'trim|required');
					$this->form_validation->set_rules('description', 'description', 'trim|required');

					if ($this->form_validation->run() === FALSE) {
			            $this->session->set_flashdata('reviewError', $this->form_validation->error_array());
			            $this->session->set_flashdata('reviewData', $_REQUEST);
			            $data['reviewError'] = $this->session->flashdata('reviewError');
		                $data['reviewData'] = $this->session->flashdata('reviewData');
			        } else {

			        		$params =   array(
					            'product_id' => $productDetails['id'],
					            'user_id' => getUserId(),
					            'customer_name' => getUserName(),
					            'email' => getUserEmail(),
					            'title' => $this->input->post('title'),
					            'review' => $this->input->post('description'),
					            'rating' => $this->input->post('rating'),
					        );
				        	if($getReview){
				        		$updateReviewStatus = $this->review_model->updateReview($params, $getReview['id']);
				        		if($updateReviewStatus){
					        		$this->session->set_flashdata('reviewSuccess','Your product review updated suucessfully.');
					        	} else {
					        		$this->session->set_flashdata('reviewSaveError','Something went wrong please try again.');
					        	}
				        	} else {

					        	$reviewStatus = $this->review_model->saveReview($params);

					        	if($reviewStatus){
					        		$this->session->set_flashdata('reviewSuccess','Your product review given suucessfully.');
					        	} else {
					        		$this->session->set_flashdata('reviewSaveError','Something went wrong please try again.');
					        	}
				        	}

				        }
				        $this->session->set_flashdata('reviewData', $_REQUEST);
				        $data['reviewData'] = $this->session->flashdata('reviewData');
			  	}
			  		
				
				$data['middleContent']   = 'front/reviewProduct';
		        $data['pageTitle']       = 'Write a Product Review';
		        $this->load->view('front/template',$data);
		    }   else {
					redirect( base_url(), 'refresh' );
				}   	
		} else {
			redirect( base_url(), 'refresh' );
		}
		
	}


}
	

