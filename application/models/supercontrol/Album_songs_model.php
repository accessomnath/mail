<?php

class Album_songs_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        parent::__construct();

    }


    public function insert_album($data)
    {
        $this->db->insert('album', $data);

        if ($this->db->affected_rows() > 1) {
            return true;
        } else {
            return false;
        }

    }

    public function get_albums(){

        $this->db->select('*');
        $this->db->from('album');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }


    public function get_album_by_id($id){

        $this->db->select('*');
        $this->db->from('album');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    public function update_album($data){
        $id = $data['id'];
        $this->db->where('id', $id);
         $this->db->update('album',$data);
       if($this->db->affected_rows()>0)
        {
            return true;
        }

        else {
            return false;
        }

    }

    public function deleteAlbum($id){
        $this->db->where('id', $id);
        $this->db->delete('album');
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else {
            return false;
        }
    }


    public function get_songs(){
        $this->db->select('*');
        $this->db->from('song');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function insert_song($data){
        $this->db->insert('song', $data);
        if ($this->db->affected_rows() > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_song_by_id($id)
    {

        $this->db->select('*');
        $this->db->from('song');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;


    }

    public function update_song($data){

        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('song',$data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }

        else {
            return false;
        }


    }




}