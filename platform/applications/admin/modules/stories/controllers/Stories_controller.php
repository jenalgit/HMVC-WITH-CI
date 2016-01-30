<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class stories_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model(array('Story','Users','Categories','Tags'));

         $this->load->library(array('breadcrumbs','form_validation'));


    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all stories
     * @created_at: Dec 10, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

    public function index() 
    {
            
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('stories', '/stories');
        $result_data =  $this->Story->getstoriesList();
        $stories['stories'] = $result_data;
		
        $this->template->build(config_item('current_theme_path').'story_index' ,$stories);
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
		
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('stories', '/stories');
        $this->breadcrumbs->push('Add', '/stories/add');
        $collections["allUsers"] = $this->users->get_all_users();
		$tags_all =  $this->Tags->getTagList();
	    $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
					  $collections['tags_html'] = $html;
		$categories_all =  $this->Categories->getCategoryList();
		$collections['categories'] = $categories_all;
        $this->template->build(config_item('current_theme_path').'story_add' , $collections);
		
	
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

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Collection Function
     * @created_at: Oct 05, 2015 
     * @library: form_validation
     * @models:   Collection
     * @helpers:   url
     * @3rdparty:     
     **/

           function update($id)
	{
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('stories', '/stories');
        $this->breadcrumbs->push('update', '/stories/update');
        $collections["allUsers"] = $this->users->get_all_users();
		$categories_all =  $this->Categories->getCategoryList();
		$collections['categories'] = $categories_all;
		$result_data =  $this->Story->getstoriesListDetail($id);
		$result_data_seo =  $this->Story->getStoriesListDetailSeo($id);
	  	$collections['story_id'] = $id;
        $collections['story'] = $result_data;
		$collections['story_seo'] = $result_data_seo;
		$tags_all =  $this->Tags->getTagList();
		$collections['tags'] = $tags_all;
		  $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
					  $collections['tags_html'] = $html;
					    
	         $tags_all_update =  $this->Tags->getTagListupdate($id);	
			   
			  $html_update ="[";
						  foreach($tags_all_update as $val){
						  $html_update.="'".$val->tag."',";
						  }
						  $html_update.="]";
						  $collections['tags_update'] = $html_update;				  
		/*echo '<pre>';print_r($collections['story']); die();*/
        $this->template->build(config_item('current_theme_path').'story_update' , $collections);

	}
	
	
	
	                 public function story_save()
		         {
			  
				           if ($this->input->post())
					  {
						          $query = $this->Story->createStories();
								  $story_id = $query;
								  $tags_it = $this->input->post('tags');
											
								if(empty($tags_it[0])) 
								{
								}
								else
								{
							       		
								$j=0;
								foreach ($tags_it as $tag)
								{ 
								
								     
									  $data2 = array('tag' => $tag,'story_id' => $story_id);
									  $story_in_tags = $this->Story->updateStoryTags($data2); 
									  $j++;
								}
								}
								$today = date("Y-m-d H:i:s");
					$new_collection_insert_data_seo = array(
						'meta_title' => $this->input->post('meta_title'),
						'meta_description' => $this->input->post('meta_description'),
						'meta_keyword' => $this->input->post('meta_keyword'),
						'created_at' => $today,
						'updated_at' => $today,
						'section_type_id' => $story_id,
						'section_type' =>2                  
					);		
					
					$story_in_seo = $this->Story->updateStorySeo($new_collection_insert_data_seo); 
					
					$update_products_image_data = array(
						'story_id' => $story_id,
						'file_name' => $this->input->post('file_name'),  
						'created_at' =>$today,         
						'media_status' => 1                      
					 );
                        $story_id = $this->Story->updateImage($update_products_image_data); 
                       
					  echo '1';
					   }     
					   else
					   {
						   echo '2';
					   }

		
		  }
	
	
	
	
	
	                              public function story_update()
		         {
			             
				                if ($this->input->post())
					        {
						    
						          $story_id = $this->input->post('story_id');
						          $query = $this->Story->updateStories();
								  $tags_it = $this->input->post('tags');
								 
							     
								if(empty($tags_it[0])) 
								{
								}
								else
								{
							       $delete = $this->Story->deleteTags($story_id); 
								    
								$j=0;
								foreach ($tags_it as $tag)
								{ 
								
									  $data2 = array('tag' => $tag,'story_id' => $story_id);
									  $story_in_tags = $this->Story->updateStoryTags($data2); 
									  $j++;
								}
								}
							    	$today = date("Y-m-d H:i:s");
									
						 $new_collection_insert_data_seo = array(
									'meta_title' => $this->input->post('meta_title'),
									'meta_description' => $this->input->post('meta_description'),
									'meta_keyword' => $this->input->post('meta_keyword'),
									'created_at' => $today,
									'updated_at' => $today,
									'section_type_id' => $story_id,
									'section_type' =>2                  
								);		
					
					$story_in_seo = $this->Story->updateStorySeoUpdate($new_collection_insert_data_seo); 
					$file = $this->input->post('file_name');
					
					if(empty($file))
					{
					     
					}
					else
					{
					
					$update_products_image_data = array(
						'story_id' => $story_id,
						'file_name' => $this->input->post('file_name'),  
						'created_at' =>$today,         
						'media_status' => 1                      
					 );
					
                        $story_id = $this->Story->updateImageUpdate($update_products_image_data); 
					
					}
					
                       
					        echo '1';
					   }     
					   else
					   {
						   echo '0';
					   }

		
		  }
	
	
	
	
	 public function cover_image(){
    
   $ds          = DIRECTORY_SEPARATOR;  //1
 
    // $storeFolder = 'upload/story/cover_image/'.date("YM")."/";   //2

    $storeFolder = $this->config->item('base_path').'upload/story/';   //2
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
           $this->Story->deletestories($id);
           $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Story Record is Successfully  Deleted!</div>');
           redirect('stories/index');  
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
       $this->Story->unDeletestories($id);
       $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Story Record is Successfully  UnDeleted!</div>');
       redirect('stories/index');  
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
       
       $this->Story->statusstories($id);
       $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Story Record is Successfully  Activated!</div>');
       redirect('stories/index');  
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
       
       $this->Story->statusstoriesIn($id);
       $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Story Record is Successfully  Deactivated!</div>');
       redirect('stories/index');  
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
