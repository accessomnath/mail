<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');

    }

    public function index()
    {

        $all_messages = $this->Master_model->get_data('product');
        $data['all_message'] = $all_messages;

        $all_messages = $this->Master_model->get_data('blogs');
        $data['all_blog'] = $all_messages;

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/index');
        $this->load->view('site/commons/footer');
    }
}