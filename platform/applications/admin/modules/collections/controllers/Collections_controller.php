<?php defined('BASEPATH') OR exit('No direct script access allowed.');

   class Collections_controller extends Base_Authenticated_Controller
 {

            public function __construct()
	 {
                 parent::__construct();
			     $this->load->helper(array('collectiontitle'));
     }

              public $variable ;
   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all collections
     * @created_at: Oct 17, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

          public function index() 
    {
        $this->load->model('Collections');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Collection', '/collection');
        $categories_all =  $this->Collections->getCollectionListIndex();
        $collections['collections'] = $categories_all;
		
        $this->template->build(config_item('current_theme_path').'collection_index' ,$collections);
    }
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all products in  collections for delete the products
     * @created_at: Dec 11, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

          public function products($id) 
    {
		$collection_id = $id;
        $this->load->model('Collections');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Collection', '/collection');
	    $title =  $this->Collections->getCollectionListTitle($collection_id);
        $collections['titles'] = $title;
        $categories_all =  $this->Collections->getCollectionList();
        $collections['collections'] = $categories_all;
		$collections['product_collections_single'] = $this->Collections->getProductsCollectionDetails($collection_id);
        $this->template->build(config_item('current_theme_path').'collection_products' ,$collections);
    }



     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all products in  collections for adding the products
     * @created_at: Dec 11, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

          public function product_add($id) 
    {
		$collection_id = $id;
        $this->load->model('Collections');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Collection', '/collection');
		 $title =  $this->Collections->getCollectionListTitle($collection_id);
        $collections['titles'] = $title;
        $categories_all =  $this->Collections->getCollectionList();
        $collections['collections'] = $categories_all;
		$collections['collections_single'] = $collection_id;
		$collections['product_collections_single'] = $this->Collections->getProductsCollectionDetailsAdd($collection_id);
		
		$this->template->build(config_item('current_theme_path').'add_products' ,$collections);
    }
	
	
	
	
	
	      public  function collection_products($id)
       {
				$this->load->model('Categories');
				$this->load->model('Products');
				$this->load->model('Collections');
				$this->load->model('Users');
			 $categories_all =  $this->Categories->getCategoryList();
			 $products['categories'] = $categories_all;
			 $product =  $this->Products->getProductsDetailList($id);
			 $products['single_product'] = $product;
			 $products['product_id'] = $id;
			 $products["allUsers"] = $this->users->get_all_users();
			 $this->load->view('collections/collection_products_update', $products);
	   }

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Collection Function
     * @created_at: Oct 17, 2015 
     * @library: form_validation
     * @models:   Collection
     * @helpers:   url
     * @3rdparty:     
     **/

             function add()
	     {
			 
	    	$this->load->library('form_validation');
            $this->load->model('Collections');
			$this->load->model('Categories');
			$this->load->model('Products');
            $this->load->model('Users');
			$this->load->model('Tags');
			$collection_id = collection_id();
            $this->load->library('breadcrumbs');
            $this->breadcrumbs->push('Administrator', '/');
            $this->breadcrumbs->push('Collection', '/collections');
            $this->breadcrumbs->push('Add', '/collections/add');
			$categories_all =  $this->Categories->getCategoryList();
			$collections['categories'] = $categories_all;
			   $sql = "SELECT sku_no FROM products  ORDER BY id DESC limit 1  "; 
                   $last_id = $this->db->query($sql);
				   $result = $last_id->result();
				   $last_sku = $result[0]->sku_no;
				   $explode_query = explode('CURATIGO00',$last_sku);
				   $e = $explode_query[1];
				   $incr = $e + 1 ;
				   $var1 = 'CURATIGO00';
				   $sku = $var1 .''. $incr;
		$collections['single_sku'] =  $sku;
			$tags_all =  $this->Tags->getTagList();
			 $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
		
					  $collections['tags_html'] = $html;
			$collections['single_id_collection'] = $collection_id;
            $collections["allUsers"] = $this->users->get_all_users();
			$collections['product_collections'] = $this->Collections->getProductsCollectionDetail();
			$collections['product_collections_single'] = $this->Collections->getProductsCollectionDetails($collection_id);
		
            $this->template->build(config_item('current_theme_path').'collection_add' , $collections);
			
		 $categories_rules = array(
            array(
                'field' => 'collection_id',
                'label' => 'Collection id is empty',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'category_id',
                'label' => 'Please Select Category',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'url_slug',
                'label' => 'Please ',
                'rules' => 'trim|required'
            )
        );
                        
						  	  
            $this->form_validation->set_rules($categories_rules);
			
		
		/* If the collection is not featured */
       
		if($this->form_validation->run() == FALSE)
		{

			$this->template->build(config_item('current_theme_path').'collection_add');	
		}
		
		else
		{			
               
			if($query = $this->Collections->createCollection())
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Saved!</div>');
				redirect('collections/index');
			}
			else
			{
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have Entered a Duplicate Collection URL Slug</div>');
				redirect('collections/add');	
			}
		}

 
		
	}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of  collection
     * @created_at: Oct 17, 2015 
     * @library: form_validation
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

       public function update($id)
	{
		$this->load->library('form_validation');
          $this->load->model('Collections');
			$this->load->model('Categories');
			$this->load->model('Products');
            $this->load->model('Users');
			$this->load->model('Tags');
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Collection', '/collections');
        $this->breadcrumbs->push('Update', '/collections/update');
		$collections['single_id'] = $id;
		           $sql = "SELECT sku_no FROM products  ORDER BY id DESC limit 1  "; 
                   $last_id = $this->db->query($sql);
				   $result = $last_id->result();
				   $last_sku = $result[0]->sku_no;
				   $explode_query = explode('CURATIGO00',$last_sku);
				   $e = $explode_query[1];
				   $incr = $e + 1 ;
				   $var1 = 'CURATIGO00';
				   $sku = $var1 .''. $incr;
		$collections['single_sku'] =  $sku;
		$collection_id = $id;
        $collections['single_collections'] = $this->Collections->getCollectionListupdate($id);
		$collections['single_collections_seo'] = $this->Collections->getCollectionSeoDetail($id);
		$collections['single_collections_seo_type'] = $this->Collections->getSeoType($id);
		$categories_all =  $this->Categories->getCategoryList();
	    $collections['categories'] = $categories_all;
            $tags_all =  $this->Tags->getTagList();
			 $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
		
					  $collections['tags_html'] = $html;
			$collections['single_id_collection'] = $collection_id;
			 $tags_all_update =  $this->Tags->getTagListupdatec($id);
			      $html_update ="[";
						  foreach($tags_all_update as $val){
						  $html_update.="'".$val->tag."',";
						  }
						  $html_update.="]";
	        $collections['tags_all_update'] = $html_update;
            $collections["allUsers"] = $this->users->get_all_users();
			$collections['product_collections'] = $this->Collections->getProductsCollectionDetail();
		    $single_use =  $this->Collections->getProductsDetailUser($id);
            $collections['single_user'] = $single_use;	
			$collections['product_collections_single'] = $this->Collections->getProductsCollectionDetails($collection_id);
			
        $this->template->build(config_item('current_theme_path').'collection_update' , $collections);
          
		 $categories_rules = array(
            array(
                'field' => 'title',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'url_slug',
                'label' => 'Select Collection Type',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'category_id',
                'label' => 'Select Collobrate Type',
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
              
            if($query = $this->Collections->updateCollections())
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Updated!</div>');
                redirect('collections/index');
            }
            else
            {
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have Entered a Duplicate Collection URL Slug</div>');
				redirect('collections/update/'.$collection_id);        
            }
        }
   
        
    }

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of  Collection
     * @created_at: Oct 17, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

	   public function delete($id)
    {
           $this->load->model('Collections');
           $this->Collections->deleteCollection($id);
           $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully Deleted!</div>');
           redirect('collections/index');  
    }


     /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of  product from  Collection
     * @created_at: Oct 17, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

	   public function productdelete()
    {
         		
           $this->load->model('Collections');
		   $col_id = $this->input->get('col_id');
           $prod_id = $this->input->get('prod_id');
		   $data = array('col_id' => $col_id,'prod_id' => $prod_id);
           $this->Collections->deleteProduct($data);
           $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product Record is Successfully Deleted from Collection!</div>');
		   redirect('collections/products/'.$col_id);
    }


		 public function ajax_slug($id)
		{
		            $this->load->model('Collections');
		            $slug_id = $id;
					 $this->db->where('url_slug', $slug_id);
					 $query = $this->db->get('collections');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
		 public function ajax_slug_products($id)
		{
		             $this->load->model('Products');
		             $slug_id = $id;
					 $this->db->where('url_slug', $slug_id);
					 $query = $this->db->get('products');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		public function ajax_slug_products_update()
		{
		             $this->load->model('Products');
					 $prod_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title');
					  $where_au = "url_slug= '".$slug_id."' AND id != '".$prod_id."' ";
					 $this->db->where($where_au); 
					 $query = $this->db->get('products');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		public function ajax_slug_collection_update()
		{
		             $this->load->model('Products');
					 $prod_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title');
					  $where_au = "url_slug= '".$slug_id."' AND id != '".$prod_id."' ";
					 $this->db->where($where_au); 
					 $query = $this->db->get('collections');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
	      	public function ajax_slug_story()
		{
		             $this->load->model('Story');
					 $prod_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title');
					 $where_au = "url_slug= '".$slug_id."' AND id != '".$prod_id."' ";
					 $this->db->where($where_au); 
					 $query = $this->db->get('story');
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
			public function ajax_slug_story_add($id)
		{
		            $this->load->model('Story');
		            $slug_id = $id;
					 $this->db->where('url_slug', $slug_id);
					 $query = $this->db->get('story');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		    	 public function ajax_page_title($id)
        	{
 		             $title_id = $id;
					/* $meta_title = str_replace('-', ' ', $title_id );*/
					 $meta_title = str_replace('-', ' ', $title_id );
					 $this->db->where('meta_title',  $meta_title);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}


                public function ajax_page_description($id)
        	{
 		             $title_id = $id;
					/* $meta_title = str_replace('-', ' ', $title_id );*/
					 $meta_title = str_replace('-', ' ', $title_id );
					 $this->db->where('meta_description',  $meta_title);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
                    public function ajax_page_title_story()
        	    {
 		             $story_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_title = '".$meta_title."' AND section_type_id != '".$story_id."' AND section_type = '2' ";
					 $this->db->where($where_au); 
					 $query = $this->db->get('seo_meta');
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		         public function ajax_page_title_product()
        	    {
 		             $product_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_title = '".$meta_title."' AND section_type_id != '".$product_id."' AND section_type = '1' ";
					 $this->db->where($where_au);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
		              public function ajax_page_title_collection()
        	       {
 		             $product_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_title = '".$meta_title."' AND section_type_id != '".$product_id."' AND section_type = '0' ";
					 $this->db->where($where_au);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
		
		              public function ajax_page_description_story()
        	    {
 		             $product_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_description = '".$meta_title."' AND section_type_id != '".$product_id."' AND section_type = '2' ";
					 $this->db->where($where_au);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
		
		            public function ajax_page_description_collection()
        	    {
 		             $product_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_description = '".$meta_title."' AND section_type_id != '".$product_id."' AND section_type = '0' ";
					 $this->db->where($where_au);
					 $query = $this->db->get('seo_meta');
					 
					  if ($query->num_rows() == 0)
					  {
						   echo  1;
					  }
				      else
				      {
						  echo  0;
				      }
		   
		}
		
		
		           public function ajax_page_description_product()
        	     {
 		             $product_id = $this->input->post('product_id');
                     $slug_id = $this->input->post('product_title'); 
					 $meta_title = str_replace('-', ' ', $slug_id );
					 $where_au = "meta_description = '".$meta_title."' AND section_type_id != '".$product_id."' AND section_type = '1' ";
					 $this->db->where($where_au);
					 $query = $this->db->get('seo_meta');
					 
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
     * @purpose: UnDelete the list of  Collection
     * @created_at: Oct 17, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Collections');
   $this->Collections->unDeleteCollection($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection Record is Successfully UnDeleted!</div>');
   redirect('collections/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of Collection
     * @created_at: Oct 17, 2015 
     * @library:  
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Collections');
   $this->Collections->statusCollection($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection is Successfully Activated!</div>');
   redirect('collections/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of Collection
     * @created_at: Oct 17, 2015  
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
   $this->load->model('Collections');
   $this->Collections->statusCollectionIn($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Collection is Successfully Deactivated!</div>');
   redirect('collections/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all collection depend on store Id
     * @created_at: Oct 17, 2015 
     * @library: 
     * @models:   Collection
     * @helpers:   
     * @3rdparty:     
     **/


    public function ajax_collection_list($store_id)
    {
        $this->load->helper('url');
        $this->load->model('Collections');
        $data['collection'] = $this->Collection->getcollection($store_id);
        $this->load->view('country/ajax_collection_list',$data);
    }
	
	
	
	
	       public function save()
	 {
					  $this->load->model('Collections');
					 $new_collection_insert_data = array(
						'title' => $this->input->post('title'),
						'created_at' => $this->input->post('date')
					  );
					 
         if(!empty($this->input->post()))
         {
                $collection_id = $this->Collections->createCollectionTitle($new_collection_insert_data);
				
				
              if(!empty($collection_id))
            {
                  echo  $collection_id;
				
				 $this->variable = $collection_id;
            }
            else
            {
			   echo 0 ;
            }
        }
		
		else
		{

            echo 0;
        }
		
    }
	
	                 public function assign()
	 {
					  $this->load->model('Collections');
					   $new_product_insert_data = array(
						'product_id' => $this->input->post('product_id'),
						'col_id' => $this->input->post('col_id')      
					  );
					  $col_id = $this->input->post('col_id');
					 
                   if(!empty($this->input->post()))
               {
				   $product_id = $this->Collections->assignCollection($new_product_insert_data);
					if(!empty($product_id))
					{
		 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product Assigned to Collection</div>');				
						  redirect('collections/product_add/'.$product_id);   
						  
					}
					else
					{
			 $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Product is Already Assigned in Collection</div>');
                              redirect('collections/product_add/'. $col_id); 
					   
					}
        }
		
		else
		{

            echo 0;
        }
		
    }
	
	
	
	
	
	              public function tag_it()
	 {
				     $this->load->model('Collections');
					 $today = date("Y-m-d H:i:s");
					 $new_collection_insert_data = array(
						'title' => $this->input->post('tag_id'),
						'created_at' => $today,      
					  );	  
             if(!empty($this->input->post()))
         {
                  $collection_id = $this->Collections->createTags($new_collection_insert_data);
	
              if(!empty($collection_id))
            {
                  echo  $collection_id;
            }
            else
            {
                echo -1;
               
            }
        }
		
		else
		{

            echo 0;
        }
		
    }
	
	
	 public function tag_get()
	 {
					  $this->load->model('Tags');
				      $tags_all =  $this->Tags->getTagList();
					  $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
					  echo $html;
					  // echo json_encode($tags_all);
					  
		
    }



}
