<?php 
class Yacht_model extends CI_Model{
	private $category = 'category';
	function __construct() {
        parent::__construct();
   }
public function insert_yacht($data) {
		$this->load->database();
	    $this->db->insert('yacht', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
	
	function show_country(){
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by('country_name','asc'); 
		$query=$this->db->get();
		return $query; 
	}
	
function show_yachtcategory()
	{
		$sql ="select * from yacht_category ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
function show_yachtsubcategory()
	{
		$sql ="select * from yacht_subcategory ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	
function select_subcat($id)
	{
		$sql ="select * from yacht_subcategory where cat_id = $id";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
function show_yachtcat($pid)
	{
		$sql ="select * from yacht_category where cat_id = $pid limit 1";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}		

function show_yachtsubcat($sid)
	{
		$sql ="select * from yacht_subcategory where subcat_id = $sid limit 1";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}		
	
	function show_cntry_id($country_id){
		$this->db->select('country_name');
		$this->db->from('countries');
		$this->db->where('country_id', $country_id); 
		$this->db->order_by('country_id', 'asc');
		$this->db->limit('1,0');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function show_yacht_multi_image($id){
		$sql ="select * from multi_img where yacht_id = '".$id."'";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
	
	function show_yacht_multi_img($id){
		$sql ="select * from multi_img where id = '".$id."'";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
	
function show_yacht()
	{
		$sql ="select * from yacht ORDER BY yid DESC";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
	function show_yachtjoin()
	{
		$this->db->select('yacht.*,yacht_type.*');
		$this->db->from('yacht');
		$this->db->join('yacht_type', 'yacht_type.yacht_type_id = yacht.pid'); 
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function show_yacht_type(){
		$this->db->select('*');
		$this->db->from('yacht_type');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function show_cntry(){
		$this->db->select('*');
		$this->db->from('countries');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
		//=======================BUILDING OF MENU======================
		public function category_menu() {
        // Select all entries from the menu table
        $query = $this->db->query("select category_id, category_name,
            parent_id from " . $this->category . " order by category_id");

        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->category_id] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->parent_id][] = $cats->category_id;
        }

        if ($cat) {
            $result = $this->build_category_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }
    	// Menu builder function, parentId 0 is the root
    	function build_category_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "<ul class='topul'>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $html .= "<li><input type='radio' class='catlist' name='pid' value=".$menu['items'][$itemId]->category_id." style='margin-left: -10px;'>". $menu['items'][$itemId]->category_name."</span></a></li>";
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= "<li><input type='radio' name='pid' class='catlist' value=".$menu['items'][$itemId]->category_id." style='margin-left: -10px;'><span>" . $menu['items'][$itemId]->category_name . "</span>";
                    $html .= $this->build_category_menu($itemId, $menu);
					$html .= "<hr>";
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }

	//=======================BUILDING OF MENU======================
	
function show_id($id){
		$this->db->select('*');
		$this->db->from('yacht');
		$this->db->where('yid', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
function yacht_edit($id, $data){
	
		$this->db->where('yid', $id);
		//@unlink("yacht/".$old_file);
		$this->db->update('yacht',$data);
	}
function updt($stat,$id){
	 
		$sql ="update yacht set yacht_status=$stat where yid=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	function yacht_view($id){
		$this->db->select('*');
		$this->db->from('yacht');
		$this->db->where('yid', $id);
		$query = $this->db->get();
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
	
	function multi_img($id){
		$this->db->select('*');
		$this->db->from('multi_img');
		$this->db->where('yacht_id', $id);
		$query = $this->db->get();
		return($query->num_rows() > 0) ? $query->result(): NULL;
		
	}
	
	function yacht_viewjoin($id){
	$this->load->database();
	$this->db->select ( '*' ); 
	$this->db->from('yacht');
	$this->db->join('yacht_type', 'yacht.pid = yacht_type.yacht_type_id');
	//$this->db->join('multi_img', 'multi_img.yacht_id = yacht.id');
	$this->db->where('yacht.yid', $id);

/*$this->db->select('yacht.*,category.*,multi_img.*');    
$this->db->from('yacht');
$this->db->join('category', 'yacht.pid = category.category_id');
$this->db->join('multi_img', 'yacht.id = multi_img.yacht_id');
$this->db->where('yacht.id', $id);*/
$query = $this->db->get();
//$query = $this->db->get();
return $query->result();
return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
	function delete_yacht($id){
	  $this->db->where('yid', $id);
	 // unlink("yacht/".$yacht_image);
      $this->db->delete('yacht'); 
	}
	
	function delete_yacht_img($id,$apartment_image){
	  $this->db->where('yid', $id);
	  @unlink("yacht_img/".$apartment_image);
      $this->db->delete('multi_img'); 
	}
function show_yachtlist()
	{
		$sql ="select * from yacht ORDER BY yid DESC";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
}
?>