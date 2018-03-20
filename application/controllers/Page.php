<?php
ob_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class Page extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('Generalmodel');
		
   }
	public function about(){
		
	//==== "cms Section" =====
		$action1='get';
		$data1='';
		$tablename1='cms';
		$fieldname1 = 'id';				
		$id1 = '1';
		$query = $this->Generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['about'] = $query;
		//==== "cms Section" =====
        $data['title'] = "About us";
	    $this->load->view('header',$data);
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	

	
	public function term(){
			//==== "cms Section" =====
		$action1='get';
		$data1='';
		$tablename1='cms';
		$fieldname1 = 'id';				
		$id1 = '4';
		$query = $this->Generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['term'] = $query;
		//==== "cms Section" =====
		
		
        $data['title'] = "Term & Condition";
	    $this->load->view('header',$data);
		$this->load->view('term');
		$this->load->view('footer');
	}
	
	public function privacy(){
			//==== "cms Section" =====
		$action1='get';
		$data1='';
		$tablename1='cms';
		$fieldname1 = 'id';				
		$id1 = '5';
		$query = $this->Generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['privacy'] = $query;
		//==== "cms Section" =====
		$data['title'] = "Privacy Policy";
	    $this->load->view('header',$data);
		$this->load->view('privacy');
		$this->load->view('footer');
	}
	
	
	public function blog(){
		
		$data['title'] = "Blog";
	    $this->load->view('header',$data);
		$this->load->view('blog');
		$this->load->view('footer');
	}
	
	public function blogdetails(){
		
        $data['title'] = "Blog";
	    $this->load->view('header',$data);
		$this->load->view('blog_single');
		$this->load->view('footer');
	}
	
	
	public function contact(){
		//==== "Admin email Section" =====
		$action1='get';
		$data1='';
		$tablename1='admin_mail';
		$fieldname1 = 'MailId';				
		$id1 = '1';
		$query = $this->Generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['admin_email'] = $query;
		//==== "Admin email Section" =====
		//==== "cms Section" =====
		$action1='get';
		$data1='';
		$tablename1='settings';
		$fieldname1 = 'id';				
		$id1 = '1';
		$query = $this->Generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['settings'] = $query;
		//==== "cms Section" =====
		
		
		
        $data['title'] = "Contact us";
	    $this->load->view('header',$data);
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	function send_contact(){
		 
		$data = array(
						
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'Subject' => $this->input->post('Subject'),
						'Email' => $this->input->post('Email'),
						'Message' => $this->input->post('Message'),
						'Phone' => $this->input->post('Phone'),
						'ContactDate' => date('d-M-Y'),
						'ReplyStatus' => 'No'
			 );
			 //====== Insert =============	
			    $tablename='user_contact';
				$action='insert';
				$id='';
				$fieldname='';		
				$query = $this->Generalmodel->show_data_id($tablename,$id,$fieldname,$action,$data);
		    //======= Insert =============		
			
			$from_email = $this->input->post('admin_email');
			$to_email = $this->input->post('email');
		
			$msg = $this->load->view('contacttemplate',$data,TRUE);
		    $config['mailtype'] = 'html';
		    $this->load->library('email');
		    $this->email->initialize($config);
		    $msg = $msg;
		    $subject = 'Contact Message From University.';   
            $this->email->from($from_email, 'University'); 
		    $this->email->to($to_email);
			$this->email->bcc($from_email);
            $this->email->subject($subject); 
            $this->email->message($msg);
			if($this->email->send()){
				$this->session->set_flashdata("success", "Message Sent Successfully !!!");
			    redirect('Page/contact');	
		        }
          else{ 
				 $this->session->set_flashdata("success", "Message not sent!!!");
			     redirect('Page/contact');	
	          }
	     }
	 
	
}

?>
	