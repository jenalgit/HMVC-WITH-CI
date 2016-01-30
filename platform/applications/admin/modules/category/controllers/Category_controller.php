<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Category_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all categories
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

          public function index() 
    {
     
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Category', '/category');
        $this->load->model('Categories');
        $categories_all =  $this->Categories->getCategoryListIndex();
        $categories['categories'] = $categories_all;
        $this->template->build(config_item('current_theme_path').'category_index' ,$categories);
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Categories Function
     * @created_at: Sept 03, 2015 
     * @library: form_validation
     * @models:   Categories
     * @helpers:   url
     * @3rdparty:     
     **/

     function add()
	{
		$this->load->library('form_validation');
         $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Category', '/category');
         $this->breadcrumbs->push('Add', '/category/add');
         $this->load->model('Categories');
		 $categories_all =  $this->Categories->getCategoryList();
         $categories['categories'] = $categories_all;
          $categories["allUsers"] = $this->users->get_all_users();
         $this->template->build(config_item('current_theme_path').'category_add' , $categories);

		 $categories_rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
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

			$this->template->build(config_item('current_theme_path').'category_add');	
		}
		
		else
		{			
			

			if($query = $this->Categories->createCategories())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category Record is Successfully Saved!</div>');
				redirect('category/index');
			}
			else
			{
				 $this->template->build(config_item('current_theme_path').'category_add');		
			}
		}
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of  categories
     * @created_at: Sept 03, 2015 
     * @library: form_validation
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

       public function update($id)
	{
		$this->load->library('form_validation');
          $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Category', '/category');
         $this->breadcrumbs->push('Update', '/category/update/');
         $this->load->model('Categories');
         $categories_all =  $this->Categories->getCategoryList();
         $categories['categories'] = $categories_all;
         $categories['single_category'] = $this->Categories->getCategoryDetail($id);
         $categories["allUsers"] = $this->users->get_all_users();
          $this->template->build(config_item('current_theme_path').'category_update' , $categories);
          
		 $categories_rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($categories_rules);
		
		
		if($this->form_validation->run() == FALSE)
		{

			$this->template->build(config_item('current_theme_path').'category_update');	
		}
		
		else
		{			
			

			if($query = $this->Categories->updateCategories())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category Record is Successfully Updated!</div>');
				redirect('category/index');
			}
			else
			{
                die('hie');
				 $this->template->build(config_item('current_theme_path').'category_update');		
			}
		}
		
	}
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new category from modal box
     * @created_at: Jan 8, 2016     
     **/

                         public  function cat_save()
	                    {
						    $title = $this->input->post('category_name');
							
						$new_collection_insert_data = array(
							'name' => $this->input->post('category_name'),
							'status' => 1,      
						  );
	                        $this->db->where('name',$title);
							$query = $this->db->get('categories');
							if ($query->num_rows() > 0)
							{
								echo '0';
								
							}
							else
							{
								      $insert = $this->db->insert('categories', $new_collection_insert_data);
                                      $last_id = $this->db->insert_id();
									  echo $last_id;
								
							}
      
    }
	

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of  categories
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

	public function delete($id)
{
   $this->load->model('Categories');
   $this->Categories->deleteCategories($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category Record is Successfully Deleted!</div>');
   redirect('category/index');  
}

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of  categories
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Categories');
   $this->Categories->unDeleteCategories($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category Record is Successfully UnDeleted!</div>');
   redirect('category/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of categories
     * @created_at: Sept 03, 2015 
     * @library:  
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Categories');
   $this->Categories->statusCategories($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category is Successfully Activated!</div>');
   redirect('category/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of categories
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Categories
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
   $this->load->model('Categories');
   $this->Categories->statusCategoriesIn($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Category is Successfully Deactivated!</div>');
   redirect('category/index');  
}

   
}
