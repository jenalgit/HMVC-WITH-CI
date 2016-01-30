<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class RolesFeatures extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'users_stores_roles_features_master';
    protected $return_type = 'array';

    protected $soft_delete = true;

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
    * Gets the list of all store features list users
    * Created on Aug 15, 2015 by Deepak Patil<deepak.patil@relesol.com>
    * 
    *
    **/
    public function get_all_features_list() {
       return $this->select('id,name,rfm_parent_id')->order_by('rfm_parent_id')->as_array()->find();    
    }
    
   

}
