<?php
class About_us extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
    }


    public function index(){
    
   

     $data['meta_desc']="Here, we share our philosophy, thoughts, culture, industries that we work & more. Want to know more call us +91 9673879759.";
       $data['title']="SemicolonITES - Our Team, Process, Industries, Case Studies and more…"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";
    
        $this->load->view('site/commons/header', $data);
        $this->load->view('site/about');
        $this->load->view('site/commons/footer');
    }

 public function case_studies(){
$data['meta_desc']="Here, we share our philosophy, thoughts, culture, industries that we work & more. Want to know more call us +91 9673879759.";
       $data['title']="SemicolonITES - Our Team, Process, Industries, Case Studies and more…"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/case');
        $this->load->view('site/commons/footer');
    }

public function why_Us(){
 

$data['meta_desc']="Leading digital marketing company offering high-quality web design & development services, dedicated resource model, mobile app design & development, exceptional expertise and 24/7 support at affordable prices. Call us +91 9673879759";
       $data['title']="Why SemicolonItes - Kolkata, India"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/why_us');
        $this->load->view('site/commons/footer');
    }

public function our_culture(){


$data['meta_desc']="Our industry focus enables us to deliver innovative & creative solutions successfully that are customized according to our client’s business requirements.  Call us +91 9673879759";
       $data['title']="Our Culture in SemicolonItes – Kolkata, India"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/our_culture');
        $this->load->view('site/commons/footer');
    }

public function industries(){
$data['meta_desc']="Here, we share our philosophy, thoughts, culture, industries that we work & more. Want to know more call us +91 9673879759.";
       $data['title']="Industry serves by SemicolonItes – Kolkata, India"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Mobile App Development, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/industries');
        $this->load->view('site/commons/footer');
    }
}
