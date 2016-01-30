<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Tags extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'tags';
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

    public function getTagList(){
       return $this->select('id,title')->as_array()->find();    
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


 public function getTagListupdate($id)
    {
	
       $this->db->select('*');   
	   $this->db->where('story_id', $id);
       $this->db->from('tags_in_story');
       $query = $this->db->get();
       $result = $query->result();
       return $result;
    }
	
	
	 public function getTagListupdatep($id)
    {
	
       $this->db->select('*');   
	   $this->db->where('prod_id', $id);
       $this->db->from('tags_in_product');
       $query = $this->db->get();
       $result = $query->result();
       return $result;
    }
   
   
    public function getTagListupdatec($id)
    {
	
       $this->db->select('*');   
	   $this->db->where('col_id', $id);
       $this->db->from('tags_in_collection');
       $query = $this->db->get();
       $result = $query->result();
       return $result;
    }




  


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new categories
     * @created_at: Sept 02, 2015     
     **/

  /*public  function createCategories(){
        $new_category_insert_data = array(
            'name' => $this->input->post('name'),
            'parent_id' => $this->input->post('parent_id'),
            'description' => $this->input->post('description'), 
            'created_at' => $this->input->post('date'),
            'created_by' => $this->input->post('created_by'),         
            'status' => $this->input->post('status')                       
        );
        
        $insert = $this->db->insert('categories', $new_category_insert_data);
        return $insert;
    }*/


    



}
