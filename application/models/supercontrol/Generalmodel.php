<?php 
class Generalmodel extends CI_Model{
	function __construct() {
        parent::__construct();
   }   
	//=============== Select , Select by id , insert , update , delete ====================================================
	public function record_count($tablename,$primary_key,$wheredata) {
		if($wheredata!=''){
		$this->db->where(array($primary_key => $wheredata));
		}
		$result=$this->db->count_all_results($tablename);
		//$result= $this->db->from($tablename);
		return $result;
		/*$this->db->where($primary_key,$wheredata);
		$query = $this->db->get();
		foreach($query->result() as $r){
			return $r->rows;
		}*/
    }
	
	public function record_count_search($tablename,$primary_key,$likefield,$wheredata,$allias) {
		//echo ">>>".$primary_key;
		//echo "  =========.".$wheredata;
		if($primary_key==''){
			$this->db->like($likefield, $allias, 'after');
			$result=$this->db->count_all_results($tablename);
			return $result;
		}else{
			$this->db->where(array($primary_key => $wheredata));
			$this->db->like($likefield, $allias, 'after');
			$result=$this->db->count_all_results($tablename);
			return $result;
		}
		
		
    }
	
	
	
	
	public function record_count_searchnew($tablename,$primary_key1,$primary_key2,$likefield,$wheredata1,$wheredata2,$allias) {
		$this->db->where(array($primary_key1 => $wheredata1));
		$this->db->where(array($primary_key2 => $wheredata2));
		if($likefield!=''){
			$this->db->like($likefield, $allias, 'after');
		}
		$result=$this->db->count_all_results($tablename);
		return $result;
	}
	
	public function getAllData($table_name,$primary_key,$wheredata,$limit,$start){
		if(@$limit!='' || @$start!=''){
			$this->db->limit($limit, $start);
		}
		$this->db->select ('*'); 
		$this->db->from($table_name);
		if($primary_key=='' && $wheredata==''){
			$where='1=1';
		}else{
			$this->db->where($primary_key,$wheredata);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	
	}
	
	public function getAllDatadist($table_name,$primary_key,$wheredata,$limit,$start){
		if(@$limit!='' || @$start!=''){
			$this->db->limit($limit, $start);
		}
		$this->db->distinct();
		$this->db->select ($primary_key); 
		$this->db->from($table_name);
		
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	
	}
	
	
	function getSearchData($table_name,$primary_key,$likefield,$wheredata,$limit,$start,$allias){
		//================*********************=====================
		if(@$limit!='' || @$start!=''){
			$this->db->limit($limit, $start);
		}
		$this->db->select ('*'); 
		$this->db->from($table_name);
		if($primary_key=='' && $wheredata==''){
			$where='1=1';
		}else if($primary_key=='' || $wheredata==''){
			$where='1=1';
		}else{
			$this->db->where($primary_key,$wheredata);
		}
		$this->db->like($likefield, $allias, 'after');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		//================*********************=====================
	}	
	
	//function getSearchDataWine1($table_name,$primary_key1,primary_key2,$wheredata1,$wheredata1,$limit,$start){
	function getSearchDataWine($table_name,$primary_key1,$primary_key2,$wheredata1,$wheredata2,$limit,$start,$allias){
		//==========================================================
		/*echo ">>".$table_name;
		echo ">>".$primary_key1;
		echo ">>".$primary_key2;
		echo ">>".$wheredata1;
		echo ">>".$wheredata1;
		echo ">>".$limit;
		echo ">>".$start;*/
		//==========================================================
		//================*********************=====================
		$this->db->select ('*'); 
		$this->db->from($table_name);
		$this->db->where($primary_key1,$wheredata1);
		$this->db->where($primary_key2,$wheredata2);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		//================*********************=====================
	}	
	
	public function fetch_videos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("video");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
	/*public function fetch_videos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("video");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }*/
   
   
	public function show_data_id($table_name,$id,$fieldname,$action,$data){
		if($action=='get'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
	if($action=='insert'){
		$return = $this->db->insert($table_name, $data);
		if ((bool) $return === TRUE) {
			return $this->db->insert_id();
		}else {
			return $return;
		}       
	}
	if($action=='update'){
		$this->db->where($fieldname, $id);
		$return=$this->db->update($table_name, $data);
		return $return;
	}
	if($action=='delete'){
		$this->db->where($fieldname, $id);
		$this->db->delete($table_name);
	}
}
	//=============== Select , Select by id , insert , update , delete ====================================================
	//=============== Select , Select by id By Limit =======================================================================
	public function show_data_id_limit($table_name,$id,$fieldname,$order,$limit,$action,$data){
		if($action=='get_limit'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
				$this->db->order_by($fieldname, $order);
				$this->db->limit($limit,0);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->order_by($fieldname, $order);
				$this->db->limit($limit,0);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
	}
	
	//=============== Select , Select by id By Limit =======================================================================
	 
	//================ Join of 2 tables ======================================================================================
	
	public function dynamic_join($table_name,$id,$fieldname,$table_name2,$fieldname2,$fieldname3,$action,$data){
	 if($action=='join'){
		if(($id !='') && ($fieldname!='')&& ($data=='')) {
				$this->db->select ( '*' ); 
				$this->db->from($table_name);
				$this->db->join($table_name2, $table_name.".".$fieldname .'='. $table_name2.".".$fieldname2);
				$this->db->where($table_name.".".$fieldname3, $id);
			}else{
				$this->db->select ( '*' ); 
				$this->db->from($table_name);
				$this->db->join($table_name2, $table_name .".". $fieldname .'='. $table_name2 .".". $fieldname2);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
			}
		}
	//================ Join of 2 tables ======================================================================================
	//================ Join of 2 tables by limit======================================================================================	
	public function dynamic_join_limt($table_name,$id,$fieldname,$table_name2,$fieldname2,$fieldname3,$order,$limit,$action,$data){
	 if($action=='join'){
		if(($id !='') && ($fieldname!='')&& ($data=='')){
			$this->db->select ('*'); 
			$this->db->from($table_name);
			$this->db->join($table_name2, $table_name.".".$fieldname .'='. $table_name2.".".$fieldname2);
			$this->db->where($table_name.".".$fieldname3, $id);
			$this->db->order_by($table_name.".".$fieldname3, $order);
			$this->db->limit($limit,0);
			}else{
				$this->db->select ( '*' ); 
				$this->db->from($table_name);
				$this->db->join($table_name2, $table_name .".". $fieldname .'='. $table_name2 .".". $fieldname2);
				$this->db->order_by($table_name.".".$fieldname3, $order);
				$this->db->limit($limit,0);
			}
				$query = $this->db->get();
				$result = $query->result();
				return $result;
			}
		}	
	//================ Join of 2 tables by limit======================================================================================	
	public function common_function($table_name,$id,$fieldname,$action,$data){
		if($action=='get'){
			if(($id !='') && ($fieldname!='')&& ($data=='')){
				$this->db->select ('*'); 
				$this->db->from($table_name);
				$this->db->where($fieldname,$id);
			}else{
				$this->db->select ('*'); 
				$this->db->from($table_name);
			}
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}
		if($action=='insert'){
			$return = $this->db->insert($table_name, $data);
			if ((bool) $return === TRUE) {
				return $this->db->insert_id();
			}else {
				return $return;
			}       
		}
		if($action=='update'){
			$this->db->where($fieldname, $id);
			$return=$this->db->update($table_name, $data);
			return $return;
		}
		if($action=='delete'){
			$this->db->where($fieldname, $id);
			$this->db->delete($table_name);
		}
	}
}

?>

