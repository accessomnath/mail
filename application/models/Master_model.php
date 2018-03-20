<?php

class Master_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
    }

    public function add_data($tablename, $data)
    {
        $result = $this->db->insert($tablename, $data);
        return $result;
    }

    public function login($tablename, $data)
    {

        $username = $data['username'];
        $password = $data['password'];
        $sql = 'SELECT * FROM ' . $tablename . ' where admin_username=? AND admin_password=?';
        $query = $this->db->query($sql, array($username, $password));


        $result = $query->result();
        if (count($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function is_otp_verified($tablename, $data)
    {

        $phone = $data['phone_no'];

        $sql = "select is_verified from user where phone_no='$phone'";
        $query = $this->db->query($sql);
        $result = $query->result();
        $otp_verified = $result[0]->is_verified;
        if ($otp_verified == '' | $otp_verified == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_user($tablename, $email)
    {
        $sql = "SELECT * FROM $tablename where email='$email'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0];
    }

    public function get_data($tablename)
    {
        $sql = "SELECT * from $tablename";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function update_data($tablename, $id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update($tablename, $data);
        return $result;
    }

    public function update_on_coll($tablename, $col, $id, $data)
    {
        $this->db->where($col, $id);
        $result = $this->db->update($tablename, $data);
        return $result;
    }

    public function fetchdata($tablename, $id)
    {
        $sql = 'SELECT * FROM ' . $tablename . ' where id=?';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        return $result[0];
    }


    public function fetch_admin_data($tablename, $id)
    {
        $sql = 'SELECT * FROM ' . $tablename . ' where admin_username=?';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        return $result[0];
    }

    public function fetch_admin_data_by_id($tablename, $id)
    {
        $sql = 'SELECT * FROM ' . $tablename . ' where admin_id=?';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        return $result[0];
    }


    public function fetchdesignation($tablename, $id)
    {
        $sql = 'SELECT * FROM ' . $tablename . ' where designation_id=?';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        return $result[0];
    }


    public function fetchalldata($tablename, $column, $id)
    {
        $sql = 'SELECT * FROM ' . $tablename . ' where ' . $column . '=?';
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        return $result;
    }

    public function fetchdata_by_join($table1, $table2, $table1_col_name, $table2_col_name)
    {
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$table1_col_name = $table2.$table2_col_name";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function fetch_but_not_in($table, $where_col, $where_col_id, $column_name, $not_in_id)
    {
        $sql = "select * from $table where $where_col = '$where_col_id' and $column_name NOT IN ($not_in_id)";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function delete_data($tablename, $id)
    {
        $sql = "delete from $tablename where id= $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete_all_data($tablename, $col_name, $id)
    {
        $sql = "delete from $tablename where $col_name= $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function search($pin)
    {
        $sql = "select * from school_details where pincode like '%$pin%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }


    public function check_phone_exist($tablename, $phone)
    {
        $sql = "SELECT * FROM $tablename where phone_no= '$phone'";
        $query = $this->db->query($sql);
        $result = $query->result();
        if (count($result) > 0) {
            return false;
        } else {
            return true;
        }
    }


    public function fetch_single_data_by_join($table1, $table2, $table1_col_name, $table2_col_name, $id)
    {
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$table1_col_name = $table2.$table2_col_name AND $table1.id= $id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0];
    }

    public function email_verification($table_name, $id)
    {
        $sql = "select * from $table_name where token_id= '$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        if (count($result) == 1) {
            $sql = "update $table_name set listing_status = 1 where token_id= '$id'";
            $query = $this->db->query($sql);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function get_std($city_name)
    {

        $sql = "select codes from std_codes where city like '%$city_name%'";
        // echo $sql;
        $query = $this->db->query($sql);
        $result = $query->result();

        if ($result == null) {
            return false;
        } else {

            return $result;

        }


    }

    public function get_matched_profile($id, $transfer_type, $req1, $req2, $req3)
    {

        $sql = "select * from user where transfer_type = '$transfer_type' AND posted_std_code IN ($req1, $req2, $req3) and id !=$id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;

    }


    public function validate_phone($phone)
    {

        $sql = "select count(*) as count from user where phone_no='$phone'";
        $query = $this->db->query($sql);
        $result = $query->result();
        $count = $result[0]->count;
        return $count;

    }

    public function forget_password($phone)
    {

        $sql = "select password,phone_no from user where phone_no='$phone'";
        $query = $this->db->query($sql);
        $result = $query->result();
        if ($result[0]->phone_no == '') {
            return false;
        } else {

            $res_data['password'] = $result[0]->password;
            $res_data['phone'] = $result[0]->phone_no;
            return $res_data;


        }

    }

    public function check_otp_status($tablename, $phone)
    {
        $sql = "select is_verified from $tablename where phone_no='$phone'";
        //echo $sql;
        //die();
        $query = $this->db->query($sql);
        $result = $query->result();
        if ($result[0]->is_verified == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_user_by_phone($phone)
    {

        $sql = "select * from user where phone_no='$phone' ";


        $query = $this->db->query($sql);

        $result = $query->result();
        return $result[0];


    }


}

?>