<?php
class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
    }


    public function index(){

        $all_messages = $this->Master_model->get_data('blogs');
        $data['all_message']= $all_messages;


       $this->load->view('site/commons/header-blog',$data);
       $this->load->view('site/blogs');
       $this->load->view('site/commons/footer');

    }


    public function detail($slug){

        $blog_details = $this->Master_model->fetchalldata('blogs','blog_slug',$slug);
        $blog_details= $blog_details[0];

        $blog_details->meta_desc = $blog_details->meta_description;
        $blog_details->title = $blog_details->page_title;

        $data['blog_details']= $blog_details;



        $this->load->view('site/commons/header-blog', $data);
        $this->load->view('site/singleBlog');
        $this->load->view('site/commons/footer');

    }
}
