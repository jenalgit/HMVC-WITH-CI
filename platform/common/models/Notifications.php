<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Deepak Patil <deepak.patil@relesol.com>
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Notifications extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $soft_delete = true;

    public function __construct() {

        parent::__construct();

        $this->before_create[] = 'created_at';

        $this->before_create[] = 'updated_at';

        $this->before_update[] = 'updated_at';

    }


     /**
     * @author: Deepak Patil <deepak.patil@relesol.com>
     * @purpose: Gets the list of all products in detail joining two more table (product_shipping,product_stocks)
     * @created_at: Dec  17, 2015 
     * Modifications
     *** @modify_#: 1
     *** @modify_by: Deepak Patil <deepak.patil@relesol.com>
     *** @modify_at: Dec  17, 2015 
     *** @modify_reason:    
     **/

    public function getAll()
    {
		$notifications['collections'] = $this->getNewPostedCollections();
		return $result;
    }
	
	 /**
     * @author: Deepak Patil <deepak.patil@relesol.com>
     * @purpose: Gets all the new posted collections
     * @created_at: Dec  17, 2015      
     **/

    private function getNewPostedCollections()
    {
      $this->db->select('s.title,s.is_featured,s.is_enable,s.deleted,s.is_approved,s.created_date,s.id,c.name,u.username');   
      $this->db->from('story As s');
	  $this->db->join('categories As c' ,'s.cat_id = c.id','left');
	  $this->db->join('users As u' ,'u.id = s.user_id','left');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }


}
