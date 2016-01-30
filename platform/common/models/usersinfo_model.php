<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usersinfo_model extends core_Model
 {

     
     
    public function get_usersinfo_by_id($id)
    {
               
         $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result[0];
    }


     public function get_users_following($id)

    {
               
        $this->db->select('*');
        $this->db->from('users_followers as uf');
        $this->db->where('uf.user_id', $id);
        $this->db->where('uf.status', '1');
        $this->db->join("users as u","u.id = uf.follower_id","inner");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }

    public function get_users_follower($id)
    {
               
        $this->db->select('*');
        $this->db->from('users_followers as uf');
        $this->db->where('uf.follower_id', $id);
        $this->db->where('uf.status', '1');
        $this->db->join("users as u","u.id = uf.user_id","inner");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }


   public function get_users_collection($id)
    {
               
        $this->db->select('*');
        $this->db->from('collections');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }



    public function get_vote_collection($id)
    {
               
        $this->db->select('*');
        $this->db->from('votes as v');
        $this->db->where('v.user_id', $id);
       // $this->db->where('s.is_approved', '1');
        $this->db->where('v.section_type', '0');
        $this->db->where('v.voted_type', '1');
        $this->db->join("collections as c","c.id = v.section_type_id","inner");
        $this->db->order_by("added_date", "desc");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    } 

      
}
?>