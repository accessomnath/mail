<?php 
class Location_model extends CI_Model{
	private $category = 'category';
	function __construct() {
        parent::__construct();
   }
public function insert_location($data) {
		$this->load->database();
	    $this->db->insert('category', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
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
					//$html .= "<hr>";
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }

	//=======================BUILDING OF MENU======================
	
	//=======================BUILDING Category and sub category======================
		public function category_menu_category() {
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
            $result = $this->build_category_category(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }
    	// Menu builder function, parentId 0 is the root
    	function build_category_category($parent, $menu) {
			
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "<ul class='breadcrumb'>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $html .= "<li>".$menu['items'][$itemId]->category_name."</li>";
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= "<li>".$menu['items'][$itemId]->category_name."";
                    $html .= $this->build_category_category($itemId, $menu);
				  	//$html .= "<hr>";
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    
	   }

	//=======================BUILDING Category and sub category======================
	public function getCategories() {
        $query = $this->db->get_where('category', array('parent_id' => 0));
        return $query->result();
    }
    function getSubcategories($cat_id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where(array('parent_id' => $cat_id));
        $query = $this->db->get();
        return $query->result();
    } 
	
/*function show_location_main(){
		$sql ="select * from np_locationcategory_details WHERE pid=0";
		//$this->db->where('pid', 0);
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_location_sub($id)
	{
		$sql ="select * from np_locationcategory_details";
		$this->db->where('pid', $id);
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}*/
	
function show_location()
	{
		$sql ="select * from category ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
	
function show_news_id($id){
		$this->db->select('*');
		$this->db->from('np_news');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
function news_edit($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('np_news',$data);
	}
function updt($stat,$id){
	 
		$sql ="update np_news set news_status=$stat where id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_newslist()
	{
		$sql ="select * from np_news";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_news($id,$news_image){
		$this->db->where('id', $id);
		unlink("news/".$news_image);
		$this->db->delete('np_news');	
		}
function delete_mul($ids)//Delete Multiple News
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('id', $did);
			unlink("news/".$news_image);
			$this->db->delete('np_news');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>