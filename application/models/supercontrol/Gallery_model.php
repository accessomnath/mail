<?php 

class Gallery_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

//============================== Category Related ===================================



function insert_category($data){

		$this->load->database();

	    $this->db->insert('category_gallery', $data); 

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

function show_category_id($id){

		$this->db->select('*');

		$this->db->from('category_gallery');

		$this->db->where('catid', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

function category_edit($id,$datalist){

		$this->db->where('catid', $id);

		$this->db->update('category_gallery',$datalist);

	}	

function show_category(){

		$this->db->select('*');

		$this->db->from('category_gallery');

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

function delete_category($id){

		$this->db->where('catid', $id);

      	$this->db->delete('category_gallery'); 

	}



//============================== Category Related ===================================

public function insert_gallery($data) {

		$this->load->database();

	    $this->db->insert('gallery', $data); 

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

function show_gallery()

	{

		$this->db->select ( '*' ); 

		$this->db->from('gallery');

		$this->db->where('gallery_status',1);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

function show_gallery_id($id){

		$this->db->select('*');

		$this->db->from('gallery');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}





function gallery_edit($id, $data,$old_file){

	

		$this->db->where('id', $id);

		@unlink("gallery/".$old_file);

		$this->db->update('gallery',$data);

	}

function updt($stat,$id){

	 

		$sql ="update gallery set gallery_status=$stat where id=$id ";

		$query = $this->db->query($sql);

		//return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	function gallery_view($id){

		$this->db->select('*');

		$this->db->from('gallery');

		$this->db->where('id', $id);

		$query = $this->db->get();

		return($query->num_rows() > 0) ? $query->result(): NULL;

		

	}

	

	function delete_gallery($id,$gallery_image){

	  $this->db->where('id', $id);

	  unlink("gallery/".$gallery_image);

      $this->db->delete('gallery'); 

	}

function show_gallerylist()

	{

		$sql ="select * from gallery ORDER BY id DESC";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

}

?>