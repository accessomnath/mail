<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class About extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Generalmodel');
        $this->load->model('Master_model');
        $this->load->model('supercontrol/cms_model');
        $this->load->model('supercontrol/blog_model');

    }

    public function index()
    {

        $about_us_main = $this->cms_model->show_cms_id(11)[0];
        $about_what_we_do = $this->cms_model->show_cms_id(7)[0];
        $ethics1 = $this->cms_model->show_cms_id(8)[0];
        $ethics2 = $this->cms_model->show_cms_id(9)[0];
        $ethics3 = $this->cms_model->show_cms_id(10)[0];


       $data['about_main']=$about_us_main;
       $data['about_what_we_do']=$about_what_we_do;
       $data['ethics1']=$ethics1;
       $data['ethics2']=$ethics2;
       $data['ethics3']=$ethics3;
        $services = $this->blog_model->show_blog();
        $data['services']= $services;


        $about_footer = $this->cms_model->show_cms_id(13)[0];

        $data['about_footer']= $about_footer;


       $data['title']= 'About Us';
       $this->load->view('header', $data);
       $this->load->view('about');
       $this->load->view('footer');
    }




}
?>