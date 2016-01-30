<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class UsersStoresRoles extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'users_stores_roles';
    protected $return_type = 'array';

    protected $soft_delete = true;

    public function __construct() {

        parent::__construct();

        $this->before_create[] = 'created_at';
        $this->before_create[] = 'created_by';

        $this->before_create[] = 'updated_at';
        $this->before_create[] = 'updated_by';

        $this->before_update[] = 'updated_at';
        $this->before_update[] = 'updated_by';

        $this->before_delete[] = 'deleted_at';
        $this->before_delete[] = 'deleted_by';

    }

    
    /**
    * Gets the list of all store roles for the user
    * Created on Aug 26, 2015 by Deepak Patil<deepak.patil@relesol.com>
    * Modified on Sep 29, 2015 by Jasdeep Singh <jasdeep.singh@relesol.com>
    * 
    *
    **/
    public function get_users_stores_roles_by_role_id($store_id,$user_id) 
    {
         $this->db->select('name, features');
         $this->db->from('users_stores_roles');
         $this->db->where('user_fk_id', $user_id);
         $this->db->where('str_fk_id', $store_id);
         $query = $this->db->get();
         $result = $query->result();
         return $result; 
    }

     /**
    * Comapre the list of all store roles for the user
    * Created on Sep 29, 2015 by Jasdeep Singh<jasdeep.singh@relesol.com>
    * 
    *
    **/
    public function compare_roles($user_id,$store_id) 
    {
         $this->db->select('id');
         $this->db->from('users_stores_roles');
         $this->db->where('user_fk_id', $user_id);
         $this->db->where('str_fk_id', $store_id);
         $query = $this->db->get();
         $result = $query->result();
         return $result; 
    }


    /**
    * Insert the list of all store roles for the user
    * Created on Sep 29, 2015 by Jasdeep Singh <jasdeep.singh@relesol.com>
    * 
    *
    **/
    public function insert_roles($role_name,$user_id,$store_id,$features) 
    {
         $data = array(
            'name' =>  $role_name,
            'features' => $features,
            'str_fk_id' => $store_id,
            'user_fk_id' => $user_id
        );   

        $insert = $this->db->insert('users_stores_roles', $data);
         echo $this->db->affected_rows();

    }
    
    
     /**
    * Update the list of all roles for the user for a stroe
    * Created on Aug 28, 2015 by Deepak Patil<deepak.patil@relesol.com>
   * Modified on Sep 29, 2015 by Jasdeep Singh <jasdeep.singh@relesol.com>
    * 
    *
    **/
    public function update_roles($role_name,$user_id,$store_id,$features) 
    {

        $data = array(
            'name' =>  $role_name,
            'features' => $features,
            'str_fk_id' => $store_id,
            'user_fk_id' => $user_id
        );   

         $this->db->where('user_fk_id', $user_id);
         $this->db->where('str_fk_id',  $store_id);
         $this->db->update('users_stores_roles', $data);  
         echo $this->db->affected_rows();
    }



}
