<?php 
class Product_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_product($data) {
		$this->load->database();
	    $this->db->insert('productlist', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_product()
	{
		$sql ="select * from productlist ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function multi_img($id){
		$this->db->select('*');
		$this->db->from('product_images');
		$this->db->where('pid', $id);
		$query = $this->db->get();
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
	
function show_product_join()
	{
		$this->db->select('productlist.*,product_category.*');
		$this->db->from('productlist');
		$this->db->join('product_category', 'productlist.catid = product_category.catid');
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_product_multi_image($id){
		$sql ="select * from product_images where pid = '".$id."'";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}		
function product_images($id){
		$this->db->select('*');
		$this->db->from('product_images');
		$this->db->where('pid', $id);
		$query = $this->db->get();
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
function delete_product_img($id,$apartment_image){
	  $this->db->where('pmid', $id);
	  @unlink("uploads/".$product_img);
      $this->db->delete('product_images'); 
	}		
function show_product_id($id){
		$this->db->select('*');
		$this->db->from('productlist');
		$this->db->where(pid, $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_product_type_id($id){
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where(pid, $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function show_product_type(){
		$this->db->select('*');
		$this->db->from('product_category');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function product_view($id){
		$this->db->select('*');
		$this->db->from('productlist');
		$this->db->where(pid, $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function product_viewjoin($id){
	$this->load->database();
	$this->db->select ( '*' ); 
	$this->db->from('productlist');
	$this->db->join('product_category', 'productlist.catid = product_category.catid');
	$this->db->where('productlist.pid', $id);
	$query = $this->db->get();
	return $query->result();
	return($query->num_rows() > 0) ? $query->result(): NULL;
	}

function product_edit($id, $data){
	
		$this->db->where(pid, $id);
		$this->db->update('productlist',$data);
	}
function updt($stat,$id){
	 
		$sql ="update productlist set product_status='$stat' where pid=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_productlist()
	{
		$sql ="select * from productlist";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_product($id,$product_image){
		$this->db->where(pid, $id);
		@unlink("product/".$product_image);
		$this->db->delete('productlist');	
		}
function delete_mul($ids)//Delete Multiple Product
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where(pid, $did);
			unlink("product/".$product_image);
			$this->db->delete('productlist');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>