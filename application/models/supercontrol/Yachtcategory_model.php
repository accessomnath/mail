<?php 
class Yachtcategory_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_yachtcategory($data) {
		$this->load->database();
	    $this->db->insert('yacht_category', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}

function show_yachtcategory()
	{
		$sql ="select * from yacht_category ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function show_yachtcategory_id($id){
		$this->db->select('*');
		$this->db->from('yacht_category');
		$this->db->where('cat_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function yachtcategory_view($id){
		$this->db->select('*');
		$this->db->from('yacht_category');
		$this->db->where('cat_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function yachtcategory_edit($id, $data){
		$this->db->where('cat_id', $id);
		$this->db->update('yacht_category',$data);
	}

function updt($stat,$id){
		$sql ="update yacht_category set status=$stat where cat_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function show_yachtcategorylist()
	{
		$sql ="select * from yachtcategory";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function delete_yachtcategory($id,$yachtcategory_image){
		$this->db->where('cat_id', $id);
		$this->db->delete('yacht_category');	
		}

function delete_mul($ids)//Delete Multiple Yachtcategory
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('cat_id', $did);
			$this->db->delete('yacht_category');  
			$count = $count+1;
			}
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>