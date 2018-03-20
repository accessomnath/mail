<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Master_model');
    }

    public function myAccount(){
        $student_session = $this->session->userdata('student');
        if(isset($student_session)){
            $data['student_details']= $this->Master_model->get_user('user',$student_session->email);
            $id= $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details','student_id',$id);
            $data['student_extra_data'] = $student_extra_data[0];
            $news_feeds= $this->Master_model->get_data('blog');
            $data['news_feed']= array_reverse($news_feeds);
            $other_students= $this->Master_model->fetch_but_not_in('user','usertype','student','id',$id);
            $data['other_students']= $other_students;
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/index');
            $this->load->view('student/commons/footer');
        }
        else
        {
            redirect('Home');
        }
    }

    public function myprofile(){
        $student_session = $this->session->userdata('student');
        if(isset($student_session)){
            $data['student_details']= $this->Master_model->get_user('user',$student_session->email);
            $id= $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details','student_id',$id);
            $data['student_extra_data'] = $student_extra_data[0];
//            echo '<pre>';
//            var_dump($data);
//            die();
            $countries_array = $this->Master_model->get_data('country');
            $data['countries']= $countries_array;
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/myprofile');
            $this->load->view('student/commons/footer');
        }
        else
        {
            redirect('Home');
        }
    }
    public function mydetail(){
        $student_session = $this->session->userdata('student');
        if(isset($student_session))
        {
            $data['student_details']= $this->Master_model->get_user('user',$student_session->email);
            $id= $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details','student_id',$id);
            $data['student_extra_data'] = $student_extra_data[0];
            $countries_array = $this->Master_model->get_data('countries');
            $country_data= array(
                '' => 'Choose Country'
            );
            foreach ($countries_array as $con){
                $country_data[$con->count_id]= $con->count_name;
            }
            $data['countries']= $country_data;
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/profile_add');
            $this->load->view('student/commons/footer');
        }
        else
        {
            redirect('Home');
        }
    }

    public function updateDetails()
    {
        $data= $this->input->post();
        $id= $data['id'];
        $basic_data['fname']= $data['fname'];
        $basic_data['lname']= $data['lname'];
        //$basic_data['email']= $data['email'];
        $update_res = $this->Master_model->update_data('user',$id, $basic_data);

        $extra_data['gender'] = $data['gender'];
        $extra_data['profile_title'] = $data['profile_title'];
        $extra_data['plan_for_higher_studies'] = $data['plan_for_higher_studies'];
        $extra_data['study_level_looking_for'] = $data['study_level_looking_for'];
        $extra_data['current_education'] = $data['current_education'];
        if($extra_data['current_education']=='Other'){
        $extra_data['other_current_education'] = $data['other_current_education'];
        }
        else
        {
            $extra_data['other_current_education'] = '';
        }
        $extra_data['year_of_graduation'] = $data['year_of_graduation'];
        $extra_data['last_school_college'] = $data['last_school_college'];
        if($data['studied_abroad']=='true'){
            $extra_data['studied_abroad']= true;
        }
        else
        {
            $extra_data['studied_abroad']= false;
        }
        $extra_data['current_country'] = $data['current_country'];
        $extra_data['current_state'] = $data['current_state'];
        $extra_data['current_city'] = $data['current_city'];
        $extra_data['alt_email'] = $data['alt_email'];
        $extra_data['conatct'] = $data['conatct'];
        $extra_data['about'] = $data['about'];
        $update_res1= $this->Master_model->update_on_coll('student_details','student_id', $id, $extra_data);
     if($update_res && $update_res1)
     {
     $this->session->set_flashdata('msg', '<p style="color: green; font-size: large">Your profile got updated successfully</p>');
     }
     else
     {
     $this->session->set_flashdata('msg', '<p style="color: red; font-size: large">Failed to update the profile</p>');
     }
     redirect('student/myprofile');
    }


    public function upload_image()
    {
        $config['upload_path'] = './uploads/student';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('profile_pic')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg','<p style="color: red; font-size: large">'.$error['error'].'</p>' );
            redirect('student/myprofile');
        }
        else {
            $data['userfile'] = $this->upload->data();
            $filename = 'uploads/student/'.$data['userfile']['file_name'];
            $id= $this->input->post('id');
            $data1['image']= $filename;
            $update_res1= $this->Master_model->update_on_coll('student_details','student_id', $id, $data1 );
            if($update_res1)
            {
                $this->session->set_flashdata('msg', '<p style="color: green; font-size: large">You successfully changed your profile picture</p>');
                redirect('student/myprofile');
            }
            else
            {
                $this->session->set_flashdata('msg', '<p style="color: red; font-size: large">Failed to change your profile picture. Please try again later.</p>');
                redirect('student/myprofile');
            }
        }
    }


    public function change_password(){
        $student_session = $this->session->userdata('student');
        if(isset($student_session)){
            $data['student_details']= $this->Master_model->get_user('user',$student_session->email);
            $id= $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details','student_id',$id);
            $data['student_extra_data'] = $student_extra_data[0];
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/change_password');
            $this->load->view('student/commons/footer');
        }
        else {
            redirect('Home');
        }
    }


    public function update_password(){
        $student_session = $this->session->userdata('student');
        //var_dump($student_session);
        if(isset($student_session)){
            $data= $this->input->post();
//        var_dump($data);
            //      die();
            $email= trim($data['email']);
            $password= trim($data['old_pass']);
            $new_pass= trim($data['new_pass']);
            $con_new_pass= trim($data['con_new_pass']);
            $id= $data['id'];
            if($email=='' | $password=='' | $new_pass=='' | $con_new_pass=='')
            {
                $this->session->set_flashdata('msg','<p style="color: red; text-align: center">All The fileds are mandatory</p>');
                redirect('student/change_password');
            }
            if($new_pass != $con_new_pass){
                $this->session->set_flashdata('msg','<p style="color: red; text-align: center">New Password and confirm password must match.</p>');
                redirect('student/change_password');
            }
            if($student_session->email == $email & $student_session->password == $password){
                if($student_session->id == $id ){
                    $data_pass['password']= $new_pass;
                    $update_res = $this->Master_model->update_data('user',$id, $data_pass);
                    if($update_res){
                        $this->session->set_flashdata('msg','<p style="color: green; text-align: center">Your Password got updated successfully</p>');
                        redirect('student/change_password');
                    }
                    else {
                        $this->session->set_flashdata('msg','<p style="color: red; text-align: center">Failed to update the password. Please try again later.</p>');
                        redirect('student/change_password');
                    }
                }
                else {
                    $this->session->set_flashdata('msg','<p style="color: red; text-align: center">You are not a authorised person to change the password.</p>');
                    redirect('student/change_password');
                }
            }
            else {
                $this->session->set_flashdata('msg','<p style="color: red; text-align: center">Your email_id or password donot match with the registered Email.</p>');
                redirect('student/change_password');
            }
        }
    }


    public function featured_student($id){
        $student_session = $this->session->userdata('student');
        $featured_student_id= $id;
        if(isset($student_session)) {
            $data['student_details'] = $this->Master_model->get_user('user', $student_session->email);
            $id = $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details', 'student_id', $id);
            $data['student_extra_data'] = $student_extra_data[0];
            $get_featured_student_details = $this->Master_model->fetch_single_data_by_join('user', 'student_details', 'id', 'student_id', $featured_student_id);
            $data['featured_student'] = $get_featured_student_details;

            $this->load->view('student/commons/header', $data);
            $this->load->view('student/featured_student');
            $this->load->view('student/commons/footer');
        }
    }


    public function blog_details($id){
        $blog_id= $id;
        $student_session = $this->session->userdata('student');
        if(isset($student_session)) {
            $data['student_details'] = $this->Master_model->get_user('user', $student_session->email);
            $id = $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details', 'student_id', $id);
            $data['student_extra_data'] = $student_extra_data[0];
            $blog_data = $this->Master_model->fetchalldata('blog','id',$blog_id);
            $data['blog'] = $blog_data[0];
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/blog_detail');
            $this->load->view('student/commons/footer');
        }
    }


    public function logout(){
        $this->session->unset_userdata('student');
        redirect('Home');
    }

    public function get_states(){

        $data= $this->input->post();
        $country_code= $data['country_code'];
        $states = $this->Master_model->fetchalldata('states','country_id',$country_code);
        echo json_encode($states);

    }

    public function get_cities(){
       $data= $this->input->post();
       $state_code= $data['state_code'];
       $cites= $this->Master_model->fetchalldata('cities','state_id',$state_code);
       echo json_encode($cites);
    }

    public function faqs()
    {
        $student_session = $this->session->userdata('student');
        if(isset($student_session))
        {
            $data['student_details'] = $this->Master_model->get_user('user', $student_session->email);
            $id = $data['student_details']->id;
            $student_extra_data = $this->Master_model->fetchalldata('student_details', 'student_id', $id);
            $data['student_extra_data'] = $student_extra_data[0];
            $this->load->view('student/commons/header', $data);
            $this->load->view('student/faqs');
            $this->load->view('student/commons/footer');
         }
         else
         {
         redirect('Home');
         }
    }

    public function student_view()
    {
        $this->load->view('student/commons/header');
        $this->load->view('student/index');
        $this->load->view('student/commons/footer');
    }
}
?>