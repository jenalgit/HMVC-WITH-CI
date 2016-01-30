<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Country extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'countries';
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


    public function getcountry()
      {
                $this -> db -> select('*');
                $query = $this -> db -> get('countries');
                return $query->result();
     }

    public function getstate($country_id='')
     {
                $this -> db -> select('*');
                $this -> db -> where('countryID', $country_id);
                $query = $this -> db -> get('states');
                return $query->result();
     }
    
     public  function getcity($state_id='')
     {
                $this -> db -> select('*');
                $this -> db -> where('city_state', $state_id);
                $query = $this -> db -> get('cities');
                return $query->result();
     }
    
    
   


}
