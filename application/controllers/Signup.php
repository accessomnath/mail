<?php 
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller{
      function __construct() {
      parent::__construct();
		$this->load->model('Master_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
       }
	   
	   function index()
       {
           $data['title'] = "Registration";
           $this->load->view('header', $data);
           $this->load->view('account');
           $this->load->view('footer');
       }

	 public function register()
	 {
        $data= $this->input->post();
        $this->form_validation->set_rules('form_usertype', 'User Type', 'trim|required');
        $this->form_validation->set_rules('form_first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('form_last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('form_email', 'Email',  'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('user_password2', 'Password', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('user_password_confirm', 'Password Confirmation', 'trim|required|matches[user_password2]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        if ($this->form_validation->run() == FALSE)
         {
          $this->load->view('header', $data);
          $this->load->view('account');
          $this->load->view('footer');
         }
         else
         {
         	$data1['fname']= $data['form_first_name'];
         	$data1['lname']= $data['form_last_name'];
         	$data1['email']= $data['form_email'];
         	$data1['password']= $data['user_password2'];
         	$data1['usertype']= $data['form_usertype'];
         	$data1['status']= true;
            $res= $this->Master_model->add_data('user',$data1);
            if($res){
                $data2['educator_id']= $this->db->insert_id();
                $data3['student_id']= $this->db->insert_id();
                $data4['coach_id']= $this->db->insert_id();
                if($data1['usertype']=='educator') {
                    $this->Master_model->add_data('educator_details', $data2);
                    $this->session->set_flashdata('msg', '<p style="color: green">Registration Successfull. Please Login to continue.</p>');
                }
            	if($data1['usertype']=='student'){
                    $this->Master_model->add_data('student_details', $data3);
                    $this->session->set_flashdata('msg', '<p style="color: green">Registration Successfull. Please Login to continue.</p>');
                }
                if($data1['usertype']=='coach'){
                    $this->Master_model->add_data('coach_details', $data4);
                    $this->session->set_flashdata('msg', '<p style="color: green">Registration Successfull. Please Login to continue.</p>');
                }
                redirect('Signup');
			}
			else {
                $this->session->set_flashdata('msg', 'Registration Failed. Please try again later.');
                redirect('Signup');
            	}
         }
	   }
	  public function username_check($str)
      {  if ($str == '')
          {
            $this->form_validation->set_message('username_check', 'The {field} field can not be the word "educator"');
            return FALSE;
          }
          else
          {
            return TRUE;
          }
      }
}
?>
