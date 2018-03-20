<?php
class Video extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
    }


    public function index(){

        $videos= $this->Master_model->getAll('video');
        $data['videos']= $videos;

        $this->load->view('site/commons/header',$data);
        $this->load->view('site/video_all');
        $this->load->view('site/commons/footer');

    }

 public function single($id)
 {

     $videos= $this->Master_model->getAll('video');
     $data['videos']= $videos;

    $result = $this->Master_model->fetchdata('video', $id);
    $data['video']= $result;




     $this->load->view('site/commons/header',$data);
     $this->load->view('site/video_single');
     $this->load->view('site/commons/footer');





 }




}