<?php 
class Newsletter_model extends CI_Model{
	function __construct() {
        parent::__construct();
		$this->load->database();
   }
public function insert_newsletter($data){
$this->db->insert('newslettermail',$data);
}
}
?>
