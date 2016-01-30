<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  Jasdeep Singh <jasdeep.singh@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 * Inspired by A3M project, see https://github.com/donjakobo/A3M
 */



class Variant extends Core_Model {

    protected $check_for_existing_fields = true;
    public $protected_attributes = array('id');

    protected $_table = 'product_variant';
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
     * @purpose: Update the list of product variant description using product id
     * @created_at: Sept 25, 2015     
     **/


             public function updateVariant($update_products_variant_data)
        {

                    $this->db->insert('product_variant',$update_products_variant_data);
                     return $this->db->insert_id();
        }

 



}
