<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class User_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
		 $this->load->helper(array('collectiontitle'));
    }

        public function index() 
    {
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Users', '/users');
        $data["allUsers"] = $this->users->get_all_users_list();
        $this->template
            ->build(config_item('current_theme_path').'users_list', $data);
    }

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create the list of User
     * @created_at: Sept 23, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

          public function create()
	 {
        
         $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
         $this->breadcrumbs->push('Users', '/users');
         $this->breadcrumbs->push('Create', '/users/create');
         $this->load->model('Users');
         $this->template->build(config_item('current_theme_path').'users_add');
    }
	
	
	/**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create the list of User
     * @created_at: Sept 23, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

          public function user_add()
	 {
        
                                $this->load->model('Users');
                                  if ($this->input->post())
					       {
						    /* echo '<pre>';print_r($this->input->post()); die();*/
					    $file_name = $this->input->post('file_name');
						if($file_name == 'undefined')
						{
						   	 echo '0';
						}
						else
						{
								$query = $this->Users->createUsers();
								$user_id = $query;
						}
			if(!empty($user_id))	
			{		
						$today = date("Y-m-d H:i:s");
			    	
				 	$new_user_insert_data_twitter = array(
						 'user_id' => $user_id,
						 'firstName' => $this->input->post('first_name'),
		                 'lastName' => $this->input->post('last_name'),
						 'email' => $this->input->post('email_id_'),
						 'status' => 1,
						 'twitter_identifier' => $this->input->post('twitter'),
						 'facebook_identifier' => $this->input->post('facebook'),               
					);	
					
					$this->db->insert('social_users', $new_user_insert_data_twitter);		
					$last_row = $this->db->affected_rows();
					if(!empty($last_row))
					{ echo $user_id;}else{ echo '0';}
					     
			}
					   }     
					   else
					   {
						   echo '0';
					   }
    }
	
	
	               public function user_update()
	 {
        
                                $this->load->model('Users');
                                  if ($this->input->post())
					       {
						    /* echo '<pre>';print_r($this->input->post()); die();*/
								$file_name = $this->input->post('file_name');
								$users = $this->input->post('user_id');
								$query = $this->Users->updateUsers();
								$user_id = $query;
			if(!empty($users))	
			{		
						$today = date("Y-m-d H:i:s");
			    	
				 	$new_user_insert_data_twitter = array(
						 'user_id' => $users,
						 'firstName' => $this->input->post('first_name'),
		                 'lastName' => $this->input->post('last_name'),
						 'email' => $this->input->post('email_id_'),
						 'status' => 1,
						 'twitter_identifier' => $this->input->post('twitter'),
						 'facebook_identifier' => $this->input->post('facebook'),               
					);	
				    $this->db->where('user_id', $users);
					$this->db->update('social_users', $new_user_insert_data_twitter);		
					$last_row = $this->db->affected_rows();
								if(!empty($user_id))
								{ 
								  echo $user_id;
								 }
								else
								{ 
								echo '0';
								}
					     
			}
					   }     
					   else
					   {
						   echo '0';
					   }
    }
	
	



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of User
     * @created_at: Sept 23, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/



        public function update($id)
    {
         $this->load->library('form_validation');
         $this->load->model('Users');
         $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
         $this->breadcrumbs->push('Users', '/users');
         $this->breadcrumbs->push('Update', '/users/update');
         $users['single_user'] = $this->Users->getUsersDetail($id);
		 $users['single_user_id'] = $id;

        $this->template->build(config_item('current_theme_path').'users_update' , $users);
          
        $users_rules     = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($users_rules);
        
        if($this->form_validation->run() == FALSE)
        {

            $this->template->build(config_item('current_theme_path').'users_update');    
        }
        
        else
        {           
            

                    if($query = $this->Users->updateUsers())
                    {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User Record is Successfully Updated!</div>');
                        redirect('user/index');
                    }
                    else
                    {
                        die('hie');
                         $this->template->build(config_item('current_theme_path').'users_update');       
                    }
        }
        
    }
	
	public function cover_image(){
    
   $ds          = DIRECTORY_SEPARATOR;  //1
 
    // $storeFolder = 'upload/story/cover_image/'.date("YM")."/";   //2

    $storeFolder = $this->config->item('base_path').'upload/users_data/';   //2
    if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3    
   // $fileName=  $storeFolder.current_timestamp.$_FILES['file']['name'];

    $fileName=  $_FILES['file']['name'];
      
    $targetPath = $storeFolder; //4
     
    $targetFile =  $targetPath. $fileName;  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
        
        }

    echo $fileName;

     
    

    }


    
    
       public function stores_roles($id) 
     {
          $this->load->model('Users');
          $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
         $this->breadcrumbs->push('Users', '/users');
         $this->breadcrumbs->push('Roles', '/users/stores_roles');
          $users['username'] = $this->Users->getUsersDetail($id);
          $this->template->build(config_item('current_theme_path').'users_stores_roles' , $users);
  
    }
	
	  public function email_validation_database() 
     {
          $this->load->model('Users');
		  $email_id = $this->input->post('email');
          $users = $this->Users->unique_email($email_id);
            if(!empty($users))
            {
                echo 1;
            }
            else
            {
			   echo 0 ;
            }
  
    }
	
	    public function facebook_validation_database() 
     {
           $this->load->model('Users');
		   $fb_id = $this->input->post('facebook_identifer');
           $this->db->where('facebook_identifier',  $fb_id);
			$query = $this->db->get('social_users');		 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
  
    }
	
	public function twitter_validation_database() 
     {
           $this->load->model('Users');
		   $fb_id = $this->input->post('twitter_identifier');
           $this->db->where('twitter_identifier',  $fb_id);
			$query = $this->db->get('social_users');		 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
  
    }
	
	 public function username_validation_database() 
     {
          $this->load->model('Users');
		  $username = $this->input->post('username');
          $users = $this->Users->unique_username($username);
            if(!empty($users))
            {
                echo 1;
            }
            else
            {
			   echo 0 ;
            }
  
    }
	
	 public function username_validation_database_update() 
     {
          $this->load->model('Users');
		  $username = $this->input->post('username');
		  $user_id = $this->input->post('product_id');
                     $where_au = "username= '".$username."' AND id != '".$user_id."' ";
					 $this->db->where($where_au); 
					 $query = $this->db->get('users');
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
  
    }
	
	
	




  /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of User
     * @created_at: Sept 22, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

    public function delete($id)
{
   $this->load->model('Users');
   $this->Users->deleteUser($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User Record is Successfully Deleted!</div>');
   redirect('user/index');  
}

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of User
     * @created_at: Sept 22, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Users');
   $this->Users->unDeleteUser($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User Record is Successfully UnDeleted!</div>');
   redirect('user/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of User
     * @created_at: Sept 22, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Users');
   $this->Users->statusUser($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User is Successfully Activated!</div>');
   redirect('user/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of User
     * @created_at: Sept 22, 2015 
     * @library: 
     * @models:   Users
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
    $this->load->model('Users');
    $this->Users->statusUserIn($id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User is Successfully Deactivated!</div>');
    redirect('user/index');  
}

}
