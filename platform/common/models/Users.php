<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'users';
    protected $return_type = 'array';

    protected $soft_delete = true;

    public function __construct() {

        parent::__construct();

        $this->load->config('users');
        $this->load->helper('current_user');

        $this->user_id_getter = 'user_id_getter_for_models';

        $this->before_create[] = 'created_at';
        $this->before_create[] = 'created_by';

        $this->before_create[] = 'updated_at';
        $this->before_create[] = 'updated_by';

        $this->before_update[] = 'updated_at';
        $this->before_update[] = 'updated_by';

        $this->before_delete[] = 'deleted_at';
        $this->before_delete[] = 'deleted_by';

        $this->before_create[] = 'store_password';
        $this->before_update[] = 'store_password';
    }

    public function get_by_username_or_email($username_or_email) {

        return $this
            ->group_start()
                ->where('username', $username_or_email)
               /* ->or_where('email', $username_or_email)*/
            ->group_end()
            ->first();
    }

    public function username_min_length() {

        $result = (int) config_item('username_min_length');

        if ($result < 2) {
            $result = 2;
        }

        return $result;
    }

    public function username_max_length() {

        $result = (int) config_item('username_max_length');

        $username_min_length = $this->username_min_length();

        if ($result < $username_min_length) {

            $result = $username_min_length;

            if ($result < $username_min_length + 22) {
                $result = $username_min_length + 22;
            }
        }

        return $result;
    }

       public function valid_username($username) 
	{

        if (UTF8::strlen($username) < $this->username_min_length()) {
            return false;
        }

        if (UTF8::strlen($username) > $this->username_max_length()) {
            return false;
        }

        $username_validator = (string) config_item('username_validator');

        if ($username_validator != '') {
            return (bool) preg_match($username_validator, $username);
        }
        
		echo '1';
        return true;
    }

    public function unique_username($username, $id = null, $with_deleted = false) {

        $username = (string) $username;
        
		 $check =  $this->valid_username($username);
	
        if ($username == '') {
            return false;
        }
		

        $this->select('id')->where('username', $username);

        if ($id != '') {
            $this->where($this->primary_key.' <>', (int) $id);
        }

        if ($with_deleted) {
            $this->with_deleted();
        }

        $found = $this->first();

        return empty($found);
    }

    public function create_username($id = null) {

        $min_length = $this->username_min_length();
        $max_length = $this->username_max_length();

        if ($id != '') {

            $result = 'user'.$id;

            if (
                UTF8::strlen($result) >= $min_length
                &&
                UTF8::strlen($result) <= $max_length
                &&
                $this->unique_username($result, null, true)
            ) {
                return $result;
            }
        }

        $length = rand($min_length, $max_length);

        $chars = 'abcdefghijklmnopqrstuvwxyz';
        $chars_length = strlen($chars);

        do {

            $result = '';

            for ($i = 0; $i < $length; $i++) {
                $result .= $chars[mt_rand(0, $chars_length)];
            }

        } while (!$this->unique_username($result, null, true));

        return $result;
    }

    public function unique_email($email, $id = null, $with_deleted = false) {

        $email = (string) $email;

        if ($email == '') {
            return false;
        }

        $this->select('id')->where('email_id', $email);

        if ($id != '') {
            $this->where($this->primary_key.' <>', (int) $id);
        }

        if ($with_deleted) {
            $this->with_deleted();
        }

        $found = $this->first();

        return empty($found);
    }

    public function password_min_length() {

        $result = (int) config_item('password_min_length');

        if ($result < 6) {
            $result = 6;
        }

        return $result;
    }

    public function create_password() {

        $this->load->library('password');

        $min_length = $this->password_min_length();
        $max_length = $min_length + 2;

        return $this->password->create($min_length, $max_length);
    }

    public function protect_password($password) {

        $this->load->library('password');

        return $this->password->hash($password);
    }

    public function verify_password($password, $password_derivate) {

        $this->load->library('password');

        return $this->password->verify($password, $password_derivate);
    }

    public function change_password($id, $password) {

        $this->skip_observers()->update((int) $id, array('password' => $this->protect_password($password)));
    }

    protected function store_password($data) {

         if (isset($data['password'])) 
         {
            $data['password'] = $this->protect_password($data['password']);
         }

        return $data;
    }

    public function verified($id) {

        return $this->select('verified_at')->as_value()->get((int) $id) != '';
    }

    public function set_verified($id) {

        $this->skip_observers()->update((int) $id, array('verified_at' => date('Y-m-d H:i:s')));
    }

    public function unset_verified($id) {

        $this->skip_observers()->update((int) $id, array('verified_at' => null));
    }

    /**
     * Gets the URL of a user's photo/avatar.
     * @see User_photo::get()
     */
    public function photo($user, $options = null) {

        $this->load->model('user_photo');

        return $this->user_photo->get($user, $options);
    }

    // Use the following methods outside cycles for not increasing database
    // queries number too much, use them for testing for example..
    //
    // For getting several properties simultaneously the following example is more effective:
    //
    // $user = $this->select('username, email')->with_deleted()->get((int) $id);
    // if (!empty($user)) {
    //     var_dump($user['username']);
    //     var_dump($user['email']);
    // }

    public function username($id) {

        return $this->select('username')->with_deleted()->as_value()->get((int) $id);
    }

    public function email($id) {

        return $this->select('email')->with_deleted()->as_value()->get((int) $id);
    }

    public function first_name($id) {

        return $this->select('first_name')->with_deleted()->as_value()->get((int) $id);
    }

    public function middle_name($id) {

        return $this->select('middle_name')->with_deleted()->as_value()->get((int) $id);
    }

    public function last_name($id) {

        return $this->select('last_name')->with_deleted()->as_value()->get((int) $id);
    }
    
    /**
    * Gets the list of all users
    * Created on Aug 14, 2015 by Deepak Patil<deepak.patil@relesol.com>
    * 
    *
    **/
    public function get_all_users() {

        return $this->select('*')->where('first_name !=',' ')->where('active','1')->limit(10000)->as_array()->find();
        return $this->select(' * ')->as_value()->get();
    }
	
	 public function get_all_users_list() {

        return $this->select('*')->where('first_name !=',' ')->limit(10000)->as_array()->find();
        return $this->select(' * ')->as_value()->get();
    }



 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of user using user id
     * @created_at: Sept 23, 2015     
     **/

        public function createUsers()
     {
        $this->load->library('password');
		$s = $this->input->post('email_id_');
		$screen = explode('@',$s);
		$screen_name = $screen[0];
		
        $hash_password =  $this->password->hash($this->input->post('password'));
        $users_insert_data = array(
          'username' => $this->input->post('username'),
          'password' => $hash_password,
          'created_at' => $this->input->post('date'),
		  'email_id' => $this->input->post('email_id_'),
		  'screen_name' => $screen_name,
		  'first_name' => $this->input->post('first_name'),
		  'last_name' => $this->input->post('last_name'),
		  'photo' => $this->input->post('file_name'),    
          'active' => $this->input->post('status')                       
        );
        
        $insert = $this->db->insert('users', $users_insert_data);
		$last_id = $this->db->insert_id();
        return $last_id;
    }



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Detail the list of user using user id
     * @created_at: Sept 23, 2015     
     **/


      public function getUsersDetail($id)
     {
        $this->db->select('*');
        $this->db->from('users AS u');
        $this->db->where('u.id', $id);
		$this->db->join('social_users AS s', 'u.id = s.user_id ','LEFT');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Detail the list of user using store id for store manager
     * @created_at: Octobar 13, 2015     
     **/


       public function getUsersStoresDetail($id)
     {
        $this->db->select('*');
        $this->db->from('users_stores_roles as us');
        $this->db->join('users AS u', 'u.id = us.user_fk_id ','LEFT');
        $this->db->where('str_fk_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of user using user id
     * @created_at: Sept 23, 2015     
     **/


         public function updateUsers()
       {
        
        $id= $this->input->post('user_id');
		
        $this->load->library('password');
		$s = $this->input->post('email_id_');
		$screen = explode('@',$s);
		$screen_name = $screen[0];
	            	$file = $this->input->post('file_name');
					if($file == 'undefined')
					{
					 $files = $this->input->post('user_photo');    
					}
					else
					{
						$files = $this->input->post('file_name');
					}
        $hash_password =  $this->password->hash($this->input->post('password'));
		
      $users_insert_data = array(
          'username' => $this->input->post('username'),
          'password' => $hash_password,
          'updated_at' => $this->input->post('date'),
		  'email_id' => $this->input->post('email_id_'),
		  'screen_name' => $screen_name,
		  'first_name' => $this->input->post('first_name'),
		  'last_name' => $this->input->post('last_name'),
		  'photo' => $files,    
          'active' => $this->input->post('status')                       
        );

                  $this->db->where('id', $id);
                  $this->db->update('users', $users_insert_data);
                  return $id;
    }



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of user using user id
     * @created_at: Sept 22, 2015     
     **/

         public function deleteUser($id){
            $data = array(
                      'deleted'  => 1 ,
                      'active'  => 1 ,
                      'deleted_by' => 1 
                           );  
            $this->db->where('id', $id);
            $this->db->update('users', $data);
      }



      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Un Delete the list of user using user id
     * @created_at: Sept 22, 2015      
     **/

         public function unDeleteUser($id){
            $data = array(
                      'deleted'  => 0 ,
                      'deleted_by' => 0 
                           );  
            $this->db->where('id', $id);
             $this->db->update('users', $data);
      }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of User  Active
     * @created_at: Sept 22, 2015     
     **/

         public function statusUser($id){
              $data = array(
                      'active' => 1 
                           );  
                   $this->db->where('id', $id);
                    $this->db->update('users', $data);
      }

   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of User InActive
     * @created_at: Sept 22, 2015     
     **/

       public function statusUserIn($id){
              $data = array(
                     'active' => 0 
                        ); 
                   $this->db->where('id', $id);
                  $this->db->update('users', $data);
     }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: get the username for store index page 
     * @created_at: Octobar 1, 2015     
     **/


         public function getUsersName()
      {
       
              $this->db->select('s.user_id, u.username as users_name');
              $this->db->from('stores as s');
              $this->db->join('users AS u', 's.user_id = u.id ','LEFT');
              $query = $this->db->get();
              $result = $query->result();
              return $result;
      }


}
