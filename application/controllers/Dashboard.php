<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Master_model');

    }
    public function index(){

      //  $data= $this->Master_model->get_data('leads');



        if($this->session->userdata('logsession')) {

//            $data= $this->Master_model->get_data('leads');

            $all_messages = $this->Master_model->get_data('leads');

            $data['all_message']= $all_messages;



            $this->load->view('site/commons/header',$data);
            $this->load->view('site/inAdmin');
            $this->load->view('site/commons/footer');

        }else{
            redirect('login');
        }
    }



}