<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Latest_work extends CI_Controller {

 function __construct()
 {
     parent::__construct();
     $this->load->database();
     $this->load->model('Generalmodel');
     $this->load->model('Master_model');
     $this->load->model('supercontrol/banner_model');
     $this->load->model('supercontrol/cms_model');
     $this->load->model('supercontrol/blog_model');
     $this->load->model('supercontrol/gallery_model');

//=========================Vendor Section================================	
 }
    public function index(){

        $query = $this->banner_model->show_banner();
        $data['banner']= $query;
        $cms1 = $this->cms_model->show_cms_id(1);
        $data['about']= $cms1[0];

        $cms2 = $this->cms_model->show_cms_id(4)[0];
        $cms3 = $this->cms_model->show_cms_id(5)[0];
        $cms4 = $this->cms_model->show_cms_id(6)[0];
        $about_array= [$cms2, $cms3, $cms4];
        $data['about_section_array']= $about_array;

        $services1 = $this->blog_model->show_blog();
        $data['services']= $services1;

        $latest_work = $this->gallery_model->show_gallery();
        $data['latest_work']= $latest_work;

        $about_footer = $this->cms_model->show_cms_id(13)[0];

        $data['about_footer']= $about_footer;
        $services = $this->blog_model->show_blog();

        $data['services']= $services;
        $data['title'] = "Home";
        $this->load->view('header',$data);
        $this->load->view('latestwork');
        $this->load->view('footer');
    }

}

?>