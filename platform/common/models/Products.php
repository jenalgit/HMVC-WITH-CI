<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Products extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'products';
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
     * @purpose: Gets the list of all products in detail joining two more table (product_shipping,product_stocks)
     * @created_at: Dec  09, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Dec  09, 2015 
     *** @modify_reason:    
     **/

    public function getProductsDetail()
    {
      $this->db->select('p.id,p.title_p,c.name,p.deleted,p.is_enable,p.price,p.sku_no,p.brand_name,p.product_created_at,p.updated_at');   
      $this->db->from('products AS p');
	   $this->db->join('categories AS c' ,'p.cat_id = c.id','left');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    
	 public function getProductsDetailUser($id)
	  {
		$this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
		
        return $result;
		  
	  }

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of product in detail from  product Id
     * @created_at: Sept 10, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Sept 09, 2015
     *** @modify_reason:    
     **/
	 
	 
	  public function getProductsDetailList($id)
    {
	  
      $this->db->select('*');   
	  $this->db->where('products.id', $id);
      $this->db->from('products ');
	  $this->db->join('categories' ,'products.cat_id = categories.id','LEFT');
	  $this->db->join('product_media', 'products.id = product_media.product_id ','LEFT');
      $query = $this->db->get();
      $result = $query->result();
	 
      return $result;
    }
	
	
	  public function getProductsDetailListSeo($id)
    {
	  
      $this->db->select('*');   
	  $this->db->where('products.id', $id);
      $this->db->from('products');
	  $this->db->join('seo_meta' ,'seo_meta.section_type_id = products.id  AND seo_meta.section_type = 1','left');
	  $this->db->join('product_media', 'products.id = product_media.product_id ','LEFT');
      $query = $this->db->get();
      $result = $query->result();
	
      return $result;
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of product description using product id
     * @created_at: Sept 09, 2015     
     **/


             public function updateProducts()
	   {
                    $id = $this->input->post('product_id');
					$today = date("Y-m-d H:i:s");
					$new_products_insert_data = array(
						'cat_id' => $this->input->post('cat_id'),
						'product_description' => $this->input->post('product_description'),
						'url_slug' => $this->input->post('url_slug'),
						'sku_no' => $this->input->post('sku_no'),
						'title_p' => $this->input->post('title_p'),
						'product_url' => $this->input->post('product_url'),
						'brand_name' => $this->input->post('brand_name'),
						'industry' => $this->input->post('industry'),
						'currency' => $this->input->post('currency'),
						'price' => $this->input->post('price'),
						'sale_price' => $this->input->post('sale_price'),
						'updated_at' => $this->input->post('updated_at'),
						'user_id' => $this->input->post('user_id'),
						'is_featured' => $this->input->post('is_featured'),
						'is_enable' =>$this->input->post('is_enable') );
	                                                           $this->db->where('id', $id);
												    $handle = $this->db->update('products', $new_products_insert_data);					
    }
	
	
	
	
	
	 /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Insert the list of product description using product id
     * @created_at: Sept 09, 2015     
     **/


             public function updateProductsSave()
	   {
                    $slug = $this->input->post('url_slug');
					$no = $this->input->post('sku_no');
					$today = date("Y-m-d H:i:s");
					$new_products_insert_data = array(
						'cat_id' => $this->input->post('cat_id'),
						'product_description' => $this->input->post('product_description'),
						'url_slug' => $this->input->post('url_slug'),
						'sku_no' => $this->input->post('sku_no'),
						'title_p' => $this->input->post('title_p'),
						'product_url' => $this->input->post('product_url'),
						'brand_name' => $this->input->post('brand_name'),
						'industry' => $this->input->post('industry'),
						'currency' => $this->input->post('currency'),
						'price' => $this->input->post('price'),
						'sale_price' => $this->input->post('sale_price'),
						'user_id' => $this->input->post('user_id'),
						'is_featured' => $this->input->post('is_featured'),
						'product_created_at' => $today,
						'updated_at' => $this->input->post('updated_at'),
						'is_enable' =>$this->input->post('is_enable') );
							
							$this->db->where('url_slug',$slug);
							$query = $this->db->get('products');
							if ($query->num_rows() > 0)
							{
								return -3;///duplicate slug
							//return false;	
								
							}
							else
							{
								$this->db->where('sku_no',$no);
								$query1 = $this->db->get('products');
								if ($query1->num_rows() > 0)
							{
								return -2;///duplicate sku_no
							//return false;	
								
							}
							else
							{
								$this->db->insert('products', $new_products_insert_data);
								return $this->db->insert_id();
								
							}
						}
		
    }


   

         /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of product description using product id
     * @created_at: Sept 17, 2015     
     **/


             public function updateProductsCollection($data)
        {
				    $insert = $this->db->insert('products_in_collection', $data);
        }
		
		  public function updateProductsTags($data2)
        {
               $insert = $this->db->insert('tags_in_product', $data2);
        }
		
		 public function updateProductsSeo($new_collection_insert_data_seo)
		{
		      $this->db->insert('seo_meta',$new_collection_insert_data_seo);		
		}
		
	      	public function updateImage($update_products_image_data)
		{
		        $this->db->insert('product_media',$update_products_image_data);		
		}

             public function updateProductsCollectionUpdate($data)
         {
			        $id = $data['product_id'];
			        $this->db->where('product_id', $id);
                    $this->db->update('products_in_collection', $data);
         }
		 
		  public function updateProductsSeoUpdate($new_collection_insert_data_seo)
		{
			        $id = $new_collection_insert_data_seo['section_type_id'];
			        $this->db->where('section_type_id', $id);
					$this->db->where('section_type', 1);
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
			        $id = $update_products_image_data['product_id'];
			        $this->db->where('product_id', $id);
                    $this->db->update('product_media', $update_products_image_data);	
		}
  

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of product using product id
     * @created_at: Sept 10, 2015     
     **/

         public function deleteProducts($id){
            $data = array(
                      'deleted'  => 1 ,
                      'is_enable'  => 0
                           ); 
		    $this->db->where('product_id', $id);
            $this->db->delete('products_in_collection'); 				    
            $this->db->where('id', $id);
            $this->db->update('products', $data);
      }
	  
	        public function updateProductsNew($new_products_insert_data)
		{
	                $id = $new_products_insert_data['id'];
                    $this->db->where('id', $id);
	                $handle = $this->db->update('products', $new_products_insert_data);
					/*$query = $this->db->last_query();
					echo '<pre>';print_r($query); die(); */
					$update =  $this->db->affected_rows(); 	
					if(!empty($update))
					{
					    echo '1';
				     }
			    	else
				{
					echo '0';
				}
		}

      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of product using product id
     * @created_at: Sept 10, 2015     
     **/

         public function unDeleteProducts($id){
             $data = array(
                      'deleted'  => 0 ,
                      'is_enable'  => 1
                           );   
            $this->db->where('id', $id);
            $this->db->update('products', $data);
      }
	  
	   public function deleteTags($id){
					 $this->db->where('prod_id', $id);
					 $this->db->delete('tags_in_product');
					return $this->db->affected_rows();
			  }



    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Product  Active
     * @created_at: Sept 10, 2015     
     **/

         public function statusProducts($id)
		 {
                     $data = array(
                      'deleted'  => 0 ,
                      'is_enable'  => 1
                           ); 
                   $this->db->where('id', $id);
                   $this->db->update('products', $data);
        }
		
		
   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Product  InActive
     * @created_at: Sept 03, 2015     
     **/

       public function statusProductsIn($id)
	   {
                   $data = array('is_enable' => 0 ); 
                   $this->db->where('id', $id);
                   $this->db->update('products', $data);
      }



 /**
     * @author: ashish Gupta 
     * @purpose: get product 
     * @created_at: Sept 03, 2015     
     **/      

 public function get_product($param=array())
     {      
        
        $status             =   @$param['status'];  
        $orderby            =   @$param['orderby'];     
        $where              =   @$param['where'];   
        $id                 =   @$param['id'];  
        $url_slug           =   @$param['url_slug'];  
        $user_id            =   @$param['user_id'];  
        
        $limit              =   @$param['limit'];  
        $offset             =   @$param['offset']; 


            
        if($status!='')
        {
            $this->db->where('p.is_enable',$status);
        }else{
            $this->db->where('p.is_enable','1');
        }
        
         if($url_slug!='')
        {
            $this->db->where('p.url_slug',$url_slug);
        }

       if($id!='')
        {
            $this->db->where('p.id',$id);
        }

        if($user_id!='')
        {
            $this->db->where('p.user_id',$user_id);
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
          $this->db->order_by('p.id',"DESC");
        }  

        if($limit!='')
        {
          $limit=$limit;
        }else
        {
         $limit=1000;
        }  
        
        if($offset!='')
        {         
          $offset=$offset;
        }else
        {
         $offset=0;
        }           
        
        
        $this->db->limit($limit,$offset);
    
        $this->db->select('SQL_CALC_FOUND_ROWS p.*,pm.id as pm_id,pm.file_name',FALSE);
        $this->db->from('products as p');
        $this->db->join("product_media as pm","p.id = pm.product_id","LEFT");
       
        $q=$this->db->get();

        //echo_sql();
        $result = $q->result_array();   
        $result = ($limit=='1') ? $result[0]: $result;  
        return $result;
                
    }



   public function get_product_wise_collection($pid)
    {
      $this->db->select('pc.*,c.title,c.description,c.user_id,c.url_slug');   
      $this->db->from('products_in_collection As pc');
      $this->db->where('pc.product_id', $pid);
      $this->db->where('pc.col_id!=', '0');
      $this->db->join('collections As c' ,'pc.col_id = c.id','left');

      $query = $this->db->get();

//echo $sql = $this->db->last_query();exit;

      $result = $query->result();
      return $result;
    }



public function collection_title($col_id){

    if($col_id>0)
        {
            $this->db->select('c.title');
            $this->db->from('collections as c');
            $this->db->where('c.id', $col_id);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result[0]['title']  ;
     }


}


}
