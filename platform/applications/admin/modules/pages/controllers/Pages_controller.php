<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Pages_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all Pages
     * @created_at: Sept 07, 2015 
     * @library: 
     * @models:   PAGES
     * @helpers:   
     * @3rdparty:     
     **/

          public function index() 
    {
     
        $this->load->model('Pages');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('CMS', '/pages');
        $pages_all =  $this->Pages->getPagesList();
        $pages['pages'] = $pages_all;
        $this->template->build(config_item('current_theme_path').'pages_index',$pages);
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Static Pages 
     * @created_at: Sept 07, 2015 
     * @library: form_validation
     * @models:   PAGES
     * @helpers:   url
     * @3rdparty:     
     **/

     function add()
	{
		$this->load->library('form_validation');
         $this->load->model('Pages');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('CMS', '/pages');
        $this->breadcrumbs->push('Add', '/pages/add');
         $categories["allUsers"] = $this->users->get_all_users();
         $this->template->build(config_item('current_theme_path').'pages_add' , $categories);

		 $categories_rules = array(
            array(
                'field' => 'heading',
                'label' => 'Heading',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'url',
                'label' => 'Page Url',
                'rules' => 'trim|required'
            ),
             array(
                'field' => 'content',
                'label' => 'Content',
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

			$this->template->build(config_item('current_theme_path').'pages_add');	
		}
		
		else
		{			
			

			if($query = $this->Pages->createPages())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Page Record is Successfully Saved!</div>');
				redirect('pages/index');
			}
			else
			{
				 $this->template->build(config_item('current_theme_path').'pages_add');		
			}
		}
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of Pages
     * @created_at: Sept 07, 2015 
     * @library: form_validation
     * @models:   PAGES
     * @helpers:   Url
     * @3rdparty:     
     **/

       public function update($id)
	{
		 $this->load->library('form_validation');
         $this->load->model('Pages');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('CMS', '/pages');
        $this->breadcrumbs->push('Update', '/pages/update');
         $pages['single_pages'] = $this->Pages->getPagesDetail($id);
         $pages["allUsers"] = $this->users->get_all_users();
          $this->template->build(config_item('current_theme_path').'pages_update' , $pages);
          
		  $categories_rules = array(
            array(
                'field' => 'heading',
                'label' => 'Heading',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'url',
                'label' => 'Page Url',
                'rules' => 'trim|required'
            ),
             array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
        );


        $this->form_validation->set_rules($categories_rules);
		
		
		if($this->form_validation->run() == FALSE)
		{

			$this->template->build(config_item('current_theme_path').'pages_update');	
		}
		
		else
		{			
			

			if($query = $this->Pages->updatePages())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Pages Record is Successfully Updated!</div>');
				redirect('pages/index');
			}
			else
			{
				 $this->template->build(config_item('current_theme_path').'pages_update');		
			}
		}
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of  pages
     * @created_at: Sept 07, 2015 
     * @library: 
     * @models:   PAGES
     * @helpers:   url
     * @3rdparty:     
     **/

	public function delete($id)
{
   $this->load->model('Pages');
   $this->Pages->deletePages($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Page Record is Successfully Deleted!</div>');
   redirect('pages/index');  
}

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of  pages
     * @created_at: Sept 07, 2015 
     * @library: 
     * @models:   Pages
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Pages');
   $this->Pages->unDeletePages($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Page Record is Successfully UnDeleted!</div>');
   redirect('pages/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of pages
     * @created_at: Sept 03, 2015 
     * @library:  
     * @models:   Pages
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Pages');
   $this->Pages->statusPages($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Page is Successfully Activated!</div>');
   redirect('pages/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of pages
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Pages
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
   $this->load->model('Pages');
   $this->Pages->statusPagesIn($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Page is Successfully Deactivated!</div>');
   redirect('pages/index');  
}

   
}
