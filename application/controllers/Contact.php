<?php
class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
        $this->load->library('session');
    }


    public function index(){

//        $data['meta_desc']="SemicolonITES offers web development services in India offers custom website development services for B2B, B2C Portal & More. Call us here +91 09673879759 for offshore website development services.";
//        $data['title']="SemicolonITES - Contact Us for Website Development Services in India";
//        $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Contact Us";
//        $this->load->view('site/commons/header', $data);
//        $this->load->view('site/index');
//        $this->load->view('site/commons/footer');
    }

    public function send_contact(){

        $data = $this->input->post();
        $result = $this->Master_model->add_data('contacts', $data);

        if ($result){
            $this->session->set_flashdata('msg', 'success');
            }
        else {
            $this->session->set_flashdata('msg','success');
            }

         redirect('/');



    }





}
