<?php 
class Seller_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_seller($data) {
		$this->load->database();
	    $this->db->insert('seller', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_seller()
	{
		$sql ="select * from seller ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_seller_id($id){
		$this->db->select('*');
		$this->db->from('seller');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function seller_view($id){
		$this->db->select('*');
		$this->db->from('seller');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function seller_edit($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('seller',$data);
	}
function updt($stat,$id){
	 
		$sql ="update seller set seller_status=$stat where id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_sellerlist()
	{
		$sql ="select * from seller";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_seller($id,$seller_image){
		$this->db->where('id', $id);
		unlink("seller/".$seller_image);
		$this->db->delete('seller');	
		}
function delete_mul($ids)//Delete Multiple Seller
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('id', $did);
			unlink("seller/".$seller_image);
			$this->db->delete('seller');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>