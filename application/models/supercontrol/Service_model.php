<?php 
class Service_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_service($data) {
		$this->load->database();
	    $this->db->insert('service', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_service()
	{
		$sql ="select * from service ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
function show_service_join()
	{
		$this->db->select('service.*,service_type.*');
		$this->db->from('service');
		$this->db->join('service_type', 'service.type_id = service_type.id order by service.service_id DESC');
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	
	
function show_service_id($id){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('service_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_service_type_id($id){
		$this->db->select('*');
		$this->db->from('service_type');
		$this->db->where('service_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function show_service_type(){
		$this->db->select('*');
		$this->db->from('service_type');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function service_view($id){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('service_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function service_view_join($id){
		$this->db->select('service.*,service_type.*');
		$this->db->from('service');
		$this->db->join('service_type', 'service_type.id = service.type_id');
		$this->db->where('service.service_id', $id);
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}


function service_edit($id, $data){
	
		$this->db->where('service_id', $id);
		$this->db->update('service',$data);
	}
function updt($stat,$id){
	 
		$sql ="update service set service_status=$stat where service_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_servicelist()
	{
		$sql ="select * from service";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_service($id,$service_image){
		$this->db->where('service_id', $id);
		@unlink("service/".$service_image);
		$this->db->delete('service');	
		}
function delete_mul($ids)//Delete Multiple Service
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('service_id', $did);
			unlink("service/".$service_image);
			$this->db->delete('service');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>