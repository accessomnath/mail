<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_condition extends CI_Controller {


    public function index()
    {
        $this->load->view('header');
        $this->load->view('terms_condition');
        $this->load->view('footer');

    }







}
