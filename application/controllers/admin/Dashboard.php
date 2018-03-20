<?php
class Dashboard extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        if($this->session->userdata('admin_session')=='')
        {
        redirect('admin/Account/login');
        }
        $this->load->model('Master_model');
    }

    public function index()
    {

        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/commons/footer');
    }

    public function setting_personal(){

        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/personal_settings');
        $this->load->view('admin/commons/footer');


    }

    public function update_setting_personal(){

        $admin_id= $this->session->userdata('admin_session');
        $data= $this->input->post();

        if($data['update_type']=='profile_update')
        {
            unset($data['update_type']);
            $update_meta_data = $this->Master_model->update_on_coll('admin_meta_data','admin_id',$admin_id,$data);
            if($update_meta_data)
            {
            $this->session->set_flashdata('meta_data_update_msg','<span style="color: green">Your profile is updated properly.</span>');
            }
            else
            {
                $this->session->set_flashdata('meta_data_update_msg','<span style="color: red">Failed to update the profile. Please try again later.</span>');
            }
            redirect('admin/dashboard/setting_personal');
        }


        if($data['update_type']=='settings_update')
        {
            unset($data['update_type']);
            $update_admin_details = $this->Master_model->update_on_coll('admin_details','admin_id',$admin_id,$data);
            if($update_admin_details)
            {
                $this->session->set_flashdata('meta_data_update_msg','<span style="color: green">Your profile settings is updated properly.</span>');
            }
            else
            {
                $this->session->set_flashdata('meta_data_update_msg','<span style="color: red">Failed to update the profile settings. Please try again later.</span>');
            }
            redirect('admin/dashboard/setting_personal');
        }


        if($data['update_type']=='profile_image_update')
        {
            unset($data['update_type']);


            $config = array(
                'upload_path' => "uploads/profile/",
                'upload_url' => base_url() . "uploads/profile/",
                'allowed_types' => "gif|jpg|png|jpeg"

            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')){



                $this->session->set_flashdata('meta_data_update_msg','<span style="color: red">'. $this->upload->display_errors().'</span>');

                redirect('admin/dashboard/setting_personal');
            }
            else{
                $data['userfile'] = $this->upload->data();
                $filename=$data['userfile']['file_name'];
                $data = array(
                    'profile_image' => $filename,
                );
                $update_profile_image = $this->Master_model->update_on_coll('admin_meta_data','admin_id',$admin_id,$data);
                 if($update_profile_image)
                 {
                   $this->session->set_flashdata('meta_data_update_msg', 'Profile Image updated succesfully');

                 }
                 else
                 {
                   $this->session->set_flashdata('meta_data_update_msg', 'Failed to update Profile Image succesfully');
                 }
                redirect('admin/dashboard/setting_personal');


            }


            $update_admin_details = $this->Master_model->update_on_coll('admin_details','admin_id',$admin_id,$data);
            if($update_admin_details)
            {
            $this->session->set_flashdata('meta_data_update_msg','<span style="color: green">Your Profile Image is updated properly.</span>');
            }
            else
            {
            $this->session->set_flashdata('meta_data_update_msg','<span style="color: red">Failed to update the Profile Image. Please try again later.</span>');
            }
            redirect('admin/dashboard/setting_personal');
        }






     }

    public function setting_website(){

        $admin_id= $this->session->userdata('admin_session');



        $this->load->view('admin/commons/header');
        $this->load->view('admin/setting_website');
        $this->load->view('admin/commons/footer');
    }

    public function contacts(){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

       $all_messages = $this->Master_model->get_data('contacts');
       $data['all_message']= $all_messages;
       $this->load->view('admin/commons/header',$data);
       $this->load->view('admin/contact_messages');
       $this->load->view('admin/commons/footer');
    }

    public function contact_detail($id){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;
        $contact_details = $this->Master_model->fetchalldata('contacts','id',$id);
        $message_details= $contact_details[0];
        $data['message_details']= $message_details;
        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/contact_message_details');
        $this->load->view('admin/commons/footer');
    }

    public function contact_delete($id){
       $delete_status= $this->Master_model->delete_all_data('contact_messages','contact_id',$id);
       if($delete_status){
           $this->session->set_flashdata('del_msg','<span style="color: green">Contact message has been deleted successfully.</span>');
       }
       else {
           $this->session->set_flashdata('del_msg','<span style="color: red">Failed to delete contact message.</span>');
       }
       redirect('admin/dashboard/contacts');
    }

    public function application_recieved(){

        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $all_messages = $this->Master_model->get_data('career_leads');
        $data['all_message']= $all_messages;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/job_applications');
        $this->load->view('admin/commons/footer');

    }

    public function application_detail($id){


        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $contact_details = $this->Master_model->fetchalldata('career_leads','id',$id);
        $message_details= $contact_details[0];
        $data['message_details']= $message_details;


        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/job_application_detail');
        $this->load->view('admin/commons/footer');

    }

    public function blogs(){

        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;
        $all_messages = $this->Master_model->get_data('blogs');
        $data['all_message']= $all_messages;
        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/blogs');
        $this->load->view('admin/commons/footer');
    }

    public function addnew_blog(){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;
        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/addnew_blog');
        $this->load->view('admin/commons/footer');
    }

    public function insert_blog(){



    $data = $this->input->post();
    $blog_slug=url_title($data['blog_title'], 'dash', true);



    $config = array(
        'upload_path' => "uploads/blogs/",
        'upload_url' => base_url() . "uploads/profile/",
        'allowed_types' => "gif|jpg|png|jpeg"
    );
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('userfile')){
        $this->session->set_flashdata('add_blog_msg','<span style="color: red">'. $this->upload->display_errors().'</span>');
        redirect('admin/dashboard/addnew_blog');
    }
    else{
        $data1['userfile'] = $this->upload->data();
        $filename=$data1['userfile']['file_name'];
         $data['blog_image']= $filename;
         $data['status']= true;
         $data['created_at']= date('Y-m-d h;i:s');
         $data['added_by']= 'admin';
         $data['blog_slug']= $blog_slug;

        $add_blog = $this->Master_model->add_data('blogs', $data);
        if($add_blog)
        {
            $this->session->set_flashdata('add_blog_msg', 'Blog added successfully.');
            redirect('admin/dashboard/blogs');
        }
        else
        {
            $this->session->set_flashdata('add_blog_msg', 'Failed to add blogs succesfully');
            redirect('admin/dashboard/addnew_blog');

        }
    }

}

    public function blog_view($id)
    {
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $blog_details = $this->Master_model->fetchalldata('blogs','id',$id);
        $message_details= $blog_details[0];
        $data['message_details']= $message_details;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/blog_details');
        $this->load->view('admin/commons/footer');
    }

    public function update_blog()
    {
        $data= $this->input->post();
        if($_FILES['userfile']['name']==''){
            $update_blog_data = $this->Master_model->update_on_coll('blogs','id',$data['id'],$data);
            if($update_blog_data)
            {
                $this->session->set_flashdata('add_blog_msg','<span style="color: green">Blog is updated properly.</span>');
                redirect('admin/dashboard/blogs');
            }
            else
            {
                $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to update the profile. Please try again later.</span>');
            }
            redirect('admin/dashboard/blog_view/'.$data['id']);
        }

        else {
            $config = array(
                'upload_path' => "uploads/blogs/",
                'upload_url' => base_url() . "uploads/profile/",
                'allowed_types' => "gif|jpg|png|jpeg"
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')){
                $this->session->set_flashdata('add_blog_msg','<span style="color: red">'. $this->upload->display_errors().'</span>');
                redirect('admin/dashboard/addnew_blog');
            }
            else{
                $blog_slug=url_title($data['blog_title'], 'dash', true);
                $data1['userfile'] = $this->upload->data();
                $filename=$data1['userfile']['file_name'];
                $data['blog_image']= $filename;
                $data['blog_slug']= $blog_slug;
                $update_blog_data = $this->Master_model->update_on_coll('blogs','id',$data['id'],$data);
                if($update_blog_data)
                {
                    $this->session->set_flashdata('add_blog_msg', 'Blog added successfully.');
                    redirect('admin/dashboard/blogs');
                }
                else
                {
                    $this->session->set_flashdata('add_blog_msg', 'Failed to add blogs succesfully');
                    redirect('admin/dashboard/blog_view/'.$data['id']);
                }
            }
        }
    }

    public function blog_delete($id)
    {
        $delete_status= $this->Master_model->delete_all_data('blogs','id',$id);
        if($delete_status){
            $this->session->set_flashdata('add_blog_msg','<span style="color: green">Blog has been deleted successfully.</span>');
        }
        else {
            $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to delete Blog.</span>');
        }
        redirect('admin/dashboard/blogs');
    }


    public function leads(){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;
        $all_messages = $this->Master_model->get_data('leads');

        $data['all_message']= $all_messages;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/leads');
        $this->load->view('admin/commons/footer');

        }

    public function addnew_lead(){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/addnew_lead');
        $this->load->view('admin/commons/footer');

    }

    public function insert_lead(){

        $data = $this->input->post();

//        var_dump($data);
        $lead_date = $data['date'];
        $lead_url = $data['lead_url'];

        if($lead_date !=null || $lead_url!=null){

            $add_lead = $this->Master_model->add_data('leads', $data);

            if($add_lead)
            {
                $this->session->set_flashdata('add_blog_msg', 'Lead added successfully.');
                redirect('admin/dashboard/leads');
            }
            else
            {
                $this->session->set_flashdata('add_blog_msg', 'Failed to add Lead succesfully');
                redirect('admin/dashboard/addnew_lead');

            }

        }


    }

    public function lead_delete($id)
    {
        $delete_status= $this->Master_model->delete_all_data('leads','id',$id);
        if($delete_status){
            $this->session->set_flashdata('add_blog_msg','<span style="color: green">Lead has been deleted successfully.</span>');
        }
        else {
            $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to delete Lead.</span>');
        }
        redirect('admin/dashboard/leads');
    }








//    public function portfolio(){
//
//        $admin_id= $this->session->userdata('admin_session');
//        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
//        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
//        $data['meta_data']= $admin_meta_data;
//        $data['admin_detail']= $admin_detail;
//        $all_messages = $this->Master_model->get_data('portfolio');
//        $data['all_message']= $all_messages;
//        $this->load->view('admin/commons/header',$data);
//        $this->load->view('admin/portfolio');
//        $this->load->view('admin/commons/footer');
//    }
//
//    public function addnew_portfolio(){
//        $admin_id= $this->session->userdata('admin_session');
//        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
//        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
//        $data['meta_data']= $admin_meta_data;
//        $data['admin_detail']= $admin_detail;
//        $this->load->view('admin/commons/header',$data);
//        $this->load->view('admin/addnew_portfolio');
//        $this->load->view('admin/commons/footer');
//    }
//
//
//    public function insert_portfolio(){
//
//        $data = $this->input->post();
//        $portfolio_slug=url_title($data['portfolio_title'], 'dash', true);
//
//        $config = array(
//            'upload_path' => "uploads/portfolio/",
//            'allowed_types' => "gif|jpg|png|jpeg"
//        );
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('userfile')){
//            $this->session->set_flashdata('add_blog_msg','<span style="color: red">'. $this->upload->display_errors().'</span>');
//            redirect('admin/dashboard/addnew_portfolio');
//        }
//        else{
//            $data1['userfile'] = $this->upload->data();
//            $filename=$data1['userfile']['file_name'];
//            $data['portfolio_image']= $filename;
//            $data['status']= true;
//            $data['portfolio_slug']= $portfolio_slug;
//
//            $add_blog = $this->Master_model->add_data('portfolio', $data);
//            if($add_blog)
//            {
//                $this->session->set_flashdata('add_blog_msg', 'Blog added successfully.');
//                redirect('admin/dashboard/portfolio');
//            }
//            else
//            {
//                $this->session->set_flashdata('add_blog_msg', 'Failed to add blogs succesfully');
//                redirect('admin/dashboard/addnew_portfolio');
//
//            }
//        }
//
//    }
//
//
//    public function portfolio_view($id)
//    {
//        $admin_id= $this->session->userdata('admin_session');
//        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
//        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
//
//        $data['meta_data']= $admin_meta_data;
//        $data['admin_detail']= $admin_detail;
//
//        $blog_details = $this->Master_model->fetchalldata('portfolio','id',$id);
//        $message_details= $blog_details[0];
//        $data['message_details']= $message_details;
//
//        $this->load->view('admin/commons/header',$data);
//        $this->load->view('admin/portfolio_details');
//        $this->load->view('admin/commons/footer');
//    }
//
//    public function update_portfolio()
//    {
//        $data= $this->input->post();
//        if($_FILES['userfile']['name']==''){
//            $update_blog_data = $this->Master_model->update_on_coll('portfolio','id',$data['id'],$data);
//            if($update_blog_data)
//            {
//                $this->session->set_flashdata('add_blog_msg','<span style="color: green">Portfolio is updated properly.</span>');
//                redirect('admin/dashboard/portfolio');
//            }
//            else
//            {
//                $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to update the Portfolio. Please try again later.</span>');
//            }
//            redirect('admin/dashboard/portfolio_view/'.$data['id']);
//        }
//
//        else {
//            $config = array(
//                'upload_path' => "uploads/portfolio/",
//
//                'allowed_types' => "gif|jpg|png|jpeg"
//            );
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('userfile')){
//                $this->session->set_flashdata('add_blog_msg','<span style="color: red">'. $this->upload->display_errors().'</span>');
//                redirect('admin/dashboard/addnew_portfolio');
//            }
//            else{
//                $blog_slug=url_title($data['blog_title'], 'dash', true);
//                $data1['userfile'] = $this->upload->data();
//                $filename=$data1['userfile']['file_name'];
//                $data['portfolio_image']= $filename;
//                $data['portfolio_slug']= $blog_slug;
//                $update_blog_data = $this->Master_model->update_on_coll('portfolio','id',$data['id'],$data);
//                if($update_blog_data)
//                {
//                    $this->session->set_flashdata('add_blog_msg', 'Portfolio added successfully.');
//                    redirect('admin/dashboard/portfolio');
//                }
//                else
//                {
//                    $this->session->set_flashdata('add_blog_msg', 'Failed to add Portfolio succesfully');
//                    redirect('admin/dashboard/portfolio_view/'.$data['id']);
//                }
//            }
//        }
//    }
//
//    public function portfolio_delete($id)
//    {
//        $delete_status= $this->Master_model->delete_all_data('portfolio','id',$id);
//        if($delete_status){
//            $this->session->set_flashdata('add_blog_msg','<span style="color: green">Portfolio has been deleted successfully.</span>');
//        }
//        else {
//            $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to delete Portfolio.</span>');
//        }
//        redirect('admin/dashboard/portfolio');
//    }
//
    public function product(){

        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;


        $all_messages = $this->Master_model->get_data('product');
        $data['all_message']= $all_messages;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/product');
        $this->load->view('admin/commons/footer');




    }


    public function addnew_products(){
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);
        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;
        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/addnew_product');
        $this->load->view('admin/commons/footer');
    }

    public function insert_product(){
        $data = $this->input->post();
            $add_blog = $this->Master_model->add_data('product', $data);
            if($add_blog)
            {
                $this->session->set_flashdata('add_blog_msg', 'Product added successfully.');
                redirect('admin/dashboard/product');
            }
            else
            {
                $this->session->set_flashdata('add_blog_msg', 'Failed to add Product succesfully');
                redirect('admin/dashboard/addnew_product');
            }
    }



    public function product_view($id)
    {
        $admin_id= $this->session->userdata('admin_session');
        $admin_detail= $this->Master_model->fetch_admin_data_by_id('admin_details',$admin_id);
        $admin_meta_data= $this->Master_model->fetch_admin_data_by_id('admin_meta_data',$admin_id);

        $data['meta_data']= $admin_meta_data;
        $data['admin_detail']= $admin_detail;

        $blog_details = $this->Master_model->fetchalldata('product','id',$id);
        $message_details= $blog_details[0];
        $data['message_details']= $message_details;

        $this->load->view('admin/commons/header',$data);
        $this->load->view('admin/product_details');
        $this->load->view('admin/commons/footer');
    }

    public function update_product()
    {
        $data= $this->input->post();

            $update_blog_data = $this->Master_model->update_on_coll('product','id',$data['id'],$data);
            if($update_blog_data)
            {
                $this->session->set_flashdata('add_blog_msg','<span style="color: green">Product is updated properly.</span>');
                redirect('admin/dashboard/product');
            }
            else
            {
                $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to update the Product. Please try again later.</span>');
            }
            redirect('admin/dashboard/product_view/'.$data['id']);

    }


    public function product_delete($id)
    {
        $delete_status= $this->Master_model->delete_all_data('product','id',$id);
        if($delete_status){
            $this->session->set_flashdata('add_blog_msg','<span style="color: green">Product has been deleted successfully.</span>');
        }
        else {
            $this->session->set_flashdata('add_blog_msg','<span style="color: red">Failed to delete Product.</span>');
        }
        redirect('admin/dashboard/product');
    }







}