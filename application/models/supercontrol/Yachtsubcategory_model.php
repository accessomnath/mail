<?php 
class Yachtsubcategory_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_yachtsubcategory($data) {
		$this->load->database();
	    $this->db->insert('yacht_subcategory', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}

function show_yachtsubcategory()
	{
		$sql ="select * from yacht_subcategory ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_yachtcategory()
	{
		$sql ="select * from yacht_category ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	

function show_yachtcat($pid)
	{
		$sql ="select * from yacht_category where cat_id = $pid limit 1";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	

function show_yachtsubcategory_id($id){
		$this->db->select('*');
		$this->db->from('yacht_subcategory');
		$this->db->where('subcat_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function yachtsubcategory_view($id){
		$this->db->select('*');
		$this->db->from('yacht_subcategory');
		$this->db->where('subcat_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function yachtsubcategory_edit($id, $data){
		$this->db->where('subcat_id', $id);
		$this->db->update('yacht_subcategory',$data);
	}

function updt($stat,$id){
		$sql ="update yacht_subcategory set status=$stat where subcat_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function show_yachtsubcategorylist()
	{
		$sql ="select * from yachtsubcategory";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function delete_yachtsubcategory($id,$yachtsubcategory_image){
		$this->db->where('subcat_id', $id);
		$this->db->delete('yacht_subcategory');	
		}

function delete_mul($ids)//Delete Multiple Yachtsubcategory
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('subcat_id', $did);
			$this->db->delete('yacht_subcategory');  
			$count = $count+1;
			}
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>