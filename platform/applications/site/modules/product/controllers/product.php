<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Products'));
		$this->load->helper(array('usersinfo/usersinfo','common'));	

	
	}



public function index()
	{
		
			$start = $this->config->item('limit_start'); //0
			$end   = $this->config->item('limit_end');   //2 
		
			$data['title']='Products';
			$this->db->select('SQL_CALC_FOUND_ROWS date_format(p.updated_at,"%Y-%m-%d") as publishdate');
			$this->db->from('products as p');
			$this->db->group_by("publishdate"); 
			$this->db->where('date_format(p.updated_at,"%Y-%m-%d") <=', date("Y-m-d"));
			$this->db->order_by("publishdate", "desc");
			
			if($end>0)
			{
			$this->db->limit($end, $start);
			}


			$query = $this->db->get();

			$res_array_go = $query->result_array();

			$query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
			$end_limit = $query->row()->Count;
			// $sql = $this->db->last_query();

			
      	    $data['end_limit'] = $end_limit;
			$data['limit_incr'] = $this->config->item('limit_incr');


			$data['res_product'] = $res_array_go;     
      			
      		$data['product_json'] = $this->ajax_product_index(); 
      			
			$this->load->view('product/products_view', $data);
	}


public function readMore_products()
	{
		

			$start = $this->input->post('start');//url segment; //0
			$end = $this->config->item('limit_incr');


			$data['title']='Products';
			$this->db->select('date_format(p.updated_at,"%Y-%m-%d") as publishdate');
			$this->db->from('products as p');
			$this->db->group_by("publishdate"); 
			$this->db->where('date_format(p.updated_at,"%Y-%m-%d") <=', date("Y-m-d"));
			$this->db->order_by("publishdate", "desc");
			
			if($end>0)
			{
			$this->db->limit($end, $start);
			}


			$query = $this->db->get();

			$res_array_go = $query->result_array();

			//echo $sql = $this->db->last_query();

	
			$data['res_product'] = $res_array_go;     
      			
      	
		$this->load->view('product/products_readmore', $data);

	}


	public function index_copy()
	{
		
		$data['title']='Products';
		$date=date("Y-m-d H:i:s");
        $where = "p.updated_at <= '".$date."'";

	    $limit=3;
		$param = array('id'=>'','orderby'=>'updated_at desc','where'=>$where );
		$res_array  = $this->Products->get_product($param);	
		$vote='0';
		$vote_html='';
		//trace($res_array);

		$result_array=array();
		$date_array=array();
		foreach($res_array as $res_val){

			$updated_at1=$res_val['updated_at'];
			$updated_at=explode(' ',$res_val['updated_at']);

			if(in_array($updated_at[0],$date_array)){
			
			}else{
				$date_array[]=$updated_at[0];	
			}
			
			if($res_val['file_name']!=''){
			$res_val['image_path']=base_url().'upload/products/'.$res_val['file_name'];
			}else{
			$res_val['image_path']=base_url().'upload/no_image.jpeg';
			}

			$collection_list1=$this->Products->get_product_wise_collection($res_val['id']);
			

			$res_val['collection_title']=$this->Products->collection_title(@$collection_list1[0]->col_id);


		    $res_val['vote']=$vote=vote_count_by_id('1',$res_val['id']);

		     $onclick_array=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$res_val['title_p'],
                                                            'section_type'=>'1',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$res_val['id'],

                                                    );


		   $vote_html='<a href="javascript:;" '.onclick_upvote($onclick_array).' ><span class="vote-count"><i class="fa fa-caret-up"></i><span id="numberpop_1_'.$res_val['id'].'">'.$vote.'</span></span></a>';
		   
		   $res_val['vote_html']=$vote_html;

           $result_array[$updated_at[0]][]=$res_val;
			


		}

		$data['res_product'] = $result_array;     
        //trace($date_array);
        //trace($result_array);
		$this->load->view('product/products_view', $data);
	}

	



	public function ajax_product_index()
	{
		
		$data['title']='Products';
		$date=date("Y-m-d H:i:s");
        $where = "p.updated_at <= '".$date."'";
		$param = array('id'=>'','orderby'=>'updated_at desc','where'=>$where );
		$res_array  = $this->Products->get_product($param);	
		$vote='0';
		$vote_html='';
		//trace($res_array);

		$result_array=array();
		$date_array=array();
		foreach($res_array as $res_val){

			$updated_at1=$res_val['updated_at'];
			$updated_at=explode(' ',$res_val['updated_at']);

			if(in_array($updated_at[0],$date_array)){
			
			}else{
				$date_array[]=$updated_at[0];	
			}
			
			if($res_val['file_name']!=''){
			$res_val['image_path']=base_url().'upload/products/'.$res_val['file_name'];
			}else{
			$res_val['image_path']=base_url().'upload/no_image.jpeg';
			}

			$collection_list1=$this->Products->get_product_wise_collection($res_val['id']);
			

			$res_val['collection_title']=$this->Products->collection_title(@$collection_list1[0]->col_id);


		    $res_val['vote']=$vote=vote_count_by_id('1',$res_val['id']);

		     $onclick_array=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$res_val['title_p'],
                                                            'section_type'=>'1',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$res_val['id'],

                                                    );


		   $vote_html='<a href="javascript:;" '.onclick_upvote($onclick_array).' ><span class="vote-count"><i class="fa fa-caret-up"></i><span id="numberpop_1_'.$res_val['id'].'">'.$vote.'</span></span></a>';
		   
		   $res_val['vote_html']=$vote_html;

           $result_array[$updated_at[0]][]=$res_val;
			


		}

		
        $html= "<script>".
                "var sliderData={products:''}; ".
                'sliderData.products='.json_encode($result_array).';'.
                'console.log(sliderData.products);'.
           '</script>';

      return $html;
	
	}

	

  public function popup_details()
    {
        $product_id = $this->input->post('product_id');
        $param = array('status'=>'1','id'=>$product_id,'orderby'=>'updated_at desc','where'=>'');
        $res_array  = $this->Products->get_product($param);	
        $data['res'] = $res_array[0];

        $data['title']='Products View';
        $html=$this->load->view('product/products_popup_view', $data);

        return $html;
    }


public function ajax_product_data(){

	$html='';
	$date = $this->input->post('date');
	$show_data = $this->input->post('show_data')+8;

	$where = "date_format(p.updated_at,'%Y-%m-%d') ='".$date."'";

	$param = array('limit'=>$show_data,'offset'=>'0','status'=>'1','orderby'=>'updated_at desc','where'=>$where);

    $res_array  = $this->Products->get_product($param);	
	//trace($res_array);

     $data['key'] = $date;
     $data['show_data'] = $show_data;
     $data['result_product'] = $res_array;

	//$sql = $this->db->last_query();

     $html =$this->load->view('product/products_more_view', $data);

	return $html;
}


public function searchAppend_product(){

	$html='';
	$date = $this->input->post('start');
	$show_data = $this->input->post('show_data')+8;

	$where = "date_format(p.updated_at,'%Y-%m-%d') ='".$date."'";

	$param = array('limit'=>$show_data,'offset'=>'0','status'=>'1','orderby'=>'updated_at desc','where'=>$where);

    $res_array  = $this->Products->get_product($param);	
	//trace($res_array);

     $data['key'] = $date;
     $data['show_data'] = $show_data;
     $data['result_product'] = $res_array;

	//$sql = $this->db->last_query();

     $html =$this->load->view('product/searchAppend_product', $data);

	return $html;
}



	public function product_main_show()
	{
	
		 $product_id = $this->input->post('cindex');

        $param = array('status'=>'1','id'=>$product_id,'orderby'=>'updated_at desc','where'=>'');

        $res_array  = $this->Products->get_product($param);	
	
	//echo $sql = $this->db->last_query();


        $res_val = $res_array[0];


//trace($res_val);

        $res_val['image_path']=base_url().'upload/products/'.$res_val['file_name'];
		
		$res_val['vote']=vote_count_by_id('1',$res_val['id']);


		$data['collection_list']=$collection_list=$this->Products->get_product_wise_collection($res_val['id']);

//trace($collection_list);

		if(is_array($collection_list) && !empty($collection_list)){

		$res_val['collection_title']=$this->Products->collection_title($collection_list[0]->col_id);	
	
		}else{
	
		$res_val['collection_title']='';

		}
		

		$data['result'] = $res_val;     
     
		$html=$this->load->view('product/product_popup_main_view', $data);

		return $html;

	}



  public function show()
    {
        $product_url = $this->uri->segment(3);

        $param = array('status'=>'1','url_slug'=>$product_url,'orderby'=>'updated_at desc','where'=>'');

        $res_array  = $this->Products->get_product($param);	
	



        $res_val = $res_array[0];


//trace($res_val);

        $res_val['image_path']=base_url().'upload/products/'.$res_val['file_name'];
		
		$res_val['vote']=vote_count_by_id('1',$res_val['id']);


		$data['collection_list']=$collection_list=$this->Products->get_product_wise_collection($res_val['id']);

//trace($collection_list);

		if(is_array($collection_list) && !empty($collection_list)){

		$res_val['collection_title']=$this->Products->collection_title($collection_list[0]->col_id);	
	
		}else{
	
		$res_val['collection_title']='';

		}
		

		$data['res'] =$res_val;
        
        $data['title']='Products View';
        
        $this->load->view('product/products_details_view', $data);

       
    }


public function product_share()
    {
        $product_id = $this->input->post('product_id');

        $param = array('status'=>'1','id'=>$product_id,'orderby'=>'updated_at desc','where'=>'');

        $res_array  = $this->Products->get_product($param);	
	//echo $sql = $this->db->last_query();
        $res_val = $res_array[0];

        $res_val['image_path']=base_url().'upload/products/'.$res_val['file_name'];
		
        $collection_list=$this->Products->get_product_wise_collection($res_val['id']);


			if(is_array($collection_list) && !empty($collection_list)){

			$res_val['collection_title']=$this->Products->collection_title($collection_list[0]->col_id);	

			}else{

			$res_val['collection_title']='';

			}



		$res_val['share_url']=base_url().'product/show/'.$res_val['url_slug'];

        
        $data['res'] =$res_val;

        $data['title']='product View';

        $html=$this->load->view('product/products_share_view', $data);

        return $html;
    } 



    public function more_product_with_collection()
    {
       $product_id = $this->input->post('cindex');

        $data['collection_list']=$this->Products->get_product_wise_collection($product_id);

        //trace($data['collection_list']);

        $data['title']='Products View';

        $html=$this->load->view('product/products_popup_view', $data);

        return $html;
    }


}

/* End of file usersinfo.php */
/* Location: ./application/controllers/usersinfo.php */
