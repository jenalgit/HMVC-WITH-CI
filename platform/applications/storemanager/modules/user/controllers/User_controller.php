<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class User_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }

        public function index()
     {
        
        $data["allUsers"] = $this->users->getUsersStoresDetail('1');
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

    public function create() {
        
       
         $this->load->library('form_validation');
         $this->load->model('Users');
         $this->template->build(config_item('current_theme_path').'users_add');
    

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

            $this->template->build(config_item('current_theme_path').'users_add');   
        }
        
        else
        {           
            

            if($query = $this->Users->createUsers())
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">User Record is Successfully Saved!</div>');
                redirect('user/index');
            }
            else
            {
                 $this->template->build(config_item('current_theme_path').'users_add');      
            }
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
         $users['single_user'] = $this->Users->getUsersDetail($id);

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


    
    
       public function stores_roles($id) 
     {
          $this->load->model('Users');
          $users['username'] = $this->Users->getUsersDetail($id);
          $this->template->build(config_item('current_theme_path').'users_stores_roles' , $users);
  
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
