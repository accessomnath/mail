<?php 

class Logo_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_logo($data) {

		$this->load->database();

	    $this->db->insert('logo', $data); 

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function show_logo()

	{

		$sql ="select * from logo ";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	

	function show_logo_id($id){

		$this->db->select('*');

		$this->db->from('logo');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function logo_edit($id, $data, $logo_img){

	

		$this->db->where('id', $id);
		$this->db->update('logo',$data);

	}

	

	function updt($stat,$id){

	

		$sql ="update logo set status=$stat where id=$id ";

		$query = $this->db->query($sql);

		//return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	function show_logolist()

	{

		$sql ="select * from logo";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	

	function delete_logo($id,$logo_img){

		$this->db->where('id', $id);

		unlink("logo/".$logo_img);

		$this->db->delete('logo');	

		}

}

?>

