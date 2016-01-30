<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Sections_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all collections
     * @created_at: Oct 05, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

          public function index() 
    {
     
        $this->load->model('Collection');
        $this->load->model('Stores');
        $categories_all =  $this->Collection->getCollectionList();
        $collections["allStores"] = $this->Stores->getStoreName();
        $collections['collections'] = $categories_all;
        $this->template->build(config_item('current_theme_path').'collection_index' ,$collections);
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Collection Function
     * @created_at: Oct 05, 2015 
     * @library: form_validation
     * @models:   Collection
     * @helpers:   url
     * @3rdparty:     
     **/

     function add()
	{
		$this->load->library('form_validation');
         $this->load->model('Collection');
         $this->load->model('Stores');
		 $categories_all =  $this->Stores->getStoreList();
         $collections['stores'] = $categories_all;
         $collections["allUsers"] = $this->users->get_all_users();
         $this->template->build(config_item('current_theme_path').'collection_add' , $collections);

		 $categories_rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'store_id',
                'label' => 'Please Select Store',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($categories_rules);
		
		
		if($this->form_validation->run() == FALSE)
		{

			$this->template->build(config_item('current_theme_path').'collection_add');	
		}
		
		else
		{			
			

			if($query = $this->Collection->createCollection())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Saved!</div>');
				redirect('sections/index');
			}
			else
			{
				 $this->template->build(config_item('current_theme_path').'collection_add');		
			}
		}
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of  collection
     * @created_at: Oct 05, 2015 
     * @library: form_validation
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

       public function update($id)
	{
		$this->load->library('form_validation');
         $this->load->model('Collection');
         $this->load->model('Stores');
         $categories_all =  $this->Stores->getStoreList();
         $collections['stores'] = $categories_all;
         $collections['single_collections'] = $this->Collection->getCollectionDetail($id);
         $collections["allUsers"] = $this->users->get_all_users();
        $this->template->build(config_item('current_theme_path').'collection_update' , $collections);
          
		 $categories_rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'Store_id',
                'label' => '',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($categories_rules);
		
		
		if($this->form_validation->run() == FALSE)
		{

			$this->template->build(config_item('current_theme_path').'collection_update');	
		}
		
		else
		{			
			

			if($query = $this->Collection->updateCollection())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Updated!</div>');
				redirect('sections/index');
			}
			else
			{
				 $this->template->build(config_item('current_theme_path').'collection_update');		
			}
		}
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of  Collection
     * @created_at: Oct 05, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

	   public function delete($id)
    {
           $this->load->model('Collection');
           $this->Collection->deleteCollection($id);
           $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Deleted!</div>');
           redirect('sections/index');  
    }

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of  Collection
     * @created_at: Oct 05, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Collection');
   $this->Collection->unDeleteCollection($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully UnDeleted!</div>');
   redirect('sections/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of Collection
     * @created_at: Oct 05, 2015 
     * @library:  
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Collection');
   $this->Collection->statusCollection($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection is Successfully Activated!</div>');
   redirect('sections/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of Collection
     * @created_at: Oct 05, 2015  
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
   $this->load->model('Collection');
   $this->Collection->statusCollectionIn($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection is Successfully Deactivated!</div>');
   redirect('sections/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all collection depend on store Id
     * @created_at: Oct 05, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/


    public function ajax_collection_list($store_id)
    {
        $this->load->helper('url');
        $this->load->model('Collection');
        $data['collection'] = $this->Collection->getcollection($store_id);
        $this->load->view('country/ajax_collection_list',$data);
    }







   
}
