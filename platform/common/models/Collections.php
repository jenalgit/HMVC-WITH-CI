<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Collections extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'collections';
    protected $return_type = 'array';

    protected $soft_delete = false;

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
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all collections
     * @created_at: Oct 16, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Oct 16, 2015
     *** @modify_reason:    
     **/

     




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Show the data of  particular collections using collection id
     * @created_at: Sept 03, 2015     
     **/

      public function getCollectionDetail($id)
	{
        $this->db->select('*');
        $this->db->from('collections');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
	  
	  
	  public function getCollectionListupdate($id)
	  {
   $this->db->select('s.id,s.cat_id,c.name,c.id,s.is_approved,s.updated_at,s.title,s.description,s.url_get,s.url_slug,s.tag_line,s.is_featured,s.is_enable,s.created_at,s.deleted');
				  $this->db->from('collections As s');
				  $this->db->where('s.id', $id);
				  $this->db->join('categories AS c', 'c.id = s.cat_id  ','LEFT');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
	  }
	  
	  
	  public function getCollectionListTitle($collection_id)
	  {
		$this->db->select('title');
        $this->db->from('collections');
        $this->db->where('id', $collection_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
		  
	  }
	  
	  public function getCollectionList()
	  {
		          $this->db->select('s.id,s.cat_id,c.name,s.title,s.is_approved,s.updated_at,s.url_slug,s.tag_line,s.is_featured,s.is_enable,s.created_at,s.deleted');
				  $this->db->from('collections as s');
				   $this->db->where('is_enable', 1);
				  $this->db->join('categories AS c', 's.cat_id = c.id ','LEFT');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
	  }
	  
	  public function getCollectionListIndex()
	  {
		       $this->db->select('s.id,s.cat_id,c.name,s.title,s.updated_at,s.url_slug,s.tag_line,s.is_featured,s.is_enable,s.is_approved,s.created_at,s.deleted');
			   $this->db->from('collections as s');
			   $this->db->join('categories AS c', 's.cat_id = c.id ','LEFT');
			  $this->db->order_by('s.created_at','desc');
			   $query = $this->db->get();
			   $result = $query->result();
			  
				  return $result;
	  }
	  
	  public function getCollectionSeoDetail($id){
        $this->db->select('*');
        $this->db->from('seo_meta');
        $this->db->where('section_type_id', $id);
		$this->db->where('section_type', 0);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
	  
	  
         public function getProductsCollectionDetail()
        {
	     $this->db->select('p.id,p.title_p,p.price,p.sale_price,p.brand_name,p.deleted,p.product_created_at,p.updated_at ,s.product_id,p.sku_no,s.file_name');
				  $this->db->from('products as p');
				  $this->db->where('is_enable', 1);
				   $this->db->order_by('p.updated_at','desc');
				  $this->db->join('product_media AS s', 'p.id = s.product_id ','LEFT');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
       }
	   
	    public function getProductsCollectionDetails($collection_id)
        {
			     
		$this->db->select('p.id,p.title_p,p.price,p.sale_price,p.updated_at,p.brand_name,p.deleted,c.product_id,c.col_id,product_created_at, s.product_id,p.sku_no,s.file_name');
				  $this->db->from('products_in_collection As c');
				  $this->db->where('col_id', $collection_id);
				  $this->db->where('is_enable', 1);
				  $this->db->order_by('p.updated_at','desc');
				  $this->db->join('products AS p', 'c.product_id = p.id','LEFT');
				  $this->db->join('product_media AS s', 'c.product_id = s.product_id ','LEFT');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
       }
	   
	   
	     public function getProductsDetailUser($id)
    {
	  
				  $this->db->select('user_id');   
				  $this->db->where('collections.id', $id);
				  $this->db->from('collections');
				  $query = $this->db->get();
				  $result = $query->result();
				 
				  return $result;
    }
	
	
	 public function getSeoType($id)
    {
	  
				  $this->db->select('title_type_seo');   
				  $this->db->where('collections.id', $id);
				  $this->db->from('collections');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
    }
	   
	    public function getProductsCollectionDetailsAdd($collection_id)
        {	     
		          $this->db->select('p.id,p.title_p,p.price,p.brand_name,p.deleted,p.product_created_at, s.product_id,p.sku_no,s.file_name');
				  $this->db->from('products AS p');
				  $this->db->where('is_enable', 1);
				  $this->db->join('product_media AS s', 'p.id = s.product_id ','LEFT');
				  $query = $this->db->get();
				  $result = $query->result();
				  return $result;
       }
	  

         

    
    

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of collections using collection id
     * @created_at: Oct 05, 2015     
     **/


           public function updateCollections()
	   {
		  
				            $id = $this->input->post('collection_id');
							 $today = date("Y-m-d H:i:s");
		                    $collection_products =  $this->input->post('collection_products');
							
							$data_collection = explode(',',$collection_products);
                             $publish_date = $this->input->post('publish_date');
		      
		                                
			  if(!empty($this->input->post('collection_products')))
				{
					
						$i=0;
						foreach ($data_collection as $products)
						{
							$data = array('product_id' => $products,'col_id' => $id);
							$insert = $this->db->insert('products_in_collection', $data);
							$new_date = array('updated_at' => $publish_date);
							$this->db->where('id', $products);
                            $this->db->update('products',  $new_date);
							$i++;
						}
				}	
				
				
				 if(!empty($this->input->post('product_master')))
				{
				     $products_added =  $this->input->post('product_master');	
						$i=0;
						foreach ($products_added as $products)
						{
							$new_date = array('updated_at' => $publish_date);
							$this->db->where('id', $products);
                            $this->db->update('products',  $new_date);
							$i++;
						}
				}	
				
				 $new_collection = array(
            'cat_id' => $this->input->post('category_id'),
			'title' => $this->input->post('title'),
			'title_type_seo' => $this->input->post('page'),
            'description' => $this->input->post('description'),
            'url_slug' => $this->input->post('url_slug'),
			'url_get'  =>  $this->input->post('url_get'),
			'user_id' => $this->input->post('user_id'),
			'updated_at' => $this->input->post('publish_date'),
            'tag_line' => $this->input->post('tag_line'),
			'is_enable' => $this->input->post('collection_active'),
			'is_featured' =>$this->input->post('featured'),
			'is_approved' =>$this->input->post('collection_active'),
            'is_featured' =>$this->input->post('featured')                     
        );						  			 
		                                $this->db->where('id', $id);
                                        $this->db->update('collections',  $new_collection);						
		
		              $tags = $this->input->post('tags');
					  
						if(!empty($tags))
				   {
							   $this->db->where('col_id', $id);
							   $this->db->delete('tags_in_collection');
							 $data = trim($tags[0],"[]");
							 $data1 = explode(',',$data);
						  $j=0;
						foreach ($data1 as $tag)
						{
							
							    $data_trim = trim($tag,'"');
							    $data2 = array('tag' => $data_trim,'col_id' =>  $id);
						    	$insert = $this->db->insert('tags_in_collection', $data2);
							$j++;
						}
						
				 }
				                    $meta_seo = $this->input->post('title_type_seo');
				                      if($meta_seo == 2)
									{
										 	 $meta_title = $this->input->post('manual');
									}
									else
									{
										      $meta_title = $this->input->post('page_title');
									}	
				 
	 $new_collection_insert_data_seo = array(
            'meta_title' => $meta_title,
            'meta_description' => $this->input->post('meta_description'),
            'meta_keyword' => $this->input->post('keyword'),
            'created_at' => $this->input->post('publish_date'),
			'updated_at' => $this->input->post('publish_date'),
            'section_type_id' => $id,
			'section_type' =>0                   
        );  

		
		                                $this->db->where('section_type_id', $id);
										$this->db->where('section_type', 0);
                                        $this->db->update('seo_meta',  $new_collection_insert_data_seo);
										$update =  $this->db->affected_rows(); 
										/*echo '<pre>';print_r($update); die();
									if($update == 0)
									{
										  $insert = $this->db->insert('seo_meta', $new_collection_insert_data_seo);
										  return $id;	
									}
									else
									{
										return $id;
									}	*/
									
				
			      
                                                                  
		                             return 1;                     
                           
		
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new collections
     * @created_at: Oct 16, 2015     
     **/

                         public  function createCollection()
                   {
	  
	                        $id = $this->input->post('collection_id');
		                    $slug = $this->input->post('url_slug');
							$collection_products =  $this->input->post('collection_products');
							$data_collection = explode(',',$collection_products);
							 $today = date("Y-m-d H:i:s");
						$new_collection = array(
								'cat_id' => $this->input->post('category_id'),
								'title' => $this->input->post('title'),
								'description' => $this->input->post('description'),
								'title_type_seo' => $this->input->post('page'),
								'url_slug' => $this->input->post('url_slug'),
								'url_get'  =>  $this->input->post('url_get'),
								'user_id' => $this->input->post('user_id'),
								'created_at' => $today,
								'updated_at' => $this->input->post('publish_date'),
								'tag_line' => $this->input->post('tag_line'),
								'is_enable' => $this->input->post('collection_active'),
								'is_approved' =>$this->input->post('collection_active'),
								'is_featured' =>$this->input->post('featured')                     
							);
														$this->db->where('id', $id);
														$this->db->update('collections',  $new_collection);
										
										  $tags = $this->input->post('tags');
											if(!empty($tags))
									   {
											 $data = trim($tags[0],"[]");
											 $data1 = explode(',',$data);
											  $j=0;
											foreach ($data1 as $tag)
											{
												
													$data_trim = trim($tag,'"');
													$data2 = array('tag' => $data_trim,'col_id' =>  $id);
													$insert = $this->db->insert('tags_in_collection', $data2);
												$j++;
											}
											
									 }
				 
				                    $meta_title = $this->input->post('manual');
				                      if(!empty($meta_title))
									{
										 	 $meta_title = $this->input->post('manual');
									}
									else
									{
										      $meta_title = $this->input->post('page_title');
									}	
												
									 $new_collection_insert_data_seo = array(
											'meta_title' => $meta_title,
											'meta_description' => $this->input->post('meta_description'),
											'meta_keyword' => $this->input->post('keyword'),
											'created_at' => $today,
											'updated_at' => $this->input->post('publish_date'),
											'section_type_id' => $id,
											'section_type' =>0                   
										);  
		 
		 
                 $insert = $this->db->insert('seo_meta', $new_collection_insert_data_seo);	
				 $publish_date = $this->input->post('publish_date');		 
						if(!empty($this->input->post('collection_products')))
				{
								$i=0;
								foreach ($data_collection as $products)
								{
									$data = array('product_id' => $products,'col_id' => $id);
									$insert = $this->db->insert('products_in_collection', $data);
									$new_date = array('updated_at' => $publish_date);
									$this->db->where('id', $products);
									$this->db->update('products',  $new_date);
									$i++;
								}
				}
                                                                  
		                   return 1;
   
   
    }


	
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new collections 
     * @created_at: Dec 07, 2015     
     **/

      public  function createCollectionTitle($new_collection_insert_data){
      
	                        $title = $new_collection_insert_data['title'];
	                        $this->db->where('title',$title);
							$query = $this->db->get('collections');
							if ($query->num_rows() > 0)
							{
								return false;
								
							}
							else
							{
								      $insert = $this->db->insert('collections', $new_collection_insert_data);
                                      return $this->db->insert_id();
								
							}
      
    }
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Assign a product to  collections 
     * @created_at: Dec 07, 2015     
     **/

         public  function assignCollection($new_product_insert_data)
	   {
		        $col_id = $new_product_insert_data['col_id'];
				$product_id = $new_product_insert_data['product_id'];
				   $this->db->select('*');
                   $this->db->from('products_in_collection');
                   $this->db->where('col_id', $col_id);
				   $this->db->where('product_id', $product_id);
                   $query = $this->db->get();
                   $result = $query->result();
				   if(!empty($result))
				   {
					   
				   }
				   else
				   {
						$insert = $this->db->insert('products_in_collection', $new_product_insert_data);
						return $col_id;
				   }
       }
	
	 

/**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new tags 
     * @created_at: Dec 10 , 2015     
     **/

       public  function createCollectionTags($new_collection_insert_data)
	  {
		     $title = $new_collection_insert_data['title'];
			 if(!empty($title))
			 {
			   $insert = $this->db->insert('tags', $new_collection_insert_data);
			   return $this->db->insert_id();
			 }
      }
	  
	/**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new tags 
     * @created_at: Dec 10 , 2015     
     **/

       public  function createTags($new_collection_insert_data)
	  {
		                    $title = $new_collection_insert_data['title'];
			                $this->db->where('title',$title);
							$query = $this->db->get('tags');
							if ($query->num_rows() > 0)
							{
								return false;
								
							}
							else
							{
								        $insert = $this->db->insert('tags', $new_collection_insert_data);
			                             return $this->db->insert_id();
								
							}
      }  


     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update a collections with Features
     * @created_at: Oct 16, 2015     
     **/

      public  function createCollectionUpdateFeature($update_collection){
            
                   $id = $update_collection['id'];
                   $this->db->where('id', $id);
                   $this->db->update('collections',  $update_collection);
                   return $id;
    }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of collection using collection id
     * @created_at: Oct 05, 2015     
     **/

         public function deleteCollection($id){
            $data = array(
                      'deleted'  => 1 ,
                      'is_enable'  => 0
                           );  
            $this->db->where('id', $id);
            $this->db->update('collections', $data);
      }
	  
	  
	   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of product using product id
     * @created_at: Oct 05, 2015     
     **/

             public function deleteProduct($data)
		 { 
		    $col_id = $data['col_id'];
			$prod_id = $data['prod_id'];
            $this->db->where('col_id', $col_id);
			 $this->db->where('product_id', $prod_id);
            $this->db->delete('products_in_collection');
			return $this->db->affected_rows(); 
        }
		
		  



      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of collection using collection id
     * @created_at: Oct 05, 2015      
     **/

         public function unDeleteCollection($id){
            $data = array(
                      'deleted'  => 0 ,
                     'is_enable'  => 1 
                           );  
            $this->db->where('id', $id);
           $this->db->update('collections', $data);
      }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Collection  Active
     * @created_at: Oct 05, 2015      
     **/

            public function statusCollection($id)
		 {
			  $today = date("Y-m-d H:i:s");
              $data = array(
                      'is_enable' => 1,
					  'is_approved' => 1,
					  'updated_at' => $today
					  
                           );  
                   $this->db->where('id', $id);
                  $this->db->update('collections', $data);
      }
	  
	  
	

   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Collection  InActive
     * @created_at: Oct 05, 2015     
     **/

       public function statusCollectionIn($id){
              $data = array(
                      'is_enable' => 0,
					  'is_approved' => 0 
                        ); 
                   $this->db->where('id', $id);
                   $this->db->update('collections', $data);
     }

 



}
