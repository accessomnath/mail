<?php

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_contact($data)
    {
        $this->load->database();
        $this->db->insert('user_contact', $data);
        if ($this->db->affected_rows() > 1) {
            return true;
        } else {
            return false;
        }
    }

    function select_map()
    {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('id', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function user_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        $data = $query->result();
        if ($data == null) {
            return false;

        } else {

            $created_date = date("d-m-Y", strtotime($data[0]->created_at));

            $plan = $data[0]->cust_plan;

//            var_dump($data);
//            die();

            $next_due_date = date('d-m-Y', strtotime($created_date . ' +'. $plan .'days'));

            $next_due_date = strtotime($next_due_date);
            $todays_date = strtotime(date('d-m-Y'));

            if ($todays_date > $next_due_date) {
                $id = $data[0]->id;
                $sql = "delete from users where id = $id";
                $query = $this->db->query($sql);
                return false;
            } else {

                return $query->result();
            }
        }
    }

    function exco_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user_registration');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        //$this -> db -> where('user_type',$user_type);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();

    }

    function show_sesname($sesid)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('uid', $sesid);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
