<?php
class Services extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
    }


    public function index(){


        $this->load->view('site/commons/header');
        $this->load->view('site/services');
        $this->load->view('site/commons/footer');
    }




    public function website_design(){
    
    $data['meta_desc']="SemicolonITES, leading offshore web design company in India, provides unique, customized, professional & affordable website design services worldwide. 
                        Want to know more call us +91 9673879759.";
       $data['title']="SemicolonITES – Offshore Unique Website Design Services in India"; 
       $data['keyword']= "Website Development Agency, Website Design";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/design');
        $this->load->view('site/commons/footer');
    }


    public function website_development(){
    
     $data['meta_desc']="SemicolonITES offers web development services in India offers custom website development services for B2B, B2C Portal & More. Call us here +91 09673879759 for offshore website development services.";
       $data['title']="SemicolonITES - Website Development Services in India"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/development');
        $this->load->view('site/commons/footer');
    }

    public function mobile_app_development(){

 $data['meta_desc']="SemicolonITES offers a high end, enterprise mobile app development‎ and designed to run on the smart phones such as Android, IOS for meeting the demand of present market. Get in Touch!";
 $data['title']="SemicolonITES - Engagement Driven Mobile App Design and Development Service in India"; 
 $data['keyword']= "Android and IOS Development, Hybrid App Development";
      
        $this->load->view('site/commons/header',$data);
        $this->load->view('site/mobileapp');
        $this->load->view('site/commons/footer');
    }
    public function graphics_design(){
    
    $data['meta_desc']="Looking for graphics design services? SemicolonITES offers graphic design services at reasonable prices. Call +91 +91 9673879759 for graphic design service";
    $data['title']="SemicolonITES - Creative Graphic Design Company in India"; 
    $data['keyword']= "Graphics Designing Service";
      
        $this->load->view('site/commons/header', $data);
        $this->load->view('site/graphics_design');
        $this->load->view('site/commons/footer');
    }

    public function seo_and_digital_marketing(){

$data['meta_desc']="SemicolonITES offering TG oriented Digital Marketing Services with successful conversion metrics. Especially in Organic search, pay-par click, social media, email& re-marketing. Call us +91 9673879759";
    $data['title']="Digital Marketing Advertising - 8+ years of experience with ROI Driven Solution"; 
    $data['keyword']= "Digital Marketing, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/seo');
        $this->load->view('site/commons/footer');
    }

    public function content_writing_service(){

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/content');
        $this->load->view('site/commons/footer');
    }

 public function domain_hosting(){


$data['meta_desc']="SemicolonItes offers domain hosting service in Kolkata, India for website, app and Software Company at nominal cost. Working for 70+ clients with 20+ yrs combined experience. Call us +91 9673879759";
    $data['title']="Domain Hosting Service by SemicolonItes - Kolkata, India"; 
    $data['keyword']= "Digital Marketing, SEO Services";

        $this->load->view('site/commons/header', $data);
        $this->load->view('site/domain');
        $this->load->view('site/commons/footer');
    }

}
