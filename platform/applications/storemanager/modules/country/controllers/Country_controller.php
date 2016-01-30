<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Country_controller extends Base_Authenticated_Controller {

    public function __construct() {

        parent::__construct();
    }


   /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all State
     * @created_at: Sept 29, 2015 
     * @library: 
     * @models:   Country
     * @helpers:   
     * @3rdparty:     
     **/


    public function ajax_state_list($country_id)
    {
        $this->load->helper('url');
        $this->load->model('Country');
        $data['state'] = $this->Country->getstate($country_id);
        $this->load->view('country/ajax_get_state',$data);
    }


    /**
     * @author: Jasdeep Singh <jasdeep.singh@relesol.com>
     * @purpose: Gets the list of all City
     * @created_at: Sept 29, 2015 
     * @library: 
     * @models:   Country
     * @helpers:   
     * @3rdparty:     
     **/
    
    public function ajax_city_list($state_id)
    {
        $this->load->helper('url');
        $this->load->model('Country');
        $data['city'] = $this->Country->getcity($state_id);
        $this->load->view('country/ajax_get_city',$data);
    }





   
}
