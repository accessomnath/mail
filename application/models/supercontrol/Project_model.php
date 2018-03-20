<?php 
class Project_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_project($data) {
		$this->load->database();
	    $this->db->insert('project', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_project()
	{
		$sql ="select * from project ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
function show_project_join()
	{
		$this->db->select('project.*,project_type.*');
		$this->db->from('project');
		$this->db->join('project_type', 'project.type_id = project_type.id order by project.project_id DESC');
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	
	
function show_project_id($id){
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_project_type_id($id){
		$this->db->select('*');
		$this->db->from('project_type');
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function show_project_type(){
		$this->db->select('*');
		$this->db->from('project_type');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function project_view($id){
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('project_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function project_view_join($id){
		$this->db->select('project.*,project_type.*');
		$this->db->from('project');
		$this->db->join('project_type', 'project_type.id = project.type_id');
		$this->db->where('project.project_id', $id);
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}


function project_edit($id, $data){
	
		$this->db->where('project_id', $id);
		$this->db->update('project',$data);
	}
function updt($stat,$id){
	 
		$sql ="update project set project_status=$stat where project_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_projectlist()
	{
		$sql ="select * from project";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_project($id,$project_image){
		$this->db->where('project_id', $id);
		@unlink("project/".$project_image);
		$this->db->delete('project');	
		}
function delete_mul($ids)//Delete Multiple Project
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('project_id', $did);
			unlink("project/".$project_image);
			$this->db->delete('project');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>