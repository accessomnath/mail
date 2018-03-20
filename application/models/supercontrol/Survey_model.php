<?php 
class Survey_model extends CI_Model{
	function __construct() {
        parent::__construct();
	$this->load->database();	
}
function show_survey()
	{
		$sql ="select * from survey";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_survey_id($id){
		$this->db->select('*');
		$this->db->from('survey');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
function delete_survey($id){

	  $this->db->where('id', $id);

      $this->db->delete('survey'); 

	}
		function adminmail(){
		$this->load->database();
		$sql ="select * from admin_mail";
		
		$query1 = $this->db->query($sql);
		return($query1->num_rows() > 0) ? $query1->result(): NULL;
		}
		function insert_reply($data,$id){
		
		
		$this->db->update('survey', $data);
		$this->db->where('id', $id);}
}
?>