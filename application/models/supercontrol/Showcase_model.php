<?php 
class Showcase_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
	public function insert_showcase($data) {
		$this->load->database();
	    $this->db->insert('showcase', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}

	function show_showcase(){
		$sql = "select * from showcase";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}


	function show_showcase_id($id){
		$this->db->select('*');
		$this->db->from('showcase');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	

	function showcase_edit($id, $data, $showcase_img){
		$this->db->where('id', $id);
		$this->db->update('showcase',$data);
	}
	

	function updt($stat,$id){
		$sql ="update showcase set status=$stat where id=$id";
		$query = $this->db->query($sql);
	}

	function show_showcaselist(){
		$sql ="select * from showcase";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function delete_showcase($id,$showcase_img){
		$this->db->where('id', $id);
		unlink("showcase/".$showcase_img);
		$this->db->delete('showcase');	
	}

}

?>

