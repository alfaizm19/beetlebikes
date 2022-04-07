<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct() {
        parent::__construct();
      	$this->load->model('front/Category_model','category_model');
        $this->load->model('front/Product_model','product_model');
        $this->load->helper('common_helper');           
    }

	public function home()
	{
		$this->load->view('welcome_message');
	}

	public function categoryListAjax(){
		$search = [];
        $this->load->library("pagination");
        $config = array();
        
        $config["base_url"] = base_url() . "category";
        $config['reuse_query_string'] = true;

        if(isset($_POST['category']) ){
	        $category =  [];
	     	$category = $_POST['category'];
	        $config["total_rows"] = $this->category_model->filterCategoriesCount($category);
        } else {
        	$config["total_rows"] = $this->category_model->allCategoriesCount();
        }

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
        
       	if(isset($_POST['category'])){
            $category =  [];

	        if(!empty($_POST['category'])){
		      	$category = $_POST['category'];
		    }
            $data["allCategories"]  = $this->category_model->filterCategories($config["per_page"], $page, $category);
        } else{
            $data["allCategories"]  = $this->category_model->allCategories($config["per_page"], $page);
        }
       
       
        $json_data =    array(
			            	"ajaxProductContent"   => $this->load->view('front/ajaxCategoriesContent',$data),
			            );

        echo json_encode($json_data);

	}


    public function index()
	{
		$data['middleContent']   = 'front/categories';
        $data['pageTitle']       = 'Listing';
		$this->load->view('front/template',$data);
	}
	
    public function subCategoryListAjax(){
        $search = [];
        $this->load->library("pagination");
        $config = array();
        $slug = $this->uri->segment(2);
        $config["base_url"] = base_url() . "category/".$slug;
        $config['reuse_query_string'] = true;

        if(isset($_POST['category']) ){
            $category =  [];
            $category = $_POST['category'];
            $config["total_rows"] = $this->category_model->filterCategoriesCount($category);
        } else {
            $config["total_rows"] = $this->category_model->allSubCategoriesCount($_POST['catId']);
        }

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
        
        if(isset($_POST['category'])){
            $category =  [];

            if(!empty($_POST['category'])){
                $category = $_POST['category'];
            }
            $data["allCategories"]  = $this->category_model->filterCategories($config["per_page"], $page, $category);
        } else{
            $data["allCategories"]  = $this->category_model->allSubCategories($config["per_page"], $page,$_POST['catId']);
        }
       
        $json_data =    array(
                            "ajaxSubCategories"   => $this->load->view('front/ajaxSubCategoriesContent',$data),
                        );

        echo json_encode($json_data);

    }

    public function subcategory($slug=''){

        unset($_SESSION['subCategoryId']);
        $getSubCategoryData  = $this->category_model->getCategoryDetailBySlug($slug);

        if (!empty($getSubCategoryData)) {
            
            $this->session->set_userdata (array('subCategoryId' => $getSubCategoryData->id) );
            
            $data["categoriesWithPrdouctCount"] = $this->product_model->categoriesWithPrdouctsCount();
            $data["attributesPrdouct"] = $this->product_model->productListAttributeName();
            $data['catData'] = $getSubCategoryData;

            $data['middleContent']   = 'front/categoryProductList';
            $data['pageTitle']       = $getSubCategoryData->meta_title;
            $this->load->view('front/template',$data);
               
            
        } else {
            redirect(base_url().'category', 'refresh');
        }
    }

    public function subcategory_30102021(){
        unset($_SESSION['subCategoryId']);
        $slug = $this->uri->segment(2);
        $getSubCategoryData  = $this->category_model->getCategoryBySlug($slug);
        if($getSubCategoryData){
             redirect(base_url().'products?catId='.$getSubCategoryData['id'], 'refresh');
         /*  $data['subCategoryId'] = $getSubCategoryData['id'];
           $this->session->set_userdata( 'subCategoryId', $getSubCategoryData['id']);*/
        } else {
            redirect(base_url().'category', 'refresh');
        }
       /* $data['middleContent']   = 'front/subCategories';
        $data['pageTitle']       = 'Listing';
        $this->load->view('front/template',$data);*/
    }

}
