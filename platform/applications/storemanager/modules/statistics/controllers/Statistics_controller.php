<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Statistics_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: View for Store Visitor Statistics
     * @created_at: Sept 03, 2015 
     * @library: 
     * @models:   Statistics
     * @helpers:   
     * @3rdparty:     
     **/

     public function  visitors()
     {
         $this->load->model('Users');
         $data['users'] = $this->Users->getUsersName();
         $this->template->build(config_item('current_theme_path').'statistics_list', $data);
    }





   
}
