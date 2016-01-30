<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Collection extends CI_Controller {

    public function __construct() {

        parent::__construct();
		
		  $this->lang->load('welcome');
          $this->load->model(array('collection/collections_model','usersinfo_model'));
		  $this->load->helper(array('collectioninfo','common','usersinfo/usersinfo'));
    }

          public function index($collection) 
	 {
		  $collection_slug =  $collection;
		 
		  $user_id = $this->session->userdata('_current_user_id');
		 
		  $data['title'] ='Collection Detail Page';		
		  $res_array =array();
		  $res_user_array =array();
		  $no_res_array =array();
		 /*$data['users_upvote_collection']=$this->collections_model->get_vote_collection($user_i);*/


		  $res_array = $this->collections_model->single_collection($collection_slug);
		  $collection_id = $res_array[0]['id'];
		  $res_user_array = $this->collections_model->single_upvote_collection($collection_id);
	      $no_res_array = $this->collections_model->collection_list();		
			
				 $data['collection_users'] = $res_user_array; 
				 
				 $data['collection_list'] = $no_res_array; 	
				 
				 $data['collection'] = $res_array[0];  
		 
        /*  trace($data['single_collection']); die();*/
		 
		 $this->load->view('index', $data);
		    
     }
	 
	 
	

}
