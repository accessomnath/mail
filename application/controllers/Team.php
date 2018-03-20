<?php
ob_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class Team extends CI_Controller{
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('Generalmodel');
		  $this->load->model('Newsletter_model');
		  $this->load->model('supercontrol/News_model');
        $this->load->model('supercontrol/blog_model');
   }

    public function index()
    {


        $this->load->model('supercontrol/testimonial_model');
        $query = $this->testimonial_model->show_testimonial();
        $services = $this->blog_model->show_blog();
        $data['services']= $services;
//        echo '<pre>';
//        var_dump($query);

         $data['team']= $query;

        $this->load->view('header', $data);
        $this->load->view('team');
        $this->load->view('footer');
    }
		
}

?>
	