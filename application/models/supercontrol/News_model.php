<?php 
class News_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_news($data) {
		$this->load->database();
	    $this->db->insert('news', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_news()
	{
		$sql ="select * from news ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function show_country(){
		$this->db->select('*');
		$this->db->from('country');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function show_category(){
		$this->db->select('*');
		$this->db->from('news_category');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_news_id($id){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_comment($id){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('news_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
		
function news_edit($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('news',$data);
	}
function updt($stat,$id){
	 
		$sql ="update news set news_status=$stat where id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_newslist()
	{
		$sql ="select * from news";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_news($id,$news_image){
		$this->db->where('id', $id);
		unlink("uploads/news/".$news_image);
		$this->db->delete('news');	
		}
function delete_mul($ids)//Delete Multiple News
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('id', $did);
			unlink("uploads/news/".$news_image);
			$this->db->delete('news');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item Deleted Successfully
			</div>';
			$count = 0;		
		}
	}
?>