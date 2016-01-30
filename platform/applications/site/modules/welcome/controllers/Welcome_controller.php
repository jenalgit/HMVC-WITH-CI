<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Welcome_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->lang->load('welcome');
        $this->load->model(array('collection/collections_model','usersinfo_model'));
		$this->load->helper(array('collectioninfo','common','usersinfo/usersinfo'));
        $this->registry->set('nav', 'home');
    }


	public function readMore()
	{
		
		
		$start = $this->input->post('start');//url segment; //0
		$end = $this->config->item('limit_incr');
		
		$res_array = $this->collections_model->get_collection_front($start, $end);
		
		//$end   =  $start + $increment;//url segment ;   //2 

      

        $result_array=array();
        $date_array=array();
        //$result_array1=array();
        foreach($res_array as $res_val){

            $updated_at1=$res_val['updated_at'];
            $updated_at=explode(' ',$res_val['updated_at']);

            if(in_array($updated_at[0],$date_array)){
            
            }else{
                $date_array[]=$updated_at[0];    
            }
            
            $result_array[$updated_at[0]][] = $res_val;


        }
		
		$data['users_collection'] = $result_array;   

        $this->load->view('readmore', $data);
		
		
	}
	public function readMoreUpcoming()
	{
		
		
		$start = $this->input->post('start');//url segment; //0
		$end = $this->config->item('limit_incr');
		
		$res_array = $this->collections_model->get_collection_front_upcoming($start, $end);
		
		//$end   =  $start + $increment;//url segment ;   //2 

      

        $result_array=array();
        $date_array=array();
        //$result_array1=array();
        foreach($res_array as $res_val){

            $updated_at1=$res_val['updated_at'];
            $updated_at=explode(' ',$res_val['updated_at']);

            if(in_array($updated_at[0],$date_array)){
            
            }else{
                $date_array[]=$updated_at[0];    
            }
            
            $result_array[$updated_at[0]][] = $res_val;


        }
		
		$data['users_collection'] = $result_array;   

        $this->load->view('readmoreup', $data);
		
		
	}
	
	
	         public function searchAppend()
	{
		
		
		$start = $this->input->post('start');//url segment; //0
		
		$res_array = $this->collections_model->get_collection_front_search($start);

        $result_array=array();
        $date_array=array();
        //$result_array1=array();
        foreach($res_array as $res_val){

            $updated_at1=$res_val['updated_at'];
            $updated_at=explode(' ',$res_val['updated_at']);

            if(in_array($updated_at[0],$date_array)){
            
            }else{
                $date_array[]=$updated_at[0];    
            }
            
            $result_array[$updated_at[0]][] = $res_val;


        }
		
		$data['users_collection'] = $result_array;   
        $this->load->view('searchAppend', $data);
		
		
	}
	
	
	
	
      public function index()
	 {
		 
		 
		 $user_id = $this->session->userdata('_current_user_id');
		 
		$data['title'] ='Collection';		
		

		/*$data['users_upvote_collection']=$this->collections_model->get_vote_collection($user_i);*/

		$start = $this->config->item('limit_start'); //0
		$end   = $this->config->item('limit_end');   //2 
		
		$res_array = $this->collections_model->get_collection($start, $end);
		
        if(empty($res_array))
		{
		  $res_array = $this->collections_model->get_collection_more($start, $end);   	
		}
      
	    $end_limit = $this->collections_model->get_collection_end();
        $data['end_limit'] = $end_limit;
		$data['limit_incr'] = $this->config->item('limit_incr');
        $result_array=array();
        $date_array=array();
        //$result_array1=array();
        foreach($res_array as $res_val){

            $updated_at1=$res_val['updated_at'];
            $updated_at=explode(' ',$res_val['updated_at']);

            if(in_array($updated_at[0],$date_array)){
            
            }else{
                $date_array[]=$updated_at[0];    
            }
            
            $result_array[$updated_at[0]][]=$res_val;


        }

        $data['users_collection'] = $result_array;   
		
	    $res_array1 = $this->collections_model->get_collection_upcoming_start();	
	 if(empty($res_array1))
		{
		  $res_array1 = $this->collections_model->get_collection_upcoming_more();   	
		}
	
		$result_array1=array();
        $date_array1 =array();
        //$result_array1=array();
        foreach($res_array1 as $res_val){

            $updated_at1 = $res_val['updated_at'];
            $updated_at = explode(' ',$res_val['updated_at']);

            if(in_array($updated_at[0],$date_array)){
            
            }else{
                $date_array1[]=$updated_at[0];    
            }
            
            $result_array1[$updated_at[0]][] =$res_val;


        }
		$end_limit = $this->collections_model->get_collection_upcoming_end();
        $data['end_limit_new'] = $end_limit;

        $data['users_collection_upcoming'] = $result_array1;   
		
		
		

		
        $this->load->view('home', $data);
    }

}
