<?php 
class Signup_model extends CI_Model{
	function __construct() {
        parent::__construct();
		$this->load->database();
   }
   
// ================================================For Show Contact section**********Start here=====================================   
 function show_contact()
	{   $this->db->select('*');
		$this->db->from('settings');
		$this->db->where('id',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
  function showcountry(){
	  	$this->db->select('*');
		$this->db->from('countries');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		}
		
  function showcms_19(){
	  	$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('id',19);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		}	
			
  function showcms_20(){
	  	$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('id',20);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		}	
//===========================================For Show Contact section*******End here==========================================	
//===========================================For Insert Contact section*******Start here==========================================		
  function register($data) {
	    $this->db->insert('yacht_users',$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	 }
//===========================================For Insert Contact section*******End here==========================================	

// ================================================For Show Admin Mail section**********Start here=====================================   
 function show_admin_mail()
	{   $this->db->select('*');
		$this->db->from('admin_mail');
		$this->db->where('MailId',1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
//===========================================For Show Admin Mail section*******End here==========================================
 function userverification($allias,$data){
	 	$this->db->where('id', $allias);
		$this->db->update('yacht_users',$data);
	 }
  function userverificationupdt(){
	  	$this->db->select('*');
		$this->db->from('yacht_users');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	  }	 
}
?>
