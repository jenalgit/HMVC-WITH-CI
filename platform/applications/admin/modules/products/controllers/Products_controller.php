<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Products_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all Products
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Products,Categories
     * @helpers:   
     * @3rdparty:     
     **/

          public function index() 
    {
     
        $this->load->model('Products');
        $this->load->model('Categories');
         $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Administrator', '/');
        $this->breadcrumbs->push('Products', '/products');
        $products =  $this->Products->getProductsDetail();
        $products['products'] = $products;
		/*echo '<pre>';print_r($products['products']); die();*/
        $this->template->build(config_item('current_theme_path').'products_index' ,$products);
    }






    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Product Through Collection Page  Function
     * @created_at: Dec 09, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/


                public function save()
			{
				
				   if ($this->input->post())
	      	  {
				  
                   $id = $this->input->post('collection_id');
				   $this->load->model('Products');
				   $query = $this->Products->updateProductsSave();
				   $products = $query;
				  /* $data = array('product_id' => $products,'col_id' => $id);
				   $products_in_collection = $this->Products->updateProductsCollection($data); */
				   $tags_it = $this->input->post('tags');
				                   if(empty($tags_it[0])) 
								{
								}
								else
								{
		                      $j=0;
								foreach ($tags_it as $tag)
								{
									  
									  $data2 = array('tag' => $tag,'prod_id' =>  $products);
									  $products_in_tags = $this->Products->updateProductsTags($data2); 
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
						'section_type_id' => $products,
						'section_type' =>1                  
					);		
					
					$products_in_seo = $this->Products->updateProductsSeo($new_collection_insert_data_seo); 
					
					$update_products_image_data = array(
						'product_id' => $products,
						'file_name' => $this->input->post('file_name'), 
						'created_at' => $today,         
						'media_status' => 1                      
					 );
					 
							$product_id = $this->Products->updateImage($update_products_image_data);     
					    		 echo $products;
                
			  }
			  else
			  {
				   echo '0';
			  }
 
		
    }

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Product  View Function
     * @created_at: Dec 09, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/


            function add()
       {
           $this->load->model('Categories');
			$this->load->model('Products');
			$this->load->model('Collections');
            $this->load->model('Users');
			$this->load->model('Tags');
         $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
         $this->breadcrumbs->push('Products', '/products');
         $this->breadcrumbs->push('Add', '/products/add');
         $categories_all =  $this->Categories->getCategoryList();
		 $products['categories'] = $categories_all;
		 $collection_all =  $this->Collections->getCollectionList();
		 $products['collections'] = $collection_all;
		 $tags_all =  $this->Tags->getTagList();
		           $sql = "SELECT sku_no FROM products ORDER BY id DESC   "; 
                   $last_id = $this->db->query($sql);
				   $result = $last_id->result();
				   $last_sku = $result[0]->sku_no;
				   $explode_query = explode('CURATIGO00',$last_sku);
				   $e = $explode_query[1];
				   $incr = $e + 1 ;
				   $var1 = 'CURATIGO00';
				   $sku = $var1 .''. $incr;
		$products['single_sku'] =  $sku;
		 /*$products['tags'] = $tags_all;*/
		  $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
					  $products['tags_html'] = $html;
         $products["allUsers"] = $this->users->get_all_users();
         $this->template->build(config_item('current_theme_path').'products_add' , $products);
        
    }
	
	
	
	        function update($id)
       {
           $this->load->model('Categories');
			$this->load->model('Products');
			$this->load->model('Collections');
            $this->load->model('Users');
			$this->load->model('Tags');
         $this->load->library('breadcrumbs');
         $this->breadcrumbs->push('Administrator', '/');
         $this->breadcrumbs->push('Products', '/products');
         $this->breadcrumbs->push('Update', '/products/update');
         $categories_all =  $this->Categories->getCategoryList();
		 $products['categories'] = $categories_all;
		 $collection_all =  $this->Collections->getCollectionList();
		 $products['collections'] = $collection_all;
		 $products["allUsers"] = $this->users->get_all_users();
		 $tags_all =  $this->Tags->getTagList();
		 $products['tags'] = $tags_all;
		   $html="[";
					  foreach($tags_all as $val){
					  $html.="'".$val['title']."',";
					  }
					  $html.="]";
					  $products['tags_html'] = $html;
					  
		    $tags_all_update =  $this->Tags->getTagListupdatep($id);
			      $html_update ="[";
						  foreach($tags_all_update as $val){
						  $html_update.="'".$val->tag."',";
						  }
						  $html_update.="]";
	        $products['tags_update'] = $html_update;	
		 
		 $product =  $this->Products->getProductsDetailList($id);
         $products['single_product'] = $product;
		 $single_use =  $this->Products->getProductsDetailUser($id);
         $products['single_user'] = $single_use;
		/* echo '<pre>';print_r( $products['single_user']); die();*/
		 $product_seo =  $this->Products->getProductsDetailListSeo($id);
         $products['single_product_seo'] = $product_seo;
		 $products['product_id'] = $id;
         $products["allUsers"] = $this->users->get_all_users();
         $this->template->build(config_item('current_theme_path').'products_update' , $products);
        
    }
	
	
	
	/**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Add Product  Insert Function
     * @created_at: Dec 09, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/
	
	
	
	           public function product_save()
			{
			  
                if ($this->input->post())
	      	  {
			
				   $this->load->model('Products');
				   $query = $this->Products->updateProductsSave();
				   $products = $query;
				   $tags_it = $this->input->post('tags');
				            if(empty($tags_it[0])) 
								{
								}
								else
								{
		                          $j=0;
								foreach ($tags_it as $tag)
								{
									  
									  $data2 = array('tag' => $tag,'prod_id' => $products);
									  $products_in_tags = $this->Products->updateProductsTags($data2); 
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
						'section_type_id' => $products,
						'section_type' =>1                  
					);		
					
					$products_in_seo = $this->Products->updateProductsSeo($new_collection_insert_data_seo); 
					
					$update_products_image_data = array(
						'product_id' => $products,
						'file_name' => $this->input->post('file_name'), 
						'created_at' => $today,         
						'media_status' => 1                      
					 );
					 
                      $product_id = $this->Products->updateImage($update_products_image_data);     
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

    $storeFolder = $this->config->item('base_path').'upload/products/';   //2
 
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
     * @purpose: Update Product  Insert Function
     * @created_at: Dec 10, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/
	
	
	
	          public function product_update()
			{
			  
                if ($this->input->post())
	      	  {
			
                   $id = $this->input->post('product_id');
				   $this->load->model('Products');
				   $query = $this->Products->updateProducts();
				   $products = $id;
				   
				                  $tags_it = $this->input->post('tags');
								if(empty($tags_it[0])) 
								{
								}
								else
								{
									$delete = $this->Products->deleteTags($id); 
								    $j=0;
								foreach ($tags_it as $tag)
										{
											  
											  $data2 = array('tag' => $tag,'prod_id' => $id);
											  $products_in_tags = $this->Products->updateProductsTags($data2); 
											  $j++;
										}
								}
							    	$today = date("Y-m-d H:i:s");
				 
				    $new_collection_insert_data_seo = array(
						'meta_title' => $this->input->post('meta_title'),
						'meta_description' => $this->input->post('meta_description'),
						'meta_keyword' => $this->input->post('meta_keyword'),
						'updated_at' => $today,
						'section_type_id' => $id,
						'section_type' =>1                  
					);		
					
					$products_in_seo = $this->Products->updateProductsSeoUpdate($new_collection_insert_data_seo); 
					$file = $this->input->post('file_name');
					if(empty($file))
					{
					     
					}
					else
					{
					
					$update_products_image_data = array(
						'product_id' => $id,
						'file_name' => $this->input->post('file_name'), 
						'created_at' => $today,         
						'media_status' => 1                      
					 );
                        $product_id = $this->Products->updateImageUpdate($update_products_image_data);     
					
					}
					
					echo '1';
                
			  }
			  else
			  {
				   echo '0';
			  }
 
		
    }
	
	
	
	   public function product_update_model()
			{
			  
                if ($this->input->post())
	      	  {
			 
                   $id = $this->input->post('product_id_');
				   $this->load->model('Products');
				    $today = date("Y-m-d H:i:s");
					$new_products_insert_data = array(
						'cat_id' => $this->input->post('cat_id'),
						'id' => $this->input->post('product_id_'),
						'title_p' => $this->input->post('title_p'),
						'product_url' => $this->input->post('product_url'),
						'brand_name' => $this->input->post('brand_name'),
						'industry' => $this->input->post('industry'),
						'currency' => $this->input->post('currency'),
						'price' => $this->input->post('price'),
						'sale_price' => $this->input->post('sale_price') );
			$products_in_update = $this->Products->updateProductsNew($new_products_insert_data);
					if(!empty($products_in_update))
					{
					    echo '1';
				     }
			    	else
				{
					echo '0';
				}
					
					
                
			  }
			  else
			  {
				   echo '0';
			  }
 
		
    }



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of products
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/

	public function delete($id)
{
   $this->load->model('Products');
   $this->Products->deleteProducts($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product Record is Successfully Deleted!</div>');
   redirect('products/index');  
}

public function ajax_delete()
{
   $this->load->model('Products');
   $collection_id = $this->input->post('collection_id');
   $product_id = $this->input->post('product_id');
   $this->db->where('product_id',  $product_id );
   $this->db->where('col_id', $collection_id);
   $this->db->delete('products_in_collection'); 
   echo  $this->db->affected_rows(); 
  
}


  public function update_product()
{
   $this->load->model('Products');
   $product_id = $this->input->post('product_id');
   $product_compare = $this->input->post('compare');
   $product_data = $this->input->post('product');
   if(strstr($product_compare,'title'))
   {
	     $data_insert =array(
                'title_p'=>$product_data,             
            );
	   $this->db->where('id', $product_id);
       $this->db->update('products', $data_insert);
   }
    else if(strstr($product_compare,'compare'))
   {
	   $data_insert =array(
                'sale_price'=>$product_data,             
            );
	     $this->db->where('id', $product_id);
         $this->db->update('products', $data_insert);
   }
    else if(strstr($product_compare,'price'))
   {
	   $data_insert =array(
                'price'=>$product_data,             
            );
	     $this->db->where('id', $product_id);
        $this->db->update('products', $data_insert);
   }
   else if(strstr($product_compare,'brand'))
   {
	   $data_insert =array(
                'brand_name'=>$product_data,             
            );
	      $this->db->where('id', $product_id);
        $this->db->update('products', $data_insert);
   }
   else
   {
	   echo '0';
   }
}

 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of Products
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/

    public function undelete($id)
{
   $this->load->model('Products');
   $this->Products->unDeleteProducts($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product Record is Successfully UnDeleted!</div>');
   redirect('products/index');  
}

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Active the list of Products
     * @created_at: Sept 10, 2015 
     * @library:  
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/

public function activeStatus($id)
{
   $this->load->model('Products');
   $this->Products->statusProducts($id);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product is Successfully Activated!</div>');
   redirect('products/index');  
}


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: InActive the list of products
     * @created_at: Sept 10, 2015 
     * @library: 
     * @models:   Products
     * @helpers:   
     * @3rdparty:     
     **/

public function inactiveStatus($id)
{
    $this->load->model('Products');
    $this->Products->statusProductsIn($id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product is Successfully Deactivated!</div>');
    redirect('products/index');  
}


  
    public function deleteImage($file)
     {//gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH . 'uploads/' . $file);
        $success = unlink(FCPATH . 'uploads/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
    $info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'uploads/' . $file;
        $info->file = is_file(FCPATH . 'uploads/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
            $this->load->view('admin/delete_success', $file_data);
        }
    }


   
}
