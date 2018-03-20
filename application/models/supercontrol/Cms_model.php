<?php 
class Cms_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
   
	public function insert_cms($data) {
		$this->load->database();
	    $this->db->insert('cms', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
	
	function show_cmslist()
	{
		$sql ="select * from cms";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
	
	function show_cms_id($id){
		$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function edit_cms($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('cms',$data);
	}
	
	
}
?>
