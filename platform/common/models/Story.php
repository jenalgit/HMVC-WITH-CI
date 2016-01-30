<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Story extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'story';
    protected $return_type = 'array';

    protected $soft_delete = false;

    public function __construct() {

        parent::__construct();

        $this->before_create[] = 'created_at';

        $this->before_create[] = 'updated_at';

        $this->before_update[] = 'updated_at';

    }


     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all products in detail joining two more table (product_shipping,product_stocks)
     * @created_at: Dec  09, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Dec  09, 2015 
     *** @modify_reason:    
     **/

    public function getStoriesList()
    {
      $this->db->select('s.title,s.is_featured,s.is_enable,s.deleted,s.is_approved,s.created_date,s.updated_at,s.id,c.name,u.username');   
      $this->db->from('story As s');
	  $this->db->order_by('s.created_date','desc');
	  $this->db->join('categories As c' ,'s.cat_id = c.id','left');
	  $this->db->join('users As u' ,'u.id = s.user_id','left');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }



 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all products in detail joining two more table (product_shipping,product_stocks)
     * @created_at: Dec  09, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Dec  09, 2015 
     *** @modify_reason:    
     **/

       public function getStoriesListDetail($id)
    {
	
       $this->db->select('*');   
	   $this->db->where('story.id', $id);
       $this->db->from('story');
	   $this->db->join('categories' ,'categories.id = story.cat_id','left'); 
       $query = $this->db->get();
       $result = $query->result();
       return $result;
    }
	
	
	/**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all products in detail joining two more table (product_shipping,product_stocks)
     * @created_at: Dec  09, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Dec  09, 2015 
     *** @modify_reason:    
     **/

       public function getStoriesListDetailSeo($id)
    {
	
       $this->db->select('*');   
	   $this->db->where('story.id', $id);
       $this->db->from('story');
	   $this->db->join('seo_meta' ,'seo_meta.section_type_id = story.id AND seo_meta.section_type = 2','left');
	   $this->db->join('story_media', 'story.id = story_media.story_id ','LEFT');
	   $this->db->join('users' ,'users.id = story.user_id','left');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    

   


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of product description using product id
     * @created_at: Sept 09, 2015     
     **/


             public function updateStories()
	   {
		   
		   
                    $id = $this->input->post('story_id');		
					$new_story_insert_data = array(
						'cat_id' => $this->input->post('cat_id'),
						'description' => $this->input->post('product_description'),
						'url_slug' => $this->input->post('url_slug'),
						'self_story' => 1,
						'title' => $this->input->post('title'),
						'link' => $this->input->post('url'),
						'user_id' => $this->input->post('user_id'),
						'title_type_seo' => $this->input->post('title_type_seo'),
						'updated_at' => $this->input->post('updated_at'),
						'is_featured' => $this->input->post('is_featured'),
						'is_enable' =>$this->input->post('is_enable'),
						'is_approved' =>$this->input->post('is_enable'));
						
								    $this->db->where('id', $id);
                                    $this->db->update('story', $new_story_insert_data);
                                    return $id;
		
		
		
    }
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of story description 
     * @created_at: Dec 10, 2015     
     **/


             public function createStories()
	   {
                    $today = date("Y-m-d H:i:s");
					$new_story_insert_data = array(
						'cat_id' => $this->input->post('cat_id'),
						'description' => $this->input->post('product_description'),
						'url_slug' => $this->input->post('url_slug'),
						'self_story' => 1,
						'title' => $this->input->post('title'),
						'link' => $this->input->post('url'),
						'user_id' => $this->input->post('user_id'),
						'title_type_seo' => $this->input->post('title_type_seo'),
						'created_date' => $today,
						'updated_at' => $this->input->post('updated_at'),
						'is_featured' => $this->input->post('is_featured'),
						'is_enable' =>$this->input->post('is_enable'),'is_approved' =>$this->input->post('is_enable'));
						 $this->db->insert('story', $new_story_insert_data);
						 return $this->db->insert_id();
    }

         /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: INSERT the list of product description 
     * @created_at: DEC 10, 2015     
     **/


            
		
		  public function updateStoryTags($data2)
        {
               $insert = $this->db->insert('tags_in_story', $data2);
        }
		
		 public function updateStorySeo($new_collection_insert_data_seo)
		{
		      $this->db->insert('seo_meta',$new_collection_insert_data_seo);		
		}
		
	      	public function updateImage($update_products_image_data)
		{
		        $this->db->insert('story_media',$update_products_image_data);		
		}
		
			    /**
				 * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
				 * @purpose: UPDATE the list of product description 
				 * @created_at: DEC 10, 2015     
				 **/
		
 public function deleteTags($story_id){
					 $this->db->where('story_id', $story_id);
					 $this->db->delete('tags_in_story');
					return $this->db->affected_rows();
			  }
          
		 
		  public function updateStorySeoUpdate($new_collection_insert_data_seo)
		{
			        $id = $new_collection_insert_data_seo['section_type_id'];
			        $this->db->where('section_type_id', $id);
					$this->db->where('section_type', 2);
                    $this->db->update('seo_meta', $new_collection_insert_data_seo);
					$update =  $this->db->affected_rows(); 
									if($update == 0)
									{
										 $insert = $this->db->insert('seo_meta', $new_collection_insert_data_seo);
										 return $id;	
									}
									else
									{
										return $id;
									}	
		}
		
	      	public function updateImageUpdate($update_products_image_data)
		{
			        $id = $update_products_image_data['story_id'];
			        $this->db->where('story_id', $id);
                    $this->db->update('story_media', $update_products_image_data);	
		}
		
		
  

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of product using product id
     * @created_at: Sept 10, 2015     
     **/

         public function deleteStories($id){
            $data = array(
                      'deleted'  => 1 ,
                      'is_enable'  => 0,
					  'is_approved'  => 0
                           );  
            $this->db->where('id', $id);
            $this->db->update('story', $data);
      }



      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of product using product id
     * @created_at: Sept 10, 2015     
     **/

         public function unDeleteStories($id){
             $data = array(
                      'deleted'  => 0 ,
                      'is_enable'  => 1,
					   'is_approved'  => 1
                           );   
            $this->db->where('id', $id);
            $this->db->update('story', $data);
      }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Product  Active
     * @created_at: Sept 10, 2015     
     **/

         public function statusStories($id)
		 {
			       $today = date("Y-m-d H:i:s");
                   $data = array('is_enable' => 1 , 'is_approved'  => 1 , 'updated_at' =>$today);  
                   $this->db->where('id', $id);
                   $this->db->update('story', $data);
        }
		
		
   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Product  InActive
     * @created_at: Sept 03, 2015     
     **/

       public function statusStoriesIn($id)
	   {
                   $data = array('is_enable' => 0 ,'is_approved'  => 0 ); 
                   $this->db->where('id', $id);
                   $this->db->update('story', $data);
      }

 public function get_story($param=array())
     {      
        
        $status             =   @$param['status'];  
        $orderby            =   @$param['orderby'];     
        $where              =   @$param['where'];   
        $id                 =   @$param['id'];  
        $url_slug           =   @$param['url_slug']; 
        $user_id            =   @$param['user_id'];  

            
        if($status!='')
        {
            $this->db->where('s.is_approved',$status);
        }else{
            $this->db->where('s.is_approved','1');
        }
        
         if($id!='')
        {
            $this->db->where('s.id',$id);
        }
     
        if($url_slug!='')
        {
            $this->db->where('s.url_slug',$url_slug);
        }
     
         if($user_id!='')
        {
            $this->db->where('s.user_id',$user_id);
        }
     

        
        if($where!='')
        {
            $this->db->where($where);
            
        }
            
        if($orderby!='')
        {
         
          $this->db->order_by($orderby);
            
        }else
        {
          $this->db->order_by('s.id',"DESC");
        }               
        
        $limit=1000;
    
        $this->db->limit(1000,0);
    
        $this->db->select('SQL_CALC_FOUND_ROWS s.*,sm.id as sm_id,sm.file_name',FALSE);
        $this->db->from('story as s');
        $this->db->join("story_media as sm","s.id = sm.story_id","inner");

        $q=$this->db->get();
        //echo_sql();
        $result = $q->result_array();   
        $result = ($limit=='1') ? $result[0]: $result;  
        return $result;
                
    }
          

    public function get_vote_story($id)
    {
               
        $this->db->select('*');
        $this->db->from('votes as v');
        $this->db->where('v.user_id', $id);
        $this->db->where('s.is_approved', '1');
        $this->db->where('v.section_type', '2');
        $this->db->where('v.voted_type', '1');
        $this->db->join("story as s","s.id = v.section_type_id","inner");
        $this->db->join("story_media as sm","s.id = sm.story_id","inner");
        $this->db->order_by("added_date", "desc");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }      
    
    /*added_date*/
    
    
    public function get_story_by_id($id)
    {
        $id = applyFilter('NUMERIC_GT_ZERO',$id);
        
        if($id>0)
        {
            $condtion = "deleted !='0' AND id=$id";
            $fetch_config = array(
                                                        'condition'=>$condtion,                                              
                                                        'debug'=>FALSE,
                                                        'return_type'=>"array"                            
                                                     );
            $result = $this->find('story',$fetch_config);
            return $result;
        }
    }

}
