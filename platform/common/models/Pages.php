<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Pages extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'pages';
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
     * @purpose: Gets the list of all pages
     * @created_at: Sept 07, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Jasdeep Singh <jasdeep.singh@relesol.com>
     *** @modify_at: Sept 07, 2015
     *** @modify_reason:    
     **/

    public function getPagesList(){
       return $this->select('id,heading,url,status,created_at,deleted')->as_array()->find();    
    }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Show the data of  particular pages using pages id
     * @created_at: Sept 07, 2015     
     **/



    public function getPagesDetail($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
    

    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the list of pages using pages id
     * @created_at: Sept 03, 2015     
     **/


       public function updatePages(){
        $id= $this->input->post('id');

          $new_pages_update_data = array(
            'heading' => $this->input->post('heading'),
            'content' => $this->input->post('content'),
            'url' => $this->input->post('url'),
            'meta_description' => $this->input->post('description'), 
            'meta_title' => $this->input->post('title'), 
            'meta_keywords' => $this->input->post('keywords'), 
            'updated_at' => $this->input->post('date'),
            'updated_by' => $this->input->post('updated_by')                   
        );

                  $this->db->where('id', $id);
                  $this->db->update('pages', $new_pages_update_data);
                  return $id;
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Create a new pages
     * @created_at: Sept 07, 2015     
     **/

      public  function createPages(){
        $new_pages_insert_data = array(
            'heading' => $this->input->post('heading'),
            'content' => $this->input->post('content'),
            'url' => $this->input->post('url'),
            'meta_description' => $this->input->post('description'), 
             'meta_title' => $this->input->post('title'), 
              'meta_keywords' => $this->input->post('keywords'), 
            'created_at' => $this->input->post('date'),
            'created_by' => $this->input->post('created_by'),         
            'status' => $this->input->post('status')                       
        );
        
        $insert = $this->db->insert('pages', $new_pages_insert_data);
        return $insert;
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Delete the list of pages using pages id
     * @created_at: Sept 07, 2015     
     **/

         public function deletePages($id){
            $data = array(
                      'deleted'  => 1 ,
                      'status'  => 1 ,
                      'deleted_by' => 1 
                           );  
            $this->db->where('id', $id);
            $this->db->update('pages', $data);
      }



      /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: UnDelete the list of categories using category id
     * @created_at: Sept 02, 2015     
     **/

         public function unDeletePages($id){
            $data = array(
                      'deleted'  => 0 ,
                      'deleted_by' => 0 
                           );  
            $this->db->where('id', $id);
            $this->db->update('pages', $data);
      }




    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Pages Active
     * @created_at: Sept 03, 2015     
     **/

         public function statusPages($id){
              $data = array(
                      'status' => 1 
                           );  
                   $this->db->where('id', $id);
                   $this->db->update('pages', $data);
      }

   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Update the status of Pages  InActive
     * @created_at: Sept 03, 2015     
     **/

       public function statusPagesIn($id){
              $data = array(
                     'status' => 0 
                        ); 
                   $this->db->where('id', $id);
                   $this->db->update('pages', $data);
     }



}
