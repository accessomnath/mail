<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Master_model');
        $this->load->model('Login_model');

    }

    public function index()
    {
        $this->load->view('site/commons/header');
        $this->load->view('site/loginView');
        $this->load->view('site/commons/footer');

    }

    public function checklogin()
    {
        $data = $this->input->post();
        $email = $data['email'];
        $pass = $data['password'];
        $log_detail = $this->Login_model->user_login($email, $pass);
//        var_dump($log_detail);
        if (!$log_detail) {
            $this->session->set_flashdata('errmsg', 'Your username or password are invalid');
            redirect('/login');
        } else {
//            var_dump($log_detail);
            $this->session->set_userdata('logsession', $log_detail[0]->id);
            redirect('dashboard');


        }

    }

    public function logout()
    {
        $this->session->unset_userdata('logsession');
        redirect('login');
    }


}

?>