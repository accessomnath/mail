<?php
class Career extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');

        $this->load->library('session');
    }
    public function index()
    {
 $data['meta_desc']="Explore a wide range of attractive career opportunities for developers, graphic designers, digital marketers, HTML coders, bidder, caller and many more according to your requirements. Call us +91 9673879759";
       $data['title']="Career Opportunities – SemicolonItes Kolkata, India"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/career');
        $this->load->view('site/commons/footer');
    }


    public function application(){

        $data = $this->input->post();

        $config = array(
            'upload_path' => "./uploads/cv",
            'allowed_types' => "doc|docx|pdf",
            'overwrite' => TRUE,
            'max_size' => "10048000",

        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('uploadcv')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else {
            $data1 = array('upload_data' => $this->upload->data());
            $filename= $data1["upload_data"]['file_name'];
            $data['cv_url']=$filename;
            $data['sent_at']=date('Y-m-d h;i:s');
            $result = $this->Master_model->add_data('career_leads', $data);
            if($result){
                $this->session->set_flashdata('career_msg','success');
            }
            else{
                $this->session->set_flashdata('career_msg','fail');
            }
            redirect('career/index');
        }










    }




}