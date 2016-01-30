<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Categories extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'categories';
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
     * @purpose: Gets the list of all categories
     * @created_at: Sept 02, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Sept 03, 2015
     *** @modify_reason:    
     **/

    public function getCategoryList(){
       return $this->select('id,name,status,deleted')->where('status',1)->as_array()->find();    
    }
	
	 public function getCategoryListIndex(){
       return $this->select('id,name,status,deleted')->as_array()->find();    
    }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Show the data of  particular categories using category id
     * @created_at: Sept 03, 2015     
     **/



    public function getCategoryDetail($id){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }


       /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Show the data of  categories name  using category id
     * @created_at: Sept 10, 2015     
     **/



    public function getCategoryName(){
       
              $this->db->select('p.category_id, c.name as category_name');
              $this->db->from('products as p');
              $this->db->join('categories AS c', 'p.category_id = c.id ','LEFT');
              $query = $this->db->get();
              $result = $query->result();
              return $result;
      }
    

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of categories using category id
     * @created_at: Sept 03, 2015     
     **/


       public function updateCategories(){
        $id= $this->input->post('category_id');
        $new_category_update_data = array(
            'name' => $this->input->post('name'),
            'category_description' => $this->input->post('description')                   
        );

                  $this->db->where('id', $id);
                  $this->db->update('categories', $new_category_update_data);
                  return $id;
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new categories
     * @created_at: Sept 02, 2015     
     **/

  public  function createCategories(){
        $new_category_insert_data = array(
            'name' => $this->input->post('name'),
            'category_description' => $this->input->post('description'),          
            'status' => $this->input->post('status')                       
        );
        
        $insert = $this->db->insert('categories', $new_category_insert_data);
        return $insert;
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of categories using category id
     * @created_at: Sept 02, 2015     
     **/

         public function deleteCategories($id){
            $data = array(
                      'deleted'  => 1 ,
                      'status'  => 0,
                      'deleted_by' => 1 
                           );  
            $this->db->where('id', $id);
            $this->db->update('categories', $data);
      }



      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of categories using category id
     * @created_at: Sept 02, 2015     
     **/

         public function unDeleteCategories($id){
            $data = array(
                      'deleted'  => 0 ,
                      'deleted_by' => 0 
                           );  
            $this->db->where('id', $id);
            $this->db->update('categories', $data);
      }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Category  Active
     * @created_at: Sept 03, 2015     
     **/

         public function statusCategories($id){
              $data = array(
                      'status' => 1 
                           );  
                   $this->db->where('id', $id);
                   $this->db->update('categories', $data);
      }

   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Category  InActive
     * @created_at: Sept 03, 2015     
     **/

       public function statusCategoriesIn($id){
              $data = array(
                     'status' => 0 
                        ); 
                   $this->db->where('id', $id);
                   $this->db->update('categories', $data);
     }
      
	  
	  


}
