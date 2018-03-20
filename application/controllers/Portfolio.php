<?php
class Portfolio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
    }


    public function index()
    {

$data['meta_desc']="Leading End to End offshore Design, Development & Online advertising agency specialized in Web, Mobile App, Game, SEO, SMO, SMM, PPC & Digital Branding. Working for 70+ clients with 20+ yrs combined experience. Call us +91 9673879759";
       $data['title']="SemicolonITES – Our Portfolio"; 
       $data['keyword']= "Website Development Agency, Website Design, Digital Marketing, Contact Us";


        $portfolios = $this->Master_model->get_data('portfolio');
        $data['portfolio']= $portfolios;

        $portfolio_category= array();

        foreach ($data['portfolio'] as $val)
        {


            $portfolio_category[]=$val->category;

        }
        $data['portfolio_category']= array_unique($portfolio_category);

       $this->load->view('site/commons/header', $data);
        $this->load->view('site/portfolio');
        $this->load->view('site/commons/footer');
    }


}