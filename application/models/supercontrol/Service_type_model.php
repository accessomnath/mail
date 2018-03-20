<?php 
class Service_type_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_service_type($data) {
		$this->load->database();
	    $this->db->insert('service_type', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_service_type()
	{
		$sql ="select * from service_type ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_service_type_id($id){
		$this->db->select('*');
		$this->db->from('service_type');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function service_type_view($id){
		$this->db->select('*');
		$this->db->from('service_type');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function service_type_edit($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('service_type',$data);
	}
function updt($stat,$id){
	 
		$sql ="update service_type set service_type_status=$stat where id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_service_typelist()
	{
		$sql ="select * from service_type";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_service_type($id,$service_type_image){
		$this->db->where('id', $id);
		unlink("service_type/".$service_type_image);
		$this->db->delete('service_type');	
		}
function delete_mul($ids)//Delete Multiple Service_type
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('id', $did);
			unlink("service_type/".$service_type_image);
			$this->db->delete('service_type');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>