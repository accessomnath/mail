<?php 
class Yacht_type_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_yacht_type($data) {
		$this->load->database();
	    $this->db->insert('yacht_type', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_yacht_type()
	{
		$sql ="select * from yacht_type ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_yacht_type_id($id){
		$this->db->select('*');
		$this->db->from('yacht_type');
		$this->db->where('yacht_type_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function yacht_type_view($id){
		$this->db->select('*');
		$this->db->from('yacht_type');
		$this->db->where('yacht_type_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function yacht_type_edit($id, $data){
	
		$this->db->where('yacht_type_id', $id);
		$this->db->update('yacht_type',$data);
	}
function updt($stat,$id){
	 
		$sql ="update yacht_type set yacht_type_status=$stat where yacht_type_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_yacht_typelist()
	{
		$sql ="select * from yacht_type";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_yacht_type($id,$yacht_type_image){
		$this->db->where('yacht_type_id', $id);
		unlink("yacht_type/".$yacht_type_image);
		$this->db->delete('yacht_type');	
		}
function delete_mul($ids)//Delete Multiple Yacht_type
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('yacht_type_id', $did);
			unlink("yacht_type/".$yacht_type_image);
			$this->db->delete('yacht_type');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>