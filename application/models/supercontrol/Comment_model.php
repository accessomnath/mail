<?php 
class Comment_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
function show_comment()
	{
		$this->db->select('comment.*,news.*');
		$this->db->from('comment');
		$this->db->join('news', 'comment.news_id = news.id');
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}		
function updt($stat,$id){
	 
		$sql ="update comment set comment_status=$stat where comment_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_comment($id,$news_image){
		$this->db->where('comment_id', $id);
		$this->db->delete('comment');	
		}
function delete_mul($ids)//Delete Multiple News
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('comment_id', $did);
			$this->db->delete('comment');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item Deleted Successfully
			</div>';
			$count = 0;		
		}
	}
?>