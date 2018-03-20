<?php
class Account extends CI_Controller{


    function __construct() {
        // first do something important

        // then execute the parent constructor anyway
        parent::__construct();

        $this->load->model('Master_model');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('admin/index');
    }

    public function login_check(){
    $data= $this->input->post();
    $username= $data['username'];
    $log_check= $this->Master_model->login('admin_details',$data);
    if($log_check){
    $admin_details = $this->Master_model->fetch_admin_data('admin_details',$username);
    $this->session->set_userdata('admin_session', $admin_details->admin_id);
    redirect('admin/Dashboard');
    }
    else {
    $this->session->set_flashdata('login_msg', '<p style="color: red">Username or Password is wrong.</p>');
    redirect('admin/Account/login');
    }
    }

    public function logout(){

        $this->session->unset_userdata('admin_session');
         redirect('admin/account/login');



    }











}