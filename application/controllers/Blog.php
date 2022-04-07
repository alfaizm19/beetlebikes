<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Blog_model','blog_model');
      	$this->load->helper('common_helper');             
    }

	public function blogListAjax(){

        $this->load->library("pagination");
        $config = array();
        
        $config["base_url"] = base_url() . "blog";
        $config['reuse_query_string'] = true;

        $config["total_rows"] = $this->blog_model->allBlogCount();

        $perPage = 9;
	    if(isset($_POST['perPage'])){
	      	$perPage = $_POST['perPage'];
	    }
        
        $config["per_page"] = $perPage;
        $config["uri_segment"] = 2;
        $config['num_links'] = 5;

        //Encapsulate whole pagination 
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        //First link of pagination
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        //Customizing the “Digit” Link
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //For PREVIOUS PAGE Setup
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        //For NEXT PAGE Setup
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        //For LAST PAGE Setup
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        //For CURRENT page on which you are
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

	    if(isset($_POST['page'])){
          	$page = ($_POST['page']);
        } else {
        	$page = 0;
        }
        
         $data["allBlog"]  = $this->blog_model->allBlog($config["per_page"], $page);
       
       
        $json_data =    array(
			            	"ajaxProductContent"   => $this->load->view('front/ajaxBlogContent',$data),
			            );

        echo json_encode($json_data);

	}

    public function index()
	{
        $data['middleContent']   = 'front/blog';
        $data['pageTitle']       = 'Listing';
        $this->load->view('front/template',$data);
		
	}

    public function details()
    {
        $data["blogDetails"] = $this->blog_model->blogDetailsBySlug($this->uri->segment(2));

        if($data["blogDetails"]){
            $data["recentBlogs"] = $this->blog_model->recentBlogs();
            $data['middleContent']   = 'front/blogDetails';
            $data['pageTitle']       = 'Listing';
            $this->load->view('front/template',$data);
        } else {
            redirect( base_url(), 'refresh' );
        }
        
    }

}
